<?php 
session_start();
date_default_timezone_set("America/Santiago");
setlocale(LC_TIME, "spanish");
$horayminuto = strftime("%H:%M");
$hora1 = strtotime($horayminuto);
$hora2 = strtotime("19:00"); // 19:00
$hora3 = strtotime("07:00"); // 07:00

if (!isset($_SESSION['sesionCESFAM'])) { //SI NO ESTA INICIADA LA SESION MARCHA BIEN
} else { //SINO, SI ESTA INICIADA LA SESION LO REDIRIGE AL INDEX
    // header("Location: ../inicio.php");
}

if (isset($_COOKIE['lg']) && !empty($_COOKIE['lg'])) { //Si existe la cookie
    $valorcookie = $_COOKIE['lg'];
    $porcion = explode("-", $valorcookie);

    if ($porcion[2] == 'sirecordar') {
        $correodelacookie = base64_decode($porcion[0]); //si existe la cookie, tomo el valor correo de la cookie del navegador y la desencripto en base64
        $contradelacookie = base64_decode($porcion[1]);
        $check = 'checked';
    } else {
        $correodelacookie = '';
        $contradelacookie = '';
        $check = '';
    }
} else {
    $correodelacookie = '';
    $contradelacookie = '';
    $check = '';
}

//background-size: 100%;  uso el background-size porque así muestra toda la imagen y no le hace zoom... PERO EN DISPOSITIVO MOVIL NO SE MUESTRA BIEN ASI QUE LO SACARE
if (($hora1 > $hora2) || ($hora1 < $hora3)) { //entre el rango de las 7 de la tarde y 7 de la mañana muestra el fondo nocturno
    $etiqueta = "background-color: #ffffff;
    background-image: url('bgn1.jpg');
    background-attachment: fixed;
    background-repeat: no-repeat;
    background-position: bottom center;";
} else { //si es distinto al rango anterior (es de dia) muestra el fondo diurno
    $etiqueta = "background-color: #ffffff;
    background-image: url('bgdia.jpg');
    background-attachment: fixed;
    background-size: 100%;
    background-repeat: no-repeat;
    background-position: center;";
}


?>

<?php include '../partes/head.php'; ?>

<link rel="stylesheet" href="../../css/stylesLogin.css">
<title>Salud los Álamos - Login</title>
<style>
    .cardd {
        box-shadow: 5px 0 5px 2px rgba(0, 1, 1, 0.3);
        /*SOMBRA DE 1 px*/
    }

    /*.imagen {
        background-image: url(imagenes/imagen.jpg);
        background-size: 100% 100%;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    } */

    .btn-primary:hover {
        color: #fff;
        background-color: #0551a2;
        border-color: #0551a2;
    }

    @media screen and (max-width: 576px),
    screen and (max-width: 1532px) {
        #tamañoresponsivologin {
            width: 75% !important;
        }
    }
</style>
</head>

