<?php session_start();
include '../partes/head.php'; ?>
<style>
    .btn-outline-orange {
        color: #fd7e14;
        border-color: #fd7e14;
    }

    .btn-outline-primary:hover {
        color: #fff;
        background-color: #1266f1;
        border-color: #1266f1;
    }

    .btn-outline-primary:focus {
        color: #fff;
        background-color: #1266f1;
        border-color: #1266f1;
    }

    .btn-outline-warning:hover {
        color: #fff;
        background-color: #ffc107;
        border-color: #ffc107;
    }

    .btn-outline-warning:focus {
        color: #fff;
        background-color: #ffc107;
        border-color: #ffc107;
    }

    .btn-outline-danger:hover {
        color: #fff;
        background-color: #dc3545;
        border-color: #dc3545;
    }

    .btn-outline-danger:focus {
        color: #fff;
        background-color: #dc3545;
        border-color: #dc3545;
    }

    .btn-outline-success:hover {
        color: #fff;
        background-color: #28a745;
        border-color: #28a745;
    }

    .btn-outline-success:focus {
        color: #fff;
        background-color: #28a745;
        border-color: #28a745;
    }

    .btn-outline-orange:hover {
        color: #fff;
        background-color: #c76412;
        border-color: #c76412;
    }

    .btn-outline-orange:focus {
        color: #fff;
        background-color: #c76412;
        border-color: #c76412;
    }

    /*BOTONES DE LA RED SOCIAL DENTRO DEL CARD*/
    .social-link {
        width: 30px;
        height: 30px;
        border: 1px solid #ddd;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #666;
        border-radius: 50%;
        transition: all 0.3s;
        font-size: 0.9rem;
    }

    .social-link:hover,
    .social-link:focus {
        background: #ddd;
        text-decoration: none;
        color: #555;
    }

    /*BOTONES DE LA RED SOCIAL DENTRO DEL CARD*/


    /*ANIMACIÓN DEL CARD*/
    .card {
        box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
        border-radius: 5px;
        -webkit-transition: all 0.6s cubic-bezier(0.165, 0.84, 0.44, 1);
        transition: all 0.6s cubic-bezier(0.165, 0.84, 0.44, 1);
    }

    .card::after {
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        opacity: 0;
        -webkit-transition: all 0.6s cubic-bezier(0.165, 0.84, 0.44, 1);
        transition: all 0.6s cubic-bezier(0.165, 0.84, 0.44, 1);
    }

    .card:hover {
        -webkit-transform: translateY(-15px);
        /*Transición para arriba*/
        transform: translateY(-15px);
    }

    .card:hover::after {
        opacity: 1;
    }

    /*ANIMACIÓN DEL CARD*/

    @media (max-width: 600px) {

        /*TAMAÑO RESPONSIVO DEL BOTON CERRAR DEL SWAL, PARA QUE FUERA MÁS GRANDE DEL POR DEFECTO*/
        .au {
            width: 140px;
        }
    }

    @media (min-width: 768px) {
        .au {
            width: 500px;
        }
    }

    @media (min-width: 1038px) {
        .au {
            width: 700px;
        }
    }

    .swal2-title {
        position: relative;
        max-width: 100%;
        margin: 0 0 .2em;
        padding: 0;
        color: #595959;
        font-size: 2.275em;
        font-weight: 700;
        text-align: center;
        text-transform: none;
        word-wrap: break-word;
    }

    /* .swal2-popup {
        background-color: #ffffff;
        background-image: url(rojo.svg);
        background-attachment: fixed;
        background-repeat: no-repeat;
        background-position: bottom center;
    } */
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

<title>Salud los Álamos - Jefes de sector</title>
</head>

