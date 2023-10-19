<?php
require_once("../session/session.php");
require_once("../models/class_rest.php");

if (isset($_POST)) {
    $data = file_get_contents("php://input");
    $user = json_decode($data, true);

    switch ($user['action']) {
        case "create_badge":
            $divisa = $user['divisa'];
            $valor = $user['valor'];
            $sql = "INSERT INTO `badge`(`name_badge`, `value`) VALUES ('$divisa', $valor)";
            Rest::binnacle($id_user, "Creacion de divisa: $divisa");
            echo Rest::execute($sql);
            break;
        case "read_badge":
            $id = $user['id'];
            $sql = "SELECT `id_badge`, `name_badge`, `value` FROM `badge` WHERE `id_badge`=$id";
            echo Rest::readBadge($sql);
            break;
        case "update_badge":
            $id = $user["id"];
            $divisa = $user['divisa'];
            $valor = $user['valor'];
            $sql = "UPDATE `badge` SET `name_badge`='$divisa', `value`='$valor' WHERE `id_badge`=$id";
            Rest::binnacle($id_user, "Actualizacion de divisa: $divisa");
            echo Rest::execute($sql);
            break;
        case "delete_badge":
            $id = $user['id'];
            $sql = "DELETE FROM `badge` WHERE `badge`.`id_badge` = $id";
            Rest::binnacle($id_user, "Eliminacion de divisa n* $id");
            echo Rest::execute($sql);
            break;
        default:
            echo json_encode('hola');
    }
}
