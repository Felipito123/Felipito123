<!--Modal para EDITAR-->
<div class="modal fade" id="modal-banner-videos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <!--modal-lg= dentro de class para agrandar el modal -->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" style="font-family: 'Kaushan Script', cursive;" id="exampleModalLabel">Editar Banner De Video</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form-modal-banner-videos" method="POST">
                <div class="modal-body">
                    <input type="hidden" class="form-control" id="id_banner_videos" name="id_banner_videos">

                    <!-- TITULO -->
                    <div class="form-group">
                        <label for="titulo_banner_videos" class="col-form-label">Titulo</label>
                        <input type="text" class="form-control" id="titulo_banner_videos" name="titulo_banner_videos" onkeypress="return validabannervideos(event)" onpaste="return false" minlength="1"  maxlength="55" required>
                        <!--readonly="readonly" -->
                    </div>

                    <!-- VIDEO -->
                    <div class="form-group">
                        <label for="id_banner_videos" class="col-form-label">Cambiar video</label> <br>
                        <input type="file" id="archivo_banner_videos" name="archivo_banner_videos" accept="video/mp4">
                    </div>


                    <div class="d-flex justify-content-center">
                        <!--<img id="miVideo" src="#" width=300 style="height: 300px !important; object-fit: scale-down;">-->
                        <video id="video" width="300" controls style="object-fit: scale-down;outline: none;padding-bottom:9px;">
                            <source src="" type="video/mp4">
                        </video>
                    </div>

                    <button type="submit" name="submitmodal" class="btn btn-<?php echo $temadelacookie; ?> btn-block" style="margin-top:4px;"><i class="fa fa-edit"></i></i> Editar</button>
            </form>
        </div>
    </div>
</div>
<!--FIN DEL MODAL EDITAR -->