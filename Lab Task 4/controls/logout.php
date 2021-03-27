<?php
include_once "./validation_login.php";
setcookie("user", "", time() - (86400 * 30));
