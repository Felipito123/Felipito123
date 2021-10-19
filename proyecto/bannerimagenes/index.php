<?php session_start();
$rol = $_SESSION['sesionCESFAM']['id_rol'];
if (isset($_SESSION['sesionCESFAM']) && ($rol == 2 || $rol == 3)) { //VALIDA QUE SÓLO PUEDE VER EL ADMINISTRADOR Y EL SUPERADMIN
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

    .estilonuevo {
        background-color: #dee2e6;
        color: white;
        display: flex;
        align-items: center;
        height: 40px;
        border-radius: 30px;
        padding: 0 25px;
        cursor: pointer;
        transition: all ease-out 200ms;

    }

    .estilonuevo:not(.chosen):hover {
        background-color: rgb(249, 89, 89);
    }

    .input-hidden {
        height: 0;
        width: 0;
        visibility: hidden;
        padding: 0;
        margin: 0;
        float: right;
    }
</style>
<title>Salud los Álamos - Banner de Imágenes</title>
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


                <div class="row justify-content-center pb-2">
                    <div class="col-xl-5 col-sm-12">
                        <div class="alert alert-success" role="alert">
                            <!-- <div class="row justify-content-between"> -->
                            <strong> <i class="fas fa-info-circle pb-2"></i> A considerar</strong> <br>
                            <!-- </div> -->
                            <ul>
                                <li>Cuando el estado es <span class="badge badge-success m-1" style="padding: 4px;width:58px;font-size:10px">Activo</span>, las personas que se dirijan a la página web, podran visualizar el banner de imagen en la sección derecha de su pantalla.</li>
                                <li>Cuando el estado es <span class="badge badge-danger m-1" style="padding: 4px;width:58px;font-size:10px">Inactivo</span>, las personas que se dirijan a la página web, no podran visualizar el banner de imagen.</li>
                                <li>Debe ingresar un link con los protocolos minimos de hipertexto como, por ejemplo, http o https.</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="container-fluid" style="text-align: center; padding-bottom: 25px;">
                    <div class="row align-items-center">
                        <div class="col-lg-6 mx-auto">
                            <form id="formBannerImagen" method="POST" autocomplete="off">
                                <div class="card shadow">
                                    <div style="padding: 2%;">
                                        <!--AÑADIR CATEGORIAS -->
                                        <div class="row" style="max-width:100%;margin-left:2px;margin-right:2px;">
                                            <!--el row es el que hace conflicto por eos un lado era más ancho que el otro. Asi que, le agregue el margin-left y right -->
                                            <div class="col-lg-12">
                                                <div class="table-responsive">
                                                    <!-- PARA QUE SEA RESPONSIVO USE LA CLASE DEL table-responsive -->
                                                    <div class="justify-content-center">
                                                        <!--centro los div -->
                                                        <h4 style="font-weight: 300;">Imágen + Link</h4>
                                                        <div class="input-group mb-3">
                                                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-link" aria-hidden="true" style="min-width: 5px;"></i></span>
                                                            <input type="text" class="form-control" id="linkbanner" name="linkbanner" placeholder="Ingrese el link" onkeypress="return sololink(event)" minlength="2" maxlength="200" pattern="https?://.*" required>
                                                            <!--El on paste retrun false no me dejaba pegar un link -->
                                                        </div>
                                                        <div class="input-group justify-content-center">
                                                            <label for="imagenbanner" class="estilonuevo"><i class="fas fa-upload"></i> &nbsp;Seleccionar imagen</label>
                                                            <input type="file" class="estilo-archivo" id="imagenbanner" name="imagenbanner" accept=".png,.jpg,.jpeg" style="display: none;">
                                                        </div>
                                                        <div class="input-group mb-2 justify-content-center">
                                                            <small id="nombredelaimagen" class="form-text text-muted text-center"></small>
                                                        </div>

                                                        <button type="submit" class="btn btn-secondary btn-block" style="float: right;"><i class="fa fa-paper-plane" aria-hidden="true" style="min-width: 5px;"></i> Enviar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div> <!-- End container-fluid -->

                <div class="container-fluid">
                    <div class="row justify-content-center py-3">
                        <!-- <div class="col-lg-3"></div> -->
                        <div class="col-xl-5 col-sm-12 pb-2">
                            <label>Generar informe (G.I): </label>
                            <span class="badge badge-success" style="padding: 5px;"><i class="fa fa-file-excel-o"></i> G.I en excel</span>
                            <span class="badge badge-danger" style="padding: 5px;"><i class="fa fa-file-pdf-o"></i> G.I en pdf</span>
                            <span class="badge badge-info" style="padding: 5px;"><i class="fa fa-print"></i> Imprimir</span>
                        </div>
                        <div class="col-xl-5 col-sm-12">
                            <label>Acciones: </label>
                            <span class="badge badge-secondary" style="padding: 5px;"><i class="fa fa-paper-plane"></i> Ingresar imagen</span>
                            <span class="badge badge-info" style="padding: 5px;"><i class="fa fa-pencil-square-o"></i> Editar imagen</span>
                            <span class="badge badge-success" style="padding: 5px;"><i class="fa fa-check-circle"></i> Activar imagen</span>
                            <span class="badge badge-warning" style="padding: 5px;"><i class="fa fa-minus-circle"></i> Inactivar imagen</span>
                            <span class="badge badge-danger" style="padding: 5px;"><i class="fa fa-trash-o"></i> Eliminar imagen</span>
                        </div>
                    </div>
                </div>

                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <div class="col-xl-11 col-sm-12">
                            <div class="card shadow" id="card-mis-publicaciones">
                                <div style="padding: 2%;">
                                    <div class="table-responsive">
                                        <table id="tabla-banner-imagen" class="table table-striped table-bordered" width="100%" cellspacing="0">
                                            <thead class="text-center">
                                                <tr class="text-white bg-secondary">
                                                    <!-- <th>ID BANNER IMAGEN</th> -->
                                                    <th>LINK</th>
                                                    <th>VISUALIZAR IMAGEN</th>
                                                    <th>ESTADO</th>
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
                </div>


            </div>
            <!-- End of Main Content -->

            <?php include '../dashboard/footer.php'; ?>

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->



    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <?php include '../partes/modal/modal_banner_imagenes.php'; ?>

    <script>
        $('#imagenbanner').on('change', function() {
            var ext = $(this).val().split('.').pop();
            // console.log($(this)[0].files[0].name);
            if ($(this).val() != '') {
                var nombreimagen = $(this)[0].files[0].name;
                if (ext == "jpg" || ext == "png" || ext == "JPEG" || ext == "jpeg" || ext == "JPG" || ext == "PNG") {
                    console.log("La extensión es: " + ext);
                    if ($(this)[0].files[0].size > 20971520) { //1048576bytes * 20 = 20MB   (IMAGEN NO MAYPR A 20 MB)
                        // 1024bytes=1KB, 1048576bytes=1MB, 1024*1024*1024 (bytes)= 1GB
                        console.log("La imagen excede el tamaño máximo: archivo no debe ser mayor a 20 MB");
                        alertify.error("Tamaño excede a 20 MB");
                        $('#nombredelaimagen').fadeOut();
                        $(this).val('');
                    } else {
                        $('#nombredelaimagen').text('Nombre de la imagen: ' + nombreimagen);
                        $('#nombredelaimagen').fadeIn(); //Muestra
                        setTimeout(function() { //oculto cuando hallan pasado 10 segundos
                            $('#nombredelaimagen').fadeOut();
                        }, 10000);
                    }
                } else {
                    $('#nombredelaimagen').fadeOut();
                    $(this).val('');
                    alertify.error("Sólo se permiten imagenes");
                    console.log("Extensión no permitida: " + ext);
                }
            } else { //cuando abre el mantenedor de archivos pero cancela
                $('#nombredelaimagen').fadeOut();
            }
        });

        $('#archivo_banner_imagenes').on('change', function() {
            var ext = $(this).val().split('.').pop();
            if ($(this).val() != '') {
                if (ext == "jpg" || ext == "png" || ext == "JPEG" || ext == "jpeg" || ext == "JPG" || ext == "PNG") {
                    console.log("La extensión es: " + ext);
                    if ($(this)[0].files[0].size > 20971520) { //1048576bytes * 20 = 20MB   (IMAGEN NO MAYPR A 20 MB)
                        // 1024bytes=1KB, 1048576bytes=1MB, 1024*1024*1024 (bytes)= 1GB
                        console.log("La imagen excede el tamaño máximo: archivo no debe ser mayor a 20 MB");
                        alertify.error("Tamaño excede a 20 MB");
                        $(this).val('');
                    }
                } else {
                    $(this).val('');
                    alertify.error("Sólo se permiten imagenes");
                    console.log("Extensión no permitida: " + ext);
                }
            }
        });
    </script>




    <!-- CAMBIAR EL ITEM DEL NAVBAR SELECCIONADO -->
    <script>
        $("#administracion").attr('class', 'nav-item active');
    </script>

    <script src="../js/validaciongeneral.js"></script>
    <script src="../js/funcionswal.js"></script>
    <script src="../../jsdashboard/sb-admin-2.min.js"></script>
    <script src="../../assets/datatables/datatables.min.js"></script>
    <script src="js/banner_imagenes.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>

    <script>
        /*URL INVÁLIDAS*/
        // var testCase1 = "http://en.wikipedia.org/wiki/Procter_&_Gamble";
        // var testCase2 = "http://www.google.com/url?sa=i&rct=j&q=&esrc=s&source=images&cd=&docid=nIv5rk2GyP3hXM&tbnid=isiOkMe3nCtexM:&ved=0CAUQjRw&url=http%3A%2F%2Fanimalcrossing.wikia.com%2Fwiki%2FLion&ei=ygZXU_2fGKbMsQTf4YLgAQ&bvm=bv.65177938,d.aWc&psig=AFQjCNEpBfKnal9kU7Zu4n7RnEt2nerN4g&ust=1398298682009707";
        // var testCase3 = "https://sdfasd."; // Inválidas
        // var testCase4 = "dfdsfdsfdfdsfsdfs"; //inválida
        // var testCase5 = "magnet:?xt=urn:btih:123";
        // var testCase6 = "https://stackoverflow.com/";
        // var testCase7 = "https://w";
        // var testCase8 = "https://sdfasdp.ppppppppppp";
        // var testCase9 = "*....google.com";
        // var testCase10 = "http://localhost/TESIS/tesis/proyecto/bannerimagenes/";
    </script>
</body>

</html>