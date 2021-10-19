<?php session_start();
if (!isset($_SESSION["sesionFarmacia"]["rut"]) && empty($_SESSION["sesionFarmacia"]["rut"])) {
    header("Location:../");
} 
//unset($_SESSION["carrito"]);
?>
<?php include 'partes/head.php'; ?>

<style>
    /* #seguir{
    color:#e74a3b;
}
#seguir:hover{
    color:white;
} */

    .letraespecial {
        letter-spacing: 2px;
        font-weight: 700;
        text-transform: uppercase;
        font-size: 16px;
        padding: 15px 0px 10px;
        align-items: center;
        font-family: "Cairo", sans-serif;
        /* padding: 45px 0 40px; */
    }
</style>
<title>Salud los Álamos - Listado medicamento</title>
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

                <div class="row justify-content-center">
                    <div class="col-lg-3 col-md-6 mb-lg-0">
                        <!-- Card-->
                        <div class="card rounded shadow-sm border-0">
                            <div class="card-body p-0">
                                <div class="bg-success px-5 py-3 text-center card-img-top" id="tarjetaprimera"><span class="mb-2 d-block mx-auto"><i class="fas fa-notes-medical" style="font-size: 55px;color:white;"></i></span>
                                    <h5 class="text-white mb-0" id="titulotarjetaprimera">Listado de medicamentos</h5>
                                    <p class="small text-white mb-0" id="subtitulotarjetaprimera">¡Hola estimado(a)!</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container-fluid pt-5" style="padding-bottom:8%;">

                    <div class="row justify-content-center pb-5 mb-4">
                        <div class="col-lg-9">
                            <!-- Card-->
                            <div class="card rounded shadow-sm border-0">
                                <div class="card-body p-4">
                                    <!-- Shopping cart table -->

                                    <?php if (isset($_SESSION["carrito"]) && $_SESSION["carrito"] != null) { ?>
                                        <div class="table-responsive" id="tablaresponsiva">
                                            <table class="table" id="tablalista">
                                                <!--table-bordered -->
                                                <thead id="theaddelatabla">
                                                    <tr>
                                                        <th scope="col" class="border-bottom-danger border-top-0">
                                                            <div class="p-2 text-uppercase">Nombre del medicamento</div>
                                                        </th>
                                                        <th scope="col" class="border-bottom-danger border-top-0">
                                                            <div class="py-2 text-uppercase text-center">Cantidad</div>
                                                        </th>
                                                        <th scope="col" class="border-bottom-danger border-top-0">
                                                            <div class="py-2 text-uppercase text-center">Accion</div>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <?php
                                                    foreach ($_SESSION['carrito'] as $key => $value) {
                                                        $id = $value['id'];
                                                        $nombre = $value['nombre'];
                                                        $descripcion = $value['descripcion'];
                                                        $cantidad = $value['cantidad'];
                                                        $stocktotal = $value['stocktotal'];
                                                        $nombreimagen = $value['nombreimagen'];
                                                    ?>
                                                        <tr id="<?php echo $id; ?>">
                                                            <td class="align-middle" style="width: 230px;">
                                                                <div class="p-2">
                                                                    <img src="../../farmacia/img/<?php echo $id; ?>/<?php echo $nombreimagen; ?>" alt="" width="70" class="img-fluid rounded shadow-sm">
                                                                    <div class="ml-3 d-inline-block align-middle">
                                                                        <h5 class="mb-0"><?php echo $nombre; ?></h5>
                                                                        <span class="text-muted font-weight-normal font-italic"><?php echo $descripcion; ?></span>
                                                                        <!-- <span class="text-muted font-weight-normal font-italic">Categoria: Antibioticos</span> -->
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td class="align-middle" style="width: 100px;">
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <button type="button" class="btn btn-danger" onclick="botondecrementar(<?php echo $id; ?>,<?php echo $cantidad; ?>,<?php echo $stocktotal; ?>);"><i class="fas fa-minus-square"></i></button>
                                                                    </div>
                                                                    <input type="text" id="campocantidad-<?php echo $id; ?>" name="campocantidad-<?php echo $id; ?>" onkeyup="detectacambio(<?php echo $id; ?>,<?php echo $stocktotal; ?>)" onkeypress="return solonumeros(event)" class="col-sm-12 form-control input-number text-center" onpaste="return false" value="<?php echo $cantidad; ?>" min="1" max="<?php echo $stocktotal; ?>">
                                                                    <!--readonly -->
                                                                    <div class="input-group-append">
                                                                        <button type="button" class="btn btn-success" onclick="botonincrementar(<?php echo $id; ?>,<?php echo $cantidad; ?>,<?php echo $stocktotal; ?>);"><i class="fas fa-plus-square"></i></button>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td class="align-middle" style="width: 100px;">
                                                                <div class="row justify-content-center">
                                                                    <!-- <i class="fa fa-trash"></i> -->
                                                                    <button type="button" class="btn btn-danger" onclick="botoneliminar(<?php echo $id; ?>);"> <i class="fas fa-times-circle"></i></button>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    <?php } else { ?>
                                        <div class="row justify-content-center">
                                            <div class="col-lg-12">
                                                <div class="alert alert-danger" role="alert">Ningún medicamento disponible en esta tabla</div>
                                            </div>
                                        </div>
                                    <?php } ?>

                                    <label onclick="location.href='../agregar/'" class="btn btn-outline-success" style="letter-spacing: 2px; font-weight:700;text-transform:uppercase; font-size:14px;padding: 14px 30px 12px;">Seguir buscando medicamento</label>
                                    <!--id="seguir" -->
                                    <button type="button" class="btn btn-outline-success float-right" style="letter-spacing: 2px; font-weight:700;text-transform:uppercase; font-size:14px;padding: 14px 30px 12px" id="btnenviarlista"> <i class="fas fa-paper-plane"></i> Enviar lista</button>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- https://bootstrapious.com/p/bootstrap-shopping-cart -->
                    <div class="row">
                        <!--AQUI VOY A MOSTRAR LOS DATOS DE SESION -->
                        <?php
                        // if (isset($_SESSION["carrito"])) {
                        //     // var_dump($_SESSION["carrito"]);

                        //     echo '<br>';
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
        var cantidad_a_calcular = 0;

        //En caos de que la tabla esta nula o vacia cuando se cargue la pagina oculta el boton enviar de la lista
        let tablageneral = document.getElementById('tablalista');
        if (tablageneral == null) {
            ocultarelementos();
        }

        function botoneliminar(idrecibido) {
            let contador_topbar = $('#contadordecarrito_topbar').text();
            let tabla = document.getElementById('tablalista');
            let largotabla = tabla.rows.length - 1;
            console.log("largo tabla: " + largotabla);
            $.post('funciones/acciones.php', {
                seleccionar: 3,
                id: idrecibido
            }, function(response) {
                //console.log("resp: " + response);
                if (response == 1) {
                    console.log("No existe ese elemento en el array");
                } else if (response == 2) {
                    $('#contadordecarrito_topbar').text(parseInt(contador_topbar) - 1);
                    $('#' + idrecibido).closest("tr").remove();
                    console.log("Eliminado exitoso");
                    if (largotabla == 1) {
                        //Esta acción es necesaria debido a que la sesion no es online, no muestra la alerta en el momento
                        $("#tablaresponsiva").html('<div class="alert alert-danger" role="alert">Ningún medicamento disponible en esta tabla </div>');
                        ocultarelementos();
                    }
                } else if (response == 3) {
                    console.log("No existe sesion activa");
                } else if (response == 4) {
                    console.log("No hay parámetros recibidos");
                } else if (response == 555) {
                    console.log("No hay seleccionado");
                }
            });
        }


        function botonincrementar(idrecibido, cantidadBD, stocktotal) {
            let cantidad = $('#campocantidad-' + idrecibido).val();
            cantidad_a_calcular = parseInt(cantidad);
            /*HAY PROBLEMAS EN LA ACTUALIZACION DE LA SESION AL DECREMENTAR Y LUEGO INCREMENTAR ENTONCES LA VALIDACION DE QUE NO 
            PIDIERA MAS STOCK DEL STOCK TOTAL DISPONIBLE LO HICE EN EL PHP, ASÍ TOMA EL VALOR ACTUALIZADO DE LA SESIÓN*/
            if (validavacioynulo([cantidad_a_calcular, cantidad]) || parseInt(cantidad_a_calcular) == 0) {
                // alertify.error("Cantidad vacia!");
                $('#campocantidad-' + idrecibido).val(1);
            } else {
                $.post('funciones/acciones.php', {
                    seleccionar: 1,
                    id: idrecibido,
                    cantidad: 1
                }, function(response) {
                    //console.log("resp: " + response);
                    if (response == 1) {
                        console.log("No existe ese elemento en el array");
                    } else if (response == 2) {
                        console.log("Incrementado exitoso");
                        $('#campocantidad-' + idrecibido).val(cantidad_a_calcular + 1); //para que se ve el incremento en el input   
                    } else if (response == 3) {
                        console.log("No existe sesion activa");
                    } else if (response == 4) {
                        console.log("No hay parámetros recibidos");
                    } else if (response == 5) {
                        alertify.error("No hay suficiente stock");
                    } else if (response == 555) {
                        console.log("No hay seleccionado");
                    }
                });
            }
        }

        function botondecrementar(idrecibido, cantidadBD, stocktotal) {
            let cantidad = $('#campocantidad-' + idrecibido).val();
            cantidad_a_calcular = parseInt(cantidad);

            if (validavacioynulo([cantidad_a_calcular, cantidad]) || parseInt(cantidad_a_calcular) == 0) {
                // alertify.error("Cantidad vacia!");
                $('#campocantidad-' + idrecibido).val(1);
            } else if (cantidad_a_calcular > 1) { //para dejar por defecto 1 cantidad y reste cuando el campo minimo sea 2
                $.post('funciones/acciones.php', {
                    seleccionar: 2,
                    id: idrecibido,
                    cantidad: 1
                }, function(response) {
                    //console.log("resp: " + response);
                    if (response == 1) {
                        console.log("No existe ese elemento en el array");
                    } else if (response == 2) {
                        console.log("Decrementado exitoso");
                        $('#campocantidad-' + idrecibido).val(cantidad_a_calcular - 1);
                    } else if (response == 3) {
                        console.log("No existe sesion activa");
                    } else if (response == 4) {
                        console.log("No hay parámetros recibidos");
                    } else if (response == 555) {
                        console.log("No hay seleccionado");
                    }
                });

            }
        }

        function detectacambio(idrecibido, stocktotal) {
            let valorcampocantidad = $('#campocantidad-' + idrecibido).val();

            if (valorcampocantidad == '') {
                agregarstockaldetectarcambio(idrecibido, 1);
            } else if (valorcampocantidad > stocktotal) {
                $('#campocantidad-' + idrecibido).val(stocktotal);
                agregarstockaldetectarcambio(idrecibido, stocktotal);
            } else if (valorcampocantidad == 0) {
                $('#campocantidad-' + idrecibido).val(1);
                agregarstockaldetectarcambio(idrecibido, 1);
            } else {
                agregarstockaldetectarcambio(idrecibido, valorcampocantidad);
            }

        }

        $('#btnenviarlista').on('click', function() {
            $.post('funciones/acciones.php', {
                seleccionar: 5
            }, function(response) {
                console.log("r1: " + response);
                if (response == 1) {
                    alertify.error("No existe sesion");
                } else if (response == 2 || response == 4) {
                    alertify.error("Hubo un error, contacte a soporte");
                }else if (response == 3) {
                    alertify.error("NO encuentra el ultimo ID");
                }
                else if (response == 5) {
                    alertify.success("Solicitud exitosa");
                    $.post('funciones/acciones.php', {
                        seleccionar: 6
                    }, function(response) {
                        console.log("r2: " + response);
                        if (response == 1) {
                            window.setTimeout(function () { location.href = '../agregar/'; }, 1000);
                        }
                    });
                }
            });
        });

        function ocultarelementos() {
            $("#btnenviarlista").attr('hidden', 'hidden');
            $('#tarjetaprimera').removeClass('bg-success').addClass('bg-danger');
            $('#titulotarjetaprimera').text('No hay datos asociados');
            $('#subtitulotarjetaprimera').text('¡UpS!');
        }

        function agregarstockaldetectarcambio(id, cantidad) {
            $.post('funciones/acciones.php', {
                seleccionar: 4,
                id: id,
                cantidad: cantidad
            }, function(response) {
                //console.log("resp: " + response);
                if (response == 1) {
                    console.log("No existe ese elemento en el array");
                } else if (response == 2) {
                    alertify.error("Ups no hay stock suficiente, verifique stock.");
                } else if (response == 3) {
                    console.log("Stock exitoso");
                } else if (response == 4) {
                    console.log("No existe sesion activa");
                } else if (response == 5) {
                    console.log("No hay parámetros recibidos");
                } else if (response == 555) {
                    console.log("No hay seleccionado");
                }
            });
        }
    </script>

    <script src="../../../jsdashboard/sb-admin-2.min.js"></script>
    <script src="../../../jsdashboard/jquery.min.js"></script>
    <script src="../../js/validaciongeneral.js"></script>
    <script src="../../js/funcionswal.js"></script>
    <!-- <script src="../../../assets/datatables/datatables.min.js"></script> -->
</body>

</html>