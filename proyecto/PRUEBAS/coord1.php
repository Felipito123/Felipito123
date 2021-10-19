<?php
// session_start();
// if (isset($_SESSION['sesionCESFAM'])) { //VALIDA SI LA SESION ESTA INICIADAz
//     $rut = $_SESSION["sesionCESFAM"]["rut"];
// } else { //SINO LO REDIRIGE AL INDEX
//     header("Location:../inicio/");
// }
?>
<?php include '../dashboard/head.php'; ?>

<!-- <link rel="stylesheet" href="https://sve.ubiobio.cl/assets/css/estilosintranet.css">
<link rel="stylesheet" href="https://sve.ubiobio.cl/assets/css/ace.min.css"> -->


<title>Salud los Álamos - COORDENADAS</title>


<style>
    .botonovalado {
        width: 100%;
        border-radius: 40px;
        background-color: #1a6797 !important;
        border-color: #3e8ccf;
        color: white;
        padding: 10px;
        font-size: 18px;
        border: none;
        box-shadow: 0px 10px 6px -5px #949698;
        -webkit-transition: transform .3s ease, background .3s ease;
        -moz-transition: transform .3s ease, background .3s ease;
        transition: transform .3s ease, background .3s ease;
    }

    .botonovalado:hover {
        text-decoration: none;
        outline: 0;
    }

    .circulo_del_label {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        background: #1a6797;
        text-align: center;
        line-height: 50px;
        color: white;
        font-size: 17px;
        font-weight: bold;
        box-shadow: 0px 1px 4px 0px #7f8387;
    }


    input[type=color],
    input[type=date],
    input[type=datetime-local],
    input[type=datetime],
    input[type=email],
    input[type=month],
    input[type=number],
    input[type=password],
    input[type=search],
    input[type=tel],
    input[type=text],
    input[type=time],
    input[type=url],
    input[type=week],
    textarea {
        border-radius: 0 !important;
        color: #858585;
        background-color: #fff;
        border: 1px solid #d5d5d5;
        padding: 5px 4px 6px;
        font-size: 14px;
        font-family: inherit;
        -webkit-box-shadow: none !important;
        box-shadow: none !important;
        -webkit-transition-duration: .1s;
        transition-duration: .1s;
    }

    /* .coo_left[type=password] {
        width: 100%;
        border-radius: 50px 0px 0px 50px !important;
        text-align: center;
    }

    .coo_right[type=password] {
        width: 100%;
        border-radius: 0px 50px 50px 0px !important;
        text-align: center;
    } */


    .text-azul {
        color: #438EB9;
    }

    .tarjetapersonal {
        padding: 10px;
        margin: 10px 0;
        border: 1px solid #eee;
        border-top-width: 5px;
        border-radius: 3px;
    }

    .widget-box.transparent>.widget-header {
        background: 0 0;
        border-width: 0;
        border-bottom: 1px solid #DCE8F1;
        color: #4383B4;
        padding-left: 3px;
    }

    .tarjeta_coordenadas,
    .clave_dinamica,
    .papeleta_votacion {
        padding: 10px 10px;
    }

    .widget-box.transparent {
        border-width: 0;
    }

    .widget-box {
        padding: 0;
        -webkit-box-shadow: none;
        box-shadow: none;
        margin: 3px 0;
        border: 1px solid #CCC;
    }
</style>

<style>
    .candidato {
        display: grid;
        grid-template-columns: 1fr 2fr;
        width: 100%;
        justify-items: center;
        align-items: center;
        border-radius: 7px;
        background-color: #f6f6f6;
        padding: 10px;
        cursor: pointer;
        grid-column-gap: 10px;

        -webkit-transition: transform .3s ease, background .3s ease;
        -moz-transition: transform .3s ease, background .3s ease;
        transition: transform .3s ease, background .3s ease;
    }

    .candidato-avatar {
        width: 70px;
        height: 70px;
        background-color: #f3f3f3;
        border-radius: 50%;
        text-align: center;
        display: grid;
        align-items: center;
        justify-items: center;
        border: 3px #fff double;
        color: white;
    }

    .candidato-info {
        justify-self: left;
    }

    .candidato-info:hover {
        justify-self: left;
        cursor: pointer;
    }

    .candidatos {
        display: grid;
        grid-template-columns: 1fr 1fr 1fr;
        grid-column-gap: 30px;
        grid-row-gap: 30px;
        margin: 80px auto;
    }

    .candidato:hover {
        background-color: #1a6797;
        box-shadow: 0px 10px 6px -5px #949698;
        transform: scale(1.028);
        backface-visibility: hidden;
    }

    .candidato:hover * {
        color: white;
    }

    .candidato-checked {
        display: grid;
        grid-template-columns: 1fr 2fr;
        width: 100%;
        justify-items: center;
        align-items: center;
        border-radius: 7px;
        background-color: #1a6797;
        padding: 10px;
        cursor: pointer;
        grid-column-gap: 10px;

        box-shadow: 0px 10px 6px -5px #949698;
        color: white !important;
    }
