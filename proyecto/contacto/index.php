<?php session_start(); ?>
<?php include '../partes/head.php'; ?>

<title>Salud los Álamos - Contacto</title>
</head>

<body>
    <?php include '../partes/navbar.php'; ?>

    <div class="page-title lb single-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <h2><i class="fa fa-envelope-open-o etiqueta"></i> Contáctanos <small class="hidden-xs-down hidden-sm-down">Llene este formulario. </small></h2>
                </div><!-- end col -->
                <div class="col-lg-4 col-md-4 col-sm-12 hidden-xs-down hidden-sm-down">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="../inicio">Inicio</a></li>
                        <li class="breadcrumb-item" style="color:#0091e5;">Contáctanos</li>
                    </ol>
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end page-title -->

    <section class="section wb">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-wrapper">
                        <div class="row">
                            <div class="col-xl-5 col-sm-12">
                                <h4>Quiénes somos</h4>
                                <p>Red de Salud Municipal de los Álamos. <br>Nuestros esfuerzos son
                                    entregar una atención equitativa
                                    y de calidad centrada en las personas y sus familias,
                                    enfocada en lo preventivo y promocional, es decir,
                                    anticipándose a la enfermedad,
                                    bajo el Modelo de Salud Integral con enfoque familiar y comunitario.
                                </p>

                                <h4>Como te ayudamos</h4>
                                <p>Tienes alguna sugerencia,agradecimiento, duda o queja.
                                    Te accedemos este apartado para que nos informes.</p>

                                <h4>Consulta o petición</h4>
                                <p>Una vez llenado los datos a través de este formulario.
                                    Prontamente le haremos llegar respuesta a su correo electrónico.</p>
                            </div>
                            <div class="col-xl-7 col-sm-12">
                                <form class="form-wrapper" id="formContacto" method="POST" autocomplete="off">
                                    <input type="text" class="form-control" placeholder="Nombre" name="contacto_nombre" id="contacto_nombre" onkeypress="return sololetras(event)" onpaste="return false" minlength="2" maxlength="50" required>
                                    <input type="text" class="form-control" placeholder="Correo electrónico" name="contacto_correo" id="contacto_correo" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$" onkeypress="return solocorreo(event)" minlength="11" maxlength="100" required>
                                    <input type="number" class="form-control" placeholder="Teléfono (+56)" name="contacto_telefono" id="contacto_telefono" min="922222222" oninput="if(this.value.length>=9) { this.value = this.value.slice(0,9);}" pattern="[0-9]+" onkeypress="return solonumeros(event)" onpaste="return false" required>
                                    <input type="text" class="form-control" placeholder="Asunto" name="contacto_asunto" id="contacto_asunto" onkeypress="return sololetrasynumeros(event)" onpaste="return false" minlength="2" maxlength="60" required>
                                    <textarea class="form-control" placeholder="Descripción" rows="10" cols="150" name="contacto_descripcion" id="contacto_descripcion" onkeypress="return soloCaractDeConversacion(event)" minlength="2" maxlength="5000" style="resize: none;" required></textarea>
                                    <small class="col-sm-7">
                                        Escrito <span id="escrito1" style="color:red;">00</span>
                                        Restantes <span id="contadorcaract1" style="color:#28a745;">00</span>
                                    </small>
                                    <div style="height: 8px;"></div>
                                    <button type="submit" id="enviar" class="btn btn-primary btn-block">Enviar <i class="fa fa-envelope-open-o"></i></button>
                                </form>
                            </div>
                        </div>
                    </div><!-- end page-wrapper -->
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section>



    <!--   <div class="logocesfam">
        <ul>
            <a href="">
                <li><img src="unnamed.png" alt="" class="img-fluid"></li>
            </a>
        </ul>
    </div> -->


    <?php include '../partes/footer.php'; ?>

    <div class="dmtop">Scroll to Top</div>

    </div><!-- end wrapper -->

    <!-- CAMBIAR EL ITEM DEL NAVBAR SELECCIONADO -->
    <script>
        $("#contactanos").attr('class', 'nav-item active');
    </script>

    <!-- Core JavaScript
    ================================================== -->
    <script src="../js/jquery.min.js"></script>
    <script src="../js/tether.min.js"></script>
    <!-- <script src="../js/bootstrap.min.js"></script> -->
    <!-- <script src="../js/custom.js"></script> -->
    <script src="../js/funcionswal.js"></script>
    <script src="../js/validaciongeneral.js"></script>
    <script src="js/contacto.js"></script>

    <script>
        $("#contacto_descripcion").keyup(function() {
            let noc = $("#contacto_descripcion").val().length;
            let now = $("#contacto_descripcion").val();
            let escrito = noc;
            // en caso que en el html del navegador alguien cambie el maxlenght
            if (noc >= 5000) {
                $('#contacto_descripcion').attr('maxlength', '5000')
            }
            noc = 5000 - noc;
            now = now.match(/\w+/g);
            if (!now) {
                now = 0;
            } else {
                now = now.length;
            }
            $("#escrito1").text(escrito);
            $("#contadorcaract1").text(noc);
        });
    </script>

</body>

</html>