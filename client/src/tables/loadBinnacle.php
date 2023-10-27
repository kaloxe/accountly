<?php
require_once("../../../server/session/session.php");
require_once("../../../server/models/class_database.php");

/* Un arreglo de las columnas a mostrar en la tabla */
$columns = ['id_binnacle', 'binnacle.movement', 'user.nickname', 'user.type_user', 'binnacle.datetime'];

/* Nombre de la tabla */
$table = "binnacle";

$id = 'id_binnacle';

/* Filtrado */
$where = 'WHERE '. $id_user_where .'';


/* Consulta */
$sql = "SELECT SQL_CALC_FOUND_ROWS " . implode(", ", $columns) . "
FROM $table INNER JOIN user on user.id_user=binnacle.id_user 
$where order by datetime desc";
$conn = new database();
$resultado = $conn->openSQL()->query($sql);
$num_rows = $resultado->num_rows;

/* Mostrado resultados */
$output = [];
$output['data'] = '';

if ($num_rows > 0) {
    while ($row = $resultado->fetch_assoc()) {
        $output['data'] .= '<tr>';
        ($type_user == "administrador") ? ($output['data'] .= '<td class="table-plus">' . $row['type_user'] . '</td>') : ($output['data'] .= '');
        ($type_user == "administrador") ? ($output['data'] .= '<td class="table-plus">' . $row['nickname'] . '</td>') : ($output['data'] .= '');
        $output['data'] .= '<td>' . $row['movement'] . '</td>';
        $output['data'] .= '<td>' . (date("d/m/Y H:i:s", strtotime($row['datetime']))) . '</td>';
        $output['data'] .= '</tr>';
    }
}

echo json_encode($output, JSON_UNESCAPED_UNICODE);
