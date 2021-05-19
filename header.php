<?php 
    // Comprobamos si un usuario a iniciado sesión
    if (isset($_SESSION['usuario']) && !empty($_SESSION['usuario'])) {
        $usuario = $_SESSION['usuario'];
        $esAnfitrion = $_SESSION['anfitrion'];
        $esAdmin = $_SESSION['admin'];
    }else {
        $usuario = False;
        $esAnfitrion = False;
        $esAdmin = False;
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="icon" type="image/png" href="./img/favicon.png"/>
        <!-- Mostramos el titulo de la página asignado en cada vista -->
        <title><?= $pageTitle;?> | ExpressHouse</title>
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
            <!-- Logo de la página -->
            <a class="navbar-brand" href="/ExpressHouse/">
                <img src="./img/Logo_ExpressHouse.png" height="35" alt="Express House"/>
                Express House
            </a>   
            <!-- Opciones del menú -->
            <ul class="nav navbar-nav ml-auto">
                <?php
                    // Comprobamos si hay una sesión iniciada
                    if(!$usuario) {
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
                        // Si hay una sesión comprobamos si es admin o no
                        if(!$esAdmin) {
                            /** 
                             * Si el usuario es Anfitrión se muestra una opción 
                             * de añadir vivienda, de lo contrario significa que 
                             * es un usuario huésped y se le muestra la opción 
                             * de ser anfitrión
                             */ 

                            if($esAnfitrion) { //Opción anfitrión
                ?>          
                                <li class="nav-item">
                                    <a href="crearVivienda.php" class="nav-link">Añadir casa</a>
                                </li>
                <?php
                            }else { // Opción de huésped 
                ?>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">Ser anfitrión</a>
                                </li>
                <?php 
                            }
                        }else { // Opciones de administrador 
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
                            
                <?php   } ?>
                

                        <li class="nav-item">
                                <a href="cuenta.php" class="nav-link">Hola, <?php echo $_SESSION["usuario"]?></a>
                        </li>
                        <li class="nav-item">
                            <a href="logout.php" class="nav-link">Logout</a>
                        </li>
                <?php    
                    }
                ?>
            </ul>
        </nav>
        


