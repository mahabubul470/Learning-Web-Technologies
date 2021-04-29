<?php
$nameErr = $tidErr = $cidErr = $sectionErr = "";
$name = $cid =  $tid = $section =  $msg = "";
$flag = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
        $flag = false;
    } else {
        $name = test_input($_POST["name"]);
        $flag = true;
    }

    if (empty($_POST["t-id"])) {
        $tidErr = "Organization id required";
        $flag = false;
    } else {
        $tid = test_input($_POST["oid"]);
        $flag = true;
    }

    if (empty($_POST["cid"])) {
        $cidErr = "Organization id required";
        $flag = false;
    } else {
        $cid = test_input($_POST["c-id"]);
        $flag = true;
    }

    if (empty($_POST["section"])) {
        $sectionErr = "Organization id required";
        $flag = false;
    } else {
        $section = test_input($_POST["section"]);
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
    require_once '../model/model.php';
    $data['name'] = $_POST['name'];
    $data['cid'] = $_POST["cid"];
    $data['oid'] = $_POST['oid'];
    $data['section'] = $_POST['section'];

    if (checkSection($_POST["cid"], $_POST["section"])) {
        $msg = "Already Registered Section with this course";
    } else {
        if (addCourse($data)) {
            $msg = "Course created successfully";
        } else {
            $msg = "There was a problem creating Course";
        }
    }
}
