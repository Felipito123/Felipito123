<!--Modal para EDITAR PLANILLA-->
<div class="modal fade" id="modal-zoom" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <!--modal-lg= dentro de class para agrandar el modal -->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="font-family: 'Kaushan Script', cursive;">Editar reunión</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form-modal-zoom" method="POST">
                <div class="modal-body">
                    <input type="hidden" class="form-control" id="idmodal" name="idmodal" required>
                    <input type="hidden" class="form-control" id="codigozoommodal" name="codigozoommodal" required>
                    <!--ASUNTO -->
                    <div class="form-group">
                        <label for="asuntomodal" class="col-form-label">Asunto</label>
                        <textarea class="form-control" name="asuntomodal" id="asuntomodal" placeholder="Especifique el asunto" rows="2" cols="100" maxlength="220" style="resize: none;" onkeypress="return soloAsunto(event)" required></textarea>
                    </div>

                    <!-- DURACIÓN -->
                    <div class="form-group">
                        <label for="duracionmodal" class="col-form-label">Duracion(minutos) </label>
                        <input type="text" class="form-control" id="duracionmodal" name="duracionmodal" minlength="1" maxlength="3" onkeypress="return solonumeros(event)" required>
                        <!--readonly="readonly" -->
                    </div>

                    <!-- FECHA -->
                    <div class="form-group">
                        <label for="fechamodal" class="col-form-label">Fecha </label>
                        <input type="date" class="form-control" id="fechamodal" name="fechamodal" min='<?php echo $fechadehoy; ?>' max='<?php echo $fechamaxima; ?>' onkeypress="return fechazoom(event)" required>
                        <!--readonly="readonly" -->
                    </div>

                    <!-- HORA -->
                    <div class="form-group">
                        <label for="horamodal" class="col-form-label">Hora </label>
                        <input type="time" class="form-control" id="horamodal" name="horamodal" onkeypress="return horazoom(event)" required>
                        <!--readonly="readonly" -->
                    </div>

                    <!-- CONTRA -->
                    <div class="form-group">
                        <label for="contramodal" class="col-form-label">Contraseña</label>
                        <input type="text" class="form-control" id="contramodal" name="contramodal" minlength="1" maxlength="10" required>
                        <!--readonly="readonly" -->
                    </div>
                    <button type="submit" class="btn btn-<?php echo $temadelacookie; ?> btn-block" style="margin-top:4px;"><i class="fa fa-paper-plane"></i></i> Enviar cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--FIN DEL MODAL EDITAR PLANILLA -->