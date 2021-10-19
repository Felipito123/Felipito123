<?php session_start();

if (!isset($_SESSION['sesionFarmacia']['rut'])) { //SI NO ESTA INICIADA LA SESION LO REDIRIJO AL LOGIN DE MEDICAMENTO
    header("Location: ../");
}
// unset($_SESSION["carrito"]);
// session_destroy();
?>
<?php include 'partes/head.php'; ?>


<title>Salud los Álamos - Listado de medicamentos</title>
</head>

<body id="page-top">
    <!--style="background-color: brown;"-->
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column ">
            <!-- Main Content -->
            <div id="content">
                <?php include 'partes/topbar.php'; ?>
                <?php include '../../conexion/conexion.php'; ?>
                <div class="container-fluid" style="padding-bottom:8%;">

                    <div class="row justify-content-center pb-5 mb-4">
                        <div class="col-lg-3 pb-4">
                            <div class="card rounded shadow-sm" style="border-top: 4px solid #e74a3b;">
                                <div class="card-body">
                                    <img src="../../../importantes/logocesfam-head.png" alt="" class="img-fluid d-block mx-auto mb-3">
                                </div>
                            </div>

                            <div class="pt-4"></div>

                            <!-- <div class="row justify-content-between">
                                <div class="col-xl-12">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <label class="btn bg-secondary form-control col-4 text-white" for="paginador" title="Paginador"><i class="fas fa-sort"></i> </label>
                                            <select class="form-control" id="paginador" onchange="cambioselect(this.value)" required>
                                                <option value="">Seleccione paginador</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div> -->

                            <div class="card rounded shadow-sm">
                                <!--border-top-danger -->
                                <div class="row justify-content-center pt-3">
                                    <i class="fa fa-filter fa-2x ml-4 pr-2"></i>
                                    <h4>Filtrar</h4>
                                </div>
                                <div class="card-body ">
                                    <hr style="max-width: 190px;" />
                                    <!--ROL-->
                                    <?php

                                    $sql = "SELECT DISTINCT catmed.id_categoria_medicamento, catmed.nombre_categoria_medicamento FROM categoria_medicamento catmed, medicamento med WHERE catmed.id_categoria_medicamento=med.id_categoria_medicamento and med.visibilidad_medicamento=1 and med.stock_total > 0";
                                    $consulta = mysqli_query($mysqli, $sql);

                                    if (!$consulta) {
                                        echo '<div class="alert alert-danger" role="alert" style="margin-left:320px">Estimado usuario, acaba de ocurrir algo inesperado. Verifique su conexión, y si persiste el mensaje, contacte a soporte.</div>';
                                    } else {
                                    ?>
                                        <div class="row justify-content-center">
                                            <div class="col-lg-8">
                                                <div class="input-group mb-4">
                                                    <select class="form-control" name="categoriamedicamento" id="categoriamedicamento" required>
                                                        <option value="">Seleccionar categoria</option>
                                                        <?php
                                                        while ($fila = mysqli_fetch_array($consulta)) {
                                                            $ID = $fila['id_categoria_medicamento'];
                                                            $NOMBRE = $fila['nombre_categoria_medicamento'];
                                                            echo '<option value="' . $ID . '">' . $NOMBRE . '</option>'; //utf8_encode($NOMBRE_CATEGORIA)
                                                        }
                                                        ?>
                                                    <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row justify-content-center pt-2">
                                            <div class="col-lg-10">
                                                <button id="btnfiltrocategoria" class="btn btn-outline-danger btn-block"> Aplicar filtro</button>
                                            </div>
                                        </div>

                                </div>
                            </div>


                        </div>

                        <div class="col-lg-9" id="desdeaquipagina">
                            <div class="row" id="filallenar"></div>
                        </div>

                    </div>

                    <div class="row">
                        <!--AQUI VOY A MOSTRAR LOS DATOS DE SESION -->
                        <?php
                        // if (isset($_SESSION["carrito"])) {
                        //     //var_dump($_SESSION["carrito"]);

                        //     echo '<br><br>';
                        //     foreach ($_SESSION['carrito'] as $key => $value) {
                        //         $uid = $value['id'];
                        //         $name = $value['nombre'];
                        //         $descripcion = $value['descripcion'];
                        //         $cantidad = $value['cantidad'];
                        //         $stocktotal = $value['stocktotal'];
                        //         $nombreimagen = $value['nombreimagen'];
                        //         echo "<br>\n" . "Item id: " . $uid .
                        //             ", name: " . $name .
                        //             ", descripcion: " . $descripcion .
                        //             ", cantidad: " . $cantidad .
                        //             ", stocktotal: " . $stocktotal .
                        //             ", Nombre imagen: " . $nombreimagen .
                        //             "<br>\n";
                        //     }
                        // }
                        // if (isset($_SESSION["sesionFarmacia"])) { //para verificar si estaba la sesion para ingresar a la página desde el login
                        //     var_dump($_SESSION["sesionFarmacia"]);
                        // }
                        ?>

                    </div>

                    <section style="padding-bottom:70px;"></section>
                </div>
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer" style="background:brown; color:white;">
                <div class="container my-auto">
                    <div class="row" style="padding: 120px;">
                        <div class="col">
                            <div class="copyright text-center my-auto">
                                <span>Copyright &copy; Todos los derechos reservados 2021</span>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->


    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <script>
        var controladorTiempo = "";
        var maximo = 4;
        var largodearray = 0;
        var artxpaginas = 0;

        function filtra() {
            const url = window.location.search;
            const buscaparametro = new URLSearchParams(url);
            const variableabuscar = buscaparametro.get('bmd');

            if (!variableabuscar == '' || variableabuscar != null) {
                mostrarybuscar(variableabuscar);
            } else {
                limpiaGetenURL();
                mostrarybuscar();
            }

        }


        $("#inputbuscar").on("keyup", function() {
            let input = $('#inputbuscar').val();

            if (input != '' && input != null) {
                window.history.pushState("", "", "?bmd=" + input);
                clearTimeout(controladorTiempo);
                controladorTiempo = setTimeout(filtra, 350); // si en 350 milisegundos no recibe el evento del teclado ahi activa la funcion buscar, porque ha dejado de teclear
            } else {
                limpiaGetenURL();
                mostrarybuscar();
            }
        });

        $("#inputbuscar2").on("keyup", function() {
            let input = $('#inputbuscar2').val();

            if (input != '' && input != null) {
                window.history.pushState("", "", "?bmd=" + input);
                clearTimeout(controladorTiempo);
                controladorTiempo = setTimeout(filtra, 350); // si en 350 milisegundos no recibe el evento del teclado ahi activa la funcion buscar, porque ha dejado de teclear
            } else {
                limpiaGetenURL();
                mostrarybuscar();
            }
        });

        $('#btnfiltrocategoria').on('click', function() {
            let categoria = $('#categoriamedicamento').val();
            if (categoria == '' || categoria == null) {
                alertify.error('Seleccione una categoria');
            } else {
                mostrarybuscar('', categoria);
            }
        });

        $('#categoriamedicamento').on('change', function() {
            let valor = $(this).val();
            // alertify.error('valor: '+valor);
            if (valor == '' || valor == null) mostrarybuscar();
        });

        mostrarybuscar();
        // LlenadoSelect();

        function cambioselect(valorselect) {
            // alertify.success("Valor select: "+valorselect+" largo array: "+largodearray);
            mostrarybuscar(null, null, '' + valorselect, '' + largodearray);
        }

        //, valorpaginador, totalregistros
        function mostrarybuscar(buscanombre, buscacategoria) {
            $.post('funciones/listar.php', {
                seleccionar: 1,
                buscarnombre: buscanombre,
                buscarcategoria: buscacategoria
                // valorpaginador: valorpaginador,
                // totalregistros: totalregistros
            }, function(response) {
                $('#filallenar').html(response);
                // console.log("RECIBIDO: "+response);
                // console.log("Largo: "+response.length);
                // let largolongitud = response.length;

                let jsonresp, contador;
                jsonresp = JSON.parse(response);
                contador = jsonresp.length;

                // console.log("PROBAR DATOS: " + respuesta);
                // console.log("LARGO DEL ARRAY: " + contador);

                // if (response == '' || response == null || response == '  ' || largolongitud == 2) {
                //     $('#filallenar').html('<div class="alert alert-danger" role="alert">No existe coincidencias para el medicamento buscado: ' + buscanombre + '</div>');
                // }

                if (response == '' || response == null || response == '0' || contador == 0) {
                    $('#filallenar').html('<div class="alert alert-danger" role="alert">No existe coincidencias para el medicamento buscado: ' + buscanombre + ' ' + buscacategoria + '</div>');
                } else {
                    $('#desdeaquipagina').pagination({ // you call the plugin
                        dataSource: jsonresp.Medicamentos, // pass all the data
                        pageSize: 8, // Cantidad de articulos por página
                        // pageRange: 2,
                        className: 'paginationjs-theme-red',
                        // position: 'bottom',
                        showNavigator: true,
                        formatNavigator: '<span>Página <%= currentPage %></span> de <%= totalPage %>, con un total de <%= totalNumber %> registros',
                        showGoInput: false,
                        // showGoButton: true,
                        formatGoInput: 'Ir a  <%= input %>',
                        // formatGoButton: 'Buscar <%= button %>',
                        callback: function(data, pagination) {
                            var wrapper = $('#desdeaquipagina #filallenar').empty();
                            $.each(data, function(i, f) {
                                $('#desdeaquipagina #filallenar').append(`
                                    <div class="col-lg-3 col-md-6 mb-4 mb-lg-0 pb-3">
                                        <!-- Card-->
                                        <div class="card rounded shadow-sm border-0">
                                            <!--height: 650px; max-height: 700px; -->
                                            <div class="row justify-content-center">
                                                <button class="btn btn-danger col-4 botonagregar" value="` + f.ID + `,` + f.STOCKTOTAL + `,` + f.IMAGEN + `" style="border-radius: 0px 0px 10px 10px;height:35px"><i class="fas fa-plus-circle" style="font-size:20px"></i></button>
                                            </div>
                                            <div class="card-body p-4">
                                                <img src="../../medicamentos/img/` + f.ID + `/` + f.IMAGEN + `" alt="" class="img-fluid d-block mx-auto mb-3">

                                                <div class="row justify-content-center">
                                                    <div class="col-lg-12">
                                                        <div class="input-group mb-4">
                                                            <div class="input-group-prepend">
                                                                <button type="button" class="btn btn-danger botondecrementar" value="` + f.ID + `"><i class="fas fa-minus-square"></i></button>
                                                            </div>
                                                            <input type="text" id="campocantidad-` + f.ID + `" name="campocantidad-` + f.ID + `" onkeyup="detectacambio(` + f.ID + `,` + f.STOCKTOTAL + `)" pattern="[1-9]+" onkeypress="return solonumeros(event)" class="col-sm-12 form-control input-number text-center" onpaste="return false" value="1" min="1" max="` + f.STOCKTOTAL + `">
                                                            <div class="input-group-append">
                                                                <button type="button" class="btn btn-success botonincrementar" value="` + f.ID + `,` + f.STOCKTOTAL + `"><i class="fas fa-plus-square"></i></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <h5 class="text-dark" id="camponombre-` + f.ID + `">` + f.NOMBRE + `</h5>
                                                <p class="small text-muted font-italic" id="campodescripcion-` + f.ID + `">` + f.DESCRIPCION + `</p>

                                            </div>
                                        </div>
                                    </div> 
                                `);
                            });
                        }
                    });
                }

                $('.botonagregar').on('click', function() {
                    let valor = $(this).val().split(',');
                    botonagregaralcarrito(valor[0], valor[1], valor[2]);
                    // alertify.error('' + $(this).val());
                });
                $('.botondecrementar').on('click', function() {
                    let valor = $(this).val();
                    botondecrementar(valor);
                    // alertify.error('' + $(this).val());
                });
                $('.botonincrementar').on('click', function() {
                    let valor = $(this).val().split(',');
                    botonincrementar(valor[0], valor[1]);
                    detectacambio(valor[0], valor[1]);
                    // alertify.error('' + $(this).val());
                });


            });
        }

        // function LlenadoSelect() {
        //     $.post('funciones/listar.php', {
        //         seleccionar: 2
        //     }, function(respuesta) {
        //         // console.log("RESP: " + respuesta);
        //         if (respuesta == 0) { //No hay datos
        //             $('#paginador').html('<div class="alert alert-danger text-center" role="alert"> Estimado(a) : No hay medicamentos para mostrar</div>');
        //         } else {
        //             /*=================================================PAGINADOR========================================*/
        //             largodearray = respuesta;
        //             artxpaginas = parseInt(largodearray / maximo);

        //             if (artxpaginas == 0) { //en caso de que el maximo sea mayor al largo del array el artxpaginas va a dar cero
        //                 artxpaginas = 1;
        //                 maximo = largodearray;
        //             }
        //             // console.log("artxpaginas: " + artxpaginas);
        //             /*=================================================PAGINADOR========================================*/

        //             /*=================================================LLENA SELECT========================================*/
        //             let llenarselect = '';
        //             for (let i = 1; i <= artxpaginas; i++) {

        //                 if ((maximo * i) == largodearray) {
        //                     llenarselect += '<option value="' + (maximo * i) + '">Página: ' + i + ' - todos</option>';
        //                 } else {
        //                     llenarselect += '<option value="' + (maximo * i) + '">Página: ' + i + ' - ' + (maximo * i) + ' registro(s)</option>';
        //                 }

        //                 if ((maximo * i) < largodearray && i == artxpaginas) {
        //                     llenarselect += '<option value="' + ((largodearray)) + '">Página: ' + (i + 1) + ' - todos</option>';
        //                 }
        //                 // if ((maximo * i) < largodearray && i == artxpaginas) {
        //                 //     //en caso de que la cantidad de registros final (maximo * i) sea menor que el maximo de registros del json (largodearray)
        //                 //     //muestro un siguiente option, porque me quedarian datos que mostrar
        //                 //     llenarselect += '<option value="' + (largodearray) + '">Página: ' + (i + 1) + ' - todos</option>';
        //                 // }
        //             }

        //             $('#paginador').html(llenarselect);
        //             /*=================================================LLENA SELECT========================================*/
        //         }
        //     }).fail(function(res) {
        //         console.log("No se cargo el select: " + res);
        //         LlenadoSelect();
        //         // swalfire("ERROR", "error");
        //     });
        // }
    </script>


    <script>
        var cantidad_a_calcular = 0;

        function botonagregaralcarrito(idrecibido, stocktotal, nombreimagen) {
            let contador_topbar = $('#contadordecarrito_topbar').text();
            let nombre = $('#camponombre-' + idrecibido).text();
            let descripcion = $('#campodescripcion-' + idrecibido).text();
            let cantidad = $('#campocantidad-' + idrecibido).val();
            // console.log("ID: " + idrecibido + "\nNombre: " + nombre + "\nDescripción:" + descripcion + "\nCantidad:" + cantidad);

            if (validavacioynulo([cantidad]) || parseInt(cantidad) == 0) {
                alertify.error("¡Stock inválido!");
            } else if (cantidad > parseInt(stocktotal)) {
                alertify.error("¡No hay suficiente stock!");
            } else if (parseInt(cantidad) < 0) {
                alertify.error("¡El stock no debe ser negativo!");
            } else {
                $.post('funciones/agregar.php', {
                    id: idrecibido,
                    nombre: nombre,
                    cantidad: cantidad,
                    descripcion: descripcion,
                    stocktotal: stocktotal,
                    imagen: nombreimagen
                }, function(response) {
                    console.log("resp: " + response);
                    if (response == 1) {
                        $('#contadordecarrito_topbar').text(parseInt(contador_topbar) + 1);
                        alertify.success("Agregado");
                    } else if (response == 2) {
                        alertify.error("Ups no hay stock suficiente, verifique stock.");
                    } else if (response == 3) {
                        alertify.success("Agregado");
                    } else if (response == 4) {
                        $('#contadordecarrito_topbar').text(parseInt(contador_topbar) + 1);
                        alertify.success("Agregado");
                    } else if (response == 5) {
                        alertify.error("No hay parámetros");
                    } else if (response == 6) {
                        alertify.error("Este medicamento no está disponible");
                        mostrarybuscar();
                    }
                });
            }

        }

        function botonincrementar(idrecibido, stocktotal) {
            let cantidad = $('#campocantidad-' + idrecibido).val();
            cantidad_a_calcular = parseInt(cantidad);
            // alertify.error(idrecibido + "-" + cantidad_a_calcular + "-" + stocktotal);

            if (parseInt(cantidad) <= 0) {
                $('#campocantidad-' + idrecibido).val(2);
            } else if (parseInt(cantidad) < parseInt(stocktotal)) {
                $('#campocantidad-' + idrecibido).val(cantidad_a_calcular + 1);
            }
        }

        function botondecrementar(idrecibido) {
            let cantidad = $('#campocantidad-' + idrecibido).val();
            cantidad_a_calcular = parseInt(cantidad);

            if (parseInt(cantidad_a_calcular) > 1) { //para dejar por defecto 1 cantidad y reste cuando el campo minimo sea 2
                $('#campocantidad-' + idrecibido).val(cantidad_a_calcular - 1);
            }
        }

        function detectacambio(idrecibido, stocktotal) {
            let valorcampocantidad = $('#campocantidad-' + idrecibido).val();

            // alertify.success("campo: "+valorcampocantidad+" stocktotal: "+stocktotal);

            if (parseInt(valorcampocantidad) > parseInt(stocktotal)) {
                $('#campocantidad-' + idrecibido).val(stocktotal);
            } else if (valorcampocantidad == '' || valorcampocantidad == 0 || valorcampocantidad < 0) { //
                $('#campocantidad-' + idrecibido).val(1);
            }
        }


        function limpiaGetenURL() {
            var url = location.href.split("?")[0];
            window.history.pushState('object', document.title, url);
        }
        limpiaGetenURL(); //En caso de que halla quedado un parámetor get en la  url y halla refrescado la página, limpia la url
    </script>


    <script src="../../../jsdashboard/jquery.min.js"></script>
    <script src="../../js/validaciongeneral.js"></script>
    <script src="../../js/funcionswal.js"></script>

    <!--Esta libreria de pagination.js o pagination.min.js debe ir después de jquery -->
    <script src="https://pagination.js.org/dist/2.1.5/pagination.js"></script>
    <script src="https://pagination.js.org/dist/2.1.5/pagination.min.js"></script>
    <link rel="stylesheet" href="https://pagination.js.org/dist/2.1.4/pagination.css" />
</body>

</html>