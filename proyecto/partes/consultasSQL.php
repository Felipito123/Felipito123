<?php
include '../conexion/conexion.php';

$sql = mysqli_query($mysqli, "SELECT * FROM imagen_articulo");
$comprobarquehaytuplas = mysqli_num_rows($sql);
if ($comprobarquehaytuplas == 0 || $comprobarquehaytuplas == '' || $comprobarquehaytuplas < 3) {
    $mostrarimagen = '<img src="../../imgpordefecto/no-imagen.jpg" alt="" class="img-fluid" style="height:529px">';
    $mostrarimagen2 = '<img src="../../imgpordefecto/no-imagen.jpg" alt="" class="img-fluid" style="height:529px">';
    $mostrarimagen3 = '<img src="../../imgpordefecto/no-imagen.jpg" alt="" class="img-fluid" style="height:529px">';

    $nombre_categoria = "no hay categoria";
    $nombre_categoria2 = "no hay categoria";
    $nombre_categoria3 = "no hay categoria";

    $titulo_articulo = "no hay titulo";
    $titulo_articulo2 = "no hay titulo";
    $titulo_articulo3 = "no hay titulo";

    $fecha = "no hay fecha";
    $fecha2 = "no hay fecha";
    $fecha3 = "no hay fecha";

    $autor = 'CESFAM LOS ÁLAMOS';
} else {
    /*==========================================================================3 imágenes principales================================================================================*/
    $sql1 = mysqli_query($mysqli, "SELECT im.id_imagen_articulo,im.id_articulo, im.nombre_imagen_articulo, a.titulo_articulo, cat.nombre_categoria_articulo, a.fecha_articulo  FROM imagen_articulo im, articulo a, categoria_articulo cat  WHERE im.id_articulo=a.id_articulo and  a.id_categoria_articulo=cat.id_categoria_articulo ORDER BY im.id_imagen_articulo DESC LIMIT 1"); //obtengo el último valor  (1)=ultimo valor - (1,1)=penultimo valor - (2,1)= antepenultimo valor
    $imagen1 = mysqli_fetch_assoc($sql1);

    if (empty($imagen1["id_articulo"])  || empty($imagen1["nombre_imagen_articulo"]) || $imagen1["nombre_imagen_articulo"] == 'no-imagen.jpg') {
        $mostrarimagen = '<img src="../../imgpordefecto/no-imagen.jpg" alt="" class="img-fluid" style="height:529px">';
    } else {
        $mostrarimagen = '<img src="../noticias/imagenes/' . $imagen1["id_articulo"] . '/' . $imagen1["nombre_imagen_articulo"] . '" alt="" class="img-fluid" style="height:529px">';
    }


    $id_articulo1 = $imagen1['id_articulo'];
    $nombre_categoria = $imagen1['nombre_categoria_articulo'];
    $titulo_articulo = $imagen1['titulo_articulo'];
    $fecha = $imagen1['fecha_articulo'];
    $autor = 'CESFAM LOS ÁLAMOS';

    $sql2 = mysqli_query($mysqli, "SELECT im.id_imagen_articulo,im.id_articulo, im.nombre_imagen_articulo, a.titulo_articulo, cat.nombre_categoria_articulo, a.fecha_articulo  FROM imagen_articulo im, articulo a, categoria_articulo cat  WHERE im.id_articulo=a.id_articulo and  a.id_categoria_articulo=cat.id_categoria_articulo ORDER BY im.id_imagen_articulo DESC LIMIT 1,1"); //obtengo el penultimo valor  (1)=ultimo valor - (1,1)=penultimo valor - (2,1)= antepenultimo valor
    $imagen2 = mysqli_fetch_assoc($sql2);

    if (empty($imagen2["id_articulo"])  || empty($imagen2["nombre_imagen_articulo"]) || $imagen2["nombre_imagen_articulo"] == 'no-imagen.jpg') {
        $mostrarimagen2 = '<img src="../../imgpordefecto/no-imagen.jpg" alt="" class="img-fluid" style="height:529px">';
    } else {
        $mostrarimagen2 = '<img src="../noticias/imagenes/' . $imagen2["id_articulo"] . '/' . $imagen2["nombre_imagen_articulo"] . '" alt="" class="img-fluid" style="height:529px">';
    }

    $id_articulo2 = $imagen2['id_articulo'];
    $nombre_categoria2 = $imagen2['nombre_categoria_articulo'];
    $titulo_articulo2 = $imagen2['titulo_articulo'];
    $fecha2 = $imagen2['fecha_articulo'];


    $sql3 = mysqli_query($mysqli, "SELECT im.id_imagen_articulo,im.id_articulo, im.nombre_imagen_articulo, a.titulo_articulo, cat.nombre_categoria_articulo, a.fecha_articulo  FROM imagen_articulo im, articulo a, categoria_articulo cat  WHERE im.id_articulo=a.id_articulo and  a.id_categoria_articulo=cat.id_categoria_articulo ORDER BY im.id_imagen_articulo DESC LIMIT 2,1"); //obtengo el antepenultimo valor  (1)=ultimo valor - (1,1)=penultimo valor - (2,1)= antepenultimo valor
    $imagen3 = mysqli_fetch_assoc($sql3);

    if (empty($imagen3["id_articulo"])  || empty($imagen3["nombre_imagen_articulo"]) || $imagen3["nombre_imagen_articulo"] == 'no-imagen.jpg') {
        $mostrarimagen3 = '<img src="../noticias/imagenes/default/no-imagen.jpg" alt="" class="img-fluid" style="height:529px">';
    } else {
        $mostrarimagen3 = '<img src="../noticias/imagenes/' . $imagen3["id_articulo"] . '/' . $imagen3["nombre_imagen_articulo"] . '" alt="" class="img-fluid" style="height:529px">';
    }
    $id_articulo3 = $imagen3['id_articulo'];
    $nombre_categoria3 = $imagen3['nombre_categoria_articulo'];
    $titulo_articulo3 = $imagen3['titulo_articulo'];
    $fecha3 = $imagen3['fecha_articulo'];
    /*==========================================================================3 imágenes principales================================================================================*/
}

/*==========================================================================TOP 8 IMAGENES DE NOTICIAS================================================================================*/
$sql6 = mysqli_query($mysqli, "SELECT im.id_articulo,im.nombre_imagen_articulo, SUBSTRING(a.titulo_articulo, 1, 90) AS titulo_articulo, a.descripcion_articulo,a.fecha_articulo,a.visualizaciones_articulo,cat.nombre_categoria_articulo 

FROM articulo a, imagen_articulo im, categoria_articulo cat

WHERE a.id_articulo=im.id_articulo and 
      a.id_categoria_articulo=cat.id_categoria_articulo
       ORDER BY RAND() LIMIT 8"); //MUESTRA SÓLO 6 ARTICULOS DE NOTICIAS AL AZAR  | ORDER BY a.id_articulo DESC LIMIT 6

/*==========================================================================TOP 8 IMAGENES DE NOTICIAS================================================================================*/


/*==========================================================================TOP 8 IMAGENES DE SWIPER================================================================================*/
$sql7 = mysqli_query($mysqli, "SELECT id_galeria,archivo_galeria, estado_galeria, titulo_galeria
FROM galeria WHERE estado_galeria=1 ORDER BY id_galeria DESC LIMIT 8"); //MUESTRA  LOS 8 (LIMIT 8) ÚLTIMOS (DESC) IMAGENES DE GALERIA

/*==========================================================================TOP 8 IMAGENES DE SWIPER================================================================================*/
