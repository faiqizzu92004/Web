<?php
include 'connection.php';

if (isset($_GET['gradID'])) {
    $gradID = $_GET['gradID'];

    // Sanitize the gradID to prevent SQL injection
    $gradID = mysqli_real_escape_string($mysqli, $gradID);

    // Corrected DELETE query
    $delete = mysqli_query($mysqli, "DELETE FROM GRADUATION_LIST WHERE gradID = '$gradID'");

    if ($delete) {
        echo "<script>alert('Profile Deleted successfully.'); window.location.href='graduationList.php';</script>";
        die();
    } else {
        echo "Error deleting the user: " . mysqli_error($mysqli);
    }
} else {
    echo "No gradID provided.";
}
?>
