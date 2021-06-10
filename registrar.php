<?php include 'header.php'; include "conexionBD.inc"; $pageTitle = 'Registrar'; ?>



<div class="row h-100">
    <div class="col-sm-12 my-auto">
        <div class="card card-block w-25 mx-auto" id="tarjeta" style="border-radius: 20px 20px 20px 20px;">
            <div class="card-body" >
                <h2 style="text-align: center;"class="title">Registrarse</h2>
                <hr >
                <form method="POST" action="insertarUsuario.php">
                    <div class="form-row" style="justify-content: center">
                        <div class="form-group col-md-6">
                            <label class="label">Nombre</label>
                            <input placeholder="Nombre" class="form-control" type="text" name="nombre">
                        </div>
                    </div>
                    <div class="form-row" style="justify-content: center">
                        <div class="form-group col-md-6">
                            <label class="label">Apellidos</label>
                            <input placeholder="Apellidos" class="form-control" type="text" name="apellido">
                        </div>
                    </div>
                    <div class="form-row" style="justify-content: center">
                        <!-- <div class="form-group col-md-6">
                            <label class="label">Fecha nacimiento</label>
                            <input id="datepicker" placeholder="01/01/1997" name="fecha-nacimiento"/>
                        </div> -->
                        <div class="form-group col-md-6">
                            <label class="label">Correo electrónico</label>
                            <input placeholder="Correo electrónico" class="form-control" type="correo" name="correo">
                        </div>
                    </div>
                    <div class="form-row" style="justify-content: center">
                        <div class="form-group col-md-6">
                            <label class="label">Contraseña</label>
                            <input placeholder="Contraseña" style="margin-bottom: 10px" class="form-control" type="text" name="contraseña">
                            <input placeholder="Repite Contraseña" class="form-control" type="text" name="contraseña2">
                        </div>
                    </div>
                    <div style="text-align: center">
                        <input type="checkbox" name="anfitrion" value="1" id="cbox2" value="second_checkbox"> <label for="cbox2">Registrarme como anfitrion</label>
                    </div>
                    <div style="text-align: center">
                        <input type="checkbox" name="terminos" value="1" required> Acepto los <a href="./terminos_y_condiciones.php"> términos y condiciones </a> de este servicio </input>
                    </div>
                    <div class="form-row" style="justify-content: center; text-align: center; margin-top: 20px">
                        <div class="form-group col-md-6">
                                <button class="btn btn_custom" type="summit">Registrar</button>
                        </div>
                    </div>
                    <hr>
                    <div class="form-row" style="justify-content: center">
                        
                        <div class="form-group col-md-6" style="text-align: center;">
                            <a href="./login.php"> ¿Ya estás registrado? </a>
                        </div>
                    </div>
                    <div class="form-row" style="justify-content: center; text-align: center; margin-top: 20px">
                        <div class="form-group col-md-6">
                                <button class="btn btn_custom" type="summit" style="width: 130px">Iniciar sesión</button>
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
<?php include 'footer.php';?>
<?php 
    include "desconexionBD.inc";
?>