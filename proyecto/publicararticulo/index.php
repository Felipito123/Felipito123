<?php session_start();
$rol = $_SESSION['sesionCESFAM']['id_rol'];
if (isset($_SESSION['sesionCESFAM']) && ($rol == 2 || $rol == 3)) { //VALIDA QUE SÓLO PUEDE VER EL ADMINISTRADOR Y EL SUPERADMIN
} else { //SINO LO REDIRIGE AL INDEX
    header("Location:../indice/");
}
?>
<?php
include '../conexion/conexion.php';
include '../dashboard/head.php';
?>
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
<title>Salud los Álamos - Publicar artículo</title>
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

                <div class="container">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm">
                                <form id="formcreararticulo" method="post" autocomplete="off">
                                    <h4 style="font-weight: 300;">Datos del Artículo</h4>
                                    <div class="card shadow" id="cardprincipal">
                                        <div style="padding: 3%;">
                                            <h6 style="font-weight: 300; text-align: center; margin-top: 10px; margin-bottom: 30px;">Rellene todos los campos con la información requerida.</h6>
                                            <!-- TITULO -->
                                            <h6>Título</h6>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-etsy" aria-hidden="true" style="min-width: 16px;"></i></span>
                                                </div>
                                                <input type="text" class="form-control" id="titulo_articulo" name="titulo_articulo" maxlength="130" minlength="1" required placeholder="Escriba el título para su artículo" onkeypress="return sololetrasynumeros(event)">
                                                <!--onpaste="return false" -->
                                            </div>


                                            <!--CATEGORIA -->
                                            <h6>Categoría</h6>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-list" aria-hidden="true" style="min-width: 16px;"></i>
                                                    </span>
                                                </div>
                                                <select class="form-control" id="categoria" name="categoria" required>
                                                    <option value="">Seleccione una opción...</option>
                                                    <?php
                                                    $sql = "SELECT id_categoria_articulo,nombre_categoria_articulo from categoria_articulo  ORDER BY nombre_categoria_articulo ASC"; //nombre_categoria!='Mision' and nombre_categoria!='Vision'
                                                    $consulta = mysqli_query($mysqli, $sql);
                                                    if (!$consulta) {
                                                        //echo "ERROR";
                                                    } else {
                                                        while ($fila = mysqli_fetch_array($consulta)) {

                                                            $ID_CATEGORIA = $fila['id_categoria_articulo'];
                                                            $NOMBRE_CATEGORIA = $fila['nombre_categoria_articulo'];

                                                            echo '<option value="' . $ID_CATEGORIA . '">' . $NOMBRE_CATEGORIA . '</option>'; //utf8_encode($NOMBRE_CATEGORIA)
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>


                                        </div>
                                    </div>
                                    <br>

                                    <br>
                                    <!-- IMÁGEN Y DESCRIPCIÓN -->
                                    <h4 style="font-weight: 300;">Imágen y descripción</h4>
                                    <div class="card shadow " id="cardprincipal">
                                        <div class="card-body">
                                            <!-- IMAGEN -->
                                            <h6>Seleccione una <strong>imágen principal</strong></h6>
                                            <ul>
                                                <div class="input-group mb-3">
                                                    <input type="file" class="estilo-archivo" id="archivo" name="archivo">
                                                    <!--onchange="validaextension() -->
                                                </div>
                                            </ul>


                                            <input type="checkbox" id="botoncheckbox"> ¿Desea incluir un PDF?
                                            <ul style="display: none;" id="id_pdf">
                                                <div class="input-group mb-3">
                                                    <!-- <input type="file" class="estilo-archivo" id="archivopdf" name="archivopdf"> -->
                                                    <label for="archivopdf" class="btn btn-danger" style="width: 170px; border-radius: 40px; padding:5px"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></label>
                                                    <input type="file" id="archivopdf" name="archivopdf" style="visibility:hidden;" accept=".pdf">
                                                    <div id="nombreimagen"></div>
                                                </div>

                                            </ul>

                                            <!-- DIVIDER -->
                                            <hr width="30%">
                                            <!-- DESCRIPCION -->
                                            <h6>Describa lo que va a publicar</h6>
                                            <div class="input-group mb-3">
                                                <textarea class="form-control" name="descripcion" id="descripcion" placeholder="Describa las condiciones de su producto; detalle lo más entendible posible qué busca; muestre las especificaciones de su producto; entre otros" rows="10" cols="150" maxlength="10000"></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- BOTÓN SUBMIT -->
                                    <button type="submit" id="botonenviar" class="btn btn-<?php echo $temadelacookie; ?> btn-block" style="width: 60%; margin-left: auto; margin-right: auto; margin-top: 20px;  margin-bottom: 50px;" disabled>Publicar</button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>


            </div>
            <!-- End of Main Content -->

            <?php include '../dashboard/footer.php'; ?>

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->


    <?php include '../partes/modal/modal_ver_articulos.php'; ?>


    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>


    <!-- CAMBIAR EL ITEM DEL NAVBAR SELECCIONADO -->
    <script>
        $("#administracion").attr('class', 'nav-item active');
    </script>



    <script>
        $('#archivo').on('change', function() {
            var ext = $(this).val().split('.').pop();
            if ($(this).val() != '') {
                if (ext == "jpg" || ext == "png" || ext == "JPEG" || ext == "jpeg" || ext == "JPG" || ext == "PNG") {
                    console.log("La extensión es: " + ext);
                    if ($(this)[0].files[0].size > 20971520) { //1048576bytes * 20 = 20MB   (IMAGEN NO MAYPR A 20 MB)
                        // 1024bytes=1KB, 1048576bytes=1MB, 1024*1024*1024 (bytes)= 1GB
                        console.log("La imagen excede el tamaño máximo: archivo no debe ser mayor a 20 MB");
                        alertify.error("Tamaño excede a 20 MB");
                        $(this).val('');
                    } else {
                        //$("#modal-gral").hide();
                    }
                } else {
                    $(this).val('');
                    alertify.error("No es una imagen");
                    console.log("Extensión no permitida: " + ext);
                }
            }
        });


        $('#archivopdf').on('change', function() {
            var ext = $(this).val().split('.').pop();
            if ($(this).val() != '') {
                if (ext == "pdf") {
                    console.log("La extensión es: " + ext);
                    // if ($(this)[0].files[0].size > 20971520) { //1048576bytes * 20 = 20MB   (IMAGEN NO MAYPR A 20 MB)
                    //     // 1024bytes=1KB, 1048576bytes=1MB, 1024*1024*1024 (bytes)= 1GB
                    //     console.log("La imagen excede el tamaño máximo: archivo no debe ser mayor a 20 MB");
                    //     alertify.error("Tamaño excede a 20 MB");
                    //     $(this).val('');
                    // } else {
                    //     //$("#modal-gral").hide();
                    // }
                } else {
                    $(this).val('');
                    alertify.error("No es un pdf");
                    console.log("Extensión no permitida: " + ext);
                }
            }
        });


        // function validaextension() {
        //     var otro = $("#archivo").val();
        //     var existeimagen = otro.length;

        //     if (existeimagen != 0) {
        //         var archivo = document.getElementById('archivo');
        //         if (/\.(jpe?g|png|jpg|JPEG|PNG|JPG )$/i.test(archivo.files[0].name) === false) {
        //             archivo.setCustomValidity('No es una imagen');
        //         } else {
        //             archivo.setCustomValidity('');
        //         }
        //     }
        // }
    </script>

    <script>
        $("#archivopdf").change(function() { //ES MUY EFECTIVO
            var existe = this.files.length;
            //console.log(existe);

            if (existe != 0) { //Verifica si existe el archivo pdf
                filename = this.files[0].name;
                $("#nombreimagen").html("" + filename); //muestro el nombre del archivo pdf
                console.log(filename);
            } else {
                $("#nombreimagen").html("");
            }
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#descripcion').summernote({
                lang: 'es-ES',
                width: 1500,
                height: 400,
                popover: { //en popover ..Quito la redimensiones en la barra de opciones que me ofrecian al clickear la imagen subida. Esto porque a veces el tamaño excedia los 900px y en noticias la img tomaba todo el container y se veia mal
                    image: [
                        ['imagesize', ['imageSize100', 'imageSize50', 'imageSize25']],
                        ['float', ['floatLeft', 'floatRight', 'floatNone']],
                        ['remove', ['removeMedia']],
                        ['custom', ['imageAttributes']],
                    ],
                },
                callbacks: {
                    onImageUpload: function(files) { //redimensiono la imagen insertada a 500px  por defecto

                        if (!files.length) return;
                        var file = files[0];
                        // create FileReader

                        var reader = new FileReader();

                        reader.onloadend = function() {
                            // when loaded file, img's src set datauri
                            console.log("img", $("<img>"));
                            var img = $("<img>").attr({
                                src: reader.result,
                                width: "500" //
                            }); // << Add here img attributes !
                            console.log("var img", img);

                            // img[0].onload = function() {
                            //     // alert(this.width + ' ' + this.height);
                            //     alert("ancho de la imagen: " + this.width)
                            // };

                            $('#descripcion').summernote("insertNode", img[0]); //Aqui se inserta la imagen en el summernote
                        }

                        if (file) {
                            // convert fileObject to datauri
                            reader.readAsDataURL(file);
                        }


                    }
                },
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'video']], //quite 'picture'
                    ['view', ['codeview', 'help']] //quite 'fullscreen'
                ]
            });

            //VALIDA QUE EL SUMMERNOTE NO ESTE VACIO, Y EN CASO DE QUE SI, DESHABILITA EL BOTON ENVIAR -- PD: NO SE PUEDE USAR EL REQUIRED PORQUE GENERA ERROR (CONSOLA SE MUESTRA)
            $('[id="descripcion"]').summernote({}).on('summernote.keyup', function() { //ACTIVA EL BOTON ENVIAR, esto lo hago porque el required en summernote no funciona

                var text = $("#descripcion").summernote("code").replace(/&nbsp;|<\/?[^>]+(>|$)/g, "").trim();

                if (text.length == 0) {
                    $("#botonenviar").attr("disabled", "disabled");
                } else {
                    $("#botonenviar").removeAttr("disabled"); //REMUEVO EL DISABLED
                }
            });

        });
    </script>



    <script src="../../jsdashboard/sb-admin-2.min.js"></script>
    <script src="../js/validaciongeneral.js"></script>
    <script src="../js/funcionswal.js"></script>
    <script src="../js/summernote-ES.js"></script>
    <script src="js/crear_articulo.js"></script>

</body>

</html>