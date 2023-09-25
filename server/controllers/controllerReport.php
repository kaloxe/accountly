<?php
require("/xampp/htdocs/accountly/server/session/session.php");
require_once("../db/db.php");
require_once("../models/class_rest.php");

if (isset($_POST)) {
    $data = file_get_contents("php://input");
    $user = json_decode($data, true);

    switch ($user['action']) {
        case "report_transaction":
            $sql = "SELECT `id_transaction`, `type`, `id_badge`, `id_reason`, `id_account`, `amount`, `date`, `description` FROM `transaction` WHERE `id_transaction`=$id";
            echo Rest::readTransaction($sql);
            break;
        default:
            echo json_encode('hola');
    }
}
