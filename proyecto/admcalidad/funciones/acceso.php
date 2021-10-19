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

        $sql = "SELECT id_calidad,descripcion_calidad,archivo_calidad,estado_calidad FROM calidad";
        $consulta = mysqli_query($mysqli, $sql);

        $datos = array();
        while ($fila = mysqli_fetch_array($consulta)) {
            $datos[] = array(
                'ID_CALIDAD' => $fila["id_calidad"],
                'ARCHIVO_CALIDAD' => $fila["archivo_calidad"],
                'DESCRIPCION_CALIDAD' => $fila["descripcion_calidad"],
                'ESTADO_CALIDAD' => $fila["estado_calidad"]
            );
        }
        // print json_encode($datos);
        header('Content-type: application/json');
        echo json_encode($datos); //toutf8()
        mysqli_close($mysqli);
    } else if ($seleccion == 2) { //activar e inactivar archivo

        if ($_POST['tipoBTN'] == 1) {
            $idbtn = solonumeros($_POST['idbtn']);

            if (validavacioenarreglo(array($idbtn))) {
                echo 1;
                return;
            }

            $sqlconsulta = mysqli_query($mysqli, "SELECT id_calidad FROM calidad WHERE id_calidad='$idbtn' and estado_calidad=1"); //or die(mysqli_error($mysqli)
            $contador = mysqli_num_rows($sqlconsulta);

            if ($contador >= 1) {
                echo 2;
                return;
            }

            $sqlactivar = "UPDATE calidad set estado_calidad=1 WHERE id_calidad='$idbtn'";
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

            $sqlconsulta = mysqli_query($mysqli, "SELECT id_calidad FROM calidad WHERE id_calidad='$idbtn' and estado_calidad=0"); //or die(mysqli_error($mysqli)
            $contador = mysqli_num_rows($sqlconsulta);

            if ($contador >= 1) {
                echo 2;
                return;
            }

            $sqlInactivo = "UPDATE calidad set estado_calidad=0 WHERE id_calidad='$idbtn'";
            $res = mysqli_query($mysqli, $sqlInactivo);

            if (!$res) {
                echo 3; //error en la consulta
                return;
            }

            echo 4; //Exito
            return;
        }
        mysqli_close($mysqli);

    } else if ($seleccion == 3) { //registrar archivo
        if (isset($_FILES["archivo_calidad"]["name"]) && isset($_POST['descripcion_calidad'])) {

            $descripcion = soloCaractDeConversacion($_POST['descripcion_calidad']);
            $estado = 1; //Activo por defecto

            $archivo = $_FILES["archivo_calidad"];
            $nombre_archivo = $archivo['name'];
            $tipo = $archivo['type'];
            $tamaño_archivo = $archivo['size'];

            if (validavacioenarreglo(array($descripcion, $archivo))) {
                echo 11;
                return;
            } else {

                if ($tamaño_archivo > 20971520) { //Tamaño excedido de 20 MB
                    echo 1; //Se excedio 
                    return;
                }
                //Formato
                if ($tipo == "image/jpg" || $tipo == "image/png" || $tipo == "image/jpeg" || $tipo == "image/JPG" || $tipo == "image/PNG" || $tipo == "image/JPEG" || $tipo == "application/pdf") {

                    $sql1 = "INSERT INTO calidad (id_calidad,rut,descripcion_calidad,archivo_calidad,estado_calidad) VALUES (NULL,'$rutsesion','$descripcion','$nombre_archivo','$estado')";
                    $resultado_2 = mysqli_query($mysqli, $sql1); //Hasta aqui inserto un documento

                    if (!$resultado_2) {
                        echo 2; //Error al insertar archivo
                        return;
                        // die("error " . mysqli_error($mysqli));
                    } else {
                        $sql2 = "SELECT MAX(id_calidad) AS identificador FROM calidad"; //Muestro el último articulo insertado en la consulta anterior
                        $resultado_3 = mysqli_query($mysqli, $sql2);

                        if (!$resultado_3) {
                            echo 3; //Error al mostrar el último id
                            return;
                        } else {
                            while ($fila = mysqli_fetch_array($resultado_3)) {
                                $IDdocumento = $fila["identificador"];
                            }

                            if (!is_dir('../../uscalidad/CalidadArchivo/' . $IDdocumento . '/')) { //Si no existe el directorio 
                                mkdir('../../uscalidad/CalidadArchivo/' . $IDdocumento . '/', 0777, true); //lo crea
                            }
                            move_uploaded_file($archivo['tmp_name'], '../../uscalidad/CalidadArchivo/' . $IDdocumento . '/' . $nombre_archivo);

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
    }else if ($seleccion == 4) { //editar archivo

        if (isset($_POST['id_modal_editar']) && isset($_POST['descripcion_modal_editar'])) {

            $idArchivo = solonumeros($_POST['id_modal_editar']);
            $descripcion = soloCaractDeConversacion($_POST['descripcion_modal_editar']);
            $estado = 1; //Activo por defecto
            $verificar_archivo;

            if ($_FILES["archivo_modal_editar"]['type'] == null) {
                $verificar_archivo = false;
            } else {
                $archivo = $_FILES["archivo_modal_editar"];
                $nombre_archivo = $archivo['name'];
                $tipo = $archivo['type'];
                $tamañoarchivo = $archivo['size'];
                $verificar_archivo = true;

                if ($tamañoarchivo > 20971520) { //Tamaño excedido de 20 MB
                    echo 1; //Se excedio 
                    return;
                }
            }

            if (validavacioenarreglo(array($idArchivo, $descripcion, $estado))) {
                echo 11;
                return;
            } else {
                if (!$verificar_archivo) { //EDITA SIN EL ARCHIVO
                    $sql1 = "UPDATE calidad SET descripcion_calidad='$descripcion' WHERE id_calidad='$idArchivo'";
                    $resultado_2 = mysqli_query($mysqli, $sql1); 

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

                        $sql2 = "UPDATE calidad SET archivo_calidad='$nombre_archivo',descripcion_calidad='$descripcion' WHERE id_calidad='$idArchivo'";
                        $resultado_3 = mysqli_query($mysqli, $sql2); 

                        if (!$resultado_3) {
                            echo 4; //Error al editar archivo
                            // die("error:" . mysqli_error($mysqli));
                            return;
                        } else {

                            if (!is_dir('../../uscalidad/CalidadArchivo/' . $idArchivo . '/')) { //Si no existe el directorio 
                                mkdir('../../uscalidad/CalidadArchivo/' . $idArchivo . '/', 0777, true); //lo crea
                                move_uploaded_file($archivo['tmp_name'], '../../uscalidad/CalidadArchivo/' . $idArchivo . '/' . $nombre_archivo);
                            } else {
                                // BORRA PORQUE SINO, SE VA ACUMULANDO LOS ARCHIVOS EN LA CARPETA, ENTONCES PARA AHORRAR ESPACIO Y TAMAÑO
                                borrarcarpeta('../../uscalidad/CalidadArchivo/' . $idArchivo);  //Borra la carpeta con el id 
                                mkdir('../../uscalidad/CalidadArchivo/' . $idArchivo . '/', 0777, true); //la vuelve a crear
                                move_uploaded_file($archivo['tmp_name'], '../../uscalidad/CalidadArchivo/' . $idArchivo . '/' . $nombre_archivo); //inserta la imagen
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
        } else {
            echo 7;
            return;
        }

        mysqli_close($mysqli);
    } else if ($seleccion == 5) { //borrar archivo
        if (isset($_POST['idcalidad'])) {
            $ID = solonumeros($_POST['idcalidad']);

            if (validavacioenarreglo(array($ID))) {
                echo 1;
                return;
            }
            $sql = "DELETE FROM calidad WHERE id_calidad='$ID'";
            $res = mysqli_query($mysqli, $sql);

            if (!$res) {
                echo 2; // ha ocurrido un error al eliminar el archivo
                return;
            } else {
                if (!is_dir('../../uscalidad/CalidadArchivo/' . $ID)) { //Si no existe el directorio 
                    echo 3;
                    return;
                } else {
                    borrarcarpeta('../../uscalidad/CalidadArchivo/' . $ID);  //Borra la carpeta con el id 
                    echo 4;
                    return;
                }
            }
        } else {
            echo 5;
            return;
        }
        mysqli_close($mysqli);
    }
} else {
    echo 444;
    return;
}
