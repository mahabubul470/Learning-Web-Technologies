<?php include_once "../controller/signin.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome | Admin</title>
</head>

<body>
    <h1> Welcome <?php echo $_SESSION["name"] ?> </h1><br>
    <a href="viewAllAdmins.php">View All Admin</a><br>
    <a href="viewAllTeachers.php">View All Teacher</a><br>
    <a href="viewAllStudents.php">View All Student</a><br>
    <a href="viewAllCourse.php">View All Course</a><br>
    <a href="addAdmin.php">Add Admin</a><br>
    <a href="addCourse.php">Add Course</a><br>
    <a href="addTeacher.php">Add Teacher</a><br>
    <a href="addStudent.php">Add Student</a><br>
    <a href="searchAdmin.php">Search Admin</a><br>
    <a href="searchTeacher.php">Search Teacher</a><br>
    <a href="searchStudent.php">Search Student</a><br>
    <a href="../controller/signOut.php">Log Out</a><br>
</body>

</html>