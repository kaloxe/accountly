<?php
require("/xampp/htdocs/accountly/server/session/session.php");
require_once("../db/db.php");
require_once("../models/class_rest.php");

if (isset($_POST)) {
    $data = file_get_contents("php://input");
    $user = json_decode($data, true);
    switch ($user['action']) {
        case "report_transaction":
            $cuenta = (($user['cuenta']=="all") ? 1 : ('transaction.id_account=' . $user['cuenta'] . ''));
            $divisa = (($user['divisa']=="all") ? 1 : ('transaction.id_badge=' . $user['divisa'] . ''));
            $razon = (($user['razon']=="all") ? 1 : ('transaction.id_reason=' . $user['razon'] . ''));
            $fecha1 =  $user['fecha1'];
            $fecha2 =  $user['fecha2'];
            $columns = ['id_transaction', 'transaction.type', 'reason.name_reason', 'transaction.id_reason', 'transaction.id_account', 'badge.name_badge', 'account.name_account', 'id_user', 'transaction.amount', 'date', 'description'];

            /* Nombre de la tabla */
            $table = "transaction";

            $id = 'id_transaction';

            /* Filtrado */
            $where = 'WHERE ' . $cuenta . ' AND ' . $divisa . ' AND ' . $razon . ' AND (date BETWEEN "' . $fecha1 . '" AND "' . $fecha2 . '") AND id_user=' . $id_user . '';

            /* Consulta */
            $sql = "SELECT SQL_CALC_FOUND_ROWS " . implode(", ", $columns) . " FROM $table INNER JOIN account on transaction.id_account=account.id_account INNER JOIN badge on badge.id_badge=transaction.id_badge INNER JOIN reason on reason.id_reason=transaction.id_reason $where ORDER BY date DESC";
            $resultado = $conn->query($sql);
            $num_rows = $resultado->num_rows;

            /* Mostrado resultados */
            $output = [];
            $output['data'] = '';

            if ($num_rows > 0) {
                while ($row = $resultado->fetch_assoc()) {
                    $output['data'] .= '<tr>';
                    // $output['data'] .= '<td>' . $row['id_account'] . '</td>';
                    $output['data'] .= '<td>' . $row['name_badge'] . '</td>';
                    $output['data'] .= '<td class="count' . $row['type'] . '">' . $row['amount'] . '</td>';
                    $output['data'] .= '<td>' . $row['name_reason'] . '</td>';
                    $output['data'] .= '<td>' . $row['description'] . '</td>';
                    $output['data'] .= '<td>' . $row['name_account'] . '</td>';
                    $output['data'] .= '<td>' . (date("d/m/Y", strtotime($row['date']))) . '</td>';
                    $output['data'] .= '</tr>';
                }
            }

            echo json_encode($output, JSON_UNESCAPED_UNICODE);
            break;
        default:
            echo json_encode('hola');
    }
}
