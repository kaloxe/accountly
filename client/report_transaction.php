<?php
require('/xampp/htdocs/accountly/server/db/db.php');
require('./src/views/head.php');
require('./src/views/loader.php');
require("/xampp/htdocs/accountly/server/session/session.php");
require('./src/views/header.php');
require('./src/views/right-sidebar.php');
require('./src/views/left-sidebar.php');
?>

<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <div class="title">
                            <h4>Filtrar transacciones</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="index.php">Principal</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Filtrar transacciones
                                </li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-md-6 col-sm-6 text-right">
                        <button type="button" class="btn btn-secondary" data-color="#ffffff">
                            <i class="fa fa-print"></i>
                        </button>
                    </div>
                </div>
            </div>
            <!-- multiple select row Datatable start -->
            <!-- <div class="card-box mb-30">
                <div class="pd-20">
                    <h4 class="text-blue h4">Transacciones</h4>
                </div>
                <div class="pb-20">
                    <table class="data-table table stripe hover nowrap">
                        <thead>
                            <tr>
                                <th class="sort asc">Divisa</th>
                                <th class="sort asc">Monto</th>
                                <th class="sort asc">Descripcion</th>
                                <th class="sort asc">Razon</th>
                                <th class="sort asc">Cuenta</th>
                                <th class="sort asc">Fecha</th>
                            </tr>
                        </thead>
                        <tbody id="">
                        </tbody>
                    </table>
                </div>
            </div> -->
            <div class="card-box mb-30  height-100-p">
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <div class="clearfix pt-20 px-4">
                            <div class="pull-left">
                                <h4 class="h4 text-blue">Filtros y tabla de transacciones</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="clearfix pt-20 px-4">
                            <div class="pull-right">
                                <input type="button" class="btn btn-primary" id="filter" value="Filtrar">
                            </div>
                        </div>
                    </div>
                </div>

                <form id="formulario">
                    <div class="row px-4">
                        <div class="col-md-2 col-filter col-sm-6">
                            <div class="form-group formulario__grupo-input" id="grupo__fecha1">
                                <label>Desde</label>
                                <input type="date" class="form-control formulario__input" name="fecha1" id="fecha1" />
                                <p class="formulario__input-error">El campo debe tener de 4 a 40 caracteres, solo se aceptan letras y numeros.</p>
                            </div>
                        </div>

                        <div class="col-md-2 col-filter col-sm-6">
                            <div class="form-group formulario__grupo-input" id="grupo__fecha2">
                                <label>Hasta</label>
                                <input type="date" class="form-control formulario__input" name="fecha2" id="fecha2" />
                                <p class="formulario__input-error">El campo debe tener de 4 a 40 caracteres, solo se aceptan letras y numeros.</p>
                            </div>
                        </div>
                        <div class="col-md-3 col-filter col-sm-4">
                            <div class="form-group formulario__grupo-input" id="grupo__cuenta">
                                <label>Cuenta</label>
                                <select class="form-control formulario__input" name="cuenta" id="cuenta">
                                </select>
                                <p class="formulario__input-error">El campo debe tener de 4 a 40 caracteres, solo se aceptan letras y numeros.</p>
                            </div>
                        </div>
                        <div class="col-md-2 col-filter col-sm-4">
                            <div class="form-group formulario__grupo-input" id="grupo__divisa">
                                <label>Divisa</label>
                                <select class="form-control formulario__input" name="divisa" id="divisa">
                                </select>
                                <p class="formulario__input-error">El campo debe tener de 4 a 40 caracteres, solo se aceptan letras y numeros.</p>
                            </div>
                        </div>
                        <div class="col-md-3 col-filter col-sm-4">
                            <div class="form-group formulario__grupo-input" id="grupo__razon">
                                <label>Razon</label>
                                <select class="form-control formulario__input" name="razon" id="razon">
                                </select>
                                <p class="formulario__input-error">El campo debe tener de 4 a 40 caracteres, solo se aceptan letras y numeros.</p>
                            </div>
                        </div>
                    </div>
                </form>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Divisa</th>
                            <th scope="col">Monto</th>
                            <th scope="col">Descripcion</th>
                            <th scope="col">Razon</th>
                            <th scope="col">Cuenta</th>
                            <th scope="col">Fecha</th>
                        </tr>
                    </thead>
                    <tbody id="content">
                    </tbody>
                </table>
            </div>

        </div>

        <div class="footer-wrap pd-20 mb-20 card-box">
            Accountly - Aplicacion creada por
            <a href="https://github.com/kaloxe" target="_blank">Carlos Sanchez</a>
        </div>
    </div>
</div>

<script>
    /* Llamando a la función getData() */
    getData()

    /* Peticion AJAX */
    function getData() {
        let content = document.getElementById("content")
        
        let url = "src/tables/loadFilterTransactions.php"
        let formaData = new FormData()
        fetch(url, {
                method: "POST",
                body: JSON.stringify(formaData)
            }).then(response => response.json())
            .then(data => {
                content.innerHTML = data.data
            }).catch(err => console.log(err))
    }

    // llamando contenido de los selects de los formularios de los modals
    getSelects()

    function getSelects() {
        let url = "src/php/selectsReport.php"
        let formaData = new FormData()
        fetch(url, {
                method: "POST",
                body: formaData
            }).then(response => response.json())
            .then(data => {
                cuenta.innerHTML = data.accounts
                divisa.innerHTML = data.badges
                razon.innerHTML = data.reasons
            }).catch(err => console.log(err))
    }
</script>

<script src="./src/js/validate-report-transaction.js"></script>
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