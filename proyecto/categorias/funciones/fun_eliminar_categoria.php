<?php
require '../../conexion/conexion.php';

$ID_CATEGORIA = $_POST['ID_CATEGORIA'];

$sql1 = "SELECT count(C.id_categoria_articulo) as contador FROM categoria_articulo C, articulo A WHERE C.id_categoria_articulo=A.id_categoria_articulo AND 
	A.id_categoria_articulo='$ID_CATEGORIA'";

$consulta1 = mysqli_query($mysqli, $sql1);

$resultado1 = mysqli_fetch_assoc($consulta1);

if ($resultado1['contador'] != 0) {
    echo 2; //La categoria tiene un articulo, no se puede eliminar
    return;
} else {
    $sqele = "DELETE FROM categoria_articulo WHERE id_categoria_articulo='$ID_CATEGORIA'";
    if (mysqli_query($mysqli, $sqele)) {
        echo 1;
        return;
    } else {
        echo 0;
        return;
        // die();
    }
}
