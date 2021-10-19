<?php
session_start();
$seleccionar=$_POST['seleccionar'];
if (isset($seleccionar)) {
    if ($seleccionar==1) {
        foreach ($_SESSION['carrito'] as $key => $value) {
            $id = $value['id'];
            $nombre = $value['nombre'];
            $descripcion = $value['descripcion'];
            $cantidad = $value['cantidad'];
            $stocktotal = $value['stocktotal'];
            $nombreimagen = $value['nombreimagen'];

            echo "<br>\n" . "ID: " . $id .
                ", nombre: " . $nombre .
                ", descripcion: " . $descripcion .
                ", cantidad: " . $cantidad .
                ", stocktotal: " . $stocktotal .
                ", Nombre imagen: " . $nombreimagen .
                "<br>\n";
        }
        return;
    }else{
        echo 2;
        return;
    }
} else {
    echo 3;
    return;
}
