<?php
 session_start();
 if(isset($_SESSION['email'])){
    header("location:index.php");
    die();
 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }
        
        .container {
            max-width: 400px;
            margin: 100px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
        }
        
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        
        input[type="text"],input[type="tel"], input[type="password"], input[type="email"] {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }
        
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: none;
            background-color: #4CAF50;
            color: #fff;
            cursor: pointer;
            font-size: 16px;
        }
        
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        
        @media screen and (max-width: 480px) {
            .container {
                max-width: 90%;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Register</h2>
        <form method="post">
            <input type="text" name="username" placeholder="Fullname" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="tel" name="contact" placeholder="Contact" required>
            <input type="text" name="address" placeholder="Address" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="submit" name="submit" value="Register">
            <p>Already have account? <a href="login.php">login</a></p>
        </form>
    </div>
</body>
</html>

<?php
if (isset($_POST['submit'])) {
    include "connection/connection.php";
    $username =$_POST['username'];
    $contact =$_POST['contact'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $address = $_POST['address'];

    $check_query = "SELECT * FROM `register` WHERE `email`='$email' ";
    $check_result = mysqli_query($conn,$check_query);

    if ($check_result->num_rows > 0) {
        echo "<script>alert('Email already exists. Please choose a different email');</script>";
    } else {
        $insert_query = "INSERT INTO `register`(`id`, `username`, `email`,`contact`,`address`,`password`) VALUES ('','$username','$email','$contact','$address','$password')";
        mysqli_query($conn,$insert_query);
        header("location:login.php");
    }
}
?>