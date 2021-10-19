<?php
require '../../conexion/conexion.php';
include '../../funcionesphp/limpiarCampo.php';
include '../../funcionesphp/borrarcarpeta.php';

session_start();
$usuario = $_SESSION['sesionCESFAM']['rut'];

if (isset($_POST["ver_articulo_id"]) && isset($_POST["ver_articulo_titulo"]) && isset($_POST["ver_articulo_categoria"]) && isset($_POST["ver_articulo_fecha"]) && isset($_POST["ver_articulo_descripcion"])) { //Porque la imagen puede existir o no, entonces no se pregunta en primera instancia

    $idarticulo = solonumeros($_POST['ver_articulo_id']);
    $tituloarticulo = numerosyletras($_POST['ver_articulo_titulo']);
    $categoriarticulo = solonumeros($_POST['ver_articulo_categoria']);
    $fecha = fecha($_POST['ver_articulo_fecha']);
    $descripcion = $_POST['ver_articulo_descripcion']; //ANTES: limpiar_campo($_POST['ver_articulo_descripcion']); SE LO QUITE PORQUE ME QUITA LOS CARACTERES ESPECIALES DEL SUMMERNOTE CUANDO ISNERTO IMAGENES O VIDEOS

    if (validavacioenarreglo(array($idarticulo, $tituloarticulo, $categoriarticulo, $fecha, $descripcion))) {
        echo 5;
        return;
    }

    if ($_FILES["ver_articulo_imagen"]["name"] == '') { //Modifico el articulo sin imagen 

        $sql = "UPDATE articulo SET 
    rut='$usuario',
    id_categoria_articulo='$categoriarticulo', 
    titulo_articulo='$tituloarticulo',
    descripcion_articulo='$descripcion', 
    fecha_articulo='$fecha'
    WHERE id_articulo='$idarticulo'";

        if (mysqli_query($mysqli, $sql)) {
            echo 1;
        } else {
            echo 0;
        }
    } else {

        if ($_FILES["ver_articulo_imagen"]["size"] < 5000000) {
            $formato = $_FILES["ver_articulo_imagen"]['type'];
            if ($formato == "image/jpg" || $formato == "image/png" || $formato == "image/jpeg" || $formato == "image/JPG" || $formato == "image/PNG" || $formato == "image/JPEG") {

                $imagen = $_FILES["ver_articulo_imagen"]["name"];
                $imagentamaño = $_FILES["ver_articulo_imagen"]["tmp_name"];

                $sql = "UPDATE articulo art,imagen_articulo im  SET
                rut='$usuario',
                id_categoria_articulo='$categoriarticulo', 
                titulo_articulo='$tituloarticulo',
                descripcion_articulo='$descripcion', 
                fecha_articulo='$fecha',
                im.nombre_imagen_articulo='$imagen'
                WHERE art.id_articulo=im.id_articulo
                AND art.id_articulo='$idarticulo' ";


                if (mysqli_query($mysqli, $sql)) {

                    if (!is_dir('../../noticias/imagenes/' . $idarticulo . '/')) {      //Si no existe el directorio o la carpeta 
                        mkdir('../../noticias/imagenes/' . $idarticulo . '/', 0777, true);    //La crea
                        move_uploaded_file($imagentamaño, "../../noticias/imagenes/$idarticulo/$imagen"); //y le inserta la imagen modificada
                    } else {  //Si eiste la carpeta
                        borrarcarpeta('../../noticias/imagenes/' . $idarticulo);  //Borra su contenido
                        mkdir('../../noticias/imagenes/' . $idarticulo . '/', 0777, true);   //la crea nuevamente
                        move_uploaded_file($imagentamaño, "../../noticias/imagenes/$idarticulo/$imagen");  //y le inserta la imagen modificada
                    }
                    echo 1;
                } else {
                    echo 0;
                }
            } else {
                echo 3;
                return;
            }
        } else {
            echo 2; //ENVIA ERROR DE TAMAÑO 
            return;
        }
    }
} else {
    echo 4; //No ha recibido los parametros
    return;
}
mysqli_close($mysqli);
