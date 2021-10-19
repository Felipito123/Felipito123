<?php
require '../../conexion/conexion.php';
include '../../funcionesphp/limpiarCampo.php';
include '../../funcionesphp/borrarcarpeta.php';

if (isset($_POST["idarticulo"]) && !empty($_POST["idarticulo"])) { //Porque la imagen puede existir o no, entonces no se pregunta en primera instancia

      $idarticulo = $_POST['idarticulo'];

      $sqele = "DELETE FROM imagen_articulo WHERE id_articulo='$idarticulo'";

      if (mysqli_query($mysqli, $sqele)) {
            $sql = "DELETE FROM articulo WHERE id_articulo='$idarticulo'";
            if (mysqli_query($mysqli, $sql)) {

                  $sqlcalif = "DELETE FROM calificacion_articulo WHERE id_articulo='$idarticulo'";
                  mysqli_query($mysqli, $sqlcalif); //Elimina todas las calificaciones del articulo eliminado

                  if (is_dir('../../noticias/imagenes/' . $idarticulo . '/') && is_dir('../../noticias/pdf/' . $idarticulo . '/')) {
                        borrarcarpeta('../../noticias/imagenes/' . limpiar_campo($idarticulo));
                        borrarcarpeta('../../noticias/pdf/' . limpiar_campo($idarticulo));
                  } else if (is_dir('../../noticias/imagenes/' . $idarticulo . '/')) { //Solo si existe el pdf y galeria 
                        borrarcarpeta('../../noticias/imagenes/' . limpiar_campo($idarticulo));
                  } else if (is_dir('../../noticias/pdf/' . $idarticulo . '/')) {
                        borrarcarpeta('../../noticias/pdf' . limpiar_campo($idarticulo));
                  }
                  echo 1;
                  return;
            } else {
                  echo 0;
                  return;
            }
      } else {
            echo 0;
            return;
      }
} else {
      echo 2; //No se recibio la id del articulo
      return;
}
