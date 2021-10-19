<?php
require_once 'config.php';
//if (isset($_POST['tipoBTN']) && !empty($_POST['tipoBTN'])){
try {
    $client = new GuzzleHttp\Client(['base_uri' => 'https://zoom.us']);

    $response = $client->request('POST', '/oauth/token', [
        "headers" => [
            "Authorization" => "Basic " . base64_encode(CLIENT_ID . ':' . CLIENT_SECRET)
        ],
        'form_params' => [
            "grant_type" => "authorization_code",
            "code" => $_GET['code'],
            "redirect_uri" => REDIRECT_URI
        ],
    ]);

    $token = json_decode($response->getBody()->getContents(), true);

    $db = new DB();

    if ($db->is_table_empty()) {

        $db->update_access_token(json_encode($token), '193871240');

        //  echo "Token insertado correctamente."; //Aqui dejaré un echo 1; con respuesta con exito 
        //echo 1;
        echo '<script>window.location.href = "../admzoom?p=exito";</script>';
    } else {
        $db->update_access_token(json_encode($token),'193871240');
        //  echo "Token ya existe.";
        // echo 1;
        echo '<script>window.location.href = "../admzoom?p=yaexiste"</script>';
    }
} catch (Exception $e) {
    echo $e->getMessage();
    echo 2;
}

/*}else{
   // echo 3;
}*/


/*
{"access_token":"eyJhbGciOiJIUzUxMiIsInYiOiIyLjAiLCJraWQiOiI3ZDllNzFkMy00ZGU1LTQ1ZjktOTkwOS1kZWRiNjM5MDQ4ZTkifQ.eyJ2ZXIiOjcsImF1aWQiOiI5ZjU5MTg4OGQ4NWFmNzAwY2RhNDVhMDQ4MWZmZTUzYyIsImNvZGUiOiJySWppMm5FcGZ6X2RqT3pBTUZKU0lxNWlzd0pIeDBxd3ciLCJpc3MiOiJ6bTpjaWQ6YlRSbHpEZTdRSk9TUzJFTTJUZVhDUSIsImdubyI6MCwidHlwZSI6MCwidGlkIjoxMSwiYXVkIjoiaHR0cHM6Ly9vYXV0aC56b29tLnVzIiwidWlkIjoiZGpPekFNRkpTSXE1aXN3Skh4MHF3dyIsIm5iZiI6MTYwNDk4MjA1NCwiZXhwIjoxNjA0OTg1NjU0LCJpYXQiOjE2MDQ5ODIwNTQsImFpZCI6ImpsWkIzN1RzUzhTVTdBUjZ4dmVOUVEiLCJqdGkiOiIyMTE2MTZmMy1lOTA4LTRhYTctYjZiMC00NTBjYmJkMjc2NDQifQ.XF0mXhYLsd0QIJBEHMQtCycdUMWp7muXjt0bDDW7PQ2BAS5c3tHq7hdMhhZ-rqxv__pTMN6VZUlzcjSKapqsgg","token_type":"bearer","refresh_token":"eyJhbGciOiJIUzUxMiIsInYiOiIyLjAiLCJraWQiOiJiZjJjM2M0Ny02M2FmLTQzMDctODRlNy0zOTYxNWJiNmE1OTEifQ.eyJ2ZXIiOjcsImF1aWQiOiI5ZjU5MTg4OGQ4NWFmNzAwY2RhNDVhMDQ4MWZmZTUzYyIsImNvZGUiOiJySWppMm5FcGZ6X2RqT3pBTUZKU0lxNWlzd0pIeDBxd3ciLCJpc3MiOiJ6bTpjaWQ6YlRSbHpEZTdRSk9TUzJFTTJUZVhDUSIsImdubyI6MCwidHlwZSI6MSwidGlkIjoxMSwiYXVkIjoiaHR0cHM6Ly9vYXV0aC56b29tLnVzIiwidWlkIjoiZGpPekFNRkpTSXE1aXN3Skh4MHF3dyIsIm5iZiI6MTYwNDk4MjA1NCwiZXhwIjoyMDc4MDIyMDU0LCJpYXQiOjE2MDQ5ODIwNTQsImFpZCI6ImpsWkIzN1RzUzhTVTdBUjZ4dmVOUVEiLCJqdGkiOiIzOWIwMzM1ZS1iZGIzLTRkMGQtYjMwNi0wNmQyZjBlMWUxYzUifQ.gcphElMvAM-ZtXEoJvZYQm7bQm_hvcvkg6bB3FZIeuKQ08E6Wl64ZszZtX8QjO_vqEY-E5ir1ziNxlwZqQzzdA","expires_in":3599,"scope":"meeting:master meeting:read:admin meeting:write:admin"}
*/