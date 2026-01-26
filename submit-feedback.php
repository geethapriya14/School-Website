<?php
require_once 'templates/config.php';
require_once 'templates/functions.php';

header('Content-Type: application/json');

$response = [
    'success' => false,
    'message' => '',
    'errors' => []
];

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    $response['message'] = 'Invalid request method';
    echo json_encode($response);
    exit;
}

// Sanitize inputs
$name = sanitize_input($_POST['name'] ?? '');
$relation = sanitize_input($_POST['relation'] ?? '');
$rating = intval($_POST['rating'] ?? 0);
$message = sanitize_input($_POST['message'] ?? '');
$consent = isset($_POST['consent']) ? true : false;

// Validation
if (empty($name)) {
    $response['errors']['name'] = 'Name is required';
}
if (empty($relation)) {
    $response['errors']['relation'] = 'Please specify your relation';
}
if ($rating < 1 || $rating > 5) {
    $response['errors']['rating'] = 'Please provide a valid rating';
}
if (empty($message)) {
    $response['errors']['message'] = 'Feedback message is required';
}
if (!$consent) {
    $response['errors']['consent'] = 'Consent is required for publication';
}

// If validation errors
if (!empty($response['errors'])) {
    $response['message'] = 'Please correct the errors below';
    echo json_encode($response);
    exit;
}

// Process file upload
$photo_path = null;
if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
    $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
    $max_size = 2 * 1024 * 1024; // 2MB
    
    if (in_array($_FILES['photo']['type'], $allowed_types) && 
        $_FILES['photo']['size'] <= $max_size) {
        
        $upload_dir = 'assets/uploads/feedback/';
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0755, true);
        }
        
        $file_extension = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
        $filename = uniqid() . '_' . time() . '.' . $file_extension;
        $photo_path = $upload_dir . $filename;
        
        if (move_uploaded_file($_FILES['photo']['tmp_name'], $photo_path)) {
            // Successfully uploaded
        }
    }
}

// Save to database (example using PDO)
try {
    $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $stmt = $pdo->prepare("INSERT INTO feedback 
                          (name, relation, rating, message, photo_path, consent, ip_address, created_at) 
                          VALUES (?, ?, ?, ?, ?, ?, ?, NOW())");
    
    $stmt->execute([
        $name,
        $relation,
        $rating,
        $message,
        $photo_path,
        $consent ? 1 : 0,
        $_SERVER['REMOTE_ADDR']
    ]);
    
    // Send email notification
    $to = ADMIN_EMAIL;
    $subject = "New Feedback Submitted - " . SITE_NAME;
    $email_body = "New feedback has been submitted:\n\n";
    $email_body .= "Name: $name\n";
    $email_body .= "Relation: $relation\n";
    $email_body .= "Rating: $rating/5\n";
    $email_body .= "Message: $message\n";
    
    mail($to, $subject, $email_body);
    
    $response['success'] = true;
    $response['message'] = 'Thank you for your feedback! It will be reviewed before publication.';
    
} catch (PDOException $e) {
    $response['message'] = 'Database error: ' . $e->getMessage();
}

echo json_encode($response);
?>