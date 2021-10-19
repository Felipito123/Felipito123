<?php include 'head.php';
include '../../conexion/conexion.php';
include '../../funcionesphp/limpiarCampo.php';
date_default_timezone_set("America/Santiago");
setlocale(LC_TIME, "spanish");
$fecha = date("d-m-Y");
$porciones = explode("-", $fecha);
$nombrefecha = $porciones[0] . ' ' . strftime('%B', mktime(0, 0, 0, number_format($porciones[1]))) . ' del ' . $porciones[2];

if (isset($_POST['codigo']) && !empty($_POST['codigo']) && $_POST['codigo'] != 0 && is_numeric($_POST['codigo'])) {
    $codigo = $_POST['codigo'];
    $ID = $codigo - 31241260; //31241263

    $sql = "SELECT pa.rut_paciente,
    pa.nombres_paciente,
    pa.apellidos_paciente, 
    pa.telefono_paciente,
    pa.direccion_paciente, 
    pat.nombre_patologia
    FROM solicitud_medicamento sm, paciente pa, patologia pat, historial_solicitud hs
    WHERE pa.rut_paciente=sm.rut_paciente and 
    pa.id_patologia=pat.id_patologia and  sm.id_solicitud_medicamento='$ID'";

    $res = mysqli_query($mysqli, $sql);
    if (!$res) { //Hubo un error al mostrar los pacientes con ese código de solicitud
        // header("Location:../");
        echo '<script>window.location.href="../?errcd=1&cd=' . $codigo . '";</script>';
    } else {
        if (mysqli_num_rows($res) > 0) {
            $fila = mysqli_fetch_assoc($res);
            $rut = $fila['rut_paciente'];
            $nombre = $fila['nombres_paciente'];
            $apellidos = $fila['apellidos_paciente'];
            $tipo = $fila['nombre_patologia'];
            $direccion = $fila['direccion_paciente'];
        } else { //no hay registros asociados a ese código de solicitud
            // header("Location:../");
            echo '<script>window.location.href="../?errcd=2&cd=' . $codigo . '";</script>';
        }
    }
} else {
    // header("Location:../");
    echo '<script>window.location.href="../?errcd=3&cd=' . $codigo . '";</script>';
}
?>
<title>Salud los Álamos - Estado medicamento</title>
<link rel="stylesheet" href="../css/estilologin.css">
<link rel="stylesheet" href="css/estilo-barraprogresiva.css">

