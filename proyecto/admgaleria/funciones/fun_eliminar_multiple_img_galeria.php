<?php
include '../../conexion/conexion.php';
include '../../funcionesphp/limpiarCampo.php';
include '../../funcionesphp/borrarcarpeta.php';

if (isset($_POST["iden"])) {
      $i = 0;
      $cantidad = count($_POST["iden"]);

      if($cantidad==0){
            echo 3;
            return;
      }
      while ($i < $cantidad) {
            $iden = $_POST['iden'][$i];
            $sql = "DELETE FROM galeria WHERE id_galeria='$iden'";
            mysqli_query($mysqli, $sql);
            borrarcarpeta('../../pgaleria/galeria/' . solonumeros($iden));
            $i++;
      }
      echo 1;
      return;
} else {
      echo 2;
      return;
}
