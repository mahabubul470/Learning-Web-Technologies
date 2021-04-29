<?php
require_once "db_connect.php";

//Student

function countStudent()
{
    $conn = mysqli_conn();
    $selectQuery = "SELECT * FROM `student` ";
    $result = mysqli_query($conn, $selectQuery);
    $count = mysqli_num_rows($result);
    return $count;
}

function checkStudent($oid)
{
    $conn = mysqli_conn();
    $selectQuery = "SELECT * FROM `student` WHERE oid = '" . $oid . "' ";
    $result = mysqli_query($conn, $selectQuery);
    $count = mysqli_num_rows($result);
    return $count;
}


function checkemailStudent($email)
{
    $conn = mysqli_conn();
    $selectQuery = "SELECT * FROM `student` WHERE oid = '" . $email . "' ";
    $result = mysqli_query($conn, $selectQuery);
    $count = mysqli_num_rows($result);
    return $count;
}

function addStudent($data)
{
    $conn = db_conn();
    $selectQuery = "INSERT into student (oid, name, email, password, gender , dob , usertype)
                    VALUES (:oid, :name, :email, :password, :gender , :dob , :usertype)";
    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            ':oid' => $data['oid'],
            ':name' => $data['name'],
            ':email' => $data['email'],
            ':password' => $data['password'],
            ':gender' => $data['gender'],
            ':dob' => $data['dob'],
            ':usertype' => $data['usertype'],
        ]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $conn = null;
    return true;
}

function editStudent($oid, $data)
{
    $conn = db_conn();
    $selectQuery = "update student set name = '" . $data['name'] . "',  email = '" . $data['email'] . "', password = '" . $data['password'] . "', gender = '" . $data['gender'] . "', dob = '" . $data['dob'] . "'   where oid = '" . $oid . "'";
    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute();
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

    $conn = null;
    return true;
}

function deleteStudent($oid)
{
    $conn = db_conn();
    $selectQuery = "DELETE FROM `student` WHERE `oid` = ?";
    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$oid]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $conn = null;

    return true;
}

function fetchAllStudent()
{
    $conn = db_conn();
    $selectQuery = 'SELECT * FROM `student` ';
    try {
        $stmt = $conn->query($selectQuery);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}


//Teacher

function countTeacher()
{
    $conn = mysqli_conn();
    $selectQuery = "SELECT * FROM `teacher` ";
    $result = mysqli_query($conn, $selectQuery);
    $count = mysqli_num_rows($result);
    return $count;
}

function checkTeacher($oid)
{
    $conn = mysqli_conn();
    $selectQuery = "SELECT * FROM `teacher` WHERE oid = '" . $oid . "' ";
    $result = mysqli_query($conn, $selectQuery);
    $count = mysqli_num_rows($result);
    return $count;
}

function checkemailTeacher($email)
{
    $conn = mysqli_conn();
    $selectQuery = "SELECT * FROM `teacher` WHERE oid = '" . $email . "' ";
    $result = mysqli_query($conn, $selectQuery);
    $count = mysqli_num_rows($result);
    return $count;
}


function addTeacher($data)
{
    $conn = db_conn();
    $selectQuery = "INSERT into teacher (oid, name, email, password, gender , dob , usertype)
                    VALUES (:oid, :name, :email, :password, :gender , :dob , :usertype)";
    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            ':oid' => $data['oid'],
            ':name' => $data['name'],
            ':email' => $data['email'],
            ':password' => $data['password'],
            ':gender' => $data['gender'],
            ':dob' => $data['dob'],
            ':usertype' => $data['usertype']
        ]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $conn = null;
    return true;
}

function editTeacher($oid, $data)
{
    $conn = db_conn();
    $selectQuery = "update teacher set name = '" . $data['name'] . "',  email = '" . $data['email'] . "', password = '" . $data['password'] . "', gender = '" . $data['gender'] . "', dob = '" . $data['dob'] . "'   where oid = '" . $oid . "'";
    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute();
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

    $conn = null;
    return true;
}

