<?php 
    session_start();
    // Titulo que se muestra en la pestaña del navegador.
    $pageTitle = 'Lista Anuncios';
    
    include "conexionBD.inc";
    include "seguridadAdmin.php";
    include 'header.php'; 

    // Comprobamos en que página de la lista estamos. 
    if(isset($_GET['page'])) {
        $page = $_GET['page'];
    }else {
        $page = 1;
    }
    // Cantidad de anuncios por página.
    $resultados_por_pagina = 250;
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
        <!-- Lista de Anuncios extraidos de la base de datos -->
        <div class="row d-flex justify-content-center">
            <h2>Lista de Anuncios</h2>
            <?php
                $query_anuncios= "SELECT Anuncio.id_anuncio as id_anuncio
                                        ,Vivienda.nombre as vivienda
                                        ,Vivienda.direccion as direccion
                                        ,Usuario.correo as anfitrion
                                        ,ciudad.nombre as ciudad
                                  FROM Anuncio 
                                  INNER JOIN Vivienda ON Anuncio.id_vivienda = Vivienda.id_viv
                                  INNER JOIN ciudad ON ciudad.id_ciudad = Vivienda.id_ciudad 
                                  INNER JOIN Usuario ON Usuario.id_user = Vivienda.id_anfitrion
                                  ORDER BY id_anuncio ASC LIMIT $start_from, $resultados_por_pagina;";
                if($query = $link->query($query_anuncios)){
            ?>
            <table class="table table-sm table-striped">
                <thead class="table-light">
                    <tr>
                        <th>Anfitrión</th>
                        <th>Vivienda</th>
                        <th>Dirección</th>
                        <th>Ciudad</th>
                        <th>Borrar</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    while($row = mysqli_fetch_array($query)) {
                        $id_anuncio = $row['id_anuncio'];
                        $id_anfitrion = $row['anfitrion'];
                        $viviendaNombre = $row['vivienda'];
                        $viviendaDir = $row['direccion'];
                        $ciudad = $row['ciudad'];
                    
                ?>
                    <tr>
                        <td><?php echo $id_anfitrion;?></td>
                        <td><?php echo $viviendaNombre;?></td>
                        <td><?php echo $viviendaDir;?></td>
                        <td><?php echo $ciudad;?></td>
                        <td>
                            <a href='confirmarBorradoAnuncio.php?id=<?=$id_anuncio?>' target="popup" onClick="window.open(this.href, this.target, 'width=350,height=620'); return false;">
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
        <!-- Lista de páginas con anuncios -->
        <div class="row d-flex justify-content-center">
            <?php
                $query_paginas = "SELECT COUNT(id_anuncio) AS total FROM Anuncio";
                if($query2 = $link->query($query_paginas)){
                    while($row = mysqli_fetch_array($query2)) {
                        // Calculamos el número de páginas para mostrar la información
                        $total_pages = ceil( $row['total']/ $resultados_por_pagina);
                    }
                    for($i=1; $i<=$total_pages ;$i++) {
                        echo "<a href=\"lista_anuncios.php?page=$i\">$i&nbsp</a>";
                        
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