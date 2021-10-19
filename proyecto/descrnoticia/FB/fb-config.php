<?php
session_start();
include_once('php-graph-sdk-5.x/src/Facebook/autoload.php');
$fb = new Facebook\Facebook(array(
	'app_id' => '788476725220083',  // REEMPLACE POR TU APP ID
	'app_secret' => 'dd108c8aacfd27ee3c728e89beb1ef33', // REEMPLACE POR SU CLAVE SECRETA
	'default_graph_version' => 'v3.2',
));

$helper = $fb->getRedirectLoginHelper();

?>