<?php
// header('Content-Type: application/json');
include '../../conexion/conexion.php';
include '../../funcionesphp/limpiarCampo.php';
include '../../funcionesphp/TOUTF8.php';
session_start();
$rut = $_SESSION['sesionCESFAM']['rut'];

if (isset($_POST['tipo'])) {

    if ($_POST['tipo'] == 1) {
        $titulo = soloCaractDeConversacion($_POST['titulo']);
        $descripcion = soloCaractDeConversacion($_POST['descripcion']);
        $inicio = fechayhoraEventos($_POST['inicio']);
        $color = colorEventos($_POST['color']);
        $fin = fechayhoraEventos($_POST['fin']);

        $contador = count($_POST['grupo_usuarios']);
        $i = 0;

        if (validavacioenarreglo(array($titulo, $descripcion, $inicio, $color, $fin))) {
            echo 1; //los campos están vacio
            return;
        } else if (substr_count($inicio, ' ') < 1) { //debe contener si o si un espacio para separar la fecha de la hora Ej: 2020-11-30 12:00:00
            echo 2; //la fecha de inicio u hora de inicio estan vacias
            return;
        } else if (substr_count($fin, ' ') < 1) { //debe contener si o si un espacio para separar la fecha de la hora Ej: 2020-11-30 12:00:00
            echo 3; //la fecha de fin u hora de fin estan vacias
            return;
        } else {
            //Verifico si contiene el formato 12:00:00 Necesario para que funcione el calendario
            $porcion1 = explode(" ", $inicio);
            $porcion2 = explode(" ", $fin);

            if (substr_count($porcion1[1], ':') == 1) { //en caso de que en hora inicio cuente un ':' (ej: 12:00), le agregue ':00', el resultado seria 12:00:00  
                $inicio = $porcion1[0] . ' ' . $porcion1[1] . ':00';
            }
            if (substr_count($porcion2[1], ':') == 1) { //en caso de que en hora fin cuente un ':' (ej: 12:00), le agregue ':00', el resultado seria 12:00:00 
                $fin = $porcion1[0] . ' ' . $porcion2[1] . ':00';
            }

            $sql = "INSERT INTO eventos (id,rut_creador,title,descripcion,color, start, end) VALUES (NULL,'$rut','$titulo','$descripcion','$color','$inicio','$fin')";
            $resp = mysqli_query($mysqli, $sql);

            if (!$resp) {
                echo 4; //error
                return;
                // mysqli_error($mysqli);
            } else {

                $sql1 = "SELECT MAX(id) AS ultimo_insertado FROM eventos"; //Muestro el último articulo insertado en la consulta anterior
                $resultado_1 = mysqli_query($mysqli, $sql1);

                if (!$resultado_1) {
                    echo 4; //Error al mostrar el último id
                    return;
                } else {

                    $fila = mysqli_fetch_assoc($resultado_1);
                    $ultimo_insertado = $fila["ultimo_insertado"];

                    while ($i < $contador) {
                        $rutreceptor = $_POST['grupo_usuarios'][$i];
                        // echo " Nombre: " . $_POST['grupo_usuarios'][$i]." TITULO: ".$titulo;
                        $sql2 = "INSERT INTO destinatarios_eventos (id_de,rut_receptor,id_eventos) VALUES (NULL,'$rutreceptor','$ultimo_insertado')";
                        $resultado_2 = mysqli_query($mysqli, $sql2);

                        if (!$resultado_2) {
                            echo 4; //Error al insertar
                            return;
                        }

                        $i++;
                    }
                    echo 5;
                    return;
                }
            }
        }
        mysqli_close($mysqli);
    } else if ($_POST['tipo'] == 2) {
        $id = solonumeros($_POST['ID']);
        $titulo = soloCaractDeConversacion($_POST['titulo']);
        $descripcion = soloCaractDeConversacion($_POST['descripcion']);
        $inicio = fechayhoraEventos($_POST['inicio']);
        $color = colorEventos($_POST['color']);
        $fin = fechayhoraEventos($_POST['fin']);

        if (validavacioenarreglo(array($id, $titulo, $descripcion, $inicio, $color, $fin))) {
            echo 1; //los campos están vacio
            return;
        } else if (substr_count($inicio, ' ') < 1) { //debe contener si o si un espacio para separar la fecha de la hora Ej: 2020-11-30 12:00:00
            echo 2; //la fecha de inicio u hora de inicio estan vacias
            return;
        } else if (substr_count($fin, ' ') < 1) { //debe contener si o si un espacio para separar la fecha de la hora Ej: 2020-11-30 12:00:00
            echo 3; //la fecha de fin u hora de fin estan vacias
            return;
        } else {
            //Verifico si contiene el formato 12:00:00 Necesario para que funcione el calendario
            $porcion1 = explode(" ", $inicio);
            $porcion2 = explode(" ", $fin);

            if (substr_count($porcion1[1], ':') == 1) { //en caso de que en hora inicio cuente un ':' (ej: 12:00), le agregue ':00', el resultado seria 12:00:00  
                $inicio = $porcion1[0] . ' ' . $porcion1[1] . ':00';
            }
            if (substr_count($porcion2[1], ':') == 1) { //en caso de que en hora fin cuente un ':' (ej: 12:00), le agregue ':00', el resultado seria 12:00:00 
                $fin = $porcion1[0] . ' ' . $porcion2[1] . ':00';
            }

            // echo '<1>' . $id . '<2>' . $titulo . '<3>' . $descripcion . '<4>' . $inicio . '<5>' . $color . '<6>' . $fin;
            // return;
            $sql2 = "UPDATE eventos set `title`='$titulo', `descripcion`='$descripcion', `color`='$color',`start`='$inicio', `end`='$fin' WHERE id='$id'";
            $resp2 = mysqli_query($mysqli, $sql2);

            if (!$resp2) {
                echo 4; //error
                return;
                //  die("error:" . mysqli_error($mysqli)); mysqli_error($mysqli);
            } else {
                echo 5;
                return;
            }
        }
    } else if ($_POST['tipo'] == 3) {
        $id = solonumeros($_POST['ID']);

        if (validavacioenarreglo(array($id))) {
            echo 1; //los campos están vacio
            return;
        } else {

            $sql1 = "DELETE FROM destinatarios_eventos WHERE id_eventos='$id'";
            $resp1 = mysqli_query($mysqli, $sql1);

            $sql2 = "DELETE FROM eventos WHERE id='$id'";
            $resp2 = mysqli_query($mysqli, $sql2);
            if (!$resp2) {
                echo 2; //error
                // mysqli_error($mysqli);
                return;
            } else {
                echo 3;
                return;
            }
        }
    } else if ($_POST['tipo'] == 4) {

        $id = solonumeros($_POST['id_del_evento']);

        if (validavacioenarreglo(array($id))) {
            echo 1; //los campos están vacio
            return;
        } else {
            $sql1 = "SELECT de.rut_receptor,us.nombre_usuario FROM destinatarios_eventos de, usuario us WHERE de.rut_receptor=us.rut and de.id_eventos='$id'";
            $resp1 = mysqli_query($mysqli, $sql1);
            $datos = "";
            while ($fila = mysqli_fetch_array($resp1)) {
                $datos .= $fila["rut_receptor"] . " " . $fila["nombre_usuario"] . "\n";
            }
            echo toutf8($datos);
        }
    } else { //no se ha recibido el parámetro $_POST['tipo']
        echo 400;
    }
} else {
    echo 401;
    return;
}
mysqli_close($mysqli);
