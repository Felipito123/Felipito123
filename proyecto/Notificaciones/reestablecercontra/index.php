<?php
/*OJO en el php/php.ini de xampp y en el sendmail/sendmail.ini, tengo configurado el correo assistwebubb@gmail.com si la cabecera de este archivo
 cambia el correo hay que cambiarlo tambien del localhost para que funcione (debe coincidir el from de aqui con el del sendmail.ini y php.ini)*/
include '../../conexion/conexion.php';
date_default_timezone_set("America/Santiago");
setlocale(LC_TIME, "spanish");
$fechacompleta = strftime("%F %H:%M:%S");

if (isset($_POST['correo'])) {
    $correo = $_POST['correo'];
    $consulta = mysqli_query($mysqli, "SELECT * FROM usuario WHERE correo_usuario='$correo'") or die(mysqli_error($mysqli));
    $contador = mysqli_num_rows($consulta);
    $fila = mysqli_fetch_array($consulta);
    // $correodelolvidado = $fila['correo'];

    if(isset($fila['correo_usuario']) && $fila['correo_usuario']!=null){
      $correodelolvidado = $fila['correo_usuario'];
    }

    if ($contador > 0) { //Si existe un correo igual al enviado en la consulta

        $para = $correodelolvidado;
        $asunto = 'Restablecer Contraseña';   //asunto  
        $cabeceras = 'From: Equipo Salud Los Álamos<saludlosalamos@gmail.com>' . "\r\n";

        $cabeceras .= 'MIME-Version: 1.0' . "\r\n";
        $cabeceras .= 'Content-type: text/html; charset=utf-8' . "\r\n";

        include 'mensaje1.php';

        mail($para, $asunto, $mensaje, $cabeceras);

        $verifica_correo_de_funcionario = mysqli_query($mysqli, "UPDATE usuario SET reestablecimiento='$fechacompleta' WHERE correo_usuario='$correo'");
        
        echo 1;
        return;
    } else {
        echo 2;
        return;
    }
} else {
    echo 3; //No se han recibido parámetros
    return;
}
