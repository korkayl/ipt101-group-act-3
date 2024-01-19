<?php
    session_start();
    include("db.php");

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $firstname = $_POST['fname'];
        $last_name = $_POST['lname'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        if (!empty($email) && !empty($password) && !is_numeric($email)) {
            $query = "INSERT INTO form (fname, lname, email, password) VALUES ('$firstname', '$last_name', '$email', '$password')";
            mysqli_query($con, $query);
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <img src="img/sv.png" style="height:150px;"/>
        <form method="POST">
            <label>First Name:</label>
            <input type="text" name="fname" required>  

            <label>Last Name:</label>
            <input type="text" name="lname" required>

            <label>Email:</label>
            <input type="email" name="email" required>
            
            <label>Password:</label>
            <input type="password" name="password" required>
            
            <input type="submit" value="Sign Up">
        </form>
        <p>Already have an account? <a href="login.php">Login here</a></p>
    </div>
</body>
</html>
