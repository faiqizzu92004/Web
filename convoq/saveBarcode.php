<?php
session_start();
require 'connection.php';

if (isset($_POST['submit'])) {
    // Retrieve the data
    $barcodeNo = $_POST['barcodeNo'];
    $gradID = $_POST['gradID'];

    // Sanitize inputs
    $barcodeNo = $mysqli->real_escape_string($barcodeNo);
    $gradID = intval($gradID); // Assuming gradID is an integer

    // Basic validation for barcode
    if (empty($barcodeNo)) {
        echo "<script>alert('Barcode number cannot be empty.'); window.history.back();</script>";
        exit;
    }

    // Update the database
    $sql = "UPDATE GRADUATION_LIST SET barcode = '$barcodeNo' WHERE gradID = $gradID";

    if ($mysqli->query($sql) === TRUE) {
        echo "<script>alert('Updated successfully.'); window.location.href='registrationBarcode.php';</script>";
    } else {
        echo "<script>alert('Error updating record: " . $mysqli->error . "'); window.history.back();</script>";
    }
} else {
    echo "<script>alert('Invalid request.'); window.location.href='registrationBarcode.php';</script>";
}
?>
