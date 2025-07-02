<?php
    include "db.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
        <tr>
            <th>ID </th>
            <th>Name</th>
            <th>Email</th>
            <th>Password</th>
            <th>Action</th>
        </tr>

        <?php 
            $sql = "SELECT * FROM users";
            $res = mysqli_query($conn,$sql);
            $i = 1;
            while($data=mysqli_fetch_assoc($res)){
        ?>
        <tr>
            <td><?php echo $i++ ?></td>
            <td><?php echo htmlspecialchars($data['name']) ?></td>
            <td><?php echo htmlspecialchars($data['email']) ?></td>
            <td><?php echo htmlspecialchars($data['password']) ?></td>
            <td>
                <button><a href="useredit.php?id=<?php echo $data['id'] ?>">Edit</a></button>
                <button><a href="userdel.php?id=<?php echo $data['id'] ?>">Delete</a></button>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>