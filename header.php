<?php 
    session_start(); 
    $usuario = $_SESSION["usuario"];
    $esAdmin = $_SESSION["admin"];
?>
<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $pageTitle;?> | ExpressHouse</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        
        <script src="https://unpkg.com/gijgo@1.9.11/js/gijgo.min.js" type="text/javascript"></script>
        <link href="https://unpkg.com/gijgo@1.9.11/css/gijgo.min.css" rel="stylesheet" type="text/css" />
        <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
        <!------ Include the above in your HEAD tag ---------->

        <!-- Custom styles for this template -->
        <link href="css/style.css" rel="stylesheet">
    </head>
    <body>
        <!-- example 7 - center on mobile 2  fixed-top-->
        <nav class="navbar navbar-expand-sm navbar-custom">
            <a class="navbar-brand" href="/ExpressHouse/">
                Express House
            </a>   
            <ul class="nav navbar-nav ml-auto">
                <?php
                    if($usuario == False) {
                ?>
                <li class="nav-item">
                    <a href="#" class="nav-link">Ser anfitrión</a>
                </li>
                <li class="nav-item">
                    <a href="registrar.php" class="nav-link">Registrarse</a>
                </li>
                <li class="nav-item">
                    <a href="login.php" class="nav-link">Login</a>
                </li>
                <?php
                    }else {
                        if($esAdmin == False) {
                ?>
                <li class="nav-item">
                    <a href="#" class="nav-link">Ser anfitrión</a>
                </li>
                <li class="nav-item">
                    <a href="cuenta.php" class="nav-link">Hola, <?php echo $_SESSION["usuario"]?></a>
                </li>
                <li class="nav-item">
                    <a href="logout.php" class="nav-link">Logout</a>
                </li>
                <?php 
                    }else {
                ?>
                <li class="nav-item">
                    <a href="paneladmin.php" class="nav-link">Panel Admin</a>
                </li>
                <li class="nav-item">
                    <a href="control_db.php" class="nav-link">Control DB</a>
                </li>
                <li class="nav-item">
                    <a href="buscador_facturas.php" class="nav-link">Facturas XML</a>
                </li>
                <li class="nav-item">
                    <a href="cuenta.php" class="nav-link">Hola, <?php echo $_SESSION["usuario"]?></a>
                </li>
                <li class="nav-item">
                    <a href="logout.php" class="nav-link">Logout</a>
                </li>
                <?php
                    }
                    }
                ?>
            </ul>
        </nav>
        <br>


