<?php include 'header.php'; ?>
<!-- Inicio Buscador -->
<div class="h-75 d-inline-block search-div">
  <div class="row align-items-center justify-content-around search-box">
    <form action="listaViviendas.php" method="POST">
      <div class="form-row align-items-center">
        <div class="col">
          <label for="Name">Ciudad</label>
            <select class="custom-select" name="destino">
              <option value="">Buscar ciudad ...</option>
              <?php require_once 'utils.php';
                echo get_list_of_cities();
              ?> 
            </select>
        </div>
        <div class="col">
          <label for="Name">Llegada</label>
          <input id="datepicker" width="200" placeholder="¿Cuándo?" name="fecha-llegada"/>
        </div>
        <div class="col">
          <label for="Name">Salida</label>
          <input id="datepicker1" width="200" placeholder="¿Cuándo?" name="fecha-salida"/>
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
  <h1 class="card-title">¿Tú próximo destino?</h2>
  <div class="row">
    <?php require_once 'utils.php';
      // Esto podría ser una llamada que obtenga las ciudades
      $cities_array = array("Alicante", "Valencia", "Madrid");
      foreach ($cities_array as $city) {
        echo get_cities_cards($city);
      }
    ?>
  </div>
</div>
<!-- Fin lista de ciudades -->


<?php include 'footer.php'; ?>
