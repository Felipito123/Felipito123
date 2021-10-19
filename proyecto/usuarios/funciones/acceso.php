<?php
include '../../conexion/conexion.php';
include '../../funcionesphp/limpiarCampo.php';
include '../../funcionesphp/TOUTF8.php';
session_start();
$rutsesion = $_SESSION['sesionCESFAM']['rut'];

date_default_timezone_set("America/Santiago");
setlocale(LC_TIME, "spanish");
$añoactual = strftime("%Y");

$seleccion = $_POST['seleccionar'];

if (isset($seleccion)) {

    if ($seleccion == 1) {

        $sql = "SELECT us.nombre_usuario,us.telefono_usuario,us.direccion_usuario,us.fechaentrada_usuario,
        us.correo_usuario,us.id_rol,us.rut,us.estado_usuario, r.nombre_rol, us.id_cargo, us.id_sector,us.id_unidad  
        FROM usuario us, rol r WHERE us.id_rol=r.id_rol and us.estado_usuario=1";
        $consulta = mysqli_query($mysqli, $sql);
        $datos = array();
        while ($fila = mysqli_fetch_array($consulta)) {
            $datos[] = array(
                'RUT' => $fila["rut"],
                'NOMBRE_USUARIO' => $fila["nombre_usuario"],
                'TELEFONO' => $fila["telefono_usuario"],
                'DIRECCION' => $fila["direccion_usuario"],
                'ENTRADA' => $fila["fechaentrada_usuario"],
                'CORREO' => $fila["correo_usuario"],
                'ID_ROL' => $fila["id_rol"],
                'NOMBRE_ROL' => $fila["nombre_rol"],
                'ESTADO' => $fila["estado_usuario"],
                'ID_CARGO' => $fila["id_cargo"],
                'ID_SECTOR' => $fila["id_sector"],
                'ID_UNIDAD' => $fila["id_unidad"]
            );
        }
        // print json_encode($datos);
        header('Content-type: application/json');
        echo json_encode(toutf8($datos));
        mysqli_close($mysqli);
    } else if ($seleccion == 2) {
        $sql = "SELECT us.nombre_usuario,us.fechaentrada_usuario,us.correo_usuario,us.id_rol,us.rut, r.nombre_rol  FROM usuario us, rol r WHERE us.id_rol=r.id_rol and us.estado_usuario=0";
        $consulta = mysqli_query($mysqli, $sql);
        $datos = array();
        while ($fila = mysqli_fetch_array($consulta)) {
            $datos[] = array(
                'NOMBRE' => $fila["nombre_usuario"],
                'ENTRADA' => $fila["fechaentrada_usuario"],
                'CORREO' => $fila["correo_usuario"],
                'IDROL' => $fila["id_rol"],
                'RUTUSIN' => $fila["rut"],
                'NOMBREROL' => $fila["nombre_rol"]
            );
        }
        // print json_encode($datos);
        header('Content-type: application/json');
        echo json_encode(toutf8($datos));
        mysqli_close($mysqli);
    } else if ($seleccion == 3) { //editar en el modal

        if (
            isset($_POST["s_rut"]) && isset($_POST["s_direccion"]) && isset($_POST["s_telefono"]) && isset($_POST["s_nombre"])
            && isset($_POST["s_correo"]) && isset($_POST["s_rol"]) && isset($_POST["s_cargo"]) && isset($_POST["s_unidad"]) && isset($_POST["s_sector"])
            && isset($_POST["s_fecha"])
        ) {

            $rut = validarut($_POST["s_rut"]);
            $nombre = sololetras($_POST["s_nombre"]);
            $direccion = solodireccion($_POST["s_direccion"]);
            $telefono = solonumeros($_POST["s_telefono"]);
            $cargo = solonumeros($_POST["s_cargo"]);
            $sector = $_POST["s_sector"];
            $unidad = $_POST["s_unidad"];
            $correo = solocorreo($_POST["s_correo"]);
            $rol = solonumeros($_POST["s_rol"]);
            $fecha = fechausuarios($_POST["s_fecha"]);

            $res1 = mysqli_query($mysqli, "SELECT nombre_usuario FROM usuario WHERE id_rol='$rol' and id_sector=$sector");
            $row1 = mysqli_num_rows($res1);

            $res2 = mysqli_query($mysqli, "SELECT nombre_usuario FROM usuario WHERE id_rol='$rol'");
            $row2 = mysqli_num_rows($res2);

            $res3 = mysqli_query($mysqli, "SELECT nombre_usuario FROM usuario WHERE id_rol='$rol' and id_sector=$sector and rut='$rut'");
            $row3 = mysqli_num_rows($res3);

            // $res4 = mysqli_query($mysqli, "SELECT nombre_usuario FROM usuario WHERE id_rol='$rol' and id_unidad=$unidad");
            // $row4 = mysqli_num_rows($res4);

            // $res5 = mysqli_query($mysqli, "SELECT nombre_usuario FROM usuario WHERE id_rol='$rol' and id_unidad=$unidad and rut='$rut'");
            // $row5 = mysqli_num_rows($res5);

            if ($rol == 7 && $row1 >= 1 && $row3 == 0) { //ya existe un Jefe de sector con ese sector respectivo. Pasa por el row3 si es que el Jefe de un sector no es el actual de la sesion
                echo 1;
                return;
            }

            if ($rol == 8 && $row2 >= 1) { //ya existe un Jefe de Unidad
                echo 2;
                return;
            }

            if ($rol == 9 && $row2 >= 1) { //ya existe un Jefe de DAS
                echo 3;
                return;
            }

            if ($rol == 10 && $row2 >= 1) { //ya existe el encargado(a) de Dirección
                echo 4;
                return;
            }

            if ($rol == 11 && $row2 >= 1) { //ya existe un Director, y sólo hay un Director en el Cesfam
                echo 5;
                return;
            }

            if ($rol == 12 && $row2 >= 1) { //ya existe un encargado(a) de personal
                echo 6;
                return;
            }

            if ($rol == 13 && $row2 >= 1) { //ya existe un Jefe Sistema de Salud
                echo 7;
                return;
            }

            // if ($rol == 8 && $row4 >= 1 && $row5==0) { //ya existe un Jefe de sector con ese sector respectivo. Pasa por el row3 si es que el Jefe de un sector no es el actual
            //     echo 12;
            //     return;
            // }

            if (validavacioenarreglo(array($rut, $nombre, $direccion, $telefono, $correo, $rol, $fecha, $cargo, $sector, $unidad))) {
                echo 8;
                return;
            } else {

                $sql = "UPDATE usuario SET nombre_usuario='$nombre',
                    id_cargo='$cargo',
                    id_sector=$sector,
                    id_unidad=$unidad,
                    telefono_usuario='$telefono',
                    direccion_usuario='$direccion',
                    correo_usuario='$correo',
                    id_rol='$rol',
                    fechaentrada_usuario='$fecha' 
                    WHERE rut='$rut'";
                $respuesta = mysqli_query($mysqli, $sql);

                if (!$respuesta) {
                    echo 9; //error en la consulta
                    return;
                } else {
                    InsertarAlHistorialCargo($rut, $rol, $mysqli);

                    echo 10; //editado correctamente
                    return;
                }
            }
        } else {
            echo 11; //no se ha recibido parámetro
            return;
        }
    } else if ($seleccion == 4) {
        if (
            isset($_POST["sa_rut"]) && isset($_POST["sa_cargo"]) && isset($_POST["sa_sector"]) && isset($_POST["sa_unidad"])  && isset($_POST["sa_rol"])
            && isset($_POST["sa_direccion"]) && isset($_POST["sa_telefono"]) && isset($_POST["sa_nombre"]) && isset($_POST["sa_correo"])
            && isset($_POST["sa_contrasena"]) && isset($_POST["sa_fechainicio"]) && isset($_POST["sa_comuna"])
        ) {

            $rut = validarut($_POST["sa_rut"]);
            $cargo = solonumeros($_POST["sa_cargo"]);
            $sector = $_POST["sa_sector"];
            $unidad = $_POST["sa_unidad"];
            $comuna = solonumeros($_POST["sa_comuna"]);
            $nombre = sololetras($_POST["sa_nombre"]);
            $direccion = solodireccion($_POST["sa_direccion"]);
            $telefono = solonumeros($_POST["sa_telefono"]);
            $correo = solocorreo($_POST["sa_correo"]);
            $clave = limpiar_campo($_POST["sa_contrasena"]);
            $fechaentrada = fechausuarios($_POST["sa_fechainicio"]); //VALIDAR QUE LA FECHA NO SEA MAYOR A LA ACTUAL, PUEDE SER MENOR O IGUAL
            $rol = solonumeros($_POST["sa_rol"]);
            $imagenpodefecto = "no-imagen.jpg";

            // if($sector=='null' || $sector==null || empty($sector)) {
            //     $sector=null;
            // }

            // if($rol==7 && $sector==4){

            // }

            $res1 = mysqli_query($mysqli, "SELECT nombre_usuario FROM usuario WHERE id_rol='$rol' and id_sector=$sector");
            $row1 = mysqli_num_rows($res1);

            $res2 = mysqli_query($mysqli, "SELECT nombre_usuario FROM usuario WHERE id_rol='$rol'");
            $row2 = mysqli_num_rows($res2);

            $res3 = mysqli_query($mysqli, "SELECT nombre_usuario FROM usuario WHERE id_rol='$rol' and id_unidad=$unidad");
            $row3 = mysqli_num_rows($res3);

            if ($rol == 7 && $row1 >= 1) { //ya existe un Jefe de sector con ese sector respectivo
                echo 6;
                return;
            }

            if ($rol == 8 && $row2 >= 1) { //ya existe un Jefe de Unidad
                echo 7;
                return;
            }

            if ($rol == 9 && $row2 >= 1) { //ya existe un Jefe de DAS
                echo 8;
                return;
            }

            if ($rol == 10 && $row2 >= 1) { //ya existe el encargado(a) de Dirección
                echo 9;
                return;
            }

            if ($rol == 11 && $row2 >= 1) { //ya existe un Director, y sólo hay un Director en el Cesfam
                echo 10;
                return;
            }

            if ($rol == 12 && $row2 >= 1) { //ya existe un encargado(a) de personal
                echo 11;
                return;
            }

            if ($rol == 13 && $row2 >= 1) { //ya existe un Jefe Sistema de Salud
                echo 12;
                return;
            }

            if ($rol == 8 && $row3 >= 1) { //ya existe un Jefe de unidad con esa unidad respectiva
                echo 13;
                return;
            }

            // echo $sector;
            // return;

            // echo $rut.' '.$cargo.' '.$sector.' '.$comuna.' '.$nombre.' '.$direccion.' '.$telefono.' '.$correo.' '.$clave.' '.$fechaentrada.' '.$rol.' '.$imagenpodefecto;
            // return;

            $sql1 = "SELECT nombre_usuario FROM usuario WHERE rut='$rut' or correo_usuario='$correo'";
            $respuesta = mysqli_query($mysqli, $sql1);
            $fila = mysqli_num_rows($respuesta);

            if ($fila > 0) {
                echo 1; //El usuario ya existe
                return;
            } else {
                $consulta = "INSERT INTO usuario (nombre_usuario,
                    id_sector,
                    id_unidad,
                    id_cargo,
                    direccion_usuario,
                    telefono_usuario,
                    correo_usuario,
                    contrasena_usuario,
                    id_rol,
                    rut,
                    fechaentrada_usuario,
                    imagen_usuario,
                    id_comuna) 
                    VALUES ('$nombre',
                    $sector,
                    $unidad,
                    '$cargo',
                    '$direccion',
                    '$telefono',
                    '$correo',
                    SHA('$clave'),
                    '$rol',
                    '$rut',
                    '$fechaentrada',
                    '$imagenpodefecto',
                    '$comuna')"; //como $sector puede ser NULL, lo dejo sin las comillas '$sector', porque sino el NULL lo toma como string y hay error en sql
                if (mysqli_query($mysqli, $consulta)) {

                    $sql2 = "SELECT rut FROM usuario WHERE rut='$rut'"; //Muestro el último articulo insertado en la consulta anterior
                    $consulta_2 = mysqli_query($mysqli, $sql2);
                    $asocio = mysqli_fetch_assoc($consulta_2);
                    $rutinsertado = $asocio['rut'];

                    if (!$consulta_2) {
                        echo 2; //Error al mostrar el último id
                        return;
                    } else {
                        //Se crea la carpeta
                        if (!is_dir('../../perfil/fotodeperfiles/' . $rutinsertado . '/')) {
                            mkdir('../../perfil/fotodeperfiles/' . $rutinsertado . '/', 0777, true);
                        }
                        copy('../../../imgpordefecto/no-imagen.jpg', '../../perfil/fotodeperfiles/' . $rutinsertado . '/no-imagen.jpg');
                    }

                    InsertarAlHistorialCargo($rut, $rol, $mysqli);

                    echo 3; //Usuario agregado
                    return;
                } else {

                    die("error: " . $mysqli);
                    echo 4; //Error en la query insertar
                    return;
                }
            }
        } else {
            echo 5; //No se ha recibido parametros
            return;
        }
    } else if ($seleccion == 5) {

        if (isset($rutsesion) && isset($_POST['rutusuarioaeliminar'])) {
            $rutusuarioaeliminar = $_POST['rutusuarioaeliminar'];
            if (isset($_POST['clave'])) {
                $claverecibida = $_POST['clave'];
                $sql = "SELECT contrasena_usuario FROM usuario WHERE rut= '$rutsesion'";
                $respuesta1 = mysqli_query($mysqli, $sql);

                $clave = '';

                if (!$respuesta1) { //hubo error en la consulta (no encontro el rut de la sesion en la base de datos)
                    echo 0;
                    return;
                } else {
                    while ($fila1 = mysqli_fetch_array($respuesta1)) {
                        $clave = $fila1["contrasena_usuario"];
                    }
                    if (sha1($claverecibida) == $clave) { //sha1($claverecibida) == $clave
                        $sql2 = "UPDATE usuario SET estado_usuario = 0 WHERE rut='$rutusuarioaeliminar'";
                        $respuesta2 = mysqli_query($mysqli, $sql2);

                        if (!$respuesta2) {
                            echo  0;
                            return;
                        } else {  //se oculto correctamente
                            echo 1;
                            return;
                        }
                    } else { //la contraseña es inválida
                        echo 2;
                        return;
                    }
                }
            } else {
                echo 3;
                return;
            }
        } else {
            echo 0;
            return;
        }
    } else if ($seleccion == 6) { //activar usuario

        if (isset($_POST['rutusuarioin'])) {
            $rut_us_inct = $_POST['rutusuarioin'];

            $sql2 = "UPDATE usuario SET estado_usuario = 1 WHERE rut='$rut_us_inct'";
            $respuesta2 = mysqli_query($mysqli, $sql2);

            if (!$respuesta2) {
                echo  0;
                return;
            } else {  //se activo correctamente
                echo 1;
                return;
            }
        } else {
            echo 2;
            return;
        }
    } else if ($seleccion == 7) { //llena comunas
        $subseleccion = solonumeros($_POST['subselect']);
        $ljson = '';

        if ($subseleccion == 1) {
            $sql = "SELECT id_region,nombre_region FROM region";
            $consulta = mysqli_query($mysqli, $sql);
            // $contar = mysqli_num_rows($consulta); lo comente porque cuando hay error de consulta el mysqli_num_rows genera error
            if (!$consulta) {
                echo 1;
                return;
            } else {
                $ljson .= '<option value="">Seleccione región...</option>';
                while ($fila = mysqli_fetch_array($consulta)) {
                    $idregion = $fila['id_region'];
                    $nombreregion = $fila['nombre_region'];
                    $ljson .= '<option value="' . $idregion . '">' . toutf8($nombreregion) . '</option>';
                }
            }
            echo $ljson;
            return;
        } else if ($subseleccion == 2) {
            $regionseleccionada = solonumeros($_POST['regionseleccionada']);

            if (isset($regionseleccionada)) {
                $sql2 = "SELECT id_comuna,nombre_comuna FROM comuna WHERE id_region = '$regionseleccionada'";
                $consulta2 = mysqli_query($mysqli, $sql2);
                // $contar2 = mysqli_num_rows($consulta2); lo comente porque cuando hay error de consulta el mysqli_num_rows genera error

                if (!$consulta2) {
                    echo 1;
                    return;
                } else {
                    $ljson .= '<option value="">Seleccione comuna...</option>';
                    while ($fila2 = mysqli_fetch_array($consulta2)) {
                        $idcomuna = $fila2['id_comuna'];
                        $nombrecomuna = $fila2['nombre_comuna'];
                        $ljson .= '<option value="' . $idcomuna . '">' . toutf8($nombrecomuna) . '</option>';
                    }
                    echo $ljson;
                    return;
                }
            } else {
                echo 2;
                return;
            }
        }
    } else if ($seleccion == 8) { //llenar profesión
        $ljson = '';

        $sql = "SELECT id_cargo,nombre_cargo FROM cargo";
        $consulta = mysqli_query($mysqli, $sql);
        // $contar = mysqli_num_rows($consulta); lo comente porque cuando hay error de consulta el mysqli_num_rows genera error
        if (!$consulta) {
            echo 1;
            return;
        } else {
            $ljson .= '<option value="">Seleccione un cargo o profesión</option>';
            while ($fila = mysqli_fetch_array($consulta)) {
                $idcargo = $fila['id_cargo'];
                $nombrecargo = $fila['nombre_cargo'];
                $ljson .= '<option value="' . $idcargo . '">' . toutf8($nombrecargo) . '</option>';
            }
        }
        echo $ljson;
        return;
    } else if ($seleccion == 9) { //llenar sectores
        $ljson = '';

        $sql = "SELECT id_sector,nombre_sector FROM sector";
        $consulta = mysqli_query($mysqli, $sql);
        // $contar = mysqli_num_rows($consulta); lo comente porque cuando hay error de consulta el mysqli_num_rows genera error
        if (!$consulta) {
            echo 1;
            return;
        } else {
            // $ljson .= '<option value="">Seleccione un sector</option>';
            $ljson .= '<option value="null">No tiene sector</option>';
            while ($fila = mysqli_fetch_array($consulta)) {
                $idsector = $fila['id_sector'];
                $nombresector = $fila['nombre_sector'];
                $ljson .= '<option value="' . $idsector . '">' . toutf8($nombresector) . '</option>';
            }
        }
        echo $ljson;
        return;
    } else if ($seleccion == 10) { //llenar roles
        $ljson = '';

        $sql = "SELECT id_rol,nombre_rol FROM rol";
        $consulta = mysqli_query($mysqli, $sql);
        // $contar = mysqli_num_rows($consulta); lo comente porque cuando hay error de consulta el mysqli_num_rows genera error
        if (!$consulta) {
            echo 1;
            return;
        } else {
            $ljson .= '<option value="">Seleccione un rol...</option>';
            while ($fila = mysqli_fetch_array($consulta)) {
                $idrol = $fila['id_rol'];
                $nombrerol = $fila['nombre_rol'];
                $ljson .= '<option value="' . $idrol . '">' . toutf8($nombrerol) . '</option>';
            }
        }
        echo $ljson;
        return;
    } else if ($seleccion == 11) { //llenar sectores
        $ljson = '';

        $sql = "SELECT id_unidad,nombre_unidad FROM unidad";
        $consulta = mysqli_query($mysqli, $sql);
        // $contar = mysqli_num_rows($consulta); lo comente porque cuando hay error de consulta el mysqli_num_rows genera error
        if (!$consulta) {
            echo 1;
            return;
        } else {
            $ljson .= '<option value="null">No tiene unidad</option>';
            // $ljson .= '<option value="">Seleccione una Unidad</option>';
            while ($fila = mysqli_fetch_array($consulta)) {
                $idunidad = $fila['id_unidad'];
                $nombreunidad = $fila['nombre_unidad'];
                $ljson .= '<option value="' . $idunidad . '">' . toutf8($nombreunidad) . '</option>';
            }
        }
        echo $ljson;
        return;
    }
} else {
    echo 444;
    return;
}



function InsertarAlHistorialCargo($rut, $rol, $mysqli)
{
    $f2 = strftime("%x");
    $explodefecha = explode("/", $f2);
    $fechacargo = $explodefecha[2] . '-' . $explodefecha[1] . '-' . $explodefecha[0];

    $sqlmismafecha = "SELECT id_historial_cargo FROM historial_cargo WHERE rut='$rut' and id_rol='$rol' and fecha_cargo='$fechacargo'"; //Muestro el último articulo insertado en la consulta anterior
    $consulta_mismafecha = mysqli_query($mysqli, $sqlmismafecha);
    $contar_mismafecha = mysqli_num_rows($consulta_mismafecha);

    if ($contar_mismafecha == 0) {
        $consulta = "INSERT INTO historial_cargo (id_historial_cargo,id_rol,rut,fecha_cargo) VALUES (NULL,'$rol','$rut', '$fechacargo')";
        mysqli_query($mysqli, $consulta);
    }
}
