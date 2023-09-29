<div class="modal fade" id="modal_create" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="col-12">
            <div class="formulario__mensaje p-1 text-center mb-2 pb-5" id="formulario__mensaje_create">
                <p><i class="micon bi bi-exclamation-triangle"></i> <b>Error:</b> Rellene el formulario correctamente. </p>
            </div>
            <div class="formulario__mensaje p-1 text-center mb-2 pb-5" id="formulario__mensaje_validacion_create">
                <p><i class="micon bi bi-exclamation-triangle"></i> <b>Error:</b> Nombre de usuario ya registrado. </p>
            </div>
            <div class="formulario__mensaje-exito p-1 text-center mb-2 pb-5" id="formulario__mensaje-exito_create">
                <p><i class="micon bi bi-check-circle"></i> <b>Mensaje:</b> Operacion realizada satisfactoriamente. </p>
            </div>

            <div class="modal-content">
                <form id="formulario_create">
                    <div class="modal-body">
                        <h4 class="text-blue h4 mb-10">Crear</h4>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Correo*</label>
                            <div class="col-sm-8" id="grupo__correo_create">
                                <input type="email" class="form-control formulario__grupo-input formulario__input" name="correo_create" id="correo_create" />
                                <p class="formulario__input-error">Ingrese un correo valido</p>
                            </div>

                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Nombre de usuario*</label>
                            <div class="col-sm-8" id="grupo__usuario_create">
                                <input type="text" class="form-control formulario__grupo-input formulario__input" name="usuario_create" id="usuario_create" />
                                <p class="formulario__input-error">El campo debe tener de 4 a 25 caracteres alfanumericos.</p>
                            </div>

                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Contraseña*</label>
                            <div class="col-sm-8" id="grupo__password_create">
                                <input type="password" class="form-control formulario__grupo-input formulario__input" name="password_create" id="password_create" />
                                <p class="formulario__input-error">La contraseña debe tener minimo 6 caracteres.</p>
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
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">
                            Cerrar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>