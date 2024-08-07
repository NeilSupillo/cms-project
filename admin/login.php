<?php

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    if ($username == "admin" && $password == "pass") {
        session_start();
        $_SESSION["user"] = "admin";

        // require_once 'controllers/AdminCon.php';
        // $controller = new AdminCon();
        // $posts = $controller->getAll();
        header("Location: dashboard.php");
    } else {

        include 'views/loginView.php';
    }
} else {

    include 'views/loginView.php';
}
