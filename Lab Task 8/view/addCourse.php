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
include_once "../controller/viewTeacher.php";
include_once "../controller/createCourse.php";
$teachers = viewAllTeacher();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Add Course</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="../script//script.js"></script>
  <link rel="stylesheet" href="../style/style.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
</head>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="form">
  <div class="container-fluid add-frm">
    <hr>
    <div class="mb-3">
      <label for="name" class="form-label"> Course Name</label>
      <sup style="color: red;">*</sup>
      <input class="form-control" type="text" name="name">
      <span style="color:orangered"><?php echo $nameErr; ?></span>
    </div>


    <div class="mb-3">
      <label for="oid" class="form-label">Course Id</label><sup style="color: red;">*</sup>
      <input class="form-control" type="text" name="cid">
      <span style=" color:orangered"><?php echo $cidErr; ?></span>
    </div>

    <div class="mb-3">
      <label for="faculty">Faculty</label>
      <sup style="color: red;">*</sup>
      <select class="custom-select" id="selectFaculty" name="oid">
        <option selected>Choose...</option>
        <?php
        if (isset($teachers)) foreach ($teachers as $i => $teacher) :
          echo '<option value= ' . $teacher['id'] . ' >  ' . $teacher['name'] . '</option> ';
        endforeach;
        ?>
      </select>
    </div>

    <div class="mb-3">
      <label for="section">Section</label>
      <sup style="color: red;">*</sup>
      <select class="custom-select" id="selectSection" name="oid">
        <option selected>Choose...</option>
        <option value="A">A</option>
        <option value="B">B</option>
        <option value="C">C</option>
        <option value="A">D</option>
        <option value="B">E</option>
        <option value="C">F</option>
      </select>
    </div>

    <br>
    <button type="submit" class="btn btn-primary">Submit</button>
    <h4> <?php echo $msg ?></h4>
</form>
</body>

</html>