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
                    <div class="col-md-6 col-sm-6">
                        <div class="title">
                            <h4>Metas</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="index.html">Principal</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Metas
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
            <div class="row clearfix" id="goals">
            </div>

            <!-- Create modal -->
            <?php require('./src/modals/goal/create-modal.php') ?>

            <!-- Edit modal -->
            <?php require('./src/modals/goal/update-modal.php') ?>

            <!-- Delete modal -->
            <?php require('./src/modals/goal/delete-modal.php') ?>

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
            .then((res) => res.text())
            .then((dat) => console.log(dat));
    });

    /* Llamando a la función getData() para obtener contenido de la tabla */
    getData()

    /* Peticion AJAX */
    function getData() {
        let goals = document.getElementById("goals")
        console.log(goals)

        let url = "src/tables/loadGoal.php"
        let formaData = new FormData()
        fetch(url, {
                method: "POST",
                body: formaData
            }).then(response => response.json())
            .then(data => {
                console.log(data)
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
            }).catch(err => console.log(err))
    }
</script>
<script src="./src/js/validate-create-goal.js"></script>
<script src="./src/js/validate-edit-goal.js"></script>

<?php require('./src/views/scripts.php'); ?>
<?php require('./src/views/footer.php'); ?>