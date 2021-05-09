<?php
    include "conexionBD.inc";
    include "seguridadAdmin.php";

    $pageTitle = 'Eliminar usuario'; 

    if(isset($_GET['correo'])){
        $correo = $_GET['correo'];
    }

    if($query= $link ->query("DELETE from Usuario where correo='".$correo."'")){
?>
        <div class="alert alert-success alert-dismissable">
            <h2><strong>Felicidades!</strong> Usuario borrado</h2>
        </div>
<?php
    }else {
?>
        <div class="alert alert-warning alert-dismissable"> 
            <h2><strong>Error!</strong> al borrar el usuario</h2>
        </div>
<?php
    }
?>
 
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