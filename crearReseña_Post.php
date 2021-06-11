<?php include 'header.php';
include "conexionBD.inc"; ?>
 <!-- Masthead -->
<div class="row h-100">
  <div class="col-sm-12 my-auto">
    <div class="card card-block w-50 mx-auto" >
      <div class="card-body" >
          <h2 class="title" style="text-align: center;">Reseña Realizada</h2>
          <hr>
          <form method="POST" name="" action="index.php">
              
            <?php
                if (isset($_POST['estrellas']) && isset($_POST['descripcion']) ){
                  $puntuacion=$_POST['estrellas'];
                  echo " Puntuacion: " .$puntuacion. "<br>";
                  $descripcion=$_POST['descripcion'];
                  echo "Descripcion: " .$descripcion. "<br>";
                 
                  //$id_vivienda=$_POST['id_vivienda'];
                  $id_vivienda=1;
                  //$fecha=$_POST['fecha'];
                  $fecha=1/1/2001;
                  //$id_usuario=$_POST['id_usuario'];
                  $id_usuario=1;
              }else { echo "Error , volver a crear Reseña" ;}
            ?>

            <?php
              // duda si id_resenya hay que insertarlo o es autoincremental al ser PK
              $query_resenyas = "INSERT INTO resenya ( puntuacion, descripcion, fecha,id_vivienda, id_usuario) VALUES ( '".$puntuacion."', '".$descripcion."', '".$fecha."', '".$id_vivienda."', '".$id_usuario."' )";


                  if($query= $link ->query($query_resenyas)){
              ?>
                      <div class="alert alert-success alert-dismissable">
                          <h2><strong>Felicidades!</strong> Reseña publicada</h2>
                      </div>
                      <?php
                  }else {
              ?>
                      <div class="alert alert-warning alert-dismissable"> 
                          <?php echo $link->error; ?>
                          <h2><strong>Error!</strong> al insertar reseña</h2>
                      </div>
            <?php
                }
            ?>


            <div class="form-row" style="text-align: center;" >
                <div class="col text-center" >
                    <button type="submit" class="btn btn-primary" style="text-align: center;">Enviar</button>
                </div>
            </div>
            

          </form>
      </div>
    </div>
    </div>
</div>

<?php 
    include 'footer.php'; 
    include "desconexionBD.inc";
?>


<!--
$query_resenyas = "INSERT INTO resenya (id_resenya, puntuacion, descripcion, fecha,id_vivienda, id_usuario) VALUES ('".$id_resenya."', '".$puntuacion."', '".$descripcion."', '".$fecha."', '".$id_vivienda."', '".$id_usuario."' )"
-->