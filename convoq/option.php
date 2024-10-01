<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Choose Option</title>
    <style>
        body {
            background-color: #f4f4f4;
        }
        .option-container {
            margin-top: 100px;
            text-align: center;
        }
        .btn-custom {
            width: 200px;
            margin: 20px;
            font-size: 18px;
        }
    </style>
</head>
<body>
    <div class="container option-container">
        <h2>Select an Option</h2>
        <div>
            <a href="registrationRFID.php" class="btn btn-success btn-custom">RFID</a>
            <a href="registrationBarcode.php" class="btn btn-primary btn-custom">BARCODE</a>
        </div>
        <div class="mt-4">
            <a href="dashboard.php" class="btn btn-secondary btn-custom">Back</a>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
