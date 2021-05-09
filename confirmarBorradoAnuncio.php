<?php
    $pageTitle = 'Eliminar usuario'; 
    include "conexionBD.inc";
    include "seguridadAdmin.php";

    $id_Anuncio = $_GET['id'];    
?>

<form id="borrarAnuncio" name="borrarAnuncio" method="GET" action="borrarAnuncio.php">
    <a>Seguro que desea borrar el usuario:<?=utf8_encode($id_Anuncio)?></a>
    <input class="form-control" id="id_Anuncio" name="id" type="hidden"  value="<?php echo utf8_encode($id_Anuncio); ?>">
    <button class="btn btn-danger" type="submit">Borrar Anuncio</button>
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