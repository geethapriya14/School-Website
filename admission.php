<?php
// Include templates
require_once __DIR__ . '/templates/header.php';
require_once __DIR__ . '/templates/navigation.php';
?>

<style>
.page-header {
    background: linear-gradient(to right, #2c3e50, #3498db);
    color: white;
    padding: 80px 0 40px;
    text-align: center;
}

.page-header h1 {
    font-size: 42px;
    margin-bottom: 10px;
    font-weight: 700;
}

.page-header p {
    font-size: 18px;
    opacity: 0.9;
}

.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 15px;
}

.section-title {
    text-align: center;
    font-size: 32px;
    color: #2c3e50;
    margin-bottom: 40px;
    position: relative;
}

.section-title::after {
    content: '';
    position: absolute;
    bottom: -15px;
    left: 50%;
    transform: translateX(-50%);
    width: 80px;
    height: 4px;
    background: #3498db;
    border-radius: 2px;
}

.admission-process {
    padding: 60px 0;
    background: #f8f9fa;
}

.process-steps {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 20px;
    margin-top: 40px;
}

.step {
    background: white;
    border-radius: 10px;
    padding: 30px 20px;
    text-align: center;
    width: 240px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    transition: transform 0.3s ease;
}

.step:hover {
    transform: translateY(-5px);
}

.step-number {
    width: 50px;
    height: 50px;
    background: #3498db;
    color: white;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 24px;
    font-weight: bold;
    margin: 0 auto 20px;
}

.step h3 {
    color: #2c3e50;
    font-size: 20px;
    margin-bottom: 10px;
}

.step p {
    color: #666;
    font-size: 14px;
    line-height: 1.5;
}

.admission-form-section {
    padding: 80px 0;
}

.form-container {
    background: white;
    border-radius: 10px;
    padding: 40px;
    box-shadow: 0 5px 20px rgba(0,0,0,0.1);
    max-width: 800px;
    margin: 0 auto;
}

.form-container h3 {
    color: #2c3e50;
    font-size: 22px;
    margin: 30px 0 20px;
    padding-bottom: 10px;
    border-bottom: 2px solid #f0f0f0;
}

.form-container h3:first-child {
    margin-top: 0;
}

.form-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 20px;
    margin-bottom: 20px;
}

@media (max-width: 768px) {
    .form-grid {
        grid-template-columns: 1fr;
    }
}

.form-group {
    margin-bottom: 20px;
}

.form-group label {
    display: block;
    margin-bottom: 8px;
    color: #333;
    font-weight: 500;
}

.form-group input[type="text"],
.form-group input[type="email"],
.form-group input[type="tel"],
.form-group input[type="date"],
.form-group input[type="number"] {
    width: 100%;
    padding: 12px 15px;
    border: 1px solid #ddd;
    border-radius: 5px;
    font-size: 16px;
    transition: border-color 0.3s ease;
}

.form-group input:focus {
    border-color: #3498db;
    outline: none;
}

.documents-list {
    list-style: none;
    padding: 0;
    margin: 15px 0;
    background: #f8f9fa;
    padding: 15px;
    border-radius: 5px;
}

.documents-list li {
    padding: 5px 0;
    padding-left: 25px;
    position: relative;
}

.documents-list li::before {
    content: '✓';
    position: absolute;
    left: 0;
    color: #3498db;
    font-weight: bold;
}

.form-group input[type="file"] {
    width: 100%;
    padding: 10px;
    border: 2px dashed #ddd;
    border-radius: 5px;
    background: #f8f9fa;
}

.form-group input[type="checkbox"] {
    margin-right: 10px;
}

.btn {
    display: inline-block;
    padding: 15px 40px;
    background: #3498db;
    color: white;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    font-weight: 600;
    cursor: pointer;
    transition: background 0.3s ease;
    text-decoration: none;
    text-align: center;
}

.btn-primary {
    background: #3498db;
}

