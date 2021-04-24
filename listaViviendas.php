<?php include 'header.php'; ?>
<?php //include_once "conexionBD.inc"; ?>

<div class="row h-auto">
  <div class="col-sm-12">
    <?php require_once 'utils.php';
		//Variablees que se pasan desde el buscador de la página inicial.
		$destino = $_POST['destino'];
		$fecha_llegada = $_POST['fecha-llegada'];
		$fecha_salida = $_POST['fecha-salida'];

		echo '<h3>Mostrando viviendas en '.$destino.'</h3>';
		echo '<h5>Llegada: '.$fecha_llegada.'&nbsp Salida: '.$fecha_salida.'</h5>';

		//para pruebas sin datos
		$totalDias = 10;
		// Mostramos las casas que cumplen con los criterios de busqueda
		/*$query = $link->query("SELECT idVivienda, foto, descripcion from Anuncio");
		if ($query->num_rows == 0) {
				echo house_not_found();
		} else {
				if($row = mysqli_fetch_array($query)) {
						for($i=0; $i <= 3; $i++) {
								echo get_house_cards(1, 1, 1, 1);
						}
				}else {
						echo house_not_found();//"<h3> Error al mostrar las casa, intente de nuevo mas tarde</h3>";
				}
		}*/

		/* En caso que la conexión falle, comentar el código anterior
		* y utilizar el siguiente.
		*/
		for($i=0; $i <= 2; $i++) {
			echo get_house_cards(0, 1, 'Una casa bonita', 25, $_SESSION['destino']);
		}
    ?>
  </div>
</div>

<?php //include_once "desconexionBD.inc"; ?>
<?php include 'footer.php'; ?>


