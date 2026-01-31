<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Fee Payment | Razorpay Test Mode</title>
    <style>
        :root {
            --primary-color: #528FF0;
            --secondary-color: #f5f7fa;
            --text-color: #2c3e50;
            --success-color: #10b981;
            --warning-color: #f59e0b;
            --error-color: #ef4444;
            --border-radius: 10px;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .container {
            width: 100%;
            max-width: 480px;
        }

        /* Test Mode Banner */
        .test-banner {
            background: linear-gradient(135deg, var(--warning-color) 0%, #d97706 100%);
            color: white;
            padding: 12px 20px;
            border-radius: var(--border-radius);
            margin-bottom: 20px;
            text-align: center;
            box-shadow: 0 4px 15px rgba(245, 158, 11, 0.4);
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.85; }
        }

        .test-banner strong {
            display: block;
            font-size: 15px;
            margin-bottom: 4px;
        }

        .test-banner small {
            font-size: 12px;
            opacity: 0.95;
        }

        /* Error Banner */
        .error-banner {
            background: linear-gradient(135deg, var(--error-color) 0%, #dc2626 100%);
            color: white;
            padding: 16px 20px;
            border-radius: var(--border-radius);
            margin-bottom: 20px;
            text-align: center;
        }

        .error-banner ul {
            text-align: left;
            margin: 10px 0 0 20px;
            font-size: 13px;
        }

        /* School Header */
        .school-header {
            text-align: center;
            margin-bottom: 25px;
            color: white;
        }

        .school-logo {
            width: 70px;
            height: 70px;
            background: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 12px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
            overflow: hidden;
        }

        .school-logo img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .school-name {
            font-size: 26px;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .school-tagline {
            font-size: 13px;
            opacity: 0.9;
        }

        /* Payment Card */
        .payment-card {
            background: white;
            border-radius: 16px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.2);
            overflow: hidden;
        }

        .card-header {
            background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%);
            padding: 20px 25px;
            color: white;
        }

        .card-header h2 {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 3px;
        }

        .card-header p {
            font-size: 13px;
            opacity: 0.9;
        }

        .card-body {
            padding: 25px;
        }

        /* Form Styles */
        .form-row {
            display: flex;
            gap: 15px;
        }

        .form-row .form-group {
            flex: 1;
        }

        .form-group {
            margin-bottom: 18px;
        }

        .form-label {
            display: block;
            font-size: 13px;
            font-weight: 600;
            color: var(--text-color);
            margin-bottom: 6px;
        }

        .form-label .required {
            color: var(--error-color);
        }

        .form-input {
            width: 100%;
            padding: 12px 14px;
            border: 2px solid #e5e7eb;
            border-radius: 8px;
            font-size: 14px;
            font-family: inherit;
            transition: all 0.2s;
            background: #f9fafb;
        }

        .form-input:focus {
            outline: none;
            border-color: var(--primary-color);
            background: white;
            box-shadow: 0 0 0 3px rgba(82, 143, 240, 0.15);
        }

        .form-input::placeholder {
            color: #9ca3af;
        }

        /* Amount Input */
        .amount-group {
            position: relative;
        }

        .currency-symbol {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 18px;
            font-weight: 600;
            color: var(--text-color);
        }

        .amount-input {
            padding-left: 35px !important;
            font-size: 20px !important;
            font-weight: 600;
        }

        /* Quick Amount Buttons */
        .quick-amounts {
            display: flex;
            gap: 8px;
            margin-top: 10px;
            flex-wrap: wrap;
        }

        .quick-btn {
            padding: 6px 12px;
            background: #f3f4f6;
            border: 1px solid #e5e7eb;
            border-radius: 15px;
            font-size: 12px;
            font-weight: 500;
            color: #4b5563;
            cursor: pointer;
            transition: all 0.2s;
        }

        .quick-btn:hover {
            border-color: var(--primary-color);
            background: #eff6ff;
            color: var(--primary-color);
        }

        /* Pay Button */
        .pay-button {
            width: 100%;
            padding: 15px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            margin-top: 10px;
        }

        .pay-button:hover:not(:disabled) {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
        }

        .pay-button:disabled {
            background: #9ca3af;
            cursor: not-allowed;
            transform: none;
        }

        .pay-button .spinner {
            width: 18px;
            height: 18px;
            border: 2px solid rgba(255,255,255,0.3);
            border-top-color: white;
            border-radius: 50%;
            animation: spin 0.8s linear infinite;
            display: none;
        }

        .pay-button.loading .spinner {
            display: block;
        }

        .pay-button.loading .btn-text {
            display: none;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        /* Security Footer */
        .security-footer {
            display: flex;
            justify-content: center;
            gap: 20px;
            padding: 15px;
            background: #f9fafb;
            border-top: 1px solid #e5e7eb;
            font-size: 11px;
            color: #6b7280;
        }

        .security-item {
            display: flex;
            align-items: center;
            gap: 4px;
        }

        /* Powered By */
        .powered-by {
            text-align: center;
            margin-top: 20px;
            color: rgba(255, 255, 255, 0.85);
            font-size: 12px;
        }

        .powered-by a {
            color: white;
            text-decoration: none;
            font-weight: 600;
        }

        /* Test Card Info */
        .test-info {
            background: #fef3c7;
            border: 1px solid #fcd34d;
            border-radius: 8px;
            padding: 12px;
            margin-top: 15px;
            font-size: 11px;
            color: #92400e;
        }

        .test-info strong {
            display: block;
            margin-bottom: 5px;
            font-size: 12px;
        }

        .test-info code {
            background: #fef9c3;
            padding: 2px 5px;
            border-radius: 3px;
            font-family: monospace;
        }
    </style>
</head>
<body>

<?php
require_once(__DIR__ . '/config.php');
$csrfToken = generateCSRFToken();
?>

<div class="container">
    
    <?php if (!$isConfigValid): ?>
    <!-- Configuration Error -->
    <div class="error-banner">
        <strong>⚠️ Configuration Required</strong>
        <p>Please configure your Razorpay API keys in the .env file</p>
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
    <div class="test-banner">
        <strong>🧪 TEST MODE ACTIVE</strong>
        <small>Use Razorpay test cards. No real money will be charged.</small>
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
                    <label class="form-label">Student Name <span class="required">*</span></label>
                    <input type="text" class="form-input" id="name" name="name" placeholder="Enter student full name" required>
                </div>

                <!-- Class & Section and Roll Number in same row -->
                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">Class & Section <span class="required">*</span></label>
                        <input type="text" class="form-input" id="classSection" name="classSection" placeholder="e.g., 10th - A" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Roll Number <span class="required">*</span></label>
                        <input type="text" class="form-input" id="rollNumber" name="rollNumber" placeholder="e.g., 25" required>
                    </div>
                </div>

                <!-- Email -->
                <div class="form-group">
                    <label class="form-label">Email Address <span class="required">*</span></label>
                    <input type="email" class="form-input" id="email" name="email" placeholder="student@email.com" required>
                </div>

                <!-- Phone -->
                <div class="form-group">
                    <label class="form-label">Mobile Number <span class="required">*</span></label>
                    <input type="tel" class="form-input" id="phone" name="phone" placeholder="10-digit mobile number" pattern="[0-9]{10}" required>
                </div>

                <!-- Amount -->
                <div class="form-group">
                    <label class="form-label">Fee Amount (INR) <span class="required">*</span></label>
                    <div class="amount-group">
                        <span class="currency-symbol">₹</span>
                        <input type="number" class="form-input amount-input" id="amount" name="amount" placeholder="0" min="1" required>
                    </div>
                    <div class="quick-amounts">
                        <button type="button" class="quick-btn" data-amount="5000">₹5,000</button>
                        <button type="button" class="quick-btn" data-amount="10000">₹10,000</button>
                        <button type="button" class="quick-btn" data-amount="25000">₹25,000</button>
                        <button type="button" class="quick-btn" data-amount="50000">₹50,000</button>
                    </div>
                </div>

                <!-- Pay Button -->
                <button type="button" id="payButton" class="pay-button" <?php echo !$isConfigValid ? 'disabled' : ''; ?>>
                    <span class="btn-text">🔒 Pay Securely</span>
                    <div class="spinner"></div>
                </button>

                <?php if (IS_TEST_MODE): ?>
                <!-- Test Card Info -->
                <div class="test-info">
                    <strong>📋 Test Card Details:</strong>
                    Card: <code>4111 1111 1111 1111</code> | 
                    Expiry: <code>Any future date</code> | 
                    CVV: <code>Any 3 digits</code><br>
                    UPI: <code>success@razorpay</code>
                </div>
                <?php endif; ?>
            </form>
        </div>

        <!-- Security Footer -->
        <div class="security-footer">
            <div class="security-item">🔒 256-bit SSL</div>
            <div class="security-item">🛡️ PCI Compliant</div>
            <div class="security-item">✓ Secure</div>
        </div>
    </div>

    <!-- Powered By -->
    <div class="powered-by">
        Powered by <a href="https://razorpay.com" target="_blank">Razorpay</a> | Trusted Payment Gateway
    </div>
</div>

<!-- Razorpay Checkout Script -->
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>

<script>
// Configuration
const CONFIG = {
    isValid: <?php echo $isConfigValid ? 'true' : 'false'; ?>,
    isTestMode: <?php echo IS_TEST_MODE ? 'true' : 'false'; ?>,
    csrfToken: '<?php echo $csrfToken; ?>'
};

// Quick Amount Buttons
document.querySelectorAll('.quick-btn').forEach(btn => {
    btn.addEventListener('click', function(e) {
        e.preventDefault();
        document.getElementById('amount').value = this.dataset.amount;
    });
});

// Pay Button Click Handler
document.getElementById('payButton').addEventListener('click', async function(e) {
    e.preventDefault();
    
    // Check configuration
    if (!CONFIG.isValid) {
        alert('Payment system is not configured. Please contact administrator.');
        return;
    }
    
    const form = document.getElementById('paymentForm');
    
    // Validate form
    if (!form.checkValidity()) {
        form.reportValidity();
        return;
    }
    
    // Get form data
    const formData = {
        name: document.getElementById('name').value.trim(),
        classSection: document.getElementById('classSection').value.trim(),
        rollNumber: document.getElementById('rollNumber').value.trim(),
        email: document.getElementById('email').value.trim(),
        phone: document.getElementById('phone').value.trim(),
        amount: parseFloat(document.getElementById('amount').value)
    };
    
    // Validate phone
    if (!/^[6-9]\d{9}$/.test(formData.phone)) {
        alert('Please enter a valid 10-digit mobile number starting with 6, 7, 8, or 9');
        return;
    }
    
    // Validate amount
    if (formData.amount < 1) {
        alert('Amount must be at least ₹1');
        return;
    }
    
    const payBtn = this;
    payBtn.classList.add('loading');
    payBtn.disabled = true;
    
    try {
        // Step 1: Create Order on Server
        console.log('Creating order...');
        const response = await fetch('create_order.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({
                ...formData,
                csrf_token: CONFIG.csrfToken
            })
        });
        
        const orderData = await response.json();
        console.log('Order Response:', orderData);
        
        if (orderData.error) {
            throw new Error(orderData.error);
        }
        
        if (!orderData.orderId) {
            throw new Error('Failed to create order. Please try again.');
        }
        
        // Step 2: Open Razorpay Checkout
        console.log('Opening Razorpay Checkout...');
        const options = {
            key: orderData.keyId,
            amount: orderData.amount,
            currency: orderData.currency || 'INR',
            name: 'Evans School',
            description: 'Fee Payment - ' + formData.name,
            order_id: orderData.orderId,
            handler: function(response) {
                // Step 3: Verify Payment
                console.log('Payment Response:', response);
                const verifyParams = new URLSearchParams({
                    razorpay_payment_id: response.razorpay_payment_id,
                    razorpay_order_id: response.razorpay_order_id,
                    razorpay_signature: response.razorpay_signature,
                    name: formData.name,
                    classSection: formData.classSection,
                    rollNumber: formData.rollNumber,
                    amount: formData.amount
                });
                window.location.href = 'verify_payment.php?' + verifyParams.toString();
            },
            prefill: {
                name: formData.name,
                email: formData.email,
                contact: formData.phone
            },
            notes: {
                student_name: formData.name,
                class_section: formData.classSection,
                roll_number: formData.rollNumber
            },
            theme: {
                color: '#667eea'
            },
            modal: {
                ondismiss: function() {
                    console.log('Checkout dismissed');
                    payBtn.classList.remove('loading');
                    payBtn.disabled = false;
                }
            }
        };
        
        const rzp = new Razorpay(options);
        
        rzp.on('payment.failed', function(response) {
            console.error('Payment Failed:', response.error);
            alert('Payment Failed: ' + response.error.description);
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
});
</script>

</body>
</html>