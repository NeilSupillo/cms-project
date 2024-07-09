<?php
require_once 'controllers/AdminCon.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $data = [
        'title' => $_POST['title'],
        'content' => $_POST['content'],
        'summary' => $_POST['summary'],
        'date' => $_POST['date'],
        'id' => $_POST['id']
    ];
    $controller = new AdminCon();
    $post = $controller->updateUser($data);
    header("Location: dashboard.php");
} else {
    require_once 'controllers/AdminCon.php';

    if (isset($_GET['id'])) {
        $controller = new AdminCon();
        $data = $controller->view($_GET['id']);
    }
    include 'views/editView.php';
}
