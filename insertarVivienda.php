<?php
    session_start();

    // Título de la página 
    $pageTitle = 'Insertar vivienda';

    include 'header.php';
    include "conexionBD.inc";
    /*
    $nombre = $_POST['nombre-vivienda'];
    $direccion = $_POST['dir-vivienda'];
    $ciudad = $_POST['ciudad-vivienda'];
    $codPos = $_POST['codpos-vivienda'];
    $tipoViv = $_POST['tipo-vivienda'];
    $zonaViv = $_POST['zona-vivienda'];
    $habitaciones = $_POST['hab-vivienda'];
    $aseos= $_POST['aseos-vivienda'];
    $fiestas = $_POST['fiesta-vivienda'];
    $mascotas = $_POST['mascota-vivienda'];
    $precioDia = $_POST['precio-vivienda']; 
    $idAnfitrion = $_SESSION["idUsuario"];
    */
    $nombre = 'Casa en Alicantee';
    $direccion = 'Esto es una dirección';
    $ciudad = 36;
    $cPos = '03538';
    $tipoViv = 'casa';
    $zonaViv = 'Ciudad';
    $habitaciones = 2;
    $aseos= 2;
    $fiestas = 1;
    $mascotas = 0;
    $precioDia = 25; 
    $idAnfitrion = 3;

    // Lista de errores
    $msgError = array(0 =>"No hay error, el fichero se subio con Éxito",
                      1 =>"a",
                      2 =>"a",
                      3 =>"a",
                      4 =>"a",
                      5 =>"a",
                      6 =>"a",
                      7 =>"a",
                      8 =>"A");

    // Directorio de imagenes subidas
    $uploadDir = "./uploads/";

    // Comprobamos que el archivo se subio correctamente
    if($_FILES['imagen']['error'] > 0) {
        echo 'Error: '.$msgError[$_FILES['imagen']['error']].'<br>';
    }else {
        // Comprobamos que el archivo no exista ya
        if(file_exists("./uploads/" . $_FILES['imagen']['name'])) {
            echo $_FILES['imagen']['name'].' ya existe'; 
        }else {
           echo  $_FILES['imagen']['tmp_name'];
            if(move_uploaded_file($_FILES['imagen']['tmp_name'], $uploadDir . $_FILES['imagen']['name'])) {
                $ruta = $uploadDir . basename($_FILES['imagen']['name']);
                echo $ruta;
                $query_vivienda = "INSERT INTO  Vivienda (nombre, direccion, habitaciones, aseos, fiestas, mascotas, precioDia, tipo, cPosta, zona, foto, id_ciudad, id_anfitrion) 
                                VALUES ('$nombre', '$direccion', '$habitaciones', '$aseos', '$fiestas', '$mascotas', '$precioDia', '$tipoViv', '$codPos', '$zonaViv', '$ruta', '$ciudad', '$idAnfitrion');";

                if($query = $link->query($query_vivienda)){
?>
                    <div class="alert alert-success alert-dismissable">
                        <h2><strong>Felicidades!</strong> Vivienda publicada</h2>
                    </div>
<?php    
                }else {
                    echo $link->error;
                }
            }else {
                echo " La foto no se movio!";
            }
        }
    }
    include "desconexionBD.inc"; 
    include "footer.php"; 

?>