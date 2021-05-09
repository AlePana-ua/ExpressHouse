<?php 
    session_start();
    include "conexionBD.inc";

    $usuario = $_POST['usuario'];
    $clave = $_POST['password'];
    //Comprobamos que existe el usuario
    $query_user = "SELECT id_user, contrasenya FROM Usuario WHERE correo = '$usuario';";
    if($query=$link->query($query_user)) {
        if($row = mysqli_fetch_assoc($query)) {
            //Si el usuario es correcto ahora validamos su contraseña
            if(password_verify($clave, $row['contrasenya'])) {
                $esAdmin = False;
                $esAnfitrion = False;
                // Una vez comprobado sus credenciales comprobamos si es Admin, Huesped o Anfitrion.
                $query_user_admin = "SELECT u.nombre 
                                    FROM Usuario u, Administrador a 
                                    WHERE a.id_user = u.id_user 
                                    AND u.correo = '$usuario';";
                // Comprobamos si es administrador
                if($query2 = $link ->query($query_user_admin)) {
                    if($query2->num_rows == 1) {
                        $esAdmin = True;
                    }
                }
                // Comprobamos si es anfitrión
                $query_user_afitrion = "SELECT u.nombre 
                                    FROM Usuario u, Anfitrion a 
                                    WHERE a.id_user = u.id_user 
                                    AND u.correo = '$usuario';";
                if($query3 = $link ->query($query_user_afitrion)) {
                    if($query3->num_rows == 1) {
                        $esAnfitrion = True;
                    }
                }
                
                //Almacenamos el nombre de usuario en una variable de sesión usuario
                $_SESSION["usuario"] = $usuario;
                $_SESSION["admin"] = $esAdmin;
                $_SESSION["anfitrion"] = $esAnfitrion;
                //Redireccionamos a la pagina: admin.php
                header('Location: index.php');
            }else {
                //Contraseña incorrecta
            }
        } else {
    
            //En caso que el usuario sea incorrecto redireccionamos a login.php
            $_SESSION["error"]=1;
            header('Location: login.php');
        }
        //Mysql_free_result() se usa para liberar la memoria empleada al realizar una consulta
        mysqli_free_result($result);

        /*Mysql_close() se usa para cerrar la conexión a la Base de datos y es
        **necesario hacerlo para no sobrecargar al servidor, bueno en el caso de
        **programar una aplicación que tendrá muchas visitas ;) .*/
        mysqli_close($query2);
    }else {
        echo $link->error;
    }
?>