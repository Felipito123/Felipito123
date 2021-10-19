<!--Modal-->
<div class="modal fade" id="MEMODALEDITAR" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <!--modal-lg= dentro de class para agrandar el modal -->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formmodaleditar">
                <div class="modal-body">
                    <input type="hidden" id="ver_articulo_id" name="ver_articulo_id">

                    <div class="container">
                        <img id="myImg" src="#" width=300 style="height: 200px !important; object-fit: scale-down;">
                    </div>

                    <!-- IMAGEN -->
                    <div style="margin-top:20px;">
                        <div class="form-group">
                            <label for="ver_articulo_imagen" class="">Imagen:</label>
                            <input type="file" class="estilo-archivo" id="ver_articulo_imagen" name="ver_articulo_imagen">
                        </div>
                    </div>


                    <!-- AUTOR -->
                    <div class="form-group">
                        <label for="" class="col-form-label">Última modificacion:</label>
                        <input type="text" class="form-control" id="ver_articulo_autor" name="ver_articulo_autor" disabled required>
                    </div>

                    <!-- TITULO -->
                    <div class="form-group">
                        <label for="" class="col-form-label">Título:</label>
                        <input type="text" class="form-control" id="ver_articulo_titulo" name="ver_articulo_titulo" minlength="2" maxlength="130" onkeypress="return sololetrasynumeros(event)" required>
                    </div>

                    <!-- CATEGORIA -->
                    <div class="form-group">
                        <label for="" class="col-form-label">Categoría:</label>
                        <select id="ver_articulo_categoria" name="ver_articulo_categoria" class="form-control" required>
                        </select>
                    </div>

                    <!-- FECHA -->
                    <div class="form-group">
                        <label for="" class="col-form-label">Fecha:</label>
                        <input type="text" class="form-control" id="ver_articulo_fecha" name="ver_articulo_fecha" maxlength="23" onkeypress="return fecha(event)" required>
                    </div>



                    <!-- DESCRIPCIÓN -->
                    <div class="form-group">
                        <label for="" class="col-form-label">Descripción:</label>
                        <textarea class="form-control" name="ver_articulo_descripcion" id="ver_articulo_descripcion" placeholder="Describa las condiciones de su producto; detalle lo más entendible posible qué busca; muestre las especificaciones de su producto; entre otros" rows="10" cols="350" maxlength="11000" style="width: 360px; max-width: 770px;" required></textarea>
                    </div>


                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="task-delete btn btn-danger" data-dismiss="modal"><i class="fa fa-window-close"></i> Cancelar</button>-->
                    <!--<i class="fa fa-times"></i> -->
                    <!--btn btn-light -->
                    <!--style="width:225px"-->
                    <button type="submit" id="btnGuardar" class="btn btn-<?php echo $temadelacookie; ?> btn-block"><i class="fa fa-edit"></i> Editar</button>
                    <!--<i class="fa fa-check"></i> -->
                    <!--btn btn-dark-->
                </div>
            </form>
        </div>
    </div>
</div>
<!--FIN DEL MODAL EDITAR -->