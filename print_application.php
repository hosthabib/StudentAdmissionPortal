<!DOCTYPE html>
<html>
<head>
    <title>Printable Application</title>
    <link rel="stylesheet" type="text/css" href="assets/css/print-style.css">
</head>
<body>  
        

        <?php
        // Retrieve the student's data based on the provided ID
        include("includes/db_connection.php");
        if (isset($_GET['id'])) {
            $student_id = $_GET['id'];
            $sql = "SELECT * FROM students WHERE id = $student_id";
            $result = mysqli_query($conn, $sql);

            if ($result && mysqli_num_rows($result) > 0) {
                $student = mysqli_fetch_assoc($result);
        ?>
        <table class="application-details">
            <th colspan="2">
                <h1>Student Admission Application</h1>
            </th>
        <tr>
            <td colspan="2">
                <h2>Personal Details</h2>
            </td>
        </tr>
        <tr>
            <td>Full Name:</td>
            <td><?php echo $student['name']; ?></td>
        </tr>
        <tr>
            <td>Date of Birth:</td>
            <td><?php echo $student['dob']; ?></td>
        </tr>
        <tr>
            <td>Mobile Number:</td>
            <td><?php echo $student['mobile_number']; ?></td>
        </tr>
        <tr>
            <td>Email:</td>
            <td><?php echo $student['email']; ?></td>
        </tr>

        <tr>
            <td colspan="2">
                <h2>Address Details</h2>
            </td>
        </tr>
        <tr>
            <td>Address:</td>
            <td><?php echo $student['address']; ?></td>
        </tr>
        <tr>
            <td>City:</td>
            <td><?php echo $student['city']; ?></td>
        </tr>
        <tr>
            <td>State:</td>
            <td><?php echo $student['state']; ?></td>
        </tr>

        <tr>
            <td colspan="2">
                <h2>Class/Course Details</h2>
            </td>
        </tr>
        <tr>
            <td>Course Name:</td>
            <td><?php echo $student['course']; ?></td>
        </tr>
        <tr>
            <td>Date of Admission:</td>
            <td><?php echo $student['date_of_admission']; ?></td>
        </tr>

        <tr>
            <td colspan="2">
                <h2>Previous Qualifications</h2>
            </td>
        </tr>
        <tr>
            <td>Qualifications:</td>
            <td><?php echo $student['qualifications']; ?></td>
        </tr>

        <tr>
            <td colspan="2">
                <h2>Photograph</h2>
            </td>
        </tr>
        <tr>
            <td colspan="2" class="photo-container">
                <img src="<?php echo $student['photo']; ?>" alt="Student Photograph">
            </td>
        </tr>
        <tr>
            <td colspan="2"><button class="print-button" onclick="window.print()">Print Application Form
        </button>
            </td>
        </tr>
    </table>

        <?php
            } else {
                echo "Student not found.";
            }
        } else {
            echo "Student ID not provided.";
        }
        ?>
    
    
</body>
</html>
