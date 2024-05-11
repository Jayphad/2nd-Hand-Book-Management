<?php
    $searchVal = trim($_POST["searchVal"]);
    $searchBy = trim($_POST["searchBy"]);
    $genre = trim($_POST["genre"]);
    include '../connection/connection.php';

    if($searchBy == "title"){
        $query = "SELECT * FROM `books` WHERE `genre` LIKE '$genre' AND `title` LIKE '%$searchVal%'";
    }
    else{
        $query = "SELECT * FROM `books` WHERE `genre` LIKE '$genre' AND `author` LIKE '%$searchVal%'";
    }
    
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
        

