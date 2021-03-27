<?php
require_once '../controller/viewAdmin.php';
$admin = viewAdmin($_GET["o-id"]);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
</head>
<style>
    #admins {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    #admins td,
    #admins th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    #admins tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    #admins tr:hover {
        background-color: #ddd;
    }

    #admins th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #4CAF50;
        color: white;
    }
</style>

<body>
    <?php include_once "nav-login.php" ?>
    <table id="admins">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Password</th>
                <th>ID</th>
                <th>Date of Birth</th>
                <th>Gender</th>
            </tr>
        </thead>
        <tbody>
            </tr>
            <td><a href="viewAdmin.php?o-id=<?php echo $admin['o-id'] ?>"><?php echo $admin['name'] ?></a></td>
            <td><?php echo $admin['email'] ?></td>
            <td><?php echo $admin['password'] ?></td>
            <td><?php echo $admin['o-id'] ?></td>
            <td><?php echo $admin['dob'] ?></td>
            <td><?php echo $admin['gender'] ?></td>
            <td><a href="editAdmin.php?o-id=<?php echo $admin['o-id'] ?>">Edit</a>&nbsp<a href="controller/deleteAdmin.php?id=<?php echo $admin['o-id'] ?>">Delete</a></td>
            </tr>
        </tbody>
    </table>
</body>

</html>