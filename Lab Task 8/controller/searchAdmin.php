<?php
require_once '../model/model.php';
if (isset($_REQUEST["str"]))
    $name = $_REQUEST["str"];
else
    $name = "";
$data = searchAdmin($name);
echo json_encode($data);
