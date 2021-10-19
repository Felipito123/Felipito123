<?php session_start(); ?>
<?php include '../partes/head.php';
include '../partes/encriptacion.php'; ?>
<title>Salud los Álamos - Programas</title>

<style>
    .card {
        /* min-height: 96px; */
        border-left: 3px solid #0091e5;
        /* font-weight: bold; */
        border-right: 3px solid #0091e5;
        cursor: pointer;
        transition: all 0.2s ease;
    }

    .card:active {
        box-shadow: 0 0 0 white;
        margin: 6px 10px 2px 10px;
    }

    .btn_color_rojo {
        color: white;
        background-color: #dc3545;
    }


    .btn_color_rojo:hover {
        color: white;
        background-color: #ad2d3a;
    }

    .btn_color_rojo:focus {
        color: white;
        background-color: #90bde4;
    }
        /* Tamaños del navbar para celulares adaptable */
        @media (max-width: 320px) {
        .navbar {
            width: 320px;
        }
    }

    @media (min-width: 321px) and (max-width: 360px) {
        .navbar {
            width: 360px;
        }
    }

    @media (min-width: 361px) and (max-width: 375px) {
        .navbar {
            width: 375px;
        }
    }

    @media (min-width: 376px) and (max-width: 411px) {
        .navbar {
            width: 411px;
        }
    }

    @media (min-width: 412px) and (max-width: 414px) {
        .navbar {
            width: 414px;
        }
    }
</style>
</head>

<body style="background-color: #f4f1f1; ">
    <!--f4f1f1 -->
    <?php include '../partes/navbar.php'; ?> </div>


    <div class="container text-center" style="padding-top:80px;padding-bottom:30px;">
        <header class="text-center">
            <h1 class="font-weight-bold mb-2" style="color: #6a97bd;font-size: 50px;">Progr<span style="color:#90bde4;">amas</span></h1>
            <p>Encontrarás el detalle de cada uno de los programas de nuestra red de salud.</p>
        </header>

        <div class="row justify-content-center p-2 text-center">

            <div class="col-xl-6 pb-5">
                <a href="../detalleprograma/?dt=<?php echo encriptar("programadieciseis", "e"); ?>" class="btn btn_color_rojo btn-block rounded-pill shadow-sm"> <small> PROGRAMA DE ACOMPAÑAMIENTO PSICOSOCIAL A NIÑO(AS), ADOLESCENTES Y JÓVENES <small>(PAPNAJ)</small> </small> </a>
            </div>

            <div class="col-xl-6 col-sm-12 pb-5">
                <a href="../detalleprograma/?dt=<?php echo encriptar("programadiecisiete", "e"); ?>" class="btn btn_color_rojo btn-block rounded-pill shadow-sm"> ERA <small>(Enfermedades respiratorias de Adultos)</small> y TBC <small>(Tuberculosis)</small> </a>
            </div>

            <div class="col-xl-6 col-sm-12 pb-5">
                <a href="../detalleprograma/?dt=<?php echo encriptar("programauno", "e"); ?>" class="btn btn_color_rojo btn-block rounded-pill shadow-sm"> FARMACIA </a>
            </div>

            <div class="col-xl-6 col-sm-12 pb-5">
                <a href="../detalleprograma/?dt=<?php echo encriptar("programados", "e"); ?>" class="btn btn_color_rojo btn-block rounded-pill shadow-sm"> SALA DE NEUROREHABILITACIÓN </a>
            </div>

            <div class="col-xl-6 col-sm-12 pb-5">
                <a href="../detalleprograma/?dt=<?php echo encriptar("programatres", "e"); ?>" class="btn btn_color_rojo btn-block rounded-pill shadow-sm"> PASMI </a>
            </div>

            <div class="col-xl-6 col-sm-12 pb-5">
                <a href="../detalleprograma/?dt=<?php echo encriptar("programacuatro", "e"); ?>" class="btn btn_color_rojo btn-block rounded-pill shadow-sm"> IRA <small>(Infecciones Respiratorias Agudas)</small> </a>
            </div>

            <div class="col-xl-6 col-sm-12 pb-5">
                <a href="../detalleprograma/?dt=<?php echo encriptar("programacinco", "e"); ?>" class="btn btn_color_rojo btn-block rounded-pill shadow-sm"> DEPENDENCIA SEVERA </a>
            </div>

            <div class="col-xl-6 col-sm-12 pb-5">
                <a href="../detalleprograma/?dt=<?php echo encriptar("programaseis", "e"); ?>" class="btn btn_color_rojo btn-block rounded-pill shadow-sm"> ELIGE VIDA SANA </a>
            </div>

            <div class="col-xl-6 col-sm-12 pb-5">
                <a href="../detalleprograma/?dt=<?php echo encriptar("programasiete", "e"); ?>" class="btn btn_color_rojo btn-block rounded-pill shadow-sm"> IMAGENOLOGÍA </a>
            </div>

            <div class="col-xl-6 col-sm-12 pb-5">
                <a href="../detalleprograma/?dt=<?php echo encriptar("programaocho", "e"); ?>" class="btn btn_color_rojo btn-block rounded-pill shadow-sm"> CCR <small>(Centro Comunitario de Rehabilitación)</small> </a>
            </div>

            <div class="col-xl-6 col-sm-12 pb-5">
                <a href="../detalleprograma/?dt=<?php echo encriptar("programanueve", "e"); ?>" class="btn btn_color_rojo btn-block rounded-pill shadow-sm"> PROGRAMA CARDIOVASCULAR </a>
            </div>

            <div class="col-xl-6 col-sm-12 pb-5">
                <a href="../detalleprograma/?dt=<?php echo encriptar("programadiez", "e"); ?>" class="btn btn_color_rojo btn-block rounded-pill shadow-sm"> PROGRAMA DE EQUIDAD RURAL EN SALUD </a>
            </div>

            <div class="col-xl-6 col-sm-12 pb-5">
                <a href="../detalleprograma/?dt=<?php echo encriptar("programaonce", "e"); ?>" class="btn btn_color_rojo btn-block rounded-pill shadow-sm"> PROGRAMA ADOLESCENTE </a>
            </div>

            <div class="col-xl-6 col-sm-12 pb-5">
                <a href="../detalleprograma/?dt=<?php echo encriptar("programadoce", "e"); ?>" class="btn btn_color_rojo btn-block rounded-pill shadow-sm"> PAD Y CP </a>
            </div>

            <div class="col-xl-6 col-sm-12 pb-5">
                <a href="../detalleprograma/?dt=<?php echo encriptar("programatrece", "e"); ?>" class="btn btn_color_rojo btn-block rounded-pill shadow-sm"> SALUD FAMILIAR </a>
            </div>

            <div class="col-xl-6 col-sm-12 pb-5">
                <a href="../detalleprograma/?dt=<?php echo encriptar("programacatorce", "e"); ?>" class="btn btn_color_rojo btn-block rounded-pill shadow-sm"> PNAC PACAM </a>
            </div>

        </div>

        <div class="row justify-content-center">
            <div class="col-xl-6 col-sm-12 pb-5">
                <a href="../detalleprograma/?dt=<?php echo encriptar("programaquince", "e"); ?>" class="btn btn_color_rojo btn-block rounded-pill shadow-sm"> OIRS <small>(Oficina de Informaciones Reclamos y Sugerencias)</small> </a>
            </div>
        </div>

    </div>


    <!-- CAMBIAR EL ITEM DEL NAVBAR SELECCIONADO -->
    <script>
        $("#programas").attr('class', 'nav-item active');
    </script>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> -->

    <script src="../js/tether.min.js"></script>

</body>

</html>