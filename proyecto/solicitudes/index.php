<?php session_start();
$usuario;
if (isset($_SESSION['sesionCESFAM']) && $_SESSION['sesionCESFAM']['id_rol'] == 6) { //VALIDA QUE SÓLO PUEDE VER ESTA PANTALLA EL ENC. DE FARMACIA
    $usuario = $_SESSION['sesionCESFAM'];
} else { //SINO LO REDIRIGE AL INDEX
    header("Location:../indice/");
}
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

    .nota-azul {
        background-color: #e1ecfd;
        border-color: #1266f1 !important;
    }

    .nota-amarilla {
        background-color: #fff1d6;
        border-color: #ffa900 !important;
    }

    .nota-morada {
        background-color: #f0d8ff;
        border-color: #6b2498 !important;
    }

    .nota-roja {
        background-color: #fee3e8;
        border-color: #f93154 !important;
    }

    .nota-info {
        background-color: #fee3e8;
        border-color: #f93154 !important;
    }

    .nota-verde {
        background-color: #c6ffdd;
        border-color: #00b74a !important;
    }

    .nota {
        padding: 10px;
        border-left: 6px solid;
        border-radius: 5px;
    }

    .dot {
        height: 13px;
        width: 13px;
        border-radius: 50%;
        display: inline-block;
        /* background-color: #b23cfd; */
    }

    /* In order to place the tracking correctly */
    canvas.drawing,
    canvas.drawingBuffer {
        position: absolute;
        left: 0;
        top: 10;
        width: 100%;
        /* height: 100%; */
    }

    video {
        width: 100%;
        /* height: 100%; */
    }

    @media (max-width: 400px) {
        #barcode {
            max-width: 200px;
        }
    }

    .swal2-content {
        padding: 0;
    }

    .swal2-popup {
        padding: 1.0em;
    }
    /* style="max-width: 200px;" */
</style>

<!-- <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v6.0.0-beta1/css/all.css"> -->


