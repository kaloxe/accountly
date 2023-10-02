<?php
require("/xampp/htdocs/accountly/server/session/session.php");
require_once("../models/class_rest.php");

if (isset($_POST)) {
    $data = file_get_contents("php://input");
    $user = json_decode($data, true);

    switch ($user['action']) {
        case "create_account":
            $nombre = $user['nombre'];
            $sql1 = "SELECT name_account FROM `account` WHERE `name_account`='$nombre' and id_user=$id_user";
            $sql2 = "INSERT INTO `account`(`id_user`, `name_account`, `state_register`) VALUES ($id_user, '$nombre', 1)";
            //$sql2 = "INSERT INTO `account`(`id_user`, `name_account`, `state_register`) SELECT * FROM ( SELECT $id_user as id_user, '$nombre' as name_account, 1 as state_register) as temp WHERE NOT EXISTS(SELECT name_account FROM `account` WHERE `name_account`='$nombre')";
            Rest::binnacle($id_user, "Creacion de cuenta: $nombre");
            if (Rest::exists($sql1)) {
                echo json_encode(array('state' => false));
            } else {
                echo Rest::execute($sql2);
            }
            break;
        case "read_account":
            $id = $user['id'];
            $sql = "SELECT id_account, name_account, account.id_user FROM account INNER JOIN user on user.id_user=account.id_user WHERE id_account=$id";
            echo Rest::readAccount($sql);
            break;
        case "update_account":
            $id = $user["id"];
            $user_id = $user['user_id'];
            $nombre = $user['nombre'];
            $sql1 = "SELECT name_account FROM account WHERE name_account='$nombre' and id_user=$user_id";
            $sql2 = "UPDATE `account` SET `name_account`='$nombre' WHERE `id_account`=$id";
            Rest::binnacle($id_user, "Actualizacion de cuenta: $nombre");
            if (Rest::exists($sql1)) {
                echo json_encode(array('state' => false));
            } else {
                echo Rest::execute($sql2);
            }
            break;
        case "delete_account":
            $id = $user['id'];
            $sql = "DELETE FROM `account` WHERE `account`.`id_account` = $id";
            Rest::binnacle($id_user, "Eliminacion de cuenta n* $id");
            echo Rest::execute($sql);
            break;
        default:
            echo json_encode('hola');
    }
}
