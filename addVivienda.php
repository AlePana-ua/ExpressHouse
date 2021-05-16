<?php 
    session_start();

    // Título de la página 
    $pageTitle = 'Añadir vivienda';
    
    include 'header.php';
    include "conexionBD.inc"; 
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
                <form method="POST" action="/ExpressHouse/insertarVivienda.php">
                <hr>
                    <div class="form-row">
                        <div class="form-group col-md-6 ">
                            <label class="label">Nombre vivienda</label>
                            <input required class="form-control" type="text" name="nombre-vivienda">
                        </div>
                        <div class="form-group col-md-6">
                            <label class="label">Foto</label>
                            <input required class="form-control" type="file" name="imagen" size="40">
                        </div>
                    </div>
                    <br>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="label">Dirección</label>
                            <input required class="form-control" type="text" name="dir-vivienda">
                        </div>
                        <div class="form-group col-md-2 ">
                            <label class="label">Tipo</label>
                            <select class="custom-select" id="tipo" name="tipo-vivienda">
                                <option selected="selected" disabled="disabled">Tipo vivienda ...</option>
                            <?php
                                // Lista de posibles valores del tipo de vivienda 
                                $listTipos =  enum_values('Vivienda', 'tipo');
                                foreach ($listTipos as $tipo) {
                                    echo '<option value="'.utf8_encode($tipo).'">'.utf8_encode($tipo).'</option>';
                                }
                            ?>
                            </select>
                        </div>
                        <div class="form-group col-md-2 ">
                            <label class="label">Zona</label>
                            <select class="custom-select" id="zona" name="zona-vivienda">
                                <option selected="selected" disabled="disabled">Zona vivienda ...</option>
                            <?php
                                // Lista de posibles valores de la zona de vivienda 
                                $listTipos =  enum_values('Vivienda', 'zona');
                                foreach ($listTipos as $tipo) {
                                    echo '<option value="'.utf8_encode($tipo).'">'.utf8_encode($tipo).'</option>';
                                }
                            ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label class="label">Ciudad</label>
                            <input required class="form-control" type="text" name="dir-vivienda">
                        </div>
                        <div class="form-group col-md-2">
                            <label class="label">Código Postal</label>
                            <input required class="form-control" type="text" name="dir-vivienda">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-2">
                            <label class="label">Habitaciones</label>
                            <input required class="form-control" type="number" name="dir-vivienda">
                        </div>
                        <div class="form-group col-md-2">
                            <label class="label">Aseos</label>
                            <input required class="form-control" type="number" name="dir-vivienda">
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
                            <input required class="form-control" type="text" name="dir-vivienda">
                        </div>
                        <div class="form-group col-md-2">
                            <label class="label">Mascotas</label>
                            <input required class="form-control" type="text" name="dir-vivienda">
                        </div>
                    </div>
                    <br>
                    <!-- Precio por dia-->
                    <div class="form-row">
                        <div class="form-group col-md-2 justify-content-right">
                            <label class="label">Precio por Día</label>
                            <input required class="form-control" type="number" name="dir-vivienda">
                        </div>
                    </div>
                    <br>
                    <hr>
                    <div class="form-row">
                        <div class="form-group col-md-6 justify-content-left">
                            <a id="text-back" class="float-left" href="index.php">&#8592; Back</a>
                        </div>
                        <div class="form-group col-md-6 ">
                            <button class="btn float-right btn-volver ">Añadir vivienda</button>
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