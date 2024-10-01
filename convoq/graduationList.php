<?php 
include "connection.php";
session_start();

$sql = "SELECT * FROM GRADUATION_LIST";
$result = $mysqli->query($sql);
if(!$result){
    echo "Error in query: " . $mysqli->error;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Graduation Information</title>
    <style>
        .bg-white-custom {
            background-color: white;
            padding: 30px; /* Increase padding for more space */
            border-radius: 10px; /* Optional: Rounded corners */
        }
    </style>
</head>
<body class="bg-dark text-white">
    <div class="container mt-5">
        <div class="bg-white-custom">
            <div class="card">
            <div class="card-header text-center" style="background-color: white; color: black;">
                <h2>Graduation Information</h2>
            </div>

                <div class="card-body">
                    <table class="table table-striped table-bordered table-hover text-center">
                        <thead class="thead-dark">
                            <tr>
                                <th>Graduation ID</th>
                                <th>Name</th>
                                <th>IC Number</th>
                                <th>No Pendaftaran</th>
                                <th>Program</th>
                                <th>RFID</th>
                                <th>Barcode</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            while($row = mysqli_fetch_assoc($result)){
                            ?>
                            <tr>
                                <td><?php echo $row['gradID']; ?></td>
                                <td><?php echo $row['gradName']; ?></td>
                                <td><?php echo $row['gradIC']; ?></td>
                                <td><?php echo $row['registrationNO']; ?></td>
                                <td><?php echo $row['gradProgram']; ?></td>
                                <td><?php echo $row['rfidNO']; ?></td>
                                <td><?php echo $row['barcode']; ?></td>
                                <td>
                                    <a href="edit.php?gradID=<?php echo $row['gradID']; ?>" class="btn btn-primary btn-sm">Update</a>
                                    <a href="delete.php?gradID=<?php echo $row['gradID']; ?>" class="btn btn-danger btn-sm">Delete</a>
                                </td>
                            </tr>
                            <?php 
                            }
                            ?>
                        </tbody>
                        
        </a>
    </div>
                    </table>
                    <div class="back-button">
                            <a href="dashboard.php">
                        <button>Back</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
