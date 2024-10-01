<?php
session_start();

// Check if logout form is submitted
if(isset($_POST['logout'])) {
    // Check if user is logged in
    if(isset($_SESSION['userID'])) {
        // Unset specific session variable
        unset($_SESSION['userID']);


        // Destroy the session
        session_destroy();

        // Redirect to login page
        header('Location: login.php');
        exit; // Ensure no further execution
    } else {
        // If user is not logged in, handle accordingly (optional)
        echo "User not logged in!";
    }
} else {
    // Redirect to login page if accessed directly without logout form submission
    header('Location: login.php');
    exit;
}
?>
