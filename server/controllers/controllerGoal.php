<?php
require_once("../session/session.php");
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
            Rest::binnacle($id_user, "Creacion de meta: $meta");
            echo Rest::execute($sql);
            break;
        case "read_goal":
            $id = $user['id'];
            $sql = "SELECT `id_goal`, `id_badge`, `name_goal`, `description`, `complete`, `amount`, `type` FROM `goal` WHERE `id_goal`=$id";
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
            Rest::binnacle($id_user, "Actualizacion de meta: $meta");
            echo Rest::execute($sql);
            break;
        case "complete_goal":
            $id = $user["id"];
            $sqlData = "SELECT `id_goal`, `id_badge`, `name_goal`, `description`, `complete`, `amount`, `type` FROM `goal` WHERE `id_goal`=$id";
            $goalData = json_decode((Rest::readGoal($sqlData)), true);
            if ($goalData["complete"] == 1) {
                echo json_encode(array('state' => false));
            } else {
                $cuenta = $user["cuenta"];
                $descripcion = $user["descripcion"];
                $divisa = $goalData["id_badge"];
                $movimiento = $goalData["type"];
                $monto = $goalData["amount"];
                $fecha = date('y-m-d');
                $razon = 8;
                $sql1 = "INSERT INTO `transaction`(`id_account`, `id_badge`, `id_reason`, `type`, `amount`, `date`, `description`, `state_register`) VALUES ($cuenta, $divisa, $razon, $movimiento, $monto, '$fecha', '$descripcion', 1)";
                Rest::execute($sql1);
                $sql2 = "UPDATE `goal` SET `complete`=1 WHERE `id_goal`=$id";
                //Rest::binnacle($id_user, "Se completo meta de meta: $id");
                echo Rest::execute($sql2);
            }
            break;
        case "delete_goal":
            $id = $user['id'];
            $sql = "DELETE FROM `goal` WHERE `goal`.`id_goal` = $id";
            Rest::binnacle($id_user, "Eliminacion de meta n* $id");
            echo Rest::execute($sql);
            break;
        default:
            echo json_encode('hola');
    }
}
