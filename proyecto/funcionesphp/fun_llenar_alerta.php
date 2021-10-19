<?php
session_start();
require '../conexion/conexion.php';
$json = '';

if (isset($_SESSION['sesionCESFAM']) && !empty($_SESSION['sesionCESFAM']) && !is_null($_SESSION['sesionCESFAM'])) {
    $rut = $_SESSION['sesionCESFAM']['rut'];
    if (isset($_POST['pues']) && $_POST['pues'] == 1) {
        $sql = "SELECT id_notificacion,rut,SUBSTRING(mensaje_notificacion, 1, 88) AS mensaje,fecha_notificacion,estado_notificacion FROM notificacion WHERE rut='$rut' LIMIT 5";
        $consulta = mysqli_query($mysqli, $sql);
        $total = mysqli_num_rows($consulta);
        // $json='';
        if ($total != 0) {

            $sqele = "SELECT rut,id_notificacion FROM notificacion WHERE estado_notificacion='novisto' and rut='$rut'";
            $consultasqele = mysqli_query($mysqli, $sqele);
            $novisto = mysqli_num_rows($consultasqele);

            if ($novisto == 0) {
                $novisto = "";
            }


            $json .= '
            <li class="nav-item dropdown no-arrow mx-1" title="Notificaciones recibidas">
            <a class="nav-link dropdown-toggle" id="alerta" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw" style="color: #d0a7c2;" id="icononotificacion"></i>
                <span class="badge badge-danger badge-counter">' . $novisto . '</span>
            </a>

            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alerta">
                <h6 class="dropdown-header text-center bg-secondary border-secondary">
                    Notificaciones recientes
                </h6>
            ';

            while ($fila = mysqli_fetch_array($consulta)) {

                if ($fila['estado_notificacion'] == 'novisto') { //$i<3
                    $oko = "font-weight-bold";
                    $ak = "<i style='color:red;font-size:60%;float:right;margin-top:20px;' class='fa fa-circle' aria-hidden='true'></i>";
                } else {
                    $oko = "font-weight-normal";
                    $ak = "";
                }
                $json .= '
                <a class="dropdown-item d-flex align-items-center" href="../micuenta/">
                <div class="mr-3">
                    <div class="icon-circle bg-danger">
                        <i class="fa fa-envelope text-white"></i>
                    </div>
                </div>
                <div>
                    <div class="small text-gray-500">' . $fila['fecha_notificacion'] . '</div>
                    <span class=" ' . $oko . ' ">' . $fila['mensaje'] . '...</span>
                </div>

            ' . $ak . ' 
            </a>';
            }
            $json .= '<a class="dropdown-item text-center small text-gray-500" href="../micuenta/">Ver más</a>';
        } else {
            $json .= '
            <li class="nav-item dropdown no-arrow mx-1" title="Notificaciones recibidas">
            <a class="nav-link dropdown-toggle" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw" style="color: #d0a7c2;" id="icononotificacion"></i>
            </a>

            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header text-center" id="avisoheader">
                    Aviso
                </h6>

                <a class="dropdown-item d-flex align-items-center">
                    <div class="mr-3">
                        <div class="icon-circle bg-warning">
                            <i class="fas fa-exclamation-triangle text-white"></i>
                        </div>
                    </div>
                    <div>
                        No hay notificaciones para mostrar
                    </div>
                </a>
                <a class="dropdown-item text-center small text-gray-500"></a>
            </div>
        </li>
            ';
        }
    } else if (isset($_POST['pues']) && $_POST['pues'] == 2) {
        $sql2 = "UPDATE notificacion SET estado_notificacion='visto' WHERE rut='$rut' and estado_notificacion='novisto'";
        $consulta2 = mysqli_query($mysqli, $sql2);
        if (!$consulta2) {
            echo 3;
        } else {
            echo 4;
        }
    }
} else {
    $json .= '
    <li class="nav-item dropdown no-arrow mx-1">
    <a class="nav-link dropdown-toggle" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-bell fa-fw" style="color: #d0a7c2;" id="icononotificacion"></i>
    </a>

    <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
        <h6 class="dropdown-header text-center" id="avisoheader">
            Aviso
        </h6>

        <a class="dropdown-item d-flex align-items-center">
            <div class="mr-3">
                <div class="icon-circle bg-warning">
                    <i class="fas fa-exclamation-triangle text-white"></i>
                </div>
            </div>
            <div>
                No hay notificaciones para mostrar
            </div>
        </a>
        <a class="dropdown-item text-center small text-gray-500"></a>
    </div>
</li>
    ';
}

echo $json;
mysqli_close($mysqli);
