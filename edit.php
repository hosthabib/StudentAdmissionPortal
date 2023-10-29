<?php
include("includes/db_connection.php");

if (isset($_GET['id'])) {
    $student_id = $_GET['id'];

    $sql = "SELECT * FROM students WHERE id = $student_id";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $name = mysqli_real_escape_string($conn, $_POST['name']);
                $mobile_number = mysqli_real_escape_string($conn, $_POST['mobile_number']);
                $date_of_admission = mysqli_real_escape_string($conn, $_POST['date_of_admission']);
                $status = mysqli_real_escape_string($conn, $_POST['status']);
                $email = mysqli_real_escape_string($conn, $_POST['email']);
                $address = mysqli_real_escape_string($conn, $_POST['address']);
                $city = mysqli_real_escape_string($conn, $_POST['city']);
                $state = mysqli_real_escape_string($conn, $_POST['state']);
                $course = mysqli_real_escape_string($conn, $_POST['course']);
                $qualifications = mysqli_real_escape_string($conn, $_POST['qualifications']);
                // Add more fields as needed

                $update_sql = "UPDATE students SET 
                    name = '$name',
                    mobile_number = '$mobile_number',
                    date_of_admission = '$date_of_admission',
                    status = '$status',
                    email = '$email',
                    address = '$address',
                    city = '$city',
                    state = '$state',
                    course = '$course',
                    qualifications = '$qualifications'
                    WHERE id = $student_id";

                if (mysqli_query($conn, $update_sql)) {
                    header("Location: admin.php");
                    exit;
                } else {
                    die("Error updating student: " . mysqli_error($conn));
                }
            }
        } else {
            echo "No student found with this ID.";
        }
    } else {
        die("Error: " . mysqli_error($conn));
    }
} else {
    echo "Student ID not provided.";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Student Application</title>
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body>
    <h1>Edit Student Application</h1>
    <form action="edit.php?id=<?php echo $student_id; ?>" method="POST">
        <label for="name">Full Name:</label>
        <input type="text" name="name" value="<?php echo $row['name']; ?>" required>

        <label for="mobile_number">Mobile Number:</label>
        <input type="text" name="mobile_number" value="<?php echo $row['mobile_number']; ?>" required>

        <label for="date_of_admission">Date of Admission:</label>
        <input type="date" name="date_of_admission" value="<?php echo $row['date_of_admission']; ?>" required>

        <label for="status">Status:</label>
        <select name="status">
            <option value="Pending" <?php if ($row['status'] === 'Pending') echo 'selected'; ?>>Pending</option>
            <option value="Approved" <?php if ($row['status'] === 'Approved') echo 'selected'; ?>>Approved</option>
            <option value="Rejected" <?php if ($row['status'] === 'Rejected') echo 'selected'; ?>>Rejected</option>
        </select>

        <!-- Additional fields -->
        <label for="email">Email:</label>
        <input type="email" name="email" value="<?php echo $row['email']; ?>" required>

        <label for="address">Address:</label>
        <textarea name="address" required><?php echo $row['address']; ?></textarea>

        <label for="city">City:</label>
        <input type="text" name="city" value="<?php echo $row['city']; ?>" required>

        <label for="state">State:</label>
        <input type="text" name="state" value="<?php echo $row['state']; ?>" required>

        <label for="course">Course Name:</label>
        <input type="text" name="course" value="<?php echo $row['course']; ?>" required>

        <label for="qualifications">Qualifications:</label>
        <textarea name="qualifications" required><?php echo $row['qualifications']; ?></textarea>
        
        <input type="submit" value="Update">
    </form>
</body>
</html>
