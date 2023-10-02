<?php

require("/xampp/htdocs/accountly/server/session/session.php");
require("/xampp/htdocs/accountly/server/db/db.php");

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
$resultado = $conn->query($sql);
$num_rows = $resultado->num_rows;

/* Mostrado resultados */
$output = [];
$output['data'] = '';

if ($num_rows > 0) {
    while ($row = $resultado->fetch_assoc()) {
        $output['data'] .= '<tr>';
        ($type_user == "administrador") ? ($output['data'] .= '<td class="table-plus">' . $row['nickname'] . '</td>') : ($output['data'] .= '');
        // $output['data'] .= '<td>' . $row['id_account'] . '</td>';
        $output['data'] .= '<td>' . (date("d/m/Y", strtotime($row['date']))) . '</td>';
        $output['data'] .= '<td>' . $row['description'] . '</td>';
        $output['data'] .= '<td>' . $row['name_badge'] . '</td>';
        $output['data'] .= '<td class="count' . $row['type'] . '">' . $row['amount'] . '</td>';
        $output['data'] .= '<td>' . ($row['state_register'] ? 'Pendiente' : 'Pasado') . '</td>';
        $output['data'] .= '</tr>';
    }
}

echo json_encode($output, JSON_UNESCAPED_UNICODE);
