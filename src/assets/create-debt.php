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
                        <div class="d-flex">
                            <a class="ps-5 pe-3" href="./debt.php"><i class="fa fa-arrow-left"></i></a>
                            <h6 class="mb-4">Registrar deuda</h6>
                        </div>

                        <form class="px-3" id="formulario">

                            <div class="mb-2" id="grupo__monto">
                                <div class="formulario__grupo-input">
                                    <label for="monto">Monto</label>
                                    <input type="text" class="form-control formulario__input" name="monto" id="monto" placeholder="">
                                    <p class="formulario__input-error">Solo se aceptan numeros y decimales separados por coma o punto.</p>
                                </div>
                            </div>

                            <div class="mb-2" id="grupo__descripcion">
                                <div class="formulario__grupo-input">
                                    <label for="descripcion">Descripcion</label>
                                    <textarea class="form-control formulario__input" name="descripcion" id="descripcion" placeholder="" rows="5"></textarea>
                                    <p class="formulario__input-error">El campo debe tener de 4 a 40 caracteres, solo se aceptan letras y numeros.</p>
                                </div>
                            </div>

                            <div class="d-flex align-items-center justify-content-center formulario__grupo formulario__grupo-btn-enviar">
                                <input type="button" class="btn btn-primary mt-2 py-2 w-50" id="submit" value="Registrar">
                            </div>
                            <p class="formulario__mensaje-exito pt-2" id="formulario__mensaje-exito">Formulario enviado exitosamente!</p>
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

<script src="./js/validate-create-debt.js"></script>

<?php
require('./views/footer.php');
?>