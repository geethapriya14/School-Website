<?php
/**
 * ═══════════════════════════════════════════════════════════════════════════
 * EVANS SCHOOL - PAYMENT GATEWAY CONFIGURATION
 * ═══════════════════════════════════════════════════════════════════════════
 * 
 * SECURE RAZORPAY INTEGRATION - TEST MODE
 * 
 * This configuration file loads API credentials from .env file for security.
 * NEVER commit .env file to Git or any public repository!
 * 
 * SETUP INSTRUCTIONS:
 * ────────────────────
 * 1. Open the .env file in this folder
 * 2. Replace RAZORPAY_KEY_ID with your TEST key (starts with rzp_test_)
 * 3. Replace RAZORPAY_KEY_SECRET with your TEST secret
 * 4. Save the file and test payments
 * 
 * TO SWITCH TO LIVE MODE:
 * ────────────────────────
 * 1. Replace TEST keys with LIVE keys (start with rzp_live_) in .env
 * 2. Change RAZORPAY_MODE to LIVE in .env
 * 3. Set DEBUG_MODE to false in .env
 * 4. Ensure SSL is enabled on your server
 * 
 * ═══════════════════════════════════════════════════════════════════════════
 */

// Start session for CSRF protection
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Load environment variables from .env file
function loadEnv($path) {
    if (!file_exists($path)) {
        return false;
    }
    
    $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        // Skip comments
        if (strpos(trim($line), '#') === 0) {
            continue;
        }
        
        // Parse key=value pairs
        if (strpos($line, '=') !== false) {
            list($key, $value) = explode('=', $line, 2);
            $key = trim($key);
            $value = trim($value);
            
            // Remove quotes if present
            $value = trim($value, '"\'');
            
            // Set as environment variable
            putenv("$key=$value");
            $_ENV[$key] = $value;
        }
    }
    return true;
}

// Load .env file
$envLoaded = loadEnv(__DIR__ . '/.env');

// Get configuration from environment variables
$razorpayKeyId = getenv('RAZORPAY_KEY_ID') ?: '';
$razorpayKeySecret = getenv('RAZORPAY_KEY_SECRET') ?: '';
$razorpayMode = getenv('RAZORPAY_MODE') ?: 'TEST';
$debugMode = getenv('DEBUG_MODE') === 'true';

// Configure error display based on debug mode
if ($debugMode) {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
} else {
    ini_set('display_errors', 0);
    ini_set('display_startup_errors', 0);
    error_reporting(0);
}

// Load Razorpay SDK
require_once(__DIR__ . '/../vendor/autoload.php');

use Razorpay\Api\Api;

/**
 * ┌─────────────────────────────────────────────────────────────────────────┐
 * │                      DEFINE CONSTANTS                                    │
 * └─────────────────────────────────────────────────────────────────────────┘
 */
define('RAZORPAY_KEY_ID', $razorpayKeyId);
define('RAZORPAY_KEY_SECRET', $razorpayKeySecret);
define('RAZORPAY_MODE', $razorpayMode);
define('DEBUG_MODE', $debugMode);

// Determine if we're in test mode
define('IS_TEST_MODE', strpos(RAZORPAY_KEY_ID, 'rzp_test_') === 0);

/**
 * ┌─────────────────────────────────────────────────────────────────────────┐
 * │                      VALIDATION                                          │
 * └─────────────────────────────────────────────────────────────────────────┘
 */
function validateRazorpayConfig() {
    $errors = [];
    
    if (empty(RAZORPAY_KEY_ID)) {
        $errors[] = "RAZORPAY_KEY_ID is not set in .env file";
    } elseif (strpos(RAZORPAY_KEY_ID, 'XXXXXXXXXX') !== false) {
        $errors[] = "Please replace the placeholder RAZORPAY_KEY_ID with your actual key in .env file";
    } elseif (strpos(RAZORPAY_KEY_ID, 'rzp_test_') !== 0 && strpos(RAZORPAY_KEY_ID, 'rzp_live_') !== 0) {
        $errors[] = "Invalid RAZORPAY_KEY_ID format. Must start with 'rzp_test_' or 'rzp_live_'";
    }
    
    if (empty(RAZORPAY_KEY_SECRET)) {
        $errors[] = "RAZORPAY_KEY_SECRET is not set in .env file";
    } elseif (strpos(RAZORPAY_KEY_SECRET, 'XXXXXX') !== false) {
        $errors[] = "Please replace the placeholder RAZORPAY_KEY_SECRET with your actual secret in .env file";
    }
    
    return $errors;
}

// Validate configuration
$configErrors = validateRazorpayConfig();
$isConfigValid = empty($configErrors);

/**
 * ┌─────────────────────────────────────────────────────────────────────────┐
 * │                      INITIALIZE RAZORPAY API                             │
 * └─────────────────────────────────────────────────────────────────────────┘
 */
$api = null;

if ($isConfigValid) {
    try {
        $api = new Api(RAZORPAY_KEY_ID, RAZORPAY_KEY_SECRET);
    } catch (Exception $e) {
        if (DEBUG_MODE) {
            die("Razorpay API Error: " . $e->getMessage());
        } else {
            error_log("Razorpay API Error: " . $e->getMessage());
            die("Payment system configuration error. Please contact support.");
        }
    }
}

/**
 * ┌─────────────────────────────────────────────────────────────────────────┐
 * │                      CSRF PROTECTION                                     │
 * └─────────────────────────────────────────────────────────────────────────┘
 */
function generateCSRFToken() {
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

function validateCSRFToken($token) {
    return isset($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $token);
}

/**
 * ┌─────────────────────────────────────────────────────────────────────────┐
 * │                      PAYMENT LOGGER                                      │
 * └─────────────────────────────────────────────────────────────────────────┘
 */
function logPayment($type, $data) {
    $logDir = __DIR__ . '/logs';
    if (!is_dir($logDir)) {
        mkdir($logDir, 0755, true);
    }
    
    $logFile = $logDir . '/payments_' . date('Y-m-d') . '.log';
    $timestamp = date('Y-m-d H:i:s');
    
    // Remove sensitive data before logging
    $safeData = $data;
    if (isset($safeData['razorpay_signature'])) {
        $safeData['razorpay_signature'] = substr($safeData['razorpay_signature'], 0, 10) . '...';
    }
    
    $logEntry = "[$timestamp] [$type] " . json_encode($safeData) . PHP_EOL;
    file_put_contents($logFile, $logEntry, FILE_APPEND | LOCK_EX);
}

/**
 * ┌─────────────────────────────────────────────────────────────────────────┐
 * │                      HELPER FUNCTIONS                                    │
 * └─────────────────────────────────────────────────────────────────────────┘
 */
function sanitizeInput($input) {
    return htmlspecialchars(strip_tags(trim($input)), ENT_QUOTES, 'UTF-8');
}

function validateAmount($amount) {
    $amount = floatval($amount);
    return $amount >= 1 && $amount <= 10000000; // Min ₹1, Max ₹1 Crore
}

function validateEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}

function validatePhone($phone) {
    return preg_match('/^[6-9]\d{9}$/', $phone);
}
?>
