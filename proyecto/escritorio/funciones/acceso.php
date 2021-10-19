<?php
// header('Content-Type: application/json');
include '../../conexion/conexion.php';
include '../../funcionesphp/TOUTF8.php';
include '../../funcionesphp/limpiarcampo.php';
date_default_timezone_set("America/Santiago");
setlocale(LC_TIME, "spanish");
$añoactual = strftime("%Y");
$mesactual = strftime("%m");
$fechadehoy = strftime("%F");

if (isset($_POST['seleccionar'])) {
    $seleccion = $_POST['seleccionar'];
    if ($seleccion == 1) {
        $sql = "SELECT pat.nombre_patologia, COUNT(pac.id_patologia) as cantidad 
        FROM paciente pac, patologia pat 
        WHERE pac.id_patologia=pat.id_patologia
        GROUP BY pat.nombre_patologia
        ORDER BY pat.nombre_patologia ASC LIMIT 4";

        $res = mysqli_query($mysqli, $sql);
        $datos = array();
        while ($fila = mysqli_fetch_array($res)) {
            $datos[] = array(
                'NOMBRE_PATOLOGIA' => $fila["nombre_patologia"],
                'CANTIDAD' => $fila["cantidad"]
            );
        }
        echo json_encode(toutf8($datos));
    } else if ($seleccion == 2) {
        $sql = "SELECT fecha_registro, COUNT(rut_paciente) as cantidad 
        FROM paciente WHERE year(fecha_registro) = '$añoactual'
        GROUP BY fecha_registro
        ORDER BY fecha_registro";

        $res = mysqli_query($mysqli, $sql);
        $datos = array();
        while ($fila = mysqli_fetch_array($res)) {
            $datos[] = array(
                'FECHA_REGISTRO' => $fila["fecha_registro"],
                'CANTIDAD' =>  $fila["cantidad"]
            );
        }
        echo json_encode(toutf8($datos));
    } else if ($seleccion == 3) {

        $s65años  = $añoactual - 65;
        $s70años  = $añoactual - 70;
        $s75años  = $añoactual - 75;
        $s80años  = $añoactual - 80;
        $s85años  = $añoactual - 85;
        $s90años  = $añoactual - 90;
        $s95años  = $añoactual - 95;
        $s100años = $añoactual - 100;
        $s105años = $añoactual - 105;

        $sql = "SELECT COUNT(sexo_paciente) as contador,
        (SELECT COUNT(sexo_paciente) FROM paciente WHERE sexo_paciente='Hombre' and year(edad_paciente)= '$s65años') as H65,
        (SELECT COUNT(sexo_paciente) FROM paciente WHERE sexo_paciente='Mujer' and year(edad_paciente) = '$s65años') as M65,
        (SELECT COUNT(sexo_paciente) FROM paciente WHERE sexo_paciente='Hombre'and year(edad_paciente) BETWEEN '$s70años' and '$s65años') as H65y70,
        (SELECT COUNT(sexo_paciente) FROM paciente WHERE sexo_paciente='Mujer' and year(edad_paciente) BETWEEN '$s70años' and '$s65años') as M65y70,
        (SELECT COUNT(sexo_paciente) FROM paciente WHERE sexo_paciente='Hombre'and year(edad_paciente) BETWEEN '$s75años' and '$s70años') as H70y75,
        (SELECT COUNT(sexo_paciente) FROM paciente WHERE sexo_paciente='Mujer' and year(edad_paciente) BETWEEN '$s75años' and '$s70años') as M70y75,
        (SELECT COUNT(sexo_paciente) FROM paciente WHERE sexo_paciente='Hombre'and year(edad_paciente) BETWEEN '$s80años' and '$s75años') as H75y80,
        (SELECT COUNT(sexo_paciente) FROM paciente WHERE sexo_paciente='Mujer' and year(edad_paciente) BETWEEN '$s80años' and '$s75años') as M75y80,
        (SELECT COUNT(sexo_paciente) FROM paciente WHERE sexo_paciente='Hombre'and year(edad_paciente) BETWEEN '$s85años' and '$s80años') as H80y85,
        (SELECT COUNT(sexo_paciente) FROM paciente WHERE sexo_paciente='Mujer' and year(edad_paciente) BETWEEN '$s85años' and '$s80años') as M80y85,
        (SELECT COUNT(sexo_paciente) FROM paciente WHERE sexo_paciente='Hombre'and year(edad_paciente) BETWEEN '$s90años' and '$s85años') as H85y90,
        (SELECT COUNT(sexo_paciente) FROM paciente WHERE sexo_paciente='Mujer' and year(edad_paciente) BETWEEN '$s90años' and '$s85años') as M85y90,
        (SELECT COUNT(sexo_paciente) FROM paciente WHERE sexo_paciente='Hombre'and year(edad_paciente) BETWEEN '$s95años' and '$s90años') as H90y95,
        (SELECT COUNT(sexo_paciente) FROM paciente WHERE sexo_paciente='Mujer' and year(edad_paciente) BETWEEN '$s95años' and '$s90años') as M90y95,
        (SELECT COUNT(sexo_paciente) FROM paciente WHERE sexo_paciente='Hombre'and year(edad_paciente) BETWEEN '$s100años' and '$s95años') as H95y100,
        (SELECT COUNT(sexo_paciente) FROM paciente WHERE sexo_paciente='Mujer' and year(edad_paciente) BETWEEN '$s100años' and '$s95años') as M95y100,
        (SELECT COUNT(sexo_paciente) FROM paciente WHERE sexo_paciente='Hombre'and year(edad_paciente) BETWEEN '$s105años' and '$s100años') as H100y105,
        (SELECT COUNT(sexo_paciente) FROM paciente WHERE sexo_paciente='Mujer' and year(edad_paciente) BETWEEN '$s105años' and '$s100años') as M100y105
        FROM paciente";

        // SELECT COUNT(sexo_paciente) as contador,
        //         (SELECT COUNT(sexo_paciente) FROM paciente WHERE sexo_paciente='Hombre' and year(edad_paciente)= '1956') as H65,
        //         (SELECT COUNT(sexo_paciente) FROM paciente WHERE sexo_paciente='Mujer' and year(edad_paciente) = '1956') as M65,
        //         (SELECT COUNT(sexo_paciente) FROM paciente WHERE sexo_paciente='Hombre'and year(edad_paciente) BETWEEN '1951' and '1956') as H65y70,
        //         (SELECT COUNT(sexo_paciente) FROM paciente WHERE sexo_paciente='Mujer' and year(edad_paciente) BETWEEN '1951' and '1956') as M65y70,
        //         (SELECT COUNT(sexo_paciente) FROM paciente WHERE sexo_paciente='Hombre'and year(edad_paciente) BETWEEN '1946' and '1951') as H70y75,
        //         (SELECT COUNT(sexo_paciente) FROM paciente WHERE sexo_paciente='Mujer' and year(edad_paciente) BETWEEN '1946' and '1951') as M70y75,
        //         (SELECT COUNT(sexo_paciente) FROM paciente WHERE sexo_paciente='Hombre'and year(edad_paciente) BETWEEN '1941' and '1946') as H75y80,
        //         (SELECT COUNT(sexo_paciente) FROM paciente WHERE sexo_paciente='Mujer' and year(edad_paciente) BETWEEN '1941' and '1946') as M75y80,
        //         (SELECT COUNT(sexo_paciente) FROM paciente WHERE sexo_paciente='Hombre'and year(edad_paciente) BETWEEN '1936' and '1941') as H80y85,
        //         (SELECT COUNT(sexo_paciente) FROM paciente WHERE sexo_paciente='Mujer' and year(edad_paciente) BETWEEN '1936' and '1941') as M80y85,
        //         (SELECT COUNT(sexo_paciente) FROM paciente WHERE sexo_paciente='Hombre'and year(edad_paciente) BETWEEN '1931' and '1936') as H85y90,
        //         (SELECT COUNT(sexo_paciente) FROM paciente WHERE sexo_paciente='Mujer' and year(edad_paciente) BETWEEN '1931' and '1936') as M85y90,
        //         (SELECT COUNT(sexo_paciente) FROM paciente WHERE sexo_paciente='Hombre'and year(edad_paciente) BETWEEN '1926' and '1931') as H90y95,
        //         (SELECT COUNT(sexo_paciente) FROM paciente WHERE sexo_paciente='Mujer' and year(edad_paciente) BETWEEN '1926' and '1931') as M90y95,
        //         (SELECT COUNT(sexo_paciente) FROM paciente WHERE sexo_paciente='Hombre'and year(edad_paciente) BETWEEN '1921' and '1926') as H95y100,
        //         (SELECT COUNT(sexo_paciente) FROM paciente WHERE sexo_paciente='Mujer' and year(edad_paciente) BETWEEN '1921' and '1926') as M95y100,
        //         (SELECT COUNT(sexo_paciente) FROM paciente WHERE sexo_paciente='Hombre'and year(edad_paciente) BETWEEN '1916' and '1921') as H100y105,
        //         (SELECT COUNT(sexo_paciente) FROM paciente WHERE sexo_paciente='Mujer' and year(edad_paciente) BETWEEN '1916' and '1921') as M100y105
        //         FROM paciente;

        // Consulta por rango también, entre fechas
        // SELECT rut_paciente FROM paciente WHERE sexo_paciente='Hombre' 
        // and year(edad_paciente) BETWEEN '1949' and '1956';

        $res = mysqli_query($mysqli, $sql);
        $fila = mysqli_fetch_assoc($res);
        $datos = array();

        $datos[0] = array(
            'edad' => "65",
            'hombre' =>  $fila["H65"],
            'mujer' =>  $fila["M65"]
        );

        // if (!($fila["H65y70"] == 0 ||  $fila["M65y70"] == 0)) {
        $datos[1] = array(
            'edad' => "65-70",
            'hombre' =>  $fila["H65y70"],
            'mujer' => $fila["M65y70"]
        );
        // }

        // if (!($fila["H70y75"] == 0 ||  $fila["M70y75"] == 0)) {
        $datos[2] = array(
            'edad' => "70-75",
            'hombre' =>  $fila["H70y75"],
            'mujer' => $fila["M70y75"]
        );
        // }

        // if (!($fila["H75y80"] == 0 ||  $fila["M75y80"] == 0)) {
        $datos[3] = array(
            'edad' => "75-80",
            'hombre' =>  $fila["H75y80"],
            'mujer' => $fila["M75y80"]
        );
        // }

        // if (!($fila["H80y85"] == 0 ||  $fila["M80y85"] == 0)) {
        $datos[4] = array(
            'edad' => "80-85",
            'hombre' =>  $fila["H80y85"],
            'mujer' => $fila["M80y85"]
        );
        // }

        // if (!($fila["H85y90"] == 0 ||  $fila["M85y90"] == 0)) {
        $datos[5] = array(
            'edad' => "85-90",
            'hombre' =>  $fila["H85y90"],
            'mujer' => $fila["M85y90"]
        );
        // }

        // if (!($fila["H90y95"] == 0 ||  $fila["M90y95"] == 0)) {
        $datos[6] = array(
            'edad' => "90-95",
            'hombre' =>  $fila["H90y95"],
            'mujer' => $fila["M90y95"]
        );
        // }

        // if (!($fila["H95y100"] == 0 ||  $fila["M95y100"] == 0)) {
        $datos[7] = array(
            'edad' => "95-100",
            'hombre' =>  $fila["H95y100"],
            'mujer' => $fila["M95y100"]
        );
        // }

        // if (!($fila["H100y105"] == 0 ||  $fila["M100y105"] == 0)) {
        $datos[8] = array(
            'edad' => "100+",
            'hombre' =>  $fila["H100y105"],
            'mujer' => $fila["M100y105"]
        );
        // }

        echo json_encode(toutf8($datos));
    } else if ($seleccion == 4) {
        $sql = "SELECT cmb.nombre_cat_mb, COUNT(mb.id_mb) as cantidad 
        FROM materiales_bodega mb, categoria_mb cmb 
        WHERE mb.id_cat_mb=cmb.id_cat_mb
        GROUP BY cmb.nombre_cat_mb
        ORDER BY cmb.nombre_cat_mb ASC LIMIT 3";

        $res = mysqli_query($mysqli, $sql);
        $datos = array();
        while ($fila = mysqli_fetch_array($res)) {
            $datos[] = array(
                'NOMBRE_CAT_MB' => $fila["nombre_cat_mb"],
                'CANTIDAD' => $fila["cantidad"]
            );
        }
        echo json_encode(toutf8($datos));
    } else if ($seleccion == 5) {
        $sql = "SELECT cal.id_articulo,art.titulo_articulo, SUM(cal.valor_calificacion_articulo) as suma,
        COUNT(cal.id_articulo) as contador, AVG(cal.valor_calificacion_articulo) as promedio
        FROM calificacion_articulo cal, articulo art WHERE art.id_articulo=cal.id_articulo
        GROUP BY cal.id_articulo
        ORDER BY promedio DESC LIMIT 4";

        $res = mysqli_query($mysqli, $sql);
        $datos = array();
        while ($fila = mysqli_fetch_array($res)) {
            $datos[] = array(
                'TITULO_ARTICULO' => $fila["titulo_articulo"],
                'PROMEDIO' => $fila["promedio"]
            );
        }
        echo json_encode(toutf8($datos));
    } else if ($seleccion == 6) {
        $sql = "SELECT DISTINCT ciudad_calificacion_articulo FROM calificacion_articulo";
        $consulta = mysqli_query($mysqli, $sql);
        $datos = array();
        while ($fila = mysqli_fetch_array($consulta)) {
            $datos[] = array(
                'CIUDAD_CALIFICADO' => $fila["ciudad_calificacion_articulo"]
            );
        }
        echo json_encode(toutf8($datos));
    } else if ($seleccion == 7) {

        $sql1 = "SELECT COUNT(nombre_contacto) as bandj_prim_sem FROM contacto WHERE (month(fecha_contacto) >= 1 and month(fecha_contacto) <=6) and year(fecha_contacto) = '$añoactual'";
        $consulta1 = mysqli_query($mysqli, $sql1);
        $sql2 = "SELECT COUNT(nombre_contacto) as bandj_seg_sem FROM contacto WHERE month(fecha_contacto) >= 7 and month(fecha_contacto) <=12 and year(fecha_contacto) = '$añoactual'";
        $consulta2 = mysqli_query($mysqli, $sql2);
        $fila1 = mysqli_fetch_assoc($consulta1);
        $fila2 = mysqli_fetch_assoc($consulta2);
        $datos = array();
        $datos[0] = array('total_bandeja_primSem' => $fila1['bandj_prim_sem']);
        $datos[1] = array('total_bandeja_segSem' => $fila2['bandj_seg_sem']);

        echo json_encode(toutf8($datos));

        // $sql = "SELECT DISTINCT ciudad_calificacion_articulo FROM calificacion_articulo";
        // $consulta = mysqli_query($mysqli, $sql);
        // $datos = array();
        // while ($fila = mysqli_fetch_array($consulta)) {
        //     $datos[] = array(
        //         'CIUDAD_CALIFICADO' => $fila["ciudad_calificacion_articulo"]
        //     );
        // }
        // echo json_encode(toutf8($datos));
    } else if ($seleccion == 8) {

        $sql1 = "SELECT COUNT(id_reunion) as cantidad_videoconf FROM reunion";
        $sql2 = "SELECT COUNT(id_documentos) as cantidad_micuenta FROM documentos";
        $sql3 = "SELECT COUNT(id_calidad) as cantidad_calidad FROM calidad";
        $sql4 = "SELECT COUNT(id) as cantidad_eventos FROM eventos";

        $consulta1 = mysqli_query($mysqli, $sql1);
        $consulta2 = mysqli_query($mysqli, $sql2);
        $consulta3 = mysqli_query($mysqli, $sql3);
        $consulta4 = mysqli_query($mysqli, $sql4);

        $fila1 = mysqli_fetch_assoc($consulta1);
        $fila2 = mysqli_fetch_assoc($consulta2);
        $fila3 = mysqli_fetch_assoc($consulta3);
        $fila4 = mysqli_fetch_assoc($consulta4);

        $datos = array();
        $datos[0] = array('total_cantidad_videoconf' => $fila1['cantidad_videoconf']);
        $datos[1] = array('total_cantidad_micuenta'  => $fila2['cantidad_micuenta']);
        $datos[2] = array('total_cantidad_calidad'   => $fila3['cantidad_calidad']);
        $datos[3] = array('total_cantidad_eventos'   => $fila4['cantidad_eventos']);

        echo json_encode(toutf8($datos));
    } else if ($seleccion == 9) {

        $sql1 = "SELECT COUNT(rut_paciente) as cantidad_pacientes FROM paciente";
        $sql2 = "SELECT COUNT(rut_paciente) as cantidad_pacientes_hom FROM paciente WHERE sexo_paciente='Hombre'";
        $sql3 = "SELECT COUNT(rut_paciente) as cantidad_pacientes_muj FROM paciente WHERE sexo_paciente='Mujer'";
        $sql4 = "SELECT COUNT(id_solicitud_medicamento) as cantidad_sol_medicamentos FROM solicitud_medicamento";
        $sql5 = "SELECT COUNT(id_retiro_med) as cantidad_agenda_retiro_med FROM agendar_retiro_medicamento";

        $consulta1 = mysqli_query($mysqli, $sql1);
        $consulta2 = mysqli_query($mysqli, $sql2);
        $consulta3 = mysqli_query($mysqli, $sql3);
        $consulta4 = mysqli_query($mysqli, $sql4);
        $consulta5 = mysqli_query($mysqli, $sql5);

        $fila1 = mysqli_fetch_assoc($consulta1);
        $fila2 = mysqli_fetch_assoc($consulta2);
        $fila3 = mysqli_fetch_assoc($consulta3);
        $fila4 = mysqli_fetch_assoc($consulta4);
        $fila5 = mysqli_fetch_assoc($consulta5);

        $datos = array();
        $datos[0] = array('total_cantidad_pacientes'        => $fila1['cantidad_pacientes']);
        $datos[1] = array('total_cantidad_pacientes_hom'    => $fila2['cantidad_pacientes_hom']);
        $datos[2] = array('total_cantidad_pacientes_muj'    => $fila3['cantidad_pacientes_muj']);
        $datos[3] = array('total_cantidad_sol_medicamentos' => $fila4['cantidad_sol_medicamentos']);
        $datos[4] = array('total_cantidad_agenda_retiro_med' => $fila5['cantidad_agenda_retiro_med']);

        echo json_encode(toutf8($datos));
    } else if ($seleccion == 10) {

        /* MATERIALES DE ASEO DE ENERO A DICIEMBRE DEL PRESENTE AÑO */

        $sqlA1 = "SELECT mb.fecharegistro_mb,MONTH(mb.fecharegistro_mb) as mes, COUNT(mb.fecharegistro_mb) as fecha_que_tienen_mismo_añoymes, SUM(mb.cantidad_mb) as cantidad_materiales, cmb.nombre_cat_mb
        FROM materiales_bodega mb, categoria_mb cmb WHERE year(mb.fecharegistro_mb) = '$añoactual' and month(mb.fecharegistro_mb) = '1' and mb.id_cat_mb=cmb.id_cat_mb and mb.id_cat_mb=1
        GROUP BY YEAR(mb.fecharegistro_mb), MONTH(mb.fecharegistro_mb)";

        $sqlA2 = "SELECT mb.fecharegistro_mb,MONTH(mb.fecharegistro_mb) as mes, COUNT(mb.fecharegistro_mb) as fecha_que_tienen_mismo_añoymes, SUM(mb.cantidad_mb) as cantidad_materiales, cmb.nombre_cat_mb
        FROM materiales_bodega mb, categoria_mb cmb WHERE year(mb.fecharegistro_mb) = '$añoactual' and month(mb.fecharegistro_mb) = '2' and mb.id_cat_mb=cmb.id_cat_mb and mb.id_cat_mb=1
        GROUP BY YEAR(mb.fecharegistro_mb), MONTH(mb.fecharegistro_mb)";

        $sqlA3 = "SELECT mb.fecharegistro_mb,MONTH(mb.fecharegistro_mb) as mes, COUNT(mb.fecharegistro_mb) as fecha_que_tienen_mismo_añoymes, SUM(mb.cantidad_mb) as cantidad_materiales, cmb.nombre_cat_mb
        FROM materiales_bodega mb, categoria_mb cmb WHERE year(mb.fecharegistro_mb) = '$añoactual' and month(mb.fecharegistro_mb) = '3' and mb.id_cat_mb=cmb.id_cat_mb and mb.id_cat_mb=1
        GROUP BY YEAR(mb.fecharegistro_mb), MONTH(mb.fecharegistro_mb)";

        $sqlA4 = "SELECT mb.fecharegistro_mb,MONTH(mb.fecharegistro_mb) as mes, COUNT(mb.fecharegistro_mb) as fecha_que_tienen_mismo_añoymes, SUM(mb.cantidad_mb) as cantidad_materiales, cmb.nombre_cat_mb
        FROM materiales_bodega mb, categoria_mb cmb WHERE year(mb.fecharegistro_mb) = '$añoactual' and month(mb.fecharegistro_mb) = '4' and mb.id_cat_mb=cmb.id_cat_mb and mb.id_cat_mb=1
        GROUP BY YEAR(mb.fecharegistro_mb), MONTH(mb.fecharegistro_mb)";

        $sqlA5 = "SELECT mb.fecharegistro_mb,MONTH(mb.fecharegistro_mb) as mes, COUNT(mb.fecharegistro_mb) as fecha_que_tienen_mismo_añoymes, SUM(mb.cantidad_mb) as cantidad_materiales, cmb.nombre_cat_mb
        FROM materiales_bodega mb, categoria_mb cmb WHERE year(mb.fecharegistro_mb) = '$añoactual' and month(mb.fecharegistro_mb) = '5' and mb.id_cat_mb=cmb.id_cat_mb and mb.id_cat_mb=1
        GROUP BY YEAR(mb.fecharegistro_mb), MONTH(mb.fecharegistro_mb)";

        $sqlA6 = "SELECT mb.fecharegistro_mb,MONTH(mb.fecharegistro_mb) as mes, COUNT(mb.fecharegistro_mb) as fecha_que_tienen_mismo_añoymes, SUM(mb.cantidad_mb) as cantidad_materiales, cmb.nombre_cat_mb
        FROM materiales_bodega mb, categoria_mb cmb WHERE year(mb.fecharegistro_mb) = '$añoactual' and month(mb.fecharegistro_mb) = '6' and mb.id_cat_mb=cmb.id_cat_mb and mb.id_cat_mb=1
        GROUP BY YEAR(mb.fecharegistro_mb), MONTH(mb.fecharegistro_mb)";

        $sqlA7 = "SELECT mb.fecharegistro_mb,MONTH(mb.fecharegistro_mb) as mes, COUNT(mb.fecharegistro_mb) as fecha_que_tienen_mismo_añoymes, SUM(mb.cantidad_mb) as cantidad_materiales, cmb.nombre_cat_mb
        FROM materiales_bodega mb, categoria_mb cmb WHERE year(mb.fecharegistro_mb) = '$añoactual' and month(mb.fecharegistro_mb) = '7' and mb.id_cat_mb=cmb.id_cat_mb and mb.id_cat_mb=1
        GROUP BY YEAR(mb.fecharegistro_mb), MONTH(mb.fecharegistro_mb)";

        $sqlA8 = "SELECT mb.fecharegistro_mb,MONTH(mb.fecharegistro_mb) as mes, COUNT(mb.fecharegistro_mb) as fecha_que_tienen_mismo_añoymes, SUM(mb.cantidad_mb) as cantidad_materiales, cmb.nombre_cat_mb
        FROM materiales_bodega mb, categoria_mb cmb WHERE year(mb.fecharegistro_mb) = '$añoactual' and month(mb.fecharegistro_mb) = '8' and mb.id_cat_mb=cmb.id_cat_mb and mb.id_cat_mb=1
        GROUP BY YEAR(mb.fecharegistro_mb), MONTH(mb.fecharegistro_mb)";

        $sqlA9 = "SELECT mb.fecharegistro_mb,MONTH(mb.fecharegistro_mb) as mes, COUNT(mb.fecharegistro_mb) as fecha_que_tienen_mismo_añoymes, SUM(mb.cantidad_mb) as cantidad_materiales, cmb.nombre_cat_mb
        FROM materiales_bodega mb, categoria_mb cmb WHERE year(mb.fecharegistro_mb) = '$añoactual' and month(mb.fecharegistro_mb) = '9' and mb.id_cat_mb=cmb.id_cat_mb and mb.id_cat_mb=1
        GROUP BY YEAR(mb.fecharegistro_mb), MONTH(mb.fecharegistro_mb)";

        $sqlA10 = "SELECT mb.fecharegistro_mb,MONTH(mb.fecharegistro_mb) as mes, COUNT(mb.fecharegistro_mb) as fecha_que_tienen_mismo_añoymes, SUM(mb.cantidad_mb) as cantidad_materiales, cmb.nombre_cat_mb
        FROM materiales_bodega mb, categoria_mb cmb WHERE year(mb.fecharegistro_mb) = '$añoactual' and month(mb.fecharegistro_mb) = '10' and mb.id_cat_mb=cmb.id_cat_mb and mb.id_cat_mb=1
        GROUP BY YEAR(mb.fecharegistro_mb), MONTH(mb.fecharegistro_mb)";

        $sqlA11 = "SELECT mb.fecharegistro_mb,MONTH(mb.fecharegistro_mb) as mes, COUNT(mb.fecharegistro_mb) as fecha_que_tienen_mismo_añoymes, SUM(mb.cantidad_mb) as cantidad_materiales, cmb.nombre_cat_mb
        FROM materiales_bodega mb, categoria_mb cmb WHERE year(mb.fecharegistro_mb) = '$añoactual' and month(mb.fecharegistro_mb) = '11' and mb.id_cat_mb=cmb.id_cat_mb and mb.id_cat_mb=1
        GROUP BY YEAR(mb.fecharegistro_mb), MONTH(mb.fecharegistro_mb)";

        $sqlA12 = "SELECT mb.fecharegistro_mb,MONTH(mb.fecharegistro_mb) as mes, COUNT(mb.fecharegistro_mb) as fecha_que_tienen_mismo_añoymes, SUM(mb.cantidad_mb) as cantidad_materiales, cmb.nombre_cat_mb
        FROM materiales_bodega mb, categoria_mb cmb WHERE year(mb.fecharegistro_mb) = '$añoactual' and month(mb.fecharegistro_mb) = '12' and mb.id_cat_mb=cmb.id_cat_mb and mb.id_cat_mb=1
        GROUP BY YEAR(mb.fecharegistro_mb), MONTH(mb.fecharegistro_mb)";

        /* MATERIALES DE OFICINA DE ENERO A JUNIO DEL PRESENTE AÑO */

        $sqlO1 = "SELECT mb.fecharegistro_mb,MONTH(mb.fecharegistro_mb) as mes, COUNT(mb.fecharegistro_mb) as fecha_que_tienen_mismo_añoymes, SUM(mb.cantidad_mb) as cantidad_materiales, cmb.nombre_cat_mb
        FROM materiales_bodega mb, categoria_mb cmb WHERE year(mb.fecharegistro_mb) = '$añoactual' and month(mb.fecharegistro_mb) = '1' and mb.id_cat_mb=cmb.id_cat_mb and mb.id_cat_mb=2
        GROUP BY YEAR(mb.fecharegistro_mb), MONTH(mb.fecharegistro_mb)";

        $sqlO2 = "SELECT mb.fecharegistro_mb,MONTH(mb.fecharegistro_mb) as mes, COUNT(mb.fecharegistro_mb) as fecha_que_tienen_mismo_añoymes, SUM(mb.cantidad_mb) as cantidad_materiales, cmb.nombre_cat_mb
        FROM materiales_bodega mb, categoria_mb cmb WHERE year(mb.fecharegistro_mb) = '$añoactual' and month(mb.fecharegistro_mb) = '2' and mb.id_cat_mb=cmb.id_cat_mb and mb.id_cat_mb=2
        GROUP BY YEAR(mb.fecharegistro_mb), MONTH(mb.fecharegistro_mb)";

        $sqlO3 = "SELECT mb.fecharegistro_mb,MONTH(mb.fecharegistro_mb) as mes, COUNT(mb.fecharegistro_mb) as fecha_que_tienen_mismo_añoymes, SUM(mb.cantidad_mb) as cantidad_materiales, cmb.nombre_cat_mb
        FROM materiales_bodega mb, categoria_mb cmb WHERE year(mb.fecharegistro_mb) = '$añoactual' and month(mb.fecharegistro_mb) = '3' and mb.id_cat_mb=cmb.id_cat_mb and mb.id_cat_mb=2
        GROUP BY YEAR(mb.fecharegistro_mb), MONTH(mb.fecharegistro_mb)";

        $sqlO4 = "SELECT mb.fecharegistro_mb,MONTH(mb.fecharegistro_mb) as mes, COUNT(mb.fecharegistro_mb) as fecha_que_tienen_mismo_añoymes, SUM(mb.cantidad_mb) as cantidad_materiales, cmb.nombre_cat_mb
        FROM materiales_bodega mb, categoria_mb cmb WHERE year(mb.fecharegistro_mb) = '$añoactual' and month(mb.fecharegistro_mb) = '4' and mb.id_cat_mb=cmb.id_cat_mb and mb.id_cat_mb=2
        GROUP BY YEAR(mb.fecharegistro_mb), MONTH(mb.fecharegistro_mb)";

        $sqlO5 = "SELECT mb.fecharegistro_mb,MONTH(mb.fecharegistro_mb) as mes, COUNT(mb.fecharegistro_mb) as fecha_que_tienen_mismo_añoymes, SUM(mb.cantidad_mb) as cantidad_materiales, cmb.nombre_cat_mb
        FROM materiales_bodega mb, categoria_mb cmb WHERE year(mb.fecharegistro_mb) = '$añoactual' and month(mb.fecharegistro_mb) = '5' and mb.id_cat_mb=cmb.id_cat_mb and mb.id_cat_mb=2
        GROUP BY YEAR(mb.fecharegistro_mb), MONTH(mb.fecharegistro_mb)";

        $sqlO6 = "SELECT mb.fecharegistro_mb,MONTH(mb.fecharegistro_mb) as mes, COUNT(mb.fecharegistro_mb) as fecha_que_tienen_mismo_añoymes, SUM(mb.cantidad_mb) as cantidad_materiales, cmb.nombre_cat_mb
        FROM materiales_bodega mb, categoria_mb cmb WHERE year(mb.fecharegistro_mb) = '$añoactual' and month(mb.fecharegistro_mb) = '6' and mb.id_cat_mb=cmb.id_cat_mb and mb.id_cat_mb=2
        GROUP BY YEAR(mb.fecharegistro_mb), MONTH(mb.fecharegistro_mb)";

        $sqlO7 = "SELECT mb.fecharegistro_mb,MONTH(mb.fecharegistro_mb) as mes, COUNT(mb.fecharegistro_mb) as fecha_que_tienen_mismo_añoymes, SUM(mb.cantidad_mb) as cantidad_materiales, cmb.nombre_cat_mb
        FROM materiales_bodega mb, categoria_mb cmb WHERE year(mb.fecharegistro_mb) = '$añoactual' and month(mb.fecharegistro_mb) = '7' and mb.id_cat_mb=cmb.id_cat_mb and mb.id_cat_mb=2
        GROUP BY YEAR(mb.fecharegistro_mb), MONTH(mb.fecharegistro_mb)";

        $sqlO8 = "SELECT mb.fecharegistro_mb,MONTH(mb.fecharegistro_mb) as mes, COUNT(mb.fecharegistro_mb) as fecha_que_tienen_mismo_añoymes, SUM(mb.cantidad_mb) as cantidad_materiales, cmb.nombre_cat_mb
        FROM materiales_bodega mb, categoria_mb cmb WHERE year(mb.fecharegistro_mb) = '$añoactual' and month(mb.fecharegistro_mb) = '8' and mb.id_cat_mb=cmb.id_cat_mb and mb.id_cat_mb=2
        GROUP BY YEAR(mb.fecharegistro_mb), MONTH(mb.fecharegistro_mb)";

        $sqlO9 = "SELECT mb.fecharegistro_mb,MONTH(mb.fecharegistro_mb) as mes, COUNT(mb.fecharegistro_mb) as fecha_que_tienen_mismo_añoymes, SUM(mb.cantidad_mb) as cantidad_materiales, cmb.nombre_cat_mb
        FROM materiales_bodega mb, categoria_mb cmb WHERE year(mb.fecharegistro_mb) = '$añoactual' and month(mb.fecharegistro_mb) = '9' and mb.id_cat_mb=cmb.id_cat_mb and mb.id_cat_mb=2
        GROUP BY YEAR(mb.fecharegistro_mb), MONTH(mb.fecharegistro_mb)";

        $sqlO10 = "SELECT mb.fecharegistro_mb,MONTH(mb.fecharegistro_mb) as mes, COUNT(mb.fecharegistro_mb) as fecha_que_tienen_mismo_añoymes, SUM(mb.cantidad_mb) as cantidad_materiales, cmb.nombre_cat_mb
        FROM materiales_bodega mb, categoria_mb cmb WHERE year(mb.fecharegistro_mb) = '$añoactual' and month(mb.fecharegistro_mb) = '10' and mb.id_cat_mb=cmb.id_cat_mb and mb.id_cat_mb=2
        GROUP BY YEAR(mb.fecharegistro_mb), MONTH(mb.fecharegistro_mb)";

        $sqlO11 = "SELECT mb.fecharegistro_mb,MONTH(mb.fecharegistro_mb) as mes, COUNT(mb.fecharegistro_mb) as fecha_que_tienen_mismo_añoymes, SUM(mb.cantidad_mb) as cantidad_materiales, cmb.nombre_cat_mb
        FROM materiales_bodega mb, categoria_mb cmb WHERE year(mb.fecharegistro_mb) = '$añoactual' and month(mb.fecharegistro_mb) = '11' and mb.id_cat_mb=cmb.id_cat_mb and mb.id_cat_mb=2
        GROUP BY YEAR(mb.fecharegistro_mb), MONTH(mb.fecharegistro_mb)";

        $sqlO12 = "SELECT mb.fecharegistro_mb,MONTH(mb.fecharegistro_mb) as mes, COUNT(mb.fecharegistro_mb) as fecha_que_tienen_mismo_añoymes, SUM(mb.cantidad_mb) as cantidad_materiales, cmb.nombre_cat_mb
        FROM materiales_bodega mb, categoria_mb cmb WHERE year(mb.fecharegistro_mb) = '$añoactual' and month(mb.fecharegistro_mb) = '12' and mb.id_cat_mb=cmb.id_cat_mb and mb.id_cat_mb=2
        GROUP BY YEAR(mb.fecharegistro_mb), MONTH(mb.fecharegistro_mb)";

        /* MATERIALES DE HIGIENE DE ENERO A JUNIO DEL PRESENTE AÑO */

        $sqlH1 = "SELECT mb.fecharegistro_mb,MONTH(mb.fecharegistro_mb) as mes, COUNT(mb.fecharegistro_mb) as fecha_que_tienen_mismo_añoymes, SUM(mb.cantidad_mb) as cantidad_materiales, cmb.nombre_cat_mb
        FROM materiales_bodega mb, categoria_mb cmb WHERE year(mb.fecharegistro_mb) = '$añoactual' and month(mb.fecharegistro_mb) = '1' and mb.id_cat_mb=cmb.id_cat_mb and mb.id_cat_mb=3
        GROUP BY YEAR(mb.fecharegistro_mb), MONTH(mb.fecharegistro_mb)";

        $sqlH2 = "SELECT mb.fecharegistro_mb,MONTH(mb.fecharegistro_mb) as mes, COUNT(mb.fecharegistro_mb) as fecha_que_tienen_mismo_añoymes, SUM(mb.cantidad_mb) as cantidad_materiales, cmb.nombre_cat_mb
        FROM materiales_bodega mb, categoria_mb cmb WHERE year(mb.fecharegistro_mb) = '$añoactual' and month(mb.fecharegistro_mb) = '2' and mb.id_cat_mb=cmb.id_cat_mb and mb.id_cat_mb=3
        GROUP BY YEAR(mb.fecharegistro_mb), MONTH(mb.fecharegistro_mb)";

        $sqlH3 = "SELECT mb.fecharegistro_mb,MONTH(mb.fecharegistro_mb) as mes, COUNT(mb.fecharegistro_mb) as fecha_que_tienen_mismo_añoymes, SUM(mb.cantidad_mb) as cantidad_materiales, cmb.nombre_cat_mb
        FROM materiales_bodega mb, categoria_mb cmb WHERE year(mb.fecharegistro_mb) = '$añoactual' and month(mb.fecharegistro_mb) = '3' and mb.id_cat_mb=cmb.id_cat_mb and mb.id_cat_mb=3
        GROUP BY YEAR(mb.fecharegistro_mb), MONTH(mb.fecharegistro_mb)";

        $sqlH4 = "SELECT mb.fecharegistro_mb,MONTH(mb.fecharegistro_mb) as mes, COUNT(mb.fecharegistro_mb) as fecha_que_tienen_mismo_añoymes, SUM(mb.cantidad_mb) as cantidad_materiales, cmb.nombre_cat_mb
        FROM materiales_bodega mb, categoria_mb cmb WHERE year(mb.fecharegistro_mb) = '$añoactual' and month(mb.fecharegistro_mb) = '4' and mb.id_cat_mb=cmb.id_cat_mb and mb.id_cat_mb=3
        GROUP BY YEAR(mb.fecharegistro_mb), MONTH(mb.fecharegistro_mb)";

        $sqlH5 = "SELECT mb.fecharegistro_mb,MONTH(mb.fecharegistro_mb) as mes, COUNT(mb.fecharegistro_mb) as fecha_que_tienen_mismo_añoymes, SUM(mb.cantidad_mb) as cantidad_materiales, cmb.nombre_cat_mb
        FROM materiales_bodega mb, categoria_mb cmb WHERE year(mb.fecharegistro_mb) = '$añoactual' and month(mb.fecharegistro_mb) = '5' and mb.id_cat_mb=cmb.id_cat_mb and mb.id_cat_mb=3
        GROUP BY YEAR(mb.fecharegistro_mb), MONTH(mb.fecharegistro_mb)";

        $sqlH6 = "SELECT mb.fecharegistro_mb,MONTH(mb.fecharegistro_mb) as mes, COUNT(mb.fecharegistro_mb) as fecha_que_tienen_mismo_añoymes, SUM(mb.cantidad_mb) as cantidad_materiales, cmb.nombre_cat_mb
        FROM materiales_bodega mb, categoria_mb cmb WHERE year(mb.fecharegistro_mb) = '$añoactual' and month(mb.fecharegistro_mb) = '6' and mb.id_cat_mb=cmb.id_cat_mb and mb.id_cat_mb=3
        GROUP BY YEAR(mb.fecharegistro_mb), MONTH(mb.fecharegistro_mb)";

        $sqlH7 = "SELECT mb.fecharegistro_mb,MONTH(mb.fecharegistro_mb) as mes, COUNT(mb.fecharegistro_mb) as fecha_que_tienen_mismo_añoymes, SUM(mb.cantidad_mb) as cantidad_materiales, cmb.nombre_cat_mb
        FROM materiales_bodega mb, categoria_mb cmb WHERE year(mb.fecharegistro_mb) = '$añoactual' and month(mb.fecharegistro_mb) = '7' and mb.id_cat_mb=cmb.id_cat_mb and mb.id_cat_mb=3
        GROUP BY YEAR(mb.fecharegistro_mb), MONTH(mb.fecharegistro_mb)";

        $sqlH8 = "SELECT mb.fecharegistro_mb,MONTH(mb.fecharegistro_mb) as mes, COUNT(mb.fecharegistro_mb) as fecha_que_tienen_mismo_añoymes, SUM(mb.cantidad_mb) as cantidad_materiales, cmb.nombre_cat_mb
        FROM materiales_bodega mb, categoria_mb cmb WHERE year(mb.fecharegistro_mb) = '$añoactual' and month(mb.fecharegistro_mb) = '8' and mb.id_cat_mb=cmb.id_cat_mb and mb.id_cat_mb=3
        GROUP BY YEAR(mb.fecharegistro_mb), MONTH(mb.fecharegistro_mb)";

        $sqlH9 = "SELECT mb.fecharegistro_mb,MONTH(mb.fecharegistro_mb) as mes, COUNT(mb.fecharegistro_mb) as fecha_que_tienen_mismo_añoymes, SUM(mb.cantidad_mb) as cantidad_materiales, cmb.nombre_cat_mb
        FROM materiales_bodega mb, categoria_mb cmb WHERE year(mb.fecharegistro_mb) = '$añoactual' and month(mb.fecharegistro_mb) = '9' and mb.id_cat_mb=cmb.id_cat_mb and mb.id_cat_mb=3
        GROUP BY YEAR(mb.fecharegistro_mb), MONTH(mb.fecharegistro_mb)";

        $sqlH10 = "SELECT mb.fecharegistro_mb,MONTH(mb.fecharegistro_mb) as mes, COUNT(mb.fecharegistro_mb) as fecha_que_tienen_mismo_añoymes, SUM(mb.cantidad_mb) as cantidad_materiales, cmb.nombre_cat_mb
        FROM materiales_bodega mb, categoria_mb cmb WHERE year(mb.fecharegistro_mb) = '$añoactual' and month(mb.fecharegistro_mb) = '10' and mb.id_cat_mb=cmb.id_cat_mb and mb.id_cat_mb=3
        GROUP BY YEAR(mb.fecharegistro_mb), MONTH(mb.fecharegistro_mb)";

        $sqlH11 = "SELECT mb.fecharegistro_mb,MONTH(mb.fecharegistro_mb) as mes, COUNT(mb.fecharegistro_mb) as fecha_que_tienen_mismo_añoymes, SUM(mb.cantidad_mb) as cantidad_materiales, cmb.nombre_cat_mb
        FROM materiales_bodega mb, categoria_mb cmb WHERE year(mb.fecharegistro_mb) = '$añoactual' and month(mb.fecharegistro_mb) = '11' and mb.id_cat_mb=cmb.id_cat_mb and mb.id_cat_mb=3
        GROUP BY YEAR(mb.fecharegistro_mb), MONTH(mb.fecharegistro_mb)";

        $sqlH12 = "SELECT mb.fecharegistro_mb,MONTH(mb.fecharegistro_mb) as mes, COUNT(mb.fecharegistro_mb) as fecha_que_tienen_mismo_añoymes, SUM(mb.cantidad_mb) as cantidad_materiales, cmb.nombre_cat_mb
        FROM materiales_bodega mb, categoria_mb cmb WHERE year(mb.fecharegistro_mb) = '$añoactual' and month(mb.fecharegistro_mb) = '12' and mb.id_cat_mb=cmb.id_cat_mb and mb.id_cat_mb=3
        GROUP BY YEAR(mb.fecharegistro_mb), MONTH(mb.fecharegistro_mb)";

        $sql_MAX_Material_Bg = "SELECT MAX(cantidad_mb) as Maxima_Cantidad FROM materiales_bodega";

        /* QUERYS MATERIALES DE ASEO*/
        $resA1 = mysqli_query($mysqli, $sqlA1);
        $resA2 = mysqli_query($mysqli, $sqlA2);
        $resA3 = mysqli_query($mysqli, $sqlA3);
        $resA4 = mysqli_query($mysqli, $sqlA4);
        $resA5 = mysqli_query($mysqli, $sqlA5);
        $resA6 = mysqli_query($mysqli, $sqlA6);
        $resA7 = mysqli_query($mysqli, $sqlA7);
        $resA8 = mysqli_query($mysqli, $sqlA8);
        $resA9 = mysqli_query($mysqli, $sqlA9);
        $resA10 = mysqli_query($mysqli, $sqlA10);
        $resA11 = mysqli_query($mysqli, $sqlA11);
        $resA12 = mysqli_query($mysqli, $sqlA12);

        /* QUERYS MATERIALES DE OFICINA*/
        $resO1 = mysqli_query($mysqli, $sqlO1);
        $resO2 = mysqli_query($mysqli, $sqlO2);
        $resO3 = mysqli_query($mysqli, $sqlO3);
        $resO4 = mysqli_query($mysqli, $sqlO4);
        $resO5 = mysqli_query($mysqli, $sqlO5);
        $resO6 = mysqli_query($mysqli, $sqlO6);
        $resO7 = mysqli_query($mysqli, $sqlO7);
        $resO8 = mysqli_query($mysqli, $sqlO8);
        $resO9 = mysqli_query($mysqli, $sqlO9);
        $resO10 = mysqli_query($mysqli, $sqlO10);
        $resO11 = mysqli_query($mysqli, $sqlO11);
        $resO12 = mysqli_query($mysqli, $sqlO12);

        /* QUERYS MATERIALES DE HIGIENE*/
        $resH1 = mysqli_query($mysqli, $sqlH1);
        $resH2 = mysqli_query($mysqli, $sqlH2);
        $resH3 = mysqli_query($mysqli, $sqlH3);
        $resH4 = mysqli_query($mysqli, $sqlH4);
        $resH5 = mysqli_query($mysqli, $sqlH5);
        $resH6 = mysqli_query($mysqli, $sqlH6);
        $resH7 = mysqli_query($mysqli, $sqlH7);
        $resH8 = mysqli_query($mysqli, $sqlH8);
        $resH9 = mysqli_query($mysqli, $sqlH9);
        $resH10 = mysqli_query($mysqli, $sqlH10);
        $resH11 = mysqli_query($mysqli, $sqlH11);
        $resH12 = mysqli_query($mysqli, $sqlH12);

        $res_MAX_CANTIDAD = mysqli_query($mysqli, $sql_MAX_Material_Bg);

        /* RESPUESTAS A MATERIALES DE ASEO*/
        if (mysqli_num_rows($resA1) > 0) {
            $filaA1 = mysqli_fetch_assoc($resA1);
        } else {
            $filaA1['cantidad_materiales'] = 0;
        }
        if (mysqli_num_rows($resA2) > 0) {
            $filaA2 = mysqli_fetch_assoc($resA2);
        } else {
            $filaA2['cantidad_materiales'] = 0;
        }
        if (mysqli_num_rows($resA3) > 0) {
            $filaA3 = mysqli_fetch_assoc($resA3);
        } else {
            $filaA3['cantidad_materiales'] = 0;
        }
        if (mysqli_num_rows($resA4) > 0) {
            $filaA4 = mysqli_fetch_assoc($resA4);
        } else {
            $filaA4['cantidad_materiales'] = 0;
        }
        if (mysqli_num_rows($resA5) > 0) {
            $filaA5 = mysqli_fetch_assoc($resA5);
        } else {
            $filaA5['cantidad_materiales'] = 0;
        }
        if (mysqli_num_rows($resA6) > 0) {
            $filaA6 = mysqli_fetch_assoc($resA6);
        } else {
            $filaA6['cantidad_materiales'] = 0;
        }
        if (mysqli_num_rows($resA7) > 0) {
            $filaA7 = mysqli_fetch_assoc($resA7);
        } else {
            $filaA7['cantidad_materiales'] = 0;
        }
        if (mysqli_num_rows($resA8) > 0) {
            $filaA8 = mysqli_fetch_assoc($resA8);
        } else {
            $filaA8['cantidad_materiales'] = 0;
        }
        if (mysqli_num_rows($resA9) > 0) {
            $filaA9 = mysqli_fetch_assoc($resA9);
        } else {
            $filaA9['cantidad_materiales'] = 0;
        }
        if (mysqli_num_rows($resA10) > 0) {
            $filaA10 = mysqli_fetch_assoc($resA10);
        } else {
            $filaA10['cantidad_materiales'] = 0;
        }
        if (mysqli_num_rows($resA11) > 0) {
            $filaA11 = mysqli_fetch_assoc($resA11);
        } else {
            $filaA11['cantidad_materiales'] = 0;
        }
        if (mysqli_num_rows($resA12) > 0) {
            $filaA12 = mysqli_fetch_assoc($resA12);
        } else {
            $filaA12['cantidad_materiales'] = 0;
        }

        /* RESPUESTAS A MATERIALES DE OFICINA*/
        if (mysqli_num_rows($resO1) > 0) {
            $filaO1 = mysqli_fetch_assoc($resO1);
        } else {
            $filaO1['cantidad_materiales'] = 0;
        }
        if (mysqli_num_rows($resO2) > 0) {
            $filaO2 = mysqli_fetch_assoc($resO2);
        } else {
            $filaO2['cantidad_materiales'] = 0;
        }
        if (mysqli_num_rows($resO3) > 0) {
            $filaO3 = mysqli_fetch_assoc($resO3);
        } else {
            $filaO3['cantidad_materiales'] = 0;
        }
        if (mysqli_num_rows($resO4) > 0) {
            $filaO4 = mysqli_fetch_assoc($resO4);
        } else {
            $filaO4['cantidad_materiales'] = 0;
        }
        if (mysqli_num_rows($resO5) > 0) {
            $filaO5 = mysqli_fetch_assoc($resO5);
        } else {
            $filaO5['cantidad_materiales'] = 0;
        }
        if (mysqli_num_rows($resO6) > 0) {
            $filaO6 = mysqli_fetch_assoc($resO6);
        } else {
            $filaO6['cantidad_materiales'] = 0;
        }
        if (mysqli_num_rows($resO7) > 0) {
            $filaO7 = mysqli_fetch_assoc($resO7);
        } else {
            $filaO7['cantidad_materiales'] = 0;
        }
        if (mysqli_num_rows($resO8) > 0) {
            $filaO8 = mysqli_fetch_assoc($resO8);
        } else {
            $filaO8['cantidad_materiales'] = 0;
        }
        if (mysqli_num_rows($resO9) > 0) {
            $filaO9 = mysqli_fetch_assoc($resO9);
        } else {
            $filaO9['cantidad_materiales'] = 0;
        }
        if (mysqli_num_rows($resO10) > 0) {
            $filaO10 = mysqli_fetch_assoc($resO10);
        } else {
            $filaO10['cantidad_materiales'] = 0;
        }
        if (mysqli_num_rows($resO11) > 0) {
            $filaO11 = mysqli_fetch_assoc($resO11);
        } else {
            $filaO11['cantidad_materiales'] = 0;
        }
        if (mysqli_num_rows($resO12) > 0) {
            $filaO12 = mysqli_fetch_assoc($resO12);
        } else {
            $filaO12['cantidad_materiales'] = 0;
        }

        /* RESPUESTAS A MATERIALES DE HIGIENE*/
        if (mysqli_num_rows($resH1) > 0) {
            $filaH1 = mysqli_fetch_assoc($resH1);
        } else {
            $filaH1['cantidad_materiales'] = 0;
        }
        if (mysqli_num_rows($resH2) > 0) {
            $filaH2 = mysqli_fetch_assoc($resH2);
        } else {
            $filaH2['cantidad_materiales'] = 0;
        }
        if (mysqli_num_rows($resH3) > 0) {
            $filaH3 = mysqli_fetch_assoc($resH3);
        } else {
            $filaH3['cantidad_materiales'] = 0;
        }
        if (mysqli_num_rows($resH4) > 0) {
            $filaH4 = mysqli_fetch_assoc($resH4);
        } else {
            $filaH4['cantidad_materiales'] = 0;
        }
        if (mysqli_num_rows($resH5) > 0) {
            $filaH5 = mysqli_fetch_assoc($resH5);
        } else {
            $filaH5['cantidad_materiales'] = 0;
        }
        if (mysqli_num_rows($resH6) > 0) {
            $filaH6 = mysqli_fetch_assoc($resH6);
        } else {
            $filaH6['cantidad_materiales'] = 0;
        }
        if (mysqli_num_rows($resH7) > 0) {
            $filaH7 = mysqli_fetch_assoc($resH7);
        } else {
            $filaH7['cantidad_materiales'] = 0;
        }
        if (mysqli_num_rows($resH8) > 0) {
            $filaH8 = mysqli_fetch_assoc($resH8);
        } else {
            $filaH8['cantidad_materiales'] = 0;
        }
        if (mysqli_num_rows($resH9) > 0) {
            $filaH9 = mysqli_fetch_assoc($resH9);
        } else {
            $filaH9['cantidad_materiales'] = 0;
        }
        if (mysqli_num_rows($resH10) > 0) {
            $filaH10 = mysqli_fetch_assoc($resH10);
        } else {
            $filaH10['cantidad_materiales'] = 0;
        }
        if (mysqli_num_rows($resH11) > 0) {
            $filaH11 = mysqli_fetch_assoc($resH11);
        } else {
            $filaH11['cantidad_materiales'] = 0;
        }
        if (mysqli_num_rows($resH12) > 0) {
            $filaH12 = mysqli_fetch_assoc($resH12);
        } else {
            $filaH12['cantidad_materiales'] = 0;
        }

        if (mysqli_num_rows($res_MAX_CANTIDAD) > 0) {
            $filaMAXCANT = mysqli_fetch_assoc($res_MAX_CANTIDAD);
        } else {
            $filaMAXCANT['Maxima_Cantidad'] = 0;
        }

        $datos1 = array();
        $datos1[0][1] = array('CANTIDAD'    => $filaA1['cantidad_materiales']);
        $datos1[0][2] = array('CANTIDAD'    => $filaA2['cantidad_materiales']);
        $datos1[0][3] = array('CANTIDAD'    => $filaA3['cantidad_materiales']);
        $datos1[0][4] = array('CANTIDAD'    => $filaA4['cantidad_materiales']);
        $datos1[0][5] = array('CANTIDAD'    => $filaA5['cantidad_materiales']);
        $datos1[0][6] = array('CANTIDAD'    => $filaA6['cantidad_materiales']);
        $datos1[0][7] = array('CANTIDAD'    => $filaA7['cantidad_materiales']);
        $datos1[0][8] = array('CANTIDAD'    => $filaA8['cantidad_materiales']);
        $datos1[0][9] = array('CANTIDAD'    => $filaA9['cantidad_materiales']);
        $datos1[0][10] = array('CANTIDAD'   => $filaA10['cantidad_materiales']);
        $datos1[0][11] = array('CANTIDAD'   => $filaA11['cantidad_materiales']);
        $datos1[0][12] = array('CANTIDAD'   => $filaA12['cantidad_materiales']);

        $datos1[1][1] = array('CANTIDAD'    => $filaO1['cantidad_materiales']);
        $datos1[1][2] = array('CANTIDAD'    => $filaO2['cantidad_materiales']);
        $datos1[1][3] = array('CANTIDAD'    => $filaO3['cantidad_materiales']);
        $datos1[1][4] = array('CANTIDAD'    => $filaO4['cantidad_materiales']);
        $datos1[1][5] = array('CANTIDAD'    => $filaO5['cantidad_materiales']);
        $datos1[1][6] = array('CANTIDAD'    => $filaO6['cantidad_materiales']);
        $datos1[1][7] = array('CANTIDAD'    => $filaO7['cantidad_materiales']);
        $datos1[1][8] = array('CANTIDAD'    => $filaO8['cantidad_materiales']);
        $datos1[1][9] = array('CANTIDAD'    => $filaO9['cantidad_materiales']);
        $datos1[1][10] = array('CANTIDAD'   => $filaO10['cantidad_materiales']);
        $datos1[1][11] = array('CANTIDAD'   => $filaO11['cantidad_materiales']);
        $datos1[1][12] = array('CANTIDAD'   => $filaO12['cantidad_materiales']);

        $datos1[2][1] = array('CANTIDAD'    => $filaH1['cantidad_materiales']);
        $datos1[2][2] = array('CANTIDAD'    => $filaH2['cantidad_materiales']);
        $datos1[2][3] = array('CANTIDAD'    => $filaH3['cantidad_materiales']);
        $datos1[2][4] = array('CANTIDAD'    => $filaH4['cantidad_materiales']);
        $datos1[2][5] = array('CANTIDAD'    => $filaH5['cantidad_materiales']);
        $datos1[2][6] = array('CANTIDAD'    => $filaH6['cantidad_materiales']);
        $datos1[2][7] = array('CANTIDAD'    => $filaH7['cantidad_materiales']);
        $datos1[2][8] = array('CANTIDAD'    => $filaH8['cantidad_materiales']);
        $datos1[2][9] = array('CANTIDAD'    => $filaH9['cantidad_materiales']);
        $datos1[2][10] = array('CANTIDAD'   => $filaH10['cantidad_materiales']);
        $datos1[2][11] = array('CANTIDAD'   => $filaH11['cantidad_materiales']);
        $datos1[2][12] = array('CANTIDAD'   => $filaH12['cantidad_materiales']);

        $datos1[3] = array('CANTIDADMAXIMA'   => $filaMAXCANT['Maxima_Cantidad']);

        echo json_encode(toutf8($datos1));
    } else if ($seleccion == 11) {

        $sql_ban_img = "SELECT COUNT(id_ban_imagenes) as contador,
        (SELECT COUNT(id_ban_imagenes) FROM banner_imagenes WHERE estado_ban_imagenes=1) AS activos,
        (SELECT COUNT(id_ban_imagenes) FROM banner_imagenes WHERE estado_ban_imagenes=0) AS inactivos 
        FROM banner_imagenes";

        $sql_ban_vid = "SELECT COUNT(id_ban_videos) as contador,
        (SELECT COUNT(id_ban_videos) FROM banner_videos WHERE estado_ban_videos=1) AS activos,
        (SELECT COUNT(id_ban_videos) FROM banner_videos WHERE estado_ban_videos=0) AS inactivos 
        FROM banner_videos";

        /* QUERYS BANNER Y VIDEOS ACTIVOS E INACTIVOS*/
        $res_ban_img = mysqli_query($mysqli, $sql_ban_img);
        $res_ban_vid = mysqli_query($mysqli, $sql_ban_vid);

        /* RESPUESTAS DE BANNER Y VIDEOS ACTIVOS E INACTIVOS*/
        if (mysqli_num_rows($res_ban_img) > 0) {
            $fila_ban_img = mysqli_fetch_assoc($res_ban_img);
        } else {
            $fila_ban_img['activos'] = 0;
            $fila_ban_img['inactivos'] = 0;
        }

        if (mysqli_num_rows($res_ban_vid) > 0) {
            $fila_ban_vid = mysqli_fetch_assoc($res_ban_vid);
        } else {
            $fila_ban_vid['activos'] = 0;
            $fila_ban_vid['inactivos'] = 0;
        }


        $datos1 = array();
        $datos1[0] = array('BANNER_IMG_ACTIVO'   => $fila_ban_img['activos']);
        $datos1[1] = array('BANNER_IMG_INACTIVO' => $fila_ban_img['inactivos']);
        $datos1[2] = array('BANNER_VID_ACTIVO'   => $fila_ban_vid['activos']);
        $datos1[3] = array('BANNER_VID_INACTIVO' => $fila_ban_vid['inactivos']);

        echo json_encode(toutf8($datos1));
    } else if ($seleccion == 12) {

        /* SOLICITUDES DE AGENDA DE RETIRO DE MEDICAMENTO APROBADAS O RECHAZADAS POR TRIMESTRE (CADA 3 MESES, 4 EN TOTAL EN EL AÑO) */

        $sql_SolicResp_PrimerSem = "SELECT COUNT(id_retiro_med) as solicitud_si_resp_primer_sem
                FROM agendar_retiro_medicamento WHERE year(fecha_retiro) = '$añoactual' and (month(fecha_retiro) >= 1 and month(fecha_retiro) <= 3) and id_estado_resp_agenda=1";

        $sql_SolicNoResp_PrimerSem = "SELECT COUNT(id_retiro_med) as solicitud_no_resp_primer_sem
                FROM agendar_retiro_medicamento WHERE year(fecha_retiro) = '$añoactual' and (month(fecha_retiro) >= 1 and month(fecha_retiro) <= 3) and id_estado_resp_agenda=2";

        $sql_SolicResp_SegundoSem = "SELECT COUNT(id_retiro_med) as solicitud_si_resp_segundo_sem
                FROM agendar_retiro_medicamento WHERE year(fecha_retiro) = '$añoactual' and (month(fecha_retiro) >= 4 and month(fecha_retiro) <= 6) and id_estado_resp_agenda=1";

        $sql_SolicNoResp_SegundoSem = "SELECT COUNT(id_retiro_med) as solicitud_no_resp_segundo_sem
                FROM agendar_retiro_medicamento WHERE year(fecha_retiro) = '$añoactual' and (month(fecha_retiro) >= 4 and month(fecha_retiro) <= 6) and id_estado_resp_agenda=2";

        $sql_SolicResp_TercerSem = "SELECT COUNT(id_retiro_med) as solicitud_si_resp_tercer_sem
                FROM agendar_retiro_medicamento WHERE year(fecha_retiro) = '$añoactual' and (month(fecha_retiro) >= 7 and month(fecha_retiro) <= 9) and id_estado_resp_agenda=1";

        $sql_SolicNoResp_TercerSem = "SELECT COUNT(id_retiro_med) as solicitud_no_resp_tercer_sem
                FROM agendar_retiro_medicamento WHERE year(fecha_retiro) = '$añoactual' and (month(fecha_retiro) >= 7 and month(fecha_retiro) <= 9) and id_estado_resp_agenda=2";

        $sql_SolicResp_CuartoSem = "SELECT COUNT(id_retiro_med) as solicitud_si_resp_cuarto_sem
                FROM agendar_retiro_medicamento WHERE year(fecha_retiro) = '$añoactual' and (month(fecha_retiro) >= 10 and month(fecha_retiro) <= 12) and id_estado_resp_agenda=1";

        $sql_SolicNoResp_CuartoSem = "SELECT COUNT(id_retiro_med) as solicitud_no_resp_cuarto_sem
                FROM agendar_retiro_medicamento WHERE year(fecha_retiro) = '$añoactual' and (month(fecha_retiro) >= 10 and month(fecha_retiro) <= 12) and id_estado_resp_agenda=2";


        /* QUERYS DE SOLICITUDES DE AGENDA DE RETIRO DE MEDICAMENTOS*/
        $res_SolicResp_PrimerSem = mysqli_query($mysqli, $sql_SolicResp_PrimerSem);
        $res_SolicNoResp_PrimerSem = mysqli_query($mysqli, $sql_SolicNoResp_PrimerSem);
        $res_SolicResp_SegundoSem = mysqli_query($mysqli, $sql_SolicResp_SegundoSem);
        $res_SolicNoResp_SegundoSem = mysqli_query($mysqli, $sql_SolicNoResp_SegundoSem);
        $res_SolicResp_TercerSem = mysqli_query($mysqli, $sql_SolicResp_TercerSem);
        $res_SolicNoResp_TercerSem = mysqli_query($mysqli, $sql_SolicNoResp_TercerSem);
        $res_SolicResp_CuartoSem = mysqli_query($mysqli, $sql_SolicResp_CuartoSem);
        $res_SolicNoResp_CuartoSem = mysqli_query($mysqli, $sql_SolicNoResp_CuartoSem);

        /* RESPUESTAS A SOLICITUDES DE AGENDA DE RETIRO DE MEDICAMENTOS*/
        if (mysqli_num_rows($res_SolicResp_PrimerSem) > 0) {
            $fila_SolicResp_PrimerSem = mysqli_fetch_assoc($res_SolicResp_PrimerSem);
        } else {
            $fila_SolicResp_PrimerSem['solicitud_si_resp_primer_sem'] = 0;
        }
        if (mysqli_num_rows($res_SolicNoResp_PrimerSem) > 0) {
            $fila_SolicNoResp_PrimerSem = mysqli_fetch_assoc($res_SolicNoResp_PrimerSem);
        } else {
            $fila_SolicNoResp_PrimerSem['solicitud_no_resp_primer_sem'] = 0;
        }
        if (mysqli_num_rows($res_SolicResp_SegundoSem) > 0) {
            $fila_SolicResp_SegundoSem = mysqli_fetch_assoc($res_SolicResp_SegundoSem);
        } else {
            $fila_SolicResp_SegundoSem['solicitud_si_resp_segundo_sem'] = 0;
        }
        if (mysqli_num_rows($res_SolicNoResp_SegundoSem) > 0) {
            $fila_SolicNoResp_SegundoSem = mysqli_fetch_assoc($res_SolicNoResp_SegundoSem);
        } else {
            $fila_SolicNoResp_SegundoSem['solicitud_no_resp_segundo_sem'] = 0;
        }
        if (mysqli_num_rows($res_SolicResp_TercerSem) > 0) {
            $fila_SolicResp_TercerSem = mysqli_fetch_assoc($res_SolicResp_TercerSem);
        } else {
            $fila_SolicResp_TercerSem['solicitud_si_resp_tercer_sem'] = 0;
        }
        if (mysqli_num_rows($res_SolicNoResp_TercerSem) > 0) {
            $fila_SolicNoResp_TercerSem = mysqli_fetch_assoc($res_SolicNoResp_TercerSem);
        } else {
            $fila_SolicNoResp_TercerSem['solicitud_no_resp_tercer_sem'] = 0;
        }
        if (mysqli_num_rows($res_SolicResp_CuartoSem) > 0) {
            $fila_SolicResp_CuartoSem = mysqli_fetch_assoc($res_SolicResp_CuartoSem);
        } else {
            $fila_SolicResp_CuartoSem['solicitud_si_resp_cuarto_sem'] = 0;
        }
        if (mysqli_num_rows($res_SolicNoResp_CuartoSem) > 0) {
            $fila_SolicNoResp_CuartoSem = mysqli_fetch_assoc($res_SolicNoResp_CuartoSem);
        } else {
            $fila_SolicNoResp_CuartoSem['solicitud_no_resp_cuarto_sem'] = 0;
        }

        $datos1 = array();
        $datos1[0][1] = array('CANTIDAD_SOLICITUDES'    => $fila_SolicResp_PrimerSem['solicitud_si_resp_primer_sem']);
        $datos1[0][2] = array('CANTIDAD_SOLICITUDES'    => $fila_SolicNoResp_PrimerSem['solicitud_no_resp_primer_sem']);
        $datos1[1][1] = array('CANTIDAD_SOLICITUDES'    => $fila_SolicResp_SegundoSem['solicitud_si_resp_segundo_sem']);
        $datos1[1][2] = array('CANTIDAD_SOLICITUDES'    => $fila_SolicNoResp_SegundoSem['solicitud_no_resp_segundo_sem']);
        $datos1[2][1] = array('CANTIDAD_SOLICITUDES'    => $fila_SolicResp_TercerSem['solicitud_si_resp_tercer_sem']);
        $datos1[2][2] = array('CANTIDAD_SOLICITUDES'    => $fila_SolicNoResp_TercerSem['solicitud_no_resp_tercer_sem']);
        $datos1[3][1] = array('CANTIDAD_SOLICITUDES'    => $fila_SolicResp_CuartoSem['solicitud_si_resp_cuarto_sem']);
        $datos1[3][2] = array('CANTIDAD_SOLICITUDES'    => $fila_SolicNoResp_CuartoSem['solicitud_no_resp_cuarto_sem']);

        echo json_encode(toutf8($datos1));
    } else if ($seleccion == 13) {

        /* SOLICITUDES DE MEDICAMENTO PENDIENTES, EN TRÁNSITO O ENTREGADAS POR TRIMESTRE (CADA 3 MESES, 4 EN TOTAL EN EL AÑO) */

        $sql_SolicPend_PrimerTrimest = "SELECT COUNT(id_solicitud_medicamento) as solicitud_pend_primer_trim
        FROM solicitud_medicamento WHERE year(fecha_solicitud) = '$añoactual' and (month(fecha_solicitud) >= 1 and month(fecha_solicitud) <= 3) and seguimiento=0";

        $sql_SolicEnTrans_PrimerTrimest = "SELECT COUNT(id_solicitud_medicamento) as solicitud_entrans_primer_trim
        FROM solicitud_medicamento WHERE year(fecha_solicitud) = '$añoactual' and (month(fecha_solicitud) >= 1 and month(fecha_solicitud) <= 3) and seguimiento=1";

        $sql_SolicEntreg_PrimerTrimest = "SELECT COUNT(id_solicitud_medicamento) as solicitud_entreg_primer_trim
        FROM solicitud_medicamento WHERE year(fecha_solicitud) = '$añoactual' and (month(fecha_solicitud) >= 1 and month(fecha_solicitud) <= 3) and seguimiento=2";

        $sql_SolicPend_SegundoTrimest = "SELECT COUNT(id_solicitud_medicamento) as solicitud_pend_segundo_trim
        FROM solicitud_medicamento WHERE year(fecha_solicitud) = '$añoactual' and (month(fecha_solicitud) >= 4 and month(fecha_solicitud) <= 6) and seguimiento=0";

        $sql_SolicEnTrans_SegundoTrimest = "SELECT COUNT(id_solicitud_medicamento) as solicitud_entrans_segundo_trim
        FROM solicitud_medicamento WHERE year(fecha_solicitud) = '$añoactual' and (month(fecha_solicitud) >= 4 and month(fecha_solicitud) <= 6) and seguimiento=1";

        $sql_SolicEntreg_SegundoTrimest = "SELECT COUNT(id_solicitud_medicamento) as solicitud_entreg_segundo_trim
        FROM solicitud_medicamento WHERE year(fecha_solicitud) = '$añoactual' and (month(fecha_solicitud) >= 4 and month(fecha_solicitud) <= 6) and seguimiento=2";

        $sql_SolicPend_TercerTrimest = "SELECT COUNT(id_solicitud_medicamento) as solicitud_pend_tercer_trim
        FROM solicitud_medicamento WHERE year(fecha_solicitud) = '$añoactual' and (month(fecha_solicitud) >= 7 and month(fecha_solicitud) <= 9) and seguimiento=0";

        $sql_SolicEnTrans_TercerTrimest = "SELECT COUNT(id_solicitud_medicamento) as solicitud_entrans_tercer_trim
        FROM solicitud_medicamento WHERE year(fecha_solicitud) = '$añoactual' and (month(fecha_solicitud) >= 7 and month(fecha_solicitud) <= 9) and seguimiento=1";

        $sql_SolicEntreg_TercerTrimest = "SELECT COUNT(id_solicitud_medicamento) as solicitud_entreg_tercer_trim
        FROM solicitud_medicamento WHERE year(fecha_solicitud) = '$añoactual' and (month(fecha_solicitud) >= 7 and month(fecha_solicitud) <= 9) and seguimiento=2";

        $sql_SolicPend_CuartoTrimest = "SELECT COUNT(id_solicitud_medicamento) as solicitud_pend_cuarto_trim
        FROM solicitud_medicamento WHERE year(fecha_solicitud) = '$añoactual' and (month(fecha_solicitud) >= 10 and month(fecha_solicitud) <= 12) and seguimiento=0";

        $sql_SolicEnTrans_CuartoTrimest = "SELECT COUNT(id_solicitud_medicamento) as solicitud_entrans_cuarto_trim
        FROM solicitud_medicamento WHERE year(fecha_solicitud) = '$añoactual' and (month(fecha_solicitud) >= 10 and month(fecha_solicitud) <= 12) and seguimiento=1";

        $sql_SolicEntreg_CuartoTrimest = "SELECT COUNT(id_solicitud_medicamento) as solicitud_entreg_cuarto_trim
        FROM solicitud_medicamento WHERE year(fecha_solicitud) = '$añoactual' and (month(fecha_solicitud) >= 10 and month(fecha_solicitud) <= 12) and seguimiento=2";


        /* QUERYS DE SOLICITUDES DE MEDICAMENTOS*/
        $res_SolicPend_PrimerTrimest = mysqli_query($mysqli, $sql_SolicPend_PrimerTrimest);
        $res_SolicEnTrans_PrimerTrimest = mysqli_query($mysqli, $sql_SolicEnTrans_PrimerTrimest);
        $res_SolicEntreg_PrimerTrimest = mysqli_query($mysqli, $sql_SolicEntreg_PrimerTrimest);
        $res_SolicPend_SegundoTrimest = mysqli_query($mysqli, $sql_SolicPend_SegundoTrimest);
        $res_SolicEnTrans_SegundoTrimest = mysqli_query($mysqli, $sql_SolicEnTrans_SegundoTrimest);
        $res_SolicEntreg_SegundoTrimest = mysqli_query($mysqli, $sql_SolicEntreg_SegundoTrimest);
        $res_SolicPend_TercerTrimest = mysqli_query($mysqli, $sql_SolicPend_TercerTrimest);
        $res_SolicEnTrans_TercerTrimest = mysqli_query($mysqli, $sql_SolicEnTrans_TercerTrimest);
        $res_SolicEntreg_TercerTrimest = mysqli_query($mysqli, $sql_SolicEntreg_TercerTrimest);
        $res_SolicPend_CuartoTrimest = mysqli_query($mysqli, $sql_SolicPend_CuartoTrimest);
        $res_SolicEnTrans_CuartoTrimest = mysqli_query($mysqli, $sql_SolicEnTrans_CuartoTrimest);
        $res_SolicEntreg_CuartoTrimest = mysqli_query($mysqli, $sql_SolicEntreg_CuartoTrimest);

        /* RESPUESTAS A SOLICITUDES DE MEDICAMENTOS*/
        if (mysqli_num_rows($res_SolicPend_PrimerTrimest) > 0) {
            $fila_SolicPend_PrimerTrimest = mysqli_fetch_assoc($res_SolicPend_PrimerTrimest);
        } else {
            $fila_SolicPend_PrimerTrimest['solicitud_pend_primer_trim'] = 0;
        }
        if (mysqli_num_rows($res_SolicEnTrans_PrimerTrimest) > 0) {
            $fila_SolicEnTrans_PrimerTrimest = mysqli_fetch_assoc($res_SolicEnTrans_PrimerTrimest);
        } else {
            $fila_SolicEnTrans_PrimerTrimest['solicitud_entrans_primer_trim'] = 0;
        }
        if (mysqli_num_rows($res_SolicEntreg_PrimerTrimest) > 0) {
            $fila_SolicEntreg_PrimerTrimest = mysqli_fetch_assoc($res_SolicEntreg_PrimerTrimest);
        } else {
            $fila_SolicEntreg_PrimerTrimest['solicitud_entreg_primer_trim'] = 0;
        }
        if (mysqli_num_rows($res_SolicPend_SegundoTrimest) > 0) {
            $fila_SolicPend_SegundoTrimest = mysqli_fetch_assoc($res_SolicPend_SegundoTrimest);
        } else {
            $fila_SolicPend_SegundoTrimest['solicitud_pend_segundo_trim'] = 0;
        }
        if (mysqli_num_rows($res_SolicEnTrans_SegundoTrimest) > 0) {
            $fila_SolicEnTrans_SegundoTrimest = mysqli_fetch_assoc($res_SolicEnTrans_SegundoTrimest);
        } else {
            $fila_SolicEnTrans_SegundoTrimest['solicitud_entrans_segundo_trim'] = 0;
        }
        if (mysqli_num_rows($res_SolicEntreg_SegundoTrimest) > 0) {
            $fila_SolicEntreg_SegundoTrimest = mysqli_fetch_assoc($res_SolicEntreg_SegundoTrimest);
        } else {
            $fila_SolicEntreg_SegundoTrimest['solicitud_entreg_segundo_trim'] = 0;
        }
        if (mysqli_num_rows($res_SolicPend_TercerTrimest) > 0) {
            $fila_SolicPend_TercerTrimest = mysqli_fetch_assoc($res_SolicPend_TercerTrimest);
        } else {
            $fila_SolicPend_TercerTrimest['solicitud_pend_tercer_trim'] = 0;
        }
        if (mysqli_num_rows($res_SolicEnTrans_TercerTrimest) > 0) {
            $fila_SolicEnTrans_TercerTrimest = mysqli_fetch_assoc($res_SolicEnTrans_TercerTrimest);
        } else {
            $fila_SolicEnTrans_TercerTrimest['solicitud_entrans_tercer_trim'] = 0;
        }
        if (mysqli_num_rows($res_SolicEntreg_TercerTrimest) > 0) {
            $fila_SolicEntreg_TercerTrimest = mysqli_fetch_assoc($res_SolicEntreg_TercerTrimest);
        } else {
            $fila_SolicEntreg_TercerTrimest['solicitud_entreg_tercer_trim'] = 0;
        }
        if (mysqli_num_rows($res_SolicPend_CuartoTrimest) > 0) {
            $fila_SolicPend_CuartoTrimest = mysqli_fetch_assoc($res_SolicPend_CuartoTrimest);
        } else {
            $fila_SolicPend_CuartoTrimest['solicitud_pend_cuarto_trim'] = 0;
        }
        if (mysqli_num_rows($res_SolicEnTrans_CuartoTrimest) > 0) {
            $fila_SolicEnTrans_CuartoTrimest = mysqli_fetch_assoc($res_SolicEnTrans_CuartoTrimest);
        } else {
            $fila_SolicEnTrans_CuartoTrimest['solicitud_entrans_cuarto_trim'] = 0;
        }
        if (mysqli_num_rows($res_SolicEntreg_CuartoTrimest) > 0) {
            $fila_SolicEntreg_CuartoTrimest = mysqli_fetch_assoc($res_SolicEntreg_CuartoTrimest);
        } else {
            $fila_SolicEntreg_CuartoTrimest['solicitud_entreg_cuarto_trim'] = 0;
        }

        $datos1 = array();
        $datos1[0][1] = array('CANTIDAD_SOLICITUDES'    => $fila_SolicPend_PrimerTrimest['solicitud_pend_primer_trim']);
        $datos1[0][2] = array('CANTIDAD_SOLICITUDES'    => $fila_SolicEnTrans_PrimerTrimest['solicitud_entrans_primer_trim']);
        $datos1[0][3] = array('CANTIDAD_SOLICITUDES'    => $fila_SolicEntreg_PrimerTrimest['solicitud_entreg_primer_trim']);
        $datos1[1][1] = array('CANTIDAD_SOLICITUDES'    => $fila_SolicPend_SegundoTrimest['solicitud_pend_segundo_trim']);
        $datos1[1][2] = array('CANTIDAD_SOLICITUDES'    => $fila_SolicEnTrans_SegundoTrimest['solicitud_entrans_segundo_trim']);
        $datos1[1][3] = array('CANTIDAD_SOLICITUDES'    => $fila_SolicEntreg_SegundoTrimest['solicitud_entreg_segundo_trim']);
        $datos1[2][1] = array('CANTIDAD_SOLICITUDES'    => $fila_SolicPend_TercerTrimest['solicitud_pend_tercer_trim']);
        $datos1[2][2] = array('CANTIDAD_SOLICITUDES'    => $fila_SolicEnTrans_TercerTrimest['solicitud_entrans_tercer_trim']);
        $datos1[2][3] = array('CANTIDAD_SOLICITUDES'    => $fila_SolicEntreg_TercerTrimest['solicitud_entreg_tercer_trim']);
        $datos1[3][1] = array('CANTIDAD_SOLICITUDES'    => $fila_SolicPend_CuartoTrimest['solicitud_pend_cuarto_trim']);
        $datos1[3][2] = array('CANTIDAD_SOLICITUDES'    => $fila_SolicEnTrans_CuartoTrimest['solicitud_entrans_cuarto_trim']);
        $datos1[3][3] = array('CANTIDAD_SOLICITUDES'    => $fila_SolicEntreg_CuartoTrimest['solicitud_entreg_cuarto_trim']);

        echo json_encode(toutf8($datos1));
    } else if ($seleccion == 14) {

        $sql1 = "SELECT COUNT(id_pe) as cantidad_perm_esp FROM permiso_especial";
        $sql2 = "SELECT COUNT(id_pa) as cantidad_perm_admin FROM permiso_administrativo";
        $sql3 = "SELECT COUNT(id_pfl) as cantidad_perm_ferleg FROM permiso_feriado_legal";

        $consulta1 = mysqli_query($mysqli, $sql1);
        $consulta2 = mysqli_query($mysqli, $sql2);
        $consulta3 = mysqli_query($mysqli, $sql3);

        /* RESPUESTAS A SOLICITUDES DE MEDICAMENTOS*/
        if (mysqli_num_rows($consulta1) > 0) {
            $fila1 = mysqli_fetch_assoc($consulta1);
        } else {
            $fila1['cantidad_perm_esp'] = 0;
        }
        if (mysqli_num_rows($consulta2) > 0) {
            $fila2 = mysqli_fetch_assoc($consulta2);
        } else {
            $fila2['cantidad_perm_admin'] = 0;
        }
        if (mysqli_num_rows($consulta3) > 0) {
            $fila3 = mysqli_fetch_assoc($consulta3);
        } else {
            $fila3['cantidad_perm_ferleg'] = 0;
        }

        $sumadelospermisos = $fila1['cantidad_perm_esp'] + $fila2['cantidad_perm_admin'] + $fila3['cantidad_perm_ferleg'];

        $datos = array();
        $datos[0] = array('total_cantidad_permisos'         => $sumadelospermisos);
        $datos[1] = array('total_cantidad_perm_esp'         => $fila1['cantidad_perm_esp']);
        $datos[2] = array('total_cantidad_perm_admin'       => $fila2['cantidad_perm_admin']);
        $datos[3] = array('total_cantidad_perm_ferlegl'     => $fila3['cantidad_perm_ferleg']);

        echo json_encode(toutf8($datos));
    } else if ($seleccion == 15) {

        $sql1 = "SELECT COUNT(id_retiro_med) as cantidad_agen_resp FROM agendar_retiro_medicamento WHERE id_estado_resp_agenda=1";
        $sql2 = "SELECT COUNT(id_retiro_med) as cantidad_agen_noresp FROM agendar_retiro_medicamento WHERE id_estado_resp_agenda=2";

        $consulta1 = mysqli_query($mysqli, $sql1);
        $consulta2 = mysqli_query($mysqli, $sql2);

        /* RESPUESTAS A SOLICITUDES DE MEDICAMENTOS*/
        if (mysqli_num_rows($consulta1) > 0) {
            $fila1 = mysqli_fetch_assoc($consulta1);
        } else {
            $fila1['cantidad_agen_resp'] = 0;
        }
        if (mysqli_num_rows($consulta2) > 0) {
            $fila2 = mysqli_fetch_assoc($consulta2);
        } else {
            $fila2['cantidad_agen_noresp'] = 0;
        }

        $datos = array();
        $datos[0] = array('total_sol_cant_agenda_respondida'         => $fila1['cantidad_agen_resp']);
        $datos[1] = array('total_sol_cant_agenda_norespondida'       => $fila2['cantidad_agen_noresp']);

        echo json_encode(toutf8($datos));
    } else if ($seleccion == 16) {

        $sql1 = "SELECT COUNT(id_spe) as cantidad_solic_esp FROM solicitud_permiso_especial";
        $sql2 = "SELECT COUNT(id_spa) as cantidad_solic_admin FROM solicitud_permiso_administrativo";
        $sql3 = "SELECT COUNT(id_sfl) as cantidad_solic_frlg FROM solicitud_feriado_legal";

        $consulta1 = mysqli_query($mysqli, $sql1);
        $consulta2 = mysqli_query($mysqli, $sql2);
        $consulta3 = mysqli_query($mysqli, $sql3);

        /* RESPUESTAS A SOLICITUDES DE MEDICAMENTOS*/
        if (mysqli_num_rows($consulta1) > 0) {
            $fila1 = mysqli_fetch_assoc($consulta1);
        } else {
            $fila1['cantidad_solic_esp'] = 0;
        }
        if (mysqli_num_rows($consulta2) > 0) {
            $fila2 = mysqli_fetch_assoc($consulta2);
        } else {
            $fila2['cantidad_solic_admin'] = 0;
        }
        if (mysqli_num_rows($consulta3) > 0) {
            $fila3 = mysqli_fetch_assoc($consulta3);
        } else {
            $fila3['cantidad_solic_frlg'] = 0;
        }

        $datos = array();
        $datos[0] = array('total_sol_cant_perm_esp'   => $fila1['cantidad_solic_esp']);
        $datos[1] = array('total_sol_cant_perm_admin' => $fila2['cantidad_solic_admin']);
        $datos[2] = array('total_sol_cant_perm_frlg'  => $fila3['cantidad_solic_frlg']);

        echo json_encode(toutf8($datos));
    } else if ($seleccion == 17) {

        $sql1 = "SELECT COUNT(pe.id_pe) as reunion_apoderados, pe.id_mpe FROM solicitud_permiso_especial spe, permiso_especial pe WHERE pe.id_pe=spe.id_pe and pe.id_mpe=1";
        $sql2 = "SELECT COUNT(pe.id_pe) as control_salud_hijo, pe.id_mpe FROM solicitud_permiso_especial spe, permiso_especial pe WHERE pe.id_pe=spe.id_pe and pe.id_mpe=2";

        $consulta1 = mysqli_query($mysqli, $sql1);
        $consulta2 = mysqli_query($mysqli, $sql2);

        /* RESPUESTAS A MOTIVO DE LA SOLICITUD DE PERMISO ESPECIAL */
        if (mysqli_num_rows($consulta1) > 0) {
            $fila1 = mysqli_fetch_assoc($consulta1);
        } else {
            $fila1['reunion_apoderados'] = 0;
        }
        if (mysqli_num_rows($consulta2) > 0) {
            $fila2 = mysqli_fetch_assoc($consulta2);
        } else {
            $fila2['control_salud_hijo'] = 0;
        }

        $datos = array();
        $datos[0] = array('total_reunion_apoderados'  => $fila1['reunion_apoderados']);
        $datos[1] = array('total_control_salud_hijo'  => $fila2['control_salud_hijo']);

        echo json_encode(toutf8($datos));
    } else if ($seleccion == 18) {

        $sql1 = "SELECT COUNT(pa.id_pa) as con_goce_remuneracion FROM solicitud_permiso_administrativo spa, permiso_administrativo pa WHERE pa.id_pa=spa.id_pa and pa.id_tiporem=1";
        $sql2 = "SELECT COUNT(pa.id_pa) as sin_goce_remuneracion FROM solicitud_permiso_administrativo spa, permiso_administrativo pa WHERE pa.id_pa=spa.id_pa and pa.id_tiporem=2";

        $consulta1 = mysqli_query($mysqli, $sql1);
        $consulta2 = mysqli_query($mysqli, $sql2);

        /* RESPUESTAS A TIPO DE REMUNERACIONES DE LA SOLICITUD DE PERMISO ADMINISTRATIVO */
        if (mysqli_num_rows($consulta1) > 0) {
            $fila1 = mysqli_fetch_assoc($consulta1);
        } else {
            $fila1['con_goce_remuneracion'] = 0;
        }
        if (mysqli_num_rows($consulta2) > 0) {
            $fila2 = mysqli_fetch_assoc($consulta2);
        } else {
            $fila2['sin_goce_remuneracion'] = 0;
        }

        $datos = array();
        $datos[0] = array('total_con_goce_remuneracion'  => $fila1['con_goce_remuneracion']);
        $datos[1] = array('total_sin_goce_remuneracion'  => $fila2['sin_goce_remuneracion']);

        echo json_encode(toutf8($datos));
    } else if ($seleccion == 19) {

        $sql1 = "SELECT COUNT(id_historial_medicamento) as total_registros,
        (SELECT SUM(stock_historial_medicamento) FROM historial_medicamento WHERE id_estado_medicamento=1) as EstMedDisponible,
        (SELECT SUM(stock_historial_medicamento) FROM historial_medicamento WHERE id_estado_medicamento=2) as EstMedEntregados,
        (SELECT SUM(stock_historial_medicamento) FROM historial_medicamento WHERE id_estado_medicamento=3) as EstMedVencidos
        FROM historial_medicamento";

        $consulta1 = mysqli_query($mysqli, $sql1);

        /* RESPUESTAS A TIPO DE REMUNERACIONES DE LA SOLICITUD DE PERMISO ADMINISTRATIVO */
        if (mysqli_num_rows($consulta1) > 0) {
            $fila1 = mysqli_fetch_assoc($consulta1);
        } else {
            $fila1['EstMedDisponible'] = 0;
            $fila1['EstMedEntregados'] = 0;
            $fila1['EstMedVencidos'] = 0;
        }

        $datos = array();
        $datos[0] = array('total_EstMedDisponible'  => $fila1['EstMedDisponible']);
        $datos[1] = array('total_EstMedEntregados'  => $fila1['EstMedEntregados']);
        $datos[2] = array('total_EstMedVencidos'    => $fila1['EstMedVencidos']);

        echo json_encode(toutf8($datos));
    } else if ($seleccion == 20) {

        $sql1 = "SELECT COUNT(id_medicamento) as total_registros,
        (SELECT COUNT(fecha) FROM medicamento WHERE WEEKDAY(fecha)=0 and visibilidad_medicamento=1) as LunesVis,
        (SELECT COUNT(fecha) FROM medicamento WHERE WEEKDAY(fecha)=0 and visibilidad_medicamento=0) as LunesNoVis,
        (SELECT COUNT(fecha) FROM medicamento WHERE WEEKDAY(fecha)=1 and visibilidad_medicamento=1) as MartesVis,
        (SELECT COUNT(fecha) FROM medicamento WHERE WEEKDAY(fecha)=1 and visibilidad_medicamento=0) as MartesNoVis,
        (SELECT COUNT(fecha) FROM medicamento WHERE WEEKDAY(fecha)=2 and visibilidad_medicamento=1) as MiercolesVis,
        (SELECT COUNT(fecha) FROM medicamento WHERE WEEKDAY(fecha)=2 and visibilidad_medicamento=0) as MiercolesNoVis,
        (SELECT COUNT(fecha) FROM medicamento WHERE WEEKDAY(fecha)=3 and visibilidad_medicamento=1) as JuevesVis,
        (SELECT COUNT(fecha) FROM medicamento WHERE WEEKDAY(fecha)=3 and visibilidad_medicamento=0) as JuevesNoVis,
        (SELECT COUNT(fecha) FROM medicamento WHERE WEEKDAY(fecha)=4 and visibilidad_medicamento=1) as ViernesVis,
        (SELECT COUNT(fecha) FROM medicamento WHERE WEEKDAY(fecha)=4 and visibilidad_medicamento=0) as ViernesNoVis,
        (SELECT COUNT(fecha) FROM medicamento WHERE WEEKDAY(fecha)=5 and visibilidad_medicamento=1) as SabadoVis,
        (SELECT COUNT(fecha) FROM medicamento WHERE WEEKDAY(fecha)=5 and visibilidad_medicamento=0) as SabadoNoVis,
        (SELECT COUNT(fecha) FROM medicamento WHERE WEEKDAY(fecha)=6 and visibilidad_medicamento=1) as DomingoVis,
        (SELECT COUNT(fecha) FROM medicamento WHERE WEEKDAY(fecha)=6 and visibilidad_medicamento=0) as DomingoNoVis
        FROM medicamento";

        $consulta1 = mysqli_query($mysqli, $sql1);

        /* RESPUESTAS A LA VISIBILIDAD DE LOS MEDICAMENTOS CON RESPECTO AL HISTORIAL ACUMULADOS DE LOS DIAS DE SEMANA DE LUNES A DOMINGO */
        if (mysqli_num_rows($consulta1) > 0) {
            $fila1 = mysqli_fetch_assoc($consulta1);
        } else {
            $fila1['LunesVis']          = 0;
            $fila1['LunesNoVis']        = 0;
            $fila1['MartesVis']         = 0;
            $fila1['MartesNoVis']       = 0;
            $fila1['MiercolesVis']      = 0;
            $fila1['MiercolesNoVis']    = 0;
            $fila1['JuevesVis']         = 0;
            $fila1['JuevesNoVis']       = 0;
            $fila1['ViernesVis']        = 0;
            $fila1['ViernesNoVis']      = 0;
            $fila1['SabadoVis']         = 0;
            $fila1['SabadoNoVis']       = 0;
            $fila1['DomingoVis']        = 0;
            $fila1['DomingoNoVis']      = 0;
        }

        $datos = array();
        $datos[0][0] = array('CANTIDAD'   => $fila1['LunesVis']);
        $datos[0][1] = array('CANTIDAD'   => $fila1['LunesNoVis']);
        $datos[1][0] = array('CANTIDAD'   => $fila1['MartesVis']);
        $datos[1][1] = array('CANTIDAD'   => $fila1['MartesNoVis']);
        $datos[2][0] = array('CANTIDAD'   => $fila1['MiercolesVis']);
        $datos[2][1] = array('CANTIDAD'   => $fila1['MiercolesNoVis']);
        $datos[3][0] = array('CANTIDAD'   => $fila1['JuevesVis']);
        $datos[3][1] = array('CANTIDAD'   => $fila1['JuevesNoVis']);
        $datos[4][0] = array('CANTIDAD'   => $fila1['ViernesVis']);
        $datos[4][1] = array('CANTIDAD'   => $fila1['ViernesNoVis']);
        $datos[5][0] = array('CANTIDAD'   => $fila1['SabadoVis']);
        $datos[5][1] = array('CANTIDAD'   => $fila1['SabadoNoVis']);
        $datos[6][0] = array('CANTIDAD'   => $fila1['DomingoVis']);
        $datos[6][1] = array('CANTIDAD'   => $fila1['DomingoNoVis']);

        echo json_encode(toutf8($datos));
    } else if ($seleccion == 21) {

        $sql1 = "SELECT COUNT(id_medicamento) as total_registros,
        (SELECT SUM(hmed.stock_historial_medicamento) FROM medicamento med, historial_medicamento hmed WHERE med.id_medicamento=hmed.id_medicamento and hmed.id_estado_medicamento=1 and WEEKDAY(med.fecha)=0) as EstMedDisponibleLun,
        (SELECT SUM(hmed.stock_historial_medicamento) FROM medicamento med, historial_medicamento hmed WHERE med.id_medicamento=hmed.id_medicamento and hmed.id_estado_medicamento=2 and WEEKDAY(med.fecha)=0) as EstMedEntregadosLun,
        (SELECT SUM(hmed.stock_historial_medicamento) FROM medicamento med, historial_medicamento hmed WHERE med.id_medicamento=hmed.id_medicamento and hmed.id_estado_medicamento=3 and WEEKDAY(med.fecha)=0) as EstMedVencidosLun,
        (SELECT SUM(hmed.stock_historial_medicamento) FROM medicamento med, historial_medicamento hmed WHERE med.id_medicamento=hmed.id_medicamento and hmed.id_estado_medicamento=1 and WEEKDAY(med.fecha)=1) as EstMedDisponibleMar,
        (SELECT SUM(hmed.stock_historial_medicamento) FROM medicamento med, historial_medicamento hmed WHERE med.id_medicamento=hmed.id_medicamento and hmed.id_estado_medicamento=2 and WEEKDAY(med.fecha)=1) as EstMedEntregadosMar,
        (SELECT SUM(hmed.stock_historial_medicamento) FROM medicamento med, historial_medicamento hmed WHERE med.id_medicamento=hmed.id_medicamento and hmed.id_estado_medicamento=3 and WEEKDAY(med.fecha)=1) as EstMedVencidosMar,
        (SELECT SUM(hmed.stock_historial_medicamento) FROM medicamento med, historial_medicamento hmed WHERE med.id_medicamento=hmed.id_medicamento and hmed.id_estado_medicamento=1 and WEEKDAY(med.fecha)=2) as EstMedDisponibleMier,
        (SELECT SUM(hmed.stock_historial_medicamento) FROM medicamento med, historial_medicamento hmed WHERE med.id_medicamento=hmed.id_medicamento and hmed.id_estado_medicamento=2 and WEEKDAY(med.fecha)=2) as EstMedEntregadosMier,
        (SELECT SUM(hmed.stock_historial_medicamento) FROM medicamento med, historial_medicamento hmed WHERE med.id_medicamento=hmed.id_medicamento and hmed.id_estado_medicamento=3 and WEEKDAY(med.fecha)=2) as EstMedVencidosMier,
        (SELECT SUM(hmed.stock_historial_medicamento) FROM medicamento med, historial_medicamento hmed WHERE med.id_medicamento=hmed.id_medicamento and hmed.id_estado_medicamento=1 and WEEKDAY(med.fecha)=3) as EstMedDisponibleJue,
        (SELECT SUM(hmed.stock_historial_medicamento) FROM medicamento med, historial_medicamento hmed WHERE med.id_medicamento=hmed.id_medicamento and hmed.id_estado_medicamento=2 and WEEKDAY(med.fecha)=3) as EstMedEntregadosJue,
        (SELECT SUM(hmed.stock_historial_medicamento) FROM medicamento med, historial_medicamento hmed WHERE med.id_medicamento=hmed.id_medicamento and hmed.id_estado_medicamento=3 and WEEKDAY(med.fecha)=3) as EstMedVencidosJue,
        (SELECT SUM(hmed.stock_historial_medicamento) FROM medicamento med, historial_medicamento hmed WHERE med.id_medicamento=hmed.id_medicamento and hmed.id_estado_medicamento=1 and WEEKDAY(med.fecha)=4) as EstMedDisponibleVie,
        (SELECT SUM(hmed.stock_historial_medicamento) FROM medicamento med, historial_medicamento hmed WHERE med.id_medicamento=hmed.id_medicamento and hmed.id_estado_medicamento=2 and WEEKDAY(med.fecha)=4) as EstMedEntregadosVie,
        (SELECT SUM(hmed.stock_historial_medicamento) FROM medicamento med, historial_medicamento hmed WHERE med.id_medicamento=hmed.id_medicamento and hmed.id_estado_medicamento=3 and WEEKDAY(med.fecha)=4) as EstMedVencidosVie,
        (SELECT SUM(hmed.stock_historial_medicamento) FROM medicamento med, historial_medicamento hmed WHERE med.id_medicamento=hmed.id_medicamento and hmed.id_estado_medicamento=1 and WEEKDAY(med.fecha)=5) as EstMedDisponibleSab,
        (SELECT SUM(hmed.stock_historial_medicamento) FROM medicamento med, historial_medicamento hmed WHERE med.id_medicamento=hmed.id_medicamento and hmed.id_estado_medicamento=2 and WEEKDAY(med.fecha)=5) as EstMedEntregadosSab,
        (SELECT SUM(hmed.stock_historial_medicamento) FROM medicamento med, historial_medicamento hmed WHERE med.id_medicamento=hmed.id_medicamento and hmed.id_estado_medicamento=3 and WEEKDAY(med.fecha)=5) as EstMedVencidosSab,
        (SELECT SUM(hmed.stock_historial_medicamento) FROM medicamento med, historial_medicamento hmed WHERE med.id_medicamento=hmed.id_medicamento and hmed.id_estado_medicamento=1 and WEEKDAY(med.fecha)=6) as EstMedDisponibleDom,
        (SELECT SUM(hmed.stock_historial_medicamento) FROM medicamento med, historial_medicamento hmed WHERE med.id_medicamento=hmed.id_medicamento and hmed.id_estado_medicamento=2 and WEEKDAY(med.fecha)=6) as EstMedEntregadosDom,
        (SELECT SUM(hmed.stock_historial_medicamento) FROM medicamento med, historial_medicamento hmed WHERE med.id_medicamento=hmed.id_medicamento and hmed.id_estado_medicamento=3 and WEEKDAY(med.fecha)=6) as EstMedVencidosDom
        FROM medicamento";

        $consulta1 = mysqli_query($mysqli, $sql1);

        /* RESPUESTAS MEDICAMENTOS CON RESPECTO AL HISTORIAL ACUMULADOS POR ESTADO (DISPONIBLE, ENTREGADOS, VENCIDOS) 
        DE LOS DIAS DE SEMANA DE LUNES A DOMINGO */

        if (mysqli_num_rows($consulta1) > 0) {
            $fila1 = mysqli_fetch_assoc($consulta1);
        } else {
            $fila1['EstMedDisponibleLun']  = 0;
            $fila1['EstMedEntregadosLun']  = 0;
            $fila1['EstMedVencidosLun']    = 0;
            $fila1['EstMedDisponibleMar']  = 0;
            $fila1['EstMedEntregadosMar']  = 0;
            $fila1['EstMedVencidosMar']    = 0;
            $fila1['EstMedDisponibleMier'] = 0;
            $fila1['EstMedEntregadosMier'] = 0;
            $fila1['EstMedVencidosMier']   = 0;
            $fila1['EstMedDisponibleJue']  = 0;
            $fila1['EstMedEntregadosJue']  = 0;
            $fila1['EstMedVencidosJue']    = 0;
            $fila1['EstMedDisponibleVie']  = 0;
            $fila1['EstMedEntregadosVie']  = 0;
            $fila1['EstMedVencidosVie']    = 0;
            $fila1['EstMedDisponibleSab']  = 0;
            $fila1['EstMedEntregadosSab']  = 0;
            $fila1['EstMedVencidosSab']    = 0;
            $fila1['EstMedDisponibleDom']  = 0;
            $fila1['EstMedEntregadosDom']  = 0;
            $fila1['EstMedVencidosDom']    = 0;
        }

        $totalLun =  $fila1['EstMedDisponibleLun'] + $fila1['EstMedEntregadosLun'] + $fila1['EstMedVencidosLun'];
        $totalMar =  $fila1['EstMedDisponibleMar'] + $fila1['EstMedEntregadosMar'] + $fila1['EstMedVencidosMar'];
        $totalMier = $fila1['EstMedDisponibleMier'] + $fila1['EstMedEntregadosMier'] + $fila1['EstMedVencidosMier'];
        $totalJue =  $fila1['EstMedDisponibleJue'] + $fila1['EstMedEntregadosJue'] + $fila1['EstMedVencidosJue'];
        $totalVie =  $fila1['EstMedDisponibleVie'] + $fila1['EstMedEntregadosVie'] + $fila1['EstMedVencidosVie'];
        $totalSab =  $fila1['EstMedDisponibleSab'] + $fila1['EstMedEntregadosSab'] + $fila1['EstMedVencidosSab'];
        $totalDom =  $fila1['EstMedDisponibleDom'] + $fila1['EstMedEntregadosDom'] + $fila1['EstMedVencidosDom'];

        $datos = array();
        $datos[0][0] = array('CANTIDAD'   => $fila1['EstMedDisponibleLun']);
        $datos[0][1] = array('CANTIDAD'   => $fila1['EstMedEntregadosLun']);
        $datos[0][2] = array('CANTIDAD'   => $fila1['EstMedVencidosLun']);
        $datos[1][0] = array('CANTIDAD'   => $fila1['EstMedDisponibleMar']);
        $datos[1][1] = array('CANTIDAD'   => $fila1['EstMedEntregadosMar']);
        $datos[1][2] = array('CANTIDAD'   => $fila1['EstMedVencidosMar']);
        $datos[2][0] = array('CANTIDAD'   => $fila1['EstMedDisponibleMier']);
        $datos[2][1] = array('CANTIDAD'   => $fila1['EstMedEntregadosMier']);
        $datos[2][2] = array('CANTIDAD'   => $fila1['EstMedVencidosMier']);
        $datos[3][0] = array('CANTIDAD'   => $fila1['EstMedDisponibleJue']);
        $datos[3][1] = array('CANTIDAD'   => $fila1['EstMedEntregadosJue']);
        $datos[3][2] = array('CANTIDAD'   => $fila1['EstMedVencidosJue']);
        $datos[4][0] = array('CANTIDAD'   => $fila1['EstMedDisponibleVie']);
        $datos[4][1] = array('CANTIDAD'   => $fila1['EstMedEntregadosVie']);
        $datos[4][2] = array('CANTIDAD'   => $fila1['EstMedVencidosVie']);
        $datos[5][0] = array('CANTIDAD'   => $fila1['EstMedDisponibleSab']);
        $datos[5][1] = array('CANTIDAD'   => $fila1['EstMedEntregadosSab']);
        $datos[5][2] = array('CANTIDAD'   => $fila1['EstMedVencidosSab']);
        $datos[6][0] = array('CANTIDAD'   => $fila1['EstMedDisponibleDom']);
        $datos[6][1] = array('CANTIDAD'   => $fila1['EstMedEntregadosDom']);
        $datos[6][2] = array('CANTIDAD'   => $fila1['EstMedVencidosDom']);
        $datos[7][0] = array('TOTAL'   => $totalLun);
        $datos[7][1] = array('TOTAL'   => $totalMar);
        $datos[7][2] = array('TOTAL'   => $totalMier);
        $datos[7][3] = array('TOTAL'   => $totalJue);
        $datos[7][4] = array('TOTAL'   => $totalVie);
        $datos[7][5] = array('TOTAL'   => $totalSab);
        $datos[7][6] = array('TOTAL'   => $totalDom);

        echo json_encode(toutf8($datos));
    } else if ($seleccion == 22) {

        $sql1 = "SELECT COUNT(id_medicamento) as total_registros,
        (SELECT SUM(hmed.stock_historial_medicamento) FROM medicamento med, historial_medicamento hmed WHERE med.id_medicamento=hmed.id_medicamento and hmed.id_estado_medicamento=1 and year(med.fecha) = '$añoactual' and (month(med.fecha) >= 1 and month(med.fecha) <= 3)) as EstMedDisponiblePrimSem,
        (SELECT SUM(hmed.stock_historial_medicamento) FROM medicamento med, historial_medicamento hmed WHERE med.id_medicamento=hmed.id_medicamento and hmed.id_estado_medicamento=2 and year(med.fecha) = '$añoactual' and (month(med.fecha) >= 1 and month(med.fecha) <= 3)) as EstMedEntregadosPrimSem,
        (SELECT SUM(hmed.stock_historial_medicamento) FROM medicamento med, historial_medicamento hmed WHERE med.id_medicamento=hmed.id_medicamento and hmed.id_estado_medicamento=3 and year(med.fecha) = '$añoactual' and (month(med.fecha) >= 1 and month(med.fecha) <= 3)) as EstMedVencidosPrimSem,
        (SELECT SUM(hmed.stock_historial_medicamento) FROM medicamento med, historial_medicamento hmed WHERE med.id_medicamento=hmed.id_medicamento and hmed.id_estado_medicamento=1 and year(med.fecha) = '$añoactual' and (month(med.fecha) >= 4 and month(med.fecha) <= 6)) as EstMedDisponibleSegSem,
        (SELECT SUM(hmed.stock_historial_medicamento) FROM medicamento med, historial_medicamento hmed WHERE med.id_medicamento=hmed.id_medicamento and hmed.id_estado_medicamento=2 and year(med.fecha) = '$añoactual' and (month(med.fecha) >= 4 and month(med.fecha) <= 6)) as EstMedEntregadosSegSem,
        (SELECT SUM(hmed.stock_historial_medicamento) FROM medicamento med, historial_medicamento hmed WHERE med.id_medicamento=hmed.id_medicamento and hmed.id_estado_medicamento=3 and year(med.fecha) = '$añoactual' and (month(med.fecha) >= 4 and month(med.fecha) <= 6)) as EstMedVencidosSegSem,
        (SELECT SUM(hmed.stock_historial_medicamento) FROM medicamento med, historial_medicamento hmed WHERE med.id_medicamento=hmed.id_medicamento and hmed.id_estado_medicamento=1 and year(med.fecha) = '$añoactual' and (month(med.fecha) >= 7 and month(med.fecha) <= 9)) as EstMedDisponibleTerSem,
        (SELECT SUM(hmed.stock_historial_medicamento) FROM medicamento med, historial_medicamento hmed WHERE med.id_medicamento=hmed.id_medicamento and hmed.id_estado_medicamento=2 and year(med.fecha) = '$añoactual' and (month(med.fecha) >= 7 and month(med.fecha) <= 9)) as EstMedEntregadosTerSem,
        (SELECT SUM(hmed.stock_historial_medicamento) FROM medicamento med, historial_medicamento hmed WHERE med.id_medicamento=hmed.id_medicamento and hmed.id_estado_medicamento=3 and year(med.fecha) = '$añoactual' and (month(med.fecha) >= 7 and month(med.fecha) <= 9)) as EstMedVencidosTerSem,
        (SELECT SUM(hmed.stock_historial_medicamento) FROM medicamento med, historial_medicamento hmed WHERE med.id_medicamento=hmed.id_medicamento and hmed.id_estado_medicamento=1 and year(med.fecha) = '$añoactual' and (month(med.fecha) >= 10 and month(med.fecha) <= 12)) as EstMedDisponibleCuartSem,
        (SELECT SUM(hmed.stock_historial_medicamento) FROM medicamento med, historial_medicamento hmed WHERE med.id_medicamento=hmed.id_medicamento and hmed.id_estado_medicamento=2 and year(med.fecha) = '$añoactual' and (month(med.fecha) >= 10 and month(med.fecha) <= 12)) as EstMedEntregadosCuartSem,
        (SELECT SUM(hmed.stock_historial_medicamento) FROM medicamento med, historial_medicamento hmed WHERE med.id_medicamento=hmed.id_medicamento and hmed.id_estado_medicamento=3 and year(med.fecha) = '$añoactual' and (month(med.fecha) >= 10 and month(med.fecha) <= 12)) as EstMedVencidosCuartSem
        FROM medicamento";

        $consulta1 = mysqli_query($mysqli, $sql1);

        /* RESPUESTAS MEDICAMENTOS CON RESPECTO AL HISTORIAL ACUMULADOS POR ESTADO (DISPONIBLE, ENTREGADOS, VENCIDOS) 
        TRIMESTRALMENTE*/

        if (mysqli_num_rows($consulta1) > 0) {
            $fila1 = mysqli_fetch_assoc($consulta1);

            if (!$fila1['EstMedDisponiblePrimSem'] || is_null($fila1['EstMedDisponiblePrimSem']) || empty($fila1['EstMedDisponiblePrimSem'])) {
                $fila1['EstMedDisponiblePrimSem']  = 0;
            } else if (!$fila1['EstMedEntregadosPrimSem'] || is_null($fila1['EstMedEntregadosPrimSem']) || empty($fila1['EstMedEntregadosPrimSem'])) {
                $fila1['EstMedEntregadosPrimSem']  = 0;
            } else if (!$fila1['EstMedVencidosPrimSem'] || is_null($fila1['EstMedVencidosPrimSem']) || empty($fila1['EstMedVencidosPrimSem'])) {
                $fila1['EstMedVencidosPrimSem']  = 0;
            } else if (!$fila1['EstMedDisponibleSegSem'] || is_null($fila1['EstMedDisponibleSegSem']) || empty($fila1['EstMedDisponibleSegSem'])) {
                $fila1['EstMedDisponibleSegSem']  = 0;
            } else if (!$fila1['EstMedEntregadosSegSem'] || is_null($fila1['EstMedEntregadosSegSem']) || empty($fila1['EstMedEntregadosSegSem'])) {
                $fila1['EstMedEntregadosSegSem']  = 0;
            } else if (!$fila1['EstMedVencidosSegSem'] || is_null($fila1['EstMedVencidosSegSem']) || empty($fila1['EstMedVencidosSegSem'])) {
                $fila1['EstMedVencidosSegSem']  = 0;
            } else if (!$fila1['EstMedDisponibleTerSem'] || is_null($fila1['EstMedDisponibleTerSem']) || empty($fila1['EstMedDisponibleTerSem'])) {
                $fila1['EstMedDisponibleTerSem']  = 0;
            } else if (!$fila1['EstMedEntregadosTerSem'] || is_null($fila1['EstMedEntregadosTerSem']) || empty($fila1['EstMedEntregadosTerSem'])) {
                $fila1['EstMedEntregadosTerSem']  = 0;
            } else if (!$fila1['EstMedVencidosTerSem'] || is_null($fila1['EstMedVencidosTerSem']) || empty($fila1['EstMedVencidosTerSem'])) {
                $fila1['EstMedVencidosTerSem']  = 0;
            } else if (!$fila1['EstMedDisponibleCuartSem'] || is_null($fila1['EstMedDisponibleCuartSem']) || empty($fila1['EstMedDisponibleCuartSem'])) {
                $fila1['EstMedDisponibleCuartSem']  = 0;
            } else if (!$fila1['EstMedEntregadosCuartSem'] || is_null($fila1['EstMedEntregadosCuartSem']) || empty($fila1['EstMedEntregadosCuartSem'])) {
                $fila1['EstMedEntregadosCuartSem']  = 0;
            } else if (!$fila1['EstMedVencidosCuartSem'] || is_null($fila1['EstMedVencidosCuartSem']) || empty($fila1['EstMedVencidosCuartSem'])) {
                $fila1['EstMedVencidosCuartSem']  = 0;
            }
        } else {
            $fila1['EstMedDisponiblePrimSem']  = 0;
            $fila1['EstMedEntregadosPrimSem']  = 0;
            $fila1['EstMedVencidosPrimSem']    = 0;
            $fila1['EstMedDisponibleSegSem']   = 0;
            $fila1['EstMedEntregadosSegSem']   = 0;
            $fila1['EstMedVencidosSegSem']     = 0;
            $fila1['EstMedDisponibleTerSem']   = 0;
            $fila1['EstMedEntregadosTerSem']   = 0;
            $fila1['EstMedVencidosTerSem']     = 0;
            $fila1['EstMedDisponibleCuartSem'] = 0;
            $fila1['EstMedEntregadosCuartSem'] = 0;
            $fila1['EstMedVencidosCuartSem']   = 0;
        }

        $totalPrimSem   =   $fila1['EstMedDisponiblePrimSem']    + $fila1['EstMedEntregadosPrimSem']  + $fila1['EstMedVencidosPrimSem'];
        $totalSegSem    =   $fila1['EstMedDisponibleSegSem']     + $fila1['EstMedEntregadosSegSem']   + $fila1['EstMedVencidosSegSem'];
        $totalTerSem    =   $fila1['EstMedDisponibleTerSem']     + $fila1['EstMedEntregadosTerSem']   + $fila1['EstMedVencidosTerSem'];
        $totalCuartSem  =   $fila1['EstMedDisponibleCuartSem']   + $fila1['EstMedEntregadosCuartSem'] + $fila1['EstMedVencidosCuartSem'];

        $datos = array();
        $datos[0][0] = array('CANTIDAD'   => $fila1['EstMedDisponiblePrimSem']);
        $datos[0][1] = array('CANTIDAD'   => $fila1['EstMedEntregadosPrimSem']);
        $datos[0][2] = array('CANTIDAD'   => $fila1['EstMedVencidosPrimSem']);
        $datos[1][0] = array('CANTIDAD'   => $fila1['EstMedDisponibleSegSem']);
        $datos[1][1] = array('CANTIDAD'   => $fila1['EstMedEntregadosSegSem']);
        $datos[1][2] = array('CANTIDAD'   => $fila1['EstMedVencidosSegSem']);
        $datos[2][0] = array('CANTIDAD'   => $fila1['EstMedDisponibleTerSem']);
        $datos[2][1] = array('CANTIDAD'   => $fila1['EstMedEntregadosTerSem']);
        $datos[2][2] = array('CANTIDAD'   => $fila1['EstMedVencidosTerSem']);
        $datos[3][0] = array('CANTIDAD'   => $fila1['EstMedDisponibleCuartSem']);
        $datos[3][1] = array('CANTIDAD'   => $fila1['EstMedEntregadosCuartSem']);
        $datos[3][2] = array('CANTIDAD'   => $fila1['EstMedVencidosCuartSem']);
        $datos[7][0] = array('TOTAL'      => $totalPrimSem);
        $datos[7][1] = array('TOTAL'      => $totalSegSem);
        $datos[7][2] = array('TOTAL'      => $totalTerSem);

        echo json_encode(toutf8($datos));
    } else if ($seleccion == 23) {

        $sql1 = "SELECT COUNT(id_libro_rsf) as total_registros,
                (SELECT COUNT(id_libro_rsf) FROM libro_rsf WHERE estado_respuesta='1') as Reclamo_Sug_Resp,
                (SELECT COUNT(id_libro_rsf) FROM libro_rsf WHERE estado_respuesta='0') as Reclamo_Sug_NoResp
                FROM libro_rsf";

        $consulta1 = mysqli_query($mysqli, $sql1);

        /* RESPUESTAS A TIPO DE REMUNERACIONES DE LA SOLICITUD DE PERMISO ADMINISTRATIVO */
        if (mysqli_num_rows($consulta1) > 0) {
            $fila1 = mysqli_fetch_assoc($consulta1);
        } else {
            $fila1['Reclamo_Sug_Resp'] = 0;
            $fila1['Reclamo_Sug_NoResp'] = 0;
        }

        $datos = array();
        $datos[0][0] = array('CANTIDAD'  => $fila1['Reclamo_Sug_Resp']);
        $datos[0][1] = array('CANTIDAD'  => $fila1['Reclamo_Sug_NoResp']);

        echo json_encode(toutf8($datos));
    } else if ($seleccion == 24) {

        $sql1 = "SELECT COUNT(id_libro_rsf) as total_registros,
        (SELECT COUNT(id_libro_rsf) FROM libro_rsf WHERE tipo_solicitud='reclamo') as Reclamo,
        (SELECT COUNT(id_libro_rsf) FROM libro_rsf WHERE tipo_solicitud='sugerencia') as Sugerencia,
        (SELECT COUNT(id_libro_rsf) FROM libro_rsf WHERE tipo_solicitud='felicitaciones') as Felicitaciones
        FROM libro_rsf";

        $consulta1 = mysqli_query($mysqli, $sql1);

        /* RESPUESTAS A TIPO DE REMUNERACIONES DE LA SOLICITUD DE PERMISO ADMINISTRATIVO */
        if (mysqli_num_rows($consulta1) > 0) {
            $fila1 = mysqli_fetch_assoc($consulta1);
        } else {
            $fila1['Reclamo'] = 0;
            $fila1['Sugerencia'] = 0;
            $fila1['Felicitaciones'] = 0;
        }

        $datos = array();
        $datos[0][0] = array('CANTIDAD'  => $fila1['Reclamo']);
        $datos[0][1] = array('CANTIDAD'  => $fila1['Sugerencia']);
        $datos[0][2] = array('CANTIDAD'  => $fila1['Felicitaciones']);

        echo json_encode(toutf8($datos));
    } else if ($seleccion == 25) {
        $sql = "SELECT inst.nombre_institucion, COUNT(lrsf.id_libro_rsf) as cantidad 
        FROM libro_rsf lrsf, institucion inst 
        WHERE lrsf.id_institucion=inst.id_institucion and lrsf.tipo_solicitud='reclamo'
        GROUP BY inst.nombre_institucion
        ORDER BY cantidad DESC LIMIT 7"; //LIMITE DE 7 INSTITUCIONES ORDENADAS POR NOMBRE ALFABETICO

        $res = mysqli_query($mysqli, $sql);
        $datos = array();
        while ($fila = mysqli_fetch_array($res)) {
            $datos[] = array(
                'NOMBRE_INSTITUCION' => $fila["nombre_institucion"],
                'CANTIDAD'           => $fila["cantidad"]
            );
        }
        echo json_encode(toutf8($datos));
    } else if ($seleccion == 26) {
        $sql = "SELECT sect.nombre_sector, COUNT(us.rut) as contador FROM usuario us, sector sect 
        WHERE us.id_sector=sect.id_sector 
        GROUP BY sect.nombre_sector ORDER BY contador DESC"; //ORDENADAS POR MAYOR A MENOR

        $res = mysqli_query($mysqli, $sql);
        $datos = array();
        while ($fila = mysqli_fetch_array($res)) {
            $datos[] = array(
                'NOMBRE_SECTOR' => $fila["nombre_sector"],
                'CANTIDAD'      => $fila["contador"]
            );
        }
        echo json_encode(toutf8($datos));
    } else if ($seleccion == 27) {
        $sql = "SELECT und.nombre_unidad, COUNT(us.rut) as contador FROM usuario us, unidad und 
        WHERE us.id_unidad=und.id_unidad 
        GROUP BY und.nombre_unidad ORDER BY contador DESC"; //ORDENADAS POR MAYOR A MENOR

        $res = mysqli_query($mysqli, $sql);
        $datos = array();
        while ($fila = mysqli_fetch_array($res)) {
            $datos[] = array(
                'NOMBRE_UNIDAD' => $fila["nombre_unidad"],
                'CANTIDAD'      => $fila["contador"]
            );
        }
        echo json_encode(toutf8($datos));
    } else if ($seleccion == 28) {

        $sql1 = "SELECT COUNT(id_libro_rsf) as total_registros,
        (SELECT COUNT(DISTINCT id_pueblos_indigenas) as veces_pueb_indig FROM libro_rsf) as CantPuebIndPresentes,
        (SELECT COUNT(rut_funcionario) FROM libro_rsf WHERE estado_respuesta='1') as CantFuncQueHaRespondido
        FROM libro_rsf";

        $sql2 = "SELECT COUNT(lrsf.id_libro_rsf) AS cantidad_veces_presente, lrsf.id_institucion, inst.nombre_institucion 
        FROM libro_rsf lrsf, institucion inst  
        WHERE lrsf.id_institucion=inst.id_institucion 
        GROUP BY lrsf.id_institucion 
        ORDER BY cantidad_veces_presente DESC LIMIT 1";

        $consulta1 = mysqli_query($mysqli, $sql1);
        $consulta2 = mysqli_query($mysqli, $sql2);

        /* RESPUESTAS*/
        if (mysqli_num_rows($consulta1) > 0 && mysqli_num_rows($consulta2) > 0) {
            $fila1 = mysqli_fetch_assoc($consulta1);
            $fila2 = mysqli_fetch_assoc($consulta2);
        } else {
            $fila1['total_registros'] = 0;
            $fila1['CantPuebIndPresentes'] = 0;
            $fila1['CantFuncQueHaRespondido'] = 0;
            $fila2['nombre_institucion'] = 0;
        }

        $datos = array();
        $datos[0][0] = array('CANTIDAD_TOTAL_SOLICITUDES'   => $fila1['total_registros']);
        $datos[0][1] = array('NOMBRE_INSTITUCION'           => $fila2['nombre_institucion']);
        $datos[0][2] = array('CANTIDAD_PUEBLOS_INDIGENAS'   => $fila1['CantPuebIndPresentes']);
        $datos[0][3] = array('CANTIDAD_FUNC_RESPONDIDO'     => $fila1['CantFuncQueHaRespondido']);

        echo json_encode(toutf8($datos));
    } else if ($seleccion == 29) {

        $sql1 = "SELECT COUNT(id_hs_mat_bg) as total_registros,
        (SELECT SUM(hmat.stock_hs_mat_bg) FROM historial_mat_bodega hmat, materiales_bodega mat WHERE mat.id_mb=hmat.id_mb and id_est_mat_bg=1) as MatDisponibles,
        (SELECT SUM(hmat.stock_hs_mat_bg) FROM historial_mat_bodega hmat, materiales_bodega mat WHERE mat.id_mb=hmat.id_mb and id_est_mat_bg=2) as MatEntregados,
        (SELECT SUM(hmat.stock_hs_mat_bg) FROM historial_mat_bodega hmat, materiales_bodega mat WHERE mat.id_mb=hmat.id_mb and id_est_mat_bg=3) as MatDefectuosos,
        (SELECT SUM(hmat.stock_hs_mat_bg) FROM historial_mat_bodega hmat, materiales_bodega mat WHERE mat.id_mb=hmat.id_mb and id_est_mat_bg=4) as MatPerdidos
        FROM historial_mat_bodega";

        $consulta1 = mysqli_query($mysqli, $sql1);

        /* RESPUESTAS*/
        if (mysqli_num_rows($consulta1) > 0) {
            $fila1 = mysqli_fetch_assoc($consulta1);
        } else {
            $fila1['MatDisponibles'] = 0;
            $fila1['MatEntregados'] = 0;
            $fila1['MatDefectuosos'] = 0;
            $fila1['MatPerdidos'] = 0;
        }

        $datos = array();
        $datos[0][0] = array('MATDISPONIBLES'   => $fila1['MatDisponibles']);
        $datos[0][1] = array('MATENTREGADOS'    => $fila1['MatEntregados']);
        $datos[0][2] = array('MATDEFECTUOSOS'   => $fila1['MatDefectuosos']);
        $datos[0][3] = array('MATPERDIDOS'      => $fila1['MatPerdidos']);

        echo json_encode(toutf8($datos));
    } else if ($seleccion == 30) {

        $sql1 = "SELECT COUNT(id_mb) as total_registros,
        (SELECT SUM(hmtbdg.stock_hs_mat_bg) FROM materiales_bodega matbg, historial_mat_bodega hmtbdg WHERE matbg.id_mb=hmtbdg.id_mb and hmtbdg.id_est_mat_bg='1' and year(matbg.fecharegistro_mb) = '$añoactual' and (month(matbg.fecharegistro_mb) >= 1 and month(matbg.fecharegistro_mb) <= 3)) as EstMatDisponiblePrimSem,
        (SELECT SUM(hmtbdg.stock_hs_mat_bg) FROM materiales_bodega matbg, historial_mat_bodega hmtbdg WHERE matbg.id_mb=hmtbdg.id_mb and hmtbdg.id_est_mat_bg='2' and year(matbg.fecharegistro_mb) = '$añoactual' and (month(matbg.fecharegistro_mb) >= 1 and month(matbg.fecharegistro_mb) <= 3)) as EstMatEntregadosPrimSem,
        (SELECT SUM(hmtbdg.stock_hs_mat_bg) FROM materiales_bodega matbg, historial_mat_bodega hmtbdg WHERE matbg.id_mb=hmtbdg.id_mb and hmtbdg.id_est_mat_bg='3' and year(matbg.fecharegistro_mb) = '$añoactual' and (month(matbg.fecharegistro_mb) >= 1 and month(matbg.fecharegistro_mb) <= 3)) as EstMatDefectuosoPrimSem,
        (SELECT SUM(hmtbdg.stock_hs_mat_bg) FROM materiales_bodega matbg, historial_mat_bodega hmtbdg WHERE matbg.id_mb=hmtbdg.id_mb and hmtbdg.id_est_mat_bg='4' and year(matbg.fecharegistro_mb) = '$añoactual' and (month(matbg.fecharegistro_mb) >= 1 and month(matbg.fecharegistro_mb) <= 3)) as EstMatPerdidosPrimSem,

        (SELECT SUM(hmtbdg.stock_hs_mat_bg) FROM materiales_bodega matbg, historial_mat_bodega hmtbdg WHERE matbg.id_mb=hmtbdg.id_mb and hmtbdg.id_est_mat_bg='1' and year(matbg.fecharegistro_mb) = '$añoactual' and (month(matbg.fecharegistro_mb) >= 4 and month(matbg.fecharegistro_mb) <= 6)) as EstMatDisponibleSegSem,
        (SELECT SUM(hmtbdg.stock_hs_mat_bg) FROM materiales_bodega matbg, historial_mat_bodega hmtbdg WHERE matbg.id_mb=hmtbdg.id_mb and hmtbdg.id_est_mat_bg='2' and year(matbg.fecharegistro_mb) = '$añoactual' and (month(matbg.fecharegistro_mb) >= 4 and month(matbg.fecharegistro_mb) <= 6)) as EstMatEntregadosSegSem,
        (SELECT SUM(hmtbdg.stock_hs_mat_bg) FROM materiales_bodega matbg, historial_mat_bodega hmtbdg WHERE matbg.id_mb=hmtbdg.id_mb and hmtbdg.id_est_mat_bg='3' and year(matbg.fecharegistro_mb) = '$añoactual' and (month(matbg.fecharegistro_mb) >= 4 and month(matbg.fecharegistro_mb) <= 6)) as EstMatDefectuosoSegSem,
        (SELECT SUM(hmtbdg.stock_hs_mat_bg) FROM materiales_bodega matbg, historial_mat_bodega hmtbdg WHERE matbg.id_mb=hmtbdg.id_mb and hmtbdg.id_est_mat_bg='4' and year(matbg.fecharegistro_mb) = '$añoactual' and (month(matbg.fecharegistro_mb) >= 4 and month(matbg.fecharegistro_mb) <= 6)) as EstMatPerdidosSegSem,

        (SELECT SUM(hmtbdg.stock_hs_mat_bg) FROM materiales_bodega matbg, historial_mat_bodega hmtbdg WHERE matbg.id_mb=hmtbdg.id_mb and hmtbdg.id_est_mat_bg='1' and year(matbg.fecharegistro_mb) = '$añoactual' and (month(matbg.fecharegistro_mb) >= 7 and month(matbg.fecharegistro_mb) <= 9)) as EstMatDisponibleTerSem,
        (SELECT SUM(hmtbdg.stock_hs_mat_bg) FROM materiales_bodega matbg, historial_mat_bodega hmtbdg WHERE matbg.id_mb=hmtbdg.id_mb and hmtbdg.id_est_mat_bg='2' and year(matbg.fecharegistro_mb) = '$añoactual' and (month(matbg.fecharegistro_mb) >= 7 and month(matbg.fecharegistro_mb) <= 9)) as EstMatEntregadosTerSem,
        (SELECT SUM(hmtbdg.stock_hs_mat_bg) FROM materiales_bodega matbg, historial_mat_bodega hmtbdg WHERE matbg.id_mb=hmtbdg.id_mb and hmtbdg.id_est_mat_bg='3' and year(matbg.fecharegistro_mb) = '$añoactual' and (month(matbg.fecharegistro_mb) >= 7 and month(matbg.fecharegistro_mb) <= 9)) as EstMatDefectuosoTerSem,
        (SELECT SUM(hmtbdg.stock_hs_mat_bg) FROM materiales_bodega matbg, historial_mat_bodega hmtbdg WHERE matbg.id_mb=hmtbdg.id_mb and hmtbdg.id_est_mat_bg='4' and year(matbg.fecharegistro_mb) = '$añoactual' and (month(matbg.fecharegistro_mb) >= 7 and month(matbg.fecharegistro_mb) <= 9)) as EstMatPerdidosTerSem,

        (SELECT SUM(hmtbdg.stock_hs_mat_bg) FROM materiales_bodega matbg, historial_mat_bodega hmtbdg WHERE matbg.id_mb=hmtbdg.id_mb and hmtbdg.id_est_mat_bg='1' and year(matbg.fecharegistro_mb) = '$añoactual' and (month(matbg.fecharegistro_mb) >= 10 and month(matbg.fecharegistro_mb) <= 12)) as EstMatDisponibleCuarSem,
        (SELECT SUM(hmtbdg.stock_hs_mat_bg) FROM materiales_bodega matbg, historial_mat_bodega hmtbdg WHERE matbg.id_mb=hmtbdg.id_mb and hmtbdg.id_est_mat_bg='2' and year(matbg.fecharegistro_mb) = '$añoactual' and (month(matbg.fecharegistro_mb) >= 10 and month(matbg.fecharegistro_mb) <= 12)) as EstMatEntregadosCuarSem,
        (SELECT SUM(hmtbdg.stock_hs_mat_bg) FROM materiales_bodega matbg, historial_mat_bodega hmtbdg WHERE matbg.id_mb=hmtbdg.id_mb and hmtbdg.id_est_mat_bg='3' and year(matbg.fecharegistro_mb) = '$añoactual' and (month(matbg.fecharegistro_mb) >= 10 and month(matbg.fecharegistro_mb) <= 12)) as EstMatDefectuosoCuarSem,
        (SELECT SUM(hmtbdg.stock_hs_mat_bg) FROM materiales_bodega matbg, historial_mat_bodega hmtbdg WHERE matbg.id_mb=hmtbdg.id_mb and hmtbdg.id_est_mat_bg='4' and year(matbg.fecharegistro_mb) = '$añoactual' and (month(matbg.fecharegistro_mb) >= 10 and month(matbg.fecharegistro_mb) <= 12)) as EstMatPerdidosCuarSem

        FROM materiales_bodega";

        $consulta1 = mysqli_query($mysqli, $sql1);

        /* CANTIDAD DE STOCK DEL MATERIAL TRIMESTRAL*/

        if (mysqli_num_rows($consulta1) > 0) {
            $fila1 = mysqli_fetch_assoc($consulta1);

            $totalPrimSem   =   $fila1['EstMatDisponiblePrimSem']    + $fila1['EstMatEntregadosPrimSem']  + $fila1['EstMatDefectuosoPrimSem'] + $fila1['EstMatPerdidosPrimSem'];
            $totalSegSem    =   $fila1['EstMatDisponibleSegSem']     + $fila1['EstMatEntregadosSegSem']   + $fila1['EstMatDefectuosoSegSem'] + $fila1['EstMatPerdidosSegSem'];
            $totalTerSem    =   $fila1['EstMatDisponibleTerSem']     + $fila1['EstMatEntregadosTerSem']   + $fila1['EstMatDefectuosoTerSem'] + $fila1['EstMatPerdidosTerSem'];
            $totalCuartSem  =   $fila1['EstMatDisponibleCuarSem']   + $fila1['EstMatEntregadosCuarSem'] + $fila1['EstMatDefectuosoCuarSem'] + $fila1['EstMatPerdidosCuarSem'];

            $datos = array();
            $datos[0][0] = array('CANTIDAD'   => $fila1['EstMatDisponiblePrimSem']);
            $datos[0][1] = array('CANTIDAD'   => $fila1['EstMatEntregadosPrimSem']);
            $datos[0][2] = array('CANTIDAD'   => $fila1['EstMatDefectuosoPrimSem']);
            $datos[0][3] = array('CANTIDAD'   => $fila1['EstMatPerdidosPrimSem']);
            $datos[1][0] = array('CANTIDAD'   => $fila1['EstMatDisponibleSegSem']);
            $datos[1][1] = array('CANTIDAD'   => $fila1['EstMatEntregadosSegSem']);
            $datos[1][2] = array('CANTIDAD'   => $fila1['EstMatDefectuosoSegSem']);
            $datos[1][3] = array('CANTIDAD'   => $fila1['EstMatPerdidosSegSem']);
            $datos[2][0] = array('CANTIDAD'   => $fila1['EstMatDisponibleTerSem']);
            $datos[2][1] = array('CANTIDAD'   => $fila1['EstMatEntregadosTerSem']);
            $datos[2][2] = array('CANTIDAD'   => $fila1['EstMatDefectuosoTerSem']);
            $datos[2][3] = array('CANTIDAD'   => $fila1['EstMatPerdidosTerSem']);
            $datos[3][0] = array('CANTIDAD'   => $fila1['EstMatDisponibleCuarSem']);
            $datos[3][1] = array('CANTIDAD'   => $fila1['EstMatEntregadosCuarSem']);
            $datos[3][2] = array('CANTIDAD'   => $fila1['EstMatDefectuosoCuarSem']);
            $datos[3][3] = array('CANTIDAD'   => $fila1['EstMatPerdidosCuarSem']);
            $datos[7][0] = array('TOTAL'      => $totalPrimSem);
            $datos[7][1] = array('TOTAL'      => $totalSegSem);
            $datos[7][2] = array('TOTAL'      => $totalTerSem);
            $datos[7][3] = array('TOTAL'      => $totalCuartSem);
        } else {
            $datos = 0;
        }

        echo json_encode(toutf8($datos));
    } else if ($seleccion == 31) {

        $sql1 = "SELECT COUNT(id_retiro_med) as total_registros,
        (SELECT COUNT(id_retiro_med) FROM agendar_retiro_medicamento WHERE id_estado_resp_agenda=1 and WEEKDAY(fecha_retiro)=0) as SolRespondidaLun,
        (SELECT COUNT(id_retiro_med) FROM agendar_retiro_medicamento WHERE id_estado_resp_agenda=2 and WEEKDAY(fecha_retiro)=0) as SolNoRespondidaLun,
        (SELECT COUNT(id_retiro_med) FROM agendar_retiro_medicamento WHERE id_estado_resp_agenda=1 and WEEKDAY(fecha_retiro)=1) as SolRespondidaMar,
        (SELECT COUNT(id_retiro_med) FROM agendar_retiro_medicamento WHERE id_estado_resp_agenda=2 and WEEKDAY(fecha_retiro)=1) as SolNoRespondidaMar,
        (SELECT COUNT(id_retiro_med) FROM agendar_retiro_medicamento WHERE id_estado_resp_agenda=1 and WEEKDAY(fecha_retiro)=2) as SolRespondidaMier,
        (SELECT COUNT(id_retiro_med) FROM agendar_retiro_medicamento WHERE id_estado_resp_agenda=2 and WEEKDAY(fecha_retiro)=2) as SolNoRespondidaMier,
        (SELECT COUNT(id_retiro_med) FROM agendar_retiro_medicamento WHERE id_estado_resp_agenda=1 and WEEKDAY(fecha_retiro)=3) as SolRespondidaJue,
        (SELECT COUNT(id_retiro_med) FROM agendar_retiro_medicamento WHERE id_estado_resp_agenda=2 and WEEKDAY(fecha_retiro)=3) as SolNoRespondidaJue,
        (SELECT COUNT(id_retiro_med) FROM agendar_retiro_medicamento WHERE id_estado_resp_agenda=1 and WEEKDAY(fecha_retiro)=4) as SolRespondidaVie,
        (SELECT COUNT(id_retiro_med) FROM agendar_retiro_medicamento WHERE id_estado_resp_agenda=2 and WEEKDAY(fecha_retiro)=4) as SolNoRespondidaVie,
        (SELECT COUNT(id_retiro_med) FROM agendar_retiro_medicamento WHERE id_estado_resp_agenda=1 and WEEKDAY(fecha_retiro)=5) as SolRespondidaSab,
        (SELECT COUNT(id_retiro_med) FROM agendar_retiro_medicamento WHERE id_estado_resp_agenda=2 and WEEKDAY(fecha_retiro)=5) as SolNoRespondidaSab,
        (SELECT COUNT(id_retiro_med) FROM agendar_retiro_medicamento WHERE id_estado_resp_agenda=1 and WEEKDAY(fecha_retiro)=6) as SolRespondidaDom,
        (SELECT COUNT(id_retiro_med) FROM agendar_retiro_medicamento WHERE id_estado_resp_agenda=2 and WEEKDAY(fecha_retiro)=6) as SolNoRespondidaDom
        FROM agendar_retiro_medicamento";

        $consulta1 = mysqli_query($mysqli, $sql1);

        /* RESPUESTAS MEDICAMENTOS AGENDADOS EN DIAS DE SEMANA */

        if (mysqli_num_rows($consulta1) > 0) {
            $fila1 = mysqli_fetch_assoc($consulta1);
        } else {
            $fila1['SolRespondidaLun']      = 0;
            $fila1['SolNoRespondidaLun']    = 0;
            $fila1['SolRespondidaMar']      = 0;
            $fila1['SolNoRespondidaMar']    = 0;
            $fila1['SolRespondidaMier']     = 0;
            $fila1['SolNoRespondidaMier']   = 0;
            $fila1['SolRespondidaJue']      = 0;
            $fila1['SolNoRespondidaJue']    = 0;
            $fila1['SolRespondidaVie']      = 0;
            $fila1['SolNoRespondidaVie']    = 0;
            $fila1['SolRespondidaSab']      = 0;
            $fila1['SolNoRespondidaSab']    = 0;
            $fila1['SolRespondidaDom']      = 0;
            $fila1['SolNoRespondidaDom']    = 0;
        }

        $totalLun   =  $fila1['SolRespondidaLun']   + $fila1['SolNoRespondidaLun'];
        $totalMar   =  $fila1['SolRespondidaMar']   + $fila1['SolNoRespondidaMar'];
        $totalMier  =  $fila1['SolRespondidaMier']  + $fila1['SolNoRespondidaMier'];
        $totalJue   =  $fila1['SolRespondidaJue']   + $fila1['SolNoRespondidaJue'];
        $totalVie   =  $fila1['SolRespondidaVie']   + $fila1['SolNoRespondidaVie'];
        $totalSab   =  $fila1['SolRespondidaSab']   + $fila1['SolNoRespondidaSab'];
        $totalDom   =  $fila1['SolRespondidaDom']   + $fila1['SolNoRespondidaDom'];

        $datos = array();
        $datos[0][0] = array('CANTIDAD'   => $fila1['SolRespondidaLun']);
        $datos[0][1] = array('CANTIDAD'   => $fila1['SolNoRespondidaLun']);
        $datos[1][0] = array('CANTIDAD'   => $fila1['SolRespondidaMar']);
        $datos[1][1] = array('CANTIDAD'   => $fila1['SolNoRespondidaMar']);
        $datos[2][0] = array('CANTIDAD'   => $fila1['SolRespondidaMier']);
        $datos[2][1] = array('CANTIDAD'   => $fila1['SolNoRespondidaMier']);
        $datos[3][0] = array('CANTIDAD'   => $fila1['SolRespondidaJue']);
        $datos[3][1] = array('CANTIDAD'   => $fila1['SolNoRespondidaJue']);
        $datos[4][0] = array('CANTIDAD'   => $fila1['SolRespondidaVie']);
        $datos[4][1] = array('CANTIDAD'   => $fila1['SolNoRespondidaVie']);
        $datos[5][0] = array('CANTIDAD'   => $fila1['SolRespondidaSab']);
        $datos[5][1] = array('CANTIDAD'   => $fila1['SolNoRespondidaSab']);
        $datos[6][0] = array('CANTIDAD'   => $fila1['SolRespondidaDom']);
        $datos[6][1] = array('CANTIDAD'   => $fila1['SolNoRespondidaDom']);
        $datos[7][0] = array('TOTAL'   => $totalLun);
        $datos[7][1] = array('TOTAL'   => $totalMar);
        $datos[7][2] = array('TOTAL'   => $totalMier);
        $datos[7][3] = array('TOTAL'   => $totalJue);
        $datos[7][4] = array('TOTAL'   => $totalVie);
        $datos[7][5] = array('TOTAL'   => $totalSab);
        $datos[7][6] = array('TOTAL'   => $totalDom);

        echo json_encode(toutf8($datos));
    } else if ($seleccion == 32) {

        $sql1 = "SELECT id_opte,COUNT(id_opte) as cant_comentarios, nomyapell_fb_opte FROM opinante GROUP BY nomyapell_fb_opte";
        $consulta1 = mysqli_query($mysqli, $sql1);
        $datos = array();

        /* RESPUESTAS CONCURRENCIA DE COMENTARIOS POR USUARIO (A UN ARTICULO DE NOTICIA) */

        if (mysqli_num_rows($consulta1) > 0) {
            while ($fila = mysqli_fetch_array($consulta1)) {
                $datos[] = array(
                    'NOMBRE'    => $fila["nomyapell_fb_opte"],
                    'CANTIDAD'  => $fila["cant_comentarios"]
                );
            }
        } else {
            $datos = 0;
        }
        echo json_encode(toutf8($datos));
    } else if ($seleccion == 33) {

        $sql1 = "SELECT op.id_articulo,op.id_opte,count(op.id_opte) as contarveces, SUBSTRING(art.titulo_articulo, 1, 37) AS titulo  FROM opinante op, articulo art WHERE op.id_articulo=art.id_articulo GROUP BY op.id_articulo";
        $consulta1 = mysqli_query($mysqli, $sql1);
        $datos = array();

        // SUBSTRING(a.titulo_articulo, 1, 37) AS titulo

        /* RESPUESTAS ARTICULOS DE NOTICIA MÁS COMENTADOS */

        if (mysqli_num_rows($consulta1) > 0) {
            while ($fila = mysqli_fetch_array($consulta1)) {
                $datos[] = array(
                    'ARTICULO' => $fila["titulo"] . '...',
                    'CANTIDAD' => $fila["contarveces"]
                );
            }
        } else {
            $datos = 0;
        }
        echo json_encode(toutf8($datos));
    } else if ($seleccion == 34) {

        $sql1 = "SELECT COUNT(id_sop_tec) as total_registros,
        (SELECT COUNT(fechayhora_sop_tec) FROM soporte_tecnico WHERE MONTH(fechayhora_sop_tec)=1 and estado_eliminado_sop_tec='0') as Enero,
        (SELECT COUNT(fechayhora_sop_tec) FROM soporte_tecnico WHERE MONTH(fechayhora_sop_tec)=2 and estado_eliminado_sop_tec='0') as Febrero,
        (SELECT COUNT(fechayhora_sop_tec) FROM soporte_tecnico WHERE MONTH(fechayhora_sop_tec)=3 and estado_eliminado_sop_tec='0') as Marzo,
        (SELECT COUNT(fechayhora_sop_tec) FROM soporte_tecnico WHERE MONTH(fechayhora_sop_tec)=4 and estado_eliminado_sop_tec='0') as Abril,
        (SELECT COUNT(fechayhora_sop_tec) FROM soporte_tecnico WHERE MONTH(fechayhora_sop_tec)=5 and estado_eliminado_sop_tec='0') as Mayo,
        (SELECT COUNT(fechayhora_sop_tec) FROM soporte_tecnico WHERE MONTH(fechayhora_sop_tec)=6 and estado_eliminado_sop_tec='0') as Junio,
        (SELECT COUNT(fechayhora_sop_tec) FROM soporte_tecnico WHERE MONTH(fechayhora_sop_tec)=7 and estado_eliminado_sop_tec='0') as Julio,
        (SELECT COUNT(fechayhora_sop_tec) FROM soporte_tecnico WHERE MONTH(fechayhora_sop_tec)=8 and estado_eliminado_sop_tec='0') as Agosto,
        (SELECT COUNT(fechayhora_sop_tec) FROM soporte_tecnico WHERE MONTH(fechayhora_sop_tec)=9 and estado_eliminado_sop_tec='0') as Septiembre,
        (SELECT COUNT(fechayhora_sop_tec) FROM soporte_tecnico WHERE MONTH(fechayhora_sop_tec)=10 and estado_eliminado_sop_tec='0') as Octubre,
        (SELECT COUNT(fechayhora_sop_tec) FROM soporte_tecnico WHERE MONTH(fechayhora_sop_tec)=11 and estado_eliminado_sop_tec='0') as Noviembre,
        (SELECT COUNT(fechayhora_sop_tec) FROM soporte_tecnico WHERE MONTH(fechayhora_sop_tec)=12 and estado_eliminado_sop_tec='0') as Diciembre
        FROM soporte_tecnico";

        $consulta1 = mysqli_query($mysqli, $sql1);
        $datos = array();

        /* RESPUESTAS */

        if (mysqli_num_rows($consulta1) > 0) {
            $fila1 = mysqli_fetch_assoc($consulta1);
            $datos[0][0] = array('CANTIDAD'      => $fila1['Enero']);
            $datos[0][1] = array('CANTIDAD'      => $fila1['Febrero']);
            $datos[0][2] = array('CANTIDAD'      => $fila1['Marzo']);
            $datos[0][3] = array('CANTIDAD'      => $fila1['Abril']);
            $datos[0][4] = array('CANTIDAD'      => $fila1['Mayo']);
            $datos[0][5] = array('CANTIDAD'      => $fila1['Junio']);
            $datos[0][6] = array('CANTIDAD'      => $fila1['Julio']);
            $datos[0][7] = array('CANTIDAD'      => $fila1['Agosto']);
            $datos[0][8] = array('CANTIDAD'      => $fila1['Septiembre']);
            $datos[0][9] = array('CANTIDAD'      => $fila1['Octubre']);
            $datos[0][10] = array('CANTIDAD'     => $fila1['Noviembre']);
            $datos[0][11] = array('CANTIDAD'     => $fila1['Diciembre']);
        } else {
            $datos = 0;
        }

        echo json_encode(toutf8($datos));
    } else if ($seleccion == 35) {

        $sql1 = "SELECT rut FROM usuario WHERE id_rol='22'";
        $consulta1 = mysqli_query($mysqli, $sql1);
        $datos = array();

        if (!$consulta1) {
            $datos = -1;
        } else {
            $fila1 = mysqli_fetch_assoc($consulta1);
            $rutSoporteTecnico =  $fila1['rut'];

            $sql2 = "SELECT COUNT(emisor) as SolicitudesDeAyuda FROM soporte_tecnico WHERE emisor!='$rutSoporteTecnico'";
            $consulta2 = mysqli_query($mysqli, $sql2);

            $sql3 = "SELECT navegador_sop_tec,COUNT(navegador_sop_tec) as NavMasUtilizado FROM soporte_tecnico 
            WHERE emisor!='$rutSoporteTecnico' GROUP BY navegador_sop_tec ORDER BY NavMasUtilizado DESC LIMIT 1";
            $consulta3 = mysqli_query($mysqli, $sql3);

            $sql4 = "SELECT sistemaoperativo_sop_tec,COUNT(sistemaoperativo_sop_tec) as SistOpMasFrecuente FROM soporte_tecnico 
            WHERE emisor!='$rutSoporteTecnico' GROUP BY sistemaoperativo_sop_tec ORDER BY SistOpMasFrecuente DESC LIMIT 1";
            $consulta4 = mysqli_query($mysqli, $sql4);

            $sql5 = "SELECT COUNT(emisor) as MensajeRespondidos FROM soporte_tecnico WHERE emisor='$rutSoporteTecnico'";
            $consulta5 = mysqli_query($mysqli, $sql5);


            if (!$consulta2 && !$consulta3 && !$consulta4 && !$consulta5) {
                $datos = -1;
            } else {
                // $datos = 0;

                /* RESPUESTAS */

                if (mysqli_num_rows($consulta2) > 0) {
                    $fila2 = mysqli_fetch_assoc($consulta2);
                    $datos[0][0] = array('SOLCITUDESDEAYUDA'  => $fila2['SolicitudesDeAyuda']);
                } else {
                    $datos[0][0] = array('SOLCITUDESDEAYUDA'  => 0);
                }

                if (mysqli_num_rows($consulta3) > 0) {
                    $fila3 = mysqli_fetch_assoc($consulta3);
                    $datos[0][1] = array('NAVMASUTILIZADO'  => $fila3['navegador_sop_tec']);
                    $datos[0][2] = array('CANTNAVMASUTILIZADO'  => $fila3['NavMasUtilizado']);
                } else {
                    $datos[0][1] = array('NAVMASUTILIZADO'  => 'No hay datos');
                    $datos[0][2] = array('CANTNAVMASUTILIZADO'  => 0);
                }

                if (mysqli_num_rows($consulta4) > 0) {
                    $fila4 = mysqli_fetch_assoc($consulta4);
                    $datos[0][3] = array('SISTOPMASFRECUENTE'  => $fila4['sistemaoperativo_sop_tec']);
                    $datos[0][4] = array('CANTSISTOPMASFRECUENTE'  => $fila4['SistOpMasFrecuente']);
                } else {
                    $datos[0][3] = array('SISTOPMASFRECUENTE'  => 'No hay datos');
                    $datos[0][4] = array('CANTSISTOPMASFRECUENTE'  => 0);
                }

                if (mysqli_num_rows($consulta5) > 0) {
                    $fila5 = mysqli_fetch_assoc($consulta5);
                    $datos[0][5] = array('MENSJRESPONDIDOS'  => $fila5['MensajeRespondidos']);
                } else {
                    $datos[0][5] = array('MENSJRESPONDIDOS'  => 0);
                }
            }
        }

        echo json_encode(toutf8($datos));
    } else if ($seleccion == 36) {

        $sql1 = "SELECT fecha_calificacion_articulo, COUNT(valor_calificacion_articulo) as frecuenciaporfecha FROM calificacion_articulo WHERE year(fecha_calificacion_articulo) = '$añoactual' GROUP BY fecha_calificacion_articulo";
        $consulta1 = mysqli_query($mysqli, $sql1);
        $datos = array();

        if (!$consulta1) {
            $datos = 0;
        } else {
            /* RESPUESTAS */
            if (mysqli_num_rows($consulta1) > 0) {
                while ($fila = mysqli_fetch_array($consulta1)) {
                    $datos[] = array(
                        'VALOR' => $fila["frecuenciaporfecha"],
                        'FECHA' => $fila["fecha_calificacion_articulo"]
                    );
                }
            } else {
                $datos = 0;
            }
        }
        echo json_encode(toutf8($datos));
    } else if ($seleccion == 37) {

        $mesanterior = $mesactual - 1;

        $sql1 = "SELECT COUNT(id_calificacion_articulo) as ContadorMesActual FROM calificacion_articulo WHERE month(fecha_calificacion_articulo) = '$mesactual'";
        $consulta1 = mysqli_query($mysqli, $sql1);

        $sql2 = "SELECT COUNT(id_calificacion_articulo) as ContadorMesAnterior FROM calificacion_articulo WHERE month(fecha_calificacion_articulo) = '$mesanterior'";
        $consulta2 = mysqli_query($mysqli, $sql2);

        $datos = array();

        if (!$consulta1 && !$consulta2) {
            $datos = 0;
        } else {
            /* RESPUESTAS */
            if (mysqli_num_rows($consulta1) > 0 && mysqli_num_rows($consulta2) > 0) {

                $fila1 = mysqli_fetch_assoc($consulta1);
                $fila2 = mysqli_fetch_assoc($consulta2);
                $datos[0] = array('CONTADORMESACTUAL'  => $fila1['ContadorMesActual']);
                $datos[1] = array('CONTADORMESANTERIOR'  => $fila2['ContadorMesAnterior']);
            } else {
                $datos = 0;
            }
        }
        echo json_encode(toutf8($datos));
    } else if ($seleccion == 38) {

        $fechainiciopordefecto = $añoactual . '-' . $mesactual . '-01';
        $fechafinpordefecto = date("Y-m-t", strtotime($fechadehoy));

        if ((isset($_POST['fechadesde']) && isset($_POST['fechahasta'])) && (!empty($_POST['fechadesde']) && !empty($_POST['fechahasta']))) {
            $desde = fechaconguion($_POST['fechadesde']);
            $hasta = fechaconguion($_POST['fechahasta']);
        } else {
            $desde = $fechainiciopordefecto;
            $hasta = $fechafinpordefecto;
        }

        $sql1 = "SELECT DATE(fecha_vis_art) AS fecha, COUNT(*) AS conteo FROM visitas_articulo WHERE fecha_vis_art >= '$desde' AND fecha_vis_art<= '$hasta' GROUP BY fecha";
        $consulta1 = mysqli_query($mysqli, $sql1);

        $sql2 = "SELECT DATE(fecha_vis_art) AS fecha, COUNT(DISTINCT ip_vis_art) AS conteoIP FROM visitas_articulo WHERE fecha_vis_art >= '$desde' AND fecha_vis_art<= '$hasta' GROUP BY fecha";
        $consulta2 = mysqli_query($mysqli, $sql2);

        $datos = array();

        if (!$consulta1 && !$consulta2) {
            $datos = 0;
        } else {
            /* RESPUESTAS */
            if (mysqli_num_rows($consulta1) > 0 && mysqli_num_rows($consulta2) > 0) {
                while ($fila1 = mysqli_fetch_array($consulta1)) {
                    $datos['visitas'][] = array(
                        'FECHA' => $fila1["fecha"],
                        'CANTIDAD' => $fila1["conteo"]
                    );
                }

                while ($fila2 = mysqli_fetch_array($consulta2)) {
                    $datos['visitantes'][] = array(
                        'FECHA' => $fila2["fecha"],
                        'CANTIDAD' => $fila2["conteoIP"]
                    );
                }
            } else {
                $datos = 0;
            }
        }

        echo json_encode(toutf8($datos));
    }

    // else if ($seleccion == 34) {

    //     $sql1 = "SELECT comentario_opte FROM opinante";
    //     $consulta1 = mysqli_query($mysqli, $sql1);
    //     $datos = array();

    //     // SUBSTRING(a.titulo_articulo, 1, 37) AS titulo

    //     /* RESPUESTAS ARTICULOS DE NOTICIA MÁS COMENTADOS */
    //     $vector = '';

    //     if (mysqli_num_rows($consulta1) > 0) {
    //         while ($fila = mysqli_fetch_array($consulta1)) {

    //             $vector .= $fila["comentario_opte"].' ';
    //             // $datos[] = array(
    //             //     'COMENTARIO' => $fila["comentario_opte"]
    //             // );
    //         }
    //         $datos[0] = array('COMENTARIO' => $vector);
    //     } else {
    //         $datos = 0;
    //     }
    //     echo json_encode(toutf8($datos));
    // }
} else {
    echo 3;
    return;
}


