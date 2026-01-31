<?php
/**
 * ═══════════════════════════════════════════════════════════════════════════
 * RAZORPAY PAYMENT VERIFICATION - TEST MODE
 * ═══════════════════════════════════════════════════════════════════════════
 * 
 * This endpoint verifies the payment signature returned by Razorpay Checkout.
 * 
 * IMPORTANT SECURITY:
 * - Signature verification is MANDATORY to prevent payment tampering
 * - Uses HMAC SHA256 to verify signature
 * - All verification is done server-side
 * 
 * Razorpay Signature Formula:
 * signature = hmac_sha256(razorpay_order_id + "|" + razorpay_payment_id, secret)
 * 
 * ═══════════════════════════════════════════════════════════════════════════
 */

require_once(__DIR__ . '/config.php');

// Initialize response variables
$success = false;
$error = "Payment verification failed";
$paymentId = '';
$orderId = '';
$signature = '';

// Get student details from query params
$name = isset($_GET['name']) ? sanitizeInput($_GET['name']) : '';
$classSection = isset($_GET['classSection']) ? sanitizeInput($_GET['classSection']) : '';
$rollNumber = isset($_GET['rollNumber']) ? sanitizeInput($_GET['rollNumber']) : '';
$amount = isset($_GET['amount']) ? floatval($_GET['amount']) : 0;

/**
 * Verify Razorpay Payment Signature
 * This is the MANDATORY security check as per Razorpay documentation
 */
function verifyRazorpaySignature($orderId, $paymentId, $signature, $secret) {
    // Generate expected signature using HMAC SHA256
    $expectedSignature = hash_hmac('sha256', $orderId . '|' . $paymentId, $secret);
    
    // Use timing-safe comparison to prevent timing attacks
    return hash_equals($expectedSignature, $signature);
}

// Check if configuration is valid
if (!$isConfigValid) {
    logPayment('VERIFY_ERROR', [
        'error' => 'Invalid configuration',
        'config_errors' => $configErrors
    ]);
    header("Location: payment_failed.php?error=" . urlencode("Payment system configuration error"));
    exit();
}

// Check for Razorpay parameters (from POST - standard checkout handler)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $paymentId = isset($_POST['razorpay_payment_id']) ? sanitizeInput($_POST['razorpay_payment_id']) : '';
    $orderId = isset($_POST['razorpay_order_id']) ? sanitizeInput($_POST['razorpay_order_id']) : '';
    $signature = isset($_POST['razorpay_signature']) ? $_POST['razorpay_signature'] : '';
    
    // Get student details from POST
    $name = isset($_POST['name']) ? sanitizeInput($_POST['name']) : $name;
    $classSection = isset($_POST['classSection']) ? sanitizeInput($_POST['classSection']) : $classSection;
    $rollNumber = isset($_POST['rollNumber']) ? sanitizeInput($_POST['rollNumber']) : $rollNumber;
    $amount = isset($_POST['amount']) ? floatval($_POST['amount']) : $amount;
}
// Check for GET parameters (from JavaScript handler redirect)
elseif (isset($_GET['razorpay_payment_id']) || isset($_GET['payment_id'])) {
    $paymentId = isset($_GET['razorpay_payment_id']) ? sanitizeInput($_GET['razorpay_payment_id']) : sanitizeInput($_GET['payment_id'] ?? '');
    $orderId = isset($_GET['razorpay_order_id']) ? sanitizeInput($_GET['razorpay_order_id']) : sanitizeInput($_GET['order_id'] ?? '');
    $signature = isset($_GET['razorpay_signature']) ? $_GET['razorpay_signature'] : ($_GET['signature'] ?? '');
}

// Validate required parameters
if (empty($paymentId) || empty($orderId) || empty($signature)) {
    logPayment('VERIFY_MISSING_PARAMS', [
        'has_payment_id' => !empty($paymentId),
        'has_order_id' => !empty($orderId),
        'has_signature' => !empty($signature)
    ]);
    
    header("Location: payment_failed.php?error=" . urlencode("Missing payment verification parameters"));
    exit();
}

try {
    // METHOD 1: Use Razorpay SDK's built-in verification (Recommended)
    $attributes = [
        'razorpay_order_id' => $orderId,
        'razorpay_payment_id' => $paymentId,
        'razorpay_signature' => $signature
    ];
    
    try {
        // SDK method - throws exception if verification fails
        $api->utility->verifyPaymentSignature($attributes);
        $success = true;
    } catch (Exception $e) {
        // METHOD 2: Manual verification as fallback
        $manualVerify = verifyRazorpaySignature($orderId, $paymentId, $signature, RAZORPAY_KEY_SECRET);
        
        if ($manualVerify) {
            $success = true;
        } else {
            $success = false;
            $error = "Payment signature verification failed. Possible tampering detected.";
            
            // Log security alert
            logPayment('SECURITY_ALERT', [
                'type' => 'SIGNATURE_MISMATCH',
                'order_id' => $orderId,
                'payment_id' => $paymentId,
                'ip_address' => $_SERVER['REMOTE_ADDR'] ?? 'unknown'
            ]);
        }
    }
    
    if ($success) {
        // Optionally: Fetch payment details from Razorpay to double-verify amount
        try {
            $payment = $api->payment->fetch($paymentId);
            
            // Log successful payment
            logPayment('PAYMENT_SUCCESS', [
                'payment_id' => $paymentId,
                'order_id' => $orderId,
                'amount' => $payment['amount'] / 100, // Convert paise to rupees
                'method' => $payment['method'] ?? 'unknown',
                'status' => $payment['status'] ?? 'unknown',
                'student_name' => $name,
                'class_section' => $classSection,
                'roll_number' => $rollNumber,
                'mode' => IS_TEST_MODE ? 'TEST' : 'LIVE'
            ]);
            
            // Use actual amount from Razorpay payment
            $amount = $payment['amount'] / 100;
            
        } catch (Exception $fetchError) {
            // Log but don't fail - signature was verified
            logPayment('PAYMENT_FETCH_WARNING', [
                'payment_id' => $paymentId,
                'error' => $fetchError->getMessage()
            ]);
        }
        
        // Redirect to success page with payment details
        $redirectUrl = "payment_success.php?" . http_build_query([
            'tid' => $paymentId,
            'order_id' => $orderId,
            'name' => $name,
            'classSection' => $classSection,
            'rollNumber' => $rollNumber,
            'amount' => $amount,
            'mode' => IS_TEST_MODE ? 'TEST' : 'LIVE'
        ]);
        
        header("Location: " . $redirectUrl);
        exit();
    }
    
} catch (Exception $e) {
    $success = false;
    $error = "Verification error: " . $e->getMessage();
    
    logPayment('VERIFY_EXCEPTION', [
        'error' => $e->getMessage(),
        'order_id' => $orderId,
        'payment_id' => $paymentId
    ]);
}

// Payment failed - redirect to failure page
logPayment('PAYMENT_FAILED', [
    'error' => $error,
    'order_id' => $orderId,
    'payment_id' => $paymentId
]);

header("Location: payment_failed.php?error=" . urlencode($error));
exit();
?>
