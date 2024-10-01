<?php 
session_start();
include 'connection.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve submitted form
    $IC = $_POST['icNumber'];

    // Sanitize to prevent SQL injection
    $IC = mysqli_real_escape_string($mysqli, $IC);  

    // Query database for the user
    $sql = "SELECT * FROM convoq WHERE gradIC = '$IC'"; // Fix: use $IC instead of $icNumber
    $result = mysqli_query($mysqli, $sql); // Fix: use $mysqli instead of mysql

    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            // Store the result in session
            $_SESSION['gradID'] = $row;
            // Redirect to result.php
            header("Location: result.php");
            exit(); // Important: stop further execution
        } else {
            echo "No results found.";
        }
    } else {
        echo "Error in query: " . mysqli_error($mysqli);
    }
}
?>
