<?php
include '../../conexion/conexion.php';
include '../../funcionesphp/limpiarCampo.php';
date_default_timezone_set("America/Santiago");
setlocale(LC_TIME, "spanish");

$seleccion = $_POST['seleccionar'];
if (isset($seleccion)) {

    if ($seleccion == 1) {

        if (isset($_POST["correoencriptado"]) && isset($_POST["contrasena1"])) {

            $contra = limpiar_campo($_POST['contrasena1']);
            $correodelolvidado = limpiar_campo($_POST['correoencriptado']);

            //ESTOY ASUMIENDO QUE EL CORREO EXITE, PUESTO QUE NO LO ESTOY VALIDANDO

            $sqlactivo = "SELECT nombre_usuario, reestablecimiento FROM usuario WHERE correo_usuario='$correodelolvidado' and estado_usuario=1";
            $respuesta_activo = mysqli_query($mysqli, $sqlactivo);

            if (!$respuesta_activo) {
                echo 5;  //Error al consultar del funcionario
                return;
            } else {
                $contar_fila_activo = mysqli_num_rows($respuesta_activo);

                if ($contar_fila_activo > 0) {
                    $fila_activo = mysqli_fetch_array($respuesta_activo);
                    $fechaBD_Reestablecimiento = $fila_activo['reestablecimiento'];
                    $fecha_actual = strftime("%F %H:%M:%S");
                    $segundos = strtotime($fecha_actual) - strtotime($fechaBD_Reestablecimiento); //segundos
                    $minutos = $segundos / 60; //1 minuto

                    if (is_null($fechaBD_Reestablecimiento)) {
                        echo 8;
                        return;
                    } else if ($minutos > 3) {
                        echo 7; //Ha pasado más de tres minutos
                        return;
                    } else {
                        if (validavacioenarreglo(array($contra, $correodelolvidado))) {
                            echo 1;
                            return;
                        } else {
                            $sql = "UPDATE usuario SET contrasena_usuario=SHA('$contra') WHERE correo_usuario='$correodelolvidado'";
                            if (mysqli_query($mysqli, $sql)) {
                                echo 2;
                                return;
                            } else {
                                echo 3;
                                return;
                            }
                        }
                    }
                } else {
                    echo 6; //El funcionario no se encuentra activo
                    return;
                }
            }
        } else {
            echo 4;
            return;
        }


        mysqli_close($mysqli);
    }
} else {
    echo 444;
    return;
}
