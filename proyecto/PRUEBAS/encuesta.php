<?php
// session_start();
// if (isset($_SESSION['sesionCESFAM'])) { //VALIDA SI LA SESION ESTA INICIADAz
//     $rut = $_SESSION["sesionCESFAM"]["rut"];
// } else { //SINO LO REDIRIGE AL INDEX
//     header("Location:../inicio/");
// }
?>
<?php include '../dashboard/head.php'; ?>

<title>Salud los Álamos - Encuesta</title>

<link rel="stylesheet" href="../../assets/datedropper/datedropper.css">
<link rel="stylesheet" href="../../assets/datedropper/color.css">
<link rel="stylesheet" href="css/estilo_checkbox_encuesta.css">
<script src="../../assets/datedropper/datedropper.js"></script>


<style>
    .blue {
        color: #478fca !important;
    }

    .bg-azul {
        background-color: #b0d3ef;
    }

    .form-check-input {
        position: absolute;
        margin-top: -.7rem;
        margin-left: -0.8rem;
        top: .8rem;
        width: 1.25rem;
        height: 1.25rem;
    }

    .form-check-label {
        padding-left: 1rem;
    }

    .btn-outline-rojo {
        color: #e74a3b;
        border-color: #e74a3b;
    }

    .btn-outline-rojo:hover {
        color: #e74a3b;
        background-color: #f5ebea;
    }

    .btn-outline-azul {
        color: #70a0c1;
        border-color: #8fbcd9;
    }

    .btn-outline-azul:hover {
        color: #8fbcd9;
        background-color: #f1f4f7;
    }

    .encabezadotabla {
        background-color: #438EB9;
        color: white;
    }
</style>


