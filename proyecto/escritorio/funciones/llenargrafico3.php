<?php
// header('Content-Type: application/json');

include '../../conexion/conexion.php';
include '../../funcionesphp/TOUTF8.php';

$sql = "SELECT COUNT(id_vacaciones) as contador,
(SELECT COUNT(id_vacaciones) FROM vacaciones WHERE month(fecha_inicio_vacaciones) = 1 and year(fecha_inicio_vacaciones) = 2021) as contarmesenero,
(SELECT COUNT(id_vacaciones) FROM vacaciones WHERE month(fecha_inicio_vacaciones) = 2 and year(fecha_inicio_vacaciones) = 2021) as contarmesfebrero,
(SELECT COUNT(id_vacaciones) FROM vacaciones WHERE month(fecha_inicio_vacaciones) = 3 and year(fecha_inicio_vacaciones) = 2021) as contarmesmarzo,
(SELECT COUNT(id_vacaciones) FROM vacaciones WHERE month(fecha_inicio_vacaciones) = 4 and year(fecha_inicio_vacaciones) = 2021) as contarmesabril,
(SELECT COUNT(id_vacaciones) FROM vacaciones WHERE month(fecha_inicio_vacaciones) = 5 and year(fecha_inicio_vacaciones) = 2021) as contarmesmayo,
(SELECT COUNT(id_vacaciones) FROM vacaciones WHERE month(fecha_inicio_vacaciones) = 6 and year(fecha_inicio_vacaciones) = 2021) as contarmesjunio,
(SELECT COUNT(id_vacaciones) FROM vacaciones WHERE month(fecha_inicio_vacaciones) = 7 and year(fecha_inicio_vacaciones) = 2021) as contarmesjulio,
(SELECT COUNT(id_vacaciones) FROM vacaciones WHERE month(fecha_inicio_vacaciones) = 8 and year(fecha_inicio_vacaciones) = 2021) as contarmesagosto,
(SELECT COUNT(id_vacaciones) FROM vacaciones WHERE month(fecha_inicio_vacaciones) = 9 and year(fecha_inicio_vacaciones) = 2021) as contarmesseptiembre,
(SELECT COUNT(id_vacaciones) FROM vacaciones WHERE month(fecha_inicio_vacaciones) = 10 and year(fecha_inicio_vacaciones) = 2021) as contarmesoctubre,
(SELECT COUNT(id_vacaciones) FROM vacaciones WHERE month(fecha_inicio_vacaciones) = 11 and year(fecha_inicio_vacaciones) = 2021) as contarmesnoviembre,
(SELECT COUNT(id_vacaciones) FROM vacaciones WHERE month(fecha_inicio_vacaciones) = 12 and year(fecha_inicio_vacaciones) = 2021) as contarmesdiciembre
FROM vacaciones";

$res = mysqli_query($mysqli, $sql);

$datos = array();
while ($fila = mysqli_fetch_array($res)) {
	// $datos[] = $fila;
	$datos[] = array(
		'MESENERO' 		=> $fila["contarmesenero"],
		'MESFEBRERO'	=> $fila["contarmesfebrero"],
		'MESMARZO' 		=> $fila["contarmesmarzo"],
		'MESABRIL'		=> $fila["contarmesabril"],
		'MESMAYO' 		=> $fila["contarmesmayo"],
		'MESJUNIO' 		=> $fila["contarmesjunio"],
		'MESJULIO' 		=> $fila["contarmesjulio"],
		'MESAGOSTO' 	=> $fila["contarmesagosto"],
		'MESSEPTIEMBRE' => $fila["contarmesseptiembre"],
		'MESOCTUBRE' 	=> $fila["contarmesoctubre"],
		'MESNOVIEMBRE'  => $fila["contarmesnoviembre"],
		'MESDICIEMBRE'  => $fila["contarmesdiciembre"]
	);
}
// foreach ($res as $row) {
// 	$data[] = $row;
// }
echo json_encode(toutf8($datos));
mysqli_close($mysqli);
