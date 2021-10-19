<?php session_start();
$usuario;
$rol = $_SESSION['sesionCESFAM']['id_rol'];
if (isset($_SESSION['sesionCESFAM']) && ($rol == 7 || $rol == 8 ||  $rol == 11 || $rol == 12 || $rol == 13 || $rol == 15)) { 
    //puede entrar el Jefe de sector, Jefe de unidad, Director, encargado de personal, Jefe sistema salud, Jefe subrogante
    $usuario = $_SESSION['sesionCESFAM'];
} else { //SINO LO REDIRIGE AL INDEX
    header("Location:../indice/");
}
?>
<?php
include '../conexion/conexion.php';

include '../dashboard/head.php'; ?>

<title>Salud los Álamos - Solicitudes de permiso Administrativo</title>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
<link rel="stylesheet" href="css/estilolista.css">
<link rel="stylesheet" href="../../css/estilofile.css">
<style>
    #letra {
        color: #9e9e9e;
        font-family: 'Raleway', sans-serif;
        font-weight: 800;
        /* line-height: 72px; */
        /* margin: 0 0 24px; */
        text-align: center;
        text-transform: uppercase;
    }

    #content {
        background-color: #ffffff;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='800' height='800' viewBox='0 0 200 200'%3E%3Cdefs%3E%3ClinearGradient id='a' gradientUnits='userSpaceOnUse' x1='88' y1='88' x2='0' y2='0'%3E%3Cstop offset='0' stop-color='%2300544c'/%3E%3Cstop offset='1' stop-color='%23008679'/%3E%3C/linearGradient%3E%3ClinearGradient id='b' gradientUnits='userSpaceOnUse' x1='75' y1='76' x2='168' y2='160'%3E%3Cstop offset='0' stop-color='%238f8f8f'/%3E%3Cstop offset='0.09' stop-color='%23b3b3b3'/%3E%3Cstop offset='0.18' stop-color='%23c9c9c9'/%3E%3Cstop offset='0.31' stop-color='%23dbdbdb'/%3E%3Cstop offset='0.44' stop-color='%23e8e8e8'/%3E%3Cstop offset='0.59' stop-color='%23f2f2f2'/%3E%3Cstop offset='0.75' stop-color='%23fafafa'/%3E%3Cstop offset='1' stop-color='%23FFFFFF'/%3E%3C/linearGradient%3E%3Cfilter id='c' x='0' y='0' width='200%25' height='200%25'%3E%3CfeGaussianBlur in='SourceGraphic' stdDeviation='12' /%3E%3C/filter%3E%3C/defs%3E%3Cpolygon fill='url(%23a)' points='0 174 0 0 174 0'/%3E%3Cpath fill='%23000' fill-opacity='0.29' filter='url(%23c)' d='M121.8 174C59.2 153.1 0 174 0 174s63.5-73.8 87-94c24.4-20.9 87-80 87-80S107.9 104.4 121.8 174z'/%3E%3Cpath fill='url(%23b)' d='M142.7 142.7C59.2 142.7 0 174 0 174s42-66.3 74.9-99.3S174 0 174 0S142.7 62.6 142.7 142.7z'/%3E%3C/svg%3E");
        background-attachment: fixed;
        background-repeat: no-repeat;
        background-position: top left;
    }

    .bg_verdeOscuro{
        background-color: #009688;
    }

    .btn_verdeOscuro{
        background-color: #009688;
        color: #ffffff;
    }

    .btn_verdeOscuro:hover{
        background-color: #047369;
        color: #ffffff;
    }
