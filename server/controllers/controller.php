<?php

if (isset($_POST)) {
    $data = file_get_contents("php://input");
    $user = json_decode($data, true);

    switch ($user['action']) {
        case "create_font":
            echo json_encode($user);
            echo json_encode($user["nombre"]);
            break;
        default:
            echo json_encode('hola');
    }
}
