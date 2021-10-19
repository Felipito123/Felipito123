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
        if (
            isset($_POST["ano_permiso"]) &&
            isset($_POST["numero_dia"]) &&
            isset($_POST["fecha_permiso"]) &&
            isset($_POST["rut_reemplazante"]) &&
            isset($_POST["existefirma"])
        ) {

            $rutreemplazante = validarut($_POST["rut_reemplazante"]);
            $numero_dia = solonumeros($_POST["numero_dia"]);
            $ano_permiso = solonumeros($_POST["ano_permiso"]);
            $fechapermiso = fechausuarios($_POST["fecha_permiso"]);
            $existefirma = sololetras($_POST["existefirma"]);

            $añoactual = strftime("%Y");
            $fechadehoy = strftime("%F");
            $porciones = explode("-", $fechapermiso); //$porciones[0]  el año ingresado del formulario


            if (validavacioenarreglo(array($rutreemplazante, $numero_dia, $ano_permiso, $fechapermiso, $existefirma))) {
                echo 1;
                return;
            } else {

                if ($porciones[0] < $añoactual) { //valida si el año de la fecha es menor al del actual, porque tiene que ser año presente o futuro
                    echo 2;
                    return;
                }

                //En caso de que no se halla recibido la imagen de la firma y que la firma no este registrada en las carpetas
                if (($_FILES["archivo_firma"]["type"] == null || $_FILES["archivo_firma"]["name"] == '') && $existefirma == 'no') {
                    echo 3;
                    return;
                } else if (($_FILES["archivo_firma"]["type"] != null || $_FILES["archivo_firma"]["name"] != '') && $existefirma == 'no') {
                    //se inserta todo e inserto en usuario la firma y creo la carpeta

                    $archivo = $_FILES["archivo_firma"];
                    $nombre_imagen = $_FILES["archivo_firma"]["name"];
                    $tipo = $_FILES["archivo_firma"]["type"];

                    if ($_FILES["archivo_firma"]['size'] > 20971520) { //tamaño de la imagen de la firma excede los 20MB
                        echo 4;
                        return;
                    } else if ($tipo != "image/png") {
                        // OTRAS EXTENSIONES: $tipo != "image/jpg" && $tipo != "image/jpeg" && $tipo != "image/JPG" && $tipo != "image/PNG" && $tipo != "image/JPEG" && $tipo != "image/bmp"
                        echo 5;
                        return;
                    } else {
                        //ahora inserto

                        $sql1 = "UPDATE usuario SET firma_usuario='$nombre_imagen' WHERE rut ='$rutsesion'";
                        $res1 = mysqli_query($mysqli, $sql1);

                        if (!$res1) {
                            echo 6; //Hubo un error al editar la firma al usuario 
                            return;
                        } else {

                            $sql2 = "INSERT INTO permiso_feriado_legal (id_pfl,rut_solicitante,rut_reemplazo,
                            ano_pfl,numero_de_dias_pfl,fecha_registro_pfl,fecha_permiso_pfl,ano_feriado_acumulado_pfl,
                            dias_feriado_acumulado_pfl, otros_pfl) 
                            VALUES (NULL,'$rutsesion','$rutreemplazante','$ano_permiso','$numero_dia','$fechadehoy','$fechapermiso', NULL, NULL, NULL)";

                            $res2 = mysqli_query($mysqli, $sql2);

                            if (!$res2) {
                                echo 7; //Hubo un error al insertar el permiso 
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

                                $sql3 = "SELECT MAX(id_pfl) AS ultimopermisosubido FROM permiso_feriado_legal"; //Muestro el último articulo insertado en la consulta anterior
                                $res3 = mysqli_query($mysqli, $sql3);

                                if (!$res3) {
                                    echo 8; //Error al mostrar el último id 
                                    return;
                                } else {
                                    $fila = mysqli_fetch_array($res3);
                                    $ultimopermisosubido = $fila["ultimopermisosubido"];

                                    $sql4 = "INSERT INTO solicitud_feriado_legal (id_sfl,id_pfl,rut_receptor,id_decision_sfl,id_etapas_sfl,fecha_registro,observacion_sfl) 
                                    VALUES (NULL,'$ultimopermisosubido','$rutsesion',1,1,'$fechadehoy','Ninguna observación')";
                                    $res4 = mysqli_query($mysqli, $sql4);

                                    if (!$res4) {
                                        echo 9; //Ha ocurrido un error en la consulta //9
                                        return;
                                    } else {
                                        // InsertarPermisoAcumulado($mysqli, $ultimopermisosubido);

                                        echo 10; //confirma que se ingreso correctamente //10
                                        return;
                                    }
                                }
                            }
                        }
                    }
                } else if (($_FILES["archivo_firma"]['type'] == null || $_FILES["archivo_firma"]['name'] == '') && $existefirma == 'si') {
                    //se inserta todo y no inserto en usuario la firma ni creo la carpeta

                    $sql5 = "INSERT INTO permiso_feriado_legal (id_pfl,rut_solicitante,rut_reemplazo,
                    ano_pfl,numero_de_dias_pfl,fecha_registro_pfl,fecha_permiso_pfl,ano_feriado_acumulado_pfl,
                    dias_feriado_acumulado_pfl, otros_pfl) 
                    VALUES (NULL,'$rutsesion','$rutreemplazante','$ano_permiso','$numero_dia','$fechadehoy','$fechapermiso', NULL, NULL, NULL)";

                    $res5 = mysqli_query($mysqli, $sql5);

                    if (!$res5) {
                        echo 7; //Hubo un error en la consulta 
                        return;
                    } else {

                        $sql6 = "SELECT MAX(id_pfl) AS ultimopermisosubido FROM permiso_feriado_legal"; //Muestro el último articulo insertado en la consulta anterior
                        $res6 = mysqli_query($mysqli, $sql6);

                        if (!$res6) {
                            echo 8; //Error al mostrar el último id 
                            return;
                        } else {
                            $fila = mysqli_fetch_array($res6);
                            $ultimopermisosubido = $fila["ultimopermisosubido"];

                            $sql7 =  "INSERT INTO solicitud_feriado_legal (id_sfl,id_pfl,rut_receptor,id_decision_sfl,
                            id_etapas_sfl,fecha_registro,observacion_sfl) VALUES (NULL,'$ultimopermisosubido','$rutsesion',1,1,'$fechadehoy','Ninguna observación')";

                            $res7 = mysqli_query($mysqli, $sql7);

                            if (!$res7) {
                                echo 9; //Ha ocurrido un error en la consulta  
                                return;
                            } else {
                                // InsertarPermisoAcumulado($mysqli, $ultimopermisosubido);
                                echo 11; //confirma que se ingreso correctamente 
                                return;
                            }
                        }
                    }
                }
            }
        } else { //No se han recibido parámetros
            echo 12;
            return;
        }
    } else if ($seleccion == 2) {
        $sql = "SELECT id_pfl, fecha_permiso_pfl FROM permiso_feriado_legal WHERE rut_solicitante='$rutsesion'";
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
                    $idpermiso = $fila1['id_pfl'];
                    $codigo = 2000 + $idpermiso;
                    $fechapermiso = $fila1['fecha_permiso_pfl'];
                    $porcionesfecha = explode("-", $fechapermiso);
                    $año = $porcionesfecha[0];
                    $mes = $porcionesfecha[1];
                    $dia = $porcionesfecha[2];
                    $fechacompleta = $mesesabreviados[(int)$mes] . ' ' . $dia . ' , ' . $año;
                    $concat .= '<option value="' . $idpermiso . '">' . $codigo . ' / ' . $fechacompleta . '</option>';
                }
                // $concat .= '<option value="' . $idpermiso . '">' . $codigo . ' / ' . toutf8($motivo) . ' / ' . $fechacompleta . '</option>';
            } else {
                $concat = 0;
            }
            echo $concat;
            return;
        }
    } else if ($seleccion == 3) { //Select SEGUIMIENTO

        if (isset($_POST["IDpermiso"])) {
            $IDPERMISO = solonumeros($_POST["IDpermiso"]);
            if (validavacioenarreglo(array($IDPERMISO))) {
                echo 1;
                return;
            } else {
                $sql = "SELECT sfl.id_sfl, pfl.id_pfl, sfl.rut_receptor, sfl.id_decision_sfl, sfl.id_etapas_sfl, sfl.fecha_registro, rl.nombre_rol,
                etsfl.descripcion_etapas_sfl, sfl.observacion_sfl, pfl.otros_pfl
                FROM solicitud_feriado_legal sfl, permiso_feriado_legal pfl, usuario us, rol rl, etapas_sfl etsfl
                WHERE sfl.id_pfl=pfl.id_pfl and sfl.rut_receptor=us.rut and sfl.id_etapas_sfl=etsfl.id_etapas_sfl and us.id_rol=rl.id_rol and sfl.id_pfl='$IDPERMISO'";
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
                        $porcionesfecha = explode("-", $fila['fecha_registro']);
                        $año = $porcionesfecha[0];
                        $mes = $porcionesfecha[1];
                        $dia = $porcionesfecha[2];

                        $concat .= '
                            <div class="timeline__row">
                            <div class="timeline__row_icon">';

                        if ($fila['id_decision_sfl'] == 1) {
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
                                    <h5><strong>' . $fila['descripcion_etapas_sfl'] . '</strong></h5>';

                        $concat .= '<p><small><strong>Observacion: </strong> ' . $fila['observacion_sfl'] . '  </small>';

                        $concat .= '<br><br>';

                        // if ($fila['con_goce_remuneraciones'] != NULL && $fila['sin_goce_remuneraciones'] != NULL && $fila['id_etapas_spa'] == 3) {
                        //     $concat .=  '<br><small><strong>' . $fila['con_goce_remuneraciones'] . '</strong> Dias con goce y <strong> ' . $fila['sin_goce_remuneraciones'] . '</strong> Dias sin goce</small></p>';
                        // } else {
                        //     $concat .= '</p>';
                        // }

                        if ($fila['id_decision_sfl'] == 1) {
                            $concat .= '
                                        <label class="btn btn-success col-sm-6">Aprobado</label>';
                        } else {
                            $concat .= '
                                        <label class="btn btn-danger col-sm-6">Rechazado</label>';
                        }
                        $concat .= '
                                </div>
                            </div>
                        </div>';
                    }

                    echo $concat;
                    return;
                }
            }
        } else {
            echo 3;
            return;
        }
    }
}


// function InsertarPermisoAcumulado($mysqli, $ultimopermisosubido)
// {
//     /*Muesto el id_spa de ese permiso admin... Como es la primera vez que ingresa un registro, 
//     se puede consultar  por la única solicitud_permiso_administrativo disponible*/
//     $sqele1 = "SELECT id_spa FROM solicitud_permiso_administrativo WHERE id_pa='$ultimopermisosubido'";
//     $res_ele1 = mysqli_query($mysqli, $sqele1);
//     $fila_sql1 = mysqli_fetch_assoc($res_ele1);
//     $id_spa =  $fila_sql1['id_spa'];
//     $sqlele2 = "INSERT INTO permisos_acumulados (id_permisos_acumulados,id_spa,con_goce_remuneraciones,sin_goce_remuneraciones, otros) VALUES (NULL,'$id_spa',NULL,NULL,NULL)";
//     $res_ele2 = mysqli_query($mysqli, $sqlele2);
// }
