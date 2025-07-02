<?php

include "db.php";

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "DELETE FROM users WHERE id='$id'";
    $res = mysqli_query($conn,$sql);
    header('location:readuser.php');
}

?>