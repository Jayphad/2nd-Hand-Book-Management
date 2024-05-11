<?php
include "../connection/connection.php";

$id = $_POST['id'];
$query = "DELETE FROM `register` WHERE `id`='$id'";

if(mysqli_query($conn,$query)){
    header("location:dashboard.php");
}
else{
    header("location:dashboard.php");
}
?>