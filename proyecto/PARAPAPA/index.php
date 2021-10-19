<?php include 'head/head.php'; ?>
<title>Gráficos</title>
<!-- <link rel="stylesheet" href="https://unicons.iconscout.com/release/v3.0.6/css/line.css"> -->
</head>

<body id="page-top">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');

        /* * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        } */

        .apper {
            position: fixed;
            top: 80px;
            left: 80px;
            animation: show_toast 1s ease forwards;
            font-family: 'Poppins', sans-serif;
        }

        @keyframes show_toast {
            0% {
                transform: translateX(-100%);
            }

            40% {
                transform: translateX(10%);
            }

            80%,
            100% {
                transform: translateX(20px);
            }
        }

        .apper.hide {
            animation: hide_toast 1s ease forwards;
        }

        @keyframes hide_toast {
            0% {
                transform: translateX(20px);
            }

            40% {
                transform: translateX(10%);
            }

            80%,
            100% {
                opacity: 0;
                pointer-events: none;
                transform: translateX(-100%);
            }
        }

        .apper .toasteador {
            background: #fff;
            padding: 20px 15px 20px 20px;
            border-radius: 10px;
            border-left: 5px solid #2ecc71;
            box-shadow: 1px 7px 14px -5px rgba(0, 0, 0, 0.15);
            width: 430px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .apper .toasteador.offline {
            border-color: #ccc;
        }

        .toasteador .contenido {
            display: flex;
            align-items: center;
        }

        .contenido .icon {
            font-size: 25px;
            color: #fff;
            height: 50px;
            width: 50px;
            text-align: center;
            line-height: 50px;
            border-radius: 50%;
            background: #2ecc71;
        }

        .toasteador.offline .contenido .icon {
            background: #ccc;
        }

        .contenido .detalle {
            margin-left: 15px;
        }

        .detalle span {
            font-size: 20px;
            font-weight: 500;
        }

        .detalle p {
            color: #878787;
        }

        .toasteador .close-icon {
            color: #878787;
            font-size: 23px;
            cursor: pointer;
            height: 40px;
            width: 40px;
            text-align: center;
            line-height: 40px;
            border-radius: 50%;
            background: #f2f2f2;
            transition: all 0.3s ease;
        }

        .close-icon:hover {
            background: #efefef;
        }
    </style>

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column ">
            <!-- Main Content -->
            <div id="content">
                <?php include 'head/topbar.php'; ?>

                <div class="container-fluid" style="padding-bottom:8%;">


                    <!-- ==================================== ACUMULADOS Y FALLECIDOS=========================================-->

                    <div class="row  justify-content-center pt-5">
                        <div class="col-xs-12 col-lg-7" id="grafico1">
                            <div class="card shadow mb-4">
                                <div class="card-body">
                                    <div class="row justify-content-center">
                                        <div class="col-lg-12">
                                            <canvas id="acumuladoyfallecido"></canvas>
                                        </div>
                                    </div>
                                    <hr>
                                    <code> Letalidad desde Inicio de Pandemia 1.19% </code>
                                    <span class="btn btn-sm btn-success float-right" id="ACYFLL" title="Exportar en Excel"><i class="fa fa-file-excel"></i> </span>
                                </div>
                            </div>
                        </div>

                        <!-- ==================================== VACUNADOS Y NO VACUNADOS=========================================-->
                        <div class="col-xs-12 col-lg-7" id="grafico2">
                            <div class="card shadow mb-4">
                                <div class="card-body">
                                    <div class="row justify-content-center">
                                        <div class="col-lg-12">
                                            <canvas id="VacunadosYnoVacunados"></canvas>
                                        </div>
                                    </div>
                                    <hr>
                                    <code> Avance Vacunación Curanilahue(Población Objetivo:25.716)</code>
                                    <span class="btn btn-sm btn-success float-right" id="VACYNOVAC" title="Exportar en Excel"><i class="fa fa-file-excel"></i> </span>
                                </div>
                            </div>
                        </div>

                        <!-- ==================================== PROBAR=========================================-->
                        <!-- <div class="col-xs-12 col-lg-7">
                            <div class="card shadow mb-4">
                                <div class="card-body">
                                    <div class="row justify-content-center">
                                        <div class="col-lg-12">
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                            </div>
                        </div> -->


                        <div class="apper" style="display:none">
                            <div class="toasteador">
                                <div class="contenido">
                                    <div class="icon"><i class="fa fa-wifi"></i></div>
                                    <div class="detalle">
                                        <span>Bienvenido</span>
                                        <p>Sistema de Salud Los Álamos.</p>
                                    </div>
                                </div>
                                <div class="close-icon">&#x2718;</div>
                            </div>
                        </div>


                    </div>

   

                </div>
            </div>
            <!-- End of Main Content -->
            <?php include 'head/footer.php'; ?>
        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->


    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <script src="js/jquery.min.js"></script>
    <!--Para hacer funcionar los scripts-->
    <script src="js/sb-admin-2.min.js"></script>
    <!--Js de la plantilla en general-->
    <script src="js/bootstrap.bundle.min.js"></script>
    <!--Para activar el navbar cuando este en modo celular-->
    <script src="js/jquery.easing.min.js"></script>
    <!--Para la flecha scroll-->

    <script src="js/Grafico.min.js"></script>
    <!--Para los gráficos-->
    <script src="js/navegacion.js"></script>
    <!--Activo el scroll y navegue desde el navbar hacia donde quieras... Desde el navbar #ejemplo1 y desde un div con id="ejemplo1"-->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.13.1/xlsx.full.min.js"></script>
    <!--Libreria para exportar en excel -->
    <script src="js/funcionexportar.js"></script>


    <script>
        //=============================ACUMULADOS Y FALLECIDOS====================================//
        var ctc = document.getElementById('acumuladoyfallecido');
        var miaf = new Chart(ctc, {
            type: 'doughnut',
            data: {
                labels: ['Acumulado', 'Fallecidos'],
                datasets: [{
                    label: ['#Totales', '#Fallecidos'],
                    data: [3289, 39],
                    backgroundColor: [
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(153, 102, 255, 0.2)'
                    ],
                    borderWidth: 1
                }]
            }
            // ,
            // options: {
            //     scales: {
            //         yAxes: [{
            //             ticks: {
            //                 beginAtZero: true
            //             }
            //         }]
            //     }
            // }
        });


        //=============================VACUNADOS Y NO VACUNADOS====================================//
        var ctx = document.getElementById('VacunadosYnoVacunados');
        var grafico6 = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['No Vacunados', 'Dosis N°1', 'Dosis N°2'],
                datasets: [{
                    label: ['#No Vacunados', '#Dosis1', '#Dosis2'],
                    data: [9065, 16651, 12921],
                    backgroundColor: [
                        'rgba(255, 0, 0, 0.2)',
                        'rgba(169, 50, 38, 0.51)',
                        'rgba(255, 99, 132, 0.2)'
                    ],
                    borderWidth: 1
                }]
            }
        });


        var acVSfll = [{
            "Acumulados": "3289",
            "Fallecidos": "39"
        }];
        var vacYNvac = [{
            "No Vacunados": "9065",
            "Primera Dosis": "16651",
            "Segunda Dosis": "12921"
        }];


        $("#ACYFLL").on('click', event => ExportDataToExcel('Acumulados vs Fallecidos', acVSfll));
        $("#VACYNOVAC").on('click', event => ExportDataToExcel('Vacunados vs No Vacunados', vacYNvac));
    </script>


    <script>
        // $(".apper").hide();
        // Selecting all required elements

        // $('.apper').html(`  <div class="toasteador">
        //                         <div class="contenido">
        //                             <div class="icon"><i class="fas fa-wifi"></i></div>
        //                             <div class="detalle">
        //                                 <span>Estás en línea ahora</span>
        //                                 <p>¡Viva! Internet está conectado.</p>
        //                             </div>
        //                         </div>
        //                         <div class="close-icon"><i class="fad fa-wifi-slash"></i></div>
        //                     </div>`);


        const wrapper = document.querySelector(".apper"),
            toast = wrapper.querySelector(".toasteador"),
            title = toast.querySelector("span"),
            subTitle = toast.querySelector("p"),
            wifiIcon = toast.querySelector(".icon"),
            closeIcon = toast.querySelector(".close-icon");

        window.onload = () => {
            function enlinea() {
                let xhr = new XMLHttpRequest(); //creando un nuevo objeto XML
                // var url = window.location.href;
                // console.log(url);
                xhr.open("GET", "https://jsonplaceholder.typicode.com/posts", true); //enviando solicitud de obtención en esta URL
                xhr.onload = () => { //enviando solicitud de obtención en esta URL
                    //si el estado de ajax es igual a 200 o menos de 300, eso significa que el usuario está obteniendo datos de la URL proporcionada
                    //o su estado de respuesta es 200, lo que significa que está en línea
                    if (xhr.status == 200 && xhr.status < 300) {
                        // $('.apper').removeAttr('hidden');
                        toast.classList.remove("offline");
                        title.innerText = "Estás en línea";
                        subTitle.innerText = "¡Viva! Internet está conectado.";
                        wifiIcon.innerHTML = '<i class="fas fa-wifi"></i>';
                        closeIcon.onclick = () => { //ocultar la notificación de brindis en el icono de cierre, haga clic en
                            wrapper.classList.add("hide");
                        }
                        setTimeout(() => { //ocultar la notificación del brindis automáticamente después de 2 segundos, estando activo
                            wrapper.classList.add("hide");
                        }, 2000);
                    } else {
                        // $('.apper').removeAttr('hidden');
                        offline(); //llamar a la función fuera de línea si el estado de ajax no es igual a 200 o no menos de 300
                    }
                }
                xhr.onerror = () => {
                    offline(); //llamar a la función fuera de línea si la URL pasada no es correcta o devolver 404 u otro error
                }
                xhr.send(); //enviando una solicitud de obtención a la URL pasada
            }

            function offline() { //function for offline
                // $(".apper").attr("hidden",false);
                $(".apper").css("display", "");
                wrapper.classList.remove("hide");
                toast.classList.add("offline");
                title.innerText = "Estás desconectado";
                subTitle.innerText = "¡UpS! No estas conectado a Internet.";
                wifiIcon.innerHTML = '<i class="fa fa-warning"></i>';
            }

            setInterval(() => { //esta función setInterval llama a ajax con frecuencia después de 100 ms
                enlinea();
            }, 1000);
        }
    </script>
</body>

</html>