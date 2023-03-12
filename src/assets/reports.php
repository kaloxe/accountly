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
                        <h6 class="mb-4">Generar reporte de trasacciones</h6>
                        <form>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Desde</label>
                                <input type="date" class="form-control" id="exampleInputPassword1">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Hasta</label>
                                <input type="date" class="form-control" id="exampleInputPassword1">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Cuenta</label>
                                <select class="form-select mb-3" aria-label="Default select example">
                                    <option value="1" selected>Saldo</option>
                                    <option value="2">Ingresos</option>
                                    <option value="3">Egresos</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Generar</button>
                        </form>
                    </div>
                </div>

                <div class="col-sm-12 col-xl-7">
                    <div class="bg-light rounded h-100 p-4">
                        <h6 class="mb-4">Generar reporte de fuente y deuda</h6>
                        <form>
                        <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Cuenta</label>
                                <select class="form-select mb-3" aria-label="Default select example">
                                    <option value="1" selected>Patrimonio</option>
                                    <option value="2">Deposito</option>
                                    <option value="3">Deuda</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Generar</button>
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