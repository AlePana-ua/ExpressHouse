<?php 
    session_start();
    include "conexionBD.inc";

    $usuario = $_POST['usuario'];
    $clave = $_POST['password'];
    echo "User: $usuario  Passwd: $clave";
    $query_user = "SELECT * FROM Usuario WHERE correo = '$usuario' and contrasenya = '$clave';";
    
    if($query=$link->query($query_user)) {
        if($row = mysqli_fetch_assoc($query)) {
        //Validamos si el nombre del administrador existe en la base de datos o es correcto
        //Si el usuario es correcto ahora validamos su contraseña
            if($row["contrasenya"] == $clave) {
                $esAdmin = False;
                // Una vez comprobado sus credenciales comprobamos si es Admin, Huesped o Anfitrion.
                $query_user_type = "SELECT u.nombre 
                                    FROM Usuario u, Administrador a 
                                    WHERE a.id_user = u.id_user 
                                    AND u.correo = '$usuario';";
                // Si es administrador
                if($query2 = $link ->query($query_user_type)) {
                    $esAdmin = True;
                }
                //Creamos sesión
                
                //Almacenamos el nombre de usuario en una variable de sesión usuario
                $_SESSION["usuario"] = $usuario;
                $_SESSION["admin"] = $esAdmin;
                //Redireccionamos a la pagina: admin.php
                header('Location: index.php');
                echo "index.php";
            }
        } else {
            echo "login.php";
            //En caso que la contraseña sea incorrecta enviamos un msj y redireccionamos a login.php
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