<?php 
    session_start();

    // Título de la página 
    $pageTitle = 'Casa';

    include 'header.php';
    include "conexionBD.inc"; 
    $idUsuario = $_SESSION['idUsuario'];
?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="css/casa.css" rel="stylesheet">
        <link rel='stylesheet' href='https://sachinchoolur.github.io/lightslider/dist/css/lightslider.css'>
    </head>
    <?php
        if(isset($_GET['id-anuncio']) && !empty($_GET['id-anuncio'])) 
        {
            $idAnuncio = $_GET['id-anuncio'];
        } 
        if(isset($_GET['fecha-inicio']) && !empty($_GET['fecha-inicio'])) 
        {
            $fechaLlegada = $_GET['fecha-inicio'];
        } 
        if(isset($_GET['fecha-fin']) && !empty($_GET['fecha-fin'])) 
        {
            $fechaSalida = $_GET['fecha-fin'];
        } 
        
        $query_casa = "SELECT a.id_anuncio
                        ,a.id_vivienda
                        ,a.descripcion
                        ,v.direccion
                        ,v.precioDia 
                        ,v.habitaciones
                        ,v.aseos
                        ,v.nombre
                        ,v.aseos
                        ,v.fiestas
                        ,v.mascotas
                        ,v.tipo
                        ,v.foto
                        ,v.id_anfitrion
                FROM Anuncio a
                INNER JOIN Vivienda v ON a.id_vivienda = v.id_viv 
                WHERE a.id_anuncio = '$idAnuncio';";
        if ($query = $link->query($query_casa)) {
            if($row = mysqli_fetch_array($query)) {
                $idAnfitrion = $row['id_anfitrion'];
    ?>
    <div class="container-fluid mt-2 mb-3">
        <div class="row no-gutters">
            <!-- Inicio columna izquierda -->
            <div class="col-md-5 pr-2">
                <!-- Inicio cuadro con las imagenes -->
                <div class="card">
                    <div class="demo">
                        <ul id="lightSlider">
                        <?php
                            $imagenes = glob($row['foto']."/*.*");
                            sort($imagenes);
                            if(count($imagenes) > 0){
                                foreach($imagenes as $image) {
                                    echo '<li data-thumb="'.$image.'"> <img id="fotos-casa" src="'.$image.'" /> </li>';
                                }
                            }else {
                                // En caso de error muestra una imagen por defecto.
                                $image = 'img/Alicante.jpg';
                                echo '<li data-thumb="'.$image.'"> <img id="fotos-casa" src="'.$image.'" /> </li>';
                            }
                        ?>
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
                                        <div class="comment-ratings">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"> </i> 
                                        </div> 
                                        <span class="username">Timona Simaung</span>
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
                            <h2> <?php echo $row['nombre'];?> </h2>
                        </div>
                        <div class="p-ratings"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i><span class="ml-1">5.0</span></div>
                    </div>
                    <div class="card-body">
                        <div class="product-description">
                            <div class="mt-4">
                                <span class="font-weight-bold">Description</span>
                                <p> <?= $row['descripcion']?></p>
                                <div>
                                    <!-- Transformarlo a dinámico-->
                                    <b>Habitaciones:</b> <?= $row['habitaciones']?></br>
                                    <b>Baños: </b> <?= $row['aseos']?></br>
                                    <b>Categoría: </b> <?= $row['tipo'] ?></br>

                                    <b>Fiestas: </b> <?= ($row['fiestas'] == 1 ? 'Si':'No' )?></br>
                                    <b>Mascotas: </b> <?= ($row['mascotas'] == 1 ? 'Si':'No' )?></br>
                                </div>
                                <br>
                                <!-- Tabla reservar -->
                                <div class="col-12 reserva">
                                    <!-- Inicio Buscador -->
                                    <div class="col-auto border">
                                        <form action="/ExpressHouse/solicitarReserva.php" method="GET">
                                            <div class="form-row align-items-center">
                                                <div class="col text-center">
                                                    <label for="Name">Llegada</label>
                                                    <input class="text-center" width="auto" placeholder="¿Cuándo?" name="fecha_llegada" value="<?= $fechaLlegada?>"/>
                                                </div>
                                                <div id="verticle-line"></div>
                                                <div class="col text-center">
                                                    <label for="Name">Salida</label>
                                                    <input class="text-center" width="auto" placeholder="¿Cuándo?" name="fecha_salida" value="<?= $fechaSalida?>"/>
                                                </div>
                                                <div class="col">
                                                    <input name="id_vivienda" type="hidden" value="<?= $row['id_vivienda'];?>">  
                                                    <input name="id_anuncio" type="hidden" value="<?= $idAnuncio?>">   
                                                    <button class="btn btn_custom" type="submit">Reservar</button>
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
                        <form method="GET" action="crearPublicacionRedSocial.php">
                            <input name="id-anuncio" type="hidden" value="<?= $idAnuncio?>">
                            <button class="btn btn-light wishlist" type="summit"><i class="fa fa-share-alt"></i></button>
                        </form>
                        <!-- FAVORITO -->
                        <form method="GET" action="/ExpressHouse/Vistas_Favorito/crearFavorito.php">
                            <input name="id_huesped" type="hidden" value="<?= $idUsuario?>">
                            <input name="id_anuncio" type="hidden" value="<?= $idAnuncio?>">
                            <button class="btn btn-light wishlist" type="summit"><i class="fa fa-heart-o"></i></button>
                        </form>
                        <!-- DENUNCIAR, pasar id anfitrion como parámetro -->
                        <form method="GET" action="denunciar.php">
                            <input id="id-anfitrion" name="id-anfitrion" type="hidden" value="'<?= $idAnfitrion?>.'">
                            <button class="btn btn-light wishlist" href="/ExpressHouse/denunciar.php"><i class="fa fa-exclamation-triangle"></i></button>
                        </form>
                        <!-- ENVIAR MENSAJE, pasar id anfitrion como parámetro --> 
                        <form method="GET" action="mensaje.php">
                            <input id="id-anfitrion" name="id-anfitrion" type="hidden" value="<?= $idAnfitrion ?>">
                            <button class="btn btn-light wishlist" href="/ExpressHouse/mensaje.php"><i class="fa fa-envelope-o"></i></button>
                        </form>
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
<?php
    // Fin del if de la query
                }
            }else {
                echo $link->error;
            }
?>
</html>

<?php 
    include "desconexionBD.inc"; 
    include 'footer.php'; 
?>
