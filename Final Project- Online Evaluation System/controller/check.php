<?php
include_once "../model/model.php";
$oidErr = "";
if (isset($_REQUEST['oid'])) {
    $oid = $_REQUEST['oid'];
    if (checkAdmin($oid) > 0 || checkStudent($oid) > 0 || checkTeacher($oid) > 0) {
        $oidErr = "Already registered with this id";
    } else $oidErr = "";
    echo $oidErr;
}
if (isset($_REQUEST['email'])) {
    $email = $_REQUEST['email'];
    if (checkemailAdmin($email) > 0 || checkemailStudent($email) > 0 || checkemailTeacher($email) > 0) {
        $emailErr = "Already registered with this email";
    } else $oidErr = "";
    echo $oidErr;
}
