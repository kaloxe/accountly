<?php
require("/xampp/htdocs/accountly/server/session/session.php");
require_once("../db/db.php");
require_once("../models/class_rest.php");

if (isset($_POST)) {
    $data = file_get_contents("php://input");
    $user = json_decode($data, true);

    switch ($user['action']) {
        case "create_debt":
            $descripcion = $user['descripcion'];
            $monto = $user['monto'];
            $sql = "INSERT INTO `debt`(`id_user`, `description`, `amount`) VALUES ($id_user, '$descripcion', $monto)";
            echo Rest::execute($sql);
            break;
        case "read_debt":
            $id = $user['id'];
            $sql = "SELECT `id_debt`, `description`, `amount` FROM `debt` WHERE `id_debt`=$id";
            echo Rest::readDebt($sql);
            break;
        case "update_debt":
            $id = $user["id"];
            $descripcion = $user['descripcion'];
            $monto = $user['monto'];
            $sql = "UPDATE `debt` SET `description`='$descripcion',`amount`=$monto WHERE `id_debt`=$id";
            echo Rest::execute($sql);
            break;
        case "delete_debt":
            $id = $user['id'];
            $sql = "DELETE FROM `debt` WHERE `debt`.`id_debt` = $id";
            echo Rest::execute($sql);
            break;
        default:
            echo json_encode('hola');
    }
}
