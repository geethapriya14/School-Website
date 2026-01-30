<?php
session_start();

$data = json_decode(file_get_contents("php://input"), true);

if ($data['username'] === "admin" && $data['password'] === "evaans123") {
    $_SESSION['admin_logged_in'] = true;
    echo json_encode(["success" => true]);
} else {
    echo json_encode(["success" => false]);
}
