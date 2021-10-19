<?php
include '../conexion/conexion.php';
include '../funcionesphp/limpiarCampo.php';
include '../funcionesphp/TOUTF8.php';
session_start();

if (isset($_POST['rut'])) {
    $rut = validarut($_POST['rut']);

    //valida si el campo esta vacio
    if (validavacioenarreglo(array($rut))) {
        echo 1;
        return;
    } else {

        $sql = "SELECT rut_paciente FROM paciente WHERE rut_paciente='$rut'";
        $res = mysqli_query($mysqli, $sql);
    
        if (!$res) { //Hubo un error al mostrar los pacientes con ese rut
            echo 2;
            return;
        } else {
            if (mysqli_num_rows($res) > 0) {
                $_SESSION["sesionFarmacia"] = array("rut" => $rut);
                echo 3;
                return;
            }else{ //no hay registros asociados a ese rut del paciente
                echo 4;
                return;
            }
        }

    }
}