<!-- hs.estado_historial_solicitud  hs.id_solicitud_medicamento=sm.id_solicitud_medicamento-->
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
                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow p-5" style="border-top: 4px solid #e74a3b;">
                    <div class="container">
                        <!--style="padding-left: 250px;"-->
                        <div class="row">
                            <div class="col-lg-12">
                                <img src="../head/imagenusuario.png" class="img-fluid">
                            </div>
                            <span class="pt-2 pr-1">Bienvenido </span>
                        </div>
                    </div>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link" href="javascript:void(0)" onclick="location.href='../'" title="volver">
                                <i class="fas fa-undo-alt fa-fw"></i>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- End of Topbar -->

                <div class="container" style="padding-bottom:8%;">

                    <div class="row mb-4 justify-content-center">
                        <div class="col-lg-5 col-md-6 mb-4 mb-lg-0">
                            <!-- Card-->
                            <div class="card rounded shadow-sm border-0">
                                <div class="card-body p-0">
                                    <div class="bg-success px-5 py-4 text-center card-img-top"><img src="check.png" alt="..." width="100" class="rounded-circle mb-2 img-thumbnail d-block mx-auto">
                                        <h5 class="text-white mb-0"><?php echo $nombre . ' ' . $apellidos; ?></h5>
                                        <p class="small text-white mb-0">¡Hemos recibido su solicitud!</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php

                    /*  estado_historial_solicitud son:
                    0= aprobado o pendiente
                    1=en transito (se marca: pendiente, aprobado y en transito)
                    2=entregado (se marcan todas: pendiente, aprobado, en transito y entregado) */

                    $sqlseg1 = "SELECT seguimiento FROM solicitud_medicamento WHERE id_solicitud_medicamento='$ID'";
                    $resseg1 = mysqli_query($mysqli, $sqlseg1);
                    $filaseguimiento1 = mysqli_fetch_assoc($resseg1);
                    $valor = $filaseguimiento1['seguimiento'];

                    if ($valor == 1) { //esta en transito(se marca: pendiente, aprobado y en transito)
                        $bandera = 1;
                    } else if ($valor == 2) { //esta entregado (se marcan todas: pendiente, aprobado, en transito y entregado)
                        $bandera = 2;
                    } else {
                        $sqlseg2 = "SELECT COUNT(id_historial_solicitud) as contador FROM historial_solicitud WHERE estado_historial_solicitud=2 and id_solicitud_medicamento='$ID'";
                        $resseg2 = mysqli_query($mysqli, $sqlseg2);
                        $filaseguimiento2 = mysqli_fetch_assoc($resseg2);
                        $valor2 = $filaseguimiento2['contador'];

                        if ($valor2 >= 1) { //hay solicitudes aprobadas (se marcan: pendiente, aprobado)
                            $bandera = 3;
                        } else { //hay solicitudes pendientes o rechazadas (se marcan: pendiente)

                            $sqlseg3 = "SELECT COUNT(id_historial_solicitud) as contador FROM historial_solicitud WHERE estado_historial_solicitud=1 and id_solicitud_medicamento='$ID'";
                            $resseg3 = mysqli_query($mysqli, $sqlseg3);
                            $filaseguimiento3 = mysqli_fetch_assoc($resseg3);
                            $valor3 = $filaseguimiento3['contador'];

                            if ($valor3 >= 1) { //hay solicitudes pendientes
                                $bandera = 4;
                            } else { //Solo hay solicitudes rechazadas
                                echo '<script>window.location.href="../?sr=sr&cd=' . $codigo . '";</script>';
                                
                            }
                        }
                    }

                    ?>


                    <div class="row justify-content-center pb-4">
                        <div class="col-lg-9">
                            <div class="card" id="carddebarraprogresiva">
                                <div class="row d-flex justify-content-between top">
                                    <div class="d-flex">
                                        <h5>ORDEN <span class="text-danger font-weight-bold">#<?php echo $codigo; ?></span></h5>
                                    </div>
                                    <div class="d-flex flex-column text-sm-right">
                                        <p class="mb-0"><span><?php echo $nombrefecha; ?></span></p>
                                        <!-- <p>USPS <span class="font-weight-bold">234094567242423422898</span></p> -->
                                    </div>
                                </div> <!-- Add class 'active' to progress -->
                                <div class="row d-flex justify-content-center">
                                    <div class="col-12">
                                        <ul id="progressbar" class="text-center">
                                            <li class="active step0"></li>
                                            <li class="<?php if ($bandera == 1 || $bandera == 2 || $bandera == 3) echo 'active'; ?> step0"></li>
                                            <li class="<?php if ($bandera == 1 || $bandera == 2) echo 'active'; ?> step0"></li>
                                            <li class="<?php if ($bandera == 2) echo 'active'; ?> step0"></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="row justify-content-between top">
                                    <div class="row d-flex icon-content">
                                        <i class="icon fas fa-hourglass-half" style="font-size: 50px;"></i>
                                        <div class="d-flex flex-column">
                                            <p class="font-weight-bold">Solicitud<br>Pendiente</p>
                                        </div>
                                    </div>
                                    <div class="row d-flex icon-content">
                                        <div class="icon fas fa-thumbs-up" style="font-size: 50px;"></div>
                                        <div class="d-flex flex-column">
                                            <p class="font-weight-bold">¡Solicitud<br>Aprobada!</p>
                                        </div>
                                    </div>
                                    <div class="row d-flex icon-content">
                                        <i class="icon fas fa-truck" style="font-size: 50px;"></i>
                                        <div class="d-flex flex-column">
                                            <p class="font-weight-bold">Medicamento<br>En Ruta</p>
                                        </div>
                                    </div>
                                    <div class="row d-flex icon-content">
                                        <i class="icon fas fa-home" style="font-size: 50px;"></i>
                                        <div class="d-flex flex-column">
                                            <p class="font-weight-bold">Entrega<br>exitosa</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php
                    $sql2 = "SELECT med.nombre_medicamento, hs.stock_historial_solicitud,
                            hs.comentario_historial_solicitud, med.precio_medicamento, med.dosificacion_medicamento
                            FROM solicitud_medicamento sm, historial_solicitud hs, medicamento med
                            WHERE sm.id_solicitud_medicamento=hs.id_solicitud_medicamento and 
                            (hs.estado_historial_solicitud = 2 or hs.estado_historial_solicitud = 4 or hs.estado_historial_solicitud = 5)  and
                            hs.id_medicamento=med.id_medicamento and sm.id_solicitud_medicamento='$ID'";
                    $res2 = mysqli_query($mysqli, $sql2);

                    if ($res2 && mysqli_num_rows($res2) >= 1) {
                    ?>

                        <div class="row justify-content-center">
                            <div class="col-lg-9">
                                <!-- Default small shadow-->
                                <div class="card shadow-sm border-bottom-success">
                                    <!-- <h6 class="card-header font-weight-bold">Detalle del medicamento</h6> -->

                                    <div class="card-body p-5">

                                        <div class="row">
                                            <div class="col-md-12">
                                                <!-- col-lg-12 start here -->
                                                <div class="row">
                                                    <!-- Start .row -->
                                                    <div class="col-lg-6">
                                                        <!-- col-lg-6 start here -->
                                                        <div><img width="120" src="iconomedicina.png" alt="Invoice logo" height="100"></div>
                                                    </div>
                                                    <!-- col-lg-6 end here -->
                                                    <div class="col-lg-6">
                                                        <!-- col-lg-6 start here -->
                                                        <div>
                                                            <ul class="list-unstyled text-right">
                                                                <li>Ministerio de salud</li>
                                                                <li>S.S Arauco</li>
                                                            </ul>
                                                        </div>
                                                    </div>


                                                    <!-- col-lg-6 end here -->
                                                    <div class="col-lg-12 pt-2">
                                                        <!-- col-lg-12 start here -->
                                                        <div style="min-height: 20px;padding: 19px;margin-bottom: 20px;background-color: #f5f5f5;border: 1px solid #e3e3e3;border-radius: 4px;">
                                                            <ul class="list-unstyled pt-2">

                                                                <li><strong>Orden:</strong> <?php echo $codigo; ?></li>
                                                                <li><strong>Rut:</strong> <?php echo $rut; ?></li>
                                                                <li><strong>Nombre:</strong> <?php echo $nombre . ' ' . $apellidos; ?></li>
                                                                <li><strong>Patología:</strong> <?php echo $tipo; ?></li>
                                                                <li><strong>Dirección:</strong> <?php echo $direccion; ?></li>
                                                                <!-- <li><strong>Estado:</strong> <span class="badge badge-danger">ACTIVO</span></li> -->
                                                            </ul>
                                                        </div>
                                                        <div>
                                                            <div class="table-responsive" tabindex="0">
                                                                <!--style="overflow: hidden; outline: none;" -->
                                                                <table class="table table-bordered">
                                                                    <thead>
                                                                        <tr>
                                                                            <th class="text-center">Medicamento</th>
                                                                            <th class="text-center">Dosificación</th>
                                                                            <th class="text-center">Cantidad</th>
                                                                            <th class="text-center">Precio</th>
                                                                            <th class="text-center">Comentario</th>
                                                                            <th class="text-center">Total(CLP)</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>

                                                                        <?php

                                                                        $suma = 0;
                                                                        while ($fila = mysqli_fetch_array($res2)) {
                                                                            $nombremedicamento = $fila['nombre_medicamento'];
                                                                            $dosificacion = $fila['dosificacion_medicamento'];
                                                                            $cantidad = $fila['stock_historial_solicitud'];
                                                                            $comentario = $fila['comentario_historial_solicitud'];
                                                                            $precio = $fila['precio_medicamento'];
                                                                            $total = $cantidad * $precio;
                                                                            $suma = $suma + $total;
                                                                        ?>
                                                                            <tr>
                                                                                <td class="text-center"><?php echo $nombremedicamento; ?></td>
                                                                                <td><?php echo $dosificacion; ?></td>
                                                                                <td class="text-center"><?php echo $cantidad; ?></td>
                                                                                <td class="text-center"><?php echo $precio; ?></td>
                                                                                <td class="text-center"><?php echo $comentario; ?></td>
                                                                                <td class="text-center"><?php echo $total; ?></td>
                                                                            </tr>
                                                                        <?php }
                                                                        $iva = intval($suma * 0.1);
                                                                        $sumamasiva = $suma + $iva;
                                                                        ?>

                                                                    <tfoot>
                                                                        <tr>
                                                                            <th colspan="5" class="text-right">Sub Total:</th>
                                                                            <th class="text-center">$<?php echo $suma; ?></th>
                                                                        </tr>
                                                                        <tr>
                                                                            <th colspan="5" class="text-right">10% IVA:</th>
                                                                            <th class="text-center">$<?php echo $iva; ?></th>
                                                                        </tr>
                                                                        <tr>
                                                                            <th colspan="5" class="text-right">Descuento:</th>
                                                                            <th class="text-center">-$<?php echo $sumamasiva; ?></th>
                                                                        </tr>
                                                                        <tr>
                                                                            <th colspan="5" class="text-right">Total:</th>
                                                                            <th class="text-center">$0</th>
                                                                        </tr>
                                                                    </tfoot>
                                                                    </tbody>

                                                                </table>
                                                            </div>
                                                        </div>
                                                        <div class="invoice-footer mt25">
                                                            <p class="text-center">Generado el <?php echo $nombrefecha; ?> <a href="javascript:void(0)" onclick="window.print();" class="btn btn-default ml15"><i class="fa fa-print mr5"></i> Imprimir</a></p> 
                                                            <!--window.close(); Cuando cierro la ventana de imprimir, esta funcion hace que se cierre también la pestaña completa, por eso la quite de dentro del onclick="window.print();window.close();" -->
                                                        </div>
                                                    </div>
                                                    <!-- col-lg-12 end here -->


                                                </div>
                                                <!-- End .row -->
                                            </div>
                                            <!-- col-lg-12 end here -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php  } ?>
                    <section style="padding-bottom:70px;"></section>
                </div>
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer" style="background:brown; color:white;">
                <!-- style="width: 100%;height: 400px;background-image: url(https://digitalcorp.cl/tracking/img/banner@3x.fd8b14ef.png);background-size: 100% 100%;" -->
                <div class="container my-auto">
                    <div class="row" style="padding: 120px;">
                        <div class="col">
                            <div class="copyright text-center my-auto">
                                <span>Copyright &copy; Todos los derechos reservados 2020</span>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->


    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
</body>

</html>