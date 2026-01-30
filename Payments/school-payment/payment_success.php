<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Success | Evans School</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .success-container {
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

        .success-header {
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            padding: 40px 30px;
            color: white;
        }

        .success-icon {
            width: 80px;
            height: 80px;
            background: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            animation: scaleIn 0.5s ease-out 0.2s both;
        }

        @keyframes scaleIn {
            from {
                transform: scale(0);
            }
            to {
                transform: scale(1);
            }
        }

        .checkmark {
            width: 40px;
            height: 40px;
            stroke: #10b981;
            stroke-width: 3;
            stroke-linecap: round;
            stroke-linejoin: round;
            fill: none;
        }

        .checkmark-path {
            stroke-dasharray: 60;
            stroke-dashoffset: 60;
            animation: checkmark 0.5s ease-out 0.5s forwards;
        }

        @keyframes checkmark {
            to {
                stroke-dashoffset: 0;
            }
        }

        .success-title {
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .success-subtitle {
            font-size: 14px;
            opacity: 0.9;
        }

        .success-body {
            padding: 30px;
        }

        .transaction-details {
            background: #f0fdf4;
            border: 1px solid #bbf7d0;
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 24px;
        }

        .detail-row {
            display: flex;
            justify-content: space-between;
            padding: 10px 0;
            border-bottom: 1px dashed #bbf7d0;
        }

        .detail-row:last-child {
            border-bottom: none;
        }

        .detail-label {
            font-size: 13px;
            color: #6b7280;
        }

        /* Receipt School Header */
        .receipt-school-header {
            text-align: center;
            padding-bottom: 20px;
            margin-bottom: 20px;
            border-bottom: 2px dashed #bbf7d0;
        }

        .receipt-school-logo {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            margin: 0 auto 12px;
            overflow: hidden;
        }

        .receipt-school-logo img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .receipt-school-name {
            font-size: 18px;
            font-weight: 700;
            color: #374151;
            margin-bottom: 6px;
        }

        .receipt-school-address {
            font-size: 12px;
            color: #6b7280;
            line-height: 1.5;
            margin-bottom: 4px;
        }

        .receipt-school-contact {
            font-size: 12px;
            color: #6b7280;
            line-height: 1.5;
        }

        .detail-value {
            font-size: 13px;
            font-weight: 600;
            color: #374151;
            word-break: break-all;
            max-width: 200px;
            text-align: right;
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

        .footer-text {
            margin-top: 20px;
            font-size: 12px;
            color: #9ca3af;
        }

        .confetti {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            overflow: hidden;
            z-index: 100;
        }

        .confetti-piece {
            position: absolute;
            width: 10px;
            height: 10px;
            top: -10px;
            animation: confetti-fall 3s ease-out forwards;
        }

        @keyframes confetti-fall {
            to {
                transform: translateY(100vh) rotate(720deg);
                opacity: 0;
            }
        }
    </style>
</head>
<body>
    <?php
        require_once(__DIR__ . '/config.php');
        $transactionId = isset($_GET['tid']) ? htmlspecialchars($_GET['tid']) : 'N/A';
        $orderId = isset($_GET['order_id']) ? htmlspecialchars($_GET['order_id']) : 'N/A';
        $studentName = isset($_GET['name']) ? htmlspecialchars($_GET['name']) : 'N/A';
        $classSection = isset($_GET['classSection']) ? htmlspecialchars($_GET['classSection']) : 'N/A';
        $rollNumber = isset($_GET['rollNumber']) ? htmlspecialchars($_GET['rollNumber']) : 'N/A';
        $amount = isset($_GET['amount']) ? htmlspecialchars($_GET['amount']) : 'N/A';
        $paymentMode = isset($_GET['mode']) ? htmlspecialchars($_GET['mode']) : (IS_TEST_MODE ? 'TEST' : 'LIVE');
        $currentDate = date('d M Y, h:i A');
    ?>

    <!-- Confetti Animation -->
    <div class="confetti" id="confetti"></div>

    <div class="success-container">
        <div class="success-header">
            <div class="success-icon">
                <svg class="checkmark" viewBox="0 0 50 50">
                    <path class="checkmark-path" d="M14,27 L22,35 L37,16" />
                </svg>
            </div>
            <h1 class="success-title">Payment Successful!</h1>
            <p class="success-subtitle">Your fee payment has been processed successfully</p>
            <?php if ($paymentMode === 'TEST'): ?>
            <p style="background: rgba(245, 158, 11, 0.2); padding: 8px 16px; border-radius: 20px; font-size: 12px; margin-top: 12px; display: inline-block;">
                🧪 TEST MODE - No real money was charged
            </p>
            <?php endif; ?>
        </div>

        <div class="success-body">
            
            <div class="transaction-details">
                <!-- School Header on Receipt -->
                <div class="receipt-school-header">
                    <div class="receipt-school-logo"><img src="school-logo.png" alt="Evaans School Logo"></div>
                    <div class="receipt-school-name">Evaans School</div>
                    <div class="receipt-school-address">No.18, Mariamman Koil Street, Tharamani, Chennai</div>
                    <div class="receipt-school-contact">📞 044-22436604 (or) 044-29992126</div>
                    <div class="receipt-school-contact">✉️ contact@evaansschool.com</div>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Student Name</span>
                    <span class="detail-value"><?php echo $studentName; ?></span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Class & Section</span>
                    <span class="detail-value"><?php echo $classSection; ?></span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Roll Number</span>
                    <span class="detail-value"><?php echo $rollNumber; ?></span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Amount Paid</span>
                    <span class="detail-value" style="color: #10b981; font-weight: 600;">₹<?php echo number_format((float)$amount, 2); ?></span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Transaction ID</span>
                    <span class="detail-value"><?php echo $transactionId; ?></span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Order ID</span>
                    <span class="detail-value"><?php echo $orderId; ?></span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Date & Time</span>
                    <span class="detail-value"><?php echo $currentDate; ?></span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Status</span>
                    <span class="detail-value" style="color: #10b981;">✓ Completed <?php echo $paymentMode === 'TEST' ? '(Test)' : ''; ?></span>
                </div>
            </div>

            <div class="action-buttons">
                <a href="index.php" class="btn btn-primary">Make Another Payment</a>
                <button onclick="window.print()" class="btn btn-secondary">Print Receipt</button>
            </div>

            <p class="footer-text">A confirmation email has been sent to your registered email address.</p>
        </div>
    </div>

    <script>
        // Create confetti
        function createConfetti() {
            const confettiContainer = document.getElementById('confetti');
            const colors = ['#10b981', '#667eea', '#f59e0b', '#ef4444', '#8b5cf6'];
            
            for (let i = 0; i < 50; i++) {
                const piece = document.createElement('div');
                piece.className = 'confetti-piece';
                piece.style.left = Math.random() * 100 + '%';
                piece.style.backgroundColor = colors[Math.floor(Math.random() * colors.length)];
                piece.style.animationDelay = Math.random() * 2 + 's';
                piece.style.borderRadius = Math.random() > 0.5 ? '50%' : '0';
                confettiContainer.appendChild(piece);
            }
        }
        
        createConfetti();
    </script>
</body>
</html>