<body style="<?php echo $etiqueta; ?>">
    <!--style="background-color: #f4f1f1;" -->

    <?php include '../partes/navbar.php'; ?>

    <div class="container-fluid fadeInDown" style="text-align: center; padding-top:30px; padding-bottom: 25px;">
        <div class="row justify-content-center align-items-center vh-100">

            <div style="width: 35%; margin-left: auto; margin-right: auto; margin-bottom: 30px;" id="tamañoresponsivologin">
                <label class="btn btn-primary col-xl-5 col-sm-6 text-center mt-3" onclick="ScannearQR();" style="border-radius: 5px 5px 5px 5px;height:36px"><i class="fas fa-qrcode pb-1" style="font-size:18px" aria-hidden="true"></i> Ingresar con código QR</label>
                <div class="card shadow">

                    <div style="padding: 3%;">
                        <!--AÑADIR CATEGORIAS -->

                        <div class="container" style="max-width:100%;">
                            <img class="img-fluid fadeIn first" src="../../importantes/logocesfam2.png" alt="Logo" style="padding-bottom:5%; max-height:330px;">
                            <div class="row" style="max-width:100%;">
                                <!--el row es el que hace conflicto por eos un lado era más ancho que el otro. Asi que, le agregue el margin-left y right -->
                                <div class="col-xl-12 col-sm-12">
                                    <div class="table-responsive" style="margin-left:15px;margin-right:15px">
                                        <!-- PARA QUE SEA RESPONSIVO USE LA CLASE DEL table-responsive -->
                                        <div class="justify-content-center">
                                            <!-- <h2 class="card-title">Iniciar Sesión</h2>-->
                                            <hr width="30%">
                                            <p class="fadeIn second">Por favor, ingrese sus datos para iniciar sesión en el sistema.</p>
                                            <hr width="58%">

                                            <form autocomplete="off" id="formulogin" method="post" class="fadeIn second">

                                                <!-- Rut -->
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-address-card" aria-hidden="true"></i>
                                                        </span>
                                                    </div>
                                                    <!--Donde uso el setCustomValidity en la funcion comprobarRUT, cuando envio el formulario y está el campo inválido, la alerta se queda pegada cuando el usuario escribe. Entonces, la quito con onkeyup="this.setCustomValidity('');" -->
                                                    <!--onchange="comprobarRUT(this)" onkeyup="this.setCustomValidity('');" -->
                                                    <input type="text" class="form-control" id="rut" name="rut" placeholder="Ingrese rut, sin puntos ni guiones EJ:12223334" value="<?php echo $correodelacookie; ?>" pattern="[Kk0-9]+" onkeypress="return solorut(event)" onpaste="return false" minlength="8" maxlength="11" required> 
                                                </div>

                                                <!-- Password -->
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fa fa-lock" aria-hidden="true" id="contraseñaimagen" style="min-width: 16px;"></i>
                                                        </span>
                                                    </div>
                                                    <input type="password" class="form-control" id="contrasena" name="contrasena" placeholder="Contraseña" onkeypress="return validacontrasena(event)" value="<?php echo $contradelacookie; ?>" onpaste="return false" minlength="2" maxlength="250" required>
                                                </div>

                                                <!-- Recordar -->
                                                <div class="form-group mb-3">
                                                    <input type="checkbox" id="recordarme" name="recordarme" <?php echo $check; ?>> <small>Recordarme</small>
                                                </div>

                                                <div class="input-form" style="padding-bottom: 5px;">
                                                    <a id="olvidecontra" style="font-size: 12px;">¿Olvidé mi contraseña?</a>
                                                </div>

                                                <button type="submit" id="btnlogin" class="btn btn-primary btn-block fadeIn fourth"><i class="fa fa-sign-in" aria-hidden="true"></i> Ingresar</button>
                                            </form>
                                        </div><!-- justify-container-center -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- CAMBIAR EL ITEM DEL NAVBAR SELECCIONADO -->
    <script>
        $("#login").attr('class', 'nav-item active');
    </script>

    <script>
        //ESTE SCRIPT MUESTRA LA CONSTRASEÑA
        $('#contraseñaimagen').click(function() {
            if ($(this).hasClass('fa fa-lock')) {
                $(this).removeClass('fa fa-lock');
                $(this).addClass('fa fa-unlock');
                $('#contrasena').attr('type', 'text');

            } else {
                $(this).removeClass('fa fa-unlock');
                $(this).addClass('fa fa-lock');
                $('#contrasena').attr('type', 'password');
            }
        });
    </script>


    <!-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script> -->

    <script src="https://cdn.jsdelivr.net/npm/js-base64@2.5.2/base64.min.js"></script>
    <script src="../js/funcionswal.js"></script>
    <script src="../js/validaciongeneral.js"></script>
    <script src="js/login.js"></script>
    <script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
    <script src="js/swalScanner.js"></script>
</body>

</html>