<!-- <link rel="stylesheet" href="https://intranet.ubiobio.cl/bootstrapsite/assets/css/ace.min.css"> -->

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
                        <h2 class="h3 mb-0 text-gray-800" style="font-family: 'Kaushan Script', cursive;">ENCUESTA</h2>
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
                        <!-- 
                        <div class="row justify-content-center pt-5">
                            <div class="col-10">
                                <h2>
                                    <img src="img/presentacion-covid-10.png" style="height: 10px; width:100%;" alt="" class="img-fluid">
                                </h2>
                            </div>
                        </div> -->
                    </div>
                    <div class="card">
                        <div class="container-fluid">
                            <form name="encabezado" class="m-4" id="contiene_todo" method="post">
                                <div class="row justify-content-end p-2 pb-4">
                                    <button class="btn btn-outline-info" type="submit">
                                        <i class="fas fa-save"></i> Guardar
                                    </button>
                                </div>

                                <div class="alert alert-info">
                                    ¡LOS CAMPOS MARCADOS CON <b>(*)</b> SON OBLIGATORIOS DEBEN SER CONTESTADOS ANTES DE GUARDAR SU FICHA!
                                </div>

                                <!-- I. IDENTIFICACION -->
                                <div class="row">
                                    <h3 class="blue"><b>I.</b> Identificación</h3>
                                    <hr class="col-lg-12 bg-azul">
                                </div>

                                <div class="row justify-content-center">
                                    <div class="col-xs-12 col-lg-6">
                                        <div class="form-group">
                                            <label class="col-sm-4 col-xs-12 blue">Apellido Paterno</label>
                                            <label class="col-sm-8 col-xs-12">MALVERDE</label>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-lg-6">
                                        <div class="form-group">
                                            <label class="col-sm-4 col-xs-12 blue">Apellido Materno</label>
                                            <label class="col-sm-8 col-xs-12">LASCANO</label>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-lg-6">
                                        <div class="form-group">
                                            <label class="col-sm-4 col-xs-12 blue">Nombres</label>
                                            <label class="col-sm-8 col-xs-12">PATRICIO ANDRÉS</label>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-lg-6">
                                        <div class="form-group">
                                            <label class="col-sm-4 col-xs-12 blue">Rut</label>
                                            <label class="col-sm-8 col-xs-12">17437149-0</label>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-lg-6">
                                        <div class="form-group">
                                            <label class="col-sm-4 col-xs-12 blue">Fecha de nacimiento</label>
                                            <label class="col-sm-8 col-xs-12">17/12/1986</label>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-lg-6">
                                        <div class="form-group">
                                            <label class="col-sm-4 col-xs-12 blue">Edad</label>
                                            <label class="col-sm-8 col-xs-12">21</label>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-lg-12">
                                        <div class="form-group">
                                            <label class="col-sm-4 col-xs-12 blue">Sexo</label>
                                            <label class="col-sm-8 col-xs-12">MASCULINO</label>
                                        </div>
                                    </div>

                                </div><!-- FIN ROW I. IDENTIFICACIÓN -->


                                <!-- I.II PREVISIÓN -->
                                <div class="row" id="alturaprevision">
                                    <h3 class="blue"><b>I.II.</b> Previsión ( Seleccione una ) (*)</h3>
                                    <hr class="col-lg-12 bg-azul">
                                </div>

                                <!-- <br> -->

                                <div class="row pl-4 pt-2">
                                    <div class="col-sm-6 col-lg-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="tipo_prevision_ficha" id="tipo_prevision_ficha1" value="1">
                                            <label class="form-check-label" for="tipo_prevision_ficha1">
                                                Fonasa
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-lg-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="tipo_prevision_ficha" id="tipo_prevision_ficha2" value="2">
                                            <label class="form-check-label" for="tipo_prevision_ficha2">
                                                Isapre
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-lg-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="tipo_prevision_ficha" id="tipo_prevision_ficha3" value="3">
                                            <label class="form-check-label" for="tipo_prevision_ficha3">
                                                Sin previsión
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-lg-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="tipo_prevision_ficha" id="tipo_prevision_ficha4" value="4">
                                            <label class="form-check-label" for="tipo_prevision_ficha4">
                                                Tarjeta de Gratuidad
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-lg-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="tipo_prevision_ficha" id="tipo_prevision_ficha5" value="5">
                                            <label class="form-check-label" for="tipo_prevision_ficha5">
                                                FF.AA
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-lg-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="tipo_prevision_ficha" id="tipo_prevision_ficha6" value="6">
                                            <label class="form-check-label" for="tipo_prevision_ficha6">
                                                PRAIS
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-lg-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="tipo_prevision_ficha" id="tipo_prevision_ficha7" value="7">
                                            <label class="form-check-label" for="tipo_prevision_ficha7">
                                                Otros
                                            </label>
                                        </div>
                                    </div>
                                </div>


                                <!-- I.III Otros-->
                                <div class="row pt-3" id="alturaotros">
                                    <h3 class="blue"><b>I.III.</b> Otros</h3>
                                    <hr class="col-lg-12 bg-azul">
                                </div>

                                <div class="row pt-2">

                                    <div class="col-lg-6">
                                        <div class="form-group row">
                                            <label class="col-sm-4">Carrera</label>
                                            <label class="col-sm-8">( 2937 - 2) INGENIERÍA DE EJECUCIÓN EN COMPUTACIÓN E INFORMÁTICA</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group row">
                                            <label class="col-sm-4">Año Ingreso</label>
                                            <label class="col-sm-8">2018-1</label>
                                        </div>
                                    </div>

                                    <hr class="col-lg-12">

                                    <div class="col-lg-6">
                                        <div class="form-group row">
                                            <label class="col-sm-4">Dirección Académica</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control selec" name="direccion_ano_academico" id="direccion_ano_academico" value="Ramón Rabal 449">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group row">
                                            <label class="col-sm-4">Telefono Fijo</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control fecha" name="academico_telefono_fijo" id="academico_telefono_fijo" value="412693498">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group row">
                                            <label class="col-sm-4">Celular</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control fecha" name="academico_celular" id="academico_celular" value="">
                                            </div>
                                        </div>
                                    </div>

                                    <hr class="col-lg-12">

                                    <div class="col-lg-6">
                                        <div class="form-group row">
                                            <label class="col-sm-4">Dirección Familiar</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control selec" name="direccion_familiar" id="direccion_familiar" value="Ramón Rabal 449">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group row">
                                            <label class="col-sm-4">Telefono Fijo</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control fecha" name="familiar_telefono_fijo" id="familiar_telefono_fijo" value="412693498">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group row">
                                            <label class="col-sm-4">Celular</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="familiar_celular" id="familiar_celular" value="">
                                            </div>
                                        </div>
                                    </div>

                                    <hr class="col-lg-12">

                                    <div class="col-lg-6">
                                        <div class="form-group row">
                                            <label class="col-sm-4">Estado Civil</label>
                                            <div class="col-sm-8">
                                                <select name="estado_civil" id="estado_civil" class="form-control">
                                                    <option value="1">SOLTERO </option>
                                                    <option value="2">CASADO </option>
                                                    <option value="3">VIUDO </option>
                                                    <option value="4">DIVORCIADO </option>
                                                    <option value="5">ANULADO </option>
                                                    <option value="6">SEPARADO </option>
                                                    <option value="7">EN CONVIVENCIA </option>
                                                    <option value="8">SEPARADO JUDICIALMENTE </option>
                                                    <option value="10">ACUERDO DE UNIÓN CIVIL </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <hr class="col-lg-12">

                                </div><!-- row sub-seccion I.III-->


                                <div class="row pt-2" id="alturatienehijos">
                                    <h3 class="blue"><b>I.IV.</b> Si tiene hijos, señale (*) </h3>
                                    <hr class="col-lg-12 bg-azul">
                                </div>

                                <div class="row pt-2">

                                    <div class="col-lg-6 pb-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="tengo_hijos" id="tengo_hijos1" value="0">
                                            <label class="form-check-label" for="tengo_hijos1">
                                                No tengo
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="tengo_hijos" id="tengo_hijos2" value="1">
                                            <label class="form-check-label" for="tengo_hijos2">
                                                Si tengo
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-lg-3 pt-2">
                                        <button name="insertarhijo" id="insertarhijo" class="btn btn-lg btn-white btn-outline-azul" value="0" type="button" disabled>
                                            <i class="blue fa fa-plus" style="padding-top: 2px;"></i> Insertar Hijos
                                        </button>
                                    </div>

                                    <div class="col-sm-12 pt-3">
                                        <div class="table-responsive">
                                            <table class="table table-bordered" id="tablahijos">
                                                <thead>
                                                    <tr style="background-color: #438EB9;color:white;">
                                                        <th>Nombre</th>
                                                        <th>Edad</th>
                                                        <th>Vives con él</th>
                                                        <th>Eliminar</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                            </table>
                                        </div> <!-- box-body -->
                                    </div> <!-- col-sm-12 [contenedor tabla]-->
                                </div>


                                <div class="row pt-4" id="añoacademicodevivienda">
                                    <h3 class="blue"><b>I.V.</b> Marque con una X el lugar donde vive durante el año académico (*) </h3>
                                    <hr class="col-lg-12 bg-azul">
                                </div>

                                <div class="row pt-2">

                                    <div class="col-lg-12">
                                        <div class="form-group row">
                                            <label class="col-sm-4">¿Vives con tus padres?</label>
                                            <div class="col-sm-6">
                                                <label>
                                                    <input type="checkbox" class="ace ace-switch ace-switch-6" name="vives_contus_padres" id="vives_contus_padres" value="0" onclick="$(this).val(this.checked ? 1 : 0)">
                                                    <span class="lbl"></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-sm-6 col-lg-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="tipo_residencia_ficha" id="residencia1" value="1">
                                            <label class="form-check-label" for="residencia1">
                                                Pensión
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-lg-2">

                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="tipo_residencia_ficha" id="residencia2" value="2">
                                            <label class="form-check-label" for="residencia2">
                                                Arrendada
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-lg-2">

                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="tipo_residencia_ficha" id="residencia3" value="3">
                                            <label class="form-check-label" for="residencia3">
                                                Familiares
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-lg-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="tipo_residencia_ficha" id="residencia4" value="4">
                                            <label class="form-check-label" for="residencia4">
                                                Hogar Estudiantil
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-lg-2 pb-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="tipo_residencia_ficha" id="residencia5" value="5">
                                            <label class="form-check-label" for="residencia5">
                                                Otro Lugar
                                            </label>
                                        </div>
                                    </div>
                                </div>


                                <div class="row pt-4">
                                    <h3 class="blue"><b>II.</b> Antecedentes personales </h3>
                                    <hr class="col-lg-12 bg-azul">
                                </div>

                                <div class="row pt-2" id="alturaenfermedades">
                                    <h3 class="blue"><b>II.I</b> ¿Has tenido alguna de estas enfermedades?<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Marca con una equis (X) en el casillero que corresponda, señala además cuántos años tenías cuando comenzó la enfermedad</h3>

                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="tablahastenidoenfermedad">
                                            <thead>
                                                <tr class="encabezadotabla">
                                                    <th>Enfermedad</th>
                                                    <th style="padding-left:26px;">No</th>
                                                    <th style="padding-left:26px;">Si</th>
                                                    <th>Edad</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        Enfermedades cardíacas
                                                    </td>
                                                    <td>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="item_enfermedad_cardiaca" value="0">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="item_enfermedad_cardiaca" value="1">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <input type="number" name="edad_enfermedad_cardiaca" id="edad_enfermedad_cardiaca" min="1" max="100" maxlength="3" class="form-control">
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        Enfermedades del riñón
                                                    </td>
                                                    <td>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="item_enfermedad_riñon" value="0">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="item_enfermedad_riñon" value="1">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <input type="number" name="edad_enfermedad_riñon" id="edad_enfermedad_riñon" class="form-control" min="1" max="100" maxlength="3">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Diabetes
                                                    </td>
                                                    <td>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="item_enfermedad_diabetes" value="0">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="item_enfermedad_diabetes" value="1">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <input type="number" name="edad_enfermedad_diabetes" id="edad_enfermedad_diabetes" class="form-control" min="1" max="100" maxlength="3">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Hipertensión Arterial
                                                    </td>
                                                    <td>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="item_enfermedad_hipertension_arterial" value="0">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="item_enfermedad_hipertension_arterial" value="1">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <input type="number" name="edad_enfermedad_hipertension_arterial" id="edad_enfermedad_hipertension_arterial" class="form-control" min="1" max="100" maxlength="3">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Enfermedades respiratorias crónicas
                                                    </td>
                                                    <td>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="item_enfermedad_respiratoria_cronicas" value="0">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="item_enfermedad_respiratoria_cronicas" value="1">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <input type="number" name="edad_enfermedad_respiratoria_cronicas" id="edad_enfermedad_respiratoria_cronicas" class="form-control" min="1" max="100" maxlength="3">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Problemas alimentarios
                                                    </td>
                                                    <td>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="item_enfermedad_problemas_alimentarios" value="0">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="item_enfermedad_problemas_alimentarios" value="1">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <input type="number" name="edad_enfermedad_problemas_alimentarios" id="edad_enfermedad_problemas_alimentarios" class="form-control" min="1" max="100" maxlength="3">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Enfermedades de la piel
                                                    </td>
                                                    <td>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="item_enfermedad_delapiel" value="0">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="item_enfermedad_delapiel" value="1">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <input type="number" name="edad_enfermedad_delapiel" id="edad_enfermedad_delapiel" class="form-control" min="1" max="100" maxlength="3">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Enfermedades de Transmisión Sexual
                                                    </td>
                                                    <td>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="item_enfermedad_trm_sexual" value="0">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="item_enfermedad_trm_sexual" value="1">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <input type="number" name="edad_enfermedad_trm_sexual" id="edad_enfermedad_trm_sexual" class="form-control" min="1" max="100" maxlength="3">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Hepatitis
                                                    </td>
                                                    <td>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="item_enfermedad_hepatitis" value="0">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="item_enfermedad_hepatitis" value="1">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <input type="number" name="edad_enfermedad_hepatitis" id="edad_enfermedad_hepatitis" class="form-control" min="1" max="100" maxlength="3">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Cáncer
                                                    </td>
                                                    <td>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="item_enfermedad_cancer" value="0">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="item_enfermedad_cancer" value="1">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <input type="number" name="edad_enfermedad_cancer" id="edad_enfermedad_cancer" class="form-control" min="1" max="100" maxlength="3">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Trastornos Psicológicos o Psiquiátricos
                                                    </td>
                                                    <td>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="item_enfermedad_tpp" value="0">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="item_enfermedad_tpp" value="1">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <input type="number" name="edad_enfermedad_tpp" id="edad_enfermedad_tpp" class="form-control" min="1" max="100" maxlength="3">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Varicela
                                                    </td>
                                                    <td>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="item_enfermedad_varicela" value="0">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="item_enfermedad_varicela" value="1">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <input type="number" name="edad_enfermedad_varicela" id="edad_enfermedad_varicela" class="form-control" min="1" max="100" maxlength="3">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Problemas estomacales
                                                    </td>
                                                    <td>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="item_enfermedad_probl_estomc" value="0">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="item_enfermedad_probl_estomc" value="1">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <input type="number" name="edad_enfermedad_probl_estomc" id="edad_enfermedad_probl_estomc" class="form-control" min="1" max="100" maxlength="3">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Anemia
                                                    </td>
                                                    <td>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="item_enfermedad_anemia" value="0">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="item_enfermedad_anemia" value="1">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <input type="number" name="edad_enfermedad_anemia" id="edad_enfermedad_anemia" class="form-control" min="1" max="100" maxlength="3">
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>


                                    <div class="col-sm-12">
                                        <div class="table-responsive">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr class="encabezadotabla">
                                                        <th>Otras ( señala cuál )</th>
                                                        <th>Edad</th>
                                                        <th>Observación</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <input type="text" name="item_otra_enfermedad_nombre" class="form-control" maxlength="30">
                                                        </td>
                                                        <td>
                                                            <input type="number" name="item_otra_enfermedad_edad" class="form-control" min="1" max="100" maxlength="3">
                                                        </td>
                                                        <td>
                                                            <input type="text" name="item_otra_enfermedad_observacion" class="form-control" maxlength="30">
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>



                                <div class="row pt-2">
                                    <h3 class="blue"><b>II.II</b> ¿Te has sometido a cirugías?<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Señala cuáles y Fecha/Año</h3>
                                    <hr class="col-lg-12 bg-azul">
                                </div>

                                <div class="row pt-2">

                                    <div class="col-lg-3 pt-2">
                                        <button name="insertar" id="insertarcirugias" class="btn btn-lg btn-white btn-outline-azul" value="Insertar Cirugías" type="button">
                                            <i class="blue fa fa-plus" style="padding-top: 2px;"></i> Insertar Cirugías
                                        </button>
                                    </div>

                                    <div class="col-sm-12 pt-3">
                                        <div class="table-responsive">
                                            <table class="table table-bordered" id="tablacirugias">
                                                <thead>
                                                    <tr class="encabezadotabla">
                                                        <th>Descripción</th>
                                                        <th>Fecha</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                            </table>
                                        </div> <!-- box-body -->
                                    </div> <!-- col-sm-12 [contenedor tabla]-->
                                </div>

                                <!-- Seccion II.III-->
                                <div class="row pt-2" id="alturatransfusionessanguineas">
                                    <h3 class="blue"><b>II.III</b> ¿Has recibido transfusiones sanguíneas? (*)</h3>
                                    <hr class="col-lg-12 bg-azul">
                                </div>

                                <div class="row pt-2">

                                    <div class="col-lg-6 pb-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="transfucion" id="transfucion1" value="0">
                                            <label class="form-check-label" for="transfucion1">
                                                No
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 pb-5">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="transfucion" id="transfucion2" value="1">
                                            <label class="form-check-label" for="transfucion2">
                                                Si
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group row">
                                            <label class="col-sm-4 pt-2">Fecha</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="transfucion_fecha_a" style="cursor:pointer" name="transfucion_fecha" placeholder="Click para agregar Fecha" value="" data-large-mode="true" data-lang="es" data-large-default="true" data-translate-mode="false" data-format="d-m-Y" data-theme="my-style" required readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div class="col-lg-6">
                                    <div class="form-group row">
                                        <label class="col-sm-4 pt-2">Año</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control cantidad" id="transfucion_ano" name="transfucion_ano" value="" onchange="Notas(this)">
                                        </div>
                                    </div>
                                </div> -->

                                    <script>
                                        $('#transfucion_fecha_a').dateDropper();
                                    </script>

                                </div>

                                <!-- Seccion II.IV-->
                                <div class="row pt-3">
                                    <h3 class="blue"><b>II.IV</b> ¿Padeces alguna alergia (cutánea, respiratoria, a medicamentos, a alimentos)?<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Señala qué te la causa</h3>
                                    <hr class="col-lg-12 bg-azul">
                                </div>

                                <div class="row pt-2">
                                    <div class="col-lg-3 pt-2">
                                        <button name="insertar" id="insertaralergias" class="btn btn-lg btn-white btn-outline-azul" value="Insertar Alergias" type="button">
                                            <i class="blue fa fa-plus" style="padding-top: 2px;"></i> Insertar Alergias
                                        </button>
                                    </div>

                                    <div class="col-sm-12 pt-3">
                                        <div class="table-responsive">
                                            <table class="table table-bordered" id="tablaalergias">
                                                <thead>
                                                    <tr class="encabezadotabla">
                                                        <th>Descripción</th>
                                                        <th class="center">Eliminar</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                            </table>
                                        </div> <!-- box-body -->
                                    </div> <!-- col-sm-12 [contenedor tabla]-->
                                </div>

                                <!--Seccion II.V -->
                                <div class="row pt-3" id="alturaanestesia">
                                    <h3 class="blue"><b>II.V</b> ¿Has tenido algún accidente con la anestesia o eres alérgico a ella? (*) </h3>
                                    <hr class="col-lg-12 bg-azul">
                                </div>

                                <div class="row pt-2">

                                    <div class="col-lg-6 pb-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="anestesia" id="anestesia1" value="0">
                                            <label class="form-check-label" for="anestesia1">
                                                No
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 pb-5">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="anestesia" id="anestesia2" value="1">
                                            <label class="form-check-label" for="anestesia2">
                                                Si
                                            </label>
                                        </div>
                                    </div>


                                </div>

                                <!--Seccion II.VI-->
                                <div class="row pt-3" id="alturahospitalizado">
                                    <h3 class="blue"><b>II.VI</b> ¿Has estado hospitalizado? </h3>
                                    <hr class="col-lg-12 bg-azul">
                                </div>

                                <div class="row pt-2">

                                    <div class="col-lg-6 pb-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="hospitalizado" id="hospitalizado1" value="0">
                                            <label class="form-check-label" for="hospitalizado1">
                                                No
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 pb-5">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="hospitalizado" id="hospitalizado2" value="1">
                                            <label class="form-check-label" for="hospitalizado2">
                                                Si
                                            </label>
                                        </div>
                                    </div>


                                    <div class="col-lg-3 pb-2">
                                        <button name="insertar" id="insertarhospitalizado" class="btn btn-lg btn-white btn-outline-azul" value="Insertar Hospitalizado" type="button" disabled>
                                            <i class="blue fa fa-plus" style="padding-top: 2px;"></i> Insertar Hospitalizado
                                        </button>
                                    </div>

                                    <div class="col-sm-12">
                                        <div class="table-responsive">
                                            <table class="table table-bordered" id="tablahospitalizado">
                                                <thead>
                                                    <tr class="encabezadotabla">
                                                        <th>Causa</th>
                                                        <th>Fecha</th>
                                                        <th>Eliminar</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>


                                </div>

                                <br><br>

                                <!-- SECCION II.VII-->
                                <div class="row pt-3">
                                    <h3 class="blue"><b>II.VII</b> Si utilizas actualmente algún medicamento completa lo siguiente: (*) </h3>
                                    <hr class="col-lg-12 bg-azul">
                                </div>

                                <div class="row pt-2" id="alturamedicamento">

                                    <div class="col-lg-6 pb-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="medicamento" id="medicamento1" value="0">
                                            <label class="form-check-label" for="medicamento1">
                                                No
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 pb-5">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="medicamento" id="medicamento2" value="1">
                                            <label class="form-check-label" for="medicamento2">
                                                Si
                                            </label>
                                        </div>
                                    </div>


                                    <div class="col-lg-3 pb-2">
                                        <button name="insertar" id="insertarmedicamento" class="btn btn-lg btn-white btn-outline-azul" value="Insertar Hospitalizado" type="button" disabled>
                                            <i class="blue fa fa-plus" style="padding-top: 2px;"></i> Insertar Medicamento
                                        </button>
                                    </div>

                                    <div class="col-sm-12">
                                        <div class="table-responsive">
                                            <table class="table table-bordered" id="tablamedicamento">
                                                <thead>
                                                    <tr class="encabezadotabla">
                                                        <th>Nombre Medicamento</th>
                                                        <th>Dosis Diaria</th>
                                                        <th>Fecha de inicio del Consumo</th>
                                                        <th>Razón para su uso</th>
                                                        <th>Prescrito por</th>
                                                        <th>Eliminar</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                </div>

                                <br>

                                <!-- Seccion II.VIII -->
                                <div class="row pt-3" id="alturaseccionII_III">
                                    <h3 class="blue"><b>II.VIII</b> Hábitos: Marca con una equis (X) en el casillero que corresponda a tu caso o rellena con números, según corresponda: </h3>
                                    <hr class="col-lg-12 bg-azul">
                                </div>

                                <div class="row pt-2">

                                    <div class="col-sm-12">
                                        <h6 class="blue">¿Tienes sueño normal en el último mes? (*)</h6>
                                    </div>

                                    <div class="col-lg-6 pb-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="sueno_normal" id="sueno_normal1" value="0">
                                            <label class="form-check-label" for="sueno_normal1">
                                                No
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 pb-5">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="sueno_normal" id="sueno_normal2" value="1">
                                            <label class="form-check-label" for="sueno_normal2">
                                                Si
                                            </label>
                                        </div>
                                    </div>


                                    <div class="col-sm-12">
                                        <h6 class="blue">Comidas que ingieres todos los días (*)</h6>
                                    </div>

                                    <div class="col-xs-12 col-sm-4 col-lg-4">
                                        <label>
                                            <input type="checkbox" class="ace ace-switch ace-switch-6" name="desayuno" value="0" onclick="$(this).val(this.checked ? 1 : 0)">
                                            <span class="lbl">&nbsp;&nbsp;Desayuno</span>
                                        </label>
                                    </div>
                                    <div class="col-xs-12 col-sm-4 col-lg-4">
                                        <label>
                                            <input type="checkbox" class="ace ace-switch ace-switch-6" name="almuerzo" value="0" onclick="$(this).val(this.checked ? 1 : 0)">
                                            <span class="lbl">&nbsp;&nbsp;Almuerzo</span>
                                        </label>
                                    </div>
                                    <div class="col-xs-12 col-sm-4 col-lg-4">
                                        <label>
                                            <input type="checkbox" class="ace ace-switch ace-switch-6" name="cena" value="0" onclick="$(this).val(this.checked ? 1 : 0)">
                                            <span class="lbl">&nbsp;&nbsp;Cena</span>
                                        </label>
                                    </div>

                                    <br>

                                    <div class="col-sm-12 pt-4">
                                        <h6 class="blue">¿Cuántos cigarrillos fumas a la semana?</h6>
                                    </div>

                                    <div class="col-sm-4">
                                        <input type="number" class="form-control" name="cigarrillos" id="cigarrillos" min="0" max="1000" minlength="1" maxlength="4" value="0" required>
                                    </div>

                                    <!-- <div class="col-sm-12 pt-4">
                                    <h6 class="lighter blue">Si bebes, señala el tipo de alcohol.</h6>
                                </div> -->

                                    <div class="col-lg-12 pt-4">
                                        <div class="form-group row">
                                            <label class="col-sm-4 blue">¿Bebes? <i class="fas fa-wine-bottle"></i> </label>
                                            <div class="col-sm-6">
                                                <label id="divpreguntasibebe">
                                                    <input type="checkbox" class="ace ace-switch ace-switch-6" name="pregunta_bebe" value="0" onclick="$(this).val(this.checked ? 1 : 0)">
                                                    <span class="lbl"></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-4 col-lg-4" id="colVino" hidden>
                                        <label>
                                            <input type="checkbox" class="ace ace-switch ace-switch-6" name="vino" id="vino" value="0" onclick="$(this).val(this.checked ? 1 : 0)">
                                            <span class="lbl">&nbsp;&nbsp;Vino</span>
                                        </label>
                                    </div>
                                    <div class="col-xs-12 col-sm-4 col-lg-4" id="colCerveza" hidden>
                                        <label>
                                            <input type="checkbox" class="ace ace-switch ace-switch-6" name="cerveza" id="cerveza" value="0" onclick="$(this).val(this.checked ? 1 : 0)">
                                            <span class="lbl">&nbsp;&nbsp;Cerveza</span>
                                        </label>
                                    </div>
                                    <div class="col-xs-12 col-sm-4 col-lg-4" id="colLicores" hidden>
                                        <label>
                                            <input type="checkbox" class="ace ace-switch ace-switch-6" name="licores" id="licores" value="0" onclick="$(this).val(this.checked ? 1 : 0)">
                                            <span class="lbl">&nbsp;&nbsp;Licores</span>
                                        </label>
                                    </div>

                                    <br>

                                    <div class="col-sm-12 pt-4" id="textofrecuenciabebe" hidden>
                                        <h6 class="blue">Si bebes, señala la frecuencia.</h6>
                                    </div>

                                    <div class="col-xs-12 col-sm-4 col-lg-4 pb-2" id="colbebe1" hidden>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="bebe" id="bebe1" value="1">
                                            <label class="form-check-label" for="bebe1">
                                                Nunca
                                            </label>
                                        </div>
                                    </div>


                                    <div class="col-xs-12 col-sm-4 col-lg-4 pb-2" id="colbebe2" hidden>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="bebe" id="bebe2" value="2">
                                            <label class="form-check-label" for="bebe2">
                                                Una o Menos Veces al Mes
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-4 col-lg-4 pb-2" id="colbebe3" hidden>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="bebe" id="bebe3" value="3">
                                            <label class="form-check-label" for="bebe3">
                                                De 2 a 4 Veces al Mes
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-4 col-lg-4 pb-2" id="colbebe4" hidden>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="bebe" id="bebe4" value="4">
                                            <label class="form-check-label" for="bebe4">
                                                De 2 a 3 Veces a la Semana
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-4 col-lg-4" id="colbebe5" hidden>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="bebe" id="bebe5" value="5">
                                            <label class="form-check-label" for="bebe5">
                                                4 o Más Veces a la Semana
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-sm-12 pt-1" id="colcomienzo_beber1" hidden>
                                        <h6 class="blue">¿A que edad comenzaste a beber? </h6>
                                    </div>

                                    <div class="col-xs-12 col-sm-5" id="colcomienzo_beber2" hidden>
                                        <input type="number" class="form-control" name="comienzo_beber" id="comienzo_beber" min="1" minlength="1" maxlength="15">
                                        <small>(En años)</small>
                                    </div>

                                    <br>

                                    <div class="col-lg-12 pt-2">
                                        <div class="form-group row">
                                            <label class="col-sm-4 blue">¿Consume Drogas? <i class="fas fa-cannabis"></i> </label>
                                            <div class="col-sm-6">
                                                <label id="DivPreguntaConsumeDroga">
                                                    <input type="checkbox" class="ace ace-switch ace-switch-6" name="pregunta_consume_drogas" value="0" onclick="$(this).val(this.checked ? 1 : 0)">
                                                    <span class="lbl"></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-12 pt-3" id="TextoConsumeDroga" hidden>
                                        <h6 class="blue">Si consumes drogas, señála cuáles</h6>
                                    </div>

                                    <div class="col-xs-12 col-sm-5" id="DivOtrasDrogas" hidden>
                                        <input type="text" class="form-control" name="otras_drogas" id="otras_drogas" minlength="1" maxlength="35">
                                    </div>

                                    <br>

                                    <div class="col-sm-12 pt-4" id="TextoCantidadSemanal" hidden>
                                        <h6 class="blue">Cantidad semanal</h6>
                                    </div>

                                    <div class="col-xs-12 col-sm-5" id="DivCantidadSemanal" hidden>
                                        <input type="text" class="form-control" name="cantidad_semanal" id="cantidad_semanal" minlength="1" maxlength="35">
                                    </div>

                                    <br>

                                    <div class="col-sm-12 pt-4" id="TextoEdadDroga" hidden>
                                        <h6 class="blue">A que edad comenzaste a usar esa(s) droga(s)</h6>
                                    </div>

                                    <div class="col-xs-12 col-sm-5 pb-4" id="DivEdadComienzoUso" hidden>
                                        <input type="number" class="form-control" name="edad_comienzo_uso" id="edad_comienzo_uso" min="5" max="100" minlength="1" maxlength="3">
                                    </div>

                                    <div class="col-sm-12 pb-2" id="alturaconducevehiculo">
                                        <h6 class="blue">¿Conduces un vehículo? (*)</h6>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="conduces_vehiculo" id="conduces_vehiculo1" value="1">
                                            <label class="form-check-label" for="conduces_vehiculo1">
                                                Si
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="conduces_vehiculo" id="conduces_vehiculo2" value="0">
                                            <label class="form-check-label" for="conduces_vehiculo2">
                                                No
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 pt-4">
                                        <div class="form-group row">
                                            <label class="col-sm-4 blue">¿Realizas algún ejercicio físico? <i class="icofont-gym" style="font-size: 22px;"></i> </label>
                                            <div class="col-sm-6">
                                                <label id="DivPreguntaRealizaEjercicio">
                                                    <input type="checkbox" class="ace ace-switch ace-switch-6" name="pregunta_realiza_ejercicioFisico" value="0" onclick="$(this).val(this.checked ? 1 : 0)">
                                                    <span class="lbl"></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-12" id="TextoSeñalaEjercicio" hidden>
                                        <h6 class="blue">Señala cúales.</h6>
                                    </div>

                                    <div class="col-xs-12 col-sm-5 pb-3" id="InputSeñalaEjercicio" hidden>
                                        <input type="text" class="form-control" name="ejercicio_fisico" id="ejercicio_fisico">
                                    </div>

                                    <div class="col-sm-12" id="TextoSeñalaFrecuenciaEjercicio" hidden>
                                        <h6 class="blue">¿Con que frecuencia semanal haces ejercicio? (*)</h6>
                                    </div>

                                    <div class="col-xs-12 col-sm-4 col-lg-4" id="CheckEjercicio1" hidden>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="ejercicio" id="ejercicio1" value="1">
                                            <label class="form-check-label" for="ejercicio1">
                                                Menos de una vez
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-4 col-lg-4" id="CheckEjercicio2" hidden>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="ejercicio" id="ejercicio2" value="2">
                                            <label class="form-check-label" for="ejercicio2">
                                                Una vez
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-4 col-lg-4 pb-3" id="CheckEjercicio3" hidden>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="ejercicio" id="ejercicio3" value="3">
                                            <label class="form-check-label" for="ejercicio3">
                                                Más de una vez
                                            </label>
                                        </div>
                                    </div>

                                    <br>
                                    <div class="col-sm-12" id="DivPreguntaCepillarDientes">
                                        <h6 class="blue">¿Con que frecuencia te cepillas los dientes al día (*)</h6>
                                    </div>

                                    <div class="col-xs-12 col-sm-4 col-lg-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="cepillado" id="cepillado1" value="1">
                                            <label class="form-check-label" for="cepillado1">
                                                Una vez al día
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-4 col-lg-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="cepillado" id="cepillado2" value="2">
                                            <label class="form-check-label" for="cepillado2">
                                                Dos veces al día
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-4 col-lg-4 pb-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="cepillado" id="cepillado3" value="3">
                                            <label class="form-check-label" for="cepillado3">
                                                Más de dos veces
                                            </label>
                                        </div>
                                    </div>

                                    <br>

                                    <div class="col-sm-12">
                                        <h6 class="blue">¿Cuándo te cepillas? (*)</h6>
                                    </div>

                                    <div class="col-xs-12 col-sm-4 col-lg-4">
                                        <label>
                                            <input type="checkbox" class="ace ace-switch ace-switch-6" name="cep_despuescomida" value="0" onclick="$(this).val(this.checked ? 1 : 0)">
                                            <span class="lbl">&nbsp;&nbsp;Después de cada comida</span>
                                        </label>
                                    </div>

                                    <div class="col-xs-12 col-sm-4 col-lg-4">
                                        <label>
                                            <input type="checkbox" class="ace ace-switch ace-switch-6" name="cep_solo_levantarme" value="0" onclick="$(this).val(this.checked ? 1 : 0)">
                                            <span class="lbl">&nbsp;&nbsp;Sólo al levantarme</span>
                                        </label>
                                    </div>

                                    <div class="col-xs-12 col-sm-4 col-lg-4">
                                        <label>
                                            <input type="checkbox" class="ace ace-switch ace-switch-6" name="cep_solo_acostarme" value="0" onclick="$(this).val(this.checked ? 1 : 0)">
                                            <span class="lbl">&nbsp;&nbsp;Sólo al acostarme</span>
                                        </label>
                                    </div>

                                </div>


                                <?php
                                $tipodesexo = 2; // 1= masculino , 2= femenino
                                if ($tipodesexo == 2) {
                                ?>
                                    <!--Seccion II.IX -->
                                    <div class="row pt-3" id="divtituloantecedentesGinecologicos">
                                        <h3 class="blue"><b>II.IX</b> Antecedentes Gineco-Urológicos</h3>
                                        <hr class="col-lg-12 bg-azul">
                                    </div>

                                    <div class="row pt-2">

                                        <div class="col-sm-12">
                                            <h6 class="blue">Edad de tu primera menstruación</h6>
                                        </div>

                                        <div class="col-xs-12 col-sm-5 ">
                                            <input type="number" class="form-control" name="edad_mestruacion" id="edad_mestruacion" min="10" max="20" maxlength="2">
                                        </div>

                                        <div class="col-sm-12 pt-3" id="ciclosregularesmenstruacion">
                                            <h6 class="blue">¿Son tus ciclos regulares?</h6>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="ciclos_regulares" id="ciclos_regulares1" value="1">
                                                <label class="form-check-label" for="ciclos_regulares1">
                                                    Si
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="ciclos_regulares" id="ciclos_regulares2" value="0">
                                                <label class="form-check-label" for="ciclos_regulares2">
                                                    No
                                                </label>
                                            </div>
                                        </div>


                                        <div class="col-sm-12 pt-3">
                                            <h6 class="blue">¿Sufres de dismenorrea? (dolor menstrual) </h6>
                                        </div>

                                        <div class="col-lg-6" id="opcionesdismenorrea">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="dismenorrea" id="dismenorrea1" value="1">
                                                <label class="form-check-label" for="dismenorrea1">
                                                    Si
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="dismenorrea" id="dismenorrea2" value="0">
                                                <label class="form-check-label" for="dismenorrea2">
                                                    No
                                                </label>
                                            </div>
                                        </div>


                                        <div class="col-sm-12 pt-3">
                                            <h6 class="blue">¿Has tenido algún tipo de flujo patológico anormal o secreción pereana? (*)</h6>
                                        </div>

                                        <div class="col-lg-6" id="opcionessecresion_peneana">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="secresion_peneana" id="secresion_peneana1" value="1">
                                                <label class="form-check-label" for="secresion_peneana1">
                                                    Si
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="secresion_peneana" id="secresion_peneana2" value="0">
                                                <label class="form-check-label" for="secresion_peneana2">
                                                    No
                                                </label>
                                            </div>
                                        </div>


                                        <div class="col-sm-12 pt-3">
                                            <h6 class="blue">¿Has tenido una enfermedad de transmisión sexual? (*)</h6>
                                        </div>

                                        <div class="col-lg-6" id="opcionesenfermedad_transmision">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="enfermedad_transmision" id="enfermedad_transmision1" value="1">
                                                <label class="form-check-label" for="enfermedad_transmision1">
                                                    Si
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 pb-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="enfermedad_transmision" id="enfermedad_transmision2" value="0">
                                                <label class="form-check-label" for="enfermedad_transmision2">
                                                    No
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-sm-12" id="informaciondeembarazo">
                                            <h6 class="blue">Número de Embarazos</h6>
                                        </div>

                                        <div class="col-xs-12 col-sm-5 pb-4">
                                            <input type="number" class="form-control" name="numero_embarazos" id="numero_embarazos" min="0" max="10" minlength="1" maxlength="2">
                                        </div>

                                        <div class="col-sm-12" id="informacion_primer_parto">
                                            <h6 class="blue">Edad del primer Embarazo</h6>
                                        </div>

                                        <div class="col-xs-12 col-sm-5 pb-4">
                                            <input type="number" class="form-control" name="edad_primer_embarazo" id="edad_primer_embarazo" min="0" max="45" minlength="1" maxlength="2">
                                        </div>

                                        <div class="col-sm-12" id="informacion_numero_partos">
                                            <h6 class="blue">Número de Partos</h6>
                                        </div>

                                        <div class="col-xs-12 col-sm-5">
                                            <input type="number" class="form-control" name="numero_partos" id="numero_partos" min="0" max="10" minlength="1" maxlength="2">
                                        </div>


                                    </div>

                                <?php } ?>

                                <!--Seccion II.X-->
                                <div class="row pt-3">
                                    <h3 class="blue"><b>II.X</b> Antecedentes Morbidos familiares.<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Marca con una (X) respecto de enfermedades de tus familiares.</h3>
                                    <hr class="col-lg-12 bg-azul">
                                </div>

                                <!-- <div class="row pt-2"></div> -->

                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr class="encabezadotabla">
                                                <th rowspan="2" style="vertical-align:middle;">ENFERMEDAD</th>
                                                <th nowrap="" colspan="3" style="border-bottom:none;text-align:center;">PADRE</th>
                                                <th nowrap="" colspan="3" style="border-bottom:none;text-align:center;">MADRE</th>
                                                <th nowrap="" colspan="3" style="border-bottom:none;text-align:center;">HERMANO (AS)</th>
                                                <th nowrap="" colspan="3" style="border-bottom:none;text-align:center;">ABUELO (AS)</th>
                                                <th nowrap="" colspan="3" style="border-bottom:none;text-align:center;">TIO (AS)</th>
                                            </tr>
                                            <tr class="encabezadotabla">
                                                <th nowrap="" style="border-top:none;text-align:center;">SI</th>
                                                <th nowrap="" style="border-top:none;text-align:center;">NO</th>
                                                <th nowrap="" style="border-top:none;text-align:center;">NO SABE</th>
                                                <th nowrap="" style="border-top:none;text-align:center;">SI</th>
                                                <th nowrap="" style="border-top:none;text-align:center;">NO</th>
                                                <th nowrap="" style="border-top:none;text-align:center;">NO SABE</th>
                                                <th nowrap="" style="border-top:none;text-align:center;">SI</th>
                                                <th nowrap="" style="border-top:none;text-align:center;">NO</th>
                                                <th nowrap="" style="border-top:none;text-align:center;">NO SABE</th>
                                                <th nowrap="" style="border-top:none;text-align:center;">SI</th>
                                                <th nowrap="" style="border-top:none;text-align:center;">NO</th>
                                                <th nowrap="" style="border-top:none;text-align:center;">NO SABE</th>
                                                <th nowrap="" style="border-top:none;text-align:center;">SI</th>
                                                <th nowrap="" style="border-top:none;text-align:center;">NO</th>
                                                <th nowrap="" style="border-top:none;text-align:center;">NO SABE</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr id="filadiabetes">
                                                <td>Diabetes</td>
                                                <td nowrap="" style="text-align:center;">
                                                    <div class="form-check pr-3">
                                                        <input class="form-check-input" type="radio" name="m_diabetes_padre" value="1">
                                                    </div>
                                                </td>
                                                <td nowrap="" style="text-align:center;">
                                                    <div class="form-check pr-3">
                                                        <input class="form-check-input" type="radio" name="m_diabetes_padre" value="0">
                                                    </div>
                                                </td>
                                                <td nowrap="" style="text-align:center;">
                                                    <div class="form-check pr-3">
                                                        <input class="form-check-input" type="radio" name="m_diabetes_padre" value="2">
                                                    </div>
                                                </td>
                                                <td nowrap="" style="text-align:center;">
                                                    <div class="form-check pr-3">
                                                        <input class="form-check-input" type="radio" name="m_diabetes_madre" value="1">
                                                    </div>
                                                </td>
                                                <td nowrap="" style="text-align:center;">
                                                    <div class="form-check pr-3">
                                                        <input class="form-check-input" type="radio" name="m_diabetes_madre" value="0">
                                                    </div>
                                                </td>
                                                <td nowrap="" style="text-align:center;">
                                                    <div class="form-check pr-3">
                                                        <input class="form-check-input" type="radio" name="m_diabetes_madre" value="2">
                                                    </div>
                                                </td>
                                                <td nowrap="" style="text-align:center;">
                                                    <div class="form-check pr-3">
                                                        <input class="form-check-input" type="radio" name="m_diabetes_hermano" value="1">
                                                    </div>
                                                </td>
                                                <td nowrap="" style="text-align:center;">
                                                    <div class="form-check pr-3">
                                                        <input class="form-check-input" type="radio" name="m_diabetes_hermano" value="0">
                                                    </div>
                                                </td>
                                                <td nowrap="" style="text-align:center;">
                                                    <div class="form-check pr-3">
                                                        <input class="form-check-input" type="radio" name="m_diabetes_hermano" value="2">
                                                    </div>
                                                </td>
                                                <td nowrap="" style="text-align:center;">
                                                    <div class="form-check pr-3">
                                                        <input class="form-check-input" type="radio" name="m_diabetes_abuelo" value="1">
                                                    </div>
                                                </td>
                                                <td nowrap="" style="text-align:center;">
                                                    <div class="form-check pr-3">
                                                        <input class="form-check-input" type="radio" name="m_diabetes_abuelo" value="0">
                                                    </div>
                                                </td>
                                                <td nowrap="" style="text-align:center;">
                                                    <div class="form-check pr-3">
                                                        <input class="form-check-input" type="radio" name="m_diabetes_abuelo" value="2">
                                                    </div>
                                                </td>
                                                <td nowrap="" style="text-align:center;">
                                                    <div class="form-check pr-3">
                                                        <input class="form-check-input" type="radio" name="m_diabetes_tio" value="1">
                                                    </div>
                                                </td>
                                                <td nowrap="" style="text-align:center;">
                                                    <div class="form-check pr-3">
                                                        <input class="form-check-input" type="radio" name="m_diabetes_tio" value="0">
                                                    </div>
                                                </td>
                                                <td nowrap="" style="text-align:center;">
                                                    <div class="form-check pr-3">
                                                        <input class="form-check-input" type="radio" name="m_diabetes_tio" value="2">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr id="filahipertension_arterial">
                                                <td>Hipertensión Arterial</td>
                                                <td nowrap="" style="text-align:center;">
                                                    <div class="form-check pr-3">
                                                        <input class="form-check-input" type="radio" name="m_ha_padre" value="1">
                                                    </div>
                                                </td>
                                                <td nowrap="" style="text-align:center;">
                                                    <div class="form-check pr-3">
                                                        <input class="form-check-input" type="radio" name="m_ha_padre" value="0">
                                                    </div>
                                                </td>
                                                <td nowrap="" style="text-align:center;">
                                                    <div class="form-check pr-3">
                                                        <input class="form-check-input" type="radio" name="m_ha_padre" value="2">
                                                    </div>
                                                </td>
                                                <td nowrap="" style="text-align:center;">
                                                    <div class="form-check pr-3">
                                                        <input class="form-check-input" type="radio" name="m_ha_madre" value="1">
                                                    </div>
                                                </td>
                                                <td nowrap="" style="text-align:center;">
                                                    <div class="form-check pr-3">
                                                        <input class="form-check-input" type="radio" name="m_ha_madre" value="0">
                                                    </div>
                                                </td>
                                                <td nowrap="" style="text-align:center;">
                                                    <div class="form-check pr-3">
                                                        <input class="form-check-input" type="radio" name="m_ha_madre" value="2">
                                                    </div>
                                                </td>
                                                <td nowrap="" style="text-align:center;">
                                                    <div class="form-check pr-3">
                                                        <input class="form-check-input" type="radio" name="m_ha_hermano" value="1">
                                                    </div>
                                                </td>
                                                <td nowrap="" style="text-align:center;">
                                                    <div class="form-check pr-3">
                                                        <input class="form-check-input" type="radio" name="m_ha_hermano" value="0">
                                                    </div>
                                                </td>
                                                <td nowrap="" style="text-align:center;">
                                                    <div class="form-check pr-3">
                                                        <input class="form-check-input" type="radio" name="m_ha_hermano" value="2">
                                                    </div>
                                                </td>
                                                <td nowrap="" style="text-align:center;">
                                                    <div class="form-check pr-3">
                                                        <input class="form-check-input" type="radio" name="m_ha_abuelo" value="1">
                                                    </div>
                                                </td>
                                                <td nowrap="" style="text-align:center;">
                                                    <div class="form-check pr-3">
                                                        <input class="form-check-input" type="radio" name="m_ha_abuelo" value="0">
                                                    </div>
                                                </td>
                                                <td nowrap="" style="text-align:center;">
                                                    <div class="form-check pr-3">
                                                        <input class="form-check-input" type="radio" name="m_ha_abuelo" value="2">
                                                    </div>
                                                </td>
                                                <td nowrap="" style="text-align:center;">
                                                    <div class="form-check pr-3">
                                                        <input class="form-check-input" type="radio" name="m_ha_tio" value="1">
                                                    </div>
                                                </td>
                                                <td nowrap="" style="text-align:center;">
                                                    <div class="form-check pr-3">
                                                        <input class="form-check-input" type="radio" name="m_ha_tio" value="0">
                                                    </div>
                                                </td>
                                                <td nowrap="" style="text-align:center;">
                                                    <div class="form-check pr-3">
                                                        <input class="form-check-input" type="radio" name="m_ha_tio" value="2">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr id="filacancer">
                                                <td>Cáncer</td>
                                                <td nowrap="" style="text-align:center;">
                                                    <div class="form-check pr-3">
                                                        <input class="form-check-input" type="radio" name="m_cancer_padre" value="1">
                                                    </div>
                                                </td>
                                                <td nowrap="" style="text-align:center;">
                                                    <div class="form-check pr-3">
                                                        <input class="form-check-input" type="radio" name="m_cancer_padre" value="0">
                                                    </div>
                                                </td>
                                                <td nowrap="" style="text-align:center;">
                                                    <div class="form-check pr-3">
                                                        <input class="form-check-input" type="radio" name="m_cancer_padre" value="2">
                                                    </div>
                                                </td>
                                                <td nowrap="" style="text-align:center;">
                                                    <div class="form-check pr-3">
                                                        <input class="form-check-input" type="radio" name="m_cancer_madre" value="1">
                                                    </div>
                                                </td>
                                                <td nowrap="" style="text-align:center;">
                                                    <div class="form-check pr-3">
                                                        <input class="form-check-input" type="radio" name="m_cancer_madre" value="0">
                                                    </div>
                                                </td>
                                                <td nowrap="" style="text-align:center;">
                                                    <div class="form-check pr-3">
                                                        <input class="form-check-input" type="radio" name="m_cancer_madre" value="2">
                                                    </div>
                                                </td>
                                                <td nowrap="" style="text-align:center;">
                                                    <div class="form-check pr-3">
                                                        <input class="form-check-input" type="radio" name="m_cancer_hermano" value="1">
                                                    </div>
                                                </td>
                                                <td nowrap="" style="text-align:center;">
                                                    <div class="form-check pr-3">
                                                        <input class="form-check-input" type="radio" name="m_cancer_hermano" value="0">
                                                    </div>
                                                </td>
                                                <td nowrap="" style="text-align:center;">
                                                    <div class="form-check pr-3">
                                                        <input class="form-check-input" type="radio" name="m_cancer_hermano" value="2">
                                                    </div>
                                                </td>
                                                <td nowrap="" style="text-align:center;">
                                                    <div class="form-check pr-3">
                                                        <input class="form-check-input" type="radio" name="m_cancer_abuelo" value="1">
                                                    </div>
                                                </td>
                                                <td nowrap="" style="text-align:center;">
                                                    <div class="form-check pr-3">
                                                        <input class="form-check-input" type="radio" name="m_cancer_abuelo" value="0">
                                                    </div>
                                                </td>
                                                <td nowrap="" style="text-align:center;">
                                                    <div class="form-check pr-3">
                                                        <input class="form-check-input" type="radio" name="m_cancer_abuelo" value="2">
                                                    </div>
                                                </td>
                                                <td nowrap="" style="text-align:center;">
                                                    <div class="form-check pr-3">
                                                        <input class="form-check-input" type="radio" name="m_cancer_tio" value="1">
                                                    </div>
                                                </td>
                                                <td nowrap="" style="text-align:center;">
                                                    <div class="form-check pr-3">
                                                        <input class="form-check-input" type="radio" name="m_cancer_tio" value="0">
                                                    </div>
                                                </td>
                                                <td nowrap="" style="text-align:center;">
                                                    <div class="form-check pr-3">
                                                        <input class="form-check-input" type="radio" name="m_cancer_tio" value="2">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr id="filacardiopatias">
                                                <td>Cardiopatías</td>
                                                <td nowrap="" style="text-align:center;">
                                                    <div class="form-check pr-3">
                                                        <input class="form-check-input" type="radio" name="m_cardiopatias_padre" value="1">
                                                    </div>
                                                </td>
                                                <td nowrap="" style="text-align:center;">
                                                    <div class="form-check pr-3">
                                                        <input class="form-check-input" type="radio" name="m_cardiopatias_padre" value="0">
                                                    </div>
                                                </td>
                                                <td nowrap="" style="text-align:center;">
                                                    <div class="form-check pr-3">
                                                        <input class="form-check-input" type="radio" name="m_cardiopatias_padre" value="2">
                                                    </div>
                                                </td>
                                                <td nowrap="" style="text-align:center;">
                                                    <div class="form-check pr-3">
                                                        <input class="form-check-input" type="radio" name="m_cardiopatias_madre" value="1">
                                                    </div>
                                                </td>
                                                <td nowrap="" style="text-align:center;">
                                                    <div class="form-check pr-3">
                                                        <input class="form-check-input" type="radio" name="m_cardiopatias_madre" value="0">
                                                    </div>
                                                </td>
                                                <td nowrap="" style="text-align:center;">
                                                    <div class="form-check pr-3">
                                                        <input class="form-check-input" type="radio" name="m_cardiopatias_madre" value="2">
                                                    </div>
                                                </td>
                                                <td nowrap="" style="text-align:center;">
                                                    <div class="form-check pr-3">
                                                        <input class="form-check-input" type="radio" name="m_cardiopatias_hermano" value="1">
                                                    </div>
                                                </td>
                                                <td nowrap="" style="text-align:center;">
                                                    <div class="form-check pr-3">
                                                        <input class="form-check-input" type="radio" name="m_cardiopatias_hermano" value="0">
                                                    </div>
                                                </td>
                                                <td nowrap="" style="text-align:center;">
                                                    <div class="form-check pr-3">
                                                        <input class="form-check-input" type="radio" name="m_cardiopatias_hermano" value="2">
                                                    </div>
                                                </td>
                                                <td nowrap="" style="text-align:center;">
                                                    <div class="form-check pr-3">
                                                        <input class="form-check-input" type="radio" name="m_cardiopatias_abuelo" value="1">
                                                    </div>
                                                </td>
                                                <td nowrap="" style="text-align:center;">
                                                    <div class="form-check pr-3">
                                                        <input class="form-check-input" type="radio" name="m_cardiopatias_abuelo" value="0">
                                                    </div>
                                                </td>
                                                <td nowrap="" style="text-align:center;">
                                                    <div class="form-check pr-3">
                                                        <input class="form-check-input" type="radio" name="m_cardiopatias_abuelo" value="2">
                                                    </div>
                                                </td>
                                                <td nowrap="" style="text-align:center;">
                                                    <div class="form-check pr-3">
                                                        <input class="form-check-input" type="radio" name="m_cardiopatias_tio" value="1">
                                                    </div>
                                                </td>
                                                <td nowrap="" style="text-align:center;">
                                                    <div class="form-check pr-3">
                                                        <input class="form-check-input" type="radio" name="m_cardiopatias_tio" value="0">
                                                    </div>
                                                </td>
                                                <td nowrap="" style="text-align:center;">
                                                    <div class="form-check pr-3">
                                                        <input class="form-check-input" type="radio" name="m_cardiopatias_tio" value="2">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr id="filaalcoholismo">
                                                <td>Alcoholismo</td>
                                                <td nowrap="" style="text-align:center;">
                                                    <div class="form-check pr-3">
                                                        <input class="form-check-input" type="radio" name="m_alcoholismo_padre" value="1">
                                                    </div>
                                                </td>
                                                <td nowrap="" style="text-align:center;">
                                                    <div class="form-check pr-3">
                                                        <input class="form-check-input" type="radio" name="m_alcoholismo_padre" value="0">
                                                    </div>
                                                </td>
                                                <td nowrap="" style="text-align:center;">
                                                    <div class="form-check pr-3">
                                                        <input class="form-check-input" type="radio" name="m_alcoholismo_padre" value="2">
                                                    </div>
                                                </td>
                                                <td nowrap="" style="text-align:center;">
                                                    <div class="form-check pr-3">
                                                        <input class="form-check-input" type="radio" name="m_alcoholismo_madre" value="1">
                                                    </div>
                                                </td>
                                                <td nowrap="" style="text-align:center;">
                                                    <div class="form-check pr-3">
                                                        <input class="form-check-input" type="radio" name="m_alcoholismo_madre" value="0">
                                                    </div>
                                                </td>
                                                <td nowrap="" style="text-align:center;">
                                                    <div class="form-check pr-3">
                                                        <input class="form-check-input" type="radio" name="m_alcoholismo_madre" value="2">
                                                    </div>
                                                </td>
                                                <td nowrap="" style="text-align:center;">
                                                    <div class="form-check pr-3">
                                                        <input class="form-check-input" type="radio" name="m_alcoholismo_hermano" value="1">
                                                    </div>
                                                </td>
                                                <td nowrap="" style="text-align:center;">
                                                    <div class="form-check pr-3">
                                                        <input class="form-check-input" type="radio" name="m_alcoholismo_hermano" value="0">
                                                    </div>
                                                </td>
                                                <td nowrap="" style="text-align:center;">
                                                    <div class="form-check pr-3">
                                                        <input class="form-check-input" type="radio" name="m_alcoholismo_hermano" value="2">
                                                    </div>
                                                </td>
                                                <td nowrap="" style="text-align:center;">
                                                    <div class="form-check pr-3">
                                                        <input class="form-check-input" type="radio" name="m_alcoholismo_abuelo" value="1">
                                                    </div>
                                                </td>
                                                <td nowrap="" style="text-align:center;">
                                                    <div class="form-check pr-3">
                                                        <input class="form-check-input" type="radio" name="m_alcoholismo_abuelo" value="0">
                                                    </div>
                                                </td>
                                                <td nowrap="" style="text-align:center;">
                                                    <div class="form-check pr-3">
                                                        <input class="form-check-input" type="radio" name="m_alcoholismo_abuelo" value="2">
                                                    </div>
                                                </td>
                                                <td nowrap="" style="text-align:center;">
                                                    <div class="form-check pr-3">
                                                        <input class="form-check-input" type="radio" name="m_alcoholismo_tio" value="1">
                                                    </div>
                                                </td>
                                                <td nowrap="" style="text-align:center;">
                                                    <div class="form-check pr-3">
                                                        <input class="form-check-input" type="radio" name="m_alcoholismo_tio" value="0">
                                                    </div>
                                                </td>
                                                <td nowrap="" style="text-align:center;">
                                                    <div class="form-check pr-3">
                                                        <input class="form-check-input" type="radio" name="m_alcoholismo_tio" value="2">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr id="filadrogadiccion">
                                                <td>Drogadicción</td>
                                                <td nowrap="" style="text-align:center;">
                                                    <div class="form-check pr-3">
                                                        <input class="form-check-input" type="radio" name="m_drogadiccion_padre" value="1">
                                                    </div>
                                                </td>
                                                <td nowrap="" style="text-align:center;">
                                                    <div class="form-check pr-3">
                                                        <input class="form-check-input" type="radio" name="m_drogadiccion_padre" value="0">
                                                    </div>
                                                </td>
                                                <td nowrap="" style="text-align:center;">
                                                    <div class="form-check pr-3">
                                                        <input class="form-check-input" type="radio" name="m_drogadiccion_padre" value="2">
                                                    </div>
                                                </td>
                                                <td nowrap="" style="text-align:center;">
                                                    <div class="form-check pr-3">
                                                        <input class="form-check-input" type="radio" name="m_drogadiccion_madre" value="1">
                                                    </div>
                                                </td>
                                                <td nowrap="" style="text-align:center;">
                                                    <div class="form-check pr-3">
                                                        <input class="form-check-input" type="radio" name="m_drogadiccion_madre" value="0">
                                                    </div>
                                                </td>
                                                <td nowrap="" style="text-align:center;">
                                                    <div class="form-check pr-3">
                                                        <input class="form-check-input" type="radio" name="m_drogadiccion_madre" value="2">
                                                    </div>
                                                </td>
                                                <td nowrap="" style="text-align:center;">
                                                    <div class="form-check pr-3">
                                                        <input class="form-check-input" type="radio" name="m_drogadiccion_hermano" value="1">
                                                    </div>
                                                </td>
                                                <td nowrap="" style="text-align:center;">
                                                    <div class="form-check pr-3">
                                                        <input class="form-check-input" type="radio" name="m_drogadiccion_hermano" value="0">
                                                    </div>
                                                </td>
                                                <td nowrap="" style="text-align:center;">
                                                    <div class="form-check pr-3">
                                                        <input class="form-check-input" type="radio" name="m_drogadiccion_hermano" value="2">
                                                    </div>
                                                </td>
                                                <td nowrap="" style="text-align:center;">
                                                    <div class="form-check pr-3">
                                                        <input class="form-check-input" type="radio" name="m_drogadiccion_abuelo" value="1">
                                                    </div>
                                                </td>
                                                <td nowrap="" style="text-align:center;">
                                                    <div class="form-check pr-3">
                                                        <input class="form-check-input" type="radio" name="m_drogadiccion_abuelo" value="0">
                                                    </div>
                                                </td>
                                                <td nowrap="" style="text-align:center;">
                                                    <div class="form-check pr-3">
                                                        <input class="form-check-input" type="radio" name="m_drogadiccion_abuelo" value="2">
                                                    </div>
                                                </td>
                                                <td nowrap="" style="text-align:center;">
                                                    <div class="form-check pr-3">
                                                        <input class="form-check-input" type="radio" name="m_drogadiccion_tio" value="1">
                                                    </div>
                                                </td>
                                                <td nowrap="" style="text-align:center;">
                                                    <div class="form-check pr-3">
                                                        <input class="form-check-input" type="radio" name="m_drogadiccion_tio" value="0">
                                                    </div>
                                                </td>
                                                <td nowrap="" style="text-align:center;">
                                                    <div class="form-check pr-3">
                                                        <input class="form-check-input" type="radio" name="m_drogadiccion_tio" value="2">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr id="filadepresion">
                                                <td>Depresión</td>
                                                <td nowrap="" style="text-align:center;">
                                                    <div class="form-check pr-3">
                                                        <input class="form-check-input" type="radio" name="m_depresion_padre" value="1">
                                                    </div>
                                                </td>
                                                <td nowrap="" style="text-align:center;">
                                                    <div class="form-check pr-3">
                                                        <input class="form-check-input" type="radio" name="m_depresion_padre" value="0">
                                                    </div>
                                                </td>
                                                <td nowrap="" style="text-align:center;">
                                                    <div class="form-check pr-3">
                                                        <input class="form-check-input" type="radio" name="m_depresion_padre" value="2">
                                                    </div>
                                                </td>
                                                <td nowrap="" style="text-align:center;">
                                                    <div class="form-check pr-3">
                                                        <input class="form-check-input" type="radio" name="m_depresion_madre" value="1">
                                                    </div>
                                                </td>
                                                <td nowrap="" style="text-align:center;">
                                                    <div class="form-check pr-3">
                                                        <input class="form-check-input" type="radio" name="m_depresion_madre" value="0">
                                                    </div>
                                                </td>
                                                <td nowrap="" style="text-align:center;">
                                                    <div class="form-check pr-3">
                                                        <input class="form-check-input" type="radio" name="m_depresion_madre" value="2">
                                                    </div>
                                                </td>
                                                <td nowrap="" style="text-align:center;">
                                                    <div class="form-check pr-3">
                                                        <input class="form-check-input" type="radio" name="m_depresion_hermano" value="1">
                                                    </div>
                                                </td>
                                                <td nowrap="" style="text-align:center;">
                                                    <div class="form-check pr-3">
                                                        <input class="form-check-input" type="radio" name="m_depresion_hermano" value="0">
                                                    </div>
                                                </td>
                                                <td nowrap="" style="text-align:center;">
                                                    <div class="form-check pr-3">
                                                        <input class="form-check-input" type="radio" name="m_depresion_hermano" value="2">
                                                    </div>
                                                </td>
                                                <td nowrap="" style="text-align:center;">
                                                    <div class="form-check pr-3">
                                                        <input class="form-check-input" type="radio" name="m_depresion_abuelo" value="1">
                                                    </div>
                                                </td>
                                                <td nowrap="" style="text-align:center;">
                                                    <div class="form-check pr-3">
                                                        <input class="form-check-input" type="radio" name="m_depresion_abuelo" value="0">
                                                    </div>
                                                </td>
                                                <td nowrap="" style="text-align:center;">
                                                    <div class="form-check pr-3">
                                                        <input class="form-check-input" type="radio" name="m_depresion_abuelo" value="2">
                                                    </div>
                                                </td>
                                                <td nowrap="" style="text-align:center;">
                                                    <div class="form-check pr-3">
                                                        <input class="form-check-input" type="radio" name="m_depresion_tio" value="1">
                                                    </div>
                                                </td>
                                                <td nowrap="" style="text-align:center;">
                                                    <div class="form-check pr-3">
                                                        <input class="form-check-input" type="radio" name="m_depresion_tio" value="0">
                                                    </div>
                                                </td>
                                                <td nowrap="" style="text-align:center;">
                                                    <div class="form-check pr-3">
                                                        <input class="form-check-input" type="radio" name="m_depresion_tio" value="2">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr id="filatrastornos_mentales">
                                                <td>Otros trastornos mentales</td>
                                                <td nowrap="" style="text-align:center;">
                                                    <div class="form-check pr-3">
                                                        <input class="form-check-input" type="radio" name="m_tm_padre" value="1">
                                                    </div>
                                                </td>
                                                <td nowrap="" style="text-align:center;">
                                                    <div class="form-check pr-3">
                                                        <input class="form-check-input" type="radio" name="m_tm_padre" value="0">
                                                    </div>
                                                </td>
                                                <td nowrap="" style="text-align:center;">
                                                    <div class="form-check pr-3">
                                                        <input class="form-check-input" type="radio" name="m_tm_padre" value="2">
                                                    </div>
                                                </td>
                                                <td nowrap="" style="text-align:center;">
                                                    <div class="form-check pr-3">
                                                        <input class="form-check-input" type="radio" name="m_tm_madre" value="1">
                                                    </div>
                                                </td>
                                                <td nowrap="" style="text-align:center;">
                                                    <div class="form-check pr-3">
                                                        <input class="form-check-input" type="radio" name="m_tm_madre" value="0">
                                                    </div>
                                                </td>
                                                <td nowrap="" style="text-align:center;">
                                                    <div class="form-check pr-3">
                                                        <input class="form-check-input" type="radio" name="m_tm_madre" value="2">
                                                    </div>
                                                </td>
                                                <td nowrap="" style="text-align:center;">
                                                    <div class="form-check pr-3">
                                                        <input class="form-check-input" type="radio" name="m_tm_hermano" value="1">
                                                    </div>
                                                </td>
                                                <td nowrap="" style="text-align:center;">
                                                    <div class="form-check pr-3">
                                                        <input class="form-check-input" type="radio" name="m_tm_hermano" value="0">
                                                    </div>
                                                </td>
                                                <td nowrap="" style="text-align:center;">
                                                    <div class="form-check pr-3">
                                                        <input class="form-check-input" type="radio" name="m_tm_hermano" value="2">
                                                    </div>
                                                </td>
                                                <td nowrap="" style="text-align:center;">
                                                    <div class="form-check pr-3">
                                                        <input class="form-check-input" type="radio" name="m_tm_abuelo" value="1">
                                                    </div>
                                                </td>
                                                <td nowrap="" style="text-align:center;">
                                                    <div class="form-check pr-3">
                                                        <input class="form-check-input" type="radio" name="m_tm_abuelo" value="0">
                                                    </div>
                                                </td>
                                                <td nowrap="" style="text-align:center;">
                                                    <div class="form-check pr-3">
                                                        <input class="form-check-input" type="radio" name="m_tm_abuelo" value="2">
                                                    </div>
                                                </td>
                                                <td nowrap="" style="text-align:center;">
                                                    <div class="form-check pr-3">
                                                        <input class="form-check-input" type="radio" name="m_tm_tio" value="1">
                                                    </div>
                                                </td>
                                                <td nowrap="" style="text-align:center;">
                                                    <div class="form-check pr-3">
                                                        <input class="form-check-input" type="radio" name="m_tm_tio" value="0">
                                                    </div>
                                                </td>
                                                <td nowrap="" style="text-align:center;">
                                                    <div class="form-check pr-3">
                                                        <input class="form-check-input" type="radio" name="m_tm_tio" value="2">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr id="filaobesidad">
                                                <td>Obesidad</td>
                                                <td nowrap="" style="text-align:center;">
                                                    <div class="form-check pr-3">
                                                        <input class="form-check-input" type="radio" name="m_obesidad_padre" value="1">
                                                    </div>
                                                </td>
                                                <td nowrap="" style="text-align:center;">
                                                    <div class="form-check pr-3">
                                                        <input class="form-check-input" type="radio" name="m_obesidad_padre" value="0">
                                                    </div>
                                                </td>
                                                <td nowrap="" style="text-align:center;">
                                                    <div class="form-check pr-3">
                                                        <input class="form-check-input" type="radio" name="m_obesidad_padre" value="2">
                                                    </div>
                                                </td>
                                                <td nowrap="" style="text-align:center;">
                                                    <div class="form-check pr-3">
                                                        <input class="form-check-input" type="radio" name="m_obesidad_madre" value="1">
                                                    </div>
                                                </td>
                                                <td nowrap="" style="text-align:center;">
                                                    <div class="form-check pr-3">
                                                        <input class="form-check-input" type="radio" name="m_obesidad_madre" value="0">
                                                    </div>
                                                </td>
                                                <td nowrap="" style="text-align:center;">
                                                    <div class="form-check pr-3">
                                                        <input class="form-check-input" type="radio" name="m_obesidad_madre" value="2">
                                                    </div>
                                                </td>
                                                <td nowrap="" style="text-align:center;">
                                                    <div class="form-check pr-3">
                                                        <input class="form-check-input" type="radio" name="m_obesidad_hermano" value="1">
                                                    </div>
                                                </td>
                                                <td nowrap="" style="text-align:center;">
                                                    <div class="form-check pr-3">
                                                        <input class="form-check-input" type="radio" name="m_obesidad_hermano" value="0">
                                                    </div>
                                                </td>
                                                <td nowrap="" style="text-align:center;">
                                                    <div class="form-check pr-3">
                                                        <input class="form-check-input" type="radio" name="m_obesidad_hermano" value="2">
                                                    </div>
                                                </td>
                                                <td nowrap="" style="text-align:center;">
                                                    <div class="form-check pr-3">
                                                        <input class="form-check-input" type="radio" name="m_obesidad_abuelo" value="1">
                                                    </div>
                                                </td>
                                                <td nowrap="" style="text-align:center;">
                                                    <div class="form-check pr-3">
                                                        <input class="form-check-input" type="radio" name="m_obesidad_abuelo" value="0">
                                                    </div>
                                                </td>
                                                <td nowrap="" style="text-align:center;">
                                                    <div class="form-check pr-3">
                                                        <input class="form-check-input" type="radio" name="m_obesidad_abuelo" value="2">
                                                    </div>
                                                </td>
                                                <td nowrap="" style="text-align:center;">
                                                    <div class="form-check pr-3">
                                                        <input class="form-check-input" type="radio" name="m_obesidad_tio" value="1">
                                                    </div>
                                                </td>
                                                <td nowrap="" style="text-align:center;">
                                                    <div class="form-check pr-3">
                                                        <input class="form-check-input" type="radio" name="m_obesidad_tio" value="0">
                                                    </div>
                                                </td>
                                                <td nowrap="" style="text-align:center;">
                                                    <div class="form-check pr-3">
                                                        <input class="form-check-input" type="radio" name="m_obesidad_tio" value="2">
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>


                                <!-- Seccion III -->
                                <div class="row pt-3">
                                    <h3 class="blue"><b>III.</b> Antecedentes Familiares</h3>
                                    <hr class="col-lg-12 bg-azul">

                                    <h3 class="blue">&nbsp;<b>III.I</b> Señala lo siguiente respecto de tu familia de origen.<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;¿Están tus padres separados? (*)</h3>
                                    <hr class="col-lg-12 bg-azul">

                                </div>

                                <div class="row pt-2">

                                    <div class="col-lg-6 pb-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="padres_separados" id="padres_separados1" value="1">
                                            <label class="form-check-label" for="padres_separados1">
                                                Si
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 pb-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="padres_separados" id="padres_separados2" value="0">
                                            <label class="form-check-label" for="padres_separados2">
                                                No
                                            </label>
                                        </div>
                                    </div>


                                    <div class="col-lg-3">
                                        <button name="insertarfamiliar" id="insertarfamiliar" class="btn btn-lg btn-white btn-outline-azul" value="Insertar Familiar" type="button" disabled>
                                            <i class="blue fa fa-plus" style="padding-top: 2px;"></i> Insertar Familiar
                                        </button>
                                    </div>

                                    <div class="col-sm-12 pt-3">
                                        <div class="table-responsive">
                                            <table class="table table-bordered" id="tablafamiliares">
                                                <thead>
                                                    <tr class="encabezadotabla">
                                                        <th>Parentesco</th>
                                                        <th>Nombre</th>
                                                        <th>Vive (v) Fallec. (f)</th>
                                                        <th>Edad</th>
                                                        <th>Escolaridad</th>
                                                        <th>Actividad</th>
                                                        <th>Eliminar</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                            </table>
                                        </div> <!-- box-body -->
                                    </div> <!-- col-sm-12 [contenedor tabla]-->

                                </div>


                                <!--Seccion III.II-->
                                <div class="row pt-3">
                                    <h3 class="blue"><b>III.II</b> Otras personas que viven en tu hogar de origen.</h3>
                                    <hr class="col-lg-12 bg-azul">
                                </div>

                                <div class="row pt-2">

                                    <div class="col-lg-4">
                                        <button name="insertar_otras" id="insertar_otras" class="btn btn-lg btn-white btn-outline-azul" value="Insertar Otro(a) Familiar" type="button">
                                            <i class="blue fa fa-plus" style="padding-top: 2px;"></i> Insertar Otro(a) Familiar
                                        </button>
                                    </div>

                                    <div class="col-sm-12 pt-3">
                                        <div class="table-responsive">
                                            <table class="table table-bordered" id="tablaotrofamiliares">
                                                <thead>
                                                    <tr class="encabezadotabla">
                                                        <th>Relación de parentesco</th>
                                                        <th>Nombre</th>
                                                        <th>Edad</th>
                                                        <th>Escolaridad</th>
                                                        <th>Actividad</th>
                                                        <th>Eliminar</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                            </table>
                                        </div> <!-- box-body -->
                                    </div> <!-- col-sm-12 [contenedor tabla]-->

                                </div>

                                <!--Seccion III.III-->
                                <div class="row pt-3">
                                    <h3 class="blue"><b>III.III</b> En tu hogar de origen, disponen de (*).</h3>
                                    <hr class="col-lg-12 bg-azul">
                                </div>

                                <div class="row pt-2" id="DivInsumosBasicos">

                                    <div class="col-xs-12 col-sm-4 col-lg-4">
                                        <label>
                                            <input type="checkbox" class="ace ace-switch ace-switch-6" name="agua_potable" value="0" onclick="$(this).val(this.checked ? 1 : 0)">
                                            <span class="lbl">&nbsp;&nbsp;Agua potable</span>
                                        </label>
                                    </div>
                                    <div class="col-xs-12 col-sm-4 col-lg-4">
                                        <label>
                                            <input type="checkbox" class="ace ace-switch ace-switch-6" name="alcantarillado" value="0" onclick="$(this).val(this.checked ? 1 : 0)">
                                            <span class="lbl">&nbsp;&nbsp;Alcantarillado</span>
                                        </label>
                                    </div>
                                    <div class="col-xs-12 col-sm-4 col-lg-4">
                                        <label>
                                            <input type="checkbox" class="ace ace-switch ace-switch-6" name="luz_electrica" value="0" onclick="$(this).val(this.checked ? 1 : 0)">
                                            <span class="lbl">&nbsp;&nbsp;Luz eléctrica</span>
                                        </label>
                                    </div>

                                    <div class="limpiar"></div>

                                    <div class="col-xs-12 col-sm-4 col-lg-4">
                                        <label>
                                            <input type="checkbox" class="ace ace-switch ace-switch-6" name="calefaccion" value="0" onclick="$(this).val(this.checked ? 1 : 0)">
                                            <span class="lbl">&nbsp;&nbsp;Tipo de Calefacción</span>
                                        </label>
                                    </div>

                                </div>

                            </form>
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
        $("#firmadigital").attr('class', 'nav-item active');
    </script>

    <script src="../js/validaciongeneral.js"></script>
    <script src="../js/funcionswal.js"></script>
    <script src="../../assets/popper/popper.min.js"></script>
    <script src="../../jsdashboard/sb-admin-2.min.js"></script>


    <script>
        /*========TABLA DINAMICA EN https://www.tutorialrepublic.com/faq/how-to-add-remove-table-rows-dynamically-using-jquery.php =============*/

        var idhijos = 1;
        var idcirugias = 1;
        var idalergias = 1;
        var idhospitalizado = 1;
        var idmedicamento = 1;
        var idfamiliares = 1;
        var idotrofamiliares = 1;
        var vivesconellos = 0;

        var tipodesexo = "<?php echo $tipodesexo; ?>";

        var alturaprevision = $("#alturaprevision").offset().top;
        var alturaotros = $("#alturaotros").offset().top;
        var alturatienehijos = $("#alturatienehijos").offset().top;
        var añoacademicodevivienda = $("#añoacademicodevivienda").offset().top;
        var alturaenfermedades = $("#alturaenfermedades").offset().top;
        var alturatransfusionessanguineas = $("#alturatransfusionessanguineas").offset().top;
        var alturaanestesia = $("#alturaanestesia").offset().top;
        var alturahospitalizado = $("#alturahospitalizado").offset().top;
        var alturamedicamento = $("#alturamedicamento").offset().top;
        var alturaseccionII_III = $("#alturaseccionII_III").offset().top;
        var alturaseccionII_VIII = $("#divpreguntasibebe").offset().top;
        var alturaconsumedrogas = $("#DivPreguntaConsumeDroga").offset().top;
        var alturaconducevehiculo = $("#alturaconducevehiculo").offset().top;
        var alturarealizaejercicio = $("#DivPreguntaRealizaEjercicio").offset().top;
        var alturacepillardientes = $("#DivPreguntaCepillarDientes").offset().top;
        var alturaedad_mestruacion = $("#edad_mestruacion").offset().top;
        var alturaedad_ciclosregularesmenstruacion = $("#ciclosregularesmenstruacion").offset().top;
        var alturaedad_opcionesdismenorrea = $("#opcionesdismenorrea").offset().top;
        var alturaedad_opcionessecresion_peneana = $("#opcionessecresion_peneana").offset().top;
        var alturaedad_opcionesenfermedad_transmision = $("#opcionesenfermedad_transmision").offset().top;

        var alturaedad_informaciondeembarazo = $("#informaciondeembarazo").offset().top;
        var alturaedad_informacion_primer_parto = $("#informacion_primer_parto").offset().top;
        var alturaedad_informacion_numero_partos = $("#informacion_numero_partos").offset().top;

        var altura_filadiabetes = $("#filadiabetes").offset().top;
        var altura_filahipertension_arterial = $("#filahipertension_arterial").offset().top;
        var altura_filacancer = $("#filacancer").offset().top;
        var altura_filacardiopatias = $("#filacardiopatias").offset().top;
        var altura_filaalcoholismo = $("#filaalcoholismo").offset().top;
        var altura_filadrogadiccion = $("#filadrogadiccion").offset().top;
        var altura_filadepresion = $("#filadepresion").offset().top;
        var altura_filatrastornos_mentales = $("#filatrastornos_mentales").offset().top;
        var altura_filaobesidad = $("#filaobesidad").offset().top;
        var altura_tablafamiliares = $("#tablafamiliares").offset().top;
        var altura_DivInsumosBasicos = $("#DivInsumosBasicos").offset().top;





        function moverscroll(valor) {
            $('html, body').animate({
                scrollTop: valor - 150
            }, 1500, 'easeInOutExpo');
        }

        // $(document).ready(function() {
        $("#insertarhijo").click(function() {
            //edad hijo, pueden ser 5 meses y no años, entonces por eso lo dejo de tipo text. Ahora!! puede dejar un select con meses y años
            let contenidotabla = `<tr>
                    <td><input type="text" class="form-control" maxlength="35" name="nombre_hijo[]" required></td>
                    <td><input type="text" class="form-control" name="edad_hijo[]" minlength="1" maxlength="3" value="" required></td>
                    <td>                                        
                    <label>
                        <input type="checkbox" class="ace ace-switch ace-switch-6 listadovivesconellos" value="0" onclick="$(this).val(this.checked ? 1 : 0)">
                            <span class="lbl"></span>
                        </label>
                    </td>
                    <td><button class='btn btn-outline-rojo' value='` + (idhijos) + `' onclick='borrarhijo(` + (idhijos) + `);'><i class="fa fa-trash-o"</button></td>
                    </tr>`;
            $("#tablahijos tbody").append(contenidotabla);

            vivesconellos = $('.listadovivesconellos').map(function() {
                if (this.checked || !this.checked)
                    return this.value;
            }).get();


            $(".listadovivesconellos").change(function() {
                // toastr.error("alerta de cambio de checkbox");
                vivesconellos = $('.listadovivesconellos').map(function() {
                    if (this.checked || !this.checked)
                        return this.value;
                }).get();
            });

            idhijos++;


        });


        $("#insertarcirugias").click(function() {
            /*$('.pick-submit').click();   =   para que en caso de que este abierto el calendario y estando abierta, 
            aprete el boton insertar hospitalizado no halla error.
            Entonces cierro cualquier calendario abierto e ingresa por defecto la fecha actual*/
            $('.pick-submit').click();

            let markup = `<tr>
                    <td><input type="text" class="form-control" maxlength="35" name="nom_cirugias[]" required></td>
                    <td><input class="form-control" placeholder="Click para agregar Fecha" style="cursor:pointer" maxlength="15" name="fecha_cirugia[]" id="fecha_cirugia` + (idcirugias) + `" data-large-mode="true" data-lang="es" data-large-default="true" data-translate-mode="false" data-format="d-m-Y" data-theme="my-style" required readonly></td>
                    <td><button class='btn btn-outline-rojo' value='` + (idcirugias) + `' onclick='borrarcirugia(` + (idcirugias) + `);'><i class="fa fa-trash-o"</button></td>
                    </tr>`;
            $("#tablacirugias tbody").append(markup);
            $('#fecha_cirugia' + idcirugias).dateDropper();
            idcirugias++;
        });

        $("#insertaralergias").click(function() {
            var markup = `<tr>
                    <td><input type="text" class="form-control" maxlength="35" name="alergia[]" id="alergia` + (idalergias) + `" required></td>
                    <td><button class='btn btn-outline-rojo' value='` + (idalergias) + `' onclick='borraralergia(` + (idalergias) + `);'><i class="fa fa-trash-o"</button></td>
                    </tr>`;
            $("#tablaalergias tbody").append(markup);
            idalergias++;
        });

        $("#insertarhospitalizado").click(function() {
            /*$('.pick-submit').click();   =   para que en caso de que este abierto el calendario y estando abierta, 
            aprete el boton insertar hospitalizado no halla error.
            Entonces cierro cualquier calendario abierto e ingresa por defecto la fecha actual*/
            $('.pick-submit').click();

            var markup = `<tr>
                <td><input type="text" class="form-control" maxlength="35" name="nom_hospitalizado[]" required></td>
                    <td><input type="text" class="form-control" placeholder="Click para agregar Fecha" style="cursor:pointer" maxlength="15" name="fecha_hospitalizado[]" id="fecha_hospitalizado` + (idhospitalizado) + `" data-large-mode="true" data-lang="es" data-large-default="true" data-translate-mode="false" data-format="d-m-Y" data-theme="my-style" readonly required></td>
                    <td><button class='btn btn-outline-rojo' value='` + (idhospitalizado) + `' onclick='borrarhospitalizado(` + (idhospitalizado) + `);'><i class="fa fa-trash-o"</button></td>
                    </tr>`;
            $("#tablahospitalizado tbody").append(markup);
            $('#fecha_hospitalizado' + idhospitalizado).dateDropper();
            idhospitalizado++;
        });

        $("#insertarmedicamento").click(function() {
            /*$('.pick-submit').click();   =   para que en caso de que este abierto el calendario y estando abierta, 
            aprete el boton insertar hospitalizado no halla error.
            Entonces cierro cualquier calendario abierto e ingresa por defecto la fecha actual*/
            $('.pick-submit').click();

            var markup = `<tr>
                    <td><input type="text" class="form-control" maxlength="35" name="nom_medicamento[]" required></td>
                    <td><input type="text" class="form-control" maxlength="35" name="dosis_diaria_medicamento[]" required></td>
                    <td><input type="text" class="form-control" placeholder="Click para agregar Fecha" style="cursor:pointer" maxlength="15" name="fecha_medicamento[]" id="fecha_medicamento` + (idmedicamento) + `" data-large-mode="true" data-lang="es" data-large-default="true" data-translate-mode="false" data-format="d-m-Y" data-theme="my-style" readonly required></td>
                    <td><input type="text" class="form-control" maxlength="35" name="razon_medicamento[]" required></td>
                    <td><input type="text" class="form-control" maxlength="35" name="preescrito_por_medicamento[]" required></td>
                    <td><button class='btn btn-outline-rojo' value='` + (idmedicamento) + `' onclick='borrarmedicamento(` + (idmedicamento) + `);'><i class="fa fa-trash-o"</button></td>
                    </tr>`;
            $("#tablamedicamento tbody").append(markup);
            $('#fecha_medicamento' + idmedicamento).dateDropper();
            idmedicamento++;
        });

        $("#insertarfamiliar").click(function() {

            var markup = `<tr>
                    <td width="180px">
                        <select name="paren_psicosocial[]" class="form-control" required>
                            <option value="1">PADRE</option>
                            <option value="2">MADRE</option>
                            <option value="3">HERMANO(A)</option>
                            <option value="4">ABUELO(A)</option>
                        </select>
                    </td>
                    <td width="250px">
                        <input type="text" class="form-control" name="nombre_psicosocial[]" maxlength="35" required>
                    </td>
                    <td>
                        <select name="vive_psicosocial[]" class="form-control" required>
                                <option value="0">F</option>
                                <option value="1" selected>V</option>
                        </select>
                    </td>
                    <td width="95px">
                    <input type="number" class="form-control" name="edad_psicosocial[]" min="18" maxlength="3" max="100" required>
                    </td>
                    <td>
                        <select name="escolaridad_psicosocial[]" class="form-control" required>
                                <option value="1">BÁSICA</option>
                                <option value="2">MEDIA</option>
                                <option value="3">SUPERIOR</option>
                                <option value="4">POSGRADOS</option>
                        </select>
                    </td>
                    <td>
                    <input type="text" class="form-control" name="actividad_psicosocial[]" maxlength="35" required>
                    </td>
                    <td><button class='btn btn-outline-rojo' value='` + (idfamiliares) + `' onclick='borrarfamiliar(` + (idfamiliares) + `);'><i class="fa fa-trash-o"</button></td>
                    </tr>`;
            $("#tablafamiliares tbody").append(markup);
            idfamiliares++;
        });

        $("#insertar_otras").click(function() {
            var markup = `<tr>
                    <td>
                    <select name="OF_relacion_parentesco[]" class="form-control">
                            <option value="1">PADRE</option>
                            <option value="2">MADRE</option>
                            <option value="3">HERMANO(A)</option>
                            <option value="4">ABUELO(A)</option>
                            <option value="5">BISABUELO(A)</option>
                            <option value="6">TIO(A)</option>
                            <option value="7">PRIMO(A)</option>
                            <option value="8">SOBRINO(A)</option>
                    </select>
                    </td>
                    <td><input type="text" class="form-control" maxlength="35" name="OF_nombre[]" required></td>
                    <td><input type="number" class="form-control" name="OF_edad[]" min="1" maxlength="3" max="100"></td>
                    <td>
                    <select name="OF_escolaridad[]" class="form-control">
                                <option value="1">BÁSICA</option>
                                <option value="2">MEDIA</option>
                                <option value="3">SUPERIOR</option>
                                <option value="4">POSGRADOS</option>
                        </select>
                    </td>
                    <td><input type="text" class="form-control" maxlength="35" name="OF_actividad[]"></td>
                    <td><button class='btn btn-outline-rojo' value='` + (idotrofamiliares) + `' onclick='borrarotrofamiliar(` + (idotrofamiliares) + `);'><i class="fa fa-trash-o"</button></td>
                    </tr>`;
            $("#tablaotrofamiliares tbody").append(markup);
            idotrofamiliares++;
        });

        function activarCalendario() {
            $('.fecha_cirugia').datepicker({
                format: 'mm-dd-yyyy'
            });
        }

        function borrarhijo(value) {
            $("#tablahijos tbody").find('button[value="' + value + '"]').each(function() {
                $(this).parents("tr").remove();
            });

            if ($("#tablahijos tbody").children().length == 0) {
                console.log('vacia');
                idhijos = 1;
            }
        }

        function borrarcirugia(value) {
            $("#tablacirugias tbody").find('button[value="' + value + '"]').each(function() {
                $(this).parents("tr").remove();
            });

            if ($("#tablacirugias tbody").children().length == 0) {
                console.log('vacia');
                idcirugias = 1;
            }
        }

        function borraralergia(value) {
            $("#tablaalergias tbody").find('button[value="' + value + '"]').each(function() {
                $(this).parents("tr").remove();
            });

            if ($("#tablaalergias tbody").children().length == 0) {
                console.log('vacia');
                idalergias = 1;
            }
        }

        function borrarhospitalizado(value) {
            $("#tablahospitalizado tbody").find('button[value="' + value + '"]').each(function() {
                $(this).parents("tr").remove();
            });

            if ($("#tablahospitalizado tbody").children().length == 0) {
                console.log('vacia');
                idhospitalizado = 1;
            }
        }

        function borrarmedicamento(value) {
            $("#tablamedicamento tbody").find('button[value="' + value + '"]').each(function() {
                $(this).parents("tr").remove();
            });

            if ($("#tablamedicamento tbody").children().length == 0) {
                console.log('vacia');
                idmedicamento = 1;
            }
        }

        function borrarfamiliar(value) {
            $("#tablafamiliares tbody").find('button[value="' + value + '"]').each(function() {
                $(this).parents("tr").remove();
            });

            if ($("#tablafamiliares tbody").children().length == 0) {
                console.log('vacia');
                idmedicamento = 1;
            }
        }

        function borrarotrofamiliar(value) {
            $("#tablaotrofamiliares tbody").find('button[value="' + value + '"]').each(function() {
                $(this).parents("tr").remove();
            });

            if ($("#tablaotrofamiliares tbody").children().length == 0) {
                console.log('vacia');
                idotrofamiliares = 1;
            }
        }
    </script>

    <script src="js/funciones.js"></script>
    <script src="js/limpiador.js"></script>
</body>

</html>