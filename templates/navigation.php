<header class="main-header">
    <div class="container">
        <div class="header-content">
            <!-- Logo -->
            <div class="logo">
                <a href="<?php echo SITE_URL; ?>/index.php">
                    <img src="<?php echo SITE_URL; ?>/assets/images/logo4.png" alt="<?php echo SITE_NAME; ?> Logo">
                    <h1><?php echo SITE_NAME; ?></h1>
                </a>
            </div>
            
            <!-- Mobile Menu Toggle -->
            <button class="mobile-menu-toggle" aria-label="Toggle navigation">
                <span></span>
                <span></span>
                <span></span>
            </button>
            
            <!-- Main Navigation -->
            <nav class="main-nav" role="navigation">
                <ul class="nav-list">
                    <li><a href="<?php echo SITE_URL; ?>/index.php" class="<?php echo is_active_page('index.php'); ?>">Home</a></li>
                    <li><a href="<?php echo SITE_URL; ?>/about.php" class="<?php echo is_active_page('about.php'); ?>">About Us</a></li>
                    <li><a href="<?php echo SITE_URL; ?>/admissions.php" class="<?php echo is_active_page('admissions.php'); ?>">Admissions</a></li>
                    <li><a href="<?php echo SITE_URL; ?>/gallery.php" class="<?php echo is_active_page('gallery.php'); ?>">Gallery</a></li>
                    <li><a href="<?php echo SITE_URL; ?>/testimonials.php" class="<?php echo is_active_page('testimonials.php'); ?>">Testimonials</a></li>
                    <li><a href="<?php echo SITE_URL; ?>/contact.php" class="<?php echo is_active_page('contact.php'); ?>">Contact</a></li>
                </ul>
            </nav>
            
            <!-- Call to Action Button -->
            <div class="header-cta">
                <a href="<?php echo SITE_URL; ?>/admissions.php#apply" class="btn btn-primary">Apply Now</a>
            </div>
        </div>
    </div>
</header>