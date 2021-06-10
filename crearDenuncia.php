<?php
    session_start();
    
    $pageTitle = 'Denuncia';
    include 'header.php';
    include "conexionBD.inc";
    include 'seguridad.php';
        
        $idAnfitrion = $_POST['idAnfitrion']; 
        $descripcion = $_POST['descripcion'];
        $motivo = $_POST['motivo'];
        $idUsuario = $_SESSION['usuario'];
        
        $query_insert = "INSERT INTO Denuncia (id_huesped, id_anfitrion, motivo, descripcion) 
                         VALUES ('".$idUsuario."', '".$idAnfitrion."', '".$motivo."', '".$descripcion."')";    
        
        if($query=$link -> query($query_insert)){
?> 
            <div class="alert alert-success alert-dismissable">
                <h2><strong>Anuncio denunciado correctamente</strong></h2>
            </div>
<?php
    }else{
        echo $link -> error;
        ?>
        <div class="alert alert-danger alert-dismissable">
            <h2><strong>La denuncia no se ha podido enviar.</strong></h2>
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
