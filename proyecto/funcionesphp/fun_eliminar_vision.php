<?php
include '../conexion/conexion.php';

function borrarcarpeta($carpeta)
{
      foreach (glob($carpeta . "/*") as $archivos_carpeta) {
            if (is_dir($archivos_carpeta)) {
                  borrarcarpeta($archivos_carpeta);
            } else {
                  unlink($archivos_carpeta);
            }
      }
      rmdir($carpeta);
}

if (isset($_POST["idarticulo"]) && !empty($_POST["idarticulo"])) { //Porque la imagen puede existir o no, entonces no se pregunta en primera instancia

      $idarticulo = $_POST['idarticulo'];

      $sqele = "DELETE FROM imagenes WHERE id_articulo='$idarticulo'";

      if (mysqli_query($mysqli, $sqele)) {
            $sql = "DELETE FROM articulo WHERE id_articulo='$idarticulo'";
            if (mysqli_query($mysqli, $sql)) {
                  borrarcarpeta('../imagenes/' . $idarticulo);
                  echo 1;
            } else {
                  echo 0;
            }
      } else {
            echo 0;
            die();
      }
} else {
      echo 2; //No se recibio la id del articulo
}
