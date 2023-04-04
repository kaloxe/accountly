<?php
require_once("../db/db.php");
require_once("../models/class_rest.php");

if (isset($_POST)) {
    $data = file_get_contents("php://input");
    $user = json_decode($data, true);

    switch ($user['action']) {
        case "create_font":
            $nombre = $user['nombre'];
            $monto = $user['monto'];
            $sql = "INSERT INTO `font`(`id_user`, `name_font`, `amount`) VALUES ('1', '$nombre', $monto)";
            echo Rest::create($conn, $sql);
            // echo json_encode($user);
            // echo json_encode($sql);
            break;
        case "read_font":
            echo json_encode($user);
            echo json_encode($user["nombre"]);
            break;
        case "update_font":
            echo json_encode($user);
            echo json_encode($user["nombre"]);
            break;
        case "delete_font":
            echo json_encode($user);
            echo json_encode($user["nombre"]);
            break;
        default:
            echo json_encode('hola');
    }
}
