<?php session_start(); ?>
<?php include 'partes/head.php'; ?>
<style>
    ul.timeline {
        list-style-type: none;
        position: relative;
        padding-left: 1.5rem;
    }

    /* Timeline vertical line */
    ul.timeline:before {
        content: ' ';
        background: #fff;
        display: inline-block;
        position: absolute;
        left: 16px;
        width: 4px;
        height: 100%;
        z-index: 400;
        border-radius: 1rem;
    }

    li.timeline-item {
        margin: 20px 0;
    }

    /* Timeline item arrow */
    .timeline-arrow {
        border-top: 0.5rem solid transparent;
        border-right: 0.5rem solid #fff;
        border-bottom: 0.5rem solid transparent;
        display: block;
        position: absolute;
        left: 2rem;
    }

    /* Timeline item circle marker */
    li.timeline-item::before {
        content: ' ';
        background: #ddd;
        display: inline-block;
        position: absolute;
        border-radius: 50%;
        border: 3px solid #fff;
        left: 11px;
        width: 14px;
        height: 14px;
        z-index: 400;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
    }
</style>
<title>Salud los Álamos - Programas</title>
</head>



<body style="background-color: #f4f1f1; ">
    <!--f4f1f1 -->
    <?php include 'partes/navbar.php'; ?> </div>

    <div class="container" style="padding-top:80px;padding-bottom:30px;">
        <header class="text-center">
        <h1 class="font-weight-bold mb-2" style="color: #6a97bd;font-size: 50px;">Progr<span style="color:#90bde4;">amas</span></h1>
            <p>Encontrarás el detalle de cada uno de los programas de nuestra red de salud.</p>
        </header>
        <div class="row">
            <div class="col-lg-6 mx-auto">

                <!-- Timeline -->
                <ul class="timeline">
                    <li class="timeline-item bg-white rounded ml-3 p-4 shadow">
                        <div class="timeline-arrow"></div>
                        <h2 class="h5 mb-0">ERA <small>(Enfermedades respiratorias de Adultos)</small> y TBC <small>(Tuberculosis)</small></h2><span class="small text-gray"><i class="fa fa-clock-o mr-1"></i>21 Mayo, 2019</span>
                        <p class="text-small mt-2">
                            <b>Médicos:</b> Fijo en CESFAM, agenda varía según turnos de urgencias.
                            <ul>
                                <li>
                                    Ingresos presenciales
                                </li>
                                <li> Controles crónicos telefónicos,</li>
                                <li> Poli descompensados cardiovascular y respiratorios, principalmente telefónicos,
                                    evaluación presencial en casos seleccionados.</li>
                                <li>
                                    Visitas domiciliarias oxigeno-dependientes y casos especiales (principalmente
                                    adultos mayores no autovalentes)
                                </li>
                            </ul>
                        </p>
                        <p class="text-small mt-2">
                            <b>Enfermera: </b> Agenda varía según requerimiento.
                            <ul>
                                <li>Ingresos (telefónicos)</li>
                                <li> Controles crónicos (telefónicos)</li>
                                <li> Visitas domiciliarias a casos priorizados</li>
                                <li>Toma de exámenes a casos priorizados, citados o en domicilio</li>
                                <li>Educación insulinoterapia a ingresos de Diabetes</li>
                            </ul>
                        </p>
                        <p class="text-small mt-2">
                            <b>Kinesióloga: </b> Lunes, Miércoles, Viernes.
                            <ul>
                                <li>Ingresos (telefónicos)</li>
                                <li>Controles crónicos (telefónicos)</li>
                                <li>Visitas domiciliarias a pacientes respiratorios descompensados, priorizados</li>
                            </ul>
                        </p>
                        <p class="text-small mt-2">
                            <b>TENS CESFAM/Postas: </b> agenda según turnos quincenales.
                            <ul>
                                <li>Preparación paciente para atención médica</li>
                                <li>Toma de exámenes a casos priorizados, citados o en domicilio</li>
                                <li>Pesquisa pacientes sin controles y de mayor riesgo (telefónico)</li>
                                <li>Entrega medicamentos TBC/quimioprofilaxis TBC.</li>
                            </ul>
                        </p>
                    </li>
                    <li class="timeline-item bg-white rounded ml-3 p-4 shadow">
                        <div class="timeline-arrow"></div>
                        <h2 class="h5 mb-0">PASMI</h2><span class="small text-gray"><i class="fa fa-clock-o mr-1"></i>21 Mayo, 2019</span>
                        <p class="text-small mt-2">
                            Programa de Atención a la Salud Mental Infantil, es un programa complementario
                            de Salud Mental y CHCC, el cual tiene como objetivo aumentar la cobertura de
                            atención para niños entre 5 a 9 años.
                        </p>
                    </li>
                    <li class="timeline-item bg-white rounded ml-3 p-4 shadow">
                        <div class="timeline-arrow"></div>
                        <h2 class="h5 mb-0">DEPENDENCIA SEVERA</h2><span class="small text-gray"><i class="fa fa-clock-o mr-1"></i>21 Mayo, 2019</span>
                        <p class="text-small mt-2">
                            Este programa corresponde a una estrategia de atención de salud que incorpora
                            los ámbitos promocional, preventivo y curativo de la salud, así como también los
                            ámbitos de seguimiento y acompañamiento, centrado en la persona con
                            dependencia severa y su cuidadora/or. Pretende mejorar la oportunidad de
                            atención de las personas con dependencia severa y su cuidador(a), realizando la
                            atención de salud correspondiente a la Atención Primaria de Salud en el domicilio
                            familiar, resguardando la continuidad de la atención con los otros niveles de salud
                            y el acceso a servicios locales y nacionales disponibles, mediante una adecuada
                            articulación de la red intersectorial de servicios para personas con dependencia y
                            sus familias. <br><br>
                            El propósito del Programa de Atención Domiciliaria a Personas con dependencia
                            severa es mejorar la calidad de vida de las personas con dependencia severa, sus
                            familias y cuidadoras/es beneficiarios del sistema público de salud e inscrito en el
                            establecimiento, mediante acciones de salud integrales, cercanas y centradas en
                            las personas dependientes y sus familias, considerando los aspectos promocionales,
                            preventivos, curativos y paliativos de la atención en salud desarrollados dentro del
                            Modelo de Atención Integral en Salud con enfoque familiar y comunitario. <br><br>
                            El equipo de dependencia severa del Cesfam de Los Álamos, es un equipo
                            transversal, el cual está conformado por Médico (con horas semanales), enfermera,
                            kinesiólogo, asistente social, nutricionista y Tens. Equipo que debe cumplir con la
                            canasta básica para el año recomendada para cada persona con dependencia
                            severa de a lo menos: 2 visitas domiciliarias integrales, 6 visitas domiciliarias de
                            tratamiento y de realizar capacitación a los cuidadores.
                        </p>
                    </li>

                    <li class="timeline-item bg-white rounded ml-3 p-4 shadow">
                        <div class="timeline-arrow"></div>
                        <h2 class="h5 mb-0">Elige vida sana</h2><span class="small text-gray"><i class="fa fa-clock-o mr-1"></i>21 Mayo, 2019</span>
                        <p class="text-small mt-2">
                            <strong>Propósito: </strong><br>
                            “Contribuir a disminuir enfermedades cardiovasculares y diabetes mellitus tipo 2 en
                            la población chilena”. <br><br>
                            <strong>Objetivo general:</strong><br>
                            “Disminuir los factores como sobrepeso, obesidad y sedentarismo en relación a la
                            condición física en niños, niñas, adolescentes y adultos de 6 meses a 64 años que
                            sean beneficiarios de FONASA”. <br><br>
                            <strong>Descripción general:</strong><br>
                            Siguiendo la línea del sistema elige vida sana, este programa busca potenciar los
                            pilares de la alimentación saludable, actividad física, vida en familia y al aire libre.
                            Teniendo enfoque comunitario e interdisciplinario, desarrollados a través de la
                            atención primaria, donde se desarrollan actividades de promoción y prevención,
                            en relación a, actividad física y alimentación saludable, donde todo el tiempo el
                            usuario será evaluado y guiado por profesionales, como nutricionista, psicóloga y
                            profesional de la actividad física. <br><br>
                            El programa consiste en intervenciones continuas destinadas a lograr cambios de
                            estilo de vida saludables en la población beneficiaria que cumple con los siguientes
                            criterios de inclusión: <br>
                            <ul>
                                <li>Diagnóstico nutricional de sobrepeso u obesidad.</li>
                                <li>Perímetro de cintura aumentado.</li>
                                <li>Diagnóstico de pre diabetes o pre hipertensión.</li>
                                <li>Mujeres que en el último control de embarazo fueron diagnosticadas con obesidad o sobrepeso.</li>
                                <li>Embarazadas con autorización previa de su matrona o médico para realizar actividad física.</li>
                            </ul>
                            <br>
                            Las diversas actividades se llevan a cabo vía online y/o presencial dependiendo
                            del Plan paso a paso de nuestra comuna.
                            El equipo vida sana está compuesto por: <br><br>
                            <strong>Nutricionista:</strong> Nicol Romero Caripan. <br>
                            <strong>Prof. Educación física:</strong> Gerardo Martinez Panchilla. <br>
                            <strong>Psicóloga:</strong> Camila Rodriguez.
                            <br><br>
                            Para acceder a este programa, puedes inscribirte en los SOMES de Centros de
                            Salud Familiar (CESFAM) o Postas de nuestra Comuna, por medio de nuestras redes
                            sociales Facebook Elige Vida Sana Los Alamos, teléfono/ whatsapp +5695371240. <br><br>
                            Esta estrategia no tiene ningún costo, es accesible desde cualquier lugar de nuestra
                            comuna solo necesitamos tu interés y muchas ganas de participar. ¡Te esperamos!

                        </p>
                    </li>

                    <li class="timeline-item bg-white rounded ml-3 p-4 shadow">
                        <div class="timeline-arrow"></div>
                        <h2 class="h5 mb-0">PROGRAMA CARDIOVASCULAR</h2><span class="small text-gray"><i class="fa fa-clock-o mr-1"></i>10 Octubre, 2019</span>
                        <p class="text-small mt-2">
                            El Programa de salud cardiovascular se implementa en atención primaria de salud
                            con el objetivo principal de reducir la incidencia de eventos cardiovasculares a
                            través del control y compensación de los factores de riesgo cardiovascular. <br><br>
                            Pertenecen a este programa las personas con hipertensión arterial, diabetes
                            mellitus tipo 2, dislipidemia, tabaquismo, antecedentes personales de enfermedad
                            cardiovascular aterosclerótica. <br><br>
                            Sus objetivos son reducir el Riesgo Cardiovascular de las personas bajo control,
                            fomentando estilos de vida saludables. Lograr el control de los factores de riesgo,
                            alcanzando niveles de presión arterial óptimos, mejorar el control metabólico de
                            las personas con diabetes, mejorar los niveles de colesterol de las personas con
                            dislipidemia, prevención secundaria en personas con antecedentes de
                            enfermedades cardiovasculares y pesquisar precozmente la enfermedad renal
                            crónica en personas con factores de riesgo.
                        </p>
                    </li>

                    <li class="timeline-item bg-white rounded ml-3 p-4 shadow">
                        <div class="timeline-arrow"></div>
                        <h2 class="h5 mb-0">PROGRAMA DE ACOMPAÑAMIENTO PSICOSOCIAL.A NIÑOS, NIÑAS, ADOLESCENTES Y JÓVENES
                        </h2><span class="small text-gray"><i class="fa fa-clock-o mr-1"></i>10 Octubre, 2019</span>
                        <p class="text-small mt-2">
                            Su objetivo es contribuir a elevar el nivel de salud mental de NNA y jóvenes de
                            familias con alto riesgo psicosocial, asegurando su acceso, oportunidad y calidad
                            de atención de salud, a través de acciones de acompañamiento centrado en la
                            vinculación, articulación dentro del establecimiento de salud y con la red
                            intersectorial, seguimiento y monitoreo, todo dentro de contexto del modelo de
                            atención de salud integral con enfoque familiar y comunitario.
                        </p>
                    </li>


                    <li class="timeline-item bg-white rounded ml-3 p-4 shadow">
                        <div class="timeline-arrow"></div>
                        <h2 class="h5 mb-0">PAD Y CP</h2><span class="small text-gray"><i class="fa fa-clock-o mr-1"></i>10 Octubre, 2019</span>
                        <p class="text-small mt-2">
                            Programa de Alivio del Dolor y Cuidados Paliativos, atiende a la población con
                            diagnóstico de cáncer refractario a tratamientos, esto quiere decir cáncer terminal
                            sin posibilidad de tratamiento curativo, en estas instancias es paliativo y tratando
                            siempre de mejorar la calidad de vida. <br><br>
                            El programa está conformado por un equipo multi y transdisciplinario compuesto
                            por médico, enfermera, TENS, Trabajador Social, Kinesiologa, Nutricionista, Químico
                            Farmacéutico y Asesor Espiritual. <br><br>
                            El programa se basa en brindar atención biopsicosocioespiritual a nuestros usuarios
                            y sus familias, en visitas domiciliarias semanales. <br><br>
                            El objetivo de PAD y CP es ayudar a las personas con cáncer terminal a tener una
                            mejor calidad de vida y un buen morir. <br><br>
                            Trabajamos con la sub red Lebu - Los Álamos recibiendo de Lebu los medicamentos
                            para alivio del dolor.

                        </p>
                    </li>

                    <li class="timeline-item bg-white rounded ml-3 p-4 shadow">
                        <div class="timeline-arrow"></div>
                        <h2 class="h5 mb-0">PROGRAMA DE EQUIDAD RURAL EN SALUD</h2><span class="small text-gray"><i class="fa fa-clock-o mr-1"></i>10 Octubre, 2019</span>
                        <p class="text-small mt-2">
                            Tiene como objetivo mejorar las condiciones de funcionamiento de los
                            establecimientos de atención rural, especialmente de las postas de salud rural,
                            avanzando en el cierre de las brechas de recurso humano, calidad en la
                            implementación del modelo de atención integral con enfoque familiar y
                            comunitario, medios de comunicación y transporte de las postas rurales y
                            ampliando las estrategias de trabajo comunitario.
                        </p>
                    </li>
                    <li class="timeline-item bg-white rounded ml-3 p-4 shadow">
                        <div class="timeline-arrow"></div>
                        <h2 class="h5 mb-0">FARMACIA</h2><span class="small text-gray"><i class="fa fa-clock-o mr-1"></i>10 Octubre, 2019</span>
                        <p class="text-small mt-2">
                            Farmacia es la unidad encargada de dispensar las distintas terapias
                            farmacológicas (medicamentos e insumos médicos) a todos los usuarios y velar por
                            un correcto uso de fármacos en el establecimiento de salud (Cesfam o postas),
                            como en domicilio. <br> <br>
                            Ésta unidad presta apoyo a las distintas áreas vinculadas al uso de medicamentos.
                            Además de brindar charlas informativas y consejos referente a la buena
                            administración y correcto unos de fármacos.
                        </p>
                    </li>

                </ul><!-- End -->
            </div>

            <div class="col-lg-6 mx-auto">
                <!-- Timeline -->
                <ul class="timeline">
                    <li class="timeline-item bg-white rounded ml-3 p-4 shadow">
                        <div class="timeline-arrow"></div>
                        <h2 class="h5 mb-0">SALA DE NEUROREHABILITACIÓN</h2><span class="small text-gray"><i class="fa fa-clock-o mr-1"></i>21 Mayo, 2019</span>
                        <p class="text-small mt-2">
                            <b>Funcionarios: </b> Kinesiólogos, María Paz Adasme y Gonzalo Berna. <br>
                            <b>Fonoaudióloga: </b> María Fernández.

                            <br><br>
                            Se entrega atención kinésica y fonoaudiológica desde el año 2007, a niños y
                            jóvenes con necesidades especiales: síndrome de Down, parálisis cerebral,
                            genopatías, retraso del desarrollo psicomotor moderado y severo, prematuros
                            extremos de la Comuna de Los Álamos, cuyas edades estén entre 0 y 18 años.
                            Su finalidad es mejorar la calidad de vida de los menores en las áreas motoras y
                            del lenguaje, además de apoyar su entorno familiar, educacional y social.
                        </p>
                    </li>

                    <li class="timeline-item bg-white rounded ml-3 p-4 shadow">
                        <div class="timeline-arrow"></div>
                        <h2 class="h5 mb-0">OIRS <small>(Oficina de Informaciones Reclamos y Sugerencias)</small></h2><span class="small text-gray"><i class="fa fa-clock-o mr-1"></i>21 Mayo, 2019</span>
                        <p class="text-small mt-2">
                            <b>Encargada: </b> María Paz Adasme <br>
                            <b>Funcionaria: </b> Katherine Torres .

                            <br><br>
                            La oficina de información, reclamos y sugerencias (OIRS) es un espacio de
                            participación ciudadana y una vía de comunicación con nuestros
                            establecimientos de salud (Cesfam, Postas y SAR), facilitando el acceso a la
                            información sobre el funcionamiento y atención en las prestaciones de salud
                            otorgadas en sus establecimientos.
                            Su finalidad es garantizar el derecho de los ciudadanos a informarse, sugerir,
                            reclamar y/o felicitar, acerca de las diversas materias en salud, retroalimentando
                            la gestión de las reparticiones públicas.

                        </p>
                    </li>

                    <li class="timeline-item bg-white rounded ml-3 p-4 shadow">
                        <div class="timeline-arrow"></div>
                        <h2 class="h5 mb-0">IRA <small>(Infecciones Respiratorias Agudas)</small></h2><span class="small text-gray"><i class="fa fa-clock-o mr-1"></i>18 Agosto, 2019</span>
                        <p class="text-small mt-2">
                            Es un programa de salud respiratoria que realiza tratamientos, controles, visitas y
                            educación respiratoria usuarios menores de 20 años con enfermedades
                            respiratorias agudos y crónicos.
                            Tiene tres unidades de atención respiratoria: Una Sala IRA Cesfam Los Álamos, y una
                            Sala IRA
                            Posta Cerro Alto (inhabilitada por Pandemia) más una unidad anexa al programa,
                            para exámenes respiratorios funcionales y rehabilitación pulmonar.
                            El equipo lo conforman 2 kinesiólogos (uno en cada sala IRA), un Médico y un TENS
                            <br><br>
                            Actividades principales: <br>
                            <p class="text-small mt-2 pl-2">
                                <strong>a) En enfermedades respiratorias agudas:</strong>
                                <ul>
                                    <li>Se realizan procedimientos de kinesioterapia respiratoria, nebulizaciones,inhalaciones entre otras, cuyo objetivo es despejar secreciones pulmonares, y contribuir a mejorar la dificultad respiratoria.</li>
                                    <li>Son atendidas por kinesiólogo</li>
                                    <li>Importante: Requisitos previos del usuario para esta atención</li>
                                    <li>Asistir con acompañante de 18 años o más</li>
                                    <li>Traer aerocámara, si está indicado</li>
                                    <li>No dar alimentos una hora antes de la citación</li>
                                    <li>Las horas se deben solicitar en SOME Transversal o postas según residencia, en horario hábil con hoja de derivación de médico, en caso de solicitar ingreso, o carnet de atención kinésica en caso de usuarios en tratamiento.</li>
                                    <li>En caso de inasistencia a terapia kinésica se podrá solicitar hora nuevamente siempre y cuando no transcurran más de 7 días desde la última atención, en caso contrario deberá ser evaluado por médico, esto también procede para solicitar ingresar a terapia respiratoria,(el usuario deberá asistir dentro de 7 días desde la fecha de derivación médica).</li>
                                </ul>
                                <br>
                                <strong> b) En enfermedades crónicas:</strong>
                                <ul>
                                    <li>Se realizan controles y tratamiento de enfermedades crónicas respiratorias, principalmente asma y síndrome bronquial obstructivo recurrente. El objetivo es mantener compensados y buena calidad de vida a los usuarios bajo control. Estos son realizados por médico y Kinesiólogo</li>
                                    <li>Las horas se deben solicitar en some transversal en horario hábil, con hoja de derivación de médico en caso de solicitar ingreso, o carnet de control poli ira en caso de usuarios en control</li>
                                    <li>En unidad de exámenes respiratorios funcionales que se encuentra en Cesfam Los Álamos, sector transversal: Se realizan exámenes como espirometrias y test de provocación bronquial con ejercicio, estos apoyan el diagnóstico de las enfermedades respiratorias crónicas, ayudan a evaluar nivel de control, y efecto del tratamiento.</li>
                                    <li>También se realiza rehabilitación pulmonar a través de ejercicios respiratorios y generales, a usuarios con algunas enfermedades respiratorias crónicas q y cuyo objetivo es mejorar la capacidad de realizar actividades de la vida diaria y calidad de vida.</li>
                                    <li>Es atendida por Kinesiólogos de programas IRA y ERA según grupo etario y prestaciones</li>
                                    <li>Las horas se deben solicitar en SOME transversal en horario hábil con derivación de médico por escrito. Some entregará al usuario hora y hoja de requisitos previos del paciente para realizar estos exámenes</li>
                                </ul>
                                <br>
                                <strong> c) Visitas a usuarios crónicos respiratorios y educación respiratoria integral a grupos vulnerables</strong>
                            </p>
                        </p>
                    </li>

                    <li class="timeline-item bg-white rounded ml-3 p-4 shadow">
                        <div class="timeline-arrow"></div>
                        <h2 class="h5 mb-0">IMAGENOLOGÍA</h2><span class="small text-gray"><i class="fa fa-clock-o mr-1"></i>10 Octubre, 2019</span>
                        <p class="text-small mt-2 font-weight-light">
                            El servicio de imagenología de nuestro servicio cuenta con un equipo de avanzada
                            tecnología un samsung gu60a el cual es de radiología digital directa lo cual
                            significa que obtenemos imágenes en el menor tiempos posibles, dosis de radiación
                            muy reducidas con una excelente calidad diagnóstica y con una excelente
                            seguridad paciente y operador, nos permite la realización de varios exámenes del
                            cuerpo, incluyendo cráneo, tórax, extremidades inferiores y superiores, columna
                            vertebral fraccionada o columna total (stitching), screening, etc. <br><br>
                            La gran tecnología con la que contamos permite que las radiografías sean
                            almacenadas en toda nuestra red asistencial SAR, CESFAM y POSTAS como
                            también pueden ser visualizadas en HOSPITAL DR. RAFAEL AVARIA VALENZUELA Y
                            HOSPITAL SANTA ISABEL LEBU, también nos permite que a nuestros pacientes el
                            exámenes se le pueda enviar a su correo, whatsapp o entregado en un cd o
                            pendrive. <br><br>
                            El equipo cuenta con 2 tecnólogos medico en imagenologia y física médica los
                            cuales se distribuyen para dar funcionalidad a nuestro servicio en horarios de lunes
                            a viernes de 08:00 a las 20:00 y los días sábados 08:00 a 16:00 hrs, los días domingos
                            y festivos no se cuenta con servicio de imagenología.
                        </p>
                    </li>
                    <li class="timeline-item bg-white rounded ml-3 p-4 shadow">
                        <div class="timeline-arrow"></div>
                        <h2 class="h5 mb-0">CCR <small>(Centro Comunitario de Rehabilitación)</small></h2><span class="small text-gray"><i class="fa fa-clock-o mr-1"></i>10 Octubre, 2019</span>
                        <p class="text-small mt-2">
                            El Programa de Rehabilitación Integral, es una estrategia de base comunitaria
                            impulsada por el Ministerio de Salud, cuyo objetivo principal es aumentar la
                            cobertura de rehabilitación, la promoción y la prevención de los problemas de
                            salud física y sensorial en la red de atención primaria. <br><br>
                            Sus objetivos son Asumir la rehabilitación integral a personas en situación de
                            discapacidad en su comunidad con un enfoque biopsicosocial. <br><br>
                            Tratamiento integral de rehabilitación a las personas en situación de discapacidad
                            leve, transitoria o permanente. <br><br>
                            Apoyar la resolución en APS de los síndromes dolorosos de origen osteomuscular.
                            Apoyar el manejo de las personas en situación de discapacidad moderada y
                            severa y de sus familias. <br><br>
                            Apoyar el desarrollo de redes y el trabajo intersectorial. <br>
                            Educación y prevención de discapacidad. <br><br>
                            Apoyo al trabajo con los grupos de riesgo. <br>
                            El equipo está compuesto por dos Kinesiólogas <strong>(Marilyn Cuevas y Nicole Mujica)</strong> y
                            dos Terapeutas Ocupacional <strong>(Mauricio Rojas y Josseline Neira). </strong>
                        </p>
                    </li>
                    <li class="timeline-item bg-white rounded ml-3 p-4 shadow">
                        <div class="timeline-arrow"></div>
                        <h2 class="h5 mb-0">PROGRAMA ADOLESCENTE</h2><span class="small text-gray"><i class="fa fa-clock-o mr-1"></i>10 Octubre, 2019</span>
                        <p class="text-small mt-2">
                            El Programa de Salud Integral de adolescentes tiene como propósito mejorar
                            acceso a la atención en salud de los Niños, Niñas y adolescente entre los 10 y 19
                            años en los distintos niveles de atención del sistema de salud, que responda a las
                            necesidades actuales, con enfoque de género y pertinencia cultural, en el ámbito
                            de la promoción, prevención, tratamiento y rehabilitación. Dentro de este, cuenta
                            con la estrategia “Espacios Amigables” donde se ofrece atención integral en
                            horarios diferenciados, con demanda espontánea si corresponde.
                        </p>
                    </li>
                    <li class="timeline-item bg-white rounded ml-3 p-4 shadow">
                        <div class="timeline-arrow"></div>
                        <h2 class="h5 mb-0">Salud Familiar </h2><span class="small text-gray"><i class="fa fa-clock-o mr-1"></i>10 Octubre, 2019</span>
                        <p class="text-small mt-2">
                            El Modelo de Atención Integral de Salud, de carácter familiar y comunitario,
                            entiende que la atención de salud debe ser un proceso integral y continuo que
                            centre su atención en las personas y sus familias: que priorice actividades de
                            promoción de la salud, prevención de la enfermedad y se preocupe de las
                            necesidades de salud de las personas y comunidades, entregándoles herramientas
                            para su autocuidado. Su énfasis radica en la promoción de estilos de vida
                            saludables; en fomentar la acción intersectorial y fortalecer la responsabilidad
                            familiar y comunitaria, a fin de mejorar las condiciones de salud.
                        </p>
                    </li>
                    <li class="timeline-item bg-white rounded ml-3 p-4 shadow">
                        <div class="timeline-arrow"></div>
                        <h2 class="h5 mb-0">PNAC PACAM</h2><span class="small text-gray"><i class="fa fa-clock-o mr-1"></i>10 Octubre, 2019</span>
                        <p class="text-small mt-2">
                            Programa nacional de alimentación complementaria, PNAC; Es un programa de
                            carácter universal que considera un conjunto de actividades de apoyo nutricional
                            de tipo preventivo y de recuperación, a través del cual se distribuyen alimentos
                            destinados a la población infantil menor a 6 años, gestantes y madres que
                            amamantan, así como a la población menor a 25 años con diagnóstico de error
                            innato del metabolismo. <br><br>
                            Programa Alimentación Complementaria del Adulto mayor pacam; El PACAM es
                            parte de un conjunto de actividades de apoyo alimentario nutricional de carácter
                            preventivo y de recuperación, que distribuye alimentos fortificados con
                            micronutrientes a los adultos mayores, en los establecimientos de Atención Primaria
                            del Sistema Nacional de Servicios de Salud. A su vez, es un componente integral del
                            Programa de Salud del Adulto Mayor y se vincula con otras actividades de
                            medicina preventiva y curativa, como la promoción del envejecimiento saludable
                            y el mantenimiento y mejoramiento de la funcionalidad física y síquica. De este
                            modo se convierte en un instrumento de las acciones de protección de la salud,
                            más allá del ámbito estrictamente nutricional.
                        </p>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- CAMBIAR EL ITEM DEL NAVBAR SELECCIONADO -->
    <script>
        $("#programas").attr('class', 'nav-item active');
    </script>
    
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>

</html>