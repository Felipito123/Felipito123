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

        if ($rol == 7 || $rol == 8 ||  $rol == 11  || $rol == 15) {
            $sql = "SELECT DISTINCT sfl.id_sfl, pfl.id_pfl, pfl.rut_solicitante, pfl.rut_reemplazo,
            us.nombre_usuario, pfl.fecha_permiso_pfl, pfl.fecha_registro_pfl
            FROM permiso_feriado_legal pfl, usuario us,solicitud_feriado_legal sfl
            WHERE pfl.rut_solicitante=us.rut and pfl.id_pfl=sfl.id_pfl and sfl.id_etapas_sfl=1 and (sfl.id_decision_sfl=1) and NOT EXISTS (SELECT 1 
            FROM solicitud_feriado_legal t2 WHERE t2.id_pfl = pfl.id_pfl and t2.id_etapas_sfl = 2)";
            $consulta = mysqli_query($mysqli, $sql);

            if (!$consulta) {
                echo 1;
                return;
            } else {

                $datos1 = array();
                while ($fila = mysqli_fetch_array($consulta)) {
                    $rut_reemplazante = $fila["rut_reemplazo"];
                    $sql2 = "SELECT nombre_usuario FROM usuario WHERE rut='$rut_reemplazante'";
                    $consulta2 = mysqli_query($mysqli, $sql2);
                    $fila_buscar = mysqli_fetch_assoc($consulta2);
                    $nombre_reemplazante = $fila_buscar['nombre_usuario'];
                    // 'TIPO_DIA'              => $fila["descripcion_tipo_dia"],
                    // 'MOTIVO'                => $fila["motivo_pa"],
                    $datos1[] = array(
                        'ID_SFL'                => $fila["id_sfl"],
                        'ID_PLF'                => $fila["id_pfl"],
                        'RUT_SOLICITANTE'       => $fila["rut_solicitante"],
                        'RUT_REEMPLAZO'         => $fila["rut_reemplazo"],
                        'NOMBRE_SOLICITANTE'    => $fila["nombre_usuario"],
                        'NOMBRE_REEMPLAZANTE'   => $nombre_reemplazante,
                        'FECHA_SOLICITUD'       => $fila["fecha_registro_pfl"],
                        'FECHA_PERMISO'         => $fila["fecha_permiso_pfl"]
                    );
                }
                $contardatos = count($datos1);
                if (empty($datos1) || $contardatos == 0) {
                    echo 1;
                    return;
                } else {
                    echo json_encode($datos1);
                    return;
                }
            }
        } else if ($rol == 12) {
            $sql = "SELECT DISTINCT sfl.id_sfl, pfl.id_pfl, pfl.rut_solicitante, pfl.rut_reemplazo,
            us.nombre_usuario, pfl.fecha_permiso_pfl, pfl.fecha_registro_pfl
            FROM permiso_feriado_legal pfl, usuario us,solicitud_feriado_legal sfl
            WHERE pfl.rut_solicitante=us.rut and pfl.id_pfl=sfl.id_pfl and sfl.id_etapas_sfl=2 and (sfl.id_decision_sfl=1) and NOT EXISTS (SELECT 1 
            FROM solicitud_feriado_legal t2 WHERE t2.id_pfl = pfl.id_pfl and t2.id_etapas_sfl = 3)";

            // SELECT DISTINCT spa.id_spa, pa.id_pa, pa.rut_solicitante, pa.rut_reemplazo,tipd.descripcion_tipo_dia, pa.motivo_pa, 
            //             us.nombre_usuario, pa.fecha_pa, pa.fecha_actual_pa
            //             FROM permiso_administrativo pa, usuario us,solicitud_permiso_administrativo spa, tipo_dia tipd
            //             WHERE pa.rut_solicitante=us.rut and pa.id_pa=spa.id_pa and pa.id_tipo_dia=tipd.id_tipo_dia and spa.id_etapas_spa=2 and (spa.id_decision_spa=1) and NOT EXISTS (SELECT 1 
            //             FROM solicitud_permiso_administrativo t2 WHERE t2.id_pa = pa.id_pa and t2.id_etapas_spa = 3)

            $consulta = mysqli_query($mysqli, $sql);

            if (!$consulta) {
                echo 1;
                return;
            } else {
                $datos2 = array();
                while ($fila = mysqli_fetch_array($consulta)) {

                    $rut_reemplazante = $fila["rut_reemplazo"];
                    $sql2 = "SELECT nombre_usuario FROM usuario WHERE rut='$rut_reemplazante'";
                    $consulta2 = mysqli_query($mysqli, $sql2);
                    $fila_buscar = mysqli_fetch_assoc($consulta2);
                    $nombre_reemplazante = $fila_buscar['nombre_usuario'];

                    $datos2[] = array(
                        'ID_SFL'                => $fila["id_sfl"],
                        'ID_PLF'                => $fila["id_pfl"],
                        'RUT_SOLICITANTE'       => $fila["rut_solicitante"],
                        'RUT_REEMPLAZO'         => $fila["rut_reemplazo"],
                        'NOMBRE_SOLICITANTE'    => $fila["nombre_usuario"],
                        'NOMBRE_REEMPLAZANTE'   => $nombre_reemplazante,
                        'FECHA_SOLICITUD'       => $fila["fecha_registro_pfl"],
                        'FECHA_PERMISO'         => $fila["fecha_permiso_pfl"]
                    );
                }
                $contardatos = count($datos2);
                if (empty($datos2) || $contardatos == 0) {
                    echo 1;
                    return;
                } else {
                    echo json_encode($datos2);
                    return;
                }
            }
        } else if ($rol == 13) {

            $sql = "SELECT DISTINCT sfl.id_sfl, pfl.id_pfl, pfl.rut_solicitante, pfl.rut_reemplazo,
            us.nombre_usuario, pfl.fecha_permiso_pfl, pfl.fecha_registro_pfl
            FROM permiso_feriado_legal pfl, usuario us,solicitud_feriado_legal sfl
            WHERE pfl.rut_solicitante=us.rut and pfl.id_pfl=sfl.id_pfl and sfl.id_etapas_sfl=3 and (sfl.id_decision_sfl=1) and NOT EXISTS (SELECT 1 
            FROM solicitud_feriado_legal t2 WHERE t2.id_pfl = pfl.id_pfl and t2.id_etapas_sfl = 4)";

            $consulta = mysqli_query($mysqli, $sql);

            if (!$consulta) {
                echo 1;
                return;
            } else {
                $datos2 = array();
                while ($fila = mysqli_fetch_array($consulta)) {

                    $rut_reemplazante = $fila["rut_reemplazo"];
                    $sql2 = "SELECT nombre_usuario FROM usuario WHERE rut='$rut_reemplazante'";
                    $consulta2 = mysqli_query($mysqli, $sql2);
                    $fila_buscar = mysqli_fetch_assoc($consulta2);
                    $nombre_reemplazante = $fila_buscar['nombre_usuario'];

                    $datos2[] = array(
                        'ID_SFL'                => $fila["id_sfl"],
                        'ID_PLF'                => $fila["id_pfl"],
                        'RUT_SOLICITANTE'       => $fila["rut_solicitante"],
                        'RUT_REEMPLAZO'         => $fila["rut_reemplazo"],
                        'NOMBRE_SOLICITANTE'    => $fila["nombre_usuario"],
                        'NOMBRE_REEMPLAZANTE'   => $nombre_reemplazante,
                        'FECHA_SOLICITUD'       => $fila["fecha_registro_pfl"],
                        'FECHA_PERMISO'         => $fila["fecha_permiso_pfl"]
                    );
                }
                $contardatos = count($datos2);
                if (empty($datos2) || $contardatos == 0) {
                    echo 1;
                    return;
                } else {
                    echo json_encode($datos2);
                    return;
                }
            }
        } else {
            echo 2;
            return;
        }
        // header('Content-type: application/json');
    } else if ($seleccion == 2) {
        if (
            isset($_POST["decision"]) && isset($_POST["id_pfl"]) && isset($_POST["comentario"]) && isset($_POST["existefirma"]) &&
            isset($_POST["ano_feriado_acumulado"]) && isset($_POST["dias_feriados_acumulados"]) && isset($_POST["desde"])
            && isset($_POST["hasta"]) && isset($_POST["accion"]) && isset($_POST["otros"])
        ) {

            $decision = solonumeros($_POST["decision"]);
            $id_pfl = solonumeros($_POST["id_pfl"]);
            $comentario = numerosyletras($_POST["comentario"]);
            $ano_feriado_acumulado = solonumeros($_POST["ano_feriado_acumulado"]);
            $dias_feriados_acumulados = solonumeros($_POST["dias_feriados_acumulados"]);
            $desde = fechausuarios($_POST["desde"]);
            $hasta = fechausuarios($_POST["hasta"]);
            $accionAutorizaOprorroga = solonumeros($_POST["accion"]);
            $existefirma = sololetras($_POST["existefirma"]);
            $otros = soloCaractDeConversacion($_POST["otros"]);

            if ($rol == 7 || $rol == 8 || $rol == 11 || $rol == 15) {
                $sql1 = "SELECT id_pfl FROM solicitud_feriado_legal WHERE id_pfl='$id_pfl' AND id_etapas_sfl=2";
                $res1 = mysqli_query($mysqli, $sql1);

                if (validavacioenarreglo(array($decision, $id_pfl))) { //comentario es opcional asi que no lo valido aquí
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

                                //INSERTA CUANDO ESTA APROBADO O CUANDO ESTÁ RECHAZADO, DEPENDE DE LA DECISION QUE OBTENGA
                                $sql2 = "INSERT INTO solicitud_feriado_legal (id_sfl,id_pfl,rut_receptor,id_decision_sfl,id_etapas_sfl,fecha_registro, observacion_sfl) 
                                        VALUES (NULL,'$id_pfl','$rutsesion','$decision', 2 ,'$fechadehoy','$comentario')";
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


                                    if ($decision == 1) { //si la decisión fue que aprobo la solicitud el Jefe de Sector o Unidad, Director, o Jefe Subrogante genera el certificado
                                        $queryparacertificado = "SELECT sfl.id_sfl, pfl.id_pfl,(pfl.rut_solicitante) as rutsolicitante, 
                                        (pfl.rut_reemplazo) as rutreemplazo,
                                        (sfl.rut_receptor) as rutrespondido, us.nombre_usuario, pfl.fecha_permiso_pfl, pfl.fecha_registro_pfl, 
                                        us.id_sector, us.id_unidad, us.firma_usuario as firmausuariosolicitante
                                        FROM permiso_feriado_legal pfl, 
                                        usuario us, solicitud_feriado_legal sfl
                                        WHERE pfl.rut_solicitante=us.rut and pfl.id_pfl=sfl.id_pfl and pfl.id_pfl='$id_pfl' and sfl.id_etapas_sfl=2";

                                        $res_queryparacertificado = mysqli_query($mysqli, $queryparacertificado);
                                        $fila_certificado = mysqli_fetch_assoc($res_queryparacertificado);

                                        require '../../funcionesphp/fpdf/fpdf.php';
                                        require '../funciones/exportaPDF.php';
                                        $pdf = new FPDF();

                                        $nombreusuario      =  $fila_certificado['nombre_usuario'];
                                        $rutsolicitante     =  $fila_certificado['rutsolicitante'];
                                        $rutReemplazo       =  $fila_certificado['rutreemplazo'];
                                        // $TipoRemuneracion   =  $fila_certificado['tiporemuneracion'];
                                        // $TipoDia            =  $fila_certificado['tipodia'];

                                        $sqlR = "SELECT nombre_usuario FROM usuario WHERE rut='$rutReemplazo'";
                                        $consultaR = mysqli_query($mysqli, $sqlR);
                                        $fila_R = mysqli_fetch_assoc($consultaR);
                                        $nombre_reemplazante = $fila_R['nombre_usuario'];

                                        $SectoroUnidad = '';

                                        if (($fila_certificado['id_sector'] == NULL) && ($fila_certificado['id_unidad'] == NULL)) {
                                            $SectoroUnidad = 'Unidad y Sector no informada';
                                        } else if ($fila_certificado['id_sector'] != NULL && $fila_certificado['id_unidad'] != NULL) {
                                            $querysector    = "SELECT sec.nombre_sector FROM usuario us, sector sec WHERE us.id_sector=sec.id_sector and us.rut='$rutsolicitante'";
                                            $res_sector     = mysqli_query($mysqli, $querysector);
                                            $fila_sector    = mysqli_fetch_assoc($res_sector);
                                            $queryunidad    = "SELECT uni.nombre_unidad FROM usuario us, unidad uni WHERE us.id_unidad=uni.id_unidad and us.rut='$rutsolicitante'";
                                            $res_unidad     = mysqli_query($mysqli, $queryunidad);
                                            $fila_unidad    = mysqli_fetch_assoc($res_unidad);
                                            $SectoroUnidad  = $fila_sector['nombre_sector'] . ' y ' . $fila_unidad['nombre_unidad'];
                                        } else if ($fila_certificado['id_sector'] == NULL && $fila_certificado['id_unidad'] != NULL) {
                                            $queryunidad    = "SELECT uni.nombre_unidad FROM usuario us, unidad uni WHERE us.id_unidad=uni.id_unidad and us.rut='$rutsolicitante'";
                                            $res_unidad     = mysqli_query($mysqli, $queryunidad);
                                            $fila_unidad    = mysqli_fetch_assoc($res_unidad);
                                            $SectoroUnidad  = $fila_unidad['nombre_unidad'];
                                        } else {
                                            $querysector    = "SELECT sec.nombre_sector FROM usuario us, sector sec WHERE us.id_sector=sec.id_sector and us.rut='$rutsolicitante'";
                                            $res_sector     = mysqli_query($mysqli, $querysector);
                                            $fila_sector    = mysqli_fetch_assoc($res_sector);
                                            $SectoroUnidad  = $fila_sector['nombre_sector'];
                                        }
                                        // $motivo     = $fila_certificado['motivo_pa'];
                                        $porciones  = explode("-", $fila_certificado['fecha_permiso_pfl']);
                                        $diamesano  = $porciones[2] . '-' . $porciones[1] . '-' . $porciones[0];

                                        $imagenfirmasolicitante = $fila_certificado['firmausuariosolicitante'];
                                        $rutdelJefeDirecto      = $fila_certificado['rutrespondido'];

                                        $queryfirmausuarioJefeDirecto = "SELECT firma_usuario FROM usuario  WHERE rut='$rutdelJefeDirecto'";
                                        $res_usuarioJefeDirecto       = mysqli_query($mysqli, $queryfirmausuarioJefeDirecto);
                                        $fila_usuarioJefeDirecto      = mysqli_fetch_assoc($res_usuarioJefeDirecto);
                                        $imagenfirmadelJefeDirecto    = $fila_usuarioJefeDirecto['firma_usuario'];

                                        ExportaPDFJefesDirecto(
                                            $pdf,
                                            $rutsolicitante,
                                            $nombreusuario,
                                            $SectoroUnidad,
                                            $comuna,
                                            $diamesano,
                                            $horainicio,
                                            $horatermino,
                                            $imagenfirmasolicitante,
                                            $imagenfirmadelJefeDirecto,
                                            $rutdelJefeDirecto,
                                            $rutReemplazo,
                                            $nombre_reemplazante
                                        );

                                        if (!is_dir('../CERTIFICADO_SOLICITUDES/' . $rutsolicitante . '-' . $id_pfl . '/')) { //Si no existe el directorio 
                                            mkdir('../CERTIFICADO_SOLICITUDES/' . $rutsolicitante . '-' . $id_pfl . '/', 0777, true); //lo crea
                                            $pdf->Output('../CERTIFICADO_SOLICITUDES/' . $rutsolicitante . '-' . $id_pfl . '/' . 'SFL.pdf', 'F');
                                        } else {
                                            borrarcarpeta('../CERTIFICADO_SOLICITUDES/' . $rutsolicitante . '-' . $id_pfl . '/');  //Borra su contenido
                                            mkdir('../CERTIFICADO_SOLICITUDES/' . $rutsolicitante . '-' . $id_pfl . '/', 0777, true); //lo crea nuevamente
                                            $pdf->Output('../CERTIFICADO_SOLICITUDES/' . $rutsolicitante . '-' . $id_pfl . '/' . 'SFL.pdf', 'F');
                                        }
                                    }
                                    echo 7;
                                    return;
                                }
                            }
                        } else if (empty($_FILES["firma"]["name"]) && $existefirma == 'si') {

                            //INSERTA CUANDO ESTA APROBADO O CUANDO ESTÁ RECHAZADO, DEPENDE DE LA DECISION QUE OBTENGA
                            $sql2 = "INSERT INTO solicitud_feriado_legal (id_sfl,id_pfl,rut_receptor,id_decision_sfl,id_etapas_sfl,fecha_registro, observacion_sfl) 
                            VALUES (NULL,'$id_pfl','$rutsesion','$decision', 2 ,'$fechadehoy','$comentario')";

                            $res2 = mysqli_query($mysqli, $sql2); //Hasta aqui inserto la solicitud de permiso especial
                            if (!$res2) {
                                echo 6;
                                return;
                            } else {

                                if ($decision == 1) { //si la decisión fue que aprobo la solicitud el Jefe de Sector o Unidad, genera el certificado
                                    $queryparacertificado = "SELECT sfl.id_sfl, pfl.id_pfl,(pfl.rut_solicitante) as rutsolicitante, 
                                    (pfl.rut_reemplazo) as rutreemplazo,
                                    (sfl.rut_receptor) as rutrespondido, us.nombre_usuario, pfl.fecha_permiso_pfl, pfl.fecha_registro_pfl, 
                                    us.id_sector, us.id_unidad, us.firma_usuario as firmausuariosolicitante
                                    FROM permiso_feriado_legal pfl, 
                                    usuario us, solicitud_feriado_legal sfl
                                    WHERE pfl.rut_solicitante=us.rut and pfl.id_pfl=sfl.id_pfl and pfl.id_pfl='$id_pfl' and sfl.id_etapas_sfl=2";

                                    $res_queryparacertificado = mysqli_query($mysqli, $queryparacertificado);
                                    $fila_certificado = mysqli_fetch_assoc($res_queryparacertificado);

                                    require '../../funcionesphp/fpdf/fpdf.php';
                                    require '../funciones/exportaPDF.php';
                                    $pdf = new FPDF();

                                    $nombreusuario      =  $fila_certificado['nombre_usuario'];
                                    $rutsolicitante     =  $fila_certificado['rutsolicitante'];
                                    $rutReemplazo       =  $fila_certificado['rutreemplazo'];

                                    $sqlR = "SELECT nombre_usuario FROM usuario WHERE rut='$rutReemplazo'";
                                    $consultaR = mysqli_query($mysqli, $sqlR);
                                    $fila_R = mysqli_fetch_assoc($consultaR);
                                    $nombre_reemplazante = $fila_R['nombre_usuario'];

                                    $SectoroUnidad = '';

                                    if (($fila_certificado['id_sector'] == NULL) && ($fila_certificado['id_unidad'] == NULL)) {
                                        $SectoroUnidad = 'Unidad y Sector no informada';
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


                                    // $motivo = $fila_certificado['motivo_pa'];
                                    $porciones = explode("-", $fila_certificado['fecha_permiso_pfl']);
                                    $diamesano = $porciones[2] . '-' . $porciones[1] . '-' . $porciones[0];
                                    $imagenfirmasolicitante = $fila_certificado['firmausuariosolicitante'];
                                    $rutdelJefeDirecto = $fila_certificado['rutrespondido'];

                                    $queryfirmausuarioJefeDirecto = "SELECT firma_usuario FROM usuario  WHERE rut='$rutdelJefeDirecto'";
                                    $res_usuarioJefeDirecto = mysqli_query($mysqli, $queryfirmausuarioJefeDirecto);
                                    $fila_usuarioJefeDirecto = mysqli_fetch_assoc($res_usuarioJefeDirecto);
                                    $imagenfirmadelJefeDirecto = $fila_usuarioJefeDirecto['firma_usuario'];

                                    ExportaPDFJefesDirecto(
                                        $pdf,
                                        $rutsolicitante,
                                        $nombreusuario,
                                        $SectoroUnidad,
                                        $diamesano,
                                        $imagenfirmasolicitante,
                                        $imagenfirmadelJefeDirecto,
                                        $rutdelJefeDirecto,
                                        $rutReemplazo,
                                        $nombre_reemplazante
                                    );

                                    if (!is_dir('../CERTIFICADO_SOLICITUDES/' . $rutsolicitante . '-' . $id_pfl . '/')) { //Si no existe el directorio 
                                        mkdir('../CERTIFICADO_SOLICITUDES/' . $rutsolicitante . '-' . $id_pfl . '/', 0777, true); //lo crea
                                        $pdf->Output('../CERTIFICADO_SOLICITUDES/' . $rutsolicitante . '-' . $id_pfl . '/' . 'SFL.pdf', 'F');
                                    } else {
                                        borrarcarpeta('../CERTIFICADO_SOLICITUDES/' . $rutsolicitante . '-' . $id_pfl . '/');  //Borra su contenido
                                        mkdir('../CERTIFICADO_SOLICITUDES/' . $rutsolicitante . '-' . $id_pfl . '/', 0777, true); //lo crea nuevamente
                                        $pdf->Output('../CERTIFICADO_SOLICITUDES/' . $rutsolicitante . '-' . $id_pfl . '/' . 'SFL.pdf', 'F');
                                    }
                                }

                                echo 7;
                                return;
                            }
                        }
                    }
                }
            } else if ($rol == 12) {

                $sql1 = "SELECT id_sfl FROM solicitud_feriado_legal WHERE id_sfl='$id_pfl' AND id_etapas_sfl=3";
                $res1 = mysqli_query($mysqli, $sql1);

                //$desde, $hasta, $accionAutorizaOprorroga, PUEDEN SER VACIOS CUANDO RECHAZO

                if (validavacioenarreglo(array($decision, $id_pfl))) { //comentario es opcional asi que no lo valido aquí
                    echo 1;
                    return;
                } else {
                    if ($desde > $hasta || $desde == $hasta) {
                        echo 16;
                        return;
                    } else if (!$res1) {
                        echo 2;
                        return;
                    } else if (mysqli_num_rows($res1) >= 1) { //ya ha sido aprobado por el encargado(a) de personal
                        echo 4;
                        return;
                    } else {

                        //INSERTA CUANDO ESTA APROBADO O CUANDO ESTÁ RECHAZADO, DEPENDE DE LA DECISION QUE OBTENGA
                        $sql2 = "INSERT INTO solicitud_feriado_legal (id_sfl,id_pfl,rut_receptor,id_decision_sfl,
                        id_etapas_sfl,fecha_registro, observacion_sfl) 
                        VALUES (NULL,'$id_pfl','$rutsesion','$decision', 3 ,'$fechadehoy','$comentario')";

                        $res2 = mysqli_query($mysqli, $sql2); //Hasta aqui inserto la solicitud de permiso admin... que ha sido respondida por el encargado de personal (id_etapas_spa=3)
                        if (!$res2) {
                            echo 8;
                            return;
                        } else {

                            if ($decision == 1) { //SÓLO SI ESTA APROBADO CAMBIA ESTOS PARÁMETROS

                                /*Como ha sido aprobada la solicitud por el encargado(a) de personal, de editan la cantidad de goce o sin goce de remu...  "otros",
                                   que es una observación opcional especificante del encargado(a) */
                                $sqeleEditPermisoFL = "UPDATE permiso_feriado_legal SET ano_feriado_acumulado_pfl='$ano_feriado_acumulado', 
                                dias_feriado_acumulado_pfl='$dias_feriados_acumulados', otros_pfl='$otros', banderaAutorizaProrroga='$accionAutorizaOprorroga' WHERE id_pfl='$id_pfl'";

                                $resEditPermisoFL = mysqli_query($mysqli, $sqeleEditPermisoFL);

                                if ($accionAutorizaOprorroga == 1) { //Autoriza

                                    $sqlContarAutorizaOprorroga = "SELECT id_autoriza FROM autoriza WHERE id_pfl='$id_pfl'";
                                    $resContarAutorizaOprorroga = mysqli_query($mysqli, $sqlContarAutorizaOprorroga);

                                    if (mysqli_num_rows($resContarAutorizaOprorroga) == 0) { //No ha sido insertado en la tabla autoriza
                                        $sqlAutorizaOprorroga = "INSERT INTO autoriza (id_autoriza,id_pfl,desde,hasta) VALUES (NULL,'$id_pfl','$desde','$hasta')";
                                        $resAutorizaOprorroga = mysqli_query($mysqli, $sqlAutorizaOprorroga);
                                    } else {
                                        $sqlAutorizaOprorroga = "UPDATE autoriza SET desde='$desde', 
                                        hasta='$hasta' WHERE id_pfl='$id_pfl'";
                                        $resAutorizaOprorroga = mysqli_query($mysqli, $sqlAutorizaOprorroga);
                                    }
                                } else if ($accionAutorizaOprorroga == 2) { //Prorroga

                                    $sqlContarAutorizaOprorroga = "SELECT id_prorroga FROM prorroga WHERE id_pfl='$id_pfl'";
                                    $resContarAutorizaOprorroga = mysqli_query($mysqli, $sqlContarAutorizaOprorroga);

                                    if (mysqli_num_rows($resContarAutorizaOprorroga) == 0) { //No ha sido insertado en la tabla prorroga
                                        $sqlAutorizaOprorroga = "INSERT INTO prorroga (id_prorroga,id_pfl,desde,hasta) VALUES (NULL,'$id_pfl','$desde','$hasta')";
                                        $resAutorizaOprorroga = mysqli_query($mysqli, $sqlAutorizaOprorroga);
                                    } else {
                                        $sqlAutorizaOprorroga = "UPDATE prorroga SET desde='$desde', 
                                        hasta='$hasta' WHERE id_pfl='$id_pfl'";
                                        $resAutorizaOprorroga = mysqli_query($mysqli, $sqlAutorizaOprorroga);
                                    }
                                }

                                ImprimirPDFEncargadoPersonal($mysqli, $id_pfl, $accionAutorizaOprorroga);
                            }

                            echo 9;
                            return;
                        }
                    }
                }
            } else if ($rol == 13) {

                $sql1 = "SELECT id_sfl FROM solicitud_feriado_legal WHERE id_sfl='$id_pfl' AND id_etapas_sfl=4";
                $res1 = mysqli_query($mysqli, $sql1);

                if (validavacioenarreglo(array($decision, $id_pfl))) { //comentario es opcional asi que no lo valido aquí
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

                                if (!is_dir('../../perfil/firmas/' . $rutsesion . '/')) { //Si no existe el directorio 
                                    mkdir('../../perfil/firmas/' . $rutsesion . '/', 0777, true); //lo crea
                                    move_uploaded_file($archivo['tmp_name'], '../../perfil/firmas/' . $rutsesion . '/' . $nombre_imagen);
                                } else {
                                    borrarcarpeta('../../perfil/firmas/' . $rutsesion . '/');  //Borra su contenido
                                    mkdir('../../perfil/firmas/' . $rutsesion . '/', 0777, true); //lo crea nuevamente
                                    move_uploaded_file($archivo['tmp_name'], '../../perfil/firmas/' . $rutsesion . '/' . $nombre_imagen);
                                }

                                //INSERTA CUANDO ESTA APROBADO O CUANDO ESTÁ RECHAZADO, DEPENDE DE LA DECISION QUE OBTENGA
                                $sql2 = "INSERT INTO solicitud_feriado_legal (id_sfl,id_pfl,rut_receptor,id_decision_sfl,
                                        id_etapas_sfl,fecha_registro, observacion_sfl) 
                                        VALUES (NULL,'$id_pfl','$rutsesion','$decision', 4 ,'$fechadehoy','$comentario')";
                                $res2 = mysqli_query($mysqli, $sql2); //Hasta aqui inserto la solcitud hecha por el Jefe Sistema Salud
                                if (!$res2) {
                                    echo 10;
                                    return;
                                } else {
                                    if ($decision == 1) {
                                        ImprimirPDFJefeSistemaSalud($mysqli, $id_pfl);
                                    }
                                    echo 11;
                                    return;
                                }
                            }
                        } else if (empty($_FILES["firma"]["name"]) && $existefirma == 'si') {
                            //INSERTA CUANDO ESTA APROBADO O CUANDO ESTÁ RECHAZADO, DEPENDE DE LA DECISION QUE OBTENGA
                            $sql2 = "INSERT INTO solicitud_feriado_legal (id_sfl,id_pfl,rut_receptor,id_decision_sfl,
                                    id_etapas_sfl,fecha_registro, observacion_sfl) 
                                    VALUES (NULL,'$id_pfl','$rutsesion','$decision', 4 ,'$fechadehoy','$comentario')";
                            $res2 = mysqli_query($mysqli, $sql2); //Hasta aqui inserto la solcitud hecha por el Jefe Sistema Salud
                            if (!$res2) {
                                echo 10;
                                return;
                            } else {
                                if ($decision == 1) {
                                    ImprimirPDFJefeSistemaSalud($mysqli, $id_pfl);
                                }
                                echo 11;
                                return;
                            }
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
        MOSTRAR EL PERMISO QUE TENGA UNA SOLICITUD DE PERMISO APROBADA POR EL ENCARGADO DE PERSONAL
        */

        if ($rol == 12) {
            /* MOSTRAR EL PERMISO QUE TENGA UNA SOLICITUD DE PERMISO APROBADA POR EL ENCARGADO DE PERSONAL*/
            $sql = "SELECT DISTINCT sfl.id_sfl, pfl.id_pfl, pfl.rut_solicitante, pfl.rut_reemplazo, us.nombre_usuario, pfl.fecha_permiso_pfl, pfl.fecha_registro_pfl
            FROM permiso_feriado_legal pfl, usuario us,solicitud_feriado_legal sfl
            WHERE pfl.rut_solicitante=us.rut and pfl.id_pfl=sfl.id_pfl and sfl.id_etapas_sfl=3 and (sfl.id_decision_sfl=1) and EXISTS (SELECT 1 
            FROM solicitud_feriado_legal t2 WHERE t2.id_pfl = pfl.id_pfl and t2.id_decision_sfl = 1)";

            // 'MOTIVO' => $fila["motivo_pa"],
            $consulta = mysqli_query($mysqli, $sql);
            $datos = array();
            while ($fila = mysqli_fetch_array($consulta)) {
                $datos[] = array(
                    'ID_SFL' => $fila["id_sfl"],
                    'ID_PFL' => $fila["id_pfl"],
                    'RUTSOLICITANTE' => $fila["rut_solicitante"],
                    'NOMBRE_FUNCIONARIO_SOLICITANTE' => $fila["nombre_usuario"],
                    'FECHA_SOLICITUD' => $fila["fecha_registro_pfl"],
                    'FECHA_PERMISO' => $fila["fecha_permiso_pfl"]
                );
            }

            // $contador = count($datos); || $contador == 0
            if (empty($datos)) {
                echo 0;
                return;
            } else {
                echo json_encode($datos);
                return;
            }
        } else if ($rol == 13) {
            /* MOSTRAR EL PERMISO QUE TENGA UNA SOLICITUD DE PERMISO APROBADA POR EL JEFE SISTEMA SALUD*/
            $sql = "SELECT DISTINCT sfl.id_sfl, pfl.id_pfl, pfl.rut_solicitante, pfl.rut_reemplazo, us.nombre_usuario, pfl.fecha_permiso_pfl, pfl.fecha_registro_pfl
            FROM permiso_feriado_legal pfl, usuario us,solicitud_feriado_legal sfl
            WHERE pfl.rut_solicitante=us.rut and pfl.id_pfl=sfl.id_pfl and sfl.id_etapas_sfl=4 and (sfl.id_decision_sfl=1) and EXISTS (SELECT 1 
            FROM solicitud_feriado_legal t2 WHERE t2.id_pfl = pfl.id_pfl and t2.id_decision_sfl = 1)";

            // 'MOTIVO' => $fila["motivo_pa"],
            $consulta = mysqli_query($mysqli, $sql);
            $datos = array();

            while ($fila = mysqli_fetch_array($consulta)) {
                $datos[] = array(
                    'ID_SFL' => $fila["id_sfl"],
                    'ID_PFL' => $fila["id_pfl"],
                    'RUTSOLICITANTE' => $fila["rut_solicitante"],
                    'NOMBRE_FUNCIONARIO_SOLICITANTE' => $fila["nombre_usuario"],
                    'FECHA_SOLICITUD' => $fila["fecha_registro_pfl"],
                    'FECHA_PERMISO' => $fila["fecha_permiso_pfl"]
                );
            }

            // $contador = count($datos); //|| $contador == 0
            if (empty($datos)) {
                echo 0;
                return;
            } else {
                echo json_encode($datos);
                return;
            }
        }
    }
}


