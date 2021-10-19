<?php
include '../../conexion/conexion.php';
include '../../funcionesphp/limpiarCampo.php';
include '../../funcionesphp/TOUTF8.php';
include '../../funcionesphp/borrarcarpeta.php';
date_default_timezone_set("America/Santiago");
setlocale(LC_TIME, "spanish");
$fechadehoy = strftime("%F"); //strftime("%F") ó strftime("%Y-%m-%d") Ej:2021-12-23
$anoactual = strftime("%Y");
$mesactual = strftime("%m");
$diaactual = strftime("%d");
session_start();
$rutsesion = $_SESSION['sesionCESFAM']['rut'];

if (isset($_POST['seleccionar'])) {
    $seleccion = $_POST['seleccionar'];
    if ($seleccion == 1) {

        $sql = "SELECT smb.id_sl_mat_bg,mb.id_mb,cmb.nombre_cat_mb,mb.nombre_material_mb, smb.id_seg_sl_mat_bg,
        smb.fecha_sl_mat_bg,smb.stock_sl_mat_bg,smb.comentario_sl_mat_bg
        FROM materiales_bodega mb, categoria_mb cmb, solicitud_mat_bodega smb 
        WHERE mb.id_cat_mb=cmb.id_cat_mb and smb.id_mb=mb.id_mb and smb.rut='$rutsesion'";  //and mb.estado_mb='1'

        $consulta = mysqli_query($mysqli, $sql);

        $datos = array();
        while ($fila = mysqli_fetch_array($consulta)) {
            $datos[] = array(
                'ID_SOLICITUD'         => $fila["id_sl_mat_bg"],
                'ID_MB'                => $fila["id_mb"],
                'ID_SEGUIMIENTO'       => $fila["id_seg_sl_mat_bg"],
                'NOMBRE_CATEGORIA_MB'  => $fila["nombre_cat_mb"],
                'NOMBRE_MATERIAL_MB'   => $fila["nombre_material_mb"],
                'FECHA_REGISTRO_SL'    => $fila["fecha_sl_mat_bg"],
                'CANTIDAD_SL'          => $fila["stock_sl_mat_bg"],
                'COMENTARIO'           => $fila["comentario_sl_mat_bg"]
            );
        }

        echo json_encode(toutf8($datos));
    } else if ($seleccion == 3) {

        //Como muestro números, por la cantidad de stock del material debo validar con números negativos, ya que el stock puede dar 2 y el js va a tomar el 2 de la validacion
        if (isset($_POST['id_material'])) {
            $id_material = solonumeros($_POST['id_material']);

            if (validavacioenarreglo(array($id_material))) { //Valida si estan vacios los datos
                echo -1;
                return;
            } else {

                $sql1 = "SELECT cantidad_mb FROM materiales_bodega WHERE id_mb='$id_material'";
                $resultado1 = mysqli_query($mysqli, $sql1);
                $fila = mysqli_fetch_assoc($resultado1);

                if (!$resultado1) {
                    echo -2;
                    return;
                } else {
                    echo $fila['cantidad_mb'];
                    return;
                }
            }
        } else {
            echo -444;
            return;
        }
    } else if ($seleccion == 4) {
        $sql = "SELECT id_mb, nombre_material_mb FROM materiales_bodega WHERE estado_mb='1'";
        $consulta = mysqli_query($mysqli, $sql);
        $ljson = '';
        if (!$consulta) {
            echo 1;
            return;
        } else {
            //Toma la comuna por defecto de la sesion
            $ljson .= '<option value="">Seleccione una material</option>';

            while ($fila1 = mysqli_fetch_array($consulta)) {
                $idcat = $fila1['id_mb'];
                $nombrecat = $fila1['nombre_material_mb'];
                $ljson .= '<option value="' . $idcat . '">' . toutf8($nombrecat) . '</option>';
            }
            echo $ljson;
            return;
        }
    } else if ($seleccion == 5) {
        if (isset($_POST['id_mat_mb']) && isset($_POST['cantidadmaterial'])) {
            $id_mat_mb = solonumeros($_POST['id_mat_mb']);
            $cantidadmaterial = solonumeros($_POST['cantidadmaterial']);

            if (validavacioenarreglo(array($id_mat_mb, $cantidadmaterial))) { //Valida si estan vacios los datos
                echo 1;
                return;
            } else {
                $sql1 = "INSERT INTO solicitud_mat_bodega (id_sl_mat_bg,rut,id_mb,id_seg_sl_mat_bg,
                        fecha_sl_mat_bg,stock_sl_mat_bg, comentario_sl_mat_bg) VALUES (NULL,
                        '$rutsesion','$id_mat_mb','1','$fechadehoy','$cantidadmaterial','')";

                $resultado1 = mysqli_query($mysqli, $sql1);

                if (!$resultado1) {
                    echo 2;
                    return;
                } else {
                    echo 3;
                    return;
                }
            }
        }
    } else if ($seleccion == 6) {
        if (isset($_POST['id_solicitud'])) {
            $id_solicitud = solonumeros($_POST['id_solicitud']);

            if (validavacioenarreglo(array($id_solicitud))) { //Valida si estan vacios los datos
                echo 1;
                return;
            } else {
                $sql1 = "SELECT id_sl_mat_bg FROM solicitud_mat_bodega WHERE id_sl_mat_bg='$id_solicitud' and id_seg_sl_mat_bg='2'";
                $resultado1 = mysqli_query($mysqli, $sql1);
                $contarfila = mysqli_num_rows($resultado1);

                if ($contarfila >= 1) {
                    echo 2; // Esta solicitud esta aprobada, por lo tanto, no se puede eliminar
                    return;
                } else {
                    $sql2 = "DELETE FROM solicitud_mat_bodega WHERE id_sl_mat_bg='$id_solicitud'";
                    $resultado2 = mysqli_query($mysqli, $sql2);

                    if (!$resultado2) {
                        echo 3; //Ocurrió un error
                        return;
                    } else {
                        echo 4; //Eliminado correctamente
                        return;
                    }
                }
            }
        } else {
            echo 444;
            return;
        }
    } else if ($seleccion == 9) {

        // $sql = "SELECT smb.id_seg_sl_mat_bg, COUNT(smb.id_seg_sl_mat_bg) as cantidad
        // FROM solicitud_mat_bodega smb WHERE smb.rut='$rutsesion'
        // GROUP BY smb.id_seg_sl_mat_bg
        // ORDER BY smb.id_seg_sl_mat_bg"; //ASC LIMIT 3

        // $res = mysqli_query($mysqli, $sql);
        // $datos = array();
        // while ($fila = mysqli_fetch_array($res)) {
        //     $datos[] = array(
        //         'ID_SEGUIMIENTO' => $fila["id_seg_sl_mat_bg"],
        //         'CANTIDAD' => $fila["cantidad"]
        //     );
        // }

        $sql = "SELECT COUNT(id_sl_mat_bg) as contador,
        (SELECT COUNT(id_sl_mat_bg) FROM solicitud_mat_bodega WHERE id_seg_sl_mat_bg=1 and rut='$rutsesion') as solicitud_pendientes_acum,
        (SELECT COUNT(id_sl_mat_bg) FROM solicitud_mat_bodega WHERE id_seg_sl_mat_bg=2 and rut='$rutsesion')as solicitud_aprobadas_acum,
        (SELECT COUNT(id_sl_mat_bg) FROM solicitud_mat_bodega WHERE id_seg_sl_mat_bg=3 and rut='$rutsesion') as solicitud_rechazadas_acum
        FROM solicitud_mat_bodega WHERE rut='$rutsesion'";

        $res = mysqli_query($mysqli, $sql);
        $fila = mysqli_fetch_assoc($res);
        $datos = array();

        $datos[0] = array('solicitud_pendientes_acum' =>  $fila["solicitud_pendientes_acum"]);
        $datos[1] = array('solicitud_aprobadas_acum' =>  $fila["solicitud_aprobadas_acum"]);
        $datos[2] = array('solicitud_rechazadas_acum' =>  $fila["solicitud_rechazadas_acum"] );

        echo json_encode(toutf8($datos));
    } else {
        echo 555;
        return;
    }
}
mysqli_close($mysqli);
