<!--Modal CALIDAD ADMIN -->
<div class="modal fade" id="modalcalidadADMIN" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <!--modal-lg= dentro de class para agrandar el modal -->
        <div class="modal-content">
            <!--<div class="modal-header">
                <h5 class="modal-title text-center" id="exampleModalLabel">Visualización de documento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>-->

            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row justify-content-center pb-3" id="error">
                        <span class="badge badge-danger" style="padding: 10px;"><i class="fa fa-exclamation-circle"></i> Archivo no encontrado</span>
                    </div>
                    <div class="row justify-content-center">
                        <iframe id="framecalidadadmin" src="" frameborder="0" scrolling="no" width="100%" height="500px"></iframe>
                    </div>
                </div>
            </div>

            <div class="modal-footer" style="background-color: #e4e9ee;">
                <button type="button" class="btn btn-secondary btn-block" data-dismiss="modal"><i class="fa fa-close"></i></i> Cerrar</button>
            </div>
        </div>
    </div>
    <!--FIN DEL MODAL CALIDAD ADMIN -->