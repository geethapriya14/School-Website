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
<section style="margin-top: 70px; padding: 20px; color: black;">
    <h1>Contact Us</h1>
    <p>Please fill out the form below for Admissions or General Enquiry. For more details, chat with us on WhatsApp.</p>

    <form action="/Evaans_School_Website/enquiry_submit.php" method="post">
        <table cellspacing="10">
            <tr>
                <td><label for="name">Full Name:</label></td>
                <td><input type="text" id="name" name="name" required style="width: 250px;"></td>
            </tr>
            <tr>
                <td><label for="email">Email Address:</label></td>
                <td><input type="email" id="email" name="email" required style="width: 250px;"></td>
            </tr>
            <tr>
                <td><label for="phone_number">Phone Number:</label></td>
                <td><input type="text" id="phone_number" name="phone_number" required style="width: 250px;"></td>
            </tr>
            <tr>
                <td><label for="enquiry_type">Enquiry Type:</label></td>
                <td>
                    <select id="enquiry_type" name="enquiry_type" required style="width: 260px;">
                        <option value="">--Select--</option>
                        <option value="admissions">Admissions</option>
                        <option value="general">General Enquiry</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label for="message">Message:</label></td>
                <td><textarea id="message" name="message" rows="5" cols="30" required></textarea></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" value="Submit">
                </td>
            </tr>
        </table>
    </form>
</section>


<?php
require_once __DIR__ . '/../templates/footer.php';
?>
