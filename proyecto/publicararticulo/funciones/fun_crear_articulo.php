<?php
require '../../conexion/conexion.php';
include '../../funcionesphp/limpiarCampo.php';
session_start();
$rutusuario = $_SESSION["sesionCESFAM"]["rut"];

if (isset($_POST["titulo_articulo"]) && isset($_POST["categoria"]) && isset($_POST["descripcion"])) { //Porque la imagen puede existir o no, entonces no se pregunta en primera instancia

    $titulo_articulo = numerosyletras($_POST["titulo_articulo"]);
    $categoria = solonumeros($_POST["categoria"]);
    $descripcion = $_POST["descripcion"]; //limpiar_campo($_POST["descripcion"]); LO COMENTE PORQUE ME LIMPIA LOS CARACTERES DE LAS IMAGENES DEL SUMERNOTE QUE ESTA EN BASE64 Y TIENE CARACTERES ESPECIALES

    if (validavacioenarreglo(array($titulo_articulo, $categoria, $descripcion))) {
        echo 11;
        return;
    }

    date_default_timezone_set("America/Santiago");
    setlocale(LC_TIME, "spanish");
    $fecha = strftime("%d de %B, %Y"); // 04 de septiembre, 2029  %A= dia de la semana, %d= numero del dia,  %B=nombre del mes,   %Y= numero del año

    $verificar_imagen;
    //  $verificar_pdf;

    if ($_FILES["archivo"]['type'] == null) {
        $nombre_imagen = 'no-imagen.jpg';
        $tamañoimagen = 0;
        $tipo = 'image/jpg';
        $tmp = '../../noticias/imagenes/default/no-imagen.jpg';
        $verificar_imagen = false;
    } else {
        $archivo = $_FILES["archivo"];
        $nombre_imagen = $archivo['name'];
        $tipo = $archivo['type'];
        $tamañoimagen = $archivo['size'];
        $verificar_imagen = true;
    }

    if ($tamañoimagen > 5000000) { //Tamaño excedido
        echo 1;
        die();
    }

    if ($_FILES["archivopdf"]['type'] == null) {
        $nombre_pdf = 0;
        $tamañopdf = 0;
        $tipopdf = 'application/pdf';
        $verificar_pdf = false;
    } else {
        $archivopdf = $_FILES["archivopdf"];
        $nombre_pdf = $archivopdf['name'];
        $tipopdf = $archivopdf['type'];
        $tamañopdf = $archivopdf['size'];
        $verificar_pdf = true;
        // 1024 bytes es 1 KB
        //1024 bytes * 1024 = 1.048.576 bytes = 1 MB
        if ($tamañopdf > 5242880) { //Tamaño excedido  a 5 MB
            echo 9;
            return;
            // die();
        }
        if ($tipopdf != "application/pdf") { //tipo no es pdf excedido
            echo 10;
            return;
            // die();
        }
    }


    $sql1 = "INSERT INTO articulo (id_articulo, rut, id_categoria_articulo, titulo_articulo, descripcion_articulo,fecha_articulo,archivo_articulo,visualizaciones_articulo) 
            VALUES (NULL,'$rutusuario','$categoria','$titulo_articulo','$descripcion','$fecha','$nombre_pdf',0)"; //'$nombre_pdf'

    $resultado_insertar = mysqli_query($mysqli, $sql1); //Hasta aqui inserto un articulo sin imagen aún, porque puede o no inserte una imagen

    if (!$resultado_insertar) {
        die("error " . mysqli_error($mysqli));
        return 0; //No se pudo insertar
    } else {

        $sql2 = "SELECT MAX(id_articulo) AS id_articulo
            FROM articulo WHERE rut='$rutusuario'"; //Muestro el último articulo insertado en la consulta anterior
        $resultado_muestraultimoarticulo = mysqli_query($mysqli, $sql2);

        if (!$resultado_muestraultimoarticulo) {
            die("error " . mysqli_error($mysqli));
            return  0;
        } else {
            while ($fila = mysqli_fetch_array($resultado_muestraultimoarticulo)) {
                $id_articulo = $fila["id_articulo"];
            }

            if ($verificar_pdf) {
                if (!is_dir('../../noticias/pdf/' . $id_articulo . '/')) { //Si no existe el directorio 
                    mkdir('../../noticias/pdf/' . $id_articulo . '/', 0777, true); //lo crea
                }
                move_uploaded_file($archivopdf['tmp_name'], '../../noticias/pdf/' . $id_articulo . '/' . $nombre_pdf);
            }
            //===============================CREA LA CARPETA PDF===============================//

            if (!$verificar_imagen) {  //NO HAY IMAGEN, LE AGREGO LA IMAGEN POR DEFECTO
                $sql3 = "INSERT INTO imagen_articulo (id_imagen_articulo,id_articulo,nombre_imagen_articulo) VALUES (NULL,'$id_articulo','$nombre_imagen')";
                //Publicar  
                if (mysqli_query($mysqli, $sql3)) {
                } else {
                    echo 2; //Error al subir imagen
                    return;
                }

                //tipo de imagen
                if ($tipo == "image/jpg" || $tipo == "image/png" || $tipo == "image/jpeg" || $tipo == "image/JPG" || $tipo == "image/PNG" || $tipo == "image/JPEG") {

                    //Se crea la carpeta
                    if (!is_dir('../../noticias/imagenes/' . $id_articulo . '/')) {
                        mkdir('../../noticias/imagenes/' . $id_articulo . '/', 0777, true);
                    }

                    copy('../../noticias/imagenes/default/no-imagen.jpg', '../../noticias/imagenes/' . $id_articulo . '/no-imagen.jpg');
                    echo 3;
                    return;
                } else {
                    echo 4; //formato erroneo de imagen
                    return;
                }
            } else { //SI HAY IMAGEN

                $consulta3 = "INSERT INTO imagen_articulo (id_imagen_articulo,id_articulo,nombre_imagen_articulo) VALUES (NULL,'$id_articulo','$nombre_imagen')";

                //Publicar  
                if (mysqli_query($mysqli, $consulta3)) {
                    // echo json_encode(array('Su imagen fue subida' => true));
                } else {
                    echo 5; //Error al subir la imagen
                    return;
                }

                //Formato
                if ($tipo == "image/jpg" || $tipo == "image/png" || $tipo == "image/jpeg" || $tipo == "image/JPG" || $tipo == "image/PNG" || $tipo == "image/JPEG") {
                    if (!is_dir('../../noticias/imagenes/' . $id_articulo . '/')) { //Si no existe el directorio 
                        mkdir('../../noticias/imagenes/' . $id_articulo . '/', 0777, true); //lo crea
                    }
                    move_uploaded_file($archivo['tmp_name'], '../../noticias/imagenes/' . $id_articulo . '/' . $nombre_imagen);

                    echo 6;
                    return;
                    // header("location:../mis_publicaciones.php");  //MENSAJE DE APRUEBO
                } else {
                    echo 7; // formato erroneo 2
                    return;
                }
            }   //si la imagen es verdadera ($verificar_imagen)
        }
    }
} else {
    echo 8; // no hay datos asociados
    return;
}

mysqli_close($mysqli);
