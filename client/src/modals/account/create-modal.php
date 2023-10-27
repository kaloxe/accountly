<div class="modal fade" id="modal_create" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="col-12">
            <div class="formulario__mensaje p-1 text-center mb-2 pb-5" id="formulario__mensaje_create">
                <p><i class="micon bi bi-exclamation-triangle"></i> <b>Error:</b> Rellene el formulario correctamente. </p>
            </div>
            <div class="formulario__mensaje p-1 text-center mb-2 pb-5" id="formulario__mensaje_validacion_create">
                <p><i class="micon bi bi-exclamation-triangle"></i> <b>Error:</b> Nombre de cuenta ya registrado. </p>
            </div>
            <div class="formulario__mensaje-exito p-1 text-center mb-2 pb-5" id="formulario__mensaje-exito_create">
                <p><i class="micon bi bi-check-circle"></i> <b>Mensaje:</b> Operación realizada satisfactoriamente. </p>
            </div>
            <div class="modal-content">
                <form id="formulario_create">
                    <div class="modal-body">
                        <h4 class="text-blue h4 mb-10">Registrar transaccion</h4>
                        <div class="form-group formulario__grupo-input" id="grupo__nombre_create">
                            <label>Nombre de la cuenta</label>
                            <input type="text" class="form-control formulario__input" name="nombre_create" id="nombre_create" />
                            <p class="formulario__input-error">El campo debe tener de 4 a 25 caracteres alfanumericos.</p>
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