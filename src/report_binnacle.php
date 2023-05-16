<?php
require('./views/header.php');
require_once("/xampp/htdocs/accountly/server/db/db.php");
?>

<div class="container-xxl position-relative bg-white d-flex p-0">
    <!-- Spinner Start -->
    <?php // require('./views/spinner.php'); ?>
    <!-- Spinner End -->

    <!-- Sidebar Start -->
    <?php require('./views/menu.php');

    $sql = "SELECT * FROM binnacle WHERE id_user=$id_user";
    $sql1 = "SELECT COUNT(id_binnacle) FROM binnacle WHERE id_user=$id_user";
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
                                <h6 class="mb-4">Bitacora</h6>

                                <div class="table-responsive">
                                    <table class="table text-center align-middle">
                                        <thead>
                                            <?php
                                            $query = $connection->prepare($sql1);
                                            $query->execute();
                                            $res = $connection->query($sql1);
                                            $result = $res->fetchColumn();
                                            ?>
                                            <label for="">Total: <?php if ($result != null) {
                                                                        echo " " . $result;
                                                                    } else {
                                                                        echo " " . "0";
                                                                    } ?></label>
                                            <?php if ($result == 0 || $result == null) { ?>
                                                <br><labeL for="">No existen registros acutalmente</label>
                                            <?php  } ?>
                                            <tr>
                                                <th>Movimiento</th>
                                                <th>Fecha</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table-group-divider">
                                            <?php
                                            $query = $connection->prepare($sql);
                                            $query->execute();
                                            while ($cita = $query->fetch(PDO::FETCH_ASSOC)) {
                                                // $fecha_base = $cita["datetime"];
                                                // $fecha = date("d-m-Y H:i:s", strtotime($fecha_base)); ?>
                                                <tr>
                                                    <td><?php echo $cita["movement"]; ?> </td>
                                                    <td><?php echo $cita["datetime"]; ?> </td>
                                                </tr>
                                            <?php } ?>
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