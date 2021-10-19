<?php
include '../../conexion/conexion.php';
include '../../funcionesphp/TOUTF8.php';
session_start();
$rut = $_SESSION['sesionCESFAM']['rut'];

$sql = "SELECT d.id_documentos,d.descripcion_documentos,d.archivo_documentos, us.nombre_usuario, us.rut FROM documentos d, usuario us WHERE d.rut=us.rut and d.rut='$rut' and d.estado_documentos=1"; //ANTES: and us.id_rol!=3

$consulta = mysqli_query($mysqli, $sql);

$datos=array();
while($fila=mysqli_fetch_array($consulta)){
    $datos[]=array(
    'ID_DOCUMENTO_US'=>$fila["id_documentos"],
    'RUT_DOCUMENTO_US'=>$fila["rut"],
    'NOMBRE_USUARIO_DOCUMENTO_US'=>$fila["nombre_usuario"],
    'NOMBRE_DOCUMENTO_US'=>$fila["archivo_documentos"],
    'DESCRIPCION_DOCUMENTO_US'=>$fila["descripcion_documentos"]
    );
}

// print json_encode($datos);
header('Content-type: application/json');
echo json_encode(toutf8($datos));
mysqli_close($mysqli);
