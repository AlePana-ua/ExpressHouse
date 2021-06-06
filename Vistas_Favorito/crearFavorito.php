<?php
    session_start();

    // Título de la página 
    $pageTitle = 'Favoritos';
    include "../header.php";
    include "../conexionBD.inc";
    

    if(isset($_GET['id_anuncio']) && isset($_GET["id_huesped"])){
        $idAnuncio = $_GET['id_anuncio'];
        $idHuesped = $_GET["id_huesped"];
    }
   
    $query_insert = "INSERT INTO Marcar_favorito (id_anuncio, id_huesped) VALUES ('$idAnuncio', '$idHuesped');";
    echo $query_insert;
    if($query=$link->query($query_insert)){
?>
        <div class="alert alert-success alert-dismissable">
            <h2><strong>Felicidades!</strong> Añadido a favoritos.</h2>
        </div>
<?php
    }else {
?>
        <div class="alert alert-danger alert-dismissable"> 
            <h2><strong>Error!</strong> No se pudo añadir a favoritos.</h2>
        </div>
<?php
    }
?>
 
<button class="btn btn-volver" onclick="goBack();">Volver</button>

<script type="text/javascript">

function goBack() {
  window.history.back();
}
</script>

<?php 
    include "../desconexionBD.inc";
?>