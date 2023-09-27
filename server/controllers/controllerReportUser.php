<?php
require("/xampp/htdocs/accountly/server/session/session.php");
require_once("../db/db.php");
require_once("../models/class_rest.php");

if (isset($_POST)) {
    $data = file_get_contents("php://input");
    $user = json_decode($data, true);
    switch ($user['action']) {
        case "report_user":
            $usuario = (($user['usuario'] == "all") ? 1 : ('user.id_user=' . $user['usuario'] . ''));
            $tipo = (($user['tipo'] == "all") ? 1 : ('user.type_user="' . $user['tipo'] . '"'));
            $fecha1 =  $user['fecha1'];
            $fecha2 =  $user['fecha2'];
            /* Un arreglo de las columnas a mostrar en la tabla */
            $columns = ['id_binnacle', 'binnacle.movement', 'user.nickname', 'user.type_user', 'binnacle.datetime'];

            /* Nombre de la tabla */
            $table = "binnacle";

            $id = 'id_binnacle';

            /* Filtrado */
            $where = 'WHERE 1';

            $where = 'WHERE ' . $usuario . ' AND ' . $tipo . ' AND (datetime BETWEEN "' . $fecha1 . '" AND "' . $fecha2 . '")';

            /* Consulta */
            $sql = "SELECT SQL_CALC_FOUND_ROWS " . implode(", ", $columns) . " FROM $table INNER JOIN user on user.id_user=binnacle.id_user $where order by datetime desc";
            $resultado = $conn->query($sql);
            $num_rows = $resultado->num_rows;

            /* Mostrado resultados */
            $output = [];
            $output['data'] = '';

            if ($num_rows > 0) {
                while ($row = $resultado->fetch_assoc()) {
                    $output['data'] .= '<tr>';
                    $output['data'] .= '<td>' . $row['nickname'] . '</td>';
                    $output['data'] .= '<td>' . $row['type_user'] . '</td>';
                    $output['data'] .= '<td>' . $row['movement'] . '</td>';
                    $output['data'] .= '<td>' . (date("d/m/Y H:i:s", strtotime($row['datetime']))) . '</td>';
                    $output['data'] .= '</tr>';
                }
            }

            echo json_encode($output, JSON_UNESCAPED_UNICODE);
            break;
        default:
            echo json_encode('hola');
    }
}
