<?php
include '../../conexion/conexion.php';
include '../../funcionesphp/limpiarCampo.php';
include '../../funcionesphp/TOUTF8.php';
include '../../funcionesphp/borrarcarpeta.php';

date_default_timezone_set("America/Santiago");
setlocale(LC_TIME, "spanish");

session_start();
$rutsesion = $_SESSION['sesionCESFAM']['rut'];

if (isset($_POST['seleccionar'])) {
    $seleccion = $_POST['seleccionar'];

    if ($seleccion == 1) {
        $sql = "SELECT id_mpe, descripcion_mpe FROM motivo_pe";
        $consulta = mysqli_query($mysqli, $sql);
        $ljson = '';
        if (!$consulta) {
            echo 1;
            return;
        } else {
            //Toma la comuna por defecto de la sesion
            $ljson .= '<option value="">Seleccione motivo de permiso</option>';

            while ($fila1 = mysqli_fetch_array($consulta)) {
                $idmotivo_mpe = $fila1['id_mpe'];
                $descripcion_mpe = $fila1['descripcion_mpe'];
                $ljson .= '<option value="' . $idmotivo_mpe . '">' . toutf8($descripcion_mpe) . '</option>';
            }
            echo $ljson;
            return;
        }
    } else if ($seleccion == 2) {
        $sql = "SELECT id_comuna, nombre_comuna FROM comuna WHERE id_comuna IN (154,156,159)";
        $consulta = mysqli_query($mysqli, $sql);
        $ljson = '';
        if (!$consulta) {
            echo 1;
            return;
        } else {
            //Toma la comuna por defecto de la sesion
            $ljson .= '<option value="">Seleccione comuna</option>';

            while ($fila1 = mysqli_fetch_array($consulta)) {
                $idcomuna = $fila1['id_comuna'];
                $nombrecomuna = $fila1['nombre_comuna'];
                $ljson .= '<option value="' . $idcomuna . '">' . toutf8($nombrecomuna) . '</option>';
            }
            echo $ljson;
            return;
        }
    } else if ($seleccion == 3) {
        if (
            isset($_POST["rut"]) &&
            isset($_POST["comuna"]) &&
            isset($_POST["fechapermiso"]) &&
            isset($_POST["horainicio"]) &&
            isset($_POST["horafin"]) &&
            isset($_POST["selectmotivopermiso"]) &&
            isset($_POST["existefirma"])
        ) {

            $rut = validarut($_POST["rut"]);
            $comuna = solonumeros($_POST["comuna"]);
            $fechapermiso = fechausuarios($_POST["fechapermiso"]);
            $horainicio = limpiahorario($_POST["horainicio"]);
            $horafin = limpiahorario($_POST["horafin"]);
            $motivo = solonumeros($_POST["selectmotivopermiso"]);
            $existefirma = sololetras($_POST["existefirma"]);

            $añoactual = strftime("%Y");
            $fechadehoy = strftime("%F");
            $porciones = explode("-", $fechapermiso); //$porciones[0]  el año ingresado del formulario


            if (validavacioenarreglo(array($rut, $comuna, $fechapermiso, $horainicio, $horafin, $motivo))) {
                echo 1;
                return;
            } else {

                $compararhorainicio = strtotime($horainicio);
                $compararhorafin = strtotime($horafin);

                if ($porciones[0] < $añoactual) { //valida si el año de la fecha es menor al del actual, porque tiene que ser año presente o futuro
                    echo 2;
                    return;
                }

                if ($compararhorainicio > $compararhorafin) { //la hora de inicio no puede ser mayor a la hora de fin
                    echo 3;
                    return;
                }

                if ($compararhorainicio == $compararhorafin) { //la hora de inicio Y de fin, no pueden ser IGUALES
                    echo 4;
                    return;
                }

                //En caso de que no se halla recibido la imagen de la firma y que la firma no este registrada en las carpetas
                if (($_FILES["archivo_firma"]["type"] == null || $_FILES["archivo_firma"]["name"] == '') && $existefirma == 'no') {
                    echo 5;
                    return;
                } else if (($_FILES["archivo_firma"]["type"] != null || $_FILES["archivo_firma"]["name"] != '') && $existefirma == 'no') {
                    //se inserta todo e inserto en usuario la firma y creo la carpeta

                    $archivo = $_FILES["archivo_firma"];
                    $nombre_imagen = $_FILES["archivo_firma"]["name"];
                    $tipo = $_FILES["archivo_firma"]["type"];

                    if ($_FILES["archivo_firma"]['size'] > 20971520) { //tamaño de la imagen de la firma excede los 20MB
                        echo 6;
                        return;
                    } else if ($tipo != "image/png") {
                        // OTRAS EXTENSIONES: $tipo != "image/jpg" && $tipo != "image/jpeg" && $tipo != "image/JPG" && $tipo != "image/PNG" && $tipo != "image/JPEG" && $tipo != "image/bmp"
                        echo 7;
                        return;
                    } else {
                        //ahora inserto

                        $sql1 = "UPDATE usuario SET firma_usuario='$nombre_imagen' WHERE rut ='$rut'";
                        $res1 = mysqli_query($mysqli, $sql1);

                        if (!$res1) {
                            echo 8; //Hubo un error al editar la firma al usuario 
                            return;
                        } else {

                            $sql2 = "INSERT INTO permiso_especial (id_pe,rut,id_comuna,id_mpe,fecha_actual_pe,horainicio_pe,horatermino_pe,fecha_permiso_pe) 
                            VALUES (NULL,'$rut','$comuna','$motivo','$fechadehoy','$horainicio','$horafin','$fechapermiso')";

                            $res2 = mysqli_query($mysqli, $sql2);

                            if (!$res2) {
                                echo 9; //Hubo un error al insertar el permiso
                                return;
                            } else {

                                if (!is_dir('../../perfil/firmas/' . $rut . '/')) { //Si no existe el directorio 
                                    mkdir('../../perfil/firmas/' . $rut . '/', 0777, true); //lo crea
                                    move_uploaded_file($archivo['tmp_name'], '../../perfil/firmas/' . $rut . '/' . $nombre_imagen);
                                } else {
                                    borrarcarpeta('../../perfil/firmas/' . $rut . '/');  //Borra su contenido
                                    mkdir('../../perfil/firmas/' . $rut . '/', 0777, true); //lo crea nuevamente
                                    move_uploaded_file($archivo['tmp_name'], '../../perfil/firmas/' . $rut . '/' . $nombre_imagen);
                                }

                                $sql3 = "SELECT MAX(id_pe) AS ultimopermisosubido FROM permiso_especial"; //Muestro el último articulo insertado en la consulta anterior
                                $res3 = mysqli_query($mysqli, $sql3);

                                if (!$res3) {
                                    echo 10; //Error al mostrar el último id
                                    return;
                                } else {
                                    $fila = mysqli_fetch_array($res3);
                                    $ultimopermisosubido = $fila["ultimopermisosubido"];

                                    $sql4 = "INSERT INTO solicitud_permiso_especial (id_spe,id_pe,rut,id_decision_spe,id_etapas_spe,observacion_spe,fecha_spe) 
                                    VALUES (NULL,'$ultimopermisosubido','$rut','1','1','Ninguna observación','$fechadehoy')";
                                    $res4 = mysqli_query($mysqli, $sql4);

                                    if (!$res4) {
                                        echo 11; //Ha ocurrido un error en la consulta
                                        return;
                                    } else {
                                        echo 12; //confirma que se ingreso correctamente
                                        return;
                                    }
                                }
                            }
                        }
                    }
                } else if (($_FILES["archivo_firma"]['type'] == null || $_FILES["archivo_firma"]['name'] == '') && $existefirma == 'si') {
                    //se inserta todo y no inserto en usuario la firma ni creo la carpeta

                    $sql5 = "INSERT INTO permiso_especial (id_pe,rut,id_comuna,id_mpe,fecha_actual_pe,horainicio_pe,horatermino_pe,fecha_permiso_pe) 
                            VALUES (NULL,'$rut','$comuna','$motivo','$fechadehoy','$horainicio','$horafin','$fechapermiso')";

                    $res5 = mysqli_query($mysqli, $sql5);

                    if (!$res5) {
                        echo 9; //Hubo un error en la consulta
                        return;
                    } else {

                        $sql6 = "SELECT MAX(id_pe) AS ultimopermisosubido FROM permiso_especial"; //Muestro el último articulo insertado en la consulta anterior
                        $res6 = mysqli_query($mysqli, $sql6);

                        if (!$res6) {
                            echo 10; //Error al mostrar el último id
                            return;
                        } else {
                            $fila = mysqli_fetch_array($res6);
                            $ultimopermisosubido = $fila["ultimopermisosubido"];

                            $sql7 = "INSERT INTO solicitud_permiso_especial (id_spe,id_pe,rut,id_decision_spe,id_etapas_spe,observacion_spe,fecha_spe) 
                                    VALUES (NULL,'$ultimopermisosubido','$rut','1','1','Ninguna observación','$fechadehoy')";
                            $res7 = mysqli_query($mysqli, $sql7);

                            if (!$res7) {
                                echo 11; //Ha ocurrido un error en la consulta
                                return;
                            } else {
                                echo 13; //confirma que se ingreso correctamente
                                return;
                            }
                        }
                    }
                }
            }
        } else { //No se han recibido parámetros
            echo 14;
            return;
        }
    } else if ($seleccion == 4) {
        $sql = "SELECT pe.id_pe, pe.id_mpe, pe.fecha_permiso_pe,mpe.descripcion_mpe FROM permiso_especial pe, motivo_pe mpe 
        WHERE pe.id_mpe=mpe.id_mpe and pe.rut='$rutsesion'";
        $consulta = mysqli_query($mysqli, $sql);
        $concat = '';
        if (!$consulta) {
            echo 1;
            return;
        } else {
            $mesesabreviados = array(1 => 'Ene', 2 => 'Feb', 3 => 'Mar', 4 => 'Abr', 5 => 'May', 6 => 'Jun', 7 => 'Jul', 8 => 'Ago', 9 => 'Sep', 10 => 'Oct', 11 => 'Nov', 12 => 'Dic');
            $numero_filas = mysqli_num_rows($consulta);

            if ($numero_filas > 0) {
                $concat .= '<option value="">Seleccione permiso</option>';

                while ($fila1 = mysqli_fetch_array($consulta)) {
                    $idpermiso = $fila1['id_pe'];
                    $codigo = 2000 + $idpermiso;
                    $motivo = $fila1['descripcion_mpe'];
                    $fecha = $fila1['fecha_permiso_pe'];
                    $porcionesfecha = explode("-", $fecha);
                    $año = $porcionesfecha[0];
                    $mes = $porcionesfecha[1];
                    $dia = $porcionesfecha[2];
                    $fechacompleta = $mesesabreviados[(int)$mes] . ' ' . $dia . ' , ' . $año;
                    $concat .= '<option value="' . $idpermiso . '">' . $codigo . ' / ' . toutf8($motivo) . ' / ' . $fechacompleta . '</option>';
                }
            } else {
                $concat = 0;
            }
            echo $concat;
            return;
        }
    } else if ($seleccion == 5) {

        if (isset($_POST["IDpermiso"])) {
            $IDPERMISO = solonumeros($_POST["IDpermiso"]);
            if (validavacioenarreglo(array($IDPERMISO))) {
                echo 1;
                return;
            } else {
                $sql = "SELECT spe.id_spe, spe.id_pe, spe.rut, spe.id_decision_spe, spe.id_etapas_spe, spe.fecha_spe,spe.observacion_spe, rl.nombre_rol,
                etspe.descripcion_etapas_spe
                FROM solicitud_permiso_especial spe, permiso_especial pe, usuario us, rol rl, etapas_spe etspe
                WHERE spe.id_pe=pe.id_pe and spe.rut=us.rut and spe.id_etapas_spe=etspe.id_etapas_spe and us.id_rol=rl.id_rol and spe.id_pe='$IDPERMISO'";
                $consulta = mysqli_query($mysqli, $sql);
                $concat = '';
                $borde = '';
                if (!$consulta) {
                    echo 2;
                    return;
                } else {
                    $mesesabreviados = array(1 => 'Ene', 2 => 'Feb', 3 => 'Mar', 4 => 'Abr', 5 => 'May', 6 => 'Jun', 7 => 'Jul', 8 => 'Ago', 9 => 'Sep', 10 => 'Oct', 11 => 'Nov', 12 => 'Dic');

                    while ($fila = mysqli_fetch_array($consulta)) {

                        // if ($fila['id_etapas_spe'] == 1) {
                        $porcionesfecha = explode("-", $fila['fecha_spe']);
                        $año = $porcionesfecha[0];
                        $mes = $porcionesfecha[1];
                        $dia = $porcionesfecha[2];

                        $concat .= '
                            <div class="timeline__row">
                            <div class="timeline__row_icon">';

                        if ($fila['id_decision_spe'] == 1) {
                            $concat .= '
                                <div class="timeline-icon success">
                                    <i class="fa fa-check"></i>
                                </div>';

                            $borde = 'border border-success';
                        } else {
                            $concat .= '
                                <div class="timeline-icon danger">
                                    <i class="fa fa-times"></i>
                                </div>';
                            $borde = 'border border-danger';
                        }

                        $concat .= '
                            </div>
                            <div class="timeline__row_content">
                                <div class="row pl-2">
                                    <span class="badge badge-curved badge-secondary">' . $mesesabreviados[(int)$mes] . ' ' . $dia . ', ' . $año . '</span>
                                </div>
                                <div class="timeline__row_content_desc ' . $borde . ' ">
                                    <h5><strong>' . $fila['descripcion_etapas_spe'] . '</strong></h5>
                                    <p>' . $fila['observacion_spe'] . '</p>';

                        if ($fila['id_decision_spe'] == 1) {
                            $concat .= '
                                        <label class="btn btn-success">Aprobado</label>';
                        } else {
                            $concat .= '
                                        <label class="btn btn-danger">Rechazado</label>';
                        }
                        $concat .= '
                                </div>
                            </div>
                        </div>';
                        // }
                    }

                    echo $concat;
                    return;
                }
            }
        } else {
            echo 3;
            return;
        }



        //     $numero_filas = mysqli_num_rows($consulta);

        //     if ($numero_filas > 0) {
        //         $concat .= '<option value="">Seleccione permiso</option>';

        //         while ($fila1 = mysqli_fetch_array($consulta)) {
        //             $idpermiso = $fila1['id_pe'];
        //             $codigo = 2000 + $idpermiso;
        //             $motivo = $fila1['descripcion_mpe'];
        //             $fecha = $fila1['fecha_permiso_pe'];
        //             $concat .= '<option value="' . $idpermiso . '">' . $codigo . '-' . toutf8($motivo) . '-' . $fecha . '</option>';
        //         }
        //     }else{
        //         $concat = 0;
        //     }
        //     echo $concat;
        //     return;
        // }
    }
}
