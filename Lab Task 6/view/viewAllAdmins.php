<?php
require_once '../controller/viewAdmin.php';

$admins = viewAllAdmin();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admins</title>
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
            <?php if (isset($admins)) foreach ($admins as $i => $admin) : ?>
                <tr>
                    <td><a href="viewAdmin.php?o-id=<?php echo $admin['o-id'] ?>"><?php echo $admin['name'] ?></a></td>
                    <td><?php if (isset($admin['email'])) echo $admin['email'] ?></td>
                    <td><?php if (isset($admin['password'])) echo $admin['password'] ?></td>
                    <td><?php if (isset($admin['o-id'])) echo $admin['o-id'] ?></td>
                    <td><?php if (isset($admin['dob'])) echo $admin['dob'] ?></td>
                    <td><?php if (isset($admin['gender'])) echo $admin['gender'] ?></td>
                    <td><a href="editAdmin.php?o-id=<?php echo $admin['o-id'] ?>">Edit</a>&nbsp<a href="../controller/deleteAdmin.php?o-id=<?php echo $admin['o-id'] ?>">Delete</a></td>
                </tr>
            <?php endforeach; ?>


        </tbody>


    </table>
</body>

</html>