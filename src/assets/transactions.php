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

        <div class="container-fluid pt-4 px-4">

            <div class="bg-light rounded col-sm-12 col-xl-12">

                <div class="px-4 h-100">
                    <div class="d-flex m-n2">
                        <a href="./create-transaction.php" class="btn btn-primary m-2 ms-2"><i class="fa fa-plus"></i></a>

                        <input class="form-control m-2 ms-2 w-25" type="text" placeholder="Buscar">
                        <div class=" position-absolute end-0 mx-4">
                            <button type="button" class="btn btn-danger m-2 me-4"><i class="fa fa-trash me"></i></button>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid pt-4 px-4">
            <div class="row g-4">
                <div class="col-12">
                    <div class="bg-light rounded h-100 p-4">
                        <h6 class="mb-4">Transacciones</h6>
                        <div class="table-responsive">
                            <table class="table text-center align-middle">
                                <thead>
                                    <tr>
                                        <th scope="col"></th>
                                        <th scope="col">Monto</th>
                                        <th scope="col">Descripcion</th>
                                        <th scope="col">Fuente</th>
                                        <th scope="col">Referencia</th>
                                        <th scope="col">Fecha</th>
                                        <th scope="col">Accion</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Bs 12.23</td>
                                        <td>Mensualidad</td>
                                        <td>BVC</td>
                                        <td>012345</td>
                                        <td>12-03-2023</td>
                                        <td><a href="#" class="btn btn-sm btn-sm-square btn-primary"><i class="fa fa-eye"></i></a><a href="#" class="btn btn-sm btn-sm-square btn-success mx-2"><i class="fa fa-pen"></i></a><input class="form-check-input my-2" type="checkbox"></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>Bs 12.23</td>
                                        <td>Personal</td>
                                        <td>Paypal</td>
                                        <td>012345</td>
                                        <td>12-03-2023</td>
                                        <td><a href="#" class="btn btn-sm btn-sm-square btn-primary"><i class="fa fa-eye"></i></a><a href="#" class="btn btn-sm btn-sm-square btn-success mx-2"><i class="fa fa-pen"></i></a><input class="form-check-input my-2" type="checkbox"></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td>Bs 12.23</td>
                                        <td>Salario</td>
                                        <td>Banesco</td>
                                        <td>012345</td>
                                        <td>12-03-2023</td>
                                        <td><a href="#" class="btn btn-sm btn-sm-square btn-primary"><i class="fa fa-eye"></i></a><a href="#" class="btn btn-sm btn-sm-square btn-success mx-2"><i class="fa fa-pen"></i></a><input class="form-check-input my-2" type="checkbox"></td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="text-end"><a href="">Mostrar todo</a></div>

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