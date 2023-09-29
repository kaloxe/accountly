<?php
/*
* Script: Cargar datos de lado del servidor con PHP y MySQL
* Autor: Marco Robles
* Team: Códigos de Programación
*/

require("/xampp/htdocs/accountly/server/session/session.php");
require("/xampp/htdocs/accountly/server/db/db.php");

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
$resultado = $conn->query($sql);
$num_rows = $resultado->num_rows;

/* Mostrado resultados */
$output = [];
$output['data'] = '';

if ($num_rows > 0) {
    while ($row = $resultado->fetch_assoc()) {
        $output['data'] .= '<tr>';
        $output['data'] .= '<td>' . $row['type_user'] . '</td>';
        $output['data'] .= '<td>' . $row['nickname'] . '</td>';
        $output['data'] .= '<td>' . $row['movement'] . '</td>';
        $output['data'] .= '<td>' . (date("d/m/Y H:i:s", strtotime($row['datetime']))) . '</td>';
        $output['data'] .= '</tr>';
    }
}

echo json_encode($output, JSON_UNESCAPED_UNICODE);
