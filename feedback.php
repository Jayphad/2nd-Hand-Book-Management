<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback</title>
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
        }
        
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        
        .contact-form {
            margin-bottom: 20px;
        }
        
        .contact-form input[type="text"],
        .contact-form input[type="email"],
        .contact-form textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        
        .contact-form textarea {
            height: 100px;
        }
        
        .contact-form input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 15px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        
        .contact-info {
            text-align: center;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Feedback</h1>
    
    <form class="contact-form" action="" method="post">
        <input type="text" name="name" placeholder="Your Name" required>
        <input type="email" name="email" placeholder="Your Email" required>
        <textarea name="message" placeholder="Your Message" required></textarea>
        <input type="submit" name="submit" value="Send Message">
    </form>
    
    <div class="contact-info">
        <h2>Contact Information</h2>
        <p><strong>Email:</strong><a href="mailto: booklab5121@gmail.com"> booklab5121@gmail.com</a></p>
        <p><strong>Phone:</strong><a href="tel:+91 9552733780">9552733780</a></p>
        <p><strong>Address:</strong> <a href="https://maps.app.goo.gl/XxHj2Que4og2Uq7g9">Avcoe sangamner,422605</a></p>
    </div>
</div>

</body>
</html>
<?php

if(isset($_POST['submit'])){
    include 'connection/connection.php';
    $name = $_POST['name'];
    $email = $_POST['email'];
    $msg = $_POST['message'];

    $query = "INSERT INTO `feedback`(`id`, `username`, `email`, `msg`) VALUES ('','$name','$email','$msg')";
    if(mysqli_query($conn,$query)){
        echo "<script>alert('Feedback Sent successfully');</script>";
    }
    else{
        echo "<script>alert('something went wrong');</script>";
    }
}
?>