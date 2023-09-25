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
                    <div class="col-md-4 col-sm-6">
                        <div class="title">
                            <h4>Reporte de totales</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="index.php">Principal</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Reporte de totales
                                </li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-md-8 col-sm-6 text-left">
                        <div class="row">
                            <div class="col mr-2">
                                <select class="selectpicker form-control">
                                    <option>Seleccione cuenta</option>
                                    <option>Mustard</option>
                                    <option>Relish</option>
                                    <option>Plain</option>
                                    <option>Toasted</option>
                                </select>
                            </div>
                            <div class="col mr-2">
                                <select name="divisa" class="selectpicker form-control">
                                    <option>Seleccione divisa</option>
                                    <option>Mustard</option>
                                    <option>Relish</option>
                                    <option>Plain</option>
                                    <option>Toasted</option>
                                </select>
                            </div>
                            <a class="btn btn-primary mr-2" href="#" role="button" data-toggle="modal" data-target="#modal_create" type="button">
                                Filtrar
                            </a>
                            <button type="button" class="btn btn-secondary mr-3" data-color="#ffffff">
                                <i class="fa fa-print"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- <div class="card-box mb-30">
                <div class="clearfix pd-20">
                    <div class="pull-left">
                        <h4 class="h4">Totales de saldo en cuentas</h4>
                    </div>
                </div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Cuenta</th>
                            <th scope="col">Total</th>
                        </tr>
                    </thead>
                    <tbody id="content">
                    </tbody>
                </table>
            </div> -->

            <div class="row">
                <div class="col-md-6 mb-30">
                <!-- <div class="card-box mb-30  height-100-p"> -->
                    <div class="card-box mb-30">
                        <div class="clearfix pd-20">
                            <div class="pull-left">
                                <h4 class="h4 text-blue">Totales de saldo en cuentas</h4>
                            </div>
                        </div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Cuenta</th>
                                    <th scope="col">Saldo</th>
                                </tr>
                            </thead>
                            <tbody id="content">
                            </tbody>
                            <tbody>
                                <tr>
                                    <th>Total</th>
                                    <th>Bolivar 700<br/>Petro 450<br/>Dolar 50</th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-6 mb-30">
                <!-- <div class="pd-20 card-box height-100-p"> -->
                    <div class="pd-20 card-box">
                        <h4 class="h4 text-blue">Grafica</h4>
                        <div id="chart8"></div>
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
    getData()

    /* Peticion AJAX */
    function getData() {
        let content = document.getElementById("content")

        let url = "src/tables/loadReportTotal.php"
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

<!-- <script src="./src/js/validate-create-account.js"></script>
<script src="./src/js/validate-edit-account.js"></script> -->
<?php require('./src/views/scripts.php'); ?>
<!-- ApexChart -->
<script src="src/plugins/apexcharts/apexcharts.min.js"></script>
<script src="vendors/scripts/apexcharts-setting.js"></script>
<?php require('./src/views/footer.php'); ?>