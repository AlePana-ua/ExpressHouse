<?php 
    session_start();
    $usuario = $_SESSION['usuario'];
    $esAdmin = $_SESSION['admin'];
    //validamos si se ha hecho o no el inicio de sesion correctamente
    if(isset($usuario)) {
        if($esAdmin == False) {
            //Si el usurio es admin
            header('Location: paneladmin.php');
        }
    }
?>