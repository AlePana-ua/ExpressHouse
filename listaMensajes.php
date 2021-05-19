<?php 
    session_start();
    include "conexionBD.inc";
    include 'header.php'; 
    
    // Titulo que se muestra en la pestaña del navegador.
    $pageTitle = 'Lista Mensajes';

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
?>
<br>

<div class="h-auto container-fluid">
    <div class="container">
        <!-- Lista de reseñas extraidas de la base de datos -->
        <div class="row d-flex justify-content-center">
            <h2>Mensajes</h2>
            <?php
                if($_SESSION["anfitrion"]){
                    $query_mensajes= "SELECT * FROM Mensaje WHERE receptor = '".$idSession."' ORDER BY id_mensaje ASC LIMIT $start_from, $resultados_por_pagina;";
                }else{
                    $query_mensajes= "SELECT * FROM Mensaje WHERE emisor = '".$idSession."' ORDER BY id_mensaje ASC LIMIT $start_from, $resultados_por_pagina;";
                }
                if($query = $link->query($query_mensajes)){
            ?>
            <table class="table table-sm table-striped">
                <thead class="table-light">
                    <tr>
                        <th>Usuario</th>
                        <th>Asunto</th>
                        <th>Contenido</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    
                        while($row = mysqli_fetch_array($query)) {
                            if($_SESSION["anfitrion"]){
                                $query_usuName= "SELECT nombre FROM Usuario WHERE id_user = '".$row['emisor']."';";
                                $queryName = $link->query($query_usuName);
                                $usuName = mysqli_fetch_array($queryName)[0];   
                                $asunto = $row['asunto'];
                                $contenido = $row['contenido'];
                            }else{
                                $query_usuName= "SELECT nombre FROM Usuario WHERE id_user = '".$row['receptor']."';";
                                $queryName = $link->query($query_usuName);
                                $usuName = mysqli_fetch_array($queryName)[0];   
                                $asunto = $row['asunto'];
                                $contenido = $row['contenido'];
                        } 
                    
    
                ?>
                    <tr>
                        <td><?php echo utf8_encode($usuName);?></td>
                        <td><?php echo utf8_encode($asunto);?></td>
                        <td><?php echo utf8_encode($contenido);?></td>
                        <td>
                            <a href='confirmarBorrarResenya.php?id=<?=$id_resenya?>' target="popup" onClick="window.open(this.href, this.target, 'width=350,height=620'); return false;">
                                <img class="" src="img/delete_icon.png" width="40" height="40">
                            </a>
                        </td>
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
        <!-- Lista de páginas con reseñas -->
        <div class="row d-flex justify-content-center">
            <?php
                $query_paginas = "SELECT COUNT(id_resenya) AS total FROM resenya";
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