<?php session_start();
if (!isset($_SESSION['sesionCESFAM'])) { //VALIDA QUE SÓLO PUEDE VER EL ADMINISTRADOR Y EL SUPERADMIN
    header("Location:../inicio/");
}
?>
<?php include '../dashboard/head.php'; ?>
<title>Salud los Álamos - ERROR</title>
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

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <div class="row justify-content-center align-items-center vh-100">
                        <div class="col-lg-4">
                            <!-- 404 Error Text -->
                            <div class="text-center">
                                <div class="error" style="font-size: 10rem;" data-text="ERROR">ERROR</div>
                                <p class="lead text-gray-800 mb-5">Usted no tiene permisos para acceder a esta página</p>
                                <a href="../funcionesphp/cerrarsesion.php">&larr; Cerrar sesión</a>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

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




    <script src="../../assets/popper/popper.min.js"></script>
    <script src="../../jsdashboard/sb-admin-2.min.js"></script>
</body>

</html>