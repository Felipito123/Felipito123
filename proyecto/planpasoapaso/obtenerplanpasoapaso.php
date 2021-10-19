<?php 
/*lo hago así porque directamente en el iframe me da error ya que el minsal y el gob.cl tiene bloquado el acceso
a que otros sitios web puedan accesar a su paginas puesto que tienemn como regla "X-Frame-Options SAMEORIGIN" */

/*El iframe funciona perfecto cuando no se tiene la regla de seguridad en las paginas de origen mencionadas anteriormente
y cuando se tienen archivos locales, por ejemplo en el iframe llamo a un archivo php de mi carpeta proyecto,
entonces, una forma de accesar es hacer pasar que la página externa como local y la almaceno en este archivo local "obtenerplanpasoapaso.php"
y lo llamo desde el index de la carpeta planpasoapaso */
  echo file_get_contents("https://www.gob.cl/coronavirus/pasoapaso/");
?>

