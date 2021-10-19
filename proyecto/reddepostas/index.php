<?php session_start();
include '../partes/head.php';
?>
<style>
    .btn-primary:hover {
        color: #fff;
        background-color: #0551a2;
        border-color: #0551a2;
    }

    .btn-danger:hover {
        color: #fff;
        background-color: #c30505;
        border-color: #c30505;
    }

    .btn-success:hover {
        color: #fff;
        background-color: #1b6f2e;
        border-color: #1b6f2e;
    }

    .btn-info:hover {
        color: #fff;
        background-color: #11899c;
        border-color: #11899c;
    }

    @media screen and (max-width: 576px),
    screen and (max-width: 1200px) {
        #tamañoresponsivo {
            width: 85% !important;
        }
    }


    /* these styles are for the demo, but are not required for the plugin */
    .zoom {
        display: inline-block;
        position: relative;
    }

    /* magnifying glass icon */
    .zoom:after {
        content: '';
        display: block;
        width: 33px;
        height: 33px;
        position: absolute;
        top: 0;
        right: 0;
        background: url(icon.png);
    }

    .zoom img {
        display: block;
    }

    .zoom img::selection {
        background-color: transparent;
    }

    /*DIFUMINAR LA CARGA DEL DEL FRAME DEL MAPA DE SECTORIZACIÓN*/
    .blur {
        filter: blur(10px);
        transition: all 1s;
    }

    .noblur {
        transition: all 3s;
    }

    .btn-outline-info:hover{
        background-color: #17a2b8;
        color: white;
    }
</style>
<script type="text/javascript" src="js/jquery.zoom.js"></script>
<title>Salud los Álamos - Red de postas</title>
</head>

<body style="background-color: #f4f1f1; ">
    <!--f4f1f1 -->
    <?php include '../partes/navbar.php'; ?> </div>


    <div class="container" style="padding-top:80px;padding-bottom: 65px;">
        <header class="text-center">
            <h1 class="font-weight-bold mb-2" style="color: #6a97bd;font-size: 50px;">Red De<span style="color:#90bde4;"> Postas</span></h1>
            <p>Visualiza nuestra red de postas dentro de nuestra provincia.</p>
        </header>

        <div class="row justify-content-end pb-2 pr-5">
            <div class="col-xl-3 col-sm-6">
                <span class="btn btn-outline-info" style="border-radius: 20px 20px 20px 20px;" onclick="versectorizacion();"> <i class="fas fa-map-marked-alt"></i> Ver sectorización</span>
            </div>
        </div>

        <div class="row justify-content-center align-items-center">
            <div class="card shadow" id="tamañoresponsivo">
                <span class='zoom' id='ex1'>
                    <img src="../../importantes/MAPA.png" width='1000' height='680'>
                </span>
            </div>
        </div>
    </div>



    <?php include '../partes/footer.php'; ?>



    <!-- CAMBIAR EL ITEM DEL NAVBAR SELECCIONADO -->
    <script>
        $(document).ready(function() {
            $('#ex1').zoom();
            $('#ex2').zoom({
                on: 'grab'
            });
            $('#ex3').zoom({
                on: 'click'
            });
            $('#ex4').zoom({
                on: 'toggle'
            });
        });
    </script>

    <!-- jQuery, Popper.js, Bootstrap JS -->
    <script src="../js/tether.min.js"></script>
    <script src="js/sectorizacion.js"></script>

</body>

</html>