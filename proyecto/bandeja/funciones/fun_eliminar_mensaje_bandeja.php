<?php
require '../../conexion/conexion.php';
include '../../funcionesphp/limpiarCampo.php';

if (isset($_POST['ID_CONTACTO'])) {
    $ID = solonumeros($_POST['ID_CONTACTO']);

    if (validavacioenarreglo(array($ID))) {
        echo 4;
        return;
    }

    $sql = "DELETE FROM contacto WHERE id_contacto='$ID'";
    $res = mysqli_query($mysqli, $sql);

    if (!$res) {
        echo 2;
        return;
    } else {
        echo 1;
        return;
    }
} else {
    echo 3;
    return;
}

mysqli_close($mysqli);
