<?php
include '../../conexion/conexion.php';
session_start();
$json = '';

if ($_POST['pues'] == 1) {
    $rut = $_SESSION['sesionCESFAM']['rut'];

    $sql = "SELECT id_notificacion,mensaje_notificacion,fecha_notificacion from notificacion WHERE rut='$rut' ORDER BY id_notificacion DESC";

    $consulta = mysqli_query($mysqli, $sql);
    $número_filas = mysqli_num_rows($consulta);

    if ($número_filas == 0) {
        $json .= '<p class="text-center">No hay mensajes</p>';
    } else {

        while ($fila = mysqli_fetch_array($consulta)) {
            $json .= '
                <div class="px-4 py-1 chat-box bg-white">
                <div class="media w-70 mb-3"><img src="../../importantes/user-notificacion.png" alt="user" width="65" class="rounded-circle">
                    <div class="media-body ml-3">
                        <div class="bg-light rounded py-2 px-3 mb-2">
                            <p class="text-small mb-0 text-muted">'.$fila['mensaje_notificacion'].'</p>
                        </div>
                        <p class="small text-muted">'.$fila['fecha_notificacion'].'</p>
                    </div>
                </div>
                </div>';
        }
    }
}

echo $json;
mysqli_close($mysqli);


//print json_encode($myArray);
