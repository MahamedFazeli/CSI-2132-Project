<?php
    session_start();

    include("connection.php");
    include("functions.php");



    // Handle form submission
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Build the SQL query based on selected search criteria

        $query = "select * from booking where booking_ID = 1";

        $result = mysqli_query($con, $query);
        while($row = mysqli_fetch_array($result)) {
            echo $row['column_name']; // Print a single column data
            echo print_r($row);       // Print the entire row data
        }
    }
?>