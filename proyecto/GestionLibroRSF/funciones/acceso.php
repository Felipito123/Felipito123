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
        //         SELECT agr.id_retiro_med,agr.fecha_retiro, pac.rut_paciente,pac.nombres_paciente,pac.apellidos_paciente,pac.correo_paciente,pac.edad_paciente
        // FROM agendar_retiro_medicamento agr, paciente pac 
        // WHERE agr.rut_paciente=pac.rut_paciente and agr.rut_paciente='14140914k' and agr.id_estado_resp_agenda=2 
        // and month(agr.fecha_retiro) ='07' and year(agr.fecha_retiro) ='2021'

        $sql = "SELECT lrsf.id_libro_rsf,lrsf.rut_solicitante,lrsf.rut_funcionario,lrsf.tipo_persona, lrsf.nombres, lrsf.apellido_paterno, lrsf.apellido_materno, lrsf.sexo, lrsf.fecha_nacimiento, lrsf.tipo_persona, 
        lrsf.tipo_telefonoprimario, lrsf.telefono_primario, lrsf.tipo_telefonosecundario, lrsf.telefono_secundario, lrsf.tipo_solicitud, lrsf.es_afectado, 
        lrsf.fecha_evento, lrsf.detalle,lrsf.observaciones, ar.nombre_area, inst.nombre_institucion, pind.nombre_pueblos_indigenas, lrsf.observaciones, lrsf.correo, 
        lrsf.estado_respuesta,naci.nombre_nacionalidad, lrsf.fecha_registro, lrsf.comentario_respuesta_funcionario FROM libro_rsf lrsf, institucion inst, nacionalidad naci, pueblos_indigenas pind, area ar
        WHERE lrsf.id_institucion=inst.id_institucion and lrsf.id_nacionalidad= naci.id_nacionalidad and lrsf.id_pueblos_indigenas=pind.id_pueblos_indigenas and lrsf.id_area=ar.id_area
        and month(lrsf.fecha_registro) ='$mesactual' and year(lrsf.fecha_registro) ='$anoactual'";


        $consulta = mysqli_query($mysqli, $sql);

        $sql1 = "SELECT us.nombre_usuario, rl.nombre_rol FROM usuario us, rol rl WHERE us.id_rol=rl.id_rol and us.rut='$rutsesion'";
        $consulta2 = mysqli_query($mysqli, $sql1);
        $fila = mysqli_fetch_array($consulta2);
        $nombreFuncionario = $fila['nombre_usuario'];
        $nombreRol = $fila['nombre_rol'];

        $datos = array();
        while ($fila = mysqli_fetch_array($consulta)) {
            $datos[] = array(
                'FECHA_REGISTRO'           => $fila["fecha_registro"],
                'ID_LIBRO_RSF'             => $fila["id_libro_rsf"],
                'RUT_SOLICITANTE'          => $fila["rut_solicitante"],
                'RUT_FUNCIONARIO'          => $fila["rut_funcionario"],
                'NACIONALIDAD'             => $fila["nombre_nacionalidad"],
                'NOMBRES'                  => $fila["nombres"],
                'APELLIDO_PATERNO'         => $fila["apellido_paterno"],
                'APELLIDO_MATERNO'         => $fila["apellido_materno"],
                'SEXO'                     => $fila["sexo"],
                'FECHA_NACIMIENTO'         => $fila["fecha_nacimiento"],
                'TIPO_TEL_PRIM'            => $fila["tipo_telefonoprimario"],
                'TELEFONO_PRIMARIO'        => $fila["telefono_primario"],
                'TIPO_TEL_SEC'             => $fila["tipo_telefonosecundario"],
                'TELEFONO_SECUNDARIO'      => $fila["telefono_secundario"],
                'TIPO_SOLICITUD'           => $fila["tipo_solicitud"],
                'TIPO_PERSONA'             => $fila["tipo_persona"],
                'ESAFECTADO'               => $fila["es_afectado"],
                'FECHA_EVENTO'             => $fila["fecha_evento"],
                'DETALLE'                  => $fila["detalle"],
                'OBSERVACIONES'            => $fila["observaciones"],
                'NOMBRE_AREA'              => $fila["nombre_area"],
                'NOMBRE_INSTITUCION'       => $fila["nombre_institucion"],
                'NOMBRE_PUEBLOS_INDIGENAS' => $fila["nombre_pueblos_indigenas"],
                'CORREO'                   => $fila["correo"],
                'ESTADO_RESPUESTA'         => $fila["estado_respuesta"],
                'NOMBRE_FUNCIONARIO'       => $nombreFuncionario,
                'NOMBRE_ROL'               => $nombreRol,
                'FECHA_RESPUESTA'          => $fechadehoy,
                'COMENTARIO_RESPUESTA'         => $fila["comentario_respuesta_funcionario"]
            );
        }
        // header('Content-type: application/json');
        echo json_encode(toutf8($datos));
        mysqli_close($mysqli);
    } else if ($seleccion == 2) {

        if (isset($_POST['id_libro_rsf']) && isset($_POST['comentario'])) {
            $id_libro_rsf = solonumeros($_POST['id_libro_rsf']);
            $comentario = soloCaractDeConversacion($_POST['comentario']);

            if (validavacioenarreglo(array($id_libro_rsf, $comentario))) { //Valida si estan vacios los datos
                echo 1;
                return;
            } else {
                $sql1 = "UPDATE libro_rsf SET estado_respuesta='1', fecha_respuesta_funcionario='$fechadehoy', 
                comentario_respuesta_funcionario='$comentario', rut_funcionario= '$rutsesion' WHERE id_libro_rsf='$id_libro_rsf'";
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


        if (isset($_POST['IDEN'])) {
            $id_libro_rsf = solonumeros($_POST['IDEN']);

            if (validavacioenarreglo(array($id_libro_rsf))) { //Valida si estan vacios los datos
                echo 1;
                return;
            } else {

                $sql = "SELECT id_imagen_libro_rsf,id_libro_rsf,nombre_imagen_libro_rsf FROM imagen_libro_rsf WHERE id_libro_rsf='$id_libro_rsf'";

                $consulta = mysqli_query($mysqli, $sql);
                $datos = array();
                while ($fila = mysqli_fetch_array($consulta)) {
                    $datos[] = array(
                        'ID_IMAGEN_LRSF'      => $fila["id_imagen_libro_rsf"],
                        'ID_LIBRO_RSF'             => $fila["id_libro_rsf"],
                        'NOMBRE_IMAGEN'          => $fila["nombre_imagen_libro_rsf"]
                    );
                }
                header('Content-type: application/json');
                echo json_encode(toutf8($datos));
                return;
            }
        } else {
            echo 3;
            return;
        }
    }
}
