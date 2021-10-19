<!--Modal para DETALLE VACACION-->
<div class="modal fade" id="modal-detalle-vacaciones" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <!--modal-lg= dentro de class para agrandar el modal -->
        <div class="modal-content">
            <!-- <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div> -->

            <div class="modal-body" style="padding: 0px;">

                <div class="row justify-content-center pb-4">
                    <div class="btn btn-success col-4 text-center" style="padding: 4px; border-radius: 0px 0px 20px 20px;" data-dismiss="modal" aria-label="Close">
                        <i class="fa fa-times-circle" aria-hidden="true"></i>
                        cerrar ventana
                    </div>
                </div>

                <div class="container-fluid">
                    <div class="row pb-3">
                        <div class="table-responsive">
                            <table id="tabla-detalle-vacaciones" class="table table-striped table-condensed">
                                <thead class="text-center">
                                    <tr>
                                        <th>ID</th>
                                        <th>ID USUARIO</th>
                                        <th>NOMBRE</th>
                                        <th>TIPO</th>
                                        <th>FECHA</th>
                                        <th>RAZON</th>
                                        <th>DIAS TOMADOS</th>
                                        <th>OBSERVACION</th>
                                        <th>ACCIÓN</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                </tbody>
                            </table>
                        </div>
                        <!--Fin del table-responsive -->
                    </div>
                    <!--Fin del row -->
                </div>
            </div>
        </div>
    </div>
</div>
<!--FIN DEL MODAL DETALLE VACACION -->