<!-- <div class="col-md-4 col-sm-12 mb-30">
    <div class="pd-20 card-box height-100-p">
        <h5 class="h4">Medium modal</h5> -->
<div class="modal fade" id="modal_delete" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form>
                <div class="modal-body">
                    <h4 class="text-blue h4 mb-10">Eliminar cuenta</h4>
                    <p>Esta seguro de que quiere borrar el registro?</p>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-danger" id="eliminar" value="Eliminar" data-dismiss="modal" data-toggle="modal" data-target="#modal_message">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        Cerrar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="modal_message" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="col-12">
            <div class="formulario__mensaje p-1 text-center pb-5 px-4" id="formulario__mensaje_validacion_delete">
                <p><i class="micon bi bi-exclamation-triangle"></i> <b>Error:</b> La cuenta tiene registros asociados.</p>
            </div>
            <div class="formulario__mensaje-exito p-1 text-center pb-5 px-4" id="formulario__mensaje-exito">
                <p><i class="micon bi bi-check-circle"></i> <b>Mensaje:</b> Operacion realizada satisfactoriamente. </p>
            </div>
        </div>
    </div>
</div>
<!-- </div>
</div> -->