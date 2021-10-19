<?php session_start();
$rol = $_SESSION['sesionCESFAM']['id_rol'];
if (!isset($_SESSION['sesionCESFAM']) && !isset($rol)) { //VALIDA QUE LA SESIÓN ESTE INICIADA Y HALLA UN ROL, ESTA PANTALLA LA VEN TODOS LOS FUNCIONARIOS
    header("Location:../indice/");
}
?>
<?php include '../dashboard/head.php'; ?>
<script src='../js/moment.min.js'></script>
<script src='../js/fullcalendar.min.js'></script>
<script src='../js/es.js'></script>

<style>
    .fc-event,
    /*Establezco el color del texto con o sin hover como blanco por defecto*/
    .fc-event:hover {
        color: white !important;
        text-decoration: none;
    }
</style>

<link rel="stylesheet" href="../../css/estilomodalevento.css">
<title>Salud los Álamos - Calendario</title>
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

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-center mb-4">
                        <!-- <h1 class="h3 mb-0 text-gray-800">ZOOM</h1> -->
                        <h1 class="h3 mb-0 text-gray-800" style="font-family: 'Kaushan Script', cursive;">Calendario</h1>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-lg-6">
                            <div class="alert alert-primary" role="alert">
                                <!-- <div class="row justify-content-between"> -->
                                <div class="row justify-content-center">
                                    <strong><i class="fas fa-info-circle pb-2"></i> A considerar</strong>
                                    <p class="pr-4"></p>
                                </div>
                                <!-- </div> -->
                                <ul>
                                    <li>En el calendario aparece un dia marcado <span style="background-color: #efead5;color: #efead5;"><i class="fas fa-square-full" style="width:25px;"></i></span> , que corresponde al dia actual.</li>
                                    <li>Al hacer click <i class="fas fa-mouse-pointer"></i> en un dia <span class="badge badge-primary"> <strong>10:00</strong> "Titulo de ejemplo"</span> dentro del calendario y se abrirá una ventana <i class="fas fa-pager"></i> , <br> donde podrás visualizar el detalle del evento.</li>
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-center">
                        <!-- Area Chart -->
                        <div class="col-xl-9 col-lg-7">
                            <div class="card shadow border-bottom-primary mb-4">

                                <!-- Card Header - Dropdown -->
                                <!-- <div class="card-header py-3 d-flex flex-row align-items-center justify-content-center">
                                    <h5 class="m-0 font-weight-bold text-<?php //echo $temadelacookie; 
                                                                            ?>">Calendario</h5>
                                </div> -->

                                <!-- Card Body -->
                                <div class="card-body">
                                    <div id='calendariop'></div>
                                </div>
                            </div>
                        </div>


                    </div>
                    <!--FIN DEL ROW -->
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <?php include '../dashboard/footer.php'; ?>

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <?php include '../partes/modal/modal_micuenta_evento.php'; ?>

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>



    <script>
        $(document).ready(function() {
            // weekends: false,    Esconde los fines de semana
            // saque el -> right: 'agendaDay,agendaWeek
            $('#calendariop').fullCalendar({
                header: {
                    left: 'today,prev,next',
                    center: 'title',
                    right: 'basicDay,basicWeek,month'
                },
                weekends: false,
                eventLimit :  5 ,
                events: 'funciones/fun_llenar_calendario.php',
                eventClick: function(calEvent, jsEvent, view) {

                    $('#tituloevento').val(calEvent.title);
                    $('#descripcion').val(calEvent.descripcion);

                    fechayhorainicio = calEvent.start._i.split(" ");
                    let var1 = fechayhorainicio[0];
                    let var2 = var1.split("-");

                    $('#fechainicio').val(var2[2] + "-" + var2[1] + "-" + var2[0]); //dia-mes-año
                    $('#horainicio').val(fechayhorainicio[1]);

                    fechayhorafin = calEvent.end._i.split(" ");
                    let var3 = fechayhorafin[0];
                    let var4 = var3.split("-");
                    $('#fechafin').val(var4[2] + "-" + var4[1] + "-" + var4[0]); //dia-mes-año
                    $('#horafin').val(fechayhorafin[1]);

                    $('#modalverevento').modal();
                },
            });


            // $('.fc-sat').attr('disabled',true);
            // $('.fc-sun').attr('disabled',true);
            // $('#calendariop').fullCalendar( 'changeView', 'agendaWeek' )

        });
    </script>


    <!-- CAMBIAR EL ITEM DEL NAVBAR SELECCIONADO -->
    <script>
        $("#micuenta").attr('class', 'nav-item active');
    </script>


    <script src="../js/validaciongeneral.js"></script>
    <script src="../../assets/popper/popper.min.js"></script>
    <!-- <script src="../../assets/bootstrap/js/bootstrap.min.js"></script> -->
    <script src="../../assets/datatables/datatables.min.js"></script>
    <script src="../../jsdashboard/sb-admin-2.min.js"></script>



</body>

</html>