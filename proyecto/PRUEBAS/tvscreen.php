<?php include '../dashboard/head.php'; ?>

<!-- <link rel="stylesheet" href="https://d1r27dnp1fh4g5.cloudfront.net/tmp/cssloader-46875d4a4119.css?1609933446"> -->

<style>
    .device-mockup {
        position: relative;
        width: 100%;
        padding-bottom: 61.775701%
    }

    .device-mockup>.device {
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-repeat: no-repeat;
        background-size: 100% 100%
    }

    .device-mockup>.device>.screen {
        position: absolute;
        top: 11.0438729%;
        right: 13.364486%;
        bottom: 14.6747352%;
        left: 13.364486%;
        overflow: hidden
    }

    .device-mockup>.device>.button {
        display: none;
        position: absolute;
        top: 0;
        left: 0;
        overflow: hidden;
        cursor: pointer;
        border-radius: 100%;
        -webkit-border-radius: 100%;
        -moz-border-radius: 100%
    }

    .device-mockup>.device>.ribbon {
        top: 50px;
        left: 2.81538462%
    }

    .device-mockup>.device>.ribbon.new {
        top: 100px
    }

    .device-mockup.imac {
        padding-bottom: 81.230769%
    }

    .no-webp .device-mockup.imac>.device {
        background-image: url("img/tvscreen.webp")
    }

    .webp .device-mockup.imac>.device {
        background-image: url("img/tvscreen.webp")
    }

    .device-mockup.imac>.device>.screen {
        top: 8.20707071%;
        right: 6.61538462%;
        bottom: 31.6919192%;
        left: 6.61538462%
    }

    .device-wrapper {
        width: 100%;
        max-width: 100%
    }

    .device {
        position: relative;
        background-size: cover
    }

    .device .screen {
        position: absolute;
        pointer-events: none;
        background-size: cover
    }
/* 
    .device .button {
        position: absolute;
        cursor: pointer
    } */
</style>

<title>Salud los Álamos - TV SCREEN </title>

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

                    <!-- <div class="container pt-4 pb-3">
                        <div class="row">
                            <div class="col-12">
                                <div class="progress" style="height: 9px;">
                                    <div class="progress-bar bg-morado" role="progressbar" style="width: 50%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                    <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div> -->

                    <div class="row justify-content-center rounded-lg shadow-sm pb-4">
                        <!-- TV-->
                        <div class="col-xl-7 px-0 pb-4">

                            <div class="device-mockup imac mb-small">
                                <div class="device" style="background-image: url(img/tvscreen.webp);">
                                    <div class="screen" style="overflow-y: auto; pointer-events: all;"><iframe width="100%" height="100%" src="chat.php" allowfullscreen="allowfullscreen" allowpaymentrequest="" frameborder="0" style="position: absolute;"></iframe></div>
                                </div>
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


        <script src="../js/validaciongeneral.js"></script>
        <script src="../js/funcionswal.js"></script>
        <script src="../../assets/popper/popper.min.js"></script>
        <script src="../../jsdashboard/sb-admin-2.min.js"></script>
</body>

</html>