<?php session_start();
$usuario;
if (isset($_SESSION['sesionCESFAM'])) { //VALIDA QUE SÓLO PUEDE VER ESTA PANTALLA EL DE FARMACIA
    $usuario = $_SESSION['sesionCESFAM'];
} else { //SINO LO REDIRIGE AL INDEX
    header("Location:../indice/");
}
?>
<?php
include '../conexion/conexion.php';
include '../dashboard/head.php'; ?>
<title>Salud los Álamos - Consulta Corporativa </title>
<style>
    #content {
        background-color: #ffffff;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='800' height='800' viewBox='0 0 200 200'%3E%3Cdefs%3E%3ClinearGradient id='a' gradientUnits='userSpaceOnUse' x1='88' y1='88' x2='0' y2='0'%3E%3Cstop offset='0' stop-color='%2336464e'/%3E%3Cstop offset='1' stop-color='%23556f7c'/%3E%3C/linearGradient%3E%3ClinearGradient id='b' gradientUnits='userSpaceOnUse' x1='75' y1='76' x2='168' y2='160'%3E%3Cstop offset='0' stop-color='%238f8f8f'/%3E%3Cstop offset='0.09' stop-color='%23b3b3b3'/%3E%3Cstop offset='0.18' stop-color='%23c9c9c9'/%3E%3Cstop offset='0.31' stop-color='%23dbdbdb'/%3E%3Cstop offset='0.44' stop-color='%23e8e8e8'/%3E%3Cstop offset='0.59' stop-color='%23f2f2f2'/%3E%3Cstop offset='0.75' stop-color='%23fafafa'/%3E%3Cstop offset='1' stop-color='%23FFFFFF'/%3E%3C/linearGradient%3E%3Cfilter id='c' x='0' y='0' width='200%25' height='200%25'%3E%3CfeGaussianBlur in='SourceGraphic' stdDeviation='12' /%3E%3C/filter%3E%3C/defs%3E%3Cpolygon fill='url(%23a)' points='0 174 0 0 174 0'/%3E%3Cpath fill='%23000' fill-opacity='.5' filter='url(%23c)' d='M121.8 174C59.2 153.1 0 174 0 174s63.5-73.8 87-94c24.4-20.9 87-80 87-80S107.9 104.4 121.8 174z'/%3E%3Cpath fill='url(%23b)' d='M142.7 142.7C59.2 142.7 0 174 0 174s42-66.3 74.9-99.3S174 0 174 0S142.7 62.6 142.7 142.7z'/%3E%3C/svg%3E");
        background-attachment: fixed;
        background-repeat: no-repeat;
        background-position: top left;
    }

    .table th {
        padding: 0.25rem !important;
    }

    .btn-colornuevo{
        background-color: #607d8b;
        color: white;
    }

    .btn-colornuevo:hover{
        background-color: #49606b;
        color: white;
    }

    /* #content {
        background-image: url(https://conserve.com.au/wp-content/uploads/2020/03/what-is-your-safety-leadership-style.jpg);
        background-attachment: fixed;
    } */

    @keyframes bp {
        from {
            background-position: 198px 0;
        }

        to {
            background-position: 0 198px;
        }
    }

    /* 
    PÁGINA PARA VER FONDOS 
    https://www.svgbackgrounds.com/#confetti-doodles */
</style>
</head>

