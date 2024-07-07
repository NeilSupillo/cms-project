<?php
require_once 'controllers/HomeCon.php';

if (isset($_GET['id'])) {
    $controller = new PostController();
    $post = $controller->view($_GET['id']);
    include 'views/ReadView.php';
}
