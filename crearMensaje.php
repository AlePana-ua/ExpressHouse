<?php 
    include 'header.php';
    include "conexionBD.inc";
?>
    

<?php
        $idAnfitrion = $_POST['idAnfitrion']; 
        $contenido = $_POST['message'];
        $asunto = $_POST['asunto'];
        $idUsuario = $_SESSION['usuario'];
        //$idAnfitrion = 3; 
        //$contenido = "Mensaje de prueba";
        //$asunto = "Esto es un asunto";
        //$idUsuario = 2;
        $query_insert = "INSERT INTO Mensaje (asunto, contenido, emisor, receptor) VALUES ('".$asunto."', '".$contenido."', '".$idUsuario."', '".$idAnfitrion."')";
        
        
        if($query=$link -> query($query_insert)){
?> 
            <div class="alert alert-success alert-dismissable">
                <h2><strong>Mensaje enviado correctamente</strong></h2>
            </div>
<?php
    }else{
        echo $link -> error;
        ?>
        <div class="alert alert-danger alert-dismissable">
            <h2><strong>El mensaje no se ha podido enviar.</strong></h2>
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

<?php include 'footer.php';?>
