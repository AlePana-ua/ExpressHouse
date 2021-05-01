<?php 
	include 'header.php';
	include "conexionBD.inc"; 
?>

<div class="row h-100">
  <div class="col-sm-12">
    <?php require_once 'utils.php';
		//Variables que se pasan desde el buscador de la página inicial.
		if(isset($_POST['destino']) && !empty($_POST['destino'])) {
			$destino = $_POST['destino'];
		}

		if(isset($_POST['fecha-llegada']) && !empty($_POST['fecha-llegada'])) {
			$fecha_llegada = $_POST['fecha-llegada'];
		}else {
			$fecha_llegada = date("m/d/Y");
		}
		//Si no se asigna fecha de lle
		if(isset($_POST['fecha-salida']) && !empty($_POST['fecha-salida'])){
			$fecha_salida = $_POST['fecha-salida'];
		}else {
			$fecha_salida = Date('m/d/Y', strtotime('+4 days'));
		}
		
		// Si se accede a traves del tipo de casa (p.e Playa)
		if(isset($_POST['tipo-casa']) && !empty($_POST['tipo-casa'])) {
			$tipoCasa = $_POST['tipo-casa'];
		}
		
		// Obtenemos el número de dias entre las fechas.
		$numDias = get_days_between_dates($fecha_llegada, $fecha_salida);

		$query_casas = "SELECT  Anuncio.id_anuncio
								,Anuncio.id_vivienda
								,Anuncio.foto
								,Anuncio.descripcion
								,Vivienda.direccion
								,Vivienda.precioDia 
								,Vivienda.habitaciones
								,Vivienda.aseos
						FROM Anuncio
						INNER JOIN Vivienda ON Anuncio.id_vivienda=Vivienda.id_viv
						INNER JOIN ciudad ON ciudad.id_ciudad = Vivienda.id_ciudad
						WHERE Anuncio.minimo_de_dias <= $numDias ";

		//Si no se realiza la busqueda en una ciudad, mostramos la lista de casa de España.
		if(!empty($destino)) {
			$query_casas .= "AND ciudad.nombre = '$destino' ";
		}else {
			$destino = 'España';
			$query_casas .= "AND ciudad.pais = '$destino' ";
		}

		//Si se selecciono el tipo de vivienda filtramos la busqueda. 
		if (!empty($tipoCasa)) {
			$query_casas .= " AND Vivienda.tipo = '$tipoCasa'";
		}

		// Cerramos la consulta.
		$query_casas .= ";";

		//echo $query_casas;

		// Mostramos las casas que cumplen con los criterios de busqueda.
		if ($query = $link->query($query_casas)) {
			echo '<p>Mostrando '.$query->num_rows.' resultados <span>&#183;</span> '.$fecha_llegada.' - '.$fecha_salida.' </p>';
			echo '<h3>Viviendas en '.$destino.'</h3>';
			if ($query->num_rows == 0) {
					
					echo house_not_found();
			} else {
				if($row = mysqli_fetch_array($query)) {
					for($i=0; $i <= 3; $i++) {
						echo get_house_cards($row[1], $row[2], $row[3], $row[4], $row[5], $row[6], $row[7], 0);
					}
				}else {
					echo house_not_found();
				}
			}
		}else {
			echo $link->error;
		}
		//Ejemplo de muestra de casa
		echo get_house_cards(1,2,3,4,5,6,7,8);
    ?>
  </div>
</div>

<?php 
	include "desconexionBD.inc"; 
	include 'footer.php'; 
?>


