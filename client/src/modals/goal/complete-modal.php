<div class="modal fade" id="modal_complete" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="col-12">
            <div class="formulario__mensaje p-1 text-center mb-2 pb-5" id="formulario__mensaje_complete">
                <p><i class="micon bi bi-exclamation-triangle"></i> <b>Error:</b> Rellene el formulario correctamente. </p>
            </div>
            <div class="formulario__mensaje p-1 text-center mb-2 pb-5" id="formulario__mensaje_validacion_complete">
                <p><i class="micon bi bi-exclamation-triangle"></i> <b>Error:</b> La meta ya fue completada. </p>
            </div>
            <div class="formulario__mensaje-exito p-1 text-center mb-2 pb-5" id="formulario__mensaje-exito_complete">
                <p><i class="micon bi bi-check-circle"></i> <b>Mensaje:</b> Operación realizada satisfactoriamente. </p>
            </div>

            <div class="modal-content">
                <form id="formulario_complete">
                    <div class="modal-body">
                        <h4 class="text-blue h4 mb-10">Completar meta</h4>

                        <div class="form-group formulario__grupo-input" id="grupo__cuenta_complete">
                            <label>Cuenta</label>
                            <select class="form-control formulario__input" name="cuenta_complete" id="cuenta_complete">
                                <!-- select generado con php por fetch en js -->
                            </select>
                            <p class="formulario__input-error">Seleccione una cuenta.</p>
                        </div>

                        <div class="form-group formulario__grupo-input" id="grupo__descripcion_complete">
                            <label>Descripción</label>
                            <input type="text" class="form-control formulario__input" name="descripcion_complete" id="descripcion_complete" />
                            <p class="formulario__input-error">El campo debe tener de 4 a 45 caracteres alfanumericos.</p>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-primary" id="complete" value="Completar">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">
                            Cerrar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>