<?php
require_once("../../../server/session/session.php");
require_once("../../../server/models/class_database.php");

/* Un arreglo de las columnas a mostrar en la tabla */
$columns = ['id_account', 'account.id_user', 'name_account', 'nickname'];

/* Nombre de la tabla */
$table = "account";

$id = 'id_account';

/* Filtrado */
$where = 'WHERE ' . $id_user_where . '';

/* Consulta */
$sql = "SELECT SQL_CALC_FOUND_ROWS " . implode(", ", $columns) . "
FROM $table INNER JOIN user on user.id_user=account.id_user
$where";
$conn = new database();
$resultado = $conn->openSQL()->query($sql);
$num_rows = $resultado->num_rows;

function getBadges($id)
{
    require_once("/xampp/htdocs/accountly/server/models/class_database.php");
    $sql1 = "SELECT name_badge, (ifnull((SELECT SUM(transaction.amount) FROM transaction WHERE transaction.id_account=$id and badge.id_badge=transaction.id_badge and transaction.type=1),0)- ifnull((SELECT SUM(transaction.amount) FROM transaction WHERE transaction.id_account=$id and badge.id_badge=transaction.id_badge and transaction.type=0),0)) as subtotal FROM account INNER JOIN transaction on account.id_account=transaction.id_account INNER JOIN badge on transaction.id_badge=badge.id_badge WHERE account.id_account=$id GROUP BY badge.id_badge";
    $conn = new database();
    $resultado1 = $conn->openSQL()->query($sql1);
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
        ($type_user=="administrador") ? ($output['data'] .= '<td class="table-plus">' . $row['nickname'] . '</td>') : ($output['data'] .='');
        $output['data'] .= '<td>' . $row['name_account'] . '</td>';
        $output['data'] .= '<td>' . getBadges($row['id_account']) . '</td>';
        $output['data'] .= '
        <td>
            <div class="table-actions">
                <a href="#" id="editar_' . $row['id_account'] . '" name="editar" onclick="openUpdateModal(' . $row['id_account'] . ')" data-toggle="modal" data-target="#modal_update"><i class="icon-copy dw dw-edit2 blue-icon"></i></a>
                <a href="#" id="eliminar_' . $row['id_account'] . '" name="eliminar" onclick="openDeleteModal(' . $row['id_account'] . ')" data-toggle="modal" data-target="#modal_delete"><i class="icon-copy dw dw-delete-3 red-icon"></i></a>
            </div>
        </td>';
        $output['data'] .= '</tr>';
    }
}

echo json_encode($output, JSON_UNESCAPED_UNICODE);