function ImprimirPDFEncargadoPersonal($mysqli, $id_pfl, $accionAutorizaOprorroga)
{

    if ($accionAutorizaOprorroga == 1) {
        $queryparacertificado = "SELECT sfl.id_sfl, pfl.id_pfl,(pfl.rut_solicitante) as rutsolicitante, 
        (pfl.rut_reemplazo) as rutreemplazo,
        (sfl.rut_receptor) as rutrespondido, us.nombre_usuario, pfl.fecha_permiso_pfl, pfl.fecha_registro_pfl, 
        us.id_sector, us.id_unidad, us.firma_usuario as firmausuariosolicitante, aut.desde, aut.hasta, 
        pfl.ano_feriado_acumulado_pfl, pfl.dias_feriado_acumulado_pfl, pfl.otros_pfl
        FROM permiso_feriado_legal pfl, 
        usuario us, solicitud_feriado_legal sfl, autoriza aut
        WHERE pfl.rut_solicitante=us.rut and pfl.id_pfl=sfl.id_pfl and pfl.id_pfl='$id_pfl' and sfl.id_etapas_sfl=2 and pfl.id_pfl=aut.id_pfl";
    } else if ($accionAutorizaOprorroga == 2) {
        $queryparacertificado = "SELECT sfl.id_sfl, pfl.id_pfl,(pfl.rut_solicitante) as rutsolicitante, 
        (pfl.rut_reemplazo) as rutreemplazo,
        (sfl.rut_receptor) as rutrespondido, us.nombre_usuario, pfl.fecha_permiso_pfl, pfl.fecha_registro_pfl, 
        us.id_sector, us.id_unidad, us.firma_usuario as firmausuariosolicitante, prr.desde, prr.hasta,
        pfl.ano_feriado_acumulado_pfl, pfl.dias_feriado_acumulado_pfl, pfl.otros_pfl
        FROM permiso_feriado_legal pfl, 
        usuario us, solicitud_feriado_legal sfl, prorroga prr
        WHERE pfl.rut_solicitante=us.rut and pfl.id_pfl=sfl.id_pfl and pfl.id_pfl='$id_pfl' and sfl.id_etapas_sfl=2 and pfl.id_pfl=prr.id_pfl";
    }

    $res_queryparacertificado = mysqli_query($mysqli, $queryparacertificado);
    $fila_certificado = mysqli_fetch_assoc($res_queryparacertificado);

    require '../../funcionesphp/fpdf/fpdf.php';
    require '../funciones/exportaPDF.php';
    $pdf = new FPDF();

    $nombreusuario      =  $fila_certificado['nombre_usuario'];
    $rutsolicitante     =  $fila_certificado['rutsolicitante'];
    $rutReemplazo       =  $fila_certificado['rutreemplazo'];
    $ano_feriado_acumulado_pfl   = $fila_certificado['ano_feriado_acumulado_pfl'];
    $dias_feriado_acumulado_pfl  =  $fila_certificado['dias_feriado_acumulado_pfl'];
    $desde  =  $fila_certificado['desde'];
    $hasta  =  $fila_certificado['hasta'];
    $otros  =  $fila_certificado['otros_pfl'];

    $sqlR = "SELECT nombre_usuario FROM usuario WHERE rut='$rutReemplazo'";
    $consultaR = mysqli_query($mysqli, $sqlR);
    $fila_R = mysqli_fetch_assoc($consultaR);
    $nombre_reemplazante = $fila_R['nombre_usuario'];

    $SectoroUnidad = '';

    if (($fila_certificado['id_sector'] == NULL) && ($fila_certificado['id_unidad'] == NULL)) {
        $SectoroUnidad = 'Unidad y Sector no informada';
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


    // $motivo = $fila_certificado['motivo_pa'];
    $porciones = explode("-", $fila_certificado['fecha_permiso_pfl']);
    $diamesano = $porciones[2] . '-' . $porciones[1] . '-' . $porciones[0];
    $imagenfirmasolicitante = $fila_certificado['firmausuariosolicitante'];
    $rutdelJefeDirecto = $fila_certificado['rutrespondido'];

    $queryfirmausuarioJefeDirecto = "SELECT firma_usuario FROM usuario  WHERE rut='$rutdelJefeDirecto'";
    $res_usuarioJefeDirecto = mysqli_query($mysqli, $queryfirmausuarioJefeDirecto);
    $fila_usuarioJefeDirecto = mysqli_fetch_assoc($res_usuarioJefeDirecto);
    $imagenfirmadelJefeDirecto = $fila_usuarioJefeDirecto['firma_usuario'];

    ExportaPDFEncPersonal(
        $pdf,
        $rutsolicitante,
        $nombreusuario,
        $SectoroUnidad,
        $accionAutorizaOprorroga,
        $diamesano,
        $imagenfirmasolicitante,
        $imagenfirmadelJefeDirecto,
        $rutdelJefeDirecto,
        $rutReemplazo,
        $nombre_reemplazante,
        $ano_feriado_acumulado_pfl,
        $dias_feriado_acumulado_pfl,
        $desde,
        $hasta,
        $otros
    );

    if (!is_dir('../CERTIFICADO_SOLICITUDES/' . $rutsolicitante . '-' . $id_pfl . '/')) { //Si no existe el directorio 
        mkdir('../CERTIFICADO_SOLICITUDES/' . $rutsolicitante . '-' . $id_pfl . '/', 0777, true); //lo crea
        $pdf->Output('../CERTIFICADO_SOLICITUDES/' . $rutsolicitante . '-' . $id_pfl . '/' . 'SFL.pdf', 'F');
    } else {
        borrarcarpeta('../CERTIFICADO_SOLICITUDES/' . $rutsolicitante . '-' . $id_pfl . '/');  //Borra su contenido
        mkdir('../CERTIFICADO_SOLICITUDES/' . $rutsolicitante . '-' . $id_pfl . '/', 0777, true); //lo crea nuevamente
        $pdf->Output('../CERTIFICADO_SOLICITUDES/' . $rutsolicitante . '-' . $id_pfl . '/' . 'SFL.pdf', 'F');
    }
}

function ImprimirPDFJefeSistemaSalud($mysqli, $id_pfl)
{

    $Cqueryparacertificado1 = "SELECT sfl.id_sfl, pfl.id_pfl, (sfl.rut_receptor) as rutJefeDirecto
    FROM permiso_feriado_legal pfl, solicitud_feriado_legal sfl
    WHERE pfl.id_pfl=sfl.id_pfl and pfl.id_pfl='$id_pfl' and sfl.id_etapas_sfl=2";

    $Cqueryparacertificado2 = "SELECT sfl.id_sfl, pfl.id_pfl,(pfl.rut_solicitante) as rutsolicitante, 
    (pfl.rut_reemplazo) as rutreemplazo,
    (sfl.rut_receptor) as rutrespondido, us.nombre_usuario, pfl.fecha_permiso_pfl, pfl.fecha_registro_pfl, 
    us.id_sector, us.id_unidad, us.firma_usuario as firmausuariosolicitante,
    pfl.ano_feriado_acumulado_pfl, pfl.dias_feriado_acumulado_pfl, pfl.otros_pfl, pfl.banderaAutorizaProrroga
    FROM permiso_feriado_legal pfl, 
    usuario us, solicitud_feriado_legal sfl
    WHERE pfl.rut_solicitante=us.rut and pfl.id_pfl=sfl.id_pfl and pfl.id_pfl='$id_pfl' and sfl.id_etapas_sfl=3";

    //     SELECT spa.id_spa, pa.id_pa,(pa.rut_solicitante) as rutsolicitante, (pa.rut_reemplazo) as rutreemplazo,
    // (spa.rut_receptor) as rutrespondido, pa.motivo_pa, us.nombre_usuario, pa.fecha_pa, pa.fecha_actual_pa, 
    // us.id_sector, us.id_unidad, us.firma_usuario as firmausuariosolicitante, 
    // (tr.descripcion_tiporem) as tiporemuneracion, (td.descripcion_tipo_dia) as tipodia,
    // pa.con_goce_remuneraciones, pa.sin_goce_remuneraciones, pa.otros
    // FROM permiso_administrativo pa, 
    // usuario us, solicitud_permiso_administrativo spa, tipo_remuneracion tr, tipo_dia td
    // WHERE pa.rut_solicitante=us.rut and pa.id_tiporem=tr.id_tiporem and td.id_tipo_dia=pa.id_tipo_dia
    // and pa.id_pa=spa.id_pa and pa.id_pa='$id_pfl' and spa.id_etapas_spa=3

    $Cqueryparacertificado3 = "SELECT sfl.id_sfl, pfl.id_pfl, (sfl.rut_receptor) as rutJefeSistemaSalud
    FROM permiso_feriado_legal pfl, solicitud_feriado_legal sfl
    WHERE pfl.id_pfl=sfl.id_pfl and pfl.id_pfl='$id_pfl' and sfl.id_etapas_sfl=4";

    $Cres_queryparacertificado = mysqli_query($mysqli, $Cqueryparacertificado1);
    $Cfila_certificado1 = mysqli_fetch_assoc($Cres_queryparacertificado);

    $Cres_queryparacertificado2 = mysqli_query($mysqli, $Cqueryparacertificado2);
    $Cfila_certificado2 = mysqli_fetch_assoc($Cres_queryparacertificado2);

    $Cres_queryparacertificado3 = mysqli_query($mysqli, $Cqueryparacertificado3);
    $Cfila_certificado3 = mysqli_fetch_assoc($Cres_queryparacertificado3);

    if ($Cfila_certificado2['banderaAutorizaProrroga'] == 1) {
        $Cqueryparacertificado4 = "SELECT aut.desde, aut.hasta 
        FROM permiso_feriado_legal pfl, autoriza aut 
        WHERE aut.id_pfl=pfl.id_pfl and pfl.id_pfl='$id_pfl'";
    } else if ($Cfila_certificado2['banderaAutorizaProrroga'] == 2) {
        $Cqueryparacertificado4 = "SELECT prr.desde, prr.hasta FROM permiso_feriado_legal pfl, prorroga prr 
        WHERE prr.id_pfl=pfl.id_pfl and pfl.id_pfl='$id_pfl'";
    }

    $Cres_queryparacertificado4 = mysqli_query($mysqli, $Cqueryparacertificado4);
    $Cfila_certificado4 = mysqli_fetch_assoc($Cres_queryparacertificado4);


    require '../../funcionesphp/fpdf/fpdf.php';
    require '../funciones/exportaPDF.php';
    $pdf = new FPDF();

    $nombreusuario      =  $Cfila_certificado2['nombre_usuario'];
    $rutsolicitante     =  $Cfila_certificado2['rutsolicitante'];
    $rutReemplazo       =  $Cfila_certificado2['rutreemplazo'];
    $desde              =  $Cfila_certificado4['desde'];
    $hasta              =  $Cfila_certificado4['hasta'];

    $ano_feriado_acumulado_pfl  =  $Cfila_certificado2['ano_feriado_acumulado_pfl'];
    $dias_feriado_acumulado_pfl  =  $Cfila_certificado2['dias_feriado_acumulado_pfl'];
    $accionAutorizaOprorroga = $Cfila_certificado2['banderaAutorizaProrroga'];
    $otros  =  $Cfila_certificado2['otros_pfl'];

    $sqlR = "SELECT nombre_usuario FROM usuario WHERE rut='$rutReemplazo'";
    $consultaR = mysqli_query($mysqli, $sqlR);
    $fila_R = mysqli_fetch_assoc($consultaR);
    $nombre_reemplazante = $fila_R['nombre_usuario'];

    $SectoroUnidad = '';

    if (($Cfila_certificado2['id_sector'] == NULL) && ($Cfila_certificado2['id_unidad'] == NULL)) {
        $SectoroUnidad = 'Unidad y Sector no informada';
    } else if ($Cfila_certificado2['id_sector'] != NULL && $Cfila_certificado2['id_unidad'] != NULL) {
        $querysector = "SELECT sec.nombre_sector FROM usuario us, sector sec WHERE us.id_sector=sec.id_sector and us.rut='$rutsolicitante'";
        $res_sector = mysqli_query($mysqli, $querysector);
        $fila_sector = mysqli_fetch_assoc($res_sector);
        $queryunidad = "SELECT uni.nombre_unidad FROM usuario us, unidad uni WHERE us.id_unidad=uni.id_unidad and us.rut='$rutsolicitante'";
        $res_unidad = mysqli_query($mysqli, $queryunidad);
        $fila_unidad = mysqli_fetch_assoc($res_unidad);
        $SectoroUnidad = $fila_sector['nombre_sector'] . ' y ' . $fila_unidad['nombre_unidad'];
    } else if ($Cfila_certificado2['id_sector'] == NULL && $Cfila_certificado2['id_unidad'] != NULL) {
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


    // $motivo = $Cfila_certificado2['motivo_pa'];
    $porciones = explode("-", $Cfila_certificado2['fecha_permiso_pfl']);
    $diamesano = $porciones[2] . '-' . $porciones[1] . '-' . $porciones[0];
    $imagenfirmasolicitante2 = $Cfila_certificado2['firmausuariosolicitante'];

    $rutJefeSistemaSalud = $Cfila_certificado3['rutJefeSistemaSalud'];
    $queryfirmausuarioJefeSistemaSalud = "SELECT firma_usuario FROM usuario  WHERE rut='$rutJefeSistemaSalud'";
    $res_usuarioimagenfirmaJefeSistemaSalud = mysqli_query($mysqli, $queryfirmausuarioJefeSistemaSalud);
    $fila_usuarioimagenfirmaJefeSistemaSalud = mysqli_fetch_assoc($res_usuarioimagenfirmaJefeSistemaSalud);
    $imagenfirmaJefeSistemaSalud = $fila_usuarioimagenfirmaJefeSistemaSalud['firma_usuario'];

    $rutdelJefeDirecto2 = $Cfila_certificado1['rutJefeDirecto'];
    $queryfirmausuarioJefeDirecto = "SELECT firma_usuario FROM usuario  WHERE rut='$rutdelJefeDirecto2'";
    $res_usuarioJefeDirecto = mysqli_query($mysqli, $queryfirmausuarioJefeDirecto);
    $fila_usuarioJefeDirecto = mysqli_fetch_assoc($res_usuarioJefeDirecto);
    $imagenfirmadelJefeDirecto2 = $fila_usuarioJefeDirecto['firma_usuario'];

    obtienedatos(
        $pdf,
        $rutsolicitante,
        $nombreusuario,
        $SectoroUnidad,
        $accionAutorizaOprorroga,
        $diamesano,
        $imagenfirmasolicitante2,
        $imagenfirmadelJefeDirecto2,
        $rutdelJefeDirecto2,
        $rutReemplazo,
        $nombre_reemplazante,
        $ano_feriado_acumulado_pfl,
        $dias_feriado_acumulado_pfl,
        $desde,
        $hasta,
        $otros,
        $rutJefeSistemaSalud,
        $imagenfirmaJefeSistemaSalud
    );

    // ,
    //     $rutJefeSistemaSalud,
    //     $imagenfirmaJefeSistemaSalud

    if (!is_dir('../CERTIFICADO_SOLICITUDES/' . $rutsolicitante . '-' . $id_pfl . '/')) { //Si no existe el directorio 
        mkdir('../CERTIFICADO_SOLICITUDES/' . $rutsolicitante . '-' . $id_pfl . '/', 0777, true); //lo crea
        $pdf->Output('../CERTIFICADO_SOLICITUDES/' . $rutsolicitante . '-' . $id_pfl . '/' . 'SFL.pdf', 'F');
    } else {
        borrarcarpeta('../CERTIFICADO_SOLICITUDES/' . $rutsolicitante . '-' . $id_pfl . '/');  //Borra su contenido
        mkdir('../CERTIFICADO_SOLICITUDES/' . $rutsolicitante . '-' . $id_pfl . '/', 0777, true); //lo crea nuevamente
        $pdf->Output('../CERTIFICADO_SOLICITUDES/' . $rutsolicitante . '-' . $id_pfl . '/' . 'SFL.pdf', 'F');
    }
}
mysqli_close($mysqli);