</style>

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

                    <div class="container pt-4 pb-3">
                        <div class="row">
                            <div class="col-12">
                                <div class="progress" style="height: 9px;">
                                    <div class="progress-bar bg-morado" role="progressbar" style="width: 50%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                    <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="container" style="padding-bottom: 20px;">
                        <!-- <div class="row justify-content-center"></div> -->
                        <div class="encabezado">
                            <div class="container">
                                <div class="row">
                                    <div class="col-xs-6 izquierda"><img src="/assets/images/escudod.png" alt="" class="img-responsive superior"></div>
                                    <div class="col-xs-6 derecha"><img src="/assets/images/isologod.png" alt="" class="img-responsive superior"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tarjetapersonal" style="border-top: 3px solid #438eb9;">

                        <section class="tarjeta_coordenadas">
                            <div class="widget-box transparent">
                                <div class="widget-header">
                                    <a data-toggle="collapse" href="#grupo_1" role="button" aria-expanded="false" aria-controls="collapseExample" style="text-decoration: none;">
                                        <h4 class="info-title text-azul bolder smaller widget-title seccion_tittle">
                                            <i class="fas fa-address-card"></i>
                                            <span class="seccion_label">TARJETA DE COORDENADAS </span>
                                            <i class="fa fa-exclamation-circle" style="float: right;"></i>
                                        </h4>
                                    </a>
                                </div>
                                <div class="collapse show" id="grupo_1">
                                    <div class="card-body">
                                        <form name="form" method="post" autocomplete="off">
                                            <div class="row justify-content-center">
                                                <div class="col-xs-12 col-sm-8">
                                                    <div class="form-group">
                                                        <h4 class="pb-5 text-center text-azul">
                                                            Ingreso de Coordenadas
                                                        </h4>
                                                        <div class="input-group pb-4">

                                                            <div class="col-4 text-center">
                                                                <label class="circulo_del_label text-center">A1</label>
                                                            </div>

                                                            <div class="col-4 text-center">
                                                                <label class="circulo_del_label text-center">B2</label>
                                                            </div>

                                                            <div class="col-4 text-center">
                                                                <label class="circulo_del_label text-center">C3</label>
                                                            </div>
                                                        </div>

                                                        <div class="input-group pl-2 pb-3">
                                                            <input type="password" class="form-control text-center" name="form[coordenada_1]" style="border-radius: 50px 0px 0px 50px !important;" maxLength="2" size="2" min="0" max="99" pattern="[0-9]{2}" onkeypress="return solonumeros(event)" onpaste="return false" required>
                                                            <input type="password" class="form-control text-center" name="form[coordenada_2]" maxLength="2" size="2" min="0" max="99" pattern="[0-9]{2}" onkeypress="return solonumeros(event)" onpaste="return false" required>
                                                            <input type="password" class="form-control text-center" name="form[coordenada_3]" style="border-radius: 0px 50px 50px 0px !important;" maxLength="2" size="2" min="0" max="99" pattern="[0-9]{2}" onkeypress="return solonumeros(event)" onpaste="return false" required>
                                                        </div>

                                                        <h4 class="pt-4 text-center">
                                                            ID Tarjeta : 457E58A1 - Intentos Restantes : 3
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="container-fluid text-center">
                                                <div class="row justify-content-center">
                                                    <div class="col-xs-12 col-sm-9 pb-2">
                                                        <button type="submit" id="form_validar" name="form[validar]" class="botonovalado">Verificar Coordenadas</button>
                                                    </div>
                                                    <br>
                                                    <div class="col-sm-6 col-sm-12 pb-4">
                                                        No encuentras tu Tarjeta?
                                                    </div>
                                                    <div class="col-sm-6 col-sm-12 pt-2">
                                                        <a href="./coord1.php" class="a_padd"> Enviar Nueva Tarjeta de Coordenadas a mi correo</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- <input type="hidden" id="form__token" name="form[_token]" value="czpTzR_phmmSTkz2M6XUC5RyH5J9iqtbz_RNvDrxGKU"> -->
                                        </form>
                                    </div>
                                </div>
                                <script>
                                    $(document).ready(function() {
                                        $("input[type=password][name^='form\[coordenada_']").keyup(function() {
                                            if ($(this).val().length == $(this).attr("maxlength")) {
                                                var i = $('input').index(this);
                                                $('input').eq(i + 1).focus();
                                            }
                                        });
                                    });
                                </script>
                            </div>
                        </section>

                        <section class="clave_dinamica">
                            <div class="help-content">
                                <div class="widget-box transparent">
                                    <div class="widget-header">
                                        <a data-toggle="collapse" href="#grupo_2" role="button" aria-expanded="false" aria-controls="collapseExample" style="text-decoration: none;">
                                            <h4 class="info-title text-azul bolder smaller widget-title seccion_tittle">
                                                <i class="fas fa-ellipsis-h"></i>
                                                <span class="seccion_label">CÓDIGO DE SEGURIDAD</span>
                                                <i class="fa fa-exclamation-circle" style="float: right;"></i>
                                            </h4>
                                        </a>
                                    </div>
                                    <div class="collapse" id="grupo_2">
                                        <div class="card-body">
                                            <div class="row justify-content-center m-3">
                                                <div class="col-8">
                                                    <form name="form" method="post">
                                                        <div class="col-xs-12">
                                                            <div class="alert alert-info tiny_alert" style="vertical-align: middle;">
                                                                <i class="blue ace-icon fa fa-info-circle fa-2x" style="vertical-align: middle;margin-right: 5px;"></i> <span style="vertical-align: middle;display: inline-block;"><strong>Información</strong></span><br>
                                                                <p style="padding: 10px;">Se ha enviado un código de seguridad a su correo. El código tiene una validez de 5 minutos para ser verificado, permitiendo que su transacción sea validada.</p>
                                                            </div>
                                                            <div class="form-group pt-3">
                                                                <h4 class="text-center pb-3">
                                                                    Código de Seguridad
                                                                </h4>
                                                                <div class="row">
                                                                    <input type="password" id="form_clave_dinamica" name="form[clave_dinamica]" required="required" class="text-center form-control" style="border-radius: 50px !important;" autocomplete="off">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row justify-content-center">
                                                            <div class="col-xs-12 col-sm-9">
                                                                <button type="submit" id="form_validar" name="form[validar]" class="botonovalado">Verificar Código</button>
                                                            </div>
                                                        </div>
                                                        <input type="hidden" id="form__token" name="form[_token]" value="czpTzR_phmmSTkz2M6XUC5RyH5J9iqtbz_RNvDrxGKU">
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </section>

                        <section class="papeleta_votacion" data-toggle="collapse" href="#grupo_3" role="button" aria-expanded="false" aria-controls="collapseExample">
                            <div class="help-content">
                                <div class="widget-box transparent">
                                    <div class="widget-header">
                                        <a href="#grupo_3" data-action="collapse" data-target="#grupo_3" style="text-decoration: none;">
                                            <h4 class="info-title text-azul bolder smaller widget-title seccion_tittle">
                                                <i class="fas fa-check-double"></i>
                                                <span class="seccion_label">PAPELETA DE VOTACIÓN</span>
                                                <i class="fa fa-exclamation-circle" style="float: right;"></i>
                                            </h4>
                                        </a>
                                    </div>

                                    <div class="collapse" id="grupo_3">
                                        <div class="card-body">
                                            <div class="row justify-content-center">
                                                <div class="col-8">
                                                    <h4 class="text-azul text-center">
                                                        Candidatos
                                                    </h4>
                                                    <form name="form" method="post">
                                                        <div class="candidatos">
                                                            <label class="candidato" for="preferencias1">
                                                                <div class="candidato-avatar">
                                                                    <i class="fas fa-user-tie"></i>
                                                                </div>
                                                                <div class="candidato-info">
                                                                    <p class="nombre"><label for="preferencias1" class="required">APRUEBO</label></p>
                                                                </div>
                                                                <label><input type="radio" name="preferencias" value="1" id="preferencias1"></label>
                                                            </label>
                                                            <label class="candidato" for="preferencias2">
                                                                <div class="candidato-avatar">
                                                                    <i class="fas fa-user-tie"></i>
                                                                </div>
                                                                <div class="candidato-info">
                                                                    <p class="nombre"><label for="preferencias2" class="required">RECHAZO</label></p>
                                                                </div>
                                                                <label><input type="radio" name="preferencias" value="2" id="preferencias2"></label>
                                                            </label>
                                                            <label class="candidato" for="preferencias-1">
                                                                <div class="candidato-avatar">
                                                                    <i class="fas fa-user-tie"></i>
                                                                </div>
                                                                <div class="candidato-info">
                                                                    <p class="nombre"><label for="preferencias-1" class="required">VOTO NULO</label></p>
                                                                </div>
                                                                <label><input type="radio" name="preferencias" value="-1" id="preferencias-1"></label>
                                                            </label>
                                                            <label class="candidato" for="preferencias0">
                                                                <div class="candidato-avatar">
                                                                    <i class="fas fa-user-tie"></i>
                                                                </div>
                                                                <div class="candidato-info">
                                                                    <p class="nombre"><label for="preferencias0" class="required">VOTO BLANCO</label></p>
                                                                </div>
                                                                <label><input type="radio" name="preferencias" value="0" id="preferencias0"></label>
                                                            </label>
                                                        </div>
                                                        <div class="btn_coor_wrapper" style="margin: 40px auto !important;">
                                                            <button type="submit" id="form_votar" name="form[votar]" class="botonovalado">Emitir Votación</button>
                                                        </div>
                                                        <!-- <input type="hidden" id="form__token" name="form[_token]" value="czpTzR_phmmSTkz2M6XUC5RyH5J9iqtbz_RNvDrxGKU"> -->
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </section>
                    </div>
                    <div class="row pie">
                        <div class="col-sm-6 izquierda">
                            <img src="/assets/images/escudo_pied.png" class="img-responsive inferior" alt="">
                        </div>
                        <div class="col-sm-6 derecha">
                            <img src="/assets/images/isologo_pied.png" class="img-responsive inferior" alt="">
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
</body>

</html>