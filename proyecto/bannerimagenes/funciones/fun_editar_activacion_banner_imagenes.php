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

        $sqlconsulta = mysqli_query($mysqli, "SELECT nombre_ban_imagenes FROM banner_imagenes WHERE id_ban_imagenes='$idbtn' and estado_ban_imagenes=1") or die(mysqli_error($mysqli));
        $contador = mysqli_num_rows($sqlconsulta);

        if ($contador >= 1) {
            echo 2;
            return;
        }

        $sqlactivar = "UPDATE banner_imagenes set estado_ban_imagenes=1 WHERE id_ban_imagenes='$idbtn'";
        $res = mysqli_query($mysqli, $sqlactivar);

        if (!$res) {
            echo 3; //error en la consulta
            return;
        }

        echo 4; //Exito
        return;
    } else if ($_POST['tipoBTN'] == 2) { //Inactivado
        $idbtn = solonumeros($_POST['idbtn']);

        if (validavacioenarreglo(array($idbtn))) {
            echo 1;
            return;
        }

        $sqlconsulta2 = mysqli_query($mysqli, "SELECT nombre_ban_imagenes FROM banner_imagenes WHERE id_ban_imagenes='$idbtn' and estado_ban_imagenes=0") or die(mysqli_error($mysqli));
        $contador = mysqli_num_rows($sqlconsulta2);

        if ($contador >= 1) {
            echo 2;
            return;
        }

        $sqlInactivo = "UPDATE banner_imagenes set estado_ban_imagenes=0 WHERE id_ban_imagenes='$idbtn'";
        $res = mysqli_query($mysqli, $sqlInactivo);

        if (!$res) {
            echo 3; //error en la consulta
            return;
        }

        echo 4; //Exito
        return;
    }
} else {
    echo 5;
    return;
}
mysqli_close($mysqli);
