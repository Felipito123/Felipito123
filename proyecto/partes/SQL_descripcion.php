<?php
include '../conexion/conexion.php';
include '../funcionesphp/obtenerIP.php';
date_default_timezone_set("America/Santiago");
setlocale(LC_TIME, "spanish");
$fechadehoy = strftime("%F");
$horactual = strftime("%X");
$fechaconhoracompleta = $fechadehoy . ' ' . $horactual;

if (isset($obtener_id_encriptado)) {
    $id = encriptar($obtener_id_encriptado, "d");
}
//===================================================Contador de visitas========================================//
$sqlvisitas = "UPDATE articulo SET visualizaciones_articulo=visualizaciones_articulo+1 WHERE id_articulo='$id'";  //lo modifico en la base de datos
mysqli_query($mysqli, $sqlvisitas);  //se envia la consulta a la base de datos

$sqlvisitas2 = "INSERT INTO visitas_articulo (id_vis_art,id_articulo,fecha_vis_art,ip_vis_art) VALUES (NULL,'$id','$fechaconhoracompleta','$obtenerIP')";  //inserto el historial de las visitas del articulo a la base de datos
mysqli_query($mysqli, $sqlvisitas2);  //se envia la consulta a la base de datos

//===================================================Contador de visitas========================================//

$sql1 = mysqli_query($mysqli, "SELECT im.id_imagen_articulo,
                im.id_articulo,
                im.nombre_imagen_articulo,
                a.titulo_articulo,
                a.descripcion_articulo,
                cat.nombre_categoria_articulo,
                a.fecha_articulo,
                a.visualizaciones_articulo,
                a.archivo_articulo 
                FROM imagen_articulo im, articulo a, categoria_articulo cat  
                WHERE im.id_articulo=a.id_articulo and a.id_categoria_articulo=cat.id_categoria_articulo
                and a.id_articulo='$id'");

$resultado = mysqli_fetch_assoc($sql1);

if (empty($resultado["id_articulo"])  || empty($resultado["nombre_imagen_articulo"])) {
    $mostrarimagen = '<img src="../noticias/imagenes/default/no-imagen.jpg" alt="" class="img-fluid">';
} else {
    $mostrarimagen = '<img src="../noticias/imagenes/' . $resultado["id_articulo"] . '/' . $resultado["nombre_imagen_articulo"] . '" alt="" class="img-fluid">';
}

$nombre_categoria = $resultado['nombre_categoria_articulo'];
$titulo_articulo = $resultado['titulo_articulo'];
$fecha = $resultado['fecha_articulo'];
$visitas = $resultado['visualizaciones_articulo'];

if (empty($resultado["archivo_articulo"])  || $resultado["archivo_articulo"] == NULL) {
    $mostrarpdf = '';
} else {
    $mostrarpdf = '<embed src="archivo_articulo/' . $id . '/' . $resultado["archivo_articulo"] . '" type="application/pdf" width="100%" height="700px" style="padding-top:20px;" />';
}

$descripcion = $resultado['descripcion_articulo'];

/*=======================================================Publicación anterior================================================================*/

$sqls_uno = mysqli_query($mysqli, "SELECT im.id_articulo, im.nombre_imagen_articulo,SUBSTRING(a.titulo_articulo, 1, 72) AS titulo FROM imagen_articulo im, articulo a, categoria_articulo cat  
WHERE im.id_articulo=a.id_articulo and a.id_categoria_articulo=cat.id_categoria_articulo
and a.id_articulo  < '$id' ORDER BY a.id_articulo  DESC LIMIT 1");

$resultado_anterior = mysqli_fetch_assoc($sqls_uno);
$contar_publi_anterior = mysqli_num_rows($sqls_uno);

if (empty($resultado_anterior["id_articulo"])  || empty($resultado_anterior["nombre_imagen_articulo"])) {
    $imagen_anterior = '<img src="../noticias/imagenes/default/no-imagen.jpg" alt="" class="img-fluid float-left">';
    $ocultarclaseanterior = true; //la oculto, porque el primero valor de la BD no tiene anterior  y el último valor no tiene siguiente
} else {
    $imagen_anterior = '<img src="../noticias/imagenes/' . $resultado_anterior["id_articulo"] . '/' . $resultado_anterior["nombre_imagen_articulo"] . '" alt="" class="img-fluid float-left">';
    $ocultarclaseanterior = false;
}

/* ----------------------------------------------------------- O ---------------------------------------------------------------------------*/

$sqlss = mysqli_query($mysqli, "SELECT a.id_articulo, im.nombre_imagen_articulo, SUBSTRING(a.titulo_articulo, 1, 72) AS titulo FROM imagen_articulo im, articulo a, categoria_articulo cat  
WHERE im.id_articulo=a.id_articulo and a.id_categoria_articulo=cat.id_categoria_articulo
and a.id_articulo  > '$id' ORDER BY a.id_articulo LIMIT 1");

$resultado_siguiente = mysqli_fetch_assoc($sqlss);
$contar_publi_siguiente = mysqli_num_rows($sqlss);

if (empty($resultado_siguiente["id_articulo"])  || empty($resultado_siguiente["nombre_imagen_articulo"])) {
    $imagen_siguiente = '<img src="../noticias/imagenes/default/no-imagen.jpg" alt="" class="img-fluid float-right">';
    $ocultarclasesiguiente = true; //la oculto, porque el primero valor de la BD no tiene anterior  y el último valor no tiene siguiente
} else {
    $imagen_siguiente = '<img src="../noticias/imagenes/' . $resultado_siguiente["id_articulo"] . '/' . $resultado_siguiente["nombre_imagen_articulo"] . '" alt="" class="img-fluid float-right">';
    $ocultarclasesiguiente = false;
}

/*=======================================================Publicación siguiente================================================================*/


/*=======================================================También te puede interesar================================================================*/
$sql_tatpint = mysqli_query($mysqli, "SELECT a.id_articulo,SUBSTRING(a.titulo_articulo, 1, 37) AS titulo, SUM(a.visualizaciones_articulo) AS visitas, 
a.fecha_articulo, im.nombre_imagen_articulo FROM articulo a, imagen_articulo im WHERE im.id_articulo=a.id_articulo GROUP BY a.id_articulo ORDER BY SUM(a.visualizaciones_articulo) DESC LIMIT 1");

$resultado_tatpint = mysqli_fetch_assoc($sql_tatpint);

if (empty($resultado_tatpint["id_articulo"])  || empty($resultado_tatpint["nombre_imagen_articulo"])) {
    $imagen_tatpint = '<img src="../noticias/imagenes/default/no-imagen.jpg" alt="" style="height:250px">';
} else {
    $imagen_tatpint = '<img src="../noticias/imagenes/' . $resultado_tatpint["id_articulo"] . '/' . $resultado_tatpint["nombre_imagen_articulo"] . '" alt="" style="height:250px">';
}

$sql_tatpint_reciente = mysqli_query($mysqli, "SELECT im.id_imagen_articulo,im.id_articulo, im.nombre_imagen_articulo, SUBSTRING(a.titulo_articulo, 1, 37) AS titulo, a.fecha_articulo FROM imagen_articulo im, articulo a, categoria_articulo cat  
WHERE im.id_articulo=a.id_articulo and 
a.id_categoria_articulo=cat.id_categoria_articulo
ORDER BY im.id_imagen_articulo DESC LIMIT 1");

$resultado_tatpint_reciente = mysqli_fetch_assoc($sql_tatpint_reciente);

if (empty($resultado_tatpint_reciente["id_articulo"])  || empty($resultado_tatpint_reciente["nombre_imagen_articulo"])) {
    $imagen_tatpint_reciente = '<img src="../noticias/imagenes/default/no-imagen.jpg" alt="" style="height:250px">';
} else {
    $imagen_tatpint_reciente = '<img src="../noticias/imagenes/' . $resultado_tatpint_reciente["id_articulo"] . '/' . $resultado_tatpint_reciente["nombre_imagen_articulo"] . '" alt="" style="height:250px">';
}
/*=======================================================También te puede interesar================================================================*/


/*=======================================================DATOS CALIFICACIONES================================================================*/

//Calificacion total de el articulo en particular
$sqlcaliftotal = "SELECT * FROM calificacion_articulo WHERE id_articulo='$id'";
$res1 = mysqli_query($mysqli, $sqlcaliftotal);
$totalcalificacion = mysqli_num_rows($res1);

//promedio total de las calficaciones del articulo
$sql1 = "SELECT SUM(valor_calificacion_articulo) as sumacalificacion FROM calificacion_articulo WHERE id_articulo='$id'";
$res2 = mysqli_query($mysqli, $sql1);
$ressuma = mysqli_fetch_assoc($res2);

if ($totalcalificacion == 0) { //Esto para evitar error en caso de que no halla calificacion y la variable $totalcalificacion sea 0 (dividendo en cero no existe)
    $promedio = 0;
} else {
    $promedio = bcdiv(($ressuma['sumacalificacion'] / $totalcalificacion), '1', 1); //bcdiv ($valor,'1',2) el valor mostrado con un entero('1') y un decimales
}

//conteo de calificaciones de 1 estrella
$sql2 = "SELECT * FROM calificacion_articulo WHERE id_articulo='$id' and valor_calificacion_articulo=1";
$res3 = mysqli_query($mysqli, $sql2);
$calif_uno = mysqli_num_rows($res3);

//conteo de calificaciones de 2 estrella
$sql3 = "SELECT * FROM calificacion_articulo WHERE id_articulo='$id' and valor_calificacion_articulo=2";
$res4 = mysqli_query($mysqli, $sql3);
$calif_dos = mysqli_num_rows($res4);

//conteo de calificaciones de 3 estrella
$sql4 = "SELECT * FROM calificacion_articulo WHERE id_articulo='$id' and valor_calificacion_articulo=3";
$res5 = mysqli_query($mysqli, $sql4);
$calif_tres = mysqli_num_rows($res5);

//conteo de calificaciones de 4 estrella
$sql5 = "SELECT * FROM calificacion_articulo WHERE id_articulo='$id' and valor_calificacion_articulo=4";
$res6 = mysqli_query($mysqli, $sql5);
$calif_cuatro = mysqli_num_rows($res6);

//conteo de calificaciones de 5 estrella
$sql6 = "SELECT * FROM calificacion_articulo WHERE id_articulo='$id' and valor_calificacion_articulo=5";
$res7 = mysqli_query($mysqli, $sql6);
$calif_cinco = mysqli_num_rows($res7);

/*=======================================================DATOS CALIFICACIONES================================================================*/


/*=====================================================================TAGS==================================================================================*/
$sql_tags = mysqli_query($mysqli, "SELECT DISTINCT c.nombre_categoria_articulo FROM categoria_articulo c, articulo art, imagen_articulo im WHERE c.id_categoria_articulo=art.id_categoria_articulo and im.id_articulo=art.id_articulo ORDER BY nombre_categoria_articulo ASC LIMIT 7");
/*
1) Distinct busca los valores distintos es decir, me sirve para buscar valores no repetidos contenidos
2) Lo que quiero consultar para el tags es mostrar los tags que tiene un articulo y ese articulo tenga una imagen (esto último ya que muestro el articulo que tiene una imagen en las noticias)
3) ASC ordena en este caso por orden ascendente el nombre de la categoria con un muestre limite de 7 registros máximos que es el que cabe en el container
*/
/*=====================================================================TAGS==================================================================================*/
