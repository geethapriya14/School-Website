<?php
$page_title = "Admissions";
$page_description = "Admission process, requirements, and application for Evaans School";
require_once 'templates/config.php';
require_once 'templates/functions.php';
?>

<?php include 'templates/header.php'; ?>
<?php include 'templates/navigation.php'; ?>

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
                    <div class="form-group">
                            <label for="phone_number">Phone Number *</label>
                            <input type="number" id="phone_number" name="phone_number" required>
                        </div>
                    </div>
                    <h3>Parent/Guardian Information</h3>
                    <div class="form-grid">
                        <div class="form-group">
                            <label for="parent_name">Parent Name *</label>
                            <input type="text" id="parent_name" name="parent_name" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="parent_email">Parent Email *</label>
                            <input type="email" id="parent_email" name="parent_email" required>
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
                        <input type="file" id="documents" name="documents[]" multiple>
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

<?php include 'templates/footer.php'; ?>