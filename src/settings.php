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

                <!-- <div class="col-sm-12 col-xl-7">
                    <div class="bg-light rounded h-100 p-4">
                        <h6 class="mb-4">Correos</h6>
                        <form>

                            <div class="d-flex align-items-center border-bottom py-2">

                                <div class="w-100 ms-3">
                                    <div class="d-flex w-100 align-items-center justify-content-between">
                                        <span>alguien@gmial.com</span>
                                        <button class="btn btn-sm"><i class="fa fa-times"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center pt-2">

                                <div class="w-100 ms-3">
                                    <div class="d-flex w-100 align-items-center justify-content-between">
                                        <span>alguien@gmial.com</span>
                                        <button class="btn btn-sm"><i class="fa fa-times"></i></button>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex mt-4">
                                <input class="form-control" type="email" placeholder="Nuevo correo">
                                <button type="button" class="btn btn-primary ms-2">Agregar</button>
                            </div>
                        </form>
                    </div>
                </div> -->

                <div class="col-sm-12 col-xl-7">
                    <div class="formulario__mensaje p-1 text-center mb-2 pb-5" id="formulario__mensaje">
                        <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Rellene el formulario correctamente. </p>
                    </div>

                    <div class="bg-light rounded h-100 p-4">
                        <h6 class="mb-4">Cambiar contraseña</h6>
                        <form id="formulario">

                            <div class="mb-2" id="grupo__oldPassword">
                                <div class="formulario__grupo-input">
                                    <label for="oldPassword">Vieja contraseña</label>
                                    <input type="password" class="form-control formulario__input" name="oldPassword" id="oldPassword" placeholder="">
                                    <p class="formulario__input-error">La contraseña tiene que ser de 4 a 12 dígitos.</p>
                                </div>
                            </div>

                            <div class="mb-2" id="grupo__password">
                                <div class="formulario__grupo-input">
                                    <label for="password">Nueva contraseña</label>
                                    <input type="password" class="form-control formulario__input" name="password" id="password" placeholder="">
                                    <p class="formulario__input-error">La contraseña tiene que ser de 4 a 12 dígitos.</p>
                                </div>
                            </div>

                            <div class="mb-2" id="grupo__password2">
                                <div class="formulario__grupo-input">
                                    <label for="password2">Repita la nueva contraseña</label>
                                    <input type="password" class="form-control formulario__input" name="password2" id="password2" placeholder="">
                                    <p class="formulario__input-error">Ambas contraseñas deben ser iguales.</p>
                                </div>
                            </div>

                            <div class="d-flex align-items-center justify-content-center formulario__grupo formulario__grupo-btn-enviar">
                                <input type="button" class="btn btn-primary mt-2 py-2 w-50" id="submitPassword" value="Actualizar">
                            </div>
                            <p class="formulario__mensaje-exito" id="formulario__mensaje-exito">Formulario enviado exitosamente!</p>

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

<script src="/accountly/src/assets/js/validate-settings.js"></script>

<?php
require('./views/footer.php');
?>