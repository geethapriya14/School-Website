<?php include 'templates/header.php'; ?>
<body>

<?php include 'templates/navigation.php'; ?>
<!-- School Image / Banner -->
<section id="hero">
    <img src="assets/images/pic1.png" alt="Evaans School" 
         style="width:100%; max-height:500px; object-fit:cover; display:block;">
</section>

<!-- ================= Intro / About Section ================= -->
<section id="intro" style="padding:40px 20px; max-width:1000px; margin:0 auto;">
    <h2 style="font-size:28px; margin-bottom:20px;">We Provide Quality Education with the combination of Lead-school organisation</h2>
    
    <h3 style="font-size:24px; margin-bottom:15px;">Evaans Schools</h3>
    
    <p style="font-size:16px; margin-bottom:20px;">
        We are educating children from 1982 and have gained a good reputation in the education industry. We implemented:
    </p>
    
    <!-- List of Implementations -->
    <ul style="font-size:16px; margin-bottom:20px; padding-left:20px;">
        <li>Lead-school trainings</li>
        <li>CBSE course modules</li>
        <li>PD sessions</li>
        <li>Discipline committee</li>
        <li>Digitalized classrooms</li>
    </ul>
    
    <p style="font-size:16px;">
        We are here to give a quality education with Indian standards to everyone.
    </p>
</section>
<!-- ================= Sports Activities ================= -->
<section id="sports" style="padding:40px 20px; max-width:1200px; margin:0 auto;">
    <h2 style="font-size:28px; margin-bottom:30px; text-align:center;"> We Make Students Improve in their Sports Activities</h2>

    <!-- Sports Cards Container -->
    <div style="display:flex; justify-content:space-between; flex-wrap:wrap; gap:20px;">

        <!-- Football -->
        <div style="flex:1 1 30%; text-align:center; border:1px solid #ccc; padding:15px; box-sizing:border-box;">
            <img src="assets/images/football.jpg" alt="Football" style="width:100%; height:180px; object-fit:cover; margin-bottom:10px;">
            <h3 style="font-size:20px; margin-bottom:10px;">Football</h3>
            <p style="font-size:16px;">Football coaching is given and students are supported for their state-level tournaments.</p>
        </div>

        <!-- Volleyball -->
        <div style="flex:1 1 30%; text-align:center; border:1px solid #ccc; padding:15px; box-sizing:border-box;">
            <img src="assets/images/=volleyball.jpeg" alt="Volleyball" style="width:100%; height:180px; object-fit:cover; margin-bottom:10px;">
            <h3 style="font-size:20px; margin-bottom:10px;">Volleyball</h3>
            <p style="font-size:16px;">Volleyball coaching is given and students are supported for their state-level tournaments.</p>
        </div>

        <!-- Kabaddi -->
        <div style="flex:1 1 30%; text-align:center; border:1px solid #ccc; padding:15px; box-sizing:border-box;">
            <img src="assets/images/kabaddi.jpg" alt="Kabaddi" style="width:100%; height:180px; object-fit:cover; margin-bottom:10px;">
            <h3 style="font-size:20px; margin-bottom:10px;">Kabaddi</h3>
            <p style="font-size:16px;">Kabaddi coaching is given and students are supported for their state-level tournaments.</p>
        </div>

    </div>
</section>
<!-- ================= School Moments / Events ================= -->
<section id="moments" style="padding:40px 20px; max-width:1200px; margin:0 auto;">
    <h2 style="font-size:28px; margin-bottom:30px; text-align:center;">Some Of Our School Moments</h2>

    <!-- Moments Cards Container -->
    <div style="display:flex; justify-content:space-between; flex-wrap:wrap; gap:20px;">

        <!-- Moment 1 -->
        <div style="flex:1 1 30%; text-align:center; border:1px solid #ccc; padding:10px; box-sizing:border-box;">
            <img src="assets/images/footballteam.jpg" alt="Football Team" style="width:100%; height:180px; object-fit:cover; margin-bottom:10px;">
            <h3 style="font-size:20px; margin-bottom:5px;">Evaans School Football Team</h3>
            <p style="font-size:16px;">Tirunelveli-State-level Tournament U19</p>
        </div>

        <!-- Moment 2 -->
        <div style="flex:1 1 30%; text-align:center; border:1px solid #ccc; padding:10px; box-sizing:border-box;">
            <img src="assets/images/kids-innaug.jpeg" alt="Kids Inauguration" style="width:100%; height:180px; object-fit:cover; margin-bottom:10px;">
            <h3 style="font-size:20px; margin-bottom:5px;">Evaans School Kids Inauguration</h3>
            <p style="font-size:16px;">Kids Inauguration</p>
        </div>

        <!-- Moment 3 -->
        <div style="flex:1 1 30%; text-align:center; border:1px solid #ccc; padding:10px; box-sizing:border-box;">
            <img src="assets/images/Pro-kabbadi.jpeg" alt="Pro Kabaddi League Champion" style="width:100%; height:180px; object-fit:cover; margin-bottom:10px;">
            <h3 style="font-size:20px; margin-bottom:5px;">Evaans Junior Pro Kabaddi League Champion</h3>
            <p style="font-size:16px;">Star Sports-Pro Kabaddi League</p>
        </div>

    </div>

    <!-- View More Button -->
    <div style="text-align:center; margin-top:30px;">
        <a href="events.php" style="text-decoration:none; color:white; background-color:black; padding:10px 20px; border-radius:5px;">View More</a>
    </div>
</section>
<?php include 'templates/footer.php'; ?>





</body>
</html>