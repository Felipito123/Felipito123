<!-- Topbar -->
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow p-5" style="border-top: 4px solid #e74a3b;">
    <div class="container">
        <!--style="padding-left: 250px;"-->
        <div class="row">
            <div class="col-lg-12">
                <i class="fas fa-pills" style="font-size: 45px;"></i>
            </div>
            <!-- <span class="pt-2 pr-1">Bienvenido </span> -->
        </div>
    </div>

    <!-- Topbar Search -->
    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
        <div class="input-group">
            <input type="text" class="form-control bg-light border-0 small" placeholder="Buscar aquí..." aria-label="Search" aria-describedby="basic-addon2" id="inputbuscar" autocomplete="off">
            <div class="input-group-append">
                <label class="pl-2 text-danger" for="inputbuscar">
                    <i class="fas fa-search fa-sm"></i>
                </label>
            </div>
        </div>
    </form>

    <ul class="navbar-nav ml-auto">
        <?php
        if (isset($_SESSION["carrito"])) {
            $largodelarreglo = count($_SESSION["carrito"]);
        } else {
            $largodelarreglo = 0;
        }

        ?>

        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
        <li class="nav-item dropdown no-arrow d-sm-none">
            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
            </a>
            <!-- Dropdown - Messages -->
            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small" placeholder="Buscar aquí..." aria-label="Search" aria-describedby="basic-addon2" id="inputbuscar2">
                        <div class="input-group-append">
                            <span class="pl-2 pt-1 text-danger" id="btnbuscarmed2">
                                <i class="fas fa-search fa-sm"></i>
                            </span>
                        </div>
                    </div>
                </form>
            </div>
        </li>


        <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" onclick="location.href='../listado/'" title="ver lista de medicamentos">
                <i class="fas fa-shopping-bag fa-fw"></i>
                <span class="badge badge-danger badge-counter" id="contadordecarrito_topbar"><?php echo $largodelarreglo ?></span>
            </a>
        </li>
        

        <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" onclick="location.href='../micuenta/'" title="Mi cuenta">
            <i class="fas fa-user-circle"></i>
            </a>
        </li>


        <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" data-toggle="modal" data-target="#modalcerrarsesion" title="Cerrar sesión">
                <i class="fas fa-sign-out-alt fa-fw"></i>
            </a>
        </li>

    </ul>

</nav>
<!-- End of Topbar -->

<!-- Modal Cerrar Sesión -->
<div class="modal fade" id="modalcerrarsesion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">¿Está seguro(a) que desea salir de Farmacia en linea?
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">No, deseo permanecer</button>
                <a class="btn btn-danger" href="javascript:void(0)" onclick="location.href='../cerrarsesion.php'">Si, estoy seguro(a)</a>
            </div>
        </div>
    </div>
</div>