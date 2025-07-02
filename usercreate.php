<?php

include "db.php";

if(isset($_POST['save'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    //image upload
    $img_name = $_FILES['img']['name']; // from input img=>input name , name =>img name
    $tmp_name = $_FILES['img']['tmp_name']; // အပေါ်က img data ကို ယာယီသိမ်းပေးတာ

    $folder = "images/".$img_name; // image သိမ်းဖို့ Folder ဆောက်တာ
   move_uploaded_file($tmp_name,$folder); // သိမ်းဆည်းတာ


    $sql = "INSERT INTO users(name,email,password,image) VALUES('$name','$email','$password','$folder')";
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
    <form action="" method="post" enctype="multipart/form-data">
        <input type="text" name="name" id="">
        <input type="email" name="email" id="">
        <input type="password" name="password" id="">
        <input type="file" name="img" id="">
        <button name="save">Add</button>
    </form>
</body>
</html>