<?php
include '../../conexion/conexion.php';
include '../../funcionesphp/limpiarCampo.php';
date_default_timezone_set("America/Santiago");
setlocale(LC_TIME, "spanish");
$fechadehoy = strftime("%F");

if (isset($_POST['contacto_nombre']) && isset($_POST['contacto_correo']) && isset($_POST['contacto_telefono']) && isset($_POST['contacto_asunto']) && isset($_POST['contacto_descripcion'])) {

    $contacto_nombre = sololetras($_POST['contacto_nombre']);
    $contacto_correo = solocorreo($_POST['contacto_correo']);
    $contacto_telefono = solotelefono($_POST['contacto_telefono']);
    $contacto_asunto = numerosyletras($_POST['contacto_asunto']);
    $contacto_descripcion = soloCaractDeConversacion($_POST['contacto_descripcion']);

    if (validavacioenarreglo(array($contacto_nombre, $contacto_correo, $contacto_telefono, $contacto_asunto, $contacto_descripcion))) {
        echo 9;
        return;
    }

    if (strlen($contacto_nombre) < 2 || strlen($contacto_nombre) > 50) {
        echo 4;
        return;
    }

    if (strlen($contacto_correo) < 11 || strlen($contacto_correo) > 100) {
        echo 5;
        return;
    }

    if (!filter_var($contacto_correo, FILTER_VALIDATE_EMAIL)) {
        echo 3;
        return;
    }

    if (strlen($contacto_telefono) < 9 || strlen($contacto_telefono) > 13) {
        echo 6;
        return;
    }

    if (strlen($contacto_asunto) < 2 || strlen($contacto_asunto) > 60) {
        echo 7;
        return;
    }

    if (strlen($contacto_descripcion) < 2 || strlen($contacto_descripcion) > 10000) {
        echo 8;
        return;
    }

    $consulta = "INSERT INTO contacto (id_contacto,nombre_contacto,correo_contacto,telefono_contacto,asunto_contacto,descripcion_contacto,fecha_contacto) VALUES (NULL,'$contacto_nombre','$contacto_correo','$contacto_telefono','$contacto_asunto','$contacto_descripcion','$fechadehoy')";
    $res = mysqli_query($mysqli, $consulta);
    if (!$res) {
        echo 0; //Error en la consulta
        return;
    } else {
        echo 1;  //Consulta exitosa
        return;
    }
} else {
    echo 2; //No se ha recibido el parametro desde categorias.js (#formCategoria)
    return;
}

mysqli_close($mysqli);
