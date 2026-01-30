<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: /Evaans_School_Website/admin/login.html");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Evaans School Admin</title>
</head>
<body>

<h2>Evaans School – Admin Panel</h2>
