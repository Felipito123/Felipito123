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

    .table.dataTable td:nth-child(2) {
        /*AL VIDEO LE AGREGA LA ELLIPSIS (...) MÁS ABAJO*/
        max-width: 100px;
    }

    .table.dataTable td {
        white-space: nowrap;
        text-overflow: ellipsis;
        overflow: hidden;
    }

    input[type="checkbox"] {
        position: relative;
        width: 49px;
        height: 18px;
        -webkit-appearance: none;
        background-color: #c6c6c6;
        outline: none;
        border-radius: 20px;
        box-shadow: inset 0 0 5px rgb(0, 0, 0, .2);
        transition: .5s;
    }

    input:checked[type="checkbox"] {
        background: #03a9f4;
    }

    input[type="checkbox"]:before {
        content: '';
        position: absolute;
        width: 19px;
        height: 18px;
        border-radius: 20px;
        top: 0;
        left: 0;
        background: #fff;
        transform: scale(1.1);
        box-shadow: 0 2px 5px rgb(0, 0, 0, .2);
        transition: .5s;
    }

    input:checked[type="checkbox"]:before {
        left: 30px;
    }

    .parahover:hover {
        background-color: #bb3629;
    }
</style>

<!-- <link href="http://hayageek.github.io/jQuery-Upload-File/4.0.11/uploadfile.css" rel="stylesheet">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="http://hayageek.github.io/jQuery-Upload-File/4.0.11/jquery.uploadfile.min.js"></script> -->

<link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet" />
<link href="../js/filepont/filepond-plugin-image-preview.css" rel="stylesheet" />
<link href="https://unpkg.com/filepond-plugin-image-edit/dist/filepond-plugin-image-edit.css" rel="stylesheet" />

