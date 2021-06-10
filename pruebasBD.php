<?php

    #########PARA HACER PRUEBAS Y MEDICIONES EN LA BD####################################

  $pageTitle = 'Pruebas BD';

  $numrepeticiones=100;
  $sqlProbar = "SELECT  a.id_anuncio
										,a.id_vivienda
										,a.descripcion
										,a.minimo_de_dias
										,v.nombre
										,v.direccion
										,v.precioDia 
										,v.habitaciones
										,v.aseos
										,v.foto
								FROM Anuncio a
								INNER JOIN Vivienda v ON a.id_vivienda = v.id_viv
								INNER JOIN ciudad c ON c.id_ciudad = v.id_ciudad";


  ## vector de variables enteras
  $vect = array();
  $sum=0;
  
  $mysqli = new mysqli("bbdd.dlsi.ua.es","gi_expresshouse",".gi_expresshouse.","gi_expresshouse2");
  ##$mysqli->set_charset('utf8mb4');
  


  for ($i=0;$i<$numrepeticiones;$i++) {  
    $sql = "RESET QUERY CACHE;";
    $result = $mysqli->query($sql);
    $sql = "FLUSH TABLES;";
    $result = $mysqli->query($sql);
    $starttime = microtime(true);


    $result = $mysqli->query($sqlProbar);
    $endtime = microtime(true);
    $duration = $endtime - $starttime; //calcula el tiempo total empleado
       
    $vect[$i]=round($duration*1000);
    $sum+=$vect[$i];    
  }
  
  print_r($vect);
  $mysqli -> close();


  ## Promedio variables
  $prom = ($sum)/count($vect);
  ## Variable de Suma de Cuadrados del Error
  $sce = 0;  
  for ($i=0; $i<count($vect);$i++) {
    $sce = $sce + ($prom - $vect[$i])**2; //la potencia
  }  
  ## Desviación típica
  $desviacion = sqrt($sce/(count($vect)-1));
  ## Variable Z normal
  $z = 1.96;
  ## Intervalo confianza
  $IC = $desviacion*$z/sqrt(count($vect));
  ## Vector medida
  //$medida = c($prom-$IC,$prom+$IC)
  echo "<br>".($prom-$IC)."<br>";
  echo "<br>".($prom)."<br>";  
  echo ($prom+$IC)."<br>";
?>