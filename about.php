<?php
// Include templates
require_once _DIR_ . '/templates/header.php';
require_once _DIR_ . '/templates/navigation.php';
?>
<section style="margin-top: 80px; font-family: 'Segoe UI', Arial, sans-serif; color: #333; padding: 40px 10%; line-height: 1.8;">
    
    <div style="display: flex; flex-wrap: wrap; gap: 40px; align-items: flex-start; margin-bottom: 50px;">
        
        <div style="flex: 1; min-width: 300px;">
            <blockquote style="font-size: 1.4rem; font-style: italic; color: #555; border-left: 5px solid #ff5e14; padding-left: 20px; margin-bottom: 25px;">
                "Education is the vaccine for violence."
                <cite style="display: block; font-size: 0.9rem; color: #888; margin-top: 10px; font-style: normal;">— Edward James Olmos</cite>
            </blockquote>

            <h2 style="color: #050a1e; font-size: 2rem; margin-bottom: 20px; text-transform: uppercase; letter-spacing: 1px;">Evaans Schools</h2>
            
            <p style="text-align: justify; margin-bottom: 20px; color: #444;">
                Evaans School, founded in 1982, is managed by Panchaliammal Subbarayyan Educational Trust. 
                The school has a rich tradition of 40 years. We, at Evaans, believe in man-making education. 
                Our team of dedicated teachers always strive not only for academic excellence but also for 
                imparting essential moral values. Our teachers take keen interest in shaping the young minds 
                into fine human beings. Our students have secured pride of place in sports by participating 
                in national level championships. We all work in union to enhance the high traditions and 
                indisputable reputation of the school. We will certainly take the school to glorious heights 
                in the years to come.
            </p>

            <p style="font-weight: bold; color: #ff5e14; font-size: 1.1rem; border-top: 1px solid #eee; padding-top: 15px;">
                We Are Here To Give A Quality Education With Indian Standards To Everyone.
            </p>
        </div>

        <div style="flex: 1; min-width: 300px;">
            <img src="school-building.jpg" alt="Evaans School Building" style="width: 100%; border-radius: 8px; box-shadow: 0 4px 15px rgba(0,0,0,0.1);">
        </div>
    </div>

    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(400px, 1fr)); gap: 30px;">
        
        <div style="background: #f9f9f9; padding: 25px; border-radius: 8px;">
            <h2 style="color: #050a1e; border-bottom: 2px solid #ff5e14; display: inline-block; padding-bottom: 5px; margin-bottom: 15px;">Our Journey</h2>
            <h2>Our Journey</h2>
            <p>
               Founded in 1982, Evaans School is managed by the Panchaliammal Subbarayan
               Educational Trust. With over four decades of excellence in education,
               the institution has consistently focused on shaping young minds through
                strong academic foundations, discipline, and character development.</p>
        </div>

        <div style="background: #f9f9f9; padding: 25px; border-radius: 8px;">
            <h2 style="color: #050a1e; border-bottom: 2px solid #ff5e14; display: inline-block; padding-bottom: 5px; margin-bottom: 15px;">Vision & Mission</h2>
            <h2>Vision & Mission</h2>
            <p>
              Our vision is to nurture responsible, confident, and skilled individuals
              who contribute positively to society. Evaans School is committed to
              providing quality education that blends academic excellence with moral
              values, sportsmanship, and life skills.
            </p>
        </div>

        <div style="background: #f9f9f9; padding: 25px; border-radius: 8px;">
            <h2 style="color: #050a1e; border-bottom: 2px solid #ff5e14; display: inline-block; padding-bottom: 5px; margin-bottom: 15px;">Academic Excellence</h2>
            <h2>Academic Excellence</h2>
            <p>
               Our dedicated team of experienced teachers ensures individual attention
               to every student. Along with academics, students are encouraged to
               participate in sports, cultural activities, and leadership programs.
               Our students have achieved recognition at district and national levels
               in various competitions.
            </p>
        </div>

        <div style="background: #f9f9f9; padding: 25px; border-radius: 8px;">
            <h2 style="color: #050a1e; border-bottom: 2px solid #ff5e14; display: inline-block; padding-bottom: 5px; margin-bottom: 15px;">Our Commitment</h2>
            <h2>Our Commitment</h2>
            <p>
              At Evaans School, we believe education is not just about marks, but about
              building character, confidence, and compassion. We strive to maintain
              high standards in education and continuously evolve to meet the needs
              of future generations.
            </p>
        </div>

    </div>
</section>
<?php
require_once _DIR_ . '/templates/footer.php';
?>