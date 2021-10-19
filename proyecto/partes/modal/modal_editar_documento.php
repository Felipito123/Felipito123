<!--Modal para EDITAR PLANILLA-->
<div class="modal fade" id="modal-editar-planilla" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <!--modal-lg= dentro de class para agrandar el modal -->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="font-family: 'Kaushan Script', cursive;">Editar documento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form-modal-editar-planilla" method="POST">
                <div class="modal-body">
                    <input type="hidden" id="id_documento" name="id_documento">
                    <div class="form-group">
                        <label for="nombre_usuario" class="col-form-label">Funcionario:</label>
                        <input class="form-control" id="nombre_usuario" required disabled> <!-- aqui solo lo muestro pero no lo edito-->
                    </div>

                    <!-- Archivo: PDF O IMAGEN -->
                    <div class="form-group">
                        <input type="file" id="archivo_editar" name="archivo_editar" accept=".png,.jpg,.jpeg,.pdf">
                    </div>

                    <!-- DESCRIPCIÓN -->
                    <div class="form-group">
                        <label for="descripcion_editar" class="col-form-label">Descripción:</label>
                        <textarea class="form-control" name="descripcion_editar" id="descripcion_editar" placeholder="Especifique que desea entregar" onkeypress="return soloCaractDeConversacion(event)" rows="3" cols="100" minlength="2" maxlength="50" style="resize: none;" required></textarea>
                    </div>

                    <button type="submit" class="btn btn-<?php echo $temadelacookie; ?> btn-block" style="margin-top:4px;"><i class="fa fa-paper-plane"></i></i> Editar documento</button>
            </form>
        </div>
    </div>
</div>
<!--FIN DEL MODAL EDITAR PLANILLA -->