<title>Salud los Álamos - Galeria de imágenes</title>
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
                    <div class="row align-items-center">
                        <div class="col-lg-6 mx-auto">
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
                                                    <h4 style="font-weight: 300;">Múltiples Imágenes</h4>
                                                    <form id="formTablaGaleria" method="POST">
                                                        <!--enctype="multipart/form-data" -->
                                                        <div class="form-group">
                                                            <!-- <div class="input-group mb-3 justify-content-center"> -->
                                                            <!-- <input type="file" class="estilo-archivo" id="imagengaleria" name="imagengaleria[]" accept=".png,.jpg,.jpeg" multiple required> -->
                                                            <input type="file" class="filepond" id="imagengaleria" name="imagengaleria[]" data-max-file-size="25MB" data-max-files="10" accept="image/png, image/jpeg, image/jpg" multiple />
                                                        </div>
                                                        <button type="submit" class="btn btn-secondary btn-block"><i class="fa fa-upload"></i> Enviar</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- End container-fluid -->

                <div class="row justify-content-center pb-2">
                    <div class="col-xl-5 col-sm-12">
                        <div class="alert alert-secondary" role="alert">
                            <strong> <i class="fas fa-info-circle pb-2"></i> Información</strong> <br>
                            <ul>
                                <li>En esta sección es para administración de la "galeria de imágenes" del sistema web.</li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-xl-6 col-sm-12">
                        <div class="alert alert-secondary" role="alert">
                            <strong> <i class="fas fa-info-circle pb-2"></i> A considerar</strong> <br>
                            <ul>
                                <li>Cuando el estado es <span class="badge badge-success m-1" style="padding: 4px;width:58px;font-size:10px">Activa</span>, las personas que se dirijan a la página web, podrán visualizar la galeria de imágenes.</li>
                                <li>Cuando el estado es <span class="badge badge-danger m-1" style="padding: 4px;width:58px;font-size:10px">Inactiva</span>, las personas que se dirijan a la página web, <strong>no</strong> podrán visualizar la galeria de imágenes.</li>
                            </ul>

                        </div>
                    </div>
                </div>

                <div class="container-fluid">
                    <div class="row py-3">
                        <div class="col-lg-6">
                            <label>Acciones: </label>
                            <span class="badge badge-secondary" style="padding: 5px;"><i class="fa fa-paper-plane"></i> Ingresar múltiples imágenes</span>
                            <span class="badge badge-info" style="padding: 5px;"><i class="fa fa-pencil-square-o"></i> Editar imagen</span>
                            <span class="badge badge-success" style="padding: 5px;"><i class="fa fa-check-circle"></i> Activar imagen</span>
                            <span class="badge badge-warning" style="padding: 5px;"><i class="fa fa-minus-circle"></i> Inactivar imagen</span>
                            <span class="badge badge-danger" style="padding: 5px;"><i class="fa fa-trash-o"></i> Eliminar múltiples imágenes</span>
                        </div>
                        <div class="col-lg-2"></div>
                        <div class="col-lg-4">
                            <label>Generar informe (G.I): </label>
                            <span class="badge badge-success" style="padding: 5px;"><i class="fa fa-file-excel-o"></i> G.I en excel</span>
                            <span class="badge badge-danger" style="padding: 5px;"><i class="fa fa-file-pdf-o"></i> G.I en pdf</span>
                            <span class="badge badge-info" style="padding: 5px;"><i class="fa fa-print"></i> Imprimir</span>
                        </div>
                    </div>
                </div>

                <div class="container-fluid">
                    <div class="card shadow">
                        <div style="padding: 2%;">
                            <div class="table-responsive">
                                <table id="tabla-galeria" class="table table-striped table-bordered" width="100%" cellspacing="0">
                                    <thead class="text-center">
                                        <tr class="text-white bg-secondary">
                                            <th><span class="badge badge-danger parahover" id="botoneliminar" style="padding: 5px;"><i class="fa fa-trash-o"></i> Eliminar múltiple</span></th>
                                            <th>NOMBRE IMAGEN</th>
                                            <th>TITULO</th>
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

    <?php include '../partes/modal/modal_img_galeria.php' ?>


    <!-- CAMBIAR EL ITEM DEL NAVBAR SELECCIONADO -->
    <script>
        $("#administracion").attr('class', 'nav-item active');
    </script>

    <script>
        //IMAGEN DEL FORMULARIO
        // $('#imagengaleria').on('change', function() {
        //     let contararchivos = $(this)[0].files.length;
        //     // alertify.error("CANT4: "+$(this)[0].files[1].name); //muestro el nombre del archivo 1 (desde el 0 al n )
        //     console.log("Cantidad de archivos: "+contararchivos);
        //     for (let i = 0; i < contararchivos; i++) {
        //         var ext = $(this)[0].files[i].name.substr(-3);
        //         // alertify.error("EXT: "+ext);
        //         console.log("Nombre de archivos: " + $(this)[0].files[i].name);

        //         if (ext == "jpg" || ext == "png" || ext == "JPEG" || ext == "jpeg" || ext == "JPG" || ext == "PNG") {
        //             // console.log("La extensión es: " + ext);
        //             if ($(this)[0].files[i].size > 20971520) { //1048576bytes * 20 = 20MB   (IMAGEN NO MAYOR A 20 MB)
        //                 // 1024bytes=1KB, 1048576bytes=1MB, 1024*1024*1024 (bytes)= 1GB
        //                 alertify.error("Tamaño excede a 20 MB");
        //                 $(this).val('');
        //                 break;
        //             }
        //         } else {
        //             $(this).val('');
        //             alertify.error("Sólo se permiten imagenes");
        //             break;
        //             // console.log("Extensión no permitida: " + ext);
        //         }

        //     }

        // });



        // IMAGEN DEL MODAL
        $('#archivo_img_galeria').on('change', function() {
            var ext = $(this).val().split('.').pop();
            if ($(this).val() != '') {
                if (ext == "jpg" || ext == "png" || ext == "JPEG" || ext == "jpeg" || ext == "JPG" || ext == "PNG") {
                    console.log("La extensión es: " + ext);
                    if ($(this)[0].files[0].size > 5242880) { //1048576bytes * 5 = 5MB (IMAGEN NO MAYOR A 5 MB) //1048576bytes * 25 = 25MB   (IMAGEN NO MAYOR A 25 MB)
                        // 1024bytes=1KB, 1048576bytes=1MB, 1024*1024*1024 (bytes)= 1GB
                        // 5242880 bytes = 5MB
                        // console.log("La imagen excede el tamaño máximo: archivo no debe ser mayor a 25 MB");
                        alertify.error("Tamaño excede a 5 MB");
                        $(this).val('');
                    }
                } else {
                    $(this).val('');
                    alertify.error("Sólo se permiten imagenes");
                    // console.log("Extensión no permitida: " + ext);
                }
            }
        });
    </script>

    <!--<script src="assets/bootstrap/js/bootstrap.min.js"></script>   ESTE ME GENERA ERROR EN LOS DROPDOWN-->
    <script src="../../jsdashboard/sb-admin-2.min.js"></script>
    <script src="../../assets/datatables/datatables.min.js"></script>
    <script src="../js/funcionswal.js"></script>
    <script src="../js/validaciongeneral.js"></script>

    <!--https://pqina.nl/filepond/docs/api/instance/properties/    DE ESTA PÁGINA SAQUE EL PLUGINS -->
    <script src="https://unpkg.com/filepond-plugin-file-metadata/dist/filepond-plugin-file-metadata.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-crop/dist/filepond-plugin-image-crop.js"></script>
    <script src="https://unpkg.com/filepond-plugin-file-validate-size/dist/filepond-plugin-file-validate-size.js"></script>
    <script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-edit/dist/filepond-plugin-image-edit.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-exif-orientation/dist/filepond-plugin-image-exif-orientation.js"></script>
    <script src="../js/filepont/filepond-plugin-image-preview.js"></script>
    <script src="https://unpkg.com/filepond/dist/filepond.js"></script>
    <script src="js/galeria.js"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>

</body>

</html>