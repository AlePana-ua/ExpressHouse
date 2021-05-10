<?php 
    session_start();
    include "conexionBD.inc";
    include "seguridadAdmin.php";
    include 'header.php'; 
    
    // Titulo que se muestra en la pestaña del navegador.
    $pageTitle = 'Lista Reseñas';

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
?>
<br>

<div class="h-auto container-fluid">
    <div class="container">
        <!-- Boton para volver al panel de Admin-->
        <div class="row d-flex justify-content-left"> 
            <form method="POST" action="paneladmin.php">
                <button class="btn btn-volver" type="submit">Volver panel Admin</button>
            </form>
        </div>
        <!-- Lista de reseñas extraidas de la base de datos -->
        <div class="row d-flex justify-content-center">
            <h2>Lista de Reseñas</h2>
            <?php
                $query_resenyas= "SELECT * FROM resenya ORDER BY id_resenya ASC LIMIT $start_from, $resultados_por_pagina;";
                if($query = $link->query($query_resenyas)){
            ?>
            <table class="table table-sm table-striped">
                <thead class="table-light">
                    <tr>
                        <th>Usuario</th>
                        <th>Vivienda</th>
                        <th>Fecha</th>
                        <th>Putuación</th>
                        <th>Descripción</th>
                        <th>Borrar</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    while($row = mysqli_fetch_array($query)) {
                        $id_resenya = $row['id_reseña'];
                        $id_usuario = $row['id_usuario'];
                        $id_vivienda = $row['id_vivienda'];
                        $fecha = $row['fecha'];
                        $puntuacion = $row['puntuacion'];
                        $descripcion = $row['descripcion'];
                ?>
                    <tr>
                        <td><?php echo utf8_encode($id_usuario);?></td>
                        <td><?php echo utf8_encode($id_vivienda);?></td>
                        <td><?php echo utf8_encode($fecha);?></td>
                        <td><?php echo utf8_encode($puntuacion);?></td>
                        <td><?php echo utf8_encode($descripcion);?></td>
                        <td>
                            <a href='confirmarBorrarResenya.php?id=<?=$id_resenya?>' target="popup" onClick="window.open(this.href, this.target, 'width=350,height=620'); return false;">
                                <img class="" src="img/delete_icon.png" width="40" height="40">
                            </a>
                        </td>
                    </tr>
                <?php           
                    }
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