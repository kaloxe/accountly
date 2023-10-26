<?php
require_once('./src/views/head.php');
require_once("../server/session/session.php");
require_once('./src/views/loader.php');
require_once('./src/views/header.php');
require_once('./src/views/right-sidebar.php');
require_once('./src/views/left-sidebar.php');
?>

<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">

            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>Agenda</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="index.php">Principal</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Agenda
                                </li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-md-6 col-sm-12 text-right">
                        <ul class="nav nav-pills justify-content-end" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active text-blue" data-toggle="tab" href="#event_tap" role="tab" aria-selected="true">Eventos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-blue" data-toggle="tab" href="#calendar_tab" role="tab" aria-selected="false">Calendario</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="pb-20 card-box mb-30">
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="event_tap" role="tabpanel">
                        <div class="pd-20">
                            <h4 class="text-blue h4">Eventos</h4>
                        </div>
                        <table class="data-table table hover nowrap">
                            <thead>
                                <tr>
                                    <?php echo ($type_user == "administrador") ? "<th>Usuario</th>" : ""; ?>
                                    <th>Fecha</th>
                                    <th>Descripcion</th>
                                    <th>Divisa</th>
                                    <th>Cantidad</th>
                                    <th>Estado</th>
                                    <th class="datatable-nosort">Acción</th>
                                </tr>
                            </thead>
                            <tbody id="content">
                            </tbody>

                        </table>
                    </div>
                    <div class="tab-pane fade" id="calendar_tab" role="tabpanel">
                        <div class="pd-20">
                            <div class="calendar-wrap">
                                <div id="calendar"></div>
                            </div>
                        </div>
                    </div>
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
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                    Cerrar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Create modal -->
                <?php require_once('./src/modals/diary/create-modal.php') ?>

                <!-- Edit modal -->
                <?php require_once('./src/modals/diary/update-modal.php') ?>

                <!-- Complete modal -->
                <?php require_once('./src/modals/diary/complete-modal.php') ?>

                <!-- Delete modal -->
                <?php require_once('./src/modals/diary/delete-modal.php') ?>

            </div>
        </div>
        <div class="footer-wrap pd-20 mb-20 card-box">
            Accountly - Aplicacion creada por
            <a href="https://github.com/kaloxe" target="_blank">Carlos Sanchez</a>
        </div>
    </div>
</div>

<script>
    let index_delete;

    function openDeleteModal(id) {
        index_delete = id;
        document
            .getElementById("formulario__mensaje-exito")
            .classList.remove("formulario__mensaje-exito-activo");
        document
            .getElementById("formulario__mensaje_validacion")
            .classList.remove("formulario__mensaje-activo");
    }
    const eliminar = document.getElementById("eliminar");
    eliminar.addEventListener("click", (e) => {
        e.preventDefault();
        let data = {
            action: "delete_diary",
            id: index_delete,
        };
        fetch("/accountly/server/controllers/controllerDiary.php", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json; charset=utf-8",
                },
                body: JSON.stringify(data),
            })
            .then((res) => res.json())
            .then((dat) => {
                console.log(dat);
                if (dat.state) {
                    getData();
                    document
                        .getElementById("formulario__mensaje-exito")
                        .classList.add("formulario__mensaje-exito-activo");
                } else {
                    document
                        .getElementById("formulario__mensaje_validacion")
                        .classList.add("formulario__mensaje-activo");
                }
            });
    });

    /* Llamando a la función getData() */
    getData()

    /* Peticion AJAX */
    function getData() {
        let content = document.getElementById("content")
        let url = "src/tables/loadDiary.php"
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

        let url = "src/php/selects.php"
        let formaData = new FormData()
        fetch(url, {
                method: "POST",
                body: formaData
            }).then(response => response.json())
            .then(data => {
                divisa_create.innerHTML = data.badges
                divisa_update.innerHTML = data.badges
                cuenta_complete.innerHTML = data.accounts
            }).catch(err => console.log(err))
    }
</script>
<script src="./src/js/validate-complete-diary.js"></script>
<script src="./src/js/validate-create-diary.js"></script>
<script src="./src/js/validate-edit-diary.js"></script>
<?php require_once('./src/views/scripts.php'); ?>
<script src="src/plugins/apexcharts/apexcharts.min.js"></script>
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
<script src="src/plugins/fullcalendar/fullcalendar.min.js"></script>
<script src="vendors/scripts/calendar-setting.js"></script>
<?php require_once('./src/views/footer.php'); ?>