<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "school_db"; // change this to your DB name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Collect form data safely
$name = $_POST['name'];
$email = $_POST['email'];
$phone_number = $_POST['phone_number'] ?? '';
$enquiry_type = $_POST['enquiry_type'] ?? '';
$message = $_POST['message'];

// Insert data into database
$sql = "INSERT INTO contact_enquiries (name, email, phone_number, enquiry_type, message) VALUES ('$name', '$email',  '$phone_number' , '$enquiry_type', '$message')";

if ($conn->query($sql) === TRUE) {
    echo "Thank you! Your enquiry has been submitted.";
    // Optionally redirect back to user form or thank you page
    // header("Location: index.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
