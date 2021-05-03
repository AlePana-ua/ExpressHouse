<?php 
    $pageTitle = 'Buscador facturas';
    include 'header.php'; 
    include "conexionBD.inc";
    include "seguridadAdmin.php";
?>

<!-- SOLO el ADMIN pueede acceder a esta página, si NO es ADMIN se volvera al inicio-->
<div class="h-100 container-fluid">
   <div class="col-md-12">
        <div class="row d-flex justify-content-center">
            <h2>Buscar factura:</h2>
        </div>
        <br>
        <div class="row d-flex justify-content-center">
            <form method="POST" action="vista_xml.php">
                <input required type="text" name="id-Factura" placeholder="p.e 123456">
                <button type="submit">Buscar</button>
            </form>
        </div>
    </div>
</div>


<?php 
    include "desconexionBD.inc";
    include 'footer.php'; 
?>