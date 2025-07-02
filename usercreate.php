<?php

include "db.php";


if(isset($_POST['save'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "INSERT INTO users(name,email,password) VALUES('$name','$email','$password')";
    $res = mysqli_query($conn,$sql);

    if($res){
        echo "User added successfully";
    }
}       

?>


<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <input type="text" name="name" id="">
        <input type="email" name="email" id="">
        <input type="password" name="password" id="">
        <button name="save">Add</button>
    </form>
</body>
</html>