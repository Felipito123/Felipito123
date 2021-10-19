<?php
include '../../conexion/conexion.php';
include '../../funcionesphp/limpiarCampo.php';

date_default_timezone_set("America/Santiago");
setlocale(LC_TIME, "spanish");
$fechahoy = strftime("%F"); // strftime("%F") = Ej: 2021-07-02 , strftime("%x") = 02/07/2021

if (
    isset($_POST['tipo_persona']) &&
    isset($_POST['seleccionNacionalidad']) &&
    isset($_POST['rut']) &&
    isset($_POST['nombre']) &&
    isset($_POST['apellido_paterno']) &&
    isset($_POST['apellido_materno']) &&
    isset($_POST['fechanacimiento']) &&
    isset($_POST['sexo']) &&
    isset($_POST['pueblosindigenas']) &&
    isset($_POST['ts1']) &&
    isset($_POST['telefonoprimario']) &&
    isset($_POST['confirmasolicitante']) &&
    isset($_POST['correoelectronico']) &&
    isset($_POST['tiposolicitud']) &&
    isset($_POST['tipoinstitucion']) &&
    isset($_POST['area']) &&
    isset($_POST['fechaevento'])
) {

    //OBLIGATORIO
    $tipo_persona = sololetras($_POST['tipo_persona']);
    $seleccionNacionalidad = solonumeros($_POST['seleccionNacionalidad']);
    $rut = validarutConPuntosyGuion($_POST['rut']);
    $nombre = sololetras($_POST['nombre']);
    $apellido_paterno = sololetras($_POST['apellido_paterno']);
    $apellido_materno = sololetras($_POST['apellido_materno']);
    $fechanacrecibida = $_POST['fechanacimiento'];
    $porciones1 = explode("/", $fechanacrecibida);
    $fechanacimiento = fechausuarios($porciones1[2] . '-' . $porciones1[1] . '-' . $porciones1[0]);
    $sexo = sololetras($_POST['sexo']);
    $pueblosindigenas = solonumeros($_POST['pueblosindigenas']);
    $ts1 = sololetras($_POST['ts1']);
    $telefonoprimario = solotelefono($_POST['telefonoprimario']);
    $confirmasolicitante = sololetras($_POST['confirmasolicitante']);
    $correoelectronico = solocorreo($_POST['correoelectronico']);
    $tiposolicitud = sololetras($_POST['tiposolicitud']);
    $tipoinstitucion = solonumeros($_POST['tipoinstitucion']);
    $area = solonumeros($_POST['area']);
    $fechaeventorecibida = $_POST['fechaevento'];
    $porciones2 = explode("/", $fechaeventorecibida);
    $fechaevento = fechausuarios($porciones2[2] . '-' . $porciones2[1] . '-' . $porciones2[0]);


    //OPCIONAL (JUNTO CON LAS IMAGENES)
    $ts2 = sololetras($_POST['ts2']);
    $telefono_secundario = solotelefono($_POST['telefonosecundario']);
    $detalle = soloCaractDeConversacion($_POST['detalle']);
    $observaciones = soloCaractDeConversacion($_POST['observaciones']);
    $imagen = json_encode($_FILES["archivosRSF"]["name"]);
    $contar = count($_FILES["archivosRSF"]["tmp_name"]);

    // echo "tipo persona: " . $tipo_persona . " Nacionalidad: " . $seleccionNacionalidad . " R.U.T: " . $rut .
    //     " Nombre: " . $nombre . " Apellido Paterno: " . $apellido_paterno . " Apellido materno: " . $apellido_materno . " Fecha nacimiento: " . $fechanacimiento .
    //     " sexo: " . $sexo . " pueblosindigenas: " . $pueblosindigenas . " ts1: " . $ts1 . " telefonoprimario: " . $telefonoprimario .
    //     " confirmasolicitante: " . $confirmasolicitante . " correoelectronico: " . $correoelectronico . " tiposolicitud: " . $tiposolicitud . " tipoinstitucion: " . $tipoinstitucion .
    //     " area: " . $area . " correoelectronico: " . $fechaevento;


    // $tamaño= strlen($imagen);
    // echo($imagen);
    // echo($tamaño);
    // var_dump($imagen);

    // if (!empty($_FILES["archivosRSF"]["name"]) && str_contains($imagen, '.')) {
    //     echo 'si';
    //     return;
    // } else {
    //     echo 'no';
    //     return;
    // }

    // Como utilizo el plugins nunca el archivo va a ser vacio, sino que en el caso de no subir un archivo, se enviará caracteres especiales como salto de linea 
    // Entonces valido si contiene un . como extension, para saber si es vacio o no


    if (validavacioenarreglo(array(
        $tipo_persona, $seleccionNacionalidad, $rut, $nombre, $apellido_paterno, $apellido_materno, $fechanacimiento,
        $sexo, $pueblosindigenas, $ts1, $telefonoprimario, $confirmasolicitante, $correoelectronico, $tiposolicitud,
        $tipoinstitucion, $area, $fechaevento
    ))) {
        echo 1; //Parámetros vacios
        return;
    } else {

        if (!empty($_FILES["archivosRSF"]["name"]) && str_contains($imagen, '.')) {
            //Primero valido que todos los archivos son del formato inicializado, es decir, jpg, jpeg, png, bmp, pdf
            for ($i = 0; $i < $contar; $i++) {
                $tipo = $_FILES["archivosRSF"]["type"][$i];
                /*EN ESTE LINK SE SABE TODOS LOS MIME TYPE DE LOS ARCHIVOS  https://www.php.net/manual/es/function.mime-content-type.php*/
                if (!($tipo == "image/jpg" || $tipo == "image/png" || $tipo == "image/jpeg" ||
                    $tipo == "image/JPG" || $tipo == "image/PNG" || $tipo == "image/JPEG" || $tipo == "image/bmp" ||
                    $tipo == "application/pdf" || $tipo == "text/plain")) {
                    echo 2; //valido previamente si cumple con el formato en caso de que contenga una extension "."
                    return;
                }
            }
            //luego que ha validado las extensiones y paso correctamente inserto en la base de datos

            $sql = "INSERT INTO libro_rsf (id_libro_rsf, 
            rut_solicitante,
            rut_funcionario,
            id_area,
            id_institucion,
            id_nacionalidad,
            id_pueblos_indigenas,
            tipo_persona,
            nombres,
            apellido_paterno,
            apellido_materno,
            fecha_nacimiento,
            sexo,
            tipo_telefonoprimario,
            telefono_primario,
            tipo_telefonosecundario,
            telefono_secundario,
            es_afectado,
            tipo_solicitud,
            fecha_registro,
            fecha_evento,
            correo,
            fecha_respuesta_funcionario,
            estado_respuesta,
            detalle,
            observaciones) VALUES (NULL,'$rut',NULL,'$area','$tipoinstitucion','$seleccionNacionalidad','$pueblosindigenas','$tipo_persona','$nombre',
            '$apellido_paterno','$apellido_materno','$fechanacimiento','$sexo','$ts1','$telefonoprimario','$ts2','$telefono_secundario',
            '$confirmasolicitante','$tiposolicitud','$fechahoy','$fechaevento','$correoelectronico','0000-00-00','0','$detalle','$observaciones')";

            $res = mysqli_query($mysqli, $sql); //Hasta aqui registro el formulario del LRSF LIBRO DE RECLAMOS, SUGERENCIAS Y FELICITACIONES
            if (!$res) {
                echo 3;
                return;
            } else {
                $sql1 = "SELECT MAX(id_libro_rsf) AS identificador FROM libro_rsf"; //Muestro el último articulo insertado en la consulta anterior
                $resultado = mysqli_query($mysqli, $sql1);
                //Ocurrió un error al mostrar el último ID del libro_rsf para hacer las siguientes consultas
                if (!$resultado) {
                    echo 4;
                    return;
                } else {
                    $fila = mysqli_fetch_array($resultado);
                    $ultimo_id = $fila['identificador'];

                    for ($j = 0; $j < $contar; $j++) {
                        $nombre = $_FILES["archivosRSF"]['name'][$j];
                        $sql2 = "INSERT INTO imagen_libro_rsf (id_imagen_libro_rsf, id_libro_rsf,nombre_imagen_libro_rsf) VALUES (NULL,'$ultimo_id','$nombre')";
                        $resultado = mysqli_query($mysqli, $sql2);
                        if ($resultado) {
                            if (!is_dir('../archivos/' . $ultimo_id . '/')) { //Si no existe el directorio 
                                mkdir('../archivos/' . $ultimo_id . '/', 0777, true); //lo crea
                                move_uploaded_file($_FILES["archivosRSF"]['tmp_name'][$j], '../archivos/' . $ultimo_id . '/' . $nombre);
                            } else {
                                move_uploaded_file($_FILES["archivosRSF"]['tmp_name'][$j], '../archivos/' . $ultimo_id . '/' . $nombre);
                            }
                        }
                    }
                    echo 5; //se envió el formulario correctamente con las imágenes
                    return;
                }
            }
        } else { //Aquí quiere decir que no se ingresó un archivo
            $sql = "INSERT INTO libro_rsf (id_libro_rsf, 
        rut_solicitante,
        rut_funcionario,
        id_area,
        id_institucion,
        id_nacionalidad,
        id_pueblos_indigenas,
        tipo_persona,
        nombres,
        apellido_paterno,
        apellido_materno,
        fecha_nacimiento,
        sexo,
        tipo_telefonoprimario,
        telefono_primario,
        tipo_telefonosecundario,
        telefono_secundario,
        es_afectado,
        tipo_solicitud,
        fecha_registro,
        fecha_evento,
        correo,
        fecha_respuesta_funcionario,
        estado_respuesta,
        comentario_respuesta_funcionario,
        detalle,
        observaciones) VALUES (NULL,'$rut',NULL,'$area','$tipoinstitucion','$seleccionNacionalidad','$pueblosindigenas','$tipo_persona','$nombre',
        '$apellido_paterno','$apellido_materno','$fechanacimiento','$sexo','$ts1','$telefonoprimario','$ts2','$telefono_secundario',
        '$confirmasolicitante','$tiposolicitud','$fechahoy','$fechaevento','$correoelectronico',NULL,'0',NULL,'$detalle','$observaciones')";
            $res = mysqli_query($mysqli, $sql); //Hasta aqui registro el formulario del LRSF LIBRO DE RECLAMOS, SUGERENCIAS Y FELICITACIONES
            if (!$res) {
                echo 6;
                return;
            } else {
                echo 7;
                return;
            }
        }
    }
} else {
    echo 500;
    return;
}

mysqli_close($mysqli);
