<?php
    session_start();

    // Título de la página 
    $pageTitle = 'Insertar vivienda';
    
    include 'header.php';
    include "conexionBD.inc";
    
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

    $descripcion = $_POST['descripcion-vivienda'];;
    $minDias = $_POST['minDias-vivienda'];
    
    /*
    $nombre = 'Casa en Alicante';
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
    */
    // Lista de errores
    $msgError = array(0 =>"No hay error, el fichero se subio con Éxito",
                      1 =>'The uploaded file exceeds the upload_max_filesize directive in php.ini',
                      2 =>'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form',
                      3 =>'The uploaded file was only partially uploaded',
                      4 =>'No file was uploaded',
                      6 =>'Missing a temporary folder',
                      7 =>'Failed to write file to disk.',
                      8 =>'A PHP extension stopped the file upload.');
    // Remplazamos los espacios en blanco ' ' del nombre de la vivienda por '_' 
    // para usarlo en el url de almacenamiento.
    $nombreViv = str_replace(" ", "_", $nombre);
    
    // Directorio de imagenes subidas
    $uploadDir = "./uploads/".$idAnfitrion."/".$nombreViv;
    // Comprobamos qu ese directorio no existe ya.
    if(!is_dir($uploadDir)) { 
    // Creamos el directorio
        if(!mkdir($uploadDir, true)) {
            die('Fallo al crear el directorio '.$uploadDir);
        }
    }else {
        echo    '<div class="alert alert-warning alert-dismissable">
                    <h2><strong>Error!</strong> El directorio ya existe.</h2>
                </div>';
    }

    // Comprobamos que el archivo se subio correctamente
    if($_FILES['imagen']['error'] > 0) {
        echo 'Error: '.$msgError[$_FILES['imagen']['error']].'<br>';
    }else {    
        $extension = array('jpeg', 'jpg', 'png');
        foreach($_FILES['imagenes']['tmp_name'] as $key => $tmp_name) {
            $file_name = $_FILES['imagenes']['name'][$key];
            $file_tmp = $_FILES['imagenes']['tmp_name'][$key];
            $ext=pathinfo($file_name, PATHINFO_EXTENSION);
            // Comprobamos que la extension sea adecuada.  
            if(in_array($ext, $extension)){
                // Si el fichero no existe lo subimos, sino lo subimos cambaindo el nombre
                if(!file_exists($uploadDir."/".$file_name)){
                    move_uploaded_file($file_tmp, $uploadDir."/".$file_name);
                }else {
                    $fileName = basename($file_name, $ext);
                    $newFile_name = $fileName.time().".".$ext;
                    move_uploaded_file($file_tmp, $uploadDir."/".$file_name);
                }
            }else {
                echo    '<div class="alert alert-danger alert-dismissable">
                            <h2><strong>Error!</strong> Formato de imágen no permitido.</h2>
                        </div>';
            }
        }
        $ruta = $uploadDir."/";
        $query_vivienda = "INSERT INTO  Vivienda (nombre, direccion, habitaciones, aseos, fiestas, mascotas, precioDia, tipo, cPosta, zona, foto, id_ciudad, id_anfitrion) 
                    VALUES ('".$nombre."', '$direccion', '$habitaciones', '$aseos', '$fiestas', '$mascotas', '$precioDia', '$tipoViv', '$codPos', '$zonaViv', '$ruta', '$ciudad', '$idAnfitrion');";
        echo $query_vivienda;
        // Ejecutamos la query para insertar la vivienda.
        if($query = $link->query($query_vivienda)){
            echo    '<div class="alert alert-success alert-dismissable">
                        <h2><strong>Felicidades!</strong> Vivienda publicada</h2>
                    </div>';
        }else {
            echo $link->error;
        }
        
    }
    // Obtenemos el id de la vivienda creada
    $query_id_vid = "SELECT id_viv FROM Vivienda WHERE nombre='$nombre' AND id_anfitrion='$idAnfitrion';";
    if($query = $link->query($query_id_vid)){
        if($row = mysqli_fetch_array($query)){
            $idViv = $row['id_viv'];
        }
    }else {
        echo $link->error;
    }
    
    // Insertamos el anuncio de ela vivienda.
    $query_anuncio = "INSERT INTO Anuncio(minimo_de_dias, descripcion, id_vivienda) 
                      VALUES ('$minDias','$descripcion','$idViv')";
    
    if($query = $link->query($query_anuncio)){
        echo    '<div class="alert alert-success alert-dismissable">
                    <h2><strong>Felicidades!</strong> Anuncio se publicado</h2>
                </div>';
    }else {
        echo $link->error;
    }
    include "desconexionBD.inc"; 
    include "footer.php"; 

?>