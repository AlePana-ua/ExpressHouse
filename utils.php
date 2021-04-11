<?php
    function first($int, $string){ //function parameters, two variables.
        return $string;  //returns the second argument passed into the function
    }
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
                <div class="card">
                    <img class="card-img" src="img/city_draw_'.$num.'.jpg">
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
                <div class="card">
                    <img class="card-img" src="img/tipo_'.$type.'.jpg">
                    <div class="card-img-overlay text-white d-flex flex-column justify-content-center">
                    <h3 class="card-title">'.$type.'</h3>
                    <div class="link d-flex">
                        <a href="#" class="card-link text-warning">Read More</a>
                    </div>
                    </div>
                </div>
            </div>';
    }

    function get_house_cards($idVivienda, $foto, $descripcion, $precioDia){
        echo '<div class="col-md-8">
                <div class="row p-2 bg-white">
                    <div class="col-md-3 mt-1"><img class="img-fluid img-responsive rounded product-image" src="img/Alicante.jpg"></div>
                    <div class="col-md-6 mt-1">
                        <h5>Awesome product</h5>
                        <div class="d-flex flex-row">
                            <div class="ratings mr-2"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></div><span>310</span>
                        </div>
                        <div class="mt-1 mb-1 spec-1"><span>Lorem ipsum</span><span class="dot"></span><span>Lorem ipsum</span><span class="dot"></span><span>Lorem ipsum<br></span></div>
                        <div class="mt-1 mb-1 spec-1"><span>Lorem ipsum</span><span class="dot"></span><span>Lorem ipsum</span><span class="dot"></span><span>Lorem ipsum<br></span></div>
                        <p class="text-justify text-truncate para mb-0">'.$descripcion.'.<br><br></p>
                    </div>
                    <div class="align-items-center align-content-center col-md-3 border-left mt-1">
                        <div class="d-flex flex-row align-items-center">
                            <h4 class="mr-1">'.$precioDia.'€</h4><span class="strike-text">/noche</span>
                        </div>
                        <div class="d-flex flex-column mt-4"><button class="btn btn-primary btn-sm" type="button">Details</button><button class="btn btn-outline-primary btn-sm mt-2" type="button">Add to wishlist</button></div>
                    </div>
                </div>
                <hr>
            </div>';
    }

    function house_not_found() {
        echo '<div class="col-md-12">
            <h3> No se encontraron casas.</h3>
            <img class="card-img" src="img/Vista_de_Alicante.jpg">
        </div>';
    }
?>