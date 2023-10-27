<div class="modal fade" id="modal_update_password" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form>
                <div class="modal-body">
                    <h4 class="text-blue h4 mb-10">Confirmar</h4>
                    <p>Esta seguro de que quiere realizar el cambio de clave?</p>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-primary" id="update_password" value="Confirmar" data-dismiss="modal" data-toggle="modal" data-target="#modal_message_password">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        Cerrar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_message_password" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="col-12">
            <div class="formulario__mensaje p-1 text-center pb-5 px-4 " id="formulario__mensaje">
                <p><i class="micon bi bi-exclamation-triangle"></i> <b>Error:</b> Rellene el formulario correctamente. </p>
            </div>
            <div class="formulario__mensaje p-1 text-center pb-5 px-4" id="formulario__mensaje_validacion_update_password">
                <p><i class="micon bi bi-exclamation-triangle"></i> <b>Error:</b> Contraseña ingresada incorrecta. </p>
            </div>
            <div class="formulario__mensaje-exito p-1 text-center pb-5 px-4" id="formulario__mensaje-exito_update_password">
                <p><i class="micon bi bi-check-circle"></i> <b>Mensaje:</b> Operación realizada satisfactoriamente. </p>
            </div>
        </div>
    </div>
</div>

<!-- </div>
</div> -->