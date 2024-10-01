<?php
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
$gradName = test_input($_POST['gradName']);
$gradIC = test_input($_POST['gradIC']);
$registrationNO = test_input($_POST['registrationNO']);
$gradProgram = test_input($_POST['gradProgram']);



        // Insert the new record if email doesn't exist
        $sql = "INSERT INTO GRADUATION_LIST (gradID,gradName,gradIC,registrationNO,gradProgram,rfidNO) VALUES ('','$gradName', '$gradIC', '$registrationNO','$gradProgram','')";
        $result = mysqli_query($mysqli, $sql);

        if ($result) {
            echo "<script type='text/javascript'> alert('Records inserted successfully.'); window.location.href='registration.php';</script>";
        } else {
           
                echo "<script type='text/javascript'> alert('ERROR: Could not execute the query.'); </script>";
            
        }
    }
  
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;

}

?>