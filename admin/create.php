<?php
require_once 'controllers/AdminCon.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $data = [
        'title' => $_POST['title'],
        'content' => $_POST['content'],
        'summary' => $_POST['summary'],
        'date' => $_POST['date']
    ];
    $controller = new AdminCon();
    $post = $controller->createUser($data);
    header("Location: dashboard.php");
} else {
    include 'views/createView.php';
}
