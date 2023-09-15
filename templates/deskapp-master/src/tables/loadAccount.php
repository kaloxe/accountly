<?php
/*
* Script: Cargar datos de lado del servidor con PHP y MySQL
* Autor: Marco Robles
* Team: Códigos de Programación
*/

require("/xampp/htdocs/accountly/server/session/session.php");
require("/xampp/htdocs/accountly/server/db/db.php");

/* Un arreglo de las columnas a mostrar en la tabla */
$columns = ['id_account', 'id_user', 'name_account'];

/* Nombre de la tabla */
$table = "account";

$id = 'id_account';

/* Filtrado */
$where = 'WHERE id_user=' . $id_user . '';


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
        $output['data'] .= '<td class="table-plus">' . $row['name_account'] . '</td>';
        $output['data'] .= '
        <td>
            <div class="dropdown">
                <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                    <i class="dw dw-more"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                    <a class="dropdown-item" href="#"><i class="dw dw-eye"></i> View</a>
                    <a class="dropdown-item" id="editar_' . $row['id_account'] . '" name="editar" onclick="openUpdateModal(' . $row['id_account'] . ')" data-toggle="modal" data-target="#modal_update"><i class="dw dw-edit2"></i> Edit</a>
                    <a class="dropdown-item" id="eliminar_' . $row['id_account'] . '" name="eliminar" onclick="openDeleteModal(' . $row['id_account'] . ')" data-toggle="modal" data-target="#modal_delete"><i class="dw dw-delete-3"></i> Delete</a>
                </div>
            </div>
        </td>';
        // $output['data'] .= '<td>
        // <a class="btn btn-warning btn-sm me-2" id="' . $row['id_account'] . '" name="editar" onclick="openModal(' . $row['id_account'] . ')" data-bs-toggle="modal" data-bs-target="#editAccountModal"><i class="fa fa-pen"></i></a>
        // <a class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteAccountModal' . $row['id_account'] . '"><i class="fa fa-trash me"></i></a>
        // </td>';
        $output['data'] .= '</tr>';
        // $output['data'] .= '<div class="modal fade" id="deleteAccountModal' . $row['id_account'] . '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        //     <div class="modal-dialog modal-dialog-centered">
        //         <div class="modal-content">
        //             <div class="modal-header">
        //                 <h1 class="modal-title fs-5" id="exampleModalLabel">Seguro que desea eliminar el deposito ' . $row['name_account'] . '?</h1>
        //                 </div>
        //             <div class="modal-footer">
        //                 <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        //                 <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#mensajed" data-bs-dismiss="modal" onclick="eliminar(' . $row['id_account'] . ')">Eliminar</button>        
        //             </div>
        //         </div>
        //     </div>
        // </div>';
    }
}

echo json_encode($output, JSON_UNESCAPED_UNICODE);
