<?php
require('./views/header.php');
require('/xampp/htdocs/accountly/server/controllers/controllerSession.php');

// if (isset($_SESSION['object'])) {
//     @header('Location: dashboard.php');
// }
?>

<div class="container-xxl position-relative bg-white d-flex p-0">
    <!-- Spinner Start -->
    <?php require('./views/spinner.php'); ?>
    <!-- Spinner End -->


    <!-- Sign In Start -->
    <div class="container-fluid">
        <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
            <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                <div class="formulario__mensaje p-1 text-center my-3 pb-5" id="formulario__mensaje">
                    <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Rellene el formulario correctamente. </p>
                </div>
                <div class="formulario__mensaje-exito formulario__mensaje p-1 text-center my-3 pb-5" id="formulario__mensaje-exito">
                    <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> El usuario o contraseña son incorrectos</p>
                </div>


                <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <a href="./dashboard.php" class="">
                            <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>Iniciar sesion</h3>
                        </a>
                    </div>

                    <form id="formulario">
                        <div class="form-floating mb-2" id="grupo__usuario">
                            <input type="text" class="form-control formulario__grupo-input formulario__input" name="usuario" id="usuario" placeholder="">
                            <label for="usuario">Usuario</label>
                            <p class="formulario__input-error">El correo solo puede contener letras, numeros, puntos, guiones y guion bajo.</p>
                        </div>

                        <div class="form-floating mb-2" id="grupo__password">
                            <input type="password" class="form-control formulario__grupo-input formulario__input" name="password" id="password" placeholder="">
                            <label for="password">Contraseña</label>
                            <p class="formulario__input-error">La contraseña tiene que ser de 4 a 12 dígitos.</p>
                        </div>

                        <div class="formulario__grupo formulario__grupo-btn-enviar mt-4">
                            <input type="button" class="btn btn-primary py-3 w-100 mb-2" id="submit" value="Iniciar">

                        </div>

                    </form>
                    

                    <p class="text-center mb-0">No tienes una cuenta? <a href="./sign-up.php">Registrarse</a></p>
                </div>
            </div>
        </div>
    </div>
    <!-- Sign In End -->
</div>

<script src="./assets/js/validate-sign-in.js"></script>

<?php
require('./views/footer.php');
?>