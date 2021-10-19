<?php session_start(); ?>
<?php include 'head/head.php'; ?>
<title>Salud los Álamos - MODALES </title>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.10.1/js/mdb.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.10.1/css/mdb.min.css" rel="stylesheet">

<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>

<style>
    #circl {
        background-color: #6fccc3;
    }
</style>
</head>

<body id="page-top">
    <!--style="background-color: brown;"-->
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column ">
            <!-- Main Content -->
            <div id="content">
                <?php include 'head/topbar.php'; ?>

                <div class="row col-6">

                    <a class="btn btn-info" onclick="toastr.info('Hi! I am info message.');">Toastr 1</a>
                    <a class="btn btn-danger" onclick="toastr.error('Hi! I am info message.');">Toastr 2</a>
                    <a class="btn btn-success" onclick="toastr.success('Hi! I am info message.');">Toastr 3</a>
                    <a class="btn btn-warning" onclick="toastr.warning('Hi! I am info message.');">Toastr 4</a>

                </div>

                <nav class="navbar navbar-expand-lg navbar-dark teal mb-4">
                <a class="navbar-brand" href="#">Navbar</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Features</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Pricing</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown 
                                </a>
                            <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </li>
                    </ul>
                    <form class="form-inline">
                        <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
                    </form>
                </div>
            </nav>

                <!--=======================================================================TOAST======================================================================== -->
                <div class="position-absolute w-100 d-flex flex-column p-4" hidden>
                    <div class="toast ml-auto" role="alert" data-delay="3000" id="toastuno" data-autohide="true">
                        <div class="toast-header">
                            <img src="head/buscador.png" class="rounded mr-2" alt="..." height="30" width="30">
                            <strong class="mr-auto text-primary">Toast uno</strong>
                            <small class="text-muted">3 mins ago</small>
                            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="toast-body" style="background-color: #eceeef; color:#2d2e2f"> Hey, there! This is a Bootstrap 4 toast. </div>
                    </div>

                    <div class="toast ml-auto" role="alert" data-delay="3000" id="toastdos" data-autohide="true">
                        <div class="toast-header">
                            <img src="head/buscador.png" class="rounded mr-2" alt="..." height="30" width="30">
                            <strong class="mr-auto text-primary">Toast dos</strong>
                            <small class="text-muted">3 mins ago</small>
                            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="toast-body" style="background-color: #eceeef; color:#2d2e2f"> Hey, there! This is a Bootstrap 4 toast. </div>
                    </div>
                </div>

                <div class="container-fluid" style="padding-bottom:7%;">

                    <div class="row justify-content-center">

                        <!--=======================================================================MODALS======================================================================== -->

                        <div class="modal fade right" id="exampleModalCenter1" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
                            <div class="modal-dialog modal-side modal-bottom-right">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Basic Modal</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <h3>Modal Body</h3>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade left" id="exampleModalCenter2" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
                            <div class="modal-dialog modal-side modal-top-left">
                                <div class="modal-content">
                                    <div class="modal-header bg-info text-white">
                                        <h5 class="modal-title">Product in the cart</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-3 text-center">
                                                <i class="fas fa-shopping-cart fa-4x text-info"></i>
                                            </div>

                                            <div class="col-9">
                                                <p>Do you need more time to make a purchase decision?</p>
                                                <p>No pressure, your product will be waiting for you in the cart.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-info">Go to the cart</button>
                                        <button type="button" class="btn btn-outline-info" data-dismiss="modal">
                                            Close
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade top" id="exampleModalCenter3" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
                            <div class="modal-dialog modal-frame modal-top">
                                <div class="modal-content">
                                    <div class="modal-body py-1">
                                        <div class="d-flex justify-content-center align-items-center my-3">
                                            <h4>
                                                <span class="badge bg-primary">Tema:</span>
                                            </h4>
                                            <p class="pt-3 mx-4">
                                                We have a gift for you! Use this code to get a
                                                <strong>10% discount</strong>.
                                            </p>

                                            <button type="button" class="btn btn-primary btn-sm ms-2">Use it</button>

                                            <button type="button" class="btn btn-info btn-sm ms-2" data-mdb-dismiss="modal">
                                                No, thanks
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade bottom" id="exampleModalCenter4" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
                            <div class="modal-dialog modal-frame modal-bottom">
                                <div class="modal-content">
                                    <div class="modal-body py-1">
                                        <div class="d-flex justify-content-center align-items-center my-3">
                                            <p class="mb-0">Utilizamos cookies para asegurar que damos la mejor experiencia al usuario en nuestra web. Si sigues utilizando este sitio asumiremos que estás de acuerdo</p>
                                            <button type="button" class="btn btn-success btn-sm ms-2" data-mdb-dismiss="modal">
                                                Ok, Esta bien.
                                            </button>
                                            <button type="button" class="btn btn-primary btn-sm ms-2">Leer más</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter1">
                            modal bottom rigth
                        </button>

                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalCenter2">
                            modal top left
                        </button>

                        <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModalCenter3">
                            modal frame top
                        </button>


                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModalCenter4">
                            modal frame bottom
                        </button>

                        <button type="button" class="btn btn-danger ripple-surface" id="juanete">Toast</button>

                        <button type="button" class="btn btn-deep-orange mt-1">No hace nada, solo para mostrar el color <i class="fas fa-sign-in ml-1"></i></button>

                    </div>


                    <!--Modal: Login with Avatar Form-->
                    <div class="modal fade" id="modalLoginAvatar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog cascading-modal modal-avatar modal-sm" role="document">
                            <!--Content-->
                            <div class="modal-content">
                                <!-- style="background-image: url('https://mdbootstrap.com/img/Photos/Others/pricing-table%20(7).jpg');" -->
                                <!--Header-->
                                <div class="modal-header">
                                    <img src="https://cdn.pixabay.com/photo/2017/06/10/06/39/calender-2389150_960_720.png" alt="avatar" class="rounded-circle img-responsive">
                                </div>
                                <!--Body-->
                                <div class="modal-body text-center mb-1">

                                    <h4 class="mt-1 mb-2">Información del evento</h4>

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="md-form mb-5">
                                                <input type="text" id="nombre" class="form-control validate valid" minlength="4" maxlength="5" value="juano" autocomplete="false" disabled>
                                                <label class="active" data-error="Lsrgo inválido" data-success="" for="nombre" style="color:#00c851"><i class="fas fa-user" style="color: #00c851"></i> Titulo</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="md-form mb-5">
                                                <input type="text" id="fechainicio" class="form-control validate" minlength="4" maxlength="5" value="juano" autocomplete="false" disabled>
                                                <label class="active" for="fechainicio" style="color:#00c851"><i class="fas fa-calendar-day" style="color: #00c851"></i> Fecha inicio</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="md-form mb-5">
                                                <input type="text" id="horainicio" class="form-control validate" minlength="4" maxlength="5" value="juano" autocomplete="false" disabled>
                                                <label class="active" for="horainicio" style="color:#00c851"><i class="fas fa-clock" style="color: #00c851"></i> Hora inicio</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="md-form mb-5">
                                                <input type="text" id="fechatermino" class="form-control validate" minlength="4" maxlength="5" value="juano" autocomplete="false" disabled>
                                                <label class="active" for="fechatermino" style="color:#00c851"><i class="fas fa-calendar-day" style="color: #00c851"></i> Fecha fin</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="md-form mb-5">
                                                <input type="text" id="horafin" class="form-control validate" minlength="4" maxlength="5" value="juano" autocomplete="false" disabled>
                                                <label class="active" for="horafin" style="color:#00c851"><i class="fas fa-clock" style="color: #00c851"></i> Hora fin</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="md-form">
                                                <textarea type="text" id="descripcion" class="md-textarea form-control" rows="4" cols="8" disabled></textarea>
                                                <label class="active" style="color: #00c851" for="descripcion">Descripción</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="text-center mt-4">
                                        <button data-dismiss="modal" class="btn btn-default mt-1">Cerrar <i class="fas fa-sign-in ml-1"></i></button>
                                    </div>
                                </div>
                            </div>
                            <!--/.Content-->
                        </div>
                    </div>
                    <!--Modal: Login with Avatar Form-->

                    <div class="text-center">
                        <a href="" class="btn btn-default btn-rounded" data-toggle="modal" data-target="#modalLoginAvatar">Launch
                            Modal Login with Avatar</a>
                    </div>


                    <div class="row justify-content-center">
                        <div class="col-9">
                            <div class="row">
                                <div class="card col-lg-3 col-md-6 mb-4 mb-lg-0 px-4 py-2" style="border-radius: 20px;">
                                    <div class="row justify-content-center py-2">
                                        <img src="profile.jpg" class="img-fluid" alt="" style="border-radius: 10px 10px 0px 0px;">
                                    </div>
                                    <div class="py-1">
                                        <div class="row">
                                            <div class="col-lg-8">
                                                <span class="badge badge-danger">Destacado</span>
                                            </div>

                                            <div class="col-lg-4">
                                                <small><i class="fas fa-clinic-medical pr-2"></i> CESFAM </small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="py-2">
                                        <p> Make a gift for yourself or your family - choose a Lenovo laptop and receive gifts! -choose a Lenovo laptop and receive gifts! hoose a Lenovo </p>
                                        <div class="row">
                                            <small><i class="fas fa-calendar-alt"></i> &nbsp; 28 de Diciembre 2020</small>
                                        </div>
                                        <div class="row">
                                            <small><i class="fas fa-eye"></i>&nbsp; 223 vistas</small>
                                        </div>

                                        <div class="row">
                                            <a href="#" class="btn btn-default ml-auto px-3 font-weight-bold"> Leer más <span class="rounded-circle sp1 px-2 py-0 ml-1"> <i class="fa fa-angle-right" aria-hidden="true"></i> </span> </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-1"></div>

                                <div class="card col-lg-3 col-md-6 mb-4 mb-lg-0 px-4 py-2" style="border-radius: 20px;">
                                    <div class="row justify-content-center py-2">
                                        <img src="profile.jpg" class="img-fluid" alt="" style="border-radius: 10px 10px 0px 0px;">
                                    </div>
                                    <div class="py-1">
                                        <div class="row">
                                            <div class="col-lg-8">
                                                <span class="badge badge-danger">Destacado</span>
                                            </div>

                                            <div class="col-lg-4">
                                                <small><i class="fas fa-clinic-medical pr-2"></i> CESFAM </small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="py-2">
                                        <p> Make a gift for yourself or your family - choose a Lenovo laptop and receive gifts! -choose a Lenovo laptop and receive gifts! hoose a Lenovo </p>
                                        <div class="row">
                                            <small><i class="fas fa-calendar-alt"></i> &nbsp; 28 de Diciembre 2020</small>
                                        </div>
                                        <div class="row">
                                            <small><i class="fas fa-eye"></i>&nbsp; 223 vistas</small>
                                        </div>

                                        <div class="row">
                                            <a href="#" class="btn btn-default ml-auto px-3 font-weight-bold"> Leer más <span class="rounded-circle sp1 px-2 py-0 ml-1"> <i class="fa fa-angle-right" aria-hidden="true"></i> </span> </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-1"></div>

                                <div class="card col-lg-3 col-md-6 mb-4 mb-lg-0 px-4 py-2" style="border-radius: 20px;">
                                    <div class="row justify-content-center py-2">
                                        <img src="profile.jpg" class="img-fluid" alt="" style="border-radius: 10px 10px 0px 0px;">
                                    </div>
                                    <div class="py-1">
                                        <div class="row">
                                            <div class="col-lg-8">
                                                <span class="badge badge-danger">Destacado</span>
                                            </div>

                                            <div class="col-lg-4">
                                                <small><i class="fas fa-clinic-medical pr-2"></i> CESFAM </small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="py-2">
                                        <p> Make a gift for yourself or your family - choose a Lenovo laptop and receive gifts! -choose a Lenovo laptop and receive gifts! hoose a Lenovo </p>
                                        <div class="row">
                                            <small><i class="fas fa-calendar-alt"></i> &nbsp; 28 de Diciembre 2020</small>
                                        </div>
                                        <div class="row">
                                            <small><i class="fas fa-eye"></i>&nbsp; 223 vistas</small>
                                        </div>

                                        <div class="row">
                                            <a href="#" class="btn btn-default ml-auto px-3 font-weight-bold"> Leer más <i class="fa fa-angle-right" aria-hidden="true"></i> </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="container">
                        <!--Grid row-->
                        <!-- <div class="row">
                       
                            <div class="col-lg-4 col-md-12 mb-4">
                                <img src="http://mdbootstrap.com/img/Photos/Lightbox/Original/img%20(58).jpg" class="img-fluid mb-4" alt="">
                                <img src="http://mdbootstrap.com/img/Photos/Lightbox/Original/img%20(66).jpg" class="img-fluid mb-4" alt="" data-wow-delay="0.3s">
                            </div>
                  
                            <div class="col-lg-4 col-md-6 mb-4">

                                <img src="http://mdbootstrap.com/img/Photos/Lightbox/Original/img%20(74).jpg" class="img-fluid mb-4" alt="" data-wow-delay="0.1s">

                                <img src="http://mdbootstrap.com/img/Photos/Lightbox/Original/img%20(64).jpg" class="img-fluid mb-4" alt="" data-wow-delay="0.4s">

                            </div>
           
                            <div class="col-lg-4 col-md-6 mb-4">

                                <img src="http://mdbootstrap.com/img/Photos/Lightbox/Original/img%20(77).jpg" class="img-fluid mb-4" alt="" data-wow-delay="0.2s">

                                <img src="http://mdbootstrap.com/img/Photos/Lightbox/Original/img%20(67).jpg" class="img-fluid mb-4" alt="" data-wow-delay="0.5s">

                            </div>
    
                        </div> -->

                        <div class="row pb-5 mb-4">
                            <div class="col-lg-5 col-md-6 mb-4 mb-lg-0">
                                <!-- Card-->
                                <div class="card rounded shadow-sm border-0">
                                    <div class="card-body p-4"><img src="https://res.cloudinary.com/mhmd/image/upload/v1556485076/shoes-1_gthops.jpg" alt="" class="img-fluid d-block mx-auto mb-3">

                                        <div class="py-1">
                                            <div class="row justify-content-between">
                                                <div class="col-lg-3">
                                                    <span class="badge badge-danger">Destacado</span>
                                                </div>
                                            </div>
                                        </div>

                                        <h5> <a href="#" class="text-dark">Awesome product</a></h5>
                                        <p class="small text-muted font-italic">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                        <div class="row justify-content-end">
                                            <span class="btn btn-default col-8" style="border-radius: 20px 20px 20px 20px;">Leer más <i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                                <!-- Card-->
                                <div class="card rounded shadow-sm border-0">
                                    <div class="card-body p-4"><img src="https://res.cloudinary.com/mhmd/image/upload/v1556485076/shoes-1_gthops.jpg" alt="" class="img-fluid d-block mx-auto mb-3">
                                        <div class="py-1">
                                            <div class="row justify-content-between">
                                                <div class="col-lg-3">
                                                    <span class="badge badge-danger">Destacado</span>
                                                </div>
                                            </div>
                                        </div>
                                        <h5> <a href="#" class="text-dark">Awesome product</a></h5>
                                        <p class="small text-muted font-italic">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                        <div class="row justify-content-end">
                                            <span class="btn btn-default col-8" style="border-radius: 20px 20px 20px 20px;">Leer más <i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
                                <!-- Card-->
                                <div class="card rounded shadow-sm border-0">
                                    <div class="card-body p-4"><img src="https://res.cloudinary.com/mhmd/image/upload/v1556485076/shoes-1_gthops.jpg" alt="" class="img-fluid d-block mx-auto mb-3">
                                        <div class="py-1">
                                            <div class="row justify-content-between">
                                                <div class="col-lg-3">
                                                    <span class="badge badge-danger">Destacado</span>
                                                </div>
                                            </div>
                                        </div>
                                        <h5> <a href="#" class="text-dark">Awesome product Awesome product Awesome product</a></h5>
                                        <p class="small text-muted font-italic">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                        <div class="row justify-content-end">
                                            <span class="btn btn-default col-8" style="border-radius: 20px 20px 20px 20px;">Leer más <i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!--Grid row-->
                        <!-- <div class="card col-lg-3 col-md-6 mb-4 mb-lg-0 pb-3 px-4 py-2" style="border-radius: 20px;">
                        <div class="bg-default row justify-content-center py-2 px-2 " style="border-radius: 10px 10px 0px 0px">
                            <div class="col-9 d-flex">
                                <div class="rounded-circle d-flex align-items-center justify-content-center w-100" id="circl"> <img src="https://i.imgur.com/XToGJBL.png" height="90%" width="90%" alt=""> </div>
                            </div>
                        </div>
                        <div class="py-2">
                            <div class="row">
                                <div class="col-lg-8">
                                    <span class="badge badge-danger">Destacado</span>
                                </div>

                                <div class="col-lg-4">
                                    <small><i class="fas fa-clinic-medical pr-2"></i> CESFAM </small>
                                </div>
                            </div>
                        </div>
                        <div class="py-2">
                            <p> Make a gift for yourself or your family - choose a Lenovo laptop and receive gifts! -choose a Lenovo laptop and receive gifts! </p>

                            <div class="pb-2">
                                <div class="row">
                                    <small><i class="fas fa-calendar-alt"></i> &nbsp; 28 de Diciembre 2020</small>
                                </div>
                                <div class="row">
                                    <small><i class="fas fa-eye"></i>&nbsp; 223 </small>
                                </div>
                            </div>
                            <div class="row">
                                <a href="#" class="btn btn-default ml-auto px-3 font-weight-bold"> Leer más <span class="rounded-circle sp1 px-2 py-0 ml-1"> <i class="fa fa-angle-right" aria-hidden="true"></i> </span> </a>
                            </div>
                        </div>
                    </div> -->

                        <!-- <div class="row">
                        <div class="col-9">
                            <div class="row">
                                <div class="col-lg-3 col-md-6 mb-4 mb-lg-0 pb-3">
                                    <div class="bg-default row justify-content-center py-2 px-2" style="border-radius: 10px 10px 0px 0px">
                                        <div class="col-9 d-flex">
                                            <div class="rounded-circle d-flex align-items-center justify-content-center w-100" id="circl"> <img src="https://i.imgur.com/XToGJBL.png" height="90%" width="90%" alt=""> </div>
                                        </div>
                                    </div>
                                    <div class="py-2">
                                        <div class="row">
                                            <span class="badge badge-danger">Destacado</span>
                                        </div>
                                    </div>
                                    <div class="py-2">
                                        <p> Make a gift for yourself or your family - choose a Lenovo laptop and receive gifts! -choose a Lenovo laptop and receive gifts! </p>

                                        <div class="pb-2">
                                            <div class="row justify-content-center">
                                                <small> 28 de Diciembre 2020 /</small> <small class="pl-1"> CESFAM </small> <small class="pl-1">/ 223 </small>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <a href="#" class="btn btn-default ml-auto px-3 font-weight-bold"> Leer más <span class="rounded-circle sp1 px-2 py-0 ml-1"> <i class="fa fa-angle-right" aria-hidden="true"></i> </span> </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->


                        <div class="container my-4">


                            <!--Carousel Wrapper-->
                            <div id="multi-item-example" class="carousel slide carousel-multi-item" data-ride="carousel">

                                <!--Controls-->
                                <div class="controls-top">
                                    <a class="btn-floating" href="#multi-item-example" data-slide="prev"><i class="fas fa-chevron-left"></i></a>
                                    <a class="btn-floating" href="#multi-item-example" data-slide="next"><i class="fas fa-chevron-right"></i></a>
                                </div>
                                <!--/.Controls-->

                                <!--Indicators-->
                                <ol class="carousel-indicators">
                                    <li data-target="#multi-item-example" data-slide-to="0" class="active"></li>
                                    <li data-target="#multi-item-example" data-slide-to="1"></li>

                                </ol>
                                <!--/.Indicators-->

                                <!--Slides-->
                                <div class="carousel-inner" role="listbox">

                                    <!--First slide-->
                                    <div class="carousel-item active">

                                        <div class="col-md-3" style="float:left">
                                            <div class="card mb-2">
                                                <img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Horizontal/City/4-col/img%20(60).jpg" alt="Card image cap">
                                                <div class="card-body">
                                                    <h4 class="card-title">Card title</h4>
                                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                                                        card's content.</p>
                                                    <a class="btn btn-primary">Button</a>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-3" style="float:left">
                                            <div class="card mb-2">
                                                <img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Horizontal/City/4-col/img%20(60).jpg" alt="Card image cap">
                                                <div class="card-body">
                                                    <h4 class="card-title">Card title</h4>
                                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                                                        card's content.</p>
                                                    <a class="btn btn-primary">Button</a>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-3" style="float:left">
                                            <div class="card mb-2">
                                                <img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Horizontal/City/4-col/img%20(60).jpg" alt="Card image cap">
                                                <div class="card-body">
                                                    <h4 class="card-title">Card title</h4>
                                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                                                        card's content.</p>
                                                    <a class="btn btn-primary">Button</a>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-3" style="float:left">
                                            <div class="card mb-2">
                                                <img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Horizontal/City/4-col/img%20(60).jpg" alt="Card image cap">
                                                <div class="card-body">
                                                    <h4 class="card-title">Card title</h4>
                                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                                                        card's content.</p>
                                                    <a class="btn btn-primary">Button</a>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <!--/.First slide-->

                                    <!--Second slide-->
                                    <div class="carousel-item">

                                        <div class="col-md-3" style="float:left">
                                            <div class="card mb-2">
                                                <img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Horizontal/City/4-col/img%20(60).jpg" alt="Card image cap">
                                                <div class="card-body">
                                                    <h4 class="card-title">Card title</h4>
                                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                                                        card's content.</p>
                                                    <a class="btn btn-primary">Button</a>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-3" style="float:left">
                                            <div class="card mb-2">
                                                <img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Horizontal/City/4-col/img%20(47).jpg" alt="Card image cap">
                                                <div class="card-body">
                                                    <h4 class="card-title">Card title</h4>
                                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                                                        card's content.</p>
                                                    <a class="btn btn-primary">Button</a>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-3" style="float:left">
                                            <div class="card mb-2">
                                                <img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Horizontal/City/4-col/img%20(48).jpg" alt="Card image cap">
                                                <div class="card-body">
                                                    <h4 class="card-title">Card title</h4>
                                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                                                        card's content.</p>
                                                    <a class="btn btn-primary">Button</a>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-3" style="float:left">
                                            <div class="card mb-2">
                                                <img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Horizontal/City/4-col/img%20(47).jpg" alt="Card image cap">
                                                <div class="card-body">
                                                    <h4 class="card-title">Card title</h4>
                                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                                                        card's content.</p>
                                                    <a class="btn btn-primary">Button</a>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <!--/.Second slide-->



                                </div>
                                <!--/.Slides-->


                            </div>
                            <!--FIN DEL ROW  -->
                        </div>
                    </div>
                </div>
                <!-- End of Content Wrapper -->
            </div>
            <!-- End of Page Wrapper -->


            <!-- Scroll to Top Button-->
            <a class="scroll-to-top rounded" href="#page-top">
                <i class="fas fa-angle-up"></i>
            </a>

            <script>
                // $('#nombre').val("alsklaksa");


                $('#toastuno').toast('show');
                $('#toastdos').toast('show');

                // $('#juanete').toast('show')
            </script>


            <script>
                function toasterOptions() {
                    toastr.options = {
                        "closeButton": false,
                        "debug": false,
                        "newestOnTop": false,
                        "progressBar": true,
                        "positionClass": "toast-bottom-right",
                        "preventDuplicates": true,
                        "onclick": null,
                        "showDuration": "100",
                        "hideDuration": "1000",
                        "timeOut": "2500",
                        "extendedTimeOut": "500",
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "show",
                        "hideMethod": "hide" // ,"showMethod": "slideDown","hideMethod": "slideUp"
                    };
                };


                toasterOptions();
                toastr.error("Juaneeeeeeeeeeete");
            </script>
</body>

</html>