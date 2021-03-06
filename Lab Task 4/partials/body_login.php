<?php include_once "./controls/validation_login.php" ?>

<body>
    <h1>X Company</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        User Name: <input type="text" name="name"><?php echo $nameErr; ?> <br><br>
        Password: <input type="password" name="password"> <?php echo $passErr; ?><br><br>
        <input type="submit" name="Submit">
    </form>
</body>