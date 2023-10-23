<?php
require_once("../session/session.php");
require_once("../models/class_rest.php");

if (isset($_POST)) {
    $data = file_get_contents("php://input");
    $user = json_decode($data, true);
    switch ($user['action']) {
        case "get_recent_movements":
            echo Rest::getRecentMovements($id_user_where);
            break;
        default:
            echo json_encode('hola');
    }
}
