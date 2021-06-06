<?php
    include "conexionBD.inc";
    // NO TOCAR NI QUITAR LOS COMENTARIOS
    // Este sript sirve para cambiar todas las contraseñas de la base de datos
    /*$query_usuarios = "SELECT correo, contrasenya FROM Usuario;";
    
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
    }
    $correctas = 0;
    $incorrectas = 0;
    $passwordCorr = 0;
    if($query = $link->query($query_usuarios)){
        while($row = mysqli_fetch_array($query)) {
            $correo = $row['correo'];
            $encryptPasswd = password_hash($row['contrasenya'], PASSWORD_DEFAULT,[10]);
            $query_update = "UPDATE Usuario SET contrasenya='".$encryptPasswd."' WHERE correo='".$correo."';";
            if($query2 = $link->query($query_update)){
                echo " Cambiada!";
                $correctas += 1;
            }else {
                echo "UPDATE Error:";
                echo $link->error;
            }
        }
    }else {
        echo "SELECT Error:";
        echo $link->error;
    }
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
