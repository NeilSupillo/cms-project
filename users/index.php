<?php
require_once 'controllers/HomeCon.php';

$controller = new PostController();
$posts = $controller->index();
include  'views/IndexView.php';
