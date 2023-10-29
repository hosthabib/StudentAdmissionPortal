<?php
include("includes/db_connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = $_POST;

    // File upload handling
    $photo = uploadPhoto();

    if ($photo !== false) {
        $data['photo'] = $photo;

        // Sanitize and validate user input
        $name = mysqli_real_escape_string($conn, $data['name']);
        $dob = mysqli_real_escape_string($conn, $data['dob']);
        $mobile_number = mysqli_real_escape_string($conn, $data['mobile_number']);
        $email = mysqli_real_escape_string($conn, $data['email']);
        $address = mysqli_real_escape_string($conn, $data['address']);
        $city = mysqli_real_escape_string($conn, $data['city']);
        $state = mysqli_real_escape_string($conn, $data['state']);
        $course = mysqli_real_escape_string($conn, $data['course']);
        $qualifications = mysqli_real_escape_string($conn, $data['qualifications']);
        $date_of_admission = mysqli_real_escape_string($conn, $data['date_of_admission']);

        // Insert data into the 'students' table
        $sql = "INSERT INTO students (name, dob, mobile_number, email, address, city, state, course, date_of_admission, qualifications, photo) 
                VALUES ('$name', '$dob', '$mobile_number', '$email', '$address', '$city', '$state', '$course','$date_of_admission', '$qualifications', '$photo')";

        if (mysqli_query($conn, $sql)) {
            // Set the session variable
            session_start();
            $_SESSION['application_submitted'] = true;
            
            // Call the JavaScript function to show the modal and redirect
            echo '<script type="text/javascript">showModal();</script>';
        } else {
            echo "Error: " . mysqli_error($conn); // Display the error message
        }
    } else {
        echo "Error: Failed to upload the photo.";
    }
}

// Function to handle photo upload
function uploadPhoto() {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["photo"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a valid image
    $check = getimagesize($_FILES["photo"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        $uploadOk = 0;
    }

    // Check file size and file type
    if ($_FILES["photo"]["size"] > 500000) {
        $uploadOk = 0;
    }

    if ($imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "png") {
        $uploadOk = 0;
    }

    // Move the uploaded file to the target directory
    if ($uploadOk == 1) {
        if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
            return $target_file; // Return the file path for storing in the database
        } else {
            return false; // Failed to upload
        }
    } else {
        return false; // Invalid file or too large
    }
}
?>
