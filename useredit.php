<?php

include "db.php";

if(isset($_GET['id'])){
    $id = $_GET['id'];

}
if(isset($_POST['update'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Handle image update
    $img_name = $_FILES['img']['name'];
    $tmp_name = $_FILES['img']['tmp_name'];
    $update_img_sql = '';
    if (!empty($img_name)) {
        $folder = "images/".$img_name;
        move_uploaded_file($tmp_name, $folder);
        $update_img_sql = ", image='$folder'";
    }

    $sql1 = "UPDATE users SET name='$name',email='$email',password='$password' $update_img_sql WHERE id='$id'";
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
    <style>
        body {
            background: linear-gradient(135deg, #e3f0ff 0%, #fafcff 100%);
            min-height: 100vh;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .form-card {
            background: #fff;
            padding: 36px 32px 28px 32px;
            border-radius: 16px;
            box-shadow: 0 8px 32px rgba(25, 118, 210, 0.10), 0 1.5px 0 #1976d2;
            width: 100%;
            max-width: 370px;
            display: flex;
            flex-direction: column;
            gap: 18px;
        }
        .form-title {
            font-size: 1.4em;
            font-weight: 700;
            color: #1976d2;
            margin-bottom: 10px;
            text-align: center;
        }
        .form-group {
            display: flex;
            flex-direction: column;
            gap: 6px;
        }
        label {
            font-size: 1em;
            color: #333;
            font-weight: 500;
        }
        .input-icon {
            position: relative;
        }
        .input-icon input {
            width: 100%;
            padding: 10px 12px 10px 36px;
            border: 1.5px solid #b6c6e3;
            border-radius: 6px;
            font-size: 1em;
            outline: none;
            transition: border 0.2s;
            background: #f7faff;
        }
        .input-icon input:focus {
            border: 1.5px solid #1976d2;
        }
        .input-icon .icon {
            position: absolute;
            left: 10px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 1.1em;
            color: #1976d2;
        }
        .file-input {
            background: #f7faff;
            border: 1.5px solid #b6c6e3;
            border-radius: 6px;
            padding: 8px 10px;
            font-size: 1em;
        }
        .user-img {
            width: 64px;
            height: 64px;
            object-fit: cover;
            border-radius: 50%;
            border: 2px solid #e0e0e0;
            background: #fafafa;
            display: block;
            margin: 0 auto 10px auto;
            box-shadow: 0 2px 8px rgba(25, 118, 210, 0.10);
        }
        button[name="update"] {
            background: #1976d2;
            color: #fff;
            border: none;
            border-radius: 6px;
            padding: 12px 0;
            font-size: 1.08em;
            font-weight: 600;
            cursor: pointer;
            margin-top: 10px;
            box-shadow: 0 2px 8px rgba(25, 118, 210, 0.10);
            transition: background 0.2s, box-shadow 0.2s;
        }
        button[name="update"]:hover {
            background: #1251a3;
            box-shadow: 0 4px 16px rgba(25, 118, 210, 0.13);
        }
        @media (max-width: 500px) {
            .form-card {
                padding: 18px 8px 16px 8px;
                max-width: 98vw;
            }
        }
    </style>
</head>
<body>
    <?php
    $sql = "SELECT * FROM users where id='$id'";
    $res = mysqli_query($conn,$sql);
    $data = mysqli_fetch_assoc($res);
    ?>
    <form class="form-card" action="" method="post" enctype="multipart/form-data">
        <div class="form-title">Edit User</div>
        <div class="form-group" style="align-items:center;">
            <?php if (!empty($data['image']) && file_exists($data['image'])): ?>
                <img src="<?php echo htmlspecialchars($data['image']) ?>" alt="User Image" class="user-img">
            <?php else: ?>
                <img src="https://via.placeholder.com/64x64?text=No+Img" alt="No Image" class="user-img">
            <?php endif; ?>
        </div>
        <div class="form-group">
            <label for="name">Name</label>
            <div class="input-icon">
                <span class="icon">👤</span>
                <input type="text" name="name" id="name" value="<?php echo htmlspecialchars($data['name']) ?>" required>
            </div>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <div class="input-icon">
                <span class="icon">📧</span>
                <input type="email" name="email" id="email" value="<?php echo htmlspecialchars($data['email']) ?>" required>
            </div>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <div class="input-icon">
                <span class="icon">🔒</span>
                <input type="password" name="password" id="password" value="<?php echo htmlspecialchars($data['password']) ?>" required>
            </div>
        </div>
        <div class="form-group">
            <label for="img">Change Profile Image</label>
            <input class="file-input" type="file" name="img" id="img" accept="image/*">
        </div>
        <button name="update">Update</button>
    </form>
</body>
</html>