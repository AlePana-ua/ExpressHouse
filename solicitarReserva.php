<?php include 'header.php'; ?>

<div class="row">
    <div class="col-6" style="padding: 20px; margin-left: 30px">
    <h3>Solicitar una reserva</h3>
    </div>
</div>
<div class="row">
    <div class="col-5" style="padding: 10px; margin-left: 30px">
        <h4>Tu viaje</h4>
        <h5>Fechas</h5>
        <p>11-mar-2021 hasta 13-mar-2021  <a class="btn btn-primary" href="#" role="button">Editar</a></p>
        <h5>Huespedes</h5>
        <p>1 huésped <a class="btn btn-primary" href="#" role="button">Editar</a></p>
    </div>

    <div class="col-5" style="padding: 10px; margin-left: 10px">
      <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-primary">Your cart</span>
            <span class="badge bg-primary rounded-pill">3</span>
      </h4>
          <ul class="list-group mb-3">
            <li class="list-group-item d-flex justify-content-between lh-sm">
              <div>
                <h6 class="my-0">Product name</h6>
                <small class="text-muted">Brief description</small>
              </div>
              <span class="text-muted">$12</span>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-sm">
              <div>
                <h6 class="my-0">Second product</h6>
                <small class="text-muted">Brief description</small>
              </div>
              <span class="text-muted">$8</span>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-sm">
              <div>
                <h6 class="my-0">Third item</h6>
                <small class="text-muted">Brief description</small>
              </div>
              <span class="text-muted">$5</span>
            </li>
            <li class="list-group-item d-flex justify-content-between bg-light">
              <div class="text-success">
                <h6 class="my-0">Promo code</h6>
                <small>EXAMPLECODE</small>
              </div>
              <span class="text-success">−$5</span>
            </li>
            <li class="list-group-item d-flex justify-content-between">
              <span>Total (USD)</span>
              <strong>$20</strong>
            </li>
          </ul>
          <form class="card p-2">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Promo code">
              <button type="submit" class="btn btn-secondary">Redeem</button>
            </div>
          </form>
    </div>
</div>

<div class="row">
  <div class="col-12">  
    <div class="col-md-7 col-lg-8">
          <h4 class="mb-3">Datos del pago</h4>
          <form class="needs-validation" novalidate>
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

<?php include 'footer.php'; ?>
