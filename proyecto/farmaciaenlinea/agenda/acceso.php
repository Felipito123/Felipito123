<?php
include '../../conexion/conexion.php';
include '../../funcionesphp/limpiarCampo.php';
include '../../funcionesphp/TOUTF8.php';
date_default_timezone_set("America/Santiago");
setlocale(LC_TIME, "spanish");
$fechadehoy = strftime("%F");
// $mes = strftime("%m");
// $ano = strftime("%Y");

if (isset($_POST['seleccionar'])) {
    $seleccion = $_POST['seleccionar'];
    if ($seleccion == 1) {

        if (isset($_POST["rutagenda"]) && isset($_POST["fechadeagenda"]) && isset($_POST["fechaDosDiasDespues"])) {

            $rutagenda = validarut($_POST["rutagenda"]);
            $fechadeagenda = fechaconslash($_POST["fechadeagenda"]);
            $fechaDosDiasDespues = fechaconslash($_POST["fechaDosDiasDespues"]);

            $porcion1 = explode("/", $fechadeagenda);
            $porcion2 = explode("/", $fechaDosDiasDespues);

            $mes = $porcion1[1];
            $ano = $porcion1[2];

            $Formatfechadeagenda = $porcion1[2] . '-' . $porcion1[1] . '-' . $porcion1[0];
            $FormatfechaDosDiasDespues = $porcion2[2] . '-' . $porcion2[1] . '-' . $porcion2[0];

            $f1 = strtotime($Formatfechadeagenda);
            $f2 = strtotime($FormatfechaDosDiasDespues);

            // echo $f1 . ' - ' . $f2 . ' - ' . $f3;
            // echo $fechadeagenda . ' - ' . $fechaDosDiasDespues . ' - ' . $fechadehoy;

            if (validavacioenarreglo(array($rutagenda, $fechadeagenda))) {
                echo 1;
                return;
            } else if ($f1 < $f2 || $Formatfechadeagenda == $fechadehoy) {
                echo 2;
                return;
                // echo 'Fecha inválida debe ser mínimo: ' . $fechaDosDiasDespues; return;
            } else {

                $sql1 = "SELECT rut_paciente FROM paciente WHERE rut_paciente='$rutagenda'";
                $res1 = mysqli_query($mysqli, $sql1);

                if (!$res1) { //hubo error en la consulta sql2
                    echo 3;
                    return;
                } else {
                    $contarfila = mysqli_num_rows($res1);

                    if ($contarfila > 0) { // si encontro coincidencias, es que hay un paciente con ese R.U.T

                        //     month(fecha_retiro)='$mes' 
                        // and year(fecha_retiro)='$ano'

                        $sql2 = "SELECT id_retiro_med FROM agendar_retiro_medicamento WHERE rut_paciente='$rutagenda' and month(fecha_retiro)='$mes' and year(fecha_retiro)='$ano'";
                        $res2 = mysqli_query($mysqli, $sql2);

                        // $sql3 = "SELECT id_retiro_med FROM agendar_retiro_medicamento WHERE rut_paciente='$rutagenda' and fecha_retiro !='$Formatfechadeagenda'";
                        // $res3 = mysqli_query($mysqli, $sql3);
                        if (!$res2) {
                            echo 4;
                            return;
                        } else {
                            $contarfila2 = mysqli_num_rows($res2);
                            // $contarfila3 = mysqli_num_rows($res3);

                            if ($contarfila2 > 0) { //Quiere decir que ya ha agendado una vez en el mes y muestro alerta de mensaje, informo que en su cuenta puede modificar el dia y mes de la fecha de agendamiento
                                echo 5;
                                return;
                            } else { //no tiene horas agendas e inserto

                                $sql3 = "INSERT INTO agendar_retiro_medicamento (id_retiro_med,id_estado_resp_agenda,rut_paciente,fecha_retiro,fecha_respuesta_funcionario) VALUES (NULL,'2','$rutagenda','$Formatfechadeagenda',NULL)";
                                $res3 = mysqli_query($mysqli, $sql3);
                                if (!$res3) {
                                    echo 6; //Error en la consulta
                                    return;
                                } else {
                                    echo 7;  //Consulta exitosa
                                    return;
                                }
                            }
                        }
                    } else { // no encontró un rut igual en la BD
                        echo 8;
                        return;
                    }
                }
            }
        } else {
            echo 9;
            return;
        }
    } else if ($seleccion == 2) {

        if (isset($_POST["rutdelpaciente"])) {
            // && isset($_POST["fechadeagenda"])
            $rutagenda = validarut($_POST["rutdelpaciente"]);
            // $fechadeagenda = fechaconslash($_POST["fechadeagenda"]);
            // $porcion1 = explode("/", $fechadeagenda);
            // $Formatfechadeagenda = $porcion1[2] . '-' . $porcion1[1] . '-' . $porcion1[0];

            if (validavacioenarreglo(array($rutagenda))) { //, $Formatfechadeagenda
                echo 1;
                return;
            } else {
                $sql = "SELECT correo_paciente FROM paciente WHERE rut_paciente='$rutagenda'";
                $consulta = mysqli_query($mysqli, $sql);
                $fila = mysqli_fetch_array($consulta);
                echo $fila["correo_paciente"];
                // (toutf8($fila["correo_paciente"]));
                return;
            }
        } else {
            echo 3;
            return;
        }
    } else {
        echo 10;
        return;
    }
} else {
    echo 11;
    return;
}

mysqli_close($mysqli);
