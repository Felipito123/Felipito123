<?php

if (isset($_FILES["juan"]["tmp_name"]) && !empty($_FILES["juan"]["tmp_name"])) {
    $contar = count($_FILES["juan"]["tmp_name"]);

    // print $_FILES["juan"]["name"];
    // echo $_FILES["juan"]["name"][0];

    for ($i = 0; $i < $contar; $i++) {
        // echo $_FILES["juan"]["name"][$i];
        $nombreimagen = $_FILES["juan"]["name"][$i];

        if (!is_dir('fotos/' . $nombreimagen)) { //Si no existe el directorio 
            mkdir('fotos/', 0777, true); //lo crea
            move_uploaded_file($_FILES["juan"]['tmp_name'][$i], 'fotos/'.$nombreimagen);
        } else {
            move_uploaded_file($_FILES["juan"]['tmp_name'][$i], 'fotos/'.$nombreimagen);
        }
    }

    // echo 'si';
} else {
    echo 'no';
}


// $contar = count($_FILES["holae"]["tmp_name"]);

// for ($i = 0; $i < $contar; $i++) {
//     $tipo = $_FILES["holae"]["name"][$i];
//     echo $tipo;
// }
