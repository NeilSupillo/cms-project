<?php
require_once 'controllers/PostController.php';
$db_value = require '../config/local.php';

$controller = new PostController($db_value);
$posts = $controller->index();
require  'views/IndexView.php';