<body style="background-color: #f4f1f1; ">

    <?php include '../partes/navbar.php'; ?>


    <div class="container-fluid" style="padding-top:80px;padding-bottom:30px;">
        <header class="text-center">
            <h1 class="font-weight-bold mb-2" style="color: #6a97bd;font-size: 50px;">Jefes D<span style="color:#90bde4;">e Sector</span></h1>
            <p>A continuación les presentamos los jefes de sectores del área de salud los alamos.</p>
        </header>

        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-6 py-2">
                    <div class="card shadow">
                        <img src="jefes/Lucia Nain .jpg" class="card-img-top" alt="...">
                        <div class="card-body text-center" style="border-top: 3px solid #dc3545;">
                            <h5 class="card-title">Lucía Naín</h5>
                            <p class="card-text">Jefe de sector <span style="color: #dc3545;"> <br> <strong>ROJO</strong></span><br> <span><small>Población: 5.950</small></span></p>
                            <ul class="social mb-0 list-inline mt-3 text-center">
                                <li class="list-inline-item m-0"><a href="javascript:void(0)" class="social-link"><i class="fa fa-facebook-f"></i></a></li>
                                <li class="list-inline-item m-0"><a href="javascript:void(0)" class="social-link"><i class="fa fa-twitter"></i></a></li>
                                <li class="list-inline-item m-0"><a href="javascript:void(0)" class="social-link"><i class="fa fa-instagram"></i></a></li>
                                <li class="list-inline-item m-0"><a href="javascript:void(0)" class="social-link"><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                        <div class="card-footer" style="background: inherit; border-color: inherit; border:0">
                            <!-- <a href="javascript:void(0)" class="btn btn-primary">Option</a> -->
                            <label class="btn btn-outline-danger btn-block" id="personalsectorrojo">Ver personal</label>
                            <!--data-toggle="modal" data-target="#personalsectorverde" -->
                        </div>
                    </div>
                </div>

                <div class="col-lg-2 col-md-6 py-2">
                    <div class="card shadow">
                        <img src="jefes/daniela saldias.bmp" class="card-img-top" alt="...">
                        <div class="card-body text-center" style="border-top: 3px solid #28a745;">
                            <h5 class="card-title">Daniela Saldias Gallardo</h5>
                            <p class="card-text">Jefe de sector <span style="color:#28a745;"> <strong>VERDE</strong></span> <br> <span><small>Población: 5.800</small></span></p>
                            <ul class="social mb-0 list-inline mt-3 text-center">
                                <li class="list-inline-item m-0"><a href="javascript:void(0)" class="social-link"><i class="fa fa-facebook-f"></i></a></li>
                                <li class="list-inline-item m-0"><a href="javascript:void(0)" class="social-link"><i class="fa fa-twitter"></i></a></li>
                                <li class="list-inline-item m-0"><a href="javascript:void(0)" class="social-link"><i class="fa fa-instagram"></i></a></li>
                                <li class="list-inline-item m-0"><a href="javascript:void(0)" class="social-link"><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                        <div class="card-footer" style="background: inherit; border-color: inherit; border:0">
                            <!-- <a href="javascript:void(0)" class="btn btn-primary">Option</a> -->
                            <label class="btn btn-outline-success btn-block" id="personalsectorverde">Ver personal</label>
                            <!--data-toggle="modal" data-target="#personalsectoramarillo" -->
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 py-2">
                    <div class="card shadow">
                        <img src="jefes/Karen Gajardo Lavandero .jpg" class="card-img-top" alt="...">
                        <div class="card-body text-center" style="border-top: 3px solid #c76412;">
                            <h5 class="card-title">Karen Gajardo Lavandero</h5>
                            <p class="card-text">Jefe de sector <span style="color: #fd7e14;"> <br> <strong>TRANSVERSAL</strong></span></p>
                            <ul class="social mb-0 list-inline mt-3 text-center">
                                <li class="list-inline-item m-0"><a href="javascript:void(0)" class="social-link"><i class="fa fa-facebook-f"></i></a></li>
                                <li class="list-inline-item m-0"><a href="javascript:void(0)" class="social-link"><i class="fa fa-twitter"></i></a></li>
                                <li class="list-inline-item m-0"><a href="javascript:void(0)" class="social-link"><i class="fa fa-instagram"></i></a></li>
                                <li class="list-inline-item m-0"><a href="javascript:void(0)" class="social-link"><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                        <div class="card-footer" style="background: inherit; border-color: inherit; border:0">
                            <!-- <a href="javascript:void(0)" class="btn btn-primary">Option</a> -->
                            <label class="btn btn-outline-orange btn-block" id="personalsectortransversal">Ver personal</label> <!-- data-toggle="modal" data-target="#personalsectortransversal" -->
                        </div>
                    </div>
                </div>

                <div class="col-lg-2 col-md-6 py-2">
                    <div class="card shadow">
                        <img src="jefes/Gonzalo Sepulveda .jpg" class="card-img-top" alt="...">
                        <div class="card-body text-center" style="border-top: 3px solid #ffc107;">
                            <h5 class="card-title">Gonzalo Sepúlveda Arriagada</h5>
                            <p class="card-text">Jefe de sector <span style="color:#fdba33"> <strong>AMARILLO</strong></span><br> <span><small>Población: 4.480</small></span></p>
                            <ul class="social mb-0 list-inline mt-3 text-center">
                                <li class="list-inline-item m-0"><a href="javascript:void(0)" class="social-link"><i class="fa fa-facebook-f"></i></a></li>
                                <li class="list-inline-item m-0"><a href="javascript:void(0)" class="social-link"><i class="fa fa-twitter"></i></a></li>
                                <li class="list-inline-item m-0"><a href="javascript:void(0)" class="social-link"><i class="fa fa-instagram"></i></a></li>
                                <li class="list-inline-item m-0"><a href="javascript:void(0)" class="social-link"><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                        <div class="card-footer" style="background: inherit; border-color: inherit; border:0">
                            <!-- <a href="javascript:void(0)" class="btn btn-primary">Option</a> -->
                            <label class="btn btn-outline-warning btn-block" id="personalsectoramarillo">Ver personal</label>
                            <!--data-toggle="modal" data-target="#personalsectorazul"-->
                        </div>
                    </div>
                </div>

                <div class="col-lg-2 col-md-6 py-2">
                    <div class="card shadow">
                        <img src="jefes/Jose Peña Caniupan.jpg" class="card-img-top" alt="...">
                        <div class="card-body text-center" style="border-top: 3px solid #007bff;">
                            <h5 class="card-title">José Peña Caniupán</h5>
                            <p class="card-text">Jefe de sector <span style="color:#007bff;"> <br> <strong>AZUL</strong></span><br> <span> <small> Población: 4.770 </small></span></p>
                            <ul class="social mb-0 list-inline mt-3 text-center">
                                <li class="list-inline-item m-0"><a href="javascript:void(0)" class="social-link"><i class="fa fa-facebook-f"></i></a></li>
                                <li class="list-inline-item m-0"><a href="javascript:void(0)" class="social-link"><i class="fa fa-twitter"></i></a></li>
                                <li class="list-inline-item m-0"><a href="javascript:void(0)" class="social-link"><i class="fa fa-instagram"></i></a></li>
                                <li class="list-inline-item m-0"><a href="javascript:void(0)" class="social-link"><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                        <div class="card-footer" style="background: inherit; border-color: inherit; border:0">
                            <!-- <a href="javascript:void(0)" class="btn btn-primary">Option</a> -->
                            <label class="btn btn-outline-primary btn-block" id="personalsectorazul">Ver personal</label>
                            <!--data-toggle="modal" data-target="#personalsectorrojo"-->
                        </div>
                    </div>
                </div>
            </div><!-- end row -->
        </div>

        <div class="container">

        </div>



        <!-- <div class="row justify-content-center text-center">
                <div class="col-xl-2">
                    <a class="btn btn-outline-primary" href="#carouselExampleControls" role="button" data-slide="prev"> <i class="fas fa-chevron-circle-left"></i> </a>
                </div>

                <div class="col-xl-2">
                    <a class="btn btn-outline-primary" href="#carouselExampleControls" role="button" data-slide="next"> <i class="fas fa-chevron-circle-right"></i> </a>
                </div>
            </div>
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-item active">
                    <div class="row py-3">

                        <div class="col-lg-2 col-md-6 py-3">
                            <div class="card shadow border-0 rounded">
                                <div class="card-body p-4"><img src="personal_amarillo/Fernando Villalobos Acuña.JPG" alt="" class="img-fluid d-block mx-auto mb-3 rounded-circle">
                                    <div class="p-3">
                                        <h5 class="mb-0 text-center">Fernando Villalobos Acuña</h5>
                                        <ul class="social mb-0 list-inline mt-3 text-center">
                                            <li class="list-inline-item m-0"><a href="javascript:void(0);" class="social-link" style="background-color:white;" onmouseover="this.style.backgroundColor=\#ddd\" onmouseout="this.style.backgroundColor=\#fff\"><i class="fa fa-facebook-f" style="color:#666"></i></a></li>
                                            <li class="list-inline-item m-0"><a href="javascript:void(0);" class="social-link"><i class="fa fa-twitter"></i></a></li>
                                            <li class="list-inline-item m-0"><a href="javascript:void(0);" class="social-link"><i class="fa fa-instagram"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-2 col-md-6 py-3">
                            <div class="card shadow border-0 rounded">
                                <div class="card-body p-4"><img src="personal_amarillo/Nicole Covili García.JPG" alt="" class="img-fluid d-block mx-auto mb-3 rounded-circle">
                                    <div class="p-3">
                                        <h5 class="mb-0 text-center">Nicole Covili García</h5>
                                        <ul class="social mb-0 list-inline mt-3 text-center">
                                            <li class="list-inline-item m-0"><a href="javascript:void(0);" class="social-link" style="background-color:white;" onmouseover="this.style.backgroundColor=\#ddd\" onmouseout="this.style.backgroundColor=\#fff\"><i class="fa fa-facebook-f" style="color:#666"></i></a></li>
                                            <li class="list-inline-item m-0"><a href="javascript:void(0);" class="social-link"><i class="fa fa-twitter"></i></a></li>
                                            <li class="list-inline-item m-0"><a href="javascript:void(0);" class="social-link"><i class="fa fa-instagram"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="carousel-item">
                    <div class="row py-3">
                        <div class="col-lg-2 col-md-6 py-3">
                            <div class="card shadow border-0 rounded">
                                <div class="card-body p-4"><img src="personal_amarillo/Gonzalo Sepúlveda Arriagada.JPG" alt="" class="img-fluid d-block mx-auto mb-3 rounded-circle">
                                    <div class="p-3">
                                        <h5 class="mb-0 text-center">Gonzalo Sepúlveda Arriagada</h5>
                                        <ul class="social mb-0 list-inline mt-3 text-center">
                                            <li class="list-inline-item m-0"><a href="javascript:void(0);" class="social-link" style="background-color:white;" onmouseover="this.style.backgroundColor=\#ddd\" onmouseout="this.style.backgroundColor=\#fff\"><i class="fa fa-facebook-f" style="color:#666"></i></a></li>
                                            <li class="list-inline-item m-0"><a href="javascript:void(0);" class="social-link"><i class="fa fa-twitter"></i></a></li>
                                            <li class="list-inline-item m-0"><a href="javascript:void(0);" class="social-link"><i class="fa fa-instagram"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-2 col-md-6 py-3">
                            <div class="card shadow border-0 rounded">
                                <div class="card-body p-4"><img src="personal_amarillo/Johana Aniñir Aniñir.JPG" alt="" class="img-fluid d-block mx-auto mb-3 rounded-circle">
                                    <div class="p-3">
                                        <h5 class="mb-0 text-center">Johana Aniñir Aniñir</h5>
                                        <ul class="social mb-0 list-inline mt-3 text-center">
                                            <li class="list-inline-item m-0"><a href="javascript:void(0);" class="social-link" style="background-color:white;" onmouseover="this.style.backgroundColor=\#ddd\" onmouseout="this.style.backgroundColor=\#fff\"><i class="fa fa-facebook-f" style="color:#666"></i></a></li>
                                            <li class="list-inline-item m-0"><a href="javascript:void(0);" class="social-link"><i class="fa fa-twitter"></i></a></li>
                                            <li class="list-inline-item m-0"><a href="javascript:void(0);" class="social-link"><i class="fa fa-instagram"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-2 col-md-6 py-3">
                            <div class="card shadow border-0 rounded">
                                <div class="card-body p-4"><img src="personal_amarillo/Angélica Bastías Lobos.JPG" alt="" class="img-fluid d-block mx-auto mb-3 rounded-circle">
                                    <div class="p-3">
                                        <h5 class="mb-0 text-center">Angélica Bastías Lobos</h5>
                                        <ul class="social mb-0 list-inline mt-3 text-center">
                                            <div style="max-width: 0; max-height: 0; overflow: hidden;"><input autofocus="true" /></div>
                                            <li class="list-inline-item m-0"><a href="javascript:void(0);" class="social-link" style="background-color:white;" onmouseover="this.style.backgroundColor=\#ddd\" onmouseout="this.style.backgroundColor=\#fff\"><i class="fa fa-facebook-f" style="color:#666"></i></a></li>
                                            <li class="list-inline-item m-0"><a href="javascript:void(0);" class="social-link"><i class="fa fa-twitter"></i></a></li>
                                            <li class="list-inline-item m-0"><a href="javascript:void(0);" class="social-link"><i class="fa fa-instagram"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="carousel-item">
                    <div class="row py-3">

                        <div class="col-lg-2 col-md-6 py-3">
                            <div class="card shadow border-0 rounded">
                                <div class="card-body p-4"><img src="personal_amarillo/Patricia Fernández Godoy.JPG" alt="" class="img-fluid d-block mx-auto mb-3 rounded-circle">
                                    <div class="p-3">
                                        <h5 class="mb-0 text-center">Patricia Fernández Godoy</h5>
                                        <ul class="social mb-0 list-inline mt-3 text-center">
                                            <li class="list-inline-item m-0"><a href="javascript:void(0);" class="social-link" style="background-color:white;" onmouseover="this.style.backgroundColor=\#ddd\" onmouseout="this.style.backgroundColor=\#fff\"><i class="fa fa-facebook-f" style="color:#666"></i></a></li>
                                            <li class="list-inline-item m-0"><a href="javascript:void(0);" class="social-link"><i class="fa fa-twitter"></i></a></li>
                                            <li class="list-inline-item m-0"><a href="javascript:void(0);" class="social-link"><i class="fa fa-instagram"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-2 col-md-6 py-3">
                            <div class="card shadow border-0 rounded">
                                <div class="card-body p-4"><img src="personal_amarillo/Sonia Salgado.jpg" alt="" class="img-fluid d-block mx-auto mb-3 rounded-circle">
                                    <div class="p-3">
                                        <h5 class="mb-0 text-center">Sonia Salgado</h5>
                                        <ul class="social mb-0 list-inline mt-3 text-center">
                                            <li class="list-inline-item m-0"><a href="javascript:void(0);" class="social-link" style="background-color:white;" onmouseover="this.style.backgroundColor=\#ddd\" onmouseout="this.style.backgroundColor=\#fff\"><i class="fa fa-facebook-f" style="color:#666"></i></a></li>
                                            <li class="list-inline-item m-0"><a href="javascript:void(0);" class="social-link"><i class="fa fa-twitter"></i></a></li>
                                            <li class="list-inline-item m-0"><a href="javascript:void(0);" class="social-link"><i class="fa fa-instagram"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div> -->

    </div>

    </div>
    </div><!-- end container -->


    <div class="dmtop">Scroll to Top</div>

    </div><!-- end wrapper -->


    <!-- Core JavaScript
    ================================================== -->
    <script src="js/jefesdesectorswal.js"></script>
    <script src="../js/jquery.min.js"></script>
    <script src="../js/tether.min.js"></script>
    <!-- <script src="../js/bootstrap.min.js"></script> -->
    <!-- <script src="../js/custom.js"></script> -->
</body>

</html>