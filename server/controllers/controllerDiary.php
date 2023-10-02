<?php
require("/xampp/htdocs/accountly/server/session/session.php");
require_once("../db/db.php");
require_once("../models/class_rest.php");

if (isset($_POST)) {
    $data = file_get_contents("php://input");
    $user = json_decode($data, true);
    switch ($user['action']) {
        case "create_diary":
            $movimiento = $user['movimiento'];
            $divisa = $user['divisa'];
            $monto = $user['monto'];
            $descripcion = $user['descripcion'];
            $fecha =  $user['fecha'];
            $sql = "INSERT INTO `date`(`date`) VALUES ('$fecha')";
            $sql1 = "INSERT INTO `diary`(`id_user`, `id_badge`, `id_date`, `description`, `amount`, `type`, `state_register`) VALUES ($id_user, $divisa, (SELECT MAX(date.id_date) AS id_date FROM date), '$descripcion', $monto, $movimiento, 1)";
            Rest::binnacle($id_user, "Creacion de evento para el $fecha");
            Rest::execute($sql);
            echo Rest::execute($sql1);
            break;
        case "read_diary":
            $id = $user['id'];
            $sql = "SELECT `id_diary`, `type`, `id_badge`, `amount`, `date`, `description` FROM `diary` INNER JOIN `date` on `date`.`id_date`=`diary`.`id_date` WHERE `id_diary`=$id";
            echo Rest::readDiary($sql);
            break;
        case "get_events":
            echo json_encode(Rest::getEvents($id_user_where));
            break;
        case "update_diary":
            $id = $user["id"];
            $movimiento = $user['movimiento'];
            $divisa = $user['divisa'];
            $monto = $user['monto'];
            $descripcion = $user['descripcion'];
            $fecha =  $user['fecha'];
            $sql = "UPDATE `date` SET `date`='$fecha' WHERE `id_date`= (SELECT `diary`.`id_date` FROM `date` INNER JOIN `diary` on `diary`.`id_date`=`date`.`id_date` WHERE `id_diary`=$id)";
            $sql1 = "UPDATE `diary` SET `type`=$movimiento, `id_badge`=$divisa, `amount`=$monto, `description`='$descripcion' WHERE `id_diary`=$id";
            Rest::binnacle($id_user, "Actualizacion de evento para el $fecha");
            Rest::execute($sql);
            echo Rest::execute($sql1);
            break;
        case "delete_diary":
            $id = $user['id'];
            $sql = "DELETE FROM `diary` WHERE `diary`.`id_diary` = $id";
            Rest::binnacle($id_user, "Eliminacion de evento n* $id");
            echo Rest::execute($sql);
            break;
        default:
            echo json_encode('hola');
    }
}
