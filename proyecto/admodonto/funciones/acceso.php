<?php
include '../../conexion/conexion.php';
include '../../funcionesphp/limpiarCampo.php';
include '../../funcionesphp/TOUTF8.php';
include '../../funcionesphp/borrarcarpeta.php';

session_start();
$rutsesion = $_SESSION['sesionCESFAM']['rut'];


$seleccion = $_POST['seleccionar'];
if (isset($seleccion)) {

    if ($seleccion == 1) {
        $sql = "SELECT id_articulo_odonto,
                titulo_articulo_odonto,
                descripcion_articulo_odonto,
                archivo_articulo_odonto,
                estado_articulo_odonto,
                frase_articulo_odonto,
                cita_articulo_odonto
                FROM articulo_odonto";

        $consulta = mysqli_query($mysqli, $sql);
        $datos = array();
        while ($fila = mysqli_fetch_array($consulta)) {
            $datos[] = array(
                'ID_ARTICULO' => $fila["id_articulo_odonto"],
                'TITULO_ODONTO' => $fila["titulo_articulo_odonto"],
                'DESCRIPCION_ODONTO' => $fila["descripcion_articulo_odonto"],
                'NOMBRE_IMAGEN_ODONTO' => $fila["archivo_articulo_odonto"],
                'ESTADO_ODONTO' => $fila["estado_articulo_odonto"],
                'FRASE_ARTICULO' => $fila["frase_articulo_odonto"],
                'CITA_ARTICULO' => $fila["cita_articulo_odonto"]
            );
        }
        // print json_encode($datos);
        header('Content-type: application/json');
        echo json_encode(toutf8($datos));
        mysqli_close($mysqli);
    } else if ($seleccion == 2) { //llenado anexo

        if (isset($_POST['IDARITCULOTAB'])) {
            $ID = $_POST['IDARITCULOTAB'];

            $sql = "SELECT anx.id_anexo_odonto,anx.id_articulo_odonto,anx.id_categoria_odonto,anx.titulo_anexo_odonto,anx.descripcion_anexo_odonto,anx.archivo_anexo_odonto,ctg.nombre_categoria_odonto FROM anexo_odonto anx, categoria_odonto ctg WHERE anx.id_categoria_odonto=ctg.id_categoria_odonto and anx.id_articulo_odonto='$ID'";

            $consulta = mysqli_query($mysqli, $sql);

            $datos = array();
            while ($fila = mysqli_fetch_array($consulta)) {
                $datos[] = array(
                    'ID_ANEXO' => $fila["id_anexo_odonto"],
                    'ID_ARTICULO_ANEXO' => $fila["id_articulo_odonto"],
                    'CATEGORIA_ANEXO' => $fila["nombre_categoria_odonto"],
                    'TITULO_ANEXO' => $fila["titulo_anexo_odonto"],
                    'DESCRIPCION_ANEXO' => $fila["descripcion_anexo_odonto"],
                    'IMAGEN_ANEXO' => $fila["archivo_anexo_odonto"]
                );
            }
            // print json_encode($datos);
            header('Content-type: application/json');
            echo json_encode(toutf8($datos));
        }
        mysqli_close($mysqli);
    } else if ($seleccion == 3) { //editar archivo

        if (isset($_POST["ver_articulo_id_odonto"]) && isset($_POST["ver_articulo_titulo_odonto"]) && isset($_POST["ver_articulo_descripcion_odonto"]) && isset($_POST["ver_articulo_estado_odonto"])) {
            //Porque la imagen puede existir o no, entonces no se pregunta en primera instancia

            $idarticulo = solonumeros($_POST['ver_articulo_id_odonto']);
            $tituloarticulo = numerosyletras($_POST['ver_articulo_titulo_odonto']);
            $descripcion = $_POST['ver_articulo_descripcion_odonto'];
            $estado = sololetras($_POST['ver_articulo_estado_odonto']);
            $frase = numerosyletras($_POST['frase_articulo']);
            $cita = numerosyletras($_POST['cita_articulo']);

            if (validavacioenarreglo(array($idarticulo, $tituloarticulo, $descripcion, $estado))) {
                echo 1;
                return;
            }
            //ANTES: limpiar_campo($_POST['ver_articulo_descripcion']); AHORA NO PORQUE USO HTML DE SUMMERNOTE Y EL LIMPIAR ME QUITA LOS CARACTERES ESPECIALES

            //Modifico el articulo sin imagen
            if ($_FILES["ver_articulo_imagen_odonto"]["name"] == '') {
                $sql = "UPDATE articulo_odonto SET 
                            titulo_articulo_odonto='$tituloarticulo',
                            descripcion_articulo_odonto='$descripcion',
                            estado_articulo_odonto='$estado',
                            frase_articulo_odonto='$frase',
                            cita_articulo_odonto='$cita'
                            WHERE id_articulo_odonto='$idarticulo'";
                if (mysqli_query($mysqli, $sql)) {
                    echo 2; //editado correctamente sin imagen
                    return;
                } else {
                    echo 3;
                    return;
                }
            } else { //Modifico el articulo con imagen
                if ($_FILES["ver_articulo_imagen_odonto"]["size"] < 20971520) { //Tamaño de 20 MB
                    $formato = $_FILES["ver_articulo_imagen_odonto"]['type'];
                    if ($formato == "image/jpg" || $formato == "image/png" || $formato == "image/jpeg" || $formato == "image/JPG" || $formato == "image/PNG" || $formato == "image/JPEG") {
                        $imagen = $_FILES["ver_articulo_imagen_odonto"]["name"];
                        $imagentamaño = $_FILES["ver_articulo_imagen_odonto"]["tmp_name"];

                        $sql = "UPDATE articulo_odonto  SET
                            titulo_articulo_odonto='$tituloarticulo',
                            descripcion_articulo_odonto='$descripcion', 
                            archivo_articulo_odonto='$imagen',
                            estado_articulo_odonto='$estado',
                            frase_articulo_odonto='$frase',
                            cita_articulo_odonto='$cita'
                            WHERE id_articulo_odonto='$idarticulo' ";
                        if (mysqli_query($mysqli, $sql)) {
                            if (!is_dir('../odontologia/' . $idarticulo . '/')) { //Si no existe el directorio o la carpeta
                                mkdir('../odontologia/' . $idarticulo . '/', 0777, true); //La crea
                                move_uploaded_file($imagentamaño, "../odontologia/$idarticulo/$imagen");  //y le inserta la imagen modificada
                            } else { //Si existe la carpeta
                                borrarcarpeta('../odontologia/' . $idarticulo); //Borra su contenido
                                mkdir('../odontologia/' . $idarticulo . '/', 0777, true); //la crea nuevamente
                                move_uploaded_file($imagentamaño, "../odontologia/$idarticulo/$imagen"); //y le inserta la imagen modificada
                            }
                            echo 4;
                            return;
                        } else { //Hubo un error en la consulta para editar articulo
                            echo 5;
                            return;
                        }
                    } else { //No es una imagen
                        echo 6;
                        return;
                    }
                } else {
                    echo 7;  //EXCEDE TAMAÑO
                    return;
                }
            }
        } else {
            echo 8; //No ha recibido los parametros
            return;
        }
        mysqli_close($mysqli);
    } else if ($seleccion == 4) { //agregar anexo archivo

        if (isset($_POST['id_articulo_anexo']) && isset($_POST['categoria_anexo']) && isset($_POST['titulo_anexo']) && isset($_POST['descripcion_anexo']) && isset($_FILES["imagen_anexo"]["name"])) {

            $idarticulo = solonumeros($_POST['id_articulo_anexo']);
            $idcategoria = solonumeros($_POST['categoria_anexo']);
            $tituloanexo = numerosyletras($_POST['titulo_anexo']);
            $descripcionanexo = numerosyletras($_POST['descripcion_anexo']);

            $archivo = $_FILES["imagen_anexo"];
            $nombre_archivo = $archivo['name'];
            $tipo = $archivo['type'];
            $tamaño_archivo = $archivo['size'];

            if (validavacioenarreglo(array($idarticulo, $idcategoria, $tituloanexo, $descripcionanexo, $nombre_archivo))) {
                echo 1;
                return;
            } else {

                if ($tamaño_archivo > 41943040) { //Tamaño excedido de 40 MB
                    echo 2; //Se excedio 
                    return;
                }
                //Formato
                if ($tipo == "image/jpg" || $tipo == "image/png" || $tipo == "image/jpeg" || $tipo == "image/JPG" || $tipo == "image/PNG" || $tipo == "image/JPEG" || $tipo == "application/pdf") {

                    $sql1 = "INSERT INTO anexo_odonto (id_anexo_odonto,
                            id_articulo_odonto,
                            id_categoria_odonto,
                            titulo_anexo_odonto,
                            descripcion_anexo_odonto,
                            archivo_anexo_odonto) VALUES (NULL,
                            '$idarticulo',
                            '$idcategoria',
                            '$tituloanexo',
                            '$descripcionanexo',
                            '$nombre_archivo')";

                    $resultado_2 = mysqli_query($mysqli, $sql1); //Hasta aqui inserto el anexo en la base de datos

                    if (!$resultado_2) {
                        echo 3; //Hubo un error no se pudo insertar el anexo
                        return;
                        // die("error " . mysqli_error($mysqli));
                    } else {
                        $sql2 = "SELECT id_anexo_odonto, id_articulo_odonto FROM anexo_odonto ORDER BY id_anexo_odonto DESC LIMIT 1"; //Muestro el último anexo insertado en la consulta anterior
                        $resultado_3 = mysqli_query($mysqli, $sql2);
                        if (!$resultado_3) {
                            echo 4; //Hubo un error no se pudo mostrar el último id del anexo y del articulo
                            return;
                        } else {
                            $fila = mysqli_fetch_assoc($resultado_3);
                            $IDanexo = $fila["id_anexo_odonto"];
                            $IDarticulo = $fila["id_articulo_odonto"];

                            if (!is_dir('../odontologia/' . $IDarticulo . '/' . $IDanexo . '/')) { //Si no existe el directorio (carpeta)
                                mkdir('../odontologia/' . $IDarticulo . '/' . $IDanexo . '/', 0777, true); //lo crea y en move_uploaded_file añade el archivo
                            }
                            //si existe el directorio igualmente añade el archivo
                            move_uploaded_file($archivo['tmp_name'], '../odontologia/' . $IDarticulo . '/' . $IDanexo . '/' . $nombre_archivo);
                            echo 5; //Anexo subido correctamente 
                            return;
                        }
                    }
                } else {
                    echo 6; //El formato del archivo no es válido
                    return;
                }
            }
        } else {
            echo 7; //No se ha recibido el parametro desde documentos.js 
            return;
        }
        mysqli_close($mysqli);
    } else if ($seleccion == 5) { //borrar articulo
        if (isset($_POST['idarticulo'])) {
            //No borro la imagen directamente porque en la carpeta del articulo va a ir la subcarpeta de imgnes del anexo,entonces
            //bastaria con eliminar la carpeta principal iera

            $ID = solonumeros($_POST['idarticulo']);
            if (validavacioenarreglo(array($ID))) {
                echo 1;
                return;
            } else {
                $sql = "DELETE FROM anexo_odonto WHERE id_articulo_odonto='$ID'";
                $res1 = mysqli_query($mysqli, $sql);

                if (!$res1) {
                    echo 2; //Error al eliminar en la tabla anexo
                    // die("error " . mysqli_error($mysqli));
                    return;
                } else {
                    $sql2 = "DELETE FROM articulo_odonto WHERE id_articulo_odonto='$ID'";
                    $res2 = mysqli_query($mysqli, $sql2);
                    if (!$res2) {
                        echo 3; //Error al eliminar en la tabla articulo_odonto
                        // die("error " . mysqli_error($mysqli));
                        return;
                    } else {
                        //Aqui se podria comprobar si existe el directorio lo borra, porque puede que no exista
                        borrarcarpeta('../odontologia/' . $ID);  //Borra la carpeta con el id
                        echo 4;
                        return;
                    }
                }
            }
        } else {
            echo 5;
            return;
        }
        mysqli_close($mysqli);
    } else if ($seleccion == 6) { //borrar anexo
        if (isset($_POST['IDARTICULO']) && isset($_POST['IDANEXO'])) {
            $IDARTICULO = solonumeros($_POST['IDARTICULO']);
            $IDANEXO = solonumeros($_POST['IDANEXO']);

            if (validavacioenarreglo(array($IDARTICULO, $IDANEXO))) {
                echo 1;
                return;
            } else {
                $sql = "DELETE FROM anexo_odonto WHERE id_anexo_odonto='$IDANEXO'";
                $res1 = mysqli_query($mysqli, $sql);

                if (!$res1) {
                    echo 2; //Error al eliminar en la tabla anexo
                    return;
                    // die("error " . mysqli_error($mysqli));
                } else {
                    if (!is_dir('../odontologia/' . $IDARTICULO . '/' . $IDANEXO)) { //Si no existe el directorio, no borra la carpeta
                        echo 3; //eliminado correctamente, pero sin el borrar la carpeta, porque no existe
                        return;
                    } else {
                        borrarcarpeta('../odontologia/' . $IDARTICULO . '/' . $IDANEXO);  //Borra la carpeta del anexo con el id 
                        echo 4; //eliminado correctamente
                        return;
                    }
                }
            }
        } else {
            echo 5;
            return;
        }
        mysqli_close($mysqli);


        // if (isset($_POST['idcalidad'])) {
        //     $ID = solonumeros($_POST['idcalidad']);

        //     if (validavacioenarreglo(array($ID))) {
        //         echo 1;
        //         return;
        //     }
        //     $sql = "DELETE FROM calidad WHERE id_calidad='$ID'";
        //     $res = mysqli_query($mysqli, $sql);

        //     if (!$res) {
        //         echo 2; // ha ocurrido un error al eliminar el archivo
        //         return;
        //     } else {
        //         if (!is_dir('../../uscalidad/CalidadArchivo/' . $ID)) { //Si no existe el directorio 
        //             echo 3;
        //             return;
        //         } else {
        //             borrarcarpeta('../../uscalidad/CalidadArchivo/' . $ID);  //Borra la carpeta con el id 
        //             echo 4;
        //             return;
        //         }
        //     }
        // } else {
        //     echo 5;
        //     return;
        // }
        // mysqli_close($mysqli);

    }
} else {
    echo 444;
    return;
}
