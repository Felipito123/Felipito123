<?php
require '../../conexion/conexion.php';
include '../../funcionesphp/limpiarCampo.php';
include '../../funcionesphp/borrarcarpeta.php';

if (isset($_POST['ID_BAN_VID'])) {
    $ID = solonumeros($_POST['ID_BAN_VID']);

    if (validavacioenarreglo(array($ID))) {
        echo 4;
        return;
    }

    $sql = "DELETE FROM banner_videos WHERE id_ban_videos='$ID'";
    $res = mysqli_query($mysqli, $sql);

    if (!$res) {
        echo 2;
        return;
    } else {
        echo 1;
        borrarcarpeta('../banvideos/' . $ID);  //Borra la carpeta con el id 
        return;
    }
} else {
    echo 3;
    return;
}
mysqli_close($mysqli);
