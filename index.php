<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evaans Matriculation Higher Secondary School</title>
    <link rel="icon"  href="assets/images/favicon_02.png">
</head>
<body>
    <!-- Navigation Bar -->
<header class="navbar">
    <div class="logo">
        <!-- School Logo -->
        <img src="assets/images/logo.png" alt="Evaans Logo">
        <!-- School Name -->
        <span>Evaans School</span>
    </div>

    <nav>
        <ul class="nav-links" id="navLinks">
            <li><a href="index.php">Home</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="academics.php">Academics</a></li>
            <li><a href="contact.php">Contact</a></li>
        </ul>

        <!-- Hamburger icon for mobile -->
        <div class="hamburger" id="hamburger">&#9776;</div>
    </nav>
</header>

<!--toggling menu on mobile -->
<script>
const hamburger = document.getElementById('hamburger');
const navLinks = document.getElementById('navLinks');

hamburger.addEventListener('click', () => {
    navLinks.classList.toggle('active');
});
</script>

    
</body>
</html>