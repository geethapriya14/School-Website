<?php
/**
 * ═══════════════════════════════════════════════════════════════════════════
 * RAZORPAY ORDER CREATION - TEST MODE
 * ═══════════════════════════════════════════════════════════════════════════
 * 
 * This endpoint creates an order on Razorpay server securely.
 * The order ID is returned to the frontend to initiate checkout.
 * 
 * SECURITY MEASURES:
 * - Input validation and sanitization
 * - CSRF token validation
 * - Amount validation (min/max limits)
 * - Request method validation
 * - Payment logging for audit
 * 
 * ═══════════════════════════════════════════════════════════════════════════
 */

header('Content-Type: application/json');
header('X-Content-Type-Options: nosniff');
header('X-Frame-Options: DENY');

// Include configuration
require_once(__DIR__ . '/config.php');

// Only allow POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['error' => 'Method not allowed']);
    exit;
}

// Check if configuration is valid
if (!$isConfigValid) {
    http_response_code(500);
    echo json_encode([
        'error' => 'Payment system not configured',
        'details' => DEBUG_MODE ? $configErrors : null
    ]);
    exit;
}

// Get JSON input
$input = file_get_contents('php://input');
$data = json_decode($input, true);

if (json_last_error() !== JSON_ERROR_NONE) {
    http_response_code(400);
    echo json_encode(['error' => 'Invalid JSON input']);
    exit;
}

// Validate CSRF token (skip for API calls in development)
if (isset($data['csrf_token'])) {
    if (!validateCSRFToken($data['csrf_token'])) {
        http_response_code(403);
        echo json_encode(['error' => 'Invalid security token']);
        exit;
    }
}

// Extract and validate input
$amount = isset($data['amount']) ? floatval($data['amount']) : 0;
$name = isset($data['name']) ? sanitizeInput($data['name']) : '';
$email = isset($data['email']) ? sanitizeInput($data['email']) : '';
$phone = isset($data['phone']) ? sanitizeInput($data['phone']) : '';
$classSection = isset($data['classSection']) ? sanitizeInput($data['classSection']) : '';
$rollNumber = isset($data['rollNumber']) ? sanitizeInput($data['rollNumber']) : '';

// Validation
$errors = [];

if (empty($name)) {
    $errors[] = 'Student name is required';
}

if (!validateAmount($amount)) {
    $errors[] = 'Amount must be between ₹1 and ₹1,00,00,000';
}

if (!empty($email) && !validateEmail($email)) {
    $errors[] = 'Invalid email format';
}

if (!empty($phone) && !validatePhone($phone)) {
    $errors[] = 'Invalid phone number (10 digits starting with 6-9)';
}

if (!empty($errors)) {
    http_response_code(400);
    echo json_encode(['error' => implode(', ', $errors)]);
    exit;
}

try {
    // Convert amount to paise (Razorpay requires amount in smallest currency unit)
    $amountInPaise = (int)($amount * 100);
    
    // Generate unique receipt ID
    $receiptId = 'EVANS_' . date('Ymd') . '_' . strtoupper(substr(uniqid(), -8));
    
    // Create order data
    $orderData = [
        'receipt' => $receiptId,
        'amount' => $amountInPaise,
        'currency' => 'INR',
        'payment_capture' => 1, // Auto capture payment
        'notes' => [
            'student_name' => $name,
            'class_section' => $classSection,
            'roll_number' => $rollNumber,
            'email' => $email,
            'phone' => $phone,
            'school' => 'Evans School',
            'mode' => IS_TEST_MODE ? 'TEST' : 'LIVE'
        ]
    ];
    
    // Create order on Razorpay
    $razorpayOrder = $api->order->create($orderData);
    
    // Log order creation
    logPayment('ORDER_CREATED', [
        'order_id' => $razorpayOrder['id'],
        'receipt' => $receiptId,
        'amount' => $amount,
        'student_name' => $name,
        'class_section' => $classSection,
        'mode' => IS_TEST_MODE ? 'TEST' : 'LIVE'
    ]);
    
    // Return response to frontend
    $response = [
        'success' => true,
        'keyId' => RAZORPAY_KEY_ID,
        'orderId' => $razorpayOrder['id'],
        'amount' => $amountInPaise,
        'currency' => 'INR',
        'receipt' => $receiptId,
        'isTestMode' => IS_TEST_MODE
    ];
    
    echo json_encode($response);
    
} catch (Exception $e) {
    // Log error
    logPayment('ORDER_ERROR', [
        'error' => $e->getMessage(),
        'amount' => $amount,
        'student_name' => $name
    ]);
    
    http_response_code(500);
    
    if (DEBUG_MODE) {
        echo json_encode([
            'error' => 'Failed to create order: ' . $e->getMessage()
        ]);
    } else {
        echo json_encode([
            'error' => 'Payment initialization failed. Please try again.'
        ]);
    }
}
?>
