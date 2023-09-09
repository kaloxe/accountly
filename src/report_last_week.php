<?php
require('./views/header.php');
require_once("/xampp/htdocs/accountly/server/db/db.php");
?>

<div class="container-xxl position-relative bg-white d-flex p-0">
    <!-- Spinner Start -->
    <?php require('./views/spinner.php'); ?>
    <!-- Spinner End -->

    <!-- Sidebar Start -->
    <?php require('./views/menu.php');

    $fecha1 = "";
    $fecha2 = "";
    $fecha_final = date("Y-m-d");
    $fecha_inicial = date("Y-m-d", strtotime($fecha_final . "- 7 days"));
    if ((isset($fecha_final)) && (isset($fecha_inicial))) {
        if ($fecha_final != null && $fecha_inicial != null) {
            $fecha1 = date_create($fecha_inicial);
            $fecha2 = date_create($fecha_final);
            $sql = "SELECT t.amount, t.id_management ,t.id_transaction, f.id_font , f.name_font, t.reference, t.date FROM transaction t INNER JOIN font f on f.id_font=t.id_font WHERE (date BETWEEN '$fecha_inicial' and '$fecha_final') AND id_user=$id_user AND t.id_management=2";
            $sql1 = "SELECT count(id_transaction) FROM transaction t INNER JOIN font f on f.id_font=t.id_font WHERE (date BETWEEN '$fecha_inicial' and '$fecha_final') AND id_user=$id_user AND id_management=2";
        }
    }
    ?>
    <!-- Sidebar End -->

    <!-- Content Start -->
    <div class="content">

        <!-- Navbar Start -->
        <?php require('./views/nav-bar.php'); ?>
        <!-- Navbar End -->

        <div class="container-fluid py-4 px-4">
            <div class="d-flex align-items-center justify-content-center row g-4">

                <div class="col-sm-12 col-xl-7">
                    <div class="d-flex align-items-center justify-content-center pt-3">
                        <div class="g-4 col-12">
                            <div class="bg-light rounded h-100 p-4">
                                <div class="d-flex align-items-center justify-content-between">
                                    <h6 class="mb-4">Gastos de la ultima semana</h6>
                                    <a href="/accountly/ReportesBaseDatos/reporte_last_week.php"><button type="button" name="pdf" class="btn btn-primary py-1 w-30">PDF</button></a>
                                </div>

                                <div class="table-responsive">
                                    <table class="table text-center align-middle">
                                        <thead>
                                            <?php

                                            $query = $connection->prepare($sql1);
                                            $query->execute();
                                            $res = $connection->query($sql1);
                                            $result = $res->fetchColumn(); ?>
                                            <label for="">Total: <?php if ($result != null) {
                                                                        echo " " . $result;
                                                                    } else {
                                                                        echo " " . "0";
                                                                    } ?></label>
                                            <?php if ($result == 0 || $result == null) { ?>
                                                <br><labeL for="">No existen registros acutalmente</label>
                                            <?php  } ?>

                                            <?php if ($fecha1 != null && $fecha2 != null) { ?>
                                                <br><br><label for=""><?php echo "Registros desde: " . $fecha1->format('d-m-Y') . ", Hasta: " . $fecha2->format('d-m-Y'); ?></label> <?php } ?>

                                            <tr>
                                                <!-- <th>#</th> -->
                                                <th>Monto</th>
                                                <th>Fuente</th>
                                                <th>Referencia</th>
                                                <th>Fecha</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table-group-divider">

                                            <?php
                                            $query = $connection->prepare($sql);
                                            $query->execute();
                                            while ($cita = $query->fetch(PDO::FETCH_ASSOC)) {
                                                $fecha_base = $cita["date"];
                                                $fecha = date("d-m-Y", strtotime($fecha_base)); ?>
                                                <tr cedula_paciente="paciente_<?php echo $cita["id_transaction"]; ?>">
                                                <td class="count<?php echo $cita['id_management']; ?>"><?php echo $cita["amount"]; ?> </td>
                                                    <td><?php echo $cita["name_font"]; ?> </td>
                                                    <td><?php echo $cita["reference"]; ?> </td>
                                                    <td><?php echo $fecha; ?> </td>
                                                </tr>
                                            <?php }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
    <!-- Content End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
</div>

<!-- <script src="/accountly/src/assets/js/validate-report.js"></script> -->
<!-- <script src="./js/validate-report2.js"></script> -->

<?php
require('./views/footer.php');
?>