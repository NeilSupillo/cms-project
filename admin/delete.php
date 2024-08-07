<?php

if (isset($_GET["id"])) {
    require_once 'controllers/AdminCon.php';
    $db_value = require '../config/local.php';

    $controllers = new AdminCon($db_value);
    $data = $controllers->deleteUser($_GET["id"]);

    header("Location: dashboard.php");
} else {
    echo "Post not found";
}
