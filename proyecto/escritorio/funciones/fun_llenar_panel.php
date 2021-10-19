<?php

include '../../conexion/conexion.php';

    if (isset($_POST['opcionuno']) && $_POST['opcionuno'] == 1) { //Activado
        $consulta = mysqli_query($mysqli, "SELECT rut FROM usuario WHERE enlinea_usuario='1'");
        $contar=mysqli_num_rows($consulta);
        echo $contar;

    } else if (isset($_POST['opciondos']) && $_POST['opciondos'] == 2) {
        $consulta = mysqli_query($mysqli, "SELECT rut  FROM usuario");
        $contar=mysqli_num_rows($consulta);
        echo $contar;
    }
    else if (isset($_POST['opciontres']) && $_POST['opciontres'] == 3) {
        $consulta = mysqli_query($mysqli, "SELECT id_articulo  FROM articulo");
        $contar=mysqli_num_rows($consulta);
        echo $contar;
      }

      else if (isset($_POST['opcioncuatro']) && $_POST['opcioncuatro'] == 4) {
        $consulta = mysqli_query($mysqli, "SELECT COUNT(id_articulo) AS id, SUM(visualizaciones_articulo) AS visitas FROM articulo");
        $recibido = mysqli_fetch_assoc($consulta);

        if($recibido['id']==0){ 
          //Esto para comprobar cuando no hay articulos no me genere error en las visualizaciones del grafico ya que el count muestra id = 0, 
          //porque a pesar de que no hay articulos igual cuenta el 0 y más abajo yo divido por el id que es 0, y un numero no puede dividirse por cero (DA ERROR)
          $div=0;
        }
        else{
          $div=ceil($recibido['visitas']/$recibido['id']);
        }
       
        echo $div;
      }

      
mysqli_close($mysqli);
