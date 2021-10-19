<?php
/*OJO en el php/php.ini de xampp y en el sendmail/sendmail.ini, tengo configurado el correo assistwebubb@gmail.com si la cabecera de este archivo
 cambia el correo hay que cambiarlo tambien del localhost para que funcione (debe coincidir el from de aqui con el del sendmail.ini y php.ini)*/

date_default_timezone_set("America/Santiago");
setlocale(LC_TIME, "spanish");
$fechaenvionotificacion = strftime("%d de %B, %Y %X"); // 04 de septiembre, 2029  %A= dia de la semana, %d= numero del dia,  %B=nombre del mes,   %Y= numero del año

include '../../conexion/conexion.php';

if (isset($_POST['correo'])) { //se recibe del post
    $correo = $_POST['correo'];
    $consulta = mysqli_query($mysqli, "SELECT r.id_reunion,
    r.rut_creador,
    us.nombre_usuario,
    r.asunto_reunion,
    r.fecha_reunion,
    r.duracion_reunion 
    FROM reunion r, usuario us
    WHERE r.rut_creador=us.rut and estado_reunion!='finalizada'
    ORDER by id_reunion DESC LIMIT 1") or die(mysqli_error($mysqli));

    if (!$consulta) {
        echo 2;
        return;
    } else {
        $contador = mysqli_num_rows($consulta);
        $fila = mysqli_fetch_array($consulta);

        if ($contador > 0) { //Hubo un error en la consulta

            $para = $correo;
            $asunto = 'Videoconferencia';   //asunto  
            $cabeceras = 'From: Equipo Salud Los Álamos<saludlosalamos@gmail.com>' . "\r\n";

            $cabeceras .= 'MIME-Version: 1.0' . "\r\n";
            $cabeceras .= 'Content-type: text/html; charset=utf-8' . "\r\n";

            //==========================================PARA EL MENSAJE==========================================//
            $porciones = explode("T", $fila["fecha_reunion"]); // Use el explote para separar la hora de la fecha
            $p2 = explode("-", $porciones[0]);
            $fechazoom = $p2[2] . '-' . $p2[1] . '-' . $p2[0]; //para enviar la fecha como 24-10-2020 , ya que en la base de datos está al revés
            $minutoAnadir = $fila["duracion_reunion"];  //DURACION REUNION
            $horaInicial = strtotime($porciones[1]);
            $duracion_minutos = $minutoAnadir * 60;
            $horainicio = $porciones[1];
            $horavencimiento = date("H:i:s", $horaInicial + $duracion_minutos);
            //==========================================PARA EL MENSAJE==========================================//

            // echo $fila["nombre_usuario"] . '<br>';
            // echo $horainicio . '<br>';
            // echo $horavencimiento. '<br>';

            include 'mensaje1.php';

            mail($para, $asunto, $mensaje, $cabeceras);
            echo 1;
            return;
        } else {
            echo 2;
            return;
        }
    }
} else {
    echo 3; //No se han recibido parámetros
    return;
}
