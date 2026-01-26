<!-- ================= Footer / Contact Section ================= -->
<footer style="background:#f5f5f5; padding:40px 20px; margin-top:50px;">

    <div style="max-width:1200px; margin:0 auto; display:flex; flex-wrap:wrap; justify-content:space-between; gap:20px;">

        <!-- Contact Info -->
        <div style="flex:1 1 300px;">
            <h3 style="font-size:22px; margin-bottom:15px;">Evaans School</h3>
            <p>For more information, reach us out using below information:</p>
            <p>No.18, Mariamman Koil Street, Tharamani, Chennai</p>
            <p>044-22436604 or 044-29992126</p>
            <p>Email: <a href="mailto:contact@evaansschool.com" style="text-decoration:none; color:black;">contact@evaansschool.com</a></p>
        </div>

        <!-- Quick Links -->
        <div style="flex:1 1 200px;">
            <h3 style="font-size:22px; margin-bottom:15px;">Quick Links</h3>
            <ul style="list-style:none; padding:0; margin:0;">
                <li><a href="index.php" style="text-decoration:none; color:black; display:block; margin-bottom:5px;">Home</a></li>
                <li><a href="about.php" style="text-decoration:none; color:black; display:block; margin-bottom:5px;">About Us</a></li>
                <li><a href="teachers.php" style="text-decoration:none; color:black; display:block; margin-bottom:5px;">Meet our Teachers</a></li>
                <li><a href="contact.php" style="text-decoration:none; color:black; display:block; margin-bottom:5px;">Contact Us</a></li>
                <li><a href="#" style="text-decoration:none; color:black; display:block; margin-bottom:5px;">Newsletter</a></li>
            </ul>

            <!-- Newsletter Email Input -->
            <div style="margin-top:15px;">
                <input type="email" placeholder="Your Email Address" style="padding:8px; width:80%; max-width:200px; margin-bottom:10px;">
                <button style="padding:8px 12px; background:black; color:white; border:none; cursor:pointer;">Subscribe</button>
            </div>
        </div>

    </div>

    <!-- Footer Bottom -->
    <div style="text-align:center; margin-top:30px; font-size:14px; color:#555;">
        &copy; <?= date("Y"); ?> Evaans School. All Rights Reserved.
    </div>

</footer>
</body>
</html>