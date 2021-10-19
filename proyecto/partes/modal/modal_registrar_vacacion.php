<!--Modal para REGISTRAR VACACION-->
<div class="modal fade" id="modal-registrar-vacaciones" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <!--modal-lg= dentro de class para agrandar el modal -->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="font-family: 'Kaushan Script', cursive;">Registrar vacacion</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form-modal-registrar-vacaciones" method="POST" autocomplete="off">
                <div class="modal-body">
                    <input type="hidden" class="form-control" id="MRRUT" name="MRRUT" minlength="8" maxlength="11" required>
                    <input type="hidden" class="form-control" id="MRNOMUS" name="MRNOMUS" minlength="2" maxlength="70" required>

                    <!--TIPO-->
                    <div class="form-group">
                        <label for="MRtipo" class="col-form-label">Tipo de la vacación:</label>
                        <select class="form-control" id="MRtipo" name="MRtipo" required>
                            <option value="">Seleccione el Motivo</option>
                            <option value="vacacion">Vacacion</option>
                            <option value="falta">Falta</option>
                            <option value="permiso">Permiso</option>
                        </select>
                    </div>

                    <!--RAZÓN -->
                    <div class="form-group">
                        <label for="MRrazon" class="col-form-label">Razón:</label>
                        <textarea class="form-control" name="MRrazon" id="MRrazon" placeholder="Especifique la razón de la vacacion" rows="3" cols="100" minlength="2" maxlength="1000" onkeypress="return soloCaractDeConversacion(event)" required></textarea>
                    </div>

                    <!-- DIAS TOMADOS -->
                    <div class="form-group">
                        <label for="MRDiasTomados" class="col-form-label">Dias:</label>
                        <input type="number" class="form-control" id="MRDiasTomados" name="MRDiasTomados" min="1" max="30" onkeypress="return diasVacaciones(event)" required>
                        <small class="form-text text-muted float-right">Dias disponibles (max. <span id="MaximoDiasDisponibles">NUMERO_AQUI</span> dias)</small>
                        <!--readonly="readonly" -->
                    </div>

                    <!-- FECHA INICIO -->
                    <div class="form-group">
                        <label for="MRFechaInicio" class="col-form-label">Fecha Inicio:</label>
                        <input type="date" class="form-control" id="MRFechaInicio" name="MRFechaInicio" onkeypress="return fechavacaciones(event)" value="<?php echo $fechadehoy ?>" minlength="10" maxlength="10" required>
                        <!--readonly="readonly" -->
                    </div>

                    <!--OBSERVACIÓN -->
                    <div class="form-group pb-4">
                        <div class="row">
                            <div class="col-lg-9"><label for="MRObservacion" class="col-form-label">Observación:</label></div>
                            <div class="col-lg-3 py-1">N/O <input type="checkbox" id="checkbox_reg_vacacion"></div>
                        </div>
                        <textarea class="form-control" name="MRObservacion" id="MRObservacion" placeholder="Especifique Observación" rows="3" cols="100" minlength="2" maxlength="1000" onkeypress="return soloCaractDeConversacion(event)" required></textarea>
                        <small class="form-text text-muted float-right">N/O : Ninguna Observación</small>
                    </div>

                    <button type="submit" id="botonEnviarRegistro" class="btn btn-success btn-block" style="margin-top:4px;"><i class="fa fa-paper-plane"></i></i></button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--FIN DEL MODAL REGISTRAR VACACION -->