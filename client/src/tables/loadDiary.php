<?php

require("/xampp/htdocs/accountly/server/session/session.php");
require("/xampp/htdocs/accountly/server/db/db.php");

/* Un arreglo de las columnas a mostrar en la tabla */
$columns = ['id_diary', 'diary.id_user', 'diary.description', 'badge.name_badge', 'date.date', 'diary.amount', 'diary.type', 'diary.state_register'];

/* Nombre de la tabla */
$table = "diary";

$id = 'id_diary';

/* Filtrado */
$where = 'WHERE ' . $id_user_where . '';


/* Consulta */
$sql = "SELECT SQL_CALC_FOUND_ROWS " . implode(", ", $columns) . "
FROM $table INNER JOIN badge on badge.id_badge=diary.id_badge INNER JOIN date on date.id_date=diary.id_date INNER JOIN user on user.id_user=diary.id_user
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
        $output['data'] .= '<td>' . (date("d/m/Y", strtotime($row['date']))) . '</td>';
        $output['data'] .= '<td>' . $row['description'] . '</td>';
        $output['data'] .= '<td>' . $row['name_badge'] . '</td>';
        $output['data'] .= '<td class="count' . $row['type'] . '">' . $row['amount'] . '</td>';
        $output['data'] .= '<td>' . ($row['state_register'] ? 'Pendiente' : 'Pasado') . '</td>';
        $output['data'] .= '
        <td>
            <div class="table-actions">
                <a href="#" data-color="#265ed7" id="editar_' . $row['id_diary'] . '" name="editar" onclick="openUpdateModal(' . $row['id_diary'] . ')" data-toggle="modal" data-target="#modal_update"><i class="icon-copy dw dw-edit2"></i></a>
                <a href="#" data-color="#e95959" id="eliminar_' . $row['id_diary'] . '" name="eliminar" onclick="openDeleteModal(' . $row['id_diary'] . ')" data-toggle="modal" data-target="#modal_delete"><i class="icon-copy dw dw-delete-3"></i></a>
            </div>
        </td>';
        $output['data'] .= '</tr>';
    }
}

echo json_encode($output, JSON_UNESCAPED_UNICODE);
