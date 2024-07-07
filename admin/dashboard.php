<?php
require_once 'controllers/AdminCon.php';
$controller = new AdminCon();
$posts = $controller->getAll();
include 'views/adminView.php';
