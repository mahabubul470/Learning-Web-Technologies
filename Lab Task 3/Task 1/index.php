<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task 1</title>
</head>

<body>
    <?php
    // define variables and set to empty values
    $nameErr = $passErr = "";
    $name = $password = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["name"])) {
            $nameErr = "Name is required";
        } else {
            $name = test_input($_POST["name"]);
            if (strlen($name) < 2) {
                $nameErr = "User Name must contain at least two (2) characters";
                $name = "";
                $password = "";
            }
            if (!preg_match("/^[-a-zA-Z0-9 .]+$/", $name)) {
                $nameErr = "User Name can contain alpha numeric characters, period, dash or
                underscore only";
                $name = "";
                $password = "";
            }
        }
        if (empty($_POST["password"])) {
            $passErr = "Password is required";
        } else {
            $password = test_input($_POST["password"]);
            if (!preg_match("/(?=.*?[#@$%])/", $password)) {
                $passErr = ". Password must contain at least one of the special characters (@, #, $,%)";
                $password = "";
                $name = "";
            }
            if (strlen($password) < 8) {
                $passErr = "Password must not be less than eight (8) characters";
                $password = "";
                $name = "";
            }
        }
    }

    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        User Name: <input type="text" name="name"> <?php echo $nameErr; ?><br><br>
        Password: <input type="password" name="password"> <?php echo $passErr; ?> <br><br>
        <input type="checkbox" id="r-me" name="r-me" value="r-me">
        <label for="r-me"> Remember me</label><br><br>
        <input type="submit" id="submit" name="Submit" value="submit">
        <a href="">Forgot Password</a>
    </form>

    <?php
    echo "<h2>Your Input:</h2>";
    echo $name;
    echo "<br>";
    echo $password;
    ?>


</body>

</html>