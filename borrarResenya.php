<?php
    // Título de la página
    $pageTitle = 'Eliminar usuario';

    include 'header.php';
    include "conexionBD.inc";
    include "seguridadAdmin.php";

    if(isset($_GET['idResenya'])){
        $idResenya = $_GET['idResenya'];
        $query_resenya = "DELETE from resenya where id_resenya='".$idResenya."'";

        if($query = $link ->query($query_resenya)){
?>
        <div class="alert alert-success alert-dismissable">
            <h2><strong>Felicidades!</strong> Reseña eliminada</h2>
        </div>
<?php
        }else {
?>
        <div class="alert alert-success alert-dismissable"> 
            <h2><strong>Error!</strong> al eliminar la reseña</h2>
        </div>
<?php
        }
    }else {
        //Si intenta acceder por url sin asignar el id.
        header('Location: index.php');
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