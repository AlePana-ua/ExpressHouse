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
        <!-- Lista de denuncias extraidas de la base de datos -->
        <div class="row d-flex justify-content-center">
            
            <?php
                if(!$_SESSION['anfitrion']){
                    echo('<h2>Denuncias enviadas</h2>');
                    $query_reservas= "SELECT * FROM Denuncia WHERE id_huesped = '".$idSession."' ORDER BY id_denuncia ASC LIMIT $start_from, $resultados_por_pagina;";
                }else{
                    echo('<h2>Denuncias recibidas</h2>');
                    $query_reservas= "SELECT * FROM Denuncia WHERE id_anfitrion = '".$idSession."' ORDER BY id_denuncia ASC LIMIT $start_from, $resultados_por_pagina;";
                }
                if($query = $link->query($query_reservas)){
            ?>
            <table class="table table-sm table-striped">
                <thead class="table-light">
                    <tr>
                        <th>Usuario</th>
                        <th>Motivo</th>
                        <th>Descripcion</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                        while($row = mysqli_fetch_array($query)) {
                            if(!$_SESSION['anfitrion']){
                                $query_usuName= "SELECT nombre FROM Usuario WHERE id_user = '".$row['id_anfitrion']."';";
                            }else{
                                $query_usuName= "SELECT nombre FROM Usuario WHERE id_user = '".$row['id_huesped']."';";
                            }
                            $queryName = $link->query($query_usuName);
                            $anfitrion = mysqli_fetch_array($queryName)[0];   
                            $motivo = $row['motivo'];
                            $descripcion = $row['descripcion'];
                ?>
                    <tr>
                        <td><?php echo utf8_encode($anfitrion);?></td>
                        <td><?php echo utf8_encode($motivo);?></td>
                        <td><?php echo utf8_encode($descripcion);?></td>
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