<!-- ================= Navbar ================= -->
<header class="navbar" style="display:flex; justify-content:space-between; align-items:center; padding:10px 20px; position:fixed; top:0; left:0; width:100%; z-index:1000; background:white; box-shadow:0 2px 5px rgba(0,0,0,0.1);">

    <!-- Left: Logo + School Name -->
    <div class="logo" style="display:flex; align-items:center;">
        <img src="assets/images/favicon_02.png" alt="Evaans Logo" style="width:90px; height:90px; margin-right:10px;">
        <span style="font-size:26px; font-weight:bold; color:black;">Evaans School</span>
    </div>

    <!-- Right: Hamburger Icon -->
    <div style="position:relative;">
        <div id="hamburger" style="cursor:pointer; width:30px; display:flex; flex-direction:column; justify-content:space-between; height:22px;">
            <span style="display:block; height:4px; background:black;"></span>
            <span style="display:block; height:4px; background:black;"></span>
            <span style="display:block; height:4px; background:black;"></span>
        </div>

        <!-- Menu Links (Hidden by default, appears below hamburger on right) -->
        <nav id="navLinks" style="display:none; position:absolute; top:100%; right:0; padding:10px; border:1px solid #ccc; background:white;">
            <ul style="list-style:none; padding:0; margin:0;">
                <li><a href="index.php" style="text-decoration:none; color:black; display:block; padding:5px 10px;">Home</a></li>
                <li><a href="about.php" style="text-decoration:none; color:black; display:block; padding:5px 10px;">About</a></li>
                <li><a href="academics.php" style="text-decoration:none; color:black; display:block; padding:5px 10px;">Academics</a></li>
                <li><a href="admissions.php" style="text-decoration:none; color:black; display:block; padding:5px 10px;">Admissions</a></li>
                <li><a href="contact.php" style="text-decoration:none; color:black; display:block; padding:5px 10px;">Contact</a></li>
                <li><a href="events.php" style="text-decoration:none; color:black; display:block; padding:5px 10px;">Events</a></li>
                <li><a href="facilities.php" style="text-decoration:none; color:black; display:block; padding:5px 10px;">Facilities</a></li>
                <li><a href="gallery.php" style="text-decoration:none; color:black; display:block; padding:5px 10px;">Gallery</a></li>
                <li><a href="teachers.php" style="text-decoration:none; color:black; display:block; padding:5px 10px;">Teachers</a></li>
                <li><a href="testimonials.php" style="text-decoration:none; color:black; display:block; padding:5px 10px;">Testimonials</a></li>
                <li><a href="payments.php" style="text-decoration:none; color:black; display:block; padding:5px 10px;">Payments</a></li>
            </ul>
        </nav>
    </div>
</header>

<!-- ================= JS for Hamburger ================= -->
<script>
const hamburger = document.getElementById('hamburger');
const navLinks = document.getElementById('navLinks');

hamburger.addEventListener('click', () => {
    if(navLinks.style.display === "none"){
        navLinks.style.display = "block";  // Show menu
    } else {
        navLinks.style.display = "none";   // Hide menu
    }
});
</script>