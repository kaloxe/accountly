<?php
require('./views/header.php');
?>

<div class="container-xxl position-relative bg-white d-flex p-0">
    <!-- Spinner Start -->
    <?php require('./views/spinner.php'); ?>
    <!-- Spinner End -->

    <!-- Sidebar Start -->
    <?php require('./views/menu.php'); ?>
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
                            <p class="mb-2">Precio del dolar</p>
                            <h6 class="mb-0">$<?php echo $valorDolar; ?></h6>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fa fa-chart-bar fa-3x text-primary"></i>
                        <div class="ms-3 mx-auto">
                            <p class="mb-2">Deudas</p>
                            <h6 class="mb-0">$1234</h6>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fa fa-couch fa-3x text-primary"></i>
                        <!-- <i class="fa-solid fa-couch"></i> -->
                        <div class="ms-3 mx-auto">
                            <p class="mb-2">Patrimonio</p>
                            <h6 class="mb-0">$1234</h6>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fa fa-piggy-bank fa-3x text-primary"></i>
                        <!-- <i class="fa-duotone fa-piggy-bank"></i> -->
                        <div class="ms-3 mx-auto">
                            <p class="mb-2">Saldo</p>
                            <h6 class="mb-0">$1234</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Sale & Revenue End -->


        <div class="container-fluid pt-4 px-4">
            <div class="row g-4">
                <div class="col-sm-12 col-xl-8">
                    <div class="bg-light rounded p-4">
                        <h6 class="mb-4">Transacciones recientes</h6>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col">Monto</th>
                                    <th scope="col">Fecha</th>
                                    <th scope="col">Fuente</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>John</td>
                                    <td>Doe</td>
                                    <td>jhon@email.com</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>mark@email.com</td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>Jacob</td>
                                    <td>Thornton</td>
                                    <td>jacob@email.com</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="col-sm-12 col-md-6 col-xl-4">
                    <div class="bg-light rounded p-4">
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <h6 class="mb-0">Fuentes</h6>
                            <a href="">Show All</a>
                        </div>
                        <div class="d-flex align-items-center border-bottom py-3">
                            <img class="flex-shrink-0" src="/accountly/src/assets/img/bank.svg" alt="" style="width: 40px; height: 40px;">
                            <div class="w-100 ms-3">
                                <div class="d-flex w-100 justify-content-between">
                                    <h6 class="mb-0">Jhon Doe</h6>
                                    <small>15 minutes ago</small>
                                </div>
                                <span>Short message goes here...</span>
                            </div>
                        </div>
                        <div class="d-flex align-items-center border-bottom py-3">
                            <img class="flex-shrink-0" src="/accountly/src/assets/img/bank.svg" alt="" style="width: 40px; height: 40px;">
                            <div class="w-100 ms-3">
                                <div class="d-flex w-100 justify-content-between">
                                    <h6 class="mb-0">Jhon Doe</h6>
                                    <small>15 minutes ago</small>
                                </div>
                                <span>Short message goes here...</span>
                            </div>
                        </div>
                        <div class="d-flex align-items-center border-bottom py-3">
                            <img class="flex-shrink-0" src="/accountly/src/assets/img/bank.svg" alt="" style="width: 40px; height: 40px;">
                            <div class="w-100 ms-3">
                                <div class="d-flex w-100 justify-content-between">
                                    <h6 class="mb-0">Jhon Doe</h6>
                                    <small>15 minutes ago</small>
                                </div>
                                <span>Short message goes here...</span>
                            </div>
                        </div>
                        <div class="d-flex align-items-center pt-3">
                            <img class="flex-shrink-0" src="/accountly/src/assets/img/bank.svg" alt="" style="width: 40px; height: 40px;">
                            <div class="w-100 ms-3">
                                <div class="d-flex w-100 justify-content-between">
                                    <h6 class="mb-0">Jhon Doe</h6>
                                    <small>15 minutes ago</small>
                                </div>
                                <span>Short message goes here...</span>
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

    <?php
    require('./views/footer.php');
    ?>