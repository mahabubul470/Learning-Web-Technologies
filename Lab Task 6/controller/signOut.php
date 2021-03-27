<?php
include_once "signin.php";
session_unset();
session_destroy();
header('Location: ../view/index.php');
