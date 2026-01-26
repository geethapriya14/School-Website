<?php
// Include templates
require_once __DIR__ . '/templates/header.php';
require_once __DIR__ . '/templates/navigation.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Feedback - Evaans School</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background: linear-gradient(135deg, #f5f7fa, #c3cfe2);
            min-height: 100vh;
            padding: 20px;
        }

        .feedback-container {
            max-width: 900px;
            margin: auto;
            background: #fff;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.15);
            overflow: hidden;
        }

        .form-header {
            background: linear-gradient(135deg, #3498db, #2c3e50);
            color: white;
            padding: 35px;
            text-align: center;
        }

        .form-header h1 {
            font-size: 32px;
            margin-bottom: 10px;
        }

        .form-content {
            padding: 40px;
        }

        .form-group {
            margin-bottom: 25px;
        }

        label {
            font-weight: 600;
            display: block;
            margin-bottom: 8px;
        }

        label.required::after {
            content: " *";
            color: red;
        }

        input, select, textarea {
            width: 100%;
            padding: 12px 14px;
            border-radius: 8px;
            border: 2px solid #e0e0e0;
            font-size: 15px;
        }

        input:focus, select:focus, textarea:focus {
            outline: none;
            border-color: #3498db;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        @media (max-width: 600px) {
            .form-row {
                grid-template-columns: 1fr;
            }
        }

        .star-rating {
            display: flex;
            gap: 6px;
        }

        .star-rating input {
            display: none;
        }

        .star-rating label {
            font-size: 32px;
            cursor: pointer;
            color: #ccc;
        }

        .star-rating input:checked ~ label,
        .star-rating label:hover,
        .star-rating label:hover ~ label {
            color: #ffc107;
        }

        .submit-btn {
            width: 100%;
            padding: 15px;
            background: #3498db;
            border: none;
            color: #fff;
            font-size: 18px;
            font-weight: 600;
            border-radius: 10px;
            cursor: pointer;
        }

        .submit-btn:hover {
            background: #2980b9;
        }
    </style>
</head>
<body>

<div class="feedback-container">
    <div class="form-header">
        <h1>Student & Parent Feedback</h1>
        <p>Your opinion matters to us</p>
    </div>

    <div class="form-content">
        <form id="feedbackForm">

            <!-- FEEDBACK TYPE -->
            <div class="form-group">
                <label class="required">Who is giving feedback?</label>
                <select id="feedbackType" required>
                    <option value="">Select</option>
                    <option value="student">Student</option>
                    <option value="parent">Parent</option>
                </select>
            </div>

            <!-- STUDENT FORM -->
            <div id="studentForm" style="display:none;">

                <div class="form-row">
                    <div class="form-group">
                        <label class="required">Student Name</label>
                        <input type="text" placeholder="Student full name">
                    </div>
                    <div class="form-group">
                        <label class="required">Grade</label>
                        <select>
                            <option value="">Select</option>
                            <option>1</option><option>2</option><option>3</option>
                            <option>4</option><option>5</option><option>6</option>
                            <option>7</option><option>8</option><option>9</option>
                            <option>10</option><option>11</option><option>12</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="required">Overall Experience</label>
                    <div class="star-rating">
                        <input type="radio" id="s5" name="srate"><label for="s5">★</label>
                        <input type="radio" id="s4" name="srate"><label for="s4">★</label>
                        <input type="radio" id="s3" name="srate"><label for="s3">★</label>
                        <input type="radio" id="s2" name="srate"><label for="s2">★</label>
                        <input type="radio" id="s1" name="srate"><label for="s1">★</label>
                    </div>
                </div>

                <div class="form-group">
                    <label class="required">Student Feedback</label>
                    <textarea rows="5"></textarea>
                </div>
            </div>

            <!-- PARENT FORM -->
            <div id="parentForm" style="display:none;">

                <div class="form-row">
                    <div class="form-group">
                        <label class="required">Parent Name</label>
                        <input type="text">
                    </div>
                    <div class="form-group">
                        <label class="required">Student Name</label>
                        <input type="text">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label class="required">Student Grade</label>
                        <select>
                            <option value="">Select</option>
                            <option>1</option><option>2</option><option>3</option>
                            <option>4</option><option>5</option><option>6</option>
                            <option>7</option><option>8</option><option>9</option>
                            <option>10</option><option>11</option><option>12</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="required">Mobile Number</label>
                        <input type="tel">
                    </div>
                </div>

                <div class="form-group">
                    <label class="required">School Rating</label>
                    <div class="star-rating">
                        <input type="radio" id="p5" name="prate"><label for="p5">★</label>
                        <input type="radio" id="p4" name="prate"><label for="p4">★</label>
                        <input type="radio" id="p3" name="prate"><label for="p3">★</label>
                        <input type="radio" id="p2" name="prate"><label for="p2">★</label>
                        <input type="radio" id="p1" name="prate"><label for="p1">★</label>
                    </div>
                </div>

                <div class="form-group">
                    <label class="required">Parent Feedback</label>
                    <textarea rows="5"></textarea>
                </div>
            </div>

            <button class="submit-btn" type="submit">Submit Feedback</button>
        </form>
    </div>
</div>

<script>
    const type = document.getElementById("feedbackType");
    const student = document.getElementById("studentForm");
    const parent = document.getElementById("parentForm");

    type.addEventListener("change", () => {
        student.style.display = type.value === "student" ? "block" : "none";
        parent.style.display = type.value === "parent" ? "block" : "none";
    });

    document.getElementById("feedbackForm").addEventListener("submit", e => {
        e.preventDefault();
        alert("Feedback submitted successfully");
        e.target.reset();
        student.style.display = "none";
        parent.style.display = "none";
    });
</script>

</body>
</html>

<!--footer>
<?php
require_once __DIR__ . '/templates/footer.php';
?>