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

    <ul class="navbar-nav ml-auto">

        <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link" onclick="location.href='../agregar/'" title="volver">
                <i class="fas fa-undo-alt fa-fw"></i>
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