<?php
session_start();

$otp = rand(100000, 999999);   // AUTO OTP
$_SESSION['otp'] = $otp;
$_SESSION['amount'] = $_POST['amount'];

// For demo: display OTP (replace with SMS/email in real world)
echo "<h3>Your OTP is: <b>$otp</b></h3>";
?>

<form action="verify_otp.php" method="POST">
    <input type="text" name="entered_otp" placeholder="Enter OTP" required>
    <button type="submit">Verify OTP</button>
</form>
