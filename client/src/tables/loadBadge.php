<?php
require("/xampp/htdocs/accountly/server/session/session.php");
require("/xampp/htdocs/accountly/server/db/db.php");

/* Un arreglo de las columnas a mostrar en la tabla */
$columns = ['id_badge', 'name_badge', 'value'];

/* Nombre de la tabla */
$table = "badge";

$id = 'id_badge';

/* Filtrado */
$where = 'WHERE 1';


/* Consulta */
$sql = "SELECT SQL_CALC_FOUND_ROWS " . implode(", ", $columns) . "
FROM $table
$where";
$resultado = $conn->query($sql);
$num_rows = $resultado->num_rows;

/* Mostrado resultados */
$output = [];
$output['data'] = '';

if ($num_rows > 0) {
    while ($row = $resultado->fetch_assoc()) {
        $output['data'] .= '<tr>';
        $output['data'] .= '<td class="table-plus">' . $row['name_badge'] . '</td>';
        $output['data'] .= '<td>' . $row['value'] . '</td>';
        $output['data'] .= '
        <td>
            <div class="table-actions">
                <a href="#" id="editar_' . $row['id_badge'] . '" name="editar" onclick="openUpdateModal(' . $row['id_badge'] . ')" data-toggle="modal" data-target="#modal_update"><i class="icon-copy dw dw-edit2 blue-icon"></i></a>
                <a href="#" id="eliminar_' . $row['id_badge'] . '" name="eliminar" onclick="openDeleteModal(' . $row['id_badge'] . ')" data-toggle="modal" data-target="#modal_delete"><i class="icon-copy dw dw-delete-3 red-icon"></i></a>
            </div>
        </td>';
        $output['data'] .= '</tr>';
    }
}

echo json_encode($output, JSON_UNESCAPED_UNICODE);
