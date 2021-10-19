<?php
$sesion_iniciada = false;
$usuario = null;
if (isset($_SESSION['sesionCESFAM'])) {
    $sesion_iniciada = true;
    $usuario = $_SESSION['sesionCESFAM'];

    if (isset($_SESSION['sesionCESFAM']['id_rol'])) {
        $rol = $_SESSION['sesionCESFAM']['id_rol'];
    }
}

/*COOKIE PARA EL TEMA */
if (isset($_COOKIE['color'])) {
    $temadelacookie = $_COOKIE['color'];
} else {
    $temadelacookie = 'primary'; //valor por defecto
}


?>

<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-<?php echo $temadelacookie; ?> sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="../indice">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-clinic-medical"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Salud Los Álamos<sup></sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">


    <?php if ($sesion_iniciada) { ?>
        <li class="nav-item" id="indice">
            <a class="nav-link" href="../indice/">
                <i class="fas fa-fw fa-home"></i>
                <span>Inicio</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="https://webmail.saludlosalamos.cl/logout/?locale=es" target="_blank">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Webmail</span>
            </a>
        </li>

        <li class="nav-item">

            <label class="nav-link" data-toggle="modal" data-target="#menunavegable">
                <i class="fas fa-compass"></i>
                <span>Menú Navegable</span>
            </label>


        </li>

    <?php } ?>

    <?php if ($sesion_iniciada && ($rol != 22)) { ?>
        <li class="nav-item" id="soportetecnico">
            <a class="nav-link" href="../soportetecnico/">
                <i class="fas fa-comments"></i>
                <span>Soporte Técnico</span>
            </a>
        </li>
    <?php } ?>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <div class="sidebar-heading p-1 " style="font-size: .71rem;">
        <div class="text-center"> <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
        <div class="text-center"> Corporación </div>
    </div>

    <li class="nav-item" id="consultacorporativa">
        <a class="nav-link" href="../consultacorporativa/">
            <i class="fas fa-chalkboard-teacher"></i>
            <span>Consulta Corporativa</span>
        </a>
    </li>


    <!-- Divider -->
    <!-- <hr class="sidebar-divider"> -->


    <?php if ($sesion_iniciada && isset($rol)) { ?>
        <!--$rol == 1 || $rol == 2 || $rol == 3 || $rol == 4 || $rol == 5) -->

        <div class="sidebar-heading p-1 " style="font-size: .71rem;">
            <div class="text-center"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
            <div class="text-center"> Mi cuenta </div>
        </div>
        <!-- Nav Item - Mi cuenta -->
        <li class="nav-item" id="micuenta">
            <a class="nav-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                <!-- href="#"-->
                <i class="fas fa-fw fa-cog"></i>
                <span>Mi cuenta</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Mi cuenta:</h6>
                    <a class="collapse-item" href="../micuenta/">Mi cuenta</a>
                    <a class="collapse-item" href="../uscalidad/">Calidad</a>
                    <a class="collapse-item" href="../uscalendario/">Calendario</a>
                    <!--micuenta-evento -->
                </div>
            </div>
        </li>

        <!-- Nav Item - Firma Digital -->
        <li class="nav-item" id="firmadigital">
            <a class="nav-link" href="../firmadigital/">
                <i class="fas fa-paint-brush"></i>
                <span>Firma Digital</span>
            </a>
        </li>

        <!-- Nav Item - Videochat -->
        <li class="nav-item" id="videochatusuario">
            <a class="nav-link" href="../uzoom/">
                <i class="fas fa-video"></i>
                <span>VideoChat</span>
            </a>
        </li>
    <?php  } ?>

    <?php if ($sesion_iniciada && isset($rol)) { ?>
        <!-- && ($rol == 7 || $rol == 8 || $rol == 9 || $rol == 10 || $rol == 10 || $rol == 11 || $rol == 12 || $rol == 13) -->
        <!-- Nav Item - Permiso Especial -->

        <div class="sidebar-heading p-1 " style="font-size: .71rem;">
            <div class="text-center"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
            <div class="text-center"> Permisos </div>
        </div>

        <li class="nav-item" id="permisoespecial">
            <a class="nav-link" href="../permisoespecial/">
                <i class="icofont-certificate" style="font-size: 18px;"></i>
                <span>Permiso Especial</span>
            </a>
        </li>

        <!-- Nav Item - Permiso Administrativo -->
        <li class="nav-item" id="permisoadministrativo">
            <a class="nav-link" href="../permisoadministrativo/">
                <i class="icofont-ebook" style="font-size: 18px;"></i>
                <span>Permiso Administrativo</span>
            </a>
        </li>

        <!-- Nav Item - Permiso Administrativo -->
        <li class="nav-item" id="permisoferiadolegal">
            <a class="nav-link" href="../permisoferiadolegal/">
                <i class="icofont-legal" style="font-size: 19px;"></i>
                <span>Permiso Feriado Legal</span>
            </a>
        </li>

    <?php  } ?>


    <!--Todos los funcionarios pueden solicitar, excepto el enc. de bodega  -->
    <?php if ($sesion_iniciada && (isset($rol) && $rol != 21)) { ?>
        <!-- Nav Item - Solicitud de material de aseo, oficina e higiene -->

        <div class="sidebar-heading p-1 " style="font-size: .71rem;">
            <div class="text-center"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
            <div class="text-center"> Solicitar Material </div>
        </div>

        <li class="nav-item" id="solicitarmaterialesAbodega">
            <a class="nav-link" href="../solicitarMatBodega/">
                <i class="fas fa-truck-loading"></i>
                <!-- <i class="icofont-legal" style="font-size: 19px;"></i> -->
                <span>Solicitar Material de Aseo, Oficina e Higiene</span>
            </a>
        </li>
    <?php  } ?>



    <?php if ($sesion_iniciada && ($rol == 7 || $rol == 8 ||  $rol == 11 || $rol == 12 || $rol == 13 || $rol == 15)) { ?>
        <!--Tanto el permiso administrativo como feriado legal lo visan las mismas personas jefe directo, enc.personal, J.sistema de salud -->

        <div class="sidebar-heading p-1 " style="font-size: .71rem;">
            <div class="text-center"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
            <div class="text-center"> Solicitudes </div>
        </div>
    <?php } ?>

    <?php if ($sesion_iniciada && ($rol == 7 || $rol == 8 || $rol == 12 || $rol == 13)) { ?>

        <!-- Nav Item - Menú Permisos -->

        <li class="nav-item" id="solicitudpermisoespecial">
            <a class="nav-link" href="../SPE/">
                <i class="icofont-certificate"></i>
                <span>Solicitudes <br>De Permiso Especial</span>
            </a>
        </li>

    <?php } ?>

    <?php if ($sesion_iniciada && ($rol == 7 || $rol == 8 ||  $rol == 11 || $rol == 12 || $rol == 13 || $rol == 15)) { ?>
        <!--Tanto el permiso administrativo como feriado legal lo visan las mismas personas jefe directo, enc.personal, J.sistema de salud -->

        <li class="nav-item" id="solicitudpermisoadministrativo">
            <a class="nav-link" href="../SPA/">
                <i class="icofont-ebook"></i>
                <span>Solicitudes <br>De Permiso Administrativo</span>
            </a>
        </li>

        <li class="nav-item" id="solicituddeferiadolegal">
            <a class="nav-link" href="../SFL/">
                <i class="icofont-legal" style="font-size: 19px;"></i>
                <span>Solicitudes <br>De Feriado Legal</span>
            </a>
        </li>
    <?php } ?>


    <?php if ($sesion_iniciada && ($rol == 2 || $rol == 3)) { ?>
        <div class="sidebar-heading p-1 " style="font-size: .71rem;">
            <div class="text-center"> <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
            <div class="text-center"> Administración </div>
        </div>
    <?php } ?>

    <?php if ($sesion_iniciada && ($rol == 2 || $rol == 3)) { ?>

        <!-- <div class="sidebar-heading p-1 " style="font-size: .71rem;">
            <div class="text-center"> <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
            <div class="text-center"> Administración </div>
        </div> -->

        <!-- Nav Item - Menú Administración -->
        <li class="nav-item" id="administracion">
            <a class="nav-link collapsed" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                <!-- href="#"-->
                <i class="fas fa-fw fa-globe"></i>
                <span>Administración web</span>
            </a>
            <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Administración web:</h6>
                    <a class="collapse-item" href="../categorias/">Categorías</a>
                    <a class="collapse-item" href="../articulos/">Ver Artículos</a>
                    <a class="collapse-item" href="../publicararticulo/">Publicar Artículo</a>
                    <a class="collapse-item" href="../bannerimagenes/">Banner de Imágenes</a>
                    <a class="collapse-item" href="../bannervideos/">Banner de Videos</a>
                    <a class="collapse-item" href="../bandeja/">Bandeja de mensajes</a>
                    <a class="collapse-item" href="../admgaleria/">Galería de imágenes</a>
                </div>
            </div>
        </li>

        <!-- Nav Item - Videochat -->
        <li class="nav-item" id="videochat">
            <a class="nav-link" href="../admzoom/">
                <i class="fas fa-video"></i>
                <span>Gestión de Videochat</span>
            </a>
        </li>

    <?php } ?>

    <?php if ($sesion_iniciada && ($rol == 2 || $rol == 3 || $rol == 11)) { //Administrador/a, Superadministrador Y Director
    ?>

        <!-- Heading -->
        <div class="sidebar-heading p-1 " style="font-size: .71rem;">
            <div class="text-center"> <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
            <div class="text-center"> Gráficos </div>
        </div>

        <!-- Nav Item - Gráfico -->
        <li class="nav-item" id="graph">
            <a class="nav-link" href="../escritorio/">
                <i class="fas fa-fw fa-chart-area"></i>
                <span>Escritorio y Gráficos</span>
            </a>
        </li>

    <?php } ?>

    <?php if ($sesion_iniciada && ($rol == 11 || $rol == 7)) { //Director y Jefe Sector 
    ?>

        <div class="sidebar-heading p-1 " style="font-size: .71rem;">
            <div class="text-center"> <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
            <div class="text-center">Administración
                <!--Videoconferencia-->
                <!--Administración-->
            </div>
        </div>

        <!-- Nav Item - Videochat -->
        <li class="nav-item" id="videochat">
            <a class="nav-link" href="../admzoom/">
                <i class="fas fa-video"></i>
                <span>Gestión de Videochat</span>
            </a>
        </li>
    <?php } ?>

    <?php if ($sesion_iniciada && $rol == 2) { //Administrador/a 
    ?>

        <!-- Heading  Calendario de Eventos -->
        <div class="sidebar-heading p-1 " style="font-size: .71rem;">
            <div class="text-center"> <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
            <div class="text-center"> Calendario de Eventos </div>
        </div>

        <!-- Nav Item - Eventos -->
        <li class="nav-item" id="eventos">
            <a class="nav-link" href="../eventos/">
                <i class="fas fa-calendar-week"></i>
                <span>Gestión de Calendario</span>
            </a>
        </li>
    <?php } ?>



    <?php if ($sesion_iniciada && $rol == 4) { //Área Calidad 
    ?>
        <!-- Divider -->
        <!-- <hr class="sidebar-divider"> -->

        <!-- Heading -->
        <div class="sidebar-heading p-1 " style="font-size: .71rem;">
            <div class="text-center"> <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
            <div class="text-center"> Área Calidad </div>
        </div>


        <!-- Nav Item - Calidad -->
        <li class="nav-item" id="calidad">
            <a class="nav-link" href="../admcalidad/">
                <i class="fas fa-medal" style="font-size: 18px;"></i>
                <span>Registro Calidad</span>
            </a>
        </li>
    <?php }  ?>

    <?php if ($sesion_iniciada && $rol == 5) { ?>
        <!-- Divider -->
        <!-- <hr class="sidebar-divider"> -->

        <!-- Heading -->
        <div class="sidebar-heading p-1 " style="font-size: .71rem;">
            <div class="text-center"> <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
            <div class="text-center"> Salud bucal </div>
        </div>


        <!-- Nav Item - Categoria Odontologo -->
        <li class="nav-item" id="categoria_odonto">
            <a class="nav-link" href="../categoriaodonto/">
                <i class="fas fa-stream"></i>
                <span>Categorías</span>
            </a>
        </li>

        <!-- Nav Item - Ver articulos -->
        <li class="nav-item" id="articulos_odonto">
            <a class="nav-link" href="../admodonto/">
                <i class="fas fa-tooth"></i>
                <span>Ver Artículos</span>
            </a>
        </li>

        <!-- Nav Item - Crear articulos -->
        <li class="nav-item" id="crear_articulo_odonto">
            <a class="nav-link" href="../crearartodonto/">
                <i class="fas fa-notes-medical"></i>
                <span>Crear Artículo</span>
            </a>
        </li>
    <?php }  ?>


    <?php if ($sesion_iniciada && $rol == 6) { ?>
        <!-- Divider -->
        <!-- <hr class="sidebar-divider"> -->

        <!-- Heading -->
        <div class="sidebar-heading p-1 " style="font-size: .71rem;">
            <div class="text-center"> <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
            <div class="text-center"> Farmacia </div>
        </div>

        <li class="nav-item" id="pacientes">
            <a class="nav-link" href="../pacientes/">
                <i class="fas fa-hospital-user"></i>
                <span>Gestión de Pacientes</span></a>
        </li>

        <!-- Nav Item - Medicamentos -->
        <li class="nav-item" id="farmacia">
            <a class="nav-link" href="../medicamentos/">
                <i class="fas fa-briefcase-medical"></i>
                <span>Medicamentos</span>
            </a>
        </li>

        <!-- Nav Item - Medicamentos -->
        <li class="nav-item" id="solicitudes">
            <a class="nav-link" href="../solicitudes/">
                <i class="fab fa-readme"></i>
                <span>Solicitudes de medicamentos</span>
            </a>
        </li>

        <!-- Heading -->
        <div class="sidebar-heading p-1 " style="font-size: .71rem;">
            <div class="text-center"> <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
            <div class="text-center"> Agenda medicamentos </div>
        </div>

        <!-- Nav Item - Medicamentos -->
        <li class="nav-item" id="retiromedicamento">
            <a class="nav-link" href="../RetiroMed/">
                <i class="fas fa-hand-holding-medical"></i>
                <span>Retiro de medicamentos</span>
            </a>
        </li>
    <?php }  ?>

    <?php if ($sesion_iniciada && $rol == 14) { ?>
        <!-- Divider -->
        <!-- <hr class="sidebar-divider"> -->

        <!-- Heading -->
        <div class="sidebar-heading p-1 " style="font-size: .71rem;">
            <div class="text-center"> <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
            <div class="text-center"> Comité de Gestión de Consultas Ciudadanas </div>
        </div>

        <li class="nav-item" id="gestionlibrorsf">
            <a class="nav-link" href="../GestionLibroRSF/">
                <i class="fas fa-hospital-user"></i>
                <span>Gestión Libro R.S.F (OIRS)</span></a>
        </li>

    <?php }  ?>



    <?php if ($sesion_iniciada && $rol == 3) { ?>
        <!-- Divider -->
        <!-- <hr class="sidebar-divider"> -->

        <!-- Heading -->
        <div class="sidebar-heading p-1 " style="font-size: .71rem;">
            <div class="text-center"> <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
            <div class="text-center"> SuperAdministración </div>
        </div>

        <!-- Nav Item - SuperAdministrador -->
        <!--  <li class="nav-item" id="SuperADMIN">
            <a class="nav-link collapsed" data-toggle="collapse" data-target="#superadmin" aria-expanded="true" aria-controls="collapseUtilities">
                
                <i class="fas fa-fw fa-wrench"></i>
                <span>Usuarios</span>
            </a>
            <div id="superadmin" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header"> SuperAdministrador:</h6>
                    <a class="collapse-item" href="superadmin.php">Usuarios</a>
                    <a class="collapse-item" href="documentos.php">Documentos</a>
                    <a class="collapse-item" href="eventos-admin.php">Eventos</a>
                    <a class="collapse-item" href="#">Vacaciones</a>
                </div>
            </div>
        </li>-->

        <!-- Nav Item - Funcionarios -->
        <li class="nav-item" id="usuariosadmin">
            <a class="nav-link" href="../usuarios/">
                <i class="fas fa-users"></i>
                <span>Funcionarios</span></a>
        </li>

        <!-- Nav Item - Documentos -->
        <li class="nav-item" id="documentosadmin">
            <a class="nav-link" href="../documentos/">
                <i class="fas fa-file-alt"></i>
                <span>Gestión de Documentos</span></a>
        </li>


        <!-- Heading  Calendario de Eventos -->
        <div class="sidebar-heading p-1 " style="font-size: .71rem;">
            <div class="text-center"> <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
            <div class="text-center"> Calendario de Eventos </div>
        </div>

        <!-- Nav Item - Eventos -->
        <li class="nav-item" id="eventos">
            <a class="nav-link" href="../eventos/">
                <i class="fas fa-calendar-week"></i>
                <span>Gestión de Calendario</span>
            </a>
        </li>


        <!-- Nav Item - Vacaciones -->
        <!-- <li class="nav-item" id="vacacionesadmin">
            <a class="nav-link" href="../vacaciones/">
                <i class="fas fa-umbrella-beach"></i>
                <span>Vacaciones</span></a>
        </li> -->


        <!-- Heading -->
        <div class="sidebar-heading p-1 " style="font-size: .71rem;">
            <div class="text-center"> <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
            <div class="text-center"> Farmacia </div>
        </div>

        <li class="nav-item" id="pacientes">
            <a class="nav-link" href="../pacientes/">
                <i class="fas fa-hospital-user"></i>
                <span>Gestión de Pacientes</span></a>
        </li>

        <!-- Heading -->
        <div class="sidebar-heading p-1 " style="font-size: .71rem;">
            <div class="text-center"> <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
            <div class="text-center"> Inventario Bodega </div>
        </div>

        <li class="nav-item" id="inventariobodega">
            <a class="nav-link" href="../inventarioBodega/">
                <i class="fas fa-pallet"></i>
                <span>Inventario de materiales de aseo, oficina e higiene</span>
            </a>
        </li>

        <li class="nav-item" id="solicitudesbodega">
            <a class="nav-link" href="../solicitudesBodega/">
                <i class="fas fa-box-tissue"></i>
                <span>Solicitudes de materiales de aseo, oficina e higiene</span>
            </a>
        </li>


    <?php } ?>



    <?php if ($sesion_iniciada && $rol == 21) { ?>
        <!-- Divider -->
        <!-- <hr class="sidebar-divider"> -->

        <!-- Heading -->
        <div class="sidebar-heading p-1 " style="font-size: .71rem;">
            <div class="text-center"> <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
            <div class="text-center"> Inventario Bodega </div>
        </div>

        <li class="nav-item" id="inventariobodega">
            <a class="nav-link" href="../inventarioBodega/">
                <i class="fas fa-pallet"></i>
                <span>Inventario de materiales de aseo, oficina e higiene</span>
            </a>
        </li>

        <li class="nav-item" id="solicitudesbodega">
            <a class="nav-link" href="../solicitudesBodega/">
                <i class="fas fa-box-tissue"></i>
                <span>Solicitudes de materiales de aseo, oficina e higiene</span>
            </a>
        </li>

    <?php } ?>

    <?php if ($sesion_iniciada && ($rol == 7 || $rol == 8 || $rol == 11 || $rol == 16 || $rol == 17)) { ?>
        <!-- Divider -->
        <!-- <hr class="sidebar-divider"> -->

        <!-- Heading -->
        <div class="sidebar-heading p-1 " style="font-size: .71rem;">
            <div class="text-center"> <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
            <div class="text-center"> Calendario de Eventos </div>
        </div>

        <!-- Nav Item - Eventos -->
        <li class="nav-item" id="eventosadmin">
            <a class="nav-link" href="../eventos/">
                <i class="fas fa-calendar-week"></i>
                <span>Gestión de Calendario</span></a>
        </li>

    <?php } ?>

    <?php if ($sesion_iniciada && ($rol == 22)) { ?>
        <!--VE ESTA PANTALLA EL ENC. DE SOPORTE TÉCNICO-->

        <!-- Heading -->
        <div class="sidebar-heading p-1 " style="font-size: .71rem;">
            <div class="text-center"> <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
            <div class="text-center"> Monitoreo y Soporte Técnico </div>
        </div>

        <li class="nav-item" id="gestionsoportetecnico">
            <a class="nav-link" href="../Gestionsoportetecnico/">
                <i class="fas fa-comments"></i>
                <span>Gestión de soporte técnico</span>
            </a>
        </li>
    <?php } ?>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading p-1 " style="font-size: .71rem;">
        <div class="text-center"> <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
        <div class="text-center"> Página web </div>
    </div>


    <!-- Nav Item - Inicio de la Página web -->
    <li class="nav-item">
        <a class="nav-link" href="../inicio/" target="_blank">
            <i class="fas fa-home"></i>
            <span>Inicio</span></a>
    </li>

    <!-- Nav Item - Servicio de Salud -->
    <li class="nav-item">
        <a class="nav-link collapsed" data-toggle="collapse" data-target="#paginaserviciodesalud" aria-expanded="true" aria-controls="collapsePages">
            <!-- href="#"-->
            <i class="fas fa-fw fa-folder"></i>
            <span>Servicio de Salud</span>
        </a>
        <div id="paginaserviciodesalud" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Servicio de Salud:</h6>
                <a class="collapse-item" href="../mision/" target="_blank">Misión</a>
                <a class="collapse-item" href="../vision/" target="_blank">Visión</a>
                <a class="collapse-item" href="../organigrama/" target="_blank">Organigrama</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - De interés -->
    <li class="nav-item">
        <a class="nav-link collapsed" data-toggle="collapse" data-target="#paginadeinteres" aria-expanded="true" aria-controls="collapsePages">
            <!-- href="#"-->
            <i class="fas fa-fw fa-folder"></i>
            <span>De interés</span>
        </a>
        <div id="paginadeinteres" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">De interés:</h6>
                <a class="collapse-item" href="../jefesdesector/" target="_blank">Jefes de Sector</a>
                <a class="collapse-item" href="../reddepostas/" target="_blank">Red de postas</a>
                <a class="collapse-item" href="../pgaleria/" target="_blank">Galería</a>
                <div class="collapse-divider"></div>
                <h6 class="collapse-header">Otros:</h6>
                <a class="collapse-item" href="../telefonos/" target="_blank">Teléfonos</a>
                <a class="collapse-item" href="../LibroRSF/" target="_blank">Libro R.S.F</a>
                <a class="collapse-item" href="https://deis.minsal.cl/" target="_blank">Estadística de salud</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Sectores -->
    <li class="nav-item">
        <a class="nav-link" href="../sectores/" target="_blank">
            <i class="fas fa-fw fa-folder"></i>
            <span>Sectores</span></a>
    </li>


    <!-- Nav Item - Programas -->
    <li class="nav-item">
        <a class="nav-link" href="../programas/" target="_blank">
            <i class="fas fa-fw fa-folder"></i>
            <span>Programas</span></a>
    </li>

    <!-- Nav Item - PLANES -->
    <li class="nav-item">
        <a class="nav-link collapsed" data-toggle="collapse" data-target="#paginaPLANES" aria-expanded="true" aria-controls="collapsePages">
            <!-- href="#"-->
            <i class="fas fa-fw fa-folder"></i>
            <span>Planes</span>
        </a>
        <div id="paginaPLANES" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Planes:</h6>
                <a class="collapse-item" href="../planauge/" target="_blank">Plan Auge</a>
                <a class="collapse-item" href="../plannacionaldecancer/" target="_blank">Plan Nacional De Cáncer</a>
            </div>
        </div>
    </li>


    <!-- Nav Item - Noticias -->
    <li class="nav-item">
        <a class="nav-link" href="../noticias/" target="_blank">
            <i class="fas fa-newspaper"></i>
            <span>Noticias</span></a>
    </li>

    <!-- Nav Item - Salud bucal -->
    <li class="nav-item">
        <a class="nav-link" href="../saludbucal/" target="_blank">
            <i class="fas fa-teeth"></i>
            <span>Salud bucal</span></a>
    </li>

    <!-- Nav Item - Farmacia -->
    <li class="nav-item">
        <a class="nav-link" href="../farmaciaenlinea/" target="_blank">
            <i class="fas fa-briefcase-medical"></i>
            <span>Farmacia en linea</span></a>
    </li>

    <!-- Nav Item - Contacto -->
    <li class="nav-item">
        <a class="nav-link" href="../covid19/" target="_blank">
            <i class="fas fa-viruses"></i>
            <span>Covid-19</span></a>
    </li>

    <!-- Nav Item - Contacto -->
    <li class="nav-item">
        <a class="nav-link" href="../contacto/" target="_blank">
            <i class="fas fa-id-card-alt"></i>
            <span>Contáctanos</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->

<!-- este script lo agregue aquí para que me detectara el boton del sidebar para achicar el sidebar -->