<?php 
    session_start();
    include "conexionBD.inc";
    include 'header.php'; 
    
    // Titulo que se muestra en la pestaña del navegador.
    $pageTitle = 'Mis viviendas';

    // Comprobamos en que página de la lista estamos. 
    if(isset($_GET['page'])) {
        $page = $_GET['page'];
    }else {
        $page = 1;
    }
    // Cantidad de usuarios por página.
    $resultados_por_pagina = 20;
    // Número de página donde comenzar la nueva query 
    $start_from = ($page-1) * $resultados_por_pagina;

    $idBuscar = $_SESSION['usuario'];
    $queryID = $link ->query("SELECT id_user FROM Usuario WHERE correo = '".$idBuscar."' ");
    $idSession = mysqli_fetch_array($queryID)[0];    

    /*TO-DO: implementar la seguridad SOLOHUESPEDES*/
?>
<br>

<div class="h-auto container-fluid">
    <div class="container">
        <!-- Lista de reservas extraidas de la base de datos -->
        <div class="row d-flex justify-content-center">
            <h2>Mis viviendas</h2>
            <?php
               
                $query_reservas= "SELECT * FROM Vivienda WHERE id_anfitrion= '".$idSession."' ORDER BY id_viv ASC LIMIT $start_from, $resultados_por_pagina;";
                if($query = $link->query($query_reservas)){
            ?>
            <table class="table table-sm table-striped">
                <thead class="table-light">
                    <tr>
                        <th>Nombre</th>
                        <th>Direccion</th>
                        <th>Habitaciones</th>
                        <th>Aseos</th>
                        <th>Fiestas</th>
                        <th>Mascotas</th>
                        <th>Precio por dia</th>
                        <th>Tipo</th>
                        <th>Zona</th>
                        <th>Foto</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                        while($row = mysqli_fetch_array($query)) { 
                            $nombre = $row['nombre'];
                            $direccion = $row['direccion'];
                            $habitaciones = $row['habitaciones'];
                            $aseos = $row['aseos'];
                            if($row['fiestas']){
                                $fiestas = "si";
                            }else{
                                $fiestas = "no";
                            }
                            if($row['mascotas']){
                                $mascotas = "si";
                            }else{
                                $mascotas = "no";
                            }
                            $tipo = $row['tipo'];
                            $precioDia = $row['precioDia'];
                            $zona = $row['zona'];
                            $foto = $row['foto'];
                ?>
                    <tr>
                        <td><?php echo utf8_encode($nombre);?></td>
                        <td><?php echo utf8_encode($direccion);?></td>
                        <td><?php echo utf8_encode($habitaciones);?></td>
                        <td><?php echo utf8_encode($aseos);?></td>
                        <td><?php echo utf8_encode($fiestas);?></td>
                        <td><?php echo utf8_encode($mascotas);?></td>
                        <td><?php echo utf8_encode($precioDia);?></td>
                        <td><?php echo utf8_encode($tipo);?></td>
                        <td><?php echo utf8_encode($zona);?></td>
                        <?php echo('<td><img id="city-card-img" class="card-img" src="'.$foto.'.jpg"></td>');?>
                    </tr>
                <?php }          
                }else { //Fin if($query...)
                    // En caso de un error en la query lo mostramos.
                    echo $link->error;
                }
                ?>
                </tbody>
            </table>
        </div>
        <br>
    </div>
</div>


<?php 
    include "desconexionBD.inc";
    include 'footer.php'; 
?>