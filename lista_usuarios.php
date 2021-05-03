<?php 
    $pageTitle = 'Lista Usuarios';
    include 'header.php'; 
    include "conexionBD.inc";
    include "seguridadAdmin.php";
?>
<?php 
    // Comprobamos en que pagina de la lista estamos 
    if(isset($_GET['page'])) {
        $page = $_GET['page'];
    }else {
        $page = 1;
    }
    $resultados_por_pagina = 20;
    $start_from = ($page-1) * $resultados_por_pagina;
?>
<div class="h-100 container-fluid">
    <div class="row d-flex justify-content-left"> 
        <form method="POST" action="paneladmin.php">
            <button type="submit">Volver panel Admin</button>
        </form>
    </div>
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
                    <th>Editar</th>
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
                    <td><?php echo utf8_encode($nombre);?></td>
                    <td><?php echo utf8_encode($apellidos);?></td>
                    <td><?php echo utf8_encode($correo);?></td>
                    <td><?php echo utf8_encode($telefono);?></td>
                    <td><a href='editarUser.php?user=<?=$correo?>' target="popup" onClick="window.open(this.href, this.target, 'width=350,height=620'); return false;"><img src="img/iconoBorrar.jpg"></a></td>
                    <td><a href='borrarUser.php?user=<?=$correo?>' target="popup" onClick="window.open(this.href, this.target, 'width=350,height=620'); return false;"><img src="img/iconoBorrar.jpg"></a></td>
                </tr>
        <?php           
                }
            }else {
                echo $link->error;
            }
        ?>
            </tbody>
        </table>

        <?php
            $query_paginas = "SELECT COUNT(id_user) AS total FROM Usuario";
            if($query2 = $link->query($query_paginas)){
                while($row = mysqli_fetch_array($query2)) {
                    $total_pages = ceil( $row['total']/ $resultados_por_pagina);
                }
                for($i=1; $i<=$total_pages ;$i++) {
                    echo "<a href=\"lista_usuarios.php?page=$i\">$i&nbsp</a>";
                    
                }
            }
        ?>
    </div>
</div>


<?php 
    include "desconexionBD.inc";
    include 'footer.php'; 
?>