<?php session_start(); ?>
<?php include 'head/head.php'; ?>
<title>Salud los Álamos - Farmacia en linea </title>
<link rel="stylesheet" href="css/estilologin.css">
<link rel="stylesheet" href="../../css/estilocheckbox.css">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.10.1/js/mdb.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.10.1/css/mdb.min.css" rel="stylesheet">
<link rel="stylesheet" href="../../assets/datedropper/datedropper.css">
<link rel="stylesheet" href="../../assets/datedropper/color.css">
<script src="../../assets/datedropper/datedropper.js"></script>
<link rel="stylesheet" href="validator/forms.css">


<style>
    #uno {
        margin-top: -8px;
        padding: 8px 0;
        transform: skew(0deg, -2deg);
        background: red;
    }

    #dos {
        text-align: center;
        transform: skew(0deg, 2deg);
        padding-top: 4px;
    }
</style>
</head>

<body id="page-top">
    <!--style="background-color: brown;"-->
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column ">
            <!-- Main Content -->
            <div id="content">
                <?php include 'head/topbar.php'; ?>

                <div class="container-fluid" style="padding-bottom:10%;">

                    <!-- <div class="row justify-content-center">
                        <span class="pr-2" id="nombrecheck">Farmacia en linea </span><input type="checkbox" id="loginobuscador" value="1" />
                    </div> -->

                    <!-- ==============================================VALIDATOR: https://via-profit.github.io/js-form-validator/============================================ -->

                    <div class="row justify-content-center pt-1" id="contenedor1">

                        <div class="col-xl-2 col-sm-12 pt-4 pb-4" id="tarjeta1">
                            <div class="card rounded shadow-sm">
                                <div class="card-body text-center card-img-top p-4">
                                    <img src="./head/agendarmedicamento.png" alt="" class="img-thumbnail border-0" style="max-height:190px;">
                                    <div class="row justify-content-center">
                                        <div class="col-lg-12">
                                            <h2 class="pb-2">Agende el Retiro de sus Medicamentos</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-2 col-sm-12 pt-4 pb-4" id="tarjeta2">
                            <div class="card rounded shadow-sm">
                                <div class="card-body text-center card-img-top p-4">
                                    <img src="./head/seguimiento.png" alt="" class="img-thumbnail border-0" style="height:165px;max-height:190px;">
                                    <div class="row justify-content-center">
                                        <div class="col-lg-12">
                                            <h2 class="pb-2">Seguimiento de la solicitud de medicamento</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-2 col-sm-12 pt-4 pb-4" id="tarjeta3">
                            <div class="card rounded shadow-sm">
                                <div class="card-body text-center card-img-top p-4">
                                    <img src="./head/micuenta.png" alt="" class="img-thumbnail border-0" style="height:165px;max-height:190px;">
                                    <div class="row justify-content-center">
                                        <div class="col-lg-12">
                                            <h2 class="pb-2">Mi cuenta Farmacia En Linea</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-6 col-sm-12 pt-4 pb-4" id="contenedor2" hidden> </div>

                        <!-- <div class="col-xl-3 col-sm-3 pt-4 pb-4">
                            <div class="card rounded shadow-sm  fadeInDown">
                                <div class="card-body text-center card-img-top p-4">
                                    <img src="./head/buscador2.png" alt="" class="rounded-circle mb-1 img-thumbnail mx-auto border-0" style="max-height:160px;">
                                    <div class="row justify-content-center">
                                        <div class="col-lg-12">
                                            <h2>Estado de medicamento</h2>
                                            <form id="buscarmedicamento" action="estado/" method="POST" autocomplete="off">
                                                <input type="text" class="form-control fadeIn second" placeholder="código de la solicitud  Ej:301350023 " id="codigo" name="codigo" minlength="8" maxlength="10" onkeypress="return solonumeros(event)" onpaste="return false" autofocus required>
                                                <div class="pb-2"></div>
                                                <button type="submit" class="btn btn-danger col-lg-6 fadeIn second " id="btnbuscarmedicamento">
                                                    Ver seguimiento
                                                </button>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->

                        <!-- <div class="col-xl-4 col-sm-12 pt-4">
                            <div class="fadeInDown">
                                <div class="card shadow-sm rounded pb-3">
                                    <div class="row">
                                        <label class="btn btn-danger col-3 text-center" style="border-radius: 5px 20px 20px 5px;height:55px"><i class="fas fa-pills" style="font-size:25px"></i></label>
                                        <div class="col-lg-12 text-center pt-2 p-4">
                                            <h2 style="font-size: 30px;">Farmacia en linea</h2>
                                            <form id="ingresomedicamento" autocomplete="off" class="pt-4">
                                                <input type="text" class="form-control fadeIn second" placeholder="Ingrese su rut" id="rut" name="rut" minlength="8" maxlength="9" onkeypress="return solorut(event)" onpaste="return false" autofocus required>
                                                <div class="row justify-content-end pb-4"><small class="form-text text-muted pr-5">Rut sin puntos ni guión </small></div>
                                                <input type="submit" class="fadeIn second" id="btningresaramedicamento" value="Ingresar">
                                            </form>
                                        </div>
                                    </div>

                                    <div class="py-4"></div>
                                </div>
                            </div>
                        </div> -->
                    </div>

                    <!-- <div class="row justify-content-center pt-1" id="contenedor2"></div> -->


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


    <!-- <script src="../js/funcionswal.js"></script> -->
    <!-- <script src="../../../jsdashboard/sb-admin-2.min.js"></script>
    <script src="../../../jsdashboard/jquery.min.js"></script> -->
    <script src="../js/validaciongeneral.js"></script>
    <script src="validator/js-form-validator.js"></script>
    <script src="js/funciones.js"></script>


    <script>
        // $('#tarjetabuscador').hide(); //oculto por defecto la tarjeta de consulta medicamento
        // document.getElementById('loginobuscador').onchange = function() { //DETECTO EL CAMBIO DEL CHECKBOX
        //     if (this.checked) {
        //         $('#tarjetalogin').hide();
        //         $('#tarjetabuscador').show();
        //         $('#nombrecheck').text('Estado de medicamento');
        //     } else {
        //         $('#tarjetabuscador').hide();
        //         $('#tarjetalogin').show();
        //         $('#nombrecheck').text('Farmacia en linea');
        //     }
        // }
    </script>


</body>

</html>