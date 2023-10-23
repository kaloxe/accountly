<?php
require_once("../../../server/session/session.php");
require_once("../../../server/models/class_database.php");

/* Un arreglo de las columnas a mostrar en la tabla */
$columns = ['id_user', 'nickname', 'password', 'email', 'type_user'];

/* Nombre de la tabla */
$table = "user";

$id = 'id_user';

/* Filtrado */
$where = 'WHERE 1';

/* Consulta */
$sql = "SELECT SQL_CALC_FOUND_ROWS " . implode(", ", $columns) . "
FROM $table
$where";
$conn = new database();
$resultado = $conn->openSQL()->query($sql);
$num_rows = $resultado->num_rows;

/* Mostrado resultados */
$output = [];
$output['data'] = '';

if ($num_rows > 0) {
    while ($row = $resultado->fetch_assoc()) {
        $output['data'] .= '<tr>';
        // $output['data'] .= '<td>' . $row['id_account'] . '</td>';
        $output['data'] .= '<td>' . $row['type_user'] . '</td>';
        $output['data'] .= '<td>' . $row['nickname'] . '</td>';
        $output['data'] .= '<td>' . $row['email'] . '</td>';
        $output['data'] .= '<td>' . $row['password'] . '</td>';

        $output['data'] .= '
        <td>
            <div class="table-actions">
                <a href="#" id="editar_' . $row['id_user'] . '" name="editar" onclick="openUpdateModal(' . $row['id_user'] . ')" data-toggle="modal" data-target="#modal_update"><i class="icon-copy dw dw-edit2 blue-icon"></i></a>
                <a href="#" id="eliminar_' . $row['id_user'] . '" name="eliminar" onclick="openDeleteModal(' . $row['id_user'] . ')" data-toggle="modal" data-target="#modal_delete"><i class="icon-copy dw dw-delete-3 red-icon"></i></a>
            </div>
        </td>';
        $output['data'] .= '</tr>';
    }
}

echo json_encode($output, JSON_UNESCAPED_UNICODE);
