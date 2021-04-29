<?php
require_once '../model/model.php';
function viewAllTeacher()
{
    return fetchAllTeacher();
}

function viewTeacher($oid)
{
    $teachers = fetchAllTeacher();
    foreach ($teachers as $key => $data) {
        if ($data["oid"] == $oid) {
            $teacher = array(
                "name" => $data["name"],
                "email" => $data["email"],
                "oid" => $data["oid"],
                "password" => $data["password"],
                "usertype" => $data["usertype"],
                "gender" => $data["gender"],
                "dob" => $data["dob"]
            );
            return $teacher;
        }
    }
}
