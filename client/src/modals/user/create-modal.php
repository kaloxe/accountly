<div class="modal fade" id="modal_create" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="col-12">
            <div class="formulario__mensaje p-1 text-center mb-2 pb-5" id="formulario__mensaje">
                <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Rellene el formulario correctamente. </p>
            </div>

            <div class="modal-content">
                <form id="formulario_create">
                    <div class="modal-body">
                        <h4 class="text-blue h4 mb-10">Crear</h4>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Correo*</label>
                            <div class="col-sm-8" id="grupo__correo_create">
                                <input type="email" class="form-control formulario__grupo-input formulario__input" name="correo_create" id="correo_create" />
                                <p class="formulario__input-error">El correo solo puede contener letras, numeros, puntos, guiones y guion bajo.</p>
                            </div>

                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Nombre de usuario*</label>
                            <div class="col-sm-8" id="grupo__usuario_create">
                                <input type="text" class="form-control formulario__grupo-input formulario__input" name="usuario_create" id="usuario_create" />
                                <p class="formulario__input-error">El usuario tiene que ser de 4 a 16 dígitos y solo puede contener numeros, letras y guion bajo.</p>
                            </div>

                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Contraseña*</label>
                            <div class="col-sm-8" id="grupo__password_create">
                                <input type="password" class="form-control formulario__grupo-input formulario__input" name="password_create" id="password_create" />
                                <p class="formulario__input-error">La contraseña tiene que ser de 4 a 12 dígitos.</p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Confirmar contraseña*</label>
                            <div class="col-sm-8" id="grupo__password2_create">
                                <input type="password" class="form-control formulario__grupo-input formulario__input" name="password2_create" id="password2_create" />
                                <p class="formulario__input-error">Ambas contraseñas deben ser iguales.</p>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-primary" id="create" value="Registrar">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">
                            Cerrar
                        </button>
                    </div>
                    <p class="formulario__mensaje-exito pt-2" id="formulario__mensaje-exito">Formulario enviado exitosamente!</p>
                </form>
            </div>
        </div>
    </div>
</div>