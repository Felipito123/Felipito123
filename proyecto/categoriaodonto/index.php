<?php session_start();
$rol = $_SESSION['sesionCESFAM']['id_rol'];
if (isset($_SESSION['sesionCESFAM']) && ($rol == 5)) { //VALIDA QUE SÓLO PUEDE VER EL ENC. DE SALUD BUCAL
} else { //SINO LO REDIRIGE AL INDEX
    header("Location:../indice/");
}
?>
<?php include '../dashboard/head.php'; ?>
<style>
    .dt-buttons {
        float: left;
    }

    .dataTables_length {
        float: left;
        padding-top: 5px;
        margin-left: 10px;
    }

    .dataTables_info {
        float: left;
        margin-left: 10px;
    }
</style>
<title>Salud los Álamos - Categoria de Odontologia</title>
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


                <div class="row justify-content-center pt-1">
                    <div class="col-xl-4 col-sm-12">
                        <div class="alert alert-secondary" role="alert">
                            <!-- <div class="row justify-content-between"> -->
                            <strong> <i class="fas fa-info-circle pb-2"></i> A considerar</strong> <br>
                            <!-- </div> -->
                            <ul>
                                <li>Podrá visualizar, filtrar y mantener las categorias odontologicas que
                                    estan vinculadas a uno o muchos anexos de un articulo de salud bucal.</li>
                                <li> <strong>No podrá</strong> eliminar una categoria, si esta se encuentra vinculada a un anexo.</li>
                            </ul>
                        </div>
                    </div>
                </div>


                <div class="container-fluid pb-4">

                    <div class="row align-items-center">
                        <div class="col-xl-5 mx-auto">
                            <form id="formCategoriaOdonto" method="POST" autocomplete="off">
                                <div class="card shadow">
                                    <div style="padding: 2%;">
                                        <!--AÑADIR CATEGORIAS -->
                                        <div class="row" style="max-width:100%;margin-left:2px;margin-right:2px;">
                                            <!--el row es el que hace conflicto por eos un lado era más ancho que el otro. Asi que, le agregue el margin-left y right -->
                                            <div class="col-xl-12 col-sm-12">
                                                <div class="table-responsive">
                                                    <!-- PARA QUE SEA RESPONSIVO USE LA CLASE DEL table-responsive -->
                                                    <div class="justify-content-center">
                                                        <!--centro los div -->
                                                        <h4 class="text-center" style="font-weight: 300;">Categoria de Odontologia</h4>
                                                        <div class="input-group mb-3">
                                                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-etsy" aria-hidden="true" style="min-width: 5px;"></i></span>
                                                            <input type="text" class="form-control" id="categoriaodonto" name="categoriaodonto" minlength="2" maxlength="45" placeholder="Categoría a ingresar" onkeypress="return sololetras(event)" onpaste="return false" required>
                                                        </div>
                                                        <button type="submit" class="btn btn-<?php echo $temadelacookie; ?> btn-block"><i class="fas fa-paper-plane"></i> Enviar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="row justify-content-center pt-4 pb-2">
                        <div class="col-xl-4 col-sm-12">
                            <label>Generar informe (G.I): </label>
                            <span class="badge badge-success" style="padding: 5px;"><i class="fa fa-file-excel-o"></i> G.I en excel</span>
                            <span class="badge badge-danger" style="padding: 5px;"><i class="fa fa-file-pdf-o"></i> G.I en pdf</span>
                            <span class="badge badge-info" style="padding: 5px;"><i class="fa fa-print"></i> Imprimir</span>
                        </div>
                        <div class="col-xl-4 col-sm-12">
                            <label>Acciones: </label>
                            <span class="badge badge-secondary" style="padding: 5px;"><i class="fa fa-paper-plane"></i> Registrar categoria</span>
                            <span class="badge badge-info" style="padding: 5px;"><i class="fa fa-pencil-square-o"></i> Editar categoria</span>
                            <span class="badge badge-danger" style="padding: 5px;"><i class="fa fa-trash-o"></i> Eliminar categoria</span>
                        </div>
                        <!-- <div class="col-lg-3"></div> -->
                    </div>
                </div> <!-- End container-fluid -->

                <div class="container-fluid">

                    <div class="row justify-content-center">
                        <div class="col-xl-9 col-sm-12">
                            <div class="card shadow">
                                <div style="padding: 2%;">
                                    <div class="table-responsive">
                                        <table id="tabla-categorias-odonto" class="table table-striped table-bordered" width="100%" cellspacing="0">
                                            <thead class="text-center">
                                                <tr class="text-white bg-secondary">
                                                    <!-- <th>ID_CATEGORIA</th> -->
                                                    <th>NOMBRE CATEGORIA</th>
                                                    <th>ACCIONES</th>
                                                </tr>
                                            </thead>
                                            <tbody class="text-center">
                                            </tbody>
                                        </table>
                                    </div>
                                    <!--fin del table responsive -->
                                </div>
                                <!--fin del padding -->
                            </div>
                            <!--fin del card shadow -->
                        </div>
                        <!--fin del col-lg-9 -->
                    </div>
                    <!--fin del row -->
                </div>
                <!--fin del container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php include '../dashboard/footer.php'; ?>
            <!-- End of Footer -->

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
        $("#categoria_odonto").attr('class', 'nav-item active');
    </script>


    <script src="../../jsdashboard/sb-admin-2.min.js"></script>
    <script src="../../assets/datatables/datatables.min.js"></script>
    <script src="../js/validaciongeneral.js"></script>
    <script src="../js/funcionswal.js"></script>
    <script src="js/formularios.js"></script>
    <script src="js/categoria_odonto.js"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>

</body>

</html>