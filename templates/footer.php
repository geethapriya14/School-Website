<footer class="main-footer">
    <div class="container">
        <div class="footer-grid">
            <!-- School Info -->
            <div class="footer-section">
                <h3><?php echo SITE_NAME; ?></h3>
                <p>For more information,reach us out using below information.</p>
                <div class="social-links">
                    <a href="#" aria-label="Facebook"><i class="fab fa-facebook"></i></a>
                    <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                    <a href="#" aria-label="YouTube"><i class="fab fa-youtube"></i></a>
                </div>
            </div>
            
            <!-- Quick Links -->
            <div class="footer-section">
                <h3>Quick Links</h3>
                <ul>
                    <li><a href="<?php echo SITE_URL; ?>/index.php">Home</a></li>
                    <li><a href="<?php echo SITE_URL; ?>/about.php">About Us</a></li>
                    <li><a href="<?php echo SITE_URL; ?>/admissions.php">Admissions</a></li>
                    <li><a href="<?php echo SITE_URL; ?>/gallery.php">Photo Gallery</a></li>
                    <li><a href="<?php echo SITE_URL; ?>/testimonials.php">Testimonials</a></li>
                </ul>
            </div>
            
            <!-- Contact Info -->
            <div class="footer-section">
                <h3>Contact Us</h3>
                <address>
                    <p><i class="fas fa-map-marker-alt"></i> No.18,Mariamman koil street,Tharamani,Chennai</p>
                    <p><i class="fas fa-phone"></i>044-22436604(or)044-29992126</p>
                    <p><i class="fas fa-envelope"></i> <?php echo SITE_EMAIL; ?></p>
                </address>
            </div>
            
            <!-- Newsletter -->
            <div class="footer-section">
                <h3>Newsletter</h3>
                <p>Subscribe for updates on events and admissions.</p>
                <form class="newsletter-form" id="newsletterForm">
                    <input type="email" placeholder="Your email" required>
                    <button type="submit" class="btn btn-secondary">Subscribe</button>
                </form>
            </div>
        </div>
        
        <div class="footer-bottom">
            <p>&copy; <?php echo date('Y'); ?> <?php echo SITE_NAME; ?>. All rights reserved.</p>
            <p><a href="/privacy-policy.php">Privacy Policy</a> | <a href="/terms.php">Terms of Service</a></p>
        </div>
    </div>
</footer>

<!-- JavaScript -->
<script src="<?php echo SITE_URL; ?>/assets/js/main.js"></script>
<script src="<?php echo SITE_URL; ?>/assets/js/form-validation.js"></script>
<?php if(basename($_SERVER['PHP_SELF']) == 'contact.php'): ?>
<script src="<?php echo SITE_URL; ?>/assets/js/chatbot.js"></script>
<?php endif; ?>

</body>
</html>