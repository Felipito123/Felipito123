<?php
require '../../conexion/conexion.php';
include '../../funcionesphp/limpiarCampo.php';
include '../../funcionesphp/borrarcarpeta.php';

if (isset($_POST['id_banner_imagenes']) && isset($_POST['link_banner_imagenes'])) {

    $id_banner_imagenes = solonumeros($_POST['id_banner_imagenes']);
    $link_banner_imagenes = sololink($_POST['link_banner_imagenes']); //No lo limpio porque necesito el link con los slash y puntos

    if (validavacioenarreglo(array($id_banner_imagenes, $link_banner_imagenes))) {
        echo 8;
        return;
    }

    if (strlen($link_banner_imagenes) < 2 || strlen($link_banner_imagenes) > 200) {
        echo 9;
        return;
    }

    $verificar_imagen;

    if ($_FILES["archivo_banner_imagenes"]['type'] == null) {
        $verificar_imagen = false;
    } else {
        $archivo = $_FILES["archivo_banner_imagenes"];
        $nombre_imagen = $archivo['name'];
        $tipo = $archivo['type'];
        $tamañoimagen = $archivo['size'];
        $verificar_imagen = true;

        if ($tamañoimagen > 20971520) { //Tamaño excedido de 20 MB
            echo 1; //Se excedio 
            die();
        }
    }


    if (!$verificar_imagen) { //EDITA SIN LA IMAGEN

        $sql_Existe_link = "SELECT count(link_ban_imagenes) as contador FROM banner_imagenes WHERE link_ban_imagenes='$link_banner_imagenes' and id_ban_imagenes!='$id_banner_imagenes'";
        $consulta_Existe_link = mysqli_query($mysqli, $sql_Existe_link);
        $resultado_Existe_link = mysqli_fetch_assoc($consulta_Existe_link);

        if ($resultado_Existe_link['contador'] >= 1) {
            echo 10;  //Existe una imagen con ese mismo link
            return;
        } else {
            $sql1 = "UPDATE banner_imagenes SET link_ban_imagenes='$link_banner_imagenes' WHERE id_ban_imagenes='$id_banner_imagenes'";
            $resultado_2 = mysqli_query($mysqli, $sql1); //Hasta aqui edito un banner_imagen 

            if (!$resultado_2) {
                echo 2; //Error al editar imagen
                die("error:" . mysqli_error($mysqli));
            } else {
                echo 3; //Se edito correctamente
                return;
            }
        }
    } else {

        //Formato
        if ($tipo == "image/jpg" || $tipo == "image/png" || $tipo == "image/jpeg" || $tipo == "image/JPG" || $tipo == "image/PNG" || $tipo == "image/JPEG") {

            $sql_Existe_link = "SELECT count(link_ban_imagenes) as contador FROM banner_imagenes WHERE link_ban_imagenes='$link_banner_imagenes' and id_ban_imagenes!='$id_banner_imagenes'"; //Pero que sea distinto a este ID ORIGINAL
            $consulta_Existe_link = mysqli_query($mysqli, $sql_Existe_link);
            $resultado_Existe_link = mysqli_fetch_assoc($consulta_Existe_link);

            $sql_Existe_imagen = "SELECT count(nombre_ban_imagenes) as contador FROM banner_imagenes WHERE nombre_ban_imagenes='$nombre_imagen' and id_ban_imagenes!='$id_banner_imagenes'";
            $consulta_Existe_imagen = mysqli_query($mysqli, $sql_Existe_imagen);
            $resultado_Existe_imagen = mysqli_fetch_assoc($consulta_Existe_imagen);

            if ($resultado_Existe_link['contador'] >= 1) {
                echo 10;  //Existe una categoria con el mismo nombre
                return;
            } else if ($resultado_Existe_imagen['contador'] >= 1) {
                echo 11;  //Existe una categoria con el mismo nombre
                return;
            } else {
                $sql2 = "UPDATE banner_imagenes SET link_ban_imagenes='$link_banner_imagenes', nombre_ban_imagenes='$nombre_imagen' WHERE id_ban_imagenes='$id_banner_imagenes'";
                $resultado_3 = mysqli_query($mysqli, $sql2); //Hasta aqui edito un banner_imagen 

                if (!$resultado_3) {
                    echo 4; //Error al editar imagen
                    die("error:" . mysqli_error($mysqli));
                } else {

                    if (!is_dir('../banimg/' . $id_banner_imagenes . '/')) { //Si no existe el directorio 
                        mkdir('../banimg/' . $id_banner_imagenes . '/', 0777, true); //lo crea
                        move_uploaded_file($archivo['tmp_name'], '../banimg/' . $id_banner_imagenes . '/' . $nombre_imagen);
                    } else {
                        // BORRA PORQUE SINO, SE VA ACUMULANDO LAS IMÁGENES EN LA CARPETA, ENTONCES PARA AHORRAR ESPACIO Y TAMAÑO

                        borrarcarpeta('../banimg/' . $id_banner_imagenes);  //Borra la carpeta con el id 
                        mkdir('../banimg/' . $id_banner_imagenes . '/', 0777, true); //la vuelve a crear
                        move_uploaded_file($archivo['tmp_name'], '../banimg/' . $id_banner_imagenes . '/' . $nombre_imagen); //inserta la imagen
                    }
                    echo 5; //Se edito correctamente
                    return;
                }
            }
        } else {
            echo 6; //El formato de la imagen no es válido
            return;
            // die();
        }
    }
} else {
    echo 7; //No se ha recibido el parametro desde banner_imagenes.js (#formBannerImagen)
    return;
    // die();
}

mysqli_close($mysqli);
