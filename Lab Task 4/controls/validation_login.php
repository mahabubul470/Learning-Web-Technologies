<?php
$nameErr = $name =  $passErr = $pass = "";
$userName = 'admin';
$password = 'admin';
$cookie_name = "username";
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
    } else {
        $name = test_input($_POST["name"]);
    }
    if (empty($_POST["password"])) {
        $passErr = "Password is required";
    } else {
        $pass = test_input($_POST["password"]);
    }
    if ($name == $userName && $pass == $password) {
        header('location: ./registration.php');
        setcookie($cookie_name, $userName, time() + (86400 * 30), "/");
    } else {
        echo "username or password doesnt match";
    }
}
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
