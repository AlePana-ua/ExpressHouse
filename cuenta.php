<?php 
$pageTitle = 'Perfil';
session_start();
include 'header.php'; 
include 'utils.php';
include "conexionBD.inc";



$queryUSER = $link ->query("SELECT id_user  ,foto,nombre FROM Usuario WHERE correo = '".$_SESSION["usuario"]."' ");
if($row = mysqli_fetch_array($queryUSER))
{
       $nombre = $row['nombre'];
       $foto=$row['foto'];
       $id = $row['id_user'];
}


$query_resenyas = "SELECT descripcion, fecha, puntuacion,  FROM resenya WHERE id_usuario = '".$id."';";
$query_cResenyas = $link ->query("SELECT COUNT(descripcion) FROM resenya WHERE id_usuario = '".$id."';");
$nResenyas = mysqli_fetch_array($query_cResenyas)[0];
?>


<div class="container-fluid">
  <div class="row">
    <div class="card" style="margin-left: 5%; margin-top: 1%;">
    <img style="vertical-align: middle; width: 100px; height: 100px; border-radius: 50%;" src="data:image;base64,<?=$foto?>">
      <div>
        <p></p>
        <a href="./modificarCuenta.php" class="btn btn-primary">Modificar perfil</a>
      </div>
    </div>
    <div class="card" style="margin-left: 5%; margin-top: 1%;">
      <div class="card-body">
        <h5 class="card-text" >Hola, soy <?= $nombre?></p>

    <div class="card" style="margin-left: 5%; margin-top: 1%; width: 75%;">
    <?php
     if (!$_SESSION["anfitrion"]) {
            if ($nResenyas == 0) {
              echo "<h5>No se encontro ninguna reseña</h5>";
            } else {
              echo "<h5>Reseñas escritas</h5>";
              while($row = mysqli_fetch_array($query_cResenyas)) {   
                echo '<a style="font-size: 15px;">
                       fecha: '.$row["fecha"].' <br></br> Puntuación: '.$row["puntuacion"].' <br></br>
                        Descripción:  '.$row["descripcion"].'
                      </a>';                
            }
            }
            $query_cResenyas->close();
    }else{
        echo "<h5>Reseñas recibidas</h5>";
        $query_viviendas = "SELECT id_viv  FROM Vivienda WHERE id_anfitrion = '".$id."';";
        $resenyas = array();
        if($query = $link->query($query_viviendas)){
          while($row = mysqli_fetch_array($query)){
            $query_resenya = "SELECT id_resenya FROM resenya WHERE id_vivienda = '".$row['id_viv']."';";
            if($query2 = $link->query($query_resenya)){
              if($query2->num_rows != 0){
                $resenya = mysqli_fetch_array($query2);
                array_push($resenyas,$resenya[0]);
              }
            }
          }
        }
        if(count($resenyas) == 0){
          echo "<h5>nadie ha escrito ninguna reseña sobre este anfitrión</h5>";
        }else{
          for($i=0;$i<count($resenyas);$i++){
            $query_resenya = "SELECT * FROM resenya WHERE id_resenya = '".$resenyas[$i]."';";
            if($query2 = $link->query($query_resenya)){
              while($row = mysqli_fetch_array($query2)) {   
                echo '<a style="font-size: 15px;">
                       fecha: '.$row["fecha"].' <br></br> Puntuación: '.$row["puntuacion"].' <br></br>
                        Descripción:  '.$row["descripcion"].'
                      </a>';                
              }
            }
          }
        }
    }
          ?>
      </div>
    </div>
  </div>
</div>
<?php include 'footer.php'; ?>
