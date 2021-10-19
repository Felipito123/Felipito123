<?php session_start(); ?>
<?php include '../partes/head.php';
include '../partes/encriptacion.php'; ?>

<link href="assets/css/material-kit.css?v=2.0.7" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />

<title>Salud los Álamos - Plan Nacional De Cáncer</title>

<style>
    /*DIFUMINAR LA CARGA DEL DEL FRAME DEL MAPA DE SECTORIZACIÓN*/
    .blur {
        filter: blur(10px);
        transition: all 1s;
    }

    .noblur {
        transition: all 3s;
    }


    /* Tamaños del navbar para celulares adaptable */
    /* @media (max-width: 320px) {
        .navbar {
            width: 320px;
        }
    }

    @media (min-width: 321px) and (max-width: 360px) {
        .navbar {
            width: 360px;
        }
    }

    @media (min-width: 361px) and (max-width: 375px) {
        .navbar {
            width: 375px;
        }
    }

    @media (min-width: 376px) and (max-width: 411px) {
        .navbar {
            width: 411px;
        }
    }

    @media (min-width: 412px) and (max-width: 414px) {
        .navbar {
            width: 414px;
        }
    } */

    a:hover {
        text-decoration: none;
        opacity: 0.7;
    }

    .footer {
        bottom: 0;
        width: 100%;
        height: 100px;
        line-height: 80px;
        border-bottom: 20px solid #655193;
        background-color: #655193;
    }

    #contenedorgeneral {
        font-family: 'Source Sans Pro', sans-serif;
        font-size: 16px;
        /* background: #b8e8ff;
        background: -moz-linear-gradient(top, #b8e8ff 0%, #ffffff 100%);
        background: -webkit-linear-gradient(top, #b8e8ff 0%, #ffffff 100%);
        background: linear-gradient(to bottom, #b8e8ff 0%, #ffffff 100%);
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#b8e8ff', endColorstr='#ffffff', GradientType=0); */
    }

    h1 {
        /*Agrega una barrita roja en el H1*/
        font-size: 1.6em;
        font-weight: 700;
        background: url(img/linea_h1.svg) left bottom no-repeat;
        padding: 0 0 10px;
        margin: 0 0 40px 0;
    }


    /*===============================AQUI EL ESTILO DE LAS TARJETAS==============================*/
    .card {
        background-color: #fff;
        border: none;
        border-radius: 10px;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)
    }

    .image-container {
        position: relative;
    }

    .thumbnail-image {
        border-radius: 10px !important;
        height: 350px;
    }

    .discount {
        background-color: #8d85b0;
        padding-top: 1px;
        padding-bottom: 1px;
        padding-left: 4px;
        padding-right: 4px;
        font-size: 10px;
        border-radius: 6px;
        color: #fff
    }

    .wishlist {
        height: 25px;
        width: 25px;
        background-color: #eee;
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 50%;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)
    }

    .first {
        position: absolute;
        width: 100%;
        padding: 9px
    }

    .voutchers {
        background-color: #fff;
        border: none;
        border-radius: 10px;
        width: 195px;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        overflow: hidden
    }

    .voutcher-divider {
        display: flex;
    }

    .voutcher-left {
        width: 70%
    }

    .voutcher-name {
        color: grey;
        font-size: 9px;
        font-weight: 500
    }

    .voutcher-code {
        color: #655193;
        font-size: 11px;
        font-weight: bold
    }

    .voutcher-right {
        width: 30%;
        background-color: #009899;
        color: #fff;
        padding-top: 7px;
    }

    .discount-percent {
        font-size: 12px;
        font-weight: bold;
        position: relative;
        top: 5px
    }

    .off {
        font-size: 14px;
        position: relative;
        bottom: 5px
    }

    .card-title {
        color: #5599b2;
        font-size: 26px;
        line-height: 1.54;
        font-weight: 900;
        margin-bottom: 24px;
    }

    .card-text {
        color: gray;
        font-size: 16px;
        line-height: 1.5;
        font-weight: 400;
        padding-bottom: 40px;
    }

    .btn-danger:hover {
        background-color: #ab2632;
        color: white;
    }

    .btn-coloraccion1 {
        color: #fff;
        background-color: #8d85b0;
        border-color: #8d85b0;
    }

    .btn-coloraccion2 {
        color: #fff;
        background-color: #009899;
        border-color: #009899;
    }

    .btn-coloraccion1:hover {
        color: #fff;
        background-color: #8d85b0;
        border-color: #8d85b0;
    }

    .btn-coloraccion2:hover {
        color: #fff;
        background-color: #009899;
        border-color: #009899;
    }

    .btn-coloraccion1:focus {
        color: #fff !important;
        background-color: #8d85b0 !important;
        border-color: #8d85b0 !important;
    }

    .btn-coloraccion2:focus {
        color: #fff !important;
        background-color: #009899 !important;
        border-color: #009899 !important;
    }
