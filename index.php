<?php 
    session_start();

    // Título de la página 
    $pageTitle = 'Inicio';
    
    include 'header.php';
    include "conexionBD.inc"; 
    include 'utils.php';  
?>

<!-- Inicio Buscador -->
<div class="h-75 d-inline-block search-div">
  <div class="container-fluid">
    <form action="listaViviendas.php" method="POST">
      <div class="row align-items-center search-box">
        <div class="col">
          <label id="lista-ciudades" for="Name">Ciudad</label>
          <select class="custom-select" id="city" name="destino">
            <option selected="selected" disabled="disabled">Buscar ciudad ...</option>
            <?php 
              // Seleccionamos el nombre de todas las ciudades con viviendas.
              $query_cities = "SELECT nombre FROM ciudad  ORDER BY nombre ASC;";
              if ($query = $link->query($query_cities)) {
                if ($query->num_rows == 0) {
                  echo "<option disabled=\"disabled\">No hay ciudades</option>";
                } else {
                  while($row = mysqli_fetch_array($query)) {  
                    echo get_list_of_cities($row[0]);
                  }
                }
                $query->close();
              }
            ?> 
          </select>
        </div>
        <div id="verticle-line"></div>
        <div class="col">
          <label id="llegada" for="Name">Llegada</label>
          <input required id="datepicker" placeholder="¿Cuándo?" name="fecha-llegada"/>
        </div>
        <div id="verticle-line"></div>
        <div class="col">
          <label id="salida" for="Name">Salida</label>
          <input required id="datepicker1"  placeholder="¿Cuándo?" name="fecha-salida"/>
        </div>
        <div >
          <button type="submit" class="btn btn-buscador">&#8981</button>
        </div>
      </div>
    </form>
  </div>
  <script>      
    $('#datepicker').datepicker();
    $('#datepicker1').datepicker({
      useCurrent: false
    });
    $("#datepicker").on("dp.change", function (e) {
           $('#datepicker1').data("DatePicker").minDate(e.date);
       });
    $("#datepicker1").on("dp.change", function (e) {
        $('#datepicker').data("DatePicker").maxDate(e.date);
    });
  </script>
</div>
<!-- Fin Buscador -->

<div class="container-fluid align-items-center">
  <!-- Inicio lista de ciudades -->
  <div class="container-fluid">
    <br>
    <h2 id="cities-title">¿Tú próximo destino?</h2>
    <br>
    <div class="row">
      <div class="card-deck">
        <?php
          $query_ciudades = "SELECT nombre, COUNT(nombre) AS repeticiones FROM ciudad GROUP BY nombre ORDER BY repeticiones DESC LIMIT 5;";
          // Seleccionamos las cinco primeras ciudades con mas viviendas registradas.
          if ($query = $link->query($query_ciudades)) {
            if ($query->num_rows == 0) {
              echo "<h2>No se encontro ninguna ciudad</h2>";
            } else {
                $num_city = 0;
                while($row = mysqli_fetch_array($query)) {  
                    echo get_cities_cards(utf8_encode($row[0]), $num_city);
                    $num_city += 1;
                
                }
            }
            $query->close();
          }
          
          /* En caso que la conexión falle, comentar el código anterior
          * y utilizar el siguiente.
          */
          /*
          $cities_array = array("Alicante", "Valencia", "Madrid", "Barcelona", "San Sebastián");
          $num_city = 0;
          foreach ($cities_array as $city) {
              echo get_cities_cards($city, $num_city);
              $num_city += 1;
          }
          */
        ?>
      </div>
    </div>
    <br>
  </div>
  <!-- Fin lista de ciudades -->

  <!-- Inicio lista de zonas -->
  <div  class="container-fluid">
    <br>
    <h2 id="zone-type-title" class="zone-type">Eres más de ...</h2>
    <br>
    <div class="row">
      <div class="card-deck">
        <?php
          // Seleccionamos una lista de tipos de vivienda
          if ($query = $link->query("SELECT DISTINCT zona FROM Vivienda;")) {
            if ($query->num_rows == 0) {
              echo "<h2>No se encontro ninguna zona</h2>";
            } else {
              while($row = mysqli_fetch_array($query)) {
                $house_type = $row['zona'];
                echo get_house_type_cards($house_type);
              }
            }
            
            /* En caso que la conexión falle, comentar el código anterior
            * y utilizar el siguiente.
            */
            /* $house_type_array = array("Playa", "Montana", "Ciudad", "Pueblo", "Camping");
            foreach ($house_type_array as $house_type) {
              echo get_house_type_cards($house_type);
            
            }*/
            $query->close();
          }
        ?>
      </div>
    </div>
    <br>
  </div>
  <!-- Fin lista de zonas -->

  <!-- Inicio hazte afitrión -->
  <div class="h-50 container-fluid">
    <div class="row align-items-center">
      <div class="col-10">
        <div id="hazte-anfitrion-container" class="card">
          <img id="hazte-anfitrion-img" class="card-img" src="img/tipo_Montaña.jpg">
          <div class="card-img-overlay text-white d-flex flex-column justify-content-center">
            <h1>Hazte anfitrión</h1>
            <p>Sácate un extra y abre la puerta a todo un mundo de oportunidades compartiendo tu alojamiento.</p>
            <button type="submit" class="btn btn_anfitrion">Más información</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Fin hazte afitrión -->

</div>

<?php 
  include "desconexionBD.inc";
  include "footer.php"; 
?>