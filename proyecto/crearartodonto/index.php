<?php session_start();
$rol = $_SESSION['sesionCESFAM']['id_rol'];
if (isset($_SESSION['sesionCESFAM']) && ($rol == 5)) { //VALIDA QUE SÓLO PUEDE VER EL DENTISTA
} else { //SINO LO REDIRIGE AL INDEX
    header("Location:../indice/");
}
?>
<?php include '../conexion/conexion.php'; ?>

<!DOCTYPE html>
<html lang="en">
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

    input[type="checkbox"] {
        position: relative;
        width: 49px;
        height: 18px;
        top: 4px;
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
</style>
<title>Salud los Álamos - Crear artículo</title>
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
                        <div class="row">
                            <div class="col-sm">
                                <form id="formcreararticulo_odonto" method="post" autocomplete="off">
                                    <h4 style="font-weight: 300;">Crear Artículo</h4>
                                    <div class="card shadow border-left-<?php echo $temadelacookie; ?>" id="cardprincipal">
                                        <div style="padding: 3%;">
                                            <h6 style="font-weight: 300; text-align: center; margin-top: 10px; margin-bottom: 30px;">Rellene todos los campos con la información requerida.</h6>
                                            <!-- TITULO -->
                                            <h6>Título</h6>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-etsy" aria-hidden="true" style="min-width: 16px;"></i></span>
                                                </div>
                                                <input type="text" class="form-control" id="titulo_articulo_odonto" name="titulo_articulo_odonto"  minlength="2" maxlength="130" placeholder="Escriba el título para su artículo" onkeypress="return sololetrasynumeros(event)" required>
                                                <!--onpaste="return false"-->
                                            </div>


                                            <!-- IMAGEN -->
                                            <h6>Seleccione una <strong>imágen principal</strong></h6>
                                            <ul>
                                                <div class="input-group mb-3">
                                                    <input type="file" class="estilo-archivo" id="archivo_odonto" name="archivo_odonto" accept=".png,.jpg,.jpeg">
                                                </div>
                                            </ul>

                                            <div>
                                                <input type="checkbox" id="botoncheckbox"> Cita textual
                                            </div>

                                            <ul id="idcitas">
                                                <!--NOTA IMPORTANTE: AQUI EN LOS INPUTS NO USO EL REQUIRED EN EL HTML PORQUE GENERA ERROR AL OCULTARLO, PERO LO VERIFICO EN JS Y PHP  -->
                                                <!-- style="display: none;"-->

                                                <div class="input-group mb-3 py-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="frase_articulo_odonto"><i class="fas fa-paragraph"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" id="frase" name="frase" minlength="2" maxlength="130"  placeholder="Escriba la frase para su artículo" onkeypress="return sololetrasynumeros(event)" required>
                                                </div>


                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="cita_articulo_odonto"><i class="fas fa-quote-right"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" id="cita" name="cita" minlength="2" maxlength="130"  placeholder="Escriba la cita de referencia para su artículo" onkeypress="return sololetrasynumeros(event)" required>
                                                </div>
                                            </ul>


                                            <!-- DIVIDER -->
                                            <!-- <hr width="30%"> -->
                                            <!-- DESCRIPCION -->
                                            <h6 style="padding-top:15px;">Describa lo que va a publicar</h6>
                                            <div class="input-group mb-3">
                                                <textarea class="form-control" name="descripcion_odonto" id="descripcion_odonto" placeholder="Describa las condiciones de su producto; detalle lo más entendible posible qué busca; muestre las especificaciones de su producto; entre otros" rows="10" cols="150" minlength="2" maxlength="10000"></textarea>
                                                <!--SI USO EL REQUIRED ME GENERA ERROR CON EL SUMMERNOTE-->
                                            </div>


                                        </div>
                                    </div>

                                    <!-- BOTÓN SUBMIT -->
                                    <button type="submit" class="btn btn-<?php echo $temadelacookie; ?> btn-block" style="width: 60%; margin-left: auto; margin-right: auto; margin-top: 20px;  margin-bottom: 50px;" id="ad" disabled>Publicar</button>
                            </div>
                        </div>
                        </form>
                    </div>


            </div>
            <!-- End of Main Content -->

            <!-- <input type="text" name="a" id="but"> -->

            <?php include '../dashboard/footer.php'; ?>

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->



    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>


    <!-- CAMBIAR EL ITEM DEL NAVBAR SELECCIONADO -->
    <script>
        $("#crear_articulo_odonto").attr('class', 'nav-item active');
    </script>

    <script>
        $('#archivo_odonto').on('change', function() {
            var ext = $(this).val().split('.').pop();
            if ($(this).val() != '') {
                if (ext == "jpg" || ext == "png" || ext == "JPEG" || ext == "jpeg" || ext == "JPG" || ext == "PNG") {
                    // console.log("La extensión es: " + ext);
                    if ($(this)[0].files[0].size > 20971520) { //1048576bytes * 20 = 20MB   (IMAGEN NO MAYPR A 20 MB)
                        // 1024bytes=1KB, 1048576bytes=1MB, 1024*1024*1024 (bytes)= 1GB
                        //  console.log("La imagen excede el tamaño máximo: archivo no debe ser mayor a 20 MB");
                        alertify.error("Tamaño excede a 20 MB");
                        $(this).val('');
                    } else {
                        //$("#modal-gral").hide();
                    }
                } else {
                    $(this).val('');
                    alertify.error("Extension no permitida");
                    // console.log("Extensión no permitida: " + ext);
                }
            }
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#descripcion_odonto').summernote({
                lang: 'es-ES',
                width: 1500,
                height: 400,
                popover: { //en popover Quito la redimensiones en la barra de opciones que me ofrecian al clickear la imagen subida
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
                            //     alert("ancho: " + this.width)
                            // };
                            $('#descripcion_odonto').summernote("insertNode", img[0]);
                            //     console.log("var tamaño", getMeta(img[0].src));

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
                    ['view', ['codeview']] //quite 'fullscreen','help'
                ]
            });

            //VALIDA QUE EL SUMMERNOTE NO ESTE VACIO, Y EN CASO DE QUE SI, DESHABILITA EL BOTON ENVIAR -- PD: NO SE PUEDE USAR EL REQUIRED PORQUE GENERA ERROR (CONSOLA SE MUESTRA)
            $('[id="descripcion_odonto"]').summernote({}).on('summernote.keyup', function() { //ACTIVA EL BOTON ENVIAR, esto lo hago porque el required en summernote no funciona

                var text = $("#descripcion_odonto").summernote("code").replace(/&nbsp;|<\/?[^>]+(>|$)/g, "").trim();

                if (text.length == 0) {
                    $("#ad").attr("disabled", "disabled");
                } else {
                    $("#ad").removeAttr("disabled"); //REMUEVO EL DISABLED
                }
            });
        });
    </script>

    <script src="../../jsdashboard/sb-admin-2.min.js"></script>

    <script src="../js/funcionswal.js"></script>
    <script src="../js/validaciongeneral.js"></script>
    <script src="js/formularios.js"></script>
    <script src="js/crear_articulo_odonto.js"></script>
    <script src="../js/summernote-ES.js"></script>


</body>

</html>