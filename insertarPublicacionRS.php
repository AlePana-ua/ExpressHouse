<?php
    $pageTitle = 'Compartir';
    include "conexionBD.inc";

    if(isset($_POST['idAnuncio']) && isset($_POST['redSocial'])){
        $idAnuncio = $_POST['idAnuncio'];
        $redSocial = $_POST['redSocial'];
    }
    
    // Fecha actual
    $fechaActual = date('Y-m-d H:i:s');

    $query_insert = "INSERT INTO  Publicaciones_Redes_Sociales (fecha, redSocial, id_anun) 
                    VALUES ('$fechaActual', '$redSocial', '$idAnuncio');";
    echo $query_insert;
    if($query= $link->query($query_insert)){
?>
        <div class="alert alert-success alert-dismissable">
            <h2><strong>Felicidades!</strong> Anuncio publicado</h2>
        </div>
<?php
    }else {
?>
        <div class="alert alert-warning alert-dismissable"> 
            <h2><strong>Error!</strong> al compartir el anuncio</h2>
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