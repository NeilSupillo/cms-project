<?php

function routeToController($db_value)
{
    //$requestUri = $_SERVER['REQUEST_URI'];
    require_once 'controllers/PostController.php';
    $db_value = require '../config/local.php';

    if (isset($_GET['id'])) {
        $controller = new PostController($db_value);
        $post = $controller->view($_GET['id']);
        require 'views/ReadView.php';
    } else {
        abort();
    }
}
function abort($code = 404)
{
    http_response_code($code);

    require "views/{$code}.php";

    die();
}

routeToController($db_value);
