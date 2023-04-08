<?php
require_once("../db/db.php");
require_once("../models/class_rest.php");

if (isset($_POST)) {
    $data = file_get_contents("php://input");
    $user = json_decode($data, true);

    switch ($user['action']) {
        case "create_transaction":
            $cuenta = $user['cuenta'];
            $monto = $user['monto'];
            $description = $user['descripcion'];
            $fuente = $user['fuente'];
            $referencia = $user['referencia'];
            $fecha =  $user['fecha'];
            $sql = "INSERT INTO `transaction`(`id_management`, `id_font`, `reference`, `amount`, `date`, `description`) VALUES ($cuenta, $fuente, $referencia, $monto, '$fecha', '$description')";
            echo Rest::execute($conn, $sql);
            // echo json_encode($user);
            // echo json_encode($sql);
            break;
        case "read_transaction":
            $id = $user['id'];
            $sql = "SELECT `id_transaction`, `id_management`, `id_font`, `reference`, `amount`, `date`, `description` FROM `transaction` WHERE `id_transaction`=$id";
            echo Rest::readTransaction($conn, $sql);
            break;
        case "update_transaction":
            $id = $user["id"];
            $cuenta = $user['cuenta'];
            $monto = $user['monto'];
            $descripcion = $user['descripcion'];
            $fuente = $user['fuente'];
            $referencia = $user['referencia'];
            $fecha = $user['fecha'];
            $sql = "UPDATE `transaction` SET `id_management`='$cuenta', `id_font`=$fuente, `reference`='$referencia', `amount`='$monto', `date`='$fecha', `description`='$descripcion' WHERE `id_transaction`=$id";
            echo Rest::execute($conn, $sql);
            break;
        case "delete_transaction":
            $id = $user['id'];
            $sql = "DELETE FROM `transaction` WHERE `transaction`.`id_transaction` = $id";
            echo Rest::execute($conn, $sql);
            break;
        default:
            echo json_encode('hola');
    }
}
