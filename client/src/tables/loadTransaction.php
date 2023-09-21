<?php
/*
* Script: Cargar datos de lado del servidor con PHP y MySQL
* Autor: Marco Robles
* Team: Códigos de Programación
*/

require("/xampp/htdocs/accountly/server/session/session.php");
require("/xampp/htdocs/accountly/server/db/db.php");

/* Un arreglo de las columnas a mostrar en la tabla */
$columns = ['id_transaction', 'transaction.type', 'reason.name_reason', 'transaction.id_account', 'badge.name_badge', 'account.name_account', 'id_user', 'transaction.amount', 'date', 'description'];

/* Nombre de la tabla */
$table = "transaction";

$id = 'id_transaction';

/* Filtrado */
$where = 'WHERE id_user='. $id_user .'';


/* Consulta */
$sql = "SELECT SQL_CALC_FOUND_ROWS " . implode(", ", $columns) . "
FROM $table INNER JOIN account on transaction.id_account=account.id_account INNER JOIN badge on badge.id_badge=transaction.id_badge INNER JOIN reason on reason.id_reason=transaction.id_reason
$where";
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
        $output['data'] .= '<td>' . $row['date'] . '</td>';

        $output['data'] .= '
        <td>
            <div class="table-actions">
                <a href="#" data-color="#265ed7" id="editar_' . $row['id_transaction'] . '" name="editar" onclick="openUpdateModal(' . $row['id_transaction'] . ')" data-toggle="modal" data-target="#modal_update"><i class="icon-copy dw dw-edit2"></i></a>
                <a href="#" data-color="#e95959" id="eliminar_' . $row['id_transaction'] . '" name="eliminar" onclick="openDeleteModal(' . $row['id_transaction'] . ')" data-toggle="modal" data-target="#modal_delete"><i class="icon-copy dw dw-delete-3"></i></a>
            </div>
        </td>';
        $output['data'] .= '</tr>';
    }
}

echo json_encode($output, JSON_UNESCAPED_UNICODE);
