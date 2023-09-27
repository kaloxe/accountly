<div class="modal fade" id="modal_create" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="col-12">
            <div class="formulario__mensaje p-1 text-center mb-2 pb-5" id="formulario__mensaje">
                <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Rellene el formulario correctamente. </p>
            </div>

            <div class="modal-content">
                <form id="formulario_create">
                    <div class="modal-body">
                        <h4 class="text-blue h4 mb-10">Registrar transaccion</h4>
                        <div class="form-group formulario__grupo-input" id="grupo__nombre_create">
                            <label>Nombre de la cuenta</label>
                            <input type="text" class="form-control formulario__input" name="nombre_create" id="nombre_create" />
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