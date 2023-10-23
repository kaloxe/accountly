<?php require_once('./src/views/head.php'); ?>
<?php require_once("../server/session/session.php"); ?>
<?php require_once('./src/views/loader.php'); ?>
<?php require_once('./src/views/header.php'); ?>
<?php require_once('./src/views/right-sidebar.php'); ?>
<?php require_once('./src/views/left-sidebar.php'); ?>

<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <div class="title">
                            <h4>Divisas</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="index.php">Principal</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Divisas
                                </li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-md-6 col-sm-6 text-right">
                        <!-- <a class="btn btn-success" href="#" role="button" data-toggle="modal" data-target="#modal-convert" type="button">
                            Convertir
                        </a> -->
                        <?php echo ($type_user == "administrador") ? '
                        <a class="btn btn-primary" href="#" role="button" data-toggle="modal" data-target="#modal_create" type="button">
                            Registrar
                        </a>' : ""; ?>
                    </div>
                </div>
            </div>

            <!-- multiple select row Datatable start -->
            <div class="row-badge">
                <div class="card-box mb-30 col-6">
                    <div class="pd-20">
                        <h4 class="text-blue h4">Divisas</h4>
                    </div>
                    <div class="pb-20">
                        <table class="table hover nowrap">
                            <thead>
                                <tr>
                                    <th>Divisa</th>
                                    <th>Valor</th>
                                    <?php echo ($type_user == "administrador") ? '<th class="datatable-nosort">Accion</th>' : ""; ?>
                                </tr>
                            </thead>
                            <tbody id="content">
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-6 pl-4">
                    <div class="card-box mb-30">
                        <div class="pd-20">
                            <h4 class="text-blue h4">Conversor de divisas</h4>
                        </div>
                        <div class="pb-20">

                            <form class="mx-4" id="formulario_convert">
                                <div class="row">
                                    <div class="form-group formulario__grupo-input col-5 px-3" id="grupo__divisa_1">
                                        <label>Divisa</label>
                                        <select class="form-control formulario__input" name="divisa_1" id="divisa_1">
                                            <!-- select generado con php por fetch en js -->
                                        </select>
                                        <p class="formulario__input-error">Seleccione una divisa.</p>
                                    </div>
                                    <div class="form-group formulario__grupo-input col-7 pr-3" id="grupo__monto_1">
                                        <label><br></label>
                                        <input type="text" class="form-control formulario__input" name="monto_1" id="monto_1" />
                                        <p class="formulario__input-error">Solo valores numericos.</p>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-center my-1">
                                    <img src="./vendors/images/convert.png" width="50" height="50">
                                </div>
                                <div class="row">
                                    <div class="form-group formulario__grupo-input col-5 px-3" id="grupo__divisa_2">
                                        <label>Divisa</label>
                                        <select class="form-control formulario__input" name="divisa_2" id="divisa_2">
                                            <!-- select generado con php por fetch en js -->
                                        </select>
                                        <p class="formulario__input-error">Seleccione una divisa.</p>
                                    </div>
                                    <div class="form-group formulario__grupo-input col-7 pr-3" id="grupo__monto_2">
                                        <label><br></label>
                                        <input type="text" class="form-control formulario__input" name="monto_2" id="monto_2" readonly />
                                        <p class="formulario__input-error">Solo valores numericos.</p>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-center">
                                    <input type="button" class="btn btn-primary" id="convert" value="Convertir">
                                </div>

                            </form>

                        </div>
                    </div>
                </div>

            </div>

            <!-- Create modal -->
            <?php require_once('./src/modals/badge/create-modal.php') ?>

            <!-- Edit modal -->
            <?php require_once('./src/modals/badge/update-modal.php') ?>

            <!-- Delete modal -->
            <?php require_once('./src/modals/badge/delete-modal.php') ?>

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
            action: "delete_badge",
            id: index_delete,
        };
        fetch("/accountly/server/controllers/controllerBadge.php", {
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
                    setTimeout(() => {

                    }, 5000);
                } else {
                    document
                        .getElementById("formulario__mensaje_validacion")
                        .classList.add("formulario__mensaje-activo");
                    setTimeout(() => {

                    }, 5000);
                }
            });
    });

    /* Llamando a la función getData() */
    getData()

    /* Peticion AJAX */
    function getData() {
        let content = document.getElementById("content")

        let url = "src/tables/loadBadge.php"
        let formaData = new FormData()
        fetch(url, {
                method: "POST",
                body: formaData
            }).then(response => response.json())
            .then(data => {
                content.innerHTML = data.data
            }).catch(err => console.log(err))
    }

    getSelects()

    function getSelects() {
        let url = "src/php/selects.php"
        let formaData = new FormData()
        fetch(url, {
                method: "POST",
                body: formaData
            }).then(response => response.json())
            .then(data => {
                divisa_1.innerHTML = data.badges
                divisa_2.innerHTML = data.badges
            }).catch(err => console.log(err))
    }
</script>
<script src="./src/js/validate-create-badge.js"></script>
<script src="./src/js/validate-edit-badge.js"></script>
<script src="./src/js/convert-badge.js"></script>
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
<!-- Datatable Setting js -->
<?php require_once('./src/views/footer.php'); ?>