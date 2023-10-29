<!DOCTYPE html>
<html>
<head>
    <title>Student Admission Form</title>
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body>
    <form action="admission_process.php" method="POST" enctype="multipart/form-data">

        <h1>Student Admission Form</h1>
        
        <!-- Personal Details -->
        <h2>Personal Details</h2>
        <label for="name">Full Name:</label>
        <input type="text" name="name" required>
        <label for="dob">Date of Birth:</label>
        <input type="date" name="dob" required>
        <label for="mobile_number">Mobile Number:</label>
        <input type="text" name="mobile_number" required>
        <label for="email">Email:</label>
        <input type="email" name="email" required>

        <!-- Address Details -->
        <h2>Address Details</h2>
        <label for="address">Address:</label>
        <textarea name="address" rows="4" required></textarea>
        <label for="city">City:</label>
        <input type="text" name="city" required>
        <label for="state">State:</label>
        <input type="text" name="state" required>

        <!-- Class/Course Details -->
        <h2>Class/Course Details</h2>
        <label for="course">Course Name:</label>
        <input type="text" name="course" required>
        
        <!-- Date of Admission -->
        <label for="date_of_admission">Date of Admission:</label>
        <input type="date" id="date_of_admission" name="date_of_admission" required>


        <!-- Previous Qualifications -->
        <h2>Previous Qualifications</h2>
        <label for="qualifications">Qualifications:</label>
        <textarea name="qualifications" rows="4" required>
        </textarea>

        <!-- Photo Upload -->
        <h2>Photograph Upload</h2>
        <div class="file-input">
        <label for="photo">Upload Photograph</label>
        <input type="file" name="photo" id="photo" accept=".jpg, .jpeg, .png" required>
        <input type="submit" value="Submit">
        </div>

        
    </form>
    <!-- Modal -->
    <div id="successModal" class="modal">
        <div class="modal-content">
            <p>Application submitted successfully!</p>
        </div>
    </div>
    
        <script>
    var modal = document.getElementById('successModal');
    // Trigger the modal display when the form is submitted
    document.querySelector('form').addEventListener('submit', function (e) {
        e.preventDefault(); // Prevent the form from actually submitting
        modal.style.display = 'block';

        // Set a timer for the modal and redirect
        setTimeout(function () {
            modal.style.display = 'none';
            window.location = 'admission_form.php';
        }, 3000); // Redirect after 3 seconds (you can adjust the timeout duration)
    });
    </script>
    
    <?php
    session_start();

    if (isset($_SESSION['application_submitted']) && $_SESSION['application_submitted'] === true) {
        echo '<script type="text/javascript">
            document.getElementById("messageDiv").innerHTML = "Application submitted successfully!";
        </script>';
        // Unset the session variable
        unset($_SESSION['application_submitted']);
    }
    ?>
</body>
</html>
