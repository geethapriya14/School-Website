<?php
// Include database connection
require_once __DIR__ . '/../templates/config.php';

// Include header and navigation if you have them
require_once __DIR__ . '/../templates/header.php';
require_once __DIR__ . '/../templates/navigation.php';
?>

<h1>Contact / Enquiry Form Submissions</h1>
<p>All submissions from users via the contact form are listed below.</p>

<table border="1" cellpadding="10" cellspacing="0" style="border-collapse: collapse; width: 100%;">
    <tr>
        <th>ID</th>
        <th>Full Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Enquiry Type</th>
        <th>Message</th>
        <th>Submitted At</th>
    </tr>

<?php
// Fetch submissions from database
$sql = "SELECT * FROM contact_submissions ORDER BY submitted_at DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()){
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['name']}</td>
                <td>{$row['email']}</td>
                <td>{$row['phone']}</td>
                <td>{$row['enquiry_type']}</td>
                <td>{$row['message']}</td>
                <td>{$row['submitted_at']}</td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='7'>No submissions yet.</td></tr>";
}
?>

</table>

<?php
require_once __DIR__ . '/../templates/footer.php';
?>
