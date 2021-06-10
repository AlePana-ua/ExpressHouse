<?php 
	session_start();

	// Título de la página 
	$pageTitle = 'Viviendas';

	include 'header.php';
	include "conexionBD.inc"; 

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

	// Lista de ciudades
	$query_cities = "SELECT nombre FROM ciudad ORDER BY nombre ASC;";

	// Lista de zonas
	$query_zones = "SELECT DISTINCT zona FROM Vivienda;";

	// Lista de tipos
	$query_type = "SELECT DISTINCT tipo FROM Vivienda;";
?>

<br>
<div class="container-fluid h-100">
	<div class="row">
		<div class="col-sm-12">
			<?php require_once 'utils.php';
				
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
										,v.foto
								FROM Anuncio a
								INNER JOIN Vivienda v ON a.id_vivienda = v.id_viv
								INNER JOIN ciudad c ON c.id_ciudad = v.id_ciudad
								WHERE a.minimo_de_dias <= '$numDias' ";

				// Si no se realiza la busqueda en una ciudad, mostramos la lista de casa de España.
				if(isset($_POST['destino']) && !empty($_POST['destino'])) {
					$destino = $_POST['destino'];
					$query_casas .= " AND c.nombre='$destino'";
				}else {
					$destino = 'España';
					$query_casas .= " AND c.pais='".$destino."'";
				}
				
				//Si se selecciono el tipo de vivienda filtramos la busqueda. 
				// Si se accede a traves del tipo de casa (p.e Playa)
				if(isset($_POST['zona-casa']) && !empty($_POST['zona-casa']) && ('Zona' != $_POST['zona-casa'])) {
					$tipoCasa = $_POST['zona-casa'];
					$query_casas .= " AND v.zona = '$tipoCasa'";
				}else {
					$tipoCasa = "Zona";
				}

				// Cerramos la consulta.
				$query_casas .= ";";
				
				//echo $query_casas;

				// Mostramos las casas que cumplen con los criterios de busqueda.
				if ($query1 = $link->query($query_casas)) {
					echo '<p>Mostrando '.$query1->num_rows.' resultados <span>&#183;</span> '.$fecha_llegada.' - '.$fecha_salida.' </p>';
					echo '<h2>Viviendas en '.utf8_decode($destino).'</h2>';
?>					
					<br>
					<!-- Lista de filtros -->
					<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
						
						<div class="d-flex justify-content-start">
							<select id="btn-filtros" class="btn" name="destino">
								<option selected="selected" value=<?=$destino?>> <?= $destino?> </option>
								<?php 
								// Seleccionamos el nombre de todas las ciudades con viviendas.
								if ($query = $link->query($query_cities)) {
									if ($query->num_rows == 0) {
										echo "<option disabled=\"disabled\">No hay ciudades</option>";
									} else {
										while($row = mysqli_fetch_array($query)) {  
											echo get_list_of_cities($row[0]);
										}
									}
									$query->close();
								}
								?> 
							</select>
							<span>&nbsp;</span>
							<select id="btn-filtros" class="btn" name="zona-casa">
								<option selected="selected" value=<?= $tipoCasa?>> <?= $tipoCasa ?> </option>
								<?php 
								// Seleccionamos zonas con viviendas.
								if ($query = $link->query($query_zones)) {
									if ($query->num_rows == 0) {
										echo "<option disabled=\"disabled\">No hay zonas</option>";
									} else {
										while($row = mysqli_fetch_array($query)) {  
											echo '<option value="'.$row['0'].'">'.$row['0'].'</option>';
										}
									}
									$query->close();
								}
								?> 
							</select>
							<span>&nbsp;</span>
							<input required id="datepicker-btn-filtros" class="btn"  name="fecha-llegada" value="<?= $fecha_llegada ?>"/>
							<span>&nbsp;</span>
							<input required id="datepicker1-btn-filtros" class="btn" name="fecha-salida" value="<?= $fecha_salida ?>"/>
							<span>&nbsp;</span>
							<button id="btn-filtros" type="submit" class="btn btn-filtros">Aplicar</button>
							
						</div>
					</form>
					<!-- Fin Lista de filtros -->
					<br>
					<hr class="mb-5">
					<script>      
						$('#datepicker-btn-filtros').datepicker();
						$('#datepicker1-btn-filtros').datepicker();
					</script>
			<?php				
					while($row = mysqli_fetch_array($query1)) {		
						echo get_house_cards($row['id_anuncio'], $row['foto'], $row['nombre'] ,$row['descripcion'], 
											 $row['direccion'], $row['precioDia'], $row['habitaciones'],$row['aseos'], 
											 $row['minimo_de_dias'], $fecha_llegada, $fecha_salida);
					}

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


