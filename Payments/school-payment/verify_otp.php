<?php
session_start();

if ($_POST['entered_otp'] == $_SESSION['otp']) {
    header("Location: create_order.php");
} else {
    echo "<h3>❌ Invalid OTP</h3>";
}
