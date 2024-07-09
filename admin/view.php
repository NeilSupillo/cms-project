<?php
require_once 'controllers/AdminCon.php';

if (isset($_GET['id'])) {
    $controller = new AdminCon();
    $data = $controller->view($_GET['id']);
    include 'views/view.php';
}
