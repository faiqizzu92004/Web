<?php 
session_start();
require 'connection.php';

$graduationInfo = ''; 
$barcode = '';

// Check if barcode number is submitted
if (isset($_POST['barcode'])) {
    $barcode = $_POST['barcode'];

    // Sanitize the barcode input
    $barcode = $mysqli->real_escape_string($barcode);

    // Construct the SQL query to get data based on barcode number
    $sql = "SELECT * FROM GRADUATION_LIST WHERE barcode = '$barcode'"; 
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
                $graduationInfo .= "<p><strong>Barcode:</strong> " . $row['barcode'] . "</p>";
                $graduationInfo .= "</div>";
            }
        } else {
            $graduationInfo = "No records found for the scanned barcode.";
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
    <title>Barcode Scan</title>
    <link rel="stylesheet" href="style.css">
    <style>
        /* Your existing styles */
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
    <h2>Barcode Scan</h2>

    <!-- Form to submit barcode input -->
    <div class="form-container">
        <label for="barcode">Barcode Number:</label>
        <input type="text" name="barcode" id="barcode" placeholder="Scan Barcode" required autofocus>
    </div>

    <!-- Graduation Information Output -->
    <div id="graduationInfo" style="display:none;"></div>

    <!-- Back Button -->
    <div class="back-button-container">
        <a href="dashboard.php" class="back-button">Back</a>
    </div>

    <script>
    document.getElementById('barcode').addEventListener('input', function() {
        var barcodeValue = this.value;
        if (barcodeValue.length > 0) {
            // Use Fetch API to send barcode value to the server and get response
            fetch('fetch_data_barcode.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'barcode=' + encodeURIComponent(barcodeValue)
            })
            .then(response => response.text())
            .then(data => {
                // Update the graduationInfo div with the received data
                document.getElementById('graduationInfo').innerHTML = data;
                document.getElementById('graduationInfo').style.display = 'block'; // Show the info
                
                // Clear the input box after fetching the data
                document.getElementById('barcode').value = ''; 
            })
            .catch(error => console.error('Error:', error));
        } else {
            document.getElementById('graduationInfo').style.display = 'none'; // Hide if empty
        }
    });
</script>

</body>
</html>

