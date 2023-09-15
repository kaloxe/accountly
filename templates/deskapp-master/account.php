<?php require('./src/views/head.php'); ?>
<?php require('./src/views/loader.php'); ?>
<?php require('./src/views/header.php'); ?>
<?php require('./src/views/right-sidebar.php'); ?>
<?php require('./src/views/left-sidebar.php'); ?>

<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>DataTable</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="index.html">Home</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    DataTable
                                </li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-md-6 col-sm-12 text-right">
                        <a class="btn btn-primary" href="#" role="button" data-toggle="modal" data-target="#modal_create" type="button">
                            Registrar
                        </a>
                    </div>
                </div>
            </div>

            <!-- multiple select row Datatable start -->
            <div class="card-box mb-30">
                <div class="pd-20">
                    <h4 class="text-blue h4">Data Table with multiple select row</h4>
                </div>
                <div class="pb-20">
                    <table class="data-table table hover multiple-select-row nowrap">
                        <thead>
                            <tr>
                                <th class="table-plus datatable-nosort sort asc">Cuenta</th>
                                <th class="datatable-nosort">Action</th>
                            </tr>
                        </thead>
                        <tbody id="content">
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- multiple select row Datatable End -->

            <!-- Simple Datatable start -->
            <!-- <div class="card-box mb-30">
                <div class="pd-20">
                    <h4 class="text-blue h4">Data Table Simple</h4>
                    <p class="mb-0">
                        you can find more options
                        <a class="text-primary" href="https://datatables.net/" target="_blank">Click Here</a>
                    </p>
                </div>
                <div class="pb-20">
                    <table class="data-table table stripe hover nowrap">
                        <thead>
                            <tr>
                                <th class="table-plus datatable-nosort">Name</th>
                                <th>Age</th>
                                <th>Office</th>
                                <th>Address</th>
                                <th>Start Date</th>
                                <th class="datatable-nosort">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="table-plus">Gloria F. Mead</td>
                                <td>25</td>
                                <td>Sagittarius</td>
                                <td>2829 Trainer Avenue Peoria, IL 61602</td>
                                <td>29-03-2018</td>
                                <td>
                                    <div class="dropdown">
                                        <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                            <i class="dw dw-more"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                            <a class="dropdown-item" href="#"><i class="dw dw-eye"></i> View</a>
                                            <a class="dropdown-item" href="#"><i class="dw dw-edit2"></i> Edit</a>
                                            <a class="dropdown-item" href="#"><i class="dw dw-delete-3"></i> Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="table-plus">Andrea J. Cagle</td>
                                <td>30</td>
                                <td>Gemini</td>
                                <td>1280 Prospect Valley Road Long Beach, CA 90802</td>
                                <td>29-03-2018</td>
                                <td>
                                    <div class="dropdown">
                                        <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                            <i class="dw dw-more"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                            <a class="dropdown-item" href="#"><i class="dw dw-eye"></i> View</a>
                                            <a class="dropdown-item" href="#"><i class="dw dw-edit2"></i> Edit</a>
                                            <a class="dropdown-item" href="#"><i class="dw dw-delete-3"></i> Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="table-plus">Andrea J. Cagle</td>
                                <td>20</td>
                                <td>Gemini</td>
                                <td>2829 Trainer Avenue Peoria, IL 61602</td>
                                <td>29-03-2018</td>
                                <td>
                                    <div class="dropdown">
                                        <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                            <i class="dw dw-more"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                            <a class="dropdown-item" href="#"><i class="dw dw-eye"></i> View</a>
                                            <a class="dropdown-item" href="#"><i class="dw dw-edit2"></i> Edit</a>
                                            <a class="dropdown-item" href="#"><i class="dw dw-delete-3"></i> Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="table-plus">Andrea J. Cagle</td>
                                <td>30</td>
                                <td>Sagittarius</td>
                                <td>1280 Prospect Valley Road Long Beach, CA 90802</td>
                                <td>29-03-2018</td>
                                <td>
                                    <div class="dropdown">
                                        <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                            <i class="dw dw-more"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                            <a class="dropdown-item" href="#"><i class="dw dw-eye"></i> View</a>
                                            <a class="dropdown-item" href="#"><i class="dw dw-edit2"></i> Edit</a>
                                            <a class="dropdown-item" href="#"><i class="dw dw-delete-3"></i> Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="table-plus">Andrea J. Cagle</td>
                                <td>25</td>
                                <td>Gemini</td>
                                <td>2829 Trainer Avenue Peoria, IL 61602</td>
                                <td>29-03-2018</td>
                                <td>
                                    <div class="dropdown">
                                        <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                            <i class="dw dw-more"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                            <a class="dropdown-item" href="#"><i class="dw dw-eye"></i> View</a>
                                            <a class="dropdown-item" href="#"><i class="dw dw-edit2"></i> Edit</a>
                                            <a class="dropdown-item" href="#"><i class="dw dw-delete-3"></i> Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="table-plus">Andrea J. Cagle</td>
                                <td>20</td>
                                <td>Sagittarius</td>
                                <td>1280 Prospect Valley Road Long Beach, CA 90802</td>
                                <td>29-03-2018</td>
                                <td>
                                    <div class="dropdown">
                                        <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                            <i class="dw dw-more"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                            <a class="dropdown-item" href="#"><i class="dw dw-eye"></i> View</a>
                                            <a class="dropdown-item" href="#"><i class="dw dw-edit2"></i> Edit</a>
                                            <a class="dropdown-item" href="#"><i class="dw dw-delete-3"></i> Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="table-plus">Andrea J. Cagle</td>
                                <td>18</td>
                                <td>Gemini</td>
                                <td>1280 Prospect Valley Road Long Beach, CA 90802</td>
                                <td>29-03-2018</td>
                                <td>
                                    <div class="dropdown">
                                        <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                            <i class="dw dw-more"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                            <a class="dropdown-item" href="#"><i class="dw dw-eye"></i> View</a>
                                            <a class="dropdown-item" href="#"><i class="dw dw-edit2"></i> Edit</a>
                                            <a class="dropdown-item" href="#"><i class="dw dw-delete-3"></i> Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="table-plus">Andrea J. Cagle</td>
                                <td>30</td>
                                <td>Sagittarius</td>
                                <td>1280 Prospect Valley Road Long Beach, CA 90802</td>
                                <td>29-03-2018</td>
                                <td>
                                    <div class="dropdown">
                                        <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                            <i class="dw dw-more"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                            <a class="dropdown-item" href="#"><i class="dw dw-eye"></i> View</a>
                                            <a class="dropdown-item" href="#"><i class="dw dw-edit2"></i> Edit</a>
                                            <a class="dropdown-item" href="#"><i class="dw dw-delete-3"></i> Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="table-plus">Andrea J. Cagle</td>
                                <td>30</td>
                                <td>Sagittarius</td>
                                <td>1280 Prospect Valley Road Long Beach, CA 90802</td>
                                <td>29-03-2018</td>
                                <td>
                                    <div class="dropdown">
                                        <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                            <i class="dw dw-more"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                            <a class="dropdown-item" href="#"><i class="dw dw-eye"></i> View</a>
                                            <a class="dropdown-item" href="#"><i class="dw dw-edit2"></i> Edit</a>
                                            <a class="dropdown-item" href="#"><i class="dw dw-delete-3"></i> Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="table-plus">Andrea J. Cagle</td>
                                <td>30</td>
                                <td>Gemini</td>
                                <td>1280 Prospect Valley Road Long Beach, CA 90802</td>
                                <td>29-03-2018</td>
                                <td>
                                    <div class="dropdown">
                                        <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                            <i class="dw dw-more"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                            <a class="dropdown-item" href="#"><i class="dw dw-eye"></i> View</a>
                                            <a class="dropdown-item" href="#"><i class="dw dw-edit2"></i> Edit</a>
                                            <a class="dropdown-item" href="#"><i class="dw dw-delete-3"></i> Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="table-plus">Andrea J. Cagle</td>
                                <td>30</td>
                                <td>Gemini</td>
                                <td>1280 Prospect Valley Road Long Beach, CA 90802</td>
                                <td>29-03-2018</td>
                                <td>
                                    <div class="dropdown">
                                        <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                            <i class="dw dw-more"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                            <a class="dropdown-item" href="#"><i class="dw dw-eye"></i> View</a>
                                            <a class="dropdown-item" href="#"><i class="dw dw-edit2"></i> Edit</a>
                                            <a class="dropdown-item" href="#"><i class="dw dw-delete-3"></i> Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="table-plus">Andrea J. Cagle</td>
                                <td>30</td>
                                <td>Gemini</td>
                                <td>1280 Prospect Valley Road Long Beach, CA 90802</td>
                                <td>29-03-2018</td>
                                <td>
                                    <div class="dropdown">
                                        <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                            <i class="dw dw-more"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                            <a class="dropdown-item" href="#"><i class="dw dw-eye"></i> View</a>
                                            <a class="dropdown-item" href="#"><i class="dw dw-edit2"></i> Edit</a>
                                            <a class="dropdown-item" href="#"><i class="dw dw-delete-3"></i> Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div> -->
            <!-- Simple Datatable End -->

            <!-- Create modal -->
            <div class="col-md-4 col-sm-12 mb-30">
                <div class="pd-20 card-box height-100-p">
                    <h5 class="h4">Medium modal</h5>

                    <div class="modal fade" id="modal_create" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">

                            <div class="formulario__mensaje p-1 text-center mb-2 pb-5" id="formulario__mensaje">
                                <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Rellene el formulario correctamente. </p>
                            </div>

                            <div class="modal-content">
                                <form id="formulario_create">
                                    <div class="modal-body">
                                        <h4 class="text-blue h4 mb-10">Crear</h4>
                                        <div class="form-group formulario__grupo-input" id="grupo__nombre_create">
                                            <label>Event name</label>
                                            <input type="text" class="form-control formulario__input" name="nombre_create" id="nombre_create" />
                                            <p class="formulario__input-error">El campo debe tener de 4 a 40 caracteres, solo se aceptan letras y numeros.</p>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <input type="button" class="btn btn-primary" id="create" value="Registrar">
                                        <button type="button" class="btn btn-primary" data-dismiss="modal">
                                            Close
                                        </button>
                                    </div>
                                    <p class="formulario__mensaje-exito pt-2" id="formulario__mensaje-exito">Formulario enviado exitosamente!</p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Edit modal -->
            <div class="col-md-4 col-sm-12 mb-30">
                <div class="pd-20 card-box height-100-p">
                    <h5 class="h4">Medium modal</h5>

                    <div class="modal fade" id="modal_update" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">

                            <div class="formulario__mensaje p-1 text-center mb-2 pb-5" id="formulario__mensaje">
                                <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Rellene el formulario correctamente. </p>
                            </div>

                            <div class="modal-content">
                                <form id="formulario_update">
                                    <div class="modal-body">
                                        <h4 class="text-blue h4 mb-10">Actualizar</h4>
                                        <div class="form-group formulario__grupo-input" id="grupo__nombre_update">
                                            <label>Event name</label>
                                            <input type="text" class="form-control formulario__input" name="nombre_update" id="nombre_update" />
                                            <p class="formulario__input-error">El campo debe tener de 4 a 40 caracteres, solo se aceptan letras y numeros.</p>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <input type="button" class="btn btn-primary" id="update" value="Actualizar">
                                        <button type="button" class="btn btn-primary" data-dismiss="modal">
                                            Close
                                        </button>
                                    </div>
                                    <p class="formulario__mensaje-exito pt-2" id="formulario__mensaje-exito">Formulario enviado exitosamente!</p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Delete modal -->
            <div class="col-md-4 col-sm-12 mb-30">
                <div class="pd-20 card-box height-100-p">
                    <h5 class="h4">Medium modal</h5>

                    <div class="modal fade" id="modal_delete" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <form>
                                    <div class="modal-body">
                                        <h4 class="text-blue h4 mb-10">Eliminar</h4>
                                        <p>Esta seguro de que quiere borrar el registro?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <input type="button" class="btn btn-primary" id="eliminar" value="Eliminar">
                                        <button type="button" class="btn btn-primary" data-dismiss="modal">
                                            Close
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="footer-wrap pd-20 mb-20 card-box">
            DeskApp - Bootstrap 4 Admin Template By
            <a href="https://github.com/dropways" target="_blank">Ankit Hingarajiya</a>
        </div>
    </div>
