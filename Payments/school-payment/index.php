<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evans School | Fee Payment Portal</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .main-container {
            width: 100%;
            max-width: 500px;
        }

        /* Test Mode Banner */
        .test-mode-banner {
            background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
            color: white;
            padding: 12px 20px;
            border-radius: 12px;
            margin-bottom: 20px;
            text-align: center;
            box-shadow: 0 4px 15px rgba(245, 158, 11, 0.4);
        }

        .test-mode-banner strong {
            display: block;
            font-size: 14px;
            margin-bottom: 4px;
        }

        .test-mode-banner small {
            font-size: 11px;
            opacity: 0.9;
        }

        /* Configuration Error Banner */
        .config-error-banner {
            background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
            color: white;
            padding: 16px 20px;
            border-radius: 12px;
            margin-bottom: 20px;
            text-align: center;
            box-shadow: 0 4px 15px rgba(239, 68, 68, 0.4);
        }

        .config-error-banner strong {
            display: block;
            font-size: 14px;
            margin-bottom: 8px;
        }

        .config-error-banner ul {
            text-align: left;
            font-size: 12px;
            margin: 10px 0;
            padding-left: 20px;
        }

        /* School Logo/Header */
        .school-header {
            text-align: center;
            margin-bottom: 30px;
            color: white;
        }

        .school-logo {
            width: 80px;
            height: 80px;
            background: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 16px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.2);
            overflow: hidden;
        }

        .school-logo img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .school-name {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 8px;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        }

        .school-tagline {
            font-size: 14px;
            opacity: 0.9;
        }

        /* Payment Card */
        .payment-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 25px 80px rgba(0, 0, 0, 0.25);
            overflow: hidden;
        }

        .card-header {
            background: linear-gradient(135deg, #2b6cb0 0%, #3182ce 100%);
            padding: 24px 30px;
            color: white;
        }

        .card-header h2 {
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 4px;
        }

        .card-header p {
            font-size: 13px;
            opacity: 0.9;
        }

        .card-body {
            padding: 30px;
        }

        /* Form Styles */
        .form-group {
            margin-bottom: 24px;
        }

        .form-label {
            display: block;
            font-size: 13px;
            font-weight: 600;
            color: #374151;
            margin-bottom: 8px;
        }

        .form-label span {
            color: #e53e3e;
        }

        .input-wrapper {
            position: relative;
        }

        .form-input {
            width: 100%;
            padding: 16px;
            border: 2px solid #e5e7eb;
            border-radius: 12px;
            font-size: 15px;
            font-family: inherit;
            transition: all 0.3s;
            background: #f9fafb;
        }

        .form-input:focus {
            outline: none;
            border-color: #667eea;
            background: white;
            box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1);
        }

        .form-input::placeholder {
            color: #9ca3af;
        }

        /* Amount Input Special Styling */
        .amount-input-group {
            position: relative;
        }

        .currency-symbol {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 18px;
            font-weight: 600;
            color: #374151;
        }

        .amount-input {
            padding-left: 40px !important;
            font-size: 24px !important;
            font-weight: 600;
            letter-spacing: 1px;
        }

        /* Quick Amount Buttons */
        .quick-amounts {
            display: flex;
            gap: 10px;
            margin-top: 12px;
            flex-wrap: wrap;
        }

        .quick-amount-btn {
            padding: 8px 16px;
            background: #f3f4f6;
            border: 2px solid #e5e7eb;
            border-radius: 20px;
            font-size: 13px;
            font-weight: 500;
            color: #4b5563;
            cursor: pointer;
            transition: all 0.2s;
            font-family: inherit;
        }

        .quick-amount-btn:hover {
            border-color: #667eea;
            background: #eff6ff;
            color: #667eea;
        }

        /* Pay Button */
        .pay-button {
            width: 100%;
            padding: 18px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 17px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            font-family: inherit;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            box-shadow: 0 8px 30px rgba(102, 126, 234, 0.4);
        }

        .pay-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 40px rgba(102, 126, 234, 0.5);
        }

        .pay-button:disabled {
            background: #9ca3af;
            cursor: not-allowed;
            transform: none;
            box-shadow: none;
        }

        .pay-button-icon {
            font-size: 20px;
        }

        /* Loading State */
        .loading-spinner {
            width: 20px;
            height: 20px;
            border: 3px solid rgba(255, 255, 255, 0.3);
            border-top-color: white;
            border-radius: 50%;
            animation: spin 1s linear infinite;
            display: none;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        .pay-button.loading .loading-spinner {
            display: block;
        }

        .pay-button.loading .btn-text {
            display: none;
        }

        /* Security Footer */
        .security-footer {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 20px;
            padding: 20px;
            background: #f9fafb;
            border-top: 1px solid #e5e7eb;
        }

        .security-item {
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: 12px;
            color: #6b7280;
        }

        .security-icon {
            font-size: 16px;
        }

        /* Powered By */
        .powered-by {
            text-align: center;
            margin-top: 20px;
            color: rgba(255, 255, 255, 0.8);
            font-size: 13px;
        }

        .powered-by a {
            color: white;
            text-decoration: none;
            font-weight: 600;
        }

        

        /* Responsive */
        @media (max-width: 480px) {
            .card-body {
                padding: 24px 20px;
            }

            .school-name {
                font-size: 24px;
            }

            .quick-amounts {
                justify-content: center;
            }
        }
    </style>
</head>
<body>

<?php
    require_once(__DIR__ . '/config.php');
    $csrfToken = generateCSRFToken();
?>

<div class="main-container">
    
    <?php if (!$isConfigValid): ?>
    <!-- Configuration Error Banner -->
    <div class="config-error-banner">
        <strong>⚠️ Configuration Required</strong>
        <small>Please configure your Razorpay API keys in the .env file</small>
        <?php if (DEBUG_MODE): ?>
        <ul>
            <?php foreach ($configErrors as $err): ?>
            <li><?php echo htmlspecialchars($err); ?></li>
            <?php endforeach; ?>
        </ul>
        <?php endif; ?>
    </div>
    <?php elseif (IS_TEST_MODE): ?>
    <!-- Test Mode Banner -->
    <div class="test-mode-banner">
        <strong>🧪 TEST MODE ACTIVE</strong>
        <small>Use Razorpay test cards for payment testing. No real money will be charged.</small>
    </div>
    <?php endif; ?>
    
    <!-- School Header -->
    <div class="school-header">
        <div class="school-logo"><img src="school-logo.png" alt="Evaans School Logo"></div>
        <h1 class="school-name">Evans School</h1>
        <p class="school-tagline">Excellence in Education Since 1995</p>
    </div>

    <!-- Payment Card -->
    <div class="payment-card">
        <div class="card-header">
            <h2>💳 Student Fee Payment</h2>
            <p>Secure online payment portal</p>
        </div>

        <div class="card-body">
            <form id="paymentForm">
                <!-- Student Name -->
                <div class="form-group">
                    <label class="form-label">Student Name <span>*</span></label>
                    <div class="input-wrapper">
                        <input type="text" class="form-input" id="name" name="name" placeholder="Enter student name" required>
                    </div>
                </div>

                <!-- Class and Section -->
                <div class="form-group">
                    <label class="form-label">Class & Section <span>*</span></label>
                    <div class="input-wrapper">
                        <input type="text" class="form-input" id="classSection" name="classSection" placeholder="e.g., 10th - A" required>
                    </div>
                </div>

                <!-- Roll Number -->
                <div class="form-group">
                    <label class="form-label">Roll Number <span>*</span></label>
                    <div class="input-wrapper">
                        <input type="text" class="form-input" id="rollNumber" name="rollNumber" placeholder="Enter roll number" required>
                    </div>
                </div>

                <!-- Email -->
                <div class="form-group">
                    <label class="form-label">Email Address <span>*</span></label>
                    <div class="input-wrapper">
                        <input type="email" class="form-input" id="email" name="email" placeholder="student@email.com" required>
                    </div>
                </div>

                <!-- Phone -->
                <div class="form-group">
                    <label class="form-label">Mobile Number <span>*</span></label>
                    <div class="input-wrapper">
                        <input type="tel" class="form-input" id="phone" name="phone" placeholder="10-digit mobile number" pattern="[0-9]{10}" required>
                    </div>
                </div>

                <!-- Amount -->
                <div class="form-group">
                    <label class="form-label">Fee Amount (INR) <span>*</span></label>
                    <div class="input-wrapper amount-input-group">
                        <span class="currency-symbol">₹</span>
                        <input type="number" class="form-input amount-input" id="amount" name="amount" placeholder="0" min="1" required>
                    </div>
                    <div class="quick-amounts">
                        <button type="button" class="quick-amount-btn" data-amount="5000">₹5,000</button>
                        <button type="button" class="quick-amount-btn" data-amount="10000">₹10,000</button>
                        <button type="button" class="quick-amount-btn" data-amount="25000">₹25,000</button>
                        <button type="button" class="quick-amount-btn" data-amount="50000">₹50,000</button>
                    </div>
                </div>

                <!-- Pay Button -->
                <button type="button" id="payButton" class="pay-button">
                    <span class="pay-button-icon">🔒</span>
                    <span class="btn-text">Pay Securely</span>
                    <div class="loading-spinner"></div>
                </button>
            </form>
        </div>

        <!-- Security Footer -->
        <div class="security-footer">
            <div class="security-item">
                <span class="security-icon">🔒</span>
                <span>256-bit SSL</span>
            </div>
            <div class="security-item">
                <span class="security-icon">🛡️</span>
                <span>PCI Compliant</span>
            </div>
            <div class="security-item">
                <span class="security-icon">✓</span>
                <span>Secure Payments</span>
            </div>
        </div>
    </div>

    <!-- Powered By -->
    <div class="powered-by">
        Powered by <a href="#">Razorpay</a> | Trusted Payment Gateway
    </div>
</div>

<!-- Razorpay Checkout Script - Always loaded for real payment processing -->
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>

<script>
    // Configuration from PHP
    const isConfigValid = <?php echo $isConfigValid ? 'true' : 'false'; ?>;
    const isTestMode = <?php echo IS_TEST_MODE ? 'true' : 'false'; ?>;
    const csrfToken = '<?php echo $csrfToken; ?>';

    // Quick Amount Buttons
    document.querySelectorAll('.quick-amount-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            document.getElementById('amount').value = this.dataset.amount;
        });
    });

    // Pay Button Handler
    document.getElementById('payButton').onclick = async function(e) {
        e.preventDefault();

        // Check configuration
        if (!isConfigValid) {
            alert('Payment system is not configured. Please contact the administrator.');
            return;
        }

        const form = document.getElementById('paymentForm');
        
        // Validate form
        if (!form.checkValidity()) {
            form.reportValidity();
            return;
        }

        // Get form values
        const name = document.getElementById('name').value.trim();
        const classSection = document.getElementById('classSection').value.trim();
        const rollNumber = document.getElementById('rollNumber').value.trim();
        const email = document.getElementById('email').value.trim();
        const phone = document.getElementById('phone').value.trim();
        const amount = parseFloat(document.getElementById('amount').value);

        // Client-side validation
        if (amount < 1) {
            alert('Amount must be at least ₹1');
            return;
        }

        if (!/^[6-9]\d{9}$/.test(phone)) {
            alert('Please enter a valid 10-digit mobile number starting with 6-9');
            return;
        }

        const payBtn = document.getElementById('payButton');
        payBtn.classList.add('loading');
        payBtn.disabled = true;

        try {
            // Create order on backend
            const response = await fetch('create_order.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    amount: amount,
                    name: name,
                    email: email,
                    phone: phone,
                    classSection: classSection,
                    rollNumber: rollNumber,
                    csrf_token: csrfToken
                })
            });

            const data = await response.json();

            if (data.error) {
                throw new Error(data.error);
            }

            if (!data.orderId) {
                throw new Error('Failed to create order. Please try again.');
            }

            // Open Razorpay Checkout
            const options = {
                "key": data.keyId,
                "amount": data.amount,
                "currency": data.currency || "INR",
                "name": "Evans School",
                "description": "Fee Payment for " + name,
                "image": "https://via.placeholder.com/150/667eea/ffffff?text=ES",
                "order_id": data.orderId,
                "handler": function (response) {
                    // Payment successful - redirect to verification
                    const params = new URLSearchParams({
                        razorpay_payment_id: response.razorpay_payment_id,
                        razorpay_order_id: response.razorpay_order_id,
                        razorpay_signature: response.razorpay_signature,
                        name: name,
                        classSection: classSection,
                        rollNumber: rollNumber,
                        amount: amount
                    });
                    window.location.href = "verify_payment.php?" + params.toString();
                },
                "prefill": {
                    "name": name,
                    "email": email,
                    "contact": phone
                },
                "notes": {
                    "student_name": name,
                    "class_section": classSection,
                    "roll_number": rollNumber,
                    "school": "Evans School"
                },
                "theme": {
                    "color": "#667eea"
                },
                "modal": {
                    "ondismiss": function() {
                        payBtn.classList.remove('loading');
                        payBtn.disabled = false;
                    }
                }
            };
            
            const rzp = new Razorpay(options);
            
            rzp.on('payment.failed', function (response) {
                console.error('Payment Failed:', response.error);
                alert("Payment Failed: " + response.error.description);
                payBtn.classList.remove('loading');
                payBtn.disabled = false;
            });
            
            rzp.open();

        } catch (error) {
            console.error('Error:', error);
            alert(error.message || 'Something went wrong. Please try again.');
            payBtn.classList.remove('loading');
            payBtn.disabled = false;
        }
    };
</script>

</body>
</html>