<body id="page-top">


    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php include '../dashboard/sidebar.php'; ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <?php include '../dashboard/topbar.php'; ?>


                <div class="container-fluid" style="padding-bottom: 25px;">

                    <div class="row justify-content-center pt-3 pb-3">
                        <div class="col-xl-4 col-sm-6 mb-lg-0">
                            <!-- Card-->
                            <div class="card rounded shadow-sm border-0">
                                <div class="card-body p-0">
                                    <div class="px-5 py-3 text-center card-img-top" style="background-color: #607d8b;"><span class="mb-2 d-block mx-auto"><i class="fas fa-chalkboard-teacher" style="font-size: 55px;color:white;"></i></span>
                                        <h5 class="text-white mb-0">Consulta Corporativa</h5>
                                        <p class="small text-white mb-0">Puedes buscar el tipo de responsabilidad que tiene un funcionario.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-center pb-3">
                        <div class="col-xl-7 col-sm-12">
                            <div class="card" style="border-top: 5px solid #607d8b;">
                                <div class="card-body">
                                    <form id="formulario">
                                        <div class="row justify-content-between text-left pl-2">
                                            <div class="col-xl-12 col-sm-12">
                                                <label class="form-control-label" style="font-weight: 300;font-size:20px">Filtrar por parámetros presentados </label>
                                            </div>
                                        </div>

                                        <div class="card shadow-sm">
                                            <div class="card-body">
                                                <div class="row justify-content-center text-center">
                                                    <!-- <div style="max-width: 0; max-height: 0; overflow: hidden;"><input autofocus="true" /> Hago esto para deshabilitar el autofocus del primer input</div> -->
                                                    <div class="col-xl-10 col-sm-12">
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label"> AÑO </label>
                                                            <div class="col-sm-9">
                                                                <!--AÑOS-->
                                                                <?php
                                                                $sql2 = "SELECT DISTINCT year(fecha_cargo) as anos FROM historial_cargo";
                                                                $consulta2 = mysqli_query($mysqli, $sql2);

                                                                if (!$consulta2) {
                                                                    echo '<div class="alert alert-danger" role="alert"> ¡UpS! Ocurrió un error! Por favor, contacte a soporte. </div>';
                                                                } else {
                                                                ?>
                                                                    <select class="form-control" id="ano_consultar" name="ano_consultar" required>
                                                                        <!-- <option value="">Seleccione una opción...</option> -->
                                                                        <!-- <option value=" ">No tiene sector...</option> -->
                                                                        <?php
                                                                        while ($fila1 = mysqli_fetch_array($consulta2)) {
                                                                            $ano = $fila1['anos'];
                                                                            // $NOMBRE_SECTOR = $fila1['nombre_sector'];
                                                                            echo '<option value="' . $ano . '">' . $ano . '</option>'; //utf8_encode($NOMBRE_CATEGORIA)
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-2 col-sm-12"></div>

                                                    <div class="col-xl-10 col-sm-12">
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label"> R.U.T </label>
                                                            <div class="col-sm-9">
                                                                <div class="input-group mb-3">
                                                                    <input type="text" class="form-control col-sm-4" id="rut" placeholder="" onkeypress="return solorut(event)" onpaste="return false" minlength="8" maxlength="10" autocomplete="off" required>
                                                                    <input type="text" class="form-control col-sm-8" id="nombre" placeholder="" readonly>
                                                                    <div class="input-group-append">
                                                                        <button type="button" title="Filtrar" class="btn btn-info BtnFiltrar"><i class="fas fa-filter"></i></button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-2 col-sm-12"></div>

                                                    <div class="col-xl-3 col-sm-12">
                                                        <button type="submit" class="btn btn-info btn-block" id="botonbuscar"><i class="fas fa-search"></i> Buscar</button>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row justify-content-center ">
                        <!--vh-100-->

                        <div class="col-xl-8 col-sm-12 ">

                            <div class="card rounded shadow-sm border-left-0 border-right-0 " style="border-top: 6px solid #607d8b;">

                                <div class="card-body p-2">

                                    <div class="row justify-content-between text-left pl-2">
                                        <div class="col-xl-12 col-sm-12">
                                            <label class="form-control-label" style="font-weight: 300;font-size:20px">Resultados de la Búsqueda</label>
                                        </div>
                                    </div>

                                    <div class="row justify-content-center">
                                        <div class="col-xl-12 col-sm-12">
                                            <div class="card shadow-sm mb-4 pb-2">
                                                <div class="card-body">
                                                    <div class="table-responsive">
                                                        <table id="tabla_consulta_corporativa" class="table">
                                                            <thead class="text-center" style="background-color: #607d8b;color:white;">
                                                                <tr>
                                                                    <th scope="col">REPARTICIÓN</th>
                                                                    <th scope="col" title="Apellidos">RESPONSABILIDAD</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody class="text-center">
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- <div class="row justify-content-center col-xl-12 pb-3">
                                        <div class="col-xl-2"><i style="color: #86ecf9;" class="fa fa-circle" aria-hidden="true"></i> 0-2 días</div>
                                        <div class="col-xl-2"><i style="color: #ffa900;" class="fa fa-circle" aria-hidden="true"></i> 3-7 días</div>
                                        <div class="col-xl-2"><i style="color: #00b74a;" class="fa fa-circle" aria-hidden="true"></i> 8-15 días</div>
                                        <div class="col-xl-2"><i style="color: #f93154;" class="fa fa-circle" aria-hidden="true"></i> 16-30 días</div>
                                        <div class="col-xl-2"><i style="color: #b23cfd;" class="fa fa-circle" aria-hidden="true"></i> +30 días</div>
                                    </div> -->

                                </div>
                            </div>
                        </div>
                    </div>





                    <!-- <div class="row pt-4">
                        <div class="col-lg-6">
                            <p class="nota nota-roja">
                                <strong>Nota:</strong> If you need more advanced examples and options, see the links below.
                            </p>
                        </div>
                    </div> -->


                </div>
                <!--FIN DEL ROW -->
            </div>
            <!-- End of Content Wrapper -->
            <?php include '../dashboard/footer.php'; ?>
        </div>
        <!-- End of Page Wrapper -->
    </div>




    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>




    <!-- CAMBIAR EL ITEM DEL NAVBAR SELECCIONADO -->
    <script>
        $("#consultacorporativa").attr('class', 'nav-item active');
    </script>







    <script src="../js/validaciongeneral.js"></script>
    <script src="../js/funcionswal.js"></script>
    <script src="../../jsdashboard/sb-admin-2.min.js"></script>
    <script src="js/ConsCorp.js"></script>

    <script>



    </script>


    <script src="../../assets/datatables/datatables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>

</body>

</html>