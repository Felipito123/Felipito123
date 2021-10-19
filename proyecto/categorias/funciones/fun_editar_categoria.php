<?php
require '../../conexion/conexion.php';
include '../../funcionesphp/limpiarCampo.php';


if (isset($_POST['ID_CATEGORIA']) && isset($_POST['NOMBRE_CATEGORIA'])) {
    $ID_CATEGORIA = solonumeros($_POST['ID_CATEGORIA']);
    $NOMBRE_CATEGORIA = sololetras($_POST['NOMBRE_CATEGORIA']);


    if (validavacioenarreglo(array($ID_CATEGORIA, $NOMBRE_CATEGORIA))) {
        echo 1;
        return;
    } else {
        $sql = "SELECT count(nombre_categoria_articulo) as contador FROM categoria_articulo WHERE nombre_categoria_articulo='$NOMBRE_CATEGORIA' ";
        $consulta1 = mysqli_query($mysqli, $sql);
        $resultado = mysqli_fetch_assoc($consulta1);

        if ($resultado['contador'] >= 1) {
            echo 2;  //Existe una categoria con el mismo nombre
            return;
        } else {
            $sql1 = "UPDATE categoria_articulo SET nombre_categoria_articulo='$NOMBRE_CATEGORIA' WHERE id_categoria_articulo='$ID_CATEGORIA'";
            $resultado2 = mysqli_query($mysqli, $sql1);

            if (!$resultado2) {
                echo 3;
                return;
            } else {
                echo 4;
                return;
            }
        }
    }
} else {
    echo 5; //No se han recibido los datos desde categoria.js, especificamente  $(document).on("click", ".btnEditar", function () {
    return;
}

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
