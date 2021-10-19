<?php include '../dashboard/head.php'; ?>

<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/css/bootstrap.min.css"> -->

<title>Salud los Álamos - CHAT 1</title>

</head>

<body id="page-top">
    <?php ?>
    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php //include '../dashboard/sidebar.php'; 
        ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content" class="pb-4">

                <?php //include '../dashboard/topbar.php'; ?>

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


                    <div class="card shadow-sm">
                        <div class="card-body">
                            <div class="row justify-content-center rounded-lg shadow-sm pb-4">
                                <!-- Chat Box-->
                                <div class="col-xl-9 px-0 pb-4">
                                    <div class="px-4 py-5 chat-box bg-white">
                                        <!-- Sender Message-->
                                        <div class="media w-50 mb-3"><img src="https://nextbootstrap.netlify.app/assets/images/profiles/1.jpg" alt="user" width="50" class="rounded-circle">
                                            <div class="media-body ml-3">
                                                <div class="bg-light rounded py-2 px-3 mb-2">
                                                    <p class="text-small mb-0 text-muted">Test which is a new approach all solutions</p>
                                                </div>
                                                <p class="small text-muted">12:00 PM | Aug 13</p>
                                            </div>
                                        </div>

                                        <!-- Reciever Message-->
                                        <div class="media w-50 ml-auto mb-3">
                                            <div class="media-body">
                                                <div class="bg-primary rounded py-2 px-3 mb-2">
                                                    <p class="text-small mb-0 text-white">Test which is a new approach to have all solutions</p>
                                                </div>
                                                <p class="small text-muted">12:00 PM | Aug 13</p>
                                            </div>
                                        </div>

                                        <!-- Sender Message-->
                                        <div class="media w-50 mb-3"><img src="https://nextbootstrap.netlify.app/assets/images/profiles/1.jpg" alt="user" width="50" class="rounded-circle">
                                            <div class="media-body ml-3">
                                                <div class="bg-light rounded py-2 px-3 mb-2">
                                                    <p class="text-small mb-0 text-muted">Test, which is a new approach to have</p>
                                                </div>
                                                <p class="small text-muted">12:00 PM | Aug 13</p>
                                            </div>
                                        </div>

                                        <!-- Reciever Message-->
                                        <div class="media w-50 ml-auto mb-3">
                                            <div class="media-body">
                                                <div class="bg-primary rounded py-2 px-3 mb-2">
                                                    <p class="text-small mb-0 text-white">Apollo University, Delhi, India Test</p>
                                                </div>
                                                <p class="small text-muted">12:00 PM | Aug 13</p>
                                            </div>
                                        </div>

                                        <!-- Sender Message-->
                                        <div class="media w-50 mb-3"><img src="https://nextbootstrap.netlify.app/assets/images/profiles/1.jpg" alt="user" width="50" class="rounded-circle">
                                            <div class="media-body ml-3">
                                                <div class="bg-light rounded py-2 px-3 mb-2">
                                                    <p class="text-small mb-0 text-muted">Test, which is a new approach</p>
                                                </div>
                                                <p class="small text-muted">12:00 PM | Aug 13</p>
                                            </div>
                                        </div>

                                        <!-- Reciever Message-->
                                        <div class="media w-50 ml-auto mb-3">
                                            <div class="media-body">
                                                <div class="bg-primary rounded py-2 px-3 mb-2">
                                                    <p class="text-small mb-0 text-white">Apollo University, Delhi, India Test</p>
                                                </div>
                                                <p class="small text-muted">12:00 PM | Aug 13</p>
                                            </div>
                                        </div>

                                    </div>

                                    <!-- Typing area -->
                                    <form action="#" class="bg-light m-2">
                                        <div class="input-group">
                                            <input type="text" placeholder="Escribe un mensaje..." aria-describedby="button-addon2" class="form-control rounded-0 border-0 py-4 bg-light" required>
                                            <div class="input-group-append">
                                                <button id="button-addon2" type="submit" class="btn btn-info"> <i class="fa fa-paper-plane"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- End of Main Content -->

                <?php //include '../dashboard/footer.php'; 
                ?>

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