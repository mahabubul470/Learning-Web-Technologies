<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Add</title>
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
        <?php include_once "nav-login.php" ?>
        <?php include_once "../controller/createAdmin.php" ?>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="form">
            <h2 style=" inline-size: 200px; background-color:#45a049 ; text-align: center; color:white">Add Admin</h1><br><br>
                Name<sup style="color: red;">*</sup> <input type="text" name="name"> <span style="color:orangered"><?php echo $nameErr; ?><br><br></span>

                Password<sup style="color: red;">*</sup> <input type="password" name="password"> <span style="color:orangered"><?php echo $passErr; ?><br><br></span>

                Retype Password<sup style="color: red;">*</sup> <input type="password" name="re-password"> <span style="color:orangered"><?php echo $rePassErr; ?><br><br></span>

                Email<sup style="color: red;">*</sup> <input type="email" name="email"> <span style="color:orangered"><?php echo $emailErr; ?><br><br></span>

                Organizational Id Number <sup style="color: red;">*</sup> <input type="text" name="o-id"> <span style="color:orangered"><?php echo $oidErr; ?><br><br></span>

                Gender
                <input type="radio" name="gender" <?php if (isset($gender) && $gender == "female") echo "checked"; ?> value="female"> Female
                <input type="radio" name="gender" <?php if (isset($gender) && $gender == "male") echo "checked"; ?> value="male"> Male
                <input type="radio" name="gender" <?php if (isset($gender) && $gender == "other") echo "checked"; ?> value="other"> Other
                <?php echo $genderErr; ?></span>
                <br><br>

                Date <input type="date" name="dob"> <span style="color:orangered"> <?php echo $dobErr; ?><br><br></span>
                <input type="file" name="image"><br><br>
                <input type="submit" name="Submit">

        </form>
        <h3><?php echo isset($msg) ?></h3>

    </body>
    <footer class="footer">
        <h2>Copyright &#169;<?php echo date("Y"); ?></h2>
    </footer>