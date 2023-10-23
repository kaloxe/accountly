<?php
require_once("../session/session.php");
require_once("../models/class_rest.php");

if (isset($_POST)) {
    $data = file_get_contents("php://input");
    $user = json_decode($data, true);
    switch ($user['action']) {
        case "report_movement":
            $tiempo = "";
            switch ($user['tiempo']) {
                case "week":
                    $tiempo = "1 WEEK";
                    break;
                case "month":
                    $tiempo = "1 MONTH";
                    break;
                case "semester":
                    $tiempo = "6 MONTH";
                    break;
                case "year":
                    $tiempo = "1 YEAR";
                    break;
                default:
                    $tiempo = "1 WEEK";
            }
            $columns = ['id_transaction', 'transaction.type', 'reason.name_reason', 'transaction.id_account', 'badge.name_badge', 'account.name_account', 'account.id_user', 'transaction.amount', 'date', 'description', 'nickname'];

            /* Nombre de la tabla */
            $table = "transaction";

            $id = 'id_transaction';

            /* Filtrado */
            $where = 'WHERE ' . $id_user_where . ' and date BETWEEN DATE_SUB(curdate(),INTERVAL ' . $tiempo . ') AND curdate()';


            /* Consulta */
            $sql = "SELECT SQL_CALC_FOUND_ROWS " . implode(", ", $columns) . " FROM $table INNER JOIN account on transaction.id_account=account.id_account INNER JOIN badge on badge.id_badge=transaction.id_badge INNER JOIN reason on reason.id_reason=transaction.id_reason  INNER JOIN user on user.id_user=account.id_user
            $where ORDER BY date DESC";
            $conn = new database();
            $resultado = $conn->openSQL()->query($sql);
            $num_rows = $resultado->num_rows;

            /* Mostrado resultados */
            $output = [];
            $output['data'] = '';

            if ($num_rows > 0) {
                while ($row = $resultado->fetch_assoc()) {
                    $output['data'] .= '<tr>';
                    ($type_user == "administrador") ? ($output['data'] .= '<td class="table-plus">' . $row['nickname'] . '</td>') : ($output['data'] .= '');
                    // $output['data'] .= '<td>' . $row['id_account'] . '</td>';
                    $output['data'] .= '<td>' . $row['name_badge'] . '</td>';
                    $output['data'] .= '<td class="count' . $row['type'] . '">' . $row['amount'] . '</td>';
                    $output['data'] .= '<td>' . $row['name_reason'] . '</td>';
                    $output['data'] .= '<td>' . $row['name_account'] . '</td>';
                    $output['data'] .= '<td>' . (date("d/m/Y", strtotime($row['date']))) . '</td>';
                    $output['data'] .= '</tr>';
                }
            }

            $output['chart'] = Rest::getMovements($id_user_where, $tiempo);

            echo json_encode($output, JSON_UNESCAPED_UNICODE);
            break;
        default:
            echo json_encode('hola');
    }
}