<title>Salud los Álamos - Solicitudes</title>
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


                <div class="container-fluid" style="padding-bottom: 25px;">

                    <div class="row justify-content-center pt-3 pb-3">
                        <div class="col-lg-3 col-md-6 mb-lg-0">
                            <!-- Card-->
                            <div class="card rounded shadow-sm border-0">
                                <div class="card-body p-0">
                                    <div class="bg-warning px-5 py-3 text-center card-img-top"><span class="mb-2 d-block mx-auto"><i class="fab fa-readme" style="font-size: 55px;color:white;"></i></span>
                                        <h5 class="text-white mb-0">Listado de solicitudes</h5>
                                        <p class="small text-white mb-0">Se presentan las solicitudes hechas por los pacientes desde su cuenta de farmacia en linea.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-center text-center pt-5">
                        <div class="col-xl-3"></div>
                        <div class="col-xl-9">
                            <div class="row">

                                <div class="col-lg-5">
                                    <label>Generar informe (G.I): </label>
                                    <span class="badge badge-success" style="padding: 5px;"><i class="fa fa-file-excel-o"></i> G.I en Excel</span>
                                    <span class="badge badge-danger" style="padding: 5px;"><i class="fa fa-file-pdf-o"></i> G.I en PDF</span>
                                    <span class="badge badge-info" style="padding: 5px;"><i class="fa fa-print"></i> Imprimir</span>
                                </div>
                                <div class="col-lg-2"></div>
                                <div class="col-lg-5">
                                    <label>Acciones: </label>
                                    <span class="badge badge-warning" style="padding: 5px;"><i class='fas fa-file-signature'></i> Detalle de solicitud</span>
                                    <span class="badge badge-info" style="padding: 5px;"><i class="fas fa-truck"></i> En tránsito</span>
                                    <span class="badge badge-success" style="padding: 5px;"><i class="fas fa-home"></i> Entregado</span>
                                    <span class="badge badge-brown" style="padding: 5px;"><i class="fas fa-scroll"></i> Ver Boleta</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-center pt-4">

                        <div class="col-xl-3 col-sm-12 pb-2">
                            <div class="card shadow-sm">
                                <div class="card-body text-center" id="camera" onclick="lectordebarra();">
                                    <div class="pt-4"></div>
                                    <svg version="1.1" id="barcode" width="350" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 122.88 97.04" style="enable-background:new 0 0 122.88 97.04" xml:space="preserve">
                                        <g>
                                            <path d="M2.38,0h18.33v4.76H4.76V17.2H0V2.38C0,1.07,1.07,0,2.38,0L2.38,0z M17.92,16.23h8.26v64.58h-8.26V16.23L17.92,16.23z M69.41,16.23h5.9v64.58h-5.9V16.23L69.41,16.23z M57.98,16.23h4.42v64.58h-4.42V16.23L57.98,16.23z M33.19,16.23h2.51v64.58h-2.51 V16.23L33.19,16.23z M97.59,16.23h7.37v64.58h-7.37V16.23L97.59,16.23z M82.32,16.23h8.26v64.58h-8.26V16.23L82.32,16.23z M42.71,16.23h8.26v64.58h-8.26V16.23L42.71,16.23z M4.76,79.84v12.44h15.95v4.76H2.38C1.07,97.04,0,95.98,0,94.66V79.84H4.76 L4.76,79.84z M103.4,0h17.1c1.31,0,2.38,1.07,2.38,2.38V17.2h-4.76V4.76H103.4V0L103.4,0z M122.88,79.84v14.82 c0,1.31-1.07,2.38-2.38,2.38h-17.1v-4.76h14.72V79.84H122.88L122.88,79.84z" />
                                        </g>
                                        <g></g>
                                    </svg>
                                    <label class="pt-1" style="font: 20px monospace" text-anchor="middle" x="156" y="120">¡Haga click aquí!</label> <br>
                                    <label><small>Por favor, acerca el código de barra </small><label>
                                </div>

                                <div class="row justify-content-center pb-3">
                                    <div class="col-xl-6 col-sm-12" id="botoncerrar"></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-9 col-sm-12">
                            <div class="card shadow mb-4 pb-2">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="tabla_solicitudes" class="table">
                                            <!--table-striped table-condensed -->
                                            <thead class="bg-warning text-center" style="color:white">
                                                <tr>
                                                    <th scope="col" title="Tiempo de espera en Dias"><i class="fas fa-stopwatch-20"></i> ESPERA</th>
                                                    <th scope="col" title="Número de seguimiento"># SEGUIMIENTO</th>
                                                    <th scope="col" title="R.U.T del Paciente">RUT PACIENTE</th>
                                                    <th scope="col" title="Nombre del Paciente">NOMBRE PACIENTE</th>
                                                    <th scope="col" title="Fecha de la solicitud">FECHA SOLICITUD</th>
                                                    <th scope="col" title="Estado de seguimiento">ESTADO SEGUIMIENTO</th>
                                                    <th scope="col">ACCIONES</th>
                                                </tr>
                                            </thead>
                                            <tbody class="text-center">
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="row justify-content-center">
                                <div class="row justify-content-center col-xl-10 col-sm-12">
                                    <div class="col"><i style="color: #86ecf9;" class="fa fa-circle" aria-hidden="true"></i> 0-2 días</div>
                                    <div class="col"><i style="color: #ffa900;" class="fa fa-circle" aria-hidden="true"></i> 3-7 días</div>
                                    <div class="col"><i style="color: #00b74a;" class="fa fa-circle" aria-hidden="true"></i> 8-15 días</div>
                                    <div class="col"><i style="color: #f93154;" class="fa fa-circle" aria-hidden="true"></i> 16-30 días</div>
                                    <div class="col"><i style="color: #b23cfd;" class="fa fa-circle" aria-hidden="true"></i> +30 días</div>
                                    <div class="col"><i style="color: #1266f1;" class="fas fa-check-circle" aria-hidden="true"></i> Respondida</div>
                                </div>
                            </div>

                        </div>
                    </div>


                    <!-- <div class="row pt-4">
                        <div class="col-lg-6">
                            <p class="nota nota-roja">
                                <strong>Nota:</strong> If you need more advanced examples and options, see the links below.
                            </p>
                        </div>
                    </div> -->


                </div>
                <!--FIN DEL ROW -->
            </div>
            <!-- End of Content Wrapper -->
            <?php include '../dashboard/footer.php'; ?>
        </div>
        <!-- End of Page Wrapper -->
    </div>




    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>




    <!-- CAMBIAR EL ITEM DEL NAVBAR SELECCIONADO -->
    <script>
        $("#solicitudes").attr('class', 'nav-item active');
    </script>




    <!--<script src="assets/bootstrap/js/bootstrap.min.js"></script>-->
    <script src="../js/validaciongeneral.js"></script>
    <script src="../js/funcionswal.js"></script>
    <script src="../../jsdashboard/sb-admin-2.min.js"></script>
    <script src="js/funciones.js"></script>
    <script src="js/solicitudes.js"></script>

    <script src="js/qua.min.js"></script>

    <script>
        var sonido = new Audio("beep.mp3");
        // let a;

        function lectordebarra() {

            var i = 0;
            $('#camera').html('<div class="pb-2"> Escaneando <i class="fas fa-circle fa-flash text-danger" style="font-size:13px"></i></div>');
            $('#botoncerrar').html('<button class="btn btn-danger btn-block" onclick="detenerScaneo()">Detener</button>');
            Quagga.init({
                inputStream: {
                    name: "Live",
                    type: "LiveStream",
                    target: document.querySelector('#camera')
                },
                frequency: 4,
                decoder: {
                    readers: ["code_128_reader"], //General: ean_reader | Código que genera los medicamentos: code_128_reader
                    // debug: {
                    //   showCanvas: true,
                    //   showPatches: true,
                    //   showFoundPatches: true,
                    //   showSkeleton: true,
                    //   showLabels: true,
                    //   showPatchLabels: true,
                    //   showRemainingPatchLabels: true,
                    //   boxFromPatches: {
                    //     showTransformed: true,
                    //     showTransformedBox: true,
                    //     showBB: true
                    //   }
                    // }
                }
            }, function(err) {
                if (err) {
                    alertify.error('' + err);
                    console.log(err);
                    return
                }
                console.log("Listo para empezar");
                Quagga.start();
            });

            // Dibujo del escaneador
            Quagga.onProcessed(function(result) {
                var drawingCtx = Quagga.canvas.ctx.overlay,
                    drawingCanvas = Quagga.canvas.dom.overlay;

                if (result) {
                    if (result.boxes) {
                        drawingCtx.clearRect(0, 0, parseInt(drawingCanvas.getAttribute("width")), parseInt(drawingCanvas.getAttribute("height")));
                        result.boxes.filter(function(box) {
                            return box !== result.box;
                        }).forEach(function(box) {
                            Quagga.ImageDebug.drawPath(box, {
                                x: 0,
                                y: 1
                            }, drawingCtx, {
                                color: "green",
                                lineWidth: 2
                            });
                        });
                    }

                    if (result.box) {
                        Quagga.ImageDebug.drawPath(result.box, {
                            x: 0,
                            y: 1
                        }, drawingCtx, {
                            color: "#00F",
                            lineWidth: 2
                        });
                    }

                    if (result.codeResult && result.codeResult.code) {
                        Quagga.ImageDebug.drawPath(result.line, {
                            x: 'x',
                            y: 'y'
                        }, drawingCtx, {
                            color: 'red',
                            lineWidth: 3
                        });
                    }
                }
            });
            // Dibujo del escaneador

            Quagga.onDetected(function(data) {
                i++;
                sonido.play();
                if (i == 1) {
                    // alertify.success('' + data.codeResult.code + 'cont: ' + i);
                    console.log(data.codeResult.code);
                    Quagga.stop();
                    restaurar();
                    tablasolicitudes.search(data.codeResult.code).draw();
                    //   document.querySelector('#mostrar-resultado').innerText = data.codeResult.code;
                    return;
                }

            });
        }

        function detenerScaneo() {
            Quagga.stop();
            restaurar();
        }

        function restaurar() {
            $('#botoncerrar').html(``);
            $('#camera').html(`
                <div class="pt-4"></div>
                    <svg version="1.1" id="barcode" width="350" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 122.88 97.04" style="enable-background:new 0 0 122.88 97.04" xml:space="preserve">
                                <g>
                                    <path d="M2.38,0h18.33v4.76H4.76V17.2H0V2.38C0,1.07,1.07,0,2.38,0L2.38,0z M17.92,16.23h8.26v64.58h-8.26V16.23L17.92,16.23z M69.41,16.23h5.9v64.58h-5.9V16.23L69.41,16.23z M57.98,16.23h4.42v64.58h-4.42V16.23L57.98,16.23z M33.19,16.23h2.51v64.58h-2.51 V16.23L33.19,16.23z M97.59,16.23h7.37v64.58h-7.37V16.23L97.59,16.23z M82.32,16.23h8.26v64.58h-8.26V16.23L82.32,16.23z M42.71,16.23h8.26v64.58h-8.26V16.23L42.71,16.23z M4.76,79.84v12.44h15.95v4.76H2.38C1.07,97.04,0,95.98,0,94.66V79.84H4.76 L4.76,79.84z M103.4,0h17.1c1.31,0,2.38,1.07,2.38,2.38V17.2h-4.76V4.76H103.4V0L103.4,0z M122.88,79.84v14.82 c0,1.31-1.07,2.38-2.38,2.38h-17.1v-4.76h14.72V79.84H122.88L122.88,79.84z" />
                                </g>
                                <g></g>
                    </svg>
                    <label class="pt-1" style="font: 20px monospace" text-anchor="middle" x="156" y="120">¡Haga click aquí!</label> <br>
                    <label><small>Por favor, acerca el código de barra</small><label>
            `);
        }
    </script>


    <script src="../../assets/datatables/datatables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>

</body>

</html>