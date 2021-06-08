<?php 

    $usuario = $_SESSION['usuario'];
    $esAnfitrion = $_SESSION['anfitrion'];
    
    // Validamos si se ha hecho o no el inicio de sesión correctamente
    // Si el usuario no esta asignado o no es anfitrión.
    if((!isset($usuario) || $esAnfitrion == False)) {
        //Si el usuario NO es anfitrión se le manda al login.
        header('Location: login.php');
    }
?>