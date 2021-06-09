<?php 
    session_start();
    // Título de la página
    $pageTitle = 'Mensaje';

    include 'header.php';
    include "conexionBD.inc";

    $idAnfitrion = $_POST['idAnfitrion']; 
    $contenido = $_POST['message'];
    $asunto = $_POST['asunto'];
    $idUsuario = $_SESSION['idUsuario'];

    $query_insert = "INSERT INTO Mensaje (asunto, contenido, emisor, receptor) VALUES ('".$asunto."', '".$contenido."', '".$idUsuario."', '".$idAnfitrion."')";
    
    echo $query_insert;
    if($query=$link -> query($query_insert)){
?> 
        <div class="alert alert-success alert-dismissable">
            <h2><strong>Mensaje enviado correctamente</strong></h2>
        </div>
<?php
    }else{
?>
        <div class="alert alert-danger alert-dismissable">
            <h2><strong>El mensaje no se ha podido enviar.</strong></h2>
            <p><?= $link->error ?></p>
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
    include 'footer.php';
?>
