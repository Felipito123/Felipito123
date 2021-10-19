<?php
include '../../conexion/conexion.php';
include '../../funcionesphp/limpiarCampo.php';
date_default_timezone_set("America/Santiago");
setlocale(LC_TIME, "spanish");
$fechadehoy = strftime("%F");

if (isset($_POST['idarticulo']) && isset($_POST['valorvotar']) && isset($_POST['valor_ip']) && isset($_POST['valor_pais']) && isset($_POST['valor_region']) && isset($_POST['valor_ciudad']) && isset($_POST['tipo_compania'])) {

    $idarticulo = limpiar_campo($_POST['idarticulo']);
    $valorvotar = limpiar_campo($_POST['valorvotar']);
    $valor_ip = limpiar_campo($_POST['valor_ip']);
    $valor_pais = limpiar_campo($_POST['valor_pais']);
    $valor_region = limpiar_campo($_POST['valor_region']);
    $valor_ciudad = limpiar_campo($_POST['valor_ciudad']);
    $tipo_compania = limpiar_campo($_POST['tipo_compania']);

    $sql = "SELECT id_calificacion_articulo,
    pais_calificacion_articulo,
    id_articulo,
    ip_calificacion_articulo,
    region_calificacion_articulo,
    ciudad_calificacion_articulo,
    compania_calificacion_articulo 
    FROM calificacion_articulo WHERE ip_calificacion_articulo='$valor_ip' 
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
        
        $consulta = "INSERT INTO calificacion_articulo 
                (id_calificacion_articulo,
                id_articulo,
                valor_calificacion_articulo,
                ip_calificacion_articulo,
                pais_calificacion_articulo,
                region_calificacion_articulo,
                ciudad_calificacion_articulo,
                compania_calificacion_articulo,
                fecha_calificacion_articulo) 
                VALUES (NULL,'$idarticulo','$valorvotar','$valor_ip','$valor_pais','$valor_region','$valor_ciudad','$tipo_compania','$fechadehoy')";

        if (mysqli_query($mysqli, $consulta)) {
            echo 1;  //Consulta exitosa
            return;
        } else {
            echo 2;  //Error en la consulta
            return;
        }
    }
} else {
    echo 3; //No se ha recibido el parametros
    return;
    // die();
}

mysqli_close($mysqli);
