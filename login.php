<?php 
    
    $pageTitle = 'Login';
    include 'header.php';
?>


<div class="row h-100">
    <div class="col-sm-12 my-auto">
        <div class="card card-block w-25 mx-auto" id="tarjeta" style="border-radius: 20px 20px 20px 20px;">
            <div class="card-body">
                <h2 class="title">Iniciar Sesión</h2>
                <hr>
                <form method="POST" action="/ExpressHouse/comprobarLogin.php">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label class="label">Usuario</label>
                            <input class="form-control" type="text" name="usuario">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label class="label">Contraseña</label>
                            <input class="form-control" type="text" name="password">
                        </div>
                    </div>
                    <div class="form-row">
                        <a href="/ExpressHouse/"> ¿Contraseña olvidada? </a>
                    </div>
                    <hr>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <button class="btn btn_custom" type="summit">Login</button>
                        </div>
                        <div class="form-group col-md-6">
                            <a href="/ExpressHouse/registrar.php"> ¿No estás registrado? </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>