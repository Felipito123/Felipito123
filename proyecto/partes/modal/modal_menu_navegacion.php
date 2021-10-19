<div id="menunavegable" class="modal" data-easein="bounceIn" tabindex="-1" role="dialog" aria-labelledby="costumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xs" style="font-family: 'Roboto', sans-serif;">
        <div class="modal-content" style="border: none;border-radius: 2px;box-shadow: 0 16px 28px 0 rgba(0,0,0,0.22),0 25px 55px 0 rgba(0,0,0,0.21);">
            <div class="modal-header text-center" style="padding-top: 15px;padding-right: 26px;padding-left: 26px;padding-bottom: 0px;border-bottom: 0;">
                <h4 class="modal-title text-center" id="exampleModalLabel" style="font-size: 34px; color:#333;">
                    <!-- Menú navegable -->
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="float: right;font-size: 21px;font-weight: 700;line-height: 1;color: #000;text-shadow: 0 1px 0 #fff;filter: alpha(opacity=20);opacity: .2;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="border-bottom: 0;padding-top: 5px;padding-right: 26px;padding-left: 26px;padding-bottom: 10px;font-size: 15px;">
                <div class="row">

                    <div class="col-xl-12 col-sm-12">
                        <div class="card shadow-sm p-3 card-1">
                            <div class="info d-flex justify-content-between align-items-center">
                                <div class="group d-flex flex-column"> <span class="font-weight-bold">Menú navegable</span> <small>En esta sección puedes encontrar el menú para navegar en el sistema.</small> </div> <!-- <i class="fa fa-bell-o fa-fw" style="color:red;"> </i> -->
                            </div>

                            <div class="row justify-content-center pt-1">
                                <!-- <div class="col-xl-6 col-sm-6"><i style="color: #86ecf9;" class="fa fa-circle" aria-hidden="true"></i> Módulo General</div>
                                        <div class="col-xl-6 col-sm-6"><i style="color: #ffa900;" class="fa fa-circle" aria-hidden="true"></i> Módulo Privado</div> -->
                                <div class="col-xl-6 col-sm-6"><i style="color: #00b74a;" class="fa fa-circle" aria-hidden="true"></i> General</div>
                                <div class="col-xl-6 col-sm-6"><i style="color: #b23cfd;" class="fa fa-circle" aria-hidden="true"></i> Privado</div>
                            </div>

                            <div class="card bg-secondary p-2 mt-3 card-2 px-4 text-white py-2 pb-2" onclick="location.href='../indice/'">
                                <!--Con el py-2 controlo el tamaño del card -->
                                <div class="info d-flex justify-content-between align-items-center">
                                    <div class="group d-flex flex-column text-white"> <span class="font-weight-bold"> <i style="color: #00b74a;" class="fa fa-circle fa-sm" aria-hidden="true"></i> Inicio</span> <small> </small> </div> <i class="fas fa-fw fa-home text-white"></i>
                                    <!--<i class="fa fa-angle-right text-white"></i> -->
                                </div>
                            </div>

                            <div class="card bg-secondary p-2 mt-3 card-2 px-4 text-white py-2 pb-2" onclick="window.open('https://webmail.saludlosalamos.cl/logout/?locale=es','_blank')">
                                <div class="info d-flex justify-content-between align-items-center">
                                    <div class="group d-flex flex-column text-white"> <span class="font-weight-bold"><i style="color: #00b74a;" class="fa fa-circle fa-sm" aria-hidden="true"></i> Webmail</span> <small>
                                            <!-- 14 students from your group are online-->
                                        </small>
                                    </div> <i class="fas fa-fw fa-tachometer-alt text-white"></i>
                                </div>
                            </div>

                            <?php if ($sesion_iniciada && ($rol != 22)) { ?>
                                <div class="card bg-secondary p-2 mt-3 card-2 px-4 text-white py-2 pb-2" onclick="location.href='../soportetecnico/'">
                                    <div class="info d-flex justify-content-between align-items-center">
                                        <div class="group d-flex flex-column text-white"> <span class="font-weight-bold"><i style="color: #00b74a;" class="fa fa-circle fa-sm" aria-hidden="true"></i> Soporte Técnico </span> <small>
                                            </small>
                                        </div> <i class="fas fa-comments text-white"></i>
                                    </div>
                                </div>
                            <?php } ?>

                            <div class="card bg-secondary p-2 mt-3 card-2 px-4 text-white py-2 pb-2" onclick="location.href='../consultacorporativa/'">
                                <div class="info d-flex justify-content-between align-items-center">
                                    <div class="group d-flex flex-column text-white"> <span class="font-weight-bold"><i style="color: #00b74a;" class="fa fa-circle fa-sm" aria-hidden="true"></i> Consulta corporativa</span> <small>
                                        </small>
                                    </div> <i class="fas fa-chalkboard-teacher text-white"></i>
                                </div>
                            </div>

                            <!-- COLLAPSE MI CUENTA -->
                            <div class="card bg-secondary p-2 mt-3 card-2 px-4 text-white py-2 pb-2 with-chevron" onclick="moverFlechaSubmenu('flechauno');" data-toggle="collapse" href="#collapseMiCuenta" role="button" aria-expanded="true" aria-controls="collapseMiCuenta">
                                <div class="info d-flex justify-content-between align-items-center">
                                    <div class="group d-flex flex-column text-white"> <span class="font-weight-bold"><i style="color: #00b74a;" class="fa fa-circle fa-sm" aria-hidden="true"></i> Mi cuenta</span> <small>
                                        </small>
                                    </div>
                                    <i class="fa fa-angle-down text-white" id="flechauno"></i>
                                </div>
                            </div>

                            <div class="row justify-content-center">
                                <div class="col-xl-11 col-sm-11">
                                    <div id="collapseMiCuenta" class="collapse" style="background-color: transparent;">

                                        <div class="card bg-warning p-2 mt-3 card-2 px-4 text-white py-2 pb-2" onclick="location.href='../micuenta/'">
                                            <div class="info d-flex justify-content-between align-items-center">
                                                <div class="group d-flex flex-column text-white"> <span class="font-weight-bold"><i style="color: #00b74a;" class="fa fa-circle fa-sm" aria-hidden="true"></i> Mi cuenta</span> <small>
                                                    </small>
                                                </div> <i class="fas fa-fw fa-cog text-white"></i>
                                            </div>
                                        </div>

                                        <div class="card bg-warning p-2 mt-3 card-2 px-4 text-white py-2 pb-2" onclick="location.href='../uscalidad/'">
                                            <div class="info d-flex justify-content-between align-items-center">
                                                <div class="group d-flex flex-column text-white"> <span class="font-weight-bold"><i style="color: #00b74a;" class="fa fa-circle fa-sm" aria-hidden="true"></i> Calidad</span> <small>
                                                    </small>
                                                </div> <i class="fas fa-fw fa-cog text-white"></i>
                                            </div>
                                        </div>

                                        <div class="card bg-warning p-2 mt-3 card-2 px-4 text-white py-2 pb-2" onclick="location.href='../uscalendario/'">
                                            <div class="info d-flex justify-content-between align-items-center">
                                                <div class="group d-flex flex-column text-white"> <span class="font-weight-bold"><i style="color: #00b74a;" class="fa fa-circle fa-sm" aria-hidden="true"></i> Calendario</span> <small>
                                                    </small>
                                                </div> <i class="fas fa-fw fa-cog text-white"></i>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>


                            <!--FIRMA DIGITAL-->
                            <div class="card bg-secondary p-2 mt-3 card-2 px-4 text-white py-2 pb-2" onclick="location.href='../firmadigital/'">
                                <div class="info d-flex justify-content-between align-items-center">
                                    <div class="group d-flex flex-column text-white"> <span class="font-weight-bold"><i style="color: #00b74a;" class="fa fa-circle fa-sm" aria-hidden="true"></i> Firma Digital</span> <small>
                                        </small>
                                    </div> <i class="fas fa-paint-brush text-white"></i>
                                </div>
                            </div>

                            <!--VIDEOCHAT (FUNCIONARIO)-->
                            <div class="card bg-secondary p-2 mt-3 card-2 px-4 text-white py-2 pb-2" onclick="location.href='../uzoom/'">
                                <div class="info d-flex justify-content-between align-items-center">
                                    <div class="group d-flex flex-column text-white"> <span class="font-weight-bold"><i style="color: #00b74a;" class="fa fa-circle fa-sm" aria-hidden="true"></i> VideoChat</span> <small>
                                        </small>
                                    </div> <i class="fas fa-video text-white"></i>
                                </div>
                            </div>


                            <!-- COLLAPSE PERMISOS -->
                            <div class="card bg-secondary p-2 mt-3 card-2 px-4 text-white py-2 pb-2" onclick="moverFlechaSubmenu('flechados');" data-toggle="collapse" href="#collapsePermisos" role="button" aria-expanded="true" aria-controls="collapsePermisos">
                                <div class="info d-flex justify-content-between align-items-center">
                                    <div class="group d-flex flex-column text-white"> <span class="font-weight-bold"><i style="color: #00b74a;" class="fa fa-circle fa-sm" aria-hidden="true"></i> Permisos</span> <small>
                                        </small>
                                    </div>
                                    <i class="fa fa-angle-down text-white" id="flechados"></i>
                                </div>
                            </div>

                            <div class="row justify-content-center">
                                <div class="col-xl-11 col-sm-11">
                                    <div id="collapsePermisos" class="collapse" style="background-color: transparent;">

                                        <!--PERMISO ESPECIAL-->
                                        <div class="card bg-warning p-2 mt-3 card-2 px-4 text-white py-2 pb-2" onclick="location.href='../permisoespecial/'">
                                            <div class="info d-flex justify-content-between align-items-center">
                                                <div class="group d-flex flex-column text-white"> <span class="font-weight-bold"><i style="color: #00b74a;" class="fa fa-circle fa-sm" aria-hidden="true"></i> Permiso Especial</span> <small>
                                                    </small>
                                                </div> <i class="icofont-certificate text-white" style="font-size: 18px;"></i>
                                            </div>
                                        </div>
                                        <!--PERMISO ADMINISTRATIVO-->
                                        <div class="card bg-warning p-2 mt-3 card-2 px-4 text-white py-2 pb-2" onclick="location.href='../permisoadministrativo/'">
                                            <div class="info d-flex justify-content-between align-items-center">
                                                <div class="group d-flex flex-column text-white"> <span class="font-weight-bold"><i style="color: #00b74a;" class="fa fa-circle fa-sm" aria-hidden="true"></i> Permiso Administrativo</span> <small>
                                                    </small>
                                                </div> <i class="icofont-ebook text-white" style="font-size: 18px;"></i>
                                            </div>
                                        </div>
                                        <!--PERMISO FERIADO LEGAL-->
                                        <div class="card bg-warning p-2 mt-3 card-2 px-4 text-white py-2 pb-2" onclick="location.href='../permisoferiadolegal/'">
                                            <div class="info d-flex justify-content-between align-items-center">
                                                <div class="group d-flex flex-column text-white"> <span class="font-weight-bold"><i style="color: #00b74a;" class="fa fa-circle fa-sm" aria-hidden="true"></i> Permiso Feriado Legal</span> <small>
                                                    </small>
                                                </div> <i class="icofont-legal text-white" style="font-size: 18px;"></i>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>


                            <?php if ($sesion_iniciada && (isset($rol) && $rol != 21)) { ?>

                                <!-- COLLAPSE SOLICITAR MATERIAL -->
                                <div class="card bg-secondary p-2 mt-3 card-2 px-4 text-white py-2 pb-2" onclick="moverFlechaSubmenu('flechatres');" data-toggle="collapse" href="#collapseSolicitarMaterial" role="button" aria-expanded="true" aria-controls="collapseSolicitarMaterial">
                                    <div class="info d-flex justify-content-between align-items-center">
                                        <div class="group d-flex flex-column text-white"> <span class="font-weight-bold"><i style="color: #b23cfd;" class="fa fa-circle fa-sm" aria-hidden="true"></i> Solicitar material</span> <small>
                                            </small>
                                        </div>
                                        <i class="fa fa-angle-down text-white" id="flechatres"></i>
                                    </div>
                                </div>

                                <div class="row justify-content-center">
                                    <div class="col-xl-11 col-sm-11">
                                        <div id="collapseSolicitarMaterial" class="collapse" style="background-color: transparent;">

                                            <div class="card bg-warning p-2 mt-3 card-2 px-4 text-white py-2 pb-2" onclick="location.href='../solicitarMatBodega/'">
                                                <div class="info d-flex justify-content-between align-items-center">
                                                    <div class="group d-flex flex-column text-white"> <span class="font-weight-bold"><i style="color: #b23cfd;" class="fa fa-circle fa-sm" aria-hidden="true"></i> Solicitar Material de Aseo, Oficina e Higiene</span> <small>
                                                        </small>
                                                    </div> <i class="fas fa-truck-loading text-white"></i>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            <?php  } ?>

                            <?php if ($sesion_iniciada && ($rol == 7 || $rol == 8 ||  $rol == 11 || $rol == 12 || $rol == 13 || $rol == 15)) { ?>
                                <!-- COLLAPSE SOLICITUDES -->
                                <div class="card bg-secondary p-2 mt-3 card-2 px-4 text-white py-2 pb-2" onclick="moverFlechaSubmenu('flechacuatro');" data-toggle="collapse" href="#collapseSolicitudes" role="button" aria-expanded="true" aria-controls="collapseSolicitudes">
                                    <div class="info d-flex justify-content-between align-items-center">
                                        <div class="group d-flex flex-column text-white"> <span class="font-weight-bold"><i style="color: #b23cfd;" class="fa fa-circle fa-sm" aria-hidden="true"></i> Solicitudes</span> <small>
                                            </small>
                                        </div>
                                        <i class="fa fa-angle-down text-white" id="flechacuatro"></i>
                                    </div>
                                </div>

                                <div class="row justify-content-center">
                                    <div class="col-xl-11 col-sm-11">
                                        <div id="collapseSolicitudes" class="collapse" style="background-color: transparent;">
                                        <?php  } ?>

                                        <?php if ($sesion_iniciada && ($rol == 7 || $rol == 8 || $rol == 12 || $rol == 13)) { ?>
                                            <!--Tanto el permiso administrativo como feriado legal lo visan las mismas personas jefe directo, enc.personal, J.sistema de salud -->
                                            <div class="card bg-warning p-2 mt-3 card-2 px-4 text-white py-2 pb-2" onclick="location.href='../SPE/'">
                                                <div class="info d-flex justify-content-between align-items-center">
                                                    <div class="group d-flex flex-column text-white"> <span class="font-weight-bold"><i style="color: #b23cfd;" class="fa fa-circle fa-sm" aria-hidden="true"></i> Solicitudes De Permiso Especial</span> <small>
                                                        </small>
                                                    </div> <i class="icofont-certificate text-white" style="font-size: 18px;"></i>
                                                </div>
                                            </div>
                                        <?php  } ?>

                                        <?php if ($sesion_iniciada && ($rol == 7 || $rol == 8 ||  $rol == 11 || $rol == 12 || $rol == 13 || $rol == 15)) { ?>
                                            <!--Tanto el permiso administrativo como feriado legal lo visan las mismas personas jefe directo, enc.personal, J.sistema de salud -->

                                            <div class="card bg-warning p-2 mt-3 card-2 px-4 text-white py-2 pb-2" onclick="location.href='../SPA/'">
                                                <div class="info d-flex justify-content-between align-items-center">
                                                    <div class="group d-flex flex-column text-white"> <span class="font-weight-bold"><i style="color: #b23cfd;" class="fa fa-circle fa-sm" aria-hidden="true"></i> Solicitudes De Permiso Administrativo</span> <small>
                                                        </small>
                                                    </div> <i class="icofont-ebook text-white" style="font-size: 18px;"></i>
                                                </div>
                                            </div>

                                            <div class="card bg-warning p-2 mt-3 card-2 px-4 text-white py-2 pb-2" onclick="location.href='../SFL/'">
                                                <div class="info d-flex justify-content-between align-items-center">
                                                    <div class="group d-flex flex-column text-white"> <span class="font-weight-bold"><i style="color: #b23cfd;" class="fa fa-circle fa-sm" aria-hidden="true"></i> Solicitudes De Feriado Legal</span> <small>
                                                        </small>
                                                    </div> <i class="icofont-legal text-white" style="font-size: 18px;"></i>
                                                </div>
                                            </div>

                                        <?php } ?>


                                        <?php if ($sesion_iniciada && ($rol == 7 || $rol == 8 ||  $rol == 11 || $rol == 12 || $rol == 13 || $rol == 15)) { ?>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>

                            <!-- <div class="card bg-secondary p-2 mt-3 card-2 px-4 text-white py-2 pb-2" onclick="location.href='../indice/'">
                                        <div class="info d-flex justify-content-between align-items-center">
                                            <div class="group d-flex flex-column text-white"> <span class="font-weight-bold"><i style="color: #b23cfd;" class="fa fa-circle fa-sm" aria-hidden="true"></i> Nada</span> <small>
                                                </small>
                                            </div> <i class="fas fa-car text-white"></i>
                                        </div>
                                    </div> -->

                            <?php if ($sesion_iniciada && ($rol == 2 || $rol == 3)) { ?>

                                <!-- COLLAPSE ADMINISTRACIÓN WEB -->
                                <div class="card bg-secondary p-2 mt-3 card-2 px-4 text-white py-2 pb-2" onclick="moverFlechaSubmenu('flechacinco');" data-toggle="collapse" href="#collapseAdminWeb" role="button" aria-expanded="true" aria-controls="collapseAdminWeb">
                                    <div class="info d-flex justify-content-between align-items-center">
                                        <div class="group d-flex flex-column text-white"> <span class="font-weight-bold"><i style="color: #b23cfd;" class="fa fa-circle fa-sm" aria-hidden="true"></i> Administración Web</span> <small>
                                            </small>
                                        </div>
                                        <i class="fa fa-angle-down text-white" id="flechacinco"></i>
                                    </div>
                                </div>

                                <div class="row justify-content-center">
                                    <div class="col-xl-11 col-sm-11">
                                        <div id="collapseAdminWeb" class="collapse" style="background-color: transparent;">

                                            <!--CATEGORÍAS-->
                                            <div class="card bg-warning p-2 mt-3 card-2 px-4 text-white py-2 pb-2" onclick="location.href='../categorias/'">
                                                <div class="info d-flex justify-content-between align-items-center">
                                                    <div class="group d-flex flex-column text-white"> <span class="font-weight-bold"><i style="color: #b23cfd;" class="fa fa-circle fa-sm" aria-hidden="true"></i> Categorías</span> <small>
                                                        </small>
                                                    </div> <i class="fas fa-globe text-white"></i>
                                                </div>
                                            </div>
                                            <!--VER ARTÍCULOS-->
                                            <div class="card bg-warning p-2 mt-3 card-2 px-4 text-white py-2 pb-2" onclick="location.href='../articulos/'">
                                                <div class="info d-flex justify-content-between align-items-center">
                                                    <div class="group d-flex flex-column text-white"> <span class="font-weight-bold"><i style="color: #b23cfd;" class="fa fa-circle fa-sm" aria-hidden="true"></i> Ver Artículos</span> <small>
                                                        </small>
                                                    </div> <i class="fas fa-globe text-white"></i>
                                                </div>
                                            </div>
                                            <!--PUBLICAR ARTÍCULO-->
                                            <div class="card bg-warning p-2 mt-3 card-2 px-4 text-white py-2 pb-2" onclick="location.href='../publicararticulo/'">
                                                <div class="info d-flex justify-content-between align-items-center">
                                                    <div class="group d-flex flex-column text-white"> <span class="font-weight-bold"><i style="color: #b23cfd;" class="fa fa-circle fa-sm" aria-hidden="true"></i> Publicar Artículo</span> <small>
                                                        </small>
                                                    </div> <i class="fas fa-globe text-white"></i>
                                                </div>
                                            </div>
                                            <!--BANNER DE IMÁGENES-->
                                            <div class="card bg-warning p-2 mt-3 card-2 px-4 text-white py-2 pb-2" onclick="location.href='../bannerimagenes/'">
                                                <div class="info d-flex justify-content-between align-items-center">
                                                    <div class="group d-flex flex-column text-white"> <span class="font-weight-bold"><i style="color: #b23cfd;" class="fa fa-circle fa-sm" aria-hidden="true"></i> Banner de Imágenes</span> <small>
                                                        </small>
                                                    </div> <i class="fas fa-globe text-white"></i>
                                                </div>
                                            </div>
                                            <!--BANNER DE VIDEOS-->
                                            <div class="card bg-warning p-2 mt-3 card-2 px-4 text-white py-2 pb-2" onclick="location.href='../bannervideos/'">
                                                <div class="info d-flex justify-content-between align-items-center">
                                                    <div class="group d-flex flex-column text-white"> <span class="font-weight-bold"><i style="color: #b23cfd;" class="fa fa-circle fa-sm" aria-hidden="true"></i> Banner de Videos</span> <small>
                                                        </small>
                                                    </div> <i class="fas fa-globe text-white"></i>
                                                </div>
                                            </div>
                                            <!--BANDEJA DE MENSAJES-->
                                            <div class="card bg-warning p-2 mt-3 card-2 px-4 text-white py-2 pb-2" onclick="location.href='../bandeja/'">
                                                <div class="info d-flex justify-content-between align-items-center">
                                                    <div class="group d-flex flex-column text-white"> <span class="font-weight-bold"><i style="color: #b23cfd;" class="fa fa-circle fa-sm" aria-hidden="true"></i> Bandeja de mensajes</span> <small>
                                                        </small>
                                                    </div> <i class="fas fa-globe text-white"></i>
                                                </div>
                                            </div>
                                            <!--GALERÍA DE IMÁGENES-->
                                            <div class="card bg-warning p-2 mt-3 card-2 px-4 text-white py-2 pb-2" onclick="location.href='../admgaleria/'">
                                                <div class="info d-flex justify-content-between align-items-center">
                                                    <div class="group d-flex flex-column text-white"> <span class="font-weight-bold"><i style="color: #b23cfd;" class="fa fa-circle fa-sm" aria-hidden="true"></i> Galería de imágenes</span> <small>
                                                        </small>
                                                    </div> <i class="fas fa-globe text-white"></i>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="card bg-secondary p-2 mt-3 card-2 px-4 text-white py-2 pb-2" onclick="location.href='../admzoom/'">
                                    <div class="info d-flex justify-content-between align-items-center">
                                        <div class="group d-flex flex-column text-white"> <span class="font-weight-bold"><i style="color: #b23cfd;" class="fa fa-circle fa-sm" aria-hidden="true"></i> Gestión de Videochat</span> <small>
                                            </small>
                                        </div> <i class="fas fa-video text-white"></i>
                                    </div>
                                </div>

                            <?php } ?>

                            <?php if ($sesion_iniciada && ($rol == 2 || $rol == 3 || $rol == 11)) { //Administrador/a, Superadministrador Y Director 
                            ?>

                                <!-- COLLAPSE GRAFICOS -->
                                <div class="card bg-secondary p-2 mt-3 card-2 px-4 text-white py-2 pb-2" onclick="moverFlechaSubmenu('flechaseis');" data-toggle="collapse" href="#collapseGraficos" role="button" aria-expanded="true" aria-controls="collapseGraficos">
                                    <div class="info d-flex justify-content-between align-items-center">
                                        <div class="group d-flex flex-column text-white"> <span class="font-weight-bold"><i style="color: #b23cfd;" class="fa fa-circle fa-sm" aria-hidden="true"></i> Gráficos</span> <small>
                                            </small>
                                        </div>
                                        <i class="fa fa-angle-down text-white" id="flechaseis"></i>
                                    </div>
                                </div>

                                <div class="row justify-content-center">
                                    <div class="col-xl-11 col-sm-11">
                                        <div id="collapseGraficos" class="collapse" style="background-color: transparent;">

                                            <div class="card bg-warning p-2 mt-3 card-2 px-4 text-white py-2 pb-2" onclick="location.href='../escritorio/'">
                                                <div class="info d-flex justify-content-between align-items-center">
                                                    <div class="group d-flex flex-column text-white"> <span class="font-weight-bold"><i style="color: #b23cfd;" class="fa fa-circle fa-sm" aria-hidden="true"></i> Escritorio y Gráficos</span> <small>
                                                        </small>
                                                    </div> <i class="fas fa-chart-area text-white"></i>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            <?php } ?>

                            <?php if ($sesion_iniciada && ($rol == 7 || $rol == 11)) { //Jefe Sector y Director 
                            ?>

                                <!-- COLLAPSE ADMINISTRACIÓN -->
                                <div class="card bg-secondary p-2 mt-3 card-2 px-4 text-white py-2 pb-2" onclick="moverFlechaSubmenu('flechasiete');" data-toggle="collapse" href="#collapseAdministracion" role="button" aria-expanded="true" aria-controls="collapseAdministracion">
                                    <div class="info d-flex justify-content-between align-items-center">
                                        <div class="group d-flex flex-column text-white"> <span class="font-weight-bold"><i style="color: #b23cfd;" class="fa fa-circle fa-sm" aria-hidden="true"></i> Administración</span> <small>
                                            </small>
                                        </div>
                                        <i class="fa fa-angle-down text-white" id="flechasiete"></i>
                                    </div>
                                </div>

                                <div class="row justify-content-center">
                                    <div class="col-xl-11 col-sm-11">
                                        <div id="collapseAdministracion" class="collapse" style="background-color: transparent;">

                                            <div class="card bg-warning p-2 mt-3 card-2 px-4 text-white py-2 pb-2" onclick="location.href='../admzoom/'">
                                                <div class="info d-flex justify-content-between align-items-center">
                                                    <div class="group d-flex flex-column text-white"> <span class="font-weight-bold"><i style="color: #b23cfd;" class="fa fa-circle fa-sm" aria-hidden="true"></i> Gestión de Videochat</span> <small>
                                                        </small>
                                                    </div> <i class="fas fa-chart-area text-white"></i>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            <?php } ?>


                            <?php if ($sesion_iniciada && ($rol == 2 || $rol == 3 || $rol == 7 || $rol == 8 || $rol == 11 || $rol == 16 || $rol == 17)) { //Jefe Sector y Director 
                            ?>

                                <!-- COLLAPSE CALENDARIO DE EVENTOS -->
                                <div class="card bg-secondary p-2 mt-3 card-2 px-4 text-white py-2 pb-2" onclick="moverFlechaSubmenu('flechaocho');" data-toggle="collapse" href="#collapseCalendarioDeEventos" role="button" aria-expanded="true" aria-controls="collapseCalendarioDeEventos">
                                    <div class="info d-flex justify-content-between align-items-center">
                                        <div class="group d-flex flex-column text-white"> <span class="font-weight-bold"><i style="color: #b23cfd;" class="fa fa-circle fa-sm" aria-hidden="true"></i> Calendario de Eventos</span> <small>
                                            </small>
                                        </div>
                                        <i class="fa fa-angle-down text-white" id="flechaocho"></i>
                                    </div>
                                </div>

                                <div class="row justify-content-center">
                                    <div class="col-xl-11 col-sm-11">
                                        <div id="collapseCalendarioDeEventos" class="collapse" style="background-color: transparent;">

                                            <div class="card bg-warning p-2 mt-3 card-2 px-4 text-white py-2 pb-2" onclick="location.href='../eventos/'">
                                                <div class="info d-flex justify-content-between align-items-center">
                                                    <div class="group d-flex flex-column text-white"> <span class="font-weight-bold"><i style="color: #b23cfd;" class="fa fa-circle fa-sm" aria-hidden="true"></i> Gestión de Calendario</span> <small>
                                                        </small>
                                                    </div> <i class="fas fa-calendar-week text-white"></i>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            <?php } ?>

                            <?php if ($sesion_iniciada && ($rol == 4)) { //Área Calidad 
                            ?>

                                <!-- COLLAPSE ÁREA CALIDAD -->
                                <div class="card bg-secondary p-2 mt-3 card-2 px-4 text-white py-2 pb-2" onclick="moverFlechaSubmenu('flecha9');" data-toggle="collapse" href="#collapseAreaDeCalidad" role="button" aria-expanded="true" aria-controls="collapseAreaDeCalidad">
                                    <div class="info d-flex justify-content-between align-items-center">
                                        <div class="group d-flex flex-column text-white"> <span class="font-weight-bold"><i style="color: #b23cfd;" class="fa fa-circle fa-sm" aria-hidden="true"></i> Área Calidad</span> <small>
                                            </small>
                                        </div>
                                        <i class="fa fa-angle-down text-white" id="flecha9"></i>
                                    </div>
                                </div>

                                <div class="row justify-content-center">
                                    <div class="col-xl-11 col-sm-11">
                                        <div id="collapseAreaDeCalidad" class="collapse" style="background-color: transparent;">

                                            <div class="card bg-warning p-2 mt-3 card-2 px-4 text-white py-2 pb-2" onclick="location.href='../admcalidad/'">
                                                <div class="info d-flex justify-content-between align-items-center">
                                                    <div class="group d-flex flex-column text-white"> <span class="font-weight-bold"><i style="color: #b23cfd;" class="fa fa-circle fa-sm" aria-hidden="true"></i> Registro Calidad</span> <small>
                                                        </small>
                                                    </div> <i class="fas fa-medal text-white"></i>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            <?php } ?>

                            <?php if ($sesion_iniciada && ($rol == 5)) { // Salud bucal
                            ?>

                                <!-- COLLAPSE SALUD BUCAL -->
                                <div class="card bg-secondary p-2 mt-3 card-2 px-4 text-white py-2 pb-2" onclick="moverFlechaSubmenu('flecha10');" data-toggle="collapse" href="#collapseSaludBucal" role="button" aria-expanded="true" aria-controls="collapseSaludBucal">
                                    <div class="info d-flex justify-content-between align-items-center">
                                        <div class="group d-flex flex-column text-white"> <span class="font-weight-bold"><i style="color: #b23cfd;" class="fa fa-circle fa-sm" aria-hidden="true"></i> Salud bucal</span> <small>
                                            </small>
                                        </div>
                                        <i class="fa fa-angle-down text-white" id="flecha10"></i>
                                    </div>
                                </div>

                                <div class="row justify-content-center">
                                    <div class="col-xl-11 col-sm-11">
                                        <div id="collapseSaludBucal" class="collapse" style="background-color: transparent;">

                                            <div class="card bg-warning p-2 mt-3 card-2 px-4 text-white py-2 pb-2" onclick="location.href='../categoriaodonto/'">
                                                <div class="info d-flex justify-content-between align-items-center">
                                                    <div class="group d-flex flex-column text-white"> <span class="font-weight-bold"><i style="color: #b23cfd;" class="fa fa-circle fa-sm" aria-hidden="true"></i> Categorías</span> <small>
                                                        </small>
                                                    </div> <i class="fas fa-stream text-white"></i>
                                                </div>
                                            </div>

                                            <div class="card bg-warning p-2 mt-3 card-2 px-4 text-white py-2 pb-2" onclick="location.href='../admodonto/'">
                                                <div class="info d-flex justify-content-between align-items-center">
                                                    <div class="group d-flex flex-column text-white"> <span class="font-weight-bold"><i style="color: #b23cfd;" class="fa fa-circle fa-sm" aria-hidden="true"></i> Ver Artículos</span> <small>
                                                        </small>
                                                    </div> <i class="fas fa-tooth text-white"></i>
                                                </div>
                                            </div>

                                            <div class="card bg-warning p-2 mt-3 card-2 px-4 text-white py-2 pb-2" onclick="location.href='../crearartodonto/'">
                                                <div class="info d-flex justify-content-between align-items-center">
                                                    <div class="group d-flex flex-column text-white"> <span class="font-weight-bold"><i style="color: #b23cfd;" class="fa fa-circle fa-sm" aria-hidden="true"></i> Crear Artículo</span> <small>
                                                        </small>
                                                    </div> <i class="fas fa-notes-medical text-white"></i>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            <?php } ?>


                            <?php if ($sesion_iniciada && ($rol == 6)) { // Farmacia Y Agenda de retiro de medicamentos
                            ?>

                                <!-- COLLAPSE FARMACIA  -->
                                <div class="card bg-secondary p-2 mt-3 card-2 px-4 text-white py-2 pb-2" onclick="moverFlechaSubmenu('flecha11');" data-toggle="collapse" href="#collapseFarmacia" role="button" aria-expanded="true" aria-controls="collapseFarmacia">
                                    <div class="info d-flex justify-content-between align-items-center">
                                        <div class="group d-flex flex-column text-white"> <span class="font-weight-bold"><i style="color: #b23cfd;" class="fa fa-circle fa-sm" aria-hidden="true"></i> Farmacia</span> <small>
                                            </small>
                                        </div>
                                        <i class="fa fa-angle-down text-white" id="flecha11"></i>
                                    </div>
                                </div>

                                <div class="row justify-content-center">
                                    <div class="col-xl-11 col-sm-11">
                                        <div id="collapseFarmacia" class="collapse" style="background-color: transparent;">

                                            <div class="card bg-warning p-2 mt-3 card-2 px-4 text-white py-2 pb-2" onclick="location.href='../pacientes/'">
                                                <div class="info d-flex justify-content-between align-items-center">
                                                    <div class="group d-flex flex-column text-white"> <span class="font-weight-bold"><i style="color: #b23cfd;" class="fa fa-circle fa-sm" aria-hidden="true"></i> Gestión de Pacientes</span> <small>
                                                        </small>
                                                    </div> <i class="fas fa-hospital-user text-white"></i>
                                                </div>
                                            </div>

                                            <div class="card bg-warning p-2 mt-3 card-2 px-4 text-white py-2 pb-2" onclick="location.href='../medicamentos/'">
                                                <div class="info d-flex justify-content-between align-items-center">
                                                    <div class="group d-flex flex-column text-white"> <span class="font-weight-bold"><i style="color: #b23cfd;" class="fa fa-circle fa-sm" aria-hidden="true"></i> Medicamentos</span> <small>
                                                        </small>
                                                    </div> <i class="fas fa-briefcase-medical text-white"></i>
                                                </div>
                                            </div>

                                            <div class="card bg-warning p-2 mt-3 card-2 px-4 text-white py-2 pb-2" onclick="location.href='../solicitudes/'">
                                                <div class="info d-flex justify-content-between align-items-center">
                                                    <div class="group d-flex flex-column text-white"> <span class="font-weight-bold"><i style="color: #b23cfd;" class="fa fa-circle fa-sm" aria-hidden="true"></i> Solicitudes de medicamentos</span> <small>
                                                        </small>
                                                    </div> <i class="fas fa-readme text-white"></i>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <!-- COLLAPSE AGENDA DE RETIRO DE MEDICAMENTOS  -->
                                <div class="card bg-secondary p-2 mt-3 card-2 px-4 text-white py-2 pb-2" onclick="moverFlechaSubmenu('flecha12');" data-toggle="collapse" href="#collapseAgendaDeRetiro" role="button" aria-expanded="true" aria-controls="collapseAgendaDeRetiro">
                                    <div class="info d-flex justify-content-between align-items-center">
                                        <div class="group d-flex flex-column text-white"> <span class="font-weight-bold"><i style="color: #b23cfd;" class="fa fa-circle fa-sm" aria-hidden="true"></i> Agenda medicamentos</span> <small>
                                            </small>
                                        </div>
                                        <i class="fa fa-angle-down text-white" id="flecha12"></i>
                                    </div>
                                </div>

                                <div class="row justify-content-center">
                                    <div class="col-xl-11 col-sm-11">
                                        <div id="collapseAgendaDeRetiro" class="collapse" style="background-color: transparent;">

                                            <div class="card bg-warning p-2 mt-3 card-2 px-4 text-white py-2 pb-2" onclick="location.href='../RetiroMed/'">
                                                <div class="info d-flex justify-content-between align-items-center">
                                                    <div class="group d-flex flex-column text-white"> <span class="font-weight-bold"><i style="color: #b23cfd;" class="fa fa-circle fa-sm" aria-hidden="true"></i> Retiro de medicamentos</span> <small>
                                                        </small>
                                                    </div> <i class="fas fa-hand-holding-medical text-white"></i>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            <?php } ?>

                            <?php if ($sesion_iniciada && ($rol == 12)) { // Comité de Gestión de Consultas Ciudadanas
                            ?>

                                <!-- COLLAPSE COMITÉ DE GESTIÓN DE CONSULTAS CIUDADANAS  -->
                                <div class="card bg-secondary p-2 mt-3 card-2 px-4 text-white py-2 pb-2" onclick="moverFlechaSubmenu('flecha13');" data-toggle="collapse" href="#collapseConsGestCiud" role="button" aria-expanded="true" aria-controls="collapseConsGestCiud">
                                    <div class="info d-flex justify-content-between align-items-center">
                                        <div class="group d-flex flex-column text-white"> <span class="font-weight-bold"><i style="color: #b23cfd;" class="fa fa-circle fa-sm" aria-hidden="true"></i> Comité de Gestión de Consultas Ciudadanas</span> <small>
                                            </small>
                                        </div>
                                        <i class="fa fa-angle-down text-white" id="flecha13"></i>
                                    </div>
                                </div>

                                <div class="row justify-content-center">
                                    <div class="col-xl-11 col-sm-11">
                                        <div id="collapseConsGestCiud" class="collapse" style="background-color: transparent;">

                                            <div class="card bg-warning p-2 mt-3 card-2 px-4 text-white py-2 pb-2" onclick="location.href='../RetiroMed/'">
                                                <div class="info d-flex justify-content-between align-items-center">
                                                    <div class="group d-flex flex-column text-white"> <span class="font-weight-bold"><i style="color: #b23cfd;" class="fa fa-circle fa-sm" aria-hidden="true"></i> Gestión Libro R.S.F (OIRS)</span> <small>
                                                        </small>
                                                    </div> <i class="fas fa-hospital-user text-white"></i>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            <?php } ?>

                            <?php if ($sesion_iniciada && ($rol == 3)) { // Superadministrador
                            ?>

                                <!-- COLLAPSE SUPERADMINISTRACIÓN  -->
                                <div class="card bg-secondary p-2 mt-3 card-2 px-4 text-white py-2 pb-2" onclick="moverFlechaSubmenu('flecha14');" data-toggle="collapse" href="#collapseSuperadministracion" role="button" aria-expanded="true" aria-controls="collapseSuperadministracion">
                                    <div class="info d-flex justify-content-between align-items-center">
                                        <div class="group d-flex flex-column text-white"> <span class="font-weight-bold"><i style="color: #b23cfd;" class="fa fa-circle fa-sm" aria-hidden="true"></i> SuperAdministración</span> <small>
                                            </small>
                                        </div>
                                        <i class="fa fa-angle-down text-white" id="flecha14"></i>
                                    </div>
                                </div>

                                <div class="row justify-content-center">
                                    <div class="col-xl-11 col-sm-11">
                                        <div id="collapseSuperadministracion" class="collapse" style="background-color: transparent;">

                                            <div class="card bg-warning p-2 mt-3 card-2 px-4 text-white py-2 pb-2" onclick="location.href='../usuarios/'">
                                                <div class="info d-flex justify-content-between align-items-center">
                                                    <div class="group d-flex flex-column text-white"> <span class="font-weight-bold"><i style="color: #b23cfd;" class="fa fa-circle fa-sm" aria-hidden="true"></i> Funcionarios</span> <small>
                                                        </small>
                                                    </div> <i class="fas fa-users text-white"></i>
                                                </div>
                                            </div>

                                            <div class="card bg-warning p-2 mt-3 card-2 px-4 text-white py-2 pb-2" onclick="location.href='../documentos/'">
                                                <div class="info d-flex justify-content-between align-items-center">
                                                    <div class="group d-flex flex-column text-white"> <span class="font-weight-bold"><i style="color: #b23cfd;" class="fa fa-circle fa-sm" aria-hidden="true"></i> Gestión de Documentos</span> <small>
                                                        </small>
                                                    </div> <i class="fas fa-file-alt text-white"></i>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <!-- COLLAPSE FARMACIA  -->
                                <div class="card bg-secondary p-2 mt-3 card-2 px-4 text-white py-2 pb-2" onclick="moverFlechaSubmenu('flecha15');" data-toggle="collapse" href="#collapseFarmacia2" role="button" aria-expanded="true" aria-controls="collapseFarmacia2">
                                    <div class="info d-flex justify-content-between align-items-center">
                                        <div class="group d-flex flex-column text-white"> <span class="font-weight-bold"><i style="color: #b23cfd;" class="fa fa-circle fa-sm" aria-hidden="true"></i> Farmacia</span> <small>
                                            </small>
                                        </div>
                                        <i class="fa fa-angle-down text-white" id="flecha15"></i>
                                    </div>
                                </div>

                                <div class="row justify-content-center">
                                    <div class="col-xl-11 col-sm-11">
                                        <div id="collapseFarmacia2" class="collapse" style="background-color: transparent;">

                                            <div class="card bg-warning p-2 mt-3 card-2 px-4 text-white py-2 pb-2" onclick="location.href='../pacientes/'">
                                                <div class="info d-flex justify-content-between align-items-center">
                                                    <div class="group d-flex flex-column text-white"> <span class="font-weight-bold"><i style="color: #b23cfd;" class="fa fa-circle fa-sm" aria-hidden="true"></i> Gestión de Pacientes</span> <small>
                                                        </small>
                                                    </div> <i class="fas fa-hospital-user text-white"></i>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>


                            <?php } ?>

                            <?php if ($sesion_iniciada && ($rol == 3 || $rol == 21)) { // Superadministrador y Enc. De Bodega
                            ?>

                                <!-- COLLAPSE INVENTARIO BODEGA  -->
                                <div class="card bg-secondary p-2 mt-3 card-2 px-4 text-white py-2 pb-2" onclick="moverFlechaSubmenu('flecha16');" data-toggle="collapse" href="#collapseInventarioBodega" role="button" aria-expanded="true" aria-controls="collapseInventarioBodega">
                                    <div class="info d-flex justify-content-between align-items-center">
                                        <div class="group d-flex flex-column text-white"> <span class="font-weight-bold"><i style="color: #b23cfd;" class="fa fa-circle fa-sm" aria-hidden="true"></i> Inventario Bodega</span> <small>
                                            </small>
                                        </div>
                                        <i class="fa fa-angle-down text-white" id="flecha16"></i>
                                    </div>
                                </div>

                                <div class="row justify-content-center">
                                    <div class="col-xl-11 col-sm-11">
                                        <div id="collapseInventarioBodega" class="collapse" style="background-color: transparent;">

                                            <div class="card bg-warning p-2 mt-3 card-2 px-4 text-white py-2 pb-2" onclick="location.href='../inventarioBodega/'">
                                                <div class="info d-flex justify-content-between align-items-center">
                                                    <div class="group d-flex flex-column text-white"> <span class="font-weight-bold"><i style="color: #b23cfd;" class="fa fa-circle fa-sm" aria-hidden="true"></i> Inventario de materiales de aseo, <br> oficina e higiene</span> <small>
                                                        </small>
                                                    </div> <i class="fas fa-pallet text-white"></i>
                                                </div>
                                            </div>

                                            <div class="card bg-warning p-2 mt-3 card-2 px-4 text-white py-2 pb-2" onclick="location.href='../solicitudesBodega/'">
                                                <div class="info d-flex justify-content-between align-items-center">
                                                    <div class="group d-flex flex-column text-white"> <span class="font-weight-bold"><i style="color: #b23cfd;" class="fa fa-circle fa-sm" aria-hidden="true"></i> Solicitudes de materiales de aseo, oficina e higiene</span> <small>
                                                        </small>
                                                    </div> <i class="fas fa-box-tissue text-white"></i>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            <?php } ?>

                            <?php if ($sesion_iniciada && ($rol == 22)) { ?>
                                <div class="card bg-secondary p-2 mt-3 card-2 px-4 text-white py-2 pb-2" onclick="location.href='../Gestionsoportetecnico/'">
                                    <div class="info d-flex justify-content-between align-items-center">
                                        <div class="group d-flex flex-column text-white"> <span class="font-weight-bold"><i style="color: #b23cfd;" class="fa fa-circle fa-sm" aria-hidden="true"></i> Gestión de soporte técnico </span> <small>
                                            </small>
                                        </div> <i class="fas fa-comments text-white"></i>
                                    </div>
                                </div>
                            <?php } ?>


                            <!-- COLLAPSE PAGINA WEB  -->
                            <div class="card bg-secondary p-2 mt-3 card-2 px-4 text-white py-2 pb-2" onclick="moverFlechaSubmenu('flecha17');" data-toggle="collapse" href="#collapsePaginaWeb" role="button" aria-expanded="true" aria-controls="collapsePaginaWeb">
                                <div class="info d-flex justify-content-between align-items-center">
                                    <div class="group d-flex flex-column text-white"> <span class="font-weight-bold"><i style="color: #00b74a;" class="fa fa-circle fa-sm" aria-hidden="true"></i> Página Web</span> <small>
                                        </small>
                                    </div>
                                    <i class="fa fa-angle-down text-white" id="flecha17"></i>
                                </div>
                            </div>

                            <div class="row justify-content-center">
                                <div class="col-xl-11 col-sm-11">
                                    <div id="collapsePaginaWeb" class="collapse" style="background-color: transparent;">

                                        <div class="card bg-warning p-2 mt-3 card-2 px-4 text-white py-2 pb-2" onclick="window.open('../inicio/','_blank')">
                                            <div class="info d-flex justify-content-between align-items-center">
                                                <div class="group d-flex flex-column text-white"> <span class="font-weight-bold"><i style="color: #00b74a;" class="fa fa-circle fa-sm" aria-hidden="true"></i> Inicio</span> <small>
                                                    </small>
                                                </div> <i class="fas fa-home text-white"></i>
                                            </div>
                                        </div>

                                        <!-- COLLAPSE SERVICIO SALUD  -->
                                        <div class="card bg-secondary p-2 mt-3 card-2 px-4 text-white py-2 pb-2" onclick="moverFlechaSubmenu('flecha18');" data-toggle="collapse" href="#collapseServicioSalud" role="button" aria-expanded="true" aria-controls="collapseServicioSalud">
                                            <div class="info d-flex justify-content-between align-items-center">
                                                <div class="group d-flex flex-column text-white"> <span class="font-weight-bold"><i style="color: #00b74a;" class="fa fa-circle fa-sm" aria-hidden="true"></i> Servicio Salud</span> <small>
                                                    </small>
                                                </div>
                                                <i class="fa fa-angle-down text-white" id="flecha18"></i>
                                            </div>
                                        </div>

                                        <div class="row justify-content-center">
                                            <div class="col-xl-11 col-sm-11">
                                                <div id="collapseServicioSalud" class="collapse" style="background-color: transparent;">

                                                    <div class="card bg-warning p-2 mt-3 card-2 px-4 text-white py-2 pb-2" onclick="window.open('../mision/','_blank')">
                                                        <div class="info d-flex justify-content-between align-items-center">
                                                            <div class="group d-flex flex-column text-white"> <span class="font-weight-bold"><i style="color: #00b74a;" class="fa fa-circle fa-sm" aria-hidden="true"></i> Misión</span> <small>
                                                                </small>
                                                            </div> <i class="fas fa-folder text-white"></i>
                                                        </div>
                                                    </div>

                                                    <div class="card bg-warning p-2 mt-3 card-2 px-4 text-white py-2 pb-2" onclick="window.open('../vision/','_blank')">
                                                        <div class="info d-flex justify-content-between align-items-center">
                                                            <div class="group d-flex flex-column text-white"> <span class="font-weight-bold"><i style="color: #00b74a;" class="fa fa-circle fa-sm" aria-hidden="true"></i> Visión</span> <small>
                                                                </small>
                                                            </div> <i class="fas fa-folder text-white"></i>
                                                        </div>
                                                    </div>

                                                    <div class="card bg-warning p-2 mt-3 card-2 px-4 text-white py-2 pb-2" onclick="window.open('../organigrama/','_blank')">
                                                        <div class="info d-flex justify-content-between align-items-center">
                                                            <div class="group d-flex flex-column text-white"> <span class="font-weight-bold"><i style="color: #00b74a;" class="fa fa-circle fa-sm" aria-hidden="true"></i> Organigrama</span> <small>
                                                                </small>
                                                            </div> <i class="fas fa-folder text-white"></i>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        <!-- COLLAPSE DE INTERÉS  -->
                                        <div class="card bg-secondary p-2 mt-3 card-2 px-4 text-white py-2 pb-2" onclick="moverFlechaSubmenu('flecha19');" data-toggle="collapse" href="#collapseDeInteres" role="button" aria-expanded="true" aria-controls="collapseDeInteres">
                                            <div class="info d-flex justify-content-between align-items-center">
                                                <div class="group d-flex flex-column text-white"> <span class="font-weight-bold"><i style="color: #00b74a;" class="fa fa-circle fa-sm" aria-hidden="true"></i> De interés</span> <small>
                                                    </small>
                                                </div>
                                                <i class="fa fa-angle-down text-white" id="flecha19"></i>
                                            </div>
                                        </div>

                                        <div class="row justify-content-center">
                                            <div class="col-xl-11 col-sm-11">
                                                <div id="collapseDeInteres" class="collapse" style="background-color: transparent;">

                                                    <div class="card bg-warning p-2 mt-3 card-2 px-4 text-white py-2 pb-2" onclick="window.open('../jefesdesector/','_blank')">
                                                        <div class="info d-flex justify-content-between align-items-center">
                                                            <div class="group d-flex flex-column text-white"> <span class="font-weight-bold"><i style="color: #00b74a;" class="fa fa-circle fa-sm" aria-hidden="true"></i> Jefes de Sector</span> <small>
                                                                </small>
                                                            </div> <i class="fas fa-folder text-white"></i>
                                                        </div>
                                                    </div>

                                                    <div class="card bg-warning p-2 mt-3 card-2 px-4 text-white py-2 pb-2" onclick="window.open('../reddepostas/','_blank')">
                                                        <div class="info d-flex justify-content-between align-items-center">
                                                            <div class="group d-flex flex-column text-white"> <span class="font-weight-bold"><i style="color: #00b74a;" class="fa fa-circle fa-sm" aria-hidden="true"></i> Red de postas</span> <small>
                                                                </small>
                                                            </div> <i class="fas fa-folder text-white"></i>
                                                        </div>
                                                    </div>

                                                    <div class="card bg-warning p-2 mt-3 card-2 px-4 text-white py-2 pb-2" onclick="window.open('../pgaleria/','_blank')">
                                                        <div class="info d-flex justify-content-between align-items-center">
                                                            <div class="group d-flex flex-column text-white"> <span class="font-weight-bold"><i style="color: #00b74a;" class="fa fa-circle fa-sm" aria-hidden="true"></i> Galería</span> <small>
                                                                </small>
                                                            </div> <i class="fas fa-folder text-white"></i>
                                                        </div>
                                                    </div>

                                                    <div class="card bg-warning p-2 mt-3 card-2 px-4 text-white py-2 pb-2" onclick="window.open('../telefonos/','_blank')">
                                                        <div class="info d-flex justify-content-between align-items-center">
                                                            <div class="group d-flex flex-column text-white"> <span class="font-weight-bold"><i style="color: #00b74a;" class="fa fa-circle fa-sm" aria-hidden="true"></i> Teléfonos</span> <small>
                                                                </small>
                                                            </div> <i class="fas fa-folder text-white"></i>
                                                        </div>
                                                    </div>

                                                    <div class="card bg-warning p-2 mt-3 card-2 px-4 text-white py-2 pb-2" onclick="window.open('../LibroRSF/','_blank')">
                                                        <div class="info d-flex justify-content-between align-items-center">
                                                            <div class="group d-flex flex-column text-white"> <span class="font-weight-bold"><i style="color: #00b74a;" class="fa fa-circle fa-sm" aria-hidden="true"></i> Libro R.S.F</span> <small>
                                                                </small>
                                                            </div> <i class="fas fa-folder text-white"></i>
                                                        </div>
                                                    </div>

                                                    <div class="card bg-warning p-2 mt-3 card-2 px-4 text-white py-2 pb-2" onclick="window.open('https://deis.minsal.cl/','_blank')">
                                                        <div class="info d-flex justify-content-between align-items-center">
                                                            <div class="group d-flex flex-column text-white"> <span class="font-weight-bold"><i style="color: #00b74a;" class="fa fa-circle fa-sm" aria-hidden="true"></i> Estadística de salud</span> <small>
                                                                </small>
                                                            </div> <i class="fas fa-folder text-white"></i>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="card bg-warning p-2 mt-3 card-2 px-4 text-white py-2 pb-2" onclick="window.open('../sectores/','_blank')">
                                            <div class="info d-flex justify-content-between align-items-center">
                                                <div class="group d-flex flex-column text-white"> <span class="font-weight-bold"><i style="color: #00b74a;" class="fa fa-circle fa-sm" aria-hidden="true"></i> Sectores</span> <small>
                                                    </small>
                                                </div> <i class="fas fa-folder text-white"></i>
                                            </div>
                                        </div>

                                        <div class="card bg-warning p-2 mt-3 card-2 px-4 text-white py-2 pb-2" onclick="window.open('../programas/','_blank')">
                                            <div class="info d-flex justify-content-between align-items-center">
                                                <div class="group d-flex flex-column text-white"> <span class="font-weight-bold"><i style="color: #00b74a;" class="fa fa-circle fa-sm" aria-hidden="true"></i> Programas</span> <small>
                                                    </small>
                                                </div> <i class="fas fa-folder text-white"></i>
                                            </div>
                                        </div>

                                        <div class="card bg-warning p-2 mt-3 card-2 px-4 text-white py-2 pb-2" onclick="window.open('../planauge/','_blank')">
                                            <div class="info d-flex justify-content-between align-items-center">
                                                <div class="group d-flex flex-column text-white"> <span class="font-weight-bold"><i style="color: #00b74a;" class="fa fa-circle fa-sm" aria-hidden="true"></i> Planes</span> <small>
                                                    </small>
                                                </div> <i class="fas fa-folder text-white"></i>
                                            </div>
                                        </div>

                                        <div class="card bg-warning p-2 mt-3 card-2 px-4 text-white py-2 pb-2" onclick="window.open('../noticias/','_blank')">
                                            <div class="info d-flex justify-content-between align-items-center">
                                                <div class="group d-flex flex-column text-white"> <span class="font-weight-bold"><i style="color: #00b74a;" class="fa fa-circle fa-sm" aria-hidden="true"></i> Noticias</span> <small>
                                                    </small>
                                                </div> <i class="fas fa-folder text-white"></i>
                                            </div>
                                        </div>

                                        <div class="card bg-warning p-2 mt-3 card-2 px-4 text-white py-2 pb-2" onclick="window.open('../saludbucal/','_blank')">
                                            <div class="info d-flex justify-content-between align-items-center">
                                                <div class="group d-flex flex-column text-white"> <span class="font-weight-bold"><i style="color: #00b74a;" class="fa fa-circle fa-sm" aria-hidden="true"></i> Salud bucal</span> <small>
                                                    </small>
                                                </div> <i class="fas fa-folder text-white"></i>
                                            </div>
                                        </div>

                                        <div class="card bg-warning p-2 mt-3 card-2 px-4 text-white py-2 pb-2" onclick="window.open('../farmaciaenlinea/','_blank')">
                                            <div class="info d-flex justify-content-between align-items-center">
                                                <div class="group d-flex flex-column text-white"> <span class="font-weight-bold"><i style="color: #00b74a;" class="fa fa-circle fa-sm" aria-hidden="true"></i> Farmacia en linea</span> <small>
                                                    </small>
                                                </div> <i class="fas fa-folder text-white"></i>
                                            </div>
                                        </div>

                                        <div class="card bg-warning p-2 mt-3 card-2 px-4 text-white py-2 pb-2" onclick="window.open('../covid19/','_blank')">
                                            <div class="info d-flex justify-content-between align-items-center">
                                                <div class="group d-flex flex-column text-white"> <span class="font-weight-bold"><i style="color: #00b74a;" class="fa fa-circle fa-sm" aria-hidden="true"></i> Covid-19</span> <small>
                                                    </small>
                                                </div> <i class="fas fa-folder text-white"></i>
                                            </div>
                                        </div>

                                        <div class="card bg-warning p-2 mt-3 card-2 px-4 text-white py-2 pb-2" onclick="window.open('../contacto/','_blank')">
                                            <div class="info d-flex justify-content-between align-items-center">
                                                <div class="group d-flex flex-column text-white"> <span class="font-weight-bold"><i style="color: #00b74a;" class="fa fa-circle fa-sm" aria-hidden="true"></i> Contáctanos</span> <small>
                                                    </small>
                                                </div> <i class="fas fa-folder text-white"></i>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>


                            <div class="info d-flex justify-content-between mt-3">
                                <div class="group d-flex flex-column"> <span class="font-weight-bold">Los Álamos</span> <small>Centro De Salud Familiar</small> </div> <small id="horaenlinea">12:00 PM</small>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="modal-footer" style="border-top:0;padding-top: 0px;padding-right:26px;padding-bottom:26px;padding-left:26px;">
                <button class="btn btn_blanco_modal" data-dismiss="modal" aria-hidden="true">
                    Cerrar
                </button>
                <!-- <button class="btn btn_azul_modal">
                            Guardar cambios
                        </button> -->
            </div>
        </div>
    </div>
</div>