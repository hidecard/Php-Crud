<?php
    include "db.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #e3f0ff 0%, #fafcff 100%);
            margin: 0;
            padding: 0;
            min-height: 100vh;
        }
        .table-container {
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            margin-top: 40px;
        }
        table {
            border-collapse: separate;
            border-spacing: 0;
            width: 95%;
            max-width: 900px;
            background: #fff;
            box-shadow: 0 8px 32px rgba(25, 118, 210, 0.10), 0 1.5px 0 #1976d2;
            border-radius: 18px;
            overflow: hidden;
            margin: 0 auto;
        }
        th, td {
            padding: 16px 20px;
            text-align: left;
        }
        th {
            background: #1976d2;
            color: #fff;
            font-weight: 700;
            font-size: 1.08em;
            box-shadow: 0 2px 8px rgba(25, 118, 210, 0.08);
        }
        tr:nth-child(even) {
            background: #f5faff;
        }
        tr:hover {
            background: #e3f2fd;
            transition: background 0.2s;
        }
        .user-img {
            width: 48px;
            height: 48px;
            object-fit: cover;
            border-radius: 50%;
            border: 2px solid #e0e0e0;
            background: #fafafa;
            display: block;
            margin: 0 auto;
            box-shadow: 0 2px 8px rgba(25, 118, 210, 0.10);
        }
        .action-btn {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            background: #1976d2;
            color: #fff;
            border: none;
            padding: 7px 16px;
            border-radius: 4px;
            margin-right: 6px;
            cursor: pointer;
            transition: background 0.2s, box-shadow 0.2s;
            font-size: 1em;
            box-shadow: 0 1px 4px rgba(25, 118, 210, 0.10);
        }
        .action-btn:last-child {
            background: #d32f2f;
        }
        .action-btn:hover {
            opacity: 0.92;
            box-shadow: 0 2px 8px rgba(25, 118, 210, 0.15);
        }
        .action-btn a {
            color: inherit;
            text-decoration: none;
            font-weight: 500;
            display: flex;
            align-items: center;
        }
        .icon {
            font-size: 1.1em;
            vertical-align: middle;
        }
        @media (max-width: 700px) {
            table, th, td {
                font-size: 13px;
            }
            .user-img {
                width: 32px;
                height: 32px;
            }
            .table-container {
                margin-top: 10px;
            }
        }
    </style>
</head>
<body>
    <div class="table-container">
    <table>
        <tr>
            <th>ID </th>
            <th>Image</th>
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
            <td>
                <?php if (!empty($data['image']) && file_exists($data['image'])): ?>
                    <img src="<?php echo htmlspecialchars($data['image']) ?>" alt="User Image" class="user-img">
                <?php else: ?>
                    <img src="https://via.placeholder.com/40x40?text=No+Img" alt="No Image" class="user-img">
                <?php endif; ?>
            </td>
            <td><?php echo htmlspecialchars($data['name']) ?></td>
            <td><?php echo htmlspecialchars($data['email']) ?></td>
            <td><?php echo htmlspecialchars($data['password']) ?></td>
            <td>
                <button class="action-btn"><a href="useredit.php?id=<?php echo $data['id'] ?>"><span class="icon">✏️</span> Edit</a></button>
                <button class="action-btn"><a href="userdel.php?id=<?php echo $data['id'] ?>"><span class="icon">🗑️</span> Delete</a></button>
            </td>
        </tr>
        <?php } ?>
    </table>
    </div>
</body>
</html>