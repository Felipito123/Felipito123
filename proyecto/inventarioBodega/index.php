<?php session_start();
$usuario;
$rol = $_SESSION['sesionCESFAM']['id_rol'];
if (isset($_SESSION['sesionCESFAM']) && ($rol == 3 || $rol == 21)) { //VALIDA QUE SÓLO PUEDE VER ESTA PANTALLA EL SUPERADMINISTRADOR Y EL ENC. DE BODEGA
    $usuario = $_SESSION['sesionCESFAM'];
} else { //SINO LO REDIRIGE AL INDEX
    header("Location:../indice/");
}

date_default_timezone_set("America/Santiago");
setlocale(LC_TIME, "spanish");
$fechadehoy = strftime("%Y-%m-%d"); //("%Y-%m-%d") Ej:2021-12-23
$anoactual = strftime("%Y");
$fechaminima = "2020" . "-01" . "-01";
$fechamaxima = $anoactual . "-12" . "-31";
?>
<?php
include '../conexion/conexion.php';
include '../dashboard/head.php'; ?>
<title>Salud los Álamos - Inventario Bodega </title>
<style>
    #content {
        background-color: #ffffff;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='800' height='800' viewBox='0 0 200 200'%3E%3Cdefs%3E%3ClinearGradient id='a' gradientUnits='userSpaceOnUse' x1='88' y1='88' x2='0' y2='0'%3E%3Cstop offset='0' stop-color='%23714359'/%3E%3Cstop offset='1' stop-color='%23b36a8e'/%3E%3C/linearGradient%3E%3ClinearGradient id='b' gradientUnits='userSpaceOnUse' x1='75' y1='76' x2='168' y2='160'%3E%3Cstop offset='0' stop-color='%238f8f8f'/%3E%3Cstop offset='0.09' stop-color='%23b3b3b3'/%3E%3Cstop offset='0.18' stop-color='%23c9c9c9'/%3E%3Cstop offset='0.31' stop-color='%23dbdbdb'/%3E%3Cstop offset='0.44' stop-color='%23e8e8e8'/%3E%3Cstop offset='0.59' stop-color='%23f2f2f2'/%3E%3Cstop offset='0.75' stop-color='%23fafafa'/%3E%3Cstop offset='1' stop-color='%23FFFFFF'/%3E%3C/linearGradient%3E%3Cfilter id='c' x='0' y='0' width='200%25' height='200%25'%3E%3CfeGaussianBlur in='SourceGraphic' stdDeviation='12' /%3E%3C/filter%3E%3C/defs%3E%3Cpolygon fill='url(%23a)' points='0 174 0 0 174 0'/%3E%3Cpath fill='%23000' fill-opacity='.5' filter='url(%23c)' d='M121.8 174C59.2 153.1 0 174 0 174s63.5-73.8 87-94c24.4-20.9 87-80 87-80S107.9 104.4 121.8 174z'/%3E%3Cpath fill='url(%23b)' d='M142.7 142.7C59.2 142.7 0 174 0 174s42-66.3 74.9-99.3S174 0 174 0S142.7 62.6 142.7 142.7z'/%3E%3C/svg%3E");
        background-attachment: fixed;
        background-repeat: no-repeat;
        background-position: top left;
    }

    .table th {
        padding: 0.25rem !important;
    }

    .btn-colornuevo {
        background-color: #009688;
        border: #009688;
        color: white;
    }

    .btn-colornuevo:hover {
        background-color: #056158;
        border: #009688;
        color: white;
    }

    .btn-outline-colornuevo {
        color: #056158;
        border-color: #009688;
    }

    .btn-outline-colornuevo:hover {
        background-color: #056158;
        border-color: #009688;
        color: white;
    }

    .border-left-verdeoscuro {
        border-left: .25rem solid #009688 !important;
    }

    .border-left-rosadooscuro {
        border-left: .25rem solid #C9779F !important;
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

<!-- <link rel="stylesheet" href="../../css/efectosawesome.css">
<script src="https://pro.fontawesome.com/releases/v6.0.0-beta1/js/all.js" data-auto-add-css="false" data-auto-replace-svg="false"></script>  -->


<!-- 
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v6.0.0-beta1/css/all.css">
<script src="https://pro.fontawesome.com/releases/v6.0.0-beta1/js/all.js" data-auto-add-css="false" data-auto-replace-svg="false"></script> -->
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
                                    <div class="px-5 py-3 text-center card-img-top" style="background-color: #C9779F;"><span class="mb-2 d-block mx-auto"><i class="fas fa-pallet" style="font-size: 55px;color:white;"></i></span>
                                        <h5 class="text-white mb-0">Inventario materiales de Bodega</h5>
                                        <p class="small text-white mb-0">Aseo, Oficina e Higiene.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-verdeoscuro shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1"> Materiales de Aseo</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800 text-left" id="mat_aseo">
                                                <!-- <img id="gif" src="../../importantes/gif2.gif"> -->
                                                0
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-broom fa-2x" style="color: #dddfeb !important;"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-rosadooscuro shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1"> Materiales de Oficina</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800 text-left" id="mat_oficina">
                                                0
                                                <!-- <img id="gif" src="../../importantes/gif2.gif"> -->
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-briefcase fa-2x" style="color: #dddfeb !important;"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-verdeoscuro shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1"> Materiales de Higiene </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800 text-left" id="mat_higiene">
                                                <!-- <img id="gif" src="../../importantes/gif2.gif"> -->
                                                0
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-hands-wash fa-2x" style="color: #dddfeb !important;"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-end pr-3">
                        <label class="btn btn-colornuevo btn-sm shadow-sm" id="boton_restaurar_material"><i class="fas fa-trash-restore fa-sm text-white-50"></i>
                            Restaurar material
                        </label>
                    </div>

                    <div class="row justify-content-center pb-3">
                        <div class="col-xl-3 col-sm-12 pb-2">
                            <div class="card" style="border-top: 5px solid #C9779F;">
                                <div class="card-body">
                                    <form id="formularioRegMaterial" method="POST">
                                        <div class="row justify-content-between text-left pl-2">
                                            <div class="col-xl-12 col-sm-12">
                                                <label class="form-control-label" style="font-weight: 300;font-size:20px">Registrar Material </label>
                                            </div>
                                        </div>

                                        <div class="row justify-content-end pb-2">
                                            <div class="col-xl-6 col-sm-12">
                                                <button type="submit" class="btn btn-outline-colornuevo btn-block" id="botonbuscar"><i class="fas fa-save"></i> Guardar </button>
                                            </div>
                                        </div>

                                        <div class="card shadow-sm">
                                            <div class="card-body">
                                                <div class="row justify-content-center">
                                                    <!-- <div style="max-width: 0; max-height: 0; overflow: hidden;"><input autofocus="true" /> Hago esto para deshabilitar el autofocus del primer input</div> -->
                                                    <div class="col-xl-12 col-sm-12">

                                                        <!--CATEGORIA DEL MATERIAL DE BODEGA-->
                                                        <div class="form-group">
                                                            <label for="cat_mat_mb" class="col-form-label">Categoria</label>
                                                            <select class="form-control custom-select" id="cat_mat_mb" name="cat_mat_mb" required>
                                                                <option value="">Seleccione una categoria</option>
                                                            </select>
                                                        </div>

                                                        <!-- CANTIDAD -->
                                                        <div class="form-group">
                                                            <label for="cantidadmaterial" class="col-form-label">Cantidad</label>
                                                            <!-- maxlength en números no sirve, por eso uso ->  oninput="if(this.value.length>=3) { this.value = this.value.slice(0,3);}" -->
                                                            <input type="number" class="form-control" id="cantidadmaterial" name="cantidadmaterial" min="1" max="500" maxlength="3" oninput="if(this.value.length>=3) { this.value = this.value.slice(0,3);}" onkeypress="return solonumeros(event)" onpaste="return false" required>
                                                            <!--readonly="readonly" -->
                                                        </div>

                                                        <!--DETALLE O NOMBRE -->
                                                        <div class="form-group">
                                                            <label for="detalle_mb" class="col-form-label">Detalle/Nombre</label>
                                                            <textarea class="form-control" name="detalle_mb" id="detalle_mb" placeholder="Especifique el detalle o el nombre del material" rows="3" cols="100" minlength="2" maxlength="60" onkeyup="validarTexArea(this);" onkeypress="return soloNombreMaterialBodega(event)" onpaste="return false" style="resize: none;" required></textarea>
                                                            <!--pattern="[A-Za-zÁÉÍÓÚáéíóúñÑ0-9/.\s]+" onkeypress="return soloNombreMaterialBodega(event)" -->
                                                        </div>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-sm-12 pb-2">
                            <div class="card" style="border-top: 5px solid #C9779F;">
                                <div class="card-body">
                                    <form id="formularioFiltrar" method="POST">
                                        <div class="row justify-content-between text-left pl-2">
                                            <div class="col-xl-12 col-sm-12">
                                                <label class="form-control-label" style="font-weight: 300;font-size:20px">Filtrar por rango de fechas </label>
                                            </div>
                                        </div>

                                        <div class="card shadow-sm">
                                            <div class="card-body">
                                                <div class="row justify-content-center">
                                                    <!-- <div style="max-width: 0; max-height: 0; overflow: hidden;"><input autofocus="true" /> Hago esto para deshabilitar el autofocus del primer input</div> -->
                                                    <div class="col-xl-12 col-sm-12">

                                                        <!--FECHA DE INICIO-->
                                                        <div class="form-group">
                                                            <label for="cat_mat_mb" class="col-form-label">Fecha de Inicio</label>
                                                            <input type="date" class="form-control" id="fechainicio" name="fechainicio" placeholder="Ingrese fecha de nacimiento" onkeypress="return fechausuarios(event)" minlength="10" maxlength="10" min='<?php echo $fechaminima; ?>' max='<?php echo $fechamaxima; ?>' value="<?php echo $fechadehoy ?>" onpaste="return false" required>
                                                        </div>

                                                        <!--FECHA DE FIN-->
                                                        <div class="form-group">
                                                            <label for="cat_mat_mb" class="col-form-label">Fecha de Fin</label>
                                                            <input type="date" class="form-control" id="fechafin" name="fechafin" placeholder="Ingrese fecha de nacimiento" onkeypress="return fechausuarios(event)" minlength="10" maxlength="10" min='<?php echo $fechaminima; ?>' max='<?php echo $fechamaxima; ?>' value="<?php echo $fechadehoy ?>" onpaste="return false" required>
                                                        </div>

                                                    </div>

                                                    <div class="col-xl-6 col-sm-12 pb-2">
                                                        <button type="submit" class="btn btn-colornuevo btn-block" id="botonfiltrar"><i class="fas fa-filter"></i> Filtrar</button>
                                                    </div>

                                                    <div class="col-xl-6 col-sm-12">
                                                        <button type="button" class="btn btn-colornuevo btn-block" id="botonresetear"> Resetear</button>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-6 col-sm-12">
                            <div class="card rounded shadow-sm border-left-0 border-right-0 " style="border-top: 6px solid #C9779F;">

                                <div class="card-body p-2">

                                    <div class="row justify-content-between text-left pl-2">
                                        <div class="col-xl-12 col-sm-12">
                                            <label class="form-control-label" style="font-weight: 300;font-size:20px">Materiales disponibles en bodega</label>
                                        </div>
                                    </div>

                                    <div class="row justify-content-center">
                                        <div class="col-xl-12 col-sm-12">
                                            <div class="card shadow-sm mb-4 pb-2">
                                                <div class="card-body">
                                                    <div class="table-responsive">
                                                        <table id="tabla_inventario_bodega" class="table">
                                                            <thead class="text-center" style="background-color: #C9779F;color:white;">
                                                                <tr>
                                                                    <th scope="col" title="Categoria">CATEGORÍA</th>
                                                                    <th scope="col" title="Cantidad">CANTIDAD</th>
                                                                    <th scope="col" title="Detalle">DETALLE</th>
                                                                    <th scope="col" title="Fecha registro">FECHA REG.</th>
                                                                    <th scope="col" title="Acciones">ACCIONES</th>
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
        $("#inventariobodega").attr('class', 'nav-item active');
    </script>


    <script>
        function validarTexArea(valor) {
            let entrada = valor.value;
            valor.value = entrada.replace(/[^A-Za-zÁÉÍÓÚáéíóúñÑ0-9()/.\s ]/g, "");
        }
    </script>




    <script src="../js/validaciongeneral.js"></script>
    <script src="../js/funcionswal.js"></script>
    <script src="../../jsdashboard/sb-admin-2.min.js"></script>
    <script src="js/InvBod.js"></script>
    <script src="js/funciones.js"></script>

    <script src="../../assets/datatables/datatables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>

</body>

</html>