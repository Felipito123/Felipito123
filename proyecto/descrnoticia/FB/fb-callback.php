<?php
include_once('fb-config.php');

try {
  $accessToken = $helper->getAccessToken();
} catch (Facebook\Exceptions\FacebookResponseException $e) {
  // Cuando Graph devuelve un error
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch (Facebook\Exceptions\FacebookSDKException $e) {
  // Cuando falla la validación u otros problemas locales
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}

if (!isset($accessToken)) {
  if ($helper->getError()) {
    header('HTTP/1.0 401 Unauthorized');
    echo "Error: " . $helper->getError() . "\n";
    echo "Error Code: " . $helper->getErrorCode() . "\n";
    echo "Error Reason: " . $helper->getErrorReason() . "\n";
    echo "Error Description: " . $helper->getErrorDescription() . "\n";
  } else {
    header('HTTP/1.0 400 Bad Request');
    echo 'Solicitud incorrecta';
  }
  exit;
}

if (!$accessToken->isLongLived()) {
  // Intercambia un token de acceso de corta duración por uno de larga duración.
  try {
    $accessToken = $oAuth2Client->getLongLivedAccessToken($accessToken);
  } catch (Facebook\Exceptions\FacebookSDKException $e) {
    echo "<p>Error getting long-lived access token: " . $e->getMessage() . "</p>\n\n";
    exit;
  }
}

$graph_response = $fb->get("/me?fields=id,name,last_name,first_name,email,education,about,age_range,feed,photos,videos", $accessToken);
$facebook_user_info = $graph_response->getGraphUser();

$graph_response2 = $fb->get("/me?fields=name,first_name,last_name,email,link,gender,locale,picture", $accessToken);
$fbUserProfile = $graph_response2->getGraphNode()->asArray();

//$fb->setDefaultAccessToken($accessToken);

# Estos volverán al token de acceso predeterminado
$res   =   $fb->get('/me', $accessToken->getValue());
$fbUser  =  $res->getDecodedBody();

$resImg    =  $fb->get('/me/picture?type=large&amp;amp;redirect=false', $accessToken->getValue());
$picture  =  $resImg->getGraphObject();

if ($facebook_user_info['email'] == null || $facebook_user_info['email'] == '') {
  $correoelectronico = $fbUserProfile['email'];
} else if ($fbUserProfile['email'] == null || $fbUserProfile['email'] == '') {
  $correoelectronico = $facebook_user_info['email'];
}

if (empty($correoelectronico) || isset($correoelectronico)) {
  $correoelectronico = 'no tiene correo';
}

$_SESSION['noticia']['fbUserId']     =  $fbUser['id'];
// $_SESSION['fbAbout']      =  $facebook_user_info['about'];
$_SESSION['noticia']['fbUserName']   =  $fbUser['name'];
$_SESSION['noticia']['fbCorreo']     =  $correoelectronico;
// $_SESSION['fbGenero']     =  $facebook_user_info['gender'];
// $_SESSION['fbLocale']     =  $fbUserProfile['locale'];
$_SESSION['noticia']['last_name']    =  $facebook_user_info['last_name'];
$_SESSION['noticia']['first_name']   =  $facebook_user_info['first_name'];
$_SESSION['noticia']['imagen']       =  $fbUserProfile['picture']['url'] . '---';
// $_SESSION['photos']       =  $facebook_user_info['photos'];
// $_SESSION['videos']       =  $facebook_user_info['videos'];
// $_SESSION['feed']         =  $facebook_user_info['feed'];
// $_SESSION['age_range']    =  $facebook_user_info['age_range'];

$_SESSION['noticia']['fbAccessToken']  =  $accessToken->getValue();

$direccionar = $_SESSION['noticia']['pagina'];
// $direccionar = "http://localhost/tesisactual/proyecto/descrnoticia/?v=UEVobzdEMHdTcGZlOUNERy8rQ3ZrQT09";

header('Location: ' . $direccionar);
exit;
