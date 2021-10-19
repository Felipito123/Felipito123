<?php
include '../../conexion/conexion.php';
include '../../funcionesphp/TOUTF8.php';

$sql =
    "SELECT art.id_articulo,
            art.rut,
            art.titulo_articulo,
            art.descripcion_articulo,
            art.fecha_articulo,
            art.id_categoria_articulo,
            
            cat.nombre_categoria_articulo,
            us.nombre_usuario,
            im.id_imagen_articulo,
            im.nombre_imagen_articulo 

            FROM articulo art, categoria_articulo cat, imagen_articulo im, usuario us

            WHERE cat.id_categoria_articulo=art.id_categoria_articulo and art.rut=us.rut 
            and art.id_articulo=im.id_articulo order by art.id_articulo DESC";

$consulta = mysqli_query($mysqli, $sql);

$datos = array();
while ($fila = mysqli_fetch_array($consulta)) {
    $datos[] = array(
        'ID_ARTICULO' => $fila["id_articulo"],
        'RUT' => $fila["rut"],
        //'ID_USUARIO'=>$fila["id_usuario"],
        'TITULO_ARTICULO' => $fila["titulo_articulo"],
        'DESCRIPCION' => $fila["descripcion_articulo"],
        'FECHA' => $fila["fecha_articulo"],
        'ID_CATEGORIA' => $fila["id_categoria_articulo"],
        'NOMBRE_CATEGORIA' => $fila["nombre_categoria_articulo"],
        'NOMBRE_USUARIO' => $fila["nombre_usuario"],
        'ID_IMAGEN' => $fila["id_imagen_articulo"],
        'NOMBRE_IMAGEN' => $fila["nombre_imagen_articulo"]
    );
}

// $enviar=json_encode($datos);
// echo $enviar;
header('Content-type: application/json');
echo json_encode(toutf8($datos));
mysqli_close($mysqli);
