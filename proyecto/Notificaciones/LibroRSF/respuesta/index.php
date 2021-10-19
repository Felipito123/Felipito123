<?php
/*OJO en el php/php.ini de xampp y en el sendmail/sendmail.ini, tengo configurado el correo assistwebubb@gmail.com si la cabecera de este archivo
 cambia el correo hay que cambiarlo tambien del localhost para que funcione (debe coincidir el from de aqui con el del sendmail.ini y php.ini)*/

date_default_timezone_set("America/Santiago");
setlocale(LC_TIME, "spanish");
$fechahoy = strftime("%x"); // strftime("%F") = Ej: 2021-07-02 , strftime("%x") = 02/07/2021
$anoactual = strftime("%Y");



if (
    isset($_POST['fecha_registro']) && isset($_POST['tipo_solicitud']) && isset($_POST['rut']) && isset($_POST['nacionalidad']) && isset($_POST['nacionalidad']) && isset($_POST['pueblos_indigenas']) && isset($_POST['nombre'])
    && isset($_POST['apellido_paterno']) && isset($_POST['apellido_materno']) && isset($_POST['edad']) && isset($_POST['correo']) && isset($_POST['telefono'])
    && isset($_POST['institucion']) && isset($_POST['area']) && isset($_POST['descripcion']) && isset($_POST['quienredacta']) && isset($_POST['cargoquienredacta'])
    && isset($_POST['fecharespuestafuncionario']) && isset($_POST['comentariorespuesta'])
) { //se recibe del post
    
    $fecha_registro =       $_POST['fecha_registro'];
    $rut =                  $_POST['rut'];
    $nacionalidad =         $_POST['nacionalidad'];
    $nombre =               $_POST['nombre'];
    $pueblos_indigenas =    $_POST['pueblos_indigenas'];
    $apellido_paterno =     $_POST['apellido_paterno'];
    $apellido_materno =     $_POST['apellido_materno'];
    $edad =                 $_POST['edad'];
    $telefono =             $_POST['telefono'];
    $institucion =          $_POST['institucion'];
    $area =                 $_POST['area'];
    $descripcion =          $_POST['descripcion'];
    $quienredacta =         $_POST['quienredacta'];
    $cargoquienredacta =    $_POST['cargoquienredacta'];
    $fecharespuestafuncionario = $_POST['fecharespuestafuncionario'];
    $comentariorespuesta =       $_POST['comentariorespuesta'];
    $correo = $_POST['correo'];
    $tiposolicitud = strtoupper($_POST['tipo_solicitud']);

    $para = $correo;
    $asunto = '[Comprobante] Libro RSF';   //asunto  
    $cabeceras = 'From: no-reply@saludlosalamos.cl <no-reply@saludlosalamos.cl>' . "\r\n"; //<no-reply@saludlosalamos.cl>

    $cabeceras .= 'MIME-Version: 1.0' . "\r\n";
    $cabeceras .= 'Content-type: text/html; charset=utf-8' . "\r\n";

    include 'mensaje.php';

    mail($para, $asunto, $mensaje, $cabeceras);
    echo 1;
    return;
} else {
    echo 2; //No se han recibido parámetros
    return;
}
