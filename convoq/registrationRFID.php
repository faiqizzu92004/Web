<?php 
session_start();
include 'connection.php';

// Initialize alert message variable
$alertMessage = "";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve submitted form
    $IC = $_POST['icNumber'];

    // Sanitize to prevent SQL injection
    $IC = mysqli_real_escape_string($mysqli, $IC);  

    // Query database for the user
    $sql = "SELECT * FROM GRADUATION_LIST WHERE gradIC = '$IC'";
    
    $result = mysqli_query($mysqli, $sql);

    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            // Store the result in session
            $_SESSION['gradID'] = $row;
            header("Location: resultRFID.php");
            exit();
        } else {
            // Set alert message for no results found
            $alertMessage = "No results found for the provided IC number.";
        }
    } else {
        $alertMessage = "Error in query: " . mysqli_error($mysqli) . " SQL: " . $sql;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Graduate</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 400px;
            margin: auto;
            background: white;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            padding: 20px;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"], .back-button button {
            background-color: #28a745;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
        }

        input[type="submit"]:hover, .back-button button:hover {
            background-color: red;
        }

        .alert {
            color: red;
            text-align: center;
            margin-top: 10px;
        }

        .back-button {
            margin-top: 15px;
        }

        .back-button a {
            text-decoration: none;
            color: white;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Search Graduate(RFID)</h2>
    <form method="post" action="">
        <label for="icNumber">IC Number:</label>
        <input type="text" name="icNumber" id="icNumber" required placeholder="Enter IC Number">
        <input type="submit" value="Search">
    </form>

    <?php if ($alertMessage): ?>
        <div class="alert"><?php echo $alertMessage; ?></div>
    <?php endif; ?>
  

        <div class="back-button">
            <a href="reg.php">
                <button>Register</button>
            </a>
        </div>



    <div class="back-button ">
        <a href="option.php">
            <button>Back</button>
        </a>
    </div>
</div>

</body>
</html>



