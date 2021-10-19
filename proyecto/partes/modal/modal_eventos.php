<?php
date_default_timezone_set("America/Santiago");
setlocale(LC_TIME, "spanish");
$horainicio = date('H:i');
$horafin = strtotime('+1 minute', strtotime($horainicio)); // se puede sumar o restar: hour,minute,second
$horafin = date('H:i', $horafin);

if (isset($_SESSION["sesionCESFAM"])) {
    $rut = $_SESSION["sesionCESFAM"]["rut"];
    $cargo = $_SESSION["sesionCESFAM"]["cargo"];
    $nombre = $_SESSION["sesionCESFAM"]["nombre_usuario"];
}
?>
<!--Modal para INGRESAR-->
<div class="modal fade" id="modal-ingresar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <!--modal-lg= dentro de class para agrandar el modal -->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" style="font-family: 'Kaushan Script', cursive;"> Registrar evento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form id="form_agregar_evento" method="POST" autocomplete="off">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="txtfechaIngresarI" class="col-form-label">Fecha inicio:</label>
                                <input type="date" class="form-control" name="txtfechaIngresarI" id="txtfechaIngresarI" placeholder="fecha inicio" onkeypress="return fechaEventos(event)" minlength="10" maxlength="10" min='<?php echo $fechaminima; ?>' max='<?php echo $fechamaxima; ?>' required>
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-group">
                                <label for="txthoraIngresar" class="col-form-label">Hora inicio:</label>
                                <input type="time" class="form-control" name="txthoraIngresarI" id="txthoraIngresarI" value="<?php echo $horainicio; ?>" placeholder="hora inicio" onkeypress="return horaEventos(event)" minlength="5" maxlength="5" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="txtfechaIngresarF" class="col-form-label">Fecha fin:</label>
                                <input type="date" class="form-control" name="txtfechaIngresarF" id="txtfechaIngresarF" placeholder="fecha fin" onkeypress="return fechaEventos(event)" minlength="10" maxlength="10" min='<?php echo $fechaminima; ?>' max='<?php echo $fechamaxima; ?>' required>
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-group">
                                <label for="txthoraIngresarF" class="col-form-label">Hora fin:</label>
                                <input type="time" class="form-control" name="txthoraIngresarF" id="txthoraIngresarF" value="<?php echo $horafin; ?>" placeholder="hora fin" onkeypress="return horaEventos(event)" minlength="5" maxlength="5" required>
                            </div>
                        </div>
                    </div>

                    <!-- TITULO -->
                    <div class="form-group">
                        <label for="txttituloIngresar" class="col-form-label">Titulo:</label>
                        <textarea class="form-control" name="txttituloIngresar" id="txttituloIngresar" placeholder="Ingrese un titulo" onkeypress="return soloCaractDeConversacion(event)" rows="3" cols="100" minlength="2" maxlength="200" style="resize: none;" required></textarea>
                    </div>

                    <!--DESCRIPCIÓN -->
                    <div class="form-group">
                        <label for="txtdescripcionIngresar" class="col-form-label">Descripción:</label>
                        <textarea class="form-control" name="txtdescripcion" id="txtdescripcionIngresar" placeholder="Especifique actividad" onkeypress="return soloCaractDeConversacion(event)" rows="3" cols="100" minlength="2" maxlength="1000" style="resize: none;" required></textarea>
                    </div>

                    <!--GRUPO DE USUARIOS -->
                    <div class="row justify-content-center">
                        <div class="col-xl-12">
                            <div class="form-group">
                                <label for="txttituloIngresar" class="col-form-label">Enviar al/los usuario/s:</label>
                                <?php

                                $sqlree = "SELECT rut, nombre_usuario FROM usuario WHERE estado_usuario=1"; //Se envia a todos incluyendo el usuario de la sesion  // WHERE rut!='$rut' 
                                $consultaree = mysqli_query($mysqli, $sqlree);

                                if (!$consultaree) {
                                    echo '<div class="alert alert-danger" role="alert"> No se encuentran datos disponibles</div>';
                                } else {
                                ?>

                                    <select class="form-control js-example-basic-multiple" id="grupo_usuarios" name="grupo_usuarios[]" style="width: 100%;" multiple="multiple" required>
                                        <!-- <option value="">Seleccione el reemplazante...</option> -->
                                        <?php

                                        while ($fila1 = mysqli_fetch_array($consultaree)) {
                                            $RUT = $fila1['rut'];
                                            $NOMBRE = $fila1['nombre_usuario'];
                                            echo '<option value="' . $RUT . '">' . $NOMBRE . '</option>'; //utf8_encode($NOMBRE_CATEGORIA)
                                        }
                                        ?>
                                    </select>
                                <?php } ?>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="txtcolorIngresar" class="col-form-label">Color:</label>
                        <input type="color" class="form-control" name="txtcolorIngresar" id="txtcolorIngresar" onkeypress="return colorEventos(event)" minlength="3" maxlength="8" required>
                    </div>

                    <button type="submit" class="btn btn-<?php echo $temadelacookie; ?> btn-block" id="botonagregar"><i class="fa fa-paper-plane"></i> Agregar</button>
                </form>
            </div>
        </div>
    </div>


    <!--Modal para EDITAR-->
    <div class="modal fade" id="modal-editar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <!--modal-lg= dentro de class para agrandar el modal -->
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" style="font-family: 'Kaushan Script', cursive;"> Editar o eliminar evento</h5>
                    <button type="button" title="cerrar" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="form_eventos" method="POST" autocomplete="off">
                    <div class="modal-body">

                        <input type="hidden" class="form-control" name="txtID" id="txtID" placeholder="ID" required>

                        <!-- TITULO -->
                        <div class="form-group">
                            <label for="txttitulo" class="col-form-label">Titulo:</label>
                            <textarea class="form-control" name="txttitulo" id="txttitulo" placeholder="Ingrese un titulo" onkeypress="return soloCaractDeConversacion(event)" rows="3" cols="100" minlength="2" maxlength="200" style="resize: none;" required></textarea>
                        </div>

                        <div class="row">
                            <!-- FECHA INICIO -->
                            <div class="col">
                                <div class="form-group">
                                    <label for="txtfechainicio" class="col-form-label">Fecha inicio:</label>
                                    <input type="date" class="form-control" name="txtfechainicio" id="txtfechainicio" placeholder="fecha inicio" onkeypress="return fechaEventos(event)" minlength="10" maxlength="10" required>
                                </div>
                            </div>
                            <!-- HORA INICIO -->
                            <div class="col">
                                <div class="form-group">
                                    <label for="txthorainicio" class="col-form-label">Hora inicio:</label>
                                    <input type="time" class="form-control" name="txthorainicio" id="txthorainicio" placeholder="hora inicio" onkeypress="return horaEventos(event)" minlength="5" maxlength="5" required>
                                </div>
                            </div>
                        </div>
                        <!-- FECHA FIN -->
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="txtfechafin" class="col-form-label">Fecha fin:</label>
                                    <input type="date" class="form-control" name="txtfechafin" id="txtfechafin" placeholder="fecha fin" onkeypress="return fechaEventos(event)" minlength="10" maxlength="10" required>
                                </div>
                            </div>
                            <!-- HORA FIN -->
                            <div class="col">
                                <div class="form-group">
                                    <label for="txthorafin" class="col-form-label">Hora fin:</label>
                                    <input type="time" class="form-control" name="txthorafin" id="txthorafin" placeholder="hora fin" onkeypress="return horaEventos(event)" minlength="5" maxlength="5" required>
                                </div>
                            </div>
                        </div>
                        <!-- DESCRIPCIÓN -->
                        <div class="form-group">
                            <label for="txtdescripcion" class="col-form-label">Descripción:</label>
                            <textarea class="form-control" name="txtdescripcion" id="txtdescripcion" placeholder="Especifique actividad" onkeypress="return soloCaractDeConversacion(event)" rows="3" cols="100" minlength="2" maxlength="1000" style="resize: none;" required></textarea>
                        </div>

                        <!-- DESTINATARIOS -->
                        <div class="form-group">
                            <label for="txtdescripcion" class="col-form-label">Destinatarios:</label>
                            <textarea class="form-control" id="txtdestinatarios" placeholder="Especifique actividad" onkeypress="return soloCaractDeConversacion(event)" rows="3" cols="100" minlength="2" maxlength="1000" style="resize: none;" readonly required></textarea>
                        </div>

                        <!-- COLOR -->
                        <div class="form-group">
                            <label for="txtcolor" class="col-form-label">Color:</label>
                            <input type="color" class="form-control" id="txtcolor" onkeypress="return colorEventos(event)" minlength="3" maxlength="8" required>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary btn-block" id="botoneditar"><i class="fa fa-pencil-square-o"></i> Editar</button>
                        <button type="button" class="btn btn-danger btn-block" id="botoneliminar"><i class="fa fa-trash-o"></i> Eliminar</button>
                    </div>
                </form>
            </div>
        </div>
        <!--FIN DEL MODAL EDITAR -->