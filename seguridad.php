<?php 
    session_start();
    $usuario = $_SESSION['usuario'];
    //validamos si se ha hecho o no el inicio de sesion correctamente
    if(!isset($usuario)) {
        // Si el usuario no es admin
        header('Location: index.php');
    }
?>