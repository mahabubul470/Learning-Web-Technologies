<?php
require_once '../controller/updateAdmin.php';
require_once '../controller/viewAdmin.php';
if (isset($_GET["o-id"]))
    $admin = viewAdmin($_GET["o-id"]);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Edit</title>
</head>
<style>
    input[type=text],
    select {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        border-color: blue;
    }

    input[type=password],
    select {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        border-color: blue;
    }

    input[type=email],
    select {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        border-color: blue;
    }

    input[type=submit] {
        width: 100%;
        background-color: #4CAF50;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        border-color: whitesmoke;
        font-size: 20px;
    }

    input[type=submit]:hover {
        background-color: #45a049;

    }

    .form {
        border-radius: 5px;
        background-color: #f2f2f2;
        padding: 20px;
        margin: 5%;
        font-size: 18px;

    }

    .footer {
        position: relative;
        left: 0;
        bottom: 0;
        width: 100%;
        background-color: gray;
        color: white;
        text-align: center;
    }
</style>

<body>

    <body>
        <?php include_once "../controller/updateAdmin.php" ?>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="form">
            <h1 style=" inline-size: 500px; background-color:#45a049 ; text-align: center; color:white">Edit Admin Information</h1><br><br>

            Name<sup style="color: red;">*</sup> <input value="<?php if (isset($admin)) echo $admin['name'] ?>" type="text" name="name"> <span style="color:orangered"><?php echo $nameErr; ?><br><br></span>

            Password<sup style="color: red;">*</sup> <input value="<?php if (isset($admin)) echo $admin['password'] ?>" type="password" name="password"> <span style="color:orangered"><?php echo $passErr; ?><br><br></span>

            Retype Password<sup style="color: red;">*</sup> <input value="<?php if (isset($admin)) echo $admin['password'] ?>" type="password" name="re-password"> <span style="color:orangered"><?php echo $rePassErr; ?><br><br></span>

            Email<sup style="color: red;">*</sup> <input value="<?php if (isset($admin)) echo $admin['email'] ?>" type="email" name="email"> <span style="color:orangered"><?php echo $emailErr; ?><br><br></span>

            Organizational Id Number <sup style="color: red;">*</sup> <input value="<?php if (isset($admin)) echo $admin['o-id'] ?>" type="hidden" name="o-id"> <span style="color:orangered"><?php echo $oidErr; ?><br><br></span>

            Gender
            <input type="radio" name="gender" <?php if (isset($gender) && $gender == "female") echo "checked"; ?> value="female" <?php if (isset($admin)) if ($admin['gender'] == "female") echo "checked" ?>> Female
            <input type="radio" name="gender" <?php if (isset($gender) && $gender == "male") echo "checked"; ?> value="male" <?php if (isset($admin)) if ($admin['gender'] == "male") echo "checked" ?>> Male
            <input type="radio" name="gender" <?php if (isset($gender) && $gender == "other") echo "checked"; ?> value="other" <?php if (isset($admin)) if ($admin['gender'] == "other") echo "checked" ?>> Other
            <span style="color:orangered"><?php if (isset($admin)) echo $dobErr; ?><br><br></span>
            <br><br>
            Date <input value="<?php if (isset($admin)) if (isset($admin)) echo $admin['dob'] ?>" type="date" name="dob"> <span style="color:orangered"> <?php echo $dobErr; ?><br><br></span>
            <input type="file" name="image"><br><br>
            <input type="submit" name="submit">
        </form>
        <h3><?php echo isset($msg) ?></h3>

    </body>
</body>
<footer class="footer">
    <h2>Copyright &#169;<?php echo date("Y"); ?></h2>
</footer>