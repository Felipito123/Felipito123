<?php
// session_start();
// if (isset($_SESSION['sesionCESFAM'])) { //VALIDA SI LA SESION ESTA INICIADAz
//     $rut = $_SESSION["sesionCESFAM"]["rut"];
// } else { //SINO LO REDIRIGE AL INDEX
//     header("Location:../inicio/");
// }
?>
<?php include '../dashboard/head.php'; ?>

<title>Salud los Álamos - LIST GROUP</title>

<style>
    /* .list-group .active {
        background: #e74a3b !important; */
    /* e74a3b   d2f4e8 */
    /*  } */
</style>
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


                    <div class="row justify-content-center pt-2 pb-4">
                        <div class="col-xl-9 col-sm-12">

                            <div class="list-group">
                                <a href="javascript:void(0);" class="list-group-item list-group-item-action flex-column align-items-start active">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h5 class="mb-1">List group item heading</h5>
                                        <small>3 days ago</small>
                                    </div>
                                    <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
                                    <small>Donec id elit non mi porta.</small>
                                </a>
                                <a href="javascript:void(0);" class="list-group-item list-group-item-action flex-column align-items-start">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h5 class="mb-1">List group item heading</h5>
                                        <small class="text-muted">3 days ago</small>
                                    </div>
                                    <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
                                    <small class="text-muted">Donec id elit non mi porta.</small>
                                </a>
                                <a href="javascript:void(0);" class="list-group-item list-group-item-action flex-column align-items-start">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h5 class="mb-1">List group item heading</h5>
                                        <small class="text-muted">3 days ago</small>
                                    </div>
                                    <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
                                    <small class="text-muted">Donec id elit non mi porta.</small>
                                </a>
                            </div>
                            
                        </div>
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

        <script>
            $(document).ready(function() {
                $('a').click(function() {
                    var $parent = $(this).parent();
                    console.log($parent);
                    $('a.list-group-item.active').removeClass("active");
                    $(this).addClass("active");
                });
            });
        </script>

        <script src="../js/validaciongeneral.js"></script>
        <script src="../js/funcionswal.js"></script>
        <script src="../../assets/popper/popper.min.js"></script>
        <script src="../../jsdashboard/sb-admin-2.min.js"></script>
</body>

</html>