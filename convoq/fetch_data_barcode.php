<?php
session_start();
require 'connection.php';

// Check if RFID number is provided
if (isset($_POST['barcode'])) {
    $barcode = $_POST['barcode'];

    // Sanitize the RFID input
    $barcode = $mysqli->real_escape_string($barcode);

    // Construct the SQL query to get data based on RFID number
    $sql = "SELECT * FROM GRADUATION_LIST WHERE barcode = '$barcode'"; 
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
                echo "<p><strong>Barcode :</strong> " . $row['barcode'] . "</p>";
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
