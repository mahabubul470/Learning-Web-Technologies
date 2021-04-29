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
    <title>Search | Teacher</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <script src="../script/script.js"></script>
</head>

<body class="w3-light-grey">
    <div style=" margin-left: 3%; margin-top:5%;">
        <div class="container-fluid add-frm">
            <hr>
            <div class="mb-3">
                <sup style="color: red;">*</sup>
                <input placeholder="Search" class="form-control search" type="text" name="name" id="name" onkeyup="searchAdmin(this.value)">
            </div>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Date of Birth</th>
                        <th>Gender</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="output-data">
                </tbody>
            </table>
        </div>
    </div>
</body>
<script>
    function searchAdmin(str) {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var data = JSON.parse(this.responseText);
                var output = "";
                for (var i in data) {
                    output +=
                        "<tr>" +
                        '<td><a style="color:black" href="viewTeacher.php?oid=' +
                        data[i].oid +
                        ' "> ' +
                        data[i].oid +
                        "</a></td>" +
                        "<td>" +
                        data[i].name +
                        "</td>" +
                        "<td>" +
                        data[i].email +
                        "</td>" +
                        "<td>" +
                        data[i].dob +
                        "</td>" +
                        "<td>" +
                        data[i].gender +
                        "</td>" +
                        '<td><a class="btn btn-primary" href="editTeacher.php?oid=' +
                        data[i].oid +
                        '">Edit</a>&nbsp<a class="btn btn-danger" href="../controller/deleteTeacher.php?o-id=' +
                        data[i].oid +
                        '">Delete</a></td>' +
                        "</tr>";
                }
                document.getElementById("output-data").innerHTML = output;
            }
        };
        xmlhttp.open("GET", "../controller/searchAdmin.php?str=" + str, true);
        xmlhttp.send();
    }
</script>

</html>