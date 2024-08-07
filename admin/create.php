<?php


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    require_once 'controllers/AdminCon.php';
    $db_value = require '../config/local.php';

    $data = [
        'title' => $_POST['title'],
        'content' => $_POST['content'],
        'summary' => $_POST['summary'],
        'date' => $_POST['date']
    ];
    $controller = new AdminCon($db_value);
    $post = $controller->createUser($data);
    header("Location: dashboard.php");
} else {
    include 'views/createView.php';
}
