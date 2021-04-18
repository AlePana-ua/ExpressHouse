<?php include 'header.php'; ?>
 <!-- Masthead -->
<div class="row h-100">
  <div class="col-sm-12 my-auto">
    <div class="card card-block w-25 mx-auto" >
      <div class="card-body" >
          <h2 class="title" style="text-align: center;">Crear Reseña</h2>
          <hr>
          <form method="POST">
              <div class="form-row">
                  <div class="form-group col-md-6">
                      <label class="label">Nombre</label>
                      <input class="form-control" type="text" name="first_name">
                  </div>
              </div>
              <div class="form-row">
                  <div class="form-group col-md-12">
                      <label class="label">Mensaje</label>
                      <!--<textarea name="mensaje" rows="10" cols="40">Escribe aquí tus comentarios</textarea> -->

                       <input class="form-control" type="text" name="first_name" size=800> 
                  </div>
              </div>
              <hr>
                   
            <table class="table table-borderless">
                <tbody>
                    <tr>
                        
                        <td>Limpieza</td>
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
                        
                        <td>Fiabilidad </td>
                        <td>
                            <form>
                                <p class="clasificacion">
                                    <input id="1radio1" type="radio" name="estrellas" value="5"><!--
                                    --><label for="1radio1">★</label><!--
                                    --><input id="1radio2" type="radio" name="estrellas" value="4"><!--
                                    --><label for="1radio2">★</label><!--
                                    --><input id="1radio3" type="radio" name="estrellas" value="3"><!--
                                    --><label for="1radio3">★</label><!--
                                    --><input id="1radio4" type="radio" name="estrellas" value="2"><!--
                                    --><label for="1radio4">★</label><!--
                                    --><input id="1radio5" type="radio" name="estrellas" value="1"><!--
                                    --><label for="1radio5">★</label>
                                </p>
                            </form>
                        </td>
                     
                    </tr>
                    <tr>
                        
                        <td>Comunicacion</td>
                        <td>
                            <form>
                                <p class="clasificacion">
                                    <input id="2radio1" type="radio" name="estrellas" value="5"><!--
                                    --><label for="2radio1">★</label><!--
                                    --><input id="2radio2" type="radio" name="estrellas" value="4"><!--
                                    --><label for="2radio2">★</label><!--
                                    --><input id="2radio3" type="radio" name="estrellas" value="3"><!--
                                    --><label for="2radio3">★</label><!--
                                    --><input id="2radio4" type="radio" name="estrellas" value="2"><!--
                                    --><label for="2radio4">★</label><!--
                                    --><input id="2radio5" type="radio" name="estrellas" value="1"><!--
                                    --><label for="2radio5">★</label>
                                </p>
                            </form>
                        </td>
                        <td>Ubicacion</td>
                        <td>
                            <form>
                                <p class="clasificacion">
                                    <input id="3radio1" type="radio" name="estrellas" value="5"><!--
                                    --><label for="3radio1">★</label><!--
                                    --><input id="3radio2" type="radio" name="estrellas" value="4"><!--
                                    --><label for="3radio2">★</label><!--
                                    --><input id="3radio3" type="radio" name="estrellas" value="3"><!--
                                    --><label for="3radio3">★</label><!--
                                    --><input id="3radio4" type="radio" name="estrellas" value="2"><!--
                                    --><label for="3radio4">★</label><!--
                                    --><input id="3radio5" type="radio" name="estrellas" value="1"><!--
                                    --><label for="3radio5">★</label>
                                </p>
                            </form>
                        </td>
                        
                    </tr>
                    <tr>
                        
                        <td> Llegada </td>
                        <td>
                            <form>
                                <p class="clasificacion">
                                    <input id="4radio1" type="radio" name="estrellas" value="5"><!--
                                    --><label for="4radio1">★</label><!--
                                    --><input id="4radio2" type="radio" name="estrellas" value="4"><!--
                                    --><label for="4radio2">★</label><!--
                                    --><input id="4radio3" type="radio" name="estrellas" value="3"><!--
                                    --><label for="4radio3">★</label><!--
                                    --><input id="4radio4" type="radio" name="estrellas" value="2"><!--
                                    --><label for="4radio4">★</label><!--
                                    --><input id="4radio5" type="radio" name="estrellas" value="1"><!--
                                    --><label for="4radio5">★</label>
                                </p>
                            </form>
                        </td>
                        <td >Precio</td>
                        <td>
                            <form>
                                <p class="clasificacion">
                                    <input id="5radio1" type="radio" name="estrellas" value="5"><!--
                                    --><label for="5radio1">★</label><!--
                                    --><input id="5radio2" type="radio" name="estrellas" value="4"><!--
                                    --><label for="5radio2">★</label><!--
                                    --><input id="5radio3" type="radio" name="estrellas" value="3"><!--
                                    --><label for="5radio3">★</label><!--
                                    --><input id="5radio4" type="radio" name="estrellas" value="2"><!--
                                    --><label for="5radio4">★</label><!--
                                    --><input id="5radio5" type="radio" name="estrellas" value="1"><!--
                                    --><label for="5radio5">★</label>
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
http://w3.unpocodetodo.info/css3/estrellas.php -->