<?php
require '../../conexion/conexion.php';
include '../../funcionesphp/limpiarCampo.php';


if (isset($_POST['NMB_CAT'])) {
    $NOMBRE_CATEGORIA = sololetras($_POST['NMB_CAT']);
    $sql = "SELECT count(nombre_categoria_articulo) as contador FROM categoria_articulo WHERE nombre_categoria_articulo='$NOMBRE_CATEGORIA' ";
    $consulta1 = mysqli_query($mysqli, $sql);
    $resultado = mysqli_fetch_assoc($consulta1);

    if ($resultado['contador'] >= 1) {
        echo 1;  //Existe una categoria con el mismo nombre
        return;
    } else {
        echo 2;
        return;
    }
} else {
    echo 3;
    return;
}


mysqli_close($mysqli);