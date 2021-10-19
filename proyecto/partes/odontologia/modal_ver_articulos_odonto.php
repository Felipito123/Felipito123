<!--Modal-->
<div class="modal fade" id="MEMODALEDITARODONTO" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <!--modal-lg= dentro de class para agrandar el modal -->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="font-family: 'Kaushan Script', cursive;">Editar articulo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formmodaleditar_odonto">
                <div class="modal-body">

                    <div class="container">
                        <img id="myImg" src="#" width=300 style="height: 150px !important; object-fit: scale-down;">
                    </div>

                    <input type="hidden" id="ver_articulo_id_odonto" name="ver_articulo_id_odonto">

                    <!-- IMAGEN -->
                    <div style="margin-top:20px;">
                        <div class="form-group">
                            <label for="ver_articulo_imagen_odonto" class="">Cambiar imagen:</label>
                            <input type="file" id="ver_articulo_imagen_odonto" name="ver_articulo_imagen_odonto" accept=".png,.jpg,.jpeg">
                        </div>
                    </div>

                    <!-- TITULO -->
                    <div class="form-group">
                        <label for="ver_articulo_titulo_odonto" class="col-form-label">Título:</label>
                        <input type="text" class="form-control" id="ver_articulo_titulo_odonto" name="ver_articulo_titulo_odonto" minlength="2" maxlength="130" onkeypress="return sololetrasynumeros(event)" required>
                    </div>

                    <!-- ESTADO -->
                    <div class="form-group">
                        <label for="ver_articulo_estado_odonto" class="col-form-label">Estado:</label>
                        <select class="form-control" id="ver_articulo_estado_odonto" name="ver_articulo_estado_odonto" required>
                            <option value="">Seleccione una opcion:</option>
                            <option value="visible">Visible</option>
                            <option value="oculto">Oculto</option>
                        </select>
                    </div>

                    <div>
                        <input type="checkbox" id="botoncheckboxodonto"> Cita textual
                    </div>
                    <div class="row" id="rowfraseycita">
                        <div class="col-lg-6">
                            <!-- FRASE -->
                            <div class="form-group">
                                <label for="frase_articulo" class="col-form-label">Frase:</label>
                                <textarea class="form-control" name="frase_articulo" id="frase_articulo" placeholder="Frase del articulo" rows="2" cols="350" minlength="2" maxlength="130" onkeypress="return sololetrasynumeros(event)" style="resize: none;" required></textarea>
                                <!-- <input type="text" class="form-control" id="frase_articulo" name="frase_articulo" maxlength="130" required> -->
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <!-- CITA -->
                            <div class="form-group">
                                <label for="cita_articulo" class="col-form-label">Cita:</label>
                                <textarea class="form-control" name="cita_articulo" id="cita_articulo" placeholder="Cita del articulo" rows="2" cols="350" minlength="2" maxlength="130" onkeypress="return sololetrasynumeros(event)" style="resize: none;" required></textarea>
                                <!-- <input type="text" class="form-control" id="cita_articulo" name="cita_articulo" maxlength="130" required> -->
                            </div>
                        </div>
                    </div>

                    <!-- DESCRIPCIÓN -->
                    <div class="form-group">
                        <label for="ver_articulo_descripcion_odonto" class="col-form-label">Descripción:</label>
                        <textarea class="form-control" name="ver_articulo_descripcion_odonto" id="ver_articulo_descripcion_odonto" placeholder="Describa las condiciones de su producto; detalle lo más entendible posible qué busca; muestre las especificaciones de su producto; entre otros" rows="10" cols="350" maxlength="2" maxlength="10000" onkeypress="return soloCaractDeConversacion(event)" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="btnGuardar" class="btn btn-<?php echo $temadelacookie; ?> btn-block"><i class="fa fa-edit"></i> Editar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--FIN DEL MODAL EDITAR -->