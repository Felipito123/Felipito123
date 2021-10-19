<?php
// session_start();
// if (isset($_SESSION['sesionCESFAM'])) { //VALIDA SI LA SESION ESTA INICIADAz
//     $rut = $_SESSION["sesionCESFAM"]["rut"];
// } else { //SINO LO REDIRIGE AL INDEX
//     header("Location:../inicio/");
// }
?>
<?php include '../dashboard/head.php'; ?>

<title>Salud los Álamos - MALLA CURRICULAR</title>
<!-- <link rel="stylesheet" href="https://intranet.ubiobio.cl/recursos/dev/css/estilosintranet.css"> -->

<style>
    .bs-callout-info {
        border-top-color: #438EB9;
    }

    .bs-callout {
        padding: 20px;
        margin: 20px 0;
        border-top: 1px solid #438EB9;
        border-left: 1px solid #eee;
        border-right: 1px solid #eee;
        border-bottom: 1px solid #eee;
        border-top-width: 5px;
        border-radius: 3px;
    }

    /* @media screen and (max-width: 3000px) {
        .table-responsive {
            width: 100%;
            margin-bottom: 15px;
            overflow-y: hidden;
            overflow-x: auto;
            -ms-overflow-style: -ms-autohiding-scrollbar;
            border: 1px solid #DDD;
            -webkit-overflow-scrolling: touch;
        }
    } */

    .encabezadotabla {
        background-color: #438EB9;
        color: white;
    }

    span.mAprobada {
        background-color: #3a87ad !IMPORTANT;
    }

    i.mAprobada {
        color: #3a87ad !IMPORTANT;
    }


    span.mReprobada {
        background-color: #dd5a43 !IMPORTANT;
    }

    i.mReprobada {
        color: #dd5a43 !IMPORTANT;
    }


    span.mNcr {
        /*background-color: rgba(144, 142, 15, 0.46)!IMPORTANT;*/
        background-color: #EDE800 !IMPORTANT;
    }

    i.mNcr {
        /*color: rgba(144, 142, 15, 0.46)!IMPORTANT;*/
        color: #EDE800 !IMPORTANT;
    }


    span.mRenunciada {
        /*background-color: #69aa46!IMPORTANT;*/
        background-color: #3AD400 !IMPORTANT;
    }

    i.mRenunciada {
        /*color: #69aa46!IMPORTANT;*/
        color: #3AD400 !IMPORTANT;
    }


    span.mInscrita {
        /*background-color: #777!IMPORTANT;*/
        background-color: #ACB0B2 !IMPORTANT;
    }

    i.mInscrita {
        /*color: #777!IMPORTANT;*/
        color: #ACB0B2 !IMPORTANT;
    }


    span.mPendiente {
        background-color: brown !IMPORTANT;
    }

    i.mPendiente {
        color: brown !IMPORTANT;
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

                    <!-- Page Heading -->
                    <div class="row justify-content-center">
                        <h2 class="h3 mb-0 text-gray-800" style="font-family: 'Kaushan Script', cursive;">MALLA CURRICULAR</h2>
                        <div class="col-lg-1"></div>
                    </div>

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

                    <div class="container-fluid">
                        <div class="bs-callout bs-callout-info bg-white p-4">
                            <div class="table-responsive" style="border:none;">
                                <table class="table" style="margin-bottom:0px;">
                                    <thead>
                                        <tr class="encabezadotabla text-center">
                                            <th width="120">
                                                Año 1 Per. 1
                                            </th>
                                            <th width="120">
                                                Año 1 Per. 2
                                            </th>
                                            <th width="120">
                                                Año 2 Per. 1
                                            </th>
                                            <th width="120">
                                                Año 2 Per. 2
                                            </th>
                                            <th width="120">
                                                Año 3 Per. 1
                                            </th>
                                            <th width="120">
                                                Año 3 Per. 2
                                            </th>
                                            <th width="120">
                                                Año 4 Per. 1
                                            </th>
                                            <th width="120">
                                                Año 4 Per. 2
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td style="min-width:90px!IMPORTANT;min-height:100%!IMPORTANT;background-color:#A8E3FF;border:2px solid white;padding-top:2px!IMPORTANT; padding-left:2px;!IMPORTANT;padding-bottom:0px!IMPORTANT;padding-right:0px!IMPORTANT;">
                                                <table class="border-0" style="min-width:100%;min-height:90px;">
                                                    <tbody>
                                                        <tr class="text-center">
                                                            <td>
                                                                <div class="row justify-content-end pr-3 pb-3">
                                                                    <i class="fa fa-circle mAprobada"></i>
                                                                </div>
                                                                <a  href="javascript:void(0);" onclick="info_asig(2201551,1,1,19387124)">Álgebra I<br>(220155)</a>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                            <td style="min-width:90px!IMPORTANT;min-height:100%!IMPORTANT;background-color:#A8E3FF;border:2px solid white;padding-top:2px!IMPORTANT; padding-left:2px;!IMPORTANT;padding-bottom:0px!IMPORTANT;padding-right:0px!IMPORTANT;">
                                                <table style="min-width:100%;min-height:90px;">
                                                    <tbody>
                                                        <tr class="text-center">
                                                            <td>
                                                                <div class="row justify-content-end pr-3 pb-3">
                                                                    <i class="fa fa-circle mAprobada"></i>
                                                                </div>
                                                                <a href="javascript:void(0);" onclick="info_asig(2201561,1,2,19387124)">Álgebra II<br>(220156)</a>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                            <td style="min-width:90px!IMPORTANT;min-height:100%!IMPORTANT;background-color:#A8E3FF;border:2px solid white;padding-top:2px!IMPORTANT; padding-left:2px;!IMPORTANT;padding-bottom:0px!IMPORTANT;padding-right:0px!IMPORTANT;">
                                                <table style="min-width:100%;min-height:90px;">
                                                    <tbody>
                                                        <tr class="text-center">
                                                            <td>
                                                                <div class="row justify-content-end pr-3 pb-2">
                                                                    <i class="fa fa-circle mAprobada"></i>
                                                                </div>
                                                                <!-- javascript:info_asig(2201581 , 2 , 1,19387124); -->
                                                                <a href="javascript:void(0);" onclick="info_asig(2201561, 20 ,2,19387124)">Estadistica y Probabilidades<br>(220158)</a>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                            <td style="min-width:90px!IMPORTANT;min-height:100%!IMPORTANT;background-color:#A8E3FF;border:2px solid white;padding-top:2px!IMPORTANT; padding-left:2px;!IMPORTANT;padding-bottom:0px!IMPORTANT;padding-right:0px!IMPORTANT;">
                                                <table style="min-width:100%;min-height:90px;">
                                                    <tbody>
                                                        <tr class="text-center">
                                                            <td>
                                                                <div class="row justify-content-end pr-3 pb-2">
                                                                    <i class="fa fa-circle mAprobada"></i>
                                                                </div>
                                                                <a href="javascript:void(0);" onclick="info_asig(6205061 , 2 , 2,19387124)">Arquitectura de Computadores<br>(620506)</a>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                            <td style="min-width:90px!IMPORTANT;min-height:100%!IMPORTANT;background-color:#A8E3FF;border:2px solid white;padding-top:2px!IMPORTANT; padding-left:2px;!IMPORTANT;padding-bottom:0px!IMPORTANT;padding-right:0px!IMPORTANT;">
                                                <table style="min-width:100%;min-height:90px;">
                                                    <tbody>
                                                        <tr class="text-center">
                                                            <td>
                                                                <div class="row justify-content-end pr-3 pb-2">
                                                                    <i class="fa fa-circle mAprobada"></i>
                                                                </div>
                                                                <a href="javascript:void(0);" onclick="info_asig(6205101 , 3 , 1,19387124)">Metodología de Desarrollo<br>(620510)</a>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                            <td style="min-width:90px!IMPORTANT;min-height:100%!IMPORTANT;background-color:#A8E3FF;border:2px solid white;padding-top:2px!IMPORTANT; padding-left:2px;!IMPORTANT;padding-bottom:0px!IMPORTANT;padding-right:0px!IMPORTANT;">
                                                <table style="min-width:100%;min-height:90px;">

                                                    <tbody>
                                                        <tr class="text-center">
                                                            <td>
                                                                <div class="row justify-content-end pr-3 pb-3">
                                                                    <i class="fa fa-circle mAprobada"></i>
                                                                </div>
                                                                <a href="javascript:void(0);" onclick="info_asig(6205131 , 3 , 2,19387124)">Inteligencia Artificial<br>(620513)</a>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                            <td style="min-width:90px!IMPORTANT;min-height:100%!IMPORTANT;background-color:#A8E3FF;border:2px solid white;padding-top:2px!IMPORTANT; padding-left:2px;!IMPORTANT;padding-bottom:0px!IMPORTANT;padding-right:0px!IMPORTANT;">
                                                <table style="min-width:100%;min-height:90px;">
                                                    <tbody>
                                                        <tr class="text-center">
                                                            <td>
                                                                <div class="row justify-content-end pr-3 pb-3">
                                                                    <i class="fa fa-circle mAprobada"></i>
                                                                </div>
                                                                <a href="javascript:void(0);" onclick="info_asig(6205171 , 4 , 1,19387124)">Electivo Especialidad II<br>(620517)</a>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                            <td style="min-width:90px!IMPORTANT;min-height:100%!IMPORTANT;background-color:#A8E3FF;border:2px solid white;padding-top:2px!IMPORTANT; padding-left:2px;!IMPORTANT;padding-bottom:0px!IMPORTANT;padding-right:0px!IMPORTANT;">
                                                <table style="min-width:100%;min-height:90px;">
                                                    <tbody>
                                                        <tr class="text-center">
                                                            <td>
                                                                <div class="row justify-content-end pr-3 pb-3">
                                                                    <i class="fa fa-circle mAprobada"></i>
                                                                </div>
                                                                <a href="javascript:void(0);" onclick="info_asig(6205211 , 4 , 2,19387124)">Electivo Especialidad III<br>(620521)</a>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="min-width:90px!IMPORTANT;min-height:100%!IMPORTANT;background-color:#A8E3FF;border:2px solid white;padding-top:2px!IMPORTANT; padding-left:2px;!IMPORTANT;padding-bottom:0px!IMPORTANT;padding-right:0px!IMPORTANT;">
                                                <table style="min-width:100%;min-height:90px;">
                                                    <tbody>
                                                        <tr class="text-center">
                                                            <td>
                                                                <div class="row justify-content-end pr-3 pb-2">
                                                                    <i class="fa fa-circle mAprobada"></i>
                                                                </div>
                                                                <a href="javascript:void(0);" onclick="info_asig(6205001 , 1 , 1,19387124)">Nociones de Computación e Informática<br>(620500)</a>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                            <td style="min-width:90px!IMPORTANT;min-height:100%!IMPORTANT;background-color:#A8E3FF;border:2px solid white;padding-top:2px!IMPORTANT; padding-left:2px;!IMPORTANT;padding-bottom:0px!IMPORTANT;padding-right:0px!IMPORTANT;">
                                                <table style="min-width:100%;min-height:90px;">
                                                    <tbody>
                                                        <tr class="text-center">
                                                            <td>
                                                                <div class="row justify-content-end pr-3 pb-3">
                                                                    <i class="fa fa-circle mAprobada"></i>
                                                                </div>
                                                                <a href="javascript:void(0);" onclick="info_asig(2201571 , 1 , 2,19387124)">Cálculo I<br>(220157)</a>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                            <td style="min-width:90px!IMPORTANT;min-height:100%!IMPORTANT;background-color:#A8E3FF;border:2px solid white;padding-top:2px!IMPORTANT; padding-left:2px;!IMPORTANT;padding-bottom:0px!IMPORTANT;padding-right:0px!IMPORTANT;">
                                                <table style="min-width:100%;min-height:90px;">
                                                    <tbody>
                                                        <tr class="text-center">
                                                            <td>
                                                                <div class="row justify-content-end pr-3 pb-3">
                                                                    <i class="fa fa-circle mAprobada"></i>
                                                                </div>
                                                                <a href="javascript:info_asig(2201591 , 2 , 1,19387124);">Cálculo II<br>(220159)</a>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                            <td style="min-width:90px!IMPORTANT;min-height:100%!IMPORTANT;background-color:#A8E3FF;border:2px solid white;padding-top:2px!IMPORTANT; padding-left:2px;!IMPORTANT;padding-bottom:0px!IMPORTANT;padding-right:0px!IMPORTANT;">
                                                <table style="min-width:100%;min-height:90px;">
                                                    <tbody>
                                                        <tr class="text-center">
                                                            <td>
                                                                <div class="row justify-content-end pr-3 pb-2">
                                                                    <i class="fa fa-circle mAprobada"></i>
                                                                </div>
                                                                <a href="javascript:info_asig(6205071 , 2 , 2,19387124);">Paradigmas de la Programación<br>(620507)</a>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                            <td style="min-width:90px!IMPORTANT;min-height:100%!IMPORTANT;background-color:#A8E3FF;border:2px solid white;padding-top:2px!IMPORTANT; padding-left:2px;!IMPORTANT;padding-bottom:0px!IMPORTANT;padding-right:0px!IMPORTANT;">
                                                <table style="min-width:100%;min-height:90px;">
                                                    <tbody>
                                                        <tr class="text-center">
                                                            <td>
                                                                <div class="row justify-content-end pr-3 pb-3">
                                                                    <i class="fa fa-circle mAprobada"></i>
                                                                </div>
                                                                <a href="javascript:info_asig(6205111 , 3 , 1,19387124);">Base de Datos<br>(620511)</a>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                            <td style="min-width:90px!IMPORTANT;min-height:100%!IMPORTANT;background-color:#A8E3FF;border:2px solid white;padding-top:2px!IMPORTANT; padding-left:2px;!IMPORTANT;padding-bottom:0px!IMPORTANT;padding-right:0px!IMPORTANT;">
                                                <table style="min-width:100%;min-height:90px;">
                                                    <tbody>
                                                        <tr class="text-center">
                                                            <td>
                                                                <div class="row justify-content-end pr-3 pb-2">
                                                                    <i class="ace-icon fa fa-circle mRenunciada"></i>&nbsp;<i class="ace-icon fa fa-circle mAprobada"></i>
                                                                </div>
                                                                <a href="javascript:info_asig(6205141 , 3 , 2,19387124);">Sistemas Operativos<br>(620514)</a>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                            <td style="min-width:90px!IMPORTANT;min-height:100%!IMPORTANT;background-color:#A8E3FF;border:2px solid white;padding-top:2px!IMPORTANT; padding-left:2px;!IMPORTANT;padding-bottom:0px!IMPORTANT;padding-right:0px!IMPORTANT;">
                                                <table style="min-width:100%;min-height:90px;">
                                                    <tbody>
                                                        <tr class="text-center">
                                                            <td>
                                                                <div class="row justify-content-end pr-3 pb-2">
                                                                    <i class="fa fa-circle mAprobada"></i>
                                                                </div>
                                                                <a href="javascript:info_asig(6205181 , 4 , 1,19387124);">Comunicación de Datos y Redes<br>(620518)</a>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                            <td style="min-width:90px!IMPORTANT;min-height:100%!IMPORTANT;background-color:#A8E3FF;border:2px solid white;padding-top:2px!IMPORTANT; padding-left:2px;!IMPORTANT;padding-bottom:0px!IMPORTANT;padding-right:0px!IMPORTANT;">
                                                <table style="min-width:100%;min-height:90px;">

                                                    <tbody>
                                                        <tr class="text-center">
                                                            <td>
                                                                <div class="row justify-content-end pr-3 pb-2">
                                                                    <i class="fa fa-circle mAprobada"></i>
                                                                </div>
                                                                <a href="javascript:info_asig(3405561 , 4 , 2,19387124);">Formación Integral Oferta Institucional<br>(340556)</a>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="min-width:90px!IMPORTANT;min-height:100%!IMPORTANT;background-color:#A8E3FF;border:2px solid white;padding-top:2px!IMPORTANT; padding-left:2px;!IMPORTANT;padding-bottom:0px!IMPORTANT;padding-right:0px!IMPORTANT;">
                                                <table style="min-width:100%;min-height:90px;">

                                                    <tbody>
                                                        <tr class="text-center">
                                                            <td>
                                                                <div class="row justify-content-end pr-3 pb-2">
                                                                    <i class="fa fa-circle mAprobada"></i>
                                                                </div>
                                                                <a href="javascript:info_asig(6205011 , 1 , 1,19387124);">Algoritmos y Bases de la Programación<br>(620501)</a>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                            <td style="min-width:90px!IMPORTANT;min-height:100%!IMPORTANT;background-color:#A8E3FF;border:2px solid white;padding-top:2px!IMPORTANT; padding-left:2px;!IMPORTANT;padding-bottom:0px!IMPORTANT;padding-right:0px!IMPORTANT;">
                                                <table style="min-width:100%;min-height:90px;">

                                                    <tbody>
                                                        <tr class="text-center">
                                                            <td>
                                                                <div class="row justify-content-end pr-3 pb-3">
                                                                    <i class="fa fa-circle mAprobada"></i>
                                                                </div>
                                                                <a href="javascript:info_asig(6205031 , 1 , 2,19387124);">Algoritmos y Programación<br>(620503)</a>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                            <td style="min-width:90px!IMPORTANT;min-height:100%!IMPORTANT;background-color:#A8E3FF;border:2px solid white;padding-top:2px!IMPORTANT; padding-left:2px;!IMPORTANT;padding-bottom:0px!IMPORTANT;padding-right:0px!IMPORTANT;">
                                                <table style="min-width:100%;min-height:90px;">

                                                    <tbody>
                                                        <tr class="text-center">
                                                            <td>
                                                                <div class="row justify-content-end pr-3 pb-3">
                                                                    <i class="fa fa-circle mAprobada"></i>
                                                                </div>
                                                                <a href="javascript:info_asig(6205051 , 2 , 1,19387124);">Estructura de Datos<br>(620505)</a>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                            <td style="min-width:90px!IMPORTANT;min-height:100%!IMPORTANT;background-color:#A8E3FF;border:2px solid white;padding-top:2px!IMPORTANT; padding-left:2px;!IMPORTANT;padding-bottom:0px!IMPORTANT;padding-right:0px!IMPORTANT;">
                                                <table style="min-width:100%;min-height:90px;">

                                                    <tbody>
                                                        <tr class="text-center">
                                                            <td>
                                                                <div class="row justify-content-end pr-3 pb-2">
                                                                    <i class="fa fa-circle mAprobada"></i>
                                                                </div>
                                                                <a href="javascript:info_asig(3405561 , 2 , 2,19387124);">Formación Integral Oferta Institucional<br>(340556)</a>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                            <td style="min-width:90px!IMPORTANT;min-height:100%!IMPORTANT;background-color:#A8E3FF;border:2px solid white;padding-top:2px!IMPORTANT; padding-left:2px;!IMPORTANT;padding-bottom:0px!IMPORTANT;padding-right:0px!IMPORTANT;">
                                                <table style="min-width:100%;min-height:90px;">
                                                    <tbody>
                                                        <tr class="text-center">
                                                            <td>
                                                                <div class="row justify-content-end pr-3 pb-2">
                                                                    <i class="ace-icon fa fa-circle mReprobada"></i>&nbsp;<i class="ace-icon fa fa-circle mRenunciada"></i>&nbsp;<i class="ace-icon fa fa-circle mAprobada"></i>&nbsp;
                                                                </div>
                                                                <a href="javascript:info_asig(6205121 , 3 , 1,19387124);">Sistemas de Información<br>(620512)</a>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                            <td style="min-width:90px!IMPORTANT;min-height:100%!IMPORTANT;background-color:#A8E3FF;border:2px solid white;padding-top:2px!IMPORTANT; padding-left:2px;!IMPORTANT;padding-bottom:0px!IMPORTANT;padding-right:0px!IMPORTANT;">
                                                <table style="min-width:100%;min-height:90px;">
                                                    <tbody>
                                                        <tr class="text-center">
                                                            <td>
                                                                <div class="row justify-content-end pr-3 pb-2">
                                                                    <i class="ace-icon fa fa-circle mRenunciada"></i>&nbsp;<i class="ace-icon fa fa-circle mNcr"></i>&nbsp;<i class="ace-icon fa fa-circle mAprobada"></i>&nbsp;
                                                                </div>
                                                                <a href="javascript:info_asig(6205151 , 3 , 2,19387124);">Ingeniería de Software<br>(620515)</a>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                            <td style="min-width:90px!IMPORTANT;min-height:100%!IMPORTANT;background-color:#A8E3FF;border:2px solid white;padding-top:2px!IMPORTANT; padding-left:2px;!IMPORTANT;padding-bottom:0px!IMPORTANT;padding-right:0px!IMPORTANT;">
                                                <table style="min-width:100%;min-height:90px;">

                                                    <tbody>
                                                        <tr class="text-center">
                                                            <td>
                                                                <div class="row justify-content-end pr-3 pb-3">
                                                                    <i class="fa fa-circle mAprobada"></i>
                                                                </div>
                                                                <a href="javascript:info_asig(6205191 , 4 , 1,19387124);">Taller de Desarrollo<br>(620519)</a>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                            <td style="min-width:90px!IMPORTANT;min-height:100%!IMPORTANT;background-color:#A8E3FF;border:2px solid white;padding-top:2px!IMPORTANT; padding-left:2px;!IMPORTANT;padding-bottom:0px!IMPORTANT;padding-right:0px!IMPORTANT;">
                                                <table style="min-width:100%;min-height:90px;">
                                                    <tbody>
                                                        <tr class="text-center">
                                                            <td>
                                                                <div class="row justify-content-end pr-3 pb-3">
                                                                    <i class="fa fa-circle mInscrita"></i>
                                                                </div>
                                                                <a href="javascript:info_asig(6205221 , 4 , 2,19387124);">Proyecto Final de Carrera<br>(620522)</a>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="min-width:90px!IMPORTANT;min-height:100%!IMPORTANT;background-color:#A8E3FF;border:2px solid white;padding-top:2px!IMPORTANT; padding-left:2px;!IMPORTANT;padding-bottom:0px!IMPORTANT;padding-right:0px!IMPORTANT;">
                                                <table style="min-width:100%;min-height:90px;">

                                                    <tbody>
                                                        <tr class="text-center">
                                                            <td>
                                                                <div class="row justify-content-end pr-3 pb-3">
                                                                    <i class="fa fa-circle mAprobada"></i>
                                                                </div>
                                                                <a href="javascript:info_asig(6205021 , 1 , 1,19387124);">Introducción a la Ingeniería<br>(620502)</a>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                            <td style="min-width:90px!IMPORTANT;min-height:100%!IMPORTANT;background-color:#A8E3FF;border:2px solid white;padding-top:2px!IMPORTANT; padding-left:2px;!IMPORTANT;padding-bottom:0px!IMPORTANT;padding-right:0px!IMPORTANT;">
                                                <table style="min-width:100%;min-height:90px;">
                                                    <tbody>
                                                        <tr class="text-center">
                                                            <td>
                                                                <div class="row justify-content-end pr-3 pb-2">
                                                                    <i class="fa fa-circle mAprobada"></i>
                                                                </div>
                                                                <a href="javascript:info_asig(6205041 , 1 , 2,19387124);">Estructuras Discretas Para Ciencias de la Computación<br>(620504)</a>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                            <td style="min-width:90px!IMPORTANT;min-height:100%!IMPORTANT;background-color:#A8E3FF;border:2px solid white;padding-top:2px!IMPORTANT; padding-left:2px;!IMPORTANT;padding-bottom:0px!IMPORTANT;padding-right:0px!IMPORTANT;">
                                                <table style="min-width:100%;min-height:90px;">
                                                    <tbody>
                                                        <tr class="text-center">
                                                            <td>
                                                                <div class="row justify-content-end pr-3 pb-3">
                                                                    <i class="fa fa-circle mAprobada"></i>
                                                                </div>
                                                                <a href="javascript:info_asig(6102261 , 2 , 1,19387124);">Administración General<br>(610226)</a>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                            <td style="min-width:90px!IMPORTANT;min-height:100%!IMPORTANT;background-color:#A8E3FF;border:2px solid white;padding-top:2px!IMPORTANT; padding-left:2px;!IMPORTANT;padding-bottom:0px!IMPORTANT;padding-right:0px!IMPORTANT;">
                                                <table style="min-width:100%;min-height:90px;">
                                                    <tbody>
                                                        <tr class="text-center">
                                                            <td>
                                                                <div class="row justify-content-end pr-3 pb-2">
                                                                    <i class="fa fa-circle mAprobada"></i>
                                                                </div>
                                                                <a href="javascript:info_asig(6205081 , 2 , 2,19387124);">Análisis de Algoritmos y Teoría de Autómatas<br>(620508)</a>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                            <td style="min-width:90px!IMPORTANT;min-height:100%!IMPORTANT;background-color:#A8E3FF;border:2px solid white;padding-top:2px!IMPORTANT; padding-left:2px;!IMPORTANT;padding-bottom:0px!IMPORTANT;padding-right:0px!IMPORTANT;">
                                                <table style="min-width:100%;min-height:90px;">

                                                    <tbody>
                                                        <tr class="text-center">
                                                            <td>
                                                                <div class="row justify-content-end pr-3 pb-2">
                                                                    <i class="fa fa-circle mAprobada"></i>
                                                                </div>
                                                                <a href="javascript:info_asig(6122401 , 3 , 1,19387124);">Sistemas Financieros y Contables<br>(612240)</a>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                            <td style="min-width:90px!IMPORTANT;min-height:100%!IMPORTANT;background-color:#A8E3FF;border:2px solid white;padding-top:2px!IMPORTANT; padding-left:2px;!IMPORTANT;padding-bottom:0px!IMPORTANT;padding-right:0px!IMPORTANT;">
                                                <table style="min-width:100%;min-height:90px;">
                                                    <tbody>
                                                        <tr class="text-center">
                                                            <td>
                                                                <div class="row justify-content-end pr-3 pb-2">
                                                                    <i class="fa fa-circle mAprobada"></i>
                                                                </div>
                                                                <a href="javascript:info_asig(6110481 , 3 , 2,19387124);">Formulación y Evaluación de Proyectos<br>(611048)</a>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                            <td style="min-width:90px!IMPORTANT;min-height:100%!IMPORTANT;background-color:#A8E3FF;border:2px solid white;padding-top:2px!IMPORTANT; padding-left:2px;!IMPORTANT;padding-bottom:0px!IMPORTANT;padding-right:0px!IMPORTANT;">
                                                <table style="min-width:100%;min-height:90px;">
                                                    <tbody>
                                                        <tr class="text-center">
                                                            <td>
                                                                <div class="row justify-content-end pr-3 pb-2">
                                                                    <i class="fa fa-circle mAprobada"></i>
                                                                </div>
                                                                <a href="javascript:info_asig(6122411 , 4 , 1,19387124);">Gestión Empresarial<br>(612241)</a>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                            <td style="min-width:90px!IMPORTANT;min-height:100%!IMPORTANT;background-color:#A8E3FF;border:2px solid white;padding-top:2px!IMPORTANT; padding-left:2px;!IMPORTANT;padding-bottom:0px!IMPORTANT;padding-right:0px!IMPORTANT;">
                                                <table style="min-width:100%;min-height:90px;">
                                                    <tbody>
                                                        <tr class="text-center">
                                                            <td>
                                                                <div class="row justify-content-end pr-3 pb-2">
                                                                    <i class="fa fa-circle mAprobada"></i>
                                                                </div>
                                                                <a href="javascript:info_asig(3501991 , 4 , 2,19387124);">Formación Integral Extra Programática<br>(350199)</a>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="min-width:90px!IMPORTANT;min-height:100%!IMPORTANT;background-color:#A8E3FF;border:2px solid white;padding-top:2px!IMPORTANT; padding-left:2px;!IMPORTANT;padding-bottom:0px!IMPORTANT;padding-right:0px!IMPORTANT;">
                                                <table style="min-width:100%;min-height:90px;">
                                                    <tbody>
                                                        <tr class="text-center">
                                                            <td>
                                                                <div class="row justify-content-end pr-3 pb-2">
                                                                    <i class="fa fa-circle mAprobada"></i>
                                                                </div>
                                                                <a href="javascript:info_asig(3402711 , 1 , 1,19387124);">Comunicación y Argumentación<br>(340271)</a>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                            <td style="min-width:90px!IMPORTANT;min-height:100%!IMPORTANT;background-color:#A8E3FF;border:2px solid white;padding-top:2px!IMPORTANT; padding-left:2px;!IMPORTANT;padding-bottom:0px!IMPORTANT;padding-right:0px!IMPORTANT;">
                                                <table style="min-width:100%;min-height:90px;">
                                                    <tbody>
                                                        <tr class="text-center">
                                                            <td>
                                                                <div class="row justify-content-end pr-3 pb-2">
                                                                    <i class="fa fa-circle mAprobada"></i>
                                                                </div>
                                                                <a href="javascript:info_asig(3405561 , 1 , 2,19387124);">Formación Integral Oferta Institucional<br>(340556)</a>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                            <td style="min-width:90px!IMPORTANT;min-height:100%!IMPORTANT;background-color:#A8E3FF;border:2px solid white;padding-top:2px!IMPORTANT; padding-left:2px;!IMPORTANT;padding-bottom:0px!IMPORTANT;padding-right:0px!IMPORTANT;">
                                                <table style="min-width:100%;min-height:90px;">
                                                    <tbody>
                                                        <tr class="text-center">
                                                            <td>
                                                                <div class="row justify-content-end pr-3 pb-2">
                                                                    <i class="fa fa-circle mAprobada"></i>
                                                                </div>
                                                                <a href="javascript:info_asig(6110471 , 2 , 1,19387124);">Economía<br>(611047)</a>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                            <td style="min-width:90px!IMPORTANT;min-height:100%!IMPORTANT;background-color:#A8E3FF;border:2px solid white;padding-top:2px!IMPORTANT; padding-left:2px;!IMPORTANT;padding-bottom:0px!IMPORTANT;padding-right:0px!IMPORTANT;">
                                                <table style="min-width:100%;min-height:90px;">
                                                    <tbody>
                                                        <tr class="text-center">
                                                            <td>
                                                                <div class="row justify-content-end pr-3 pb-2">
                                                                    <i class="fa fa-circle mAprobada"></i>
                                                                </div>
                                                                <a href="javascript:info_asig(3402721 , 2 , 2,19387124);">Inglés I<br>(340272)</a>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                            <td style="min-width:90px!IMPORTANT;min-height:100%!IMPORTANT;background-color:#A8E3FF;border:2px solid white;padding-top:2px!IMPORTANT; padding-left:2px;!IMPORTANT;padding-bottom:0px!IMPORTANT;padding-right:0px!IMPORTANT;">
                                                <table style="min-width:100%;min-height:90px;">
                                                    <tbody>
                                                        <tr class="text-center">
                                                            <td>
                                                                <div class="row justify-content-end pr-3 pb-2">
                                                                    <i class="fa fa-circle mAprobada"></i>
                                                                </div>
                                                                <a href="javascript:info_asig(3402731 , 3 , 1,19387124);">Inglés II<br>(340273)</a>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                            <td style="min-width:90px!IMPORTANT;min-height:100%!IMPORTANT;background-color:#A8E3FF;border:2px solid white;padding-top:2px!IMPORTANT; padding-left:2px;!IMPORTANT;padding-bottom:0px!IMPORTANT;padding-right:0px!IMPORTANT;">
                                                <table style="min-width:100%;min-height:90px;">
                                                    <tbody>
                                                        <tr class="text-center">
                                                            <td>
                                                                <div class="row justify-content-end pr-3 pb-2">
                                                                    <i class="fa fa-circle mAprobada"></i>
                                                                </div>
                                                                <a href="javascript:info_asig(3402741 , 3 , 2,19387124);">Inglés III<br>(340274)</a>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                            <td style="min-width:90px!IMPORTANT;min-height:100%!IMPORTANT;background-color:#A8E3FF;border:2px solid white;padding-top:2px!IMPORTANT; padding-left:2px;!IMPORTANT;padding-bottom:0px!IMPORTANT;padding-right:0px!IMPORTANT;">
                                                <table style="min-width:100%;min-height:90px;">
                                                    <tbody>
                                                        <tr class="text-center">
                                                            <td>
                                                                <div class="row justify-content-end pr-3 pb-2">
                                                                    <i class="fa fa-circle mAprobada"></i>
                                                                </div>
                                                                <a href="javascript:info_asig(3402751 , 4 , 1,19387124);">Inglés IV<br>(340275)</a>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                            <td style="min-width:90px!IMPORTANT;min-height:100%!IMPORTANT;background-color:#77D3FF;border:none;padding-top:2px!IMPORTANT; padding-left:2px;!IMPORTANT;padding-bottom:0px!IMPORTANT;padding-right:0px!IMPORTANT;" '="">
                                                <table style="min-width:100%;min-height:90px;">
                                                    <tbody>
                                                        <tr style="height:10px;"></tr>
                                                    </tbody>
                                                </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="min-width:90px!IMPORTANT;min-height:100%!IMPORTANT;background-color:#A8E3FF;border:2px solid white;padding-top:2px!IMPORTANT; padding-left:2px;!IMPORTANT;padding-bottom:0px!IMPORTANT;padding-right:0px!IMPORTANT;">
                                                    <table style="min-width:100%;min-height:90px;">
                                                        <tbody>
                                                            <tr class="text-center">
                                                                <td>
                                                                <div class="row justify-content-end pr-3 pb-3">
                                                                    <i class="fa fa-circle mAprobada"></i>
                                                                </div>
                                                                <a href="javascript:info_asig(3501991 , 1 , 1,19387124);">Formación Integral Extra Programática<br>(350199)</a>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                                <td style="min-width:90px!IMPORTANT;min-height:100%!IMPORTANT;background-color:#A8E3FF;border:2px solid white;padding-top:2px!IMPORTANT; padding-left:2px;!IMPORTANT;padding-bottom:0px!IMPORTANT;padding-right:0px!IMPORTANT;">
                                                    <table style="min-width:100%;min-height:90px;">
                                                        <tbody>
                                                            <tr class="text-center">
                                                                <td>
                                                                <div class="row justify-content-end pr-3 pb-2">
                                                        <i class="ace-icon fa fa-circle mRenunciada"></i>&nbsp;<i class="ace-icon fa fa-circle mRenunciada"></i>&nbsp;<i class="ace-icon fa fa-circle mAprobada"></i>
                                                                </div>
                                                                <a href="javascript:info_asig(3501991 , 1 , 2,19387124);">Formación Integral Extra Programática<br>(350199)</a>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                                <td style="min-width:90px!IMPORTANT;min-height:100%!IMPORTANT;background-color:#A8E3FF;border:2px solid white;padding-top:2px!IMPORTANT; padding-left:2px;!IMPORTANT;padding-bottom:0px!IMPORTANT;padding-right:0px!IMPORTANT;">
                                                    <table style="min-width:100%;min-height:90px;">
                                                        <tbody>
                                                            <tr class="text-center">
                                                                <td>
                                                                <div class="row justify-content-end pr-3 pb-3">
                                                                    <i class="fa fa-circle mAprobada"></i>
                                                                </div>
                                                                <a href="javascript:info_asig(3501991 , 2 , 1,19387124);">Formación Integral Extra Programática<br>(350199)</a>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                                <td style="min-width:90px!IMPORTANT;min-height:100%!IMPORTANT;background-color:#A8E3FF;border:2px solid white;padding-top:2px!IMPORTANT; padding-left:2px;!IMPORTANT;padding-bottom:0px!IMPORTANT;padding-right:0px!IMPORTANT;">
                                                    <table style="min-width:100%;min-height:90px;">
                                                        <tbody>
                                                            <tr class="text-center">
                                                                <td>
                                                                <div class="row justify-content-end pr-3 pb-4">
                                                                    <i class="fa fa-circle mAprobada"></i>
                                                                </div>
                                                                <a href="javascript:info_asig(6205091 , 2 , 2,19387124);">Práctica Profesional I<br>(620509)</a>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                                <td style="min-width:90px!IMPORTANT;min-height:100%!IMPORTANT;background-color:#A8E3FF;border:2px solid white;padding-top:2px!IMPORTANT; padding-left:2px;!IMPORTANT;padding-bottom:0px!IMPORTANT;padding-right:0px!IMPORTANT;">
                                                    <table style="min-width:100%;min-height:90px;">
                                                        <tbody>
                                                            <tr class="text-center">
                                                                <td>
                                                                <div class="row justify-content-end pr-3 pb-2">
                                                                    <i class="fa fa-circle mAprobada"></i>
                                                                </div>
                                                                <a href="javascript:info_asig(3405561 , 3 , 1,19387124);">Formación Integral Oferta Institucional<br>(340556)</a>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                                <td style="min-width:90px!IMPORTANT;min-height:100%!IMPORTANT;background-color:#A8E3FF;border:2px solid white;padding-top:2px!IMPORTANT; padding-left:2px;!IMPORTANT;padding-bottom:0px!IMPORTANT;padding-right:0px!IMPORTANT;">
                                                    <table style="min-width:100%;min-height:90px;">
                                                        <tbody>
                                                            <tr class="text-center">
                                                                <td>
                                                                <div class="row justify-content-end pr-3 pb-3">
                                                                    <i class="fa fa-circle mAprobada"></i>
                                                                </div>
                                                                <a href="javascript:info_asig(6205161 , 3 , 2,19387124);">Electivo de Especialidad I<br>(620516)</a>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                                <td style="min-width:90px!IMPORTANT;min-height:100%!IMPORTANT;background-color:#A8E3FF;border:2px solid white;padding-top:2px!IMPORTANT; padding-left:2px;!IMPORTANT;padding-bottom:0px!IMPORTANT;padding-right:0px!IMPORTANT;">
                                                    <table style="min-width:100%;min-height:90px;">
                                                        <tbody>
                                                            <tr class="text-center">
                                                                <td>
                                                                <div class="row justify-content-end pr-3 pb-3">
                                                                    <i class="fa fa-circle mAprobada"></i>
                                                                </div>
                                                                <a href="javascript:info_asig(6205201 , 4 , 1,19387124);">Práctica Profesional II<br>(620520)</a>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                                <td style="min-width:90px!IMPORTANT;min-height:100%!IMPORTANT;background-color:#77D3FF;border:none;padding-top:2px!IMPORTANT; padding-left:2px;!IMPORTANT;padding-bottom:0px!IMPORTANT;padding-right:0px!IMPORTANT;" '="">
                                                <table style="min-width:100%;min-height:90px;">
                                                    <tbody>
                                                        <tr style="height:10px;"></tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <tfoot style="background-color:#d9edf7">

                                        <tr class="encabezadotabla" style="padding-top:2px!IMPORTANT; background-color:white">
                                            <td colspan="100">&nbsp;</td>
                                        </tr>

                                        <tr class="encabezadotabla" style="padding-top:2px!IMPORTANT;">
                                            <th colspan="100">Leyenda</th>
                                        </tr>

                                        <tr>
                                            <td colspan="4" class="info" style="border:none;color:#428bca;">
                                                <i class="ace-icon fa fa-circle mAprobada" style="padding-left:30px;padding-right:20px;"></i>
                                                Asignatura Aprobada
                                            </td>
                                            <td colspan="4" class="info" style="border:none;color:#428bca;">
                                                <i class="ace-icon fa fa-circle mReprobada" style="padding-left:30px;padding-right:20px;"></i>
                                                Asignatura Reprobada
                                            </td>
                                        </tr>

                                        <tr>
                                            <td colspan="4" class="info" style="border:none;color:#428bca;">
                                                <i class="ace-icon fa fa-circle mInscrita" style="padding-left:30px;padding-right:20px;"></i>
                                                Asignatura Inscrita
                                            </td>
                                            <td colspan="4" class="info" style="border:none;color:#428bca;">
                                                <i class="ace-icon fa fa-circle mRenunciada" style="padding-left:30px;padding-right:20px;"></i>
                                                Asignatura Renunciada
                                            </td>
                                        </tr>

                                        <tr>
                                            <td colspan="4" class="info" style="border:none;color:#428bca;">
                                                <i class="ace-icon fa fa-circle mNcr" style="padding-left:30px;padding-right:20px;"></i>
                                                No Cumple Requisitos (NCR)
                                            </td>
                                            <td colspan="4" class="info" style="border:none;color:#428bca;">
                                                <i class="ace-icon fa fa-circle mPendiente" style="padding-left:30px;padding-right:20px;"></i>
                                                Asignatura Pendiente
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
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
        // function info_asig(var1) {
        //     // alertify.success(var1);
        //     alertify.success(var1);
        // }

        function info_asig(var1,var2,var3,var4) {
            // alertify.success(var1);
            toastr.info("<strong>Codigo:</strong> "+var1+ "<br><strong>Año:</strong> "+var2 +"<br><strong>Semestre:</strong> "+ var3+"<br><strong>R.U.T:</strong> "+ var4);
        }
    </script>
</body>

</html>