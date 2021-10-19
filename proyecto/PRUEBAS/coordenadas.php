<?php
// session_start();
// if (isset($_SESSION['sesionCESFAM'])) { //VALIDA SI LA SESION ESTA INICIADAz
//     $rut = $_SESSION["sesionCESFAM"]["rut"];
// } else { //SINO LO REDIRIGE AL INDEX
//     header("Location:../inicio/");
// }
?>
<?php include '../dashboard/head.php'; ?>

<title>Salud los Álamos - COORDENADAS</title>

</head>

<body id="page-top">
    <?php ?>
    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php include '../dashboard/sidebar.php'; ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content" class="pb-4">

                <?php include '../dashboard/topbar.php'; ?>

                <!-- Begin Page Content -->
                <div class="container-fluid" id="contenedorgeneral">

                    <div class="container pt-4 pb-3">
                        <div class="row">
                            <div class="col-12">
                                <div class="progress" style="height: 9px;">
                                    <div class="progress-bar bg-morado" role="progressbar" style="width: 50%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                    <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <style>
                        @media screen and (max-width: 450px) {

                            .controlatamaño {
                                height: 1.8rem !important;
                                width: 1.8rem !important;
                                font-size: .70rem !important;
                                text-align: center;
                            }
                        }

                        /* .btn-xl {
                                width: 70px;
                                height: 70px;
                                padding: 10px 16px;
                                font-size: 24px;
                                line-height: 1.33;
                                border-radius: 35px;
                            } */
                    </style>

                    <?php
                    /*========================================SQL================================================== */

                    // CREATE TABLE `coordenadas` (
                    //     `id` int(11) NOT NULL AUTO_INCREMENT,
                    //     `a1` int(11) NOT NULL,
                    //     `a2` int(11) NOT NULL,
                    //     `a3` int(11) NOT NULL,
                    //     `a4` int(11) NOT NULL,
                    //     `a5` int(11) NOT NULL,
                    //     `b1` int(11) NOT NULL,
                    //     `b2` int(11) NOT NULL,
                    //     `b3` int(11) NOT NULL,
                    //     `b4` int(11) NOT NULL,
                    //     `b5` int(11) NOT NULL,
                    //     `c1` int(11) NOT NULL,
                    //     `c2` int(11) NOT NULL,
                    //     `c3` int(11) NOT NULL,
                    //     `c4` int(11) NOT NULL,
                    //     `c5` int(11) NOT NULL,
                    //     `d1` int(11) NOT NULL,
                    //     `d2` int(11) NOT NULL,
                    //     `d3` int(11) NOT NULL,
                    //     `d4` int(11) NOT NULL,
                    //     `d5` int(11) NOT NULL,
                    //     `e1` int(11) NOT NULL,
                    //     `e2` int(11) NOT NULL,
                    //     `e3` int(11) NOT NULL,
                    //     `e4` int(11) NOT NULL,
                    //     `e5` int(11) NOT NULL,
                    //     `f1` int(11) NOT NULL,
                    //     `f2` int(11) NOT NULL,
                    //     `f3` int(11) NOT NULL,
                    //     `f4` int(11) NOT NULL,
                    //     `f5` int(11) NOT NULL,
                    //     `g1` int(11) NOT NULL,
                    //     `g2` int(11) NOT NULL,
                    //     `g3` int(11) NOT NULL,
                    //     `g4` int(11) NOT NULL,
                    //     `g5` int(11) NOT NULL,
                    //     `h1` int(11) NOT NULL,
                    //     `h2` int(11) NOT NULL,
                    //     `h3` int(11) NOT NULL,
                    //     `h4` int(11) NOT NULL,
                    //     `h5` int(11) NOT NULL,
                    //     `i1` int(11) NOT NULL,
                    //     `i2` int(11) NOT NULL,
                    //     `i3` int(11) NOT NULL,
                    //     `i4` int(11) NOT NULL,
                    //     `i5` int(11) NOT NULL,
                    //      primary key (id)
                    //   ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



                    $mysqele = mysqli_connect("localhost", "root", "", "coordenadasdb");
                    if (!$mysqele) {
                        echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
                        exit;
                    }


                    // $sql = '';
                    $sql = 'INSERT INTO coordenadas (id,a1, a2, a3, a4, a5, 
                                        b1, b2, b3, b4, b5, 
                                        c1, c2, c3, c4, c5,
                                        d1, d2, d3, d4, d5, 
                                        e1, e2, e3, e4, e5,
                                        f1, f2, f3, f4, f5,
                                        g1, g2, g3, g4, g5,
                                        h1, h2, h3, h4, h5, 
                                        i1, i2, i3, i4, i5) VALUES (NULL,';

                    for ($i = 1; $i <= 45; $i++) {
                        // $rand = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'a', 'b', 'c', 'd', 'e', 'f');

                        $rand = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9');
                        $r = $rand[rand(0, 9)] . $rand[rand(0, 9)];

                        // if ($i % 5 == 0) {
                        //     $br = '<br>';
                        // } else {
                        //     $br = '';
                        // }
                        $sql .= '"' . $r . '",';

                        // $sql .= '"' . $r . '"'.$br;
                    }

                    $sql .= ')';

                    $sql = str_replace(",)", ")", $sql);


                    $res = mysqli_query($mysqele, "$sql");

                    if (!$res) {
                        echo "ALGO PASO" . '<br>';
                    } else {
                        echo $sql . '<br>';
                    }



                    /***********************************ESCOGER 3 NUMERO NO REPETIDOS************************************************* */
                    $x = 0;
                    $valores = array();
                    while ($x < 3) {
                        $lista = array(
                            'a1', 'a2', 'a3', 'a4', 'a5',
                            'b1', 'b2', 'b3', 'b4', 'b5',
                            'c1', 'c2', 'c3', 'c4', 'c5',
                            'd1', 'd2', 'd3', 'd4', 'd5',
                            'e1', 'e2', 'e3', 'e4', 'e5',
                            'f1', 'f2', 'f3', 'f4', 'f5',
                            'g1', 'g2', 'g3', 'g4', 'g5',
                            'h1', 'h2', 'h3', 'h4', 'h5',
                            'i1', 'i2', 'i3', 'i4', 'i5'
                        );
                        $num_aleatorio = $lista[rand(0, 44)];

                        // $num_aleatorio = rand(1, $max);
                        if (!in_array($num_aleatorio, $valores)) {
                            array_push($valores, $num_aleatorio);
                            $x++;
                        }
                    }

                    $contadordevalores = count($valores);

                    $consultaCoordenadas = "SELECT ";
                    $GuardaValores = "";

                    for ($i = 0; $i < $contadordevalores; $i++) {
                        // echo 'Valores: ' . $valores[$i] . '<br>';
                        $consultaCoordenadas .= $valores[$i] . ',';
                        $GuardaValores .= $valores[$i] . ',';
                    }
                    $consultaCoordenadas .= "- FROM coordenadas WHERE id=1";
                    $GuardaValores .= "-";

                    $porcion = explode(',', $GuardaValores);

                    $consultaCoordenadas = str_replace(",-", " ", $consultaCoordenadas);
                    $GuardaValores = str_replace(",-", " ", $GuardaValores);

                    echo '<br> Parámetros a consultar: ' . $GuardaValores . '<br><br>';

                    $res2 = mysqli_query($mysqele, "$consultaCoordenadas");

                    if (!$res2) {
                        echo 'consulta con error';
                    } else {
                        echo 'consulta hecha';
                    }

                    echo '<br><br>';

                    $obtener = mysqli_fetch_assoc($res2);
                    echo ' : ' . $obtener[$porcion[0]] . '  : ' . $obtener[$porcion[1]] . '   : ' . $obtener[$porcion[2]];

                    ?>

                    <div class="row justify-content-center pt-2">
                        <div class="col-6">
                            <div class="input-group pb-4">

                                <div class="col-4 text-center">
                                    <label class="btn btn-info btn-circle btn-lg text-center controlatamaño"><?php echo strtoupper($porcion[0]); ?></label>
                                </div>

                                <div class="col-4 text-center">
                                    <label class="btn btn-info btn-circle btn-lg text-center controlatamaño"><?php echo strtoupper($porcion[1]); ?></label>
                                </div>

                                <div class="col-4 text-center">
                                    <label class="btn btn-info btn-circle btn-lg text-center controlatamaño"><?php echo strtoupper($porcion[2]); ?></label>
                                </div>
                            </div>

                            <div class="input-group pl-2" id="grupodecontrasenas">
                                <input type="password" class="form-control text-center" id="uno1" maxLength="2" size="2" min="0" max="99" pattern="[0-9]{2}" onkeypress="return solonumeros(event)" onpaste="return false">
                                <input type="password" class="form-control text-center" id="uno2" maxLength="2" size="2" min="0" max="99" pattern="[0-9]{2}" onkeypress="return solonumeros(event)" onpaste="return false">
                                <input type="password" class="form-control text-center" id="uno3" maxLength="2" size="2" min="0" max="99" pattern="[0-9]{2}" onkeypress="return solonumeros(event)" onpaste="return false">
                            </div>
                        </div>
                    </div>



                    <div class="container" style="padding-bottom: 700px;">
                        <div class="row justify-content-center">


                            <style>
                                td {
                                    font-weight: bold;
                                    color: black;
                                }

                                #tablahijos.table-bordered {
                                    border: 1px solid black;
                                    margin-top: 20px;
                                }

                                #tablahijos.table-bordered>thead>tr>th {
                                    border: 1px solid black;
                                }

                                #tablahijos.table-bordered>tbody>tr>td {
                                    border: 1px solid black;
                                }
                            </style>

                            <div class="table-responsive">
                                <table class="table table-bordered text-center" id="tablahijos">
                                    <thead>
                                        <tr style="background-color: #438EB9;color:white;">
                                            <th></th>
                                            <th>A</th>
                                            <th>B</th>
                                            <th>C</th>
                                            <th>D</th>
                                            <th>E</th>
                                            <th>F</th>
                                            <th>G</th>
                                            <th>H</th>
                                            <th>I</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">

                                        <?php
                                        $sqlCoordTabla = "SELECT * FROM coordenadas WHERE id=1";
                                        $consultaCoordTabla = mysqli_query($mysqele, $sqlCoordTabla);

                                        $llenatabla = '';

                                        while ($fila = mysqli_fetch_array($consultaCoordTabla)) {

                                            // $llenatabla .= '<tr>';
                                            for ($i = 1; $i <= 5; $i++) {  // 5 * 9   = 5 FILAS X 9 COLUMNAS

                                                // $llenatabla .= $fila["a$i"] . ' ' . $fila["b$i"] . ' '. $fila["c$i"] . ' ' . $fila["d$i"] . ' ' . $fila["e$i"] . ' ' . $fila["f$i"] . ' ' . $fila["g$i"] . ' ' . $fila["h$i"] . ' ' . $fila["i$i"] .'<br>';     

                                                $llenatabla .= '<tr>';
                                                $llenatabla .= '<td class="font-weight-bold" style="background-color: #438EB9;color:white;font-size:17px">' . $i . '</td>';
                                                $llenatabla .= '<td>' . $fila["a$i"] . '</td>';
                                                $llenatabla .= '<td>' . $fila["b$i"] . '</td>';
                                                $llenatabla .= '<td>' . $fila["c$i"] . '</td>';
                                                $llenatabla .= '<td>' . $fila["d$i"] . '</td>';
                                                $llenatabla .= '<td>' . $fila["e$i"] . '</td>';
                                                $llenatabla .= '<td>' . $fila["f$i"] . '</td>';
                                                $llenatabla .= '<td>' . $fila["g$i"] . '</td>';
                                                $llenatabla .= '<td>' . $fila["h$i"] . '</td>';
                                                $llenatabla .= '<td>' . $fila["i$i"] . '</td>';
                                                $llenatabla .= '</tr>';

                                                // if($i==1){
                                                //     $llenatabla.='fila '.$i.': ';
                                                //     $llenatabla .= $fila["a$i"] . ' ' . $fila["b$i"] . ' '. $fila["c$i"] . ' ' . $fila["d$i"] . ' ' . $fila["e$i"] . ' ' . $fila["f$i"] . ' ' . $fila["g$i"] . ' ' . $fila["h$i"] . ' ' . $fila["i$i"] .'<br>';     
                                                // }else if($i==2){
                                                //     $llenatabla.='fila '.$i.': ';
                                                //     $llenatabla .= $fila["a$i"] . ' ' . $fila["b$i"] . ' '. $fila["c$i"] . ' ' . $fila["d$i"] . ' ' . $fila["e$i"] . ' ' . $fila["f$i"] . ' ' . $fila["g$i"] . ' ' . $fila["h$i"] . ' ' . $fila["i$i"] .'<br>';  
                                                // }else if($i==3){
                                                //     $llenatabla.='fila ' .$i.': ';
                                                //     $llenatabla .= $fila["a$i"] . ' ' . $fila["b$i"] . ' '. $fila["c$i"] . ' ' . $fila["d$i"] . ' ' . $fila["e$i"] . ' ' . $fila["f$i"] . ' ' . $fila["g$i"] . ' ' . $fila["h$i"] . ' ' . $fila["i$i"] .'<br>';  
                                                // }else if($i==4){
                                                //     $llenatabla.='fila '.$i.': ';
                                                //     $llenatabla .= $fila["a$i"] . ' ' . $fila["b$i"] . ' '. $fila["c$i"] . ' ' . $fila["d$i"] . ' ' . $fila["e$i"] . ' ' . $fila["f$i"] . ' ' . $fila["g$i"] . ' ' . $fila["h$i"] . ' ' . $fila["i$i"] .'<br>';  
                                                // }else if($i==5){
                                                //     $llenatabla.='fila '.$i.': ';
                                                //     $llenatabla .= $fila["a$i"] . ' ' . $fila["b$i"] . ' '. $fila["c$i"] . ' ' . $fila["d$i"] . ' ' . $fila["e$i"] . ' ' . $fila["f$i"] . ' ' . $fila["g$i"] . ' ' . $fila["h$i"] . ' ' . $fila["i$i"] .'<br>';  
                                                // }
                                                // $llenatabla .= $fila["a$i"].' ';                       
                                            }



                                            // for ($i=1; $i <=5; $i++) { 

                                            //     $llenatabla .= $fila["b$i"].' ';                       
                                            // }

                                            // for ($i = 1; $i <= 5; $i++) {

                                            //     for ($j = 1; $j <= 9; $j++) {
                                            //         $llenatabla .= $fila[$i][$j];
                                            //     }

                                            //     // $llenatabla .='
                                            //     //     <td>'.$fila["a$j"].'</td>';

                                            //     // $llenatabla .= $fila["a$i"] . ' ' . $fila["b$i"] . ' '. $fila["c$i"] . ' ' . $fila["d$i"] . ' ' . $fila["e$i"] . ' ' . $fila["f$i"] . ' ' . $fila["g$i"] . ' ' . $fila["h$i"] . ' ' . $fila["i$i"] .'<br>';
                                            // }

                                            // if($fila['a1'] || $fila['b1'] || $fila['c1'] || $fila['d1'] || $fila['e1'] || $fila['f1'] || $fila['g1'] || $fila['h1'] || $fila['i1'])
                                            // echo $fila['a1']
                                        }

                                        echo $llenatabla;
                                        ?>

                                        <!-- 
                                        <tr>
                                            <td class="font-weight-bold" style="background-color: #438EB9;color:white;font-size:17px">1</td>
                                            <td>01</td>
                                            <td>15</td>
                                            <td>22</td>
                                            <td>03</td>
                                            <td>05</td>
                                            <td>19</td>
                                            <td>43</td>
                                            <td>29</td>
                                            <td>67</td>
                                        </tr> -->


                                    </tbody>
                                </table>
                            </div> <!-- box-body -->

                        </div>

                        <!--                         
                        <div class="row">
                                <div class="col-12">
                                    <script id="infogram_0_a01caac0-7006-4b5b-9a59-3205be996a74" title="Infographic Modern" src="https://e.infogram.com/js/dist/embed.js?OHG" type="text/javascript"></script>
                                </div>
                            </div> -->
                    </div>

                </div>
                <!-- End of Main Content -->

                <?php include '../dashboard/footer.php'; ?>

            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- CAMBIAR EL ITEM DEL NAVBAR SELECCIONADO -->
        <script>
            $("#firmadigital").attr(' class', 'nav-item active');
        </script>

        <script src="../js/validaciongeneral.js"></script>
        <script src="../js/funcionswal.js"></script>
        <script src="../../assets/popper/popper.min.js"></script>
        <script src="../../jsdashboard/sb-admin-2.min.js"></script>


        <script>
            // $('input:password').blur(
            //     function() {
            //         var thisIndex = $(this).index('input:password');

            //         var next = thisIndex + 1;

            //         let largo = $(this).val().length;
            //         // alertify.success(""+largo);


            //         var nextElemId = $('input:password').eq(next).attr('id');
            //         if (nextElemId != undefined || largo == 2) {
            //             // alert(nextElemId);
            //             $('#' + nextElemId).focus();
            //         } else {
            //             return false;
            //         }
            //     });


            // var body = $('body');

            // body.on('keyup', 'input', goToNextInput);

            // function goToNextInput(e) {
            //     var key = e.which,
            //         t = $(e.target),
            //         sib = t.next('input');

            //     if (key != 9 && (key < 48 || key > 57)) {
            //         e.preventDefault();
            //         return false;
            //     }

            //     if (key === 9) {
            //         return true;
            //     }
            // }


            // var contadorvecesPassword=1;
            $('input[type=password]').keyup(function() {

                let largo = $(this).val().length;

                if (largo == 2) {
                    var yourFormFields = $('#grupodecontrasenas').find(':input[type=password]');
                    console.log("yourFormFields: "+yourFormFields);
                    $index = yourFormFields.index(this);
                    console.log("$index: "+ $index);
                    var next = $index + 1;
                    console.log("next: "+next);
                    var nextElemId = $('input:password').eq(next).attr('id');
                    console.log("nextElemId: "+nextElemId);

                    if(nextElemId != undefined){ //Cuando ya no queda input para seguir el nextElemId queda undefined
                        $('#' + nextElemId).focus();   
                    }

                    // contadorvecesPassword++;
                    
                }
                // $mavalue = $(this).val();
                // $.each(yourFormFields, function(i, n) {
                //     if (i > $index) {
                //         yourFormFields.eq(i).val($mavalue);
                //     }
                // });
            });
        </script>
</body>

</html>