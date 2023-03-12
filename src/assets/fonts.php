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

        <div class="d-flex align-items-center justify-content-center pt-4 px-4">

            <div class="bg-light rounded py-2 col-8">

                <div class="px-2 h-100">
                    <div class="d-flex align-items-center justify-content-between m-n2">
                        <div class="row">
                            <a href="./create-font.php" class="col-2 btn btn-primary m-2 ms-4"><i class="fa fa-plus"></i></a>
                            <input class="col form-control m-2 ms-2 w-25" type="text" placeholder="Buscar">
                        </div>

                        <button type="button" class="btn btn-danger m-2 me-4"><i class="fa fa-trash me"></i></button>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex align-align-items-center justify-content-center pt-3">
            <div class="g-4 col-6">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">Deposito</h6>
                    <div class="table-responsive">
                        <table class="table text-center align-middle">
                            <thead>
                                <tr>
                                    <th scope="col">Saldo</th>
                                    <th scope="col">Fuente</th>
                                    <th scope="col">Accion</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">Bs 12.23</th>
                                    <td>Banesco</td>
                                    <td></a><a href="#" class="btn btn-sm btn-sm-square btn-success me-2"><i class="fa fa-pen"></i></a><input class="form-check-input my-2" type="checkbox"></td>
                                </tr>
                                <tr>
                                    <th scope="row">Bs 12.23</th>
                                    <td>Mercantil</td>
                                    <td></a><a href="#" class="btn btn-sm btn-sm-square btn-success me-2"><i class="fa fa-pen"></i></a><input class="form-check-input my-2" type="checkbox"></td>
                                </tr>
                                <tr>
                                    <th scope="row">Bs 12.23</th>
                                    <td>Paypal</td>
                                    <td></a><a href="#" class="btn btn-sm btn-sm-square btn-success me-2"><i class="fa fa-pen"></i></a><input class="form-check-input my-2" type="checkbox"></td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="text-end"><a href="">Mostrar todo</a></div>

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