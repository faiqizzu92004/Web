<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="register.css">
    <title>Registration</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        .testbox {
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            padding: 40px;
            max-width: 400px;
            margin: auto;
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
            color: #343a40;
        }

        input[type="text"], input[type="submit"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ced4da;
            border-radius: 4px;
            font-size: 16px;
            transition: border 0.3s;
        }

        input[type="text"]:focus {
            border-color: #007bff;
            outline: none;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        
    </style>
</head>
<body>
    <div class="testbox">
        <h1>Registration</h1>

        <form action="add_user.php" method="post">
            <input type="text" name="gradName" id="gradName" placeholder="Enter Name" required/>
            <input type="text" name="gradIC" id="icNO" placeholder="IC Number" required/>
            <input type="text" name="registrationNO" id="registrationNO" placeholder="Enter Registration Number" required/>
            <input type="text" name="gradProgram" id="gradProgram" placeholder="Enter Program" required/>
            <input type="submit" value="Register" name="submit">
        </form>
        <div class="back-button">
                            <a href="registration.php">
                        <button>Back</button>
                </div>
    </div>
</body>
</html>
