<?php
require("/xampp/htdocs/accountly/server/session/session.php");
require_once("../db/db.php");
require_once("../models/class_rest.php");

if (isset($_POST)) {
    $data = file_get_contents("php://input");
    $user = json_decode($data, true);
    switch ($user['action']) {
        case "report_total":
            $cuentaC = (($user['cuenta'] == "all") ? 1 : ('account.id_account=' . $user['cuenta'] . ''));
            $cuentaT = (($user['cuenta'] == "all") ? 1 : ('transaction.id_account=' . $user['cuenta'] . ''));
            $divisa = (($user['divisa'] == "all") ? 1 : ('transaction.id_badge=' . $user['divisa'] . ''));

            /* Un arreglo de las columnas a mostrar en la tabla */
            $columns = ['id_account', 'account.id_user', 'name_account', 'nickname'];

            /* Nombre de la tabla */
            $table = "account";

            $id = 'id_account';

            /* Filtrado */
            $where = 'WHERE ' . $id_user_where . ' AND ' . $cuentaC . '';

            /* Consulta */
            $sql = "SELECT SQL_CALC_FOUND_ROWS " . implode(", ", $columns) . " 
            FROM $table INNER JOIN user on user.id_user=account.id_user $where";
            $resultado = $conn->query($sql);
            $num_rows = $resultado->num_rows;

            // totales
            function getTotal($type_user, $id_user, $badge)
            {
                require("/xampp/htdocs/accountly/server/db/db.php");
                $user_where = $type_user == "administrador" ? 1 : "account.id_user=$id_user";
                $sqlTotal = "SELECT name_badge, value, (ifnull((SELECT SUM(transaction.amount) FROM transaction INNER JOIN account on account.id_account=transaction.id_account WHERE $user_where and badge.id_badge=transaction.id_badge and transaction.type=1),0)-ifnull((SELECT SUM(transaction.amount) FROM transaction INNER JOIN account on account.id_account=transaction.id_account WHERE $user_where and badge.id_badge=transaction.id_badge and transaction.type=0),0)) as subtotal FROM transaction INNER JOIN account on account.id_account=transaction.id_account INNER JOIN user on user.id_user=account.id_user INNER JOIN badge on transaction.id_badge=badge.id_badge WHERE $user_where and $badge GROUP BY badge.id_badge";
                //$sqlTotal = "SELECT name_badge, (ifnull((SELECT SUM(transaction.amount) FROM transaction WHERE  badge.id_badge=transaction.id_badge and transaction.type=1),0)- ifnull((SELECT SUM(transaction.amount) FROM transaction WHERE badge.id_badge=transaction.id_badge and transaction.type=0),0)) as subtotal FROM account INNER JOIN transaction on account.id_account=transaction.id_account INNER JOIN badge on transaction.id_badge=badge.id_badge WHERE 1 GROUP BY badge.id_badge";
                $total = $conn->query($sqlTotal);
                $num_rowsTotal = $total->num_rows;
                $outputTotal = '';
                if ($num_rowsTotal > 0) {
                    while (($rowTotal = $total->fetch_assoc())) {
                        $outputTotal .= '' . $rowTotal['name_badge'] .  ' ' . $rowTotal['subtotal'] . '<br>';
                    }
                }
                return $outputTotal;
            }

            // obtener los saldos por divisa de una cuenta
            function getBadges($id, $badge)
            {
                require("/xampp/htdocs/accountly/server/db/db.php");
                $sql1 = "SELECT name_account, name_badge, value, (ifnull((SELECT SUM(transaction.amount) FROM transaction INNER JOIN account on account.id_account=transaction.id_account WHERE transaction.id_account=$id and badge.id_badge=transaction.id_badge and transaction.type=1 and 1 and 1),0) - ifnull((SELECT SUM(transaction.amount) FROM transaction INNER JOIN account on account.id_account=transaction.id_account WHERE transaction.id_account=$id and badge.id_badge=transaction.id_badge and transaction.type=0 and 1 and 1),0)) as subtotal FROM transaction INNER JOIN account on account.id_account=transaction.id_account INNER JOIN user on user.id_user=account.id_user INNER JOIN badge on transaction.id_badge=badge.id_badge WHERE $badge and transaction.id_account=$id GROUP BY badge.id_badge";
                //$sql1 = "SELECT name_badge, (ifnull((SELECT SUM(transaction.amount) FROM transaction WHERE transaction.id_account=$id and badge.id_badge=transaction.id_badge and transaction.type=1),0)- ifnull((SELECT SUM(transaction.amount) FROM transaction WHERE transaction.id_account=$id and badge.id_badge=transaction.id_badge and transaction.type=0),0)) as subtotal FROM account INNER JOIN transaction on account.id_account=transaction.id_account INNER JOIN badge on transaction.id_badge=badge.id_badge WHERE transaction.id_account=$id GROUP BY badge.id_badge";
                $resultado1 = $conn->query($sql1);
                $num_rows1 = $resultado1->num_rows;
                $output1 = '';
                if ($num_rows1 > 0) {
                    while (($row1 = $resultado1->fetch_assoc())) {
                        $output1 .= '' . $row1['name_badge'] .  ' ' . $row1['subtotal'] . '<br>';
                    }
                }
                return $output1;
            }

            /* Mostrado resultados */
            $output = [];
            $output['data'] = '';

            if ($num_rows > 0) {
                while ($row = $resultado->fetch_assoc()) {
                    $output['data'] .= '<tr>';
                    ($type_user == "administrador") ? ($output['data'] .= '<td class="table-plus">' . $row['nickname'] . '</td>') : ($output['data'] .= '');
                    $output['data'] .= '<td scope="row" class="table-plus">' . $row['name_account'] . '</td>';
                    $output['data'] .= '<td>' . getBadges($row['id_account'], $divisa) . '</td>';
                    $output['data'] .= '</tr>';
                }
            }
            if ($cuentaC == 1) {
                $output['data'] .= '<tr>';
                $output['data'] .= '<th>Total</th>';
                ($type_user == "administrador") ? ($output['data'] .= '<th></th>') : ($output['data'] .= '');
                $output['data'] .= '<th>' . getTotal($type_user, $id_user, $divisa) . '</th>';
                $output['data'] .= '</tr>';
            }

            $output['chart'] = Rest::getTotals($id_user_where, $cuentaC, $divisa);

            echo json_encode($output, JSON_UNESCAPED_UNICODE);
            break;
        default:
            echo json_encode('hola');
    }
}
