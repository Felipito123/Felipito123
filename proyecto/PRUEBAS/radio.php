<html lang="es">

<?php
include '../partes/head.php';
?>
<title>Salud los Álamos - RADIOS </title>

<style>
    #frequencias {
        border: 1px solid #222;
        background-color: transparent;
    }

    select option {
        background: #222;
        color: #fff;
    }

    select:not(:checked) {
        color: #222;
    }

    audio {
        width: 100%;
    }

    audio::-webkit-media-controls-play-button,
    audio::-webkit-media-controls-panel {
        background-color: #f44336 !important;
        /* color: #f44336 !important; */
    }

    audio:nth-child(2),
    audio:nth-child(4),
    audio:nth-child(6) {
        margin: 0;
    }
</style>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/1.7.3/socket.io.min.js"></script>
</head>

<body style="background-color: #222;">


    <!-- .container -->
    <div class="container p-2">

        <div class="row">
            <div class="col-lg-12 text-center">
                <!-- .main-header -->
                <header class="pt-4 m-1" style="background-color: #f44336;">
                    <div class="row justify-content-center text-center">
                        <div class="col-lg-12">
                            <img class="img-fluid p-4" src="https://vivo.biobiochile.cl/player/includes/img/logo.png" alt="BioBio - La Radio">
                        </div>
                    </div>
                </header><!-- /.main-header -->
            </div>

            <div class="col-lg-12 text-center p-4" style="display: none;">
                <img class="img-fluid" src="//www.biobiochile.cl/assets/biobiochile/img/mensaje-radio-mundial.png" width="100%">
            </div>
        </div>


        <div class="row m-1 pb-4" style="background-image: url('https://radiopanico.org/wp-content/uploads/2017/07/background.jpg');background-repeat: no-repeat;background-position:center;height: 50vh;">

            <div class="col-lg-12 text-center">
                <label id="estado" style="color:white;position: absolute;top: 0;top:5;left: 9;font-size: 16px;font-size: 1rem;padding: 7px 10px;background-color: rgba(0, 0, 0, 0.5);font-weight: 500; border-radius: 6px;">EN VIVO</label>
                <label style="color:white;position: absolute;top:5;right: 4;font-size: 12px;padding: 3px 10px;font-weight: 900; border-radius: 6px;">
                    <span class="pr-1">Escuchando</span>
                    <div></div>
                    <span class="pr-1"><i class="fa fa-user pr-1" aria-hidden="true"></i> 4260</span>
                </label>

                <label id="tituloradio" style="color:white;position: absolute;bottom:5;left: 50;right: 50;font-size: 25px;padding: 7px 10px;font-weight: 500;text-align:center">
                    Radio Bío-Bío Concepción 98.1
                </label>
            </div>


        </div>

        <div class="row justify-content-center m-1 pb-4" style="background-color: #f44336;">

            <div class="container pt-3">
                <div class="row justify-content-center pb-3">
                    <div class="col-xl-4 pr-5 pl-5 m-2">
                        <select name="frequencias" id="frequencias" class="form-control">
                            <option value="https://redirector.dps.live/biobiosantiago/aac/icecast.audio, Radio Bío-Bío Concepción 98.1">Radio BioBio</option>
                            <option value="https://unlimited11-cl.dps.live/carolinafm/aac/icecast.audio, Radio Carolina 99.3">Radio Carolina</option>
                            <option value="https://20323.live.streamtheworld.com/ADN_SC, ADN Radio 91.7">Radio ADN</option>
                            <option value="https://unlimited11-cl.dps.live/romantica/aac/icecast.audio, Radio Romántica 104.1">Radio Romántica</option>
                            <option value="https://sonando-us.digitalproserver.com/carnaval_vinadelmar.aac, Radio Carnaval 98.1">Radio Carnaval</option>
                            <option value="https://unlimited3-cl.dps.live/p7concepcion/aac/icecast.audio, Radio Punto 7 90.9">Radio Punto 7</option>
                            <option value="https://20833.live.streamtheworld.com/PUDAHUEL_SC, Radio Pudahuel 90.5">Radio Pudahuel FM</option>
                            <option value="https://unlimited3-cl.dps.live/disney/mp364k/icecast.audio, Radio Disney 95.3">Radio Disney</option>
                        </select>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <audio id="sonido" title="Radio Bío-Bío Concepción 98.1" style="display: block;" autoplay controls preload="none">
                            <source src="https://redirector.dps.live/biobiosantiago/aac/icecast.audio" type="audio/mpeg" />
                        </audio>
                    </div>
                </div>
            </div>

            <div class="col-lg-12 text-center pt-4">
                <a href="http://www.digitalproserver.com/" target="_blank">
                    <img class="img-fluid" src="https://vivo.biobiochile.cl/player/includes/img/dps_2.png" width="480" height="50">
                </a>
            </div>


        </div>


    </div><!-- /.container -->

    <script src="../../jsdashboard/jquery.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <!-- <script src="https://vivo.biobiochile.cl/player/includes/js/vendor/jquery.timer.js"></script> -->


    <script>
        var audio = document.getElementById('sonido');

        $('audio').on('pause', function() {
            if (audio.paused) {
                $("#estado").text('PAUSADO');
            }
        });

        $('audio').on('play', function() {
            if (audio.play) {
                $("#estado").text('EN VIVO');
            }
        });


        $('#frequencias').change(function() {
            let frecuencia = $(this).find("option:selected").attr('value');

            let separar = frecuencia.split(',');

            $("#sonido").attr("src", separar[0]);
            $("#tituloradio").text(separar[1]);

            audio.load();
            audio.play();

            // console.log("FRECUENCIA: " + frecuencia);
        });
    </script>


    <!-- <script src="https://vivo.biobiochile.cl/player/includes/js/vendor/jquery.animateNumber.js"></script> -->
    <!-- <script type="text/javascript" src="https://www.statcounter.com/counter/counter.js"></script> -->

</body>

</html>