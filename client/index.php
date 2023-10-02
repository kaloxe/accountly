<?php require('./src/views/head.php'); ?>
<?php require('./src/views/loader.php'); ?>
<?php require("/xampp/htdocs/accountly/server/session/session.php"); ?>
<?php require("/xampp/htdocs/accountly/server/session/authenticatorAdmin.php"); ?>
<?php require('./src/views/header.php'); ?>
<?php require('./src/views/right-sidebar.php'); ?>
<?php require('./src/views/left-sidebar.php'); ?>
<?php
include('/xampp/htdocs/accountly/server/simplehtmldom/simple_html_dom.php');
// Carga la página web que deseas analizar
$html = file_get_html('https://www.bancaynegocios.com');
//echo file_get_html('https://www.bcv.org.ve');

// Encuentra el título de la página web
$valorDolar = $html->find('.iedv tbody tr td', 2)->plaintext;
?>

<div class="main-container">
    <div class="xs-pd-20-10 pd-ltr-20">
        <div class="title pb-20">
            <h2 class="h3 mb-0">Panel principal</h2>
        </div>

        <div class="row pb-10">
            <div class="col-md-8 mb-20">
                <div class="card-box height-150-p pd-20">
                    <div class="d-flex flex-wrap justify-content-between align-items-center pb-0 pb-md-2">
                        <div class="h5 mb-md-0">Movimientos recientes</div>
                    </div>
                    <div class="d-flex justify-content-center align-items-center" id="movimientos-recientes"></div>
                </div>
            </div>

            <div class="col-md-4 mb-20">
                <div class="card-box min-height-150px pd-20 mb-20" data-bgcolor="#455a64" id="next-event">
                    
                </div>
                <div class="card-box min-height-150px pd-20" data-bgcolor="#265ed7">
                    <div class="d-flex justify-content-between pb-20 text-white">
                        <div class="icon h1 text-white">
                            <i class="fa fa-money" aria-hidden="true"></i>
                        </div>
                        <div class="font-14 text-right">
                            <div>Dolar hoy</div>
                            <div class="font-12"><?php echo date('d/m/y'); ?></div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between align-items-end">
                        <div class="text-white">
                            <div class="font-14">Precio del dolar segun BCV</div>
                            <div class="font-24 weight-500"><?php echo $valorDolar; ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- <div class="card-box pb-10 mb-20">
            <div class="h5 pd-20 mb-0">Ultimas transacciones</div>
            <table class="data-table table nowrap">
                <thead>
                    <tr>
                        <th class="table-plus">Divisa</th>
                        <th>Monto</th>
                        <th>Cuenta</th>
                        <th>Razon</th>
                        <th>Fecha</th>
                    </tr>
                </thead>
                <tbody id="content">
                    <tr>
                        <td class="table-plus">
                            Bolibar
                        </td>
                        <td>Monto</td>
                        <td>Cuenta</td>
                        <td>Razon</td>
                        <td>Descripcion</td>
                        <td>Fecha</td>
                    </tr>
                </tbody>
            </table>
        </div> -->

        <!-- Striped table start -->
        <div class="card-box mb-30">
            <div class="clearfix pd-20">
                <div class="pull-left">
                    <h4 class="h4">Ultimas transacciones</h4>
                </div>
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Divisa</th>
                        <th scope="col">Monto</th>
                        <th scope="col">Cuenta</th>
                        <th scope="col">Razon</th>
                        <th scope="col">Fecha</th>
                    </tr>
                </thead>
                <tbody id="content">
                </tbody>
            </table>
        </div>
        <!-- Striped table End -->

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
        let url = "src/tables/loadLastTransactions.php"
        let formaData = new FormData()
        fetch(url, {
                method: "POST",
                body: formaData
            }).then(response => response.json())
            .then(data => {
                content.innerHTML = data.data
            }).catch(err => console.log(err))

        let event = document.getElementById("next-event")
        let urlEvent = "src/tables/loadIndex.php"
        let formaDataEvent = new FormData()
        fetch(urlEvent, {
                method: "POST",
                body: formaDataEvent
            }).then(response => response.json())
            .then(data => {
                event.innerHTML = data.data
            }).catch(err => console.log(err))
    }
</script>
<?php require('./src/views/scripts.php'); ?>
<script src="src/plugins/apexcharts/apexcharts.min.js"></script>
<script src="src/plugins/datatables/js/jquery.dataTables.min.js"></script>
<script src="src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
<script src="src/plugins/datatables/js/dataTables.responsive.min.js"></script>
<script src="src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
<!-- <script src="vendors/scripts/dashboard3.js"></script> -->
<script src="./src/js/index-chart.js"></script>
<?php require('./src/views/footer.php'); ?>