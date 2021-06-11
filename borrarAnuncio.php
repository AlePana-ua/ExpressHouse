<?php
    session_start();
    // Titulo de la página
    $pageTitle = 'Eliminar Anuncio'; 

    include 'header.php'; 
    include "conexionBD.inc";
    include "seguridadAdmin.php";
    
    if(isset($_GET['id'])){
        $idAnuncio = $_GET['id'];
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
            <p><?= $link->error ?></p>
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