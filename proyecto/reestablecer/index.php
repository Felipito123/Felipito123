<?php
include '../conexion/conexion.php';
session_start();
date_default_timezone_set("America/Santiago");
setlocale(LC_TIME, "spanish");
// $fechacompleta = strftime("%F %H:%M:%S");
$horayminuto = strftime("%H:%M");

$hora1 = strtotime($horayminuto);
$hora2 = strtotime("19:00"); // 19:00
$hora3 = strtotime("07:00"); // 07:00

if (($hora1 > $hora2) || ($hora1 < $hora3)) { //entre el rango de las 7 de la tarde y 7 de la mañana muestra el fondo nocturno
    $etiqueta = "background-color: #ffffff;
    background-image: url('hn1.jpg');
    background-attachment: fixed;
    background-repeat: no-repeat;
    background-position: top left;";
} else { //si es distinto al rango anterior (es de dia) muestra el fondo diurno
    $etiqueta = "background-color: #ffffff;
    background-image: url('hd1.jpg');
    background-attachment: fixed;
    background-repeat: no-repeat;
    background-position: center;";
}


if (!isset($_GET['c'])) {
    header("Location:../inicio/");
}

function desencriptar_base64($valor_encriptado)
{
    $utf8 = array(
        '/[áàâãªä]/u'   =>   'a',
        '/[ÁÀÂÃÄ]/u'    =>   'A',
        '/[ÍÌÎÏ]/u'     =>   'I',
        '/[íìîï]/u'     =>   'i',
        '/[éèêë]/u'     =>   'e',
        '/[ÉÈÊË]/u'     =>   'E',
        '/[óòôõºö]/u'   =>   'o',
        '/[ÓÒÔÕÖ]/u'    =>   'O',
        '/[úùûü]/u'     =>   'u',
        '/[ÚÙÛÜ]/u'     =>   'U',
        '/ç/'           =>   'c',
        '/Ç/'           =>   'C',
        '/ñ/'           =>   'n',
        '/Ñ/'           =>   'N',
        '/–/'           =>   '-', // UTF-8 hyphen to "normal" hyphen
        '/[’‘‹›‚]/u'    =>   ' ', // Literally a single quote
        '/[“”«»„]/u'    =>   ' ', // Double quote
        '/ /'           =>   ' ', // nonbreaking space (equiv. to 0x160)
        '/[^a-zA-Z0-9-+#=\/?\'\s]/' => ''
    );
    return preg_replace(array_keys($utf8), array_values($utf8), $valor_encriptado);
}

?>
<?php include '../partes/head.php'; ?>

<style>
    @media screen and (max-width: 576px),
    screen and (max-width: 1532px) {
        #tamañoresponsivologin {
            width: 75% !important;
        }
    }

    @media screen and (max-width: 550px) {
        #tiempo_restante {
            align-items: center;
            text-align: center;
            width: 350px !important;
            height: 80px !important;
        }
    }

    .btn-warning:hover {
        color: #fff;
        background-color: #ab8412;
        border-color: #ab8412;
    }

    .btn-danger:hover {
        color: #fff;
        background-color: #af2633;
        border-color: #af2633;
    }
</style>

<link rel="stylesheet" href="../js/circulodetiempo/TimeCircles.css">
<script src="../js/circulodetiempo/TimeCircles.js"></script>

<title>Salud los Álamos - Reestablecer contraseña</title>
</head>

<!-- style="background-color: #f4f1f1" -->

