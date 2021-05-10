<?php
    session_start();

    unset($_SESSION['usuario']);
    unset($_SESSION['passwd']);
    unset($_SESSION['admin']);
    header("location: index.php");
?>