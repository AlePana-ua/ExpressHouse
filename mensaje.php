<?php include 'header.php'; ?>
<div class="row h-100">
  <div class="col-sm-12 my-auto">
    <div class="card card-block w-25 mx-auto" style="border-radius: 20px 20px 20px 20px;">
      <div class="card-body" >
          <h2 class="title">Enviar mensaje</h2>
          <hr>
          <form method="POST">
              <div class="form-row">
                  <div class="form-group col-md-6">
                      <label class="label">Asunto</label>
                      <input class="form-control" type="text" name="first_name">
                  </div>
              </div>
              <div class="form-row">
                  <div class="form-group col-md-12">
                      <label class="label">Contenido</label>
                      <input class="form-control" type="text" name="first_name">
                  </div>
              </div>
              <hr>
              <div class="form-row">
                  <div class="form-group col-md-6">
                      <button class="btn btn-primary" type="submit">Enviar</button>
                  </div>
              </div>
          </form>
      </div>
    </div>
  </div>
</div>

<?php include 'footer.php'; ?>