mysqli_close($mysqli);


/*
SELECT COUNT(id_mb) as total_registros,
        (SELECT SUM(hmtbdg.stock_hs_mat_bg) FROM materiales_bodega matbg, historial_mat_bodega hmtbdg WHERE matbg.id_mb=hmtbdg.id_mb and hmtbdg.id_est_mat_bg=1 and year(matbg.fecharegistro_mb) = '$añoactual' and (month(matbg.fecharegistro_mb) >= 1 and month(matbg.fecharegistro_mb) <= 3)) as EstMatDisponiblePrimSem,
        (SELECT SUM(hmtbdg.stock_hs_mat_bg) FROM materiales_bodega matbg, historial_mat_bodega hmtbdg WHERE matbg.id_mb=hmtbdg.id_mb and hmtbdg.id_est_mat_bg=2 and year(matbg.fecharegistro_mb) = '$añoactual' and (month(matbg.fecharegistro_mb) >= 1 and month(matbg.fecharegistro_mb) <= 3)) as EstMatEntregadosPrimSem,
        (SELECT SUM(hmtbdg.stock_hs_mat_bg) FROM materiales_bodega matbg, historial_mat_bodega hmtbdg WHERE matbg.id_mb=hmtbdg.id_mb and hmtbdg.id_est_mat_bg=3 and year(matbg.fecharegistro_mb) = '$añoactual' and (month(matbg.fecharegistro_mb) >= 1 and month(matbg.fecharegistro_mb) <= 3)) as EstMatDefectuosoPrimSem,
        (SELECT SUM(hmtbdg.stock_hs_mat_bg) FROM materiales_bodega matbg, historial_mat_bodega hmtbdg WHERE matbg.id_mb=hmtbdg.id_mb and hmtbdg.id_est_mat_bg=4 and year(matbg.fecharegistro_mb) = '$añoactual' and (month(matbg.fecharegistro_mb) >= 1 and month(matbg.fecharegistro_mb) <= 3)) as EstMatPerdidosPrimSem,

        (SELECT SUM(hmtbdg.stock_hs_mat_bg) FROM materiales_bodega matbg, historial_mat_bodega hmtbdg WHERE matbg.id_mb=hmtbdg.id_mb and hmtbdg.id_est_mat_bg=1 and year(matbg.fecharegistro_mb) = '$añoactual' and (month(matbg.fecharegistro_mb) >= 4 and month(matbg.fecharegistro_mb) <= 6)) as EstMatDisponibleSegSem,
        (SELECT SUM(hmtbdg.stock_hs_mat_bg) FROM materiales_bodega matbg, historial_mat_bodega hmtbdg WHERE matbg.id_mb=hmtbdg.id_mb and hmtbdg.id_est_mat_bg=2 and year(matbg.fecharegistro_mb) = '$añoactual' and (month(matbg.fecharegistro_mb) >= 4 and month(matbg.fecharegistro_mb) <= 6)) as EstMatEntregadosSegSem,
        (SELECT SUM(hmtbdg.stock_hs_mat_bg) FROM materiales_bodega matbg, historial_mat_bodega hmtbdg WHERE matbg.id_mb=hmtbdg.id_mb and hmtbdg.id_est_mat_bg=3 and year(matbg.fecharegistro_mb) = '$añoactual' and (month(matbg.fecharegistro_mb) >= 4 and month(matbg.fecharegistro_mb) <= 6)) as EstMatDefectuosoSegSem,
        (SELECT SUM(hmtbdg.stock_hs_mat_bg) FROM materiales_bodega matbg, historial_mat_bodega hmtbdg WHERE matbg.id_mb=hmtbdg.id_mb and hmtbdg.id_est_mat_bg=4 and year(matbg.fecharegistro_mb) = '$añoactual' and (month(matbg.fecharegistro_mb) >= 4 and month(matbg.fecharegistro_mb) <= 6)) as EstMatPerdidosSegSem,

        (SELECT SUM(hmtbdg.stock_hs_mat_bg) FROM materiales_bodega matbg, historial_mat_bodega hmtbdg WHERE matbg.id_mb=hmtbdg.id_mb and hmtbdg.id_est_mat_bg=1 and year(matbg.fecharegistro_mb) = '$añoactual' and (month(matbg.fecharegistro_mb) >= 7 and month(matbg.fecharegistro_mb) <= 9)) as EstMatDisponibleTerSem,
        (SELECT SUM(hmtbdg.stock_hs_mat_bg) FROM materiales_bodega matbg, historial_mat_bodega hmtbdg WHERE matbg.id_mb=hmtbdg.id_mb and hmtbdg.id_est_mat_bg=2 and year(matbg.fecharegistro_mb) = '$añoactual' and (month(matbg.fecharegistro_mb) >= 7 and month(matbg.fecharegistro_mb) <= 9)) as EstMatEntregadosTerSem,
        (SELECT SUM(hmtbdg.stock_hs_mat_bg) FROM materiales_bodega matbg, historial_mat_bodega hmtbdg WHERE matbg.id_mb=hmtbdg.id_mb and hmtbdg.id_est_mat_bg=3 and year(matbg.fecharegistro_mb) = '$añoactual' and (month(matbg.fecharegistro_mb) >= 7 and month(matbg.fecharegistro_mb) <= 9)) as EstMatDefectuosoTerSem,
        (SELECT SUM(hmtbdg.stock_hs_mat_bg) FROM materiales_bodega matbg, historial_mat_bodega hmtbdg WHERE matbg.id_mb=hmtbdg.id_mb and hmtbdg.id_est_mat_bg=4 and year(matbg.fecharegistro_mb) = '$añoactual' and (month(matbg.fecharegistro_mb) >= 7 and month(matbg.fecharegistro_mb) <= 9)) as EstMatPerdidosTerSem,

        (SELECT SUM(hmtbdg.stock_hs_mat_bg) FROM materiales_bodega matbg, historial_mat_bodega hmtbdg WHERE matbg.id_mb=hmtbdg.id_mb and hmtbdg.id_est_mat_bg=1 and year(matbg.fecharegistro_mb) = '$añoactual' and (month(matbg.fecharegistro_mb) >= 10 and month(matbg.fecharegistro_mb) <= 12)) as EstMatDisponibleCuarSem,
        (SELECT SUM(hmtbdg.stock_hs_mat_bg) FROM materiales_bodega matbg, historial_mat_bodega hmtbdg WHERE matbg.id_mb=hmtbdg.id_mb and hmtbdg.id_est_mat_bg=2 and year(matbg.fecharegistro_mb) = '$añoactual' and (month(matbg.fecharegistro_mb) >= 10 and month(matbg.fecharegistro_mb) <= 12)) as EstMatEntregadosCuarSem,
        (SELECT SUM(hmtbdg.stock_hs_mat_bg) FROM materiales_bodega matbg, historial_mat_bodega hmtbdg WHERE matbg.id_mb=hmtbdg.id_mb and hmtbdg.id_est_mat_bg=3 and year(matbg.fecharegistro_mb) = '$añoactual' and (month(matbg.fecharegistro_mb) >= 10 and month(matbg.fecharegistro_mb) <= 12)) as EstMatDefectuosoCuarSem,
        (SELECT SUM(hmtbdg.stock_hs_mat_bg) FROM materiales_bodega matbg, historial_mat_bodega hmtbdg WHERE matbg.id_mb=hmtbdg.id_mb and hmtbdg.id_est_mat_bg=4 and year(matbg.fecharegistro_mb) = '$añoactual' and (month(matbg.fecharegistro_mb) >= 10 and month(matbg.fecharegistro_mb) <= 12)) as EstMatPerdidosCuarSem

        FROM materiales_bodega


        SELECT COUNT(id_mb) as total_registros,
        (SELECT SUM(hmtbdg.stock_hs_mat_bg) FROM materiales_bodega matbg, historial_mat_bodega hmtbdg WHERE matbg.id_mb=hmtbdg.id_mb and hmtbdg.id_est_mat_bg=1 and year(matbg.fecharegistro_mb) = '2021' and (month(matbg.fecharegistro_mb) >= 1 and month(matbg.fecharegistro_mb) <= 3)) as EstMatDisponiblePrimSem,
        (SELECT SUM(hmtbdg.stock_hs_mat_bg) FROM materiales_bodega matbg, historial_mat_bodega hmtbdg WHERE matbg.id_mb=hmtbdg.id_mb and hmtbdg.id_est_mat_bg=2 and year(matbg.fecharegistro_mb) = '2021' and (month(matbg.fecharegistro_mb) >= 1 and month(matbg.fecharegistro_mb) <= 3)) as EstMatEntregadosPrimSem,
        (SELECT SUM(hmtbdg.stock_hs_mat_bg) FROM materiales_bodega matbg, historial_mat_bodega hmtbdg WHERE matbg.id_mb=hmtbdg.id_mb and hmtbdg.id_est_mat_bg=3 and year(matbg.fecharegistro_mb) = '2021' and (month(matbg.fecharegistro_mb) >= 1 and month(matbg.fecharegistro_mb) <= 3)) as EstMatDefectuosoPrimSem,
        (SELECT SUM(hmtbdg.stock_hs_mat_bg) FROM materiales_bodega matbg, historial_mat_bodega hmtbdg WHERE matbg.id_mb=hmtbdg.id_mb and hmtbdg.id_est_mat_bg=4 and year(matbg.fecharegistro_mb) = '2021' and (month(matbg.fecharegistro_mb) >= 1 and month(matbg.fecharegistro_mb) <= 3)) as EstMatPerdidosPrimSem,

        (SELECT SUM(hmtbdg.stock_hs_mat_bg) FROM materiales_bodega matbg, historial_mat_bodega hmtbdg WHERE matbg.id_mb=hmtbdg.id_mb and hmtbdg.id_est_mat_bg=1 and year(matbg.fecharegistro_mb) = '2021' and (month(matbg.fecharegistro_mb) >= 4 and month(matbg.fecharegistro_mb) <= 6)) as EstMatDisponibleSegSem,
        (SELECT SUM(hmtbdg.stock_hs_mat_bg) FROM materiales_bodega matbg, historial_mat_bodega hmtbdg WHERE matbg.id_mb=hmtbdg.id_mb and hmtbdg.id_est_mat_bg=2 and year(matbg.fecharegistro_mb) = '2021' and (month(matbg.fecharegistro_mb) >= 4 and month(matbg.fecharegistro_mb) <= 6)) as EstMatEntregadosSegSem,
        (SELECT SUM(hmtbdg.stock_hs_mat_bg) FROM materiales_bodega matbg, historial_mat_bodega hmtbdg WHERE matbg.id_mb=hmtbdg.id_mb and hmtbdg.id_est_mat_bg=3 and year(matbg.fecharegistro_mb) = '2021' and (month(matbg.fecharegistro_mb) >= 4 and month(matbg.fecharegistro_mb) <= 6)) as EstMatDefectuosoSegSem,
        (SELECT SUM(hmtbdg.stock_hs_mat_bg) FROM materiales_bodega matbg, historial_mat_bodega hmtbdg WHERE matbg.id_mb=hmtbdg.id_mb and hmtbdg.id_est_mat_bg=4 and year(matbg.fecharegistro_mb) = '2021' and (month(matbg.fecharegistro_mb) >= 4 and month(matbg.fecharegistro_mb) <= 6)) as EstMatPerdidosSegSem,

        (SELECT SUM(hmtbdg.stock_hs_mat_bg) FROM materiales_bodega matbg, historial_mat_bodega hmtbdg WHERE matbg.id_mb=hmtbdg.id_mb and hmtbdg.id_est_mat_bg=1 and year(matbg.fecharegistro_mb) = '2021' and (month(matbg.fecharegistro_mb) >= 7 and month(matbg.fecharegistro_mb) <= 9)) as EstMatDisponibleTerSem,
        (SELECT SUM(hmtbdg.stock_hs_mat_bg) FROM materiales_bodega matbg, historial_mat_bodega hmtbdg WHERE matbg.id_mb=hmtbdg.id_mb and hmtbdg.id_est_mat_bg=2 and year(matbg.fecharegistro_mb) = '2021' and (month(matbg.fecharegistro_mb) >= 7 and month(matbg.fecharegistro_mb) <= 9)) as EstMatEntregadosTerSem,
        (SELECT SUM(hmtbdg.stock_hs_mat_bg) FROM materiales_bodega matbg, historial_mat_bodega hmtbdg WHERE matbg.id_mb=hmtbdg.id_mb and hmtbdg.id_est_mat_bg=3 and year(matbg.fecharegistro_mb) = '2021' and (month(matbg.fecharegistro_mb) >= 7 and month(matbg.fecharegistro_mb) <= 9)) as EstMatDefectuosoTerSem,
        (SELECT SUM(hmtbdg.stock_hs_mat_bg) FROM materiales_bodega matbg, historial_mat_bodega hmtbdg WHERE matbg.id_mb=hmtbdg.id_mb and hmtbdg.id_est_mat_bg=4 and year(matbg.fecharegistro_mb) = '2021' and (month(matbg.fecharegistro_mb) >= 7 and month(matbg.fecharegistro_mb) <= 9)) as EstMatPerdidosTerSem,

        (SELECT SUM(hmtbdg.stock_hs_mat_bg) FROM materiales_bodega matbg, historial_mat_bodega hmtbdg WHERE matbg.id_mb=hmtbdg.id_mb and hmtbdg.id_est_mat_bg=1 and year(matbg.fecharegistro_mb) = '2021' and (month(matbg.fecharegistro_mb) >= 10 and month(matbg.fecharegistro_mb) <= 12)) as EstMatDisponibleCuarSem,
        (SELECT SUM(hmtbdg.stock_hs_mat_bg) FROM materiales_bodega matbg, historial_mat_bodega hmtbdg WHERE matbg.id_mb=hmtbdg.id_mb and hmtbdg.id_est_mat_bg=2 and year(matbg.fecharegistro_mb) = '2021' and (month(matbg.fecharegistro_mb) >= 10 and month(matbg.fecharegistro_mb) <= 12)) as EstMatEntregadosCuarSem,
        (SELECT SUM(hmtbdg.stock_hs_mat_bg) FROM materiales_bodega matbg, historial_mat_bodega hmtbdg WHERE matbg.id_mb=hmtbdg.id_mb and hmtbdg.id_est_mat_bg=3 and year(matbg.fecharegistro_mb) = '2021' and (month(matbg.fecharegistro_mb) >= 10 and month(matbg.fecharegistro_mb) <= 12)) as EstMatDefectuosoCuarSem,
        (SELECT SUM(hmtbdg.stock_hs_mat_bg) FROM materiales_bodega matbg, historial_mat_bodega hmtbdg WHERE matbg.id_mb=hmtbdg.id_mb and hmtbdg.id_est_mat_bg=4 and year(matbg.fecharegistro_mb) = '2021' and (month(matbg.fecharegistro_mb) >= 10 and month(matbg.fecharegistro_mb) <= 12)) as EstMatPerdidosCuarSem

        FROM materiales_bodega

    */


    /*
    
    SELECT COUNT(id_mb) as total_registros,
        (SELECT SUM(hmtbdg.stock_hs_mat_bg) FROM materiales_bodega matbg, historial_mat_bodega hmtbdg WHERE matbg.id_mb=hmtbdg.id_mb and hmtbdg.id_est_mat_bg='1' and year(matbg.fecharegistro_mb) = '$añoactual' and (month(matbg.fecharegistro_mb) >= 1 and month(matbg.fecharegistro_mb) <= 3)) as EstMatDisponiblePrimSem,
        (SELECT SUM(hmtbdg.stock_hs_mat_bg) FROM materiales_bodega matbg, historial_mat_bodega hmtbdg WHERE matbg.id_mb=hmtbdg.id_mb and hmtbdg.id_est_mat_bg='2' and year(matbg.fecharegistro_mb) = '$añoactual' and (month(matbg.fecharegistro_mb) >= 1 and month(matbg.fecharegistro_mb) <= 3)) as EstMatEntregadosPrimSem,
        (SELECT SUM(hmtbdg.stock_hs_mat_bg) FROM materiales_bodega matbg, historial_mat_bodega hmtbdg WHERE matbg.id_mb=hmtbdg.id_mb and hmtbdg.id_est_mat_bg='3' and year(matbg.fecharegistro_mb) = '$añoactual' and (month(matbg.fecharegistro_mb) >= 1 and month(matbg.fecharegistro_mb) <= 3)) as EstMatDefectuosoPrimSem,
        (SELECT SUM(hmtbdg.stock_hs_mat_bg) FROM materiales_bodega matbg, historial_mat_bodega hmtbdg WHERE matbg.id_mb=hmtbdg.id_mb and hmtbdg.id_est_mat_bg='4' and year(matbg.fecharegistro_mb) = '$añoactual' and (month(matbg.fecharegistro_mb) >= 1 and month(matbg.fecharegistro_mb) <= 3)) as EstMatPerdidosPrimSem,

        (SELECT SUM(hmtbdg.stock_hs_mat_bg) FROM materiales_bodega matbg, historial_mat_bodega hmtbdg WHERE matbg.id_mb=hmtbdg.id_mb and hmtbdg.id_est_mat_bg='1' and year(matbg.fecharegistro_mb) = '$añoactual' and (month(matbg.fecharegistro_mb) >= 4 and month(matbg.fecharegistro_mb) <= 6)) as EstMatDisponibleSegSem,
        (SELECT SUM(hmtbdg.stock_hs_mat_bg) FROM materiales_bodega matbg, historial_mat_bodega hmtbdg WHERE matbg.id_mb=hmtbdg.id_mb and hmtbdg.id_est_mat_bg='2' and year(matbg.fecharegistro_mb) = '$añoactual' and (month(matbg.fecharegistro_mb) >= 4 and month(matbg.fecharegistro_mb) <= 6)) as EstMatEntregadosSegSem,
        (SELECT SUM(hmtbdg.stock_hs_mat_bg) FROM materiales_bodega matbg, historial_mat_bodega hmtbdg WHERE matbg.id_mb=hmtbdg.id_mb and hmtbdg.id_est_mat_bg='3' and year(matbg.fecharegistro_mb) = '$añoactual' and (month(matbg.fecharegistro_mb) >= 4 and month(matbg.fecharegistro_mb) <= 6)) as EstMatDefectuosoSegSem,
        (SELECT SUM(hmtbdg.stock_hs_mat_bg) FROM materiales_bodega matbg, historial_mat_bodega hmtbdg WHERE matbg.id_mb=hmtbdg.id_mb and hmtbdg.id_est_mat_bg='4' and year(matbg.fecharegistro_mb) = '$añoactual' and (month(matbg.fecharegistro_mb) >= 4 and month(matbg.fecharegistro_mb) <= 6)) as EstMatPerdidosSegSem,

        (SELECT SUM(hmtbdg.stock_hs_mat_bg) FROM materiales_bodega matbg, historial_mat_bodega hmtbdg WHERE matbg.id_mb=hmtbdg.id_mb and hmtbdg.id_est_mat_bg='1' and year(matbg.fecharegistro_mb) = '$añoactual' and (month(matbg.fecharegistro_mb) >= 7 and month(matbg.fecharegistro_mb) <= 9)) as EstMatDisponibleTerSem,
        (SELECT SUM(hmtbdg.stock_hs_mat_bg) FROM materiales_bodega matbg, historial_mat_bodega hmtbdg WHERE matbg.id_mb=hmtbdg.id_mb and hmtbdg.id_est_mat_bg='2' and year(matbg.fecharegistro_mb) = '$añoactual' and (month(matbg.fecharegistro_mb) >= 7 and month(matbg.fecharegistro_mb) <= 9)) as EstMatEntregadosTerSem,
        (SELECT SUM(hmtbdg.stock_hs_mat_bg) FROM materiales_bodega matbg, historial_mat_bodega hmtbdg WHERE matbg.id_mb=hmtbdg.id_mb and hmtbdg.id_est_mat_bg='3' and year(matbg.fecharegistro_mb) = '$añoactual' and (month(matbg.fecharegistro_mb) >= 7 and month(matbg.fecharegistro_mb) <= 9)) as EstMatDefectuosoTerSem,
        (SELECT SUM(hmtbdg.stock_hs_mat_bg) FROM materiales_bodega matbg, historial_mat_bodega hmtbdg WHERE matbg.id_mb=hmtbdg.id_mb and hmtbdg.id_est_mat_bg='4' and year(matbg.fecharegistro_mb) = '$añoactual' and (month(matbg.fecharegistro_mb) >= 7 and month(matbg.fecharegistro_mb) <= 9)) as EstMatPerdidosTerSem,

        (SELECT SUM(hmtbdg.stock_hs_mat_bg) FROM materiales_bodega matbg, historial_mat_bodega hmtbdg WHERE matbg.id_mb=hmtbdg.id_mb and hmtbdg.id_est_mat_bg='1' and year(matbg.fecharegistro_mb) = '$añoactual' and (month(matbg.fecharegistro_mb) >= 10 and month(matbg.fecharegistro_mb) <= 12)) as EstMatDisponibleCuarSem,
        (SELECT SUM(hmtbdg.stock_hs_mat_bg) FROM materiales_bodega matbg, historial_mat_bodega hmtbdg WHERE matbg.id_mb=hmtbdg.id_mb and hmtbdg.id_est_mat_bg='2' and year(matbg.fecharegistro_mb) = '$añoactual' and (month(matbg.fecharegistro_mb) >= 10 and month(matbg.fecharegistro_mb) <= 12)) as EstMatEntregadosCuarSem,
        (SELECT SUM(hmtbdg.stock_hs_mat_bg) FROM materiales_bodega matbg, historial_mat_bodega hmtbdg WHERE matbg.id_mb=hmtbdg.id_mb and hmtbdg.id_est_mat_bg='3' and year(matbg.fecharegistro_mb) = '$añoactual' and (month(matbg.fecharegistro_mb) >= 10 and month(matbg.fecharegistro_mb) <= 12)) as EstMatDefectuosoCuarSem,
        (SELECT SUM(hmtbdg.stock_hs_mat_bg) FROM materiales_bodega matbg, historial_mat_bodega hmtbdg WHERE matbg.id_mb=hmtbdg.id_mb and hmtbdg.id_est_mat_bg='4' and year(matbg.fecharegistro_mb) = '$añoactual' and (month(matbg.fecharegistro_mb) >= 10 and month(matbg.fecharegistro_mb) <= 12)) as EstMatPerdidosCuarSem

        FROM materiales_bodega

    */
