<?php 

    // Validamos si se ha hecho o no el inicio de sesion correctamente
    // Si el usuario no esta asignado o no.
    if(!isset($_SESSION['usuario'])) {
        //Si el usuario NO es admin se le manda al login
        header('Location: login.php');
    }
?>