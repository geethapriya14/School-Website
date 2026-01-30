<?php
// Include templates
require_once __DIR__ . '/templates/header.php';
require_once __DIR__ . '/templates/navigation.php';
?>
<style>

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

.feedback-section {
    padding: 80px 0;
    background: white;
}

.feedback-container {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 50px;
    margin-top: 40px;
}

@media (max-width: 992px) {
    .feedback-container {
        grid-template-columns: 1fr;
    }
}

/* Form Styles */
#feedbackForm {
    background: #f8f9fa;
    padding: 40px;
    border-radius: 10px;
    box-shadow: 0 3px 10px rgba(0,0,0,0.1);
}

.form-group {
    margin-bottom: 25px;
}

.form-group label {
    display: block;
    margin-bottom: 8px;
    color: #2c3e50;
    font-weight: 500;
}

.form-group input[type="text"],
.form-group input[type="email"],
.form-group select,
.form-group textarea {
    width: 100%;
    padding: 12px 15px;
    border: 1px solid #ddd;
    border-radius: 5px;
    font-size: 16px;
    transition: border-color 0.3s ease;
}

.form-group input:focus,
.form-group select:focus,
.form-group textarea:focus {
    border-color: #3498db;
    outline: none;
}

/* Star Rating */
.star-rating {
    display: flex;
    flex-direction: row-reverse;
    justify-content: flex-end;
    margin-top: 10px;
}

.star-rating input {
    display: none;
}

.star-rating label {
    font-size: 30px;
    color: #ddd;
    cursor: pointer;
    padding: 0 5px;
    transition: color 0.3s ease;
}

.star-rating input:checked ~ label,
.star-rating label:hover,
.star-rating label:hover ~ label {
    color: #ffc107;
}

/* File Upload */
.form-group input[type="file"] {
    width: 100%;
    padding: 10px;
    border: 2px dashed #ddd;
    border-radius: 5px;
    background: white;
    cursor: pointer;
}

.form-group input[type="checkbox"] {
    margin-right: 10px;
    width: auto;
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

/* Feedback Info */
.feedback-info {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    padding: 40px;
    border-radius: 10px;
}

.feedback-info h3 {
    font-size: 24px;
    margin-bottom: 25px;
    color: white;
}

.feedback-info ul {
    list-style: none;
    padding: 0;
    margin: 0 0 30px 0;
}

.feedback-info li {
    padding: 10px 0;
    padding-left: 30px;
    position: relative;
    font-size: 16px;
    line-height: 1.5;
}

.feedback-info li::before {
    content: '✓';
    position: absolute;
    left: 0;
    color: #ffc107;
    font-weight: bold;
    font-size: 18px;
}

.note {
    background: rgba(255,255,255,0.1);
    padding: 20px;
    border-radius: 5px;
    border-left: 4px solid #ffc107;
}

.note p {
    margin: 0;
    font-size: 14px;
    line-height: 1.5;
}

/* Responsive Design */
@media (max-width: 768px) {
    
    #feedbackForm {
        padding: 20px;
    }
    
    .feedback-info {
        padding: 20px;
    }
}

@media (max-width: 480px) {
    .container {
        padding: 0 10px;
    }
    
    .section-title {
        font-size: 24px;
    }
    
    .btn {
        padding: 12px 30px;
        width: 100%;
    }
    
    .star-rating label {
        font-size: 24px;
        padding: 0 3px;
    }
}
</style>

<main id="main-content">
    <!-- Feedback Form Section -->
    <section class="feedback-section">
        <div class="container">
            <h2 class="section-title">Share Your Experience</h2>
            
            <div class="feedback-container">
                <form id="feedbackForm" action="submit-feedback.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="feedback_name">Your Name *</label>
                        <input type="text" id="feedback_name" name="name" required placeholder="Enter your full name">
                    </div>
                    
                    <div class="form-group">
                        <label for="feedback_relation">Your Relation *</label>
                        <select id="feedback_relation" name="relation" required>
                            <option value="">Select Relationship</option>
                            <option value="parent">Parent</option>
                            <option value="student">Student</option>
                            <option value="alumni">Alumni</option>
                            <option value="teacher">Teacher</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="feedback_rating">Rating *</label>
                        <div class="star-rating">
                            <input type="radio" id="star5" name="rating" value="5">
                            <label for="star5" title="5 stars">★</label>
                            <input type="radio" id="star4" name="rating" value="4">
                            <label for="star4" title="4 stars">★</label>
                            <input type="radio" id="star3" name="rating" value="3">
                            <label for="star3" title="3 stars">★</label>
                            <input type="radio" id="star2" name="rating" value="2">
                            <label for="star2" title="2 stars">★</label>
                            <input type="radio" id="star1" name="rating" value="1">
                            <label for="star1" title="1 star">★</label>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="feedback_message">Your Feedback *</label>
                        <textarea id="feedback_message" name="message" rows="5" required 
                                  placeholder="Share your experience with Evaans School..."></textarea>
                    </div>
                    
                    <div class="form-group">
                        <label for="feedback_photo">Upload Photo (Optional)</label>
                        <input type="file" id="feedback_photo" name="photo" accept="image/*">
                    </div>
                    
                    <div class="form-group">
                        <input type="checkbox" id="feedback_consent" name="consent" required>
                        <label for="feedback_consent">I consent to having this feedback published on the website *</label>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Submit Feedback</button>
                </form>
                
                <div class="feedback-info">
                    <h3>Why Share Feedback?</h3>
                    <ul>
                        <li>Help other parents make informed decisions</li>
                        <li>Contribute to our continuous improvement</li>
                        <li>Celebrate our school community's achievements</li>
                        <li>Share suggestions for enhancement</li>
                    </ul>
                    
                    <div class="note">
                        <p><strong>Note:</strong> All feedback is moderated before publication. We respect your privacy and will never share your contact information.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<!--footer>
<?php
require_once __DIR__ . '/templates/footer.php';
?>