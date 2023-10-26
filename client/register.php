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
                    <li><a href="login.php">Ingresar</a></li>
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
                        <p><i class="micon bi bi-exclamation-triangle"></i> <b>Error:</b> Nombre de cuenta ya registrado. </p>
                    </div>
                    <div class="formulario__mensaje-exito p-1 text-center mb-2 pb-5" id="formulario__mensaje-exito">
                        <p><i class="micon bi bi-check-circle"></i> <b>Mensaje:</b> Usuario creado. </p>
                    </div>

                    <div class="login-box bg-white box-shadow border-radius-10">
                        <div class="login-title">
                            <h2 class="text-center text-primary">Registrar usuario</h2>
                        </div>

                        <form id="formulario">

                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Correo*</label>
                                <div class="col-sm-8" id="grupo__correo">
                                    <input type="email" class="form-control formulario__grupo-input formulario__input" name="correo" id="correo" />
                                    <p class="formulario__input-error">Ingrese un correo valido.</p>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Nombre de usuario*</label>
                                <div class="col-sm-8" id="grupo__usuario">
                                    <input type="text" class="form-control formulario__grupo-input formulario__input" name="usuario" id="usuario" />
                                    <p class="formulario__input-error">El nombre debe tener de 4 a 25 caracteres alfanumericos sin espacios.</p>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Contraseña*</label>
                                <div class="col-sm-8" id="grupo__password">
                                    <input type="password" class="form-control formulario__grupo-input formulario__input" name="password" id="password" />
                                    <p class="formulario__input-error">La contraseña debe tener minimo 6 caracteres.</p>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Confirmar contraseña*</label>
                                <div class="col-sm-8" id="grupo__password2">
                                    <input type="password" class="form-control formulario__grupo-input formulario__input" name="password2" id="password2" />
                                    <p class="formulario__input-error">Ambas contraseñas deben ser iguales.</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="input-group formulario__grupo formulario__grupo-btn-enviar mb-0">
                                        <input type="button" class="btn btn-primary btn-lg btn-block" id="submit" value="Registrar">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="./src/js/validate-sign-up.js"></script>
    <?php require_once('./src/views/scripts.php'); ?>
    <?php require_once('./src/views/footer.php'); ?>