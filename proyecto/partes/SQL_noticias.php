<?php
include '../conexion/conexion.php';

/*==========================================================================Noticias================================================================================*/

$sql6 = mysqli_query($mysqli, "SELECT im.id_imagen_articulo,im.id_articulo,im.nombre_imagen_articulo, a.titulo_articulo, a.descripcion_articulo,a.fecha_articulo ,cat.nombre_categoria_articulo

FROM articulo a, imagen_articulo im, categoria_articulo cat

WHERE a.id_articulo=im.id_articulo and 
      a.id_categoria_articulo=cat.id_categoria_articulo ORDER BY a.id_articulo DESC");

if(!$sql6){
    header("Location:../inicio/");
}

// PAGINACION
$articulos_por_pagina = 9;
$total_articulos = mysqli_num_rows($sql6);

$paginas = ceil($total_articulos / $articulos_por_pagina);

//echo '<script>console.log("hay : "+ ' . $paginas . ');</script>';

if ($total_articulos == 0 || $total_articulos == '') { //para cuando no hay datos en la BD no halla error lo redirige al index y en el navbar queda oculto
    header("Location:../inicio/");
} else {
    if (!$_GET) {
        header("Location:?pg=1");
    }

    if ($_GET['pg'] > $paginas || $_GET['pg'] < 1) {
        header("Location:?pg=1");
    }
}
$iniciar = ($_GET['pg'] - 1) * $articulos_por_pagina;  //a que pagina ir para mostrar de a 3 o de a "n" numero páginas

$agregaraconsulta = "";

// FILTRO DE BUSQUEDA Y LO AÑADO A LA CONSULTA SI EXISTE. ESTO ME SIRVE PARA AHORRAR CONSULTAS SQL
if ($filtro_busqueda != null) {
    $agregaraconsulta .= " AND (a.titulo_articulo LIKE '%$filtro_busqueda%' OR cat.nombre_categoria_articulo LIKE '%$filtro_busqueda%') "; //cat.nombre_categoria
}

if ($iniciar != null || $articulos_por_pagina != null) {
    $agregaraconsulta .= " ORDER BY a.id_articulo DESC LIMIT $iniciar,$articulos_por_pagina ";
}

$sql7 = mysqli_query($mysqli, "SELECT im.id_imagen_articulo,im.id_articulo,im.nombre_imagen_articulo, SUBSTRING(a.titulo_articulo, 1, 90) AS titulo_articulo, 
a.descripcion_articulo,a.fecha_articulo,a.visualizaciones_articulo, cat.nombre_categoria_articulo
FROM articulo a, imagen_articulo im, categoria_articulo cat
WHERE a.id_articulo=im.id_articulo and a.id_categoria_articulo=cat.id_categoria_articulo " . $agregaraconsulta);


$existeesearticulo¿ = mysqli_num_rows($sql7);

/*==========================================================================Noticias================================================================================*/
