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
<br>
<div class="h-auto container-fluid">
    <div class="row d-flex justify-content-left"> 
        <form method="POST" action="paneladmin.php">
            <button class="btn btn-volver" type="submit">< Volver panel Admin</button>
        </form>
    </div>
    <div class="row d-flex justify-content-center">
        <h2>Lista de usuarios</h2>
        <?php
            $query_usuarios = "SELECT * FROM Denuncia ORDER BY id_denuncia ASC LIMIT $start_from, $resultados_por_pagina;";
            if($query = $link->query($query_usuarios)){
        ?>
        <table class="table table-sm table-striped">
            <thead class="table-light">
                <tr>
                    <th>Usuario 1</th>
                    <th>Usuario 2</th>
                    <th>Motivo</th>
                    <th>Descripción</th>
                </tr>
            </thead>
            <tbody>
        <?php
                while($row = mysqli_fetch_array($query)) {
                    $idDenun = $row['id_denuncia'];
                    $huesped = $row['id_huesped'];
                    $anfitrion = $row['id_anfitrion'];
                    $motivo = $row['motivo'];
                    $descripcion = $row['descripcion'];
        ?>
                <tr>
                    <td><?php echo utf8_encode($huesped);?></td>
                    <td><?php echo utf8_encode($anfitrion);?></td>
                    <td><?php echo utf8_encode($motivo);?></td>
                    <td><?php echo utf8_encode($descripcion);?></td>
                    <td>
                        <a href='.php?identificador=<?=$idDenun?>' target="popup" onClick="window.open(this.href, this.target, 'width=350,height=620'); return false;">
                            <img class="" src="img/delete_icon.png" width="40" height="40">
                        </a>
                    </td>
                </tr>
        <?php           
                }
            }else {
                echo $link->error;
            }
        ?>
            </tbody>
        </table>
    </div>
    <br>
    <div class="row d-flex justify-content-center">
        <?php
            $query_paginas = "SELECT COUNT(id_denuncia) AS total FROM Denuncia";
            if($query2 = $link->query($query_paginas)){
                while($row = mysqli_fetch_array($query2)) {
                    $total_pages = ceil( $row['total']/ $resultados_por_pagina);
                }
                for($i=1; $i<=$total_pages ;$i++) {
                    echo "<a href=\"lista_denuncuas.php?page=$i\">$i&nbsp</a>";
                    
                }
            }
        ?>
    </div>
</div>


<?php 
    include "desconexionBD.inc";
    include 'footer.php'; 
?>