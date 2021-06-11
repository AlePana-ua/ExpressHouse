<?php
    include "conexionBD.inc";
    include "seguridadAdmin.php";
    /*
    // NO TOCAR NI QUITAR LOS COMENTARIOS
    // Este sript sirve para cambiar todas las contraseñas de la base de datos
    $query_usuarios = "SELECT correo, contrasenya FROM Usuario;";
    
    if($query = $link->query($query_usuarios)){
        while($row = mysqli_fetch_array($query)) {
            $correo = $row['correo'];
            $query_update = "UPDATE Usuario SET contrasenya='12345' WHERE correo='".$correo."';";
            if($query2 = $link->query($query_update)){
                echo " Cambiada!";
                //$correctas += 1;
            }else {
                echo "UPDATE Error:";
                echo $link->error;
            }
        }
    }else {
        echo "SELECT Error:";
        echo $link->error;
    }*/
    /*$query_usuarios = "SELECT correo, contrasenya FROM Usuario;";
   
    $encryptPasswd = password_hash('12345', PASSWORD_DEFAULT,[10]);
    $query_update = "UPDATE Usuario SET contrasenya='".$encryptPasswd."' WHERE id_user >= 500000 AND id_user < 600000 AND contrasenya='12345';";
    if($query = $link->query($query_update)){
        echo "Fin";
    }else {
        echo "UPDATE Error:";
        echo $link->error;
    }*/
    /*
    echo "<br>";
    echo "UPDATES Correctas: $correctas";
    echo "<br>";
    if($query = $link->query($query_usuarios)){
        while($row = mysqli_fetch_array($query)) {
            if (password_verify('12345', $row['contrasenya'])) {
                $passwordCorr += 1;
            }else {
                $incorrectas += 1;
            }
        }
    }else {
        echo $link->error;
    }

    echo "Correctas: $passwordCorr";
    echo "<br>";
    echo "Incorrectas: $incorrectas";
    */
    include "desconexionBD.inc";
?>
