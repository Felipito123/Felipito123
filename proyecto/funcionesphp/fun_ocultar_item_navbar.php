<?php
require '../conexion/conexion.php';
session_start();

if (isset($_POST['opcionuno']) && $_POST['opcionuno'] == 1) { //Activado
    $sqlgal = mysqli_query($mysqli, "SELECT * FROM galeria  WHERE estado_img_galeria=1");
    $num = mysqli_num_rows($sqlgal);
    if ($num == 0) {
        echo 1;
        return;
    } else {
        echo 2;
        return;
    }
} else if (isset($_POST['opciondos']) && $_POST['opciondos'] == 2) {
    $sqlnotis = mysqli_query($mysqli, "SELECT * FROM articulo");
    $numdos = mysqli_num_rows($sqlnotis);
    if ($numdos == 0) {
        echo 3;
        return;
    } else {
        echo 4;
        return;
    }
} else if (isset($_POST['opciontres']) && $_POST['opciontres'] == 3) {
    if (isset($_SESSION['sesionCESFAM'])) {
        echo 5;
        return;
    } else {
        echo 6;
        return;
    }
}