<body style="<?php echo $etiqueta; ?>">

    <?php include '../partes/navbar.php'; ?>


    <?php
    /*trate de manipular cambiando la URL en : anVhbkB32423423424 y me generaba error porque tomaba caracteres extraños (�)
                                pero con desencriptar_base64 los quita y de algún modo los limpia*/
    // echo base64_decode(desencriptar_base64($_GET['c']));
    // mysqli_real_escape_string lo que haces que coge el string que va a ser pasado a la sentencia y lo devuelve con los posibles ataques SQL injection eliminados
    $correodelolvidado = mysqli_real_escape_string($mysqli, base64_decode(desencriptar_base64($_GET['c']))); // base64_decode($_GET['c'])  // base64_decode(desencriptar_base64($_GET['c']))
    $sqlactivo = "SELECT nombre_usuario, reestablecimiento FROM usuario WHERE correo_usuario='$correodelolvidado' and estado_usuario=1";
    $sqlExisteFunc = "SELECT nombre_usuario FROM usuario WHERE correo_usuario='$correodelolvidado'";
    $respuesta_activo = mysqli_query($mysqli, $sqlactivo);
    $respuesta_activo2 = mysqli_query($mysqli, $sqlactivo);
    $respuesta_ExisteFunc = mysqli_query($mysqli, $sqlExisteFunc);
    $contar_fila_activo = mysqli_num_rows($respuesta_activo);
    $contar_fila_ExisteFunc = mysqli_num_rows($respuesta_ExisteFunc);
    ?>

    <div class="container-fluid" style="text-align: center; padding-bottom: 25px;">
        <div class="row justify-content-center align-items-center vh-100">

            <div class="col-xl-12">
                <div style="width: 35%; margin-left: auto; margin-right: auto;margin-top: 25px; margin-bottom: 10px;" id="tamañoresponsivologin">

                    <?php

                    if ($contar_fila_activo > 0) {

                        $fila_activo = mysqli_fetch_array($respuesta_activo2);
                        $fechaBD_Reestablecimiento = $fila_activo['reestablecimiento'];
                        $fecha_actual = strftime("%F %H:%M:%S"); //Ej: 2021-11-02 16:14:00
                        $segundos = strtotime($fecha_actual) - strtotime($fechaBD_Reestablecimiento); //segundos
                        $minutos = $segundos / 60; //1 minuto


                        $sumarminuto = strtotime('+3 minute', strtotime($fechaBD_Reestablecimiento));
                        $Nfechatermino = date('Y-m-d H:i:s', $sumarminuto);

                        if ($minutos <= 3 && !(is_null($fechaBD_Reestablecimiento) || $minutos > 3)) {
                            // echo '<div class="alert alert-danger mt-3" role="alert">No tiene reestablecimientos asociados.</div>';
                    ?>
                            <div class="card shadow ml-5 mr-5">
                                <div style="padding: 2%;">
                                    <!--AÑADIR CATEGORIAS -->
                                    <div class="container" style="max-width:100%;">
                                        <div class="alert alert-info mt-3" role="alert">El tiempo restante para esta operación es de</div>

                                        <div class="row justify-content-center">
                                            <!-- <div class="table-responsive"> -->
                                            <div id="tiempo_restante" data-date="<?php echo $Nfechatermino; ?>" style='height: 150px;'>

                                                <script>
                                                    $(document).ready(function() {
                                                        var intervaloReestablecer;
                                                        // $("#tiempo_restante").TimeCircles().start();

                                                        $("#tiempo_restante").TimeCircles({
                                                            time: {
                                                                Days: {
                                                                    show: false
                                                                },
                                                                Hours: {
                                                                    show: false
                                                                }
                                                            }
                                                        });

                                                        // Seconds: 1, // Minutes: 60, // Hours: 3600, // Days: 86400, // Months: 2678400, // Years: 31536000

                                                        intervaloReestablecer = setInterval(function() {
                                                            var remaining_second = $("#tiempo_restante").TimeCircles().getTime();
                                                            if (remaining_second < 0) {
                                                                clearInterval(intervaloReestablecer);
                                                                // alertify.error("Terminó");
                                                                $("#tiempo_restante").TimeCircles().stop();

                                                                $('#tamañoresponsivologin').html(`
                                                                <div class="card shadow">
                                                                    <div style="padding: 3%;">
                                                                        <div class="container" style="max-width:100%;" id="contienelogin">
                                                                            <div class="alert alert-danger mt-3" role="alert">El tiempo para reestablecer la contraseña ha caducado.</div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                `);
                                                                // console.log("Terminó");
                                                            }
                                                        }, 1000);
                                                    });
                                                </script>


                                            </div>
                                        </div>
                                        <!-- </div> -->

                                    </div>
                                </div>
                            </div>
                    <?php
                        }
                    }
                    ?>

                    <div style="height: 15px;"></div>

                    <div class="card shadow">
                        <div style="padding: 3%;">
                            <div class="container" style="max-width:100%;" id="contienelogin">

                                <?php

                                if ($contar_fila_activo > 0) {

                                    $fila_activo = mysqli_fetch_array($respuesta_activo);
                                    $fechaBD_Reestablecimiento = $fila_activo['reestablecimiento'];
                                    $fecha_actual = strftime("%F %H:%M:%S"); //Ej: 2021-11-02 16:14:00
                                    $segundos = strtotime($fecha_actual) - strtotime($fechaBD_Reestablecimiento); //segundos
                                    $minutos = $segundos / 60; //1 minuto

                                    // $sumarminuto = strtotime('+3 minute', strtotime($fechaBD_Reestablecimiento));
                                    // $Nfechatermino = date('Y-m-d H:i:s', $sumarminuto);

                                    if (is_null($fechaBD_Reestablecimiento)) {
                                        echo '<div class="alert alert-danger mt-3" role="alert">No tiene reestablecimientos asociados.</div>';
                                    } else if ($minutos <= 3) {
                                ?>


                                        <img class="img-fluid" src="../../importantes/logocesfam2.png" alt="Logo" style="padding-bottom:5%; max-height:300px;">
                                        <div class="row" style="max-width:100%;">
                                            <!--el row es el que hace conflicto por eos un lado era más ancho que el otro. Asi que, le agregue el margin-left y right -->
                                            <div class="col-xl-12 col-sm-12">

                                                <div class="table-responsive" style="margin-left:15px;margin-right:15px">

                                                    <!-- PARA QUE SEA RESPONSIVO USE LA CLASE DEL table-responsive -->
                                                    <div class="justify-content-center">
                                                        <!--<h2 class="card-title">Reestablecer contraseña</h2>
                                            <hr width="30%">-->
                                                        <p>Por favor, ingrese sus contraseñas para ingresar nuevamente al sistema.</p>
                                                        <hr width="58%">

                                                        <div style="height: 5px;"></div>

                                                        <form id="form-reestablecer-contra" method="post" autocomplete="off">

                                                            <input type="hidden" class="form-control" placeholder="Correo" name="correoencriptado" id="correoencriptado" value="<?php echo base64_decode($_GET['c']); ?>">

                                                            <!-- Password -->
                                                            <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text"><i class="fa fa-lock" aria-hidden="true" id="contraseñaimagen1" style="min-width: 16px;"></i>
                                                                    </span>
                                                                </div>
                                                                <input type="password" class="form-control" id="contrasena1" name="contrasena1" placeholder="Contraseña" minlength="2" maxlength="50" onkeypress="return validacontrasena(event)" onpaste="return false" required>
                                                            </div>

                                                            <div style="height: 20px;"></div>
                                                            <!-- Password -->
                                                            <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text"><i class="fa fa-lock" aria-hidden="true" id="contraseñaimagen2" style="min-width: 16px;"></i>
                                                                    </span>
                                                                </div>
                                                                <input type="password" class="form-control" id="contrasena2" placeholder="Confirme contraseña" minlength="2" maxlength="50" onkeypress="return validacontrasena(event)" onpaste="return false" required>
                                                            </div>

                                                            <div style="height: 25px;"></div>

                                                            <button type="submit" class="btn btn-danger  btn-block"><i class="fa fa-key" aria-hidden="true" style="color:white"></i></button>

                                                        </form>
                                                    </div><!-- justify-container-center -->
                                                </div>
                                            </div>
                                        </div>

                                <?php
                                    } else { // Ha pasado más de un minuto
                                        echo '<div class="alert alert-danger mt-3" role="alert">El tiempo para reestablecer la contraseña ha caducado.</div>';
                                    }
                                } else if ($contar_fila_ExisteFunc <= 0) {
                                    echo '<div class="alert alert-danger mt-3" role="alert">No existe funcionario asociado.</div>';
                                } else { //El funcionario no se encuentra activo
                                    echo '<div class="alert alert-danger mt-3" role="alert">No puede reestablecer la contraseña, puesto que el funcionario no se encuentra activo.</div>';
                                }
                                ?>

                            </div>

                            <?php

                            // echo base64_decode('anVhbkB32423423424'); //url manipulada
                            // echo base64_encode('juan@gmail.com'); //anVhbkBnbWFpbC5jb20=
                            // echo base64_encode('SELECT * FROM usuarios WHERE id = 10 or 1=1\'');
                            ?>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>


    <script>
        //ESTE SCRIPT MUESTRA LA CONSTRASEÑA
        $('#contraseñaimagen1').click(function() {
            if ($(this).hasClass('fa fa-lock')) {
                $(this).removeClass('fa fa-lock');
                $(this).addClass('fa fa-unlock');
                $('#contrasena1').attr('type', 'text');

            } else {
                $(this).removeClass('fa fa-unlock');
                $(this).addClass('fa fa-lock');
                $('#contrasena1').attr('type', 'password');
            }
        });

        $('#contraseñaimagen2').click(function() {
            if ($(this).hasClass('fa fa-lock')) {
                $(this).removeClass('fa fa-lock');
                $(this).addClass('fa fa-unlock');
                $('#contrasena2').attr('type', 'text');

            } else {
                $(this).removeClass('fa fa-unlock');
                $(this).addClass('fa fa-lock');
                $('#contrasena2').attr('type', 'password');
            }
        });
    </script>

    <script src="../js/validaciongeneral.js"></script>
    <script src="../js/funcionswal.js"></script>
    <script src="js/formulario.js"></script>
    <script src="js/reestablecercontra.js"></script>




    <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> -->
</body>

</html>