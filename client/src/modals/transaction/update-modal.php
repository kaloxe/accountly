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
                        <h4 class="text-blue h4 mb-10">Editar transacción</h4>

                        <div class="row">
                            <div class="form-group formulario__grupo-input col-6 px-3" id="grupo__movimiento_update">
                                <label>Movimiento</label>
                                <select class="form-control formulario__input" name="movimiento_update" id="movimiento_update">
                                    <option value="">Seleccione movimiento</option>
                                    <option value="1">Ingreso</option>
                                    <option value="0">Egreso</option>
                                </select>
                                <p class="formulario__input-error">Seleccione una opcion.</p>
                            </div>

                            <div class="form-group formulario__grupo-input col-6 pr-3" id="grupo__fecha_update">
                                <label>Fecha</label>
                                <input type="date" class="form-control formulario__input" name="fecha_update" id="fecha_update" />
                                <p class="formulario__input-error">Solo fecha actual o anterior.</p>
                            </div>
                        </div>

                        <div class="form-group formulario__grupo-input" id="grupo__cuenta_update">
                            <label>Cuenta</label>
                            <select class="form-control formulario__input" name="cuenta_update" id="cuenta_update">
                                <!-- select generado con php por fetch en js -->
                            </select>
                            <p class="formulario__input-error">Seleccione una cuenta</p>
                        </div>

                        <div class="row">
                            <div class="form-group formulario__grupo-input col-5 px-3" id="grupo__divisa_update">
                                <label>Divisa</label>
                                <select class="form-control formulario__input" name="divisa_update" id="divisa_update">
                                    <!-- select generado con php por fetch en js -->
                                </select>
                                <p class="formulario__input-error">Seleccione una divisa</p>
                            </div>
                            <div class="form-group formulario__grupo-input col-7 pr-3" id="grupo__monto_update">
                                <label>Monto</label>
                                <input type="text" class="form-control formulario__input" name="monto_update" id="monto_update" />
                                <p class="formulario__input-error">Solo valores numericos.</p>
                            </div>
                        </div>

                        <div class="form-group formulario__grupo-input" id="grupo__razon_update">
                            <label>Razón</label>
                            <select class="form-control formulario__input" name="razon_update" id="razon_update">
                                <!-- select generado con php por fetch en js -->
                            </select>
                            <p class="formulario__input-error">Seleccione una razón.</p>
                        </div>


                        <div class="form-group formulario__grupo-input" id="grupo__descripcion_update">
                            <label>Descripción</label>
                            <input type="text" class="form-control formulario__input" name="descripcion_update" id="descripcion_update" />
                            <p class="formulario__input-error">El campo debe tener de 4 a 45 caracteres alfanumericos.</p>
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