<?php
session_start();
include '../partes/SQL_galeria.php';
//if (!isset($_GET['pagina'])) header('location:galeria.php?pagina=1');
//  echo '<script>alert("'.http_response_code().'");</script>';
// var_dump(http_response_code());
// header("Location:?pg=1");
?>

<?php include '../partes/head.php'; ?>

<style>
    .galeria {
        padding: 25px;
    }

    .galeria .lightbox img {
        width: 100%;
        margin-bottom: 30px;
        transition: 0.2s ease-in-out;
        box-shadow: 0 2px 3px rgba(0, 0, 0, 0.2);
    }


    .galeria .lightbox img:hover {
        transform: scale(1.05);
        box-shadow: 0 8px 15px rgba(0, 0, 0, 0.3);
    }

    .galeria img {
        border-radius: 4px;
    }

    .baguetteBox-button {
        background-color: transparent !important;
    }



    /*wrapper {
        background-image: url(fondo.jpg) !important;
        background-size: 100% 100%;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    } */
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.css">
<title>CESFAM - Galeria</title>
</head>

<body style="background-color: #f4f1f1; ">

    <?php
    include '../partes/navbar.php';
    include '../partes/encriptacion.php'; ?>


    <div class="container" style="padding-top:80px;">
        <header class="text-center">
            <h1 class="font-weight-bold mb-2" style="color: #6a97bd;font-size: 50px;">Ga<span style="color:#90bde4;">leria</span></h1>
            <p>Podrás visualizar nuestras actividades a través de esta galeria.</p>
        </header>
        <div class="galeria">
            <div class="row">

                <?php

                while ($fila = mysqli_fetch_array($sql2)) {

                    if(!empty($fila["id_galeria"]) && !empty($fila["archivo_galeria"])){
                        $direccion = 'galeria/' . $fila["id_galeria"] . '/' . $fila["archivo_galeria"] . '';
                    }
                    else{
                        $direccion="";
                    }
                ?>

                    <div class="col-lg-3 col-md-4 col-6">
                        <a href="<?php echo $direccion; ?>" class="lightbox">
                            <img src="<?php echo $direccion; ?>" alt="<?php echo $fila["titulo_galeria"]; ?>" class="img-fluid" style="height: 190px;">
                        </a>
                    </div>

                <?php } ?>

            </div>
            <div class="row pb-3">
                <div class="col-md-12">
                    <nav aria-label="Page navigation">
                        <ul class="pagination justify-content-center">
                            <!-- content-start lo tira a la izquierda-->
                            <li class="page-item <?php echo $_GET['pg'] <= 1 ? 'disabled' : '' ?>">
                                <a class="page-link" href="?pg=<?php echo $_GET['pg'] - 1 ?>">Anterior</a>
                                <!--obtengo de la url el numero de pagina, si es n le resta 1, para ir a la anterior -->
                            </li>


                            <?php
                            for ($i = 0; $i < $paginas; $i++) { ?>
                                <li class="page-item <?php echo $_GET['pg'] == $i + 1 ? 'active' : '' ?>">
                                    <!-- si el numero de la pagina es igual a $i+1 se pinta activo-->
                                    <a class="page-link" href="?pg=<?php echo $i + 1; ?>"><?php echo $i + 1; ?></a>
                                </li>
                                <!--Para que comience desde el 1 y no desde el 0 -->
                            <?php } ?>


                            <li class="page-item <?php echo $_GET['pg'] >= $paginas ? 'disabled' : '' ?>">
                                <!--si el numero de pagina es mayor o igual (Ej: 5 total >= 5, si: entonces se deshabilita el boton siguiente) -->
                                <a class="page-link" href="?pg=<?php echo $_GET['pg'] + 1 ?>">Siguiente</a>
                            </li>
                        </ul>
                    </nav>
                </div><!-- end col -->
            </div><!-- end row -->
        </div>
        <!-- <div class="container" style="padding-bottom: 50px;">
 
        </div> -->


    </div>


    <?php include '../partes/footer.php'; ?>

    <div class="dmtop">Scroll to Top</div>

    </div><!-- end wrapper -->

    <!-- Core JavaScript
    ================================================== -->
    <script src="../js/jquery.min.js"></script>
    <script src="../js/tether.min.js"></script>
    <!-- <script src="../js/bootstrap.min.js"></script> -->
    <!-- <script src="../js/custom.js"></script> -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.js"></script>
    <script>
        /*https://github.com/feimosi/baguetteBox.js*/
        baguetteBox.run('.galeria', {
            captions: function(element) {
               // console.log(element.getElementsByTagName('img')[0].src);
                return element.getElementsByTagName('img')[0].alt;
            }
        });
    </script>


<!--IMPORTANTE -->

<!-- AGREGUE EL ARCHIVO .htaccess 
esto: Options -Indexes
para en caso de querer ir a la ruta 
ej: http://localhost/TESIS/tesis/proyecto/pgaleria/galeria/
no se muestren las carpetas con las imagenes sino que solo el servidor las visualice 
ya que, al hacer hover en las imagenes en la posicion inferior izquierda aparecia la ruta de las imagenes
y era inseguro
-->
</body>

</html>