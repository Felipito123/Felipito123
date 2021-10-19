<?php
include '../../conexion/conexion.php';
include '../../funcionesphp/limpiarCampo.php';
session_start();
$rutsesion = $_SESSION['sesionCESFAM']['rut'];

$seleccion = $_POST['seleccionar'];
if (isset($seleccion)) {
    if ($seleccion == 1) {
        if (isset($_POST["titulo_articulo_odonto"]) && isset($_POST["descripcion_odonto"])) {

            $titulo = numerosyletras($_POST['titulo_articulo_odonto']);
            $descripcion = $_POST['descripcion_odonto']; //Aqui no uso la funcion limpiar campo porque por Ej: la imagen en summernote usa formato base 64 con caracteres raros entonces necesito que lo inserte 
            $frase = numerosyletras($_POST['frase']);
            $cita = numerosyletras($_POST['cita']);

            if (validavacioenarreglo(array($titulo, $descripcion))) {
                echo 1;
                return;
            } else {
                $verificar_imagen;

                if ($_FILES["archivo_odonto"]['type'] == null) {
                    $nombre_imagen = 'no-imagen.jpg';
                    $tamañoimagen = 0;
                    $tipo = 'image/jpg';
                    $verificar_imagen = false;
                    //NOTA: AQUI NO SE CREA EL DIRECTORIO CON LA IMAGEN POR DEFECTO SINO QUE YA LA TENGO CREADA DE ANTEMANO
                } else {
                    $archivo = $_FILES["archivo_odonto"];
                    $nombre_imagen = $archivo['name'];
                    $tipo = $archivo['type'];
                    $tamañoimagen = $archivo['size'];
                    $verificar_imagen = true;

                    if ($tamañoimagen > 20971520) { //Tamaño excedido de 20 MB
                        echo 2; //Se excedio 
                        return;
                    }
                }
                //Formato
                if ($tipo == "image/jpg" || $tipo == "image/png" || $tipo == "image/jpeg" || $tipo == "image/JPG" || $tipo == "image/PNG" || $tipo == "image/JPEG") {

                    $sql1 = "INSERT INTO articulo_odonto (id_articulo_odonto,rut,titulo_articulo_odonto,descripcion_articulo_odonto,archivo_articulo_odonto,estado_articulo_odonto,frase_articulo_odonto,cita_articulo_odonto) VALUES (NULL,'$rutsesion','$titulo','$descripcion','$nombre_imagen','visible','$frase','$cita')";
                    $resultado_2 = mysqli_query($mysqli, $sql1); //Hasta aqui inserto un banner_imagen 

                    if (!$resultado_2) {
                        echo 3; //Error al insertar imagen
                        return;
                        // die("error " . mysqli_error($mysqli));
                    } else {
                        $sql2 = "SELECT MAX(id_articulo_odonto) AS identificador FROM articulo_odonto"; //Muestro el último articulo insertado en la consulta anterior
                        $resultado_3 = mysqli_query($mysqli, $sql2);

                        if (!$resultado_3) {
                            echo 4; //Error al mostrar el último id
                            return;
                        } else {

                            $fila = mysqli_fetch_assoc($resultado_3);
                            $id_articulo = $fila["identificador"];

                            if (!is_dir('../../admodonto/odontologia/' . $id_articulo . '/')) { //Si no existe el directorio 
                                mkdir('../../admodonto/odontologia/' . $id_articulo . '/', 0777, true); //lo crea
                            }

                            if (!$verificar_imagen) { //Si es que no recibe una imagen no tendrá tmp_name entonces necesito copiar la imagen de la carpeta por defecto 
                                copy('../../admodonto/odontologia/default/no-imagen.jpg', '../../admodonto/odontologia/' . $id_articulo . '/no-imagen.jpg');
                            } else { // si hay una imagen recibida entonces subo el tmp_name
                                move_uploaded_file($archivo['tmp_name'], '../../admodonto/odontologia/' . $id_articulo . '/' . $nombre_imagen);
                            }

                            echo 5;
                            return;
                        }
                    }
                } else {
                    echo 6; //El formato de la imagen no es válida
                    return;
                }
            }
        } else {
            echo 7; //No se ha recibido el parametro desde banner_imagenes.js (#formBannerImagen)
            return;
        }
    } else {
        echo 444;
        return;
    }
} else {
    echo 444;
    return;
}

mysqli_close($mysqli);
