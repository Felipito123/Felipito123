
<?php
require '../../conexion/conexion.php';
include '../../funcionesphp/TOUTF8.php';
session_start();

if (isset($_SESSION['sesionCESFAM'])) {
    $rut = $_SESSION["sesionCESFAM"]["rut"];
    $sql = "SELECT us.nombre_usuario, us.correo_usuario,us.direccion_usuario,us.telefono_usuario,us.id_rol,us.rut,r.nombre_rol,us.imagen_usuario, us.id_comuna, c.id_region FROM usuario us, rol r, comuna c WHERE us.id_rol=r.id_rol and us.id_comuna=c.id_comuna and us.rut='$rut'";
    $consulta = mysqli_query($mysqli, $sql);

    $datos = array();
    while ($fila = mysqli_fetch_array($consulta)) {
        $datos[] = array(
            'RUT' => $fila["rut"],
            'COMUNA' => $fila["id_comuna"],
            'REGION' => $fila["id_region"],
            'NOMBRE_USUARIO' => $fila["nombre_usuario"],
            'CORREO' => $fila["correo_usuario"],
            'TELEFONO' => $fila["telefono_usuario"],
            'DIRECCION' => $fila["direccion_usuario"],
            'IDROL' => $fila["id_rol"],
            'NOMBREROL' => $fila["nombre_rol"],
            'NOMBREIMAGEN' => $fila["imagen_usuario"]
        );
        // 'CONTRASENA'=>$fila["contrasena_usuario"],
    }

    // print json_encode($datos);
    header('Content-type: application/json');
    echo json_encode(toutf8($datos));
}


mysqli_close($mysqli);


?>