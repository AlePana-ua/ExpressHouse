<?php
    function get_list_of_cities() {
        echo '<option value="Alicante">Alicante</option>';
    }

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

    function get_cities_cards($city, $num) {
			echo '<br>
						<div class="col-12 col-sm-4 col-md-2 col-lg-2">
							<div id="city-card" class="card">
									<img id="city-card-img" class="card-img" src="img/landscape_'.$num.'.jpg">
									<div class="card-img-overlay text-white d-flex flex-column justify-content-center">
									<h3 class="card-title">'.$city.'</h3>
									<div class="link d-flex">
											<a href="#" class="card-link text-warning">Read More</a>
									</div>
									</div>
							</div>
					</div>';
    }

    function get_house_type_cards($type) {
			echo '<br>
					<div class="col-12 col-sm-4 col-md-2 col-lg-2">
						<div id="type-card" class="card">
								<img id="type-card-img" class="card-img" src="img/tipo_'.$type.'.jpg">
								<div class="card-img-overlay text-white d-flex flex-column justify-content-center">
								<h3 class="card-title">'.$type.'</h3>
								<div class="link d-flex">
										<a href="#" class="card-link text-warning">Read More</a>
								</div>
								</div>
						</div>
					</div>';
    }

	/**
	 * Esta función se eencarga de devolver las tarjetas de las casas.
	 * 
	 * 
	 *  
	 * @param integer $idVivienda Identificador de la vivienda.
	 * @param string $foto URL de las fotos de la vivienda
	 * @param string $descripcion Descripción de la vivienda.
	 * @param integer $precioDia Precio por día de estadia en la vivienda.
	 * @param string $ubicacion Ciudad de unicación de la vivienda. 
	 * 
	 * @return str
	 */
    function get_house_cards($idVivienda, $foto, $descripcion, $precioDia, $ubicacion){
			echo '<div class="col-md-8">
							<div class="row p-2 bg-white">
									<div class="col-md-3 mt-1"><img class="img-fluid img-responsive rounded product-image" src="img/Alicante.jpg"></div>
									<div class="col-md-6 mt-1">
											<h5>'.$idVivienda.'</h5>
											<div class="d-flex flex-row">
													<div class="ratings mr-2"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></div><span>'.$ubicacion.'</span>
											</div>
											<div class="mt-1 mb-1 spec-1">
													<span>Lorem ipsum</span><span>&#183;</span><span>Lorem ipsum</span><span>&#183;</span><span>Lorem ipsum<br></span>
											</div>
											<p class="text-justify text-truncate para mb-0">'.$descripcion.'.<br><br></p>
									</div>
									<div class="align-items-center align-content-center col-md-3 mt-1">
											<div class="d-flex flex-row align-items-center">
													<h4 class="mr-1">'.$precioDia.'€</h4><span class="strike-text">/noche</span>
											</div>
											<div class="d-flex flex-column mt-4">
													<form action="casatest.php">
															<button class="btn btn-sm btn-detalles" type="submit" method="POST">Detalles</button>
													</form>
											</div>
									</div>
							</div>
							<hr>
					</div>';
    }

    function house_not_found() {
			echo '<div class="col-md-12">
					<h3> No se encontraron casas.</h3>
					<img class="card-img" src="img/Vista_de_Alicante.JPG">
				</div>';
    }
?>