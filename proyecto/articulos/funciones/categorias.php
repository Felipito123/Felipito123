<?php
require '../../conexion/conexion.php';
include '../../funcionesphp/limpiarCampo.php';

if (isset($_POST["idcategoria"]) && isset($_POST["nombrecategoria"])) {
    $idcategoria = limpiar_campo($_POST["idcategoria"]);
    $nombrecategoria = limpiar_campo($_POST["nombrecategoria"]);
    $query = "SELECT id_categoria_articulo,nombre_categoria_articulo from categoria_articulo order by nombre_categoria_articulo ASC";

    $result = mysqli_query($mysqli, $query);
    if (!$result) {
        die("error " . mysqli_error($mysqli));
    } 
    else {
        $ljson='';

        while ($row = mysqli_fetch_array($result)) {
            $nombre_categoria = $row['nombre_categoria_articulo'];
            $id_categoria = $row['id_categoria_articulo'];
            
            if ($idcategoria == $id_categoria) {
                $ljson .= '<option value=" '.$idcategoria .'" selected>' . $nombrecategoria . '</option>';
            } else {
                $ljson .= '<option value="' . $id_categoria . '">' . utf8_encode($nombre_categoria) . '</option>';
            }
        }

        echo $ljson;

        mysqli_close($mysqli);
        die();
    }
}
