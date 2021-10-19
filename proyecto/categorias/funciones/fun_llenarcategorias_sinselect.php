
<?php
require '../../conexion/conexion.php';

$sql = "SELECT id_categoria_articulo, nombre_categoria_articulo  FROM categoria_articulo ORDER BY nombre_categoria_articulo ASC ";

$consulta = mysqli_query($mysqli, $sql);

$datos = array();
while ($fila = mysqli_fetch_array($consulta)) {
    $datos[] = array(
        'ID_CATEGORIA' => $fila["id_categoria_articulo"],
        'NOMBRE_CATEGORIA' => $fila["nombre_categoria_articulo"]
    );
}

// print json_encode($datos);
header('Content-type: application/json');
echo json_encode($datos);
mysqli_close($mysqli);