function deleteTeacher($oid)
{
    $conn = db_conn();
    $selectQuery = "DELETE FROM `teacher` WHERE `oid` = ?";
    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$oid]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $conn = null;

    return true;
}

function fetchAllTeacher()
{
    $conn = db_conn();
    $selectQuery = 'SELECT * FROM `teacher` ';
    try {
        $stmt = $conn->query($selectQuery);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $conn = null;
    return $rows;
}

function searchTeacher($search)
{
    $conn = db_conn();
    $selectQuery = "SELECT * FROM teacher WHERE name LIKE '%" . $search . "%'";
    try {
        $stmt = $conn->query($selectQuery);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $conn = null;
    return $rows;
}

//Admin
function searchAdmin($search)
{
    $conn = db_conn();
    $selectQuery = "SELECT * FROM admin WHERE name LIKE '%" . $search . "%'";
    try {
        $stmt = $conn->query($selectQuery);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $conn = null;
    return $rows;
}

function countSearchAdmin($search)
{
    $conn = db_conn();
    $selectQuery = "SELECT * FROM admin WHERE name LIKE '%" . $search . "%'";
    try {
        $stmt = $conn->query($selectQuery);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $conn = null;
    return $rows;
}

function countAdmin()
{
    $conn = mysqli_conn();
    $selectQuery = "SELECT * FROM `admin` ";
    $result = mysqli_query($conn, $selectQuery);
    $count = mysqli_num_rows($result);
    $conn = null;
    return $count;
}
function checkAdmin($oid)
{
    $conn = mysqli_conn();
    $selectQuery = "SELECT * FROM `admin` WHERE oid = '" . $oid . "' ";
    try {
        $result = mysqli_query($conn, $selectQuery);
    } catch (Exception $ex) {
        echo $ex;
    }
    $count = mysqli_num_rows($result);
    $conn = null;
    return $count;
}


function checkemailAdmin($email)
{
    $conn = mysqli_conn();
    $selectQuery = "SELECT * FROM `admin` WHERE oid = '" . $email . "' ";
    $result = mysqli_query($conn, $selectQuery);
    $count = mysqli_num_rows($result);
    return $count;
}

function addAdmin($data)
{
    $conn = db_conn();
    $selectQuery = "INSERT into admin (oid, name, email, password, gender , dob , usertype)
                    VALUES (:oid, :name, :email, :password, :gender , :dob , :usertype)";
    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            ':oid' => $data['oid'],
            ':name' => $data['name'],
            ':email' => $data['email'],
            ':password' => $data['password'],
            ':gender' => $data['gender'],
            ':dob' => $data['dob'],
            ':usertype' => $data['usertype'],
        ]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $conn = null;
    return true;
}

function editAdmin($oid, $data)
{
    $conn = db_conn();
    $selectQuery = "update admin set name = '" . $data['name'] . "',  email = '" . $data['email'] . "', password = '" . $data['password'] . "', gender = '" . $data['gender'] . "', dob = '" . $data['dob'] . "'   where oid = '" . $oid . "'";
    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute();
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

    $conn = null;
    return true;
}

function deleteAdmin($oid)
{
    $conn = db_conn();
    $selectQuery = "DELETE FROM `admin` WHERE `oid` = ?";
    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$oid]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $conn = null;

    return true;
}

function fetchAllAdmin()
{
    $conn = db_conn();
    $selectQuery = 'SELECT * FROM `admin` ';
    try {
        $stmt = $conn->query($selectQuery);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}

//Course
function searchCourse($search)
{
    $conn = db_conn();
    $selectQuery = "SELECT * FROM student WHERE oid LIKE '%" . $search . "%'";
    try {
        $stmt = $conn->query($selectQuery);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $conn = null;
    return $rows;
}

function countCourse()
{
    $conn = mysqli_conn();
    $selectQuery = "SELECT * FROM `course` ";
    $result = mysqli_query($conn, $selectQuery);
    $count = mysqli_num_rows($result);
    $conn = null;
    return $count;
}

function checkCourse($cid)
{
    $conn = mysqli_conn();
    $selectQuery = "SELECT * FROM `course` WHERE oid = '" . $cid . "' ";
    try {
        $result = mysqli_query($conn, $selectQuery);
    } catch (Exception $ex) {
        echo $ex;
    }
    $count = mysqli_num_rows($result);
    $conn = null;
    return $count;
}

function checkSection($cid, $section)
{
    $conn = mysqli_conn();
    $selectQuery = "SELECT section FROM `course` WHERE oid = '" . $cid . "' ";
    try {
        $result = mysqli_query($conn, $selectQuery);
    } catch (Exception $ex) {
        echo $ex;
    }
    if ($result['section'] == $section)
        return true;
    return false;
}


function addCourse($data)
{
    $conn = db_conn();
    $selectQuery = "INSERT into course ( cid,name,oid , section)
                    VALUES (:cid, :name, :oid, :section)";
    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            ':cid' => $data['cid'],
            ':name' => $data['name'],
            ':oid' => $data['oid'],
            ':section' => $data['section']
        ]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $conn = null;
    return true;
}

function editCourse($oid, $data)
{
    $conn = db_conn();
    $selectQuery = "update course set name = '" . $data['name'] . "',  cid = '" . $data['cid'] . "', oid = '" . $data['oid'] . "', section = '" . $data['section'] . "' ";
    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute();
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

    $conn = null;
    return true;
}

function deleteCourse($oid)
{
    $conn = db_conn();
    $selectQuery = "DELETE FROM `course` WHERE `cid` = ?";
    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$oid]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $conn = null;

    return true;
}

function fetchAllCourse()
{
    $conn = db_conn();
    $selectQuery = 'SELECT * FROM `course` ';
    try {
        $stmt = $conn->query($selectQuery);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}






function add_Quiz($courseID, $time, $type, $name)
{
    $conn = db_conn();
    $selectQuery = "INSERT into `quiz` (quizName, type, time, courseId )
                    VALUES (:quizName, :type, :time, :courseId)";
    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            ':quizName' => $name,
            ':time' => $time,
            ':type' => $type,
            ':courseId' => $courseID,
        ]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $conn = null;
    return true;
}


//fetch quiz by text
function fetchQuiz($text)
{
    $conn = mysqli_conn();
    $selectQuery = "SELECT * FROM `quiz` WHERE quizName LIKE '%" . $text . "%' OR type LIKE '%" . $text . "%' OR time LIKE '%" . $text . "%' ";
    $result = mysqli_query($conn, $selectQuery);
    return $result;
}



//custom fetch_quiz function

function fetch_All_Quiz()
{
    $conn = mysqli_conn();
    $selectQuery = "SELECT * FROM `quiz` ";
    $result = mysqli_query($conn, $selectQuery);
    return $result;
}


function fetchAllQuiz()
{
    $conn = db_conn();
    $selectQuery = 'SELECT * FROM `quiz` ';
    try {
        $stmt = $conn->query($selectQuery);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}


function fetchAll_Quiz($id)
{
    $conn = db_conn();
    $selectQuery = "SELECT * FROM `quiz` WHERE id = '" . $id . "' ";
    try {
        $stmt = $conn->query($selectQuery);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}


//pdo all question fetch
function fetchAll_Questions($id)
{
    $conn = db_conn();
    $selectQuery = "SELECT * FROM `questions` WHERE quizid = '" . $id . "' ";
    try {
        $stmt = $conn->query($selectQuery);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}






function fetchAll_Options($id)
{
    $conn = db_conn();
    $selectQuery = "SELECT * FROM `options` WHERE questionid = '" . $id . "' ";
    try {
        $stmt = $conn->query($selectQuery);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}

function setMsg($msg)
{

    setcookie('msg', $msg, time() + 20);
}

function getMsg()
{

    if (isset($_COOKIE['msg'])) {

        echo '<p class="alert alert-success">' . $_COOKIE['msg'] . '<button data-dismiss="alert" class="close"> &times; </button></p>';
    }
}
