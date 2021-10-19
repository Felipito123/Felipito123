<?php
session_start();
include '../conexion/conexion.php';

$rut = $_SESSION['sesionCESFAM']['rut'];
$respuestadesesioncerrada = mysqli_query($mysqli, "UPDATE usuario SET enlinea_usuario='0' WHERE rut='$rut'");

if ($respuestadesesioncerrada) {
    unset($_SESSION["sesionCESFAM"]);
    header("location:../login/");
} else {
    echo '<script>alert("Error al cerrar sesion");window.location.href="../login/";</script>';
}

// session_destroy();
// session_unset();
