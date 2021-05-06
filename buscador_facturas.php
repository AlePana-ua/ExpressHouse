<?php 
    $pageTitle = 'Buscador facturas';
    include 'header.php'; 
    include "conexionBD.inc";
    include "seguridadAdmin.php";
?>

<!-- SOLO el ADMIN pueede acceder a esta página, si NO es ADMIN se volvera al inicio-->
<br>
<div class="h-100 container-fluid">
    <div class="col-sm-12 my-auto">
        <div class="card card-block w-25 mx-auto" id="tarjeta" style="border-radius: 20px 20px 20px 20px;">
            <div class="card-body">
                <form method="POST" action="vista_xml.php">
                    <div class="form-row">
                        <h2>Buscar factura:</h2>
                    </div>
                    <br>
                    <div class="form-row">
                        <input required class="form-control" type="text" name="id-Factura" placeholder="p.e 123456">
                    </div>
                    <br>
                    <div class="form-row">
                        <button class="btn btn-buscar-factura" type="submit">Buscar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<?php 
    include "desconexionBD.inc";
    include 'footer.php'; 
?>