<?php
    session_start();
    include "conexionBD.inc";
    include "seguridadAdmin.php";
    $pageTitle = 'Eliminar usuario'; 

    if(isset($_GET['id'])) {
        $idResenya = $_GET['id']; 
    }else {
        
    }
?>

<form id="borrarResenya" name="borrarResenya" method="GET" action="borrarResenya.php">
    <a>Seguro que desea borrar la reseña:<?=utf8_encode($idResenya)?></a>
    <input class="form-control" id="idResenya" name="idResenya" type="hidden"  value="<?= utf8_encode($idResenya); ?>">
    <button class="btn btn-danger" type="submit">Eliminar reseña</button>
</form>

<button class="btn btn-volver" onclick="cargar();">Volver</button>

<script type="text/javascript">
function cargar(){
    opener.location.reload();
    window.close();
}
</script>
<?php 
    include "desconexionBD.inc";
?>