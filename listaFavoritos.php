<?php 
    session_start();
    include "conexionBD.inc";
    include 'header.php'; 
    
    // Titulo que se muestra en la pestaña del navegador.
    $pageTitle = 'Lista Denuncias';

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
            <h2>Anuncios preferidos</h2>
            <?php
               
                $query_favs= "SELECT * FROM Marcar_favorito WHERE id_huesped = '".$idSession."' ORDER BY id_anuncio ASC LIMIT $start_from, $resultados_por_pagina;";
                if($query = $link->query($query_favs)){
            ?>
            <table class="table table-sm table-striped">
                <thead class="table-light">
                    <tr>
                        <th>Anfitrion</th>
                        <th>Descripcion</th>
                        <th>Direccion</th>
                        <th>Precio por dia</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                        while($row = mysqli_fetch_array($query)) {
                            $query_Anuncio= "SELECT * FROM Anuncio WHERE id_anuncio = '".$row['id_anuncio']."';";
                            $queryAnun = $link->query($query_Anuncio);
                            $consulta = mysqli_fetch_array($queryAnun);
                            
                            $descripcion= $consulta['descripcion'];  
                             
                            $query_Vivienda =  "SELECT * FROM Vivienda WHERE id_viv = '".$consulta['id_vivienda']."';";
                            $queryViv = $link->query($query_Vivienda);
                            $consulta = mysqli_fetch_array($queryViv);
                            $direccion = $consulta['direccion'];
                            $precioDia = $consulta['precioDia'];
                            $query_Anfitrion= "SELECT nombre FROM Usuario WHERE id_user = '".$consulta['id_anfitrion']."';";
                            $queryAnf = $link->query($query_Anfitrion);
                            $anfitrion = mysqli_fetch_array($queryAnf)[0];

                ?>
                    <tr>
                        <td><?php echo utf8_encode($anfitrion);?></td>
                        <td><?php echo utf8_encode($descripcion);?></td>
                        <td><?php echo utf8_encode($direccion);?></td>
                        <td><?php echo utf8_encode($precioDia);?></td>
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