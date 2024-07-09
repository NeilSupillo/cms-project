<?php
require_once 'controllers/AdminCon.php';


if (isset($_GET["id"])) {
    $controllers = new AdminCon();
    $data = $controllers->deleteUser($_GET["id"]);

    header("Location: dashboard.php");
} else {
    echo "Post not found";
}
