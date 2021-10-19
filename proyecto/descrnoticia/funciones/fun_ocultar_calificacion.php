<?php
include '../../conexion/conexion.php';
include '../../funcionesphp/limpiarCampo.php';

if (isset($_POST['idarticulo']) && isset($_POST['valor_ip']) && isset($_POST['valor_pais']) && isset($_POST['valor_region']) && isset($_POST['valor_ciudad']) && isset($_POST['tipo_compania'])) {

  $idarticulo = limpiar_campo($_POST['idarticulo']);
  $valor_ip = limpiar_campo($_POST['valor_ip']);
  $valor_pais = limpiar_campo($_POST['valor_pais']);
  $valor_region = limpiar_campo($_POST['valor_region']);
  $valor_ciudad = limpiar_campo($_POST['valor_ciudad']);
  $tipo_compania = limpiar_campo($_POST['tipo_compania']);

  $sql = "SELECT id_calificacion_articulo,
    id_articulo,
    ip_calificacion_articulo,
    region_calificacion_articulo,
    ciudad_calificacion_articulo,
    compania_calificacion_articulo 
    FROM calificacion_articulo 
    WHERE ip_calificacion_articulo='$valor_ip' 
    and id_articulo='$idarticulo' 
    and pais_calificacion_articulo='$valor_pais' 
    and region_calificacion_articulo='$valor_region' 
    and ciudad_calificacion_articulo='$valor_ciudad' 
    and compania_calificacion_articulo='$tipo_compania'";
  $res = mysqli_query($mysqli, $sql);
  $contar = mysqli_num_rows($res);

  if ($contar > 0) { //Si ya a ha calificado una vez , no inserta la calificacion
    echo 0;
    return;
  } else {
    echo 1;
    return;
  }
} else {
  echo 2; //No se ha recibido el parametros
  // die();
  return;
}

mysqli_close($mysqli);
