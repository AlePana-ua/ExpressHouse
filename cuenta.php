<?php 
session_start();
include 'header.php'; 
include 'utils.php';
include "conexionBD.inc";
$pageTitle = 'perfil';


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
        <a class="card-text" style="text-decoration:underline;"><img src="./img/star.png" style="width:4%; padding:0.5%;"><?=$nResenyas?> reseñas</a> <!-- EL NÚMERO LO SACAMOS DE LA BBDD-->
        <p></p>
        <a href="./modificarCuenta.php" class="btn btn-primary">Modificar perfil</a>
      </div>
    </div>
    <div class="card" style="margin-left: 5%; margin-top: 1%;">
      <div class="card-body">
        <h5 class="card-text" >Hola, soy <?php echo utf8_encode($nombre)?></p>

    <div class="card" style="margin-left: 5%; margin-top: 1%;">
    <?php
     if ($query = $link->query($query_resenyas)) {
            if ($query->num_rows == 0) {
              echo "<h2>No se encontro ninguna resenya</h2>";
            } else {
                while($row = mysqli_fetch_array($query)) {
                   
                    echo '<pre style="font-size: 15px;">
                            '.$fecha.'  '.$puntuacion.'
                              '.$descripcion.'
                          </pre>';                
                }
            }
            $query->close();
          }
          ?>
      </div>
    </div>
  </div>
</div>
<?php include 'footer.php'; ?>
