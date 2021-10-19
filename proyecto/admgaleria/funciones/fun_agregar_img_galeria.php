<?php
include '../../conexion/conexion.php';
include '../../funcionesphp/limpiarCampo.php';
session_start();
$rutusuario = $_SESSION["sesionCESFAM"]["rut"];


// if (isset($_FILES["imagengaleria"]["name"])) {
//     $contar = count($_FILES["imagengaleria"]["tmp_name"]);
//     $estado = 0;
//     $imagen = json_encode($_FILES["imagengaleria"]["name"]);

//     if (!empty($_FILES["imagengaleria"]["name"]) && str_contains($imagen, '.')) {
//         //Primero valido que todos los archivos son del formato inicializado, es decir, jpg, jpeg, png, bmp, pdf
//         for ($i = 0; $i < $contar; $i++) {
//             $tipo = $_FILES["imagengaleria"]["type"][$i];
//             /*EN ESTE LINK SE SABE TODOS LOS MIME TYPE DE LOS ARCHIVOS  https://www.php.net/manual/es/function.mime-content-type.php*/
//             if (!($tipo == "image/jpg" || $tipo == "image/png" || $tipo == "image/jpeg" ||
//                 $tipo == "image/JPG" || $tipo == "image/PNG" || $tipo == "image/JPEG" || $tipo == "image/bmp" ||
//                 $tipo == "application/pdf" || $tipo == "text/plain")) {
//                 echo 2; //valido previamente si cumple con el formato en caso de que contenga una extension "."
//                 return;
//             }

//             echo $imagen;
//         }
//     }
//     // echo "Contador: ".$contar;
//     // var_dump($_FILES);
//     // return;
// }

if (isset($_FILES["imagengaleria"]["name"])) {
    $contar = count($_FILES["imagengaleria"]["tmp_name"]);
    $estado = 0;

        // echo "Contador: ".$contar;
        // var_dump($_FILES);
        // return;

    //Primero valido que todos los archivos son del formato imagen
    for ($i = 0; $i < $contar; $i++) { 
        $tipo = $_FILES["imagengaleria"]["type"][$i];

        if($tipo==''){
            echo 4;
            return;
        }
        if (!($tipo == "image/jpg" || $tipo == "image/png" || $tipo == "image/jpeg" || $tipo == "image/JPG" || $tipo == "image/PNG" || $tipo == "image/JPEG")) {
            echo 5;
            return;
        }
    }

    for ($i = 0; $i < $contar; $i++) {
        $nombre = $_FILES["imagengaleria"]["name"][$i];
        $sql1 = "INSERT INTO galeria (id_galeria, archivo_galeria,titulo_galeria,estado_galeria,rut) VALUES (NULL,'$nombre','','$estado',$rutusuario)";
        $resultado = mysqli_query($mysqli, $sql1);
        if (!$resultado) {
            echo mysqli_error($mysqli);
            return;
        } else {
            $sql2 = "SELECT MAX(id_galeria) AS identificador FROM galeria"; //Muestro el último articulo insertado en la consulta anterior
            $resultado_3 = mysqli_query($mysqli, $sql2);

            if (!$resultado_3) {
                echo 1; //Error al mostrar el último id
                return;
            } else {
                while ($fila = mysqli_fetch_array($resultado_3)) {
                    $id_articulo = $fila["identificador"];
                    if (!is_dir('../../pgaleria/galeria/' . $id_articulo . '/')) { //Si no existe el directorio 
                        mkdir('../../pgaleria/galeria/' . $id_articulo . '/', 0777, true); //lo crea
                        move_uploaded_file($_FILES["imagengaleria"]['tmp_name'][$i], '../../pgaleria/galeria/' . $id_articulo . '/' . $nombre);
                    } else {
                        move_uploaded_file($_FILES["imagengaleria"]['tmp_name'][$i], '../../pgaleria/galeria/' . $id_articulo . '/' . $nombre);
                    }
                }
            }
        }
    } /*Fin del for*/
    echo 2;
} else {
    echo 3;
}
