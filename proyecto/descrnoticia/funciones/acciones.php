<?php
include '../../conexion/conexion.php';
include '../../funcionesphp/limpiarCampo.php';
include '../../funcionesphp/TOUTF8.php';
include '../../partes/encriptacion.php';
date_default_timezone_set("America/Santiago");
setlocale(LC_TIME, "spanish");
$fechadehoy = strftime("%F");

if (isset($_POST['seleccionar'])) {
    $seleccionar = $_POST['seleccionar'];

    $days_dias = array(
        'Monday' => 'Lunes',
        'Tuesday' => 'Martes',
        'Wednesday' => 'Miércoles',
        'Thursday' => 'Jueves',
        'Friday' => 'Viernes',
        'Saturday' => 'Sábado',
        'Sunday' => 'Domingo'
    );
    $month_mes = array(
        'January' => 'Enero',
        'February' => 'Febrero',
        'March' => 'Marzo',
        'April' => 'Abril',
        'May' => 'Mayo',
        'June' => 'Junio',
        'July' => 'Julio',
        'August' => 'Agosto',
        'September' => 'Septiembre',
        'October' => 'Octubre',
        'November' => 'Noviembre',
        'December' => 'Diciembre'
    );

    if ($seleccionar == 1) {

        $desencriptar = encriptar($_POST['valarticulo'], "d");
        $idarticulo = mysqli_real_escape_string($mysqli, $desencriptar);

        $sql = "SELECT id_opte,id_fb_opte,imagen_fb_opte,nomyapell_fb_opte,correo_fb_opte, comentario_opte, fecha_opte FROM opinante WHERE id_articulo='$idarticulo' ORDER BY id_opte DESC";
        $consulta = mysqli_query($mysqli, $sql);

        $datos = array();
        while ($fila = mysqli_fetch_array($consulta)) {

            $porcionfecha = explode("-", $fila["fecha_opte"]);
            $convertir_fecha = $days_dias[date('l', strtotime($fila["fecha_opte"]))] . ' ' . $porcionfecha[2] . ', ' . $month_mes[date('F', strtotime($fila["fecha_opte"]))] . ' ' . $porcionfecha[0];

            $datos[] = array(
                'ID_OPTE'               => $fila["id_opte"],
                'ID_FB_OPTE'            => $fila["id_fb_opte"],
                'DIRECCION_IMAGEN'      => $fila["imagen_fb_opte"],
                'NOMBRE_APELLIDO_OPTE'  => $fila["nomyapell_fb_opte"],
                'CORREO_OPTE'           => $fila["correo_fb_opte"],
                'COMENTARIO_OPTE'       => $fila["comentario_opte"],
                'FECHA_OPTE'            => $convertir_fecha
            );
        }
        echo json_encode(toutf8($datos));
    } else if ($seleccionar == 2) {
        $desencriptar   = encriptar($_POST['valarticulo'], "d");
        $idarticulo     = mysqli_real_escape_string($mysqli, $desencriptar);
        $IDUSUARIO      = mysqli_real_escape_string($mysqli, $_POST['params1']);
        $NOMBREUSUARIO  = mysqli_real_escape_string($mysqli, $_POST['params2']);
        $CORREOUSUARIO  = mysqli_real_escape_string($mysqli, $_POST['params3']);
        $IMAGENUSUARIO  = mysqli_real_escape_string($mysqli, $_POST['params4']);
        $COMENTARIO     = mysqli_real_escape_string($mysqli, $_POST['params5']);

        if (validavacioenarreglo(array($idarticulo, $IDUSUARIO, $NOMBREUSUARIO, $CORREOUSUARIO, $IMAGENUSUARIO))) {
            echo 1;
            return;
        } else {
            $sql = "INSERT INTO opinante (id_opte,id_articulo,id_fb_opte,imagen_fb_opte,nomyapell_fb_opte,correo_fb_opte,comentario_opte,fecha_opte) 
            VALUES (NULL,'$idarticulo','$IDUSUARIO','$IMAGENUSUARIO','$NOMBREUSUARIO', '$CORREOUSUARIO', '$COMENTARIO', '$fechadehoy')";
            $consulta = mysqli_query($mysqli, $sql); //Hasta aqui inserto al opinante con los datos almacenados en la cookie

            if (!$consulta) {
                echo 2; //Error al insertar
                return;
                // die("error " . mysqli_error($mysqli));
            } else {
                echo 3; //Inserción hecha
                return;
            }
        }
    } else if ($seleccionar == 3) {

        if (isset($_POST['params1'])) {
            $IDCOMENTARIO = solonumeros($_POST['params1']);
            if (validavacioenarreglo(array($IDCOMENTARIO))) {
                echo 1; // no se ha recibido parámetros
                return;
            } else {
                $consulta = mysqli_query($mysqli, "SELECT id_opte FROM opinante WHERE id_opte='$IDCOMENTARIO'");
                $contador = mysqli_num_rows($consulta);

                if ($contador >= 1) {
                    $consulta2 = mysqli_query($mysqli, "DELETE FROM opinante WHERE id_opte='$IDCOMENTARIO'");
                    if (!$consulta2) {
                        echo 2; //error en la consulta
                        return;
                    } else {
                        echo 3; //éxito en la consulta
                        return;
                    }
                } else {
                    echo 4; //No hay comentarios asociados
                    return;
                }
            }
        } else {
            echo 5; //no se ha recibido paráemtros
            return;
        }
    } else {
        echo 400;
        return;
    }
} else {
    echo 500; //No se ha recibido el parametros
    return;
}

mysqli_close($mysqli);
