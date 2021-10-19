<!--Modal para EDITAR PLANILLA-->
<!-- <div class="modal fade" id="modal-ver" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Información del evento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="form-group">
                    <label for="txttitulo_ver" class="col-form-label">Titulo:</label>
                    <input type="text" class="form-control" id="txttitulo_ver" placeholder="titulo" disabled>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="txtfechainicio_ver" class="col-form-label">Fecha inicio:</label>
                            <input type="text" class="form-control" id="txtfechainicio_ver" placeholder="fecha" disabled>
                        </div>
                    </div>

                    <div class="col">
                        <div class="form-group">
                            <label for="txthorainicio_ver" class="col-form-label">Hora inicio:</label>
                            <input type="time" class="form-control" id="txthorainicio_ver" placeholder="hora" disabled>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="txtfechafin_ver" class="col-form-label">Fecha fin:</label>
                            <input type="text" class="form-control" id="txtfechafin_ver" placeholder="fecha" disabled>
                        </div>
                    </div>

                    <div class="col">
                        <div class="form-group">
                            <label for="txthorafin_ver" class="col-form-label">Hora fin:</label>
                            <input type="time" class="form-control" id="txthorafin_ver" placeholder="hora" disabled>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="txtdescripcion_ver" class="col-form-label">Descripción:</label>
                    <textarea class="form-control" id="txtdescripcion_ver" placeholder="Ver descripcion" rows="3" cols="100" maxlength="1000" disabled></textarea>
                </div>
            </div>
        </div>
    </div> -->
<!--FIN DEL MODAL EDITAR PLANILLA -->

<!-- 
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.10.1/js/mdb.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.10.1/css/mdb.min.css" rel="stylesheet"> -->

<!--Modal: Login with Avatar Form-->
<div class="modal fade" id="modalverevento" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog cascading-modal modal-avatar modal-sm" role="document">
        <!--Content-->
        <div class="modal-content">
            <!-- style="background-image: url('https://mdbootstrap.com/img/Photos/Others/pricing-table%20(7).jpg');" -->
            <!--Header-->
            <div class="modal-header">
                <img src="../uscalendario/calendario.jpg" alt="avatar" class="rounded-circle img-responsive">
            </div>
            <!--Body-->
            <div class="modal-body text-center mb-1">

                <h4 class="mt-1 mb-2">Información del evento</h4>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="md-form mb-5">
                            <input type="text" id="tituloevento" class="form-control validate" minlength="4" maxlength="5" autocomplete="false" disabled> <!--form-control validate valid -->
                            <label class="active" for="tituloevento" style="color:#4285f4"><i class="fas fa-user" style="color: #4285f4"></i> Titulo</label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <div class="md-form mb-5">
                            <input type="text" id="fechainicio" class="form-control validate" minlength="4" maxlength="5" autocomplete="false" disabled>
                            <label class="active" for="fechainicio" style="color:#4285f4"><i class="fas fa-calendar-day" style="color: #4285f4"></i> Fecha inicio</label>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="md-form mb-5">
                            <input type="text" id="horainicio" class="form-control validate" minlength="4" maxlength="5" autocomplete="false" disabled>
                            <label class="active" for="horainicio" style="color:#4285f4"><i class="fas fa-clock" style="color: #4285f4"></i> Hora inicio</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="md-form mb-5">
                            <input type="text" id="fechafin" class="form-control validate" minlength="4" maxlength="5" autocomplete="false" disabled>
                            <label class="active" for="fechafin" style="color:#4285f4"><i class="fas fa-calendar-day" style="color: #4285f4"></i> Fecha fin</label>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="md-form mb-5">
                            <input type="text" id="horafin" class="form-control validate" minlength="4" maxlength="5" autocomplete="false" disabled>
                            <label class="active" for="horafin" style="color:#4285f4"><i class="fas fa-clock" style="color: #4285f4"></i> Hora fin</label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="md-form">
                            <textarea type="text" id="descripcion" class="md-textarea form-control" rows="4" cols="8" style="resize: none;" disabled></textarea>
                            <label class="active" style="color: #4285f4" for="descripcion">Descripción</label>
                        </div>
                    </div>
                </div>

                <div class="text-center mt-4">
                    <button data-dismiss="modal" class="btn btn-primary mt-1">Cerrar <i class="fas fa-sign-in ml-1"></i></button>
                </div>
            </div>
        </div>
        <!--/.Content-->
    </div>
</div>
<!--Modal: Login with Avatar Form-->