<?php
include_once "./controls/validation_login.php";
$name = $_COOKIE[$cookie_name];
?>
<nav>
    <ul>
        <li>logged in as <?php echo $name ?></li>
        <li><a href="/controls/logout.php">Logout</a></li>
    </ul>
</nav>