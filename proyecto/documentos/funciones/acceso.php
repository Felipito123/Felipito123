<?php
include '../../conexion/conexion.php';
include '../../funcionesphp/limpiarCampo.php';
include '../../funcionesphp/TOUTF8.php';
include '../../funcionesphp/borrarcarpeta.php';

$seleccion = $_POST['seleccionar'];
if (isset($seleccion)) {

    if ($seleccion == 1) {

        $sql = "SELECT d.id_documentos,d.rut,d.descripcion_documentos,d.archivo_documentos, d.estado_documentos, us.nombre_usuario FROM documentos d, usuario us WHERE d.rut=us.rut";
        $consultauno = mysqli_query($mysqli, $sql);

        $datos = array();
        while ($fila = mysqli_fetch_array($consultauno)) { //NOMBRE_PDF_PLANILLA
            $datos[] = array(
                'ID' => $fila["id_documentos"],
                'RUT' => $fila["rut"],
                'NOMBRE_USUARIO' => $fila["nombre_usuario"],
                'ARCHIVO' => $fila["archivo_documentos"],
                'DESCRIPCION' => $fila["descripcion_documentos"],
                'ESTADO' => $fila["estado_documentos"]
            );
        }
        // print json_encode($datos);
        header('Content-type: application/json');
        echo json_encode(toutf8($datos)); //toutf8()
        mysqli_close($mysqli);
    } else if ($seleccion == 2) {
        $sql = "SELECT n.rut,n.mensaje_notificacion,n.fecha_notificacion,n.estado_notificacion,us.nombre_usuario FROM notificacion n, usuario us WHERE n.rut=us.rut";
        $consulta = mysqli_query($mysqli, $sql);
        $datos = array();
        while ($fila = mysqli_fetch_array($consulta)) {
            $datos[] = array(
                'NOMBRE_USUARIO' => $fila["nombre_usuario"],
                'MENSAJE_NOTIFICACION' => $fila["mensaje_notificacion"],
                'FECHA_NOTIFICACION' => $fila["fecha_notificacion"],
                'ESTADO_NOTIFICACION' => $fila["estado_notificacion"]
            );
        }
        // print json_encode($datos);
        header('Content-type: application/json');
        echo json_encode(toutf8($datos));
        mysqli_close($mysqli);
    } else if ($seleccion == 3) { //insertar documento

        if (isset($_POST['rut_usuario']) && isset($_FILES["archivo_modal"]["name"]) && isset($_POST['descripcion_modal'])) {

            $rutusuario = validarut($_POST['rut_usuario']);
            $descripcion = soloCaractDeConversacion($_POST['descripcion_modal']);
            $estado = 1; //Activo por defecto

            $archivo = $_FILES["archivo_modal"];
            $nombre_archivo = $archivo['name'];
            $tipo = $archivo['type'];
            $tamaño_archivo = $archivo['size'];

            if (validavacioenarreglo(array($rutusuario, $descripcion, $archivo))) {
                echo 11;
                return;
            } else {

                if ($tamaño_archivo > 26214400) { //Tamaño excedido de 25 MB
                    echo 1; //Se excedio 
                    return;
                }

                //Formato
                if ($tipo == "image/jpg" || $tipo == "image/png" || $tipo == "image/jpeg" || $tipo == "image/JPG" || $tipo == "image/PNG" || $tipo == "image/JPEG" || $tipo == "application/pdf") {

                    $sql1 = "INSERT INTO documentos (id_documentos,rut,descripcion_documentos,archivo_documentos,estado_documentos) VALUES (NULL,'$rutusuario','$descripcion','$nombre_archivo','$estado')";
                    $resultado_2 = mysqli_query($mysqli, $sql1); //Hasta aqui inserto un documento

                    if (!$resultado_2) {
                        echo 2; //Error al insertar archivo
                        return;
                        // die("error " . mysqli_error($mysqli));
                    } else {
                        $sql2 = "SELECT MAX(id_documentos) AS identificador FROM documentos"; //Muestro el último articulo insertado en la consulta anterior
                        $resultado_3 = mysqli_query($mysqli, $sql2);

                        if (!$resultado_3) {
                            echo 3; //Error al mostrar el último id
                            return;
                        } else {
                            while ($fila = mysqli_fetch_array($resultado_3)) {
                                $IDdocumento = $fila["identificador"];
                            }

                            if (!is_dir('../../micuenta/archivomicuenta/' . $IDdocumento . '/')) { //Si no existe el directorio 
                                mkdir('../../micuenta/archivomicuenta/' . $IDdocumento . '/', 0777, true); //lo crea
                            }
                            move_uploaded_file($archivo['tmp_name'], '../../micuenta/archivomicuenta/' . $IDdocumento . '/' . $nombre_archivo);

                            echo 4;
                            return;
                        }
                    }
                } else {
                    echo 5; //El formato del archivo no es válido
                    return;
                }
            }
        } else {
            echo 6; //No se ha recibido el parametro desde documentos.js 
            return;
        }

        mysqli_close($mysqli);
    } else if ($seleccion == 4) { //editar documento
        if (isset($_POST['id_documento']) && isset($_POST['descripcion_editar'])) {

            $idDocumento = solonumeros($_POST['id_documento']);
            $descripcion = soloCaractDeConversacion($_POST['descripcion_editar']);
            $estado = 1; //Activo por defecto
            $verificar_archivo;

            if ($_FILES["archivo_editar"]['type'] == null) {
                $verificar_archivo = false;
            } else {
                $archivo = $_FILES["archivo_editar"];
                $nombre_archivo = $archivo['name'];
                $tipo = $archivo['type'];
                $tamañoarchivo = $archivo['size'];
                $verificar_archivo = true;

                if ($tamañoarchivo > 26214400) { //Tamaño excedido de 25 MB
                    echo 1; //Se excedio 
                    return;
                }
            }

            if (validavacioenarreglo(array($idDocumento, $descripcion, $estado))) {
                echo 11;
                return;
            } else {
                if (!$verificar_archivo) { //EDITA SIN EL ARCHIVO
                    $sql1 = "UPDATE documentos SET descripcion_documentos='$descripcion' WHERE id_documentos='$idDocumento'";
                    $resultado_2 = mysqli_query($mysqli, $sql1); //Hasta aqui edito un banner_imagen 

                    if (!$resultado_2) {
                        echo 2; //Error al editar archivo
                        // die("error:" . mysqli_error($mysqli));
                        return;
                    } else {
                        echo 3; //Se edito correctamente
                        return;
                    }
                } else {
                    //Formato
                    if ($tipo == "image/jpg" || $tipo == "image/png" || $tipo == "image/jpeg" || $tipo == "image/JPG" || $tipo == "image/PNG" || $tipo == "image/JPEG" || $tipo == "application/pdf") {

                        $sql2 = "UPDATE documentos SET archivo_documentos='$nombre_archivo',descripcion_documentos='$descripcion' WHERE id_documentos='$idDocumento'";
                        $resultado_3 = mysqli_query($mysqli, $sql2); //Hasta aqui edito un banner_imagen 

                        if (!$resultado_3) {
                            echo 4; //Error al editar archivo
                            // die("error:" . mysqli_error($mysqli));
                            return;
                        } else {

                            if (!is_dir('../../micuenta/archivomicuenta/' . $idDocumento . '/')) { //Si no existe el directorio 
                                mkdir('../../micuenta/archivomicuenta/' . $idDocumento . '/', 0777, true); //lo crea
                                move_uploaded_file($archivo['tmp_name'], '../../micuenta/archivomicuenta/' . $idDocumento . '/' . $nombre_archivo);
                            } else {
                                // BORRA PORQUE SINO, SE VA ACUMULANDO LOS ARCHIVOS EN LA CARPETA, ENTONCES PARA AHORRAR ESPACIO Y TAMAÑO
                                borrarcarpeta('../../micuenta/archivomicuenta/' . $idDocumento);  //Borra la carpeta con el id 
                                mkdir('../../micuenta/archivomicuenta/' . $idDocumento . '/', 0777, true); //la vuelve a crear
                                move_uploaded_file($archivo['tmp_name'], '../../micuenta/archivomicuenta/' . $idDocumento . '/' . $nombre_archivo); //inserta la imagen
                            }
                            echo 5; //Se edito correctamente
                            return;
                        }
                    } else {
                        echo 6; //El formato del archivo no es válido
                        return;
                    }
                }
            }
        }
        else{
            echo 7;
            return;
        }

        mysqli_close($mysqli);
    } else if ($seleccion == 5) { //Activar documento

        if ($_POST['tipoBTN'] == 1) {
            $idbtn = solonumeros($_POST['idbtn']);

            if (validavacioenarreglo(array($idbtn))) {
                echo 1;
                return;
            }

            $sqlconsulta = mysqli_query($mysqli, "SELECT archivo_documentos FROM documentos WHERE id_documentos='$idbtn' and estado_documentos=1"); //or die(mysqli_error($mysqli)
            $contador = mysqli_num_rows($sqlconsulta);

            if ($contador >= 1) {
                echo 2;
                return;
            }

            $sqlactivar = "UPDATE documentos set estado_documentos=1 WHERE id_documentos='$idbtn'";
            $res = mysqli_query($mysqli, $sqlactivar);

            if (!$res) {
                echo 3; //error en la consulta
                return;
            }
            echo 4; //Exito
            return;
        } else if ($_POST['tipoBTN'] == 2) { //Inactivar Documento
            $idbtn = solonumeros($_POST['idbtn']);

            if (validavacioenarreglo(array($idbtn))) {
                echo 1;
                return;
            }

            $sqlconsulta = mysqli_query($mysqli, "SELECT archivo_documentos FROM documentos WHERE id_documentos='$idbtn' and estado_documentos=0"); //or die(mysqli_error($mysqli)
            $contador = mysqli_num_rows($sqlconsulta);

            if ($contador >= 1) {
                echo 2;
                return;
            }

            $sqlInactivo = "UPDATE documentos set estado_documentos=0 WHERE id_documentos='$idbtn'";
            $res = mysqli_query($mysqli, $sqlInactivo);

            if (!$res) {
                echo 3; //error en la consulta
                return;
            }

            echo 4; //Exito
            return;
        }
    } else if ($seleccion == 6) { //Inactivar documento

        if (isset($_POST['rutusuarioin'])) {
            $rut_us_inct = $_POST['rutusuarioin'];

            $sql2 = "UPDATE usuario SET estado_usuario = 1 WHERE rut='$rut_us_inct'";
            $respuesta2 = mysqli_query($mysqli, $sql2);

            if (!$respuesta2) {
                echo  0;
                return;
            } else {  //se activo correctamente
                echo 1;
                return;
            }
        } else {
            echo 2;
            return;
        }
    } else if ($seleccion == 7) { //Eliminar documento

        if(isset($_POST['iddocumento'])){
            $ID = solonumeros($_POST['iddocumento']);
        
            if (validavacioenarreglo(array($ID))) {
                echo 1;
                return;
            }
            //DELETE FROM tabla WHERE id = 3 AND EXISTS(SELECT id FROM tabla WHERE id = 3 LIMIT 1)
            $sql = "DELETE FROM documentos WHERE id_documentos='$ID'";
            $res = mysqli_query($mysqli, $sql);
        
            if(!$res){
                echo 2; // ha ocurrido un error al eliminar el documento
                return;
            }
            else{
                if (!is_dir('../../micuenta/archivomicuenta/'. $ID)) { //Si no existe el directorio 
                    echo 3;
                    return;
                }
                else{
                    borrarcarpeta('../../micuenta/archivomicuenta/'. $ID);  //Borra la carpeta con el id 
                    echo 4;
                    return;
                }   
            }
        }
        else{
            echo 5;
            return;
        }
        mysqli_close($mysqli);

    } else if ($seleccion == 8) { //Enviar notificacion

        date_default_timezone_set("America/Santiago");
        setlocale(LC_TIME, "spanish");
        $fechanotificacion = strftime("%H:%M | %d de %B, %Y");
        // 04 de septiembre, 2029 
        //%H=Hora, %M=Minuto, %A= dia de la semana, %d= numero del dia,  %B=nombre del mes,   %Y= numero del año

        if (isset($_POST['paratodos']) && isset($_POST['n_descripcion'])) { //mensaje para todos
            if ($_POST['paratodos'] == 'todos') {
                $descripcion = soloCaractDeConversacion($_POST['n_descripcion']);

                if (validavacioenarreglo(array($descripcion))) {
                    echo 11;
                    return;
                }
                $mostrar_rut_usuarios = mysqli_query($mysqli, "SELECT rut FROM usuario WHERE estado_usuario=1"); //Muestra todos los rut de los usuarios

                if (!$mostrar_rut_usuarios) {
                    echo 1; //Ha ocurrido un error
                    return;
                } else {
                    while ($fila = mysqli_fetch_array($mostrar_rut_usuarios)) { //le envio a todos los usuarios la notificacion, mediante el ciclo
                        $rutusuario = $fila['rut'];
                        mysqli_query($mysqli, "INSERT INTO notificacion (id_notificacion,
                        rut,
                        mensaje_notificacion,
                        fecha_notificacion,
                        estado_notificacion) 
                        VALUES (NULL,
                        '$rutusuario',
                        '$descripcion',
                        '$fechanotificacion',
                        'novisto')");
                    }
                    echo 2;
                    return;
                }
            }
        } else if (isset($_POST['n_rut']) && isset($_POST['n_descripcion'])) {

            $rut = validarut($_POST['n_rut']);
            $descripcion = soloCaractDeConversacion($_POST['n_descripcion']);

            if (validavacioenarreglo(array($rut, $descripcion))) {
                echo 11;
                return;
            }

            $consulta = "INSERT INTO notificacion (id_notificacion,
            rut,
            mensaje_notificacion,
            fecha_notificacion,
            estado_notificacion) 
            VALUES (NULL,
            '$rut',
            '$descripcion',
            '$fechanotificacion',
            'novisto')";

            if (mysqli_query($mysqli, $consulta)) {
                echo 3;  //Consulta exitosa, notificacion enviada
                return;
            } else {
                echo 4;  //Error en la consulta
                return;
            }
        }
    } else if ($seleccion == 9) { //Limpiar notificacion

        if (isset($_POST["TB"])) {

            $sqelito = mysqli_query($mysqli, "SELECT COUNT(*) as contador FROM notificacion");
            $versiestavacia = mysqli_fetch_array($sqelito);

            if ($versiestavacia['contador'] == 0) {
                echo 1;
                return;
            } else {
                if ($_POST['TB'] == 1) {
                    $sql = "DELETE FROM notificacion";
                    $respuesta = mysqli_query($mysqli, $sql);
                    if (!$respuesta) {
                        echo 2;
                        return;
                    } else {
                        echo 3;
                        return;
                    }
                } else {
                    echo 4;
                    return;
                }
            }
        } else {
            echo 4; //No se recibieron parámetros
        }

        mysqli_close($mysqli);
    }
} else {
    echo 444;
    return;
}
