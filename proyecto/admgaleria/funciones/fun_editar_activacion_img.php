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

        $sqlconsulta = mysqli_query($mysqli, "SELECT archivo_galeria FROM galeria WHERE id_galeria='$idbtn' and estado_galeria=1"); //or die(mysqli_error($mysqli)
        $contador = mysqli_num_rows($sqlconsulta);

        if ($contador >= 1) {
            echo 2;
            return;
        }

        $sqlactivar = "UPDATE galeria set estado_galeria=1 WHERE id_galeria='$idbtn'";
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

        $sqlconsulta = mysqli_query($mysqli, "SELECT archivo_galeria FROM galeria WHERE id_galeria='$idbtn' and estado_galeria=0"); //or die(mysqli_error($mysqli)
        $contador = mysqli_num_rows($sqlconsulta);

        if ($contador >= 1) {
            echo 2;
            return;
        }

        $sqlInactivo = "UPDATE galeria set estado_galeria=0 WHERE id_galeria='$idbtn'";
        $res = mysqli_query($mysqli, $sqlInactivo);

        if (!$res) {
            echo 3; //error en la consulta
            return;
        }

        echo 4; //Exito
        return;

    }
}
mysqli_close($mysqli);
?>