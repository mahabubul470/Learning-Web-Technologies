<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task 2</title>
</head>

<body>
    <?php
    // define variables and set to empty values
    $NewPassErr =   $CurrpassErr =  $RePassErr = "";
    $curPass = $newPass = $rePass = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["cur-pass"])) {
            $CurrpassErr = "Input Current Password";
        } else {
            $curPass = test_input($_POST["cur-pass"]);
        }
        if (empty($_POST["new-pass"])) {
            $NewpassErr = "Input New Password";
        } else {
            $newPass = test_input($_POST["new-pass"]);
            if ($newPass == $curPass) {
                $NewPassErr = "New Password should not be same as the Current Password";
                $curPass = $newPass = $rePass = "";
            }
        }
        if (empty($_POST["re-pass"])) {
            $RePassErr = "Input New Password";
        } else {
            $rePass = test_input($_POST["re-pass"]);
            if ($rePass != $newPass) {
                $RePassErr = ". New Password must match with the Retyped Password";
                $curPass = $newPass = $rePass = "";
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
        Current Password: <input type="password" name="cur-pass"> <?php echo $CurrpassErr; ?> <br><br>
        New Password: <input type="password" name="new-pass"> <?php echo $NewPassErr; ?> <br><br>
        Retype Password: <input type="password" name="re-pass"> <?php echo $RePassErr; ?> <br><br>
        <input type="submit" id="submit" name="Submit" value="submit">
    </form>
    <?php
    echo "<h2>Your Input:</h2>";
    echo "Old Password";
    echo "<br>";
    echo $curPass;
    echo "<br>";
    echo "New Password";
    echo "<br>";
    echo $newPass;
    ?>


</body>

</html>