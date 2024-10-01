<?php 
session_start();
require 'connection.php';

$graduationInfo = ''; 
$rfidNO = '';

// Check if RFID number is submitted
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
                $graduationInfo .= "<div class='info-box'>";
                $graduationInfo .= "<p><strong>Number:</strong> " . $row['gradID'] . "</p>";
                $graduationInfo .= "<p><strong>Name:</strong> " . $row['gradName'] . "</p>";
                $graduationInfo .= "<p><strong>IC Number:</strong> " . $row['gradIC'] . "</p>";
                $graduationInfo .= "<p><strong>Registration Number:</strong> " . $row['registrationNO'] . "</p>";
                $graduationInfo .= "<p><strong>Program:</strong> " . $row['gradProgram'] . "</p>";
                $graduationInfo .= "<p><strong>RFID:</strong> " . $row['rfidNO'] . "</p>";
                $graduationInfo .= "</div>";
            }
        } else {
            $graduationInfo = "No records found for the scanned RFID.";
        }
    } else {
        $graduationInfo = "Error in query: " . $mysqli->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RFID Scan</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #e9ecef;
            margin: 0;
            padding: 40px;
        }

        h2 {
            text-align: center;
            margin-bottom: 30px;
            color: #343a40;
        }

        .form-container {
            background: #ffffff;
            border-radius: 8px;
            padding: 30px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            margin-bottom: 20px;
        }

        .form-container label {
            font-weight: bold;
            margin-bottom: 10px;
            display: block;
            color: #495057;
        }

        .form-container input[type="text"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ced4da;
            border-radius: 4px;
            font-size: 16px;
            transition: border 0.3s;
        }

        .form-container input[type="text"]:focus {
            border-color: #007bff;
            outline: none;
        }

        .info-box {
            background: #f8f9fa;
            border: 1px solid #ced4da;
            border-radius: 5px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            color: #343a40;
        }

        .back-button-container {
            text-align: center;
            margin-top: 20px;
        }

        .back-button {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s;
        }

        .back-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h2>RFID Scan</h2>

    <!-- Form to submit RFID input -->
    <div class="form-container">
        <label for="rfidNumber">RFID Number:</label>
        <input type="text" name="rfidNumber" id="rfidNumber" placeholder="Scan RFID" required autofocus>
    </div>

    <!-- Graduation Information Output -->
    <div id="graduationInfo" style="<?php echo empty($graduationInfo) ? 'display:none;' : 'display:block;'; ?>">
        <?php echo $graduationInfo; ?>
    </div>

    <!-- Back Button -->
    <div class="back-button-container">
        <a href="dashboard.php" class="back-button">Back</a>
    </div>

    <script>
    document.getElementById('rfidNumber').addEventListener('input', function() {
        var rfidNumberValue = this.value;
        if (rfidNumberValue.length > 0) {
            // Use Fetch API to send rfid value to the server and get response
            fetch('fetch_data.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'rfidNumber=' + encodeURIComponent(rfidNumberValue)
            })
            .then(response => response.text())
            .then(data => {
                // Update the graduationInfo div with the received data
                document.getElementById('graduationInfo').innerHTML = data;
                document.getElementById('graduationInfo').style.display = 'block'; // Show the info
                
                // Clear the input box after fetching the data
                document.getElementById('rfidNumber').value = ''; 
            })
            .catch(error => console.error('Error:', error));
        } else {
            document.getElementById('graduationInfo').style.display = 'none'; // Hide if empty
        }
    });
</script>
</body>
</html>
