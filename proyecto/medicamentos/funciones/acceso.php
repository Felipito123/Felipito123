<?php
include '../../conexion/conexion.php';
include '../../funcionesphp/limpiarCampo.php';
include '../../funcionesphp/TOUTF8.php';
include '../../funcionesphp/borrarcarpeta.php';
date_default_timezone_set("America/Santiago");
setlocale(LC_TIME, "spanish");

session_start();
$rutsesion = $_SESSION['sesionCESFAM']['rut'];
$seleccion = $_POST['seleccionar'];


if (isset($seleccion)) {

    if ($seleccion == 1) {
        $subseleccion = $_POST['subselect'];
        if ($subseleccion == 1) {
            $sql = "SELECT med.id_medicamento,med.id_tipo_medicamento, med.id_categoria_medicamento, 
            med.nombre_medicamento,med.precio_medicamento, med.dosificacion_medicamento,
            med.imagen_medicamento,med.cantidadminima, med.cantidadmaxima, med.historial,
            med.stock_total,
            tp.nombre_tipo_medicamento, cat.nombre_categoria_medicamento
            FROM medicamento med, tipo_medicamento tp, categoria_medicamento cat
            WHERE med.id_tipo_medicamento=tp.id_tipo_medicamento and 
            med.id_categoria_medicamento=cat.id_categoria_medicamento and visibilidad_medicamento=1";
            $consulta = mysqli_query($mysqli, $sql);
            $datos = array();
            while ($fila = mysqli_fetch_array($consulta)) {
                $datos[] = array(
                    'ID_MEDICAMENTO' => $fila["id_medicamento"],
                    'ID_TIPO_MEDICAMENTO' => $fila["id_tipo_medicamento"],
                    'ID_CATEGORIA_MEDICAMENTO' => $fila["id_categoria_medicamento"],
                    'NOMBRE_TIPO_MEDICAMENTO' => $fila["nombre_tipo_medicamento"],
                    'NOMBRE_CATEGORIA' => $fila["nombre_categoria_medicamento"],
                    'NOMBRE_MEDICAMENTO' => $fila["nombre_medicamento"],
                    'PRECIO_MEDICAMENTO' => $fila["precio_medicamento"],
                    'DOSIFICACION_MEDICAMENTO' => $fila["dosificacion_medicamento"],
                    'STOCK_MEDICAMENTO' => $fila["stock_total"],
                    'IMAGEN_MEDICAMENTO' => $fila["imagen_medicamento"],
                    'CANTIDADMINIMA' => $fila["cantidadminima"],
                    'CANTIDADMAXIMA' => $fila["cantidadmaxima"],
                    'HISTORIAL' => $fila["historial"]
                );
            }
            // header('Content-type: application/json');
            echo json_encode($datos);
            mysqli_close($mysqli);
        } else if ($subseleccion == 2) {
            $sql = "SELECT med.id_medicamento, med.nombre_medicamento, med.imagen_medicamento, med.stock_total,med.visibilidad_medicamento,
            tp.nombre_tipo_medicamento, cat.nombre_categoria_medicamento
            FROM medicamento med, tipo_medicamento tp, categoria_medicamento cat
            WHERE med.id_tipo_medicamento=tp.id_tipo_medicamento and 
            med.id_categoria_medicamento=cat.id_categoria_medicamento and visibilidad_medicamento=0";
            $consulta = mysqli_query($mysqli, $sql);
            $datos = array();
            while ($fila = mysqli_fetch_array($consulta)) {
                $datos[] = array(
                    'ID_MEDICAMENTO' => $fila["id_medicamento"],
                    'NOMBRE_TIPO_MEDICAMENTO' => $fila["nombre_tipo_medicamento"],
                    'NOMBRE_CATEGORIA' => $fila["nombre_categoria_medicamento"],
                    'NOMBRE_MEDICAMENTO' => $fila["nombre_medicamento"],
                    'STOCK_MEDICAMENTO' => $fila["stock_total"],
                    'VISIBILIDAD_MEDICAMENTO' => $fila["visibilidad_medicamento"],
                    'IMAGEN_MEDICAMENTO' => $fila["imagen_medicamento"]
                );
            }
            // header('Content-type: application/json');
            echo json_encode($datos);
            mysqli_close($mysqli);
        }
    } else if ($seleccion == 2) {
        // existenombreycategoriamedicamento
        if (
            isset($_FILES["imagen"]) &&
            isset($_POST["nombre"]) &&
            isset($_POST["precio"]) &&
            isset($_POST["dosificacion"]) &&
            isset($_POST["stock"]) &&
            isset($_POST["tipomedicamento"]) &&
            isset($_POST["categoriamedicamento"])
        ) {
            $nombre = numerosyletras($_POST["nombre"]);
            $precio = solonumeros($_POST["precio"]);
            $dosificacion = dosificacion($_POST["dosificacion"]);
            $stock = solonumeros($_POST["stock"]);
            $tipomedicamento = solonumeros($_POST["tipomedicamento"]);
            $categoriamedicamento = solonumeros($_POST["categoriamedicamento"]);

            $archivo = $_FILES["imagen"];
            $nombrearchivo = $archivo['name'];
            $tipo = $archivo['type'];
            $tamaño = $archivo['size'];
            $fecha = strftime("%Y-%m-%d %X");
            $calculo_cant_minima = floor($stock * 0.3);

            //valida si hay campos vacios
            if (validavacioenarreglo(array($nombre, $precio, $dosificacion, $stock, $tipomedicamento, $categoriamedicamento, $nombrearchivo))) {
                echo 1;
                return;
            } else {
                if ($tipo == "image/jpg" || $tipo == "image/png" || $tipo == "image/jpeg" || $tipo == "image/JPG" || $tipo == "image/PNG" || $tipo == "image/JPEG" || $tipo == "image/bmp") {
                    if ($tamaño <= 20971520) { //Si el Tamaño es de 20 MB o menor esta bien, sino retorna 
                        if (existenombreycategoriamedicamento($mysqli, $nombre, $categoriamedicamento) >= 1) { //ya existe ese medicamento con ese nombre y con la misma categoria EJ: Diazepam puede ser usado en diferentes categorias, tales como: Trastornos del sueño, Trastornos Psiquiátricos, Premedicacipon Anestesica, etc.
                            echo 2;
                            return;
                        } else {

                            $sql = "INSERT INTO medicamento (id_medicamento,
                            id_tipo_medicamento,
                            id_categoria_medicamento,
                            rut,
                            nombre_medicamento,
                            precio_medicamento,
                            dosificacion_medicamento,
                            imagen_medicamento,
                            visibilidad_medicamento,
                            stock_total,
                            cantidadminima,
                            cantidadmaxima,
                            historial,
                            fecha) VALUES (NULL,
                            '$tipomedicamento',
                            '$categoriamedicamento',
                            '$rutsesion',
                            '$nombre',
                            '$precio',
                            '$dosificacion',
                            '$nombrearchivo',
                            1,
                            '$stock',
                            '$calculo_cant_minima',
                            '$stock',
                            '$stock',
                            '$fecha')";

                            $res = mysqli_query($mysqli, $sql); //Hasta aqui inserto el medicamento en la base de datos
                            if (!$res) {
                                echo 3;
                                return;
                            } else {
                                // no puede ser cero esta vez, porque de ser así, hubo error en la consulta o no hay datos en la tabla
                                if (ultimomedicamentoinsertado($mysqli) == 0) {
                                    echo 4;
                                    return;
                                } else {
                                    $ultimoID = ultimomedicamentoinsertado($mysqli);

                                    if (!is_dir('../img/' . $ultimoID . '/')) { //Si no existe el directorio 
                                        mkdir('../img/' . $ultimoID . '/', 0777, true); //lo crea
                                    }
                                    move_uploaded_file($archivo['tmp_name'], '../img/' . $ultimoID . '/' . $nombrearchivo);

                                    $res2 = mysqli_query($mysqli, "INSERT INTO historial_medicamento (id_historial_medicamento,id_medicamento,id_estado_medicamento,stock_historial_medicamento) VALUES (NULL,'$ultimoID',1,'$stock')");
                                    $res3 = mysqli_query($mysqli, "INSERT INTO historial_medicamento (id_historial_medicamento,id_medicamento,id_estado_medicamento,stock_historial_medicamento) VALUES (NULL,'$ultimoID',2,0)");
                                    $res4 = mysqli_query($mysqli, "INSERT INTO historial_medicamento (id_historial_medicamento,id_medicamento,id_estado_medicamento,stock_historial_medicamento) VALUES (NULL,'$ultimoID',3,0)");

                                    if (!$res2 && !$res3 && !$res4) { //no se han insertado en historial_medicamento
                                        echo 5;
                                        return;
                                    } else {
                                        echo 6;
                                        return;
                                    }
                                }
                            }
                        }
                    } else {
                        echo 7;
                        return;
                    }
                } else {
                    echo 8;
                    return;
                }
            }
        } else {
            echo 9;
            return;
        }
    } else if ($seleccion == 3) {

        if (
            isset($_POST["idmedicamento"]) &&
            isset($_POST["nombre"]) &&
            isset($_POST["precio"]) &&
            isset($_POST["dosificacion"]) &&
            isset($_POST["tipomedicamento"]) &&
            isset($_POST["categoriamedicamento"])
        ) {
            $idmedicamento = solonumeros($_POST["idmedicamento"]);
            $nombre = numerosyletras($_POST["nombre"]);
            $precio = solonumeros($_POST["precio"]);
            $dosificacion = dosificacion($_POST["dosificacion"]);
            $tipomedicamento = solonumeros($_POST["tipomedicamento"]);
            $categoriamedicamento = solonumeros($_POST["categoriamedicamento"]);

            $verificar_imagen;

            if (!isset($_FILES["imagen"]["name"])) {
                $verificar_imagen = false;
            } else {
                $archivo = $_FILES["imagen"];
                $nombrearchivo = $archivo['name'];
                $tipo = $archivo['type'];
                $tamaño = $archivo['size'];
                $verificar_imagen = true;
            }

            
            if ($verificar_imagen) { //existe la imagen 
                //valida si hay campos vacios
                if (validavacioenarreglo(array($idmedicamento, $nombre, $precio, $dosificacion, $tipomedicamento, $categoriamedicamento))) {
                    echo 1;
                    return;
                } else {
                    if (existenombreycategoriamedicamentoEditar($mysqli, $idmedicamento, $nombre, $categoriamedicamento) >= 1) { //ya existe ese medicamento con ese nombre y categoria
                        echo 10;
                        return;
                    } else {
                        if ($tipo == "image/jpg" || $tipo == "image/png" || $tipo == "image/jpeg" || $tipo == "image/JPG" || $tipo == "image/PNG" || $tipo == "image/JPEG" || $tipo == "image/bmp") {
                            if ($tamaño <= 20971520) {
                                $sql1 = "UPDATE medicamento SET id_tipo_medicamento='$tipomedicamento',
                            id_categoria_medicamento='$categoriamedicamento',
                            nombre_medicamento='$nombre',
                            precio_medicamento='$precio',
                            dosificacion_medicamento='$dosificacion',
                            imagen_medicamento='$nombrearchivo'
                            WHERE id_medicamento='$idmedicamento'";
                                $res1 = mysqli_query($mysqli, $sql1);
                                if (!$res1) {
                                    echo 2;
                                    return;
                                } else {
                                    borrarcarpeta('../img/' . $idmedicamento); //Borra su contenido
                                    mkdir('../img/' . $idmedicamento . '/', 0777, true); //la crea nuevamente
                                    move_uploaded_file($archivo['tmp_name'], "../img/$idmedicamento/$nombrearchivo"); //y le inserta la imagen modificada

                                    echo 3;
                                    return;
                                }
                            } else { //la imagen no tiene tamaño permitido
                                echo 4;
                                return;
                            }
                        } else {
                            echo 5;
                            return;
                        }
                    }
                }
            } else { //modifica sin imagen

                if (validavacioenarreglo(array($idmedicamento, $nombre, $precio, $dosificacion, $tipomedicamento, $categoriamedicamento))) {
                    echo 6;
                    return;
                } else {
                    if (existenombreycategoriamedicamentoEditar($mysqli, $idmedicamento, $nombre, $categoriamedicamento) >= 1) { //ya existe ese medicamento con ese nombre y categoria
                        echo 10;
                        return;
                    } else {
                        $sql2 = "UPDATE medicamento SET id_tipo_medicamento='$tipomedicamento',
                    id_categoria_medicamento='$categoriamedicamento',
                    nombre_medicamento='$nombre',
                    precio_medicamento='$precio',
                    dosificacion_medicamento='$dosificacion'
                    WHERE id_medicamento='$idmedicamento'";
                        $res2 = mysqli_query($mysqli, $sql2);
                        if (!$res2) {
                            echo 7;
                            return;
                        } else {
                            echo 8;
                            return;
                        }
                    }
                }
            }
        } else {
            echo 9;
            return;
        }
    } else if ($seleccion == 4) {
        if (isset($_POST["accion"]) && isset($_POST["stockasolicitar"]) && isset($_POST["idmedicamento"]) && isset($_POST["cantidadmaxima"]) && isset($_POST["stocktotal"])) {
            $accion = solonumeros($_POST["accion"]);
            $stockasolicitar = solonumeros($_POST["stockasolicitar"]);
            $idmedicamento = solonumeros($_POST["idmedicamento"]);
            $cantidadmaxima = solonumeros($_POST["cantidadmaxima"]);
            $stocktotal = solonumeros($_POST["stocktotal"]);

            $suma = $stocktotal + $stockasolicitar;

            /*Nota: si la accion es 1 (agregar stock) y si el stock a agregar sumado al stock total es mayor a la cantidad maxima inicial, 
            sera el nuevo stock total y el historial del medicamento editado(sumado) */
            if ($accion == 1 && ($suma >= $cantidadmaxima)) { //agregar nuevo stock 

                $cantidadminima = $suma * 0.35;

                $sql = "UPDATE medicamento SET stock_total=stock_total+'$stockasolicitar', 
                cantidadminima='$cantidadminima', 
                cantidadmaxima='$suma', 
                historial=historial+'$stockasolicitar'  
                WHERE id_medicamento='$idmedicamento'";
                $res = mysqli_query($mysqli, $sql);

                $sql2 = "UPDATE historial_medicamento SET stock_historial_medicamento=stock_historial_medicamento+'$stockasolicitar' 
                WHERE id_estado_medicamento=1 and id_medicamento='$idmedicamento'";
                $res2 = mysqli_query($mysqli, $sql2);

                if (!$res && !$res2) {
                    echo 1;
                    return;
                } else {
                    echo 2;
                    return;
                }
            } else if ($accion == 1 && ($suma <= $cantidadmaxima)) { //agregar nuevo stock

                $sql = "UPDATE medicamento SET stock_total=stock_total+'$stockasolicitar', 
                historial=historial+'$stockasolicitar'  
                WHERE id_medicamento='$idmedicamento'";
                $res = mysqli_query($mysqli, $sql);

                $sql2 = "UPDATE historial_medicamento SET stock_historial_medicamento=stock_historial_medicamento+'$stockasolicitar' 
                WHERE id_estado_medicamento=1 and id_medicamento='$idmedicamento'";
                $res2 = mysqli_query($mysqli, $sql2);

                if (!$res && !$res2) {
                    echo 1;
                    return;
                } else {
                    echo 2;
                    return;
                }
            } else if ($accion == 2) { //registrar estado perdido

                //Si la suma de los estados de la tabla historial_medicamento y la del historial de la tabla medicamento es cero, quiere decir que no hay datos
                //disponibles o bien, hay un error
                if (verificarstockmaximo($mysqli, $idmedicamento) == 0 && verificarSumaStockEstados($mysqli, $idmedicamento) == 0) {
                    echo 3;
                    return;
                }
                //La suma de los estados del historial_medicamento no puede ser mayor al historial  del medicamento
                else if (verificarSumaStockEstados($mysqli, $idmedicamento) > verificarstockmaximo($mysqli, $idmedicamento)) {
                    echo 4;
                    return;
                }
                //el historial del medicamento no puede ser menor que el stock que se solicita
                else if (verificarstockmaximo($mysqli, $idmedicamento) < $stockasolicitar) {
                    echo 5;
                    return;
                }
                //No puedo registrar más stock perdido de medicamento del que tiene el estado disponible
                else if (verificarstockDeUnMedicamento($mysqli, 1, $idmedicamento) < $stockasolicitar) {
                    echo 6;
                    return;
                } else {

                    //Sumo stock que solicito al estado 3 (registrar medicamento perdido)
                    $sql = "UPDATE historial_medicamento SET stock_historial_medicamento=stock_historial_medicamento+'$stockasolicitar' 
                    WHERE id_estado_medicamento=3 and id_medicamento='$idmedicamento'";
                    $res = mysqli_query($mysqli, $sql);
                    //Resto stock solicitado al estado disponible 
                    $sql2 = "UPDATE historial_medicamento SET stock_historial_medicamento=stock_historial_medicamento-'$stockasolicitar' 
                    WHERE id_estado_medicamento=1 and id_medicamento='$idmedicamento'";
                    $res2 = mysqli_query($mysqli, $sql2);

                    //Resto el stock a solicitar en el stock_total de la tabla medicamento
                    $sql3 = "UPDATE medicamento SET stock_total=stock_total-'$stockasolicitar' 
                    WHERE id_medicamento='$idmedicamento'";
                    $res3 = mysqli_query($mysqli, $sql3);

                    if (!$res && !$res2 && !$res3) {
                        echo 1;
                        return;
                    } else {
                        echo 2;
                        return;
                    }
                }
            } else if ($accion == 3) { //registrar medicamento entregado

                //Si la suma de los estados de la tabla historial_medicamento y la del historial de la tabla medicamento es cero, quiere decir que no hay datos
                //disponibles o bien, hay un error
                if (verificarstockmaximo($mysqli, $idmedicamento) == 0 && verificarSumaStockEstados($mysqli, $idmedicamento) == 0) {
                    echo 3;
                    return;
                }
                //La suma de los estados del historial_medicamento no puede ser mayor al historial  del medicamento
                else if (verificarSumaStockEstados($mysqli, $idmedicamento) > verificarstockmaximo($mysqli, $idmedicamento)) {
                    echo 4;
                    return;
                }
                //el historial del medicamento no puede ser menor que el stock que se solicita
                else if (verificarstockmaximo($mysqli, $idmedicamento) < $stockasolicitar) {
                    echo 5;
                    return;
                }
                //No puedo registrar más stock entregado de medicamento del que tiene el estado disponible
                else if (verificarstockDeUnMedicamento($mysqli, 1, $idmedicamento) < $stockasolicitar) {
                    echo 7;
                    return;
                } else {

                    //Sumo stock que solicito al estado 2 (registrar medicamento entregado)
                    $sql = "UPDATE historial_medicamento SET stock_historial_medicamento=stock_historial_medicamento+'$stockasolicitar' 
                    WHERE id_estado_medicamento=2 and id_medicamento='$idmedicamento'";
                    $res = mysqli_query($mysqli, $sql);
                    //Resto stock solicitado al estado disponible 
                    $sql2 = "UPDATE historial_medicamento SET stock_historial_medicamento=stock_historial_medicamento-'$stockasolicitar' 
                    WHERE id_estado_medicamento=1 and id_medicamento='$idmedicamento'";
                    $res2 = mysqli_query($mysqli, $sql2);

                    //Resto el stock a solicitar en el stock_total de la tabla medicamento
                    $sql3 = "UPDATE medicamento SET stock_total=stock_total-'$stockasolicitar' 
                    WHERE id_medicamento='$idmedicamento'";
                    $res3 = mysqli_query($mysqli, $sql3);

                    if (!$res && !$res2 && !$res3) {
                        echo 1;
                        return;
                    } else {
                        echo 2;
                        return;
                    }
                }
            } else if ($accion == 4) { //reincorporar medicamento perdido

                // echo verificarstockmaximo($mysqli, $idmedicamento) . '--' . verificarSumaStockEstados($mysqli, $idmedicamento);
                // return;
                //Si la suma de los estados de la tabla historial_medicamento y la del historial de la tabla medicamento es cero, quiere decir que no hay datos
                //disponibles o bien, hay un error
                if (verificarstockmaximo($mysqli, $idmedicamento) == 0 && verificarSumaStockEstados($mysqli, $idmedicamento) == 0) {
                    echo 3;
                    return;
                }
                //La suma de los estados de la tabla historial_medicamento no puede ser mayor al historial de la tabla medicamento
                else if (verificarSumaStockEstados($mysqli, $idmedicamento) > verificarstockmaximo($mysqli, $idmedicamento)) {
                    echo 4;
                    return;
                }
                //el historial del medicamento no puede ser menor que el stock que se solicita
                else if (verificarstockmaximo($mysqli, $idmedicamento) < $stockasolicitar || verificarSumaStockEstados($mysqli, $idmedicamento) < $stockasolicitar) {
                    echo 5;
                    return;
                }
                //No puedo reincorporar más stock de medicamento del que tiene ese estado perdido
                else if (verificarstockDeUnMedicamento($mysqli, 3, $idmedicamento) < $stockasolicitar) {
                    echo 8;
                    return;
                } else {

                    //Resto el stock a solicitar en el stock_total de la tabla medicamento
                    $sql = "UPDATE medicamento SET stock_total=stock_total+'$stockasolicitar' WHERE id_medicamento='$idmedicamento'";
                    $res = mysqli_query($mysqli, $sql);

                    //Sumo stock que solicito al estado 1 (Estado diponible) de la tabla historial_medicamento
                    $sql1 = "UPDATE historial_medicamento SET stock_historial_medicamento=stock_historial_medicamento+'$stockasolicitar' 
                    WHERE id_estado_medicamento=1 and id_medicamento='$idmedicamento'";
                    $res1 = mysqli_query($mysqli, $sql1);
                    //Resto stock solicitado al estado perdido, porque se han restaurado los perdidos
                    $sql2 = "UPDATE historial_medicamento SET stock_historial_medicamento=stock_historial_medicamento-'$stockasolicitar' 
                    WHERE id_estado_medicamento=3 and id_medicamento='$idmedicamento'";
                    $res2 = mysqli_query($mysqli, $sql2);

                    if (!$res && !$res1 && !$res2) {
                        echo 1;
                        return;
                    } else {
                        echo 2;
                        return;
                    }
                }
            }
        } else {
            echo 9;
            return;
        }
    } else if ($seleccion == 5) {  //llenar stock maximo del estado del historial_medicamento, cuando selecciona opcion de la mantencion
        $idmedicamento = $_POST['idmedicamento'];
        $estado = $_POST['estadohistorialmedicamento'];
        // echo 'ID: '.$idmedicamento.'ESTADO: '.$estado;
        // return;
        if (isset($idmedicamento) && isset($estado)) {
            $sql = "SELECT stock_historial_medicamento FROM historial_medicamento WHERE id_estado_medicamento='$estado' and id_medicamento='$idmedicamento'";
            $resultado = mysqli_query($mysqli, $sql);
            //UTILICE NUMEROS NEGATIVOS PORQUE A VECES EL stock_historial_medicamento MOSTRABA UN 1,2,3 de la base de datos Y LO PASABA COMO ERROR
            if (!$resultado) {
                echo -1;
                return;
            } else {
                if (mysqli_num_rows($resultado) >= 1) {
                    $fila = mysqli_fetch_assoc($resultado);
                    echo $fila['stock_historial_medicamento'];
                    return;
                } else {
                    echo -2;
                    return;
                }
            }
        } else {
            echo -3;
            return;
        }
    } else if ($seleccion == 6) {
        $subselect = $_POST['subselect'];
        if ($subselect == 1) {
            $sql = "SELECT id_tipo_medicamento,nombre_tipo_medicamento FROM tipo_medicamento";
            $consulta = mysqli_query($mysqli, $sql);
            $ljson = '';
            if (!$consulta) {
                echo 1;
                return;
            } else {
                //Toma la comuna por defecto de la sesion
                $ljson .= '<option value="">Seleccione un tipo de medicamento</option>';

                while ($fila1 = mysqli_fetch_array($consulta)) {
                    $idtipomed = $fila1['id_tipo_medicamento'];
                    $nombretipomed = $fila1['nombre_tipo_medicamento'];
                    $ljson .= '<option value="' . $idtipomed . '">' . toutf8($nombretipomed) . '</option>';
                }
                echo $ljson;
                return;
            }
        } else if ($subselect == 2) {
            $sql = "SELECT id_categoria_medicamento,nombre_categoria_medicamento FROM categoria_medicamento";
            $consulta = mysqli_query($mysqli, $sql);
            $ljson = '';
            if (!$consulta) {
                echo 1;
                return;
            } else {
                //Toma la comuna por defecto de la sesion
                $ljson .= '<option value="">Seleccione una categoria</option>';

                while ($fila1 = mysqli_fetch_array($consulta)) {
                    $idcat = $fila1['id_categoria_medicamento'];
                    $nombrecat = $fila1['nombre_categoria_medicamento'];
                    $ljson .= '<option value="' . $idcat . '">' . toutf8($nombrecat) . '</option>';
                }
                echo $ljson;
                return;
            }
        }

        mysqli_close($mysqli);
    } else if ($seleccion == 7) {
        if (isset($_POST["idmedicamento"])) {
            $idmedicamento = solonumeros($_POST["idmedicamento"]);
            if (validavacioenarreglo(array($idmedicamento))) {
                echo 1;
                return;
            } else {
                $sql_Existe_Med_Oculto = "SELECT id_medicamento FROM medicamento WHERE id_medicamento='$idmedicamento' and visibilidad_medicamento='0'";
                $query_Existe_Med_Oculto = mysqli_query($mysqli, $sql_Existe_Med_Oculto);
                $contarfila_Existe_Med_Oculto = mysqli_num_rows($query_Existe_Med_Oculto);

                if ($contarfila_Existe_Med_Oculto >= 1) { // Ya esta oculto el medicamento
                    echo 2;
                    return;
                } else {
                    $sql = "UPDATE medicamento set visibilidad_medicamento=0 WHERE id_medicamento='$idmedicamento'";
                    $res = mysqli_query($mysqli, $sql);

                    if (!$res) { //error en la consulta
                        echo 3;
                        return;
                    } else {
                        echo 4; //Exito
                        return;
                    }
                }
            }
        } else {
            echo 5;
            return;
        }
    } else if ($seleccion == 8) {
        if (isset($_POST["idmedicamento"])) {
            $idmedicamento = solonumeros($_POST["idmedicamento"]);
            if (validavacioenarreglo(array($idmedicamento))) {
                echo 1;
                return;
            } else {
                $sql_Existe_Med_Visible = "SELECT id_medicamento FROM medicamento WHERE id_medicamento='$idmedicamento' and visibilidad_medicamento='1'";
                $query_Existe_Med_Visible = mysqli_query($mysqli, $sql_Existe_Med_Visible);
                $contarfila_Existe_Med_Visible = mysqli_num_rows($query_Existe_Med_Visible);

                if ($contarfila_Existe_Med_Visible >= 1) { // Ya esta visible el medicamento
                    echo 2;
                    return;
                } else {
                    $sql = "UPDATE medicamento set visibilidad_medicamento=1 WHERE id_medicamento='$idmedicamento'";
                    $res = mysqli_query($mysqli, $sql);

                    if (!$res) { //error en la consulta
                        echo 3;
                        return;
                    } else {
                        echo 4; //Exito
                        return;
                    }
                }
            }
        } else {
            echo 5;
            return;
        }
    } else if ($seleccion == 9) {
        $sql = "SELECT id_tipo_medicamento, nombre_tipo_medicamento FROM tipo_medicamento";
        $consulta = mysqli_query($mysqli, $sql);
        $datos = array();
        while ($fila = mysqli_fetch_array($consulta)) {
            $datos[] = array(
                'ID_TIPO_MED' => $fila["id_tipo_medicamento"],
                'NOMBRE_TIPO_MED' => $fila["nombre_tipo_medicamento"]
            );
        }
        // header('Content-type: application/json');
        echo json_encode($datos);
        mysqli_close($mysqli);
    } else if ($seleccion == 10) {
        $sql = "SELECT id_categoria_medicamento, nombre_categoria_medicamento FROM categoria_medicamento";
        $consulta = mysqli_query($mysqli, $sql);
        $datos = array();
        while ($fila = mysqli_fetch_array($consulta)) {
            $datos[] = array(
                'ID_CATEGORIA_MED' => $fila["id_categoria_medicamento"],
                'NOMBRE_CATEGORIA_MED' => $fila["nombre_categoria_medicamento"]
            );
        }
        // header('Content-type: application/json');
        echo json_encode($datos);
        mysqli_close($mysqli);
    } else if ($seleccion == 11) {
        if (isset($_POST["nombretipomed"])) {
            $nombre = numerosyletras($_POST["nombretipomed"]);

            //valida si hay campos vacios
            if (validavacioenarreglo(array($nombre))) {
                echo 1;
                return;
            } else {

                $sql1 = "SELECT id_tipo_medicamento, nombre_tipo_medicamento FROM tipo_medicamento WHERE nombre_tipo_medicamento='$nombre'";
                $query = mysqli_query($mysqli, $sql1);
                $contarfila = mysqli_num_rows($query);

                if ($contarfila >= 1) {
                    echo 2;
                    return;
                } else {
                    $sql = "INSERT INTO tipo_medicamento (id_tipo_medicamento,nombre_tipo_medicamento) VALUES (NULL,'$nombre')";
                    $res = mysqli_query($mysqli, $sql); //Hasta aqui inserto el medicamento en la base de datos

                    if (!$res) {
                        echo 3;
                        return;
                    } else {
                        echo 4;
                        return;
                    }
                }
            }
        } else {
            echo 5;
            return;
        }
    } else if ($seleccion == 12) {
        if (isset($_POST["nombrecatmed"])) {
            $nombre = numerosyletras($_POST["nombrecatmed"]);

            //valida si hay campos vacios
            if (validavacioenarreglo(array($nombre))) {
                echo 1;
                return;
            } else {
                $sql1 = "SELECT id_categoria_medicamento, nombre_categoria_medicamento FROM categoria_medicamento WHERE nombre_categoria_medicamento='$nombre'";
                $query = mysqli_query($mysqli, $sql1);
                $contarfila = mysqli_num_rows($query);

                if ($contarfila >= 1) {
                    echo 2;
                    return;
                } else {
                    $sql = "INSERT INTO categoria_medicamento (id_categoria_medicamento,nombre_categoria_medicamento) VALUES (NULL,'$nombre')";
                    $res = mysqli_query($mysqli, $sql); //Hasta aqui inserto el medicamento en la base de datos

                    if (!$res) {
                        echo 3;
                        return;
                    } else {
                        echo 4;
                        return;
                    }
                }
            }
        } else {
            echo 5;
            return;
        }
    } else if ($seleccion == 13) {
        if (isset($_POST["IDTIPOMED"]) && isset($_POST["tmed"])) {
            $IDTIPOMED = solonumeros($_POST["IDTIPOMED"]);
            $nombretipomed = numerosyletras($_POST["tmed"]);

            //valida si hay campos vacios
            if (validavacioenarreglo(array($IDTIPOMED, $nombretipomed))) {
                echo 1;
                return;
            } else {
                $sql1 = "SELECT id_tipo_medicamento FROM tipo_medicamento WHERE nombre_tipo_medicamento='$nombretipomed'";
                $query = mysqli_query($mysqli, $sql1);
                $contarfila = mysqli_num_rows($query);

                if ($contarfila >= 1) {
                    echo 2;
                    return;
                } else {
                    $sql = "UPDATE tipo_medicamento SET nombre_tipo_medicamento='$nombretipomed' WHERE id_tipo_medicamento='$IDTIPOMED'";
                    $res = mysqli_query($mysqli, $sql); //Hasta aqui edito el medicamento en la base de datos

                    if (!$res) {
                        echo 3;
                        return;
                    } else {
                        echo 4;
                        return;
                    }
                }
            }
        } else {
            echo 5;
            return;
        }
    } else if ($seleccion == 14) {
        if (isset($_POST["IDCATMED"]) && isset($_POST["catmed"])) {
            $IDCATMED = solonumeros($_POST["IDCATMED"]);
            $nombrecatmed = numerosyletras($_POST["catmed"]);

            //valida si hay campos vacios
            if (validavacioenarreglo(array($IDCATMED, $nombrecatmed))) {
                echo 1;
                return;
            } else {
                $sql1 = "SELECT id_categoria_medicamento FROM categoria_medicamento WHERE nombre_categoria_medicamento='$nombrecatmed'";
                $query = mysqli_query($mysqli, $sql1);
                $contarfila = mysqli_num_rows($query);

                if ($contarfila >= 1) {
                    echo 2;
                    return;
                } else {

                    $sql = "UPDATE categoria_medicamento SET nombre_categoria_medicamento='$nombrecatmed' WHERE id_categoria_medicamento='$IDCATMED'";
                    $res = mysqli_query($mysqli, $sql); //Hasta aqui edito el medicamento en la base de datos

                    if (!$res) {
                        echo 3;
                        return;
                    } else {
                        echo 4;
                        return;
                    }
                }
            }
        } else {
            echo 5;
            return;
        }
    } else if ($seleccion == 15) {
        if (isset($_POST["IDTIPOMED"])) {
            $IDTIPOMED = solonumeros($_POST["IDTIPOMED"]);
            // $nombrecatmed = numerosyletras($_POST["catmed"]);

            //valida si hay campos vacios
            if (validavacioenarreglo(array($IDTIPOMED))) {
                echo 1;
                return;
            } else {
                $sql1 = "SELECT med.id_medicamento FROM medicamento med,tipo_medicamento tipmed WHERE med.id_tipo_medicamento=tipmed.id_tipo_medicamento and tipmed.id_tipo_medicamento='$IDTIPOMED'";
                $query = mysqli_query($mysqli, $sql1);
                $contarfila = mysqli_num_rows($query);

                if ($contarfila >= 1) {
                    echo 2;
                    return;
                } else {

                    $sql = "DELETE FROM tipo_medicamento WHERE id_tipo_medicamento='$IDTIPOMED'";
                    $res = mysqli_query($mysqli, $sql); //Hasta aqui elimino el tipo de medicamento en la base de datos

                    if (!$res) {
                        echo 3;
                        return;
                    } else {
                        echo 4;
                        return;
                    }
                }
            }
        } else {
            echo 5;
            return;
        }
    } else if ($seleccion == 16) {
        if (isset($_POST["IDCATMED"])) {
            $IDCATMED = solonumeros($_POST["IDCATMED"]);

            //valida si hay campos vacios
            if (validavacioenarreglo(array($IDCATMED))) {
                echo 1;
                return;
            } else {
                $sql1 = "SELECT med.id_medicamento FROM medicamento med,categoria_medicamento catmed WHERE med.id_categoria_medicamento=catmed.id_categoria_medicamento and catmed.id_categoria_medicamento='$IDCATMED'";
                $query = mysqli_query($mysqli, $sql1);
                $contarfila = mysqli_num_rows($query);

                if ($contarfila >= 1) {
                    echo 2;
                    return;
                } else {

                    $sql = "DELETE FROM categoria_medicamento WHERE id_categoria_medicamento='$IDCATMED'";
                    $res = mysqli_query($mysqli, $sql); //Hasta aqui elimino el tipo de medicamento en la base de datos

                    if (!$res) {
                        echo 3;
                        return;
                    } else {
                        echo 4;
                        return;
                    }
                }
            }
        } else {
            echo 5;
            return;
        }
    }
}



