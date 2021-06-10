<?php
	
	/**
	 * Función que recibe una ciudad y devuelve una option con 
	 * los datos de esta.
	 * 
	 * @param String $ciudad Nombre de la ciudad.
	 * 
	 * @return String Con código HTML de la opción.
	 */
    function get_list_of_cities($ciudad) {
        echo '<option value="'.$ciudad.'">'.$ciudad.'</option>';
    }

	/**
	 * Función que recibe el id y nombre de una ciudad 
	 * y devuelve una opción con los datos de esta.
	 * 
	 * @param String $idCiudad Identificador de la ciudad.
	 * @param String $ciudad Nombre de la ciudad.
	 * 
	 * @return String Con código HTML de la opción.
	 */
	function get_id_list_of_cities($idCiudad, $ciudad){
		echo '<option value="'.$idCiudad.'">'.$ciudad.'</option>';
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
		echo   '<br>
				<div class="col-12 col-sm-4 col-md-2 col-lg-2">
					<div id="type-card" class="card">
						<img id="city-card-img" class="card-img" src="img/landscape_'.$num.'.jpg">
						<div class="card-body">
							<form action="listaViviendas.php" method="POST">
								<h3 class="card-title">'.utf8_decode($city).'</h3>		
								<input type="hidden" name="destino" value="'.$city.'">
								<button type="submit" class="btn btn-listas">Ver</button>
							</form>
						</div>	
					</div>
				</div>';
    }

	/**
	 * Esta función se encarga de devolver las tarjetas de los tipos de casa que se 
	 * encuentra en la base de datos.
	 * 
	 * @param string $type Tipo de vivienda (p.e "Playa")
	 * 
	 * @return string Con el código HTML de la tarjeta.
	 */
    function get_house_type_cards($type) {
		echo   '<br>
				<div class="col-12 col-sm-4 col-md-2 col-lg-2">
					<div id="type-card" class="card">
						<img id="type-card-img" class="card-img" src="img/tipo_'.$type.'.jpg">
						<div class="card-body">
							<form action="listaViviendas.php" method="POST">
								<h3 class="card-title">'.$type.'</h3>
								<input type="hidden" name="zona-casa" value="'.$type.'">
								<button type="submit" class="btn btn-listas">Ver</button>
							</form>
						</div>
					</div>
				</div>';
    }

	/**
	 * Esta función se eencarga de devolver las tarjetas de las casas.
	 *  
	 * @param integer $idAnuncio Identificador del anuncio.
	 * @param string $foto URL de las fotos de la vivienda
	 * @param string $descripcion Descripción de la vivienda.
	 * @param integer $precioDia Precio por día de estadia en la vivienda.
	 * @param string $ubicacion Ciudad de unicación de la vivienda. 
	 * 
	 * @return string Con el código HTML de la tarjeta que muestra una vivienda.
	 */
    function get_house_cards($idAnuncio, $foto, $nombre, $descripcion, $ubicacion, 
							 $precioDia, $dormitorios, $aseos, $numHuespedes, $fechaInicio, $fechaFin){
		//Extraemos la primera imagen del directorio
		$imagenes = glob($foto."/*.*");
		sort($imagenes);
		
		if(count($imagenes) > 0){
			$img = $imagenes[0];
			echo $img;
			//echo '<img class="img-fluid img-responsive rounded product-image" src="./imagenes_casas/defecto/1/C.jpg">';
		}else {
			// En caso de error muestra una imagen por defecto.
			$img = 'img/Alicante.jpg';
		}
		echo 	'<div class="col-md-8">
					<div class="row p-2 bg-white">	
							<div class="col-md-3 mt-1">
								<img class="img-fluid img-responsive rounded product-image" src="'.$img.'">
							</div>
							<div class="col-md-6 mt-1">
								<h5>'.$nombre.'</h5>
								<div class="d-flex flex-row">
									<div class="ratings mr-2">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
									</div>
									<span>'.$ubicacion.'</span>
								</div>
								<hr style="width:50px; background: rgba(110, 110, 110, 0.5); margin-left:0;">
								<div class="mt-1 mb-1 spec-1">
									<span>'.$numHuespedes.' huéspedes </span><span>&#183;</span><span> '.$dormitorios.' dormitorios </span><span>&#183;</span><span> '.$aseos.' aseos</span>
								</div>
								<p class="text-justify text-truncate para mb-0">'.$descripcion.'.<br><br></p>
							</div>
							<div class="align-items-center align-content-center col-md-3 mt-1">
								<div class="d-flex flex-row align-items-center">
									<h4 class="mr-1">'.$precioDia.'€</h4><span class="strike-text">/noche</span>
								</div>
								<br>
								<div class="d-flex flex-column mt-4">
									<form action="casa.php" method="GET">
										<input name="fecha-inicio" type="hidden" value="'.$fechaInicio.'">
										<input name="fecha-fin" type="hidden" value="'.$fechaFin.'">
										<input name="id-anuncio" type="hidden" value="'.$idAnuncio.'">
										<button class="btn btn-sm btn-detalles" type="submit">Detalles</button>
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
	 * Esta función devuelve eel número de días entre dos fechas.
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
	
	/**
	 * Esta función dvuelve una lista con los posibles 
	 * valores de una columna de tipo ENUM.
	 * 
	 * @param string $table_name Nombre de la tabla con la columna enum.
	 * @param string $column_name Nombre de la columna de tipo enum.
	 * 
	 * @return integer $enum_list Lista de posibles valores de la columna.
	 */
	function enum_values($table_name, $column_name) {
		include "conexionBD.inc"; 
		$enum_list = [];
		$query = "
			SELECT COLUMN_TYPE 
			FROM INFORMATION_SCHEMA.COLUMNS
			WHERE TABLE_NAME = '" .$table_name."' 
				AND COLUMN_NAME = '".$column_name."';";
		if ($result = $link->query($query)){
			if($row = mysqli_fetch_array($result)) {
				$enum_list = explode(",", str_replace("'", "", substr($row['COLUMN_TYPE'], 5, (strlen($row['COLUMN_TYPE'])-6))));
			}
		}
		include "desconexionBD.inc";
		return $enum_list;

	}

?>