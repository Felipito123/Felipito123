<?php session_start();
$usuario;
if (isset($_SESSION['sesionCESFAM']) && $_SESSION['sesionCESFAM']['id_rol'] == 6) { //VALIDA QUE SÓLO PUEDE VER ESTA PANTALLA EL DE FARMACIA
    $usuario = $_SESSION['sesionCESFAM'];
} else { //SINO LO REDIRIGE AL INDEX
    header("Location:../indice/");
}
?>
<?php
include '../conexion/conexion.php';
include '../dashboard/head.php'; ?>
<link rel="stylesheet" href="../../css/estilofile.css">
<link rel="stylesheet" href="../../css/estilocheckbox.css">
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
        /*AL LINK LE AGREGA LA ELLIPSIS(...) MÁS ABAJO*/
        max-width: 250px;
    }

    .table.dataTable td {
        white-space: nowrap;
        text-overflow: ellipsis;
        overflow: hidden;
    }


    #labelparaswal {
        color: #545454;
        font-size: 14px;
        font-weight: 400;
        line-height: normal;
        float: left;
        word-wrap: break-word;
    }
</style>


<title>Salud los Álamos - Medicamentos </title>

</head>

<body id="page-top">


    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php include '../dashboard/sidebar.php'; ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <?php include '../dashboard/topbar.php'; ?>


                <div class="container-fluid" style="text-align: center; padding-bottom: 25px;">

                    <nav>
                        <div class="nav nav-tabs justify-content-center pb-3" id="nav-tab" role="tablist" style="border-bottom: 1px solid transparent;">
                            <a class="nav-item nav-link active" id="medicamentosactivos" data-toggle="tab" href="#medicamentos" role="tab" aria-controls="medicamentos" aria-selected="true">Medicamentos Disponibles</a>
                            <a class="nav-item nav-link" id="tipocat" data-toggle="tab" href="#tipomedicamentotab" role="tab" aria-controls="tipomedicamentotab" aria-selected="false">Tipo medicamento</a>
                            <a class="nav-item nav-link" id="tipocatmed" data-toggle="tab" href="#tabcategoriamedicamento" role="tab" aria-controls="tabcategoriamedicamento" aria-selected="false">Categoria medicamento</a>
                            <a class="nav-item nav-link" id="medicamentosocultos" data-toggle="tab" href="#medicamentosOcultos" role="tab" aria-controls="medicamentosOcultos" aria-selected="false">Medicamentos Ocultos</a>
                            <!-- <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Contacto</a> -->
                        </div>
                    </nav>


                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="medicamentos" role="tabpanel" aria-labelledby="medicamentosactivos">

                            <div class="container-fluid">

                                <!-- <div class="row col-11 justify-content-end">
                                    <label class="btn btn-danger btn-sm shadow-sm" id="botonagregarmedicamento" style="border-radius: 15px 15px 15px 0px;height:35px; width:120px;" title="agregar medicamento"><i class="fas fa-plus-circle fa-sm text-white-100 pr-2" style="font-size: 25px;"></i><i class="fas fa-briefcase-medical fa-sm text-white-50" style="font-size: 15px;"></i>
                                    </label>
                                </div> -->

                                <div class="row justify-content-center">
                                    <div class="col-xl-3">
                                        <div class="card rounded shadow-sm border-0">
                                            <div class="card-body p-0">
                                                <div class="bg-danger px-5 py-3 text-center card-img-top"><span class="mb-2 d-block mx-auto"><i class="fas fa-briefcase-medical" style="font-size: 55px;color:white;"></i><i class="fas fa-check-square pl-2 pt-2" style="font-size: 25px;color:white;"></i></span>
                                                    <h5 class="text-white mb-0">Listado de medicamentos</h5>
                                                    <p class="small text-white mb-0">Disponibles</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row justify-content-center text-center pt-5">
                                    <div class="col-xl-12">
                                        <div class="row">
                                            <div class="col-xl-1"></div>
                                            <div class="col-xl-6">
                                                <label>Acciones: </label>
                                                <span class="badge badge-danger" style="padding: 5px;"><i class="icofont-safety" style="font-size: 16px;"></i> Registrar medicamento</span>
                                                <span class="badge badge-info" style="padding: 5px;"><i class="fa fa-edit"></i> Editar medicamento</span>
                                                <span class="badge badge-secondary" style="padding: 5px;"><i class="fa fa-retweet"></i> Mantención medicamento</span>
                                                <span class="badge badge-warning" style="padding: 5px;"><i class="fa fa-trash"></i> Ocultar medicamento</span>
                                            </div>
                                            <div class="col-xl-1"></div>
                                            <div class="col-xl-4">
                                                <label>Generar informe (G.I): </label>
                                                <span class="badge badge-success" style="padding: 5px;"><i class="fa fa-file-excel-o"></i> G.I en Excel</span>
                                                <span class="badge badge-danger" style="padding: 5px;"><i class="fa fa-file-pdf-o"></i> G.I en PDF</span>
                                                <span class="badge badge-info" style="padding: 5px;"><i class="fa fa-print"></i> Imprimir</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="row justify-content-center pt-4">
                                <div class="col-xl-8">
                                    <div class="card shadow-sm mb-4 pb-2">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table id="tabla-medicamentos" class="table table-striped table-condensed">
                                                    <thead class="text-center">
                                                        <tr class="text-white bg-secondary">
                                                            <th>TIPO</th>
                                                            <th>CATEGORIA</th>
                                                            <th>NOMBRE</th>
                                                            <th>PRECIO</th>
                                                            <th>DOSIFICACION</th>
                                                            <th>STOCK</th>
                                                            <th>MINIMA</th>
                                                            <th>MÁXIMA</th>
                                                            <!-- <th>IMAGEN</th> -->
                                                            <th>ACCION</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="text-center">
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="col-xl-4 pb-3">
                                    <div class="card shadow-sm mb-4 pb-2">
                                        <!-- Card Body -->
                                        <div class="card-body">
                                            <h5 style="font-size: 18px;">REGISTRAR MEDICAMENTO</h5>
                                            <hr class="col-xl-4">

                                            <form id="formRegistrarMedicamento" method="POST" autocomplete="off">
                                                <div class="row justify-content-center pt-3">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label id="labelparaswal">Nombre</label>
                                                            <div class="input-group mb-3">
                                                                <span class="input-group-text"><i class="fa fa-user" aria-hidden="true" style="width: 13px;"></i></span>
                                                                <input type="text" class="form-control" id="nombre" placeholder="Ingrese Nombre" minlength="2" maxlength="100" onkeypress="return sololetras(event)" onpaste="return false" autocomplete="off" required>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label id="labelparaswal">Precio</label>
                                                            <div class="input-group mb-3">
                                                                <span class="input-group-text"><i class="fa fa-user" aria-hidden="true" style="width: 13px;"></i></span>
                                                                <input type="text" class="form-control" id="precio" placeholder="Ingrese precio" minlength="3" maxlength="7" onkeypress="return solonumeros(event)" onpaste="return false" autocomplete="off" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <script>
                                                    function dosificacion(e) {
    key = e.keycode || e.which;
    teclado = String.fromCharCode(key).toLowerCase();
    letras = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnñopqrstuvwxyzáéíóú0123456789";
    especiales = "8-37-38-46-164";
    teclado_especial = false;

    for (var i in especiales) {
        if (key == especiales[i]) {
            teclado_especial = true;
            break;
        }
    }
    if (letras.indexOf(teclado) === -1 && !teclado_especial) {
        return false;
    }
}
                                                </script>
                                                <div class="row justify-content-center">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label id="labelparaswal">Dosificación</label>
                                                            <div class="input-group mb-3">
                                                                <span class="input-group-text"><i class="fas fa-compass" aria-hidden="true" style="width: 13px;"></i></span>
                                                                <input type="text" class="form-control" id="dosificacion" placeholder="Ingrese dosificacion" minlength="2" maxlength="40" pattern="[A-Za-zÁÉÍÓÚáéíóúñÑ0-9\s,./]+" onkeypress="return dosis(event)" onpaste="return false" autocomplete="off" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label id="labelparaswal">Stock</label>
                                                            <div class="input-group mb-3">
                                                                <span class="input-group-text"><i class="icofont-stock-mobile text-center pr-3" style="width: 15px;font-size:22px;"></i></span>
                                                                <input type="number" class="form-control" id="stock" placeholder="Ingrese Stock" min="1" minlength="11" maxlength="70" onkeypress="return solonumeros(event)" onpaste="return false" autocomplete="off" required>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="row justify-content-center">

                                                    <div class="col-lg-9">
                                                        <div class="form-group">
                                                            <label id="labelparaswal">Imagen</label>
                                                            <input type="file" class="form-control-file estilo-archivo" id="imagen" accept=".jpg,.jpeg,.png,.bmp" required>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row justify-content-center">
                                                    <div class="col-lg-10">
                                                        <div class="form-group">
                                                            <label id="labelparaswal" class="col-form-label">Tipo medicamento:</label>
                                                            <select class="form-control" id="tipomedicamento" required>
                                                                <option value="">Seleccione un tipo de medicamento</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-10">
                                                        <div class="form-group">
                                                            <label id="labelparaswal" class="col-form-label">Categoria medicamento:</label>
                                                            <select class="form-control" id="categoriamedicamento" required>
                                                                <option value="">Seleccione una categoria</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row justify-content-center">
                                                    <div class="col-6">
                                                        <button type="submit" name="submitmodal" class="btn btn-danger btn-block" style="margin-top:4px;"><i class="icofont-safety" style="font-size: 23px;"></i> Registrar</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--FIN DEL ROW -->


                        </div>
                        <!--fin del tab-content -->

                        <div class="tab-pane fade" id="medicamentosOcultos" role="tabpanel" aria-labelledby="medicamentosocultos">
                            <div class="container-fluid">

                                <div class="row justify-content-center pt-3">
                                    <div class="col-lg-3 col-md-6 mb-lg-0">
                                        <!-- Card-->
                                        <div class="card rounded shadow-sm border-0">
                                            <div class="card-body p-0">
                                                <div class="bg-danger px-5 py-3 text-center card-img-top">
                                                    <span class="mb-2 d-block mx-auto"><i class="fas fa-briefcase-medical" style="font-size: 55px;color:white;"></i><i class="fas fa-minus-square pl-2 pt-2" style="font-size: 25px;color:white;"></i></span>
                                                    <h5 class="text-white mb-0">Listado de medicamentos</h5>
                                                    <p class="small text-white mb-0">Ocultos</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="row pt-3">
                                    <div class="col-lg-12">
                                        <label>Generar informe (G.I): </label>
                                        <span class="badge badge-success" style="padding: 5px;"><i class="fa fa-file-excel-o"></i> G.I en excel</span>
                                        <span class="badge badge-danger" style="padding: 5px;"><i class="fa fa-file-pdf-o"></i> G.I en pdf</span>
                                        <span class="badge badge-info" style="padding: 5px;"><i class="fa fa-print"></i> Imprimir</span>
                                    </div>
                                    <!-- <p id="p3">Finally <a href="https://www.growingwiththeweb.com/">Daniel's blog</a>, <a href="https://jonibologna.com/">Jonis blog</a>.</p> -->
                                </div>

                            </div>

                            <div class="row justify-content-center pt-4">
                                <div class="col-lg-9">
                                    <div class="card shadow mb-4">

                                        <!-- Card Body -->
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table id="tabla_medic_ocultos" class="table table-striped table-condensed">
                                                    <thead class="text-center">
                                                        <tr class="text-white bg-secondary">
                                                            <th>IMAGEN</th>
                                                            <th>TIPO</th>
                                                            <th>CATEGORIA</th>
                                                            <th>NOMBRE PATOLOGIA</th>
                                                            <th>STOCK DISPONIBLE</th>
                                                            <th>VISIBILIDAD</th>
                                                            <th>ACCION</th>
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
                        <!--fin del tab-content -->

                        <div class="tab-pane fade" id="tipomedicamentotab" role="tabpanel" aria-labelledby="tipomedicamentotab">

                            <div class="container-fluid">

                                <div class="row justify-content-center">
                                    <div class="col-xl-4">
                                        <div class="card rounded shadow-sm border-0">
                                            <div class="card-body p-0">
                                                <div class="bg-info px-5 py-3 text-center card-img-top"><span class="mb-2 d-block mx-auto"><i class="fas fa-prescription-bottle-alt" style="font-size: 55px;color:white;"></i></span>
                                                    <h5 class="text-white mb-0">Listado Tipo de Medicamentos</h5>
                                                    <p class="small text-white mb-0"><strong>Acrónimo </strong> <i class="fas fa-arrow-right"></i> TM: Tipo Medicamento</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row justify-content-end text-center pt-5">
                                    <div class="col-xl-4"></div>
                                    <div class="col-xl-4">
                                        <label>Generar informe (G.I): </label>
                                        <span class="badge badge-success" style="padding: 5px;"><i class="fa fa-file-excel-o"></i> G.I en Excel</span>
                                        <span class="badge badge-danger" style="padding: 5px;"><i class="fa fa-file-pdf-o"></i> G.I en PDF</span>
                                        <span class="badge badge-info" style="padding: 5px;"><i class="fa fa-print"></i> Imprimir</span>
                                    </div>
                                    <div class="col-xl-4">
                                        <label>Acciones: </label>
                                        <span class="badge badge-<?php echo $temadelacookie; ?>" style="padding: 5px;"><i class="fa fa-plus-circle pr-1"></i> Agregar TM</span>
                                        <span class="badge badge-info" style="padding: 5px;"><i class="fa fa-edit"></i> Editar TM</span>
                                        <span class="badge badge-warning" style="padding: 5px;"><i class='fas fa-trash'></i> Eliminar TM</span>
                                    </div>
                                </div>

                            </div>

                            <div class="row justify-content-center pt-4">
                                <div class="col-xl-4 col-sm-12 pb-3">
                                    <div class="card border-left-<?php echo $temadelacookie; ?>">
                                        <form id="formTipoMed" method="POST" autocomplete="off">
                                            <div class="row justify-content-center p-3">
                                                <div class="col-xl-12">
                                                    <div class="form-group">
                                                        <label id="labelparaswal">Nombre Tipo Medicamento</label>
                                                        <div class="input-group mb-3">
                                                            <span class="input-group-text"><i class="fa fa-etsy" aria-hidden="true" style="width: 13px;"></i></span>
                                                            <input type="text" class="form-control" id="nombretipomed" name="nombretipomed" minlength="2" maxlength="50" placeholder="Nombre Tipo Medicamento" onkeypress="return sololetrasynumeros(event)" onpaste="return false" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-6">
                                                    <button type="submit" name="submitmodal" class="btn btn-<?php echo $temadelacookie; ?> btn-block" style="margin-top:4px;"><i class="fa fa-plus-circle pr-1"></i> Agregar</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <div class="col-xl-8 col-sm-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table id="tablaTipoMed" class="table table-striped table-condensed">
                                                    <thead class="text-center">
                                                        <tr class="bg-<?php echo $temadelacookie; ?> text-white">
                                                            <th>TIPO MEDICAMENTO</th>
                                                            <th>ACCION</th>
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
                        <!--fin del tab-content -->


                        <div class="tab-pane fade" id="tabcategoriamedicamento" role="tabpanel" aria-labelledby="tabcategoriamedicamento">
                            <div class="container-fluid">

                                <div class="row justify-content-center">
                                    <div class="col-xl-4">
                                        <div class="card rounded shadow-sm border-0">
                                            <div class="card-body p-0">
                                                <div class="bg-info px-5 py-3 text-center card-img-top"><span class="mb-2 d-block mx-auto"><i class="fas fa-prescription-bottle-alt" style="font-size: 55px;color:white;"></i></span>
                                                    <h5 class="text-white mb-0">Listado Categoria Medicamentos</h5>
                                                    <p class="small text-white mb-0"><strong>Acrónimo </strong> <i class="fas fa-arrow-right"></i> CM: Categoria Medicamento</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row justify-content-end text-center pt-5">
                                    <div class="col-xl-4"></div>
                                    <div class="col-xl-4">
                                        <label>Generar informe (G.I): </label>
                                        <span class="badge badge-success" style="padding: 5px;"><i class="fa fa-file-excel-o"></i> G.I en Excel</span>
                                        <span class="badge badge-danger" style="padding: 5px;"><i class="fa fa-file-pdf-o"></i>G.I en PDF</span>
                                        <span class="badge badge-info" style="padding: 5px;"><i class="fa fa-print"></i> Imprimir</span>
                                    </div>
                                    <div class="col-xl-4">
                                        <label>Acciones: </label>
                                        <span class="badge badge-<?php echo $temadelacookie; ?>" style="padding: 5px;"><i class="fa fa-plus-circle pr-1"></i> Agregar CM</span>
                                        <span class="badge badge-info" style="padding: 5px;"><i class="fa fa-edit"></i> Editar CM</span>
                                        <span class="badge badge-warning" style="padding: 5px;"><i class='fas fa-trash'></i> Eliminar CM</span>
                                    </div>
                                </div>

                            </div>

                            <div class="row justify-content-center pt-4">

                                <div class="col-xl-4 col-sm-12 pb-3">
                                    <div class="card border-left-<?php echo $temadelacookie; ?>">
                                        <form id="formCatMed" method="POST" autocomplete="off">
                                            <div class="row justify-content-center p-3">
                                                <div class="col-xl-12">
                                                    <div class="form-group">
                                                        <label id="labelparaswal">Nombre Categoria Medicamento</label>
                                                        <div class="input-group mb-3">
                                                            <span class="input-group-text"><i class="fa fa-etsy" aria-hidden="true" style="width: 13px;"></i></span>
                                                            <input type="text" class="form-control" id="nombrecatmed" name="nombrecatmed" minlength="2" maxlength="50" placeholder="Nombre Categoria Medicamento" onkeypress="return sololetrasynumeros(event)" onpaste="return false" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-6">
                                                    <button type="submit" name="submitmodal" class="btn btn-<?php echo $temadelacookie; ?> btn-block" style="margin-top:4px;"><i class="fa fa-plus-circle pr-1"></i> Agregar</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <div class="col-xl-8 col-sm-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table id="tablaCatMed" class="table table-striped table-condensed">
                                                    <thead class="text-center">
                                                        <tr class="bg-<?php echo $temadelacookie; ?> text-white">
                                                            <th>CATEGORIA MEDICAMENTO</th>
                                                            <th>ACCION</th>
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
                        <!--fin del tab-content -->


                    </div>
                    <!--fin tab-content general -->

                </div>
                <!-- End of Main Content -->
            </div>
            <!-- End of Content Wrapper -->
            <?php include '../dashboard/footer.php'; ?>
        </div>
        <!-- End of Page Wrapper -->




        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>




        <!-- CAMBIAR EL ITEM DEL NAVBAR SELECCIONADO -->
        <script>
            $("#farmacia").attr('class', 'nav-item active');
        </script>




        <!--<script src="assets/bootstrap/js/bootstrap.min.js"></script>-->
        <script src="../js/validaciongeneral.js"></script>
        <script src="../js/funcionswal.js"></script>
        <script src="../../jsdashboard/sb-admin-2.min.js"></script>
        <script src="js/funciones.js"></script>
        <script src="js/ocultos.js"></script>
        <script src="js/medicamentos.js"></script>

        <script>
            llenarSelectTipoMedicamento();
            llenarSelectCategoriaMedicamento();
            ValidaImgDeMedicamento();
        </script>

        <script>
            $('#imagen').on('change', function() {
                var ext = $(this).val().split('.').pop();
                if ($(this).val() != '') {
                    if (ext == "jpg" || ext == "png" || ext == "JPEG" || ext == "jpeg" || ext == "JPG" || ext == "PNG" || ext == "bmp") {
                        // console.log("La extensión es: " + ext);
                        if ($(this)[0].files[0].size > 20971520) { //1048576bytes * 20 = 20MB   (IMAGEN NO MAYPR A 20 MB)
                            // 1024bytes=1KB, 1048576bytes=1MB, 1024*1024*1024 (bytes)= 1GB
                            // console.log("La imagen excede el tamaño máximo: archivo no debe ser mayor a 20 MB");
                            alertify.error("Tamaño excede a 20 MB");
                            $(this).val('');
                        }
                    } else {
                        $(this).val('');
                        alertify.error("Sólo se permiten imagenes");
                        console.log("Extensión no permitida: " + ext);
                    }
                }
            });
        </script>

        <script src="../../assets/datatables/datatables.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>

</body>

</html>