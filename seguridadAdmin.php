<?php 
    
    $usuario = $_SESSION['usuario'];
    $esAdmin = $_SESSION['admin'];
    
    // Validamos si se ha hecho o no el inicio de sesion correctamente
    // Si el usuario no esta asignado o no es admin.
    if((!isset($usuario) || $esAdmin == False)) {
        //Si el usuario NO es admin se le manda al index
        header('Location: index.php');
    }
?>