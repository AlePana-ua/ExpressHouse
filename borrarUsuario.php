<?php
    $pageTitle = 'Eliminar usuario'; 
    include "conexionBD.inc";
    include "seguridadAdmin.php";

    $correo = $_GET['correo'];
    echo $correo;
    if($query= $link ->query("DELETE from Usuario where correo='".$correo."'")){
?>
        <div class="alert alert-success alert-dismissable">
            <h2><strong>Felicidades!</strong> Usuario borrado</h2>
        </div>
<?php
    }else {
?>
        <div class="alert alert-success alert-dismissable"> 
            <h2><strong>Error!</strong> al borrar el usuario</h2>
        </div>
<?php
    }
?>
 
<button onclick="cargar();">Volver</button>

<script type="text/javascript">
function cargar(){
    opener.location.reload();
    window.close();
}
</script>
<?php 
    include "desconexionBD.inc";
?>