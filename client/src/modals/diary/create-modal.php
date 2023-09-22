<div id="modal-view-event-add" class="modal modal-top fade calendar-modal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="col-12">
            <div class="formulario__mensaje p-1 text-center mb-2 pb-5" id="formulario__mensaje">
                <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Rellene el formulario correctamente. </p>
            </div>
            <div class="modal-content">
                <form id="formulario_create">
                    <div class="modal-body">
                        <h4 class="text-blue h4 mb-10">Registrar evento</h4>

                        <div class="row">
                            <div class="form-group formulario__grupo-input col-6 px-3" id="grupo__movimiento_create">
                                <label>Movimiento</label>
                                <select class="form-control formulario__input" name="movimiento_create" id="movimiento_create">
                                    <option selected>Seleccione movimiento</option>
                                    <option value="1">Ingreso</option>
                                    <option value="0">Egreso</option>
                                </select>
                                <p class="formulario__input-error">Seleccione un deposito al que se se registrara el la transaccion.</p>
                            </div>
                            <div class="form-group formulario__grupo-input col-6 pr-3" id="grupo__fecha_create">
                                <label>Fecha</label>
                                <input type="date" class="form-control formulario__input" name="fecha_create" id="fecha_create" />
                                <p class="formulario__input-error">El campo debe tener de 4 a 40 caracteres, solo se aceptan letras y numeros.</p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group formulario__grupo-input col-5 px-3" id="grupo__divisa_create">
                                <label>Divisa</label>
                                <select class="form-control formulario__input" name="divisa_create" id="divisa_create">
                                    <!-- select generado con php por fetch en js -->
                                </select>
                                <p class="formulario__input-error">Seleccione un deposito al que se se registrara el la transaccion.</p>
                            </div>
                            <div class="form-group formulario__grupo-input col-7 pr-3" id="grupo__monto_create">
                                <label>Monto</label>
                                <input type="text" class="form-control formulario__input" name="monto_create" id="monto_create" />
                                <p class="formulario__input-error">El campo debe tener de 4 a 40 caracteres, solo se aceptan letras y numeros.</p>
                            </div>
                        </div>

                        <div class="form-group formulario__grupo-input" id="grupo__descripcion_create">
                            <label>Descripcion</label>
                            <input type="text" class="form-control formulario__input" name="descripcion_create" id="descripcion_create" />
                            <p class="formulario__input-error">El campo debe tener de 4 a 40 caracteres, solo se aceptan letras y numeros.</p>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-primary" id="create" value="Registrar">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">
                            Cerrar
                        </button>
                    </div>
                    <p class="formulario__mensaje-exito pt-2" id="formulario__mensaje-exito">Formulario enviado exitosamente!</p>
                </form>
            </div>
        </div>
    </div>
</div>