.btn-primary:hover {
    background: #2980b9;
}

.btn-primary:active {
    transform: translateY(1px);
}

/* Responsive Design */
@media (max-width: 768px) {
    .page-header {
        padding: 60px 0 30px;
    }
    
    .page-header h1 {
        font-size: 32px;
    }
    
    .page-header p {
        font-size: 16px;
    }
    
    .section-title {
        font-size: 28px;
    }
    
    .process-steps {
        flex-direction: column;
        align-items: center;
    }
    
    .step {
        width: 100%;
        max-width: 300px;
    }
    
    .form-container {
        padding: 20px;
    }
}

@media (max-width: 480px) {
    .container {
        padding: 0 10px;
    }
    
    .page-header h1 {
        font-size: 28px;
    }
    
    .section-title {
        font-size: 24px;
    }
    
    .step {
        padding: 20px 15px;
    }
    
    .btn {
        padding: 12px 30px;
        width: 100%;
    }
}
</style>

<main id="main-content">
    <section class="page-header">
        <div class="container">
            <h1>Admissions</h1>
            <p>Join our community of learners</p>
        </div>
    </section>

    <section class="admission-process">
        <div class="container">
            <h2 class="section-title">Admission Process</h2>
            <div class="process-steps">
                <div class="step">
                    <div class="step-number">1</div>
                    <h3>Inquiry</h3>
                    <p>Submit an inquiry form or visit campus</p>
                </div>
                <div class="step">
                    <div class="step-number">2</div>
                    <h3>Assessment</h3>
                    <p>Student interaction and assessment</p>
                </div>
                <div class="step">
                    <div class="step-number">3</div>
                    <h3>Documentation</h3>
                    <p>Submit required documents</p>
                </div>
                <div class="step">
                    <div class="step-number">4</div>
                    <h3>Confirmation</h3>
                    <p>Receive admission confirmation</p>
                </div>
            </div>
        </div>
    </section>

    <section class="admission-form-section" id="apply">
        <div class="container">
            <h2 class="section-title">Admission Application</h2>
            
            <div class="form-container">
                <form id="admissionForm" action="submit-admission.php" method="POST" enctype="multipart/form-data">
                    <h3>Student Information</h3>
                    <div class="form-grid">
                        <div class="form-group">
                            <label for="student_name">Student Full Name *</label>
                            <input type="text" id="student_name" name="student_name" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="dob">Date of Birth *</label>
                            <input type="date" id="dob" name="dob" required>
                        </div>
                    </div>
                    
                    <h3>Parent/Guardian Information</h3>
                    <div class="form-grid">
                        <div class="form-group">
                            <label for="parent_name">Parent Name *</label>
                            <input type="text" id="parent_name" name="parent_name" required>
                        </div>
                        <div class="form-group">
                            <label for="phone-number">Phone Number *</label>
                            <input type="tel" id="phone-number" name="phone-number" pattern="[0-9]{10}" required>
                        </div>
                    </div>
                    
                    <div class="form-grid">
                        <div class="form-group">
                            <label for="parent_email">Parent Email *</label>
                            <input type="email" id="parent_email" name="parent_email" required>
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" id="address" name="address">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="documents">Required Documents</label>
                        <ul class="documents-list">
                            <li>Birth Certificate</li>
                            <li>Previous School Report Card</li>
                            <li>Passport-size Photographs (2)</li>
                            <li>Aadhaar Card Copy</li>
                        </ul>
                        <input type="file" id="documents" name="documents[]" multiple accept=".pdf,.jpg,.jpeg,.png">
                    </div>
                    
                    <div class="form-group">
                        <input type="checkbox" id="terms" name="terms" required>
                        <label for="terms">I agree to the terms and conditions *</label>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Submit Application</button>
                </form>
            </div>
        </div>
    </section>
</main>
<?php
require_once __DIR__ . '/templates/footer.php';
?>