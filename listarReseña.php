<?php include 'header.php'; ?>
 <!-- Masthead -->
<div class="row h-100">
  <div class="col-sm-12 my-auto">
    <div class="card card-block w-50 mx-auto" >
            

      <div class="card-body" >
        <h1 class ="title" style="text-align:center;"> Mis Reseñas </h1>
        <hr>
        <div>
            <h2 class="title" style="text-align: center;">Reseñas pendientes </h2>
            <table>
                <tr>
                <td><img src="img/Alicante.jpg" style="margin: 10px 10px 10px 0px;float: left; "  width="200px"></td>
                <td><a href="crearReseña.php"> Escribir reseña </a></td>

            </table>
            
        </div>
            <hr>
          <h2 class="title" style="text-align: center;">Lista Reseñas Realizadas</h2>
          <hr>
          <form method="POST">
          <table>
            <h3 style="text-align: center;"> Reseña alicante </h1>
            <tr>
                <td> <img src="img/Alicante.jpg" style="margin: 10px 10px 10px 0px;float: left; "  width="200px"> </td>
            
            <td> 
                <p> 
                    Texto tan extenso como queramos que cubrirá la parte derecha de la imagen. Sigo poniendo texto para que se vea el efecto, Bla bla bla bla bla bla bla... 
                </p>
            </td>
            </tr>
            <hr>
            </table>
            <table>
            <h3 style="text-align: center;"> Reseña Playa </h1>
            <tr>
                <td> <img src="img/IMG_0391.jpg" style="margin: 10px 10px 10px 0px;float: left; "  width="200px"> </td>
            
            <td> 
                <p> 
                    Texto tan extenso como queramos que cubrirá la parte derecha de la imagen. Sigo poniendo texto para que se vea el efecto, Bla bla bla bla bla bla bla... 
                </p>
            </td>
            </tr>
            </table>
          </form>
      </div>
    </div>
   
  </div>
 
</div>

<?php include 'footer.php'; ?>

<!-- https://es.stackoverflow.com/questions/126046/valoracion-estrellas-1-5-dise%C3%B1o-estrellas-php-html 
http://w3.unpocodetodo.info/css3/estrellas.php -->

