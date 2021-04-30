<?php include 'header.php'; ?>
<?php include "conexionBD.inc"; ?>

<div class="row h-100">
  <div class="col-sm-12">
    <?php require_once 'utils.php';
		//Variablees que se pasan desde el buscador de la página inicial.
		$destino = $_POST['destino'];
		$fecha_llegada = $_POST['fecha-llegada'];
		$fecha_salida = $_POST['fecha-salida'];
		echo '<p>Mostrando viviendas en '.$destino.' <span>&#183;</span> '.$fecha_llegada.' - '.$fecha_salida.' </p>';
		$numDias = get_days_between_dates($fecha_llegada, $fecha_salida);
		echo get_house_cards(1,2,3,4,5,6,7,8);
		// Mostramos las casas que cumplen con los criterios de busqueda
		if ($query = $link->query("SELECT  Anuncio.id_anuncio, Anuncio.foto, Anuncio.id_vivienda, Vivienda.direccion, Vivienda.precioDia , Vivienda.habitaciones, Vivienda.aseos 
									FROM Anuncio
									INNER JOIN Vivienda ON Anuncio.id_vivienda=Vivienda.id_viv
									WHERE Anuncio.minimo_de_dias <= $numDias;")) {
			if ($query->num_rows == 0) {
					echo house_not_found();
			} else {
				if($row = mysqli_fetch_array($query)) {
					for($i=0; $i <= 3; $i++) {
						//echo get_house_cards($row[0], $row[1], $row[2], $row[3], $_SESSION['destino']);
					}
				}else {
					echo house_not_found();
				}
			}
		}
    ?>
  </div>
</div>

<?php include "desconexionBD.inc"; ?>
<?php include 'footer.php'; ?>


