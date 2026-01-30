<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Failed | Evans School</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .failed-container {
            background: white;
            border-radius: 24px;
            box-shadow: 0 25px 80px rgba(0, 0, 0, 0.2);
            max-width: 450px;
            width: 100%;
            text-align: center;
            overflow: hidden;
            animation: slideUp 0.5s ease-out;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .failed-header {
            background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
            padding: 40px 30px;
            color: white;
        }

        .failed-icon {
            width: 80px;
            height: 80px;
            background: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            animation: shake 0.5s ease-out;
        }

        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-5px); }
            75% { transform: translateX(5px); }
        }

        .cross-icon {
            font-size: 40px;
            color: #ef4444;
        }

        .failed-title {
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .failed-subtitle {
            font-size: 14px;
            opacity: 0.9;
        }

        .failed-body {
            padding: 30px;
        }

        .error-box {
            background: #fef2f2;
            border: 1px solid #fecaca;
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 24px;
        }

        .error-label {
            font-size: 12px;
            color: #991b1b;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 8px;
        }

        .error-message {
            font-size: 14px;
            color: #dc2626;
            font-weight: 500;
        }

        .help-section {
            background: #f9fafb;
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 24px;
            text-align: left;
        }

        .help-title {
            font-size: 14px;
            font-weight: 600;
            color: #374151;
            margin-bottom: 12px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .help-list {
            list-style: none;
            padding: 0;
        }

        .help-list li {
            font-size: 13px;
            color: #6b7280;
            padding: 6px 0;
            display: flex;
            align-items: flex-start;
            gap: 8px;
        }

        .help-list li::before {
            content: '•';
            color: #9ca3af;
        }

        .action-buttons {
            display: flex;
            gap: 12px;
        }

        .btn {
            flex: 1;
            padding: 14px 20px;
            border-radius: 10px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s;
            text-decoration: none;
            text-align: center;
            font-family: inherit;
            border: none;
        }

        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(102, 126, 234, 0.4);
        }

        .btn-secondary {
            background: #f3f4f6;
            color: #374151;
            border: 2px solid #e5e7eb;
        }

        .btn-secondary:hover {
            background: #e5e7eb;
        }

        .support-text {
            margin-top: 20px;
            font-size: 12px;
            color: #9ca3af;
        }

        .support-text a {
            color: #667eea;
            text-decoration: none;
        }

        .support-text a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <?php
        require_once(__DIR__ . '/config.php');
        $errorMessage = isset($_GET['error']) ? htmlspecialchars($_GET['error']) : 'An unknown error occurred during payment.';
    ?>

    <div class="failed-container">
        <div class="failed-header">
            <div class="failed-icon">
                <span class="cross-icon">✕</span>
            </div>
            <h1 class="failed-title">Payment Failed</h1>
            <p class="failed-subtitle">Your transaction could not be processed</p>
            <?php if (IS_TEST_MODE): ?>
            <p style="background: rgba(245, 158, 11, 0.2); padding: 8px 16px; border-radius: 20px; font-size: 12px; margin-top: 12px; display: inline-block;">
                🧪 TEST MODE - Use Razorpay test cards
            </p>
            <?php endif; ?>
        </div>

        <div class="failed-body">
            <div class="error-box">
                <div class="error-label">Error Details</div>
                <div class="error-message"><?php echo $errorMessage; ?></div>
            </div>

            <div class="help-section">
                <div class="help-title">
                    💡 Common reasons for payment failure
                </div>
                <ul class="help-list">
                    <li>Insufficient balance in your account</li>
                    <li>Incorrect card details or CVV</li>
                    <li>Card expired or blocked</li>
                    <li>Transaction limit exceeded</li>
                    <li>Network or connectivity issues</li>
                    <?php if (IS_TEST_MODE): ?>
                    <li><strong>TEST MODE:</strong> Make sure to use Razorpay test card numbers</li>
                    <?php endif; ?>
                </ul>
            </div>

            <div class="action-buttons">
                <a href="index.php" class="btn btn-primary">Try Again</a>
                <a href="index.php" class="btn btn-secondary">Back to Home</a>
            </div>

            <p class="support-text">
                Need help? Contact us at <a href="mailto:support@evansschool.edu">support@evansschool.edu</a>
            </p>
        </div>
    </div>
</body>
</html>
