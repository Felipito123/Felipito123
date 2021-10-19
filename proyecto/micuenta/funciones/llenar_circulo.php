<?php
include '../../conexion/conexion.php';
include '../../funcionesphp/TOUTF8.php';
session_start();
$rut = $_SESSION['sesionCESFAM']['rut'];


$sql1 = "SELECT COUNT(id_documentos) as documentomicuenta FROM documentos WHERE rut='$rut'";
$consulta1 = mysqli_query($mysqli, $sql1);

$sql2 = "SELECT COUNT(id_calidad) as documentoscalidad FROM calidad";
$consulta2 = mysqli_query($mysqli, $sql2);

$sql3_pe = "SELECT COUNT(id_pe) as permisoespecial_contador FROM permiso_especial WHERE rut='$rut'";
$consulta3_pe = mysqli_query($mysqli, $sql3_pe);

$sql3_pa = "SELECT COUNT(id_pa) as permisoadmin_contador FROM permiso_administrativo WHERE rut_solicitante='$rut'";
$consulta3_pa = mysqli_query($mysqli, $sql3_pa);

$sql3_fl = "SELECT COUNT(id_pfl) as permisofl_contador FROM permiso_feriado_legal WHERE rut_solicitante='$rut'";
$consulta3_fl = mysqli_query($mysqli, $sql3_fl);

$sql4_videoconf = "SELECT COUNT(id_dr) as videoconf_contador FROM destinatario_reunion WHERE rut_receptor='$rut'";
$consulta4_videoconf = mysqli_query($mysqli, $sql4_videoconf);



$fila1 = mysqli_fetch_assoc($consulta1);
$fila2 = mysqli_fetch_assoc($consulta2);
$fila4 = mysqli_fetch_assoc($consulta3_pe);
$fila5 = mysqli_fetch_assoc($consulta3_pa);
$fila6 = mysqli_fetch_assoc($consulta3_fl);
$fila7 = mysqli_fetch_assoc($consulta4_videoconf);

$sumadesolicitudesdepermiso = $fila4['permisoespecial_contador'] + $fila5['permisoadmin_contador'] + $fila6['permisofl_contador'];


$datos = array();

$datos[0] = array('total_documentosmicuenta' => $fila1['documentomicuenta']);
$datos[1] = array('total_documentoscalidad' => $fila2['documentoscalidad']);
$datos[2] = array('total_solicitudesdepermiso' => $sumadesolicitudesdepermiso);
$datos[3] = array('total_videoconferencias' => $fila7['videoconf_contador']);

// $sql = "SELECT us.diasganados_usuario,us.diasrestantes_usuario, SUM(v.dias_tomados_vacaciones) as suma FROM vacaciones v, usuario us WHERE v.rut=us.rut and v.rut='$rut' and us.estado_usuario=1";

// $consulta = mysqli_query($mysqli, $sql);

// $datos = array();

// $diasganados=0;
// $diasrestantes=0;
// $diastomados=0;

// while ($fila = mysqli_fetch_array($consulta)) {

//     if (!$fila["diasganados_usuario"] || !empty($fila["diasganados_usuario"]) || $fila["diasganados_usuario"]!=0) {
//         $diasganados=$fila["diasganados_usuario"];
//     }

//     if (!$fila["diasrestantes_usuario"] || !empty($fila["diasrestantes_usuario"]) || $fila["diasrestantes_usuario"]!=0) {
//         $diasrestantes=$fila["diasrestantes_usuario"];
//     }

//     if (!$fila["suma"] || !empty($fila["suma"]) || $fila["suma"]!=0) {
//         $diastomdos=$fila["suma"];
//     }

//     $datos[] = array(
//         'DIASGANADOS' => $diasganados,
//         'DIASRESTANTES' => $diasrestantes,
//         'DIASTOMADOS' => $diastomados
//     );
// }
// print json_encode($datos);
// header('Content-type: application/json');
echo json_encode(toutf8($datos));
mysqli_close($mysqli);
