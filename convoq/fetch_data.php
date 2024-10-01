<?php
session_start();
require 'connection.php';

// Check if RFID number is provided
if (isset($_POST['rfidNumber'])) {
    $rfidNO = $_POST['rfidNumber'];

    // Sanitize the RFID input
    $rfidNO = $mysqli->real_escape_string($rfidNO);

    // Construct the SQL query to get data based on RFID number
    $sql = "SELECT * FROM GRADUATION_LIST WHERE rfidNO = '$rfidNO'"; 
    $result = $mysqli->query($sql);

    if ($result) {
        if ($result->num_rows > 0) {
            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                echo "<div class='info-box'>";
                echo "<p><strong>Number:</strong> " . $row['gradID'] . "</p>";
                echo "<p><strong>Name:</strong> " . $row['gradName'] . "</p>";
                echo "<p><strong>IC Number:</strong> " . $row['gradIC'] . "</p>";
                echo "<p><strong>Registration Number:</strong> " . $row['registrationNO'] . "</p>";
                echo "<p><strong>Program:</strong> " . $row['gradProgram'] . "</p>";
                echo "<p><strong>RFID :</strong> " . $row['rfidNO'] . "</p>";
                echo "</div>";
            }
        } else {
            echo "No records found for the scanned RFID.";
        }
    } else {
        echo "Error in query: " . $mysqli->error;
    }
}
?>
