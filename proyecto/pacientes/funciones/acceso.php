<?php
include '../../conexion/conexion.php';
include '../../funcionesphp/limpiarCampo.php';
include '../../funcionesphp/TOUTF8.php';
session_start();
date_default_timezone_set("America/Santiago");
setlocale(LC_TIME, "spanish");
$fechadehoy = strftime("%F");
$rutsesion = $_SESSION['sesionCESFAM']['rut'];

if (isset($_POST['seleccionar'])) {
    $seleccion = $_POST['seleccionar'];
    if ($seleccion == 1) {
        $sql = "SELECT id_patologia,nombre_patologia,estado_patologia FROM patologia";
        $consulta = mysqli_query($mysqli, $sql);
        $datos = array();
        while ($fila = mysqli_fetch_array($consulta)) {
            $datos[] = array(
                'ID_PATOLOGIA' => $fila["id_patologia"],
                'NOMBRE_PATOLOGIA' => $fila["nombre_patologia"],
                'ESTADO_PATOLOGIA' => $fila["estado_patologia"]
            );
        }
        // header('Content-type: application/json');
        echo json_encode(toutf8($datos));
        mysqli_close($mysqli);
    } else if ($seleccion == 2) {
        if (isset($_POST["Npatologia"])) {
            $patologia = numerosyletras($_POST["Npatologia"]);
            if (validavacioenarreglo(array($patologia))) {
                echo 1;
                return;
            } else {


                $sql_Existe_patologia = "SELECT count(nombre_patologia) as contador FROM patologia WHERE nombre_patologia='$patologia'";
                $consulta_Existe_patologia = mysqli_query($mysqli, $sql_Existe_patologia);
                $resultado_Existe_patologia = mysqli_fetch_assoc($consulta_Existe_patologia);

                if ($resultado_Existe_patologia['contador'] >= 1) {
                    echo 2;  //Existe una categoria con el mismo nombre
                    return;
                } else {
                    $sql1 = "INSERT INTO patologia (id_patologia, nombre_patologia,estado_patologia) VALUES (NULL,'$patologia','1')";
                    $res1 = mysqli_query($mysqli, $sql1); //Hasta aqui inserto la patologia
                    if (!$res1) {
                        echo 3;
                        return;
                    } else {
                        echo 4;
                        return;
                    }
                }
            }
        } else {
            echo 5;
            return;
        }
    } else if ($seleccion == 3) {
        if (isset($_POST["IDpatologia"]) && isset($_POST["Enombrepatologia"])) {
            $IDpatologia = solonumeros($_POST["IDpatologia"]);
            $nombrepatologia = numerosyletras($_POST["Enombrepatologia"]);
            if (validavacioenarreglo(array($IDpatologia, $nombrepatologia))) {
                echo 1;
                return;
            } else {
                $sql1 = "UPDATE patologia SET nombre_patologia='$nombrepatologia' WHERE id_patologia='$IDpatologia'";
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
    } else if ($seleccion == 4) {
        if (isset($_POST["IDPatologia"])) {
            $ID = solonumeros($_POST["IDPatologia"]);
            if (validavacioenarreglo(array($ID))) {
                echo 1;
                return;
            } else {

                $sql1 = "SELECT pat.id_patologia FROM patologia pat, paciente pac WHERE pac.id_patologia=pat.id_patologia and pat.id_patologia='$ID'";
                $res1 = mysqli_query($mysqli, $sql1);
                $contador = mysqli_num_rows($res1);

                if ($contador >= 1) {
                    echo 2;
                    return;
                } else {
                    $sql2 = "DELETE FROM patologia WHERE id_patologia='$ID'";
                    $res2 = mysqli_query($mysqli, $sql2);
                    if (!$res2) {
                        echo 3;
                        return;
                    } else {
                        echo 4;
                        return;
                    }
                }
            }
        } else {
            echo 5;
            return;
        }
    } else if ($seleccion == 5) {
        $sql = "SELECT pac.id_patologia,
        pat.nombre_patologia,
        pac.rut_paciente,
        pac.nombres_paciente, 
        pac.apellidos_paciente, 
        pac.direccion_paciente, 
        pac.telefono_paciente, 
        pac.correo_paciente,
        pac.edad_paciente,
        pac.sexo_paciente
        FROM paciente pac, patologia pat 
        WHERE pac.id_patologia=pat.id_patologia";

        $consulta = mysqli_query($mysqli, $sql);
        $datos = array();
        while ($fila = mysqli_fetch_array($consulta)) {
            $datos[] = array(
                'ID_PATOLOGIA'          => $fila["id_patologia"],
                'NOMBRE_PATOLOGIA'      => $fila["nombre_patologia"],
                'RUT_PACIENTE'          => $fila["rut_paciente"],
                'NOMBRES_PACIENTE'      => $fila["nombres_paciente"],
                'APELLIDOS_PACIENTE'    => $fila["apellidos_paciente"],
                'DIRECCION_PACIENTE'    => $fila["direccion_paciente"],
                'TELEFONO_PACIENTE'     => $fila["telefono_paciente"],
                'CORREO_PACIENTE'       => $fila["correo_paciente"],
                'EDAD_PACIENTE'         => $fila["edad_paciente"],
                'SEXO_PACIENTE'         => $fila["sexo_paciente"]
            );
        }
        // header('Content-type: application/json');
        echo json_encode($datos);
        mysqli_close(toutf8($mysqli));
    } else if ($seleccion == 6) {
        $sql = "SELECT id_patologia,nombre_patologia FROM patologia WHERE estado_patologia='1'";
        $consulta = mysqli_query($mysqli, $sql);
        $ljson = '';
        if (!$consulta) {
            echo 1;
            return;
        } else {
            //Toma la comuna por defecto de la sesion
            $ljson .= '<option value="">Seleccione un tipo de patologia</option>';

            while ($fila1 = mysqli_fetch_array($consulta)) {
                $idpatologia = $fila1['id_patologia'];
                $nombrepatologia = $fila1['nombre_patologia'];
                $ljson .= '<option value="' . $idpatologia . '">' . toutf8($nombrepatologia) . '</option>';
            }
            echo $ljson;
            return;
        }
        mysqli_close($mysqli);
    } else if ($seleccion == 7) {
        if (
            isset($_POST["nombres"]) &&
            isset($_POST["apellidos"]) &&
            isset($_POST["direccion"]) &&
            isset($_POST["telefono"]) &&
            isset($_POST["correo"]) &&
            isset($_POST["rutpaciente"]) &&
            isset($_POST["tipodepatologia"]) &&
            isset($_POST["edad"]) &&
            isset($_POST["sexo"])
        ) {
            $nombres    = sololetras($_POST["nombres"]);
            $apellidos  = mysqli_real_escape_string($mysqli, $_POST["apellidos"]); //la comilla simple genera error si no uso el mysqli_real_escape_string
            $direccion  = solodireccion($_POST["direccion"]);
            $telefono   = solonumeros($_POST["telefono"]);
            $correo     = solocorreo($_POST["correo"]);
            $rutpaciente = validarut($_POST["rutpaciente"]);
            $tipodepatologia = solonumeros($_POST["tipodepatologia"]);
            $edad       = fechausuarios($_POST["edad"]);
            $sexo       = sololetras($_POST["sexo"]);

            if (validavacioenarreglo(array($nombres, $apellidos, $direccion, $telefono, $correo, $rutpaciente, $tipodepatologia, $edad, $sexo))) {
                echo 1;
                return;
            } else {
                $sqlcontar = "SELECT rut_paciente FROM paciente WHERE rut_paciente='$rutpaciente'";
                $querycontar = mysqli_query($mysqli, $sqlcontar);
                $contarfilas = mysqli_num_rows($querycontar);

                if ($contarfilas >= 1) {
                    echo 5;
                    return;
                } else {
                    $sql = "INSERT INTO paciente (rut_paciente, 
                    id_patologia,
                    rut_funcionario,
                    nombres_paciente,
                    apellidos_paciente,
                    sexo_paciente,
                    direccion_paciente,
                    telefono_paciente,
                    correo_paciente,
                    edad_paciente,
                    fecha_registro) VALUES ('$rutpaciente', '$tipodepatologia', '$rutsesion', '$nombres', '$apellidos','$sexo','$direccion','$telefono','$correo','$edad','$fechadehoy')";
                    $res = mysqli_query($mysqli, $sql); //Hasta aqui inserto la patologia
                    if (!$res) {
                        echo 2;
                        return;
                    } else {
                        echo 3;
                        return;
                    }
                }
            }
        } else {
            echo 4;
            return;
        }
    } else if ($seleccion == 8) {
        if (
            isset($_POST["nombres"]) &&
            isset($_POST["apellidos"]) &&
            isset($_POST["direccion"]) &&
            isset($_POST["telefono"]) &&
            isset($_POST["correo"]) &&
            isset($_POST["rutpacienteDatatable"]) &&
            isset($_POST["tipodepatologia"]) &&
            isset($_POST["edad"]) &&
            isset($_POST["sexo"])
        ) {
            // isset($_POST["rutpacienteeditar"]) &&
            $nombres = sololetras($_POST["nombres"]);
            $apellidos = mysqli_real_escape_string($mysqli, $_POST["apellidos"]);
            $direccion = solodireccion($_POST["direccion"]);
            $telefono  = solonumeros($_POST["telefono"]);
            $correo    = solocorreo($_POST["correo"]);
            $rutpacienteDatatable = validarut($_POST["rutpacienteDatatable"]);
            // $rutpacienteeditar = validarut($_POST["rutpacienteeditar"]);
            $tipodepatologia = solonumeros($_POST["tipodepatologia"]);
            $edad      = fechausuarios($_POST["edad"]);
            $sexo      = sololetras($_POST["sexo"]);

            if (validavacioenarreglo(array($nombres, $apellidos, $direccion, $telefono, $correo, $rutpacienteDatatable, $tipodepatologia, $edad, $sexo))) { //$rutpacienteeditar
                echo 1;
                return;
            } else {
                // $sqlcontar = "SELECT rut_paciente FROM paciente WHERE rut_paciente='$rutpacienteeditar'";
                // $querycontar = mysqli_query($mysqli, $sqlcontar);
                // $contarfilas = mysqli_num_rows($querycontar);

                // if ($contarfilas >= 1) {
                //     echo 2;
                //     return;
                // } else {

                // rut_paciente='$rutpacienteeditar', 
                $sql = "UPDATE paciente SET id_patologia='$tipodepatologia', 
                nombres_paciente='$nombres', 
                apellidos_paciente='$apellidos',
                direccion_paciente='$direccion',
                telefono_paciente='$telefono',
                correo_paciente='$correo',
                edad_paciente='$edad',
                sexo_paciente='$sexo'
                WHERE rut_paciente='$rutpacienteDatatable'";

                $res = mysqli_query($mysqli, $sql); //Hasta aqui edito al paciente
                if (!$res) {
                    echo 2;
                    return;
                } else {
                    echo 3;
                    return;
                }
                // }
            }
        } else {
            echo 4;
            return;
        }
    } else if ($seleccion == 9) {
        if (isset($_POST["rutpaciente"])) {
            $rut = validarut($_POST["rutpaciente"]);
            if (validavacioenarreglo(array($rut))) {
                echo 1;
                return;
            } else {
                $sql1 = "DELETE FROM agendar_retiro_medicamento WHERE rut_paciente='$rut'";
                $sql2 = "DELETE FROM solicitud_medicamento WHERE rut_paciente='$rut'";
                $sql3 = "DELETE FROM paciente WHERE rut_paciente='$rut'";
                mysqli_query($mysqli, $sql1);
                mysqli_query($mysqli, $sql2);
                $res = mysqli_query($mysqli, $sql3);
                if (!$res) {
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
    } else if ($seleccion == 10) {
        if (isset($_POST["IDpatologia"])) {
            $ID = solonumeros($_POST["IDpatologia"]);
            if (validavacioenarreglo(array($ID))) {
                echo 1;
                return;
            } else {
                $sql1 = mysqli_query($mysqli, "SELECT id_patologia FROM patologia WHERE id_patologia='$ID' and estado_patologia='1'");
                //or die(mysqli_error($mysqli)
                $contador = mysqli_num_rows($sql1);
                if ($contador >= 1) {
                    echo 2;
                    return;
                } else {
                    $sqlactivar = "UPDATE patologia set estado_patologia='1' WHERE id_patologia='$ID'";
                    $res = mysqli_query($mysqli, $sqlactivar);
                    if (!$res) {
                        echo 3; //error en la consulta
                        return;
                    } else {
                        echo 4; //Exito
                        return;
                    }
                }
            }
        } else {
            echo 5;
            return;
        }
    } else if ($seleccion == 11) {
        if (isset($_POST["IDpatologia"])) {
            $ID = solonumeros($_POST["IDpatologia"]);
            if (validavacioenarreglo(array($ID))) {
                echo 1;
                return;
            } else {
                $sql1 = mysqli_query($mysqli, "SELECT id_patologia FROM patologia WHERE id_patologia='$ID' and estado_patologia='0'");
                //or die(mysqli_error($mysqli)
                $contador = mysqli_num_rows($sql1);
                if ($contador >= 1) {
                    echo 2;
                    return;
                } else {
                    $sqlactivar = "UPDATE patologia set estado_patologia='0' WHERE id_patologia='$ID'";
                    $res = mysqli_query($mysqli, $sqlactivar);
                    if (!$res) {
                        echo 3; //error en la consulta
                        return;
                    } else {
                        echo 4; //Exito
                        return;
                    }
                }
            }
        } else {
            echo 5;
            return;
        }
    } else if ($seleccion == 12) {
        $sql = "SELECT id_patologia,nombre_patologia, estado_patologia FROM patologia";
        $consulta = mysqli_query($mysqli, $sql);
        $ljson = '';
        if (!$consulta) {
            echo 1;
            return;
        } else {
            //Toma la comuna por defecto de la sesion
            $disabled = '';
            $texto = '';
            $ljson .= '<option value="">Seleccione un tipo de patologia</option>';

            while ($fila1 = mysqli_fetch_array($consulta)) {

                if ($fila1['estado_patologia'] == 0) {
                    $disabled = 'disabled';
                    $texto = '[⛔Inactiva]';
                } else {
                    $disabled = '';
                    $texto = '';
                }
                $idpatologia = $fila1['id_patologia'];
                $nombrepatologia = $fila1['nombre_patologia'];
                $ljson .= '<option value="' . $idpatologia . '" ' . $disabled . '> ' . $texto . ' ' . toutf8($nombrepatologia) . ' </option>';
            }
            echo $ljson;
            return;
        }
        mysqli_close($mysqli);
    } else if ($seleccion == 13) {
        if (isset($_POST["rutpaciente"])) {
            $rutpaciente = validarut($_POST["rutpaciente"]);
            if (validavacioenarreglo(array($rutpaciente))) {
                echo 1;
                return;
            } else {
                $sql_Existe_Solicitu_Med = "SELECT id_solicitud_medicamento FROM solicitud_medicamento WHERE rut_paciente='$rutpaciente'";
                $query_Existe_Solicitu_Med = mysqli_query($mysqli, $sql_Existe_Solicitu_Med);
                $contarfilas_Existe_Solicitu_Med = mysqli_num_rows($query_Existe_Solicitu_Med);

                $sql_Existe_Agenda_RET_Med = "SELECT id_retiro_med FROM agendar_retiro_medicamento WHERE rut_paciente='$rutpaciente'";
                $query_Existe_Agenda_RET_Med = mysqli_query($mysqli, $sql_Existe_Agenda_RET_Med);
                $contarfilas_Existe_Agenda_RET_Med = mysqli_num_rows($query_Existe_Agenda_RET_Med);

                if ($contarfilas_Existe_Solicitu_Med >= 1 && $contarfilas_Existe_Agenda_RET_Med >= 1) {
                    echo 2;
                    return;
                } else if ($contarfilas_Existe_Solicitu_Med >= 1 && $contarfilas_Existe_Agenda_RET_Med == 0) {
                    echo 3;
                    return;
                } else if ($contarfilas_Existe_Solicitu_Med == 0 && $contarfilas_Existe_Agenda_RET_Med >= 1) {
                    echo 4;
                    return;
                } else {
                    echo 5;
                    return;
                }
            }
        } else {
        }
    }
}
