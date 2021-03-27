<?php
require_once '../model/model.php';
function viewAllAdmin()
{
    return fetchAllAdmin();
}

function viewAdmin($oid)
{
    return fetchAdminData($oid);
}
