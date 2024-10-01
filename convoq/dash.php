<?php
session_start();

// Include the database connection file
require_once 'connection.php';

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the submitted username and password
    $userName = $_POST['userName'];
    $password = $_POST['password'];

    // Sanitize the input to prevent SQL injection
    $userName = mysqli_real_escape_string($mysqli, $userName);

    // Query the database for the user
    $sql = "SELECT * FROM user WHERE userName = '$userName'";
    $result = mysqli_query($mysqli, $sql);

    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);

            // Verify password (assuming passwords are not hashed for this example)
            if ($password === $row['password']) {
         
                if ($userName === $row['userName']) {
                    $_SESSION['userID'] = $row['userID'];
                    header("Location: dashboard.php");
                    exit();
                } else {
                     // Incorrect password
                    echo "<script>alert('Incorrect password.'); window.location.href='login.php';</script>";
                    exit();
                }
            } else {
                echo "<script>alert('Incorrect password.'); window.location.href='login.php';</script>";
                    exit();
               
            }
        } else {
            // User not found
            echo "<script>alert('User not found.'); window.location.href='login.php';</script>";
            exit();
        }
    } else {
        // SQL query error
        echo "Error: " . mysqli_error($mysqli);
    }
}

// Close the database connection
mysqli_close($mysqli);
?>
