<?php
$page_title = "Testimonials";
$page_description = "What parents and students say about Evaans School";
require_once 'templates/config.php';
require_once 'templates/functions.php';

$testimonials = get_testimonials();
?>

<?php include 'templates/header.php'; ?>
<?php include 'templates/navigation.php'; ?>

<main id="main-content">
    <section class="page-header">
        <div class="container">
            <h1>Testimonials</h1>
            <p>Hear from our school community</p>
        </div>
    </section>

    <section class="testimonials-showcase">
        <div class="container">
            <h2 class="section-title">What People Say</h2>
            
            <div class="testimonials-grid">
                <?php foreach($testimonials as $testimonial): ?>
                <div class="testimonial-card">
                    <div class="testimonial-rating">
                        <?php for($i = 0; $i < $testimonial['rating']; $i++): ?>
                            <i class="fas fa-star"></i>
                        <?php endfor; ?>
                    </div>
                    <p class="testimonial-text">"<?php echo $testimonial['content']; ?>"</p>
                    <div class="testimonial-author">
                        <strong><?php echo $testimonial['name']; ?></strong>
                        <span>Parent</span>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Feedback Form Section -->
    <section class="feedback-section">
        <div class="container">
            <h2 class="section-title">Share Your Experience</h2>
            
            <div class="feedback-container">
                <form id="feedbackForm" action="submit-feedback.php" method="POST">
                    <div class="form-group">
                        <label for="feedback_name">Your Name *</label>
                        <input type="text" id="feedback_name" name="name" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="feedback_relation">Your Relation *</label>
                        <select id="feedback_relation" name="relation" required>
                            <option value="">Select</option>
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
                            <label for="star5">★</label>
                            <input type="radio" id="star4" name="rating" value="4">
                            <label for="star4">★</label>
                            <input type="radio" id="star3" name="rating" value="3">
                            <label for="star3">★</label>
                            <input type="radio" id="star2" name="rating" value="2">
                            <label for="star2">★</label>
                            <input type="radio" id="star1" name="rating" value="1">
                            <label for="star1">★</label>
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

<?php include 'templates/footer.php'; ?>