</style>

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


                <div class="container-fluid" style="padding-bottom: 20px;">

                    <div class="row justify-content-center pb-3">
                        <div class="col-1"></div>
                        <div class="col-lg-3 col-md-6 mb-lg-0 pl-4">
                            <!-- Card-->
                            <div class="card rounded shadow-sm border-0"> 
                                <div class="card-body p-0">
                                    <div class="bg_verdeOscuro px-3 py-1 pt-3 text-center card-img-top"><span class="mb-2 d-block mx-auto"><i class="icofont-ebook" style="font-size: 55px;color:white;"></i></span>
                                        <p class="text-white mb-0">Solicitudes De Permiso Administrativo</p>
                                        <!-- <p class="small text-white mb-0">¡Hola estimado(a)!</p> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-2"></div>
                    </div>

                    <!-- <div class="row">
                        <div class="col-xl-12 col-sm-12">
                            <div class="card" style="border-top: 5px solid #607d8b;">
                                <div class="card-body">
                                    <form id="formulario">
                                        <div class="row justify-content-between text-left pl-2">
                                            <div class="col-xl-12 col-sm-12">
                                                <label class="form-control-label" style="font-weight: 300;font-size:20px">Filtrar por parámetros presentados </label>
                                            </div>
                                        </div>

                                        <div class="card shadow-sm">
                                            <div class="card-body">
                                                <div class="row justify-content-center text-center">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div> -->

                    <!-- <div class="row justify-content-center pt-2">
                        <div class="col-2 pl-4">
                            <button type="button" class="btn btn-outline-danger" id="speechToText" onclick="record()"> <i class="fas fa-microphone"></i></button>
                        </div>
                    </div> -->

                    <!-- <div class="row col-10 justify-content-end">
                        <label class="btn btn-info btn-sm shadow-sm" onclick="botonprobarcertificado(1)" style="border-radius: 15px 15px 15px 0px;height:35px; width:120px;"><i class="fas fa-plus-circle fa-sm text-white-100 pr-2" style="font-size: 25px;"></i><i class="fas fa-user-injured fa-sm text-white-50" style="font-size: 15px;"></i>
                        </label>
                    </div> -->



                    <!-- <section class="content inbox"> -->

                    <div class="content inbox row justify-content-center pt-3">

                        <div class="col-xl-4 col-sm-12 pb-3" id="columna1" hidden>
                            <div class="card border-left-0 border-bottom-0 border-right-0" style="border-top: 5px solid #009688;background:transparent;">
                                <div class="card-body">
                                    <div class="card shadow-sm">
                                        <div class="card-body">

                                            <div class="form-group">
                                                <div class="input-group">
                                                    <!--<span>Filtrar</span>-->
                                                    <label class="btn btn_verdeOscuro form-control col-sm-4" for="filtrador" title="Filtrar"><i class="fas fa-filter"></i> </label>
                                                    <input type="text" class="form-control" id="filtrador" placeholder="Filtrar como..." aria-describedby="basic-addon3" maxlength="100" onkeypress="return sololetrasynumeros(event)" onpaste="return false">

                                                    <div class="input-group-append">
                                                        <button type="button" class="btn btn-outline-success" id="botongrabador" title="Filtrar por voz" > <i class="fas fa-microphone"></i></button>
                                                    </div>
                                                </div>

                                            </div>

                                            <div style="padding: 5%;">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <!--<span>Paginador</span>-->
                                                        <label class="btn bg-grisclaro form-control col-4 text-white" for="paginador" title="Paginador"><i class="fas fa-sort"></i> </label>
                                                        <select class="form-control" id="paginador" onchange="cambioselect(this.value)" required>
                                                            <option value="">Seleccione un permiso</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="col-xl-5 col-sm-12 pb-2" id="columna2" hidden>
                            <div class="card border-bottom-0 border-left-0 border-right-0" style="border-top: 5px solid #009688;background:transparent;">
                                <div class="card-body">
                                    <div class="card shadow-sm" id="contenidocard">
                                        <ul class="mail_list list-group list-unstyled" id="contenidodelalista"></ul>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-xl-3 col-sm-12 text-center" id="divcertificados" hidden>
                            <div class="card border-bottom-0 border-left-0 border-right-0" style="border-top: 5px solid #009688;background:transparent;">
                                <div class="card-body">
                                    <div class="card shadow-sm">
                                        <!-- TABLA CON CERTIFICADOS -->
                                        <div class="card-body">
                                            <span class="pt-2" id="letra" style="font-size: 19px;">PERMISOS APROBADOS</span>
                                            <div class="table-responsive pt-2">
                                                <table id="tabla_certificado" class="table">
                                                    <thead class="bg-grisclaro text-center" style="color:white">
                                                        <tr>
                                                            <!-- <th scope="col">RUT</th> -->
                                                            <th scope="col">NOMBRE</th>
                                                            <th class="bg-success" scope="col">VER</th>
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
                        </div>


                    </div>
                    <!-- </section> -->


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
            $("#solicitudpermisoadministrativo").attr('class', 'nav-item active');
        </script>


        <script src="../js/validaciongeneral.js"></script>
        <script src="../js/funcionswal.js"></script>
        <script src="../../jsdashboard/sb-admin-2.min.js"></script>
        <script src="js/funciones.js"></script>
        <script src="../../assets/datatables/datatables.min.js"></script>
        <script src="js/tabla_soli_SPA.js"></script>
        <script src="js/swalAprobacion.js"></script>

        <script>
            var rut = "<?php echo $usuario['rut'] ?>";
            var rol = "<?php echo $usuario['id_rol'] ?>";
            var maximo = 5;
            var largodearray = 0;
            var artxpaginas = 0;


            LlenadoSelect();
            LlenarDatos('', maximo); //mostrar datos

            $('#filtrador').keyup(function(e) {
                let entradainput = $(this).val();
                let valorselect = $('#paginador').val();

                // toastr.error("Entrada input: " + entradainput + " Valor Select: " + valorselect);

                //En largodearray toma el valor llenado desde la función LlenadoSelect()

                if (e.which == 8 || e.which == 46) { //detecta las teclas cuando borro para que actualice los datos
                    LlenarDatos('', valorselect); //para limitar la busqueda hasta el valor seleccionado en el select
                } else {
                    LlenarDatos(entradainput, largodearray);
                }
            });



            function aprobar(valor) {
                let valorrecibido = valor.split(',');
                alertaAprobORechazo(valorrecibido[1], 1, rol);
                // toastr.error(valorrecibido[1]);
            }

            function rechazar(valor) {
                let valorrecibido = valor.split(',');
                alertaAprobORechazo(valorrecibido[1], 2, rol);
                // toastr.error(valor);
            }
        </script>

        <script>
            var toogled = false;

            // document.getElementById("botongrabador").addEventListener("click", holafun, false);

            if ("webkitSpeechRecognition" in window) {

                let speechRecognition = new webkitSpeechRecognition();

                speechRecognition.continuous = true;
                speechRecognition.interimResults = true;
                speechRecognition.lang = "es-CL";

                speechRecognition.onstart = () => {
                    toastr.info("Estoy escuchando");
                };
                speechRecognition.onerror = () => {
                    // toastr.info("Ha ocurrido un error");
                };
                speechRecognition.onend = () => {
                    toastr.info("Dejé de escuchar");
                };

                speechRecognition.onresult = (event) => {

                    for (let i = event.resultIndex; i < event.results.length; ++i) {
                        var trad;
                        trad = event.results[i][0].transcript;

                        $('#filtrador').val(trad);

                        if (event.results[i].isFinal) {
                            text = trad.trim();
                            LlenarDatos(text, largodearray);
                        }
                        // toastr.success("" + trad+"Largo: "+largodearray);
                    }
                };


                $("#botongrabador").click(function() {
                    if (!toogled) {
                        toogled = true;
                        speechRecognition.start();
                        // toastr.success("1");
                    } else {
                        toogled = false;
                        speechRecognition.stop();
                        // toastr.success("2");
                    }
                });
            } else {
                toastr.error("Reconocedor de voz no disponible en este dispositivo");
                // console.log("Speech Recognition Not Available");
            }
        </script>


</body>

</html>