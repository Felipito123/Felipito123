<?php session_start();
$usuario;
if (isset($_SESSION['sesionCESFAM']) && $_SESSION['sesionCESFAM']['id_rol'] == 3) { //VALIDA QUE SÓLO PUEDE VER ESTA PANTALLA EL SUPERADMIN
    $usuario = $_SESSION['sesionCESFAM'];
} else { //SINO LO REDIRIGE AL INDEX
    header("Location:../indice/");
}

date_default_timezone_set("America/Santiago");
setlocale(LC_TIME, "spanish");
$fechadehoy = strftime("%Y-%m-%d"); //("%Y-%m-%d")
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
        max-width: 100px;
    }

    .table.dataTable td {
        white-space: nowrap;
        text-overflow: ellipsis;
        overflow: hidden;
    }


    input[type="checkbox"] {
        position: relative;
        width: 44px;
        height: 13px;
        -webkit-appearance: none;
        background-color: #858796;
        outline: none;
        border-radius: 15px;
        box-shadow: inset 0 0 5px rgb(0, 0, 0, .2);
        transition: .5s;
    }

    input:checked[type="checkbox"] {
        background: #36b9cc;
    }

    input[type="checkbox"]:before {
        content: '';
        position: absolute;
        width: 14px;
        height: 13px;
        border-radius: 15px;
        top: 0;
        left: 0;
        background: #fff;
        transform: scale(1.1);
        box-shadow: 0 2px 5px rgb(0, 0, 0, .2);
        transition: .5s;

    }

    input:checked[type="checkbox"]:before {
        left: 30px;
        /* background: #dc3545; */
    }
</style>

