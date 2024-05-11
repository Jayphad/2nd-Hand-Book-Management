<?php
 session_start();
 if(!isset($_SESSION['email'])){
    header("location:login.php");
    die();
 }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booklab</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 10px;
        }

        .navbar {
            display: flex;
            flex-direction: row;
            align-items: center;
            background-color: #333;
            overflow: hidden;
        }

        .navbar img {
            height: 50px;
            margin-top: 5px;
            margin-left: 20px;
            float: left;
        }

        .navbar a {
            float: left;
            display: block;
            color: #f2f2f2;
            text-align: center;
            padding: 14px 20px;
            text-decoration: none;
        }

        .navbar a:hover {
            background-color: #ddd;
            color: black;
        }

        .navbar a.active {
            background-color: #4CAF50;
            color: white;
        }

        .navbar .icon {
            display: none;
        }

        @media screen and (max-width: 600px) {
            .navbar {
                display: block;
            }

            .navbar a:not(:first-child) {
                display: none;
            }

            .navbar a.icon {
                float: right;
                display: block;
            }

            .navbar img {
                float: none;
                margin: 5px auto;
                display: block;
            }
        }

        @media screen and (max-width: 600px) {
            .navbar.responsive {
                position: relative;
            }

            .navbar.responsive .icon {
                position: absolute;
                right: 0;
                top: 0;
            }

            .navbar.responsive a {
                float: none;
                display: block;
                text-align: left;
            }
        }

        main{
            display: flex;
            flex-direction: row;
            align-items: center;
            /* place-content: center; */
            flex-wrap: wrap;
            gap: 15px;
        }


        .card {
            max-width: 200px;
            height: 350px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin: 20px auto;
            overflow: hidden;
            position:relative;
        }

        .card img {
            width: 100%;
            height: auto;
            border-radius: 10px 10px 0 0;
        }

        .card-content {
            padding: 20px;
            position:absolute;
            bottom: 0px;
        }

        .card-title {
            font-size: 20px;
            margin-bottom: 10px;
        }

        .card-text {
            font-size: 16px;
            color: #555;
        }

        .footer {
            background-color: #333;
            color: #fff;
            padding: 20px 0;
            text-align: center;
            /* position: fixed;
            bottom: 0; */
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

    <div class="navbar" id="myNavbar">
        <a href="#"><img src="assets/icons/logo.png" alt="Logo"></a>
        <a href="#" class="active">Home</a>
        <!-- <a href="login.php">Login</a>
        <a href="register.php">Register</a> -->
        <a href="feedback.php">Feedback</a>
        <a href="about-us.html">About</a>
        <a href="profile/">Profile</a>
        <a href="help.html">Help</a>

        <a href="javascript:void(0);" class="icon" onclick="toggleNavbar()">
            &#9776;
        </a>
    </div>

    <main>
        <div class="card" onclick="location.href='pages/engineering-books.php';">
            <img src="assets/Engineering.jpg" alt="Card Image">
            <div class="card-content">
                <h2 class="card-title">ENGINEERING</h2>
            </div>
        </div>
        <div class="card" onclick="location.href='pages/medical.php';">
            <img src="assets/medical1.png" alt="Card Image">
            <div class="card-content">
                <h2 class="card-title">MEDICAL</h2>
            </div>
        </div>
        <div class="card" onclick="location.href='pages/hsc.php';">
            <img src="assets/Hsc.jpg" alt="Card Image">
            <div class="card-content">
                <h2 class="card-title">HSC</h2>
            </div>
        </div>
        <div class="card" onclick="location.href='pages/ssc.php';">
            <img src="assets/Hsc.jpg" alt="Card Image">
            <div class="card-content">
                <h2 class="card-title">SSC</h2>
            </div>
        </div>
        <div class="card" onclick="location.href='pages/storybook.php';">
            <img src="assets/storylogo.jpg" alt="Card Image">
            <div class="card-content">
                <h2 class="card-title">Story Books</h2>
            </div>
        </div>
        <div class="card" onclick="location.href='pages/crimebook.php';">
            <img src="assets/crimebook.jpg" alt="Card Image">
            <div class="card-content">
                <h2 class="card-title">Crime Books</h2>
            </div>
        </div>
        <div class="card" onclick="location.href='pages/motivationalbook.php';">
            <img src="assets/motivation.jpg" alt="Card Image">
            <div class="card-content">
                <h2 class="card-title">Motivational Books</h2>
            </div>
        </div>
        <div class="card" onclick="location.href='pages/newspaper.php';">
            <img src="assets/news1.jpeg" alt="Card Image">
            <div class="card-content">
                <h2 class="card-title">Newspapers</h2>
            </div>
        </div>
        </div>
        <div class="card" onclick="location.href='pages/languagebook.php';">
            <img src="assets/language.jpg" alt="Card Image">
            <div class="card-content">
                <h2 class="card-title">Language Books</h2>
            </div>
        </div>
        </div>
        <div class="card" onclick="location.href='pages/magazine.php';">
            <img src="assets/magazine.jpg" alt="Card Image">
            <div class="card-content">
                <h2 class="card-title">Magazines</h2>
            </div>
        </div>


    </main>


    
    
<footer>
    <footer class="footer">
        <p>&copy; 2024 Second-hand Book Market. All rights reserved.</p>
    </div>
</footer>

</body>
</html>

    </footer>

    <script>
        function toggleNavbar() {
            var x = document.getElementById("myNavbar");
            if (x.className === "navbar") {
                x.className += " responsive";
            } else {
                x.className = "navbar";
            }
        }
    </script>

</body>

</html>