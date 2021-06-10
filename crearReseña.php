<?php 
    session_start();
    
    $pageTitle = 'Reseña';
    include 'header.php';
    include "conexionBD.inc";
    include 'seguridad.php';
?>
 <!-- Masthead -->
<div class="row h-100">
  <div class="col-sm-12 my-auto">
    <div class="card card-block w-50 mx-auto" >
      <div class="card-body" >
          <h2 class="title" style="text-align: center;">Crear Reseña</h2>
          <hr>
          <form method="POST" name="formularioCrearReseña" action="crearReseña_Post.php">
              <div class="form-row">
                  <div class="form-group col-md-6">

                    <!-- enviar id_vivienda al pulsar boton crearReseña -->

                      <label class="label">ID</label>
                      <?php  
                        if(isset($_POST['id_vivienda'])){
                            $id_vivienda=$_POST['id_vivienda'];
                            $fecha=$_POST['fecha'];
                            $id_usuario=$_POST['id_usuario'];
                            echo " casa nº " .$id_vivienda. "<br>";       
                        }
                        else 
                            echo "NO ID, acceder desde vivienda"
                       ?> 
                     <!-- <input class="form-control" type="text" name="nombre" vale="ejemplo"> -->
                    
                    <input type="hidden" name="id_vivienda" value=<?php $id_vivienda ?> > 
                    <input type="hidden" name="fecha" value=<?php $fecha ?> >
                    <input type="hidden" name="id_usuario" value=<?php $id_usuario ?> >
                  </div>
              </div>
              <div class="form-row">
                  <div class="form-group col-md-12">
                      <label class="label">Descripcion</label>
                      <!--<textarea name="mensaje" rows="10" cols="40">Escribe aquí tus comentarios</textarea> -->

                       <input class="form-control" type="text" name="descripcion" size=800> 
                  </div>
              </div>
              <hr>
                   
            <table class="table table-borderless">
                <tbody>
                    <tr>
                        
                        <td>Puntuacion</td>
                        <td>
                            <form>
                                <p class="clasificacion">
                                    <input id="radio1" type="radio" name="estrellas" value="5"><!--
                                    --><label for="radio1">★</label><!--
                                    --><input id="radio2" type="radio" name="estrellas" value="4"><!--
                                    --><label for="radio2">★</label><!--
                                    --><input id="radio3" type="radio" name="estrellas" value="3"><!--
                                    --><label for="radio3">★</label><!--
                                    --><input id="radio4" type="radio" name="estrellas" value="2"><!--
                                    --><label for="radio4">★</label><!--
                                    --><input id="radio5" type="radio" name="estrellas" value="1"><!--
                                    --><label for="radio5">★</label>
                                </p>
                            </form>
                        </td>
                        
                        
                         
                    </tr>
                  
                    
                </tbody>
               
            </table>

            


            <div class="form-row" style="text-align: center;">
                <div class="col text-center" >
                    <button class="btn btn-primary" type="submit" style="text-align: center;">Enviar</button>
                </div>
            </div>
          </form>
      </div>
    </div>
   
  </div>
 
</div>

<?php include 'footer.php'; ?>



<!-- https://es.stackoverflow.com/questions/126046/valoracion-estrellas-1-5-dise%C3%B1o-estrellas-php-html 
http://w3.unpocodetodo.info/css3/estrellas.php 
-->