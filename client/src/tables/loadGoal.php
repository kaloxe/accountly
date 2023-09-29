<?php
require("/xampp/htdocs/accountly/server/session/session.php");
require("/xampp/htdocs/accountly/server/db/db.php");

/* Un arreglo de las columnas a mostrar en la tabla */
$columns = ['id_goal', 'goal.id_user', 'badge.id_badge', 'badge.name_badge', 'name_goal', 'description', 'amount', 'complete', 'type', 'state_register'];

/* Nombre de la tabla */
$table = "goal";

$id = 'id_goal';

/* Filtrado */
$where = 'WHERE ' . $id_user_where . '';


/* Consulta */
$sql = "SELECT SQL_CALC_FOUND_ROWS " . implode(", ", $columns) . "
FROM $table INNER JOIN badge on goal.id_badge=badge.id_badge INNER JOIN user on user.id_user=goal.id_user
$where";
$resultado = $conn->query($sql);
$num_rows = $resultado->num_rows;

/* Mostrado resultados */
$output = [];
$output['data'] = '';

if ($num_rows > 0) {
    while ($row = $resultado->fetch_assoc()) {

        $output['data'] .= '
        <div class="col-sm-12 col-md-6 col-lg-4 mb-30">
            <div class="card card-box">
                <div class="card-header count' . $row['type'] . '">' . $row['amount'] . ' ' . $row['name_badge'] . '</div>
                
                <div class="card-body">';
        $output['data'] .= '
                    <h5 class="card-title">' . $row['name_goal'] . '</h5>';

        $output['data'] .= '
                    <p class="card-text">
                    ' . $row['description'] . '
                    </p>';
        //<button class="btn '. ($row['complete'] ? 'btn-warning' : 'btn-secondary')  .'" onclick="completeGoal(' . $row['id_goal'] . ')">' . ($row['complete'] ? 'Completada' : 'Completar') . '</button>
        if ($row['complete']) {
            $output['data'] .= '<button class="btn btn-warning">Completada</button>';
        } else {
            $output['data'] .= '<button class="btn btn-secondary" onclick="openCompleteModal(' . $row['id_goal'] . ')" data-toggle="modal" data-target="#modal_complete">Completar</button>';
        }

        $output['data'] .= '
                    <button
                        type="button"
                        class="btn btn-info"
                        data-color="#ffffff"
                        id="editar_' . $row['id_goal'] . '" name="editar" onclick="openUpdateModal(' . $row['id_goal'] . ')" data-toggle="modal" data-target="#modal_update"
                    >
                        <i class="fa fa-pencil"></i>
                    </button>
                    <button
                        type="button"
                        class="btn btn-danger pull-right"
                        data-bgcolor="#bd081c"
                        id="eliminar_' . $row['id_goal'] . '" name="eliminar" onclick="openDeleteModal(' . $row['id_goal'] . ')" data-toggle="modal" data-target="#modal_delete"
                    >
                        <i class="fa fa-trash"></i>
                    </button>
                </div>
            </div>
        </div>';
    }
}

echo json_encode($output, JSON_UNESCAPED_UNICODE);
