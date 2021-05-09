<?php include 'header.php'; ?>

<!DOCTYPE html>
<html>
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="css/casa.css" rel="stylesheet">
    </head>

<body>	
    <link rel='stylesheet' href='https://sachinchoolur.github.io/lightslider/dist/css/lightslider.css'>
    <div class="container-fluid mt-2 mb-3">
        <div class="row no-gutters">
            <!-- Inicio columna izquierda -->
            <div class="col-md-5 pr-2">
                <!-- Inicio cuadro con las imagenes -->
                <!-- $id_Anuncio = $_POST['id'];
                     $query = $link->query("SELECT * from Anuncio where id_Anuncio = $id_Anuncio")-->
                <div class="card">
                    <div class="demo">
                        <ul id="lightSlider">
                            <li data-thumb="https://i.imgur.com/KZpuufK.jpg"> <img src="https://i.imgur.com/KZpuufK.jpg" /> </li>
                            <li data-thumb="https://i.imgur.com/GwiUmQA.jpg"> <img src="https://i.imgur.com/GwiUmQA.jpg" /> </li>
                            <li data-thumb="https://i.imgur.com/DhKkTrG.jpg"> <img src="https://i.imgur.com/DhKkTrG.jpg" /> </li>
                            <li data-thumb="https://i.imgur.com/kYWqL7k.jpg"> <img src="https://i.imgur.com/kYWqL7k.jpg" /> </li>
                            <li data-thumb="https://i.imgur.com/c9uUysL.jpg"> <img src="https://i.imgur.com/c9uUysL.jpg" /> </li>
                            <li data-thumb="https://i.imgur.com/KZpuufK.jpg"> <img src="https://i.imgur.com/KZpuufK.jpg" /> </li>
                            <li data-thumb="https://i.imgur.com/GwiUmQA.jpg"> <img src="https://i.imgur.com/GwiUmQA.jpg" /> </li>
                            <li data-thumb="https://i.imgur.com/DhKkTrG.jpg"> <img src="https://i.imgur.com/DhKkTrG.jpg" /> </li>
                            <li data-thumb="https://i.imgur.com/kYWqL7k.jpg"> <img src="https://i.imgur.com/kYWqL7k.jpg" /> </li>
                            <li data-thumb="https://i.imgur.com/c9uUysL.jpg"> <img src="https://i.imgur.com/c9uUysL.jpg" /> </li>
                            <li data-thumb="https://i.imgur.com/KZpuufK.jpg"> <img src="https://i.imgur.com/KZpuufK.jpg" /> </li>
                            <li data-thumb="https://i.imgur.com/GwiUmQA.jpg"> <img src="https://i.imgur.com/GwiUmQA.jpg" /> </li>
                            <li data-thumb="https://i.imgur.com/DhKkTrG.jpg"> <img src="https://i.imgur.com/DhKkTrG.jpg" /> </li>
                            <li data-thumb="https://i.imgur.com/kYWqL7k.jpg"> <img src="https://i.imgur.com/kYWqL7k.jpg" /> </li>
                            <li data-thumb="https://i.imgur.com/c9uUysL.jpg"> <img src="https://i.imgur.com/c9uUysL.jpg" /> </li>
                        </ul>
                    </div>
                </div>
                <!-- Fin cuadro con las imagenes -->
                <br>
                <!-- Inicio reseñas -->
                <div class="card">
                    <div class="card-header">
                        <h6>Reseñas</h6>
                        <div class="d-flex flex-row">
                            <div class="stars"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> </div> <span class="ml-1 font-weight-bold">4.6</span>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="badges"> <span class="badge">All (230)</span> <span class="badge bg-dark "> <i class="fa fa-image"></i> 23 </span> <span class="badge bg-dark "> <i class="fa fa-comments-o"></i> 23 </span> <span class="badge bg-warning"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <span class="ml-1">2,123</span> </span> </div>
                        <hr>
                        <div class="comment-section">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex flex-row align-items-center"> <img src="https://i.imgur.com/o5uMfKo.jpg" class="rounded-circle profile-image">
                                    <div class="d-flex flex-column ml-1 comment-profile">
                                        <div class="comment-ratings"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> </div> <span class="username">Lori Benneth</span>
                                    </div>
                                </div>
                                <div class="date"> <span class="text-muted">2 May</span> </div>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex flex-row align-items-center"> <img src="https://i.imgur.com/tmdHXOY.jpg" class="rounded-circle profile-image">
                                    <div class="d-flex flex-column ml-1 comment-profile">
                                        <div class="comment-ratings"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"> </i> </div> <span class="username">Timona Simaung</span>
                                    </div>
                                </div>
                                <div class="date"> <span class="text-muted">12 May</span> </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Fin reseñas -->
            </div>
            <!-- Fin columna izquierda -->
        
            <!-- Inicio columna derecha -->
            <div class="col-md-7 pr-2">
                <!-- Inicio cuadro con datos-->
                <div class="card">
                    <div class="align-items-center card-header">
                        <div class="about">
                            <span class="font-weight-bold">Casa bonita</span>
                        </div>
                        <div class="p-ratings"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i><span class="ml-1">5.0</span></div>
                    </div>
                    <div class="card-body">
                        <div class="product-description">
                            <div class="mt-4">
                                <span class="font-weight-bold">Description</span>
                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</p>
                                <div>
                                    <!-- Transformarlo a dinámico-->
                                    <b>Habitaciones:</b>4</br>
                                    <b>Baños: </b>2</br>
                                    <b>Categoría: </b>Montaña</br>
                                    <b>Fiestas: </b>Sí</br>
                                    <b>Mascotas: </b>Sí</br>
                                    <b>WiFi: </b>Sí</br>
                                </div>
                                <br>
                                <!-- Tabla reservar -->
                                <div class="col-12 reserva">
                                    <!-- Inicio Buscador -->
                                    <div class="col-auto border">
                                        <form action="" method="POST">
                                            <div class="form-row align-items-center">
                                                <div class="col text-center">
                                                    <label for="Name">Llegada</label>
                                                    <input id="datepicker" class="text-center" width="auto" placeholder="¿Cuándo?" name="fecha-llegada"/>
                                                </div>
                                                <div id="verticle-line"></div>
                                                <div class="col text-center">
                                                    <label for="Name">Salida</label>
                                                    <input id="datepicker1" class="text-center" width="auto" placeholder="¿Cuándo?" name="fecha-salida"/>
                                                </div>
                                                <div class="col">
                                                    <button type="submit" class="btn btn_custom">Reservar</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <script>      
                                        $('#datepicker').datepicker({
                                            uiLibrary: 'bootstrap'
                                        });
                                        $('#datepicker1').datepicker({
                                            uiLibrary: 'bootstrap'
                                        });
                                    </script>
                                </div>
                                <!-- Fin Buscador -->
                            </div> 
                        </div>
                    </div>
                    <br>
                    <!-- Inicio botones casa -->                
                    <div class="card-footer buttons"> 
                    <!-- COMPARTIR -->
                        <button class="btn btn-light wishlist" href="/ExpressHouse/registrar.php"><i class="fa fa-share-alt"></i></button>
                        <!-- FAVORITO -->
                        <button class="btn btn-light wishlist" href="/ExpressHouse/registrar.php"><i class="fa fa-heart-o"></i></button>
                        <!-- DENUNCIAR, pasar id como parámetro -->
                        <button class="btn btn-light wishlist" href="/ExpressHouse/denunciar.php"><i class="fa fa-exclamation-triangle"></i></button>
                        <!-- ENVIAR MENSAJE, pasar id como parámetro --> 
                        <button class="btn btn-light wishlist" href="/ExpressHouse/mensaje.php"><i class="fa fa-envelope-o"></i></button>
                    </div>
                    <!-- Fin botones casa -->
                </div>
                <!-- Fin cuadro con datos -->
                <br>
                <!-- Inicio casas similares -->
                <div class="card"> 
                    <div class="card-header">
                        <span>Casas similares:</span>
                    </div>
                    <div class="card-body">
                        <div class="buttons mt-2 d-flex flex-row">
                            <button class="btn-light wishlist" style="width: 9rem;margin-right: 3px; border-radius: 10px;"> <img src="https://i.imgur.com/KZpuufK.jpg" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h6 class="card-title">$1,999</h6>
                                </div>
                            </button>
                            <button class="btn-light wishlist" style="width: 9rem;margin-right: 3px; border-radius: 10px;"> <img src="https://i.imgur.com/GwiUmQA.jpg" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h6 class="car*<d-title">$1,699</h6>
                                </div>
                            </button>
                            <button class="btn-light wishlist" style="width: 9rem;margin-right: 3px; border-radius: 10px;"> <img src="https://i.imgur.com/c9uUysL.jpg" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h6 class="card-title">$2,999</h6>
                                </div>
                            </button>
                            <button class="btn-light wishlist" style="width: 9rem;margin-right: 3px; border-radius: 10px;"> <img src="https://i.imgur.com/kYWqL7k.jpg" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h6 class="card-title">$3,999</h6>
                                </div>
                            </button>
                            <button class="btn-light wishlist" style="width: 9rem;margin-right: 3px; border-radius: 10px;"> <img src="https://i.imgur.com/DhKkTrG.jpg" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h6 class="card-title">$999</h6>
                                </div>
                            </button>
                        </div>
                    </div>
                </div>
                <!-- Fin casas similares -->
            </div>
            <!-- Fin columna derecha -->
        </div>
    </div>
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js'></script>
    <script src='https://sachinchoolur.github.io/lightslider/dist/js/lightslider.js'></script>
    <script>
        $('#lightSlider').lightSlider({
            gallery: true,
            item: 1,
            loop: true,
            slideMargin: 0,
            thumbItem: 9
        });
    </script>
</body>
</html>

<?php include 'footer.php'; ?>
