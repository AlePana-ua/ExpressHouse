<?php 
    include 'header.php'; 
    include "conexionBD.inc"; 


        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $correo = $_POST['correo'];
        $contraseña = $_POST['contraseña'];

    $comprobacion="SELECT correo FROM Usuario WHERE correo='$correo' AND nombre='$nombre';";
                    if($query = $link->query($comprobacion  )){
                        if($row = mysqli_fetch_array($query)){
                            $email_comprobacion  = $row['correo'];

                        }
                    }else {
                        echo $link->error;
                    }
    
    if($email_comprobacion == NULL){


        if(isset($_POST['anditrion']) && $_POST['anfitrion'] == 1){

                if(empty($_POST['nombre']) || empty($_POST['apellido']) || empty($_POST['correo']) || empty($_POST['contraseña'])){
        ?>      
                    <div class="alert alert-danger alert-dismissable">
                        <h2>Tienes que rellenar todos los campos para poder registrarte</h2>
                    </div>
        <?php
                }else{
                    $encrypPasswd = password_hash($contraseña, PASSWORD_DEFAULT, [10]);
                    $query_usuario = "INSERT INTO Usuario (nombre, apellido, correo, contrasenya) VALUES ('$nombre', '$apellido', '$correo', '$encrypPasswd')";
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
                    $query_id_usuario="SELECT id_user FROM Usuario WHERE correo='$correo' AND nombre='$nombre';";
                    if($query = $link->query($query_id_usuario)){
                        if($row = mysqli_fetch_array($query)){
                            $idUser = $row['id_user'];
                        }
                    }else {
                        echo $link->error;
                    }
                    $query_anfitrion="INSERT INTO Anfitrion (id_user) VALUES ($idUser)";
                    if($query = $link->query($query_anfitrion)){
                        ?>            
                    
                    <?php
                    }
                     else
                        echo $link->error;
        }
       
     
        else{

            if(empty($_POST['nombre']) || empty($_POST['apellido']) || empty($_POST['correo']) || empty($_POST['contraseña'])){
    ?>      
                    <div class="alert alert-danger alert-dismissable">
                        <h2>Tienes que rellenar todos los campos para poder registrarte</h2>
                    </div>
    <?php
            }else{
                $encrypPasswd = password_hash($contraseña, PASSWORD_DEFAULT, [10]);
                $query_usuario = "INSERT INTO Usuario (nombre, apellido, correo, contrasenya) VALUES ('$nombre', '$apellido', '$correo', '$encrypPasswd')";
                if($query = $link->query($query_usuario)){
            ?>            
                    <div class="alert alert-success alert-dismissable">
                        <h2><strong>Felicidades!</strong> Has sido registrado con exito!</h2>
                    </div>
            <?php
                }
                else{
                    echo $link->error;
                }
                $query_id_huesped="SELECT id_user FROM Usuario WHERE correo='$correo' AND nombre='$nombre';";
                    if($query = $link->query($query_id_huesped)){
                        if($row = mysqli_fetch_array($query)){
                            $idUser = $row['id_user'];
                        }
                    }else {
                        echo $link->error;
                    }
                    $query_huesped="INSERT INTO Huesped (id_user) VALUES ($idUser)";
                    if($query = $link->query($query_huesped)){
                        ?>            
                    
                    <?php
                    }
                     else
                        echo $link->error;
            }
        }
}
else{
      ?>            
                    <div class="alert alert-danger alert-dismissable">
                        <h2><strong>Usuario ya existente</h2>
                    </div>
            <?php
}
            
?>

<?php 
    include "desconexionBD.inc";
    include 'footer.php';
?>