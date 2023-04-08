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
            echo Rest::execute($conn, $sql);
            // echo json_encode($user);
            // echo json_encode($sql);
            break;
        case "read_font":
            $id = $user['id'];
            $sql = "SELECT `id_font`, `name_font`, `amount` FROM `font` WHERE `id_font`=$id";
            echo Rest::readFont($conn, $sql);
            break;
        case "update_font":
            $id = $user["id"];
            $nombre = $user['nombre'];
            $monto = $user['monto'];
            $sql = "UPDATE `font` SET `name_font`='$nombre',`amount`=$monto WHERE `id_font`=$id";
            echo Rest::execute($conn, $sql);
            break;
        case "delete_font":
            $id = $user['id'];
            $sql = "DELETE FROM `font` WHERE `font`.`id_font` = $id";
            echo Rest::execute($conn, $sql);
            break;
        default:
            echo json_encode('hola');
    }
}