</div>

<script>
    let index_delete;

    function openDeleteModal(id) {
        index_delete = id;
    }
    const eliminar = document.getElementById("eliminar");
    eliminar.addEventListener("click", (e) => {
        e.preventDefault();
        let data = {
            action: "delete_account",
            id: index_delete,
        };
        fetch("/accountly/server/controllers/controllerAccount.php", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json; charset=utf-8",
                },
                body: JSON.stringify(data),
            })
            .then((res) => res.text())
            .then((dat) => console.log(dat));
    });

    // function eliminar(id) {
    //     let data = {
    //         action: "delete_account",
    //         id: id
    //     }
    //     fetch('/accountly/server/controllers/controllerAccount.php', {
    //             "method": 'POST',
    //             "headers": {
    //                 "Content-Type": "application/json; charset=utf-8"
    //             },
    //             "body": JSON.stringify(data)
    //         }).then(res => res.text())
    //         .then(dat => {
    //             setTimeout(() => {
    //                 window.location.href = "/accountly/src/accounts.php";
    //             }, 1500);
    //             console.log(dat)
    //         })
    // }

    /* Llamando a la función getData() */
    getData()

    /* Peticion AJAX */
    function getData() {
        let content = document.getElementById("content")

        let url = "src/tables/loadAccount.php"
        let formaData = new FormData()
        fetch(url, {
                method: "POST",
                body: formaData
            }).then(response => response.json())
            .then(data => {
                content.innerHTML = data.data
            }).catch(err => console.log(err))
    }
</script>

<script src="./src/js/validate-create-account.js"></script>
<script src="./src/js/validate-edit-account.js"></script>
<?php require('./src/views/scripts.php'); ?>
<script src="src/plugins/datatables/js/jquery.dataTables.min.js"></script>
<script src="src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
<script src="src/plugins/datatables/js/dataTables.responsive.min.js"></script>
<script src="src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
<!-- buttons for Export datatable -->
<script src="src/plugins/datatables/js/dataTables.buttons.min.js"></script>
<script src="src/plugins/datatables/js/buttons.bootstrap4.min.js"></script>
<script src="src/plugins/datatables/js/buttons.print.min.js"></script>
<script src="src/plugins/datatables/js/buttons.html5.min.js"></script>
<script src="src/plugins/datatables/js/buttons.flash.min.js"></script>
<script src="src/plugins/datatables/js/pdfmake.min.js"></script>
<script src="src/plugins/datatables/js/vfs_fonts.js"></script>
<!-- Datatable Setting js -->
<script src="vendors/scripts/datatable-setting.js"></script>
<?php require('./src/views/footer.php'); ?>