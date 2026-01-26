<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// config file (now inside templates)
require_once __DIR__ . '/../templates/config.php';

// templates
require_once __DIR__ . '/../templates/header.php';
require_once __DIR__ . '/../templates/navigation.php';
?>


<!-- CONTACT PAGE CONTENT -->
<section>
    <h1>Contact Us</h1>

    <form action="whatsapp.php" method="POST">
        <input type="text" name="name" placeholder="Your Name" required><br><br>

        <input type="tel" name="phone" placeholder="Phone Number" required><br><br>

        <input type="email" name="email" placeholder="Email Address"><br><br>

        <select name="enquiry_type" required>
            <option value="">Select Enquiry Type</option>
            <option value="Admission">Admission</option>
            <option value="General Enquiry">General Enquiry</option>
        </select><br><br>

        <textarea name="message" placeholder="Your Message"></textarea><br><br>

        <button type="submit">Submit</button>
    </form>
</section>

<?php
require_once __DIR__ . '/../templates/footer.php';
?>
