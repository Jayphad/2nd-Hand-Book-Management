<?php
 session_start();
 if(!isset($_SESSION['email'])){
    header("location:../login.php");
    die();
 }
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Book Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            padding: 20px;
            margin: 0;
        }
        h1 {
            color: #333;
        }
        form {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            margin: 20px auto;
        }
        label {
            display: block;
            margin: 15px 0 5px;
            font-weight: bold;
            color: #555;
        }
        input[type="text"],
        input[type="number"],
        select,
        textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box; /* Includes padding and border in the element's width and height */
            margin-top: 5px;
        }
        input[type="file"] {
            margin-top: 5px;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 20px 0;
            cursor: pointer;
            border-radius: 4px;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        textarea {
            resize: vertical; /* Allows vertical resize only */
        }
    </style>
</head>
<body>
    <h1>Book Details Form</h1>
    <form action="" method="POST" enctype="multipart/form-data">
        <label for="title">Book Title:</label>
        <input type="text" id="title" name="title" required><br><br>

        <label for="author">Author:</label>
        <input type="text" id="author" name="author" required><br><br>

        <label for="year">Publication Year:</label>
        <input type="number" id="year" name="year" required><br><br>

        <label for="genre">Genre:</label>
        <select id="genre" name="genre">
            <option value="ENGINEERING">ENGINEERING BOOK</option>
            <option value="MEDICAL">MEDICAL BOOK</option>
            <option value="STORYBOOK">STORY BOOK</option>
            <option value="CRIMEBOOK">CRIME BOOK</option>
            <option value="MOTIVATIONALBOOK">MOTIVATIONAL BOOK</option>
            <option value="SSC">SSC BOOK</option>
            <option value="HSC">HSC BOOK</option>
            <option value="NEWSPAPERS">NEWSPAPERS</option>
            <option value="MAGAZINES">MAGAZINES</option>
            
        </select><br><br>

        <label for="price">Price:</label>
        <input type="number" id="price" name="price" required><br><br>

        <label for="discount">Discount:</label>
        <input type="number" id="discount" name="discount" required><br><br>

        <label for="condition">Condition:</label>
        <select id="condition" name="condition">
            <option value="bad">Bad</option>
            <option value="good" selected>Good</option>
            <option value="better">Better</option>
            <option value="best">Best</option>
        </select><br><br>

        <label for="cover">Book Cover Image:</label>
        <input type="file" id="cover" name="cover" accept="image/*" required><br><br>

        <input type="submit" name="upload" value="Upload Book Details">
    </form>
</body>
</html>
<?php
    if(isset($_POST['upload'])){
        include "../connection/connection.php";
        $email = $_SESSION['email'];
        $title = $conn->real_escape_string($_POST['title']);
        $author = $conn->real_escape_string($_POST['author']);
        $year = intval($_POST['year']); 
        $genre = $conn->real_escape_string($_POST['genre']);
        $price = $conn->real_escape_string($_POST['price']);
        $discount = $conn->real_escape_string($_POST['discount']);
        $condition = $conn->real_escape_string($_POST['condition']);
        $cover = $_FILES['cover']['name'];
        $cover_tem_loc = $_FILES['cover']['tmp_name'];
        $cover_store = "../data/cover/".$cover;
        move_uploaded_file($cover_tem_loc,$cover_store);

        $sql = "INSERT INTO `books`(`id`, `uploadedby`, `title`, `author`, `year`, `genre`, `price`, `discount`, `condition`, `cover`) VALUES ('','$email','$title','$author','$year','$genre','$price','$discount','$condition','$cover')";

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('New record created successfully');</script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

    }
?>
