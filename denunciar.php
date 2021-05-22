<?php include 'header.php'; 
    $idUsuario = $_SESSION['usuario'];
    $idAnfitrion = $_POST['idAnfitrion'];
?>
 <!-- Masthead -->
<div class="row h-100">
  <div class="col-sm-12 my-auto">
    <div class="card card-block w-25 mx-auto" style="border-radius: 20px 20px 20px 20px;">
      <div class="card-body" >
          <h2 class="title">Denunciar anuncio</h2>
          <hr>
          <form method="POST" action="/ExpressHouse/crearDenuncia.php">
              <div class="form-row">
                  <div class="form-group col-md-6">
                      <label class="label">Motivo</label>
                      <input class="form-control" type="text" name="motivo">
                  </div>
              </div>
              <div class="form-row">
                  <div class="form-group col-md-12">
                      <label class="label">Descripción</label>
                      <textarea class="form-control" name="descripcion" rows="10" cols="30" placeholder="Descripción..."></textarea>
                  </div>
              </div>
              <hr>
              <div class="form-row">
                  <div class="form-group col-md-6">
                    <input class="form-control" name="idAnfitrion" type ="hidden" value="<?php echo $idAnfitrion?>">
                    <button class="btn btn-primary" type="submit">Denunciar</button>
                  </div>
              </div>
          </form>
      </div>
    </div>
  </div>
</div>

<?php include 'footer.php'; ?>