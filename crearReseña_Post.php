<?php include 'header.php'; ?>
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
              }else { echo "Error , volver a crear Reseña" ;}
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

<?php include 'footer.php'; ?>


<!--
$query_resenyas = "INSERT INTO resenya (id_resenya, puntuacion, descripcion, fecha,id_vivienda, id_usuario) VALUES ('".$id_resenya."', '".$puntuacion."', '".$descripcion."', '".$fecha."', '".$id_vivienda."', '".$id_usuario."' )"



-->