function existenombremedicamento($conexion, $nombremedicamento)
{
    $sql = "SELECT count(id_medicamento) as contar FROM medicamento WHERE nombre_medicamento='$nombremedicamento'";
    $datos = mysqli_query($conexion, $sql);
    $resultado = 0;
    if ($datos && mysqli_num_rows($datos) >= 1) {
        $fila = mysqli_fetch_assoc($datos);
        $resultado = $fila['contar'];
    }
    return $resultado;
}

function existenombreycategoriamedicamento($conexion, $nombremedicamento, $categoriamedicamento)
{
    $sql = "SELECT count(id_medicamento) as contar FROM medicamento WHERE nombre_medicamento='$nombremedicamento' and id_categoria_medicamento='$categoriamedicamento'";
    $datos = mysqli_query($conexion, $sql);
    $resultado = 0;
    if ($datos && mysqli_num_rows($datos) >= 1) {
        $fila = mysqli_fetch_assoc($datos);
        $resultado = $fila['contar'];
    }
    return $resultado;
}

function existenombreycategoriamedicamentoEditar($conexion, $idmedicamento, $nombremedicamento, $categoriamedicamento)
{
    $sql = "SELECT count(id_medicamento) as contar FROM medicamento WHERE nombre_medicamento='$nombremedicamento' and id_categoria_medicamento='$categoriamedicamento' and id_medicamento!='$idmedicamento'";
    $datos = mysqli_query($conexion, $sql);
    $resultado = 0;
    if ($datos && mysqli_num_rows($datos) >= 1) {
        $fila = mysqli_fetch_assoc($datos);
        $resultado = $fila['contar'];
    }
    return $resultado;
}

