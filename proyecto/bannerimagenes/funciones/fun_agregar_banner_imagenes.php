
<?php
require '../../conexion/conexion.php';
include '../../funcionesphp/limpiarCampo.php';
session_start();
$rutusuario = $_SESSION["sesionCESFAM"]["rut"];

//Ojo los return son para que no continue a otras sentencias

if (isset($_POST['linkbanner']) && isset($_FILES['imagenbanner'])) {

    $linkbanner = sololink($_POST['linkbanner']);

    if (validavacioenarreglo(array($linkbanner))) {
        echo 7;
        return;
    }

    if (strlen($linkbanner) < 2 || strlen($linkbanner) > 200) {
        echo 8;
        return;
    }

    $estado = 0; //Inactivo por defecto
    $archivo = $_FILES["imagenbanner"];
    $nombre_imagen = $archivo['name'];
    $tipo = $archivo['type'];
    $tamañoimagen = $archivo['size'];

    if ($tamañoimagen > 20971520) { //Tamaño excedido de 20 MB
        echo 1; //Se excedio 
        return;
    }
    //Formato
    if ($tipo == "image/jpg" || $tipo == "image/png" || $tipo == "image/jpeg" || $tipo == "image/JPG" || $tipo == "image/PNG" || $tipo == "image/JPEG") {

        $sql_Existe_link = "SELECT count(link_ban_imagenes) as contador FROM banner_imagenes WHERE link_ban_imagenes='$linkbanner'";
        $consulta_Existe_link = mysqli_query($mysqli, $sql_Existe_link);
        $resultado_Existe_link = mysqli_fetch_assoc($consulta_Existe_link);

        $sql_Existe_imagen = "SELECT count(nombre_ban_imagenes) as contador FROM banner_imagenes WHERE nombre_ban_imagenes='$nombre_imagen'";
        $consulta_Existe_imagen = mysqli_query($mysqli, $sql_Existe_imagen);
        $resultado_Existe_imagen = mysqli_fetch_assoc($consulta_Existe_imagen);

        if ($resultado_Existe_link['contador'] >= 1) {
            echo 9;  //Existe una categoria con el mismo nombre
            return;
        } else if ($resultado_Existe_imagen['contador'] >= 1) {
            echo 10;  //Existe una categoria con el mismo nombre
            return;
        } else {
            $sql1 = "INSERT INTO banner_imagenes (id_ban_imagenes, nombre_ban_imagenes,estado_ban_imagenes,link_ban_imagenes,rut) VALUES (NULL,'$nombre_imagen','$estado','$linkbanner',$rutusuario)";
            $resultado_2 = mysqli_query($mysqli, $sql1); //Hasta aqui inserto un banner_imagen 

            if (!$resultado_2) {
                echo 2; //Error al insertar imagen
                die("error " . mysqli_error($mysqli));
                return;
            } else {
                $sql2 = "SELECT MAX(id_ban_imagenes) AS identificador FROM banner_imagenes"; //Muestro el último articulo insertado en la consulta anterior
                $resultado_3 = mysqli_query($mysqli, $sql2);

                if (!$resultado_3) {
                    echo 3; //Error al mostrar el último id
                    return;
                } else {
                    while ($fila = mysqli_fetch_array($resultado_3)) {
                        $id_articulo = $fila["identificador"];
                    }

                    if (!is_dir('../banimg/' . $id_articulo . '/')) { //Si no existe el directorio 
                        mkdir('../banimg/' . $id_articulo . '/', 0777, true); //lo crea
                    }
                    move_uploaded_file($archivo['tmp_name'], '../banimg/' . $id_articulo . '/' . $nombre_imagen);

                    echo 4;
                    return;
                }
            }
        }
    } else {
        echo 5; //El formato de la imagen no es válido
        return;
    }
} else {
    echo 6; //No se ha recibido el parametro desde banner_imagenes.js (#formBannerImagen)
    return;
    mysqli_close($mysqli);
}
