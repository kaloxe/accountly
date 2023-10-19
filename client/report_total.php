<?php require('./src/views/head.php'); ?>
<?php require("/xampp/htdocs/accountly/server/session/session.php"); ?>
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
                        <form id="formulario">
                            <div class="row">
                                <!-- <div class="col mr-2 form-group formulario__grupo-input" id="grupo__cuenta"> -->
                                <div class="col mr-2 formulario__grupo-input" id="grupo__cuenta">
                                    <select class="form-control formulario__input" name="cuenta" id="cuenta">
                                    </select>
                                    <p class="formulario__input-error">El campo debe tener de 4 a 40 caracteres, solo se aceptan letras y numeros.</p>
                                </div>
                                <!-- <div class="col mr-2 form-group formulario__grupo-input" id="grupo__divisa"> -->
                                <div class="col mr-2 formulario__grupo-input" id="grupo__divisa">
                                    <select class="form-control formulario__input" name="divisa" id="divisa">
                                    </select>
                                    <p class="formulario__input-error">El campo debe tener de 4 a 40 caracteres, solo se aceptan letras y numeros.</p>
                                </div>
                                <input type="button" class="btn btn-primary mr-2" id="filter" value="Filtrar">
                                <button type="button" class="btn btn-secondary mr-3" data-color="#ffffff" id="print">
                                    <i class="fa fa-print"></i>
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-30">
                    <!-- <div class="card-box mb-30  height-100-p"> -->
                    <div class="card-box mb-30">
                        <div class="clearfix pd-20">
                            <div class="pull-left">
                                <h4 class="h4 text-blue">Totales de saldo en cuentas</h4>
                            </div>
                        </div>
                        <table class="table table-striped">
                            <thead>
                                <tr id="cabeza">
                                    <?php echo ($type_user == "administrador") ? "<th>Usuario</th>" : ""; ?>
                                    <th>Cuenta</th>
                                    <th>Saldo</th>
                                </tr>
                            </thead>
                            <tbody id="content">
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-6 mb-30">
                    <!-- <div class="pd-20 card-box height-100-p"> -->
                    <div class="pd-20 card-box">
                        <h4 class="h4 text-blue">Grafica</h4>
                        <div id="chartTotal"></div>
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

    const print = document.getElementById("print");
    print.addEventListener("click", (e) => {
        e.preventDefault();
        let cabeza = document.getElementById("cabeza").innerHTML;
        let cuerpo = document.getElementById("content").innerHTML;
        let data = {
            action: "total_pdf",
            report: {
                title: "Reporte de totales",
                thead: cabeza,
                tbody: cuerpo
            }
        };
        console.log(data)
        //location.href = "consulta.php";
        //$.post('/accountly/client/TCPDF/reports/example_001.php', {titulo:data.title})
        //window.location = `/accountly/client/TCPDF/reports/example_001.php?titulo=${data.title}`;
        fetch("/accountly/server/controllers/controllerReportTotal.php", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json; charset=utf-8",
                },
                body: JSON.stringify(data),
            })
            .then((res) => res.json())
            .then((dat) => {
                console.log(dat);
                window.open("/accountly/client/TCPDF/reports/report.php", "_blank");
            });
    });

    // getData()
    // /* Peticion AJAX */
    // function getData() {
    //     let content = document.getElementById("content")

    //     let url = "src/tables/loadReportTotal.php"
    //     let formaData = new FormData()
    //     fetch(url, {
    //             method: "POST",
    //             body: formaData
    //         }).then(response => response.json())
    //         .then(dat => {
    //             console.log(dat);
    //             content.innerHTML = dat.data;
    //         }).catch(err => console.log(err))
    // }

    getSelects()

    function getSelects() {
        let url = "src/php/selectsReport.php"
        let formaData = new FormData()
        fetch(url, {
                method: "POST",
                body: formaData
            }).then(response => response.json())
            .then(dat => {
                cuenta.innerHTML = dat.accounts
                divisa.innerHTML = dat.badges
            }).catch(err => console.log(err))
    }
</script>
<script src="./src/js/validate-report-total.js"></script>
<?php require('./src/views/scripts.php'); ?>
<!-- ApexChart -->
<script src="src/plugins/apexcharts/apexcharts.min.js"></script>
<script src="./src/js/report-total-chart.js"></script>
<?php require('./src/views/footer.php'); ?>