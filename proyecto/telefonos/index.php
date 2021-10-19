<?php session_start(); ?>
<?php include '../partes/head.php'; ?>
<style>
    .btn-primary:hover {
        color: #fff;
        background-color: #0551a2;
        border-color: #0551a2;
    }

    .btn-danger:hover {
        color: #fff;
        background-color: #c30505;
        border-color: #c30505;
    }

    .btn-success:hover {
        color: #fff;
        background-color: #1b6f2e;
        border-color: #1b6f2e;
    }

    .btn-info:hover {
        color: #fff;
        background-color: #11899c;
        border-color: #11899c;
    }

    .btn-warning:hover {
        color: #fff;
        background-color: #9c7a12;
        border-color: #9c7a12;
    }

    .plomo:hover {
        color: #fff;
        background-color: #465058;
        border-color: #465058;
    }

    .with-chevron[aria-expanded='true'] i {
        display: block;
        transform: rotate(180deg) !important;
    }

    .azul:focus {
        /*Color del focus*/
        outline: none;
        background-color: #0551a2;
        border-color: #0551a2;
    }

    .verde:focus {
        /*Color del focus*/
        outline: none;
        background-color: #1b6f2e;
        border-color: #1b6f2e;
    }

    .amarillo:focus {
        /*Color del focus*/
        outline: none;
        background-color: #9c7a12;
        border-color: #9c7a12;
    }

    .rojo:focus {
        /*Color del focus*/
        outline: none;
        background-color: #c30505;
        border-color: #c30505;
    }

    .colorinfo:focus {
        /*Color del focus*/
        outline: none;
        background-color: #11899c;
        border-color: #11899c;
    }

    .plomo:focus {
        color: #fff;
        background-color: #465058;
        border-color: #465058;
    }
</style>
<title>Salud los Álamos - Teléfonos</title>
</head>



