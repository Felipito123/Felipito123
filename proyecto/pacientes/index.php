<?php session_start();
$usuario;
if (isset($_SESSION['sesionCESFAM']) && ($_SESSION['sesionCESFAM']['id_rol'] == 3 ||  $_SESSION['sesionCESFAM']['id_rol'] == 6)) { //VALIDA QUE SÓLO PUEDE VER ESTA PANTALLA EL SUPERADMIN Y EL ENC. DE FARMACIA
    $usuario = $_SESSION['sesionCESFAM'];
} else { //SINO LO REDIRIGE AL INDEX
    header("Location:../indice/");
}
date_default_timezone_set("America/Santiago");
setlocale(LC_TIME, "spanish");
$fechadehoy = strftime("%Y-%m-%d"); //("%Y-%m-%d") Ej:2021-12-23
$anoactual = strftime("%Y");
$mesactual = strftime("%m");
$diaactual = strftime("%d");
?>
<?php
include '../conexion/conexion.php';
include '../dashboard/head.php'; ?>


<style>
    .dt-buttons {
        float: left;
    }

    .dataTables_length {
        float: left;
        padding-top: 5px;
        margin-left: 10px;
    }

    .dataTables_info {
        float: left;
        margin-left: 10px;
    }

    /* ESTOS ULTIMOS 3 ESTILOS ES PARA COLOCAR LOS ... A LAS TABLAS CON HARTO TEXTO Y PREVENIR EL LARGO ESPACIADO*/
    .table.dataTable td:nth-child(1) {
        /*AL LINK LE AGREGA LA ELLIPSIS(...) MÁS ABAJO*/
        max-width: 250px;
    }

    .table.dataTable td {
        white-space: nowrap;
        text-overflow: ellipsis;
        overflow: hidden;
    }


    #labelparaswal {
        color: #545454;
        font-size: 14px;
        font-weight: 400;
        line-height: normal;
        float: left;
        word-wrap: break-word;
    }
</style>
<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/i18n/defaults-*.min.js"></script> -->
<title>Salud los Álamos - Pacientes</title>
</head>

