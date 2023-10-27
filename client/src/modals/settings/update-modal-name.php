<div class="modal fade" id="modal_update_name" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="col-12">
            <div class="formulario__mensaje p-1 text-center mb-2 pb-5" id="formulario__mensaje_update_usuario">
                <p><i class="micon bi bi-exclamation-triangle"></i> <b>Error:</b> Rellene el formulario correctamente. </p>
            </div>
            <div class="formulario__mensaje p-1 text-center mb-2 pb-5" id="formulario__mensaje_validacion_update_usuario">
                <p><i class="micon bi bi-exclamation-triangle"></i> <b>Error:</b> Contraseña incorrecta. </p>
            </div>
            <div class="formulario__mensaje-exito p-1 text-center mb-2 pb-5" id="formulario__mensaje-exito_update_usuario">
                <p><i class="micon bi bi-check-circle"></i> <b>Mensaje:</b> Operación realizada satisfactoriamente. </p>
            </div>

            <div class="modal-content">
                <form id="formulario_update_name">
                    <div class="modal-body">
                        <h4 class="text-blue h4 mb-10">Confirmación de actualización</h4>
                        <div class="form-group formulario__grupo-input" id="grupo__password_update">
                            <label>Ingrese contraseña para realizar la operación</label>
                            <input type="password" class="form-control formulario__input" name="password_update" id="password_update" />
                            <p class="formulario__input-error">Ingrese la contraseña correctamente. </p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-primary" id="update_user" value="Actualizar">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">
                            Cerrar
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>