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

    $cuenta = (isset($_POST['cuenta']) ? $_POST['cuenta'] : null);
    $_SESSION["cuenta"] = $cuenta;
    switch ($cuenta) {
        case "0":
            $sql = "SELECT * FROM `font` WHERE id_user=$id_user UNION SELECT * FROM `debt` WHERE id_user=$id_user";
            $sql1 = "SELECT COUNT(t.cantidad) FROM (SELECT id_font as cantidad FROM `font` WHERE id_user=$id_user UNION SELECT id_debt as cantidad FROM `debt` WHERE id_user=$id_user) t";
            $sql2 = "SELECT SUM(t.cantidad) FROM (SELECT SUM(amount) as cantidad FROM `font` WHERE id_user=2 UNION SELECT -SUM(amount) as cantidad FROM `debt` WHERE id_user=$id_user) t";
            break;
        case "1":
            $sql = "SELECT * FROM `font` WHERE id_user=$id_user";
            $sql1 = "SELECT count(id_font) FROM font WHERE  id_user=$id_user";
            $sql2 = "SELECT SUM(amount) FROM `font` WHERE id_user=$id_user";
            break;
        case "2":
            $sql = "SELECT description as name_font, amount FROM `debt` WHERE id_user=$id_user";
            $sql1 = "SELECT count(id_debt) FROM debt WHERE  id_user=$id_user";
            $sql2 = "SELECT SUM(amount) FROM `debt` WHERE id_user=$id_user";
            break;
        default:
            $sql = "SELECT * FROM `font` WHERE id_user=$id_user UNION SELECT * FROM `debt` WHERE id_user=$id_user";
            $sql1 = "SELECT count(t.cantidad) FROM (SELECT id_font as cantidad FROM `font` WHERE id_user=$id_user UNION SELECT id_debt as cantidad FROM `debt` WHERE id_user=$id_user) t";
            $sql2 = "SELECT SUM(t.cantidad) FROM (SELECT SUM(amount) as cantidad FROM `font` WHERE id_user=2 UNION SELECT -SUM(amount) as cantidad FROM `debt` WHERE id_user=$id_user) t";
            break;
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
                    <div class="formulario__mensaje p-1 text-center mb-2 pb-5" id="formulario__mensaje">
                        <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Rellene el formulario correctamente. </p>
                    </div>
                    <div class="bg-light rounded h-100 p-4">
                        <h6 class="mb-4">Generar reporte de totales</h6>

                        <form class="px-3" id="formulario" action="./report_total.php" method="post">
                            <div class="mb-2" id="grupo__cuenta">
                                <div class="formulario__grupo-input">
                                    <label for="cuenta">Cuenta</label>
                                    <select class="form-select formulario__input" name="cuenta" id="cuenta" aria-label="Default select example">
                                        <option value="" selected>Seleccione para totalizar</option>
                                        <option value="0">Saldo</option>
                                        <option value="1">Deposito</option>
                                        <option value="2">Deudas</option>
                                    </select>
                                    <p class="formulario__input-error">Seleccione una opcion de las cuentas filtrar.</p>
                                </div>
                            </div>

                            <div class="d-flex align-items-center justify-content-center formulario__grupo formulario__grupo-btn-enviar">
                                <input type="submit" class="btn btn-primary mt-2 py-2 w-50" id="submit" value="Registrar">
                            </div>
                            <p class="formulario__mensaje-exito mt-4" id="formulario__mensaje-exito">Formulario enviado exitosamente!</p>
                        </form>

                    </div>

                    <div class="d-flex align-items-center justify-content-center pt-3">
                        <div class="g-4 col-12">
                            <div class="bg-light rounded h-100 p-4">
                                <div class="d-flex align-items-center justify-content-between">
                                    <h6 class="mb-4">Totales</h6>
                                    <?php if (isset($_POST['cuenta'])) { ?>
                                        <a href="/accountly/ReportesBaseDatos/reporte_total.php"><button type="button" name="pdf" class="btn btn-primary py-1 w-30">PDF</button></a>
                                    <?php } ?>
                                </div>

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
                                                <th>Descripcion</th>
                                                <th>Monto</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table-group-divider">
                                            <?php
                                            $query = $connection->prepare($sql);
                                            $query->execute();
                                            while ($cita = $query->fetch(PDO::FETCH_ASSOC)) { ?>
                                                <tr>
                                                    <td><?php echo $cita["name_font"]; ?> </td>
                                                    <td><?php echo $cita["amount"]; ?> </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                        <thead>
                                            <?php
                                            $query2 = $connection->prepare($sql2);
                                            $query2->execute();
                                            $res2 = $connection->query($sql2);
                                            $result2 = $res2->fetchColumn();
                                            ?>
                                            <?php if ($result2 == 0 || $result2 == null) { ?>
                                                <br><labeL for="">0</label>
                                            <?php  } ?>

                                            <tr>
                                                <th>Total</th>
                                                <th><?php echo $result2; ?></th>
                                            </tr>
                                        </thead>
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

<script src="/accountly/src/assets/js/validate-report-totals.js"></script>
<!-- <script src="./js/validate-report2.js"></script> -->

<?php
require('./views/footer.php');
?>