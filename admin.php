<?php
include("includes/db_connection.php");

// Retrieve and display a list of student applications
$sql = "SELECT * FROM students";
$result = mysqli_query($conn, $sql);

if ($result) {
    if (mysqli_num_rows($result) > 0) {
        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <title>Admin Panel</title>
            <link rel="stylesheet" type="text/css" href="assets/css/style.css">
            <style>
             

            </style>
        </head>
        <body>
            <h1>Admin Panel
                <!-- Add this form at the top of your admin.php -->
                <form method="POST" action="search.php" class="search-form">
                    <label for="search_criteria">Search Records</label>
                    <input type="text" name="search_criteria" id="search_criteria" placeholder="Search records by Name, Date of Admission, Mobile Number, etc... ">
                    <input type="submit" value="Search">
                </form>
            </h1>
            

            <table>
                <tr>
                    <th>Name</th>
                    <th>Mobile Number</th>
                    <th>Date of Admission</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<tr>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['mobile_number'] . "</td>";
                echo "<td>" . $row['date_of_admission'] . "</td>";
                echo "<td>" . $row['status'] . "</td>";
                echo "<td><a href='edit.php?id={$row['id']}'>Edit</a> | <a href='delete.php?id={$row['id']}'>Delete</a> | <a href='approve.php?id={$row['id']}'>Approve</a>|";
                if ($row['status'] === 'Approved') {
                    echo "<a href='print_application.php?id={$row['id']}' target='_blank' class='print-button'>Print</a>";
                } else {
                    echo "<span class='not-approved-message'>Not Approved</span>";
                }
                echo "</td>";
                echo "</tr>";

                }
                ?>
            </table>
                        <script>
                    // JavaScript function to open the printable view
                    function printApplication(studentId) {
                        window.open('print_application.php?id=' + studentId, '_blank');
                    }
                    </script>
        </body>
        </html>
        <?php
    } else {
        echo "No student applications found.";
    }
    mysqli_free_result($result);
} else {
    die("Error: " . mysqli_error($conn));
}
?>