<body id="page-top">


    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php include '../dashboard/sidebar.php'; ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <?php include '../dashboard/topbar.php'; ?>


                <div class="container-fluid" style="text-align: center; padding-bottom: 25px;">

                    <nav>
                        <div class="nav nav-tabs justify-content-center pb-3" id="nav-tab" role="tablist" style="border-bottom: 1px solid transparent;">
                            <a class="nav-item nav-link active" id="pacientes" data-toggle="tab" href="#pacientesregistrados" role="tab" aria-controls="pacientesregistrados" aria-selected="true">Pacientes</a>
                            <a class="nav-item nav-link" id="patologias" data-toggle="tab" href="#patologiasregistradas" role="tab" aria-controls="patologiasregistradas" aria-selected="false">Patologías</a>
                            <!-- <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Contacto</a> -->
                        </div>
                    </nav>

                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="pacientesregistrados" role="tabpanel" aria-labelledby="pacientes">

                            <div class="container-fluid">

                                <!-- <div class="row col-11 justify-content-end">
                                    <label class="btn btn-info btn-sm shadow-sm" id="botonagregarpaciente" style="border-radius: 15px 15px 15px 0px;height:35px; width:120px;"><i class="fas fa-plus-circle fa-sm text-white-100 pr-2" style="font-size: 25px;"></i><i class="fas fa-hospital-user fa-sm text-white-50" style="font-size: 15px;"></i>
                                    </label>
                                </div> -->

                                <div class="row justify-content-center">
                                    <div class="col-lg-4 col-md-6 mb-lg-0">
                                        <!-- Card-->
                                        <div class="card rounded shadow-sm border-0">
                                            <div class="card-body p-0">
                                                <div class="bg-info px-5 py-3 text-center card-img-top"><span class="mb-2 d-block mx-auto"><i class="fas fa-hospital-user" style="font-size: 55px;color:white;"></i></span>
                                                    <h5 class="text-white mb-0">Listado de pacientes</h5>
                                                    <p class="small text-white mb-0">¡Hola estimado(a)!</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row justify-content-end text-center pt-5">
                                    <div class="col-xl-4 col-sm-12"></div>
                                    <div class="col-xl-4 col-sm-12">
                                        <label>Generar informe (G.I): </label>
                                        <span class="badge badge-success" style="padding: 5px;"><i class="fa fa-file-excel-o"></i> G.I en Excel</span>
                                        <span class="badge badge-danger" style="padding: 5px;"><i class="fa fa-file-pdf-o"></i> G.I en PDF</span>
                                        <span class="badge badge-info" style="padding: 5px;"><i class="fa fa-print"></i> Imprimir</span>
                                    </div>
                                    <div class="col-xl-4 col-sm-12">
                                        <label>Acciones: </label>
                                        <span class="badge badge-<?php echo $temadelacookie; ?>" style="padding: 5px;"><i class="fa fa-plus-circle pr-1"></i><i class="fas fa-hospital-user"></i> Agregar paciente</span>
                                        <span class="badge badge-info" style="padding: 5px;"><i class="fa fa-edit"></i> Editar paciente</span>
                                        <span class="badge badge-danger" style="padding: 5px;"><i class="fa fa-trash"></i> Eliminar paciente</span>
                                    </div>
                                </div>

                            </div>

                            <div class="row justify-content-center pt-4">

                                <div class="col-lg-4 pb-3">

                                    <!--OJO: El  onkeypress sólo funciona para dispotivos de escritorio como PC, 
                                    pero el pattern sirve para validar en dispositivos moviles,
                                    tales como: tablets, smartphones, etc.-->

                                    <div class="card border-bottom-<?php echo $temadelacookie; ?>">
                                        <div style="padding: 4%;">
                                            <h5 style="font-size: 18px;">REGISTRAR PACIENTE</h5>
                                            <hr class="col-xl-2">
                                            <form id="formRegistrarPaciente" method="POST" autocomplete="off" >
                                                <div class="row justify-content-center pt-3">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label id="labelparaswal">Nombres</label>
                                                            <div class="input-group mb-3">
                                                                <span class="input-group-text"><i class="fa fa-user" aria-hidden="true" style="width: 13px;"></i></span>
                                                                <input type="text" class="form-control" id="nombrespaciente" placeholder="Ingrese Nombres" minlength="2" maxlength="100" pattern="[A-Za-zÁÉÍÓÚáéíóúñ\s]+" onkeypress="return sololetras(event)" onpaste="return true" autocomplete="off" required>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label id="labelparaswal">Apellidos</label>
                                                            <div class="input-group mb-3">
                                                                <span class="input-group-text"><i class="fa fa-user" aria-hidden="true" style="width: 13px;"></i></span>
                                                                <input type="text" class="form-control" id="apellidospaciente" placeholder="Ingrese Apellidos" minlength="2" maxlength="100" pattern="[A-Za-zÁÉÍÓÚáéíóúñ'\s]+" onkeypress="return sololetrasycomillasimple(event)" onpaste="return true" autocomplete="off" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row justify-content-center">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label id="labelparaswal">Dirección</label>
                                                            <div class="input-group mb-3">
                                                                <span class="input-group-text"><i class="fas fa-compass" aria-hidden="true" style="width: 13px;"></i></span>
                                                                <!--el caracter \s = espacio -->
                                                                <input type="text" class="form-control" id="direccionpaciente" placeholder="Ingrese Dirección" minlength="2" maxlength="100" pattern="[A-Za-zÁÉÍÓÚáéíóúñÑ0-9-°#,\s]+" onkeypress="return solodireccion(event)" onpaste="return true" autocomplete="off" required>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!--el oninput cumple la funcion de el la longitud maxima que puede tomar el campo de teléfono -->
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label id="labelparaswal">Teléfono (+56)</label>
                                                            <div class="input-group mb-3">
                                                                <span class="input-group-text"><i class="fa fa-phone" aria-hidden="true" style="width: 13px;"></i></span>
                                                                <input type="number" class="form-control" id="telefonopaciente" placeholder="Ingrese Teléfono" min="922222222" oninput="if(this.value.length>=9) { this.value = this.value.slice(0,9);}" pattern="[0-9]+" onkeypress="return solonumeros(event)" onpaste="return true" autocomplete="off" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row justify-content-center">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label id="labelparaswal">Correo</label>
                                                            <div class="input-group mb-3">
                                                                <span class="input-group-text"><i class="fa fa-envelope" aria-hidden="true" style="width: 13px;"></i></span>
                                                                <input type="email" class="form-control" id="correopaciente" placeholder="Ingrese Correo" minlength="11" maxlength="70" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" onkeypress="return solocorreo(event)" onpaste="return false" autocomplete="off" required>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label id="labelparaswal">R.U.T</label>
                                                            <div class="input-group mb-3">
                                                                <span class="input-group-text"><i class="fa fa-address-card" aria-hidden="true" style="width: 13px;"></i></span>
                                                                <!--Donde uso el setCustomValidity en la funcion comprobarRUT, cuando envio el formulario y está el campo inválido, la alerta se queda pegada cuando el usuario escribe. Entonces, la quito con onkeyup="this.setCustomValidity('');" -->
                                                                <input type="text" class="form-control" id="rutpaciente" placeholder="Ingrese Rut" pattern="[Kk0-9]+" onchange="comprobarRUT(this)" onkeyup="this.setCustomValidity('');" onkeypress="return solorut(event)" minlength="8" maxlength="9" onpaste="return true" autocomplete="off" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row justify-content-center">
                                                    <div class="col-xl-6">

                                                        <?php
                                                        /*calcular el año actual para obtener el max del input type date:*/
                                                        $ano_fecha_minima = $anoactual - 120; //el año minimo son 120 años a la fecha actual
                                                        $ano_fecha_maxima = $anoactual - 65;  //el año máximo son 65 años a la fecha actual
                                                        // $fechaminima = $ano_fecha_minima . "-01" . "-01";
                                                        $fechaminima =  $ano_fecha_minima . "-01" . "-01";
                                                        $fechamaxima = $ano_fecha_maxima . "-12" . "-31";
                                                        ?>

                                                        <div class="form-group">
                                                            <label id="labelparaswal">Fecha de nacimiento</label>
                                                            <div class="input-group mb-3">
                                                                <span class="input-group-text"><i class="fas fa-birthday-cake" aria-hidden="true" style="width: 13px;"></i></span>
                                                                <input type="date" class="form-control" id="edadpaciente" placeholder="Ingrese fecha de nacimiento" onkeypress="return fechausuarios(event)" minlength="10" maxlength="10" min='<?php echo $fechaminima; ?>' max='<?php echo $fechamaxima; ?>' onpaste="return false" required>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-xl-6">
                                                        <div class="form-group">
                                                            <label id="labelparaswal">Sexo</label>
                                                            <div class="input-group mb-3">
                                                                <select class="custom-select d-block w-100" id="sexopaciente" name="sexopaciente" required>
                                                                    <option value="">Seleccione</option>
                                                                    <option value="Hombre">Hombre</option>
                                                                    <option value="Mujer">Mujer</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="row justify-content-center">
                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <label id="labelparaswal" class="col-form-label">Tipo de Patología:</label>
                                                            <select class="form-control" id="tipodepatologia" required>
                                                                <option value="">Seleccione un tipo de patologia</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row justify-content-center">
                                                    <div class="col-6">
                                                        <button type="submit" name="submitmodal" class="btn btn-<?php echo $temadelacookie; ?> btn-block" style="margin-top:4px;" ><i class="fas fa-plus-circle fa-sm text-white-100 pr-2"></i><i class="fas fa-hospital-user fa-sm text-white-50"></i> Agregar</button> <!--onclick="comprobarRUT()" -->
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="card">

                                        <!-- <div class="row justify-content-center">
                                            <button class="btn btn-outline-info col-2 text-center" id="botonagregarpaciente" style="border-radius: 0px 0px 15px 15px;height:35px"><i class="fas fa-plus-circle" style="font-size:20px"></i> </button>
                                        </div> -->

                                        <!-- Card Body -->
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table id="tabla-pacientes" class="table table-striped table-condensed">
                                                    <thead class="text-center">
                                                        <tr class="bg-<?php echo $temadelacookie; ?> text-white">
                                                            <th>PATOLOGIA</th>
                                                            <th>RUT</th>
                                                            <th>NOMBRES</th>
                                                            <th>APELLIDOS</th>
                                                            <th>DIRECCIÓN</th>
                                                            <th>TELÉFONO</th>
                                                            <th>CORREO</th>
                                                            <th>EDAD</th>
                                                            <th>SEXO</th>
                                                            <th>ACCION</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="text-center">
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--FIN DEL ROW -->


                        </div>
                        <!--fin del tab-content -->


                        <div class="tab-pane fade" id="patologiasregistradas" role="tabpanel" aria-labelledby="patologias">
                            <div class="container-fluid">

                                <!-- <div class="row col-10 justify-content-end">
                                    <label class="btn btn-info btn-sm shadow-sm" id="botonagregarpatologia" style="border-radius: 15px 15px 15px 0px;height:35px; width:120px;"><i class="fas fa-plus-circle fa-sm text-white-100 pr-2" style="font-size: 25px;"></i><i class="fas fa-user-injured fa-sm text-white-50" style="font-size: 15px;"></i>
                                    </label>
                                </div> -->

                                <div class="row justify-content-center">
                                    <div class="col-lg-4 col-md-6 mb-lg-0">
                                        <!-- Card-->
                                        <div class="card rounded shadow-sm border-0">
                                            <div class="card-body p-0">
                                                <div class="bg-info px-5 py-3 text-center card-img-top"><span class="mb-2 d-block mx-auto"><i class="fas fa-user-injured" style="font-size: 55px;color:white;"></i></span>
                                                    <h5 class="text-white mb-0">Listado de patologías</h5>
                                                    <p class="small text-white mb-0">¡Hola estimado(a)!</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row justify-content-end text-center pt-5">
                                    <div class="col-xl-4">
                                        <label>Generar informe (G.I): </label>
                                        <span class="badge badge-success" style="padding: 5px;"><i class="fa fa-file-excel-o"></i> G.I en Excel</span>
                                        <span class="badge badge-danger" style="padding: 5px;"><i class="fa fa-file-pdf-o"></i> G.I en PDF</span>
                                        <span class="badge badge-info" style="padding: 5px;"><i class="fa fa-print"></i> Imprimir</span>
                                    </div>
                                    <div class="col-xl-2"></div>
                                    <div class="col-xl-6">
                                        <label>Acciones: </label>
                                        <span class="badge badge-<?php echo $temadelacookie; ?>" style="padding: 5px;"><i class="fa fa-plus-circle pr-1"></i><i class="fas fa-user-injured"></i> Agregar patologia</span>
                                        <span class="badge badge-info" style="padding: 5px;"><i class="fa fa-edit"></i> Editar patologia</span>
                                        <span class="badge badge-warning" style="padding: 5px;"><i class='fas fa-arrow-circle-down'></i> Inactivar patologia</span>
                                        <span class="badge badge-success" style="padding: 5px;"><i class='fas fa-arrow-circle-up'></i> Activar patologia</span>
                                        <span class="badge badge-danger" style="padding: 5px;"><i class='fas fa-trash'></i> Eliminar patologia</span>
                                    </div>
                                </div>

                            </div>

                            <div class="row justify-content-center pt-4">

                                <div class="col-lg-4 pb-3">
                                    <div class="card border-left-<?php echo $temadelacookie; ?>">
                                        <form id="formRegistrarPatologia" method="POST" autocomplete="off">
                                            <div class="row justify-content-center p-3">
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label id="labelparaswal">Nombre</label>
                                                        <div class="input-group mb-3">
                                                            <span class="input-group-text"><i class="fa fa-etsy" aria-hidden="true" style="width: 13px;"></i></span>
                                                            <input type="text" class="form-control" id="nombrepatologia" name="nombrepatologia" minlength="2" maxlength="50" placeholder="Nombre de la patologia" pattern="[A-Za-zÁÉÍÓÚáéíóúñÑ0-9\s]+" onkeypress="return sololetrasynumeros(event)" onpaste="return false" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <button type="submit" name="submitmodal" class="btn btn-<?php echo $temadelacookie; ?> btn-block" style="margin-top:4px;"><i class="fa fa-plus-circle pr-1"></i><i class="fas fa-user-injured"></i> Agregar</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>


                                <div class="col-lg-8">
                                    <div class="card">
                                        <!--style="border-top: 4px solid #36b9cc;" -->

                                        <!-- Card Body -->
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table id="tabla-patologias" class="table table-striped table-condensed">
                                                    <thead class="text-center">
                                                        <tr class="bg-<?php echo $temadelacookie; ?> text-white">
                                                            <th>NOMBRE PATOLOGIA</th>
                                                            <th>ESTADO</th>
                                                            <th>ACCION</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="text-center">
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--FIN DEL ROW -->

                        </div>
                        <!--fin del tab-content -->

                    </div>
                    <!--fin tab-content general -->

                    <!-- 
                    <div class="row">
                        <div class="col-sm-3">
                            <select class="form-control">
                                <option value="">Seleccione</option>
                                <option data-content="<span class='badge badge-success'>Relish</span>" value="juan">Juan</option>
                                <option value="juan"> <span style="background-color: red;width:10px;height:10px;">Relish</span> Juan</option>
                            </select>
                        </div>
                    </div> -->

                </div>
                <!-- End of Main Content -->
            </div>
            <!-- End of Content Wrapper -->
            <?php include '../dashboard/footer.php'; ?>
        </div>
        <!-- End of Page Wrapper -->




        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>




        <!-- CAMBIAR EL ITEM DEL NAVBAR SELECCIONADO -->
        <script>
            $("#pacientes").attr('class', 'nav-item active');
        </script>




        <!--<script src="assets/bootstrap/js/bootstrap.min.js"></script>-->
        <script src="../js/validaciongeneral.js"></script>
        <script src="../js/funcionswal.js"></script>
        <script src="../../jsdashboard/sb-admin-2.min.js"></script>
        <script src="js/funciones.js"></script>
        <script src="js/patologia.js"></script>
        <script src="js/pacientes.js"></script>

        <script src="../../assets/datatables/datatables.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>


</body>

</html>