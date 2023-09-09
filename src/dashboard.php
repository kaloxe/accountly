<?php
require('./views/header.php');
require_once("/xampp/htdocs/accountly/server/db/db.php");
?>

<div class="container-xxl position-relative bg-white d-flex p-0">
    <!-- Spinner Start -->
    <?php //require('./views/spinner.php'); 
    ?>
    <!-- Spinner End -->

    <!-- Sidebar Start -->
    <?php require('./views/menu.php');
    $fecha_final = date("Y-m-d");
    $fecha_inicial = date("Y-m-d", strtotime($fecha_final . "- 7 days"));
    if ((isset($fecha_final)) && (isset($fecha_inicial))) {
        if ($fecha_final != null && $fecha_inicial != null) {
            $sql = "SELECT t.amount, t.id_transaction, m.id_management ,f.id_font , name_font, reference, name_management, date FROM transaction t INNER JOIN font f on f.id_font=t.id_font INNER JOIN management m on t.id_management=m.id_management WHERE (date BETWEEN '$fecha_inicial' and '$fecha_final') AND id_user=$id_user";
            $sql1 = "SELECT count(id_transaction) FROM transaction t INNER JOIN font f on f.id_font=t.id_font WHERE (date BETWEEN '$fecha_inicial' and '$fecha_final') AND id_user=$id_user";
        }
    }
    $sql2 = "SELECT SUM(amount) FROM `debt` WHERE id_user=$id_user";
    $query2 = $connection->prepare($sql2);
    $query2->execute();
    $res2 = $connection->query($sql2);
    $result2 = $res2->fetchColumn();

    $sql3 = "SELECT SUM(amount) as amount FROM `font` WHERE id_user=$id_user";
    $query3 = $connection->prepare($sql3);
    $query3->execute();
    $res3 = $connection->query($sql3);
    $result3 = $res3->fetchColumn();

    $sql4 = "SELECT SUM(t.cantidad) FROM (SELECT SUM(amount) as cantidad FROM `font` WHERE id_user=2 UNION SELECT -SUM(amount) as cantidad FROM `debt` WHERE id_user=$id_user) t";
    $query4 = $connection->prepare($sql4);
    $query4->execute();
    $res4 = $connection->query($sql4);
    $result4 = $res4->fetchColumn();
    ?>
    <!-- Sidebar End -->


    <!-- Content Start -->
    <div class="content">

        <!-- Navbar Start -->
        <?php require('./views/nav-bar.php'); ?>
        <!-- Navbar End -->

        <?php
        include('/xampp/htdocs/accountly/server/simplehtmldom/simple_html_dom.php');
        // Carga la página web que deseas analizar
        $html = file_get_html('https://www.bancaynegocios.com');
        //echo file_get_html('https://www.bcv.org.ve');

        // Encuentra el título de la página web
        $valorDolar = $html->find('.iedv tbody tr td', 2)->plaintext;

        // Imprime el título en la pantalla
        ?>

        <!-- Sale & Revenue Start -->
        <div class="container-fluid pt-4 px-4">
            <div class="row g-4">
                <div class="col-sm-6 col-xl-3">
                    <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fa fa-money-bill fa-3x text-primary"></i>
                        <!-- <i class="fa-sharp fa-solid fa-money-bill"></i> -->
                        <div class="ms-3 mx-auto">
                            <p class="mb-2">Dolar</p>
                            <h6 class="mb-0">$<?php echo $valorDolar; ?></h6>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fa fa-chart-bar fa-3x text-primary"></i>
                        <div class="ms-3 mx-auto">
                            <p class="mb-2">Deudas</p>
                            <h6 class="mb-0">$<?php echo $result2; ?></h6>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fa fa-couch fa-3x text-primary"></i>
                        <!-- <i class="fa-solid fa-couch"></i> -->
                        <div class="ms-3 mx-auto">
                            <p class="mb-2">Patrimonio</p>
                            <h6 class="mb-0">$<?php echo $result3; ?></h6>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fa fa-piggy-bank fa-3x text-primary"></i>
                        <!-- <i class="fa-duotone fa-piggy-bank"></i> -->
                        <div class="ms-3 mx-auto">
                            <p class="mb-2">Saldo</p>
                            <h6 class="mb-0">$<?php echo $result4; ?></h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Sale & Revenue End -->

        <div class="container-fluid pt-4 px-4">
            <div class="row g-4">
                <div class="col-sm-12 col-xl-12">
                    <div class="bg-light rounded p-4">
                        <h6 class="mb-4 table-responsive">Transacciones recientes</h6>
                        <table class="table text-center align-middle">
                            <thead>
                                <?php
                                $query = $connection->prepare($sql1);
                                $query->execute();
                                $res = $connection->query($sql1);
                                $result = $res->fetchColumn(); ?>
                                <?php if ($result == 0 || $result == null) { ?>
                                    <br><labeL for="">No existen registros recientemente</label>
                                <?php  } ?>

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
                                    <tr cedula_paciente="paciente_<?php echo $cita["id_transaction"] ?>">  
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
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <?php
    require('./views/footer.php');
    ?>