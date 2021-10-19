<?php session_start();
if (isset($_SESSION['sesionCESFAM'])) { //VALIDA SI LA SESION ESTA INICIADA
    $sector = $_SESSION["sesionCESFAM"]["nombre_sector"];
    $unidad = $_SESSION["sesionCESFAM"]["nombre_unidad"];
    $contrasena = $_SESSION["sesionCESFAM"]["contrasena"];
    $rut = $_SESSION["sesionCESFAM"]["rut"];
} else { //SINO LO REDIRIGE AL INDEX
    header("Location:../indice/");
}
?>
<?php include '../dashboard/head.php'; ?>
<style>
    .estilo-archivo {
        font-size: 16px;
        background: white;
        border-radius: 50px;
        width: 420px;
        outline: none;
    }

    ::-webkit-file-upload-button {
        color: white;
        background: #dee2e6;
        padding: 5px;
        border: none;
        border-radius: 50px;
        outline: none;
    }
</style>
<title>Salud los Álamos - Perfil</title>
</head>

<body id="page-top">
    <?php ?>
    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php include '../dashboard/sidebar.php'; ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <?php include '../dashboard/topbar.php'; ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="row justify-content-center">
                        <h1 class="h3 mb-0 text-gray-800" style="font-family: 'Kaushan Script', cursive;">Perfil</h1>
                        <div class="col-lg-1"></div>
                    </div>

                    <div class="row justify-content-center" style="padding-top: 40px;">

                        <div class="col-lg-5 pb-5">

                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-lg-8">
                                        <!-- Card-->
                                        <div class="card rounded shadow-sm border-bottom-success">
                                            <div class="card-body  p-4">
                                                <img id="imagendeperfil" src="../../importantes/logocesfam2.png" alt="Logo" class="img-fluid d-block mx-auto mb-3" style="max-height: 400px;">

                                                <div class="row justify-content-center">
                                                    <span class="badge badge-success" id="rol">JUanito perez</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <form autocomplete="off" id="formueditarperfil" method="post">
                                <h4 class="pt-4" style="font-weight: 300;">Datos personales</h4>
                                <div class="card shadow">
                                    <div class="card-body">

                                        <!-- RUT -->
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-address-card" aria-hidden="true" style="width: 16px;"></i>
                                                </span>
                                            </div>
                                            <input type="text" class="form-control" id="rut" placeholder="Rut" disabled>
                                        </div>

                                        <!-- SECTOR O UNIDAD -->
                                        <!-- <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-address-card" aria-hidden="true" style="width: 16px;"></i>
                                                </span>
                                            </div>
                                            <input type="text" class="form-control" id="rut" placeholder="Rut" disabled>
                                        </div> -->

                                        <?php if ($sector == NULL && $unidad == NULL) { ?>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text"><i class="fa fa fa-map-signs" aria-hidden="true" style="width: 13px;"></i></span>
                                                <input type="text" class="form-control" placeholder="Ingrese" minlength="2" maxlength="100" value="No tiene Unidad ni Sector definido" onkeypress="return sololetras(event)" onpaste="return false" autocomplete="off" style="pointer-events: none;" disabled required>
                                            </div>
                                        <?php } else if ($sector != NULL && $unidad == NULL) { ?>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text"><i class="fa fa fa-map-signs" aria-hidden="true" style="width: 13px;"></i></span>
                                                <input type="text" class="form-control" placeholder="Ingrese Sector" minlength="2" maxlength="100" value="<?php echo $sector; ?>" onkeypress="return sololetras(event)" onpaste="return false" autocomplete="off" style="pointer-events: none;" disabled required>
                                            </div>
                                        <?php } else if ($sector != NULL && $unidad != NULL) { ?>

                                            <div class="row mb-3">
                                                <div class="col-xl-6 col-sm-12 pb-2">
                                                    <div class="input-group">
                                                        <span class="input-group-text"><i class="fa fa fa-map-signs" aria-hidden="true" style="width: 13px;"></i></span>
                                                        <input type="text" class="form-control" placeholder="Ingrese Sector" minlength="2" maxlength="100" value="<?php echo $sector; ?>" onkeypress="return sololetras(event)" onpaste="return false" autocomplete="off" style="pointer-events: none;" disabled required>
                                                    </div>
                                                </div>

                                                <div class="col-xl-6 col-sm-12">
                                                    <div class="input-group">
                                                        <span class="input-group-text"><i class="fa fa fa-map-signs" aria-hidden="true" style="width: 13px;"></i></span>
                                                        <input type="text" class="form-control" placeholder="Ingrese Unidad" minlength="2" maxlength="100" value="<?php echo $unidad; ?>" onkeypress="return sololetras(event)" onpaste="return false" autocomplete="off" style="pointer-events: none;" disabled required>
                                                    </div>
                                                </div>
                                            </div>

                                        <?php } else { ?>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text"><i class="fa fa fa-map-signs" aria-hidden="true" style="width: 13px;"></i></span>
                                                <input type="text" class="form-control" placeholder="Ingrese Unidad" minlength="2" maxlength="100" value="<?php echo $unidad; ?>" onkeypress="return sololetras(event)" onpaste="return false" autocomplete="off" style="pointer-events: none;" disabled required>
                                            </div>
                                        <?php } ?>

                                        <!-- Nombre -->
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-user" aria-hidden="true" style="width: 16px;"></i>
                                                </span>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Nombre" minlength="2" maxlength="49" name="nombre" id="nombre" onkeypress="return sololetras(event)" onpaste="return false" required>
                                        </div>


                                        <!-- Dirección -->
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-address-card-o" style="width: 16px;" aria-hidden="true"></i>
                                                </span>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Dirección" minlength="2" maxlength="100" name="direccion" id="direccion" onkeypress="return sololetrasynumeros(event)" onpaste="return false" required>
                                        </div>

                                        <!-- Región -->
                                        <div class="input-group mb-3" id="s1">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-map-marker" aria-hidden="true" style="min-width: 16px;"></i>
                                                </span>
                                            </div>
                                            <select type="text" class="form-control" id="region" placeholder="Región" required></select>
                                        </div>

                                        <!-- Comuna -->
                                        <div class="input-group mb-3" id="s2">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-location-arrow" aria-hidden="true" style="min-width: 16px;"></i>
                                                </span>
                                            </div>
                                            <select type="text" class="form-control" id="comuna" name="comuna" required>
                                                <option value="">Seleccione una región primero...</option>
                                            </select>
                                        </div>

                                        <div class="alert alert-danger" role="alert" id="a1" hidden>¡UpS! Al parecer no hay regiones registradas.<br> Por favor, Contacte a Soporte.</div>
                                        <div class="alert alert-danger" role="alert" id="a2" hidden>¡UpS! Al parecer no hay comunas registradas.<br> Por favor, Contacte a Soporte.</div>

                                        <!-- Imagen -->
                                        <input type="file" id="filemu" name="filemu" placeholder="Archivo" accept=".jpg,.jpeg,.png">

                                        <img id="previsualizacion" src="#" alt="Imagen de previsualización" class="rounded-circle" height="150px" width="200px" />


                                    </div>
                                </div>
                        </div>
                        <!--FIN DEL COL-SM-->

                        <div class="d-none d-lg-block" style="background-color: #e3e3e3;padding: 1px; margin-left: 20px; margin-right: 20px;"></div>


                        <div class="col-lg-6 ">

                            <h4 style="font-weight: 300;">Contacto</h4>

                            <div class="card shadow">
                                <div class="card-body">
                                    <!-- CORREO -->
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-envelope" aria-hidden="true"></i>
                                            </span>
                                        </div>
                                        <input type="email" class="form-control" id="correo" name="correo" placeholder="Correo" onkeypress="return solocorreo(event)" onpaste="return false" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" minlength="11" maxlength="70" required>
                                    </div>


                                    <!-- Teléfono -->
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-phone" aria-hidden="true" style="width: 16px;"></i></span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Teléfono" minlength="8" maxlength="9" name="telefono" id="telefono" onkeypress="return solonumeros(event)" onpaste="return false" required>
                                    </div>
                                </div>
                            </div>

                            <div class="container pt-3 pb-5">
                                <div class="row justify-content-center">
                                    <div class="col-lg-6">

                                        <button type="submit" class="btn btn-outline-success btn-block" style="width: 80%; margin-left: auto; margin-right: auto;">Actualizar datos</button>

                                    </div>
                                </div>
                            </div>
                            </form>



                            <div class="row justify-content-center">
                                <div class="alert alert-info text-center col-6" role="alert">Si sólo deseas actualizar tu contraseña.<br> Por favor, hazlo aquí abajo <i class="fas fa-arrow-circle-down"></i></div>
                            </div>

                            <div style="padding: 5%;">
                                <h4 style="font-weight: 300;">Cambiar contraseña</h4>
                                <div class="card shadow">
                                    <div class="card-body">
                                        <form id="formcontrasena" method="post" autocomplete="off">
                                            <!-- CONTRASEÑA ACTUAL -->
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-lock" aria-hidden="true" id="icono_contr_actual" style="min-width: 16px;"></i>
                                                    </span>
                                                </div>
                                                <input type="password" class="form-control" id="contrasena" name="contrasena" placeholder="Contraseña actual" onkeypress="return validacontrasena(event)" onpaste="return false" minlength="2" maxlength="200" required>
                                            </div>
                                            <!-- CONTRASEÑA NUEVA 1 -->
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-lock" aria-hidden="true" id="icono_contr_numero_uno"></i></span>
                                                </div>
                                                <input type="password" class="form-control" placeholder="Contraseña nueva" id="contranueva1" name="contranueva1" onkeypress="return validacontrasena(event)" onpaste="return false" minlength="2" maxlength="200" required>
                                            </div>
                                            <!-- CONTRASEÑA NUEVA 2 -->
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-lock" aria-hidden="true" id="icono_contr_numero_dos"></i></span>
                                                </div>
                                                <input type="password" class="form-control" placeholder="Repita contraseña nueva" id="contranueva2" onkeypress="return validacontrasena(event)" onpaste="return false" minlength="2" maxlength="200" required>
                                            </div>
                                            <!-- DIVIDER -->
                                            <hr width="30%">
                                            <!-- BOTÓN SUBMIT -->
                                            <button type="submit" class="btn btn-outline-success btn-block" style="width: 60%; margin-left: auto; margin-right: auto;">Actualizar contraseña</button>
                                        </form>
                                    </div>
                                </div>
                            </div>


                            <div class="container pb-2" id="contenidoQr">
                                <div class="row justify-content-center">
                                    <div class="col-xl-8 col-sm-12">
                                        <!-- Card-->
                                        <div class="card border-0 rounded shadow-sm">
                                            <div class="row justify-content-center">
                                                <div class="col-xl-5 text-center">
                                                    <img class="img-fluid text-center" src="https://chart.googleapis.com/chart?chs=450x440&cht=qr&chl=<?php echo $rut; ?>,<?php echo $contrasena; ?>&choe=UTF-8" title="QR para iniciar sesión" />
                                                </div>
                                                <div class="col-xl-7 col-sm-6">
                                                    <div class="card-body text-center">
                                                        
                                                        <h5 class="text-bold text-dark" style="font-weight: 500;">Código QR para el acceso</h5>
                                                        <!-- <br> -->
                                                        <!-- <p class="small text-muted"> <strong> Código QR para el acceso. </strong></p> -->
                                                        <p class="small text-muted">Guarda este código y al ingresar, presione el boton escanear con código QR, donde podrá acceder al sistema.</p>
                                                        <label for="#" class="btn btn-secondary btn-sm" onclick="imprimirContenido('contenidoQr')"><i class="fas fa-print"></i> Imprimir</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <script>
                                function imprimirContenido(valor){
                                    var restaurarpagina = document.body.innerHTML;
                                    var imprimircont = document.getElementById(valor).innerHTML;
                                    document.body.innerHTML = imprimircont;
                                    window.print();
                                    document.body.innerHTML = restaurarpagina;
                                }
                            </script>

                        </div>
                        <!--FIN DEL ROW -->
                    </div>
                    <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->
            </div>
            <?php include '../dashboard/footer.php'; ?>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <script>
            $('#previsualizacion').hide(); //Por defecto oculto la previsualizacion

            function readURL(input) { //muestra la imagen en la etiqueta <img> y en el src
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#previsualizacion').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }
        </script>


        <script>
            //ESTE SCRIPT MUESTRA LA CONSTRASEÑA AL PRESIONAR EL ÍCONO DEL CANDADO

            function mostrarcontra(icono, input) {
                $('#' + icono).click(function() {
                    if ($(this).hasClass('fa fa-lock')) {
                        $(this).removeClass('fa fa-lock');
                        $(this).addClass('fa fa-unlock');
                        $('#' + input).attr('type', 'text');

                    } else {
                        $(this).removeClass('fa fa-unlock');
                        $(this).addClass('fa fa-lock');
                        $('#' + input).attr('type', 'password');
                    }
                });
            }

            mostrarcontra('icono_contr_actual', 'contrasena');
            mostrarcontra('icono_contr_numero_uno', 'contranueva1');
            mostrarcontra('icono_contr_numero_dos', 'contranueva2');
        </script>
        <script src="../js/validaciongeneral.js"></script>
        <script src="../js/funcionswal.js"></script>
        <script src="../../assets/popper/popper.min.js"></script>
        <script src="../../jsdashboard/sb-admin-2.min.js"></script>
        <script src="js/validaciones.js"></script>
        <script src="js/formularios.js"></script>
        <script src="js/editarperfil.js"></script>
        <!--<script src="assets/bootstrap/js/bootstrap.min.js"></script>-->

</body>

</html>