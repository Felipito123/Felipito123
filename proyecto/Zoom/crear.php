<?php
require_once 'config.php';
session_start();
//$fecha = strftime("%d de %B, %Y- %H:%M:%S"); // 04 de septiembre, 2029  %A= dia de la semana, %d= numero del dia,  %B=nombre del mes,   %Y= numero del año
//print $fecha;


if (!empty($_POST['asunto'])  && !empty($_POST['duracion']) && !empty($_POST['fecha']) && !empty($_POST['contra']) && !empty($_POST['hora'])) {

    function create_meeting()
    {
        $rut = $_SESSION['sesionCESFAM']['rut'];
        $contra = $_POST['contra'];
        $duracion = $_POST['duracion'];
        $asunto = $_POST['asunto'];
        //$fecha="2020-11-08T22:55:00";
        $fecha = $_POST['fecha'];
        $hora = $_POST['hora'];
        $fechacompleta = $fecha . 'T' . $hora . ':00'; //$fecha . 'T' . $hora . ':00';
        $fechadehoy = strftime("%Y-%m-%d");
        
        $client = new GuzzleHttp\Client(['base_uri' => 'https://api.zoom.us']);

        $db = new DB();
        $arr_token = $db->get_access_token();
        $accessToken = $arr_token->access_token;

        try {

            // if you have userid of user than change it with me in url
            $response = $client->request('POST', '/v2/users/me/meetings', [
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



            $data = json_decode($response->getBody());

            //$db->insertar($data->id,$asunto,$data->join_url,$fechacompleta,$duracion,$contra);

            /* echo "Unirse al URL: " . $data->join_url;
            echo "<br>";
            echo "Contraseña: " . $data->password;
            echo "<br>";
            echo "Duracion: " . $data->duration;
            echo "<br>";
            echo "Fecha: " . $fecha;
            echo "<br>";
            echo "ID : " . $data->id;
            echo "<br>";*/
            //  var_dump($data);

            $db->insertar($data->id, $asunto, $data->join_url, $fechacompleta, $fechadehoy, $duracion, $contra, $rut);
        } catch (Exception $e) {
            if (401 == $e->getCode()) {
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
                //echo 3;
                create_meeting();
                // $db->insertar($data->id,$asunto,$data->join_url,$fechacompleta,$duracion,$contra);
            } else {
                echo $e->getMessage();
                echo 4;
            }
        }
    }
    echo 1;
    create_meeting();
} else {
    echo 2;
}
