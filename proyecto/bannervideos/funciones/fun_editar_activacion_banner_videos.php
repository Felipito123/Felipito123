<?php 
require '../../conexion/conexion.php';
include '../../funcionesphp/limpiarCampo.php';

if (isset($_POST['idbtn']) && isset($_POST['tipoBTN'])) {

    if ($_POST['tipoBTN'] == 1) { //Activado
        $idbtn = solonumeros($_POST['idbtn']);

        if (validavacioenarreglo(array($idbtn))) {
            echo 1;
            return;
        }
        $sqlconsulta = mysqli_query($mysqli, "SELECT nombre_ban_videos FROM banner_videos WHERE id_ban_videos='$idbtn' and estado_ban_videos=1") or die(mysqli_error($mysqli));
        $contador = mysqli_num_rows($sqlconsulta);

        if ($contador >= 1) {
            echo 2;
            return;
        }

        $sqlactivar = "UPDATE banner_videos set estado_ban_videos=1 WHERE id_ban_videos='$idbtn'";
        $res = mysqli_query($mysqli, $sqlactivar);
        
        if (!$res) {
            echo 3; //error en la consulta
            return;
        }

        echo 4; //Exito
        return;

    } else if ($_POST['tipoBTN'] == 2) {
        $idbtn = solonumeros($_POST['idbtn']);

        if (validavacioenarreglo(array($idbtn))) {
            echo 1;
            return;
        }
        $sqlconsulta2 = mysqli_query($mysqli, "SELECT nombre_ban_videos FROM banner_videos WHERE id_ban_videos='$idbtn' and estado_ban_videos=0") or die(mysqli_error($mysqli));
        $contador = mysqli_num_rows($sqlconsulta2);

        if ($contador >= 1) {
            echo 2;
            return;
        }

        $sqlInactivo = "UPDATE banner_videos set estado_ban_videos=0 WHERE id_ban_videos='$idbtn'";
        $res = mysqli_query($mysqli, $sqlInactivo);

        if (!$res) {
            echo 3; //error en la consulta
            return;
        }

        echo 4; //Exito
        return;
    }
}
else{
    echo 5;
    return;
}
mysqli_close($mysqli);
