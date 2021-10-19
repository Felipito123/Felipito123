<?php session_start(); ?>
<?php include '../partes/head.php'; ?>
<title>Salud los Álamos - LIBRO R.S.F</title>

<style>
    .btn-danger:hover {
        color: white;
        background-color: #b32835;
    }
</style>


<link rel="stylesheet" href="../js/fileinput/fileinput.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="../js/fileinput/fileinput.js" type="text/javascript"></script>
<script src="../js/fileinput/locales/es.js" type="text/javascript"></script>
<script src="../js/fileinput/theme1.js" type="text/javascript"></script>
<script src="../js/fileinput/theme2.js" type="text/javascript"></script>

<link rel="stylesheet" href="../../assets/datedropper/datedropper.css">
<link rel="stylesheet" href="../../assets/datedropper/color.css">
<script src="../../assets/datedropper/datedropper.js"></script>

</head>

<body style="background-color: #f4f1f1; ">
    <!--f4f1f1 -->
    <?php include '../partes/navbar.php'; ?> </div>


    <div class="container-fluid" style="padding-top:80px;padding-bottom:30px;">
        <header class="text-center">
            <h1 class="font-weight-bold mb-2" style="color: #6a97bd;font-size: 50px;">LIBRO<span style="color:#90bde4;"> R.S.F</span></h1>
            <div class="row justify-content-center">
                <div class="col-xl-8 col-sm-12">
                    <h4 class="mb-1" style="font-size: 15px;color:#6c757d;"> Libro de Reclamos - Sugerencia - Felicitaciones</h4>
                    <p>Somos un equipo de profesionales de la Salud que trabajamos para ti. Agradecemos tu tiempo para enviarnos tus felicitaciones, sugerencias o reclamos, los que nos ayudarán a ofrecerte un mejor servicio.</p>
                </div>
            </div>
        </header>

        <form id="formuRSF" name="formuRSF" method="POST" autocomplete="off">

            <div class="row justify-content-center">

                <div class="col-xl-6 col-sm-12">

                    <div class="row justify-content-center pb-3">
                        <div class="col-xl-11 col-sm-12">
                            <div class="d-flex align-items-center p-3 text-white-50 bg-danger rounded box-shadow">
                                <img class="mr-3" src="form1.png" alt="" width="48" height="48">
                                <div class="lh-100">
                                    <h6 class="mb-0 text-white lh-100">Datos del Solicitante</h6>
                                    <small>Todos los datos marcados con un * son de caracter obligatorios.</small>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row justify-content-center pl-2 pr-2 pb-3">
                        <div class="col-xl-11 col-sm-12">
                            <div class="card shadow-sm p-4">
                                <div class="row pt-2">
                                    <div class="col-xl-12 mb-3">
                                        <label class="pb-2">El solicitante es</label>

                                        <div class="row">
                                            <div class="col-xl-5 col-sm-6 pb-2">
                                                <div class="custom-control custom-radio">
                                                    <input name="tipo_persona" id="tipo_persona1" type="radio" class="custom-control-input" value="persona natural" checked>
                                                    <label class="custom-control-label" for="tipo_persona1">Persona Natural</label>
                                                </div>
                                            </div>
                                            <div class="col-xl-7 col-sm-6 pb-2">
                                                <div class="custom-control custom-radio">
                                                    <input name="tipo_persona" id="tipo_persona2" type="radio" class="custom-control-input" value="paciente del cesfam">
                                                    <label class="custom-control-label" for="tipo_persona2">Paciente del Cesfam</label>
                                                </div>
                                            </div>
                                        </div>

                                        <script>
                                            // $('#tipo_persona2').prop('checked');
                                            // $('#checkbox').is(":checked")
                                            // $('input:radio[name=tipo_persona][value=paciente del cesfam]').attr('checked', true);
                                        </script>

                                    </div>
                                    <div class="col-xl-4 mb-3">
                                        <?php
                                        $sql = "SELECT id_nacionalidad, nombre_nacionalidad FROM nacionalidad";
                                        $consulta = mysqli_query($mysqli, $sql);

                                        if (!$consulta) {
                                            echo '<div class="alert alert-danger" role="alert"> ¡UpS! No se encuentran nacionalidades. Por favor, contacte a soporte. </div>';
                                        } else {
                                        ?>
                                            <label class="pb-2">Nacionalidad</label>
                                            <div class="form-group">
                                                <select class="form-control" id="seleccionNacionalidad" name="seleccionNacionalidad">
                                                    <!-- <option value="Chile" selected>Chile</option> -->
                                                    <?php
                                                    while ($fila1 = mysqli_fetch_array($consulta)) {
                                                        $ID_NACIONALIDAD = $fila1['id_nacionalidad'];
                                                        $NOMBRE_NACIONALIDAD = $fila1['nombre_nacionalidad'];
                                                        $selected = ($ID_NACIONALIDAD == 1) ? 'selected' : ''; //selecciono el pais Chile = 1, por defecto
                                                        echo '<option value="' . $ID_NACIONALIDAD . '" ' . $selected . '>' . $NOMBRE_NACIONALIDAD . '</option>'; //utf8_encode($NOMBRE_CATEGORIA)
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label" for="rut">R.U.T *</label>
                                        <input type="text" class="form-control col-sm-6" id="rut" name="rut" placeholder="(ejemplo 123456789)"  onkeypress="return esRutLogin(event)" onkeyup="this.value = this.value.toUpperCase();" onblur="formatoRut()" required>
                                        <!-- <small class="col-sm-3 form-text text-muted">Sólo numeros y letra K.</small> -->
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label" for="nombre">Nombre *</label>
                                        <input type="text" class="form-control col-sm-6" id="nombre" name="nombre" placeholder="Ingrese su nombre" onkeypress="return sololetras(event)" minlength="2" maxlength="45" onpaste="return false" required>
                                    </div>
                                </div>

                                <div class="mb-3">

                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label" for="apellido_paterno">Apellido Paterno *</label>
                                        <input type="text" class="form-control col-sm-6" name="apellido_paterno" id="apellido_paterno" placeholder="Ingrese su apellido paterno" onkeypress="return sololetras(event)" minlength="2" maxlength="45" required>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label" for="apellido_materno">Apellido Materno</label>
                                        <input type="text" class="form-control col-sm-6" name="apellido_materno" id="apellido_materno" placeholder="Ingrese su apellido materno" onkeypress="return sololetras(event)" minlength="2" maxlength="45">
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label" for="fechanacimiento">Fecha de nacimiento</label>
                                        <input type="text" class="form-control col-sm-6" id="fechanacimiento" name="fechanacimiento" style="cursor:pointer;" placeholder="Ingrese fecha de nacimiento" data-large-mode="true" data-lang="es" data-large-default="true" data-translate-mode="false" data-format="d/m/Y" data-min-year="1950" data-jump="5" data-theme="my-style" onkeypress="return fechaLibroRSF(event)" minlength="10" minlength="10" readonly>
                                        <!--ALGUNAS OTRAS FUNCIONALIDADES:  data-min-year="2017" data-max-year="2050" data-default-date="12/01/2016" -->
                                        <!--data-jump="5" saltos por años de a 5años -->
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Sexo *</label>

                                        <div class="custom-control custom-radio col-sm-3 pt-2">
                                            <input name="sexo" id="sexo1" type="radio" class="custom-control-input" value="hombre" checked>
                                            <label class="custom-control-label" for="sexo1">Hombre</label>
                                        </div>

                                        <div class="custom-control custom-radio col-sm-3 pt-2">
                                            <input name="sexo" id="sexo2" type="radio" class="custom-control-input" value="mujer">
                                            <label class="custom-control-label" for="sexo2">Mujer</label>
                                        </div>
                                    </div>


                                    <?php
                                    $sql = "SELECT id_pueblos_indigenas, nombre_pueblos_indigenas FROM pueblos_indigenas";
                                    $consulta = mysqli_query($mysqli, $sql);
                                    if (!$consulta) {
                                        echo '<div class="alert alert-danger" role="alert"> ¡UpS! No se encuentran pueblos indigenas. Por favor, contacte a soporte. </div>';
                                    } else {
                                    ?>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label" for="pueblosindigenas">Pueblos Indígenas</label>
                                            <select class="col-sm-6 custom-select d-block w-100" id="pueblosindigenas" name="pueblosindigenas">
                                                <?php
                                                while ($fila1 = mysqli_fetch_array($consulta)) {
                                                    $ID_PUEBLOSINDIGENAS = $fila1['id_pueblos_indigenas'];
                                                    $NOMBRE_PUEBLOSINDIGENAS = $fila1['nombre_pueblos_indigenas'];
                                                    $selected = ($ID_PUEBLOSINDIGENAS == 7) ? 'selected' : ''; //selecciono el pueblo Mapuche = 7, por defecto
                                                    echo '<option value="' . $ID_PUEBLOSINDIGENAS . '" ' . $selected . '>' . $NOMBRE_PUEBLOSINDIGENAS . '</option>'; //utf8_encode($NOMBRE_CATEGORIA)
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    <?php } ?>

                                </div>

                                <div class="mb-3">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label" for="telefonoprimario">Teléfono de contacto *</label>
                                        <select class="col-sm-2 custom-select d-block w-100" id="ts1" name="ts1" required>
                                            <option value="fijo" selected>Fijo</option>
                                            <option value="movil">Móvil</option>
                                            <option value="laboral">Laboral</option>
                                        </select>
                                        <input type="text" class="form-control col-sm-4 ml-1" name="telefonoprimario" id="telefonoprimario" placeholder="Ingrese contacto" minlength="9" maxlength="13" onkeypress="return solotelefono(event)" onpaste="return false" required>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label" for="telefonosecundario">Teléfono de secundario </label>
                                        <select class="col-sm-2 custom-select d-block w-100" id="ts2" name="ts2">
                                            <option value="no tiene" selected hidden>Seleccione</option>
                                            <option value="fijo">Fijo</option>
                                            <option value="movil">Móvil</option>
                                            <option value="laboral">Laboral</option>
                                        </select>
                                        <input type="text" class="form-control col-sm-4 ml-1" name="telefonosecundario" id="telefonosecundario" placeholder="Ingrese contacto (opcional)" minlength="9" maxlength="13" onkeypress="return solotelefono(event)" onpaste="return false">
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">¿El afectado es la misma persona solicitante?</label>

                                        <div class="custom-control custom-radio col-sm-3 pt-2">
                                            <input name="confirmasolicitante" id="confirmasolicitante1" type="radio" class="custom-control-input" value="si" checked>
                                            <label class="custom-control-label" for="confirmasolicitante1">Si</label>
                                        </div>

                                        <div class="custom-control custom-radio col-sm-3 pt-2">
                                            <input name="confirmasolicitante" id="confirmasolicitante2" type="radio" class="custom-control-input" value="no">
                                            <label class="custom-control-label" for="confirmasolicitante2">No</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-center pt-1 pb-2">
                        <div class="col-xl-6 col-sm-12">
                            <div class="card shadow">
                                <img src="informativo.jpg" class="img-fluid rounded" alt="imagen" style="height:100px;">
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-center pt-3 pb-2">
                        <div class="col-xl-10 col-sm-12 pt-2">
                            <div class="d-flex align-items-center p-3 text-white-50 bg-danger rounded box-shadow">
                                <img class="mr-3" src="form1.png" alt="" width="48" height="48">
                                <div class="lh-100">
                                    <h6 class="mb-0 text-white lh-100">Medio de envío de respuesta y notificaciones</h6>
                                    <small>Ingrese un correo válido, de lo contrario, no podrá recibir nuestras notificaciones.</small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-center pl-2 pr-2 pb-2">
                        <div class="col-xl-10 col-sm-12">
                            <div class="card shadow-sm pt-3 pl-4 pr-4">
                                <div class="mb-2">
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label" for="correoelectronico">Correo electrónico *</label>
                                        <input type="email" class="form-control col-sm-6" id="correoelectronico" name="correoelectronico" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$" onkeypress="return solocorreo(event)" minlength="11" maxlength="75" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- <div class="row justify-content-center pt-4 pb-3">
                        <div class="col-sm-6">
                            <button type="submit" id="enviar" class="btn btn-danger text-center btn-block p-2">Enviar <i class="fa fa-envelope-open-o" aria-hidden="true"></i></button>
                        </div>
                    </div> -->

                </div>

                <div class="col-xl-6 col-sm-12">

                    <div class="row justify-content-center pb-3">
                        <div class="col-xl-11 col-sm-12">
                            <div class="d-flex align-items-center p-3 text-white-50 bg-danger rounded box-shadow">
                                <img class="mr-3" src="form1.png" alt="" width="48" height="48">
                                <div class="lh-100">
                                    <h6 class="mb-0 text-white lh-100">Ingrese el Tipo, Institución y Motivo que origina su Solicitud</h6>
                                    <small>Todos los datos marcados con un * son de caracter obligatorios.</small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-center pl-2 pr-2">
                        <div class="col-xl-11 col-sm-12">
                            <div class="card shadow-sm p-4">
                                <div class="mb-3">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label" for="tiposolicitud">Tipo solicitud *</label>
                                        <select class="col-sm-6 custom-select d-block w-100" id="tiposolicitud" name="tiposolicitud" required>
                                            <option value="">SELECCIONE</option>
                                            <option value="felicitaciones">FELICITACIONES</option>
                                            <option value="reclamo">RECLAMO</option>
                                            <option value="sugerencia">SUGERENCIA</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <?php
                                    $sql = "SELECT id_institucion, nombre_institucion FROM institucion";
                                    $consulta = mysqli_query($mysqli, $sql);

                                    if (!$consulta) {
                                        echo '<div class="alert alert-danger" role="alert"> ¡UpS! No se encuentran instituciones. Por favor, contacte a soporte. </div>';
                                    } else {
                                    ?>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label" for="tipoinstitucion">Institución *</label>
                                            <select class="col-sm-6 custom-select d-block w-100" id="tipoinstitucion" name="tipoinstitucion" required>
                                                <option value="">SELECCIONE</option>
                                                <?php
                                                while ($fila1 = mysqli_fetch_array($consulta)) {
                                                    $ID_INSTITUCION = $fila1['id_institucion'];
                                                    $NOMBRE_INSTITUCION = $fila1['nombre_institucion'];
                                                    echo '<option value="' . $ID_INSTITUCION . '">' . $NOMBRE_INSTITUCION . '</option>'; //utf8_encode($NOMBRE_CATEGORIA)
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    <?php } ?>
                                </div>

                                <div class="mb-3">
                                    <?php
                                    $sql = "SELECT id_area, nombre_area FROM area";
                                    $consulta = mysqli_query($mysqli, $sql);

                                    if (!$consulta) {
                                        echo '<div class="alert alert-danger" role="alert"> ¡UpS! No se encuentran áreas. Por favor, contacte a soporte. </div>';
                                    } else {
                                    ?>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label" for="area">Área *</label>
                                            <select class="col-sm-6 custom-select d-block w-100" id="area" name="area" required>
                                                <option value="">SELECCIONE</option>
                                                <?php
                                                while ($fila1 = mysqli_fetch_array($consulta)) {
                                                    $ID_AREA = $fila1['id_area'];
                                                    $NOMBRE_AREA = $fila1['nombre_area'];
                                                    echo '<option value="' . $ID_AREA . '">' . $NOMBRE_AREA . '</option>'; //utf8_encode($NOMBRE_CATEGORIA)
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    <?php } ?>
                                </div>

                                <div class="mb-3">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label" for="fechaevento">Fecha del evento que informa *</label>
                                        <input type="text" class="form-control col-sm-6" id="fechaevento" name="fechaevento" style="cursor:pointer" placeholder="Indique fecha" data-large-mode="true" data-lang="es" data-large-default="true" data-translate-mode="false" data-format="d/m/Y" data-theme="my-style" onkeypress="return fechaLibroRSF(event)" minlength="10" minlength="10" readonly required>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label" for="detalle">Detalle </label>
                                        <textarea name="detalle" id="detalle" class="form-control col-sm-6" rows="4" cols="20" onkeyup="return contador1(event)" onkeypress="return soloCaractDeConversacion(event)" minlength="2" maxlength="2000" style="resize:none"></textarea>

                                        <div class="col-sm-4"></div>
                                        <small class="col-sm-8 pb-2">
                                            Máximo <span style="color:brown;">2000</span> caracteres <span class="pr-3"></span>
                                            Escrito <span id="escrito1" style="color:red;">0</span>
                                            Restantes <span id="contadorcaracteres1" style="color:#28a745;">0</span>
                                        </small>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label" for="observaciones">Observaciones </label>
                                        <textarea name="observaciones" id="observaciones" class="form-control col-sm-6" rows="4" cols="20" onkeyup="return contador2(event)" onkeypress="return soloCaractDeConversacion(event)" minlength="2" maxlength="2000" style="resize:none"></textarea>

                                        <div class="col-sm-4"></div>
                                        <small class="col-sm-8 pb-2">
                                            Máximo <span style="color:brown;">2000</span> caracteres <span class="pr-3"></span>
                                            Escrito <span id="escrito2" style="color:red;">0</span>
                                            Restantes <span id="contadorcaracteres2" style="color:#28a745;">0</span>
                                        </small>
                                    </div>
                                </div>

                            </div>

                        </div>

                        <div class="row justify-content-center">
                            <div class="col-xl-12 col-sm-12 pl-5 pr-5">
                                <div class="d-flex align-items-center p-3 my-3 text-white-50 bg-danger rounded box-shadow">
                                    <img class="mr-3" src="form1.png" alt="" width="48" height="48">
                                    <div class="lh-100">
                                        <h6 class="mb-0 text-white lh-100">Adjuntar archivos como comprobantes</h6>
                                        <small>Formatos permitidos: jpg, gif, png, txt, PDF. <br> Tamaño máximo del archivo 5MB, su archivo será subido automáticamente al momento de grabar este formulario.</small>
                                    </div>
                                </div>
                            </div>


                            <div class="col-xl-11 col-sm-12 ">
                                <div class="card shadow-sm p-3">
                                    <div class="mb-3">
                                        <div class="form-group">
                                            <div class="file-loading">
                                                <input id="file-4" type="file" class="file" name="archivosRSF[]" data-min-file-count="1" data-overwrite-initial="false" data-theme="fas" accept=".jpg,.jpeg,.bmp,.png,.pdf,.txt" multiple>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6 pt-4">
                                <button type="submit" id="enviar" class="btn btn-danger text-center btn-block p-2" onsubmit="formatoRut()" onclick="return verificarCamposVacioFormulario()">Enviar <i class="fa fa-envelope-open-o" aria-hidden="true"></i></button>
                            </div>

                        </div>



                    </div>

                </div>

            </div>


        </form>
    </div>

    <!-- <form id="pepe" action="hola.php" method="post" enctype="multipart/form-data">
        <div class="col-xl-11 col-sm-12 ">
            <div class="card shadow-sm p-3">
                <div class="mb-3">
                    <div class="form-group">
                        <div class="file-loading">
                            <input id="file-5" type="file" class="file" name="juan[]" data-overwrite-initial="false" data-theme="fas" accept=".jpg,.jpeg,.bmp,.png,.pdf" multiple>
                        </div>

                        <button type="submit" class="btn btn-danger text-center btn-block p-2">Enviar <i class="fa fa-envelope-open-o" aria-hidden="true"></i></button>
                    </div>
                </div>
            </div>
        </div>

    </form> -->


    <script src="js/contador.js"></script>
    <script src="../js/validaciongeneral.js"></script>
    <script src="../js/funcionswal.js"></script>
    <script src="js/global_rut.js"></script>
    <script src="js/validarut.js"></script>
    <script src="js/librorsf.js"></script>
    <!-- <script src="js/validarut.js"></script> -->

    <!-- CAMBIAR EL ITEM DEL NAVBAR SELECCIONADO -->
    <script>
        $('#fechanacimiento').dateDropper({});
        $('#fechaevento').dateDropper({});
    </script>


    <script>
        /*NOTA: dropZoneEnabled: false  , DESHABILITE EL DROP ZONE PORQUE AL ARRASTRAR LAS IMAGENES NO LO TOMABA EL BUFFER DEL FILE
        este plugins se llama: bootstrap-filinput
        */

        $('#file-es').fileinput({
            theme: 'fas',
            language: 'es',
            uploadUrl: 'http://localhost/tesisactual/proyecto/LibroRSF/',
            allowedFileExtensions: ['jpg', 'png', 'gif']
        });

        // $("#file-4").val('');

        $("#file-4").fileinput({
            theme: 'fas',
            language: 'es',
            uploadUrl: 'javascript:void(0)',
            // minFileSize: 1000,
            maxFileSize: 5000,
            maxTotalFileCount: 3,
            resizeQuality: true,
            allowedFileExtensions: ['jpg', 'jpeg', 'png', 'bmp', 'pdf', 'txt'], //, 'docx'
            // uploadExtraData: { kvId: '10' },
        }).on('filepreupload', function(event, data, previewId, index) {

            console.log(event);
            console.log(data);
            console.log(previewId);
            console.log(index);
            // alert('The description entered is:\n\n' + ($('#description').val() || ' NULL'));
        });
    </script>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <script src="../../assets/popper/popper.min.js"></script>
    <!-- <script src="../../assets/bootstrap/js/bootstrap.min.js"></script> -->

</body>

</html>