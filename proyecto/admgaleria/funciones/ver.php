<?php
// include '../../conexion/conexion.php';
// include '../../funcionesphp/limpiarCampo.php';
// session_start();
// $rutusuario = $_SESSION["sesionCESFAM"]["rut"];

if (isset($_FILES["imagengaleria"]["name"])) {
    $contar = count($_FILES["imagengaleria"]["name"]);
    $estado = 0;

    echo "Contador: ".$contar;
    // var_dump($_FILES);
    // echo 333;
    return;

    //Primero valido que todos los archivos son del formato imagen
    // for ($i = 0; $i < $contar; $i++) {
    //     $tipo = $_FILES["imagengaleria"]["type"][$i];

    //     if ($tipo == '') {
    //         echo 4;
    //         return;
    //     }
    //     if (!($tipo == "image/jpg" || $tipo == "image/png" || $tipo == "image/jpeg" || $tipo == "image/JPG" || $tipo == "image/PNG" || $tipo == "image/JPEG")) {
    //         echo 5;
    //         return;
    //     }
    // }
}
