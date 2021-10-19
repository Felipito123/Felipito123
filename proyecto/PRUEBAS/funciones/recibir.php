<?php

if (isset($_POST['nombre_hijo'])) {
    $contador = count($_POST['nombre_hijo']);

    $i = 0;

    $vivesconellos = json_decode($_POST['vivesconellos']);

    while ($i < $contador) {
        echo " Nombre: " . $_POST['nombre_hijo'][$i] . " Edad: " . $_POST['edad_hijo'][$i]. " Vives con ellos: ".$vivesconellos[$i];

        $i++;
    }
    // $contar = count($_POST['nombre_hijo']);
    // echo $contar;
    // echo $_POST['nombre_hijo'];
    return;
} else {
    echo 'no existe';
    return;
}

// if (isset($_POST['viveconhijo'])) {
//     $contador = count($_POST['viveconhijo']);
// }else{
//     $contador=0;
// }
// echo $contador;
// return;

