<?php
include '../../conexion/conexion.php';
include '../../funcionesphp/limpiarCampo.php';
include '../../funcionesphp/TOUTF8.php';
include '../../funcionesphp/borrarcarpeta.php';

$seleccion = $_POST['seleccionar'];
if (isset($seleccion)) {

    if ($seleccion == 1) {
        $sql = "SELECT id_categoria_odonto, nombre_categoria_odonto  FROM categoria_odonto ORDER BY nombre_categoria_odonto ASC";

        $consulta = mysqli_query($mysqli, $sql);

        $datos = array();
        while ($fila = mysqli_fetch_array($consulta)) {
            $datos[] = array(
                'ID_CATEGORIA_ODONTO' => $fila["id_categoria_odonto"],
                'NOMBRE_CATEGORIA_ODONTO' => $fila["nombre_categoria_odonto"]
            );
        }

        // print json_encode($datos);
        header('Content-type: application/json');
        echo json_encode($datos); //toutf8()
        mysqli_close($mysqli);
    } else if ($seleccion == 2) { //registrar categoria

        if (isset($_POST['categoriaodonto'])) {

            $nombre_categoria = sololetras($_POST['categoriaodonto']);

            if (validavacioenarreglo(array($nombre_categoria))) {
                echo 11;
                return;
            } else {

                $sql = "SELECT count(nombre_categoria_odonto) as contador FROM categoria_odonto WHERE nombre_categoria_odonto='$nombre_categoria' ";
                $consulta1 = mysqli_query($mysqli, $sql);
                $resultado = mysqli_fetch_assoc($consulta1);

                if ($resultado['contador'] == 1) {
                    echo 1;  //Existe una categoria con el mismo nombre
                    return;
                } else {

                    $consulta = "INSERT INTO categoria_odonto VALUES (NULL,'$nombre_categoria')";

                    if (mysqli_query($mysqli, $consulta)) {
                        echo 2;  //Consulta exitosa
                        return;
                    } else {
                        // die("error " . mysqli_error($mysqli));
                        echo 3;  //Error en la consulta
                        return;
                    }
                }
            }
        }
        mysqli_close($mysqli);
    } else if ($seleccion == 3) { //editar categoria

        if (isset($_POST['ID_CATEGORIA']) && isset($_POST['NOMBRE_CATEGORIA'])) {
            $ID_CATEGORIA = solonumeros($_POST['ID_CATEGORIA']);
            $NOMBRE_CATEGORIA = sololetras($_POST['NOMBRE_CATEGORIA']);

            if (validavacioenarreglo(array($ID_CATEGORIA, $NOMBRE_CATEGORIA))) {
                echo 1;
                return;
            } else {

                $sql_Existe_Categoria = "SELECT count(nombre_categoria_odonto) as contador FROM categoria_odonto WHERE nombre_categoria_odonto='$NOMBRE_CATEGORIA' ";
                $consulta_Existe_Categoria = mysqli_query($mysqli, $sql_Existe_Categoria);
                $resultado_Existe_Categoria = mysqli_fetch_assoc($consulta_Existe_Categoria);

                if ($resultado_Existe_Categoria['contador'] == 1) {
                    echo 6;  //Existe una categoria con el mismo nombre
                    return;
                } else {

                    $sql = "UPDATE categoria_odonto SET nombre_categoria_odonto='$NOMBRE_CATEGORIA' WHERE id_categoria_odonto='$ID_CATEGORIA'";
                    if (mysqli_query($mysqli, $sql)) {
                        echo 2;
                        return;
                    } else {
                        echo 3;
                        return;
                    }
                }
            }
        } else {
            echo 4; //No se han recibido los datos desde categoria_odonto.js
            return;
        }
        mysqli_close($mysqli);
    } else if ($seleccion == 4) { //borrar categoria

        if (isset($_POST['ID_CATEGORIA'])) {
            $ID_CATEGORIA = solonumeros($_POST['ID_CATEGORIA']);

            if (validavacioenarreglo(array($ID_CATEGORIA))) {
                echo 1;
                return;
            } else {
                $sql1 = "SELECT count(C.id_categoria_odonto) as contador 
                FROM categoria_odonto C, anexo_odonto A 
                WHERE C.id_categoria_odonto=A.id_categoria_odonto AND A.id_categoria_odonto='$ID_CATEGORIA'";

                $consulta1 = mysqli_query($mysqli, $sql1);
                $resultado1 = mysqli_fetch_assoc($consulta1);

                if ($resultado1['contador'] != 0) {
                    echo 2; //La categoria tiene un articulo, no se puede eliminar
                    return;
                } else {
                    $sqele = "DELETE FROM categoria_odonto WHERE id_categoria_odonto='$ID_CATEGORIA'";
                    if (mysqli_query($mysqli, $sqele)) {
                        echo 3;
                        return;
                    } else { //Hubo un error al borrar la categoria
                        echo 4;
                        return;
                    }
                }
            }
        } else {
            echo 5; //No se han recibido los datos desde categoria_odonto.js
            return;
        }
        mysqli_close($mysqli);
    } else {
        echo 444;
        return;
    }
}