<body style="background-color: #f4f1f1; ">
    <!--f4f1f1 -->
    <?php include '../partes/navbar.php'; ?> </div>

    <div class="container" style="padding-top:80px;padding-bottom:30px;">
        <header class="text-center">
            <h1 class="font-weight-bold mb-2" style="color: #6a97bd;font-size: 50px;">Telé<span style="color:#90bde4;">fonos</span></h1>
            <p>Centros de atención telefonica para red fija y celulares móviles.</p>
        </header>

        <div class="py-2">
            <div class="row">

                <div class="col-lg-6 mb-5">
                    <!-- Collapse Panel 1--><a data-toggle="collapse" href="#collapseExample1" role="button" aria-expanded="true" aria-controls="collapseExample1" class="btn btn-primary btn-block py-2 shadow-sm with-chevron azul">
                        <p class="d-flex align-items-center justify-content-between mb-0 px-3 py-2 text-white"><strong class="text-uppercase">Sector Azul</strong><i class="fa fa-angle-down"></i></p>
                    </a>
                    <div id="collapseExample1" class="collapse shadow-sm show" style="background-color: transparent;">
                        <div class="card shadow">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="staticEmail" class="col-sm-4 col-form-label">Antihuala</label>
                                    <div class="col-sm-6 pt-2">
                                        41-3279747
                                        <!--<br> Celular: +569-54769917 -->
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="staticEmail" class="col-sm-4 col-form-label">Tres Pinos</label>
                                    <div class="col-sm-6 pt-2">
                                        41-3279749
                                        <!-- <br>Teléfono: 41-2562255 -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 mb-5">
                    <!-- Collapse Panel 2-->
                    <button data-toggle="collapse" data-target="#collapseExample2" role="button" aria-expanded="true" aria-controls="collapseExample2" class="btn btn-success btn-block py-2 shadow-sm with-chevron verde">
                        <p class="d-flex align-items-center justify-content-between mb-0 px-3 py-2 text-white"><strong class="text-uppercase">Sector Verde</strong><i class="fa fa-angle-down"></i></p>
                    </button>
                    <div id="collapseExample2" class="collapse shadow-sm show" style="background-color: transparent;">
                        <div class="card shadow">
                            <div class="card-body">

                                <div class="form-group row">
                                    <label for="staticEmail" class="col-sm-4 col-form-label">Sector Verde</label>
                                    <div class="col-sm-6 pt-2">
                                        &nbsp;41-2723622
                                        <!--<br> Celular: +569-54769917 -->
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="staticEmail" class="col-sm-4 col-form-label">Pangue</label>
                                    <div class="col-sm-6 pt-2">
                                        +569-90715631
                                        <!--<br> Celular: +569-54769917 -->
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="staticEmail" class="col-sm-4 col-form-label">Ranquilco</label>
                                    <div class="col-sm-6 pt-2">
                                        +569-91582787
                                        <!--<br> Celular: +569-54769917 -->
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-lg-6 mb-5">
                    <!-- Collapse Panel 3--><a data-toggle="collapse" href="#collapseExample3" role="button" aria-expanded="true" aria-controls="collapseExample3" class="btn btn-warning btn-block p2-3 shadow-sm with-chevron amarillo">
                        <p class="d-flex align-items-center justify-content-between mb-0 px-3 py-2 text-white"><strong class="text-uppercase">Sector Amarillo</strong><i class="fa fa-angle-down"></i></p>
                    </a>
                    <div id="collapseExample3" class="collapse shadow-sm show" style="background-color: transparent;">
                        <div class="card shadow">
                            <div class="card-body">

                                <div class="form-group row">
                                    <label for="staticEmail" class="col-sm-4 col-form-label">Sector Amarillo</label>
                                    <div class="col-sm-6 pt-2">
                                        41-2723638
                                        <!-- <br>Teléfono: 41-2562255 -->
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 mb-5">
                    <!-- Collapse Panel 4--><a data-toggle="collapse" href="#collapseExample4" role="button" aria-expanded="true" aria-controls="collapseExample4" class="btn btn-danger btn-block p2-3 shadow-sm with-chevron rojo">
                        <p class="d-flex align-items-center justify-content-between mb-0 px-3 py-2 text-white"><strong class="text-uppercase">Sector Rojo</strong><i class="fa fa-angle-down"></i></p>
                    </a>
                    <div id="collapseExample4" class="collapse shadow-sm show" style="background-color: transparent;">
                        <div class="card shadow">
                            <div class="card-body">

                                <div class="form-group row">
                                    <label for="staticEmail" class="col-sm-4 col-form-label">Sector Rojo</label>
                                    <div class="col-sm-6 pt-2">
                                        41-2726221
                                        <!-- <br>Teléfono: 41-2562255 -->
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 mb-5">
                    <!-- Collapse Panel 4--><a data-toggle="collapse" href="#collapseExample5" role="button" aria-expanded="true" aria-controls="collapseExample5" class="btn btn-secondary btn-block p2-3 shadow-sm with-chevron plomo">
                        <p class="d-flex align-items-center justify-content-between mb-0 px-3 py-2 text-white"><strong class="text-uppercase">Departamentos de Salud</strong><i class="fa fa-angle-down"></i></p>
                    </a>
                    <div id="collapseExample5" class="collapse shadow-sm show" style="background-color: transparent;">
                        <div class="card shadow">
                            <div class="card-body">

                                <div class="form-group row">
                                    <label for="staticEmail" class="col-sm-4 col-form-label">Departamentos de Salud</label>
                                    <div class="col-sm-6 pt-2">
                                        No tiene teléfono definido
                                        <!-- 41-2726221 -->
                                        <!-- <br>Teléfono: 41-2562255 -->
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-lg-6 mb-5">
                    <!-- Collapse Panel 4--><a data-toggle="collapse" href="#collapseExample6" role="button" aria-expanded="true" aria-controls="collapseExample6" class="btn btn-secondary btn-block p2-3 shadow-sm with-chevron plomo">
                        <p class="d-flex align-items-center justify-content-between mb-0 px-3 py-2 text-white"><strong class="text-uppercase">Servicio de alta resolutividad | SAR</strong><i class="fa fa-angle-down"></i></p>
                    </a>
                    <div id="collapseExample6" class="collapse shadow-sm show" style="background-color: transparent;">
                        <div class="card shadow">
                            <div class="card-body">

                                <div class="form-group row">
                                    <label for="staticEmail" class="col-sm-4 col-form-label">Servicio de alta resolutividad | SAR</label>
                                    <div class="col-sm-6 pt-2">
                                        No tiene teléfono definido
                                        <!-- 41-2726221 -->
                                        <!-- <br>Teléfono: 41-2562255 -->
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>




                <div class="col-lg-12 mb-5">
                    <!-- Collapse Panel 4--><a data-toggle="collapse" href="#collapseExample7" role="button" aria-expanded="true" aria-controls="collapseExample7" class="btn btn-info btn-block p2-3 shadow-sm with-chevron colorinfo">
                        <p class="d-flex align-items-center justify-content-between mb-0 px-3 py-2 text-white"><strong class="text-uppercase">Sector Transversal</strong><i class="fa fa-angle-down"></i></p>
                    </a>
                    <div id="collapseExample7" class="collapse shadow-sm show" style="background-color: transparent;">
                        <div class="card shadow">
                            <div class="card-body">

                                <div class="form-group row">
                                    <label for="staticEmail" class="col-sm-4 col-form-label">Sector Transversal</label>
                                    <div class="col-sm-6 pt-2">
                                        No tiene teléfono definido
                                        <!-- 41-2726221 -->
                                        <!-- <br>Teléfono: 41-2562255 -->
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> -->

</body>

</html>