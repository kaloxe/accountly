<?php
require("/xampp/htdocs/accountly/server/session/session.php");
require_once("../db/db.php");
require_once("../models/class_rest.php");

if (isset($_POST)) {
    $data = file_get_contents("php://input");
    $user = json_decode($data, true);

    switch ($user['action']) {
        case "create_goal":
            $movimiento = $user['movimiento'];
            $divisa = $user['divisa'];
            $monto = $user['monto'];
            $meta = $user['meta'];
            $descripcion = $user['descripcion'];
            $sql = "INSERT INTO `goal`(`id_user`, `id_badge`, `name_goal`, `description`, `amount`, `complete`, `type`, `state_register`) VALUES ($id_user, $divisa, '$meta', '$descripcion', $monto, 0, $movimiento, 1)";
            //$sql = "INSERT INTO `transaction`(`id_account`, `reference`, `amount`, `date`, `description`) VALUES ($cuenta, $cuenta, $referencia, $monto, '$fecha', '$description')";
            echo Rest::execute($sql);
            break;
        case "read_goal":
            $id = $user['id'];
            $sql = "SELECT `id_goal`, `id_badge`, `name_goal`, `description`, `amount`, `type` FROM `goal` WHERE `id_goal`=$id";
            echo Rest::readGoal($sql);
            break;
        case "update_goal":
            $id = $user["id"];
            $movimiento = $user['movimiento'];
            $divisa = $user['divisa'];
            $monto = $user['monto'];
            $meta = $user['meta'];
            $descripcion = $user['descripcion'];
            $sql = "UPDATE `goal` SET `type`=$movimiento, `id_badge`=$divisa, `amount`=$monto, `name_goal`='$meta', `description`='$descripcion' WHERE `id_goal`=$id";
            echo Rest::execute($sql);
            break;
        case "delete_goal":
            $id = $user['id'];
            $sql = "DELETE FROM `goal` WHERE `goal`.`id_goal` = $id";
            echo Rest::execute($sql);
            break;
        default:
            echo json_encode('hola');
    }
}
