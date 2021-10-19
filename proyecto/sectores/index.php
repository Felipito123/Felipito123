<?php session_start();
include '../partes/head.php';
?>
<link rel="stylesheet" href="../../css/lineadetiempo.css">
<style>
    .scroll {
        max-height: 350px;
        overflow-y: auto;
    }

    #scrolearrojo::-webkit-scrollbar {
        width: 7px;
        background-color: #e84c47;
    }

    #scrolearrojo::-webkit-scrollbar-thumb {
        background-color: #8e3d3a;
        border-radius: 10px;
    }

    #scrolearverde::-webkit-scrollbar {
        width: 7px;
        background-color: #4bd9bf;
    }

    #scrolearverde::-webkit-scrollbar-thumb {
        background-color: #37ab96;
        border-radius: 10px;
    }

    #scrolearamarillo::-webkit-scrollbar {
        width: 7px;
        background-color: #ff9e09;
    }

    #scrolearamarillo::-webkit-scrollbar-thumb {
        background-color: #b3710c;
        border-radius: 10px;
    }

    #scrolearazul::-webkit-scrollbar {
        width: 7px;
        background-color: #ff9e09;
    }

    #scrolearazul::-webkit-scrollbar-thumb {
        background-color: #b3710c;
        border-radius: 10px;
    }

    /* Tamaños del navbar para celulares adaptable */
    @media (max-width: 320px) {
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
    }
</style>
<title>Salud los Álamos - Sectores</title>
</head>



