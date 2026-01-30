<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secure Payment | Razorpay</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            background: linear-gradient(135deg, #1a1a2e 0%, #16213e 50%, #0f3460 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.6);
            backdrop-filter: blur(5px);
            z-index: 1;
        }

        .payment-modal {
            position: relative;
            z-index: 2;
            width: 100%;
            max-width: 420px;
            background: #fff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 25px 80px rgba(0, 0, 0, 0.35);
            animation: slideUp 0.4s ease-out;
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

        /* Header Section */
        .modal-header {
            background: linear-gradient(135deg, #2b6cb0 0%, #3182ce 100%);
            padding: 20px 24px;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .merchant-info {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .merchant-logo {
            width: 48px;
            height: 48px;
            background: white;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            color: #2b6cb0;
            font-size: 18px;
        }

        .merchant-name {
            font-size: 16px;
            font-weight: 600;
        }

        .merchant-desc {
            font-size: 13px;
            opacity: 0.9;
        }

        .amount-display {
            text-align: right;
        }

        .amount-label {
            font-size: 11px;
            opacity: 0.8;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .amount-value {
            font-size: 24px;
            font-weight: 700;
        }

        /* Payment Methods */
        .payment-body {
            padding: 0;
        }

        .payment-methods {
            display: flex;
            border-bottom: 1px solid #e2e8f0;
        }

        .method-tab {
            flex: 1;
            padding: 14px 8px;
            text-align: center;
            font-size: 12px;
            font-weight: 500;
            color: #64748b;
            cursor: pointer;
            border-bottom: 2px solid transparent;
            transition: all 0.2s;
            background: #f8fafc;
        }

        .method-tab:hover {
            background: #f1f5f9;
        }

        .method-tab.active {
            color: #2b6cb0;
            border-bottom-color: #2b6cb0;
            background: white;
        }

        .method-tab i {
            display: block;
            font-size: 20px;
            margin-bottom: 4px;
        }

        .method-icon {
            width: 24px;
            height: 24px;
            margin: 0 auto 4px;
        }

        /* Card Form */
        .card-form {
            padding: 24px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: block;
            font-size: 13px;
            font-weight: 500;
            color: #374151;
            margin-bottom: 8px;
        }

        .form-input {
            width: 100%;
            padding: 14px 16px;
            border: 1.5px solid #e2e8f0;
            border-radius: 8px;
            font-size: 15px;
            font-family: inherit;
            transition: all 0.2s;
            background: #f8fafc;
        }

        .form-input:focus {
            outline: none;
            border-color: #2b6cb0;
            background: white;
            box-shadow: 0 0 0 3px rgba(43, 108, 176, 0.1);
        }

        .form-input::placeholder {
            color: #94a3b8;
        }

        .form-row {
            display: flex;
            gap: 16px;
        }

        .form-row .form-group {
            flex: 1;
        }

        /* Card Preview */
        .card-preview {
            background: linear-gradient(135deg, #1e3a5f 0%, #2d5a87 100%);
            border-radius: 12px;
            padding: 20px;
            color: white;
            margin-bottom: 24px;
            position: relative;
            overflow: hidden;
        }

        .card-preview::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 100%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 60%);
        }

        .card-chip {
            width: 45px;
            height: 35px;
            background: linear-gradient(135deg, #ffd700 0%, #ffb700 100%);
            border-radius: 6px;
            margin-bottom: 20px;
            position: relative;
        }

        .card-chip::after {
            content: '';
            position: absolute;
            left: 8px;
            top: 8px;
            width: 28px;
            height: 18px;
            border: 2px solid rgba(0,0,0,0.2);
            border-radius: 3px;
        }

        .card-number-display {
            font-size: 18px;
            letter-spacing: 3px;
            margin-bottom: 20px;
            font-family: 'Courier New', monospace;
        }

        .card-details-row {
            display: flex;
            justify-content: space-between;
        }

        .card-detail-label {
            font-size: 9px;
            opacity: 0.7;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .card-detail-value {
            font-size: 14px;
            margin-top: 4px;
        }

        .card-brand {
            position: absolute;
            top: 20px;
            right: 20px;
            font-size: 28px;
            font-weight: 700;
            opacity: 0.9;
        }

        /* UPI Section */
        .upi-section {
            padding: 24px;
            display: none;
        }

        .upi-section.active {
            display: block;
        }

        .upi-apps {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 12px;
            margin-bottom: 20px;
        }

        .upi-app {
            padding: 16px 8px;
            border: 1.5px solid #e2e8f0;
            border-radius: 10px;
            text-align: center;
            cursor: pointer;
            transition: all 0.2s;
            background: #f8fafc;
        }

        .upi-app:hover {
            border-color: #2b6cb0;
            background: white;
        }

        .upi-app.selected {
            border-color: #2b6cb0;
            background: #eff6ff;
        }

        .upi-app-icon {
            width: 36px;
            height: 36px;
            margin: 0 auto 8px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 12px;
        }

        .upi-app-name {
            font-size: 11px;
            color: #64748b;
        }

        .gpay-icon { background: linear-gradient(135deg, #4285f4, #34a853); color: white; }
        .phonepe-icon { background: linear-gradient(135deg, #5f259f, #7b3fb1); color: white; }
        .paytm-icon { background: linear-gradient(135deg, #00baf2, #0097c7); color: white; }
        .bhim-icon { background: linear-gradient(135deg, #00695c, #00897b); color: white; }

        .upi-divider {
            text-align: center;
            color: #94a3b8;
            font-size: 13px;
            margin: 20px 0;
            position: relative;
        }

        .upi-divider::before,
        .upi-divider::after {
            content: '';
            position: absolute;
            top: 50%;
            width: 40%;
            height: 1px;
            background: #e2e8f0;
        }

        .upi-divider::before { left: 0; }
        .upi-divider::after { right: 0; }

        /* Netbanking */
        .netbanking-section {
            padding: 24px;
            display: none;
        }

        .netbanking-section.active {
            display: block;
        }

        .bank-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 12px;
        }

        .bank-option {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 14px;
            border: 1.5px solid #e2e8f0;
            border-radius: 10px;
            cursor: pointer;
            transition: all 0.2s;
            background: #f8fafc;
        }

        .bank-option:hover {
            border-color: #2b6cb0;
            background: white;
        }

        .bank-option.selected {
            border-color: #2b6cb0;
            background: #eff6ff;
        }

        .bank-logo {
            width: 32px;
            height: 32px;
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 11px;
            color: white;
        }

        .hdfc-logo { background: #004c8f; }
        .icici-logo { background: #f58220; }
        .sbi-logo { background: #22409a; }
        .axis-logo { background: #800000; }
        .kotak-logo { background: #ed1c24; }
        .bob-logo { background: #f15a22; }

        .bank-name {
            font-size: 13px;
            font-weight: 500;
            color: #374151;
        }

        /* Pay Button */
        .pay-button {
            width: 100%;
            padding: 16px;
            background: linear-gradient(135deg, #2b6cb0 0%, #3182ce 100%);
            color: white;
            border: none;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            font-family: inherit;
        }

        .pay-button:hover {
            background: linear-gradient(135deg, #2563a8 0%, #2b6cb0 100%);
        }

        .pay-button:disabled {
            background: #94a3b8;
            cursor: not-allowed;
        }

        /* Footer */
        .modal-footer {
            padding: 16px 24px;
            background: #f8fafc;
            border-top: 1px solid #e2e8f0;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 8px;
        }

        .secured-by {
            font-size: 11px;
            color: #64748b;
        }

        .razorpay-logo {
            height: 16px;
        }

        .razorpay-brand {
            font-weight: 700;
            font-size: 14px;
            color: #2b6cb0;
        }

        /* Processing Overlay */
        .processing-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.95);
            display: none;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            z-index: 10;
            border-radius: 12px;
        }

        .processing-overlay.active {
            display: flex;
        }

        .spinner {
            width: 50px;
            height: 50px;
            border: 4px solid #e2e8f0;
            border-top-color: #2b6cb0;
            border-radius: 50%;
            animation: spin 1s linear infinite;
            margin-bottom: 20px;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        .processing-text {
            font-size: 16px;
            font-weight: 500;
            color: #374151;
            margin-bottom: 8px;
        }

        .processing-subtext {
            font-size: 13px;
            color: #64748b;
        }

        /* Security Icons */
        .security-badges {
            display: flex;
            justify-content: center;
            gap: 20px;
            padding: 12px 24px;
            background: #f8fafc;
        }

        .security-badge {
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: 11px;
            color: #64748b;
        }

        .security-icon {
            font-size: 14px;
        }

        /* Cancel Button */
        .cancel-link {
            display: block;
            text-align: center;
            color: #64748b;
            text-decoration: none;
            font-size: 13px;
            margin-top: 12px;
            padding: 8px;
        }

        .cancel-link:hover {
            color: #374151;
        }
    </style>
</head>
<body>
    <?php
        $amount = isset($_GET['amount']) ? floatval($_GET['amount']) : 0;
        $name = isset($_GET['name']) ? htmlspecialchars($_GET['name']) : 'Student';
        $classSection = isset($_GET['classSection']) ? htmlspecialchars($_GET['classSection']) : '';
        $rollNumber = isset($_GET['rollNumber']) ? htmlspecialchars($_GET['rollNumber']) : '';
        $email = isset($_GET['email']) ? htmlspecialchars($_GET['email']) : '';
        $phone = isset($_GET['phone']) ? htmlspecialchars($_GET['phone']) : '';
        $orderId = isset($_GET['order_id']) ? htmlspecialchars($_GET['order_id']) : 'order_demo_' . time();
    ?>

    <div class="overlay"></div>

    <div class="payment-modal" id="paymentModal">
        <!-- Processing Overlay -->
        <div class="processing-overlay" id="processingOverlay">
            <div class="spinner"></div>
            <div class="processing-text">Processing Payment</div>
            <div class="processing-subtext">Please do not close or refresh this page</div>
        </div>

        <!-- Header -->
        <div class="modal-header">
            <div class="merchant-info">
                <div class="merchant-logo">ES</div>
                <div>
                    <div class="merchant-name">Evans School</div>
                    <div class="merchant-desc">Fee Payment</div>
                </div>
            </div>
            <div class="amount-display">
                <div class="amount-label">Amount</div>
                <div class="amount-value">₹<?php echo number_format($amount, 2); ?></div>
            </div>
        </div>

        <!-- Payment Methods Tabs -->
        <div class="payment-methods">
            <div class="method-tab active" data-method="card">
                <span style="font-size: 18px;">💳</span>
                <span>Card</span>
            </div>
            <div class="method-tab" data-method="upi">
                <span style="font-size: 18px;">📱</span>
                <span>UPI</span>
            </div>
            <div class="method-tab" data-method="netbanking">
                <span style="font-size: 18px;">🏦</span>
                <span>Netbanking</span>
            </div>
            <div class="method-tab" data-method="wallet">
                <span style="font-size: 18px;">👛</span>
                <span>Wallet</span>
            </div>
        </div>

        <!-- Card Section -->
        <div class="card-form" id="cardSection">
            <!-- Card Preview -->
            <div class="card-preview">
                <div class="card-brand" id="cardBrand">VISA</div>
                <div class="card-chip"></div>
                <div class="card-number-display" id="cardNumberDisplay">•••• •••• •••• ••••</div>
                <div class="card-details-row">
                    <div>
                        <div class="card-detail-label">Card Holder</div>
                        <div class="card-detail-value" id="cardHolderDisplay"><?php echo strtoupper($name); ?></div>
                    </div>
                    <div>
                        <div class="card-detail-label">Expires</div>
                        <div class="card-detail-value" id="expiryDisplay">MM/YY</div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="form-label">Card Number</label>
                <input type="text" class="form-input" id="cardNumber" placeholder="1234 5678 9012 3456" maxlength="19">
            </div>

            <div class="form-group">
                <label class="form-label">Card Holder Name</label>
                <input type="text" class="form-input" id="cardHolder" placeholder="John Doe" value="<?php echo $name; ?>">
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label class="form-label">Expiry Date</label>
                    <input type="text" class="form-input" id="expiry" placeholder="MM/YY" maxlength="5">
                </div>
                <div class="form-group">
                    <label class="form-label">CVV</label>
                    <input type="password" class="form-input" id="cvv" placeholder="•••" maxlength="4">
                </div>
            </div>
        </div>

        <!-- UPI Section -->
        <div class="upi-section" id="upiSection">
            <div class="upi-apps">
                <div class="upi-app" data-app="gpay">
                    <div class="upi-app-icon gpay-icon">G</div>
                    <div class="upi-app-name">Google Pay</div>
                </div>
                <div class="upi-app" data-app="phonepe">
                    <div class="upi-app-icon phonepe-icon">P</div>
                    <div class="upi-app-name">PhonePe</div>
                </div>
                <div class="upi-app" data-app="paytm">
                    <div class="upi-app-icon paytm-icon">₹</div>
                    <div class="upi-app-name">Paytm</div>
                </div>
                <div class="upi-app" data-app="bhim">
                    <div class="upi-app-icon bhim-icon">B</div>
                    <div class="upi-app-name">BHIM</div>
                </div>
            </div>

            <div class="upi-divider">OR</div>

            <div class="form-group">
                <label class="form-label">Enter UPI ID</label>
                <input type="text" class="form-input" id="upiId" placeholder="yourname@upi">
            </div>
        </div>

        <!-- Netbanking Section -->
        <div class="netbanking-section" id="netbankingSection">
            <div class="bank-grid">
                <div class="bank-option" data-bank="hdfc">
                    <div class="bank-logo hdfc-logo">HDFC</div>
                    <div class="bank-name">HDFC Bank</div>
                </div>
                <div class="bank-option" data-bank="icici">
                    <div class="bank-logo icici-logo">ICICI</div>
                    <div class="bank-name">ICICI Bank</div>
                </div>
                <div class="bank-option" data-bank="sbi">
                    <div class="bank-logo sbi-logo">SBI</div>
                    <div class="bank-name">State Bank</div>
                </div>
                <div class="bank-option" data-bank="axis">
                    <div class="bank-logo axis-logo">AXIS</div>
                    <div class="bank-name">Axis Bank</div>
                </div>
                <div class="bank-option" data-bank="kotak">
                    <div class="bank-logo kotak-logo">KTK</div>
                    <div class="bank-name">Kotak Bank</div>
                </div>
                <div class="bank-option" data-bank="bob">
                    <div class="bank-logo bob-logo">BOB</div>
                    <div class="bank-name">Bank of Baroda</div>
                </div>
            </div>
        </div>

        <!-- Security Badges -->
        <div class="security-badges">
            <div class="security-badge">
                <span class="security-icon">🔒</span>
                <span>256-bit SSL</span>
            </div>
            <div class="security-badge">
                <span class="security-icon">🛡️</span>
                <span>PCI DSS</span>
            </div>
            <div class="security-badge">
                <span class="security-icon">✓</span>
                <span>Secure Payment</span>
            </div>
        </div>

        <!-- Pay Button -->
        <button class="pay-button" id="payButton">
            Pay ₹<?php echo number_format($amount, 2); ?>
        </button>

        <!-- Footer -->
        <div class="modal-footer">
            <span class="secured-by">Secured by</span>
            <span class="razorpay-brand">Razorpay</span>
        </div>

        <a href="index.php" class="cancel-link">Cancel and return to merchant</a>
    </div>

    <script>
        // Store data from PHP
        const paymentData = {
            amount: <?php echo $amount; ?>,
            name: "<?php echo addslashes($name); ?>",
            classSection: "<?php echo addslashes($classSection); ?>",
            rollNumber: "<?php echo addslashes($rollNumber); ?>",
            email: "<?php echo addslashes($email); ?>",
            phone: "<?php echo addslashes($phone); ?>",
            orderId: "<?php echo addslashes($orderId); ?>"
        };

        // Method Tab Switching
        document.querySelectorAll('.method-tab').forEach(tab => {
            tab.addEventListener('click', function() {
                document.querySelectorAll('.method-tab').forEach(t => t.classList.remove('active'));
                this.classList.add('active');

                const method = this.dataset.method;
                
                // Hide all sections
                document.getElementById('cardSection').style.display = 'none';
                document.getElementById('upiSection').style.display = 'none';
                document.getElementById('netbankingSection').style.display = 'none';

                // Show selected section
                if (method === 'card') {
                    document.getElementById('cardSection').style.display = 'block';
                } else if (method === 'upi') {
                    document.getElementById('upiSection').style.display = 'block';
                } else if (method === 'netbanking') {
                    document.getElementById('netbankingSection').style.display = 'block';
                } else if (method === 'wallet') {
                    // For wallet, show a simple message in UPI section
                    document.getElementById('upiSection').style.display = 'block';
                }
            });
        });

        // Card Number Formatting & Display
        const cardNumberInput = document.getElementById('cardNumber');
        const cardNumberDisplay = document.getElementById('cardNumberDisplay');
        const cardBrand = document.getElementById('cardBrand');

        cardNumberInput.addEventListener('input', function(e) {
            let value = e.target.value.replace(/\s/g, '').replace(/\D/g, '');
            let formatted = value.match(/.{1,4}/g)?.join(' ') || '';
            e.target.value = formatted;

            // Update display
            let display = value.padEnd(16, '•');
            display = display.match(/.{1,4}/g)?.join(' ') || '•••• •••• •••• ••••';
            cardNumberDisplay.textContent = display;

            // Detect card type
            if (value.startsWith('4')) {
                cardBrand.textContent = 'VISA';
            } else if (value.startsWith('5')) {
                cardBrand.textContent = 'MC';
            } else if (value.startsWith('3')) {
                cardBrand.textContent = 'AMEX';
            } else if (value.startsWith('6')) {
                cardBrand.textContent = 'RuPay';
            } else {
                cardBrand.textContent = 'VISA';
            }
        });

        // Card Holder Display
        document.getElementById('cardHolder').addEventListener('input', function(e) {
            document.getElementById('cardHolderDisplay').textContent = e.target.value.toUpperCase() || 'YOUR NAME';
        });

        // Expiry Formatting
        document.getElementById('expiry').addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, '');
            if (value.length >= 2) {
                value = value.substring(0, 2) + '/' + value.substring(2);
            }
            e.target.value = value;
            document.getElementById('expiryDisplay').textContent = value || 'MM/YY';
        });

        // UPI App Selection
        document.querySelectorAll('.upi-app').forEach(app => {
            app.addEventListener('click', function() {
                document.querySelectorAll('.upi-app').forEach(a => a.classList.remove('selected'));
                this.classList.add('selected');
            });
        });

        // Bank Selection
        document.querySelectorAll('.bank-option').forEach(bank => {
            bank.addEventListener('click', function() {
                document.querySelectorAll('.bank-option').forEach(b => b.classList.remove('selected'));
                this.classList.add('selected');
            });
        });

        // Pay Button
        document.getElementById('payButton').addEventListener('click', function() {
            const processingOverlay = document.getElementById('processingOverlay');
            processingOverlay.classList.add('active');

            // Simulate payment processing
            setTimeout(() => {
                // Generate mock payment details
                const paymentId = 'pay_demo_' + Math.random().toString(36).substr(2, 14);
                const signature = 'sig_demo_' + Math.random().toString(36).substr(2, 20);

                // Redirect to verify payment
                window.location.href = 'verify_payment.php?' +
                    'payment_id=' + paymentId +
                    '&order_id=' + paymentData.orderId +
                    '&signature=' + signature +
                    '&name=' + encodeURIComponent(paymentData.name) +
                    '&classSection=' + encodeURIComponent(paymentData.classSection) +
                    '&rollNumber=' + encodeURIComponent(paymentData.rollNumber) +
                    '&amount=' + paymentData.amount;
            }, 3000); // 3 second delay to simulate processing
        });
    </script>
</body>
</html>
