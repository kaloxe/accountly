<?php
require('/xampp/htdocs/accountly/server/db/db.php');
require('./src/views/head.php');
require('./src/views/loader.php');
require('./src/views/header.php');
require('./src/views/right-sidebar.php');
require('./src/views/left-sidebar.php');
?>

<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-8 col-sm-6">
                        <div class="title">
                            <h4>Reporte de movimientos</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="index.php">Principal</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Reporte de movimientos
                                </li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-md-4 col-sm-6 text-left">
                        <form id="formulario">
                            <div class="row">
                                <!-- <div class="col mr-2 form-group formulario__grupo-input" id="grupo__tiempo"> -->
                                <div class="col mr-2 formulario__grupo-input" id="grupo__tiempo">
                                    <select class="form-control formulario__input" name="tiempo" id="tiempo">
                                        <option value="week">Ultima semana</option>
                                        <option value="month">Ultimo mes</option>
                                        <option value="semester">ultimo semestre</option>
                                        <option value="year">ultimo año</option>
                                    </select>
                                    <p class="formulario__input-error">El campo debe tener de 4 a 40 caracteres, solo se aceptan letras y numeros.</p>
                                </div>
                                <input type="button" class="btn btn-primary mr-2" id="filter" value="Filtrar">
                                <button type="button" class="btn btn-secondary mr-3" data-color="#ffffff">
                                    <i class="fa fa-print"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- multiple select row Datatable start -->
            <div class="card-box mb-30">
                <div class="pd-20">
                    <h4 class="text-blue h4">Ultimas transacciones</h4>
                </div>
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

            <div class="bg-white pd-20 card-box mb-30">
                <div class="h4 text-blue">Grafica</div>
                <div id="chart2"></div>
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

        let url = "src/tables/loadReportMovements.php"
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

<script src="./src/js/validate-report-movement.js"></script>
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
<!-- ApexChart -->
<script src="src/plugins/apexcharts/apexcharts.min.js"></script>
<script src="vendors/scripts/apexcharts-setting.js"></script>

<?php require('./src/views/footer.php'); ?>