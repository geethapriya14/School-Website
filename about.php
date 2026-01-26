<?php
$page_title = "About Us";
$page_description = "Learn about Evaans School's history, mission, and values";
require_once 'templates/config.php';
require_once 'templates/functions.php';
?>

<?php include 'templates/header.php'; ?>
<?php include 'templates/navigation.php'; ?>

<main id="main-content">
    <section class="page-header">
        <div class="container">
            <h1>Evaans School</h1>
            <p>Evaans School,founded in 1982,is managed by panchaliammal subbarayyan educational trust.The school has a rich tradition of 40years.we,at evaans,believe in man making education.our team of dedicated teachers always strive not only for academy excellence but also for imparting essential moral values.our teachers take keen interest in shaping the young minds into fine human beings.our students have secured pride of place in sports by participating in national level championships.we all work in union to enhance the high traditions and indisputable reputation of the school.we will certainly take the school to glorious heights in the years to come.We are here to give a quality education with indian standards to everyone.</p>
        </div>
    </section>

    <section class="about-content">
        <div class="container">
            <div class="about-grid">
                <div class="about-text">
                    <h2>Education is the vaccine for violence.</h2>
                    <p>-Edward James Olmos</p>
                    
                    <h2>Our Mission</h2>
                    <p>To develop intellectually capable, emotionally balanced, and socially responsible individuals who contribute positively to society through innovative teaching methods and a nurturing environment.</p>
                    
                    <h2>Our Values</h2>
                    <ul class="values-list">
                        <li><strong>Excellence:</strong> Striving for the highest standards</li>
                        <li><strong>Integrity:</strong> Upholding ethical principles</li>
                        <li><strong>Innovation:</strong> Embracing new learning methodologies</li>
                        <li><strong>Inclusivity:</strong> Celebrating diversity</li>
                        <li><strong>Community:</strong> Building strong partnerships</li>
                    </ul>
                </div>
                
                <div class="about-image">
                    <img src="assets\images\logo4.jpeg" alt="Evaans School Campus">
                </div>
            </div>
        </div>
    </section>
</main>
<?php include 'templates/footer.php'; ?>