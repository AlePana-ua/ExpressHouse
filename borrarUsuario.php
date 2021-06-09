<?php
    // Titulo de la página
    $pageTitle = 'Eliminar usuario'; 

    include 'header.php'; 
    include "conexionBD.inc";
    include "seguridadAdmin.php";

    if(isset($_GET['correo'])){
        $correo = $_GET['correo'];
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
    }else {
        //Si intenta acceder por url sin asignar el id.
        header('Location: index.php');
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
    include 'footer.php'; 
?>