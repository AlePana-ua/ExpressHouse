<?php 
	session_start();

	// Título de la página 
	$pageTitle = 'Lista viviendas';

	include 'header.php';
	include "conexionBD.inc"; 
?>

<br>
<div class="container-fluid h-100">
	<div class="row">
		<div class="col-sm-12">
			<?php require_once 'utils.php';

				// Si no se especifica una fecha de llegada se selecciona la fecha actual.
				if(isset($_POST['fecha-llegada']) && !empty($_POST['fecha-llegada'])) {
					$fecha_llegada = $_POST['fecha-llegada'];
				}else {
					$fecha_llegada = date("m/d/Y");
				}

				// Si no se especifica una fecha de salida se selecciona la fecha actual mas 4 días.
				if(isset($_POST['fecha-salida']) && !empty($_POST['fecha-salida'])){
					$fecha_salida = $_POST['fecha-salida'];
				}else {
					$fecha_salida = Date('m/d/Y', strtotime('+5 days'));
				}
				
				// Obtenemos el número de dias entre las fechas.
				$numDias = get_days_between_dates($fecha_llegada, $fecha_salida);

				$query_casas = "SELECT  a.id_anuncio
										,a.id_vivienda
										,a.descripcion
										,a.minimo_de_dias
										,v.nombre
										,v.direccion
										,v.precioDia 
										,v.habitaciones
										,v.aseos
								FROM Anuncio a
								INNER JOIN Vivienda v ON a.id_vivienda = v.id_viv
								INNER JOIN ciudad c ON c.id_ciudad = v.id_ciudad
								WHERE a.minimo_de_dias <= '$numDias' ";

				// Si no se realiza la busqueda en una ciudad, mostramos la lista de casa de España.
				if(isset($_POST['destino']) && !empty($_POST['destino'])) {
					$destino = $_POST['destino'];
					$query_casas .= " AND c.nombre='$destino'";
				}else {
					$destino = utf8_decode('España');
					$query_casas .= " AND c.pais='".$destino."'";
				}

				//Si se selecciono el tipo de vivienda filtramos la busqueda. 
				// Si se accede a traves del tipo de casa (p.e Playa)
				if(isset($_POST['tipo-casa']) && !empty($_POST['tipo-casa'])) {
					$tipoCasa = $_POST['tipo-casa'];
					$query_casas .= " AND v.zona = '$tipoCasa'";
				}

				// Cerramos la consulta.
				$query_casas .= ";";

				//echo $query_casas;

				// Mostramos las casas que cumplen con los criterios de busqueda.
				if ($query1 = $link->query($query_casas)) {
					echo '<p>Mostrando '.$query1->num_rows.' resultados <span>&#183;</span> '.$fecha_llegada.' - '.$fecha_salida.' </p>';
					echo '<h3>Viviendas en '.utf8_encode($destino).'</h3>';
					while($row = mysqli_fetch_array($query1)) {	
						echo "......";		
						echo get_house_cards($row['id_vivienda'], 0, $row['nombre'] ,$row['descripcion'], $row['direccion'], $row['precioDia'], $row['habitaciones'],$row['aseos'], $row['minimo_de_dias']);
					}
					mysqli_free_result($result);
					mysqli_close($quer1);
				}else {
					echo $link->error;
				}
			?>
		</div>
	</div>
</div>

<?php 
	include "desconexionBD.inc"; 
	include 'footer.php'; 
?>


