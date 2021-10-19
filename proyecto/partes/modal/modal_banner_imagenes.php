<!--Modal para EDITAR-->
<div class="modal fade" id="modal-banner-imagenes" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <!--modal-lg= dentro de class para agrandar el modal -->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" style="font-family: 'Kaushan Script', cursive;" id="exampleModalLabel">Editar Banner De Imagen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form id="form-modal-banner-imagenes" method="POST">
                <div class="modal-body">
                    <input type="hidden" class="form-control" id="id_banner_imagenes" name="id_banner_imagenes">
                    <!-- LINK -->
                    <div class="form-group">
                        <label for="link_banner_imagenes" class="col-form-label">Link</label>
                        <!-- <input type="text" class="form-control" id="link_banner_imagenes" name="link_banner_imagenes" required> -->
                        <!-- <textarea class="form-control" name="link_banner_imagenes" id="link_banner_imagenes" placeholder="En este campo va la dirección url" rows="3" cols="100" onkeypress="return sololink(event)" pattern="https?://www.*" minlength="2" maxlength="200" style="resize: none;" required></textarea> -->
                            <input type="text" class="form-control" name="link_banner_imagenes" id="link_banner_imagenes" placeholder="En este campo va la dirección url" onkeypress="return sololink(event)" pattern="https?://.*" minlength="2" maxlength="200" style="resize: none;" required/>
                        <!--readonly="readonly" -->
                    </div>

                    <!-- IMAGEN -->
                    <div class="form-group">
                        <label for="id_banner_imagenes" class="col-form-label">Cambiar imagen</label>
                        <input type="file" id="archivo_banner_imagenes" name="archivo_banner_imagenes" accept=".png,.jpg,.jpeg">
                    </div>

                    <div class="d-flex justify-content-center">
                        <img id="miImagen" src="#" width=300 style="height: 300px !important; object-fit: scale-down;">
                    </div>

                    <button type="submit" name="submitmodal" class="btn btn-<?php echo $temadelacookie; ?> btn-block" style="margin-top:4px;"><i class="fa fa-edit"></i></i> Editar</button>
            </form>
        </div>
    </div>
</div>
<!--FIN DEL MODAL EDITAR -->