<?php
include '../../conexion/conexion.php';

date_default_timezone_set("America/Santiago");
setlocale(LC_TIME, "spanish");
$fechadehoy = strftime("%Y-%m-%d");
$horaactual = strftime("%H:%M:%S");
$diaactual = strftime("%Y-%m-%d");
/*$minutoAnadir=0; 
$horaInicial_ensegundos=strtotime($horaactual);
$duracion_minutosAnadir=$minutoAnadir*60;
$horafinalDB=date("H:i:s",$horaInicial_ensegundos+$duracion_minutosAnadir);
echo "<br>".$horafinalDB;*/

if (isset($_POST['tipoBTN']) && !empty($_POST['tipoBTN'])) {

    if ($_POST['tipoBTN'] == 3) {

        $sql2 = "UPDATE reunion SET estado_reunion='finalizada' WHERE estado_reunion!='finalizada' and fecha_con_formato < '$fechadehoy'";
        $resultado = mysqli_query($mysqli, $sql2);

        if (!$resultado) {
            echo 1;
            return;
        } else {
            echo 2;
            return;
        }
        // if ($_POST['tipoBTN'] == 3) {

        //     $sql = "SELECT id_reunion, fecha_reunion, duracion_reunion FROM reunion WHERE estado_reunion!='finalizada'";
        //     $el = mysqli_query($mysqli, $sql);

        //     $cantidad = mysqli_num_rows($el);

        //     if ($cantidad > 0) {

        //         while ($fila = mysqli_fetch_array($el)) {
        //             $id = $fila["id_reunion"];
        //             $porciones = explode("T", $fila["fecha_reunion"]); // use el explote para separar la hora de la fecha

        //             $minutoAnadir = $fila["duracion_reunion"];
        //             $horaInicial_ensegundos = strtotime($porciones[1]);
        //             $duracion_minutos = $minutoAnadir * 60;
        //             $horaDB = date("H:i:s", $horaInicial_ensegundos + $duracion_minutos);

        //             //echo "<br>" . 'Hora DB: ' . $horaDB;

        //             $HDB = strtotime($horaDB);
        //             $HA = strtotime($horaactual);

        //             if ($HA > $HDB && $porciones[0] == $diaactual) { //Si la hora actual $HA es mayor a la hora de la base de datos $HDB (hora BD + duración) quiere decir que ya finalizo la reunión
        //                 $sql2 = "UPDATE reunion SET estado_reunion='finalizada' WHERE id_reunion='$id' and (estado_reunion='pendiente' or estado_reunion='activo')";
        //                 $resultado = mysqli_query($mysqli, $sql2);

        //                 if (!$resultado) {
        //                     echo 1;
        //                     return;
        //                 } else {
        //                     echo 2;
        //                     return;
        //                 }
        //             } else {
        //                 echo 3;
        //                 return;
        //             }
        //         }
        //     } else {
        //         echo 4;
        //         return;
        //     }
        // } else {
        //     echo 5;
        //     return;
        // }
    } else {
        echo 3;
        return;
    }
} else {
    echo 4; // No se ha recibio parámetros
    return;
}
mysqli_close($mysqli);
