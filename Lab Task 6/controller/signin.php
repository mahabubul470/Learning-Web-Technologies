<?php
session_start();
require_once '../model/model.php';
require_once 'viewStudent.php';
require_once 'viewAdmin.php';
require_once 'viewTeacher.php';
$idErr = $passErr = $id = $password = "";
$flag = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["id"])) {
        $idErr = "id is required";
        $flag = false;
    } else {
        $id = test_input($_POST["id"]);
        $flag = true;
    }

    if (empty($_POST["password"])) {
        $passErr = "Password is required";
        $flag = false;
    } else {
        $password = test_input($_POST["password"]);
        $flag = true;
    }
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($flag == true) {
    if ((studentLogin($id, $password))) {

        $usertype = "user-type";
        $cookie_value = "student";
        setcookie($usertype, $cookie_value, time() + 3600, "/");
        $oid = 'id';
        $cookie_value = $id;
        setcookie($oid, $cookie_value, time() + 3600, "/");
        $data = viewStudent($id);
        $_SESSION["name"] = $data["name"];
        header('Location: ../view/index.php');
    } else if ((teacherLogin($id, $password))) {

        $usertype = "user-type";
        $cookie_value = "teacher";
        setcookie($usertype, $cookie_value, time() + 3600, "/");
        $oid = "id";
        $cookie_value =  $id;
        setcookie($oid, $cookie_value, time() + 3600, "/");
        $data = viewTeacher($id);
        $_SESSION["name"] = $data["name"];
        header('Location: ../view/index.php');
    } else if ((adminLogin($id, $password))) {

        $usertype = "user-type";
        $cookie_value = "admin";
        setcookie($usertype, $cookie_value, time() + 3600, "/");
        $oid = "id";
        $cookie_value =  $id;
        setcookie($oid, $cookie_value, time() + 3600, "/");
        $_SESSION["user-id"] = $id;
        $data = viewAdmin($id);
        $_SESSION["name"] = $data["name"];
        header('Location: ../view/index.php');
    } else echo "Not Registered";
}
