<!--Modal para EDITAR-->
<div class="modal fade" id="modal-img-galeria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <!--modal-lg= dentro de class para agrandar el modal -->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" style="font-family: 'Kaushan Script', cursive;" id="exampleModalLabel">Editar Imagen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form-modal-img-galeria" method="POST">
                <div class="modal-body">

                    <input type="hidden" class="form-control" id="id_img_galeria" name="id_img_galeria">

                    <!-- TITULO -->
                    <div class="form-group">
                        <label for="titulo_img_galeria" class="col-form-label">Titulo:</label>
                        <input type="text" class="form-control" id="titulo_img_galeria" name="titulo_img_galeria" onkeypress="return sololetrasynumeros(event)" minlength="2" maxlength="100" required>
                        <!--readonly="readonly" -->
                    </div>

                    <!-- IMAGEN -->
                    <div class="form-group">
                        <label for="archivo_img_galeria" class="col-form-label">Imagen:</label>
                        <input type="file" id="archivo_img_galeria" name="archivo_img_galeria" accept=".png,.jpg,.jpeg">
                    </div>

                    <div class="d-flex justify-content-center">
                        <img id="miImagen_img_galeria" src="#" width=300 style="height: 300px !important; object-fit: scale-down;">
                    </div>

                    <button type="submit" class="btn btn-<?php echo $temadelacookie; ?> btn-block" style="margin-top:4px;"><i class="fa fa-edit"></i>Editar</button>
            </form>
        </div>
    </div>
</div>
<!--FIN DEL MODAL EDITAR -->