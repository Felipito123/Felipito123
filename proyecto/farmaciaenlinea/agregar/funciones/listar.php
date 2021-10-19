<?php
// session_start();
include '../../../conexion/conexion.php';
include '../../../funcionesphp/limpiarCampo.php';
include '../../../funcionesphp/TOUTF8.php';

if (isset($_POST['seleccionar'])) {
    $seleccionar = $_POST['seleccionar'];
    if ($seleccionar == 1) {
        $agregaraconsulta = "";

        if (isset($_POST['buscarnombre']) && !empty($_POST['buscarnombre'])) {
            $buscarnombre = $_POST['buscarnombre'];
            $agregaraconsulta .= " AND (nombre_medicamento LIKE '%$buscarnombre%') ";
        }

        if (isset($_POST['buscarcategoria']) && !empty($_POST['buscarcategoria'])) {
            $buscarcategoria = $_POST['buscarcategoria'];
            $agregaraconsulta .= " AND (id_categoria_medicamento LIKE '%$buscarcategoria%') ";
        }

        // if ((isset($_POST['valorpaginador']) && !empty($_POST['valorpaginador'])) && ((isset($_POST['totalregistros']) && !empty($_POST['totalregistros'])))) {
        //     $valorpaginador = $_POST['valorpaginador'];
        //     $totalregistros = $_POST['totalregistros'];
        //     $agregaraconsulta .= " ORDER BY id_medicamento DESC LIMIT $valorpaginador"; //, $totalregistros 
        // } else {
        //     $agregaraconsulta .= " ORDER BY id_medicamento DESC LIMIT 4"; //, $totalregistros 
        // }


        $sql = "SELECT id_medicamento,nombre_medicamento, dosificacion_medicamento,stock_total, imagen_medicamento FROM medicamento WHERE visibilidad_medicamento=1 and stock_total > 0" . $agregaraconsulta;
        $consulta = mysqli_query($mysqli, $sql);
        $concatenar = '';
        $datos = array();

        if (!$consulta) {
            // echo $sql; return;
            $concatenar .= '<div class="alert alert-danger" role="alert" style="margin-left:320px">Estimado usuario, acaba de ocurrir algo inesperado. Verifique su conexión, y si persiste el mensaje, contacte a soporte.</div>';
        } else {
            // echo $sql; return;

            while ($fila = mysqli_fetch_array($consulta)) {
                // $ID = $fila['id_medicamento'];
                // $NOMBRE = $fila['nombre_medicamento'];
                // $DESCRIPCION = $fila['dosificacion_medicamento'];
                // $STOCKTOTAL = $fila['stock_total'];
                // $IMAGEN = $fila['imagen_medicamento'];

                //     $concatenar .= '
                //     <div class="col-lg-3 col-md-6 mb-4 mb-lg-0 pb-3">
                //     <!-- Card-->
                //     <div class="card rounded shadow-sm border-0">
                //         <!--height: 650px; max-height: 700px; -->
                //         <div class="row justify-content-center">
                //             <button class="btn btn-danger col-4 botonagregar" value="' . $ID . ',' . $STOCKTOTAL . ',' . $IMAGEN . '" style="border-radius: 0px 0px 10px 10px;height:35px"><i class="fas fa-plus-circle" style="font-size:20px"></i></button>
                //         </div>
                //         <div class="card-body p-4">
                //             <img src="../../medicamentos/img/' . $ID . '/' . $IMAGEN . '" alt="" class="img-fluid d-block mx-auto mb-3">

                //             <div class="row justify-content-center">
                //                 <div class="col-lg-12">
                //                     <div class="input-group mb-4">
                //                         <div class="input-group-prepend">
                //                             <button type="button" class="btn btn-danger botondecrementar" value="' . $ID . '"><i class="fas fa-minus-square"></i></button>
                //                         </div>
                //                         <input type="text" id="campocantidad-' . $ID . '" name="campocantidad-' . $ID . '" onkeyup="detectacambio(' . $ID . ',' . $STOCKTOTAL . ')" pattern="[1-9]+" onkeypress="return solonumeros(event)" class="col-sm-12 form-control input-number text-center" onpaste="return false" value="1" min="1" max="' . $STOCKTOTAL . '">
                //                         <div class="input-group-append">
                //                             <button type="button" class="btn btn-success botonincrementar" value="' . $ID . ',' . $STOCKTOTAL . '"><i class="fas fa-plus-square"></i></button>
                //                         </div>
                //                     </div>
                //                 </div>
                //             </div>

                //             <h5 class="text-dark" id="camponombre-' . $ID . '">' . $NOMBRE . '</h5>
                //             <p class="small text-muted font-italic" id="campodescripcion-' . $ID . '">' . $DESCRIPCION . '</p>

                //         </div>
                //     </div>
                // </div> ';

                $datos["Medicamentos"][] = array(
                    'ID'            => $fila['id_medicamento'],
                    'STOCKTOTAL'    => $fila['stock_total'],
                    'IMAGEN'        => $fila['imagen_medicamento'],
                    'NOMBRE'        => $fila['nombre_medicamento'],
                    'DESCRIPCION'   => $fila['dosificacion_medicamento']
                );
            }
        }
        // echo $concatenar;
        echo json_encode(toutf8($datos));
        return;
    } else if ($seleccionar == 2) {
        $sql = "SELECT id_medicamento FROM medicamento WHERE visibilidad_medicamento=1";
        $consulta = mysqli_query($mysqli, $sql);
        $contarfilas = mysqli_num_rows($consulta);
        echo $contarfilas;
        return;
    } else {
        echo 1;
        return;
    }
} else {
    echo 2;
    return;
}
