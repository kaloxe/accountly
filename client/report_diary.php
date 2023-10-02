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
                            <h4>Reporte de eventos</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="index.php">Principal</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Reporte de eventos
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

            <div class="pd-20 card-box mb-30">
                <div class="tab-content">
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="clearfix pt-20 px-4">
                                <div class="pull-left">
                                    <h4 class="h4 text-blue">Filtros y tabla de eventos</h4>
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
                                    <p class="formulario__input-error">El campo no debe estar vacio.</p>
                                </div>
                            </div>

                            <div class="col-md-2 col-filter col-sm-6">
                                <div class="form-group formulario__grupo-input" id="grupo__fecha2">
                                    <label>Hasta</label>
                                    <input type="date" class="form-control formulario__input" name="fecha2" id="fecha2" />
                                    <p class="formulario__input-error">La fecha no puede ser menor que la anterior.</p>
                                </div>
                            </div>
                            <div class="col-md-3 col-filter col-sm-4">
                                <div class="form-group formulario__grupo-input" id="grupo__estado">
                                    <label>Estado</label>
                                    <select class="form-control formulario__input" name="estado" id="estado">
                                        <option value="all">Todos</option>
                                        <option value="1">Pendiente</option>
                                        <option value="0">Pasado</option>
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
                        </div>
                    </form>
                    <table class="data-table table nowrap">
                        <thead>
                            <tr>
                                <?php echo ($type_user == "administrador") ? "<th>Usuario</th>" : ""; ?>
                                <th class="table-plus">Fecha</th>
                                <th>Descripcion</th>
                                <th>Divisa</th>
                                <th>Cantidad</th>
                                <th>Estado</th>
                            </tr>
                        </thead>
                        <tbody id="content">
                        </tbody>
                    </table>
                </div>

                <!-- calendar modal -->
                <div id="modal-view-event" class="modal modal-top fade calendar-modal">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-body">
                                <h4 class="h4">
                                    <span class="event-icon weight-400 mr-3"></span><span class="event-title"></span>
                                </h4>
                                <div class="event-body"></div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-dismiss="modal">
                                    Close
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

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

        let url = "src/tables/loadReportDiary.php"
        let formaData = new FormData()
        fetch(url, {
                method: "POST",
                body: formaData
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
                //cuenta.innerHTML = data.accounts
                //estado.innerHTML = data.states
                divisa.innerHTML = data.badges
            }).catch(err => console.log(err))
    }
</script>

<script src="./src/js/validate-report-diary.js"></script>
<?php require('./src/views/scripts.php'); ?>
<script src="src/plugins/apexcharts/apexcharts.min.js"></script>
<script src="src/plugins/datatables/js/jquery.dataTables.min.js"></script>
<script src="src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
<script src="src/plugins/datatables/js/dataTables.responsive.min.js"></script>
<script src="src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
<script src="vendors/scripts/dashboard3.js"></script>
<script src="src/plugins/fullcalendar/fullcalendar.min.js"></script>
<script src="vendors/scripts/calendar-setting.js"></script>
<?php require('./src/views/footer.php'); ?>