<!--Modal para EDITAR-->
<div class="modal fade" id="modal-superadmin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <!--modal-lg= dentro de class para agrandar el modal -->
        <div class="modal-content">
            <!-- <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
            </div> -->

            <form id="form-modal-editar-usuarios" method="POST" autocomplete="off">
                <div class="modal-body">

                    <div class="row">
                        <div class="col-6">
                            <!-- RUT -->
                            <div class="form-group">
                                <label for="rut_sa" class="col-form-label">R.U.T:</label>
                                <input type="text" class="form-control" id="rut_sa" name="rut_sa" readonly="readonly">
                                <!--readonly="readonly" -->
                            </div>
                        </div>

                        <div class="col-6">
                            <!-- NOMBRE -->
                            <div class="form-group">
                                <label for="nombre_sa" class="col-form-label">Nombre:</label>
                                <input type="text" class="form-control" id="nombre_sa" name="nombre_sa" minlength="2" maxlength="50" onkeypress="return sololetras(event)" onpaste="return false" required>
                                <!--readonly="readonly" -->
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-6">
                            <!-- TELÉFONO -->
                            <div class="form-group">
                                <label for="telefono_sa" class="col-form-label">Teléfono:</label>
                                <input type="text" class="form-control" id="telefono_sa" name="telefono_sa" placeholder="Teléfono" minlength="8" maxlength="9" onkeypress="return solonumeros(event)" onpaste="return false" required>
                            </div>
                        </div>
                        <div class="col-6">
                            <!-- DIRECCIÓN -->
                            <div class="form-group">
                                <label for="direccion_sa" class="col-form-label">Dirección:</label>
                                <input type="text" class="form-control" id="direccion_sa" name="direccion_sa" placeholder="Dirección" minlength="2" maxlength="100" onkeypress="return solodireccion(event)" onpaste="return false" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <!-- CORREO -->
                            <div class="form-group">
                                <label for="correo_sa" class="col-form-label">Correo:</label>
                                <input type="email" class="form-control" placeholder="Correo" maxlength="100" name="correo_sa" id="correo_sa" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" onkeypress="return solocorreo(event)" onpaste="return false" required>
                            </div>
                        </div>
                        <div class="col-6">
                            <!-- FECHA INICIO -->
                            <div class="form-group">
                                <label for="fecha_sa" class="col-form-label">Fecha Entrada:</label>
                                <input type="date" class="form-control" placeholder="Fecha Inicio" name="fecha_sa" id="fecha_sa" onkeypress="return fechausuarios(event)" maxlength="10" required>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-6">
                            <!--ROL-->
                            <?php

                            $sql = "SELECT id_rol, nombre_rol FROM rol";
                            $consulta = mysqli_query($mysqli, $sql);

                            if (!$consulta) {
                                echo '<div class="alert alert-danger" role="alert"> ¡UpS! Ocurrió un error! Por favor, contacte a soporte. </div>';
                            } else {
                            ?>
                                <div class="form-group">
                                    <label for="rol_sa" class="col-form-label">Rol:</label>
                                    <select class="form-control" id="rol_sa" name="rol_sa" required>
                                        <option value="">Seleccione una opción...</option>
                                        <?php

                                        while ($fila = mysqli_fetch_array($consulta)) {
                                            $ID_ROL = $fila['id_rol'];
                                            $NOMBRE_ROL = $fila['nombre_rol'];
                                            echo '<option value="' . $ID_ROL . '">' . $NOMBRE_ROL . '</option>'; //utf8_encode($NOMBRE_CATEGORIA)
                                        }
                                        ?>
                                    </select>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="col-6">
                            <!-- CARGO -->
                            <?php

                            $sql1 = "SELECT id_cargo, nombre_cargo FROM cargo";
                            $consulta1 = mysqli_query($mysqli, $sql1);

                            if (!$consulta1) {
                                echo '<div class="alert alert-danger" role="alert"> ¡UpS! Ocurrió un error! Por favor, contacte a soporte. </div>';
                            } else {
                            ?>
                                <div class="form-group">
                                    <label for="cargo_sa" class="col-form-label">Cargo:</label>
                                    <select class="form-control" id="cargo_sa" name="cargo_sa" required>
                                        <option value="">Seleccione una opción...</option>
                                        <option value="null" hidden>No tiene sector...</option>
                                        <?php

                                        while ($fila1 = mysqli_fetch_array($consulta1)) {
                                            $ID_CARGO = $fila1['id_cargo'];
                                            $NOMBRE_CARGO = $fila1['nombre_cargo'];
                                            echo '<option value="' . $ID_CARGO . '">' . $NOMBRE_CARGO . '</option>'; //utf8_encode($NOMBRE_CATEGORIA)
                                        }
                                        ?>
                                    </select>
                                </div>
                            <?php } ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <!--SECTORES-->
                            <?php
                            $sql2 = "SELECT id_sector, nombre_sector FROM sector";
                            $consulta2 = mysqli_query($mysqli, $sql2);

                            if (!$consulta2) {
                                echo '<div class="alert alert-danger" role="alert"> ¡UpS! Ocurrió un error! Por favor, contacte a soporte. </div>';
                            } else {
                            ?>
                                <div class="form-group" id="divsectoresmodalusuario">
                                    <label for="sector_sa" class="col-form-label">Sector:</label>
                                    <select class="form-control" id="sector_sa" name="sector_sa" required>
                                        <!-- <option value="">Seleccione una opción...</option> -->
                                        <option value="null">No tiene sector...</option>
                                        <?php
                                        while ($fila1 = mysqli_fetch_array($consulta2)) {
                                            $ID_SECTOR = $fila1['id_sector'];
                                            $NOMBRE_SECTOR = $fila1['nombre_sector'];
                                            echo '<option value="' . $ID_SECTOR . '">' . $NOMBRE_SECTOR . '</option>'; //utf8_encode($NOMBRE_CATEGORIA)
                                        }
                                        ?>
                                    </select>
                                </div>
                            <?php } ?>
                        </div>

                        <div class="col-6">
                            <!--UNIDADES-->
                            <?php
                            $sql3 = "SELECT id_unidad, nombre_unidad FROM unidad";
                            $consulta3 = mysqli_query($mysqli, $sql3);

                            if (!$consulta3) {
                                echo '<div class="alert alert-danger" role="alert"> ¡UpS! Ocurrió un error! Por favor, contacte a soporte. </div>';
                            } else {
                            ?>
                                <div class="form-group" id="divunidadesmodalusuario">
                                    <label for="unidad_sa" class="col-form-label">Unidad:</label>
                                    <select class="form-control" id="unidad_sa" name="unidad_sa" required>
                                        <!-- <option value="">Seleccione una opción...</option> -->
                                        <option value="null" selected>No tiene unidad...</option>
                                        <?php
                                        while ($fila1 = mysqli_fetch_array($consulta3)) {
                                            $ID_UNIDAD = $fila1['id_unidad'];
                                            $NOMBRE_UNIDAD = $fila1['nombre_unidad'];
                                            echo '<option value="' . $ID_UNIDAD . '">' . $NOMBRE_UNIDAD . '</option>'; //utf8_encode($NOMBRE_CATEGORIA)
                                        }
                                        ?>
                                    </select>
                                </div>
                            <?php } ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-4">
                            <button type="button" class="btn btn-secondary btn-block" style="margin-top:4px;" data-dismiss="modal" aria-label="Close"><i class="fa fa-close"></i></i> Cerrar</button>
                        </div>
                        <div class="col-8">
                            <button type="submit" name="submitmodal" class="btn btn-<?php echo $temadelacookie; ?> btn-block" style="margin-top:4px;"><i class="fa fa-edit"></i></i> Editar</button>
                        </div>
                    </div>
            </form>
        </div>
    </div>
</div>
<!--FIN DEL MODAL EDITAR -->