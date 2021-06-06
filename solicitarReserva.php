<?php
  include 'header.php';
  include "conexionBD.inc";
  $fecha_llegada = isset($_GET["fecha_llegada"]) ? $_GET["fecha_llegada"] : "";
  $fecha_salida = isset($_GET["fecha_salida"]) ? $_GET["fecha_salida"] : "";
  $id_vivienda = isset($_GET["id_vivienda"]) ? $_GET["id_vivienda"] : "";
  $id_anuncio = isset($_GET["id_anuncio"]) ? $_GET["id_anuncio"] : "";
  $num_dias_reserva = (strtotime($fecha_salida) - strtotime($fecha_llegada)) / (60 * 60 * 24) ;


$query = "SELECT Anuncio.id_anuncio as id_anuncio,Vivienda.precioDia as precioDia
                FROM Anuncio
                INNER JOIN Vivienda ON Anuncio.id_vivienda = Vivienda.id_viv 
                WHERE Anuncio.id_anuncio = '".$id_anuncio."'
                LIMIT 1;";

  $queryResult = $link->query($query);

  $row = mysqli_fetch_array($queryResult);
  $precio_final = $row["precioDia"] * $num_dias_reserva;
?>

<div class="row">
    <div class="col-6" style="padding: 20px; margin-left: 30px">
    <h3>Solicitar una reserva</h3>
    </div>
</div>
<form action="pagar.php" method="POST" class="needs-validation" novalidate>
  <input type="hidden" name="fecha_llegada" value="<?php echo $fecha_llegada?>">
  <input type="hidden" name="fecha_salida" value="<?php echo $fecha_salida?>">
  <input type="hidden" name="id_anuncio" value="<?php echo $id_anuncio?>">
  <div class="row">
      <div class="col-5" style="padding: 10px; margin-left: 30px">
          <h4>Tu viaje</h4>
          <h5>Fechas</h5>
          <p>
            <?php echo $fecha_llegada?> hasta <?php echo $fecha_salida?>
            <a class="btn btn-primary" href="casa.php?id-anuncio=<?php echo $id_anuncio?>">Editar</a>
          </p>
          <h5>Huespedes</h5>
          <input type="number" min="0" name="huespedes" value="1">

          <h3>PRECIO NOCHE: <?php echo $row["precioDia"]?>€</h3>
          <h3>PRECIO TOTAL: <?php echo $precio_final?>€</h3>
      </div>
  </div>

  <div class="row">
    <div class="col-12">  
      <div class="col-md-7 col-lg-8">
            <h4 class="mb-3">Datos del pago</h4>
              <div class="row g-3">
                <div class="col-sm-6">
                  <label for="firstName" class="form-label">Nombre</label>
                  <input type="text" class="form-control" id="firstName" placeholder="" value="" required>
                  <div class="invalid-feedback">
                    Introduzca un nombre válido
                  </div>
                </div>

                <div class="col-sm-6">
                  <label for="lastName" class="form-label">Apellido</label>
                  <input type="text" class="form-control" id="lastName" placeholder="" value="" required>
                  <div class="invalid-feedback">
                    Introduzca un apellido válido
                  </div>
                </div>

                <div class="col-12">
                  <label for="email" class="form-label">Tarjeta de crédito</label>
                  <input type="email" class="form-control" id="tarjeta" placeholder="Nº Tarjeta crédito" required>
                  <div class="invalid-feedback">
                    Introduzca tarjeta de crédito válida
                  </div>
                </div>

                <div class="col-6">
                  <label for="address" class="form-label"> Fecha caducidad </label>
                  <input type="text" class="form-control" id="address" placeholder="1234 Main St" required>
                  <div class="invalid-feedback">
                    Selecciona una fecha de caducidad válida.
                  </div>
                </div>

                <div class="col-6">
                  <label for="address2" class="form-label">CVC</label>
                  <input type="text" class="form-control" id="address2" placeholder="Apartment or suite" required>
                </div>

                <div class="col-6">
                  <label for="country" class="form-label">País</label>
                  <br>
                  <select class="form-select" id="country" required>
                    <option value="">Seleccionar</option>
                    <option>España</option>
                  </select>
                  <div class="invalid-feedback">
                    Selecciona un país válido.
                  </div>
                </div>

                <div class="col-6">
                  <label for="zip" class="form-label">Código postal</label>
                  <input type="text" class="form-control" id="zip" placeholder="" required>
                  <div class="invalid-feedback">
                    El código postal es necesario.
                  </div>
                </div>
              </div>

              <hr class="my-4">

              <div class="form-check">
                <input type="checkbox" class="form-check-input" id="same-address">
                <label class="form-check-label" for="same-address">Shipping address is the same as my billing address</label>
              </div>

              <div class="form-check">
                <input type="checkbox" class="form-check-input" id="save-info">
                <label class="form-check-label" for="save-info">Save this information for next time</label>
              </div>
      </div>
    </div>
  </div>

    <div class="row">
        <div class="col-4 offset-6">
            <button type="submit" class="btn btn-detalles">Continuar</button>
        </div>
    </div>
</form>

<?php include 'footer.php'; ?>
