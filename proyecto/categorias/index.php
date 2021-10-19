<?php session_start();
$rol = $_SESSION['sesionCESFAM']['id_rol'];
if (isset($_SESSION['sesionCESFAM']) && ($rol == 2 || $rol == 3)) { //VALIDA QUE SÓLO PUEDE VER EL ADMINISTRADOR Y EL SUPERADMIN
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
<title>Salud los Álamos - Categorias</title>
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

                <div class="container-fluid" style="text-align: center; padding-bottom: 25px;">
                    <div class="row align-items-center">
                        <div class="col-lg-6 mx-auto">
                            <form id="formCategoria" method="POST" autocomplete="off">
                                <div class="card shadow">
                                    <div style="padding: 2%;">
                                        <!--AÑADIR CATEGORIAS -->
                                        <div class="row" style="max-width:100%;margin-left:2px;margin-right:2px;">
                                            <!--el row es el que hace conflicto por eos un lado era más ancho que el otro. Asi que, le agregue el margin-left y right -->
                                            <div class="col-lg-12">
                                                <div class="table-responsive">
                                                    <!-- PARA QUE SEA RESPONSIVO USE LA CLASE DEL table-responsive -->
                                                    <div class="justify-content-center">
                                                        <!--centro los div -->
                                                        <h4 style="font-weight: 300;">Categoria</h4>
                                                        <div class="input-group mb-3">
                                                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-etsy" aria-hidden="true" style="min-width: 5px;"></i></span>
                                                            <input type="text" class="form-control" id="categoria" name="categoria" maxlength="29" minlength="1" required placeholder="Categoría a ingresar"  onkeypress="return sololetras(event)" onpaste="return false" required>
                                                        </div>
                                                        <button type="submit" class="btn btn-secondary btn-block"><i class="fas fa-paper-plane"></i> Enviar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div> <!-- End container-fluid -->


                <div class="container">
                    <div class="row justify-content-center py-3">
                        <div class="col-xl-12">
                            <div class="row">
                                <div class="col-xl-6">
                                    <label>Acciones: </label>
                                    <span class="badge badge-secondary" style="padding: 5px;"><i class="fa fa-paper-plane"></i> Ingresar categoria</span>
                                    <span class="badge badge-info" style="padding: 5px;"><i class="fa fa-pencil-square-o"></i> Editar categoria</span>
                                    <span class="badge badge-danger" style="padding: 5px;"><i class="fa fa-trash-o"></i> Eliminar categoria</span>
                                </div>
                                <div class="col-xl-6">
                                    <label>Generar informe: </label>
                                    <span class="badge badge-success" style="padding: 5px;"><i class="fa fa-file-excel-o"></i> Generar informe en Excel</span>
                                    <span class="badge badge-danger" style="padding: 5px;"><i class="fa fa-file-pdf-o"></i> Generar informe en PDF</span>
                                    <span class="badge badge-info" style="padding: 5px;"><i class="fa fa-print"></i> Imprimir</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container" style="text-align: center;padding-bottom: 55px; max-width: 1900px !important;">
                    <div class="row justify-content-center">
                        <div class="col-lg-10">
                            <div class="card shadow">
                                <div style="padding: 2%;">
                                    <div class="table-responsive">
                                        <table id="tablacategorias" class="table table-striped table-bordered" width="100%" cellspacing="0">
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
                                <!--fin del row -->
                            </div>
                        </div>
                    </div>
                </div>
                <!--fin del container -->


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
        $("#administracion").attr('class', 'nav-item active');
    </script>



    <script src="../js/validaciongeneral.js"></script>
    <script src="../js/funcionswal.js"></script>
    <script src="../../jsdashboard/sb-admin-2.min.js"></script>
    <script src="../../assets/datatables/datatables.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>

    <script src="js/categorias.js"></script>

</body>

</html>