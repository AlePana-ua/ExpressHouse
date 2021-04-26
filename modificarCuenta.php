<?php include 'header.php'; ?>
<div class="row h-100">
    <div class="col-sm-12 my-auto">
        <div class="card card-block w-50 mx-auto" id="tarjeta" style="border-radius: 20px 20px 20px 20px;">
            <div class="card-body">
                <h2 class="title">Modificar cuenta</h2>
                <hr>
                <form method="POST" action="/ExpressHouse/index.php">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="label">Nombre</label>
                            <input class="form-control" type="text" name="first_name">
                        </div>
                        <div class="form-group col-md-6">
                            <label class="label">Apellidos</label>
                            <input class="form-control" type="text" name="last_name">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="label">Fecha nacimiento</label>
                            <input id="datepicker" placeholder="01/01/1997" name="fecha-nacimiento"/>
                        </div> 
                        <div class="form-group col-md-6">
                            <label class="label">Correo electrónico</label>
                            <input class="form-control" type="email" name="email">
                        </div>
                        <div class="form-group col-md-6">
                            <label class="label">Teléfono</label>
                            <input class="form-control" type="text" name="phone">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="label">Nueva contraseña</label>
                            <input class="form-control" type="text" name="password">
                        </div> 
                        <div class="form-group col-md-6">
                            <label class="label">Repite contraseña</label>
                            <input class="form-control" type="text" name="password2">
                        </div>
                    </div>

                    <hr>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <button class="btn btn_custom" style = "width: 250px;" type="summit">Confirmar cambios</button>
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
<?php include 'footer.php'; ?>
