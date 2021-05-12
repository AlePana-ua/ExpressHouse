<?php
    include "conexionBD.inc";
    include "seguridadAdmin.php";
    
    // Titulo de la página
    $pageTitle = 'Eliminar Anuncio'; 

    if(isset($_GET['id'])){
        $idAnuncio = $_GET['id'];
    }

    if($query= $link ->query("DELETE from Anuncio where id_anuncio='".$idAnuncio."'")){
?>
        <div class="alert alert-success alert-dismissable">
            <h2><strong>Felicidades!</strong> Anuncio borrado</h2>
        </div>
<?php
    }else {
?>
        <div class="alert alert-warning alert-dismissable"> 
            <h2><strong>Error!</strong> al borrar el anuncio</h2>
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