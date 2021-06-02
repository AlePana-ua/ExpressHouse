<?php include 'header.php'; include "conexionBD.inc"; ?>



<?php

        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $correo = $_POST['correo'];
        $contraseña = $_POST['contraseña'];

        if(empty($_POST['nombre']) || empty($_POST['apellido']) || empty($_POST['correo']) || empty($_POST['contraseña'])){
?>      
                <div class="alert alert-danger alert-dismissable">
                    <h2>Tienes que rellenar todos los campos para poder registrarte</h2>
                </div>
<?php
        }else{
        
            $query_usuario = "INSERT INTO Usuario (nombre, apellido, correo, contrasenya) VALUES('$nombre', '$apellido', '$correo', '$contraseña')";
            if($query = $link->query($query_usuario)){
        ?>            
                <div class="alert alert-success alert-dismissable">
                    <h2><strong>Felicidades!</strong> Has sido registrado con exito!</h2>
                </div>
        <?php
            }
            else
                echo $link->error;
        }
            
?>

<?php include 'footer.php';?>
<?php 
    include "desconexionBD.inc";
?>

