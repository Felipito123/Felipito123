<?php
include '../conexion/conexion.php';

if (isset($IDencriptado) && !is_numeric($_GET["rd"]) && !ctype_alpha($_GET["rd"]) && !empty($_GET["rd"])) {
    /*comprueba si existe y si no es numerico y si no es alphabetico (esto es porque yo encripto la url y uso alphanumerico, 
    ENTONCES, si alguien en la URL introduce en dt= un numero, o una palabra será incorrecto y pasará al ELSE )*/
    $id = encriptar($IDencriptado, "d");
    // echo '<script>alert("' . $id . '");</script>';

    if (empty($id)) { //PUEDE QUE EL USUARIO ACORTE EL rd ENCRIPTADO O MODIFIQUE LA URL, EN ESE CASO VALIDO.
        echo '<script>window.location = "../saludbucal/";</script>';
    }

    $sql1 = mysqli_query($mysqli, "SELECT id_articulo_odonto, titulo_articulo_odonto, descripcion_articulo_odonto, archivo_articulo_odonto, 
                frase_articulo_odonto, cita_articulo_odonto FROM articulo_odonto WHERE id_articulo_odonto='$id'");

    if (mysqli_num_rows($sql1) == 0) { //porque puede que le introduzca un numero alhpa numerico que aunque si es el formato solicitado no lo encuentre en la BD, entonces lo redirige al principal saludbucal.php
        header('location:../saludbucal/');
    } else {

        $resultado1 = mysqli_fetch_assoc($sql1);

        $titulo_articulo = $resultado1['titulo_articulo_odonto'];
        $decripcion_articulo = $resultado1['descripcion_articulo_odonto'];
        $frase_articulo = $resultado1['frase_articulo_odonto'];
        $cita_articulo = $resultado1['cita_articulo_odonto'];

        //=======================================VERIFICAR ANEXO PARA MOSTRARLO O NO==============================================================//
        $sqlverificaranexo = "SELECT * FROM anexo_odonto WHERE id_articulo_odonto='$id'";
        $res = mysqli_query($mysqli, $sqlverificaranexo);
        $Contar = mysqli_num_rows($res);
        //=======================================VERIFICAR ANEXO PARA MOSTRARLO O NO==============================================================//

        $sql2 = mysqli_query($mysqli, "SELECT DISTINCT cato.id_categoria_odonto,cato.nombre_categoria_odonto FROM categoria_odonto  cato, anexo_odonto ano WHERE cato.id_categoria_odonto=ano.id_categoria_odonto ORDER BY cato.id_categoria_odonto ASC");

        // SELECT * FROM categoria_odonto ORDER BY id_categoria_odonto ASC 
        // SELECT * FROM categoria_odonto  cato, anexo_odonto ano WHERE cato.id_categoria_odonto=ano.id_categoria_odonto ORDER BY cato.id_categoria_odonto ASC;
        // SELECT DISTINCT cato.id_categoria_odonto,cato.nombre_categoria_odonto FROM categoria_odonto  cato, anexo_odonto ano WHERE cato.id_categoria_odonto=ano.id_categoria_odonto ORDER BY cato.id_categoria_odonto ASC;

        $i = 1;
        $tabmenu = '';
        $tabcontent = '';
        while ($fila = mysqli_fetch_array($sql2)) {
            $IDCAT = $fila['id_categoria_odonto'];
            if ($i == 1) { //Para activar el primer valor, el "active"
                $tabmenu .= '<li class="nav-item" role="presentation">
                              <a class="navega active" id="pills-home-tab" data-bs-toggle="pill" href="#u' . $fila['id_categoria_odonto'] . '"" role="tab" aria-controls="pills-home" aria-selected="true">' . $fila['nombre_categoria_odonto'] . '</a>
                             </li>';

                $tabcontent .= '<div class="tab-pane fade show active" id="u' . $fila['id_categoria_odonto'] . '" role="tabpanel" aria-labelledby="pills-home-tab">';
            } else {
                $tabmenu .= '<li class="nav-item" role="presentation">
                               <a class="navega" id="pills-home-tab" data-bs-toggle="pill" href="#u' . $fila['id_categoria_odonto'] . '"" role="tab" aria-controls="pills-home" aria-selected="true">' . $fila['nombre_categoria_odonto'] . '</a>
                            </li>';

                $tabcontent .= '<div class="tab-pane fade show " id="u' . $fila['id_categoria_odonto'] . '" role="tabpanel" aria-labelledby="pills-home-tab">';
            }



            $sql4 = "SELECT * FROM anexo_odonto WHERE id_articulo_odonto='$id' and id_categoria_odonto='$IDCAT'";


            $consulta = mysqli_query($mysqli, $sql4);
            // $Contar = mysqli_num_rows($consulta);

            $tabcontent .=
                '<div class="container">
                <div class="row">
                    <div class="table-responsive">
                        <table class="table" style="width:100%;">
                            <tbody>';

            while ($fila2 = mysqli_fetch_array($consulta)) {
                $titulo_anexo = $fila2['titulo_anexo_odonto'];
                $descripcion_anexo = $fila2['descripcion_anexo_odonto'];
                $ext = pathinfo($fila2['archivo_anexo_odonto'], PATHINFO_EXTENSION); //$fila2['nombre_imagen_anexo_odonto']
                $descarga_archivo = ' <a href="odontologia/' . $fila2['id_articulo_odonto'] . '/' . $fila2['id_anexo_odonto'] . '/' . $fila2['archivo_anexo_odonto'] . '" download>DESCARGA</a> ';
                //$descarga_archivo= '<a onclick="location.href=\'odontologia/'.$fila2['id_articulo_odonto'].'/' .$fila2['id_anexo_odonto']. '/'.$fila2['nombre_imagen_anexo_odonto'].'\'">DESCARGA</a>';
                //$descarga_archivo= '<a href="odontologia/1/2/Salud-bucal-preguntas-frecuentes.png" download>DESCARGA</a>';

                //'odontologia/' . $fila2['id_articulo_odonto'] . '/' . $fila2['id_anexo_odonto'] . '/' . $fila2['nombre_imagen_anexo_odonto'] . '";
                $descarga = '../admodonto/odontologia/' . $fila2['id_articulo_odonto'] . '/' . $fila2['id_anexo_odonto'] . '/' . $fila2['archivo_anexo_odonto'] . '  ';
                if ($ext == "jpg" || $ext == "png" || $ext == "jpeg" || $ext == "JPG" || $ext == "PNG" || $ext == "JPEG") {
                    $mostrararchivo = '../../importantes/ICONOIMAGEN.png';
                } else if ($ext == "pdf") {
                    $mostrararchivo = '../../importantes/ICONOPDF.png';
                }
                //<img src="https://diprece.minsal.cl/wp-content/uploads/2019/05/cuaderno-Familias-que-siembran-sonrisas.png" alt="portada de documento" height="160" width="160">
                //https://diprece.minsal.cl/wp-content/uploads/2019/05/2019.05.15_CUADERNO-VIAJERO-versión-digital-1.pdf
                $tabcontent .= '
                            <tr>
                                <td><img src="' . $mostrararchivo . '" alt="portada de documento" height="160" width="160"></td>
                                <td style="width: 10px;">&nbsp;</td>
                                <td>
                                <p></p>
                                <h4>' . $titulo_anexo . '</h4>
                                <p></p>
                                <p>  
                                ' . nl2br($descripcion_anexo) . '
                                    </br>
                                        <a href="' . $descarga . '" style="float: right;" download>
                                            <img src="../../importantes/BOTONDESCARGAR.png" alt="boton descargar" width="140" height="40">
                                        </a>
                                    </p>
                                </td>
                            </tr>
                    ';
            }

            $tabcontent .= '        
                            </tbody>
                            </table>
                        </div>  
                    </div>
                </div>
            </div>';

            $i++;
        }
    }
} else {
    header('location:../saludbucal/');
}


/*
  <div class="table-responsive">
                        <table class="table" style="width:100%;">
                            <tbody>
                                <tr>
                                    <td><img src="https://diprece.minsal.cl/wp-content/uploads/2019/05/cuaderno-Familias-que-siembran-sonrisas.png" alt="portada de documento" height="160" width="160"></td>
                                    <td style="width: 10px;">&nbsp;</td>
                                    <td>
                                        <p></p>
                                        <h4>Cuaderno Familias que siembran sonrisas</h4>
                                        <p></p>
                                        <p>
                                            <strong>
                                                Año de publicación:
                                            </strong>2019
                                            </br>
                                            <strong>
                                                Nuúmero de páginas:
                                            </strong>16
                                            </br>
                                            <strong>
                                                Formato:
                                            </strong>PDF
                                            </br>
                                            <a href="https://diprece.minsal.cl/wp-content/uploads/2019/05/2019.05.15_CUADERNO-VIAJERO-versión-digital-1.pdf" target="_blank" rel="noopener noreferrer" style="float: right;">
                                                <img src="http://diprece.minsal.cl/wrdprss_minsal/wp-content/uploads/2016/10/boton-descargar-big.png" alt="boton descargar" width="140" height="40">
                                            </a>
                                        </p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

*/