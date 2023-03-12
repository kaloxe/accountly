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

        <div class="container-fluid py-4 px-4">
            <div class="d-flex align-items-center justify-content-center row g-4">

                <div class="col-sm-12 col-xl-7">
                    <div class="bg-light rounded h-100 p-4">
                        <div class="d-flex">
                            <a class="ps-5 pe-3" href="./transactions.php"><i class="fa fa-arrow-left"></i></a>
                            <h6 class="mb-4">Registrar transaccion</h6>
                        </div>

                        <form class="px-5">

                            <select class="form-select mb-3" aria-label="Default select example">
                                <option selected>Seleccione cuenta</option>
                                <option value="2">Ingreso</option>
                                <option value="3">Egreso</option>
                            </select>

                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Monto</label>
                                <input type="number" class="form-control" id="exampleInputPassword1">
                            </div>

                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Descripcion</label>
                                <input type="text" class="form-control" id="exampleInputPassword1">
                            </div>

                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Fuente</label>
                                <select class="form-select mb-3" aria-label="Default select example">
                                    <option selected>Deposito</option>
                                    <option value="2">Paypal</option>
                                    <option value="3">Banesco</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Referencia</label>
                                <input type="number" class="form-control" id="exampleInputPassword1">
                            </div>

                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Fecha</label>
                                <input type="date" class="form-control" id="exampleInputPassword1">
                            </div>

                            <button type="submit" class="btn btn-primary">Registrar</button>
                        </form>
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