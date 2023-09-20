<div class="modal fade" id="modal_update" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="col-12">
            <div class="formulario__mensaje p-1 text-center mb-2 pb-5" id="formulario__mensaje_update">
                <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Rellene el formulario correctamente. </p>
            </div>

            <div class="modal-content">
                <form id="formulario_update">
                    <div class="modal-body">
                        <h4 class="text-blue h4 mb-10">Actualizar</h4>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Correo*</label>
                            <div class="col-sm-8" id="grupo__correo_update">
                                <input type="email" class="form-control formulario__grupo-input formulario__input" name="correo_update" id="correo_update" />
                                <p class="formulario__input-error">El correo solo puede contener letras, numeros, puntos, guiones y guion bajo.</p>
                            </div>

                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Nombre de usuario*</label>
                            <div class="col-sm-8" id="grupo__usuario_update">
                                <input type="text" class="form-control formulario__grupo-input formulario__input" name="usuario_update" id="usuario_update" />
                                <p class="formulario__input-error">El usuario tiene que ser de 4 a 16 dígitos y solo puede contener numeros, letras y guion bajo.</p>
                            </div>

                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Contraseña*</label>
                            <div class="col-sm-8" id="grupo__password_update">
                                <input type="password" class="form-control formulario__grupo-input formulario__input" name="password_update" id="password_update" />
                                <p class="formulario__input-error">La contraseña tiene que ser de 4 a 12 dígitos.</p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Confirmar contraseña*</label>
                            <div class="col-sm-8" id="grupo__password2_update">
                                <input type="password" class="form-control formulario__grupo-input formulario__input" name="password2_update" id="password2_update" />
                                <p class="formulario__input-error">Ambas contraseñas deben ser iguales.</p>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-primary" id="update" value="Actualizar">
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