<?php

require_once("../../../server/session/session.php");
require_once("../../../server/models/class_database.php");

/* Un arreglo de las columnas a mostrar en la tabla */
$columns = ['id_diary', 'diary.id_user', 'diary.description', 'badge.name_badge', 'date.date', 'diary.amount', 'diary.type', 'diary.state_register', 'nickname'];

/* Nombre de la tabla */
$table = "diary";

$id = 'id_diary';

/* Filtrado */
$where = 'WHERE ' . $id_user_where . ' AND 1';
//$where = 'WHERE ' . $id_user_where . ' AND diary.state_register=1';

/* Consulta */
$sql = "SELECT SQL_CALC_FOUND_ROWS " . implode(", ", $columns) . "
FROM $table INNER JOIN badge on badge.id_badge=diary.id_badge INNER JOIN date on date.id_date=diary.id_date INNER JOIN user on user.id_user=diary.id_user
$where ORDER BY date ASC";
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
        $output['data'] .= '<td>' . (date("d/m/Y", strtotime($row['date']))) . '</td>';
        $output['data'] .= '<td>' . $row['description'] . '</td>';
        $output['data'] .= '<td>' . $row['name_badge'] . '</td>';
        $output['data'] .= '<td class="count' . $row['type'] . '">' . $row['amount'] . '</td>';
        $output['data'] .= '<td>' . ($row['state_register'] ? 'Pendiente' : 'Pasado') . '</td>';
        //<a href="#" data-color="#265ed7" id="editar_' . $row['id_diary'] . '" name="editar" onclick="openUpdateModal(' . $row['id_diary'] . ')" data-toggle="modal" data-target="#modal_update"><i class="icon-copy dw dw-eye"></i></a>
        $output['data'] .= '
        <td>
            <div class="table-actions">';

        if ($row['state_register']) {
            $output['data'] .= '<a id="completar_' . $row['id_diary'] . '" name="completar" onclick="openCompleteModal(' . $row['id_diary'] . ')" data-toggle="modal" data-target="#modal_complete"><i class="icon-copy fa fa-calendar-check-o" aria-hidden="true"></i></i></a>';
        } else {
            $output['data'] .= '<a id="completar_' . $row['id_diary'] . '" name="completar"><i class="icon-copy fa fa-calendar-check-o" aria-hidden="true"></i></i></a>';
        }

        $output['data'] .=
            '   <a href="#" id="editar_' . $row['id_diary'] . '" name="editar" onclick="openUpdateModal(' . $row['id_diary'] . ')" data-toggle="modal" data-target="#modal_update"><i class="icon-copy dw dw-edit2 blue-icon"></i></a>
                <a href="#" id="eliminar_' . $row['id_diary'] . '" name="eliminar" onclick="openDeleteModal(' . $row['id_diary'] . ')" data-toggle="modal" data-target="#modal_delete"><i class="icon-copy dw dw-delete-3 red-icon"></i></a>
            </div>
        </td>';
        $output['data'] .= '</tr>';
    }
}

echo json_encode($output, JSON_UNESCAPED_UNICODE);
