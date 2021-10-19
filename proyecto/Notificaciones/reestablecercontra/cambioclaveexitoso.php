<?php
include 'mensaje2.php';
if (isset($_POST['correoencriptado'])) {
    $correodelolvidado = $_POST['correoencriptado'];
    $para = $correodelolvidado;
    $asunto = 'Cambio de contraseña exitoso';   //asunto  
    $cabeceras = 'From: Equipo Salud Los Álamos<saludlosalamos@gmail.com>' . "\r\n";
    $cabeceras .= 'MIME-Version: 1.0' . "\r\n";
    $cabeceras .= 'Content-type: text/html; charset=utf-8' . "\r\n";

    mail($para, $asunto, $mensaje, $cabeceras);
    echo 1;
    return;
}
else{
  echo 2;
  return;
}
