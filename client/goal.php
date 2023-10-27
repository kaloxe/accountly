<?php require_once('./src/views/head.php'); ?>
<?php require_once('./src/views/loader.php'); ?>
<?php require_once("../server/session/session.php"); ?>
<?php require_once('./src/views/header.php'); ?>
<?php require_once('./src/views/right-sidebar.php'); ?>
<?php require_once('./src/views/left-sidebar.php'); ?>

<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-lg-6">
                        <div class="title">
                            <h4>Metas</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="index.php">Principal</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Metas
                                </li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-6 text-right">
                        <a class="btn btn-primary" href="#" role="button" data-toggle="modal" data-target="#modal_create" type="button">
                            Registrar
                        </a>
                    </div>
                </div>
            </div>
            <div class="row clearfix" id="goals">
            </div>

            <!-- Create modal -->
            <?php require_once('./src/modals/goal/create-modal.php') ?>

            <!-- Edit modal -->
            <?php require_once('./src/modals/goal/update-modal.php') ?>

            <!-- Delete modal -->
            <?php require_once('./src/modals/goal/delete-modal.php') ?>

            <!-- Complete modal-->
            <?php require_once('./src/modals/goal/complete-modal.php') ?>


        </div>
        <?php require_once('./src/views/footer-wrap.php') ?>
    </div>
</div>

<script>
    let index_delete;

    function openDeleteModal(id) {
        index_delete = id;
        document
            .getElementById("formulario__mensaje_validacion")
            .classList.remove("formulario__mensaje-activo");
        document
            .getElementById("formulario__mensaje-exito")
            .classList.remove("formulario__mensaje-exito-activo");
    }

    const eliminar = document.getElementById("eliminar");
    eliminar.addEventListener("click", (e) => {
        e.preventDefault();
        let data = {
            action: "delete_goal",
            id: index_delete,
        };
        fetch("/accountly/server/controllers/controllerGoal.php", {
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

    /* Llamando a la función getData() para obtener contenido de la tabla */
    getData()

    /* Peticion AJAX */
    function getData() {
        let goals = document.getElementById("goals")

        let url = "src/tables/loadGoal.php"
        let formaData = new FormData()
        fetch(url, {
                method: "POST",
                body: formaData
            }).then(response => response.json())
            .then(data => {
                goals.innerHTML = data.data
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
<script src="./src/js/validate-complete-goal.js"></script>
<script src="./src/js/validate-create-goal.js"></script>
<script src="./src/js/validate-edit-goal.js"></script>

<?php require_once('./src/views/scripts.php'); ?>
<?php require_once('./src/views/footer.php'); ?>