<title>Salud los Álamos - Funcionarios</title>
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
                            <a class="nav-item nav-link active" id="usuarioactivo" data-toggle="tab" href="#nav-usuario-activo" role="tab" aria-controls="nav-usuario-activo" aria-selected="true">Funcionarios activos</a>
                            <a class="nav-item nav-link" id="usuarioinactivo" data-toggle="tab" href="#nav-usuario-inactivo" role="tab" aria-controls="nav-usuario-inactivo" aria-selected="false">Funcionarios inactivos</a>
                            <!-- <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Contacto</a> -->
                        </div>
                    </nav>

                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-usuario-activo" role="tabpanel" aria-labelledby="usuarioactivo">

                            <h4 class="text-left pl-4 pb-2" style="font-weight: 300;">Registrar funcionario</h4>
                            <div class="row justify-content-center">
                                <div class="col-lg-11">
                                    <div class="card" style="border-top: 3px solid var(--<?php echo $temadelacookie; ?>);">
                                        <div class="card-body">
                                            <form id="formSuperAdmin" method="POST" autocomplete="off">
                                                <!--centro los div -->
                                                <!-- <h4 class="pb-3" style="font-weight: 300;">Registrar Funcionario</h4> -->

                                                <div class="row">
                                                    <div class="col-6">
                                                        <!-- RUT -->
                                                        <div class="form-group row">

                                                            <label for="sa_rut" class="col-sm-2 col-form-label">R.U.T</label>
                                                            <div class="col-sm-10">
                                                                <!-- <input type="text" class="form-control" id="staticEmail" value="email@example.com"> -->
                                                                <div class="input-group">
                                                                    <!--Donde uso el setCustomValidity en la funcion comprobarRUT, cuando envio el formulario y está el campo inválido, la alerta se queda pegada cuando el usuario escribe. Entonces, la quito con onkeyup="this.setCustomValidity('');" -->
                                                                    <input type="text" class="form-control" placeholder="Ej: 141112229" id="sa_rut" name="sa_rut" pattern="[Kk0-9]+" onchange="comprobarRUT(this)" onkeyup="this.setCustomValidity('');" onkeypress="return solorut(event)" onpaste="return false" minlength="8" maxlength="11" required>
                                                                    <!--onkeypress="return tiponumerico(event)" oninput="validaRut(this)" -->
                                                                    <div class="input-group-append">
                                                                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-address-card" aria-hidden="true" style="width: 16px;"></i></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Nombre -->
                                                        <div class="form-group row">
                                                            <label for="sa_nombre" class="col-sm-2 col-form-label">Nombre</label>
                                                            <div class="col-sm-10">
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control" placeholder="Complete este campo" name="sa_nombre" id="sa_nombre" minlength="2" maxlength="50" pattern="[A-Za-zÁÉÍÓÚáéíóúñ\s]+" onkeypress="return sololetras(event)" onpaste="return false" required>
                                                                    <div class="input-group-append">
                                                                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-user" aria-hidden="true" style="width: 16px;"></i>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-6">

                                                        <!-- REGIÓN -->
                                                        <div class="form-group row">
                                                            <label for="seleccionregion" class="col-sm-2 col-form-label">Región</label>
                                                            <div class="col-sm-10">
                                                                <div class="input-group" id="s1">
                                                                    <select class="form-control" id="seleccionregion" required></select>
                                                                    <div class="input-group-append">
                                                                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-map-marker" aria-hidden="true" style="width: 16px;"></i></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- COMUNA -->
                                                        <div class="form-group row">
                                                            <label for="seleccioncomuna" class="col-sm-2 col-form-label">Comuna</label>
                                                            <div class="col-sm-10">
                                                                <div class="input-group" id="s2">
                                                                    <select class="form-control" id="seleccioncomuna" name="seleccioncomuna" required>
                                                                        <option value="">Seleccione una región primero...</option>
                                                                    </select>
                                                                    <div class="input-group-append">
                                                                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-location-arrow" aria-hidden="true" style="width: 16px;"></i></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>

                                                </div>


                                                <div class="alert alert-danger" role="alert" id="a1" hidden>¡UpS! Al parecer no hay regiones registradas.<br> Por favor, Contacte a Soporte.</div>
                                                <div class="alert alert-danger" role="alert" id="a2" hidden>¡UpS! Al parecer no hay comunas registradas.<br> Por favor, Contacte a Soporte.</div>


                                                <div class="row">
                                                    <div class="col-6">
                                                        <!-- PROFESIÓN -->
                                                        <div class="form-group row" id="divprofesion">
                                                            <label for="seleccioncargo" class="col-sm-2 col-form-label">Cargo</label>
                                                            <div class="col-sm-10">
                                                                <div class="input-group">
                                                                    <select class="form-control" id="seleccioncargo" required>
                                                                        <option value="">Seleccione un cargo o profesión...</option>
                                                                    </select>
                                                                    <div class="input-group-append">
                                                                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-id-card-alt" aria-hidden="true" style="width: 16px;"></i></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- SECTOR -->
                                                        <div class="form-group row" id="divselectorsector">
                                                            <label for="seleccionsector" class="col-sm-2 col-form-label">Sector</label>
                                                            <div class="col-sm-10">
                                                                <div class="input-group pt-1">
                                                                    <select class="form-control" id="seleccionsector" required>
                                                                        <option value="null">No tiene sector...</option>
                                                                    </select>
                                                                    <div class="input-group-append">
                                                                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-map-signs" aria-hidden="true" style="width: 16px;"></i></span>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>

                                                        <div class="form-group row" id="divselectorunidad">
                                                            <label for="seleccionunidad" class="col-sm-2 col-form-label">Unidad</label>
                                                            <div class="col-sm-10">
                                                                <div class="input-group pt-1">
                                                                    <select class="form-control" id="seleccionunidad" required>
                                                                        <option value="null">No tiene unidad...</option>
                                                                    </select>
                                                                    <div class="input-group-append">
                                                                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-map-signs" aria-hidden="true" style="width: 16px;"></i></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- FECHA ENTRADA -->
                                                        <div class="form-group row">
                                                            <label for="sa_fechainicio" class="col-sm-2 col-form-label">Entrada</label>
                                                            <div class="col-sm-10">
                                                                <div class="input-group">
                                                                    <input type="date" class="form-control" placeholder="Fecha Inicio" name="sa_fechainicio" id="sa_fechainicio" onkeypress="return fechausuarios(event)" maxlength="10" value="<?php echo $fechadehoy ?>" required>
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-calendar-day"></i>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- ROL -->
                                                        <div class="form-group row">
                                                            <label for="seleccionrol" class="col-sm-2 col-form-label">Rol</label>
                                                            <div class="col-sm-10" id="divrol">
                                                                <div class="input-group">
                                                                    <select class="form-control" id="seleccionrol" required>
                                                                        <option value="">Seleccione un rol...</option>
                                                                    </select>
                                                                    <div class="input-group-append">
                                                                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-user-shield" aria-hidden="true" style="width: 16px;"></i></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <div class="col-6">

                                                        <!-- DIRECCIÓN -->
                                                        <div class="form-group row">
                                                            <label for="sa_direccion" class="col-sm-2 col-form-label">Dirección</label>
                                                            <div class="col-sm-10">
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control" placeholder="Complete este campo" name="sa_direccion" id="sa_direccion" minlength="2" maxlength="100" pattern="[A-Za-zÁÉÍÓÚáéíóúñÑ0-9-°#,\s]+" onkeypress="return solodireccion(event)" onpaste="return false" required>
                                                                    <div class="input-group-append">
                                                                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-address-card-o" style="width: 16px;" aria-hidden="true"></i>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- TELÉFONO -->
                                                        <div class="form-group row">
                                                            <label for="sa_telefono" class="col-sm-2 col-form-label">Teléfono (+56)</label>
                                                            <div class="col-sm-10">
                                                                <div class="input-group">
                                                                    <!--el oninput cumple la funcion de el la longitud maxima que puede tomar el campo de teléfono -->
                                                                    <input type="number" class="form-control" placeholder="Complete este campo" name="sa_telefono" id="sa_telefono" min="922222222" oninput="if(this.value.length>=9) { this.value = this.value.slice(0,9);}" pattern="[0-9]+"  onkeypress="return solonumeros(event)" onpaste="return false" required>
                                                                    <div class="input-group-append">
                                                                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-phone" aria-hidden="true" style="width: 16px;"></i></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- CORREO -->
                                                        <div class="form-group row">
                                                            <label for="sa_correo" class="col-sm-2 col-form-label">Correo</label>
                                                            <div class="col-sm-10">
                                                                <div class="input-group">
                                                                    <input type="email" class="form-control" placeholder="Complete este campo" minlength="11" maxlength="70" name="sa_correo" id="sa_correo" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" onkeypress="return solocorreo(event)" onpaste="return false" required>
                                                                    <div class="input-group-append">
                                                                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-envelope" style="width: 16px;" aria-hidden="true"></i>
                                                                        </span>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>

                                                        <!-- CONTRASEÑA  -->
                                                        <div class="form-group row">
                                                            <label for="sa_contrasena" class="col-sm-2 col-form-label">Contraseña</label>
                                                            <div class="col-sm-10">
                                                                <div class="input-group pb-1">
                                                                    <input type="password" id="sa_contrasena" name="sa_contrasena" class="form-control" placeholder="Complete este campo" minlength="2" maxlength="200" required>
                                                                    <div class="input-group-append">
                                                                        <div class="input-group-text"><i class="fa fa-lock" id="contraseñaboton" style="width: 16px;"></i></div>
                                                                    </div>
                                                                </div>
                                                                <div id="divclavepordefecto"><small> Usar R.U.T como contraseña por defecto &nbsp;</small> <input type="checkbox" id="ckeckclavepordefecto" value="1" /></div>
                                                            </div>
                                                        </div>


                                                        <!-- BUTTON SUBMIT -->
                                                        <div class="form-group row">
                                                            <div class="col-sm-4"></div>
                                                            <button type="submit" class="btn btn-secondary btn-block col-sm-8" id="btnregistrousuario"><i class="fa fa-paper-plane" aria-hidden="true" style="min-width: 5px;"></i> Registrar</button>
                                                        </div>


                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="container pt-3">
                                <div class="row">
                                    <div class="col-lg-7">
                                        <label>Acciones: </label>
                                        <span class="badge badge-secondary" style="padding: 5px;"><i class="fa fa-paper-plane"></i> Registrar usuario</span>
                                        <span class="badge badge-info" style="padding: 5px;"><i class="fa fa-pencil-square-o"></i> Editar usuario</span>
                                        <span class="badge badge-danger" style="padding: 5px;"><i class="fa fa-ban"></i> Inactivar usuario</span>
                                    </div>
                                    <!-- <div class="col-lg-3"></div> -->
                                    <div class="col-lg-5">
                                        <label>Exportar: </label>
                                        <span class="badge badge-success" style="padding: 5px;"><i class="fa fa-file-excel-o"></i> Exportar excel</span>
                                        <span class="badge badge-danger" style="padding: 5px;"><i class="fa fa-file-pdf-o"></i> Exportar pdf</span>
                                        <span class="badge badge-info" style="padding: 5px;"><i class="fa fa-print"></i> Imprimir</span>
                                    </div>
                                </div>
                            </div>

                            <h4 class="text-left pl-4 pb-2" style="font-weight: 300;">Lista de funcionarios</h4>
                            <div class="container-fluid" style="padding-bottom: 30px;">
                                <div class="card" style="border-top: 3px solid var(--<?php echo $temadelacookie; ?>);">
                                    <div style="padding: 1%;">
                                        <!-- <h4 style="font-weight: 300;">Lista de funcionarios</h4> -->
                                        <div class="table-responsive">
                                            <table id="tabla-usuarios" class="table table-striped" style="border: 1px solid #e3e6f0;" width="100%" cellspacing="0">
                                                <thead class="text-center">
                                                    <tr class="bg-<?php echo $temadelacookie; ?> text-white">
                                                        <!--class="text-white" style="background-color: #d1d3e2;" -->
                                                        <th>ESTADO</th>
                                                        <th>RUT</th>
                                                        <th>NOMBRE</th>
                                                        <th>TELÉFONO</th>
                                                        <th>DIRECCIÓN</th>
                                                        <th>ENTRADA</th>
                                                        <th>CORREO</th>
                                                        <th>ID ROL</th>
                                                        <th>ROL</th>
                                                        <th>ACCIONES</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="text-center">
                                                </tbody>
                                            </table>
                                        </div>
                                        <!--fin del table responsive -->
                                    </div>
                                    <!--fin del row -->
                                </div>
                                <!--fin del container-fluid -->
                            </div>

                        </div>
                        <!--fin del tab-content -->


                        <div class="tab-pane fade" id="nav-usuario-inactivo" role="tabpanel" aria-labelledby="usuarioinactivo">

                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-lg-5">
                                        <label>Accion: </label>
                                        <span class="badge badge-success" style="padding: 5px;"><i class="fa fa-check-circle"></i> Activar usuario</span>
                                    </div>
                                    <div class="col-lg-5">
                                    </div>
                                </div>
                            </div>

                            <div class="row justify-content-center py-2">
                                <div class="col-lg-9">
                                    <div class="card mb-4" style="border-top: 3px solid var(--<?php echo $temadelacookie; ?>);">

                                        <!-- Card Body -->
                                        <div class="card-body">
                                            <div class="table-responsive" style="max-width:100%;">
                                                <table id="tabla-usuarios-inactivo" class="table table-striped table-condensed">
                                                    <thead class="text-center">
                                                        <tr class="bg-<?php echo $temadelacookie; ?> text-white">
                                                            <th>RUT</th>
                                                            <th>NOMBRE</th>
                                                            <th>ENTRADA</th>
                                                            <th>CORREO</th>
                                                            <th>IDROL</th>
                                                            <th>ROL</th>
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


        <?php include '../partes/modal/modal_usuario.php'; ?>

        <script>
            //ESTE SCRIPT MUESTRA LA CONSTRASEÑA
            $('#contraseñaboton').click(function() {
                if ($(this).hasClass('fa fa-lock')) {
                    $(this).removeClass('fa fa-lock');
                    $(this).addClass('fa fa-unlock');
                    $('#sa_contrasena').attr('type', 'text');

                } else {
                    $(this).removeClass('fa fa-unlock');
                    $(this).addClass('fa fa-lock');
                    $('#sa_contrasena').attr('type', 'password');
                }
            });
        </script>




        <!-- CAMBIAR EL ITEM DEL NAVBAR SELECCIONADO -->
        <script>
            $("#usuariosadmin").attr('class', 'nav-item active');
        </script>




        <!--<script src="assets/bootstrap/js/bootstrap.min.js"></script>-->
        <script src="../js/validaciongeneral.js"></script>
        <script src="../js/funcionswal.js"></script>
        <script src="../../jsdashboard/sb-admin-2.min.js"></script>
        <script src="js/superadmin.js"></script>
        <!-- <script src="js/validarut.js"></script> -->
        <script src="js/formularios.js"></script>

        <script src="../../assets/datatables/datatables.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>


</body>

</html>