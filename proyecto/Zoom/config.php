<?php
require_once 'vendor/autoload.php';
require_once "db.php";

$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$linkprevia  = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]" . "/";

// echo $linkprevia;

define('CLIENT_ID', 'oYBOQDfoRxKmcfWPvQL0sQ');
define('CLIENT_SECRET', '3LMaDfUT83Evp4djU4rMfYJeEZmgYaO9');
define('REDIRECT_URI', $linkprevia . 'tesisactual/proyecto/Zoom/callback.php'); //Esta dirección agregarla en el app marketplace de Zoom
// http://localhost/tesisactual/proyecto/Zoom/callback.php
