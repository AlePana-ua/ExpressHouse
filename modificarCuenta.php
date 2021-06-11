<?php 
    session_start();

    $pageTitle = 'Perfil';
    include "conexionBD.inc";
    include 'seguridad.php';
    include 'header.php'; 
    
    $idBuscar = $_SESSION['usuario'];
    $queryID = $link->query("SELECT * FROM Usuario WHERE correo = '".$idBuscar."';"); 
    
    $row = mysqli_fetch_array($queryID);

?>
<div class="row h-100">
    <div class="col-sm-12 my-auto">
        <div class="card card-block w-50 mx-auto" id="tarjeta" style="border-radius: 20px 20px 20px 20px;">
            <div class="card-body">
                <h2 class="title">Modificar cuenta</h2>
                <hr>
                <form method="POST" action="utilModificarCuenta.php" method="POST" enctype="multipart/form-data" >
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="label">Nombre</label>
                            <input class="form-control" type="text" name="first_name" value="<?=$row["nombre"]?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label class="label">Apellidos</label>
                            <input class="form-control" type="text" name="last_name" value="<?=$row["apellido"]?>">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="label">Correo electrónico</label>
                            <input class="form-control" type="email" name="email" value="<?=$row["correo"]?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label class="label">Teléfono</label>
                            <input class="form-control" type="text" name="phone" value="<?=$row["telefono"]?>">
                        </div>
                  </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="label">Nueva contraseña</label>
                            <input class="form-control" type="password" name="password" value= "<?=$row["contrasenya"]?>">
                        </div> 
                        <div class="form-group col-md-6">
                            <label class="label">Repite contraseña</label>
                            <input class="form-control" type="password" name="password2" value= "<?=$row["contrasenya"]?>">
                        </div>
                    </div>
                    <div>
                    
                    <div class="form-group">
                        <a>Foto de perfil</a>
                        <hr/>
					    <input type="file" name="imagen" size="40"><br> 
					    <p class="help-block text-danger"></p>
                    </div>
                    <hr>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <button class="btn btn_custom" style = "width: 250px;" type="submit">Confirmar cambios</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <script>      
        $('#datepicker').datepicker({
            uiLibrary: 'bootstrap'
        });
        </script>
    </div>
</div>
<?php 
    include "desconexionBD.inc";
    include 'footer.php'; 
?>