</style>

</head>


<!--
.profile-page .page-header // 700px; contiene el ancho o altura del fondo
.main-raised // contiene el ancho o altura de la tarjeta
-->


<body class="profile-page sidebar-collapse">

    <?php include '../partes/navbar.php'; ?>

    <!-- </div> -->

    <div class="page-header header-filter" style="background-image: url('https://cuidadores.unir.net/images/post/diamundialcancer.jpg');"></div>

    <div class="container-fluid">


        <div class="row justify-content-center">
            <div class="col-xl-9">

                <div class="main main-raised mb-4">

                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 ml-auto mr-auto">
                                <div class="profile">
                                    <div class="avatar">
                                        <img src="diamundial.png" alt="Circle Image" class="img-raised rounded-circle img-fluid">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="container-fluid" id="contenedorgeneral">


                        <div class="row justify-content-end">
                            <div class="col-xl-4 col-sm-4">
                                <div class='btn-group'>
                                    <button class="btn btn-coloraccion1" onclick="moverscroll('ejes');">Ejes de acción</button>
                                    <button class="btn btn-coloraccion2" onclick="Descargar('assets/archivos/plannacionaldelcancer.pdf','plannacionaldelcancer.pdf');" type="button">Descarga el acuerdo</button>
                                </div>
                            </div>
                        </div>

                        <div class="container">
                            <h2>PLAN NACIONAL DE CÁNCER</h2>
                            <p>La institucionalización del Plan Nacional de Cáncer, estará asociado a la conformación de programas
                                específicos, referidos al abordaje de cánceres prevalentes, contando cada uno de ellos con resolución jurídica por parte del Ministerio de Salud, asociados, además, a su vinculación con estadísticas
                                de población bajo control de los programas de salud propuestos, y la generación de informes periódicos específicos a las acciones de oncología a cargo de la División de Planificación Sanitaria,
                                constituyéndose esto en una herramienta fundamental para el monitoreo y cumplimiento de metas
                                para este Plan de Acción. </p>
                        </div>

                        <!----------------- LOGO ----------------->
                        <div class="row">
                            <div class="container">
                                <div class="row">
                                    <div class="col-xl-6 text-center">
                                        <img class="card-img-top text-center" src="assets/archivos/logo-cancer.png" alt="img-hero">
                                    </div>
                                    <div class="col-xl-6">
                                        <p class="intro" style="font-size: 25px; line-height: 40px;">El gobierno del Presidente Sebastián Piñera ha presentado el <strong>Plan Nacional de Cáncer</strong>, cuyo objetivo es disminuir tanto la incidencia como la mortalidad atribuibles a la enfermedad, a través de estrategias y acciones que <strong>faciliten la promoción, prevención, diagnóstico precoz, tratamiento, cuidados paliativos y seguimiento de pacientes, para mejorar su sobrevida, calidad de vida y la de sus familias y comunidades.</strong></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <br><br>

                        <div class="container">
                            <hr style="color: #009899; border: 2px solid #009899;">
                        </div>
                        <br><br>



                        <div class="row justify-content-center" id="ejes">
                            <div class="col-md-2 pb-2">
                                <div class="mt-3 pb-2">
                                    <div class="card voutchers">
                                        <div class="voutcher-divider">
                                            <div class="voutcher-left text-center"> <span class="voutcher-name">Juntos sumamos vida</span>
                                                <h5 class="voutcher-code"> <a href="https://twitter.com/search?f=tweets&amp;q=JuntosSumamosVida&amp;src=typd" target="_blank" style="color: #009899;">#JuntosSumamosVida</a></h5>
                                            </div>
                                            <div class="voutcher-right text-center border-left">
                                                <i class="fas fa-handshake pt-3" style="font-size: 28px;"></i>
                                                <!-- <h5 class="discount-percent">20%</h5> <span class="off">Off</span> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="image-container">
                                        <div class="first">
                                            <div class="d-flex justify-content-between align-items-center"> <span class="discount">Gobierno de Chile</span>
                                                <!-- <span class="wishlist"><i class="fa fa-heart-o"></i></span>  -->
                                            </div>
                                        </div>
                                        <img src="https://fundecor.es/images/imagenes_cursos/educacion_para_la_salud.jpg" class="img-fluid rounded thumbnail-image">
                                    </div>

                                    <div class="card-body">
                                        <div class="card-title text-center">
                                            Promoción, educación y prevención
                                        </div>
                                        <div class="card-text">
                                            Crear conciencia respecto a la importancia del cáncer y el rol de la sociedad civil en la prevención y tratamiento. <br><br>
                                            Fortalecer estilos de vida saludable para el autocuidado de la población, a través de la educación en salud, promoción de factores protectores y prevención de factores de riesgo. <br><br>
                                            Mejorar cobertura de inmunización como estrategia de prevención. Por ejemplo, la vacunación contra el virus del papiloma humano (VPH), que a partir de 2019 incluirá a niños hombres.
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-2 pb-2">
                                <div class="mt-3 pb-2">
                                    <div class="card voutchers">
                                        <div class="voutcher-divider">
                                            <div class="voutcher-left text-center"> <span class="voutcher-name">Juntos sumamos vida</span>
                                                <h5 class="voutcher-code"> <a href="https://twitter.com/search?f=tweets&amp;q=JuntosSumamosVida&amp;src=typd" target="_blank" style="color: #009899;">#JuntosSumamosVida</a></h5>
                                            </div>
                                            <div class="voutcher-right text-center border-left">
                                                <i class="fas fa-handshake pt-3" style="font-size: 28px;"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="image-container">
                                        <div class="first">
                                            <div class="d-flex justify-content-between align-items-center"> <span class="discount">Gobierno de Chile</span>
                                                <!-- <span class="wishlist"><i class="fa fa-heart-o"></i></span>  -->
                                            </div>
                                        </div> <img src="https://diarioenfermero.es/wp-content/uploads/2019/04/closeup-support-hands_53876-14963.jpg" class="img-fluid rounded thumbnail-image">
                                    </div>

                                    <div class="card-body">
                                        <div class="card-title text-center">
                                            Cuidados paliativos: un servicio fundamental
                                        </div>
                                        <div class="card-text">
                                            Garantizar una atención integral, oportuna y de calidad a todos los chilenos, con acceso a cuidados paliativos como un servicio fundamental para pacientes oncológicos. <br><br>
                                            Mejorar cobertura de tamizaje, mejorar oportunidad y calidad del diagnóstico, a través de un aumento en la cobertura de exámenes como Papanicolau, mamografías y de cáncer digestivo.
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-2 pb-2">
                                <div class="mt-3 pb-2">
                                    <div class="card voutchers">
                                        <div class="voutcher-divider">
                                            <div class="voutcher-left text-center"> <span class="voutcher-name">Juntos sumamos vida</span>
                                                <h5 class="voutcher-code"> <a href="https://twitter.com/search?f=tweets&amp;q=JuntosSumamosVida&amp;src=typd" target="_blank" style="color: #009899;">#JuntosSumamosVida</a></h5>
                                            </div>
                                            <div class="voutcher-right text-center border-left">
                                                <i class="fas fa-handshake pt-3" style="font-size: 28px;"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="image-container">
                                        <div class="first">
                                            <div class="d-flex justify-content-between align-items-center"> <span class="discount">Gobierno de Chile</span>
                                                <!-- <span class="wishlist"><i class="fa fa-heart-o"></i></span>  -->
                                            </div>
                                        </div> <img src="https://thumbs.dreamstime.com/b/tablero-y-lista-de-control-del-vector-con-la-marca-cotejo-tableta-negocio-el-formulario-inscripci%C3%B3n-terminado-115614354.jpg" class="img-fluid rounded thumbnail-image">
                                    </div>

                                    <div class="card-body">
                                        <div class="card-title text-center">
                                            Registro Nacional del cáncer
                                        </div>
                                        <div class="card-text">
                                            Fortalecer los sistemas de registro, información y vigilancia epidemiológica, para facilitar la generación,
                                            calidad y acceso a la información, a través de un Registro Nacional del Cáncer a partir del año 2020 que
                                            signifique un apoyo en la toma de decisiones en salud pública.
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-2 pb-2">
                                <div class="mt-3 pb-2">
                                    <div class="card voutchers">
                                        <div class="voutcher-divider">
                                            <div class="voutcher-left text-center"> <span class="voutcher-name">Juntos sumamos vida</span>
                                                <h5 class="voutcher-code"> <a href="https://twitter.com/search?f=tweets&amp;q=JuntosSumamosVida&amp;src=typd" target="_blank" style="color: #009899;">#JuntosSumamosVida</a></h5>
                                            </div>
                                            <div class="voutcher-right text-center border-left">
                                                <i class="fas fa-handshake pt-3" style="font-size: 28px;"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="image-container">
                                        <div class="first">
                                            <div class="d-flex justify-content-between align-items-center"> <span class="discount">Gobierno de Chile</span>
                                                <!-- <span class="wishlist"><i class="fa fa-heart-o"></i></span>  -->
                                            </div>
                                        </div> <img src="https://image.freepik.com/vector-gratis/prescripcion-medica-linea-rx-chequeo-medico-telefono-inteligente-ilustracion-medico-que-muestra-aplicacion-telefono-recetas-examenes-medicos-diagnostico-paciente-concepto-medicina-linea_165217-210.jpg" class="img-fluid rounded thumbnail-image">
                                    </div>

                                    <div class="card-body">
                                        <div class="card-title text-center">
                                            Calidad de los procesos clínicos
                                        </div>
                                        <div class="card-text">
                                            Fortalecer la rectoría, regulación y fiscalización para asegurar la calidad de los procesos
                                            clínicos establecidos para diagnóstico y tratamiento de personas con cáncer.
                                            También para asegurar los aspectos técnicos y de funcionamiento de equipos para una atención de calidad. <br> <br>
                                            Actualizar guías y protocolos de tratamiento en los 20 cánceres de mayor impacto.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 pb-2">
                                <div class="mt-3 pb-2">
                                    <div class="card voutchers">
                                        <div class="voutcher-divider">
                                            <div class="voutcher-left text-center"> <span class="voutcher-name">Juntos sumamos vida</span>
                                                <h5 class="voutcher-code"> <a href="https://twitter.com/search?f=tweets&amp;q=JuntosSumamosVida&amp;src=typd" target="_blank" style="color: #009899;">#JuntosSumamosVida</a></h5>
                                            </div>
                                            <div class="voutcher-right text-center border-left">
                                                <i class="fas fa-handshake pt-3" style="font-size: 28px;"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="image-container">
                                        <div class="first">
                                            <div class="d-flex justify-content-between align-items-center"> <span class="discount">Gobierno de Chile</span>
                                                <!-- <span class="wishlist"><i class="fa fa-heart-o"></i></span>  -->
                                            </div>
                                        </div> <img src="https://image.freepik.com/vector-gratis/icono-mapa-isometrico-ilustracion-puntero-pin-ubicacion-destino_108231-1.jpg" class="img-fluid rounded thumbnail-image">
                                    </div>

                                    <div class="card-body">
                                        <div class="card-title text-center">
                                            Mejoramiento de la red oncológica
                                        </div>
                                        <div class="card-text">
                                            Optimizar Centros Oncológicos de Alta complejidad en Antofagasta, Valparaíso, Santiago, Concepción y Valdivia, y sumar a la red 11 Centros de Complejidad a lo largo de Chile. <br><br>
                                            Formar cerca de 130 especialistas oncólogos para incorporarse a la red al año 2022. <br> <br>
                                            Invertir 20.000 millones de pesos anuales en equipamiento e infraestructura oncológica, hasta el año 2028, para asegurar acceso a prestaciones de calidad. <br><br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!----------------- BUTTON WITH ICON ----------------->
                        <div class="row pb-3">
                            <div class="container text-center">
                                <div class="col-12">
                                    <a href="assets/archivos/plannacionaldelcancer.pdf" target="_blank"><button class="btn btn-coloraccion1" style="font-size: 20px;"><i class="fas fa-cloud-download-alt"></i>&nbsp; Descarga el Acuerdo</button></a>
                                </div>
                            </div>
                        </div>


                        <!----------------- SECCION HASHTAG Y BOTÓN VOLVER ARRIBA ----------------->



                        <div class="row justify-content-center pt-3 pb-3">
                            <a class="btn rounded-pill" href="https://twitter.com/search?f=tweets&amp;q=chilecontraelc%C3%A1ncer&amp;src=typd" target="_blank" style="background-color: #009899;color:white;">
                                <h4><strong>#Chile</strong>Contra<strong>El</strong>Cáncer</h4>
                            </a>
                        </div>

                        <!-- FIN DEL ROW -->

                    </div>
                </div>
                <!----------------- FOOTER (LOGO Y REDES SOCIALES) ----------------->
                <footer class="footer">
                    <div class="container">
                        <div class="col-6 col-md-9 col-lg-9">
                            <a href="https://www.gob.cl/">
                                <img src="https://s3.amazonaws.com/gobcl-prod/filer_public/53/92/53927a9c-d2ec-4248-a00d-1e383a96ae51/logo.png" width="150px" alt="Gobierno de Chile">
                            </a>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </div>


    <a href="javascript:void(0)" class="back-to-top"><i class="icofont-simple-up" style="background: #1eceab;"></i></a>


    <!--   Core JS Files   -->
    <!-- <script src="../js/jquery.min.js"></script> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script> -->
    <script src="../js/tether.min.js"></script>
    <!-- <script src="assets/js/bootstrap-material-design.min.js" type="text/javascript"></script> -->
    <script src="assets/js/modalAuge.js"></script>
    <script src="../js/jquery.easing.min.js"></script>

    <script>
        function moverscroll(valor) {
            var altura = $("#" + valor).offset().top;

            $('html, body').animate({
                scrollTop: altura - 150
            }, 1500, 'easeInOutExpo');
        }

        function Descargar(url, filename) {
            // console.log("HAH " + filename);
            //Set the File URL.
            // var url = "../LibroRSF/archivos/"+""+IDCARPETA+"/"+""+filename;
            //Create XMLHTTP Request.
            var req = new XMLHttpRequest();
            req.open("GET", url, true);
            req.responseType = "blob";
            req.onload = function() {
                //Convert the Byte Data to BLOB object.
                var blob = new Blob([req.response], {
                    type: "application/octetstream"
                });

                //Check the Browser type and download the File.
                var isIE = false || !!document.documentMode;
                if (isIE) {
                    window.navigator.msSaveBlob(blob, fileName);
                } else {
                    var url = window.URL || window.webkitURL;
                    link = url.createObjectURL(blob);
                    var a = document.createElement("a");
                    a.setAttribute("download", filename);
                    a.setAttribute("href", link);
                    document.body.appendChild(a);
                    a.click();
                    document.body.removeChild(a);
                }
            };
            req.send();
        }
    </script>

    <script>
        // $(".navbar").css({"width": "320px"});
    </script>

    <!-- Core JavaScript
    ================================================== -->
    <!-- <script src="../js/jquery.min.js"></script>
    <script src="../js/tether.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/custom.js"></script> -->

</body>

</html>