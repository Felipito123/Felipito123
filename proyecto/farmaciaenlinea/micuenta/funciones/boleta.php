<?php
include '../../../conexion/conexion.php';
include '../../../funcionesphp/limpiarCampo.php';
date_default_timezone_set("America/Santiago");
setlocale(LC_TIME, "spanish");
$fecha = date("d-m-Y");
$porciones = explode("-", $fecha);
$nombrefecha = $porciones[0] . ' ' . strftime('%B', mktime(0, 0, 0, number_format($porciones[1]))) . ' del ' . $porciones[2];

if (isset($_GET['var']) && !empty($_GET['var']) && $_GET['var'] != 0 && is_numeric($_GET['var'])) {
    $codigo = $_GET['var'];
    $ID = $codigo - 31241260; //31241263

    $sql = "SELECT DISTINCT pa.rut_paciente,
    pa.nombres_paciente,
    pa.apellidos_paciente, 
    pa.telefono_paciente,
    pa.direccion_paciente, 
    pat.nombre_patologia,
    TIMESTAMPDIFF(YEAR, pa.edad_paciente, CURDATE()) AS edad
    FROM solicitud_medicamento sm, paciente pa, patologia pat, historial_solicitud hs
    WHERE pa.rut_paciente=sm.rut_paciente and 
    pa.id_patologia=pat.id_patologia and  sm.id_solicitud_medicamento='$ID'";

    $res = mysqli_query($mysqli, $sql);
    if ($res) {
        if (mysqli_num_rows($res) > 0) {
            $fila = mysqli_fetch_assoc($res);
            $rut = $fila['rut_paciente'];
            $nombre = $fila['nombres_paciente'];
            $apellidos = $fila['apellidos_paciente'];
            $tipo = $fila['nombre_patologia'];
            $direccion = $fila['direccion_paciente'];
            $nombrepatologia = $fila['nombre_patologia'];
            $edad = $fila['edad'];
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boleta</title>

    <style>
        * {
            margin: 0;
            box-sizing: border-box;
            font-family: "VT323", monospace;
            color: #1f1f1f;
        }

        h1 {
            margin-bottom: 0;
        }

        .container {
            background: #f1f1f1;
            padding: 20px 10px;
        }

        .bold {
            font-weight: bold;
        }

        .center {
            text-align: center;
        }

        .receipt {
            width: 320px;
            min-height: 100vh;
            height: 100%;
            background: #fff;
            margin: 0 auto;
            box-shadow: 5px 5px 19px #ccc;
            padding: 10px;
        }

        .logo {
            text-align: center;
        }

        .barcode {
            font-family: "Libre Barcode 128", cursive;
            font-size: 42px;
            text-align: center;
        }

        .address {
            text-align: center;
            margin-bottom: 10px;
            margin: 10px auto;
        }

        .transactionDetails {
            display: flex;
            justify-content: space-between;
            margin: 0 10px 20px;
        }

        .transactionDetails .detail {
            text-transform: uppercase;
        }

        .centerItem {
            display: flex;
            justify-content: center;
            margin-bottom: 8px;
        }

        .survey {
            text-align: center;
            margin-bottom: 12px;
        }

        .survey .surveyID {
            font-size: 20px;
        }

        .paymentDetails {
            display: flex;
            justify-content: space-between;
            margin: 0 auto;
            width: 150px;
        }

        .creditDetails {
            margin: 10px auto;
            width: 230px;
            font-size: 14px;
            text-transform: uppercase;
        }

        .receiptBarcode {
            margin: 10px 0;
            text-align: center;
        }

        .returnPolicy {
            margin: 10px 20px;
            width: 220px;
            display: flex;
            justify-content: space-between;
        }

        .coupons {
            margin-top: 20px;
        }

        .tripSummary {
            margin: auto;
            width: 255px;
        }

        .tripSummary .item {
            display: flex;
            justify-content: space-between;
            margin: auto;
            width: 220px;
        }

        .feedback {
            margin: 20px auto;
        }

        .feedback h3.clickBait {
            font-size: 30px;
            font-weight: bold;
            text-align: center;
            margin: 10px 0;
        }

        .feedback h4.web {
            font-size: 20px;
            font-weight: bold;
            text-align: center;
            margin: 10px 0;
        }

        .break {
            text-align: center;
            font-size: 18px;
            font-weight: bold;
            margin: 10px 0;
        }

        .couponContainer {
            border-top: 1px dashed #1f1f1f;
            margin-bottom: 20px;
        }

        .couponContainer .discount {
            font-size: 35px;
            text-align: center;
            margin-bottom: 10px;
        }

        .couponContainer .discountDetails {
            font-size: 20px;
            text-align: center;
            margin-bottom: 15px;
        }

        .couponContainer .barcode {
            margin: 10px 0 0;
        }

        .couponContainer .legal {
            font-size: 12px;
            margin-bottom: 12px;
        }

        .couponContainer .barcodeID {
            margin-bottom: 8px;
        }

        .couponContainer .expiration {
            display: flex;
            justify-content: space-between;
            margin: 10px;
        }

        .couponContainer .couponBottom {
            font-size: 13px;
            text-align: center;
        }

        @media print {

            /*Imprime sin mostrar el botón*/
            #botonimprimir {
                display: none;
            }
        }
    </style>
</head>

<body>
    <!-- *****************************
    <img src="cod_barras.png" width="100%" height="18"> -->

    <div id="showScroll" class="container">
        <div class="receipt">
            <div class="center">
                <!-- <img src="timbre_matricula.png" width="100%" height="100"> -->
                <img src="../partes/logoblancoynegro.png" width="auto" height="90px">
            </div>
            <h1 class="logo">Farmacia en linea</h1>
            <div class="address">
                Ministerio de salud <br>
                S.S Arauco<br>
                CESFAM Los Álamos
            </div>
            <div class="transactionDetails">
                <div class="detail">Nro boleta #<?php if (isset($_GET['var'])) {
                                                    echo $_GET['var'];
                                                } else {
                                                    echo '00097655';
                                                } ?></div>
            </div>

            <div class="creditDetails">
                <p>Información básica &nbsp;&nbsp;&nbsp;&nbsp; ******************</p>
                <p>Paciente: <?php echo $nombre . ' ' . $apellidos; ?> </p>
                <p>RUN: <?php echo $rut; ?></p>
                <!--8.091.090-8 -->
                <p>Tipo: <?php echo $nombrepatologia; ?></p>
                <!--Crónico -->
                <p>Edad: <?php echo $edad; ?> años</p>
                <p>Dirección: <?php echo $direccion; ?></p>
                <!--Ramon Rabal, paicavi #449 -->
            </div>

            <div class="creditDetails" style="padding-left: 90px;">
                <p>Fecha: <?php echo $porciones[0] . '/' . $porciones[1] . '/' . $porciones[2]; ?></p>
            </div>

            <div id="coupons" class="coupons">
                <!--       start coupon -->
                <div class="couponContainer">
                    <!--style="padding-top: 10px;"-->

                    <div class="discountDetails">

                    <!-- NOTA: 
                    hs.estado_historial_solicitud=1 ES SOLICITUD DE MEDICAMENTO PENDIENTE 
                    hs.estado_historial_solicitud=2 ES SOLICITUD DE MEDICAMENTO APROBADA
                    hs.estado_historial_solicitud=3 ES SOLICITUD DE MEDICAMENTO RECHAZADA
                    -->
                        <?php
                        $sql2 = "SELECT med.nombre_medicamento, med.dosificacion_medicamento, hs.comentario_historial_solicitud
                        FROM solicitud_medicamento sm , historial_solicitud hs, medicamento med WHERE 
                        sm.id_solicitud_medicamento=hs.id_solicitud_medicamento and
                        hs.id_medicamento=med.id_medicamento and hs.estado_historial_solicitud=2 and
                        sm.id_solicitud_medicamento='$ID'";
                        $consulta = mysqli_query($mysqli, $sql2);
                        if (!$consulta) {
                            echo '
                            <div class="couponContainer">
                                <div class="discountDetails" style="padding-top: 10px;">Ocurrió un error</div>
                            </div>';
                        } else {
                            while ($fila2 = mysqli_fetch_array($consulta)) { ?>

                                <div class="couponContainer">
                                    <div class="discountDetails" style="padding-top: 10px;">
                                        <?php echo $fila2['nombre_medicamento'] . '  ' . $fila2['dosificacion_medicamento']; ?>
                                    </div>
                                    <?php if ($fila2['comentario_historial_solicitud'] != '') { ?>
                                        <div class="expiration">
                                            <div class="item">
                                               <small class="center" style=" font-size: 12px;"> Observación: <?php echo $fila2['comentario_historial_solicitud']; ?></small>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                        <?php }
                        } ?>

                        <div class="couponContainer"></div>

                        <div class="legal center">
                            Los medicamentos bonificados por su convenio
                            farmaceutico, no estan sujetos a devolución ni a cambios
                            posteriores.
                        </div>
                        <div class="barcode">
                            <!-- PARA USAR EL CÓDIGO DE BARRA HAY QUE IR AL php.ini y descomentar la linea
                    extension=gd ó extension=php_gd2.dll -->

                            <!-- echo "<img alt='codigo de barra' src='barcode/barcode.php?codetype=Code39&size=40&text=".$text."&print=true'/>"; -->
                            <img alt='codigo de barra' src='./barcode.php?text=<?php echo $codigo; ?>' width="100%" style="padding-left: 5px;" height="90">
                        </div>
                        <!-- <div class="barcodeID center">
                        9007 9876 9087 7665 62
                    </div> -->
                    </div>
                    <!--       end coupon -->
                </div>


                <div class="feedback">
                    <div class="break">
                        *****************************
                    </div>
                    <p class="center">
                        Nos encantaría leer sus comentarios sobre su experiencia reciente con nosotros. Esta encuesta
                        solo tomará 1 minuto en completarse.
                    </p>
                    <!-- <h3 class="clickBait">Comentenos</h3> -->
                    <h4 class="web">www.saludlosalamos.cl</h4>

                    <img src="../partes/timbre_matricula.png" style="
                margin: 15px 105px;" width="auto" height="90px">

                    <p class="center">
                        Salud los álamos, Chile.
                    </p>
                    <div class="break">
                        *****************************
                    </div>
                </div>
            </div>
            <div class="center" style="padding-bottom:15px;" id="botonimprimir">
            <input type="button" value="Imprimir" onclick="window.print(); window.close();" style="
                width: 150px;
                height: 30px;
                font-size: 21px;
                border:none;
                background-color: #ffb752;
                color: white;
                font-weight: bold;" class="no-print">
        </div>
        </div>

</body>

</html>