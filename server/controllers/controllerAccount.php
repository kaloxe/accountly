<?php
require("/xampp/htdocs/accountly/server/session/session.php");
require_once("../models/class_rest.php");

if (isset($_POST)) {
    $data = file_get_contents("php://input");
    $user = json_decode($data, true);

    switch ($user['action']) {
        case "create_account":
            $nombre = $user['nombre'];
            $sql = "INSERT INTO `account`(`id_user`, `name_account`, `state_register`) VALUES ($id_user, '$nombre', 1)";
            echo Rest::execute($sql);
            break;
        case "read_account":
            $id = $user['id'];
            $sql = "SELECT `id_account`, `name_account` FROM `account` WHERE `id_account`=$id";
            echo Rest::readAccount($sql);
            break;
        case "update_account":
            $id = $user["id"];
            $nombre = $user['nombre'];
            $sql = "UPDATE `account` SET `name_account`='$nombre' WHERE `id_account`=$id";
            echo Rest::execute($sql);
            break;
        case "delete_account":
            $id = $user['id'];
            $sql = "DELETE FROM `account` WHERE `account`.`id_account` = $id";
            echo Rest::execute($sql);
            break;
        default:
            echo json_encode('hola');
    }
}
