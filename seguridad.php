<?php 
    session_start();
    //validamos si se ha hecho o no el inicio de sesion correctamente
    if(!isset($_SESSION['usuario'])) {
        if($_SESSION['admin']) {
            //Si el usurio es admin
            header('Location: paneladmin.php');
        }else {
            // Si el usuario no es admin
            header('Location: cuenta.php');
        }
    }
?>