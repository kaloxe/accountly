<div class="modal fade" id="modal_update" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="col-12">
            <div class="formulario__mensaje p-1 text-center mb-2 pb-5" id="formulario__mensaje_update">
                <p><i class="micon bi bi-exclamation-triangle"></i> <b>Error:</b> Rellene el formulario correctamente. </p>
            </div>
            <div class="formulario__mensaje p-1 text-center mb-2 pb-5" id="formulario__mensaje_validacion_update">
                <p><i class="micon bi bi-exclamation-triangle"></i> <b>Error:</b> Operación fallida. </p>
            </div>
            <div class="formulario__mensaje-exito p-1 text-center mb-2 pb-5" id="formulario__mensaje-exito_update">
                <p><i class="micon bi bi-check-circle"></i> <b>Mensaje:</b> Operación realizada satisfactoriamente. </p>
            </div>

            <div class="modal-content">
                <form id="formulario_update">
                    <div class="modal-body">
                        <h4 class="text-blue h4 mb-10">Editar divisa</h4>
                        <div class="form-group formulario__grupo-input" id="grupo__divisa_update">
                            <label>Nombre de la divisa</label>
                            <input type="text" class="form-control formulario__input" name="divisa_update" id="divisa_update" />
                            <p class="formulario__input-error">El campo debe tener de 4 a 25 caracteres alfanumericos.</p>
                        </div>
                        <div class="form-group formulario__grupo-input" id="grupo__valor_update">
                            <label>Valor de la divisa</label>
                            <input type="text" class="form-control formulario__input" name="valor_update" id="valor_update" />
                            <p class="formulario__input-error">Solo valores numericos.</p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-primary" id="update" value="Actualizar">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">
                            Cerrar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>