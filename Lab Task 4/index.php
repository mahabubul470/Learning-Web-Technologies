
<?php include_once "controls/validation_login.php";

//Header
include_once "partials/header.php";


//NAV
if (!isset($_COOKIE[$cookie_name])) {
    include_once "partials/nav.php";
} else {
    include_once "partials/nav_logged.php";
}




//Body
if (!isset($_COOKIE[$cookie_name])) {
    include_once "partials/body_login.php";
} else {
    include_once "partials/body_dash.php";
}
//Footers
include_once "partials/footer.php";
?>