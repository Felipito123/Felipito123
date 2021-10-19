<?php
include '../../conexion/conexion.php';
include '../../funcionesphp/borrarcarpeta.php';

session_start();

if (isset($_SESSION['sesionCESFAM']['id_usuario'])) {
    $id_usuario = $_SESSION['sesionCESFAM']['id_usuario'];
    if (isset($_POST['clave'])) {
        $claverecibida = $_POST['clave'];
        $sql = "SELECT contrasena FROM usuario WHERE id_usuario= '$id_usuario'";
        $respuesta1 = mysqli_query($mysqli, $sql);

        $clave = '';

        if (!$respuesta1) { //fallo la consulta o hubo error en la consulta
            echo  0;
            die();
        } else {
            while ($fila1 = mysqli_fetch_array($respuesta1)) {
                $clave = $fila1["contrasena"];
            }

            if ($claverecibida == $clave) { //sha1($claverecibida) == $clave

                $sql2 = "SELECT id_articulo FROM articulo WHERE id_usuario= '$id_usuario'";
                $respuesta2 = mysqli_query($mysqli, $sql2);

                if (!$respuesta2) {
                    echo  0;
                    die();
                } else {
                    //borra las carpetas con las id con imagenes y las elimina de la base de datos
                    while ($fila2 = mysqli_fetch_array($respuesta2)) { 
                        $id_articulo = $fila2["id_articulo"];
                        borrarcarpeta('../../noticias/imagenes/' . $id_articulo);
                        borrarcarpeta('../../pdf/' . $id_articulo);
                        $sql3 = "delete from imagenes where id_articulo='$id_articulo'";
                        $respuesta3 = mysqli_query($mysqli, $sql3);
                    }
                    //elimina los articulos y el usuario de la base de datos
                    $sql4 = "delete from articulo where id_usuario='$id_usuario'";
                    $respuesta4 = mysqli_query($mysqli, $sql4);
                    $query = "delete from usuario where id_usuario='$id_usuario'";
                    $respuesta5 = mysqli_query($mysqli, $query);
                    
                    //Verifica si las consultas se hicieron correctamente
                    if (!$respuesta4 && !$respuesta5) {
                        echo 0;
                        die();
                    } else {
                        echo 1;
                        die();
                    }
                }
            } else {
                echo 0;
                die();
            }
        }
    } else echo 0;
    die();
} else {
    echo 0;
    die();
}
