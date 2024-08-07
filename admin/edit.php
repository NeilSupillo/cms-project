<?php


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    require_once 'controllers/AdminCon.php';

    $data = [
        'title' => $_POST['title'],
        'content' => $_POST['content'],
        'summary' => $_POST['summary'],
        'date' => $_POST['date'],
        'id' => $_POST['id']
    ];
    $controller = new AdminCon($db_value);
    $post = $controller->updateUser($data);
    header("Location: dashboard.php");
} else {

    if (isset($_GET['id'])) {
        require_once 'controllers/AdminCon.php';
        $db_value = require '../config/local.php';

        $controller = new AdminCon($db_value);
        $data = $controller->view($_GET['id']);
        include 'views/editView.php';
    }
}
