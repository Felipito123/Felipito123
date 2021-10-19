<?php
// session_start();
// if (isset($_SESSION['sesionCESFAM'])) { //VALIDA SI LA SESION ESTA INICIADAz
//     $rut = $_SESSION["sesionCESFAM"]["rut"];
// } else { //SINO LO REDIRIGE AL INDEX
//     header("Location:../inicio/");
// }
?>
<?php include '../dashboard/head.php'; ?>

<title>Salud los Álamos - VALIDA RUT DE ACUERDO AL BANCO ESTADO </title>

<!-- <script src="https://bancapersonas.bancoestado.cl/eBankingBech/js/global.js"></script> -->
<script src="js/global_rut.js"></script>

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

                    <div class="container">
                        <div class="py-2 text-center">
                            <img class="d-block mx-auto mb-4" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
                            <h2>VALIDA RUT</h2>
                            <p class="lead">VALIDA RUT DE ACUERDO AL BANCO ESTADO </p>
                        </div>

                        <div class="row">
                            <div class="col-xl-6 order-md-2 mb-4">

                                <form id="login" name="login" method="post" action="hola.php">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">R.U.T </label>
                                        <input id="username" type="text" name="j_username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="INGRESE R.U.T" onfocus="rut(this.value);" onkeypress="return esRutLogin(event)" onkeyup="this.value = this.value.toUpperCase();" onblur="formatoRut()" required>
                                        <small id="emailHelp" class="form-text text-muted">ASADASDADA</small>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Password</label>
                                        <input id="password" size="8" maxlength="8 " type="password" name="j_password" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary" onsubmit="formatoRut()" onclick="return verificarCamposVaciosLogin()">Submit</button>
                                    <!-- onsubmit="formatoRut()" onclick="return verificarCamposVaciosLogin()" -->
                                </form>

                            </div>
                        </div>

                        <footer class="my-5 pt-5 text-muted text-center text-small">
                            <p class="mb-1">© 2017-2018 Company Name</p>
                            <ul class="list-inline">
                                <li class="list-inline-item"><a href="#">Privacy</a></li>
                                <li class="list-inline-item"><a href="#">Terms</a></li>
                                <li class="list-inline-item"><a href="#">Support</a></li>
                            </ul>
                        </footer>
                    </div>

                    <!-- <div class="container">
                        <div class="row">
                            <input type="text" id="holi" />
                        </div>
                    </div> -->

                </div>



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
            // $("#firmadigital").attr(' class', 'nav-item active');
        </script>

        <script>
            // function checkInternetConnection() {
            //     var status = navigator.onLine;
            //     if (status) {
            //         $('#holi').val('Internet Disponible');
            //         // console.log('Internet Available !!');
            //     } else {
            //         $('#holi').val('Internet No Disponible');
            //         // console.log('No internet Available !!');
            //     }
            //     setTimeout(function() {
            //         checkInternetConnection();
            //     }, 1000);
            // }
            // checkInternetConnection();
        </script>


        <script>
            /*
	Las funciones del LOGIN se separan del 'global.js' ya que este ultimo
	contiene funciones que denotan las reglas del negocio.
 */

            function verificarCamposVaciosLogin() {
                var formLogin = document.getElementById("login");
                formLogin.j_username.value = formLogin.j_username.value.toUpperCase();
                var usuario = formLogin.j_username.value;
                while (usuario.indexOf(".") != -1) {
                    usuario = usuario.replace(".", "");
                }
                usuario = usuario.replace("-", "");
                /*document.getElementById("login").j_username.value=usuario;*/
                var clave = formLogin.j_password.value;
                var rut = usuario.substring(0, usuario.length - 1);
                var digitoVerificador = usuario.substring(usuario.length - 1, usuario.length);

                for (i = 0; i < rut.length; i++) {
                    if (!((rut.charAt(i) >= "0") && (rut.charAt(i) <= "9"))) {
                        toastr.info("El valor ingresado no corresponde a un RUT válido", "😯");
                        // alert("El valor ingresado no corresponde a un RUT v\u00e1lido");
                        return false;
                    }
                }
                if (rut > 50000000) {
                    toastr.info("El valor ingresado no corresponde a un RUT válido", "😯");
                    // alert("El valor ingresado no corresponde a un RUT v\u00e1lido");
                    return false;
                }
                if (usuario == "" && clave == "") {
                    toastr.info("Debe ingresar un RUT y una Clave para poder ingresar", "😯");
                    // alert("Debe ingresar un RUT y una Clave para poder ingresar");
                    return false;
                } else if (usuario == "") {
                    toastr.info("Ingrese RUT", "😯");
                    // alert("Ingrese RUT");
                    return false;
                } else if (clave == "") {
                    toastr.info("Ingrese Clave", "😯");
                    // alert("Ingrese Clave");
                    return false;
                } else if (digitoVerificador != calcularDigitoVerificadorRUT(rut)) {
                    toastr.info("Ingrese un RUT válido", "😯");
                    // alert("Ingrese un RUT v\u00e1lido");
                    return false;
                } else {
                    var errorDiv = document.getElementById("emailHelp");
                    if (errorDiv) {
                        errorDiv.style.display = "none";
                    }
                }
            }

            function calcularDigitoVerificadorRUT(strRutSinDv) {
                var lengthRut = strRutSinDv.length;
                var lngSumaTotal = calculaSumaRut(strRutSinDv, lengthRut);
                /* var intRestoSumaTotal = 11 - (lngSumaTotal mod 11); */
                var intRestoSumaTotal = 11 - (lngSumaTotal % 11);
                var strDVCalculado;

                switch (intRestoSumaTotal) {
                    case 10: {
                        strDVCalculado = "K";
                        break
                    }
                    case 11: {
                        strDVCalculado = "0";
                        break
                    }
                    default: {
                        strDVCalculado = "" + intRestoSumaTotal;
                        break
                    }
                }
                return strDVCalculado;
            }

            function calculaSumaRut(strRut, lngRut) {
                var sumaRut;
                if (lngRut == 0) {
                    sumaRut = 0;
                } else {
                    var i = strRut.length - lngRut + 2;
                    if (i >= 8) {
                        i = i - 6;
                    }
                    var a = strRut.substr(lngRut - 1, 1);
                    var lngSumParcial = a * i;
                    sumaRut = lngSumParcial + calculaSumaRut(strRut, lngRut - 1);
                }
                return sumaRut;
            }

            function formatoRut() {
                var formLogin = document.getElementById("login");
                var sRut1 = formLogin.j_username.value.toUpperCase();
                sRut1 = quitarEspacios(sRut1);
                // var sRut1 = rut.value;
                // contador para saber cuando insertar el . o la -
                var nPos = 0;

                // Guarda el rut invertido con los puntos y el guión agregado
                var sInvertido = "";

                // Guarda el resultado final del rut como debe ser
                var sRut = "";
                while (sRut1.indexOf(".") != -1) {
                    sRut1 = sRut1.replace(".", "");
                }
                sRut1 = sRut1.replace("-", "");

                for (var i = sRut1.length - 1; i >= 0; i--) {
                    sInvertido += sRut1.charAt(i);
                    // console.log("Invertido1: " + sInvertido);
                    if (i == sRut1.length - 1)
                        sInvertido += "-";
                    else if (nPos == 3) {
                        sInvertido += ".";
                        nPos = 0;
                    }
                    nPos++;
                }

                for (var j = sInvertido.length - 1; j >= 0; j--) {
                    if (sInvertido.charAt(sInvertido.length - 1) != ".")
                        sRut += sInvertido.charAt(j);
                    else if (j != sInvertido.length - 1)
                        sRut += sInvertido.charAt(j);

                }
                // Pasamos al campo el valor formateado
                // rut.value = sRut.toUpperCase();
                document.getElementById("login").j_username.value = sRut.toUpperCase();

            }

            function quitarEspacios(rut) {
                var i = 0;
                // alertify.success("quitar espacios");
                while (rut.length > i) {
                    if ((rut.substring(i, i + 1) == " ") || (rut.codePointAt(i) == 173)) {
                        rut = rut.substring(0, i) + rut.substring(i + 1, rut.length);
                    } else {
                        i = i + 1;
                    }
                }
                return rut;
            }

            function rut(value) {
                var sRut1 = value;
                while (sRut1.indexOf(".") != -1) {
                    sRut1 = sRut1.replace(".", "");
                }
                sRut1 = sRut1.replace("-", "");
                if (sRut1.length > 9) {
                    $('#username').val("");
                    // alertify.success("Longitud mayor a 9");
                } else {
                    var str = value.substring(value.length - 1, value.length);
                    if (str != "0" && str != "1" && str != "2" && str != "3" && str != "4" && str != "5" &&
                        str != "6" && str != "7" && str != "8" && str != "9" && str != "K" && str != "k") {
                        $('#username').val("");
                        // alertify.success("v1");
                    }
                }

            }

            function esRutLogin(evt) {
                var charCode = getCharCode(evt);
                if (charCode == 0 || largo(evt)) {
                    return esRUT(evt);
                }
                return false;
            }

            function largo(evt) {
                var formLogin = document.getElementById("login");
                var sRut1 = formLogin.j_username.value.toUpperCase();
                while (sRut1.indexOf(".") != -1) {
                    sRut1 = sRut1.replace(".", "");
                }
                sRut1 = sRut1.replace("-", "");
                if (sRut1.length < 9) {
                    return true;
                }
                return false;
            }
        </script>

        <script src="../js/validaciongeneral.js"></script>
        <script src="../js/funcionswal.js"></script>
        <script src="../../assets/popper/popper.min.js"></script>
        <script src="../../jsdashboard/sb-admin-2.min.js"></script>



</body>

</html>