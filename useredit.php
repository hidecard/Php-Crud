<?php

include "db.php";

if(isset($_GET['id'])){
    $id = $_GET['id'];

}
if(isset($_POST['update'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql1 = "UPDATE users SET name='$name',email='$email',password='$password' WHERE id='$id'";
    $res1 = mysqli_query($conn,$sql1);
    header('location:readuser.php');
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $sql = "SELECT * FROM users where id='$id'";
    $res = mysqli_query($conn,$sql);
    $data = mysqli_fetch_assoc($res);
    ?>
    <form action="" method="post">
        <input type="text" name="name" id="" value="<?php echo $data['name'] ?>">
        <input type="email" name="email" id="" value="<?php echo $data['email'] ?>">
        <input type="password" name="password" id="" value="<?php echo $data['password'] ?>">
        <input type="submit" name="update" value="Update">
    </form>
</body>
</html>