function ultimomedicamentoinsertado($conexion)
{
    $sql = "SELECT MAX(id_medicamento) AS identificador FROM medicamento";
    $datos = mysqli_query($conexion, $sql);
    $resultado = 0;
    if ($datos && mysqli_num_rows($datos) >= 1) {
        $fila = mysqli_fetch_assoc($datos);
        $resultado = $fila['identificador'];
    }
    return $resultado;
}

//=================================================================================================================//
function verificarstockmaximo($conexion, $IDMEDICAMENTO)
{
    $sql = "SELECT historial FROM medicamento WHERE id_medicamento='$IDMEDICAMENTO'";
    $datos = mysqli_query($conexion, $sql);
    $resultado = 0;
    if ($datos && mysqli_num_rows($datos) >= 1) {
        $fila = mysqli_fetch_assoc($datos);
        $resultado = $fila['historial'];
    }
    return $resultado;
}

function verificarSumaStockEstados($conexion, $IDMEDICAMENTO)
{
    $sql = "SELECT SUM(stock_historial_medicamento) as sumaEstados FROM historial_medicamento WHERE id_medicamento='$IDMEDICAMENTO'";
    $datos = mysqli_query($conexion, $sql);
    $resultado = 0;
    if ($datos && mysqli_num_rows($datos) >= 1) {
        $fila = mysqli_fetch_assoc($datos);
        $resultado = $fila['sumaEstados'];
    }
    return $resultado;
}

function verificarstockDeUnMedicamento($conexion, $IDESTADO, $IDMEDICAMENTO)
{
    $sql = "SELECT stock_historial_medicamento FROM historial_medicamento WHERE id_estado_medicamento='$IDESTADO' and id_medicamento='$IDMEDICAMENTO'";
    $datos = mysqli_query($conexion, $sql);
    $resultado = 0;
    if ($datos && mysqli_num_rows($datos) >= 1) {
        $fila = mysqli_fetch_assoc($datos);
        $resultado = $fila['stock_historial_medicamento'];
    }
    return $resultado;
}
