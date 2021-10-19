<?php
include '../../conexion/conexion.php';
include '../../funcionesphp/limpiarCampo.php';
include '../../funcionesphp/TOUTF8.php';
include '../../funcionesphp/borrarcarpeta.php';
date_default_timezone_set("America/Santiago");
setlocale(LC_TIME, "spanish");
session_start();
$rutsesion = $_SESSION['sesionCESFAM']['rut'];
$rol = $_SESSION['sesionCESFAM']['id_rol'];
$fechadehoy = strftime("%F");

if (isset($_POST['seleccionar'])) {
    $seleccion = $_POST['seleccionar'];
    if ($seleccion == 1) {

        if ($rol == 7 || $rol == 8) {
            $sql = "SELECT DISTINCT spe.id_spe, pe.id_pe, pe.rut, cm.nombre_comuna, mpe.descripcion_mpe, us.nombre_usuario, pe.fecha_permiso_pe, 
            pe.horainicio_pe, pe.horatermino_pe, pe.fecha_actual_pe
            FROM permiso_especial pe, comuna cm, motivo_pe mpe, usuario us,solicitud_permiso_especial spe
            WHERE pe.id_comuna=cm.id_comuna and pe.id_mpe=mpe.id_mpe and pe.rut=us.rut and pe.id_pe=spe.id_pe and spe.id_etapas_spe=1 and (spe.id_decision_spe=1) and NOT EXISTS (SELECT 1 
            FROM solicitud_permiso_especial t2 WHERE t2.id_pe = pe.id_pe and t2.id_etapas_spe = 2)";
            $consulta = mysqli_query($mysqli, $sql);
            $datos1 = array();
            while ($fila = mysqli_fetch_array($consulta)) {
                $datos1[] = array(
                    'ID_SPE' => $fila["id_spe"],
                    'ID_PE' => $fila["id_pe"],
                    'RUT' => $fila["rut"],
                    'NOMBRE_COMUNA' => $fila["nombre_comuna"],
                    'MOTIVO' => $fila["descripcion_mpe"],
                    'NOMBRE_FUNCIONARIO_SOLICITANTE' => $fila["nombre_usuario"],
                    'FECHA_SOLICITUD' => $fila["fecha_actual_pe"],
                    'FECHA_PERMISO' => $fila["fecha_permiso_pe"],
                    'HORA_INICIO' => $fila["horainicio_pe"],
                    'HORA_TERMINO' => $fila["horatermino_pe"]
                );
            }
            if (empty($datos1)) {
                echo 1;
                return;
            } else {
                echo json_encode($datos1);
                return;
            }
        } else if ($rol == 12) {
            $sql = "SELECT DISTINCT spe.id_spe, pe.id_pe,pe.rut, cm.nombre_comuna, mpe.descripcion_mpe, us.nombre_usuario, pe.fecha_permiso_pe, 
            pe.horainicio_pe, pe.horatermino_pe, pe.fecha_actual_pe
            FROM permiso_especial pe, comuna cm, motivo_pe mpe, usuario us,solicitud_permiso_especial spe
            WHERE pe.id_comuna=cm.id_comuna and pe.id_mpe=mpe.id_mpe and pe.rut=us.rut and pe.id_pe=spe.id_pe and spe.id_etapas_spe=2 and (spe.id_decision_spe=1) and NOT EXISTS (SELECT 1 
            FROM solicitud_permiso_especial t2 WHERE t2.id_pe = pe.id_pe and t2.id_etapas_spe = 3)";
            $consulta = mysqli_query($mysqli, $sql);
            $datos2 = array();
            while ($fila = mysqli_fetch_array($consulta)) {
                $datos2[] = array(
                    'ID_SPE' => $fila["id_spe"],
                    'ID_PE' => $fila["id_pe"],
                    'RUT' => $fila["rut"],
                    'NOMBRE_COMUNA' => $fila["nombre_comuna"],
                    'MOTIVO' => $fila["descripcion_mpe"],
                    'NOMBRE_FUNCIONARIO_SOLICITANTE' => $fila["nombre_usuario"],
                    'FECHA_SOLICITUD' => $fila["fecha_actual_pe"],
                    'FECHA_PERMISO' => $fila["fecha_permiso_pe"],
                    'HORA_INICIO' => $fila["horainicio_pe"],
                    'HORA_TERMINO' => $fila["horatermino_pe"]
                );
            }
            if (count($datos2) == 0) {
                echo 1;
                return;
            } else {
                echo json_encode($datos2);
                return;
            }
        } else if ($rol == 13) {
            $sql = "SELECT DISTINCT spe.id_spe, pe.id_pe,pe.rut, cm.nombre_comuna, mpe.descripcion_mpe, us.nombre_usuario, pe.fecha_permiso_pe, 
            pe.horainicio_pe, pe.horatermino_pe, pe.fecha_actual_pe
            FROM permiso_especial pe, comuna cm, motivo_pe mpe, usuario us,solicitud_permiso_especial spe
            WHERE pe.id_comuna=cm.id_comuna and pe.id_mpe=mpe.id_mpe and pe.rut=us.rut and pe.id_pe=spe.id_pe and spe.id_etapas_spe=3 and (spe.id_decision_spe=1) and NOT EXISTS (SELECT 1 
            FROM solicitud_permiso_especial t2 WHERE t2.id_pe = pe.id_pe and t2.id_etapas_spe = 4)";
            $consulta = mysqli_query($mysqli, $sql);
            $datos2 = array();
            while ($fila = mysqli_fetch_array($consulta)) {
                $datos2[] = array(
                    'ID_SPE' => $fila["id_spe"],
                    'ID_PE' => $fila["id_pe"],
                    'RUT' => $fila["rut"],
                    'NOMBRE_COMUNA' => $fila["nombre_comuna"],
                    'MOTIVO' => $fila["descripcion_mpe"],
                    'NOMBRE_FUNCIONARIO_SOLICITANTE' => $fila["nombre_usuario"],
                    'FECHA_SOLICITUD' => $fila["fecha_actual_pe"],
                    'FECHA_PERMISO' => $fila["fecha_permiso_pe"],
                    'HORA_INICIO' => $fila["horainicio_pe"],
                    'HORA_TERMINO' => $fila["horatermino_pe"]
                );
            }
            if (empty($datos2)) {
                echo 1;
                return;
            } else {
                echo json_encode($datos2);
                return;
            }
        }
        // header('Content-type: application/json');

        mysqli_close($mysqli);
    } else if ($seleccion == 2) {
        if (isset($_POST["decision"]) && isset($_POST["id_pe"]) && isset($_POST["comentario"]) && isset($_POST["existefirma"])) {
            $decision = solonumeros($_POST["decision"]);
            $id_pe = solonumeros($_POST["id_pe"]);
            $comentario = numerosyletras($_POST["comentario"]);
            $existefirma = sololetras($_POST["existefirma"]);


            if ($rol == 7 || $rol == 8) {
                $sql1 = "SELECT id_spe FROM solicitud_permiso_especial WHERE id_pe='$id_pe' AND id_etapas_spe=2";
                $res1 = mysqli_query($mysqli, $sql1);

                if (validavacioenarreglo(array($decision, $id_pe))) { //comentario es opcional asi que no lo valido aquí
                    echo 1;
                    return;
                } else {
                    if (!$res1) {
                        echo 2;
                        return;
                    } else if (mysqli_num_rows($res1) >= 1) { //ya ha sido aprobado por un jefe de sector o jefe de unidad
                        echo 3;
                        return;
                    } else {

                        //En caso de que no se halla recibido la imagen de la firma y que la firma no este registrada en las carpetas
                        if (empty($_FILES["firma"]["name"]) && $existefirma == 'no') {
                            echo 13;
                            return;
                        } else if (!empty($_FILES["firma"]["name"]) && $existefirma == 'no') {

                            $archivo = $_FILES["firma"];
                            $nombre_imagen = $_FILES["firma"]["name"];
                            $tipo = $_FILES["firma"]["type"];

                            if ($_FILES["firma"]['size'] > 20971520) { //tamaño de la imagen de la firma excede los 20MB
                                echo 14;
                                return;
                            } else if ($tipo != "image/png") {
                                // $tipo != "image/jpg" && $tipo != "image/png" &&
                                // $tipo != "image/jpeg" && $tipo != "image/JPG" &&
                                // $tipo != "image/PNG" && $tipo != "image/JPEG" && $tipo != "image/bmp"
                                echo 15;
                                return;
                            } else {

                                $query_imagen_Jefes = "UPDATE usuario SET firma_usuario='$nombre_imagen' WHERE rut='$rutsesion'";
                                $queryres = mysqli_query($mysqli, $query_imagen_Jefes); //Hasta aqui modifico la imagen al usuario que es jefe de sector o Unidad

                                $sql2 = "INSERT INTO solicitud_permiso_especial (id_spe,id_pe,rut,id_decision_spe,id_etapas_spe,observacion_spe,fecha_spe) 
                                        VALUES (NULL,'$id_pe','$rutsesion','$decision', 2 ,'$comentario','$fechadehoy')";
                                $res2 = mysqli_query($mysqli, $sql2); //Hasta aqui inserto la solicitud de permiso especial
                                if (!$res2) {
                                    echo 6;
                                    return;
                                } else {

                                    if (!is_dir('../../perfil/firmas/' . $rutsesion . '/')) { //Si no existe el directorio 
                                        mkdir('../../perfil/firmas/' . $rutsesion . '/', 0777, true); //lo crea
                                        move_uploaded_file($archivo['tmp_name'], '../../perfil/firmas/' . $rutsesion . '/' . $nombre_imagen);
                                    } else {
                                        borrarcarpeta('../../perfil/firmas/' . $rutsesion . '/');  //Borra su contenido
                                        mkdir('../../perfil/firmas/' . $rutsesion . '/', 0777, true); //lo crea nuevamente
                                        move_uploaded_file($archivo['tmp_name'], '../../perfil/firmas/' . $rutsesion . '/' . $nombre_imagen);
                                    }


                                    if ($decision == 1) { //si la decisión fue que aprobo la solicitud el Jefe de Sector o Unidad, genera el certificado
                                        $queryparacertificado = "SELECT spe.id_spe, pe.id_pe,(pe.rut) as rutsolicitante,(spe.rut) as rutrespondido, 
                                        cm.nombre_comuna, mpe.descripcion_mpe, us.nombre_usuario, pe.fecha_permiso_pe, pe.horainicio_pe, 
                                        pe.horatermino_pe, pe.fecha_actual_pe, us.id_sector, us.id_unidad, us.firma_usuario as firmausuariosolicitante
                                        FROM permiso_especial pe, comuna cm, motivo_pe mpe, usuario us,solicitud_permiso_especial spe 
                                        WHERE pe.id_comuna=cm.id_comuna and pe.id_mpe=mpe.id_mpe and pe.rut=us.rut and pe.id_pe=spe.id_pe 
                                        and pe.id_pe='$id_pe' and spe.id_etapas_spe=2";
                                        $res_queryparacertificado = mysqli_query($mysqli, $queryparacertificado);
                                        $fila_certificado = mysqli_fetch_assoc($res_queryparacertificado);

                                        require '../../funcionesphp/fpdf/fpdf.php';
                                        require '../funciones/exportaPDF.php';
                                        $pdf = new FPDF();

                                        $nombreusuario =  $fila_certificado['nombre_usuario'];
                                        $rutsolicitante = $fila_certificado['rutsolicitante'];
                                        $SectoroUnidad = '';

                                        if (($fila_certificado['id_sector'] == NULL) && ($fila_certificado['id_unidad'] == NULL)) {
                                            $SectoroUnidad = 'Ninguna Unidad y Ningún Sector';
                                        } else if ($fila_certificado['id_sector'] != NULL && $fila_certificado['id_unidad'] != NULL) {
                                            $querysector = "SELECT sec.nombre_sector FROM usuario us, sector sec WHERE us.id_sector=sec.id_sector and us.rut='$rutsolicitante'";
                                            $res_sector = mysqli_query($mysqli, $querysector);
                                            $fila_sector = mysqli_fetch_assoc($res_sector);
                                            $queryunidad = "SELECT uni.nombre_unidad FROM usuario us, unidad uni WHERE us.id_unidad=uni.id_unidad and us.rut='$rutsolicitante'";
                                            $res_unidad = mysqli_query($mysqli, $queryunidad);
                                            $fila_unidad = mysqli_fetch_assoc($res_unidad);
                                            $SectoroUnidad = $fila_sector['nombre_sector'] . ' y ' . $fila_unidad['nombre_unidad'];
                                        } else if ($fila_certificado['id_sector'] == NULL && $fila_certificado['id_unidad'] != NULL) {
                                            $queryunidad = "SELECT uni.nombre_unidad FROM usuario us, unidad uni WHERE us.id_unidad=uni.id_unidad and us.rut='$rutsolicitante'";
                                            $res_unidad = mysqli_query($mysqli, $queryunidad);
                                            $fila_unidad = mysqli_fetch_assoc($res_unidad);
                                            $SectoroUnidad = $fila_unidad['nombre_unidad'];
                                        } else {
                                            $querysector = "SELECT sec.nombre_sector FROM usuario us, sector sec WHERE us.id_sector=sec.id_sector and us.rut='$rutsolicitante'";
                                            $res_sector = mysqli_query($mysqli, $querysector);
                                            $fila_sector = mysqli_fetch_assoc($res_sector);
                                            $SectoroUnidad = $fila_sector['nombre_sector'];
                                        }


                                        $motivo = $fila_certificado['descripcion_mpe'];
                                        $comuna = $fila_certificado['nombre_comuna'];

                                        $porciones = explode("-", $fila_certificado['fecha_permiso_pe']);
                                        $diamesano = $porciones[2] . '-' . $porciones[1] . '-' . $porciones[0];
                                        $horainicio = $fila_certificado['horainicio_pe'];
                                        $horatermino = $fila_certificado['horatermino_pe'];


                                        $imagenfirmasolicitante = $fila_certificado['firmausuariosolicitante'];
                                        $rutdeJSectorOUnidad = $fila_certificado['rutrespondido'];

                                        $queryfirmausuarioJSectoroUnidad = "SELECT firma_usuario FROM usuario  WHERE rut='$rutdeJSectorOUnidad'";
                                        $res_usuarioJSectoroUnidad = mysqli_query($mysqli, $queryfirmausuarioJSectoroUnidad);
                                        $fila_usuarioJSectoroUnidad = mysqli_fetch_assoc($res_usuarioJSectoroUnidad);
                                        $imagenfirmadeJSectoroUnidad = $fila_usuarioJSectoroUnidad['firma_usuario'];

                                        obtienedatos($pdf, $rutsolicitante, $nombreusuario, $SectoroUnidad, $motivo, $comuna, $diamesano, $horainicio, $horatermino, $imagenfirmasolicitante, $imagenfirmadeJSectoroUnidad, $rutdeJSectorOUnidad);

                                        if (!is_dir('../CERTIFICADO_SOLICITUDES/' . $rutsolicitante . '-' . $id_pe . '/')) { //Si no existe el directorio 
                                            mkdir('../CERTIFICADO_SOLICITUDES/' . $rutsolicitante . '-' . $id_pe . '/', 0777, true); //lo crea
                                            $pdf->Output('../CERTIFICADO_SOLICITUDES/' . $rutsolicitante . '-' . $id_pe . '/' . 'SPE.pdf', 'F');
                                        } else {
                                            borrarcarpeta('../CERTIFICADO_SOLICITUDES/' . $rutsolicitante . '-' . $id_pe . '/');  //Borra su contenido
                                            mkdir('../CERTIFICADO_SOLICITUDES/' . $rutsolicitante . '-' . $id_pe . '/', 0777, true); //lo crea nuevamente
                                            $pdf->Output('../CERTIFICADO_SOLICITUDES/' . $rutsolicitante . '-' . $id_pe . '/' . 'SPE.pdf', 'F');
                                        }
                                    }
                                    echo 7;
                                    return;
                                }
                            }
                        } else if (empty($_FILES["firma"]["name"]) && $existefirma == 'si') {

                            $sql2 = "INSERT INTO solicitud_permiso_especial (id_spe,id_pe,rut,id_decision_spe,id_etapas_spe,observacion_spe,fecha_spe) 
                                        VALUES (NULL,'$id_pe','$rutsesion','$decision', 2 ,'$comentario','$fechadehoy')";
                            $res2 = mysqli_query($mysqli, $sql2); //Hasta aqui inserto la solicitud de permiso especial
                            if (!$res2) {
                                echo 6;
                                return;
                            } else {

                                if ($decision == 1) { //si la decisión fue que aprobo la solicitud el Jefe de Sector o Unidad, genera el certificado
                                    $queryparacertificado = "SELECT spe.id_spe, pe.id_pe,(pe.rut) as rutsolicitante,(spe.rut) as rutrespondido, 
                                    cm.nombre_comuna, mpe.descripcion_mpe, us.nombre_usuario, pe.fecha_permiso_pe, pe.horainicio_pe, 
                                    pe.horatermino_pe, pe.fecha_actual_pe, us.id_sector,us.id_unidad, us.firma_usuario as firmausuariosolicitante
                                    FROM permiso_especial pe, comuna cm, motivo_pe mpe, usuario us,solicitud_permiso_especial spe 
                                    WHERE pe.id_comuna=cm.id_comuna and pe.id_mpe=mpe.id_mpe and pe.rut=us.rut and pe.id_pe=spe.id_pe 
                                    and pe.id_pe='$id_pe' and spe.id_etapas_spe=2";
                                    $res_queryparacertificado = mysqli_query($mysqli, $queryparacertificado);
                                    $fila_certificado = mysqli_fetch_assoc($res_queryparacertificado);

                                    require '../../funcionesphp/fpdf/fpdf.php';
                                    require '../funciones/exportaPDF.php';
                                    $pdf = new FPDF();

                                    $nombreusuario =  $fila_certificado['nombre_usuario'];
                                    $rutsolicitante = $fila_certificado['rutsolicitante'];
                                    $SectoroUnidad = '';


                                    // if (($fila_certificado['id_sector'] == NULL || $fila_certificado['id_sector'] == 'NULL' || !$fila_certificado['id_sector']) && ($fila_certificado['id_unidad'] == NULL || $fila_certificado['id_unidad'] == 'NULL' || !$fila_certificado['id_unidad'])) {
                                    //     $SectoroUnidad = 'Ninguna Unidad y Ningún Sector';
                                    // } else if ($fila_certificado['id_sector'] == NULL || $fila_certificado['id_sector'] == 'NULL' || !$fila_certificado['id_sector']) {
                                    //     $queryunidad = "SELECT uni.nombre_unidad FROM usuario us, unidad uni WHERE us.id_unidad=uni.id_unidad and us.rut='$rutsolicitante'";
                                    //     $res_unidad = mysqli_query($mysqli, $queryunidad);
                                    //     $fila_unidad = mysqli_fetch_assoc($res_unidad);
                                    //     $SectoroUnidad = $fila_unidad['nombre_unidad'];
                                    // } else {
                                    //     $querysector = "SELECT sec.nombre_sector FROM usuario us, sector sec WHERE us.id_sector=sec.id_sector and us.rut='$rutsolicitante'";
                                    //     $res_sector = mysqli_query($mysqli, $querysector);
                                    //     $fila_sector = mysqli_fetch_assoc($res_sector);
                                    //     $SectoroUnidad = $fila_sector['nombre_sector'];
                                    // }

                                    if (($fila_certificado['id_sector'] == NULL) && ($fila_certificado['id_unidad'] == NULL)) {
                                        $SectoroUnidad = 'Ninguna Unidad y Ningún Sector';
                                    } else if ($fila_certificado['id_sector'] != NULL && $fila_certificado['id_unidad'] != NULL) {
                                        $querysector = "SELECT sec.nombre_sector FROM usuario us, sector sec WHERE us.id_sector=sec.id_sector and us.rut='$rutsolicitante'";
                                        $res_sector = mysqli_query($mysqli, $querysector);
                                        $fila_sector = mysqli_fetch_assoc($res_sector);
                                        $queryunidad = "SELECT uni.nombre_unidad FROM usuario us, unidad uni WHERE us.id_unidad=uni.id_unidad and us.rut='$rutsolicitante'";
                                        $res_unidad = mysqli_query($mysqli, $queryunidad);
                                        $fila_unidad = mysqli_fetch_assoc($res_unidad);
                                        $SectoroUnidad = $fila_sector['nombre_sector'] . ' y ' . $fila_unidad['nombre_unidad'];
                                    } else if ($fila_certificado['id_sector'] == NULL && $fila_certificado['id_unidad'] != NULL) {
                                        $queryunidad = "SELECT uni.nombre_unidad FROM usuario us, unidad uni WHERE us.id_unidad=uni.id_unidad and us.rut='$rutsolicitante'";
                                        $res_unidad = mysqli_query($mysqli, $queryunidad);
                                        $fila_unidad = mysqli_fetch_assoc($res_unidad);
                                        $SectoroUnidad = $fila_unidad['nombre_unidad'];
                                    } else {
                                        $querysector = "SELECT sec.nombre_sector FROM usuario us, sector sec WHERE us.id_sector=sec.id_sector and us.rut='$rutsolicitante'";
                                        $res_sector = mysqli_query($mysqli, $querysector);
                                        $fila_sector = mysqli_fetch_assoc($res_sector);
                                        $SectoroUnidad = $fila_sector['nombre_sector'];
                                    }


                                    $motivo = $fila_certificado['descripcion_mpe'];
                                    $comuna = $fila_certificado['nombre_comuna'];

                                    $porciones = explode("-", $fila_certificado['fecha_permiso_pe']);
                                    $diamesano = $porciones[2] . '-' . $porciones[1] . '-' . $porciones[0];
                                    $horainicio = $fila_certificado['horainicio_pe'];
                                    $horatermino = $fila_certificado['horatermino_pe'];

                                    $imagenfirmasolicitante = $fila_certificado['firmausuariosolicitante'];
                                    $rutdeJSectorOUnidad = $fila_certificado['rutrespondido'];

                                    $queryfirmausuarioJSectoroUnidad = "SELECT firma_usuario FROM usuario  WHERE rut='$rutdeJSectorOUnidad'";
                                    $res_usuarioJSectoroUnidad = mysqli_query($mysqli, $queryfirmausuarioJSectoroUnidad);
                                    $fila_usuarioJSectoroUnidad = mysqli_fetch_assoc($res_usuarioJSectoroUnidad);
                                    $imagenfirmadeJSectoroUnidad = $fila_usuarioJSectoroUnidad['firma_usuario'];

                                    obtienedatos($pdf, $rutsolicitante, $nombreusuario, $SectoroUnidad, $motivo, $comuna, $diamesano, $horainicio, $horatermino, $imagenfirmasolicitante, $imagenfirmadeJSectoroUnidad, $rutdeJSectorOUnidad);

                                    if (!is_dir('../CERTIFICADO_SOLICITUDES/' . $rutsolicitante . '-' . $id_pe . '/')) { //Si no existe el directorio 
                                        mkdir('../CERTIFICADO_SOLICITUDES/' . $rutsolicitante . '-' . $id_pe . '/', 0777, true); //lo crea
                                        $pdf->Output('../CERTIFICADO_SOLICITUDES/' . $rutsolicitante . '-' . $id_pe . '/' . 'SPE.pdf', 'F');
                                    } else {
                                        borrarcarpeta('../CERTIFICADO_SOLICITUDES/' . $rutsolicitante . '-' . $id_pe . '/');  //Borra su contenido
                                        mkdir('../CERTIFICADO_SOLICITUDES/' . $rutsolicitante . '-' . $id_pe . '/', 0777, true); //lo crea nuevamente
                                        $pdf->Output('../CERTIFICADO_SOLICITUDES/' . $rutsolicitante . '-' . $id_pe . '/' . 'SPE.pdf', 'F');
                                    }
                                }

                                echo 7;
                                return;
                            }
                        }
                    }
                }
            } else if ($rol == 12) {
                $sql1 = "SELECT id_spe FROM solicitud_permiso_especial WHERE id_pe='$id_pe' AND id_etapas_spe=3";
                $res1 = mysqli_query($mysqli, $sql1);

                if (validavacioenarreglo(array($decision, $id_pe))) { //comentario es opcional asi que no lo valido aquí
                    echo 1;
                    return;
                } else {
                    if (!$res1) {
                        echo 2;
                        return;
                    } else if (mysqli_num_rows($res1) >= 1) { //ya ha sido aprobado por el encargado(a) de personal
                        echo 4;
                        return;
                    } else {
                        $sql2 = "INSERT INTO solicitud_permiso_especial (id_spe,id_pe,rut,id_decision_spe,id_etapas_spe,observacion_spe,fecha_spe) 
                    VALUES (NULL,'$id_pe','$rutsesion','$decision', 3 ,'$comentario','$fechadehoy')";
                        $res2 = mysqli_query($mysqli, $sql2); //Hasta aqui inserto la patologia
                        if (!$res2) {
                            echo 8;
                            return;
                        } else {
                            echo 9;
                            return;
                        }
                    }
                }
            } else if ($rol == 13) {
                $sql1 = "SELECT id_spe FROM solicitud_permiso_especial WHERE id_pe='$id_pe' AND id_etapas_spe=4";
                $res1 = mysqli_query($mysqli, $sql1);

                if (validavacioenarreglo(array($decision, $id_pe))) { //comentario es opcional asi que no lo valido aquí
                    echo 1;
                    return;
                } else {
                    if (!$res1) {
                        echo 2;
                        return;
                    } else if (mysqli_num_rows($res1) >= 1) { //ya ha sido aprobado por el jefe sistema de salud
                        echo 5;
                        return;
                    } else {
                        $sql2 = "INSERT INTO solicitud_permiso_especial (id_spe,id_pe,rut,id_decision_spe,id_etapas_spe,observacion_spe,fecha_spe) 
                    VALUES (NULL,'$id_pe','$rutsesion','$decision', 4 ,'$comentario','$fechadehoy')";
                        $res2 = mysqli_query($mysqli, $sql2); //Hasta aqui inserto la patologia
                        if (!$res2) {
                            echo 10;
                            return;
                        } else {
                            echo 11;
                            return;
                        }
                    }
                }
            }
        } else {
            echo 12;
            return;
        }
    } else if ($seleccion == 3) {

        /*
        MOSTRAR EL PERMISO QUE TENGA UNA SOLICITUD DE PERMISO APROBADA POR EL ENCARGADO DE
        PERSONAL Y QUE ADEMÁS ESTÉ APROBADO POR EL JEFE DE SISTEMA DE SALUD
        SELECT spe.id_spe, pe.id_pe,pe.rut, cm.nombre_comuna, mpe.descripcion_mpe, us.nombre_usuario, pe.fecha_permiso_pe, 
        pe.horainicio_pe, pe.horatermino_pe, pe.fecha_actual_pe
        FROM permiso_especial pe, comuna cm, motivo_pe mpe, usuario us,solicitud_permiso_especial spe
        WHERE pe.id_comuna=cm.id_comuna and pe.id_mpe=mpe.id_mpe and pe.rut=us.rut and pe.id_pe=spe.id_pe and spe.id_etapas_spe=3 and spe.id_decision_spe=1 and EXISTS (SELECT 1 
        FROM solicitud_permiso_especial t2 WHERE t2.id_pe = pe.id_pe and t2.id_etapas_spe = 4 and t2.id_decision_spe=1) 
        */

        if ($rol == 12) {
            /* MOSTRAR EL PERMISO QUE TENGA UNA SOLICITUD DE PERMISO APROBADA POR EL ENCARGADO DE
        PERSONAL*/
            $sql = "SELECT spe.id_spe, pe.id_pe,pe.rut, cm.nombre_comuna, mpe.descripcion_mpe, us.nombre_usuario, pe.fecha_permiso_pe, 
        pe.horainicio_pe, pe.horatermino_pe, pe.fecha_actual_pe
        FROM permiso_especial pe, comuna cm, motivo_pe mpe, usuario us,solicitud_permiso_especial spe
        WHERE pe.id_comuna=cm.id_comuna and pe.id_mpe=mpe.id_mpe and pe.rut=us.rut and pe.id_pe=spe.id_pe and spe.id_etapas_spe=3 and spe.id_decision_spe=1 and EXISTS (SELECT 1 
        FROM solicitud_permiso_especial t2 WHERE t2.id_pe = pe.id_pe and t2.id_decision_spe=1)";
            $consulta = mysqli_query($mysqli, $sql);
            $datos = array();
            while ($fila = mysqli_fetch_array($consulta)) {
                $datos[] = array(
                    'ID_SPE' => $fila["id_spe"],
                    'ID_PE' => $fila["id_pe"],
                    'RUT' => $fila["rut"],
                    'NOMBRE_COMUNA' => $fila["nombre_comuna"],
                    'MOTIVO' => $fila["descripcion_mpe"],
                    'NOMBRE_FUNCIONARIO_SOLICITANTE' => $fila["nombre_usuario"],
                    'FECHA_SOLICITUD' => $fila["fecha_actual_pe"],
                    'FECHA_PERMISO' => $fila["fecha_permiso_pe"],
                    'HORA_INICIO' => $fila["horainicio_pe"],
                    'HORA_TERMINO' => $fila["horatermino_pe"]
                );
            }
        } else if ($rol == 13) {
            /* MOSTRAR EL PERMISO QUE TENGA UNA SOLICITUD DE PERMISO APROBADA POR EL JEFE SISTEMA SALUD*/
            $sql = "SELECT spe.id_spe, pe.id_pe,pe.rut, cm.nombre_comuna, mpe.descripcion_mpe, us.nombre_usuario, pe.fecha_permiso_pe, 
        pe.horainicio_pe, pe.horatermino_pe, pe.fecha_actual_pe
        FROM permiso_especial pe, comuna cm, motivo_pe mpe, usuario us,solicitud_permiso_especial spe
        WHERE pe.id_comuna=cm.id_comuna and pe.id_mpe=mpe.id_mpe and pe.rut=us.rut and pe.id_pe=spe.id_pe and spe.id_etapas_spe=4 and spe.id_decision_spe=1 and EXISTS (SELECT 1 
        FROM solicitud_permiso_especial t2 WHERE t2.id_pe = pe.id_pe and t2.id_decision_spe=1)";
            $consulta = mysqli_query($mysqli, $sql);
            $datos = array();
            while ($fila = mysqli_fetch_array($consulta)) {
                $datos[] = array(
                    'ID_SPE' => $fila["id_spe"],
                    'ID_PE' => $fila["id_pe"],
                    'RUT' => $fila["rut"],
                    'NOMBRE_COMUNA' => $fila["nombre_comuna"],
                    'MOTIVO' => $fila["descripcion_mpe"],
                    'NOMBRE_FUNCIONARIO_SOLICITANTE' => $fila["nombre_usuario"],
                    'FECHA_SOLICITUD' => $fila["fecha_actual_pe"],
                    'FECHA_PERMISO' => $fila["fecha_permiso_pe"],
                    'HORA_INICIO' => $fila["horainicio_pe"],
                    'HORA_TERMINO' => $fila["horatermino_pe"]
                );
            }
        } else {
            $datos = '';
        }
        if (empty($datos)) {
            echo 1;
            return;
        } else {
            echo json_encode($datos);
            return;
        }
    }
}
