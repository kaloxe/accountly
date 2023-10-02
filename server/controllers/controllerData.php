<?php
require_once("../db/db.php");
require_once("../models/class_rest.php");

if (isset($_POST)) {
    $data = file_get_contents("php://input");
    $user = json_decode($data, true);
    switch ($user['action']) {
        case "update_data":
            $sql1 = "SELECT * FROM diary INNER JOIN date on date.id_date=diary.id_date WHERE date.date<CURRENT_DATE";
            $resultado = $conn->query($sql1);
            $num_rows = $resultado->num_rows;
            if ($num_rows > 0) {
                while ($row = $resultado->fetch_assoc()) {
                    $sql2 = 'UPDATE `diary` SET `state_register`=0 WHERE id_diary=' . $row['id_diary'] .'';
                    Rest::execute($sql2);
                }
                echo json_encode(array('state' => true));
            } else {
                echo json_encode(array('state' => false));
            }
            
            break;
        default:
            echo json_encode('hola');
    }
}
