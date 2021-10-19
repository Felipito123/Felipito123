<!--Modal para EDITAR-->
<div class="modal fade" id="modal-ver-mensajes" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <!--modal-lg= dentro de class para agrandar el modal -->
        <div class="modal-content">

            <!-- <div class="modal-header">
                <h5 class="modal-title" style="font-family: 'Kaushan Script', cursive;"> Ver detalle </h5>
            </div> -->

            <div class="modal-body">
                <!-- NOMBRE -->
                <!--readonly="readonly" -->

                <h5 class="modal-title text-center" style="font-family: 'Kaushan Script', cursive;"> Detalle de la descripción </h5>

                <div class="form-group">
                    <label for="nombre_modal_ver_mensajes" class="col-form-label">Nombre:</label>
                    <input type="text" class="form-control" id="nombre_modal_ver_mensajes" name="nombre_modal_ver_mensajes" disabled>
                </div>

                <!-- CORREO -->
                <!-- <div class="form-group">
                    <label for="correo_modal_ver_mensajes" class="col-form-label">Correo:</label>
                    <input type="text" class="form-control" id="correo_modal_ver_mensajes" name="correo_modal_ver_mensajes" disabled>
                </div> -->

                <!-- TELEFONO -->
                <!-- <div class="form-group">
                    <label for="telefono_modal_ver_mensajes" class="col-form-label">Teléfono:</label>
                    <input type="text" class="form-control" id="telefono_modal_ver_mensajes" name="telefono_modal_ver_mensajes" disabled>
                </div> -->


                <!-- ASUNTO -->
                <div class="form-group">
                    <label for="asunto_modal_ver_mensajes" class="col-form-label">Asunto:</label>
                    <textarea class="form-control" id="asunto_modal_ver_mensajes" placeholder="muest" rows="2" cols="10" style="resize: none;" disabled></textarea>
                </div>

                <!-- DESCRIPCIÓN -->
                <div class="form-group">
                    <label for="descripcion_modal_ver_mensajes" class="col-form-label">Descripción:</label>
                    <textarea class="form-control" id="descripcion_modal_ver_mensajes" placeholder="muest" rows="5" cols="10" style="resize: none;" disabled></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-<?php echo $temadelacookie; ?> btn-block" data-dismiss="modal"><i class="fa fa-close"></i></i> Cerrar</button>
                    <!--btn btn-dark-->
                </div>

            </div>
        </div>
    </div>
    <!--FIN DEL MODAL EDITAR -->