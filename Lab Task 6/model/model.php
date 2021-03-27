<?php
require_once "dataAccess.php";

function fetchAdminData($oid)
{
    $selectQuery = "select * from admin where `o-id` = " . $oid . "";
    $conn = dataAccess();
    try {
        $stmt = $conn->query($selectQuery);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}

function checkAdmin($oid)
{
    $rows = fetchAdminData($oid);
    if ($rows == null)
        return false;
    return true;
}

function fetchAllAdmin()
{
    $selectQuery = "select * from admin ";
    $conn = dataAccess();
    try {
        $stmt = $conn->query($selectQuery);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}

function adminLogin($id, $password)
{
    $row = fetchAdminData($id);
    if (password_verify($password, $row["password"]))
        return true;
    else
        return false;
}



function addAdmin($data)
{
    $conn = dataAccess();
    $selectQuery = "INSERT INTO `admin` (`name`, `email`, `password`, `gender`, `dob`, `user-type`, `image`)
    VALUES (:name, :email, :password, :gender, :dob, :usertype, :image)";
    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            ':o-id' => $data['o-id'],
            ':name' => $data['name'],
            ':email' => $data['email'],
            ':password' => $data['password'],
            ':gender' => $data['gender'],
            ':dob' => $data['password'],
            ':usertype' => $data['user-type'],
            ':image' => $data['image']
        ]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $conn = null;
    return true;
}

function deleteAdmin($oid)
{
    $conn = dataAccess();
    $selectQuery = "DELETE FROM `student` WHERE `o-id` = ?";
    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$oid]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $conn = null;

    return true;
}


function editAdmin($oid, $data)
{
    $conn = dataAccess();
    $selectQuery = "UPDATE admin set `name`, `email`, `password`, `gender`, `dob`, `user-type`, `image` where o-id = ?";
    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            $data['name'], $data['email'], $data['password'], $data['gender'], $data['dob'], $data['user-type'], $data['image'], $oid
        ]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

    $conn = null;
    return true;
}



//Login

/*function studentLogin($id, $password)
{
    $selectQuery = "select * from student where id = " . $id . " and password = " . $password . "";
    if (fetchData($selectQuery) != null)
        return true;
    else
        return false;
}

function teacherLogin($id, $password)
{
    $selectQuery = "select * from teacher where id = " . $id . " and password = " . $password . "";
    if (fetchData($selectQuery) != null)
        return true;
    else
        return false;
}*/


//Student
/*function addStudent($data)
{
    $jsondata = file_get_contents("../data/student.json");
    $CurrentJson = json_decode($jsondata, true);
    $student = array(
        "name" => $data["name"],
        "email" => $data["email"],
        "o-id" => $data["o-id"],
        "password" => $data["password"],
        "gender" => $data["gender"],
        "dob" => $data["dob"],
        "user-type" => $data["user-type"]

    );
    $CurrentJson[] = $student;
    $studentJson = json_encode($CurrentJson);
    if (file_put_contents("../data/student.json", $studentJson)) {
        return true;
    } else {
        return false;
    }
}



function deleteStudent($id)
{
    $conn = dataAccess();
    $selectQuery = "DELETE FROM `student` WHERE `ID` = ?";
    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$id]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $conn = null;

    return true;
}

function checkStudent($oid)
{
    $jsondata = file_get_contents("../data/student.json");
    $json = json_decode($jsondata, true);
    if (isset($json))
        foreach ($json as $key => $value) {
            if ($value['o-id'] == $oid) {
                return true;
            }
        }
    return false;
}

function editStudent($oid, $data)
{
    $jsondata = file_get_contents("../data/student.json");
    $json = json_decode($jsondata, true);
    foreach ($json as $key => $value) {
        if ($value['o-id'] == $oid) {
            $json[$key]['name'] = $data["name"];
            $json[$key]['email'] = $data["email"];
            $json[$key]['o-id'] = $data["o-id"];
            $json[$key]['gender'] = $data["gender"];
            $json[$key]['dob'] = $data["dob"];
            $json[$key]['password'] = $data["password"];
            $json[$key]['user-type'] = $data["user-type"];
        }
    }
    $json = json_encode($json);
    if (file_put_contents("../data/student.json", $json)) {
        return true;
    } else {
        return false;
    }
}


//Teracher
function addTeacher($data)
{
    $jsondata = file_get_contents("../data/teacher.json");
    $CurrentJson = json_decode($jsondata, true);
    $teacher = array(
        "name" => $data["name"],
        "email" => $data["email"],
        "o-id" => $data["o-id"],
        "password" => $data["password"],
        "gender" => $data["gender"],
        "dob" => $data["dob"],
        "user-type" => $data["user-type"]

    );
    $CurrentJson[] = $teacher;
    $teacherJson = json_encode($CurrentJson);
    if (file_put_contents("../data/teacher.json", $teacherJson)) {
        return true;
    } else {
        return false;
    }
}


function deleteTeacher($oid)
{
    $jsondata = file_get_contents("../data/teacher.json");

    $arr_index = array();
    $json = json_decode($jsondata, true);
    foreach ($json as $key => $value) {
        if ($value['o-id'] == $oid) {
            $arr_index[] = $key;
        }
    }
    foreach ($arr_index as $i) {
        unset($json[$i]);
    }
    $json = json_encode($json);
    if (file_put_contents("../data/teacher.json", $json)) {
        return true;
    } else {
        return false;
    }
}



function editTeacher($oid, $data)
{
    $jsondata = file_get_contents("../data/teacher.json");
    $json = json_decode($jsondata, true);
    foreach ($json as $key => $value) {
        if ($value['o-id'] == $oid) {
            $json[$key]['name'] = $data["name"];
            $json[$key]['email'] = $data["email"];
            $json[$key]['o-id'] = $data["o-id"];
            $json[$key]['gender'] = $data["gender"];
            $json[$key]['dob'] = $data["dob"];
            $json[$key]['password'] = $data["password"];
            $json[$key]['user-type'] = $data["user-type"];
        }
    }
    $json = json_encode($json);
    if (file_put_contents("../data/teacher.json", $json)) {
        return true;
    } else {
        return false;
    }
}*/

//Admin
