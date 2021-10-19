<?php
// header('X-Frame-Options: SAMEORIGIN, GOFORIT');
// header_remove("X-Frame-Opciones");
session_start();
include '../partes/head.php';

?>
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
        top: 7.0438729%;
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
        padding-bottom: 80.230769%
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

    /* #content {
        background-color: #ffffff;
        background-image: url("hola.svg");
        background-attachment: fixed;
        background-repeat: no-repeat;
        background-position: center;
    } */
    .Le8nfe {
            background: #fff;
            bottom: 0;
            direction: ltr;
            left: 0;
            overflow: hidden;
            position: fixed;
            right: 0;
            top: 0;
            z-index: -1;
        }
</style>

<title>Salud los Álamos - Plan paso a paso </title>
</head>

<body style="background-color: #f4f1f1;">
    <!--f4f1f1 -->
    <?php include '../partes/navbar.php'; ?> </div>


    <div class="container-fluid" style="padding-top:80px;" id="content">

    <div class="Le8nfe" aria-hidden="true">
        <svg xmlns="https://www.w3.org/2000/svg" viewBox="0 0 1440 810" preserveAspectRatio="xMinYMin slice" aria-hidden="true" height="100%" width="100%">
            <path fill="#efefee" d="M592.66 0c-15 64.092-30.7 125.285-46.598 183.777C634.056 325.56 748.348 550.932 819.642 809.5h419.672C1184.518 593.727 1083.124 290.064 902.637 0H592.66z"></path>
            <path fill="#f6f6f6" d="M545.962 183.777c-53.796 196.576-111.592 361.156-163.49 490.74 11.7 44.494 22.8 89.49 33.1 134.883h404.07c-71.294-258.468-185.586-483.84-273.68-625.623z"></path>
            <path fill="#f7f7f7" d="M153.89 0c74.094 180.678 161.088 417.448 228.483 674.517C449.67 506.337 527.063 279.465 592.56 0H153.89z"></path>
            <path fill="#fbfbfc" d="M153.89 0H0v809.5h415.57C345.477 500.938 240.884 211.874 153.89 0z"></path>
            <path fill="#ebebec" d="M1144.22 501.538c52.596-134.583 101.492-290.964 134.09-463.343 1.2-6.1 2.3-12.298 3.4-18.497 0-.2.1-.4.1-.6 1.1-6.3 2.3-12.7 3.4-19.098H902.536c105.293 169.28 183.688 343.158 241.684 501.638v-.1z"></path>
            <path fill="#e1e1e1" d="M1285.31 0c-2.2 12.798-4.5 25.597-6.9 38.195C1321.507 86.39 1379.603 158.98 1440 257.168V0h-154.69z"></path>
            <path fill="#e7e7e7" d="M1278.31,38.196C1245.81,209.874 1197.22,365.556 1144.82,499.838L1144.82,503.638C1185.82,615.924 1216.41,720.211 1239.11,809.6L1439.7,810L1439.7,256.768C1379.4,158.78 1321.41,86.288 1278.31,38.195L1278.31,38.196z"></path>
        </svg>
    </div>

        <header>
            <div class="row justify-content-center text-center pb-2">
                <div class="col-xl-12">
                    <h1 class="font-weight-bold mb-2" style="color: #6a97bd;font-size: 50px;">Plan Paso<span style="color:#90bde4;"> a Paso</span></h1>
                    <p></p>
                </div>

            </div>
        </header>

        <div class="row justify-content-center rounded-lg shadow-none" style="margin-top: -37px;">

            <!-- PLAN PASO A PASO-->
            <div class="col-xl-7 pb-5">

                <div class="device-mockup imac mb-small">
                    <div class="device" style="background-image: url(img/tvscreen.webp);">
                        <div class="screen" style="overflow-y: auto; pointer-events: all;"><iframe width="100%" height="100%" sandbox="allow-same-origin allow-scripts allow-popups allow-forms" src="obtenerplanpasoapaso.php" allowfullscreen="allowfullscreen" allowpaymentrequest="" frameborder="0" style="position: absolute;"></iframe></div>
                    </div>
                </div>
                <!-- <object type="text/html" data="getsource.php" typemustmatch>
                </object> -->
            </div>

    
        </div>

    </div>



    <?php include '../partes/footer.php'; ?>

    <script>

    </script>

    <!-- jQuery, Popper.js, Bootstrap JS -->
    <script src="../js/tether.min.js"></script>
    <script src="js/sectorizacion.js"></script>
    <script src="https://cdn.lordicon.com/libs/mssddfmo/lord-icon-2.1.0.js"></script>
</body>

</html>