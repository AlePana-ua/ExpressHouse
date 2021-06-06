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
            <h2>Mis facturas</h2>
            <?php
               if(!$_SESSION['anfitrion']){
                    $query_reservas= "SELECT id_reserva FROM Reserva WHERE id_huesped = '".$idSession."';";
               }else{
                    $query_viviendas = "SELECT id_viv FROM Vivienda WHERE id_anfitrion = '".$idSession."';";
                   
                    $anuncios = array();
                    if( $query = $link->query($query_viviendas)){
                        while($row = mysqli_fetch_array($query)){
                            $query_anuncios = "SELECT id_anuncio FROM Anuncio WHERE id_vivienda = '".$row['id_viv']."';";
                            $query2 = $link->query($query_anuncios);
                            $anuncio = mysqli_fetch_array($query2);
                            array_push($anuncios,$anuncio['id_anuncio']);
                        }
                        $i = 0;
                        $reservas = array();
                        $query_reservas = "";
                        while($row = $anuncios[$i]){
                            $query_reservas = "SELECT id_reserva FROM Reserva WHERE id_anuncio = $row;";
                            $query2 = $link->query($query_reservas);
                            array_push($reservas,$query2['id_anuncio']);
                        }
                    }
                   else {
                       $query_reservas = "null";
                   }
               }
                if($query = $link->query($query_reservas)){
            ?>
            <table class="table table-sm table-striped">
                <thead class="table-light">
                    <tr>
                        <th>Numero reserva</th>
                        <th>Fecha</th>
                        <th>Metodo de pago</th>
                        <th>Importe_total</th>
                        <th>Pagada</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                        while($row = mysqli_fetch_array($query)) {
                            $query_Facturas= "SELECT * FROM Factura WHERE id_reserva = '".$row['id_reserva']."';";
                            $queryFac = $link->query($query_Facturas);
                            $factura = mysqli_fetch_array($queryFac);
                            $numero = $factura['id_reserva'];
                            $fecha = $factura['fecha'];
                            $metodo = $factura['metodopago'];
                            if($factura['pagada']){
                                $pagada = "si";
                            }else{
                                $pagada = "no";
                            }
                            $importe = $factura['importe_total'];
                ?>
                    <tr>
                        <td><?php echo utf8_encode($numero);?></td>
                        <td><?php echo utf8_encode($fecha);?></td>
                        <td><?php echo utf8_encode($metodo);?></td>
                        <td><?php echo utf8_encode($importe);?></td>
                        <td><?php echo utf8_encode($pagada);?></td>
                    </tr>
                <?php }          
                }else { //Fin if($query...)
                    // En caso de un error en la query lo mostramos.
                    echo('<h3><br><br>No hay Facturas</h3>');
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