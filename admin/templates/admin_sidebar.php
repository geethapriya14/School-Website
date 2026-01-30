<header class="navbar" style="
    display:flex;
    justify-content:space-between;
    align-items:center;
    padding:10px 20px;
    position:fixed;
    top:0;
    left:0;
    width:100%;
    z-index:1000;
    background:white;
    box-shadow:0 2px 5px rgba(0,0,0,0.1);
">

    <!-- Left: Logo + School Name -->
    <div class="logo" style="display:flex; align-items:center">
        <img src="/Evaans_School_Website/assets/images/favicon_02.png"
             alt="Evaans Logo"
             style="width:80px; height:80px; margin-right:10px;">
        <span style="font-size:24px; font-weight:bold; color:black;">
            Evaans School – Admin
        </span>
    </div>

    <!-- Right: Hamburger -->
    <div style="position:relative;">
        <div id="hamburger" style="
            cursor:pointer;
            width:30px;
            display:flex;
            flex-direction:column;
            justify-content:space-between;
            height:22px;
        ">
            <span style="display:block; height:4px; background:black;"></span>
            <span style="display:block; height:4px; background:black;"></span>
            <span style="display:block; height:4px; background:black;"></span>
        </div>

        <!-- Admin Menu -->
        <nav id="navLinks" style="
            display:none;
            position:absolute;
            top:100%;
            right:0;
            padding:10px;
            border:1px solid #ccc;
            background:white;
        ">
            <ul style="list-style:none; padding:0; margin:0;">
                <li><a href="/Evaans_School_Website/admin/dashboard.php" style="text-decoration:none; color:black; display:block; padding:5px 10px;">Dashboard</a></li>
                <li><a href="/Evaans_School_Website/admin/gallery/add_photo.php" style="text-decoration:none; color:black; display:block; padding:5px 10px;">Gallery</a></li>
                <li><a href="/Evaans_School_Website/admin/events/add_event.php" style="text-decoration:none; color:black; display:block; padding:5px 10px;">Events</a></li>
                <li><a href="/Evaans_School_Website/admin/testimonials/add_testimonial.php" style="text-decoration:none; color:black; display:block; padding:5px 10px;">Testimonials</a></li>
                <li><a href="/Evaans_School_Website/admin/enquiries/enquiries.php" style="text-decoration:none; color:black; display:block; padding:5px 10px;">Enquiries</a></li>
                <li><a href="/Evaans_School_Website/admin/admissions/admission_payments.php" style="text-decoration:none; color:black; display:block; padding:5px 10px;">Admissions</a></li>
                <li><a href="/Evaans_School_Website/admin/logout.php" style="text-decoration:none; color:black; display:block; padding:5px 10px;">Logout</a></li>
            </ul>
        </nav>
    </div>
</header>

<!-- Spacer so content doesn't hide behind navbar -->
<div style="height:110px;"></div>

<!-- Hamburger Toggle JS -->
<script>
const hamburger = document.getElementById('hamburger');
const navLinks = document.getElementById('navLinks');

hamburger.addEventListener('click', () => {
    navLinks.style.display =
        navLinks.style.display === "block" ? "none" : "block";
});
</script>
