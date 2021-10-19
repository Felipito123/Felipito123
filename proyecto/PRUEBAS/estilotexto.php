<?php
// session_start();
// if (isset($_SESSION['sesionCESFAM'])) { //VALIDA SI LA SESION ESTA INICIADAz
//     $rut = $_SESSION["sesionCESFAM"]["rut"];
// } else { //SINO LO REDIRIGE AL INDEX
//     header("Location:../inicio/");
// }
?>
<?php include '../dashboard/head.php'; ?>

<title>Salud los Álamos - PÁGINA DE PRUEBA</title>


<style>
    /* .bg-morado {
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
    } */


    h1 {
        /*Agrega una barrita roja en el H1*/
        font-size: 1.6em;
        font-weight: 700;
        background: url(img/linea_h1.svg) left bottom no-repeat;
        padding: 0 0 10px;
        margin: 0 0 40px 0;
    }
</style>

<link rel="stylesheet" href="css/estilo_minvu.css">

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
                        <h2 class="h3 mb-0 text-gray-800 pl-5" style="font-family: 'Kaushan Script', cursive;">MODO PRUEBA</h2>
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

                        <div class="row justify-content-center pt-5">
                            <div class="col-10">
                                <h2>
                                    <img src="img/presentacion-covid-10.png" style="height: 10px; width:100%;" alt="" class="img-fluid">
                                </h2>
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-center" style="padding-top: 70px;">

                        <div class="col-2"></div>

                        <div class="col-lg-10 pb-5">
                            <!--fondoverde -->

                            <div class="container">

                                <div class="row">
                                    <div class="col-md-9">
                                        <h1>Objetivos Estratégicos</h1>

                                        <h1><strong>a. UN NUEVO ENFOQUE PARA LA POLÍTICA HABITACIONAL<br>
                                            </strong></h1>
                                        <p>Una de las tareas prioritarias del ministerio es hacer frente al déficit habitacional. Según los datos del Censo 2017, el déficit cuantitativo cayó un 25 por ciento entre 2002 y 2017, de 521 mil 957 a 393 mil 613 viviendas. Según datos de la encuesta Casen 2017, el déficit cualitativo aumentó un uno por ciento entre 2003 y 2017, de un millón 288 mil 280 a un millón 303 mil 484 viviendas que requieren al menos un mejoramiento.</p>
                                        <p>Esta realidad requiere priorizar acciones que permitan aumentar la cobertura y calidad de los programas habitacionales, de manera que puedan responder a las exigencias de fenómenos como el aumento de los precios de las viviendas, la escasez de suelo, o el aumento de la migración, entre otros factores.</p>
                                        <p>Es así como se ha promovido la actualización de la política habitacional, adaptando las diferentes soluciones habitacionales de manera de hacer más eficiente no solo la adjudicación de los subsidios, sino también su aplicación real. Esto impacta directamente en la calidad de vida de las personas más necesitadas y de la clase media.</p>
                                        <ul>
                                            <li><strong>Nueva política de arriendo</strong><br>
                                                Desde 2014, los postulantes al Programa de Arriendo aumentaron en casi un 28 por ciento. En 2018, postularon más de 23 mil familias, siendo siete mil 240 las familias beneficiadas. Los procesos de postulación evidencian tendencias en torno a familias jóvenes y mujeres vulnerables: el promedio de edad de los postulantes es de 38 años y los seleccionados de hasta 30 años, corresponden al 41 por ciento de las familias. Por otra parte, en 2018 el 82 por ciento de seleccionados fueron mujeres y de ellas casi el 90 por ciento pertenece al 40 por ciento más vulnerable.Esto plantea desafíos en cuanto a: (i) mejorar la cobertura y alcance de los subsidios en las actuales condiciones del parque habitacional; (ii) focalizar la atención en jóvenes y mujeres vulnerables; (iii) atender problemas como el arriendo informal y precario; y (iv) beneficiar a familias de diversos tramos del Registro Social de Hogares.Por ello, se ha planteado como objetivo contar con una política de arriendo que vía componentes de apoyo a la demanda y fortalecimiento de la oferta de viviendas (asequibles, de calidad y bien localizadas) que contribuyan a la integración social y urbana. Se propone un Arriendo Protegido, promoviendo el uso de suelo fiscal para concesionar mediante licitación pública, la construcción de viviendas y edificios para arriendo y bajo la condición de contemplar un porcentaje de viviendas destinadas a beneficiarios del subsidio de arriendo.</li>
                                            <li><strong>Atención a la clase media</strong><br>
                                                El Programa de Subsidio para Sectores Medios del MINVU entrega subsidios habitacionales destinados a apoyar la compra o construcción de una vivienda<br>
                                                a familias que tienen capacidad de ahorro y la posibilidad de complementar el valor de la vivienda con un crédito hipotecario o recursos propios. Pese al éxito del programa, hay familias que han presentado problemas para acceder al financiamiento de su vivienda.El ministerio se ha propuesto priorizar esta línea de trabajo, de modo que, entre el esfuerzo realizado por la familia a través del ahorro para postular y el subsidio otorgado, aumente el acceso a la vivienda de sectores medios, superando la barrera del pie exigido por la banca para optar a un crédito hipotecario.</li>
                                            <li><strong>Más integración social<br>
                                                </strong>A través del Programa de Integración Social y Territorial, se ha logrado avanzar en materia de políticas de vivienda integrada, con la ejecución de conjuntos<br>
                                                habitacionales con diversidad social, donde el 27 por ciento de las viviendas están destinadas a las familias más vulnerables de la población, con mejores<br>
                                                equipamientos y conectividad y en ciudades con mayor déficit habitacional, lo que, de paso, contribuye a la economía con incentivos al sector de la construcción.El programa se verá potenciado por la definición de Zonas de Vivienda Integrada en los Instrumentos de Planificación Territorial, en áreas que cuentan con fuerte inversión estatal, como líneas troncales de transporte público, estaciones de metro o parques, promoviéndose en dichos lugares la densificación equilibrada e integrada socialmente.<strong><br>
                                                </strong></li>
                                            <li><strong>Vivienda sin deuda<br>
                                                </strong>El Fondo Solidario de Elección de Vivienda, dispuesto para las familias más vulnerables, contribuye a reducir con fuerza el déficit cuantitativo de viviendas,<br>
                                                asignando anualmente recursos para la adquisición de viviendas o construcción de proyectos habitacionales. Se han planteado mejoras para este instrumento con el propósito de volverlo más eficiente, en cuanto a simplificar procesos de evaluación y ejecución; mejorar su esquema de financiamiento, actualizando montos de subsidio y el compromiso de las familias a través del ahorro; fortaleciendo a los ejecutores del programa, incrementando capacidades externas e internas; y adecuando requisitos de los contratistas al tamaño de las obras que comprometan.</li>
                                            <li><strong>Mejoramiento de vivienda y barrio<br>
                                                </strong>Para mejorar la calidad del parque habitacional construido, el ministerio ha perfeccionado la herramienta que atiende las deficiencias y obsolescencias de viviendas y entornos, anteriormente conocido como Programa de Protección al Patrimonio Familiar, por el nuevo Programa de Mejoramiento de Vivienda y Barrios. El principal cambio de enfoque, apunta a superar la mirada sobre patrimonio individual y, a cambio, poner foco en la calidad residencial de personas y comunidades con acento en los entornos. A partir de este cambio de paradigma, el programa busca dar soluciones más integrales, agrupadas en cuatro ámbitos:<p></p>
                                                <ul>
                                                    <li>Equipamiento, que implica potenciar el entorno al servicio de un grupo de viviendas.</li>
                                                    <li>Vivienda, enfocado en mejorar la habitabilidad de casas y departamentos.</li>
                                                    <li>Mejorar las condiciones de conjuntos habitacionales, sus bienes comunes construidos y no construidos.</li>
                                                    <li>Eficiencia energética, que busca dar soluciones más sustentables a las necesidades en viviendas y conjuntos.</li>
                                                    <li>Este nuevo subsidio no está solamente dirigido a familias, sino también a personas jurídicas o agrupaciones, y permite adecuar los proyectos dependiendo<br>
                                                        de su complejidad y escala. Además, su mecanismo de postulación impulsa un rol más activo del ministerio, en cuanto a definir las condiciones de oferta y la<br>
                                                        focalización territorial de los llamados a postulación.</li>
                                                </ul>
                                            </li>
                                        </ul>
                                        <h1><strong>b. PLAN NACIONAL DE CAMPAMENTOS: NUEVO DIAGNÓSTICO Y NUEVAS ACCIONES</strong></h1>
                                        <p>El programa de gobierno estableció como prioridad, no solo la atención de familias que viven en asentamientos irregulares, sino también la generación de mecanismos para reducir la entrada de nuevas familias en campamentos.</p>
                                        <ul>
                                            <li><strong>Nuevo Catastro Nacional de Campamentos 2018</strong><br>
                                                A partir de ese mandato, el ministerio ha impulsado un nuevo Catastro Nacional de Campamentos. Éste no sólo entrega datos más actualizados que la versión anterior, sino que cuenta con una metodología renovada y con herramientas tecnológicas que han permitido obtener información más precisa, exhaustiva y de calidad que la versión 2011, en términos de registro y georreferenciación.De este modo, se cuenta con una radiografía más clara sobre el número de hogares y personas en campamentos y además sobre su localización, concentración y tipología de asentamiento, así como un perfil más acabado de las familias, para diseñar estrategias más integrales y mejor focalizadas, a través de un trabajo multisectorial, para mejorar sus condiciones de vida, ya sea a través de procesos de radicación como de erradicación. El nuevo catastro también será un insumo fundamental para determinar el diseño de políticas para familias migrantes que viven en esta situación.</li>
                                            <li><strong>Nuevas acciones</strong><br>
                                                Se ha establecido una mesa de trabajo con el sector privado e instituciones sociales, denominado Compromiso País, con el objeto de buscar nuevas soluciones para campamentos. El segundo semestre del año 2018, se firmó un convenio de cooperación con la Cámara Chilena de la Construcción, para acelerar los cierres de campamentos priorizados, el cual propone las siguientes acciones principales:<br>
                                                (i) entregar en campamentos subsidios de adquisición de vivienda construida en proyectos existentes; (ii) desarrollar proyectos nuevos para el cierre de<br>
                                                campamentos; (iii) digitalizar procesos de presentación de proyectos del Fondo Solidario de Elección de Vivienda; (iv) capacitar a personal MINVU del área de campamentos; (v) ser parte de los programas de Prodemu para brindar apoyo a mujeres de campamentos; y (vi) realizar pilotos de Barrios Transitorios.</li>
                                        </ul>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!--FIN DEL COL-SM-->

                    </div>
                    <!-- FIN DEL ROW -->


                    <div class="subsidio-ds1-clase-media-primer-llamado-compra-o-construccion-de-vivienda">


                        <div class="componente-contenido bloque-0">
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-12 col-sm-6 align-self-center"><img class="img-fluid w-100 p-3" src="img/ds1-logo-21.png" alt="Subsidio DS1 Clase Media Segundo Llamado Compra o Construcción de Vivienda"></div>
                                    <div class="col-12 col-sm-6 align-self-center "><img class="img-fluid w-100 p-3" src="img/fecha-ds1-21-2.png" alt="Subsidio DS1 Clase Media Segundo Llamado Compra o Construcción de Vivienda"></div>
                                </div>
                            </div>
                        </div>



                        <div class="componente-contenido bloque-1">
                            <div class="container">
                                <div class="row">
                                    <div class="col-12 col-md-4 box1">
                                        <h3>Postulación<br> automática</h3>
                                        <p><span class="digital">100% online</span></p>
                                        <div class="calendario">19 al 31 de mayo<br>
                                            (18:00 horas)</div>
                                        <p><strong>Si postulaste al último llamado del 2020</strong> podrás aprobar la propuesta de postulación que hemos preparado (compra y construcción de vivienda)<br>
                                            <a href="https://minvuconecta.minvu.cl/" rel="noopener" target="_blank"><img src="/wp-content/uploads/2020/11/pincha-aca.png" alt="" class="img-fluid pt-4 pb-4"></a><br>
                                            <a href="https://www.minvu.gob.cl/tutorial-postulacion-automatica-subsidio-clase-media-ds1/" class="btn btn-warning p-3" target="_blank">Tutorial para Postulación Automática</a>
                                        </p>
                                    </div>
                                    <div class="col-12 col-md-4 box2">
                                        <h3>Postulación<br> en línea</h3>
                                        <p><span class="digital">100% online</span></p>
                                        <div class="calendario">24 al 31 de mayo<br>
                                            (18:00 horas)</div>
                                        <p><strong>Si es primera vez que postulas para comprar una vivienda</strong> o tus condiciones han cambiado, podrás realizar la postulación en línea</p>
                                    </div>
                                    <div class="col-12 col-md-4 box3">
                                        <h3>Postulación vía Formulario de Atención Ciudadana</h3>
                                        <p><span class="digital">100% online</span></p>
                                        <div class="calendario">26 al 31 de mayo<br>
                                            (18:00 horas)</div>
                                        <p><strong>Compra o construcción de vivienda</strong><br>
                                            <strong>Si es primera vez que postulas a construcción en sitio propio</strong> y/o necesitas acreditar alguna situación excepcional, podrás completar tu solicitud de postulación vía Formulario de Atención Ciudadana
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="componente-contenido bloque-2">
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-12 col-sm-10 align-self-center"><a href="/postulacion/1er-llamado-nacional-2021-en-condiciones-especiales-para-postular-al-subsidio-de-la-clase-media-d-s-1/" rel="noopener" target="_blank">Para más información pincha aquí </a></div>
                                </div>
                            </div>
                        </div>



                        <div class="componente-contenido bloque-3">
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-12 col-sm-6 align-self-center"><img class="img-fluid w-100" src="img/comprar-ds1-21.png" alt="Comprar"></div>
                                </div>
                            </div>
                        </div>



                        <div class="componente-contenido bloque-4">
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-12 col-sm-3 align-self-center"><img class="img-fluid pb-4" src="img/consiste-ds1-comprar-21.png" alt="consiste"></div>
                                    <div class="col-12 col-sm-7 align-self-center">Permite a familias que no son dueñas de una vivienda y tienen capacidad de ahorro, acceder a una ayuda económica para comprar una casa o departamento nuevo o usado. </div>
                                </div>
                            </div>
                        </div>



                        <div class="componente-contenido bloque-5">
                            <div class="container">
                                <h3>Requisitos generales de postulación</h3>
                                <div class="row justify-content-center">
                                    <div class="col-12 col-sm-6 align-self-center">
                                        <ul>
                                            <li class="uno-d"> Tener mínimo 18 años de edad.</li>
                                            <!--uno-d -->
                                            <li class="dos-d">Contar con Cédula Nacional de Identidad. Las personas extranjeras deben presentar Cédula de Identidad para Extranjeros con permanencia definitiva y Certificado de Permanencia Definitiva (emitido por el Departamento de Extranjería del Ministerio del Interior o por Policía de Investigaciones de Chile).</li>
                                            <li class="tres-d">Acreditar una cuenta de ahorro para la vivienda con una antigüedad mínima de 12 meses (abierta hasta el 30 de abril de 2020)</li>
                                            <li class="cuatro-d">Acreditar que el ahorro exigido en cada tramo esté depositado y reflejado como saldo disponible en la cuenta de ahorro para la vivienda a más tardar el 30 de abril hasta las 14:00 hrs. A partir de esa fecha no deberá efectuar giros en la cuenta.</li>
                                        </ul>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <ul>
                                            <li class="cinco-d">Estar inscrito en el Registro Social de Hogares (RSH) y no superar el porcentaje de calificación socioeconómica que exige la alternativa de subsidio a la que desea postular.</li>
                                            <li class="seis-d">En caso de postular colectivamente el grupo debe:
                                                <ul>
                                                    <li>Tener un mínimo de 10 integrantes.</li>
                                                    <li>Postular a través de una Entidad Patrocinante.</li>
                                                    <li>Contar con un proyecto habitacional aprobado por el Serviu.</li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <p><img class="img-fluid w-100" src="img/regiones-ds1-21-final.png" alt="Regiones"></p>
                            </div>
                        </div>



                        <div class="componente-contenido bloque-6">
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-12 col-sm-6 align-self-center"><img class="w-100 img-fluid" src="img/construir-ds1-21.png" alt="Construcción"></div>
                                </div>
                            </div>
                        </div>



                        <div class="componente-contenido bloque-7">
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-12 col-sm-3 align-self-center"><img class="img-fluid pb-4" src="img/consiste-ds1-21.png" alt="consiste"></div>
                                    <div class="col-12 col-sm-9 align-self-center">Este apoyo del Estado permite a las familias que no son dueñas de una vivienda y tienen capacidad de ahorro, poder construir una vivienda de hasta 140 m2 en un sitio propio o densificación predial, es decir, edificar una casa en un terreno donde ya existe otra. Cada proyecto habitacional debe tener a lo menos tres recintos (un baño, estar –comedor-cocina y un dormitorio).<br>
                                        Este subsidio habitacional permite complementar el valor de la vivienda con recursos propios o crédito hipotecario, en caso de necesitarlo.</div>
                                </div>
                            </div>
                        </div>



                        <div class="componente-contenido bloque-8">
                            <div class="container">
                                <h3>Requisitos generales de postulación</h3>
                                <div class="row justify-content-center">
                                    <div class="col-12 col-sm-6 align-self-center">
                                        <ul>
                                            <li class="uno-d">Tener mínimo 18 años de edad.</li>
                                            <li class="dos-d">Contar con Cédula Nacional de Identidad. Las personas extranjeras deben presentar Cédula de Identidad para Extranjeros con permanencia definitiva y Certificado de Permanencia Definitiva (emitido por el Departamento de Extranjería del Ministerio del Interior o por Policía de Investigaciones de Chile).</li>
                                            <li class="cuatro-d">Acreditar una cuenta de ahorro para la vivienda con una antigüedad mínima de 12 meses (abierta hasta el 30 de abril de 2020)</li>
                                            <li class="cinco-d">Acreditar que el ahorro exigido en cada tramo esté depositado y reflejado como saldo disponible en la cuenta de ahorro para la vivienda a más tardar el 30 de abril hasta las 14:00 hrs. A partir de esa fecha no deberá efectuar giros en la cuenta.</li>
                                            <li class="seis-d">Estar inscrito en el Registro Social de Hogares (RSH) y no superar el porcentaje de calificación socioeconómica que exige la alternativa de subsidio a la que desea postular.</li>
                                            <li class="siete-d">En caso de postular colectivamente el grupo debe:
                                                <ul>
                                                    <li>Tener un mínimo de 2 integrantes.</li>
                                                    <li>Postular a través de una Entidad Patrocinante.</li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <ul>
                                            <li class="ocho-d">Acreditar la disponibilidad de un terreno por medio de alguna de las siguientes alternativas:
                                                <ul>
                                                    <li>Inscripción del sitio a nombre del postulante, cónyuge o conviviente civil.</li>
                                                    <li>Inscripción del sitio a nombre del grupo organizado.</li>
                                                    <li>Certificado Conadi en caso de tierras indígenas.</li>
                                                    <li>Usufructo o derecho real de uso del terreno a favor del postulante.</li>
                                                    <li>Derechos en comunidades agrícolas.</li>
                                                    <li>Sitio a nombre de una cooperativa de la cual el postulante es socio.</li>
                                                    <li>Cesión de derechos inscrita del terreno a favor del postulante (Ley 19.253 de octubre de 1993).</li>
                                                    <li>Certificado emitido por el Ministerio de Bienes Nacionales (si es necesario).</li>
                                                </ul>
                                            </li>
                                            <li class="nueve-d">Contar con los Certificados de Informaciones Previas y Factibilidad de Dación de Servicios emitidos con fecha no anterior al 1° de enero de 2020.<br>
                                                <small>Aquellos que postularon al Segundo Llamado 2019 o a cualquier llamado del año 2020 no deberán presentar esta certificación porque se le considerará la que presentaron en algunos de esos llamados.</small>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <p><img class="img-fluid w-100" src="img/regiones2-ds1-21-final.png" alt="Regiones"></p>
                            </div>
                        </div>


                        <div class="componente-contenido bloque-9">
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-12 col-sm-10 align-self-center"><a href="https://www.minvu.gob.cl/postulacion/1er-llamado-nacional-2021-en-condiciones-especiales-para-postular-al-subsidio-de-la-clase-media-d-s-1/" rel="noopener" target="_blank">Para más información pincha aquí </a></div>
                                </div>
                            </div>
                        </div>

                    </div>


                    <div class="modal fade animate__animated animate__fadeInDown" id="modal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-segundos="0" data-segundos2="1">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <a href="javascript:void(0)" class="cerrar bg-white" data-target="#modal1" data-toggle="modal" data-dismiss="modal" title="Cerrar popup"></a>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-12">

                                            <img class="img-fluid" src="img/postulacion-automatica_pop-up.jpg" alt="Postulación Ds1" style="height:767px;">

                                        </div>
                                        <div class="col-md-12">
                                            <p></p>
                                            <a href="https://www.minvu.gob.cl/subsidio-ds1-clase-media-primer-llamado-compra-o-construccion-de-vivienda/" class="btn btn-popup btn-lg">Ingresa aquí</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


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



                <div class="row justify-content-center">
                    <h3 id="badges" class="header smaller lighter text-success"><b>II.I</b> ¿Has tenido alguna de estas enfermedades?<br>Marca con una equis (X) en el casillero que corresponda, señala además cuántos años tenías cuando comenzó la enfermedad</h3>
                    <div class="col-md-10">
                        <div class="box-body table-responsive no-padding table-bordered siempre_responsivo">
                            <table class="table table-hover">
                                <thead>
                                    <tr class="encabezadotabla">
                                        <th>Enfermedad</th>
                                        <th style="padding-left:26px;">No</th>
                                        <th style="padding-left:26px;">Si</th>
                                        <th>Edad</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            Enfermedades cardíacas
                                        </td>
                                        <td>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" class="ace" name="item_enfermedad_alumno_1" value="0">
                                                    <span class="lbl"></span>
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" class="ace" name="item_enfermedad_alumno_1" value="1">
                                                    <span class="lbl"></span>
                                                </label>
                                            </div>

                                        </td>
                                        <td>
                                            <input type="text" name="edad_item_enfermedad_alumno_1" class="form-control cantidad" value="" onchange="Notas(this)">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Enfermedades del riñón
                                        </td>
                                        <td>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" class="ace" name="item_enfermedad_alumno_2" value="0">
                                                    <span class="lbl"></span>
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" class="ace" name="item_enfermedad_alumno_2" value="1">
                                                    <span class="lbl"></span>
                                                </label>
                                            </div>

                                        </td>
                                        <td>
                                            <input type="text" name="edad_item_enfermedad_alumno_2" class="form-control cantidad" value="" onchange="Notas(this)">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Diabetes
                                        </td>
                                        <td>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" class="ace" name="item_enfermedad_alumno_3" value="0">
                                                    <span class="lbl"></span>
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" class="ace" name="item_enfermedad_alumno_3" value="1">
                                                    <span class="lbl"></span>
                                                </label>
                                            </div>

                                        </td>
                                        <td>
                                            <input type="text" name="edad_item_enfermedad_alumno_3" class="form-control cantidad" value="" onchange="Notas(this)">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Hipertensión Arterial
                                        </td>
                                        <td>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" class="ace" name="item_enfermedad_alumno_4" value="0">
                                                    <span class="lbl"></span>
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" class="ace" name="item_enfermedad_alumno_4" value="1">
                                                    <span class="lbl"></span>
                                                </label>
                                            </div>

                                        </td>
                                        <td>
                                            <input type="text" name="edad_item_enfermedad_alumno_4" class="form-control cantidad" value="" onchange="Notas(this)">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Enfermedades respiratorias crónicas
                                        </td>
                                        <td>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" class="ace" name="item_enfermedad_alumno_5" value="0">
                                                    <span class="lbl"></span>
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" class="ace" name="item_enfermedad_alumno_5" value="1">
                                                    <span class="lbl"></span>
                                                </label>
                                            </div>

                                        </td>
                                        <td>
                                            <input type="text" name="edad_item_enfermedad_alumno_5" class="form-control cantidad" value="" onchange="Notas(this)">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Problemas alimentarios
                                        </td>
                                        <td>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" class="ace" name="item_enfermedad_alumno_6" value="0">
                                                    <span class="lbl"></span>
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" class="ace" name="item_enfermedad_alumno_6" value="1">
                                                    <span class="lbl"></span>
                                                </label>
                                            </div>

                                        </td>
                                        <td>
                                            <input type="text" name="edad_item_enfermedad_alumno_6" class="form-control cantidad" value="" onchange="Notas(this)">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Enfermedades de la piel
                                        </td>
                                        <td>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" class="ace" name="item_enfermedad_alumno_7" value="0">
                                                    <span class="lbl"></span>
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" class="ace" name="item_enfermedad_alumno_7" value="1">
                                                    <span class="lbl"></span>
                                                </label>
                                            </div>

                                        </td>
                                        <td>
                                            <input type="text" name="edad_item_enfermedad_alumno_7" class="form-control cantidad" value="" onchange="Notas(this)">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Enfermedades de Transmisión Sexual
                                        </td>
                                        <td>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" class="ace" name="item_enfermedad_alumno_8" value="0">
                                                    <span class="lbl"></span>
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" class="ace" name="item_enfermedad_alumno_8" value="1">
                                                    <span class="lbl"></span>
                                                </label>
                                            </div>

                                        </td>
                                        <td>
                                            <input type="text" name="edad_item_enfermedad_alumno_8" class="form-control cantidad" value="" onchange="Notas(this)">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Hepatitis
                                        </td>
                                        <td>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" class="ace" name="item_enfermedad_alumno_9" value="0">
                                                    <span class="lbl"></span>
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" class="ace" name="item_enfermedad_alumno_9" value="1">
                                                    <span class="lbl"></span>
                                                </label>
                                            </div>

                                        </td>
                                        <td>
                                            <input type="text" name="edad_item_enfermedad_alumno_9" class="form-control cantidad" value="" onchange="Notas(this)">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Cáncer
                                        </td>
                                        <td>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" class="ace" name="item_enfermedad_alumno_10" value="0">
                                                    <span class="lbl"></span>
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" class="ace" name="item_enfermedad_alumno_10" value="1">
                                                    <span class="lbl"></span>
                                                </label>
                                            </div>

                                        </td>
                                        <td>
                                            <input type="text" name="edad_item_enfermedad_alumno_10" class="form-control cantidad" value="" onchange="Notas(this)">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Trastornos Psicológicos o Psiquiátricos
                                        </td>
                                        <td>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" class="ace" name="item_enfermedad_alumno_12" value="0">
                                                    <span class="lbl"></span>
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" class="ace" name="item_enfermedad_alumno_12" value="1">
                                                    <span class="lbl"></span>
                                                </label>
                                            </div>

                                        </td>
                                        <td>
                                            <input type="text" name="edad_item_enfermedad_alumno_12" class="form-control cantidad" value="" onchange="Notas(this)">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Varicela
                                        </td>
                                        <td>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" class="ace" name="item_enfermedad_alumno_13" value="0">
                                                    <span class="lbl"></span>
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" class="ace" name="item_enfermedad_alumno_13" value="1">
                                                    <span class="lbl"></span>
                                                </label>
                                            </div>

                                        </td>
                                        <td>
                                            <input type="text" name="edad_item_enfermedad_alumno_13" class="form-control cantidad" value="" onchange="Notas(this)">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Problemas estomacales
                                        </td>
                                        <td>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" class="ace" name="item_enfermedad_alumno_14" value="0">
                                                    <span class="lbl"></span>
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" class="ace" name="item_enfermedad_alumno_14" value="1">
                                                    <span class="lbl"></span>
                                                </label>
                                            </div>

                                        </td>
                                        <td>
                                            <input type="text" name="edad_item_enfermedad_alumno_14" class="form-control cantidad" value="" onchange="Notas(this)">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Anemia
                                        </td>
                                        <td>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" class="ace" name="item_enfermedad_alumno_15" value="0">
                                                    <span class="lbl"></span>
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" class="ace" name="item_enfermedad_alumno_15" value="1">
                                                    <span class="lbl"></span>
                                                </label>
                                            </div>

                                        </td>
                                        <td>
                                            <input type="text" name="edad_item_enfermedad_alumno_15" class="form-control cantidad" value="" onchange="Notas(this)">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="col-sm-10">
                        <div class="box-body table-responsive no-padding table-bordered siempre_responsivo">
                            <table class="table table-hover">
                                <thead>
                                    <tr style="background-color: #438EB9;color:white;">
                                        <th>Otras ( señala cuál )</th>
                                        <th>Edad</th>
                                        <th>Observación</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <input type="text" name="des_enfermedad_alumno_22" class="form-control areatexto" maxlength="30" value="">
                                        </td>
                                        <td>
                                            <input type="text" name="edad_item_enfermedad_alumno_22" class="form-control cantidad" maxlength="30" value="" onchange="Notas(this)">
                                        </td>
                                        <td>
                                            <input type="text" name="observacion" class="form-control areatexto" maxlength="30" value="">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>




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

        <script>
            // $('#modal-popup').modal('show');
            // $('#modal-popup').show();

            $('#modal1').modal('show');

            setTimeout(function() {
                alertify.success("as");
                $('#modal1').modal('hide');
            }, 60 * 1000); //en un minuto si no lo cierran antes se cierra



            // function cerrar() {
            //     alertify.success("as");
            //     $("#modal-popup").removeClass("animate__animated animate__fadeInDown").addClass("animate__animated animate__fadeOutUp");
            // }
        </script>



</body>

</html>