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
    $cuenta = (isset($_POST['cuenta']) ? $_POST['cuenta'] : null);
    $fecha_inicial = (isset($_POST['fecha']) ? $_POST['fecha'] : null);
    $fecha_final = (isset($_POST['fecha2']) ? $_POST['fecha2'] : null);
    
    if ($fecha_final != null && $fecha_inicial != null) {
        if ($fecha_inicial < $fecha_final) {
            $fecha1 = date_create($fecha_inicial);
            $fecha2 = date_create($fecha_final);
            if ($cuenta == null || $cuenta == "0") {
                $sql = "SELECT * FROM transaction INNER JOIN font on font.id_font=transaction.id_font WHERE (date BETWEEN '$fecha_inicial' and '$fecha_final') AND id_user=$id_user";
                $sql1 = "SELECT count(id_transaction) FROM transaction INNER JOIN font on font.id_font=transaction.id_font WHERE (date BETWEEN '$fecha_inicial' and '$fecha_final') AND id_user=$id_user";
            } else {
                $sql = "SELECT * FROM transaction INNER JOIN font on font.id_font=transaction.id_font WHERE id_management='$cuenta' and (date BETWEEN '$fecha_inicial' and '$fecha_final') AND id_user=$id_user";
                $sql1 = "SELECT count(id_transaction) FROM transaction INNER JOIN font on font.id_font=transaction.id_font WHERE id_management='$cuenta' and (date BETWEEN '$fecha_inicial' and '$fecha_final') AND id_user=$id_user";
            }
        }
    } else {
        $sql = "SELECT * FROM transaction INNER JOIN font on font.id_font=transaction.id_font WHERE id_user=$id_user";
        $sql1 = "SELECT count(id_transaction) FROM transaction INNER JOIN font on font.id_font=transaction.id_font WHERE id_user=$id_user";
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
                        <h6 class="mb-4">Generar reporte de trasacciones</h6>
                        <form class="px-3" id="formulario" action="./report_date_transaction.php" method="post">

                            <div class="mb-2" id="grupo__fecha">
                                <div class="formulario__grupo-input">
                                    <label for="descripcion">Desde</label>
                                    <input type="date" class="form-control formulario__input" name="fecha" id="fecha" placeholder="">
                                    <p class="formulario__input-error">La fecha no puede superar la actual</p>
                                </div>
                            </div>

                            <div class="mb-2" id="grupo__fecha2">
                                <div class="formulario__grupo-input">
                                    <label for="fecha2">Hasta</label>
                                    <input type="date" class="form-control formulario__input" name="fecha2" id="fecha2" placeholder="">
                                    <p class="formulario__input-error">La fecha no puede superar la actual ni puede ser anterior a la del campo de arriba.</p>
                                </div>
                            </div>

                            <div class="mb-2" id="grupo__cuenta">
                                <div class="formulario__grupo-input">
                                    <label for="cuenta">Cuenta</label>
                                    <select class="form-select formulario__input" name="cuenta" id="cuenta" aria-label="Default select example">
                                        <option value="" selected>Seleccione para totalizar</option>
                                        <option value="0">Saldo</option>
                                        <option value="1">Ingreso</option>
                                        <option value="2">Egreso</option>
                                    </select>
                                    <p class="formulario__input-error">Seleccione una opcion de las cuentas filtrar.</p>
                                </div>
                            </div>

                            <div class="d-flex align-items-center justify-content-center formulario__grupo formulario__grupo-btn-enviar">
                                <!-- <button type="submit" name="filtrar" class="btn btn-primary mt-2 py-2 w-50">Filtrar</button> -->
                                <input type="submit" class="btn btn-primary mt-2 py-2 w-50" id="submit" value="Registrar">
                            </div>
                            <p class="formulario__mensaje-exito mt-4" id="formulario__mensaje-exito">Formulario enviado exitosamente!</p>
                        </form>

                    </div>

                    <div class="d-flex align-items-center justify-content-center pt-3">
                        <div class="g-4 col-12">
                            <div class="bg-light rounded h-100 p-4">
                                <h6 class="mb-4">Transacciones</h6>

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
                                                    <td><?php echo $cita["amount"]; ?> </td>
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

<script src="/accountly/src/assets/js/validate-report.js"></script>
<!-- <script src="./js/validate-report2.js"></script> -->

<?php
require('./views/footer.php');
?>