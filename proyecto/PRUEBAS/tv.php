<html lang="es">

<?php include '../partes/head.php'; ?>
<title>Salud los Álamos - TV </title>
<script src="https://static.13.cl/7/sites/all/libraries/live/cl-13-website.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/iframe-resizer/3.5.14/iframeResizer.min.js"></script>
</head>

<body style="background-color: #222;">


    <!-- .container -->
    <div class="container p-2">

        <div class="row">
            <div class="col-lg-12 text-center">
                <!-- .main-header -->
                <header class="m-1" style="background-color: #fa6429;">
                    <div class="row justify-content-center text-center">
                        <div class="col-lg-12" >
                            <img class="img-fluid p-1" style="max-height: 145px;" src="https://static.13.cl/7/sites/all/themes/portal/images/default.jpg" alt="BioBio - La Radio">
                        </div>
                    </div>
                </header><!-- /.main-header -->
            </div>

            <div class="col-lg-12 text-center p-4" style="display: none;">
                <img class="img-fluid" src="//www.biobiochile.cl/assets/biobiochile/img/mensaje-radio-mundial.png" width="100%">
            </div>
        </div>


        <style>
            .copa-america__player__wrapper {
                width: 98%;
                max-width: 756px;
                margin: 10px auto 0 auto;
                /* padding-top: 50px; */
            }

            .copa-america__player__wrapper__content {
                width: 100%;
                height: 0;
                /* padding-top: 50.26%; */
                background: black;
                box-shadow: 0px 10px 20px rgb(0 0 0 / 50%);
                position: relative;
            }
        </style>


        <script>
            $(document).ready(function() {
                ga('send', 'event', 'Copa America - Prehome', 'Play');
            })
        </script>

        <div class="row justify-content-center m-1" style="background-color:black;height: 46vh;">

            <!-- style="border: 3px solid red;"  -->
            <div class="copa-america__player__wrapper shadow" id="player-wrapper">

                <div class="copa-america__player__wrapper__content">
                    <iframe id="player"></iframe>
                </div>
            </div>

            <script>
                // Lanzamos el player
                document.addEventListener("DOMContentLoaded", function(event) {
                    ca2021PlayerInit("5f51a916c21eec083ab337a8");
                });
            </script>

        </div>


    </div><!-- /.container -->

    <script>


        function ca2021PlayerInit(streamid) {
            token = getToken(streamid, "live");

            // alert(token);

            document.getElementById("player-wrapper").innerHTML = "<iframe id='player' src='//mdstrm.com/live-stream/" + streamid + "?access_token=" + token + "&autoplay=true' width='100%' height='422' allow='autoplay; fullscreen; encrypted-media' frameborder='0' allowfullscreen allowscriptaccess='always' scrolling='no'></iframe>";
            ga('13clGlobal.send', 'event', 'Señal en vivo', 'Play');

            if (parent.adImageUrl != null) {
                // Genero el banner oculto
                jQuery("#player-wrapper").append("<div id='div-banner-id' style='cursor:pointer; background:url(" + parent.adImageUrl + ");overflow:hidden; position:absolute; bottom:10px; left:190px; width:400px; height:60px; z-index:1000'></div>");
                jQuery("#div-banner-id").click(function() {
                    var win = window.open(parent.adClickUrl, "_blank");
                    win.focus();
                });
                jQuery("#div-banner-id").hide();

                var cerrarUrl = "https://static.13.cl/static/jwplayer/x.png";
                jQuery("#player-wrapper").append("<div id='div-close-id' style='cursor:pointer; background:url(" + cerrarUrl + "); overflow:hidden; position:absolute; bottom:62px; left:604px; width:15px; height:15px; z-index:1002'></div>");
                jQuery("#div-close-id").click(function() {
                    jQuery("#div-banner-id").hide();
                    jQuery("#div-close-id").hide();
                });
                jQuery("#div-close-id").hide();


                // Programamos la aparicion del banner
                var bannerInterval, bannerIntervalCounter = 1;
                setTimeout(function() {
                    var bannerLeft = parseInt(jQuery("#player-wrapper").width() / 2) - 200;
                    var closeLeft = bannerLeft + 400;
                    jQuery("#div-banner-id").css("left", bannerLeft + "px");
                    jQuery("#div-banner-id").show();
                    jQuery("#div-close-id").css("left", closeLeft + "px");
                    jQuery("#div-close-id").show();
                    setTimeout(function() {
                        jQuery("#div-banner-id").hide();
                        jQuery("#div-close-id").hide();
                    }, 8000);
                    bannerInterval = setInterval(function() {
                        if (bannerIntervalCounter++ < 7) {
                            var bannerLeft = parseInt(jQuery("#player-wrapper").width() / 2) - 200;
                            var closeLeft = bannerLeft + 400;
                            jQuery("#div-banner-id").css("left", bannerLeft + "px");
                            jQuery("#div-banner-id").show();
                            jQuery("#div-close-id").css("left", closeLeft + "px");
                            jQuery("#div-close-id").show();
                            setTimeout(function() {
                                jQuery("#div-banner-id").hide();
                                jQuery("#div-close-id").hide();
                            }, 8000);
                        } else clearInterval(bannerInterval);
                    }, 360000);
                }, 7000);
            }
        }
    </script>

    <script src="../../jsdashboard/jquery.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>



</body>

</html>