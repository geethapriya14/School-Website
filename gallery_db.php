<?php
$servername = "localhost";
$username = "root";      // your XAMPP MySQL username
$password = "";          // your MySQL password
$dbname = "school_db";  // your database name

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
