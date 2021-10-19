<?php
// session_start();
// if (isset($_SESSION['sesionCESFAM'])) { //VALIDA SI LA SESION ESTA INICIADAz
//     $rut = $_SESSION["sesionCESFAM"]["rut"];
// } else { //SINO LO REDIRIGE AL INDEX
//     header("Location:../inicio/");
// }
?>
<?php include '../dashboard/head.php'; ?>

<title>Salud los Álamos - LIBRO CONDOLENCIAS</title>
<!-- <link href="https://comisariavirtual.cl/css/app.css" rel="stylesheet"> -->


<style>
    @import url(https://fonts.googleapis.com/css?family=Roboto:300,400,600);
    @import url(https://fonts.googleapis.com/css?family=Roboto+Slab:300,400,600);
    @import url(https://fonts.googleapis.com/icon?family=Material+Icons);
    @import url(https://fonts.googleapis.com/css?family=Roboto:300,400,500,700);
    @import url(https://fonts.googleapis.com/css?family=Roboto+Slab:300,400,700);

    @font-face {
        font-family: simple-icons;
        src: url(/fonts/simple-icons.eot?bf33bc620239910ebb86ac5d2d6a2280);
        src: url(/fonts/simple-icons.eot?bf33bc620239910ebb86ac5d2d6a2280) format("embedded-opentype"), url(/fonts/simple-icons.svg?09804eec330ea49c298d798612ca0735) format("svg");
        font-weight: 400;
        font-style: normal
    }

    @font-face {
        font-family: simple-icons;
        src: url(/fonts/simple-icons.eot?bf33bc620239910ebb86ac5d2d6a2280);
        src: url(/fonts/simple-icons.eot?bf33bc620239910ebb86ac5d2d6a2280) format("embedded-opentype"), url(/fonts/simple-icons.woff2?8a7541a3d640c9d94ae46207aa012a5a) format("woff2"), url(/fonts/simple-icons.woff?9aaa8fdfd791995ef650f72e8695e86b) format("woff"), url(/fonts/simple-icons.ttf?f3f628d1917f2d7b6746d9e744f93d19) format("truetype"), url(/fonts/simple-icons.svg?09804eec330ea49c298d798612ca0735) format("svg");
        font-weight: 400;
        font-style: normal
    }

    [class*=" icon-"]:before,
    [class^=icon-]:before {
        font-family: simple-icons;
        font-style: normal;
        font-weight: 400;
        speak: none;
        display: inline-block;
        text-decoration: inherit;
        width: 1em;
        margin-right: .2em;
        text-align: center;
        font-variant: normal;
        text-transform: none;
        line-height: 1em;
        margin-left: .2em;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale
    }

    .icon-archivo:before {
        content: "\E800"
    }

    .icon-claveunica:before {
        content: "\E801"
    }

    :root {
        --font-family-sans-serif: "Roboto", sans-serif;
        --font-family-monospace: SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace
    }

    *,
    :after,
    :before {
        box-sizing: border-box
    }

    html {
        font-family: sans-serif;
        line-height: 1.15;
        -webkit-text-size-adjust: 100%;
        -webkit-tap-highlight-color: rgba(9, 19, 46, 0)
    }

    article,
    aside,
    figcaption,
    figure,
    footer,
    header,
    hgroup,
    main,
    nav,
    section {
        display: block
    }

    hr {
        box-sizing: content-box;
        height: 0;
        overflow: visible
    }

    h3 {
        margin-top: 0;
        margin-bottom: .5rem
    }

    p {
        margin-top: 0;
        margin-bottom: 1rem
    }

    abbr[data-original-title],
    abbr[title] {
        text-decoration: underline;
        -webkit-text-decoration: underline dotted;
        text-decoration: underline dotted;
        cursor: help;
        border-bottom: 0;
        -webkit-text-decoration-skip-ink: none;
        text-decoration-skip-ink: none
    }

    address {
        font-style: normal;
        line-height: inherit
    }

    address,
    dl,
    ol,
    ul {
        margin-bottom: 1rem
    }

    dl,
    ol,
    ul {
        margin-top: 0
    }

    ol ol,
    ol ul,
    ul ol,
    ul ul {
        margin-bottom: 0
    }

    dt {
        font-weight: 700
    }

    dd {
        margin-bottom: .5rem;
        margin-left: 0
    }

    blockquote {
        margin: 0 0 1rem
    }

    b,
    strong {
        font-weight: bolder
    }

    small {
        font-size: 80%
    }

    sub,
    sup {
        position: relative;
        font-size: 75%;
        line-height: 0;
        vertical-align: baseline
    }

    sub {
        bottom: -.25em
    }

    sup {
        top: -.5em
    }

    a {
        color: #0054ab;
        text-decoration: none;
        background-color: transparent
    }

    a:hover {
        color: #002e5f;
        text-decoration: underline
    }

    a:not([href]),
    a:not([href]):hover {
        color: inherit;
        text-decoration: none
    }

    code,
    kbd,
    pre,
    samp {
        font-family: SFMono-Regular, Menlo, Monaco, Consolas, Liberation Mono, Courier New, monospace;
        font-size: 1em
    }

    pre {
        margin-top: 0;
        margin-bottom: 1rem;
        overflow: auto
    }

    figure {
        margin: 0 0 1rem
    }

    img {
        border-style: none
    }

    img,
    svg {
        vertical-align: middle
    }

    svg {
        overflow: hidden
    }

    table {
        border-collapse: collapse
    }

    caption {
        padding-top: .75rem;
        padding-bottom: .75rem;
        color: #6c757d;
        text-align: left;
        caption-side: bottom
    }

    th {
        text-align: inherit
    }

    label {
        display: inline-block;
        margin-bottom: .5rem
    }

    button {
        border-radius: 0
    }

    button:focus {
        outline: 1px dotted;
        outline: 5px auto -webkit-focus-ring-color
    }

    button,
    input,
    optgroup,
    select,
    textarea {
        margin: 0;
        font-family: inherit;
        font-size: inherit;
        line-height: inherit
    }

    button,
    input {
        overflow: visible
    }

    button,
    select {
        text-transform: none
    }

    select {
        word-wrap: normal
    }

    [type=button],
    [type=reset],
    [type=submit],
    button {
        -webkit-appearance: button
    }

    [type=button]:not(:disabled),
    [type=reset]:not(:disabled),
    [type=submit]:not(:disabled),
    button:not(:disabled) {
        cursor: pointer
    }

    [type=button]::-moz-focus-inner,
    [type=reset]::-moz-focus-inner,
    [type=submit]::-moz-focus-inner,
    button::-moz-focus-inner {
        padding: 0;
        border-style: none
    }

    input[type=checkbox],
    input[type=radio] {
        box-sizing: border-box;
        padding: 0
    }

    input[type=date],
    input[type=datetime-local],
    input[type=month],
    input[type=time] {
        -webkit-appearance: listbox
    }

    textarea {
        overflow: auto;
        resize: vertical
    }

    fieldset {
        min-width: 0;
        padding: 0;
        margin: 0;
        border: 0
    }

    legend {
        display: block;
        width: 100%;
        max-width: 100%;
        padding: 0;
        margin-bottom: .5rem;
        font-size: 1.5rem;
        line-height: inherit;
        color: inherit;
        white-space: normal
    }

    progress {
        vertical-align: baseline
    }

    [type=number]::-webkit-inner-spin-button,
    [type=number]::-webkit-outer-spin-button {
        height: auto
    }

    [type=search] {
        outline-offset: -2px;
        -webkit-appearance: none
    }

    [type=search]::-webkit-search-decoration {
        -webkit-appearance: none
    }

    ::-webkit-file-upload-button {
        font: inherit;
        -webkit-appearance: button
    }

    output {
        display: inline-block
    }

    summary {
        display: list-item;
        cursor: pointer
    }

    template {
        display: none
    }

    [hidden] {
        display: none !important
    }

    .h1,
    .h2,
    .h3,
    .h4,
    .h5,
    .h6,
    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
        margin-bottom: .5rem;
        font-weight: 500;
        line-height: 1.2
    }

    .h1,
    h1 {
        font-size: 2.0325rem
    }

    .h2,
    h2 {
        font-size: 1.626rem
    }

    .h3,
    h3 {
        font-size: 1.42275rem
    }

    .h4,
    h4 {
        font-size: 1.2195rem
    }

    .h5,
    h5 {
        font-size: 1.01625rem
    }

    .h6,
    h6 {
        font-size: .813rem
    }

    .lead {
        font-size: 1.01625rem;
        font-weight: 300
    }
</style>
</head>

<body id="page-top">
    <?php ?>
    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php include '../dashboard/sidebar.php'; ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content" class="pb-4">

                <?php include '../dashboard/topbar.php'; ?>

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

                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12 col-md-3">

                                <ul class="simple-list-menu list-group d-none d-sm-block">
                                    <a class="list-group-item list-group-item-action  " href="https://comisariavirtual.cl">
                                        <i class="material-icons">insert_drive_file</i> Trámites disponibles
                                    </a>

                                    <a class="list-group-item list-group-item-action " href="https://comisariavirtual.cl/etapas/inbox">
                                        <i class="material-icons">inbox</i> Bandeja de Entrada (1)
                                    </a>
                                    <a class="list-group-item list-group-item-action " href="https://comisariavirtual.cl/etapas/sinasignar">
                                        <i class="material-icons">assignment</i> Sin asignar </a>
                                    <a class="list-group-item list-group-item-action " href="https://comisariavirtual.cl/tramites/participados">
                                        <i class="material-icons">history</i> Historial de Trámites (0)
                                    </a>
                                </ul>
                            </div>

                            <div class="col-xs-12 col-md-9">
                                <div style="clear: both;"></div>
                                <form method="POST" class="ajaxForm dynaForm form-horizontal" action="/etapas/ejecutar_form/76205781/0">
                                    <input type="hidden" name="_token" value="cMdsjoVdF7feZTR1kCQ4q1BnSRGONzPgTHvwTb3e">
                                    <input type="hidden" name="_method" value="post">
                                    <div class="validacion"></div>

                                    <h1 class="title">Libro de Condolencias</h1>
                                    <hr>
                                    <div class="campo control-group" data-id="3416" data-dependiente-campo="dependiente" style="display: block;" data-readonly="1" data-condicion="no-condition">
                                        <p></p>
                                        <div class="alert alert-success" role="alert">
                                            <h5 class="alert-heading"><strong>Libro de Condolencias por el sensible fallecimiento del Sargento 1º Francisco Abraham Benavides García (Q.E.P.D.)</strong></h5>

                                            <p align="justify">Este libro de condolencias ha sido preparado como una forma de representar nuestro sentir por la partida del mártir 1.222 de Carabineros de Chile, quien fue asesinado cobardemente mientras cumplía con su deber en Collipulli.
                                                <br><br>
                                                <strong>Nuestras condolencias a su familia.</strong>
                                            </p>
                                        </div>
                                        <p></p>
                                    </div>


                                    <div class="campo control-group" data-id="3415" data-dependiente-campo="dependiente" style="display: block;" data-readonly="1" data-condicion="no-condition">
                                        <div class="form-group"><label class="control-label" for="3415">Nombre Completo</label><input id="3415" readonly="" type="text" class="form-control has-error" name="nombre_completo" value="Felipe Andrés Galdames Vidal" data-modo="visualizacion" disabled=""></div>
                                    </div>


                                    <div class="campo control-group" data-id="3417" data-dependiente-campo="dependiente" style="display: block;" data-readonly="" data-condicion="no-condition">
                                        <div class="form-group"><label class="control-label" for="3417">Condolencias</label><span class="help-block"> (Exprese su sentir por el sensible fallecimiento del Sgto. 1º Francisco Benavides)</span><textarea id="3417" rows="5" class="form-control" name="condolencias"></textarea></div>
                                    </div>

                                    <div class="form-actions mt-3 simple-btn-actions">

                                        <button class="btn btn-danger" type="submit">Siguiente</button>

                                    </div>
                                    <input type="hidden" name="secuencia" value="0">
                                    <div class="ajaxLoader" style="position: fixed; left: 50%; top: 30%; display: none;">
                                        <img src="https://comisariavirtual.cl/img/loading.gif">
                                    </div>
                                    <!--ID ANAlYTICS POR TAREA DEL TTE-->

                                    <!--ID ANAlYTICS POR TAREA DEL TTE-->
                                </form>
                                <div id="modalcalendar" class="modal hide modalconfg modcalejec"></div>
                                <input type="hidden" id="urlbase" value="https://comisariavirtual.cl">

                            </div>
                        </div>

                        <div class="row justify-content-end pt-2">
                            <div class="col-9 col-sm-12 ">
                                <fieldset>
                                    <div class="validacion"></div>
                                    <legend>Agradecimiento</legend>
                                    <div class="campo control-group" data-id="3418" data-dependiente-campo="dependiente" style="display: block;" data-readonly="1" data-condicion="no-condition">
                                        <p></p>
                                        <div class="alert alert-success" role="alert">
                                            <h5 class="alert-heading"><strong>Sargento 1º Francisco Abraham Benavides García (Q.E.P.D.)</strong></h5>

                                            <p align="justify">Felipe Andrés Galdames Vidal:
                                                <br><br>
                                                Agradecemos profundamente su muestra de afecto y sentir para con nuestra Institución, por el dolor causado a raíz de la partida del mártir Sargento 1º Francisco Abraham Benavides García (Q.E.P.D.), quien cumpliendo con su deber, perdió la vida en Collipulli.
                                                <br><br>
                                                <strong>Atte.,</strong><br>
                                                <strong>Carabineros de Chile.</strong>
                                            </p>
                                        </div>
                                        <p></p>
                                    </div>
                                    <div class="form-actions mb-4">
                                        <a class="btn btn-success" href="https://comisariavirtual.cl/etapas/ver/76205781/0">
                                            <--- Volver </a>
                                    </div>
                                </fieldset>
                            </div>
                        </div>

                        <div class="container">
                            <div class="row justify-content-center">



                                <?php
                                /*========================================SQL================================================== */

                                // CREATE TABLE `coordenadas` (
                                //     `id` int(11) NOT NULL,
                                //     `a1` int(11) NOT NULL,
                                //     `a2` int(11) NOT NULL,
                                //     `a3` int(11) NOT NULL,
                                //     `a4` int(11) NOT NULL,
                                //     `a5` int(11) NOT NULL,
                                //     `b1` int(11) NOT NULL,
                                //     `b2` int(11) NOT NULL,
                                //     `b3` int(11) NOT NULL,
                                //     `b4` int(11) NOT NULL,
                                //     `b5` int(11) NOT NULL,
                                //     `c1` int(11) NOT NULL,
                                //     `c2` int(11) NOT NULL,
                                //     `c3` int(11) NOT NULL,
                                //     `c4` int(11) NOT NULL,
                                //     `c5` int(11) NOT NULL,
                                //     `d1` int(11) NOT NULL,
                                //     `d2` int(11) NOT NULL,
                                //     `d3` int(11) NOT NULL,
                                //     `d4` int(11) NOT NULL,
                                //     `d5` int(11) NOT NULL,
                                //     `e1` int(11) NOT NULL,
                                //     `e2` int(11) NOT NULL,
                                //     `e3` int(11) NOT NULL,
                                //     `e4` int(11) NOT NULL,
                                //     `e5` int(11) NOT NULL,
                                //     `f1` int(11) NOT NULL,
                                //     `f2` int(11) NOT NULL,
                                //     `f3` int(11) NOT NULL,
                                //     `f4` int(11) NOT NULL,
                                //     `f5` int(11) NOT NULL,
                                //     `g1` int(11) NOT NULL,
                                //     `g2` int(11) NOT NULL,
                                //     `g3` int(11) NOT NULL,
                                //     `g4` int(11) NOT NULL,
                                //     `g5` int(11) NOT NULL,
                                //     `h1` int(11) NOT NULL,
                                //     `h2` int(11) NOT NULL,
                                //     `h3` int(11) NOT NULL,
                                //     `h4` int(11) NOT NULL,
                                //     `h5` int(11) NOT NULL,
                                //     `i1` int(11) NOT NULL,
                                //     `i2` int(11) NOT NULL,
                                //     `i3` int(11) NOT NULL,
                                //     `i4` int(11) NOT NULL,
                                //     `i5` int(11) NOT NULL
                                //   ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



                                $mysqele = mysqli_connect("localhost", "root", "", "probando");
                                if (!$mysqele) {
                                    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
                                    exit;
                                }


                                // $sql = '';
                                $sql = 'INSERT INTO coordenadas (id,a1, a2, a3, a4, a5, 
                                        b1, b2, b3, b4, b5, 
                                        c1, c2, c3, c4, c5,
                                        d1, d2, d3, d4, d5, 
                                        e1, e2, e3, e4, e5,
                                        f1, f2, f3, f4, f5,
                                        g1, g2, g3, g4, g5,
                                        h1, h2, h3, h4, h5, 
                                        i1, i2, i3, i4, i5) VALUES (NULL,';

                                for ($i = 1; $i <= 45; $i++) {
                                    // $rand = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'a', 'b', 'c', 'd', 'e', 'f');

                                    $rand = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9');
                                    $r = $rand[rand(0, 9)] . $rand[rand(0, 9)];

                                    if ($i % 5 == 0) {
                                        $br = '<br>';
                                    } else {
                                        $br = '';
                                    }
                                    $sql .= '"' . $r . '",';

                                    // $sql .= '"' . $r . '"'.$br;
                                }

                                $sql .= ')';

                                $sql = str_replace(",)", ")", $sql);


                                // $res= mysqli_query($mysqele,$sql);
                                echo $sql . '<br>';


                                /***********************************ESCOGER 3 NUMERO NO REPETIDOS************************************************* */
                                $x = 0;
                                $valores = array();
                                while ($x < 3) {
                                    $lista = array(
                                        'a1', 'a2', 'a3', 'a4', 'a5',
                                        'b1', 'b2', 'b3', 'b4', 'b5',
                                        'c1', 'c2', 'c3', 'c4', 'c5',
                                        'd1', 'd2', 'd3', 'd4', 'd5',
                                        'e1', 'e2', 'e3', 'e4', 'e5',
                                        'f1', 'f2', 'f3', 'f4', 'f5',
                                        'g1', 'g2', 'g3', 'g4', 'g5',
                                        'h1', 'h2', 'h3', 'h4', 'h5',
                                        'i1', 'i2', 'i3', 'i4', 'i5'
                                    );
                                    $num_aleatorio = $lista[rand(0, 44)];

                                    // $num_aleatorio = rand(1, $max);
                                    if (!in_array($num_aleatorio, $valores)) {
                                        array_push($valores, $num_aleatorio);
                                        $x++;
                                    }
                                }

                                $contadordevalores = count($valores);

                                $consultaCoordenadas = "SELECT ";
                                $GuardaValores = "";

                                for ($i = 0; $i < $contadordevalores; $i++) {
                                    // echo 'Valores: ' . $valores[$i] . '<br>';
                                    $consultaCoordenadas .= $valores[$i] . ',';
                                    $GuardaValores .= $valores[$i] . ',';
                                }
                                $consultaCoordenadas .= "- FROM coordenadas WHERE id=1";
                                $GuardaValores .= "-";

                                $porcion = explode(',', $GuardaValores);

                                $consultaCoordenadas = str_replace(",-", " ", $consultaCoordenadas);
                                $GuardaValores = str_replace(",-", " ", $GuardaValores);

                                echo '<br> Parámetros a consultar: '.$GuardaValores.'<br><br>';

                                $res2 = mysqli_query($mysqele, "$consultaCoordenadas");

                                if (!$res2) {
                                    echo 'consulta con error';
                                } else {
                                    echo 'consulta hecha';
                                }

                                echo '<br><br>';

                                $obtener = mysqli_fetch_assoc($res2);
                                echo 'BD 1: ' . $obtener[$porcion[0]].'  BD 2: ' . $obtener[$porcion[1]].'  BD 3: ' . $obtener[$porcion[2]];

                                ?>
                            </div>
                        </div>


                    </div>
                </div>

            </div>
            <!-- End of Main Content -->

            <?php include '../dashboard/footer.php'; ?>

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

    <script src="js/funciones.js"></script>
    <script src="js/limpiador.js"></script>

    <script>
        function info_asig(var1, var2, var3, var4) {
            // alertify.success(var1);
            toastr.info("<strong>Codigo:</strong> " + var1 + "<br><strong>Año:</strong> " + var2 + "<br><strong>Semestre:</strong> " + var3 + "<br><strong>R.U.T:</strong> " + var4);
        }
    </script>
</body>

</html>