<?php
include '../../conexion/conexion.php';
include '../../funcionesphp/limpiarCampo.php';
include '../../funcionesphp/TOUTF8.php';
include '../../funcionesphp/borrarcarpeta.php';
date_default_timezone_set("America/Santiago");
setlocale(LC_TIME, "spanish");
$fechadehoy = strftime("%Y-%m-%d"); //("%Y-%m-%d") Ej:2021-12-23
$anoactual = strftime("%Y");
$mesactual = strftime("%m");
$diaactual = strftime("%d");
// session_start();
// $rutsesion = $_SESSION['sesionCESFAM']['rut'];

if (isset($_POST['seleccionar'])) {
    $seleccion = $_POST['seleccionar'];
    if ($seleccion == 1) {
        //         SELECT agr.id_retiro_med,agr.fecha_retiro, pac.rut_paciente,pac.nombres_paciente,pac.apellidos_paciente,pac.correo_paciente,pac.edad_paciente
        // FROM agendar_retiro_medicamento agr, paciente pac 
        // WHERE agr.rut_paciente=pac.rut_paciente and agr.rut_paciente='14140914k' and agr.id_estado_resp_agenda=2 
        // and month(agr.fecha_retiro) ='07' and year(agr.fecha_retiro) ='2021'

        $sql = "SELECT agr.id_retiro_med,agr.fecha_retiro,agr.id_estado_resp_agenda, pac.rut_paciente,pac.nombres_paciente,pac.apellidos_paciente,pac.correo_paciente,pac.edad_paciente
        FROM agendar_retiro_medicamento agr, paciente pac 
        WHERE agr.rut_paciente=pac.rut_paciente 
        and month(agr.fecha_retiro) ='$mesactual' and year(agr.fecha_retiro) ='$anoactual'";
        $consulta = mysqli_query($mysqli, $sql);
        $datos = array();
        while ($fila = mysqli_fetch_array($consulta)) {
            $datos[] = array(
                'ID_RETIRO_MED' => $fila["id_retiro_med"],
                'ID_ESTADO_MED' => $fila["id_estado_resp_agenda"],
                'FECHA_RETIRO' => $fila["fecha_retiro"],
                'RUT_PACIENTE' => $fila["rut_paciente"],
                'NOMBRE_PACIENTE' => $fila["nombres_paciente"],
                'APELLIDOS_PACIENTE' => $fila["apellidos_paciente"],
                'CORREO_PACIENTE' => $fila["correo_paciente"],
                'EDAD_PACIENTE' => $fila["edad_paciente"]
            );
        }
        // header('Content-type: application/json');
        echo json_encode(toutf8($datos));
        mysqli_close($mysqli);
    } else if ($seleccion == 2) {

        if (isset($_POST['idsolicitud']) && isset($_POST['rutpaciente'])) {
            $idsolicitud = $_POST['idsolicitud'];
            $rutpaciente = $_POST['rutpaciente'];

            if (validavacioenarreglo(array($idsolicitud, $rutpaciente))) { //Valida si estan vacios los datos
                echo 1;
                return;
            } else {
                $sql1 = "UPDATE agendar_retiro_medicamento SET id_estado_resp_agenda=1, fecha_respuesta_funcionario='$fechadehoy' WHERE id_retiro_med='$idsolicitud' and rut_paciente='$rutpaciente'";
                $res1 = mysqli_query($mysqli, $sql1);

                if (!$res1) {
                    echo 2;
                    return;
                } else {
                    echo 3;
                    return;
                }
            }
        } else {
            echo 4;
            return;
        }
    } else if ($seleccion == 3) {
        if (isset($_POST['idsolicitud']) && isset($_POST['rutpaciente']) && isset($_POST['comentario'])) {
            
            $idsolicitud = $_POST['idsolicitud'];
            $rutpaciente = $_POST['rutpaciente'];
            $comentario = $_POST['comentario'];

            //El comentario puede ser vacio (es opcional), asi que no lo valido en el if
            if (validavacioenarreglo(array($idsolicitud, $rutpaciente))) { //Valida si estan vacios los datos
                echo 1;
                return;
            } else {
                $sql1 = "UPDATE agendar_retiro_medicamento SET id_estado_resp_agenda=3, fecha_respuesta_funcionario='$fechadehoy', comentario_funcionario='$comentario' WHERE id_retiro_med='$idsolicitud' and rut_paciente='$rutpaciente'";
                $res1 = mysqli_query($mysqli, $sql1);

                if (!$res1) {
                    echo 2;
                    return;
                } else {
                    echo 3;
                    return;
                }
            }
        } else {
            echo 4;
            return;
        }
    }
}
