<?php
session_start();
if (isset($_COOKIE["usertype"]) && $_COOKIE["usertype"] == "admin") {
    include_once "partials/navbar.php";
    include_once "partials/adminSidebar.php";
} else if (isset($_COOKIE["usertype"]) && $_COOKIE["usertype"] == "teacher") {
    include_once "partials/navbar.php";
    include_once "partials/teacherSidebar.php";
} else if (isset($_COOKIE["usertype"]) && $_COOKIE["usertype"] == "student") {
    include_once "partials/navbar.php";
    include_once "partials/studentSidebar.php";
} else
    header('Location: index.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Courses</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="../script/script.js"></script>
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
    <script src="../script/searchAdmin.js"></script>
</head>

<body class="w3-light-grey">
    <div style=" margin-left: 3%; margin-top:5%;">
        <div class="card">
            <div class="card-header">Courses</div>
            <div class="card-body">
                <div class="form-group">
                    <input type="text" name="search_box" id="search_box" class="form-control" placeholder="Type your search query here" />
                </div>
                <div class="table-responsive" id="dynamic_content">

                </div>
            </div>
        </div>
    </div>
</body>