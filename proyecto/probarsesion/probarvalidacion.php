<?php 
include '../funcionesphp/limpiarCampo.php';
$a='()%&numerosyletras 12345 aja ?_- 45 áéíóúÁÉÍÓÚABCDEFGHIJKLMNÑOPQRSTUVWXYZ 19387124k';
$b='';
$c=null;
if(isset($a)){
    $im = numerosyletras($a);
    echo '1: '.$im.'<br>';
}

if(isset($a)){
    $im = sololetras($a);
    echo '2: '.$im.'<br>';
}

if(isset($a)){
    $im = solonumeros($a);
    echo '3: '.$im.'<br>'.'<br>';
}

if(isset($a)){
    $im = validarut($a);
    echo '4: '.$im.'<br>'.'<br>';
}

if (validavacioenarreglo(array($a,$b, $c))) {
    echo 'ERROR';
}



?>