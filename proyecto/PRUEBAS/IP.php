<?php
/*date_default_timezone_set("America/Santiago");
setlocale(LC_TIME, "spanish");

$fechadeinicio="2015-11-35";
$porciones = explode("-", $fechadeinicio); //Año de ingreso del input date
$fechactual = strftime("%Y"); //Año actual 
$calculo=0;
$diasganados=0;

 if($porciones[0]>$fechactual){
    print 'Fecha de ingreso incorrecta'.'<br>';
 }
 else if($porciones[0]==$fechactual){
        $diasganados=1*15;
 }
 else{
    $calculo=$fechactual-$porciones[0];
    $diasganados=$calculo*15;
 }
print $diasganados;*/

//print $fechactual-$porciones[0];





//DECODIFICARFOLIO
// $decodificarfolio = "717921461963";
// $decodificarfolio = str_split($decodificarfolio, 4);
// echo $decodificarfolio[0] . '<br>' . $decodificarfolio[1]. '<br>' . $decodificarfolio[2]; //devolverá 7179 1002 2146 1963
// echo '<br><br>';
// $devparte2rut=$decodificarfolio[0]-55;
// $devparte1rut=$decodificarfolio[2]-25;
// $devdiastomados=$decodificarfolio[1]-1000;


// $foliodecodificado = $devparte1rut.$devparte2rut;

// echo $foliodecodificado;

date_default_timezone_set("America/Santiago");
setlocale(LC_TIME, "spanish");

// $m='5';
// $months = array (1=>'Ene',2=>'Feb',3=>'Mar',4=>'Abr',5=>'May',6=>'Jun',7=>'Jul',8=>'Ago',9=>'Sep',10=>'Oct',11=>'Nov',12=>'Dic');
// echo $months[(int)$m];

//mostrar la solicitud de permiso especial que no tengan respondidas las del Jefe de Sector=2
// select distinct t1.id_pe
//   from solicitud_permiso_especial t1
//  where not exists (select 1 
//                      from solicitud_permiso_especial t2 
//                     where t2.id_pe = t1.id_pe 
//                       and t2.id_etapas_spe = 2)


// select distinct pe.id_pe, cm.nombre_comuna, mpe.descripcion_mpe, us.nombre_usuario, pe.fecha_permiso_pe, pe.horainicio_pe, pe.horatermino_pe
//   from permiso_especial pe, comuna cm, motivo_pe mpe, usuario us
//  where pe.id_comuna=cm.id_comuna and pe.id_mpe=mpe.id_mpe and pe.rut=us.rut and not exists (select 1 
//                      from solicitud_permiso_especial t2 
//                     where t2.id_pe = pe.id_pe 
//                       and t2.id_etapas_spe = 2)

// select distinct pe.id_pe, cm.nombre_comuna, mpe.descripcion_mpe, us.nombre_usuario, pe.fecha_permiso_pe, pe.horainicio_pe, pe.horatermino_pe, spe.id_spe
//   from permiso_especial pe, comuna cm, motivo_pe mpe, usuario us,solicitud_permiso_especial spe
//  where pe.id_comuna=cm.id_comuna and pe.id_mpe=mpe.id_mpe and pe.rut=us.rut and pe.id_pe=spe.id_pe and not exists (select 1 
//                      from solicitud_permiso_especial t2 
//                     where t2.id_pe = pe.id_pe 
//                       and (t2.id_etapas_spe = 2 or t2.id_etapas_spe = 3 or t2.id_etapas_spe = 4))


// $myfile = fopen(".htaccess", "w")


?>


<!DOCTYPE html>

<head>
   <script src="https://kit.fontawesome.com/b1224f57be.js" crossorigin="anonymous"></script>
</head>

<body>
<input type="number" pattern=".{0}|.{5,10}" required title="Either 0 OR (5 to 10 chars)">

</body>

</html>