<body style="background-color: #f4f1f1; ">
    <!--f4f1f1 -->
    <?php include '../partes/navbar.php'; ?> </div>

    <div class="container-fluid" style="padding-top:80px;padding-bottom:30px;">
        <!-- For Demo Purpose-->
        <header class="text-center">
            <!-- <h1 class="display-4" style=" font-size: 50px; font-weight: 700;margin: 0;padding-top: 25px;">Sect<span style="color:#9AD1D4;">ores</span></h1> -->
            <h1 class="font-weight-bold mb-2" id="titulosectores" style="color: #6a97bd;font-size: 50px;">Sect<span style="color:#90bde4;">ores</span></h1>
            <p>Aquí, puedes encontrar información sobre cada sector.</p>
        </header>

        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="main-timeline">
                        <div class="timeline">
                            <span class="icon fa fa-globe"></span>
                            <label class="timeline-content">
                                <h3 class="title">Sector Rojo</h3>
                                <label class="description scroll text-white p-3" id="scrolearrojo" style="font-weight:500;">
                                    Cerro Alto es la segunda localidad en jerarquía como centro urbano y en él se localiza principalmente el comercio carretero.
                                    La localidad de Cerro Alto ubicada a 5 km del sector de Los Álamos es atravesada por la ruta 160, siendo el punto de divergencia para los caminos hacia las comunas de Lebu y Cañete.
                                    <br><br>
                                    Cuenta con dos Escuelas Básicas Municipales con enseñanza desde PreKinder hasta 8° Básico. También cuenta con 2 Establecimientos con Sala Cuna y Jardín, un Establecimiento que funciona solo como Sala Cuna, y un Establecimiento que funciona solo como Jardín.
                                    También Cerro Alto cuenta con una Compañía de Bomberos (3° Compañía), y recientemente con una Oficina de Guardia de Carabineros.
                                    <br><br>
                                    En el Área de comercio existen actualmente 2 supermercados, y aproximadamente 16 minimarket, una carnicería, 3 verdulerías, 3 ferreterías. <br><br>
                                    En el área de Salud cuenta con una Posta de Salud Rural y un Cecosf (Centro Comunitario de Salud Familiar) dependientes del Cesfam Los Álamos. <br><br>
                                    El proceso de sectorización de la comuna en cuatro sectores a cargo de sus respectivos equipos de cabecera, conducida por el modelo de salud familiar lleva a que el Sector Rojo este compuesto por las localidades de Cerro Alto y Villa Los Ríos, siendo esta ultima una localidad con menor concentración de población y cuenta sólo con una Escuela Básica desde PreKinder hasta 8°Basico. <br>


                                    <div class="pt-2 pb-2" style="font-weight:500;font-size:17px">
                                        <strong>Población actual: 5.950 </strong>
                                    </div>

                                    <div class="pb-2" style="font-weight:500;font-size:17px">
                                        <strong>Lugares principales:</strong>
                                    </div>

                                    <li> <strong> Cerro Alto Norte, Centro y Sur. </strong></li>
                                    <li> <strong> Villa Los Ríos </strong> </li>
                                    <li> <strong> Trongol bajo </strong></li>

                                    <div class="pt-2 pb-2" style="font-weight:500;font-size:17px"><strong>El Sector Rojo está delimitado en:</strong></div>

                                    <li> <strong> Norte: </strong> Rio Trongol </li>
                                    <li> <strong> Sur: </strong> Sector Complejo Policial de Carabineros en Cerro Alto y Bajo Camino de Tres Pinos </li>
                                    <li> <strong> Este: </strong> Sector Pata de Vaca </li>
                                    <li> <strong> Oeste: </strong> Limite geográfico valle de Tres Pinos </li>

                                    <div class="pt-1 pb-2">Según esta división se contabiliza para la programación del año 2013 un total de 6.237 personas inscritas con previsión de FONASA, y un total de 2.228 familias inscritas en el sector</div>

                                    <div class="pt-3 pb-2" style="font-weight:500;font-size:17px"><strong>Tipos de transporte y frecuencia de recorrido</strong></div>

                                    <div class="pt-1">La locomoción en este sector es bastante fluida por ser punto intermedio entre las Comuna de Cañete, Lebu y Curanilahue, contando con buses de capacidad para 25 personas aprox cada 10 o 15 minutos con destino a Lebu, Cañete y Arauco. Los buses interprovinciales con destino a Concepción circulan con una frecuencia aproximada de 30 minutos, siendo expresos o directos y de una capacidad de 40 pasajeros aprox. También existen vehículos de locomoción colectiva que circulan en el trayecto entre Cerro Alto y Los Álamos con una frecuencia de 5 minutos y una capacidad para 4 pasajeros.</div>
                                </label>
                            </label>
                        </div>

                        <div class="timeline">
                            <span class="icon fa fa-globe"></span>
                            <label class="timeline-content">
                                <h3 class="title">Sector Verde</h3>
                                <label class="description scroll text-white p-3" id="scrolearverde" style="font-weight:500;">

                                    El Sector Verde, corresponde al Sector Sur de Los Álamos, incluyendo las localidades rurales de Ranquilco, Sara de Lebu y Pangue.
                                    Los límites del Sector Verde se distribuyen de la siguiente forma:

                                    <!-- <br> <br> -->

                                    <div class="pt-2 pb-2" style="font-weight:500;font-size:17px">
                                        <strong>Población actual: 5.800 </strong>
                                    </div>

                                    <div class="pb-2" style="font-weight:500;font-size:17px">
                                        <strong>Lugares principales:</strong>
                                    </div>

                                    <li> <strong> Los Álamos Centro </strong></li>
                                    <li> <strong> Población Caupolicán </strong> </li>
                                    <li> <strong> Pangue </strong></li>
                                    <li> <strong> Sara de Lebu </strong></li>
                                    <li> <strong> Ranquilco </strong></li>
                                    <li> <strong> Quillaitún </strong></li>

                                    <div class="pt-2 pb-2" style="font-weight:500;font-size:17px">
                                        <strong>Límites Sector Verde:</strong>
                                    </div>

                                    <li> <strong> Norte: </strong> Sector Amarillo </li>
                                    <li> <strong> Sur: </strong> Comuna de Cañete </li>
                                    <li> <strong> Este: </strong> Sector rojo y azul </li>
                                    <li> <strong> Oeste: </strong> Comuna de Lebu </li>

                                    <br>

                                    Nuestros usuarios del sector Verde urbano según Rayen, a Mayo del 2011, son 5716 personas, existiendo un número de 1769 familias, con un promedio de 3,2 integrantes por familia. <br><br>

                                    <div class="pb-2" style="font-weight:500;font-size:17px;"><strong>Intersector</strong></div>

                                    <div class="pb-2">En el sector verde se encuentran instituciones que prestan servicios a toda la comunidad de Los Álamos, tales como:</div>


                                    <div class="pb-2" style="font-weight:500;font-size:17px"><strong>Establecimientos Educacionales:</strong></div>

                                    <div class="pb-2">
                                        Liceo Cristo Redentor
                                        Jardín Infantol y Sala Cuna
                                        Liceo Caupolican
                                        Instituto Educacional Rural San Pablo
                                        Escuela Las Dunas de Pangue
                                        Jardin Infantil y Sala Cuna Rayen Antu de Pangue
                                        Escuela José Campos Menchaca de Sara de Lebu
                                        Escuela Tegualda de Ranquilco
                                    </div>

                                    <div class="pb-2" style="font-weight:500;font-size:17px"> <strong>Medios de Comunicación:</strong></div>

                                    <div class="pb-2">Radio Jerusalen</div>

                                    <div class="pb-2" style="font-weight:500;font-size:17px"> <strong>Comunidades, juntas de vecinos y organizaciones:</strong></div>

                                    <div class="pb-2">
                                        Kumec-che de Sara de lebu
                                        Peñi-Lamuen de Sara de Lebu
                                        Aukinco de Sara de Lebu
                                        Trauco –Pica de Sara de Lebu
                                        Juan Ñanco
                                        Grupo de Queseras de Ranquilco
                                        Iglesia Evangelica Pentecostal Ranquilco
                                        Iglesia Evangelica Cristiana Ranquilco
                                    </div>

                                    <div class="pb-2" style="font-weight:500;font-size:17px"> <strong>Áreas verdes y recreación:</strong></div>


                                    <div class="pb-2">
                                        <li> Bandejón central, ubicado en Población Caupolicán, el cual posee áreas verdes, juegos infantiles y multicancha </li>
                                        <li> Plazoleta en población nueva Caupolicán </li>
                                        <li> Cancha de carrera de caballos, ubicada en Quillaitún </li>
                                        <li> Multicancha ubicada en Quillaitún </li>
                                        <li> Dunas de Pangue, ubicada en Pangues </li>
                                        <li> Club de huasos de Ranquilco </li>
                                        <li> Zona de picnic Agua los Gansos </li>
                                        <li> Cancha de carrera Pate vaca </li>
                                        <li> Cancha de carreras de Ranquilco </li>
                                        <li> Dunas de Ranquilco </li>
                                        <li> Laguna de Pangue </li>
                                        <li> Cancha de carreras de autos, camino a Sara de Lebu </li>

                                    </div>

                                </label>
                            </label>
                        </div>

                        <div class="timeline">
                            <span class="icon fa fa-globe"></span>
                            <label class="timeline-content">
                                <h3 class="title">Sector Amarillo</h3>
                                <label class="description scroll text-white p-3" id="scrolearamarillo" style="font-weight:500;">


                                    <div class="pb-2">
                                        El Sector Amarillo, se encuentra ubicado en el lado norte de la Comuna de Los Álamos, su población está principalmente distribuida en zona urbana de tipo residencial de la comuna, teniendo una menor densidad poblacional en sus límites este y oeste que pueden ser considerados rurales.
                                    </div>

                                    <div class="pt-2 pb-2" style="font-weight:500;font-size:17px">
                                        <strong>Población actual: 4.480 </strong>
                                    </div>

                                    <div class="pb-2" style="font-weight:500;font-size:17px">
                                        <strong>Lugares principales:</strong>
                                    </div>

                                    <li> <strong> Los Álamos Norte </strong></li>
                                    <li> <strong> Población Los Canelos </strong> </li>
                                    <li> <strong> Población Simón Carvallo </strong></li>


                                    <div class="pt-2 pb-2" style="font-weight:500;font-size:17px">
                                        <strong>Límites Sector Amarillo:</strong>
                                    </div>

                                    <li> <strong> Norte: </strong> Río Cupaño </li>
                                    <li> <strong> Sur: </strong> Calle Ignacio Carrera Pinto </li>
                                    <li> <strong> Este: </strong> Sector La Virgen (Agua Los Gansos) </li>
                                    <li> <strong> Oeste: </strong> Comuna de Lebu </li>

                                    <div class="pb-2">
                                        De acuerdo a estos límites la población del Sector Amarillo corresponde a un total de 4917 hab. De los cuales 1012 hab. Correspondenal área centro norte de Los Álamos, 1315 hab.APob. Los Canelos y 2590 hab.A Pob. Simón Carvallo.
                                    </div>

                                    <div class="pb-2" style="font-weight:500;font-size:17px"><strong>Instituciones Públicas:</strong></div>

                                    <li> 1° Compañía de Bomberos de Los Álamos. Institución fundada el 25 de enero de 1972, ubicada en la calle Luis Sáez Mora # 415.</li>
                                    <li> Parroquia “San Juan María Vianney”. Fundada en el año 1954 por el padre José Ángel Bastías, se encuentra ubicada en calle 18 de Septiembre # 411 </li>
                                    <li> <strong> Este: </strong> Sector La Virgen (Agua Los Gansos) </li>
                                    <li> Tenencia de Carabineros de Los Álamos. Ubicada en Avenida Ignacio Carrera Pinto # 665 </li>


                                    <div class="pb-2" style="font-weight:500;font-size:17px"><strong>Establecimientos Educacionales:</strong></div>

                                    <li> Escuela Félix Eyheramendy F-1199 </li>
                                    <li> Jardín infantil y sala cuna “Las Araucarias </li>
                                    <li> Jardín Infantil “Mi Refugio Feliz” </li>

                                    <div class="pb-2" style="font-weight:500;font-size:17px"><strong>Medios de Comunicación:</strong></div>

                                    <li> Radio Doña Javiera (92.7fm) </li>
                                    <li> Radio Antares (102.7fm) </li>
                                    <li> Jardín Infantil “Mi Refugio Feliz” </li>

                                    <div class="pb-2" style="font-weight:500;font-size:17px"><strong>Juntas de Vecinos</strong></div>

                                    <li> Junta de Vecinos Gabriela Mistral </li>
                                    <li> Junta de vecinos estadio </li>
                                    <li> Junta de vecinos Simón Carvallo </li>
                                    <li> Junta de Vecinos Villa San Pedro </li>
                                    <li> Junta de Vecinos Silvia Chacón </li>
                                </label>
                            </label>
                        </div>

                        <div class="timeline">
                            <span class="icon fa fa-globe"></span>
                            <label class="timeline-content">
                                <h3 class="title">Sector Azul</h3>
                                <label class="description scroll text-white p-3" id="scrolearazul" style="font-weight:500;">
                                    <div class="pb-2">
                                        El Sector Azul, se encuentra ubicado en el lado Oeste de la Comuna de Los Álamos, su población está principalmente distribuida en zona urbana de tipo residencial de la comuna, teniendo una menor densidad poblacional en sus límite oeste que pueden ser considerados rurales.
                                    </div>

                                    <div class="pt-2 pb-2" style="font-weight:500;font-size:17px">
                                        <strong>Población actual: 4.770 </strong>
                                    </div>

                                    <div class="pb-2" style="font-weight:500;font-size:17px">
                                        <strong>Lugares principales:</strong>
                                    </div>

                                    <li> <strong> Tres Pinos </strong></li>
                                    <li> <strong> Antihuala </strong> </li>
                                    <li> <strong> La Araucana </strong></li>
                                    <li> <strong> Temuco chico </strong></li>
                                    <li> <strong> Caramavida </strong></li>
                                </label>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- CAMBIAR EL ITEM DEL NAVBAR SELECCIONADO -->
    <script>
        $("#sectores").attr('class', 'nav-item active');
    </script>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> -->

    <script src="../js/tether.min.js"></script>
</body>

</html>