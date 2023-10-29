<?php
include("includes/db_connection.php");

if (isset($_GET['id'])) {
    $student_id = $_GET['id'];

    // Check if the student exists in the database
    $check_sql = "SELECT * FROM students WHERE id = $student_id";
    $check_result = mysqli_query($conn, $check_sql);

    if ($check_result && mysqli_num_rows($check_result) == 1) {
        // The student exists; proceed with deletion
        $delete_sql = "DELETE FROM students WHERE id = $student_id";

        if (mysqli_query($conn, $delete_sql)) {
            // Deletion was successful, redirect to the admin panel
            header("Location: admin.php");
            exit;
        } else {
            die("Error deleting student: " . mysqli_error($conn));
        }
    } else {
        echo "No student found with this ID.";
    }
} else {
    echo "Student ID not provided.";
}
?>
