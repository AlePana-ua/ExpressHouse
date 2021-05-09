<?php
	/**
	 * Función que recibe una ciudad y devuelve una option con 
	 * los datos de esta.
	 * 
	 * @param String $ciudad Nombre de la ciudad.
	 * 
	 * @return String Con código HTML de la option 
	 */
    function get_list_of_cities($ciudad) {
        echo '<option value="'.utf8_encode($ciudad).'">'.utf8_encode($ciudad).'</option>';
    }

	/**
	 * 
	 */
    function get_date_picker($id) {
        echo '<div class="input-group date" id="datetimepicker">
        		<input type="text" class="form-control" />
        		<span class="input-group-addon">
            		<span class="glyphicon glyphicon-calendar"></span>
        		</span>  
       		</div>
			<script type="text/javascript">
				$(function () {
					$("#datetimepicker").datetimepicker();
				});
			</script>';
    }

	/**
	 * Esta función se encarga de devolver las tarjetas de las ciudades.
	 * 
	 * @param string $city Ciudad donde existen vivienda en la aplicación (p.e "Alicante").
	 * @param integer $num Número de la iteración para asignarle una imagen por defecto.  
	 * 
	 * @return string Con el código HTML de la tarjeta.
	 */
    function get_cities_cards($city, $num) {
		echo 	'<br>
				<div class="col-12 col-sm-4 col-md-2 col-lg-2">
					<div id="type-card" class="card">
						<img id="city-card-img" class="card-img" src="img/landscape_'.$num.'.jpg">
						<div class="card-body">
							<form action="listaViviendas.php" method="POST">
								<h3 class="card-title">'.$city.'</h3>		
								<input type="hidden" name="destino" value="'.$city.'">
								<button type="submit" class="btn btn-listas">Ver</button>
							</form>
						</div>	
					</div>
				</div>';
    }

	/**
	 * Esta función se encarga de devolver las tarjetas de los tipos dee casa que se 
	 * encuentra en la base de datos.
	 * 
	 * @param string $type Tipo de vivienda (p.e "Playa")
	 * 
	 * @return string Con el código HTML de la tarjeta.
	 */
    function get_house_type_cards($type) {
		echo 	'<br>
				<div class="col-12 col-sm-4 col-md-2 col-lg-2">
					<div id="type-card" class="card">
						<img id="type-card-img" class="card-img" src="img/tipo_'.$type.'.jpg">
						<div class="card-body">
							<form action="listaViviendas.php" method="POST">
								<h3 class="card-title">'.$type.'</h3>
								<input type="hidden" name="tipo-casa" value="'.$type.'">
								<button type="submit" class="btn btn-listas">Ver</button>
							</form>
						</div>
					</div>
				</div>';
    }

	/**
	 * Esta función se eencarga de devolver las tarjetas de las casas.
	 *  
	 * @param integer $idVivienda Identificador de la vivienda.
	 * @param string $foto URL de las fotos de la vivienda
	 * @param string $descripcion Descripción de la vivienda.
	 * @param integer $precioDia Precio por día de estadia en la vivienda.
	 * @param string $ubicacion Ciudad de unicación de la vivienda. 
	 * 
	 * @return string Con el código HTML de la tarjeta que muestra una vivienda.
	 */
    function get_house_cards($idVivienda, $foto, $descripcion, $ubicacion, $precioDia, $dormitorios, $aseos, $numHuespedes ){
		echo 	'<div class="col-md-8">
					<div class="row p-2 bg-white">
						
							<div class="col-md-3 mt-1"><img class="img-fluid img-responsive rounded product-image" src="img/Alicante.jpg"></div>
							<div class="col-md-6 mt-1">
								<h5>Casa</h5>
								<div class="d-flex flex-row">
									<div class="ratings mr-2"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></div><span>'.$ubicacion.'</span>
								</div>
								<hr style="width:50px; background: rgba(110, 110, 110, 0.5); margin-left:0;">
								<div class="mt-1 mb-1 spec-1">
									<span>'.$numHuespedes.' huéspedes </span><span>&#183;</span><span> '.$dormitorios.' dormitorios </span><span>&#183;</span><span> '.$aseos.' baño</span>
								</div>
								<p class="text-justify text-truncate para mb-0">'.$descripcion.'.<br><br></p>
							</div>
							<div class="align-items-center align-content-center col-md-3 mt-1">
								<div class="d-flex flex-row align-items-center">
									<h4 class="mr-1">'.$precioDia.'€</h4><span class="strike-text">/noche</span>
								</div>
								<br>
								<div class="d-flex flex-column mt-4">
									<form action="casa.php" method="POST">
										<p name="id-vivienda">'.$idVivienda.'<p>
										<button class="btn btn-sm btn-detalles" type="submit" method="POST">Detalles</button>
									</form>
								</div>
							</div>
						
					</div>
					<hr>
				</div>';
    }

	/**
	 * 
	 */
    function house_not_found() {
		echo '<div class="col-md-12">
				<h3> No se encontraron casas.</h3>
			</div>';
	}

	/** 
	 * Esta función deevueelve eel número de días entre dos fechas.
	 * 
	 * @param string $date1 Fecha inicial.
	 * @param string $date1 Fecha final.
	 * 
	 * @return integer $interval Número de dias entre ambas fechas. 
	*/
	function get_days_between_dates($date1, $date2) {
		$start  = date_create($date1);
		$end    = date_create($date2); 
		$diff   = date_diff($start, $end);

		return $diff->days;
	}
?>