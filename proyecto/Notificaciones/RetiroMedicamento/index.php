<?php
/*OJO en el php/php.ini de xampp y en el sendmail/sendmail.ini, tengo configurado el correo assistwebubb@gmail.com si la cabecera de este archivo
 cambia el correo hay que cambiarlo tambien del localhost para que funcione (debe coincidir el from de aqui con el del sendmail.ini y php.ini)*/

if (isset($_POST['correo']) && isset($_POST['fechadeagenda'])) { //se recibe del post
    $correo = $_POST['correo'];
    $fechadeagenda = $_POST['fechadeagenda'];
    $para = $correo;
    $asunto = '[Recibida ✅] Agenda Retiro de Medicamento(s)';   //asunto  
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
