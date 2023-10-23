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
                            <h4>Cuenta</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="index.php">Principal</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Cuenta
                                </li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-md-6 col-sm-6 text-right">
                        <a class="btn btn-primary" href="#" role="button" data-toggle="modal" data-target="#modal_create" type="button">
                            Registrar
                        </a>
                    </div>
                </div>
            </div>

            <!-- multiple select row Datatable start -->
            <div class="card-box mb-30">
                <div class="pd-20">
                    <h4 class="text-blue h4">Cuentas</h4>
                </div>
                <div class="pb-20">
                    <table class="data-table table hover nowrap">
                        <thead>
                            <tr>
                                <?php echo ($type_user == "administrador") ? "<th>Usuario</th>" : ""; ?>
                                <th>Cuenta</th>
                                <th>Saldo</th>
                                <th class="datatable-nosort">Action</th>
                            </tr>
                        </thead>
                        <tbody id="content">
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Create modal -->
            <?php require_once('./src/modals/account/create-modal.php') ?>

            <!-- Edit modal -->
            <?php require_once('./src/modals/account/update-modal.php') ?>

            <!-- Delete modal -->
            <?php require_once('./src/modals/account/delete-modal.php') ?>

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
            .getElementById("formulario__mensaje_validacion_delete")
            .classList.remove("formulario__mensaje-activo");
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
                        .getElementById("formulario__mensaje_validacion_delete")
                        .classList.add("formulario__mensaje-activo");
                }
            });
    });

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

<?php require_once('./src/views/scripts.php'); ?>
<script src="src/plugins/datatables/js/jquery.dataTables.min.js"></script>
<script src="src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
<script src="src/plugins/datatables/js/dataTables.responsive.min.js"></script>
<script src="src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>

<!-- buttons for Export datatable -->
<!-- <script src="src/plugins/datatables/js/dataTables.buttons.min.js"></script>
<script src="src/plugins/datatables/js/buttons.bootstrap4.min.js"></script>
<script src="src/plugins/datatables/js/buttons.print.min.js"></script>
<script src="src/plugins/datatables/js/buttons.html5.min.js"></script>
<script src="src/plugins/datatables/js/buttons.flash.min.js"></script>
<script src="src/plugins/datatables/js/pdfmake.min.js"></script>
<script src="src/plugins/datatables/js/vfs_fonts.js"></script> -->

<!-- Datatable Setting js -->
<script src="vendors/scripts/datatable-setting.js"></script>
<?php require_once('./src/views/footer.php'); ?>