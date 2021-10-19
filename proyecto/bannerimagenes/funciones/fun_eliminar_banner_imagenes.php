<?php
require '../../conexion/conexion.php';
include '../../funcionesphp/limpiarCampo.php';
include '../../funcionesphp/borrarcarpeta.php';

if (isset($_POST['ID_BAN_IMG'])) {
    $ID = solonumeros($_POST['ID_BAN_IMG']);

    if (validavacioenarreglo(array($ID))) {
        echo 4;
        return;
    }
    //DELETE FROM tabla WHERE id = 3 AND EXISTS(SELECT id FROM tabla WHERE id = 3 LIMIT 1)
    $sql = "DELETE FROM banner_imagenes WHERE id_ban_imagenes='$ID'";

    $res = mysqli_query($mysqli, $sql);

    if (!$res) {
        echo 2;
        return;
    } else {
        echo 1;
        borrarcarpeta('../banimg/' . $ID);  //Borra la carpeta con el id 
        return;
    }
} else {
    echo 3;
    return;
}
mysqli_close($mysqli);
