<?php require('./src/views/head.php'); ?>
<?php require('./src/views/loader.php'); ?>
<?php require("/xampp/htdocs/accountly/server/session/session.php"); ?>
<?php require('./src/views/header.php'); ?>
<?php require('./src/views/right-sidebar.php'); ?>
<?php require('./src/views/left-sidebar.php'); ?>

<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <div class="title">
                            <h4>Configuracion</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="index.php">Principal</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Configuracion
                                </li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-md-6 col-sm-6 text-right">
                        <a type="button" class="btn btn-warning" data-color="#ffffff" data-toggle="modal" data-target="#modal_database" type="button">
                            <i class="fa fa-server"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- multiple select row Datatable start -->
            <div class="card-box mb-30">
                <div class="profile-setting">
                    <form id="formulario_update">
                        <ul class="profile-edit-list row">
                            <li class="weight-500 col-md-6">
                                <h4 class="text-blue h5 mb-20">
                                    Editar nombre o correo
                                </h4>
                                <div class="form-group" id="grupo__usuario_update">
                                    <label>Nombre de usuario</label>
                                    <input class="form-control form-control-lg formulario__grupo-input formulario__input" name="usuario_update" id="usuario_update" type="text" />
                                    <p class="formulario__input-error">La contraseña tiene que ser de 4 a 12 dígitos.</p>
                                </div>
                                <div class="form-group" id="grupo__correo_update">
                                    <label>Correo</label>
                                    <input class="form-control form-control-lg formulario__grupo-input formulario__input" name="correo_update" id="correo_update" type="email" />
                                    <p class="formulario__input-error">La contraseña tiene que ser de 4 a 12 dígitos.</p>
                                </div>
                                <div class="form-group mb-0">
                                    <a class="btn btn-primary" href="#" role="button" data-toggle="modal" data-target="#modal_update_name" type="button">
                                        Confirmar
                                    </a>
                                </div>
                            </li>
                            <li class="weight-500 col-md-6">
                                <h4 class="text-blue h5 mb-20">
                                    Cambiar contraseña
                                </h4>
                                <div class="form-group" id="grupo__oldPassword">
                                    <label>Antigua contraseña:</label>
                                    <input class="form-control form-control-lg formulario__grupo-input formulario__input" name="oldPassword" id="oldPassword" type="password" placeholder="**************" />
                                    <p class="formulario__input-error">La contraseña tiene que ser de 4 a 12 dígitos.</p>
                                </div>
                                <div class="form-group" id="grupo__password1">
                                    <label>Nueva contraseña:</label>
                                    <input class="form-control form-control-lg formulario__grupo-input formulario__input" name="password1" id="password1" type="password" placeholder="***************" />
                                    <p class="formulario__input-error">La contraseña tiene que ser de 4 a 12 dígitos.</p>
                                </div>
                                <div class="form-group" id="grupo__password2">
                                    <label>Confirmar contraseña:</label>
                                    <input class="form-control form-control-lg formulario__grupo-input formulario__input" name="password2" id="password2" type="password" placeholder="***************" />
                                    <p class="formulario__input-error">La contraseña tiene que ser de 4 a 12 dígitos.</p>
                                </div>
                                <div class="form-group mb-0">
                                    <a class="btn btn-primary" href="#" role="button" data-toggle="modal" data-target="#modal_update_password" type="button">
                                        Guardar y actualizar
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </form>
                </div>
            </div>

            <!-- Edit modal name -->
            <?php require('./src/modals/settings/update-modal-name.php') ?>

            <!-- database modal -->
            <?php require('./src/modals/settings/database-modal.php') ?>

            <!-- Edit modal password -->
            <?php require('./src/modals/settings/update-modal-password.php') ?>

        </div>
        
        <div class="footer-wrap pd-20 mb-20 card-box">
            Accountly - Aplicacion creada por
            <a href="https://github.com/kaloxe" target="_blank">Carlos Sanchez</a>
        </div>
    </div>
</div>
<script src="./src/js/validate-edit-password-settings.js"></script>
<script src="./src/js/validate-edit-name-settings.js"></script>
<!-- <script src="./src/js/validate-user-settings.js"></script> -->
<?php require('./src/views/scripts.php'); ?>
<!-- Datatable Setting js -->
<?php require('./src/views/footer.php'); ?>