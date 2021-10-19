<!--Modal para REGISTRAR VACACION-->
<div class="modal fade" id="modal-registrar-anexo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <!--modal-lg= dentro de class para agrandar el modal -->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="font-family: 'Kaushan Script', cursive;">Registrar anexo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form-modal-registrar-anexo" method="POST">
                <div class="modal-body">
                    <input type="hidden" class="form-control" id="id_articulo_anexo" name="id_articulo_anexo" onkeypress="return solonumeros(event)" required>

                    <!--CATEGORIA-->

                    <?php
                    $sql = "SELECT id_categoria_odonto,nombre_categoria_odonto FROM categoria_odonto ORDER BY nombre_categoria_odonto ASC";
                    $consulta = mysqli_query($mysqli, $sql);
                    if (!$consulta) {
                        echo 'Error';
                        $contarsihaycategoria = 0;
                    } else {
                        $contarsihaycategoria = mysqli_num_rows($consulta);
                    ?>

                        <div class="form-group">
                            <label for="categoria_anexo" class="col-form-label">Categoria</label>
                            <select class="form-control" id="categoria_anexo" name="categoria_anexo" required>
                                <option value="">Seleccione una categoria...</option>
                                <?php
                                while ($fila = mysqli_fetch_array($consulta)) {
                                    $ID_CATEGORIA_ODONTO = $fila['id_categoria_odonto'];
                                    $NOMBRE_CATEGORIA_ODONTO = $fila['nombre_categoria_odonto'];
                                    echo '<option value="' . $ID_CATEGORIA_ODONTO . '">' . $NOMBRE_CATEGORIA_ODONTO . '</option>'; //utf8_encode($NOMBRE_CATEGORIA)
                                }
                                ?>
                            </select>
                        </div>
                    <?php } ?>

                    <?php if ($contarsihaycategoria == 0) echo '<div class="alert alert-danger" role="alert">No tiene categorias ingresadas</div>'; ?>

                    <!-- TITULO -->
                    <div class="form-group">
                        <label for="titulo_anexo" class="col-form-label">Titulo</label>
                        <textarea class="form-control" name="titulo_anexo" id="titulo_anexo" placeholder="Especifique una titulo" rows="2" cols="100" minlength="2" maxlength="130" onkeypress="return sololetrasynumeros(event)" style="resize: none;" required></textarea>
                        <!--readonly="readonly" -->
                    </div>

                    <!-- IMAGEN -->
                    <div style="margin-top:20px;">
                        <div class="form-group">
                            <label for="imagen_anexo" class="col-form-label">Archivo</label>
                            <input type="file" id="imagen_anexo" name="imagen_anexo" accept=".png,.jpg,.jpeg,.pdf" required>
                        </div>
                    </div>

                    <!--DESCRIPCIÓN -->
                    <div class="form-group">
                        <label for="descripcion_anexo" class="col-form-label">Descripción</label>
                        <textarea class="form-control" name="descripcion_anexo" id="descripcion_anexo" placeholder="Especifique una descripción" rows="5" cols="100" minlength="2" maxlength="10000" onkeypress="return sololetrasynumeros(event)" style="resize: none;" required></textarea>
                    </div>

                    <button type="submit" class="btn btn-<?php echo $temadelacookie; ?> btn-block" style="margin-top:4px;"><i class="fa fa-paper-plane"></i></i> Enviar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--FIN DEL MODAL REGISTRAR VACACION -->