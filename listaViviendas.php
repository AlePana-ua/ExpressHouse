<?php include 'header.php'; ?>

<?php 

include_once "conexionBD.inc";

$email = $_GET['email'];
$query =$link -> query("SELECT nombre,foto from Alumno where email='".$email."'");

if($row = mysqli_fetch_array($query))
{
       $nombre = $row['nombre'];
       $foto=$row['foto'];

?>

<div class="row h-auto">
    <div class="col-sm-10">
        <?php
        $_SESSION['destino'] = $_POST['destino'];
        $_SESSION['fecha-llegada'] = $_POST['fecha-llegada'];
        $_SESSION['fecha-salida'] = $_POST['fecha-salida'];

        echo '<h2>Viviendas en '.$_SESSION['destino'].'</h2>';
        echo '<h4>Llegada: '.$_SESSION['fecha-llegada'].'  Salida: '.$_SESSION['fecha-salida'].'</h4>';

        require_once 'utils.php';

        $totalDias = 0;
        
        $query =$link -> query("SELECT idVivienda, foto, descripcion from Anuncio where minimo_de_dias='".$totalDias."'");

        if($row = mysqli_fetch_array($query))
        {
            $nombre = $row['nombre'];
            $foto=$row['foto'];
            for($i=0; $i <= 3; $i++) {
                echo get_house_cards(1, 1, 1, 1);
            }
        }else {
            echo "<h3> Error al mostrar las casa</h3>";
        }
        ?>
    </div>
    <div class="col-sm-2">
        
    </div>
</div>
<?php } ?>

<?php include 'footer.php'; ?>


