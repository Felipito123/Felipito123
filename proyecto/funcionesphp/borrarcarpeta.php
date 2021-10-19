<?php

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

?>