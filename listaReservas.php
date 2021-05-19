<?php 
    session_start();
    include "conexionBD.inc";
    include 'header.php'; 
    
    // Titulo que se muestra en la pestaña del navegador.
    $pageTitle = 'Lista Reservas';

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
            <h2>Mis reservas</h2>
            <?php
               
                $query_reservas= "SELECT * FROM Reserva WHERE id_huesped = '".$idSession."' ORDER BY id_reserva ASC LIMIT $start_from, $resultados_por_pagina;";
                if($query = $link->query($query_reservas)){
            ?>
            <table class="table table-sm table-striped">
                <thead class="table-light">
                    <tr>
                        <th>Anuncio</th>
                        <th>Fecha inicio</th>
                        <th>Fecha fin</th>
                        <th>Confirmada</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                        while($row = mysqli_fetch_array($query)) {
                            $query_anunDesc= "SELECT descripcion FROM Anuncio WHERE id_anuncio = '".$row['id_anuncio']."';";
                            $queryDesc = $link->query($query_anunDesc);
                            $descripcion = mysqli_fetch_array($queryDesc)[0];   
                            $fechaIni = $row['fecha_inicio'];
                            $fechaFin = $row['fecha_final'];
                            if($row['confirmada']){
                                $confirmada = "si";
                            }else{
                                $confirmada = "no";
                            }
                ?>
                    <tr>
                        <td><?php echo utf8_encode($descripcion);?></td>
                        <td><?php echo utf8_encode($fechaIni);?></td>
                        <td><?php echo utf8_encode($fechaFin);?></td>
                        <td><?php echo utf8_encode($confirmada);?></td>
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
        <!-- Lista de páginas con reserva -->
        <div class="row d-flex justify-content-center">
            <?php
                $query_paginas = "SELECT COUNT(id_reserva) AS total FROM Reserva";
                if($query2 = $link->query($query_paginas)){
                    while($row = mysqli_fetch_array($query2)) {
                        $total_pages = ceil( $row['total']/ $resultados_por_pagina);
                    }
                    for($i=1; $i<=$total_pages ;$i++) {
                        echo "<a href=\"lista_usuarios.php?page=$i\">$i&nbsp</a>";
                        
                    }
                }else {
                    echo $link->error;
                }
            ?>
        </div>
    </div>
</div>


<?php 
    include "desconexionBD.inc";
    include 'footer.php'; 
?>