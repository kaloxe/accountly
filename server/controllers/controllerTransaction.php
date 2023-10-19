<?php
require("../session/session.php");
require_once("../db/db.php");
require_once("../models/class_rest.php");

if (isset($_POST)) {
    $data = file_get_contents("php://input");
    $user = json_decode($data, true);
    switch ($user['action']) {
        case "create_transaction":
            $movimiento = $user['movimiento'];
            $cuenta = $user['cuenta'];
            $divisa = $user['divisa'];
            $razon = $user['razon'];
            $monto = $user['monto'];
            $descripcion = $user['descripcion'];
            $fecha =  $user['fecha'];
            $sql = "INSERT INTO `transaction`(`id_account`, `id_badge`, `id_reason`, `type`, `amount`, `date`, `description`, `state_register`) VALUES ($cuenta, $divisa, $razon, $movimiento, $monto, '$fecha', '$descripcion', 1)";
            Rest::binnacle($id_user, "Registro de transaccion");
            echo Rest::execute($sql);
            break;
        case "transfer_transaction":
            $cuenta1 = $user['cuenta1'];
            $cuenta2 = $user['cuenta2'];
            $divisa = $user['divisa'];
            $razon = $user['razon'];
            $monto = $user['monto'];
            $descripcion = $user['descripcion'];
            $fecha =  $user['fecha'];
            $sql1 = "INSERT INTO `transaction`(`id_account`, `id_badge`, `id_reason`, `type`, `amount`, `date`, `description`, `state_register`) VALUES ($cuenta1, $divisa, $razon, 0, $monto, '$fecha', '$descripcion', 1)";
            $sql2 = "INSERT INTO `transaction`(`id_account`, `id_badge`, `id_reason`, `type`, `amount`, `date`, `description`, `state_register`) VALUES ($cuenta2, $divisa, $razon, 1, $monto, '$fecha', '$descripcion', 1)";
            Rest::binnacle($id_user, "Transferencia entre cuentas");
            Rest::execute($sql1);
            echo Rest::execute($sql2);
            break;
        case "read_transaction":
            $id = $user['id'];
            $sql = "SELECT `id_transaction`, `type`, `id_badge`, `id_reason`, `id_account`, `amount`, `date`, `description` FROM `transaction` WHERE `id_transaction`=$id";
            echo Rest::readTransaction($sql);
            break;
        case "update_transaction":
            $id = $user["id"];
            $movimiento = $user['movimiento'];
            $cuenta = $user['cuenta'];
            $divisa = $user['divisa'];
            $razon = $user['razon'];
            $monto = $user['monto'];
            $descripcion = $user['descripcion'];
            $fecha =  $user['fecha'];
            $sql = "UPDATE `transaction` SET `type`=$movimiento, `id_badge`=$divisa, `id_reason`=$razon, `id_account`=$cuenta, `amount`=$monto, `date`='$fecha', `description`='$descripcion' WHERE `id_transaction`=$id";
            Rest::binnacle($id_user, "Cambio en la transaccion n* $id");
            echo Rest::execute($sql);
            break;
        case "delete_transaction":
            $id = $user['id'];
            $sql = "DELETE FROM `transaction` WHERE `transaction`.`id_transaction` = $id";
            Rest::binnacle($id_user, "Eliminacion de la transaccion n* $id");
            echo Rest::execute($sql);
            break;
        default:
            echo json_encode('hola');
    }
}
