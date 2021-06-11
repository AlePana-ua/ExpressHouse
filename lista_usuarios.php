<?php 
    session_start();

    // Titulo que se muestra en la pestaña del navegador.
    $pageTitle = 'Lista Usuarios';
    
    include "seguridadAdmin.php";
    include "conexionBD.inc";
    include 'header.php'; 

    // Comprobamos en que página de la lista estamos. 
    if(isset($_GET['page'])) {
        $page = $_GET['page'];
    }else {
        $page = 1;
    }
    // Cantidad de usuarios por página.
    $resultados_por_pagina = 250;
    // Número de página donde comenzar la nueva query 
    $start_from = ($page-1) * $resultados_por_pagina;
?>
<br>

<div class="h-auto container-fluid">
    <div class="container">
        <!-- Boton para volver al panel de Admin -->
        <div class="row d-flex justify-content-left"> 
            <form method="POST" action="paneladmin.php">
                <button class="btn btn-volver" type="submit">Volver panel Admin</button>
            </form>
        </div>
        <!-- Lista de usuarios extraidos de la base de datos -->
        <div class="row d-flex justify-content-center">
            <h2>Lista de usuarios</h2>
            <?php
                $query_usuarios = "SELECT * FROM Usuario ORDER BY id_user ASC LIMIT $start_from, $resultados_por_pagina;";
                if($query = $link->query($query_usuarios)){
            ?>
            <table class="table table-sm table-striped">
                <thead class="table-light">
                    <tr>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Correo</th>
                        <th>Teléfono</th>
                        <th>Borrar</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    while($row = mysqli_fetch_array($query)) {
                        $nombre = $row['nombre'];
                        $apellidos = $row['apellido'];
                        $correo = $row['correo'];
                        $telefono = $row['telefono'];
                ?>
                    <tr>
                        <td><?php echo $nombre;?></td>
                        <td><?php echo $apellidos;?></td>
                        <td><?php echo $correo;?></td>
                        <td><?php echo $telefono;?></td>
                        <td>
                            <a href='confirmarBorradoUsuario.php?correo=<?=$correo?>' target="popup" onClick="window.open(this.href, this.target, 'width=350,height=320'); return false;">
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
        <!-- Lista de páginas con usuarios -->
        <div class="row d-flex justify-content-center">
            <?php
                $query_paginas = "SELECT COUNT(id_user) AS total FROM Usuario";
                if($query2 = $link->query($query_paginas)){
                    while($row = mysqli_fetch_array($query2)) {
                        $total_pages = ceil( $row['total']/ $resultados_por_pagina);
                    }
                    for($i=1; $i<=$total_pages ;$i++) {
                        echo "<a href=\"lista_usuarios.php?page=$i\">$i&nbsp</a>&#183";
                    }
                }
            ?>
        </div>
    </div>
</div>


<?php 
    include "desconexionBD.inc";
    include 'footer.php'; 
?>