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
                    <div class="formulario__mensaje p-1 text-center mb-2 pb-5" id="formulario__mensaje">
                        <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Rellene el formulario correctamente. </p>
                    </div>
                    <div class="bg-light rounded h-100 p-4">
                        <h6 class="mb-4">Generar reporte de trasacciones</h6>
                        <form class="px-3" id="formulario">

                            <div class="mb-2" id="grupo__fecha">
                                <div class="formulario__grupo-input">
                                    <label for="descripcion">Desde</label>
                                    <input type="date" class="form-control formulario__input" name="fecha" id="fecha" placeholder="">
                                    <p class="formulario__input-error">El usuario tiene que ser de 4 a 16 dígitos y solo puede contener numeros, letras y guion bajo.</p>
                                </div>
                            </div>

                            <div class="mb-2" id="grupo__fecha2">
                                <div class="formulario__grupo-input">
                                    <label for="fecha2">Hasta</label>
                                    <input type="date" class="form-control formulario__input" name="fecha2" id="fecha2" placeholder="">
                                    <p class="formulario__input-error">El usuario tiene que ser de 4 a 16 dígitos y solo puede contener numeros, letras y guion bajo.</p>
                                </div>
                            </div>

                            <div class="mb-2" id="grupo__cuenta">
                                <div class="formulario__grupo-input">
                                    <label for="cuenta">Cuenta</label>
                                    <select class="form-select formulario__input" name="cuenta" id="cuenta" aria-label="Default select example">
                                        <option value="" selected>Seleccione para totalizar</option>
                                        <option value="Saldo">Saldo</option>
                                        <option value="Ingreso">Ingreso</option>
                                        <option value="Egreso">Egreso</option>
                                    </select>
                                    <p class="formulario__input-error">El usuario tiene que ser de 4 a 16 dígitos y solo puede contener numeros, letras y guion bajo.</p>
                                </div>
                            </div>

                            <div class="d-flex align-items-center justify-content-center formulario__grupo formulario__grupo-btn-enviar">
                                <button type="submit" class="btn btn-primary mt-2 py-2 w-50">Registrar</button>
                            </div>
                            <p class="formulario__mensaje-exito mt-4" id="formulario__mensaje-exito">Formulario enviado exitosamente!</p>
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

<script src="./js/validate-report.js"></script>
<!-- <script src="./js/validate-report2.js"></script> -->

<?php
require('./views/footer.php');
?>