<?php include 'header.php'; ?>
<?php include_once "conexionBD.inc"; ?>

<div class="row h-auto">
    <div class="col-sm-10">
        <?php
        $_SESSION['destino'] = $_POST['destino'];
        $_SESSION['fecha-llegada'] = $_POST['fecha-llegada'];
        $_SESSION['fecha-salida'] = $_POST['fecha-salida'];

        echo '<h2>Viviendas en '.$_SESSION['destino'].'</h2>';
        echo '<h4>Llegada: '.$_SESSION['fecha-llegada'].'  Salida: '.$_SESSION['fecha-salida'].'</h4>';

        require_once 'utils.php';

        $totalDias = 10;
        
        $query = $link->query("SELECT idVivienda, foto, descripcion from Anuncio");
        if ($query->num_rows == 0)
        {
            echo "Lo sentimos no hay casas.";
        } else 
        {
            if($row = mysqli_fetch_array($query))
            {
                for($i=0; $i <= 3; $i++) {
                    echo get_house_cards(1, 1, 1, 1);
                }
            }else {
                echo "<h3> Error al mostrar las casa, intente de nuevo mas tarde</h3>";
            }
        }
        ?>
    </div>
</div>
<?php include_once "desconexionBD.inc"; ?>
<?php include 'footer.php'; ?>


