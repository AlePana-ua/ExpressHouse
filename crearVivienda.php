<?php 
    session_start();

    // Título de la página 
    $pageTitle = 'Añadir vivienda';
    // Solo el Anfitrión puede acceder a esta página. 
    include 'seguridadAnfitrion.php';
    include 'header.php';
    include 'conexionBD.inc'; 
    include 'utils.php';
    
?>
<br>
<section id="addVivienda">
    <div class="container h-100">
        <div class="card card-block w-75 mx-auto" id="tarjeta" style="border-radius: 20px 20px 20px 20px;">
            <div class="card-title text-center">
                <h2>Añadir vivienda</h2>
            </div>
            <div class="card-body">
                <form method="POST" action="/ExpressHouse/insertarVivienda.php" enctype="multipart/form-data">
                    <hr>
                    <div class="form-row">
                        <div class="form-group col-md-6 ">
                            <label class="label">Nombre vivienda</label>
                            <input required class="form-control" type="text" name="nombre-vivienda">
                        </div>
                        <div class="form-group col-md-6">
                            <label class="label">Foto</label>
                            <input required type="file" name="imagenes[]" size="40" multiple>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="label">Descripción</label>
                            <textarea required class="form-control" type="text" rows="3" cols="30" name="descripcion-vivienda" placeholder="Descripción..."></textarea>
                        </div>
                    </div>
                    <br>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="label">Dirección</label>
                            <input required class="form-control" type="text" name="dir-vivienda">
                        </div>
                        <div class="form-group col-md-3">
                            <label class="label">Tipo</label>
                            <select class="custom-select" id="tipo" name="tipo-vivienda">
                                <option selected="selected" disabled="disabled">Tipo vivienda ...</option>
                            <?php
                                // Lista de posibles valores del tipo de vivienda 
                                $listTipos =  enum_values('Vivienda', 'tipo');
                                foreach ($listTipos as $tipo) {
                                    echo '<option value="'.$tipo.'">'.$tipo.'</option>';
                                }
                            ?>
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label class="label">Zona</label>
                            <select class="custom-select" id="zona" name="zona-vivienda">
                                <option selected="selected" disabled="disabled">Zona vivienda ...</option>
                            <?php
                                // Lista de posibles valores de la zona de vivienda 
                                $listTipos =  enum_values('Vivienda', 'zona');
                                foreach ($listTipos as $tipo) {
                                    echo '<option value="'.$tipo.'">'.$tipo.'</option>';
                                }
                            ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label class="label">Ciudad</label>
                            <!-- <input required class="form-control" type="text" name="ciudad-vivienda"> -->
                            <select required class="custom-select" name="ciudad-vivienda">
                                <option selected="selected" disabled="disabled">Seleccionar ciudad ...</option>
                                <?php 
                                // Seleccionamos el nombre de todas las ciudades con viviendas.
                                $query_cities = "SELECT id_ciudad, nombre FROM ciudad  ORDER BY nombre ASC;";
                                if ($query = $link->query($query_cities)) {
                                    if ($query->num_rows == 0) {
                                    echo "<option disabled=\"disabled\">No hay ciudades</option>";
                                    } else {
                                    while($row = mysqli_fetch_array($query)) {  
                                        echo get_id_list_of_cities($row['id_ciudad'], $row['nombre']);
                                    }
                                    }
                                    $query->close();
                                }
                                ?> 
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <label class="label">Código Postal</label>
                            <input required class="form-control" type="text" name="codpos-vivienda">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-2">
                            <label class="label">Habitaciones</label>
                            <input required class="form-control" type="number" name="hab-vivienda">
                        </div>
                        <div class="form-group col-md-2">
                            <label class="label">Aseos</label>
                            <input required class="form-control" type="number" name="aseos-vivienda">
                        </div>
                    </div>
                    <!-- Reglas de la vivienda -->
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <h2>Reglas de la vivienda</h2>
                            <hr>
                        </div>
                    </div>
                    <br>
                    <div class="form-row">
                        <div class="form-group col-md-2">
                            <label class="label">Fiesta</label>
                            <input required class="form-control" type="text" name="fiesta-vivienda">
                        </div>
                        <div class="form-group col-md-2">
                            <label class="label">Mascotas</label>
                            <input required class="form-control" type="text" name="mascota-vivienda">
                        </div>
                    </div>
                    <br>
                    <!-- Precio por dia-->
                    <div class="form-row">
                        <div class="form-group col-md-2">
                            <label class="label">Mínimo de días</label>
                            <input required class="form-control" type="number" name="minDias-vivienda">
                        </div>
                        
                        <div class="form-group col-md-2 justify-content-right">
                            <label class="label">Precio por Día</label>
                            <input required class="form-control" type="number" name="precio-vivienda">
                        </div>
                    </div>
                    <br>
                    <hr>
                    <div class="form-row">
                        <div class="form-group col-md-6 justify-content-left">
                            <a id="text-back" class="float-left" href="index.php">&#8592; Back</a>
                        </div>
                        <div class="form-group col-md-6 ">
                            <button class="btn float-right btn-volver " type="submit">Añadir vivienda</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?php
    include "desconexionBD.inc";
    include 'footer.php';
?>