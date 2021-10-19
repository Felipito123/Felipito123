<!--Modal para INGRESAR-->
<div class="modal fade" id="modal-planilla" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <!--modal-lg= dentro de class para agrandar el modal -->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="font-family: 'Kaushan Script', cursive;">Registrar documento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form-modal-planilla" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="rut_usuario" class="col-form-label">Funcionario:</label>
                        <select class="form-control" id="rut_usuario" name="rut_usuario" required>
                            <option value="">Seleccione Funcionario...</option>
                            <?php
                            $sql = "SELECT rut, nombre_usuario FROM usuario WHERE estado_usuario=1"; //ANTES: WHERE id_rol!=3
                            $consulta = mysqli_query($mysqli, $sql);
                            while ($fila = mysqli_fetch_array($consulta)) {
                                echo '<option value="' . $fila['rut'] . '">' . $fila['rut'] . ' - ' . $fila['nombre_usuario'] . '</option>';
                            }
                            ?>
                        </select>
                    </div>

                    <!-- Archivo: PDF O IMAGEN -->
                    <div class="form-group">
                        <input type="file" id="archivo_modal" name="archivo_modal" accept=".png,.jpg,.jpeg,.pdf" required> <!-- en este caso si o si debe insertar un archivo-->
                    </div>

                    <!-- DESCRIPCIÓN -->
                    <div class="form-group">
                        <label for="descripcion_modal" class="col-form-label">Descripción:</label>
                        <textarea class="form-control" name="descripcion_modal" id="descripcion_modal" placeholder="Especifique que desea entregar" onkeypress="return soloCaractDeConversacion(event)" rows="3" cols="100" minlength="2" maxlength="50" style="resize: none;" required></textarea>
                    </div>

                    <button type="submit" class="btn btn-secondary btn-block" style="margin-top:4px;"><i class="fa fa-paper-plane"></i></i> Registrar</button>
            </form>
        </div>
    </div>
</div>
<!--FIN DEL MODAL INGRESAR -->