<?php require_once('./src/views/head.php'); ?>
<?php require_once('./src/views/loader.php'); ?>
<body class="login-page">
    <div class="login-header box-shadow">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <div class="brand-logo d-flex align-items-center">
                <h1 class="align-middle">Accountly</h1>
            </div>
            <div class="login-menu">
                <ul>
                    <li><a href="register.php">Registrarse</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
        <div class="container">
            <div class="row align-items-center">
                <div class="login-box col-12">

                    <div class="formulario__mensaje p-1 text-center mb-2 pb-5" id="formulario__mensaje">
                        <p><i class="micon bi bi-exclamation-triangle"></i> <b>Error:</b> Rellene el formulario correctamente. </p>
                    </div>
                    <div class="formulario__mensaje p-1 text-center mb-2 pb-5" id="formulario__mensaje_validacion">
                        <p><i class="micon bi bi-exclamation-triangle"></i> <b>Error:</b> Usuario o contraseña incorretos. </p>
                    </div>

                    <div class="login-box bg-white box-shadow border-radius-10">
                        <div class="login-title">
                            <h2 class="text-center text-primary">Ingresar a Accountly</h2>
                        </div>
                        <form id="formulario">
                            <div class="input-group custom" id="grupo__usuario">
                                <input type="text" class="formulario__grupo-input formulario__input form-control form-control-lg" name="usuario" id="usuario" placeholder="Nombre de usuario" />
                                <div class="input-group-append custom">
                                    <span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
                                </div>
                                <!-- <p class="formulario__input-error">Ingrese correctamente el nombre de usuario.</p> -->
                            </div>
                            <div class="input-group custom" id="grupo__password">
                                <input type="password" class="formulario__grupo-input formulario__input form-control form-control-lg" name="password" id="password" placeholder="**********" />
                                <div class="input-group-append custom">
                                    <span class="input-group-text"><i class="dw dw-padlock1"></i></span>
                                </div>
                                <!-- <p class="formulario__input-error">Ingrese correctamente la contraseña.</p> -->

                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="input-group formulario__grupo formulario__grupo-btn-enviar mb-0">
                                        <input type="button" class="btn btn-primary btn-lg btn-block" id="submit" value="Ingresar">
                                    </div>
                                    <div class="font-16 weight-600 pt-10 pb-10 text-center" data-color="#707373">
                                        O
                                    </div>
                                    <div class="input-group mb-0">
                                        <a class="btn btn-outline-primary btn-lg btn-block" href="register.php">Crear una cuenta</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="./src/js/validate-sign-in.js"></script>
    <?php require_once('./src/views/scripts.php'); ?>
    <?php require_once('./src/views/footer.php'); ?>