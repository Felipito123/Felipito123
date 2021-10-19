<?php

/*
SERVIDOR DE UNIVERSIDAD DEL BIOBIO
//$mysqli = mysqli_connect("146.83.194.142", "grup3co", "bdgrup3co", "softbd3co");
*/


/*
SERVIDOR DE CLEVER CLOUD
$mysqli = mysqli_connect('bqhzzzwhfthsa3tjenik-mysql.services.clever-cloud.com',  'uhwfngmynctfihr2','oVTGr7bgM0fwrlSy7tfJ','bqhzzzwhfthsa3tjenik');
//host,usuario,contraseña,nombre base de datos (Clever cloud: 123456)  */

/*
SERVIDOR DEL CESFAM 
$mysqli = mysqli_connect("localhost:3306","saludlosalamos_cesfamsalud","2020cesfamla","saludlosalamos_cesfam");  //EL ÚLTIMO PARÁMETRO ES LA BD
*/

// $Host = "localhost";
// $NombreUsuario = "root";
// $Contrasena = "";
// $NombreDB = "saludlosalamos2";

// $Host = "https://saludlosalamos.cl:2083/";
// $NombreUsuario = "saludlosalamos_cesfamsalud";
// $Contrasena = "2020cesfamla";
// $NombreDB = "saludlosalamos_cesfam";

$Host = "localhost";
$NombreUsuario = "id17192662_saludlosalamos2021";
$NombreDB = "id17192662_saludlosalamos";
$Contrasena = "/gD8bHN6WwRRHu_R";



$mysqli = mysqli_connect($Host, $NombreUsuario, $Contrasena, $NombreDB);
if (!$mysqli) {
    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
    exit;
}

/*
SERVIDOR LOCALHOST
$mysqli = mysqli_connect("localhost", "root", "", "saludlosalamos2");
if (!$mysqli) {
    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
    exit;
}
*/
