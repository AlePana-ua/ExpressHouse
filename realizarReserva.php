<?php
    include 'header.php';
    include "conexionBD.inc";
    session_start();

    $done = false;
    $fecha_llegada = isset($_POST["fecha_llegada"]) ? $_POST["fecha_llegada"] : "";
    $fecha_salida = isset($_POST["fecha_salida"]) ? $_POST["fecha_salida"] : "";
    $id_anuncio = isset($_POST["id_anuncio"]) ? $_POST["id_anuncio"] : "";
    $huespedes = isset($_POST["huespedes"]) ? $_POST["huespedes"] : "";
    $id_usuario = isset($_SESSION["idUsuario"]) ? $_SESSION["idUsuario"] : "2";
    $num_dias_reserva = (strtotime($fecha_salida) - strtotime($fecha_llegada)) / (60 * 60 * 24);
    $link->begin_transaction(MYSQLI_TRANS_START_READ_WRITE);

    $query = "SELECT Anuncio.id_anuncio as id_anuncio,Vivienda.precioDia as precioDia
                        FROM Anuncio
                        INNER JOIN Vivienda ON Anuncio.id_vivienda = Vivienda.id_viv 
                        WHERE Anuncio.id_anuncio = '".$id_anuncio."'
                        LIMIT 1;";

    $queryResult = $link->query($query);


    $row = mysqli_fetch_array($queryResult);
    $precio_final = $row["precioDia"] * $num_dias_reserva;

    $query = "INSERT INTO Reserva (id_anuncio, fecha_inicio, fecha_final, numero_huespedes, confirmada, id_huesped)
     VALUES('$id_anuncio', '$fecha_llegada', '$fecha_salida', '$huespedes', '1', '$id_usuario')";
    $queryResult = $link->query($query);
    $id_reserva = $link->insert_id;

    $fecha = date("Y/m/d");
    $metodoPago = 'VISA';
    $nombre = 'BENITO';
    $domiciliofiscal = 'TESTING';
    $pagada = 1;

    $query = "INSERT INTO Factura (id_reserva, fecha, metodopago, importe_total, nombre, domiciliofiscal, pagada)
     VALUES('$id_reserva', '$fecha', '$metodoPago', '$precio_final', '$nombre', '$domiciliofiscal', '$pagada')";

    $link->query($query);
    $done = mysqli_affected_rows($link) > 0;
    $link->commit();

    $link->close();

    if($done){
?>

<div class="row">
    <div class="col-12">
        <div class="alert alert-success alert-dismissable">
            <h2><strong>Reserva Realizada correctamente</strong></h2>
        </div>
    </div>
</div>

<?php
    }else{

?>

<div class="row">
    <div class="col-12">
        <div class="alert alert-danger alert-dismissable">
            <h2><strong>Error al realizar reserva</strong></h2>
        </div>
    </div>
</div>

<?php
    }
include 'footer.php';
?>
