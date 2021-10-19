<?php
include '../../conexion/conexion.php';
include '../../funcionesphp/limpiarCampo.php';
include '../../funcionesphp/borrarcarpeta.php';
session_start();
$rutusuario = $_SESSION["sesionCESFAM"]["rut"];

$seleccion = $_POST['seleccionar'];

if (isset($seleccion)) {

    if ($seleccion == 1) {

        if (isset($_POST["firmabase64"])) {

            $firma = $_POST["firmabase64"];

            $direccion = "../../perfil/firmas/" . $rutusuario . '/';


            if (validavacioenarreglo(array($firma))) {
                echo 1;
                return;
            } else {

                $sql1 = "UPDATE usuario SET firma_usuario='firma.png' WHERE rut='$rutusuario'";
                $respuesta1 = mysqli_query($mysqli, $sql1);

                if (!$respuesta1) { //hubo error en la consulta sql2
                    echo 2;
                    return;
                } else {

                    if (!is_dir($direccion)) { //Si no existe el directorio 
                        mkdir($direccion, 0777, true); //lo crea (OJO EL TRUE ES IMPORTANTE EN EL MKDIR)
                    } else {
                        // BORRA PORQUE SINO, SE VA ACUMULANDO LAS IMÁGENES EN LA CARPETA, ENTONCES PARA AHORRAR ESPACIO Y TAMAÑO
                        borrarcarpeta('../../perfil/firmas/' . $rutusuario);  //Borra la carpeta con el id 
                        mkdir($direccion, 0777, true); //la vuelve a crear
                    }

                    $image_parts = explode(";base64,", $firma);
                    $image_type_aux = explode("image/", $image_parts[0]);
                    $image_type = $image_type_aux[1];
                    $image_base64 = base64_decode($image_parts[1]);
                    $file = $direccion . 'firma' . '.' . $image_type;
                    file_put_contents($file, $image_base64);

                    echo 3;
                    return;
                }
            }
        } else {
            echo 4;
            return;
        }
    } else if ($seleccion == 2) {

        $imagen = $_FILES["file"]["type"];
        $ruta = "../../perfil/firmas/" . $rutusuario . '/';

        $pixeles = getimagesize($_FILES["file"]["tmp_name"]);
        $ancho = $pixeles[0];
        $alto = $pixeles[1];

        if (validavacioenarreglo(array($imagen))) {
            echo 1;
            return;
        } else {
            $archivo = $_FILES["file"];
            $nombre_imagen = $archivo['name'];
            $tipo = $archivo['type'];
            $tamañoimagen = $archivo['size'];

            if ($tamañoimagen > 20971520) { //Tamaño excedido de 20 MB
                echo 2; //Se excedio 
                return;
            }

            if ($ancho < 430) {
                echo 3;
                return;
            } else if ($alto < 290) {
                echo 4;
                return;
            } else {

                if ($tipo == "image/png" || $tipo == "image/PNG") {

                    $sql2 = "UPDATE usuario SET firma_usuario='$nombre_imagen' WHERE rut='$rutusuario'";
                    $respuesta2 = mysqli_query($mysqli, $sql2);

                    if (!$respuesta2) { //hubo error en la consulta sql2
                        echo 5;
                        return;
                    } else {

                        if (!is_dir($ruta)) { //Si no existe el directorio 
                            mkdir($ruta, 0777, true); //lo crea (OJO EL TRUE ES IMPORTANTE EN EL MKDIR)
                        } else {
                            // BORRA PORQUE SINO, SE VA ACUMULANDO LAS IMÁGENES EN LA CARPETA, ENTONCES PARA AHORRAR ESPACIO Y TAMAÑO
                            borrarcarpeta($ruta);  //Borra la carpeta con el id 
                            mkdir($ruta, 0777, true); //la vuelve a crear
                        }
                        move_uploaded_file($archivo['tmp_name'], $ruta . $nombre_imagen); //inserta la imagen

                        echo 6; //Firma subida exitosamente
                        return;
                    }
                } else {
                    echo 7; //no tiene formato de una imagen
                    return;
                }
            }
        }
    } else if ($seleccion == 3) {
        // header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
        $sql1 = "SELECT firma_usuario FROM usuario WHERE rut='$rutusuario'";
        $respuesta1 = mysqli_query($mysqli, $sql1);

        if (!$respuesta1) {
            echo 1;
            return;
        } else {
            $fila1 = mysqli_fetch_assoc($respuesta1);
            echo $rutusuario . '/' . $fila1['firma_usuario'];
        }
    } else {
        echo 444;
        return;
    }
} else {
    echo 500;
    return;
}

mysqli_close($mysqli);
