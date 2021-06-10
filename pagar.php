<?php

    $pageTitle = 'Pagar';
    include 'header.php';
    include "conexionBD.inc";

    $fecha_llegada = isset($_POST["fecha_llegada"]) ? $_POST["fecha_llegada"] : "";
    $fecha_salida = isset($_POST["fecha_salida"]) ? $_POST["fecha_salida"] : "";
    $id_anuncio = isset($_POST["id_anuncio"]) ? $_POST["id_anuncio"] : "";
    $huespedes = isset($_POST["huespedes"]) ? $_POST["huespedes"] : "";
    $num_dias_reserva = (strtotime($fecha_salida) - strtotime($fecha_llegada)) / (60 * 60 * 24) ;


    $query = "SELECT Anuncio.id_anuncio as id_anuncio,Vivienda.precioDia as precioDia
                    FROM Anuncio
                    INNER JOIN Vivienda ON Anuncio.id_vivienda = Vivienda.id_viv 
                    WHERE Anuncio.id_anuncio = '".$id_anuncio."'
                    LIMIT 1;";

    $queryResult = $link->query($query);

    $row = mysqli_fetch_array($queryResult);
    $precio_final = $row["precioDia"] * $num_dias_reserva;
?>
<div class="row h-100">
    <div class="col-sm-12 my-auto">
        <div class="card card-block w-50 mx-auto" id="tarjeta" style="border-radius: 20px 20px 20px 20px;">
            <div class="card-body">
                <h2 class="title" style="text-align:center;">Confirmar y pagar</h2>
                <hr>
                <p>No se te cobrara nada a menos que tu anfitrión acepte la soliciud.</p>
                <div class="row">
                    <div class="col-6">
                        <form method="POST" action="realizarReserva.php">
                            <input type="hidden" name="fecha_llegada" value="<?php echo $fecha_llegada?>">
                            <input type="hidden" name="fecha_salida" value="<?php echo $fecha_salida?>">
                            <input type="hidden" name="id_anuncio" value="<?php echo $id_anuncio?>">                            <input type="hidden" name="id_anuncio" value="<?php echo $id_anuncio?>">
                            <input type="hidden" name="huespedes" value="<?php echo $huespedes?>">
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label class="label">Nº Tarjeta</label>
                                    <input class="form-control" type="text" name="tarjeta">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label class="label">Fecha caducidad</label>
                                    <input class="form-control" type="text" name="cad">
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="label">CVC</label>
                                    <input class="form-control" type="text" name="cvc">
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="label">Nombre</label>
                                    <input class="form-control" type="text" name="nombre">
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="label">Apellido</label>
                                    <input class="form-control" type="text" name="apellido">
                                </div>
                            </div>
                            <hr>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <button class="btn btn_custom" type="summit">Pagar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-6">
                        <div class="card" card-block w-50 mx-auto" id="tarjeta" style="border-radius: 20px 20px 20px 20px;">
                            <div class="card-body">
                                <h4>Reserva</h4>
                                <b>Fechas</b>
                                <p>Llegada  <?php echo $fecha_llegada?> </p>
                                <p>Salida  <?php echo $fecha_salida?> </p>
                                <p><b>Precio total</b> <?php echo $precio_final?>€</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>      
        $('#datepicker').datepicker({
            uiLibrary: 'bootstrap'
        });
        </script>
    </div>
</div>
<?php include 'footer.php'; ?>
