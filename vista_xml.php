<?php include 'header.php'; 
    //include_once "conexionBD.inc";
?>
<?php 
    $datosEmpresa = 'ExpressHouse Sl, Carr. de San Vicente del Raspeig, s/n, 03690 San Vicente del Raspeig, Alicante';
    $idFactura = 0;
    $nombreCliente = 0;
    $fechaEmision = '01/01/1997';
    $metodoPago = 0;
    $direccion = 0;
    $IVA = 0;
    $importeSinIVA = 0;
    $importeIVA = 0;
    $importeTotal = 0;
    $idReserva = 0;
    $fechaInicio = '01/01/1997';
    $fechaFin = '01/01/1997';
    $numHuespedes = 4;
    $fiesta = 'Si';
    $mascotas = 'No';
    $limpieza = 'Si';
    $fumador = 'No';
    
    $xml = "<?xml version=\"1.0\"  encoding=\"UTF-8\" standalone=\"no\"?><?xml-stylesheet href=\"./xml_files/gi_expresshouse.xsl\" type=\"text/xsl\" ?> <!DOCTYPE factura SYSTEM \"./xml_files/gi_expresshouse.dtd\">";

    $xml .="<factura>";
    $xml .="<datos_empresa>$datosEmpresa</datos_empresa>";
    $xml .= "<idFactura>$idFactura</idFactura>";
    $xml .= "<nombre>$nombreCliente</nombre>";
    $xml .= "<fecha>$fechaEmision</fecha>";
    $xml .= "<metodo_pago>$metodoPago</metodo_pago>";
    $xml .= "<domicilio>$direccion Calle Wallaby 42, Sidney, Australia</domicilio>";
    $xml .= "<iva>$IVA%</iva>";
    $xml .= "<importe_sin_iva>$importeSinIVA</importe_sin_iva>";
    $xml .= "<importe_iva>$importeIVA</importe_iva>";
    $xml .= "<importe_total>$importeTotal</importe_total>";
    // Mostramos los detalles de la reserva
    $xml .= "<reserva>";
    $xml .= "<idReserva>$idReserva</idReserva>";
    $xml .= "<fecha_inicio>$fechaInicio</fecha_inicio>";
    $xml .= "<fecha_fin>$fechaFin</fecha_fin>";
    $xml .= "<num_huespedes>$numHuespedes</num_huespedes>";
    $xml .= "<servicios>";
    $xml .= "<Fiesta>$fiesta</Fiesta>";
    $xml .= "<Mascotas>$mascotas</Mascotas>";
    $xml .= "<Limpieza>$limpieza</Limpieza>";
    $xml .= "<Fumador>$fumador</Fumador>";
    $xml .= "</servicios></reserva></factura>";

    //$fp = fopen("gi_expresshouse.xml","w+");
    //fwrite($fp,$xml);
    //fclose($fp);
?>
<!-- SOLO el ADMIN pueede acceder a esta página, si NO es ADMIN se volvera al inicio-->
<div class="h-100 container-fluid row">
   <div class="col-md-8">
        <div class="row">
            <h2>Visualización factura:</h2>
        </div>
        <br>
        <div class="row">
            <p>Para ver el fichero XML pinche <a href="./xml_files/gi_expresshouse.xml">aquí</a></p>
        </div>
    </div>
</div>

<?php //include_once "desconexionBD.inc"; ?>
<?php include 'footer.php'; ?>