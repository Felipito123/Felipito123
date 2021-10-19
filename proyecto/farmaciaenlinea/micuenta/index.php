<?php session_start();

if (!isset($_SESSION["sesionFarmacia"]["rut"])) {
    header("Location: ../");
}
//unset($_SESSION["carrito"]);
?>
<?php include 'partes/head.php'; ?>

<style>
    .btn-brown {
        background-color: #de5d30;
        color: white;
    }

    .btn-brown:hover {
        background-color: #c7532b;
        color: white;
    }

    .letraespecial {
        letter-spacing: 2px;
        font-weight: 700;
        text-transform: uppercase;
        font-size: 16px;
        padding: 15px 0px 10px;
        align-items: center;
        font-family: "Cairo", sans-serif;
        /* padding: 45px 0 40px; */
    }

    #filtradorexterno:focus {
        border: 2px solid #f6c23e;
        outline: none;
    }
</style>
<title>Salud los Álamos - Mi cuenta</title>
</head>

<body id="page-top">
    <!--style="background-color: brown;"-->
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column ">
            <!-- Main Content -->
            <div id="content">
                <?php include 'partes/topbar.php'; ?>

                <div class="row justify-content-center">
                    <div class="col-lg-2 col-md-6 mb-lg-0">
                        <!-- Card-->
                        <div class="card rounded shadow-sm border-0">
                            <div class="card-body p-0">
                                <div class="bg-warning px-5 py-3 text-center card-img-top"><span class="mb-2 d-block mx-auto"><i class="fas fa-user-circle" style="font-size: 55px;color:white;"></i></span>
                                    <h5 class="text-white mb-0">Mi cuenta</h5>
                                    <p class="small text-white mb-0"></p>
                                    <!--y listado de solicitudes -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container-fluid pt-5" style="padding-bottom:8%;">

                    <div class="row justify-content-center" style="padding-top: 5px;">

                        <div class="col-lg-5 pb-5">

                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-lg-9">
                                        <!-- Card-->
                                        <div class="card rounded shadow-sm border-left-warning">
                                            <!--border-left-warning -->
                                            <!--danger: e74a3b warning:f6c23e  style="border-top: 4px solid #e74a3b;"-->
                                            <div class="card-body">
                                                <div class="row justify-content-center">
                                                    <!-- | CESFAM Los Álamos | -->
                                                    <!-- <span class="col-lg-12 badge badge-pill badge-danger" id="patologia"></span> -->
                                                    <code class="col-lg-12" id="patologia" style="color: red;"></code>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <form method="post" id="fomEditarDatosPaciente">
                                <h4 class="pt-4" style="font-weight: 300;">Datos personales</h4>
                                <div class="card shadow">
                                    <div class="card-body">

                                        <!-- RUT -->
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-address-card" aria-hidden="true" style="width: 16px;"></i>
                                                </span>
                                            </div>
                                            <input type="text" class="form-control" id="rut" placeholder="Rut" disabled>
                                        </div>

                                        <!-- Nombre -->
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-user" aria-hidden="true" style="width: 16px;"></i>
                                                </span>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Nombre" minlength="2" maxlength="50" name="nombres" id="nombres" onkeypress="return sololetras(event)" onpaste="return false" required>
                                        </div>

                                        <!-- Apellidos -->
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-user" aria-hidden="true" style="width: 16px;"></i>
                                                </span>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Apellidos" minlength="2" maxlength="50" name="apellidos" id="apellidos" onkeypress="return sololetras(event)" onpaste="return false" required>
                                        </div>


                                        <!-- Dirección -->
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-address-card-o" style="width: 16px;" aria-hidden="true"></i>
                                                </span>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Dirección" minlength="2" maxlength="100" name="direccion" id="direccion" onkeypress="return solodireccion(event)" onpaste="return false" required>
                                        </div>
                                    </div>
                                </div>

                                <h4 class="pt-4" style="font-weight: 300;">Contacto</h4>

                                <div class="card shadow">
                                    <div class="card-body">
                                        <!-- CORREO -->
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-envelope" aria-hidden="true"></i>
                                                </span>
                                            </div>
                                            <input type="email" class="form-control" id="correo" name="correo" placeholder="Correo" onkeypress="return solocorreo(event)" onpaste="return false" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" minlength="11" maxlength="70" required>
                                        </div>


                                        <!-- Teléfono -->
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-phone" aria-hidden="true" style="width: 16px;"></i></span>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Teléfono" minlength="8" maxlength="9" name="telefono" id="telefono" onkeypress="return solonumeros(event)" onpaste="return false" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="container pt-3 pb-5">
                                    <div class="row justify-content-center">
                                        <div class="col-lg-6">
                                            <button type="submit" class="btn btn-outline-warning btn-block" style="width: 80%; margin-left: auto; margin-right: auto;" id="btnactualizardatos">Actualizar datos</button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>
                        <!--FIN DEL COL-SM-->

                        <div class="d-none d-lg-block" style="background-color: #e3e3e3;padding: 1px; margin-left: 20px; margin-right: 20px;"></div>


                        <div class="col-lg-5">

                            <div class="alert alert-danger text-center" role="alert">¡Estimado(a) Paciente! <br> En este sector de su pantalla podrá visualizar las solicitudes de medicamentos realizadas. <br>En caso que desee cancelar una solicitud, podrá presionar el boton "X".</div>

                            <div class="row justify-content-end pt-4 pb-4">
                                <div class="col-lg-5">
                                    Filtrar: <input type="text" id="filtradorexterno">
                                </div>
                            </div>

                            <div class="card shadow">
                                <div class="card-body">
                                    <div class="row justify-content-center">
                                        <div class="col-lg-12">
                                            <div class="table-responsive">
                                                <table class="table" id="tabla_solicitud_paciente">
                                                    <thead class="bg-warning text-center" style="color:white">
                                                        <tr>
                                                            <th scope="col"># SEGUIMIENTO</th>
                                                            <th scope="col">R.U.T</th>
                                                            <th scope="col">FECHA</th>
                                                            <th scope="col">ACCIÓN</th>
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
                        </div>
                        <!--FIN DEL ROW -->
                    </div>

                    <section style="padding-bottom:10px;"></section>
                </div>
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer" style="background:brown; color:white;">
                <div class="container my-auto">
                    <div class="row" style="padding: 120px;">
                        <div class="col">
                            <div class="copyright text-center my-auto">
                                <span>Copyright &copy; Todos los derechos reservados 2021</span>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->


    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <script>
        function swalfire(titulo, icono) {
            let color;
            if (icono == "success") {
                color = "#1d7d4d";
            } else if (icono == "error") {
                color = "#dd3333";
            } else if (icono == "info") {
                color = "#17a2b8";
            }
            Swal.fire({
                // title: titulo,
                icon: icono,
                // inputLabel: titulo,
                title: '<h2><strong>' + titulo + '</strong></h2>',
                showCloseButton: false,
                showCancelButton: true,
                showConfirmButton: false,
                showDenyButton: false,
                focusConfirm: false,
                width: '470px',
                // confirmButtonText: 'OK',
                // denyButtonText: 'Continuar',
                cancelButtonText: 'Esta bien 👍', //Ya toma el color gris por defecto
                //confirmButtonColor: "#dd3333", 
                cancelButtonColor: color //1d7d4d 

            });
        }
    </script>

    <script src="../../../jsdashboard/sb-admin-2.min.js"></script>
    <script src="../../../jsdashboard/jquery.min.js"></script>
    <script src="../../js/validaciongeneral.js"></script>
    <!-- <script src="../../js/funcionswal.js"></script> -->
    <script src="../../../assets/datatables/datatables.min.js"></script>
    <script src="js/tablapaciente.js"></script>
    <script src="js/datospaciente.js"></script>
</body>

</html>