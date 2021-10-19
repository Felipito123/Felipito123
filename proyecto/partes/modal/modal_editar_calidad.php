<!--Modal para EDITAR PLANILLA-->
<div class="modal fade" id="modal-editar-calidad" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <!--modal-lg= dentro de class para agrandar el modal -->
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="h5 mb-0 text-gray-800" style="font-family: 'Kaushan Script', cursive;">Editar documento</h1>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form-modal-editar-calidad" method="POST">
                <div class="modal-body">
                    <input type="hidden" id="id_modal_editar" name="id_modal_editar">

                    <!-- Archivo: PDF O IMAGEN -->
                    <div class="form-group">
                        <input type="file" id="archivo_modal_editar" name="archivo_modal_editar" accept=".png,.jpg,.JPEG,.jpeg,.JPG,.PNG,.pdf">
                    </div>

                    <!-- TITULO O DESCRIPCIÓN -->
                    <div class="form-group">
                        <label for="descripcion-modal-editar-calidad" class="col-form-label">Descripción del documento:</label>
                        <textarea class="form-control" name="descripcion_modal_editar" id="descripcion_modal_editar" placeholder="Especifique que desea entregar" onkeypress="return soloCaractDeConversacion(event)" rows="4" cols="100" minlength="2" maxlength="50" style="resize: none;" required></textarea>
                    </div>

                    <button type="submit" class="btn btn-<?php echo $temadelacookie; ?> btn-block" style="margin-top:4px;"><i class="fa fa-paper-plane"></i></i> Editar</button>
            </form>
        </div>
    </div>
</div>
<!--FIN DEL MODAL EDITAR PLANILLA -->