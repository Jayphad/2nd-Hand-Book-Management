<?php 
    if(!isset($_GET['seller'])){
        echo "<script> history.back();</script>";
    }

   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Details</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .book-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            width: 350px;
        }

        .book-container h1 {
            color: #2c3e50;
            font-size: 24px;
        }

        .book-container img {
            width: 50%;
            border-radius: 8px;
            margin-top: 10px;
            margin-bottom: 20px;
        }

        .book-container p {
            font-size: 16px;
            line-height: 1.5;
        }

    </style>
</head>
<body>
    <div class="book-container">
        <?php
        include "../connection/connection.php";
        $email = base64_decode($_GET['seller']);
     
        $query = "SELECT * FROM `register` WHERE `email`='$email'";
        $run = mysqli_query($conn,$query);
            if($run){
                if($run->num_rows > 0){
                    $row = $run->fetch_assoc();
                    ?>
                    <p><strong>Seller Name:</strong> <?php echo $row['username'];?></p>
                    <p><strong>Email:</strong> <a href="mailto:<?php echo $row['email'];?>"><?php echo $row['email'];?></a></p>
                    <p><strong>Contact:</strong> <a href="tel:+91<?php echo $row['contact'];?>"><?php echo $row['contact'];?></a></p>
                    <p><strong>Address:</strong> <?php echo $row['address'];?></p>
                    <?php
                }
                else{
                    echo "No records found";
                }
            }
            else{
                echo "Something is wrong";
            }
        ?>
        
    </div>
</body>
</html>
