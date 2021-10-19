<?php
session_start();
include '../../../conexion/conexion.php';
if (
    isset($_POST['id']) && isset($_POST['nombre'])
    && isset($_POST['cantidad'])
    && isset($_POST['stocktotal'])
    && isset($_POST['imagen'])
    && isset($_POST['descripcion'])
) {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $cantidad = $_POST['cantidad'];
    $descripcion = $_POST['descripcion'];
    $stocktotal = $_POST['stocktotal'];
    $nombreimagen = $_POST['imagen'];

    $sql = "SELECT id_medicamento FROM medicamento WHERE id_medicamento='$id' and visibilidad_medicamento='1'";
    $consulta1 = mysqli_query($mysqli, $sql);
    $contar = mysqli_num_rows($consulta1);

    if ($contar >= 1) {

        if (isset($_SESSION["carrito"])) { //si existe la sesion carrito puede agregar un id

            $itemarray = array_column($_SESSION["carrito"], "id");

            //si no existe ese elemento en el array lo agrega, es parecido al echo 3, 
            //pero en ese, crea si no existe la sesion, en este caso ya existe la sesion pero no el arreglo
            if (!in_array($id, $itemarray)) {

                $valorsesion = array(
                    "id"           => $id,
                    "nombre"       => $nombre,
                    "descripcion"  => $descripcion,
                    "cantidad"     => $cantidad,
                    "stocktotal"   => $stocktotal,
                    "nombreimagen" => $nombreimagen
                );
                $_SESSION["carrito"][$id] = $valorsesion;
                echo 1;
                return;
            } else { //ya existe ese elemento en el array entonces solo aumenta la cantidad
                $stockmaximo = $_SESSION["carrito"][$id]["stocktotal"];
                $obtienevalor = $_SESSION["carrito"][$id]["cantidad"];
                $suma = $obtienevalor + $cantidad;
                if ($suma > $stockmaximo) {
                    echo 2;
                    return;
                } else {
                    $_SESSION["carrito"][$id]["cantidad"] = $obtienevalor + $cantidad;
                    echo 3;
                    return;
                }
            }
        } else {
            $valorsesion = array(
                "id"           => $id,
                "nombre"       => $nombre,
                "descripcion"  => $descripcion,
                "cantidad"     => $cantidad,
                "stocktotal"   => $stocktotal,
                "nombreimagen" => $nombreimagen
            );
            $_SESSION["carrito"][$id] = $valorsesion;
            echo 4;
            return;
        }
    } else {
        echo 6; //Este medicamento no esta disponible (Está oculto)
        return;
    }
} else {
    echo 5;
    return;
}
