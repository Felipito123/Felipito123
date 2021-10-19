<?php
require '../../conexion/conexion.php';
include '../../funcionesphp/limpiarCampo.php';
include '../../funcionesphp/borrarcarpeta.php';

if (isset($_POST['id_img_galeria']) && isset($_POST['titulo_img_galeria'])) {

    $id_img_galeria = solonumeros($_POST['id_img_galeria']);
    $titulo_img_galeria = numerosyletras($_POST['titulo_img_galeria']); //No lo limpio porque necesito el titulo_img_galeria con los slash y puntos

    if (validavacioenarreglo(array($id_img_galeria, $titulo_img_galeria))) {
        echo 8;
        return;
    }

    if (strlen($titulo_img_galeria) < 2 || strlen($titulo_img_galeria) > 100) {
        echo 9;
        return;
    }

    $verificar_imagen;

    if ($_FILES["archivo_img_galeria"]['type'] == null) {
        $verificar_imagen = false;
    } else {
        $archivo = $_FILES["archivo_img_galeria"];
        $nombre_imagen = $archivo['name'];
        $tipo = $archivo['type'];
        $tamañoimagen = $archivo['size'];
        $verificar_imagen = true;

        if ($tamañoimagen > 5242880) { //Tamaño excedido de 5 MB
            echo 1; //Se excedio 
            return;
        }
    }


    if (!$verificar_imagen) {
        $sql1 = "UPDATE galeria SET titulo_galeria='$titulo_img_galeria' WHERE id_galeria='$id_img_galeria'";
        $resultado_2 = mysqli_query($mysqli, $sql1); //Hasta aqui edito un banner_imagen 

        if (!$resultado_2) {
            echo 2; //Error al editar imagen
            die("error:" . mysqli_error($mysqli));
            return;
        } else {
            echo 3; //Se edito correctamente
            return;
        }
    } else {

        //Formato
        if ($tipo == "image/jpg" || $tipo == "image/png" || $tipo == "image/jpeg" || $tipo == "image/JPG" || $tipo == "image/PNG" || $tipo == "image/JPEG") {


            $sql2 = "UPDATE galeria SET titulo_galeria='$titulo_img_galeria', archivo_galeria='$nombre_imagen' WHERE id_galeria='$id_img_galeria'"; //,estado_img_galeria='$estado_img_galeria'
            $resultado_3 = mysqli_query($mysqli, $sql2); //Hasta aqui edito un banner_imagen 

            if (!$resultado_3) {
                echo 4; //Error al editar imagen
                die("error:" . mysqli_error($mysqli));
                return;
            } else {

                if (!is_dir('../../pgaleria/galeria/' . $id_img_galeria . '/')) { //Si no existe el directorio 
                    mkdir('../../pgaleria/galeria/' . $id_img_galeria . '/', 0777, true); //lo crea
                    move_uploaded_file($archivo['tmp_name'], '../../pgaleria/galeria/' . $id_img_galeria . '/' . $nombre_imagen);
                } else {
                    // BORRA PORQUE SINO, SE VA ACUMULANDO LAS IMÁGENES EN LA CARPETA, ENTONCES PARA AHORRAR ESPACIO Y TAMAÑO
                    borrarcarpeta('../../pgaleria/galeria/' . $id_img_galeria);  //Borra la carpeta con el id 
                    mkdir('../../pgaleria/galeria/' . $id_img_galeria . '/', 0777, true); //la vuelve a crear
                    move_uploaded_file($archivo['tmp_name'], '../../pgaleria/galeria/' . $id_img_galeria . '/' . $nombre_imagen); //inserta la imagen
                }
                echo 5; //Se edito correctamente
                return;
            }
        } else {
            echo 6; //El formato de la imagen no es válido
            return;
        }
    }
} else {
    echo 7; //No se ha recibido el parametro desde img_galeria.js (#formBannerImagen)
    return;
}

mysqli_close($mysqli);
