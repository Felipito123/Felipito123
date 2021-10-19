<?php session_start();
if (isset($_SESSION['sesionCESFAM'])) { //VALIDA SI LA SESION ESTA INICIADAz
    $rut = $_SESSION["sesionCESFAM"]["rut"];
} else { //SINO LO REDIRIGE AL INDEX
    header("Location:../indice/");
}
?>
<?php include '../dashboard/head.php'; ?>

<title>Salud los Álamos - Firma digital</title>
<script type="text/javascript" src="js/digital/jquery-ui.min.js"></script>
<script type="text/javascript" src="js/digital/jquery.signature.min.js"></script>
<link rel="stylesheet" type="text/css" href="js/digital/jquery.signature.css">


<style>
    .kbw-signature {
        /*Este es el cuadro para dibujar*/
        width: 440px;
        height: 300px;
    }

    #firma canvas {
        width: 100% !important;
        /* max-width: 300px; */
        height: auto;
    }

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

    .bg-morado {
        background-color: #7367f0;
    }

    .btn-morado {
        color: #fff;
        background-color: #7367f0;
        border-color: #7367f0;
    }

    .btn-morado:hover {
        background-color: #5d53c5;
        color: #fff;
    }

    .alert-morado {
        color: #45417d;
        background-color: #d5d3f1;
        border-color: #d5d3f1;
    }

    .btn-outline-morado {
        color: #7367f0;
        border-color: #7367f0;
    }

    .btn-outline-morado:hover {
        background-color: #7367f0;
        color: white;
    }

    .fondomorado {
        background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 200 200" enable-background="new 0 0 200 200" xml:space="preserve"><g fill="rgb(143,137,202)"><path d="M55.8,-64.5C71.7,-53.3,83.4,-35,83.1,-17.5C82.9,0.1,70.7,16.9,59.3,32C47.9,47,37.3,60.3,25.7,60C14,59.6,1.2,45.7,-12.7,38.9C-26.5,32,-41.5,32.3,-44.6,26.1C-47.8,19.9,-39.2,7.3,-35.7,-5.2C-32.2,-17.6,-33.8,-29.9,-28.7,-43.1C-23.6,-56.2,-11.8,-70.3,4.1,-75.2C20,-80,40,-75.8,55.8,-64.5Z" transform="translate(100 100)" /></g></svg>');
        height: auto;
        /* rgb(246, 194, 62) = warning, rgb(63,187,192) = info , rojo vino= rgb(152,47,95)*/
        background-attachment: fixed;
        background-position: center bottom;
        background-repeat: no-repeat;
        background-size: 160% 140%;
        z-index: auto;
        position: relative;
    }

    .fondoverde {
        background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 200 200" enable-background="new 0 0 200 200" xml:space="preserve"><g fill="rgb(112,204,171)"><path d="M55.8,-64.5C71.7,-53.3,83.4,-35,83.1,-17.5C82.9,0.1,70.7,16.9,59.3,32C47.9,47,37.3,60.3,25.7,60C14,59.6,1.2,45.7,-12.7,38.9C-26.5,32,-41.5,32.3,-44.6,26.1C-47.8,19.9,-39.2,7.3,-35.7,-5.2C-32.2,-17.6,-33.8,-29.9,-28.7,-43.1C-23.6,-56.2,-11.8,-70.3,4.1,-75.2C20,-80,40,-75.8,55.8,-64.5Z" transform="translate(100 100)" /></g></svg>');
        height: auto;
        /* rgb(246, 194, 62) = warning, rgb(63,187,192) = info , rojo vino= rgb(152,47,95)*/
        background-attachment: fixed;
        background-position: center bottom;
        background-repeat: no-repeat;
        background-size: 160% 140%;
        z-index: auto;
        position: relative;
    }

    @media screen and (max-width: 670px) {
        .kbw-signature {
            width: 250px;
            height: 300px;
        }

        #firma canvas {
            width: 100% !important;
            height: auto;
        }
    }

    @media screen and (max-width: 1300px) {
        .kbw-signature {
            width: 200px;
            height: 300px;
        }

        #firma canvas {
            width: 100% !important;
            height: auto;
        }
    }

    /* @media only screen and (max-width: 1470px) {
        .kbw-signature {
            width: 350px;
            height: 300px;
        }

        #firma canvas {
            width: 100% !important;
            height: auto;
        }
    } */

    @media screen {
        #NuevaPantallaImprimible {
            display: none;
        }
    }

    @media print {
        body * {
            visibility: hidden;
        }

        #botonimprimirswal1 {
            /*Cuando se imprima no se muestre el boton impimir*/
            display: none;
        }

        #NuevaPantallaImprimible1,
        #NuevaPantallaImprimible1 * {
            visibility: visible;
        }

        #NuevaPantallaImprimible1 {
            position: absolute;
            left: 0;
            top: 0;
        }

        #botonimprimirswal2 {
            /*Cuando se imprima no se muestre el boton impimir*/
            display: none;
        }

        #NuevaPantallaImprimible2,
        #NuevaPantallaImprimible2 * {
            visibility: visible;
        }

        #NuevaPantallaImprimible2 {
            position: absolute;
            left: 0;
            top: 0;
        }


    }
