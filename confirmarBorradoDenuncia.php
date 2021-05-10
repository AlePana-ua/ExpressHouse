<?php
    $pageTitle = 'Eliminar usuario'; 
    include "conexionBD.inc";
    include "seguridadAdmin.php";

    $id_Denuncia = $_GET['id'];    
?>

<form id="borrarDenuncia" name="borrarDenuncia" method="GET" action="borrarDenuncia.php">
    <a>Seguro que desea borrar el usuario:<?=utf8_encode($id_Denuncia)?></a>
    <input class="form-control" id="id_Denuncia" name="id" type="hidden"  value="<?php echo utf8_encode($id_Denuncia); ?>">
    <button class="btn btn-danger" type="submit">Borrar Denuncia</button>
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