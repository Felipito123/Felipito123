<?php
include '../../../conexion/conexion.php';
include '../../../funcionesphp/limpiarCampo.php';
include '../../../funcionesphp/TOUTF8.php';
date_default_timezone_set("America/Santiago");
setlocale(LC_TIME, "spanish");
session_start();
$seleccion = $_POST['seleccionar'];
if (isset($seleccion)) {
    if ($seleccion == 1) {
        if (isset($_POST['id']) && isset($_POST['cantidad'])) {
            $id = $_POST['id'];
            $cantidad = $_POST['cantidad'];

            if (isset($_SESSION["carrito"])) { //si existe la sesion carrito puede agregar un id

                $itemarray = array_column($_SESSION["carrito"], "id");

                //si no existe ese elemento en el array muestra alerta
                if (!in_array($id, $itemarray)) {
                    echo 1;
                    return;
                } else { //ya existe ese elemento en el array entonces incrementa el valor

                    $stockmaximo = $_SESSION["carrito"][$id]["stocktotal"];
                    $obtienevalor = $_SESSION["carrito"][$id]["cantidad"];
                    $suma = $obtienevalor + $cantidad;
                    if ($suma > $stockmaximo) {
                        echo 5;
                        return;
                    } else {
                        // $obtienevalor = $_SESSION["carrito"][$id]["cantidad"];
                        $_SESSION["carrito"][$id]["cantidad"] = $obtienevalor + $cantidad;
                        echo 2;
                        return;
                    }
                }
            } else {
                echo 3; //no existe sesion, mostrar alerta
                return;
            }
        } else {
            echo 4; //no existe parametro id ni cantidad
            return;
        }
    } else if ($seleccion == 2) {
        if (isset($_POST['id']) && isset($_POST['cantidad'])) {
            $id = $_POST['id'];
            $cantidad = $_POST['cantidad'];

            if (isset($_SESSION["carrito"])) { //si existe la sesion carrito puede agregar un id

                $itemarray = array_column($_SESSION["carrito"], "id");

                //si no existe ese elemento en el array muestra alerta
                if (!in_array($id, $itemarray)) {
                    echo 1;
                    return;
                } else { //ya existe ese elemento en el array entonces incrementa el valor
                    $obtienevalor = $_SESSION["carrito"][$id]["cantidad"];
                    $_SESSION["carrito"][$id]["cantidad"] = $obtienevalor - $cantidad;
                    echo 2;
                    return;
                }
            } else {
                echo 3; //no existe sesion, mostrar alerta
                return;
            }
        } else {
            echo 4; //no existe parametro id ni cantidad
            return;
        }
    } else if ($seleccion == 3) {
        if (isset($_POST['id'])) {
            $id = $_POST['id'];

            if (isset($_SESSION["carrito"])) { //si existe la sesion carrito puede agregar un id

                $itemarray = array_column($_SESSION["carrito"], "id");

                //si no existe ese elemento en el array muestra alerta
                if (!in_array($id, $itemarray)) {
                    echo 1;
                    return;
                } else { //ya existe ese elemento en el array entonces elimina
                    foreach ($_SESSION['carrito'] as $key => $value) {
                        if ($value['id'] == $id) { // en vez de 1 va a venir la variable id desde post 
                            unset($_SESSION['carrito'][$key]);
                            break;
                        }
                    }
                    echo 2;
                    return;
                }
            } else {
                echo 3; //no existe sesion, mostrar alerta
                return;
            }
        } else {
            echo 4; //no existe parametro id 
            return;
        }
    } else if ($seleccion == 4) {
        if (isset($_POST['id']) && isset($_POST['cantidad'])) {
            $id = $_POST['id'];
            $cantidad = $_POST['cantidad'];

            if (isset($_SESSION["carrito"])) { //si existe la sesion carrito puede agregar un id

                $itemarray = array_column($_SESSION["carrito"], "id");

                //si no existe ese elemento en el array muestra alerta
                if (!in_array($id, $itemarray)) {
                    echo 1;
                    return;
                } else { //ya existe ese elemento en el array entonces incrementa el valor

                    //Como seteo el valor no necesito sumarle a la cantidad que ya tiene, sino que setear el valor por completo
                    $stockmaximo = $_SESSION["carrito"][$id]["stocktotal"];
                    $obtienevalor = $_SESSION["carrito"][$id]["cantidad"];

                    if ($cantidad > $stockmaximo) {
                        echo 2;
                        return;
                    } else {
                        // $obtienevalor = $_SESSION["carrito"][$id]["cantidad"];
                        $_SESSION["carrito"][$id]["cantidad"] = $cantidad;
                        echo 3;
                        return;
                    }
                }
            } else {
                echo 4; //no existe sesion, mostrar alerta
                return;
            }
        } else {
            echo 5; //no existe parametro id ni cantidad
            return;
        }
    } else if ($seleccion == 5) {

        if (!isset($_SESSION['sesionFarmacia']['rut'])) { //SI NO ESTA INICIADA LA SESION LO REDIRIJO AL LOGIN DE MEDICAMENTO
            echo 1;
            return;
        } else {
            $rutsesionfarmacia = $_SESSION['sesionFarmacia']['rut'];
            $fecha = strftime("%Y-%m-%d %X");

            $sql = "INSERT INTO solicitud_medicamento (id_solicitud_medicamento,rut_paciente,fecha_solicitud,seguimiento) VALUES (NULL,'$rutsesionfarmacia','$fecha', 0)";
            $res1 = mysqli_query($mysqli, $sql);

            if (!$res1) {
                echo 2;
                return;
            } else {
                // echo UltimoIDSolicitudInsertado($mysqli);
                // return;

                /*  estado_historial_solicitud son:
                1 = en espera
                2 = aprobado
                3 = rechazado   */

                if (UltimoIDSolicitudInsertado($mysqli) == 0) {
                    echo 3;
                    return;
                } else {
                    $ultimoIDSolicitud = UltimoIDSolicitudInsertado($mysqli);

                    foreach ($_SESSION['carrito'] as $key => $value) {
                        $idmedicamento = $value['id'];
                        $stocksolicitado = $value['cantidad'];

                        $sql2 = "INSERT INTO historial_solicitud (id_historial_solicitud,
                        id_medicamento,
                        id_solicitud_medicamento,
                        stock_historial_solicitud,
                        estado_historial_solicitud,
                        comentario_historial_solicitud) 
                        VALUES (NULL,'$idmedicamento','$ultimoIDSolicitud','$stocksolicitado',1,'')";

                        $res2 = mysqli_query($mysqli, $sql2);

                        if (!$res2) {
                            echo mysqli_error($mysqli);
                            return;
                        }
                    }
                    echo 5;
                    return;
                }
            }
        }
    } else if ($seleccion == 6) { //cerrar sesion del carrito
        unset($_SESSION["carrito"]);
        echo 1;
        return;
    }
} else {
    echo 555;
    return;
}


function UltimoIDSolicitudInsertado($conexion)
{
    $sql = "SELECT MAX(id_solicitud_medicamento) AS identificador FROM solicitud_medicamento";
    $datos = mysqli_query($conexion, $sql);
    $resultado = 0;
    if ($datos && mysqli_num_rows($datos) >= 1) {
        $fila = mysqli_fetch_assoc($datos);
        $resultado = $fila['identificador'];
    }
    return $resultado;
}
