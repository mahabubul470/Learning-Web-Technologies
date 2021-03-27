<?php
$nameErr = $passErr = $emailErr = $oidErr = $genderErr = $dobErr = $rePassErr = $upErr = "";
$name  = $email =  $password = $gender = $dob = $rePass = $oid = "";
$flag = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
        $flag = false;
    } else {
        $name = test_input($_POST["name"]);
        $flag = true;
    }
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
        $flag = false;
    } else {
        $email = test_input($_POST["email"]);
        $flag = true;
    }
    if (empty($_POST["gender"])) {
        $genderErr = "Gender is required";
        $flag = false;
    } else {
        $gender = test_input($_POST["gender"]);
        $flag = true;
    }

    if (empty($_POST["dob"])) {
        $dobErr = "Date is required";
        $flag = false;
    } else {
        $dob = test_input($_POST["dob"]);
        $flag = true;
    }

    if (empty($_POST["password"])) {
        $passErr = "Password is required";
        $flag = false;
    } else {
        $password = test_input($_POST["password"]);
        if (!preg_match("/(?=.*?[#@$%])/", $password)) {
            $passErr = "Password must contain at least one of the special characters (@, #, $,%)";
            $flag = false;
        }
        if (strlen($password) < 8) {
            $passErr = "Password must not be less than eight (8) characters";
            $flag = false;
        }
        $flag = true;
    }

    if (empty($_POST["re-password"])) {
        $rePassErr = "Retype Password";
        $flag = false;
    } else {
        $rePass = test_input($_POST["re-password"]);
        $flag = true;
    }

    if (empty($_POST["o-id"])) {
        $oidErr = "Organization id required";
        $flag = false;
    } else {
        $oid = test_input($_POST["re-password"]);
        $flag = true;
    }

    if ($password != $rePass) {
        $rePassErr = "Passwords doesnt not match";
        $flag = false;
    }

    require_once '../model/model.php';
    $data['name'] = $_POST['name'];
    $data['email'] = $_POST['email'];
    $data['gender'] = $gender;
    $data['password'] = password_hash($_POST['password'], PASSWORD_BCRYPT, ["cost" => 12]);
    $data['dob'] = $_POST['dob'];
    $data['user-type'] = "admin";
    $data['o-id'] = $_POST['o-id'];
    $data['image'] = basename($_FILES["image"]["name"]);

    $target_dir = "../uploads/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);

    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        echo "The file " . basename($_FILES["image"]["name"]) . " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
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
    if (checkAdmin($_POST["o-id"])) {
        echo "Already Registered with this id number";
        $oidErr = "Already Registered with this id number";
    } else {
        if (addAdmin($data)) {
            echo "Admin created successfully";
        } else {
            echo "There was a problem creating student";
        }
    }
}
