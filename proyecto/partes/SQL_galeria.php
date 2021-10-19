<?php
include '../conexion/conexion.php';
$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

/*==========================================================================Noticias================================================================================*/
$sql1 = mysqli_query($mysqli, "SELECT id_galeria, archivo_galeria, titulo_galeria FROM galeria  WHERE estado_galeria=1 ORDER BY id_galeria DESC");

// PAGINACION
$articulos_por_pagina = 12;
$total_articulos = mysqli_num_rows($sql1);

$paginas = ceil($total_articulos / $articulos_por_pagina);

//echo '<script>console.log("hay : "+ ' . $paginas . ');</script>';


if ($paginas == 0) { //para cuando no hay datos en la BD no halla error lo redirige al index y en el navbar queda oculto
    header("Location:../inicio");
} else {

    if (!$_GET) {
        header("Location:index?pg=1");
    }

    if (($_GET['pg'] > $paginas || $_GET['pg'] < 1)) {
        header("Location:index?pg=1");
    }

    if (validanumero(array($_GET['pg']))) {
        header("Location:index?pg=1");
    }

    $porciones = explode("pgaleria", "$_SERVER[REQUEST_URI]");
    if (str_contains($porciones[1], '//')) { // en caso de que la url sea pgaleria//index.php?... o pgaleria//?...
        header("Location:index?pg=1");
    }

    // $explode = explode("/", $actual_link);
    // // echo '<script>alert("'.$explode[7].'");</script>';
    // if (($explode[7]>$paginas || $explode[7]<1 || isset($explode[8]))) { //DESPUÉS REVISAR BIEN PORQUE LA URL VA A CAMBIAR SEGÚN DONDE QUEDE FINALMENTE ALOJADO EL PROYECTO
    // 	//$explode[7] obtiene el valor del numero en la url, $explode[8] pregunto si hay otro parametro
    //     header("Location:../pgaleria/1");
    // }


}

// echo '<script>alert("'.$actual_link.'");</script>';


$iniciar = ($_GET['pg'] - 1) * $articulos_por_pagina;  //a que pagina ir para mostrar de a 3 o de a "n" numero páginas
$agregaraconsulta = "";
if ($iniciar != null || $articulos_por_pagina != null) {
    $agregaraconsulta .= " WHERE estado_galeria=1 ORDER BY id_galeria DESC LIMIT $iniciar,$articulos_por_pagina ";
}
$sql2 = mysqli_query($mysqli, "SELECT id_galeria, archivo_galeria, titulo_galeria FROM galeria " . $agregaraconsulta);


/*==========================================================================Noticias================================================================================*/

function validanumero($parametro) //valida si es un número(is_numeric es para entero y flotantes) y si es negativo
{
    foreach ($parametro as $val) {

        if (!is_numeric($val)) { //Si no es un numero 
            return true;
        } else if (is_numeric($val) && ($val <= 0)) { //si es un numero pero es negativo o igual a cero
            return true;
        }
    }
}
