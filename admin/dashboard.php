<?php
session_start();
if (isset($_SESSION["user"])) {
    require_once 'controllers/AdminCon.php';
    $db_value = require '../config/local.php';

    $controller = new AdminCon($db_value);
    $posts = $controller->getAll();
    include 'views/adminView.php';
} else {

    header("Location: login.php");
}
