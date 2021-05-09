<?php
    $pageTitle = 'Eliminar usuario'; 
    include "conexionBD.inc";
    include "seguridadAdmin.php";

    $correo = $_GET['correo'];    
?>

<form id="borrarUsuario" name="borrarUsuario" method="GET" action="borrarUsuario.php">
    <a>Seguro que desea borrar el usuario:<?=utf8_encode($correo)?></a>
    <input class="form-control" id="correo" name="correo" type="hidden"  value="<?php echo utf8_encode($correo)?>">
    <button class="btn btn-danger" type="submit">Borrar Usuario</button>
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