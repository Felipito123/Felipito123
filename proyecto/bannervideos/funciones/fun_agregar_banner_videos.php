<?php
include '../../conexion/conexion.php';
include '../../funcionesphp/limpiarCampo.php';
session_start();
$rutusuario = $_SESSION["sesionCESFAM"]["rut"];

//Ojo los return son para que no continue a otras sentencias

if (isset($_POST['titulovideobanner']) && isset($_FILES['videobanner'])) {

    $titulovideobanner = bannerVideos($_POST['titulovideobanner']);
    $archivo = $_FILES["videobanner"];

    if (validavacioenarreglo(array($titulovideobanner, $archivo))) {
        echo 7;
        return;
    }

    if (strlen($titulovideobanner) < 2 || strlen($titulovideobanner) > 55) {
        echo 8;
        return;
    }

    $estado = 0; //Inactivo por defecto
    $nombre_video = $archivo['name'];
    $tipo = $archivo['type'];
    $tamañovideo = $archivo['size'];

    if ($tamañovideo > 41943040) { //Tamaño excedido de 40 MB   
        echo 1; //Se excedio 
        return;
    }

    // if ($_FILES["videobanner"]['type'] == null) { //lo comento porque si o si se insertara el titulo y el video
    //     $nombre_video = 'no-video.mp4';
    //     $tamañovideo = 0;
    //     $tipo = 'video/mp4';
    // } else {
    //     $archivo = $_FILES["videobanner"];
    //     $nombre_video = $archivo['name'];
    //     $tipo = $archivo['type'];
    //     $tamañovideo = $archivo['size'];

    //     if ($tamañovideo > 41943040) { //Tamaño excedido de 40 MB   
    //         echo 1; //Se excedio 
    //         die();
    //     }
    // }

    //Formato
    if ($tipo == "video/mp4") {

        $sql_Existe_titulo = "SELECT count(titulo_ban_videos) as contador FROM banner_videos WHERE titulo_ban_videos='$titulovideobanner'";
        $consulta_Existe_titulo = mysqli_query($mysqli, $sql_Existe_titulo);
        $resultado_Existe_titulo = mysqli_fetch_assoc($consulta_Existe_titulo);

        $sql_Existe_video = "SELECT count(nombre_ban_videos) as contador FROM banner_videos WHERE nombre_ban_videos='$nombre_video'";
        $consulta_Existe_video = mysqli_query($mysqli, $sql_Existe_video);
        $resultado_Existe_video = mysqli_fetch_assoc($consulta_Existe_video);

        if ($resultado_Existe_titulo['contador'] >= 1) {
            echo 9;  //Existe un video con el mismo titulo
            return;
        } else if ($resultado_Existe_video['contador'] >= 1) {
            echo 10;  //Existe un video con el mismo nombre
            return;
        } else {

            $sql1 = "INSERT INTO banner_videos (id_ban_videos,titulo_ban_videos,nombre_ban_videos,estado_ban_videos,rut) VALUES (NULL,'$titulovideobanner','$nombre_video','$estado',$rutusuario)";
            $resultado_2 = mysqli_query($mysqli, $sql1); //Hasta aqui inserto un banner_video 

            if (!$resultado_2) {
                echo 2; //Error al insertar video
                die("error " . mysqli_error($mysqli));
                return;
            } else {
                $sql2 = "SELECT MAX(id_ban_videos) AS identificador FROM banner_videos"; //Muestro el último video insertado en la consulta anterior
                $resultado_3 = mysqli_query($mysqli, $sql2);

                if (!$resultado_3) {
                    echo 3; //Error al mostrar el último id
                    return;
                } else {
                    while ($fila = mysqli_fetch_array($resultado_3)) {
                        $id_articulo = $fila["identificador"];
                    }

                    if (!is_dir('../banvideos/' . $id_articulo . '/')) { //Si no existe el directorio 
                        mkdir('../banvideos/' . $id_articulo . '/', 0777, true); //lo crea
                    }
                    move_uploaded_file($archivo['tmp_name'], '../banvideos/' . $id_articulo . '/' . $nombre_video);

                    echo 4;
                    return;
                }
            }
        }
    } else {
        echo 5; //El formato del video no es válido
        return;
    }
} else {
    echo 6; //No se ha recibido el parametro desde banner_videos.js (#formBannerVideo)
    return;
}

mysqli_close($mysqli);
