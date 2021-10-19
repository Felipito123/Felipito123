<?php session_start(); ?>
<?php include '../partes/head.php';
include '../partes/encriptacion.php'; ?>

<link href="assets/css/material-kit.css?v=2.0.7" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />

<title>Salud los Álamos - Plan Auge</title>

<style>
    .btn-verde-claro {
        background-color: #1eceab;
    }

    .badge-verde-claro {
        background-color: #1eceab;
    }

    .btn-verde-claro:hover {
        background-color: #1eceab;
    }

    .btn-verde-claro:focus {
        background-color: #1eceab;
    }

    .btn-outline-verde-claro {
        color: #1eceab;
        background-color: transparent;
        border-color: #1eceab;
    }


    .nav-pills .nav-item .nav-link.active {
        background-color: #1eceab;
        box-shadow: 0 5px 20px 0px rgb(0 0 0 / 20%), 0 13px 24px -11px #9bc5bd;
    }
</style>
</head>




<body class="profile-page sidebar-collapse">

    <?php include '../partes/navbar.php'; ?> </div>

    <div class="page-header header-filter" style="background-image: url('fondo_detalle_noticia.png');"></div>
    <div class="container">
        <div class="main main-raised mb-4">
            <div class="container">
                <div class="row" style="height: 80px;">
                    <div class="col-md-6 ml-auto mr-auto">
                        <div class="profile">
                            <div class="avatar">
                                <img src="avatar_detalle_noticia.png" alt="Circle Image" class="img-raised rounded-circle img-fluid">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row justify-content-end pr-4">
                    <span class="badge badge-pill badge-info">Calificacion</span>
                </div>
                <!-- <div class="row justify-content-end pr-4">
        <button class="btn btn-info btn-fab btn-round">
          <i class="material-icons">favorite</i>
          <div class="ripple-container"></div>
        </button>
      </div> -->



                <div class="row justify-content-center">

                    <!-- Post Content Column -->
                    <div class="col-lg-10">

                        <!-- Title -->
                        <h1 class="mt-4">Post Title</h1>

                        <!-- Author -->
                        <p class="lead">
                            by
                            <a href="#">Start Bootstrap</a>
                        </p>
                        <hr>


                        <!-- Date/Time -->
                        <p>Posted on January 1, 2019 at 12:00 PM</p>

                        <hr>

                        <div class="row justify-content-center pb-3">
                            <span class="badge badge-pill badge-verde-claro">Primary</span>
                        </div>

                        <!-- Preview Image -->
                        <img class="img-fluid rounded" src="http://placehold.it/900x300" alt="">


                        <div class="row justify-content-center pt-2">
                            <!-- <div class="col-md-2"></div> -->

                            <label class="btn btn-verde-claro btn-sm"><i class="icofont-patient-bed"></i> CFM<div class="ripple-container"></div></label>
                            <label class="btn btn-default btn-sm"><i class="icofont-ui-calendar"></i> 28 DE DICIEMBRE</label>
                            <label class="btn btn-verde-claro btn-sm btn-sm"><i class="fas fa-eye"></i> 45 VISITAS<div class="ripple-container"></div></label>

                        </div>

                        <hr>

                        <!-- Post Content -->
                        <p class="lead text-center"> <strong> Lorem ipsum dolor sit amet</strong></p>
                        <button class="btn btn-default btn-fab btn-round float-right"><i class="fas fa-headphones-alt"></i>
                            <div class="ripple-container"></div>
                        </button>

                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut, tenetur natus doloremque laborum quos iste ipsum rerum obcaecati impedit odit illo dolorum ab tempora nihil dicta earum fugiat. Temporibus, voluptatibus.</p>

                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos, doloribus, dolorem iusto blanditiis unde eius illum consequuntur neque dicta incidunt ullam ea hic porro optio ratione repellat perspiciatis. Enim, iure!</p>

                        <blockquote class="blockquote">
                            <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                            <footer class="blockquote-footer">Someone famous in
                                <cite title="Source Title">Source Title</cite>
                            </footer>
                        </blockquote>

                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error, nostrum, aliquid, animi, ut quas placeat totam sunt tempora commodi nihil ullam alias modi dicta saepe minima ab quo voluptatem obcaecati?</p>

                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum, dolor quis. Sunt, ut, explicabo, aliquam tenetur ratione tempore quidem voluptates cupiditate voluptas illo saepe quaerat numquam recusandae? Qui, necessitatibus, est!</p>

                        <hr>


                        <div class="row pt-4">
                            <!-- Comments Form -->
                            <div class="card my-4">
                                <h5 class="card-header card-header-default" style="background: linear-gradient(60deg, #1eceab, #1da79a);">Leave a Comment:</h5>
                                <div class="card-body">



                                    <!-- Single Comment -->
                                    <div class="media mb-4">
                                        <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                                        <div class="media-body">
                                            <h5 class="mt-0">Commenter Name</h5>
                                            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                                        </div>
                                    </div>

                                    <!-- Comment with nested comments -->
                                    <div class="media mb-4">
                                        <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                                        <div class="media-body">
                                            <h5 class="mt-0">Commenter Name</h5>
                                            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.

                                            <div class="media mt-4">
                                                <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                                                <div class="media-body">
                                                    <h5 class="mt-0">Commenter Name</h5>
                                                    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                                                </div>
                                            </div>

                                            <div class="media mt-4">
                                                <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                                                <div class="media-body">
                                                    <h5 class="mt-0">Commenter Name</h5>
                                                    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                                                </div>
                                            </div>

                                        </div>
                                    </div>



                                </div>
                            </div>
                        </div>


                    </div>

                </div>


                <div class="row justify-content-center pb-3 pt-2">
                    <!--col-md-6 mb-4 mb-lg-0 col-md-6 mb-4 mb-lg-0 -->
                    <div class="col-md-3">
                        <label class="btn btn-outline-primary" style="color:#007bff;border-color: #007bff;"><i class="fab fa-facebook-f"></i> Compartir Facebook</label>
                    </div>
                    <div class="col-md-3">
                        <label class="btn btn-outline-info"><i class="fab fa-twitter"></i> Compartir Twitter<div class="ripple-container"></div></label>
                    </div>

                </div>

                <div class="section section-white">
                    <div class="container">
                        <!--                 nav pills -->
                        <div id="navigation-pills">
                            <div class="title">
                                <h3>Navigation Pills</h3>
                            </div>
                            <div class="title">
                                <h3><small>With Icons</small></h3>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-8">
                                    <ul class="nav nav-pills nav-pills-icons" role="tablist">

                                        <li class="nav-item">
                                            <a class="nav-link" href="#dashboard-1" role="tab" data-toggle="tab">
                                                <i class="material-icons">dashboard</i>
                                                Lo más visto
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link active" href="#schedule-1" role="tab" data-toggle="tab">
                                                <i class="material-icons">schedule</i>
                                                Recientes
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#tasks-1" role="tab" data-toggle="tab">
                                                <i class="material-icons">list</i>
                                                Tasks
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="tab-content tab-space">
                                        <div class="tab-pane active" id="dashboard-1">
                                            Collaboratively administrate empowered markets via plug-and-play networks. Dynamically procrastinate B2C users after installed base benefits.
                                            <br><br>
                                            Dramatically visualize customer directed convergence without revolutionary ROI.
                                        </div>
                                        <div class="tab-pane" id="schedule-1">
                                            Efficiently unleash cross-media information without cross-media value. Quickly maximize timely deliverables for real-time schemas.
                                            <br><br>Dramatically maintain clicks-and-mortar solutions without functional solutions.
                                        </div>
                                        <div class="tab-pane" id="tasks-1">
                                            Completely synergize resource taxing relationships via premier niche markets. Professionally cultivate one-to-one customer service with robust ideas.
                                            <br><br>Dynamically innovate resource-leveling customer service for state of the art customer service.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <ul class="nav nav-pills nav-pills-icons flex-column" role="tablist">
                                                <!--
                                      color-classes: "nav-pills-primary", "nav-pills-info", "nav-pills-success", "nav-pills-warning","nav-pills-danger"
                                  -->
                                                <li class="nav-item">
                                                    <a class="nav-link active" href="#dashboard-2" role="tab" data-toggle="tab">
                                                        <i class="material-icons">dashboard</i>
                                                        Dashboard
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="#schedule-2" role="tab" data-toggle="tab">
                                                        <i class="material-icons">schedule</i>
                                                        Schedule
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="tab-content">
                                                <div class="tab-pane active" id="dashboard-2">
                                                    Collaboratively administrate empowered markets via plug-and-play networks. Dynamically procrastinate B2C users after installed base benefits.
                                                    <br><br>
                                                    Dramatically visualize customer directed convergence without revolutionary ROI.
                                                </div>
                                                <div class="tab-pane" id="schedule-2">
                                                    Efficiently unleash cross-media information without cross-media value. Quickly maximize timely deliverables for real-time schemas.
                                                    <br><br>Dramatically maintain clicks-and-mortar solutions without functional solutions.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--                 end nav pills -->
                    </div>
                </div>



                <div class="section section-white">
                    <div class="container">
                        <!--                 nav pills -->
                        <div id="navigation-pills">
                            <div class="title">
                                <h3>Navigation Pills</h3>
                            </div>
                            <div class="title">
                                <h3><small>With Icons</small></h3>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-lg-6 col-md-12">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <ul class="nav nav-pills nav-pills-icons flex-column" role="tablist">

                                                <li class="nav-item">
                                                    <a class="nav-link active" href="#dashboard-2" role="tab" data-toggle="tab">
                                                        <i class="material-icons">dashboard</i>
                                                        Tags
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-md-8 pt-4 pl-4">
                                            <div class="tab-content pl-4">
                                                <div class="tab-pane active" id="dashboard-2">
                                                    <span class="badge badge-pill badge-warning">Warning</span>
                                                    <span class="badge badge-pill badge-warning">Warning</span>
                                                    <span class="badge badge-pill badge-warning">Warning</span>
                                                    <span class="badge badge-pill badge-warning">Warning</span>
                                                    <span class="badge badge-pill badge-warning">Warning</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--   end nav pills -->
                    </div>
                </div>



            </div>
        </div>
    </div>


    <a href="javascript:void(0)" class="back-to-top"><i class="icofont-simple-up" style="background: #1eceab;"></i></a>


    <!--   Core JS Files   -->
    <script src="./assets/js/bootstrap-material-design.min.js" type="text/javascript"></script>

    <script>
        // Back to top button
        $(window).scroll(function() {
            if ($(this).scrollTop() > 100) {
                $('.back-to-top').fadeIn('slow');
            } else {
                $('.back-to-top').fadeOut('slow');
            }
        });

        $('.back-to-top').click(function() {
            $('html, body').animate({
                scrollTop: 0
            }, 1500, 'easeInOutExpo');
            return false;
        });
    </script>
</body>

</html>