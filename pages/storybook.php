<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Story Book</title>
    <style>
        body{
            background-color:white;
        }
        main{
            display:flex;
            flex-wrap:wrap;

        }
        .card {
            max-width: 200px;
            height:250px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0px 0px 5px rgba(0, 0, 0);
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
            padding:5px;
           width:100%;
           height:230px;
           position:absolute;
           bottom:-210px;
           background:white;
           transition:0.3s ease;
        }

        .card-title {
            font-size: 20px;
            margin-bottom: 10px;
        }

        .card-text {
            font-size: 16px;
            color: #555;
        }
        li{
            list-style:none;
        }
        input[type="submit"]{
            width:95%;
            cursor: pointer;
            padding:5px 0;
            border:none;
            background:green;
        }
        .card:hover .card-content{
            bottom:0;
        }
        #search{
            margin: auto;
            width: 500px;
            height: 40px;
            border: none;
            border:1px solid;
            border-radius: 10px;
            outline: none;
            font-size: 12pt;
            padding: 0 10px;
        }
        select{
            height: 40px;  
            border-radius: 7px;
        }
    </style>
</head>
<body>
<center>
       <form action="" method="post">
            <input type="search" name="search" id="search" value="" placeholder="Search Book">
            <select name="searchby" id="searchby">
                <option value="title" selected>TITLE</option>
                <option value="author">AUTHOR</option>
            </select>
       </form>
</center>
    <main>
        <?php
            include "../connection/connection.php";
            $query = "SELECT * FROM `books` WHERE `genre`='STORYBOOK'";
            $run = mysqli_query($conn,$query);
            if($run->num_rows > 0){
                while($row = mysqli_fetch_assoc($run)){
                    ?>
                    <div class="card">
                        <img src="../data/cover/<?php echo $row['cover'];?>" alt="Card Image">
                        <div class="card-content">
                            <li class="card-title"><strong>Title : </strong><?php echo $row['title'];?></li>
                            <li class="card-title"><strong>Author : </strong><?php echo $row['author'];?></li>
                            <li class="card-title"><strong>Price : </strong><?php echo $row['price'];?>Rs</li>
                            <li class="card-title"><strong>Discount : </strong><?php echo $row['discount'];?>%</li>
                            <li class="card-title"><strong>Condition : </strong><?php echo $row['condition'];?></li>
                            <form action="view.php?seller=<?php echo base64_encode($row['uploadedby']);?>" method="post">
                                <input type="submit" name="view" value="Contact Seller">
                            </form>
                        </div>
                    </div>
                    <?php
                }
            }
            else{
                echo "No Books Available...";
            }
        ?>
        
    </main>
    <script>
       $("#search").on("keyup",function(){
            $.post("search_ajax.php",
            {
                searchVal: search.value,
                searchBy: searchby.value,
                genre:"STORYBOOK"
            },
            function(data, status){
                if(status=="success"){
                    $('main').html(data);
                }
                else{
                    $('main').html('Unable to find data');
                }
            });
       });
    </script>
</body>
</html>