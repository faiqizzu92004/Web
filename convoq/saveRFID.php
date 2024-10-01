<?php
session_start();
require 'connection.php';

if (isset($_POST['submit'])) {
    // Retrieve the data
    $rfidNO = $_POST['rfidNO'];
    $gradID = $_POST['gradID'];

    // Sanitize inputs
    $rfidNO = $mysqli->real_escape_string($rfidNO);
    $gradID = intval($gradID); // Assuming gradID is an integer

    // Insert into the database
    $sql = "UPDATE GRADUATION_LIST SET rfidNO = '$rfidNO' WHERE gradID = $gradID ";
    
    if ($mysqli->query($sql) === TRUE) {
        echo "<script>alert('Updated successfully.'); window.location.href='registration.php';</script>";

    } else {
        echo "Error: " . $mysqli->error;
    }
}
?>
