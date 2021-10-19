<?php
include '../../conexion/conexion.php';
include '../../funcionesphp/limpiarCampo.php';
include '../../funcionesphp/borrarcarpeta.php';
session_start();
$rutusuario = $_SESSION["sesionCESFAM"]["rut"];

$seleccion = $_POST['seleccionar'];

if (isset($seleccion)) {

    if ($seleccion == 1) {

        if (isset($_POST["nombre"]) && isset($_POST["comuna"]) && isset($_POST["correo"]) && isset($_POST["telefono"]) && isset($_POST["direccion"])) {

            $nombre = sololetras($_POST["nombre"]);
            $comuna = solonumeros($_POST["comuna"]);
            $correo = limpiar_campo($_POST["correo"]);
            $telefono = solonumeros($_POST["telefono"]);
            $direccion = numerosyletras($_POST["direccion"]);

            if (validavacioenarreglo(array($nombre, $comuna, $correo, $telefono, $direccion))) {
                echo 8;
                return;
            }

            $verificar_imagen;
            if ($_FILES["filemu"]['type'] == null || $_FILES["filemu"]['type'] == '') {
                $nombre_imagen = 'no-imagen.jpg';
                $verificar_imagen = false;
            } else {
                $archivo = $_FILES["filemu"];
                $nombre_imagen = $archivo['name'];
                $tipo = $archivo['type'];
                $tamañoimagen = $archivo['size'];

                if ($tamañoimagen > 20971520) { //Tamaño excedido de 20 MB
                    echo 1; //Se excedio 
                    return;
                }
                $verificar_imagen = true;
            }

            if (!$verificar_imagen) { //si verificar_imagen es false, quiere decir que no se subió una imagen en el formulario
                $sql = "UPDATE usuario SET id_comuna='$comuna', nombre_usuario='$nombre',correo_usuario='$correo',telefono_usuario='$telefono',direccion_usuario='$direccion' WHERE rut='$rutusuario'";
                $respuesta = mysqli_query($mysqli, $sql);

                if (!$respuesta) { //hubo error en la consulta sql
                    echo 2;
                    return;
                } else {
                    reestablecersesion($comuna);
                    echo 3; //Editado exitosamente
                    return;
                }
            } else {

                if ($tipo == "image/jpg" || $tipo == "image/png" || $tipo == "image/jpeg" || $tipo == "image/JPG" || $tipo == "image/PNG" || $tipo == "image/JPEG") {

                    $sql2 = "UPDATE usuario SET id_comuna='$comuna', nombre_usuario='$nombre',correo_usuario='$correo',telefono_usuario='$telefono',direccion_usuario='$direccion',imagen_usuario='$nombre_imagen' WHERE rut='$rutusuario'";
                    $respuesta2 = mysqli_query($mysqli, $sql2);

                    if (!$respuesta2) { //hubo error en la consulta sql2
                        echo 4;
                        return;
                    } else {

                        if (!is_dir('../fotodeperfiles/' . $rutusuario . '/')) { //Si no existe el directorio 
                            mkdir('../fotodeperfiles/' . $rutusuario . '/', 0777, true); //lo crea (OJO EL TRUE ES IMPORTANTE EN EL MKDIR)
                        } else {
                            // BORRA PORQUE SINO, SE VA ACUMULANDO LAS IMÁGENES EN LA CARPETA, ENTONCES PARA AHORRAR ESPACIO Y TAMAÑO
                            borrarcarpeta('../fotodeperfiles/' . $rutusuario);  //Borra la carpeta con el id 
                            mkdir('../fotodeperfiles/' . $rutusuario . '/', 0777, true); //la vuelve a crear
                        }
                        move_uploaded_file($archivo['tmp_name'], '../fotodeperfiles/' . $rutusuario . '/' . $nombre_imagen); //inserta la imagen

                        reestablecersesion($comuna);
                        echo 5; //Editado exitosamente
                        return;
                    }
                } else {
                    echo 6; //no tiene formato de una imagen
                    return;
                }
            }
        } else {
            echo 7;
            return;
        }
    } else if ($seleccion == 2) {

        if (isset($_POST["actualpass"]) && isset($_POST["contrasenanueva"])) {
            $contra_actual = validacontrasena($_POST["actualpass"]);
            $contra_nueva = validacontrasena($_POST["contrasenanueva"]);

            if (validavacioenarreglo(array($contra_actual, $contra_nueva))) { //hay datos vacios
                echo 1;
                return;
            } else {
                $sql1 = "SELECT rut,contrasena_usuario FROM usuario WHERE rut='$rutusuario' and estado_usuario=1";
                $respuesta = mysqli_query($mysqli, $sql1);

                if (!$respuesta) { //error en la consulta
                    echo 2;
                    return;
                } else {
                    $res = mysqli_fetch_array($respuesta);
                    $rutbd = $res['rut'];
                    $contrabd = $res['contrasena_usuario'];

                    if (sha1($contra_actual) != $contrabd) { //si las contrasenas son distinas de la BD y la que ingrese, no continua
                        echo 3;
                        return;
                    } else {
                        $sql2 = "UPDATE usuario SET contrasena_usuario=SHA('$contra_nueva') WHERE rut='$rutusuario'";
                        $respuesta2 = mysqli_query($mysqli, $sql2);

                        if (!$respuesta2) { //hubo error en la consulta sql2
                            echo 4;
                            return;
                        } else { //se edito la contraseña correctamente
                            echo 5;
                            return;
                        }
                    }
                }
            }
        } else {
            echo 6;
            return;
        }
    } else {
        echo 444;
        return;
    }
} else {
    echo 500;
    return;
}


function reestablecersesion($valorcomuna)
{
    if (isset($_SESSION["sesionCESFAM"])) { //si existe la sesion carrito puede agregar un id
        $_SESSION["sesionCESFAM"]["id_region"] = $_POST["idregionselected"];
        $_SESSION["sesionCESFAM"]["id_comuna"] = $valorcomuna;
        $_SESSION["sesionCESFAM"]["nombre_region"] = $_POST["nombreregionselected"];
        $_SESSION["sesionCESFAM"]["nombre_comuna"] = $_POST["nombrecomunaselected"];
    }
}
mysqli_close($mysqli);
