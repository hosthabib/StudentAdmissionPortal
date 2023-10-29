<?php
include("includes/db_connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $search_criteria = $_POST['search_criteria'];

    // Construct the SQL query based on the search criteria
    $sql = "SELECT * FROM students WHERE 
            name LIKE '%$search_criteria%' OR
            mobile_number LIKE '%$search_criteria%' OR
            date_of_admission LIKE '%$search_criteria'";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        // Display search results
        echo '<!DOCTYPE html>
<html>
<head>
    <title>Search Results</title>
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body>
    <h1>Search Results</h1>
    <table>
        <tr>
            <th>Name</th>
            <th>Mobile Number</th>
            <th>Date of Admission</th>
        </tr>';

        // Loop through the search results and display them in a table
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['mobile_number'] . "</td>";
            echo "<td>" . $row['date_of_admission'] . "</td>";
            // Include other fields you want to display
            echo "</tr>";
        }

        echo '</table>
</body>
</html>';
    } else {
        // Handle any database query errors
        echo "Error: " . mysqli_error($conn);
    }
}
?>
