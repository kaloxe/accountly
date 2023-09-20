<?php
require("/xampp/htdocs/accountly/server/session/session.php");
require("/xampp/htdocs/accountly/server/db/db.php");

/* Un arreglo de las columnas a mostrar en la tabla */
$columns = ['id_account', 'id_user', 'name_account'];

/* Nombre de la tabla */
$table = "account";

$id = 'id_account';

/* Filtrado */
$where = 'WHERE id_user=' . $id_user . '';


/* Consulta */
$sql = "SELECT SQL_CALC_FOUND_ROWS " . implode(", ", $columns) . "
FROM $table
$where";
$resultado = $conn->query($sql);
$num_rows = $resultado->num_rows;

function getBadges($id)
{
    require("/xampp/htdocs/accountly/server/db/db.php");
    $sql1 = "SELECT name_badge, (ifnull((SELECT SUM(transaction.amount) FROM transaction WHERE transaction.id_account=$id and badge.id_badge=transaction.id_badge and transaction.type=1),0)- ifnull((SELECT SUM(transaction.amount) FROM transaction WHERE transaction.id_account=$id and badge.id_badge=transaction.id_badge and transaction.type=0),0)) as subtotal FROM account INNER JOIN transaction on account.id_account=transaction.id_account INNER JOIN badge on transaction.id_badge=badge.id_badge WHERE account.id_account=$id GROUP BY badge.id_badge";
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
        $output['data'] .= '<td class="table-plus">' . $row['name_account'] . '</td>';
        $output['data'] .= '<td>' . getBadges($row['id_account']) . '</td>';
        $output['data'] .= '
        <td>
            <div class="dropdown">
                <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                    <i class="dw dw-more"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                    <a class="dropdown-item" href="#"><i class="dw dw-eye"></i> View</a>
                    <a class="dropdown-item" id="editar_' . $row['id_account'] . '" name="editar" onclick="openUpdateModal(' . $row['id_account'] . ')" data-toggle="modal" data-target="#modal_update"><i class="dw dw-edit2"></i> Edit</a>
                    <a class="dropdown-item" id="eliminar_' . $row['id_account'] . '" name="eliminar" onclick="openDeleteModal(' . $row['id_account'] . ')" data-toggle="modal" data-target="#modal_delete"><i class="dw dw-delete-3"></i> Delete</a>
                </div>
            </div>
        </td>';
        $output['data'] .= '</tr>';
    }
}

echo json_encode($output, JSON_UNESCAPED_UNICODE);
