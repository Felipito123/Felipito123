<?php session_start();
$rol = $_SESSION['sesionCESFAM']['id_rol'];
if (isset($_SESSION['sesionCESFAM']) && $rol == 3) { //VALIDA QUE SÓLO PUEDE VER EL ADMINISTRADOR Y EL SUPERADMIN
} else { //SINO LO REDIRIGE AL INDEX
    header("Location:../indice/");
}
date_default_timezone_set("America/Santiago");
setlocale(LC_TIME, "spanish");
$fechadehoy = strftime("%Y-%m-%d"); //("%Y-%m-%d") Ej:2021-12-23
?>
<?php include '../dashboard/head.php'; ?>

<style>
    .dt-buttons {
        float: left;
    }

    .dataTables_length {
        float: left;
        padding-top: 5px;
        margin-left: 10px;
    }

    .dataTables_info {
        float: left;
        margin-left: 10px;
    }

    /* ESTOS ULTIMOS 3 ESTILOS ES PARA COLOCAR LOS ... A LAS TABLAS CON HARTO TEXTO Y PREVENIR EL LARGO ESPACIADO*/
    .table.dataTable td:nth-child(1) {
        /*AL TITULO LE AGREGA LA ELLIPSIS(...) MÁS ABAJO*/
        max-width: 100px;
    }

    .table.dataTable td:nth-child(2) {
        /*AL VIDEO LE AGREGA LA ELLIPSIS (...) MÁS ABAJO*/
        max-width: 180px;
    }

    .table.dataTable td {
        white-space: nowrap;
        text-overflow: ellipsis;
        overflow: hidden;
    }


    /*====LO COMENTE PORQUE ME CAMBIABA EL TAMAÑO DE TODOS LOS SWAL ALERT, LO CAMBIE POR UN ID Y CAMBIAR EL TAMAÑO ESPECIFICO===*/
    /*Ajuste el tamaño del Label del swal*/
    /* .swal2-content {
        color: #545454;
        font-size: 14px;
        font-weight: 400;
        line-height: normal;
        text-align: left;
        word-wrap: break-word;
    } */

    /*Ajuste el tamaño de las alertas del swal*/
    /* .swal2-validation-message {
        font-size: 17px;
        margin: 0 -2.4em;
    } */

    #labelagregardias {
        color: #545454;
        font-size: 14px;
        font-weight: 400;
        line-height: normal;
        float: left;
        word-wrap: break-word;
    }

    .swal2-icon.swal2-warning {
        border-color: #f6c23e;
        /*amarillo= #f6c23e, verde=#a5dc86*/
        color: #f6c23e;
    }

    /* 
    .swal2-warning {
        background-color: #a5dc86;
        color: #a5dc86;
    } */

    /*DISEÑO DEL CHECKBOX*/
    input[type="checkbox"] {
        position: relative;
        width: 49px;
        height: 18px;
        top: 4px;
        -webkit-appearance: none;
        background-color: #c6c6c6;
        outline: none;
        border-radius: 20px;
        box-shadow: inset 0 0 5px rgb(0, 0, 0, .2);
        transition: .5s;
    }

    input:checked[type="checkbox"] {
        background: #45dca6;
    }

    input[type="checkbox"]:before {
        content: '';
        position: absolute;
        width: 19px;
        height: 18px;
        border-radius: 20px;
        top: 0;
        left: 0;
        background: #fff;
        transform: scale(1.1);
        box-shadow: 0 2px 5px rgb(0, 0, 0, .2);
        transition: .5s;
    }

    input:checked[type="checkbox"]:before {
        left: 30px;
    }

    /* ball */
    #ball:hover {
        background: linear-gradient(to right, #1cc88a 50%, #f6c23e 50%);
        background-size: 200% 100%;
        background-position: right bottom;
        transition: all 1.2s ease-out;
        color: white;
    }

    /*DISEÑO DEL CHECKBOX*/
</style>

<title>Salud los Álamos - Vacaciones</title>
</head>

<!--  oncontextmenu="return false" onkeydown="return false;" onmousedown="return false;" -->

