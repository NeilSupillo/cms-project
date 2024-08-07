<?php


if (isset($_GET['id'])) {
    require_once 'controllers/AdminCon.php';
    $db_value = require '../config/local.php';

    $controller = new AdminCon($db_value);
    $data = $controller->view($_GET['id']);
    include 'views/view.php';
} else {
    require_once 'views/404.php';
}
