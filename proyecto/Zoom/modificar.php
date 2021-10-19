<?php
require_once 'config.php';
session_start();
if (!empty($_POST['idmodal']) && !empty($_POST['codigozoommodal']) && !empty($_POST['asuntomodal'])  && !empty($_POST['duracionmodal']) && !empty($_POST['fechamodal']) && !empty($_POST['horareunion']) && !empty($_POST['contramodal'])) {
    $ID = $_POST['idmodal'];
    $codigozoom = $_POST['codigozoommodal'];
    $asunto = $_POST['asuntomodal'];
    $duracion = $_POST['duracionmodal'];
    $fecha = $_POST['fechamodal'];
    $hora = $_POST['horareunion'];
    $contra = $_POST['contramodal'];

    $contar = substr_count($hora, ":");

    if ($contar == 1) {  //Esto es porque a veces recibe EJ: 15:09:00 entonces si le agrego otro :00 QUEDA 15:09:00:00 y me va a finalizar la llamada en el js
        $fechacompleta = $fecha . 'T' . $hora . ':00';
    } else if ($contar >= 2) {
        $fechacompleta = $fecha . 'T' . $hora;
    }

    $client = new GuzzleHttp\Client(['base_uri' => 'https://api.zoom.us']);
    $db = new DB();
    $arr_token = $db->get_access_token();
    $accessToken = $arr_token->access_token;

    try {
        $response = $client->request('PATCH', "/v2/meetings/{$codigozoom}", [
            "headers" => [
                "Authorization" => "Bearer $accessToken"
            ],
            'json' => [
                "topic" => $asunto,
                "type" => 2,
                "start_time" => $fechacompleta,    // meeting start time
                "duration" => $duracion,                       // 30 minutes
                "password" => $contra                    // meeting password
            ],
        ]);


        if (!$response) {
            echo 1;
            return;
            //echo 'Fallo';
        } else {
            // echo 'exito';
            $db->modificarvideoconferencia($ID, $asunto, $fechacompleta, $fecha, $duracion, $contra);
            echo 2;
            return;
        }
    } catch (Exception $e) {
        if (401 == $e->getCode()) {
            $rut = $_SESSION['sesionCESFAM']['rut'];
            $refresh_token = $db->get_refersh_token();
            $client = new GuzzleHttp\Client(['base_uri' => 'https://zoom.us']);
            $response = $client->request('POST', '/oauth/token', [
                "headers" => [
                    "Authorization" => "Basic " . base64_encode(CLIENT_ID . ':' . CLIENT_SECRET)
                ],
                'form_params' => [
                    "grant_type" => "refresh_token",
                    "refresh_token" => $refresh_token
                ],
            ]);
            $db->update_access_token($response->getBody(), $rut);
            echo 4;
            return;
        } else {
            echo $e->getMessage();
            return;
            // echo 5;
        }
    }
} else {
    echo 3; //No se ha recibido parámetros
    return;
}
