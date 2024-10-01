<?php 
session_start();
require 'connection.php';

// Check if gradID is set in the session
if (isset($_SESSION['gradID'])) {
    // Extract the gradID from the session array
    $gradID = $_SESSION['gradID']['gradID']; 
    
    // Sanitize gradID if it's an integer
    $gradID = intval($gradID); // Assuming gradID is an integer

    // Construct the SQL query
    $sql = "SELECT * FROM GRADUATION_LIST WHERE gradID = $gradID"; 
    $result = $mysqli->query($sql);

    if ($result) {
        if ($result->num_rows > 0) {
            echo "<h2>Graduation Information</h2>"; // Heading for Graduation Information
            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                echo "<div class='info-box'>";
                echo "<p><strong>Number:</strong> " . $row['gradID'] . "</p>";
                echo "<p><strong>Name:</strong> " . $row['gradName'] . "</p>";
                echo "<p><strong>IC Number:</strong> " . $row['gradIC'] . "</p>";
                echo "<p><strong>Registration Number:</strong> " . $row['registrationNO'] . "</p>";
                echo "<p><strong>Program:</strong> " . $row['gradProgram'] . "</p>";
                echo "</div>";
            }
        } else {
            echo "No records found.";
        }
    } else {
        echo "Error in query: " . $mysqli->error;
    }
} else {
    echo "No gradID found in session.";
}
?>



<!-- Form to submit additional input -->
<div class="form-container">
    <form action="saveRFID.php" method="post">
        <label for="rfidNumber">RFID Number:</label>
        <input type="text" name="rfidNO" id="rfidNO" placeholder="Enter RFID" required autofocus>
        <input type="hidden" name="gradID" value="<?php echo $gradID; ?>"> <!-- Hidden input to send gradID -->
        <button class="btn" type="submit" name="submit">Submit</button>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Automatically focus on the RFID input when the page loads
        document.getElementById('rfidNO').focus();
    });
</script>


<!-- Back Button -->
<div class="back-button-container">
    <a href="registrationRFID.php" class="back-button">Back</a> <!-- Update "previous_page.php" to the actual page you want to return to -->
</div>

<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 20px;
    }

    .info-box {
        background: white;
        border: 1px solid #ccc;
        border-radius: 5px;
        padding: 20px;
        margin-bottom: 20px;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }

    .info-box h3 {
        margin-top: 0;
        color: #333;
    }

    .info-box p {
        color: #555;
        line-height: 1.6;
    }

    .form-container {
        background: white;
        border: 1px solid #ccc;
        border-radius: 5px;
        padding: 20px;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }

    .form-container label {
        display: block;
        margin-bottom: 10px;
        font-weight: bold;
    }

    .form-container input[type="text"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    .btn {
        background-color: #28a745;
        color: white;
        padding: 10px 15px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    .btn:hover {
        background-color: #218838;
    }

    /* Style for Back Button */
    .back-button-container {
        margin-bottom: 20px;
    }

    .back-button {
        display: inline-block;
        padding: 10px 15px;
        background-color: #007bff;
        color: white;
        text-decoration: none;
        border-radius: 4px;
        margin-bottom: 20px;
    }

    .back-button:hover {
        background-color: #0056b3;
    }
</style>
