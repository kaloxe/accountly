<?php
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
            $monto = $user['monto'];
            $descripcion = $user['descripcion'];
            $referencia = $user['referencia'];
            $fecha =  $user['fecha'];
            $sql = "INSERT INTO `transaction`(`id_account`, `id_badge`, `type`, `reference`, `amount`, `date`, `description`, `state_register`) VALUES ($cuenta, $divisa, $movimiento, $referencia, $monto, '$fecha', '$descripcion', 1)";
            //$sql = "INSERT INTO `transaction`(`id_account`, `reference`, `amount`, `date`, `description`) VALUES ($cuenta, $cuenta, $referencia, $monto, '$fecha', '$description')";
            echo Rest::execute($sql);
            break;
        case "read_transaction":
            $id = $user['id'];
            $sql = "SELECT `id_transaction`, `type`, `id_badge`, `id_account`, `reference`, `amount`, `date`, `description` FROM `transaction` WHERE `id_transaction`=$id";
            echo Rest::readTransaction($sql);
            break;
        case "update_transaction":
            $id = $user["id"];
            $movimiento = $user['movimiento'];
            $cuenta = $user['cuenta'];
            $divisa = $user['divisa'];
            $monto = $user['monto'];
            $descripcion = $user['descripcion'];
            $referencia = $user['referencia'];
            $fecha =  $user['fecha'];
            $sql = "UPDATE `transaction` SET `type`='$movimiento', `id_badge`=$divisa, `id_account`=$cuenta, `reference`='$referencia', `amount`='$monto', `date`='$fecha', `description`='$descripcion' WHERE `id_transaction`=$id";
            echo Rest::execute($sql);
            break;
        case "delete_transaction":
            $id = $user['id'];
            $sql = "DELETE FROM `transaction` WHERE `transaction`.`id_transaction` = $id";
            echo Rest::execute($sql);
            break;
        default:
            echo json_encode('hola');
    }
}
