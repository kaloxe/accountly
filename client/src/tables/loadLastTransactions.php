<?php
require_once("../../../server/session/session.php");
require_once("../../../server/models/class_database.php");

/* Un arreglo de las columnas a mostrar en la tabla */
$columns = ['id_transaction', 'transaction.type', 'reason.name_reason', 'transaction.id_account', 'badge.name_badge', 'account.name_account', 'account.id_user', 'transaction.amount', 'date', 'description', 'nickname'];

/* Nombre de la tabla */
$table = "transaction";

$id = 'id_transaction';

/* Filtrado */
$where = 'WHERE '. $id_user_where .'';


/* Consulta */
$sql = "SELECT SQL_CALC_FOUND_ROWS " . implode(", ", $columns) . "
FROM $table INNER JOIN account on transaction.id_account=account.id_account INNER JOIN badge on badge.id_badge=transaction.id_badge INNER JOIN reason on reason.id_reason=transaction.id_reason INNER JOIN user on user.id_user=account.id_user
$where ORDER BY date DESC LIMIT 10";
$conn = new database();
$resultado = $conn->openSQL()->query($sql);
$num_rows = $resultado->num_rows;

/* Mostrado resultados */
$output = [];
$output['data'] = '';

if ($num_rows > 0) {
    while ($row = $resultado->fetch_assoc()) {
        $output['data'] .= '<tr>';
        ($type_user=="administrador") ? ($output['data'] .= '<td class="table-plus">' . $row['nickname'] . '</td>') : ($output['data'] .='');
        // $output['data'] .= '<td>' . $row['id_account'] . '</td>';
        $output['data'] .= '<td  scope="row" class="table-plus">' . $row['name_badge'] . '</td>';
        $output['data'] .= '<td class="count' . $row['type'] . '">' . $row['amount'] . '</td>';
        $output['data'] .= '<td>' . $row['name_account'] . '</td>';
        $output['data'] .= '<td>' . $row['name_reason'] . '</td>';
        $output['data'] .= '<td>' . (date("d/m/Y", strtotime($row['date']))) . '</td>';
        $output['data'] .= '</tr>';
    }
} else {
    $output['data'] .= '<tr class="odd text-center"><td valign="top" colspan="7" class="dataTables_empty">No hay datos disponibles en la tabla</td></tr>';
}

echo json_encode($output, JSON_UNESCAPED_UNICODE);
