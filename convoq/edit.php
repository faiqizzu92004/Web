<?php
include 'connection.php'; // Include your database connection file
session_start();

// Check if gradID is set in the URL
if (isset($_GET['gradID'])) {
    // Get the user ID 
    $gradID = $_GET['gradID'];

    // Fetch user data from the database
    $result = mysqli_query($mysqli, "SELECT * FROM GRADUATION_LIST WHERE gradID = $gradID");
    if (!$result) {
        die('Error fetching user data: ' . mysqli_error($mysqli));
    }
    $row = mysqli_fetch_assoc($result); // Fetch user data as associative array

    // Check if the form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve the updated form data
        $newName = mysqli_real_escape_string($mysqli, $_POST['newName']);
        $newIC = mysqli_real_escape_string($mysqli, $_POST['newIC']);
        $newReg = mysqli_real_escape_string($mysqli, $_POST['newReg']);
        $newProgram = mysqli_real_escape_string($mysqli, $_POST['newProgram']);

        // Update query
        $update_query = "UPDATE GRADUATION_LIST SET gradName='$newName', gradIC='$newIC', registrationNO='$newReg', gradProgram='$newProgram' WHERE gradID=$gradID";

        // Execute the update query
        if (mysqli_query($mysqli, $update_query)) {
            // Success message or redirect to profile page
            echo "<script>alert('Profile updated successfully.'); window.location.href='graduationList.php';</script>";
            exit();
        } else {
            // Error message
            echo "Error updating record: " . mysqli_error($mysqli);
        }
    }
} else {
    echo "<script>alert('No Graduation ID provided.'); window.location.href='graduationList.php';</script>";
    exit();
}

// Close database connection
mysqli_close($mysqli);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Edit Profile</title>
    <style>
        body {
            background-color: #f8f9fa; /* Light background color */
        }
        .container {
            margin-top: 50px; /* Space from the top */
        }
        .card {
            border-radius: 10px; /* Rounded corners */
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1); /* Subtle shadow */
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card p-4">
            <h2 class="text-center mb-4">Edit Graduation Information</h2>
            <form method="post">
                <!-- Hidden input field for gradID -->
                <input type="hidden" name="gradID" value="<?php echo htmlspecialchars($row['gradID']); ?>">

                <!-- Form Group (Name) -->
                <div class="mb-3">
                    <label class="small mb-1" for="inputName">Name</label>
                    <input class="form-control" id="inputName" type="text" name="newName" placeholder="Enter New Name" value="<?php echo htmlspecialchars($row['gradName']); ?>" required>
                </div>

                <!-- Form Row (IC Number and Registration Number) -->
                <div class="row gx-3 mb-3">
                    <div class="col-md-6">
                        <label class="small mb-1" for="inputIC">IC Number</label>
                        <input class="form-control" id="inputIC" type="text" name="newIC" placeholder="Enter New IC Number" value="<?php echo htmlspecialchars($row['gradIC']); ?>" required>
                    </div>
                    <div class="col-md-6">
                        <label class="small mb-1" for="inputReg">Registration Number</label>
                        <input class="form-control" id="inputReg" type="text" name="newReg" placeholder="Enter New Registration Number" value="<?php echo htmlspecialchars($row['registrationNO']); ?>" required>
                    </div>
                </div>

                <!-- Form Group (Program) -->
                <div class="mb-3">
                    <label class="small mb-1" for="inputProgram">Program</label>
                    <input class="form-control" id="inputProgram" type="text" name="newProgram" placeholder="Enter New Program" value="<?php echo htmlspecialchars($row['gradProgram']); ?>" required>
                </div>

                <!-- Save changes button -->
                <button type="submit" class="btn btn-primary btn-block">Save Changes</button>
                
                <!-- Back button -->
                <a href="graduationList.php" class="btn btn-secondary btn-block mt-3">Back</a>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
