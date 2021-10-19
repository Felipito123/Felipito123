<?php
include '../conexion/conexion.php';
include 'limpiarCampo.php';
session_start();
$id = $_SESSION["sesionCESFAM"]["id_usuario"];

if (isset($_POST["limpiado"])) {

    if ($_POST['limpiado'] == 1) {
        $sql = "UPDATE notificacion SET estado_notificacion='limpio' WHERE id_usuario='$id'";
        $respuesta = mysqli_query($mysqli, $sql);

        if (!$respuesta) {
            echo 1;
            return;
        } else {
            echo 2;
            return;
        }
    } else {
        echo 4;
        return;
    }
} else {
    echo 3; //No se recibieron parámetros
    return;
}

mysqli_close($mysqli);
