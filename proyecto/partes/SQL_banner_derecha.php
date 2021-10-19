<?php
include '../conexion/conexion.php';
/*==========================================================================MUESTRA LAS IMAGENES DEL BANNER================================================================================*/
$SQL_IMG_LINK = mysqli_query($mysqli, "SELECT id_ban_imagenes,nombre_ban_imagenes,estado_ban_imagenes,link_ban_imagenes FROM banner_imagenes WHERE estado_ban_imagenes=1"); 
/*==========================================================================MUESTRA LAS IMAGENES DEL BANNER================================================================================*/

/*==========================================================================MUESTRA LOS  VIDEOS DEL BANNER================================================================================*/
$SQL_VIDEO_LINK = mysqli_query($mysqli, "SELECT id_ban_videos,titulo_ban_videos,nombre_ban_videos,estado_ban_videos FROM banner_videos WHERE estado_ban_videos=1"); 
/*==========================================================================MUESTRA LOS VIDEOS DEL BANNER================================================================================*/


/*==========================================================================LO MÁS VISTO================================================================================*/
$SQL_LO_MAS_VISTO= mysqli_query($mysqli,"SELECT a.id_articulo,a.titulo_articulo,im.nombre_imagen_articulo, a.fecha_articulo, SUM(a.visualizaciones_articulo) MASVISTO
FROM articulo a, imagen_articulo im 
WHERE a.id_articulo=im.id_articulo 
GROUP  BY a.id_articulo ORDER  BY MASVISTO DESC LIMIT 3");

/*==========================================================================LO MÁS VISTO================================================================================*/

/*==========================================================================MOSTRAR ARTICULOS ODONTOLOGIA================================================================================*/
$SQL_CATEGORIA_ODONTO= mysqli_query($mysqli,"SELECT id_articulo_odonto,
titulo_articulo_odonto,descripcion_articulo_odonto, archivo_articulo_odonto, estado_articulo_odonto
FROM articulo_odonto WHERE estado_articulo_odonto='visible' ORDER BY id_articulo_odonto DESC");

/*==========================================================================MOSTRAR ARTICULOS ODONTOLOGIA================================================================================*/
