<?php
include '../conexion/conexion.php';

/*==========================================================================Noticias================================================================================*/

$sql1 = mysqli_query($mysqli, "SELECT id_articulo_odonto,titulo_articulo_odonto,descripcion_articulo_odonto, archivo_articulo_odonto, estado_articulo_odonto
FROM articulo_odonto WHERE estado_articulo_odonto='visible' ORDER BY id_articulo_odonto DESC");

// PAGINACION
$articulos_por_pagina = 8;
$total_articulos = mysqli_num_rows($sql1);

$paginas = ceil($total_articulos / $articulos_por_pagina);

//echo '<script>console.log("hay : "+ ' . $paginas . ');</script>';

if ($paginas == 0) { //para cuando no hay datos en la BD no halla error lo redirige al index y en el navbar queda oculto
    header("Location:../inicio");
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
    $agregaraconsulta .= " AND (titulo_articulo_odonto LIKE '%$filtro_busqueda%' OR descripcion_articulo_odonto LIKE '%$filtro_busqueda%') "; 
}

if ($iniciar != null || $articulos_por_pagina != null) {
    $agregaraconsulta .= " ORDER BY id_articulo_odonto DESC LIMIT $iniciar,$articulos_por_pagina ";
}

$sql2 = mysqli_query($mysqli, "SELECT id_articulo_odonto,titulo_articulo_odonto,descripcion_articulo_odonto, archivo_articulo_odonto, estado_articulo_odonto
FROM articulo_odonto WHERE estado_articulo_odonto='visible' " . $agregaraconsulta);


$existeesearticulo = mysqli_num_rows($sql2);

/*==========================================================================Noticias================================================================================*/
