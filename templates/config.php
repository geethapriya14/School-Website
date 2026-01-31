<?php
$host = "localhost";
$user = "root";
$password = "";   // empty in XAMPP
$database = "school_db";

$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}
?>
