<?php
require_once 'config.php';

if (!empty($_POST['ID']) && isset($_POST['ID']) && isset($_POST['CODIGOREUNION'])) { //

    $client = new GuzzleHttp\Client(['base_uri' => 'https://api.zoom.us']);

    $db = new DB();
    $arr_token = $db->get_access_token();
    $accessToken = $arr_token->access_token;
    //$meetingId = $_GET['meetingid'];   //Esto lo recibire con el post del datatable en ajax
    $ID = $_POST['ID'];
    $CODIGO = $_POST['CODIGOREUNION'];
    $db->eliminar($ID);
    $response = $client->request('DELETE', "/v2/meetings/{$CODIGO}", [
        "headers" => ["Authorization" => "Bearer $accessToken"]
    ]);

    if (!$response) {
        echo 1;
        return;
        //echo 'No se pudo borrar';
    } else {
        // echo 'borrado con exito';
        echo 2;
        return;
    }
} else {
    echo 3;
    return;
}
