<?php
include 'seguridadAdmin.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$database = 'gi_expresshouse';
$user = 'gi_expresshouse';
$pass = '.gi_expresshouse';
$host = 'bbdd.dlsi.ua.es';
$dir = dirname(__FILE__) . '/dump.sql';

echo "<h3>Almacenando copia en $dir </h3>";

exec("mysqldump --user={$user} --password={$pass} --host={$host} {$database} --result-file={$dir} 2>&1", $output);

var_dump($output);
?>