</style>

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
                <div class="container-fluid" id="contenedorgeneral">

                    <!-- Page Heading -->
                    <div class="row justify-content-center">
                        <h1 class="h3 mb-0 text-gray-800 pl-5" style="font-family: 'Kaushan Script', cursive;">Firma digital</h1>
                        <div class="col-lg-1"></div>
                    </div>

                    <div class="container">
                        <div class="row pt-5">
                            <div class="col-12">
                                <div class="progress" style="height: 9px;">
                                    <div class="progress-bar bg-morado" role="progressbar" style="width: 50%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 50%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-center" style="padding-top: 70px;">

                        <div class="col-1"></div>

                        <div class="col-lg-5 pb-5">
                            <!--fondoverde -->

                            <div class="container">
                                <div class="row justify-content-center pb-2 pt-2">
                                    <div class="col-lg-8">
                                        <!-- Card-->
                                        <div class="card rounded shadow-sm" style="border-left: 3px solid #7367f0;">
                                            <div class="card-body p-4" style="height: 300px;">
                                                <img id="imagendefirma" src="" alt="Firma" class="img-fluid d-block mx-auto mb-3 p-4" style="height: 300px;max-height: 400px;">
                                            </div>
                                            <label class="btn btn-secondary btn-sm col-3 text-center" style="border-radius: 0px 20px 20px 0px;"><i class="fas fa-paint-brush" style="font-size:17px"></i> <small>Actual</small></label>
                                            <!-- <span class="text-center pb-1 text-secondary"> <small>Actual</small> </span> -->
                                        </div>
                                    </div>
                                </div>

                                <div class="row justify-content-center text-center pt-2">
                                    <label class="btn btn-xs btn-white btn-outline-morado" value=" Ver mas información" for="cargarimagen">
                                        <i class="fas fa-cloud-upload-alt"></i> Cargar imagen
                                        <input id="cargarimagen" name="foto_admision" type="file" accept="image/png" style="display:none" hidden>
                                    </label>
                                </div>

                                <div class="row justify-content-center text-center pt-2" id="divcarga">
                                    <div class="col-6">
                                        <div class="progress">
                                            <div class="progress-bar" id="progress" role="progressbar">0%</div>
                                        </div>
                                        <small id="tiemporestante"></small>
                                    </div>
                                </div>


                                <div class="row justify-content-center text-center pt-2">
                                    <div class="alert alert-morado">
                                        <strong>Instructivo carga fotografía para firma digital</strong>
                                        <br><br>
                                        <span class="btn btn-xs btn-white btn-morado" value=" Ver mas información" onclick="instrucciones(1);">
                                            <i class="fa fa-eye"></i> Ver mas información
                                        </span>
                                    </div>
                                </div>
                                <!-- 
                                <div class="row justify-content-center text-center pt-2" id="divcarga">
                                    <div class="col-6">
                                        <button id="download-button">Download</button>
                                        <a id="save-file">Save File</a>
                                    </div>
                                    <div class="col-6">
                                        <div class="progress">
                                            <div class="progress-bar" id="progress" role="progressbar">0%</div>
                                        </div>

                                        <small id="tiemporestante"></small>
                                    </div>

                                </div> -->
                            </div>
                        </div>
                        <!--FIN DEL COL-SM-->

                        <div class="col-lg-5 text-center">
                            <!--fondomorado -->

                            <form id="formfirmadigital" method="post" autocomplete="off">
                                <div class="row justify-content-center">
                                    <div class="card rounded shadow-sm" style="border-right: 3px solid #1cc88a;">
                                        <small id="emailHelp" class="form-text text-muted pl-1 pr-1">Por favor, mantén el click presionado y desliza el mouse de tu pc.</small>
                                        <div class="card-body p-4" style="height: 400px;">
                                            <div id="firma">
                                            </div>
                                            <br />
                                            <br />
                                            <!-- <div class="pt-3"> -->

                                            <button class="btn btn-sm btn-white btn-outline-secondary float-right" id="limpiarfirma"><i class="fas fa-eraser"></i> Limpiar</button>
                                            <!-- <button id="clear">Limpiar Firma</button> -->
                                            <textarea id="firmabase64" name="firmabase64" style="display: none"></textarea>
                                        </div>
                                    </div>
                                </div>


                                <div class="container pt-3 pb-2">
                                    <div class="row justify-content-center">
                                        <div class="col-lg-6">
                                            <button type="submit" class="btn btn-outline-success btn-block" style="width: 80%; margin-left: auto; margin-right: auto;"><i class="fas fa-cloud-upload-alt"></i> Subir</button>
                                        </div>
                                    </div>
                                </div>
                            </form>


                            <div class="row justify-content-center">
                                <div class="alert alert-success">
                                    <strong>Instructivo dibujo para firma digital</strong>
                                    <br><br>
                                    <span class="btn btn-xs btn-white btn-success" id="btn_informacion" value=" Ver mas información" onclick="instrucciones(2);">
                                        <i class="fa fa-eye"></i> Ver mas información
                                    </span>
                                </div>
                            </div>

                            <!-- <div class="row justify-content-center">
                                <div class="alert alert-info text-center col-6" role="alert">Si sólo deseas actualizar tu contraseña.<br> Por favor, hazlo aquí abajo <i class="fas fa-arrow-circle-down"></i></div>
                            </div> -->

                        </div>
                        <!--FIN DEL COL -->
                        <div class="col-1"></div>



                    </div>
                    <!-- FIN DEL ROW -->

                </div>
                <!-- End of Main Content -->

                <div class="container">
                    <div class="row pt-5">
                        <div class="col-12">
                            <div class="progress" style="height: 9px;">
                                <div class="progress-bar bg-morado" role="progressbar" style="width: 50%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                <div class="progress-bar bg-success" role="progressbar" style="width: 50%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- <div class="container pt-3">
                    <div class="row justify-content-center">
                        <div class="col-xl-3">
                            <span class="btn btn-xs btn-white btn-warning" value="Alertas Intranet" onclick="alertaswarning();">
                                <i class="fa fa-eye"></i> Alerta warning
                            </span>
                        </div>
                        <div class="col-xl-3">
                            <span class="btn btn-xs btn-white btn-success" value="Alertas Intranet" onclick="alertassuccess();">
                                <i class="fa fa-eye"></i> Alerta success
                            </span>
                        </div>
                        <div class="col-xl-3">
                            <span class="btn btn-xs btn-white btn-danger" value="Alertas Intranet" onclick="alertaserror();">
                                <i class="fa fa-eye"></i> Alerta error
                            </span>
                        </div>
                        <div class="col-xl-3">
                            <span class="btn btn-xs btn-white btn-info" value="Alertas Intranet" onclick="alertasinfo();">
                                <i class="fa fa-eye"></i> Alerta info
                            </span>
                        </div>
                    </div>
                </div> -->

            </div>
            <?php include '../dashboard/footer.php'; ?>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- CAMBIAR EL ITEM DEL NAVBAR SELECCIONADO -->
        <script>
            $("#firmadigital").attr('class', 'nav-item active');
        </script>

        <script src="../js/validaciongeneral.js"></script>
        <script src="../js/funcionswal.js"></script>
        <script src="../../assets/popper/popper.min.js"></script>
        <script src="../../jsdashboard/sb-admin-2.min.js"></script>
        <script src="js/formularios.js"></script>
        <script src="js/acciones.js"></script>
        <script src="js/barradeprogresodecarga.js"></script>
        <!-- <script src="assets/bootstrap/js/bootstrap.min.js"></script> -->


        <script>
            // instrucciones();
            $('#divcarga').hide();

            function instrucciones(valor) {
                //Nota: onclick="printElement(imprimirEsto); en printElement le entrego dentor del Swal el id del contenido del div general (container) que se llama imprimirEsto

                let colorbotonimprimir = '';
                let colorbotonconfirmar = '';
                let contenidohtml = '';

                if (valor == 1) {
                    colorbotonimprimir = 'morado';
                    contenidohtml = `
                        <p class="text-center"><b>Instructivo carga firma digital para solicitar permisos: </b></p>
                        <ul>
                            <li>La fotografía debe ser subida sin nombre, ni rut.</li>
                            <li>La fotografía debe permitir la correcta visualización de la firma, sin fondos de: colores, graficos, diseños.</li>
                            <li>La fotografía debe ser tomada con fondo completamente blanco, liso, evitando sombras y brillos.</li>
                            <li>La fotografía, a cargar en el sistema, debe tener un ancho mínimo de 430 pixeles y un alto mínimo de 290 pixeles.</li>
                            <li>La fotografía debe tener formato PNG.</li>
                            <li>Al finalizar la carga de la imagen, se subira automáticamente si ha cumplido con los estándar anterior mencionados.</li>
                        </ul>
                            <br>
                        <p>Puede seguir como ejemplo la fotografía dispuesta a continuación:        </p>
                            <div class="row justify-content-center">
                                <div class="col-xs-12" style="border: 2px solid gray">
                                    <img class="img-responsive p-3" alt="100%x200" style="height: 120px;width: 240px; display: block;" src="../../imagencertificado/firmaprototipo.png">
                                </div>
                            </div>
                        <br>
                    `;
                    colorbotonconfirmar = '#7367f0';
                } else if (valor == 2) {
                    colorbotonimprimir = 'success';
                    contenidohtml = `
                        <p class="text-center"><b>Instructivo dibujo firma digital para solicitar permisos:</b></p>
                        <ul>
                            <li>Para dibujar, haga click en el botón primario de su mouse (botón de izquierda) y deslice.</li>
                            <li>Si desea borrar dibujo, haga click en el boton <i class="fas fa-eraser"></i> limpiar .</li>
                            <li>Al finalizar su dibujo, debe enviar presionando el botón inferior "<i class="fas fa-cloud-upload-alt"></i> Subir".</li>
                        </ul>
                            <br>
                        <p>Puede seguir como ejemplo la fotografía dispuesta a continuación:        </p>
                            <div class="row justify-content-center">
                                <div class="col-xs-12" style="border: 2px solid gray">
                                    <img class="img-responsive p-3" alt="100%x200" style="height: 120px;width: 240px; display: block;" src="../../imagencertificado/firmaprototipo.png">
                                </div>
                            </div>
                        <br>
                    `;
                    colorbotonconfirmar = '#1cc88a';
                }

                Swal.fire({
                    title: 'I N F O R M  A C I Ó N',
                    html: `
                    <div class="container" id="imprimirEsto` + valor + `">  
                        <div class="row justify-content-end">  
                        <label class="btn btn-xs btn-white btn-outline-` + colorbotonimprimir + `" value=" Ver mas información" id="botonimprimirswal` + valor + `">
                                <i class="fas fa-print"></i> Imprimir
                        </label>
                        </div>
                        <div class="row" style="text-align: justify;">   
                            <div class="col-12">
                                <div class="alert alert-secondary">
                                ` + contenidohtml + `
                                </div>
                            </div>
                        </div>
                    </div>    
                    `,
                    focusConfirm: false,
                    showCancelButton: false,
                    confirmButtonText: '<div style="width:300px;"> Ok, Entiendo. </div>',
                    cancelButtonText: 'Cancelar',
                    confirmButtonColor: colorbotonconfirmar,
                    // cancelButtonColor: "#858796",
                    width: '700px'
                }).then((result) => {
                    // if (result['isConfirmed']) {
                    //     alertify.success("PRESIONO CONFIRMAR");
                    // } else if (result['dismiss']) {
                    //     alertify.success("CANCELO");
                    // } else {
                    //     alertify.error("UPS");
                    // }
                });

                document.getElementById("botonimprimirswal" + valor).onclick = function() {
                    printElement(document.getElementById("imprimirEsto" + valor), valor);
                }
            }
        </script>


        <script>
            function printElement(elem, recibovalor) {
                var domClone = elem.cloneNode(true);
                // console.log(domClone);
                var $printSection = document.getElementById("NuevaPantallaImprimible" + recibovalor); //Creo un id imaginario llamado NuevaPantallaImprimible

                if (!$printSection) {
                    var $printSection = document.createElement("div");
                    $printSection.id = "NuevaPantallaImprimible" + recibovalor;
                    document.body.appendChild($printSection);
                }

                $printSection.innerHTML = "";
                $printSection.appendChild(domClone);


                window.print();

                document.body.removeChild($printSection);
            }
        </script>
        <script>
            var sig = $('#firma').signature({
                syncField: '#firmabase64',
                syncFormat: 'PNG'
            });

            $('#limpiarfirma').click(function(e) {
                e.preventDefault();
                sig.signature('clear');
                $("#firmabase64").val('');
            });
        </script>



        <script>
            //en Intranet está por makeGritter
            // NotifTipoIntranet("Advertencia", "Ahora puede imprimir su certificado. Presione el Botón Imprimir", "warning");
            // NotifTipoIntranet("Exito", "Ahora puede imprimir su certificado. Presione el Botón Imprimir", "success");
            // NotifTipoIntranet("Error", "Ahora puede imprimir su certificado. Presione el Botón Imprimir", "error");
            // NotifTipoIntranet("Información", "Ahora puede imprimir su certificado. Presione el Botón Imprimir3", "info");

            function alertaswarning() {
                NotifTipoIntranet("Advertencia", "Ahora puede imprimir su certificado. Presione el Botón Imprimir", "warning");
            }

            function alertassuccess() {
                NotifTipoIntranet("Exito", "Ahora puede imprimir su certificado. Presione el Botón Imprimir", "success");
            }

            function alertaserror() {
                NotifTipoIntranet("Error", "Ahora puede imprimir su certificado. Presione el Botón Imprimir", "error");
            }

            function alertasinfo() {
                NotifTipoIntranet("Información", "Ahora puede imprimir su certificado. Presione el Botón Imprimir3", "info");
            }
        </script>

<!-- <script src="https://raw.githubusercontent.com/furf/jquery-ui-touch-punch/master/jquery.ui.touch-punch.min.js"></script> -->
</body>

</html>