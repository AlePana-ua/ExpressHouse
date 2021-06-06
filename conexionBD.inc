<?php
	$db_host = 'bbdd.dlsi.ua.es';
	$db_user = 'gi_expresshouse';
	$db_pwd = ".gi_expresshouse.";
	$database = "gi_expresshouse2";
	
    $link=new mysqli("bbdd.dlsi.ua.es","gi_expresshouse",".gi_expresshouse.","gi_expresshouse2");
	
	// Para evitar fallos con los acentos.
	$link->set_charset("utf8");

	/* comprobar la conexión */
	if ($link->connect_errno) {
		printf("Falló la conexión: %s\n", $link->connect_error);
		exit();
	}
?>
