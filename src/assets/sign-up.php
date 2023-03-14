<?php
require('./views/header.php');
?>

<div class="container-xxl position-relative bg-white d-flex p-0">
    <!-- Spinner Start -->
    <?php require('./views/spinner.php'); ?>
    <!-- Spinner End -->


    <!-- Sign Up Start -->
    <div class="container-fluid">
        <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
            <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">

                <div class="formulario__mensaje p-1 text-center my-3 pb-5" id="formulario__mensaje">
                    <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Rellene el formulario correctamente. </p>
                </div>
                
                <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>Registrarse</h3>
                    </div>
                    <form action="" class="" id="form">

                        <div class="mb-3" id="grupo__usuario">
                            <div class="formulario__grupo-input form-floating">
                                <input type="text" class="form-control formulario__input" name="usuario" id="usuario" placeholder="">
                                <label for="usuario">Nombre de usuario</label>
                                <p class="formulario__input-error">El usuario tiene que ser de 4 a 16 dígitos y solo puede contener numeros, letras y guion bajo.</p>
                            </div>
                        </div>

                        <div class="form-floating mb-3" id="grupo__correo">
                            <input type="email" class="form-control formulario__input" name="correo" id="correo" placeholder="">
                            <label for="correo">Correo</label>
                            <p class="formulario__input-error">El correo solo puede contener letras, numeros, puntos, guiones y guion bajo.</p>
                        </div>

                        <div class="form-floating mb-4" id="grupo__password">
                            <input type="password" class="form-control formulario__input" name="password" id="password" placeholder="">
                            <label for="password">Contraseña</label>
                            <p class="formulario__input-error">La contraseña tiene que ser de 4 a 12 dígitos.</p>
                        </div>

                        <div class="form-floating mb-4" id="grupo__password2">
                            <input type="password" class="form-control formulario__input" name="password2" id="password2" placeholder="">
                            <label for="password2">Repita contraseña</label>
                            <p class="formulario__input-error">Ambas contraseñas deben ser iguales.</p>
                        </div>

                        <div class="formulario__grupo formulario__grupo-btn-enviar">
                            <button type="submit" class="btn btn-primary py-3 w-100 mb-4">Registrarse</button>
                            <p class="formulario__mensaje-exito" id="formulario__mensaje-exito">Formulario enviado exitosamente!</p>
                        </div>

                    </form>
                    <p class="text-center mb-0">Ya tienes una cuenta? <a href="./sign-in.php">Iniciar sesion</a></p>
                </div>

            </div>
        </div>
    </div>
    <!-- Sign Up End -->
</div>
<script src="./js/validate-sign-up.js"></script>
<?php
require('./views/footer.php');
?>