<body id="page-top">
    <!--AGREGUE oncontextmenu="return false" onkeydown="return false;" onmousedown="return false;" PARA EVITAR QUE INSPECCIONEN LA PÁGINA -->


    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php include '../dashboard/sidebar.php'; ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <?php include '../dashboard/topbar.php'; ?>

                <div class="container-fluid" style="padding-bottom:2%;">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-center">
                        <h1 class="h3 mb-0 text-gray-800" style="font-family: 'Kaushan Script', cursive;">Vacaciones</h1>
                    </div>

                    <div class="row justify-content-end">
                        <label class="btn btn-success btn-sm shadow-sm" id="botongenerainformemensual"><i class="fa fa-search fa-sm text-white-50"></i>
                            Generar reporte
                        </label>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-lg-7">
                            <div class="alert" role="alert" style="background-color: #f9ea8f;background-image: linear-gradient(315deg, #f9ea8f 0%, #aff1da 74%);color:#1c606a">
                                <div class="row justify-content-center">
                                    <strong><i class="fas fa-info-circle pb-2"></i> A considerar</strong>
                                    <p class="pr-4"></p>
                                </div>
                                <ul>
                                    <li>Puede generar reporte de todos los funcionarios que tienen vacaciones durante un mes o semestre en particular.</li>
                                    <li>Si desea visualizar el certificado, vaya a la siguiente ruta
                                        Acciones <i class='fas fa-arrow-right'></i> <i class='fas fa-list'></i> <i class='fas fa-arrow-right'></i> <i class='fas fa-eye'></i>.</li>
                                    <li>En caso de que desee agregar más días de vaciones a un funcionario vaya a la siguiente ruta: Acciones <i class='fas fa-arrow-right'></i> <i class='fa fa-plus-circle'></i></li>
                                    <li>Si desea visualizar el listado de las vacaciones y su detalle, ir a la ruta: Acciones <i class='fas fa-arrow-right'></i> <i class='fas fa-list'></i></li>
                                    <li>Si desea eliminar una vacacion y su detalle, ir a la ruta: Acciones <i class='fas fa-arrow-right'></i> <i class='fas fa-list'></i> <i class='fas fa-arrow-right'></i> <i class='fas fa-trash'></i></li>
                                    <li>En caso de que elimine una vacación, junto con los datos se borrara el certificado.</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-lg-7">
                            <label>Acciones: </label>
                            <span class="badge badge-success" style="padding: 5px;"><i class="fa fa-paper-plane"></i> Registrar vacacion</span>
                            <span class="badge badge-info" style="padding: 5px;"><i class="fa fa-plus-circle"></i> Agregar más dias de vacaciones</span>
                            <span class="badge badge-warning" style="padding: 5px;"><i class="fas fa-list"></i> Detalle de las vacaciones</span>
                            <span class="badge badge-success" style="padding: 5px;"><i class="fa fa fa-eye"></i> Ver y descargar certificado</span>
                            <span class="badge badge-warning" style="padding: 5px;"><i class="fas fa fa-trash"></i> Eliminar vacacion</span>

                        </div>
                        <!-- <div class="col-lg-2"></div> -->
                    </div>


                    <div class="row justify-content-center pt-2">
                        <div class="col-xl-11 col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <!-- <div class="card-header py-3 d-flex flex-row align-items-center justify-content-center">
                                    <h6 class="m-0 font-weight-bold text-info"></h6>
                                </div>-->
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="tabla-vacaciones" class="table table-striped table-bordered table-condensed">
                                            <thead class="text-center">
                                                <tr class="text-white" style="background-color: #1cc88a;">
                                                    <th>RUT</th>
                                                    <th>NOMBRE</th>
                                                    <th>FECHA ENTRADA</th>
                                                    <th>DIAS GANADOS</th>
                                                    <th>DIAS RESTANTES</th>
                                                    <th>ACCIONES</th>
                                                </tr>
                                            </thead>
                                            <tbody class="text-center">
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--FIN DEL ROW -->
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

    <?php include '../partes/modal/modal_registrar_vacacion.php'; ?>
    <?php include '../partes/modal/modal_detalle_vacacion.php'; ?>
    <?php include '../partes/modal/modalverdocvacacion.php'; ?>


    <!-- CAMBIAR EL ITEM DEL NAVBAR SELECCIONADO -->
    <script>
        $("#vacacionesadmin").attr('class', 'nav-item active');
    </script>



    <script>
        //valido el largo del input type number del id= MRDiasTomados(Dias) del  modal_registrar_vacacion.php
        //Porque en el input type=number no acepta el maxlength 
        // function ValidaLargoDiasTomados(valor) {
        //     let entradainput = valor.value;
        //     let largo = entradainput.length;
        //     let restante = largo - 2;
        //     if (largo >= 3) {
        //         valor.value = entradainput.substring(0, largo - restante); //si es EJ: 54321 corta el resultado del largo(5) - restante(3) = deja sólo los primeros 2 digitos
        //         // valor.focus(); valor.select(); es una forma de borrar, seleccionando el contenido del input y si uno sigue escribiendo lo pasas a borrar
        //     }
        // }

        // function ValidaLargoAnoReporte(valor) {
        //     let entradainput = valor.value;
        //     let largo = entradainput.length;
        //     let restante = largo - 4;
        //     if (largo >= 5) {
        //         valor.value = entradainput.substring(0, largo - restante); //si es EJ: 54321 corta el resultado del largo(5) - restante(1) = deja sólo los primeros 4 digitos
        //     }
        // }
    </script>

    <script src="../js/validaciongeneral.js"></script>
    <script src="../js/funcionswal.js"></script>
    <!-- <script src="../../assets/popper/popper.min.js"></script>
    <script src="../../assets/bootstrap/js/bootstrap.min.js"></script> -->
    <script src="../../assets/datatables/datatables.min.js"></script>
    <script src="../../jsdashboard/sb-admin-2.min.js"></script>
    <script src="js/tabla_vacaciones.js"></script>
    <script src="js/formularios.js"></script>
    <script src="js/funciones.js"></script>


    <script>
        //     $('select').on('change', function() {
        //         console.log("CMABIO DEL MES:"+ this.value);
        //       });
    </script>
</body>

</html>