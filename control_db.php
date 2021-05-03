<?php
    session_start(); 
    $pageTitle = 'Control BD';
    include 'header.php';
    include "conexionBD.inc";
    include "seguridadAdmin.php";
    
?>

<!-- Vista exclusiva para el administrador -->
<div class="container-fluid center">
    <div class="row">
        <div class="col-12 col-sm-2">
            <div class="db-data" align="center">
                <?php
                    // Obtenemos los nombres de las tablas de la BD.
                    if ($query = $link->query("SELECT COUNT(*) FROM Usuario;")) {
                        while($row = mysqli_fetch_array($query)) {
                            $totalUsuarios = $row[0];
                        }
                    }
                ?>
                <h2><?php echo $totalUsuarios; ?></h2>
                <h1>Usuarios</h1>
            </div>
        </div>
        <div class="col-12 col-sm-2">
            <div class="db-data" align="center">
                <?php
                    // Obtenemos los nombres de las tablas de la BD.
                    if ($query = $link->query("SELECT COUNT(*) FROM ciudad;")) {
                        while($row = mysqli_fetch_array($query)) {
                            $totalResenas = $row[0];
                        }
                    }
                ?>
                <h2><?php echo $totalResenas; ?></h2>
                <h1>Ciudades</h1>
            </div>
        </div>
        <div class="col-12 col-sm-2">
            <div class="db-data" align="center">
                <?php
                    // Obtenemos los nombres de las tablas de la BD.
                    if ($query = $link->query("SELECT COUNT(*) FROM Anuncio;")) {
                        while($row = mysqli_fetch_array($query)) {
                            $totalAnuncios = $row[0];
                        }
                    }
                ?>
                <h2><?php echo $totalAnuncios; ?></h2>
                <h1>Anuncios</h1>
            </div>
        </div>
        <div class="col-12 col-sm-2">
            <div class="db-data" align="center">
                <?php
                    // Obtenemos los nombres de las tablas de la BD.
                    if ($query = $link->query("SELECT COUNT(*) FROM Vivienda;")) {
                        while($row = mysqli_fetch_array($query)) {
                            $totalViviendas = $row[0];
                        }
                    }
                ?>
                <h2><?php echo $totalViviendas; ?></h2>
                <h1>Viviendas</h1>
            </div>
        </div>
        <div class="col-12 col-sm-2">
            <div class="db-data" align="center">
                <?php
                    // Obtenemos los nombres de las tablas de la BD.
                    if ($query = $link->query("SELECT COUNT(*) FROM Vivienda;")) {
                        while($row = mysqli_fetch_array($query)) {
                            $totalViviendas = $row[0];
                        }
                    }
                ?>
                <h2><?php echo $totalViviendas; ?></h2>
                <h1>Viviendas</h1>
            </div>
        </div>
        <div class="col-12 col-sm-2">
            <div class="db-data" align="center">
                <?php
                    // Obtenemos los nombres de las tablas de la BD.
                    if ($query = $link->query("SELECT COUNT(*) FROM Denuncia;")) {
                        while($row = mysqli_fetch_array($query)) {
                            $totalDenuncias = $row[0];
                        }
                    }
                ?>
                <h2><?php echo $totalDenuncias; ?></h2>
                <h1>Denuncias</h1>
            </div>
        </div>
        <div class="col-12 col-sm-2">
            <h1></h1>
        </div>
    </div>
    <br>
    <div class="row">
        <!-- Tablas de la base de datos -->
        <div class="col-12 col-sm-2">
            <div class="table-responsive db-data">
                <table class="table table-sm table-striped">
                    <thead class="table-light">
                        <tr>
                            <th>Lista de tablas</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            // Obtenemos los nombres de las tablas de la BD.
                            if ($query = $link->query("SHOW TABLES FROM gi_expresshouse2;")) {
                                while($row = mysqli_fetch_array($query)) {
                                    $tableList [] = $row[0];
                                }
                                foreach($tableList as $table) {
                                    echo '<tr><td>'.utf8_encode($table).'</td></tr>';
                                }
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- Tablas y sus respectivos tamaños en la base de datos -->
        <div class="col-12 col-sm-4">
            <div class="table-responsive db-data">            
                <table class="table table-sm table-striped">
                    <thead class="table-light">
                        <tr>
                            <th>Tabla</th>
                            <th>Tamaño en (MB)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            // Seleccionamos todas las tablas de la base de datos y mostramos su tamanyo en MB.
                            if ($query = $link->query("SELECT TABLE_NAME AS 'Table', ROUND((DATA_LENGTH + INDEX_LENGTH) / 1024 / 1024) AS 'Size (MB)' 
                                FROM information_schema.TABLES
                                WHERE TABLE_SCHEMA = 'gi_expresshouse2' /*AND TABLE_NAME = Administrador*/
                                ORDER BY (DATA_LENGTH + INDEX_LENGTH) DESC;")) {
                                while($row = mysqli_fetch_array($query)) {
                                    $table = $row[0];
                                    $tableSize = $row[1];
                                    //Sumamos el tamaño de cada tabla para obtener el tamanyo de toda la BD.
                                    $databaseSize += $tableSize;
                                    echo '<tr>
                                            <td>'.utf8_encode($table).'</td>
                                            <td style="text-align:right">'.$tableSize.'</td>
                                        </tr>';
                                }
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- Tamaño de la base de datos -->
        <div class="col-12 col-sm-3">
            <div class="table-responsive db-data" align="center">
                <h2><?php echo $databaseSize; ?> MB</h2>
                <h1>Tamaño base de datos</h1>
            </div>
        </div>
    </div>
    
</div>

<?php 
    include "desconexionBD.inc";
    include 'footer.php'; 
?>