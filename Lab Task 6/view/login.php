<!DOCTYPE html>
<html lang="en">
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

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>


<body>
    <?php include_once "../controller/signin.php" ?>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="form">
        Organizational Id<input type="text" name="id"><br><span style="color:orangered"><?php echo $idErr; ?><br><br></span>
        Password<input type="password" name="password"><br><span style="color:orangered"><?php echo $passErr; ?><br><br></span>
        <input type="submit" value="Login" name="submit">
    </form>
</body>

</html>