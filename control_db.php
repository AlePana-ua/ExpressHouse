<?php 
    include 'header.php'; 
    include "conexionBD.inc";
?>
<div class="container-fluid center">
    <div class="row">
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
                            //Obtenemos los nombres de las tablas.
                            if ($query = $link->query("SHOW TABLES FROM gi_expresshouse2;")) {
                                while($row = mysqli_fetch_array($query)) {
                                    $tableList [] = $row[0];
                                }
                                foreach($tableList as $table) {
                                    echo "<tr><td>$table</td></tr> ";
                                }
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-12 col-sm-6">
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
                            //
                            if ($query = $link->query("SELECT TABLE_NAME AS 'Table', ROUND((DATA_LENGTH + INDEX_LENGTH) / 1024 / 1024) AS 'Size (MB)' 
                                FROM information_schema.TABLES
                                WHERE TABLE_SCHEMA = 'gi_expresshouse2' /*AND TABLE_NAME = Administrador*/
                                ORDER BY (DATA_LENGTH + INDEX_LENGTH) DESC;")) {
                                while($row = mysqli_fetch_array($query)) {
                                    $table = $row[0];
                                    $tableSize = $row[1];
                                    $databaseSize += $tableSize;
                                    echo "<tr>
                                            <td>$table</td>
                                            <td style='text-align:right'>$tableSize</td>
                                        </tr> ";
                                }
                            }

                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-12 col-sm-4">
            <div class="table-responsive db-data">
                <table class="table table-sm table-striped">
                    <thead class="table-light">
                        <tr>
                            <th>Tamaño base de datos en (MB)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <td style='text-align:center'><?php echo $databaseSize; ?></td>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>
<?php 
    include "desconexionBD.inc";
    include 'footer.php'; 
?>