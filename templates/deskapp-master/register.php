<?php require('./src/views/head.php'); ?>

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
                <!-- <div class="col-md-6 col-lg-7">
						<img src="vendors/images/login-page-img.png" alt="" />
					</div> -->



                <div class="col-md-12 col-lg-12">
                    <div class="formulario__mensaje p-1 text-center my-3 pb-5" id="formulario__mensaje">
                        <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Rellene el formulario correctamente. </p>
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
                                    <p class="formulario__input-error">El correo solo puede contener letras, numeros, puntos, guiones y guion bajo.</p>
                                </div>

                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Nombre de usuario*</label>
                                <div class="col-sm-8" id="grupo__usuario">
                                    <input type="text" class="form-control formulario__grupo-input formulario__input" name="usuario" id="usuario" />
                                    <p class="formulario__input-error">El usuario tiene que ser de 4 a 16 dígitos y solo puede contener numeros, letras y guion bajo.</p>
                                </div>

                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Contraseña*</label>
                                <div class="col-sm-8" id="grupo__password">
                                    <input type="password" class="form-control formulario__grupo-input formulario__input" name="password" id="password" />
                                    <p class="formulario__input-error">La contraseña tiene que ser de 4 a 12 dígitos.</p>
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
                                        <p class="formulario__mensaje-exito" id="formulario__mensaje-exito">Formulario enviado exitosamente!</p>
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
    <?php require('./src/views/footer.php'); ?>