<?php
// session_start();
// if (isset($_SESSION['sesionCESFAM'])) { //VALIDA SI LA SESION ESTA INICIADAz
//     $rut = $_SESSION["sesionCESFAM"]["rut"];
// } else { //SINO LO REDIRIGE AL INDEX
//     header("Location:../inicio/");
// }
?>
<?php include '../dashboard/head.php'; ?>

<title>Salud los Álamos - CARD TAB LINK</title>

</head>

<body id="page-top">
    <?php ?>
    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php include '../dashboard/sidebar.php'; ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content" class="pb-4">

                <?php include '../dashboard/topbar.php'; ?>

                <!-- Begin Page Content -->
                <div class="container-fluid" id="contenedorgeneral">


                    <div class="row">
                        <div class="col-lg-7 mx-auto">
                            <div class="bg-white rounded-lg shadow-sm p-5">
                                <!-- Credit card form tabs -->
                                <ul role="tablist" class="nav bg-light nav-pills rounded-pill nav-fill mb-3">
                                    <li class="nav-item">
                                        <a data-toggle="pill" href="#nav-tab-card" class="nav-link active rounded-pill">
                                            <i class="fa fa-credit-card"></i>
                                            Credit Card
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a data-toggle="pill" href="#nav-tab-paypal" class="nav-link rounded-pill">
                                            <i class="fa fa-paypal"></i>
                                            Paypal
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a data-toggle="pill" href="#nav-tab-bank" class="nav-link rounded-pill">
                                            <i class="fa fa-university"></i>
                                            Bank Transfer
                                        </a>
                                    </li>
                                </ul>
                                <!-- End -->


                                <!-- Credit card form content -->
                                <div class="tab-content">

                                    <!-- credit card info-->
                                    <div id="nav-tab-card" class="tab-pane fade show active">
                                        <p class="alert alert-success">Some text success or error</p>
                                        <form role="form">
                                            <div class="form-group">
                                                <label for="username">Full name (on the card)</label>
                                                <input type="text" name="username" placeholder="Jason Doe" required class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="cardNumber">Card number</label>
                                                <div class="input-group">
                                                    <input type="text" name="cardNumber" placeholder="Your card number" class="form-control" required>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text text-muted">
                                                            <i class="fa fa-cc-visa mx-1"></i>
                                                            <i class="fa fa-cc-amex mx-1"></i>
                                                            <i class="fa fa-cc-mastercard mx-1"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-8">
                                                    <div class="form-group">
                                                        <label><span class="hidden-xs">Expiration</span></label>
                                                        <div class="input-group">
                                                            <input type="number" placeholder="MM" name="" class="form-control" required>
                                                            <input type="number" placeholder="YY" name="" class="form-control" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group mb-4">
                                                        <label title="Three-digits code on the back of your card">CVV
                                                            <i class="fa fa-question-circle"></i>
                                                        </label>
                                                        <input type="text" required class="form-control">
                                                    </div>
                                                </div>



                                            </div>
                                            <button type="button" class="subscribe btn btn-primary btn-block rounded-pill shadow-sm"> Confirm </button>
                                        </form>
                                    </div>
                                    <!-- End -->

                                    <!-- Paypal info -->
                                    <div id="nav-tab-paypal" class="tab-pane fade">
                                        <p>Paypal is easiest way to pay online</p>
                                        <p>
                                            <button type="button" class="btn btn-primary rounded-pill"><i class="fa fa-paypal mr-2"></i> Log into my Paypal</button>
                                        </p>
                                        <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                        </p>
                                    </div>
                                    <!-- End -->

                                    <!-- bank transfer info -->
                                    <div id="nav-tab-bank" class="tab-pane fade">
                                        <h6>Bank account details</h6>
                                        <dl>
                                            <dt>Bank</dt>
                                            <dd> THE WORLD BANK</dd>
                                        </dl>
                                        <dl>
                                            <dt>Account number</dt>
                                            <dd>7775877975</dd>
                                        </dl>
                                        <dl>
                                            <dt>IBAN</dt>
                                            <dd>CZ7775877975656</dd>
                                        </dl>
                                        <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                        </p>
                                    </div>
                                    <!-- End -->
                                </div>
                                <!-- End -->

                            </div>
                        </div>
                    </div>

                </div>

            </div>
            <!-- End of Main Content -->

            <?php include '../dashboard/footer.php'; ?>

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- CAMBIAR EL ITEM DEL NAVBAR SELECCIONADO -->
    <script>
        $("#firmadigital").attr(' class', 'nav-item active');
    </script>

    <script src="../js/validaciongeneral.js"></script>
    <script src="../js/funcionswal.js"></script>
    <script src="../../assets/popper/popper.min.js"></script>
    <script src="../../jsdashboard/sb-admin-2.min.js"></script>

    <script src="js/funciones.js"></script>
    <script src="js/limpiador.js"></script>

    <script>
        function info_asig(var1, var2, var3, var4) {
            // alertify.success(var1);
            toastr.info("<strong>Codigo:</strong> " + var1 + "<br><strong>Año:</strong> " + var2 + "<br><strong>Semestre:</strong> " + var3 + "<br><strong>R.U.T:</strong> " + var4);
        }
    </script>
</body>

</html>