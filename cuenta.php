<?php include 'header.php'; ?>
<div class="container-fluid">
  <div class="row">
    <div class="card" style="margin-left: 5%; margin-top: 1%;">
      <img src="./img/avatar.png" style="width: 250px; height:250px; padding:1%;" alt="...">
      <div>
        <a class="card-text" style="text-decoration:underline;"><img src="./img/star.png" style="width:4%; padding:0.5%;">3 reseñas</a> <!-- EL NÚMERO LO SACAMOS DE LA BBDD-->
        <p></p>
        <a href="./modificarCuenta.php" class="btn btn-primary">Modificar perfil</a>
      </div>
    </div>
    <div class="card" style="margin-left: 5%; margin-top: 1%;">
      <div class="card-body">
        <h5 class="card-text" >Hola, soy Lorem</p> <!-- EL Nombre/datos LO SACAMOS DE LA BBDD-->
        <p style="font-size: 12px; padding: 15px;">se registró en 2017</p>
        <a style="font-size: 12px; padding: 15px;"><img src="./img/home.png" style="width:2.5%; padding:0.5%;">vive en Alicante</a>
          <pre style="font-size: 15px; padding: 15px; ">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed consequat tortor eget felis dignissim molestie. 
            Phasellus ac lorem lacus. Duis mi eros, cursus non interdum id, venenatis ac massa. Ut laoreet, felis sit 
            amet condimentum rhoncus, augue nunc viverra enim, mattis porta lacus ipsum non mauris. Donec sed pellentesque mi. 
          </pre> 

    <div class="card" style="margin-left: 5%; margin-top: 1%;">
        <h5>Reseñas recientes</h5>
          <pre style="font-size: 15px;">
            noviembre 2019
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed consequat tortor eget felis dignissim molestie. 
          Phasellus ac lorem lacus. Duis mi eros, cursus non interdum id, venenatis ac massa. Ut laoreet, felis sit 
          amet condimentum rhoncus, augue nunc viverra enim, mattis porta lacus ipsum non mauris. Donec sed pellentesque mi. 
          </pre>
          <pre style="font-size: 15px;">
            noviembre 2019
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed consequat tortor eget felis dignissim molestie. 
          Phasellus ac lorem lacus. Duis mi eros, cursus non interdum id, venenatis ac massa. Ut laoreet, felis sit 
          amet condimentum rhoncus, augue nunc viverra enim, mattis porta lacus ipsum non mauris. Donec sed pellentesque mi. 
          </pre>
          <pre style="font-size: 15px;">
            octubre 2019
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed consequat tortor eget felis dignissim molestie. 
          Phasellus ac lorem lacus. Duis mi eros, cursus non interdum id, venenatis ac massa. Ut laoreet, felis sit 
          amet condimentum rhoncus, augue nunc viverra enim, mattis porta lacus ipsum non mauris. Donec sed pellentesque mi. 
          </pre>
      </div>
    </div>
  </div>
</div>
<?php include 'footer.php'; ?>
