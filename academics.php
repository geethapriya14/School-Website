<?php
// Include templates
require_once __DIR__ . '/templates/header.php';
require_once __DIR__ . '/templates/navigation.php';
?>

<style>
.academics-container {
    margin-top: 100px;
    padding: 40px 20px;
    max-width: 1200px;
    margin-left: auto;
    margin-right: auto;
}
.academics-title {
    text-align: center;
    font-size: 2rem;
    color: #333;
    margin-bottom: 40px;
}
.academics-section {
    margin-bottom: 40px;
}
.academics-section h2 {
    color: #2c3e50;
    font-size: 1.5rem;
    margin-bottom: 15px;
    padding-bottom: 10px;
    border-bottom: 2px solid #3498db;
}
.academics-section p {
    color: #555;
    line-height: 1.8;
}
.academics-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
    gap: 25px;
    margin-top: 30px;
}
.subject-card {
    background: #fff;
    border-radius: 10px;
    padding: 25px;
    text-align: center;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    transition: transform 0.3s ease;
}
.subject-card:hover {
    transform: translateY(-5px);
}
</style>

<div class="academics-container">
    <h1 class="academics-title">Academics</h1>
    
    <div class="academics-section">
        <h2>Our Curriculum</h2>
        <p>Evaans School follows the CBSE curriculum, integrated with LEAD School's innovative teaching methodology. Our academic program focuses on holistic development, combining traditional values with modern educational practices.</p>
    </div>
    
    <div class="academics-section">
        <h2>Classes Offered</h2>
        <div class="academics-grid">
            <div class="subject-card">
                <h3>🎒 Primary (I-V)</h3>
                <p>Foundation years with focus on language, numeracy, and creativity.</p>
            </div>
            <div class="subject-card">
                <h3>📖 Middle (VI-VIII)</h3>
                <p>Building knowledge with science, mathematics, and social studies.</p>
            </div>
            <div class="subject-card">
                <h3>📚 Secondary (IX-X)</h3>
                <p>CBSE board preparation with comprehensive subject coverage.</p>
            </div>
            <div class="subject-card">
                <h3>🎓 Higher Secondary (XI-XII)</h3>
                <p>Specialized streams - Science, Commerce, and Arts.</p>
            </div>
        </div>
    </div>
</div>

<?php
require_once __DIR__ . '/templates/footer.php';
?>
