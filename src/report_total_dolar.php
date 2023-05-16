<?php
require('./views/header.php');
require_once("/xampp/htdocs/accountly/server/db/db.php");

include('/xampp/htdocs/accountly/server/simplehtmldom/simple_html_dom.php');
// Carga la página web que deseas analizar
$html = file_get_html('https://www.bancaynegocios.com');
//echo file_get_html('https://www.bcv.org.ve');

// Encuentra el título de la página web
$valorDolar = $html->find('.iedv tbody tr td', 2)->plaintext;
$dolar = (float)$valorDolar;
// Imprime el título en la pantalla
?>

<div class="container-xxl position-relative bg-white d-flex p-0">
    <!-- Spinner Start -->
    <?php require('./views/spinner.php'); ?>
    <!-- Spinner End -->

    <!-- Sidebar Start -->
    <?php require('./views/menu.php');

    $sql = "SELECT name_font, (amount/$dolar) as amount FROM `font` WHERE id_user=$id_user";
    $sql1 = "SELECT COUNT(id_font) as cantidad FROM `font` WHERE id_user=$id_user";
    $sql2 = "SELECT SUM(amount/$dolar) as cantidad FROM `font` WHERE id_user=$id_user";

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