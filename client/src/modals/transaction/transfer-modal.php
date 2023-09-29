<div class="modal fade" id="modal_transfer" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="col-12">
            <div class="formulario__mensaje p-1 text-center mb-2 pb-5" id="formulario__mensaje_transfer">
                <p><i class="micon bi bi-exclamation-triangle"></i> <b>Error:</b> Rellene el formulario correctamente. </p>
            </div>
            <div class="formulario__mensaje p-1 text-center mb-2 pb-5" id="formulario__mensaje_validacion_transfer">
                <p><i class="micon bi bi-exclamation-triangle"></i> <b>Error:</b> Operacion fallida. </p>
            </div>
            <div class="formulario__mensaje-exito p-1 text-center mb-2 pb-5" id="formulario__mensaje-exito_transfer">
                <p><i class="micon bi bi-check-circle"></i> <b>Mensaje:</b> Operacion realizada satisfactoriamente. </p>
            </div>

            <div class="modal-content">
                <form id="formulario_transfer">
                    <div class="modal-body">
                        <h4 class="text-blue h4 mb-10">Tranferencia entre cuentas</h4>

                        <div class="form-group formulario__grupo-input" id="grupo__fecha_transfer">
                            <label>Fecha</label>
                            <input type="date" class="form-control formulario__input" name="fecha_transfer" id="fecha_transfer" />
                            <p class="formulario__input-error">Solo fecha actual o anterior.</p>
                        </div>

                        <div class="row">
                            <div class="form-group formulario__grupo-input col-6 px-3" id="grupo__cuenta1_transfer">
                                <label>Cuenta origen</label>
                                <select class="form-control formulario__input" name="cuenta1_transfer" id="cuenta1_transfer">
                                    <!-- select generado con php por fetch en js -->
                                </select>
                                <p class="formulario__input-error">Seleccione una cuenta.</p>
                            </div>
                            <div class="form-group formulario__grupo-input col-6 pr-3" id="grupo__cuenta2_transfer">
                                <label>Cuenta destino</label>
                                <select class="form-control formulario__input" name="cuenta2_transfer" id="cuenta2_transfer">
                                    <!-- select generado con php por fetch en js -->
                                </select>
                                <p class="formulario__input-error">Seleccione una cuenta.</p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group formulario__grupo-input col-5 px-3" id="grupo__divisa_transfer">
                                <label>Divisa</label>
                                <select class="form-control formulario__input" name="divisa_transfer" id="divisa_transfer">
                                    <!-- select generado con php por fetch en js -->
                                </select>
                                <p class="formulario__input-error">Seleccione una divisa.</p>
                            </div>

                            <div class="form-group formulario__grupo-input col-7 pr-3" id="grupo__monto_transfer">
                                <label>Monto</label>
                                <input type="text" class="form-control formulario__input" name="monto_transfer" id="monto_transfer" />
                                <p class="formulario__input-error">Solo valores numericos.</p>
                            </div>
                        </div>

                        <div class="form-group formulario__grupo-input" id="grupo__razon_transfer">
                            <label>Razon</label>
                            <select class="form-control formulario__input" name="razon_transfer" id="razon_transfer">
                                <!-- select generado con php por fetch en js -->
                            </select>
                            <p class="formulario__input-error">Seleccione una razon.</p>
                        </div>

                        <div class="form-group formulario__grupo-input" id="grupo__descripcion_transfer">
                            <label>Descripcion</label>
                            <input type="text" class="form-control formulario__input" name="descripcion_transfer" id="descripcion_transfer" />
                            <p class="formulario__input-error">El campo debe tener de 4 a 45 caracteres alfanumericos.</p>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-primary" id="transfer" value="Transferir">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">
                            Cerrar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>