<?php include 'header.php';
  /*include_once "conexionBD.inc";*/ 
?>

<!-- Inicio Buscador -->
<div class="h-75 d-inline-block search-div">
  <div class="container-fluid">
    <form action="listaViviendas.php" method="POST">
      <div class="row align-items-center search-box">
        <div class="col">
          <label id="lista-ciudades" for="Name">Ciudad</label>
          <select class="custom-select" id="city" name="destino">
            <option value="">Buscar ciudad ...</option>
            <?php require_once 'utils.php';
              echo get_list_of_cities();
            ?> 
          </select>
        </div>
        <div id="verticle-line"></div>
        <div class="col">
          <label id="llegada" for="Name">Llegada</label>
          <input id="datepicker" placeholder="¿Cuándo?" name="fecha-llegada"/>
        </div>
        <div id="verticle-line"></div>
        <div class="col">
          <label id="salida" for="Name">Salida</label>
          <input id="datepicker1"  placeholder="¿Cuándo?" name="fecha-salida"/>
        </div>
        <div class="col">
          <button type="submit" class="btn btn_custom">Buscar</button>
        </div>
      </div>
    </form>
  </div>
  <script>      
    $('#datepicker').datepicker({
        uiLibrary: 'bootstrap'
    });
    $('#datepicker1').datepicker({
        uiLibrary: 'bootstrap'
    });
  </script>
</div>
<!-- Fin Buscador -->

<!-- Inicio lista de ciudades -->
<div class="container-fluid">
  <br>
  <h1 id="cities-title" class="card-title">¿Tú próximo destino?</h2>
  <br>
  <div class="row">
    <div class="card-deck">
      <?php require_once 'utils.php';
        // Seleccionamos las cinco primeras ciudades con mas viviendas
        $query = $link->query("SELECT nombre, COUNT(nombre) AS repeticiones FROM ciudad GROUP BY nombre ORDER BY repeticiones DESC LIMIT 5;");
        if ($query->num_rows == 0) {
					echo "<h2>No se encontro ninguna ciudad</h2>";
        } else {
            if($row = mysqli_fetch_array($query)) {
              $cities_array = array("Alicante", "Valencia", "Madrid", "1", "2");
              $num_city = 0;
              foreach ($cities_array as $city) {
                echo get_cities_cards($city, $num_city);
                $num_city += 1;
              }
            }else {
                echo "<h3> Error al mostrar las ciudades, intente de nuevo mas tarde</h3>";
            }
        }
      ?>
    </div>
  </div>
  <br>
</div>
<!-- Fin lista de ciudades -->

<!-- Inicio lista de zonas -->
<div id="zone-type-list" class="container-fluid">
  <br>
  <h2 id="zone-type" class="zone-type">Eres más de ...</h2>
  <br>
  <div class="row">
    <div class="card-deck">
      <?php require_once 'utils.php';
        // Esto podría ser una llamada que obtenga las ciudades
        $house_type_array = array("playa", "montana", "ciudad");
        
        $query = $link->query("SELECT idVivienda, foto, descripcion from Anuncio");
        if ($query->num_rows == 0) {
					echo "<h2>No se encontro ninguna zona</h2>";
        } else {
            if($row = mysqli_fetch_array($query)) {
              foreach ($house_type_array as $house_type) {
                echo get_house_type_cards($house_type);
              }
            }else {
                echo "<h3> Error al mostrar las zonas, intente de nuevo mas tarde</h3>";
            }
        }
      ?>
    </div>
  </div>
  <br>
</div>
<!-- Fin lista de zonas -->

<?php //include_once "desconexionBD.inc"; ?>
<?php include 'footer.php'; ?>
