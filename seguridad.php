<?php 
    // Validamos si se ha hecho o no el inicio de sesión correctamente.
    // Si el usuario no esta asignado o no.
    if(!isset($_SESSION['usuario'])) {
        // Si el usuario NO esta logueado lo redirigimos al index
        header('Location: login.php');
    }
?>