<?php

require_once("../../../server/session/session.php");
require_once("../../../server/models/class_database.php");

/* Un arreglo de las columnas a mostrar en la tabla */
$columns = ['id_diary', 'diary.id_user', 'diary.description', 'badge.name_badge', 'date.date', 'diary.amount', 'diary.type', 'diary.state_register', 'nickname'];

/* Nombre de la tabla */
$table = "diary";

$id = 'id_diary';

/* Filtrado */
$where = 'WHERE ' . $id_user_where . ' and diary.state_register=1';


/* Consulta */
$sql = "SELECT SQL_CALC_FOUND_ROWS " . implode(", ", $columns) . "
FROM $table INNER JOIN badge on badge.id_badge=diary.id_badge INNER JOIN date on date.id_date=diary.id_date INNER JOIN user on user.id_user=diary.id_user
$where ORDER BY date ASC LIMIT 1";
$conn = new database();
$resultado = $conn->openSQL()->query($sql);
$num_rows = $resultado->num_rows;

/* Mostrado resultados */
$output = [];
$output['data'] = '';

if ($num_rows > 0) {
    while ($row = $resultado->fetch_assoc()) {
        $output['data'] .= '
        <div class="card-box min-height-150px pd-20 mb-20 next-event">
            <div class="d-flex justify-content-between pb-20 text-white">
                <div class="icon h1 text-white">
                    <i class="fa fa-calendar mr-3" aria-hidden="true"></i>
                </div>
                <div class="font-14 text-right">
                    <div>Evento proximo</div>
                    <div class="font-12 text-right">' . (date("d/m/Y", strtotime($row['date']))) . '</div>
                </div>
            </div>
            <div class="d-flex justify-content-between align-items-end">
                <div class="text-white">
                    <div class="font-14">' . $row['description'] . '</div>
                    <div class="font-24 weight-500">' . $row['amount'] . ' ' . $row['name_badge'] . '</div>
                </div>
            </div>
        </div>
        ';
    }
}

echo json_encode($output, JSON_UNESCAPED_UNICODE);
