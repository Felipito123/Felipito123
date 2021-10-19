<?php
require '../../conexion/conexion.php';
include '../../funcionesphp/limpiarCampo.php';

if (isset($_POST['categoria'])) {

    $NOMBRE_CATEGORIA = sololetras($_POST['categoria']);

    if (validavacioenarreglo(array($NOMBRE_CATEGORIA))) {
        echo 4;
        return;
    }

    $sql = "SELECT count(nombre_categoria_articulo) as contador FROM categoria_articulo WHERE nombre_categoria_articulo='$NOMBRE_CATEGORIA' ";
    $consulta1 = mysqli_query($mysqli, $sql);
    $resultado = mysqli_fetch_assoc($consulta1);

    if ($resultado['contador'] >= 1) {
        echo 2;  //Existe una categoria con el mismo nombre
        return;
    } else {

        $consulta = "INSERT INTO categoria_articulo VALUES (NULL,'$NOMBRE_CATEGORIA')";

        if (mysqli_query($mysqli, $consulta)) {
            echo 1;  //Consulta exitosa
            return;
        } else {
            echo 0;  //Error en la consulta
            return;
        }
    }
} else {
    echo 3; //No se ha recibido el parametro desde categorias.js (#formCategoria)
    die();
    return;
}

mysqli_close($mysqli);
