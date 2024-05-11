<?php
 session_start();
 if(!isset($_SESSION['email'])){
    header("location:../login.php");
    die();
 }
 $email = $_SESSION['email'];
 include '../connection/connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }
        
        .container {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            display: grid;
            grid-template-columns: 1fr 3fr;
            grid-gap: 20px;
        }
        a{
            padding: 5px 10px;
            text-decoration:none;
            border:1px solid;
        }
        .profile {
            text-align: center;
        }
        
        .profile img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            margin-bottom: 20px;
        }
        
        .profile p {
            margin: 5px 0;
        }
        
        .aside {
            background-color: #f2f2f2;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        
        .aside img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin-bottom: 10px;
        }
        
        .logout {
            display:flex;
            flex-wrap:wrap;
            gap:10px;
            margin-top: 20px;
        }
        .footer {
            background-color: #333;
            color: #fff;
            padding: 20px 0;
            text-align: center;
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        @media screen and (max-width: 600px) {
            .footer {
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
<?php
$query = " SELECT * FROM `register` WHERE `email` like '$email' ";
$run = mysqli_query($conn,$query);
 if($run){
    $row = $run->fetch_assoc();
?>
<div class="container">
    <aside class="aside">
        <div class="profile">
            <img src="../assets/profile.jpeg" alt="Profile Photo">
            <p><?php echo $row['email'];?></p>
        </div>
        <div class="logout">
            <a href="upload_book.php">Sell Book</a>
            <a href="../logout.php">Logout</a> 
        </div>
    </aside>
    <main>
        <h1>Profile</h1>
        <p><strong>Name:</strong> <?php echo $row['username'];?></p>
        <p><strong>Contact:</strong> <?php echo $row['contact'];?></p>
        <p><strong>Address:</strong> <?php echo $row['address'];?></p>
    </main>
</div>
<?php
 }
?>
<footer class="footer">
    <p>&copy; 2024 Designed & Developed by Team MasterSoft ❤️. All rights reserved.</p>
</footer>
</body>
</html>