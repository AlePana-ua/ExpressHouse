<?php 

 $link = new mysqli("bbdd.dlsi.ua.es","gi_expresshouse",".gi_expresshouse.","gi_expresshouse2");
 if($link->connect_errno) {
	printf("Fallo en la conexión: %s\n", $link->connect_error);
	die("Error:no pudo conectar");
 }

?>