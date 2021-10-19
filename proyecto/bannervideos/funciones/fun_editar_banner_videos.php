
<?php
require '../../conexion/conexion.php';
include '../../funcionesphp/limpiarCampo.php';
include '../../funcionesphp/borrarcarpeta.php';

if (isset($_POST['id_banner_videos']) && isset($_POST['titulo_banner_videos']) && isset($_FILES["archivo_banner_videos"]["name"])) {

    $id_banner_videos = solonumeros($_POST['id_banner_videos']);
    $titulo_banner_videos = bannerVideos($_POST['titulo_banner_videos']); //No lo limpio porque necesito el link con los slash y puntos

    if (validavacioenarreglo(array($id_banner_videos, $titulo_banner_videos))) {
        echo 8;
        return;
    }

    if (strlen($titulo_banner_videos) < 2 || strlen($titulo_banner_videos) > 55) {
        echo 9;
        return;
    }

    $verificar_video;
    if ($_FILES["archivo_banner_videos"]['type'] == null) {
        $verificar_video = false;
    } else {
        $archivo = $_FILES["archivo_banner_videos"];
        $nombre_video = $archivo['name'];
        $tipo = $archivo['type'];
        $tamañovideo = $archivo['size'];
        $verificar_video = true;

        //5964291 5,68MB
        if ($tamañovideo > 41943040) { //Tamaño excedido de 40 MB
            echo 1; //Se excedio 
            return;
        }
    }
    if (!$verificar_video) {

        $sql_Existe_titulo = "SELECT count(titulo_ban_videos) as contador FROM banner_videos WHERE titulo_ban_videos='$titulo_banner_videos'";
        $consulta_Existe_titulo = mysqli_query($mysqli, $sql_Existe_titulo);
        $resultado_Existe_titulo = mysqli_fetch_assoc($consulta_Existe_titulo);

        if ($resultado_Existe_titulo['contador'] >= 1) {
            echo 10;  //Existe un banner de video con el mismo titulo
            return;
        } else {
            $sql1 = "UPDATE banner_videos SET titulo_ban_videos='$titulo_banner_videos' WHERE id_ban_videos='$id_banner_videos'";
            $resultado_2 = mysqli_query($mysqli, $sql1); //Hasta aqui edito un banner_videos

            if (!$resultado_2) {
                echo 2; //Error al editar videos
                die("error:" . mysqli_error($mysqli));
            } else {
                echo 3; //Se edito correctamente
                return;
            }
        }
    } else {
        //Formato
        if ($tipo == "video/mp4") {

            if (validavacioenarreglo(array($archivo))) {
                echo 8;
                return;
            }

            $sql_Existe_titulo = "SELECT count(titulo_ban_videos) as contador FROM banner_videos WHERE titulo_ban_videos='$titulo_banner_videos'";
            $consulta_Existe_titulo = mysqli_query($mysqli, $sql_Existe_titulo);
            $resultado_Existe_titulo = mysqli_fetch_assoc($consulta_Existe_titulo);

            $sql_Existe_video = "SELECT count(nombre_ban_videos) as contador FROM banner_videos WHERE nombre_ban_videos='$nombre_video'";
            $consulta_Existe_video = mysqli_query($mysqli, $sql_Existe_video);
            $resultado_Existe_video = mysqli_fetch_assoc($consulta_Existe_video);

            if ($resultado_Existe_titulo['contador'] >= 1) {
                echo 10;  //Existe un video con el mismo titulo
                return;
            } else if ($resultado_Existe_video['contador'] >= 1) {
                echo 11;  //Existe un video con el mismo nombre
                return;
            } else {

                $sql2 = "UPDATE banner_videos SET titulo_ban_videos='$titulo_banner_videos', nombre_ban_videos='$nombre_video' WHERE id_ban_videos='$id_banner_videos'";
                $resultado_3 = mysqli_query($mysqli, $sql2); //Hasta aqui edito un banner_videos 

                if (!$resultado_3) {
                    echo 4; //Error al editar videos
                    die("error:" . mysqli_error($mysqli));
                    return;
                } else {

                    if (!is_dir('../banvideos/' . $id_banner_videos . '/')) { //Si no existe el directorio 
                        mkdir('../banvideos/' . $id_banner_videos . '/', 0777, true); //lo crea
                        move_uploaded_file($archivo['tmp_name'], '../banvideos/' . $id_banner_videos . '/' . $nombre_video);
                    } else {
                        // BORRA PORQUE SINO, SE VA ACUMULANDO LAS IMÁGENES EN LA CARPETA, ENTONCES PARA AHORRAR ESPACIO Y TAMAÑO

                        borrarcarpeta('../banvideos/' . $id_banner_videos);  //Borra la carpeta con el id 
                        mkdir('../banvideos/' . $id_banner_videos . '/', 0777, true); //la vuelve a crear
                        move_uploaded_file($archivo['tmp_name'], '../banvideos/' . $id_banner_videos . '/' . $nombre_video); //inserta la videos
                    }
                    echo 5; //Se edito correctamente
                    return;
                }
            }
        } else {
            echo 6; //El formato de la videos no es válido
            return;
        }
    }
} else {
    echo 7; //No se ha recibido el parametro desde banner_videos.js (#formBannervideos)
    return;
}

mysqli_close($mysqli);
