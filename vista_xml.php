<?php 
    // Iniciamos session
    session_start();
    // Título de la página
    $pageTitle = 'Vista Factura';
    include 'header.php'; 
    include "conexionBD.inc";
    include "seguridadAdmin.php";
?>

<?php 
    $idFactura = $_POST['id-Factura'];
    // Seleccionamos los elementos necesarios para la factura.
    $query_factura = "SELECT f.id_factura
                        ,f.id_reserva
                        ,f.fecha 
                        ,f.nombre 
                        ,f.domiciliofiscal 
                        ,f.metodopago 
                        ,f.importe_total 
                        ,r.fecha_inicio 
                        ,r.fecha_final 
                        ,r.numero_huespedes 
                        ,v.mascotas 
                        ,v.fiestas
                    FROM Factura f 
                    INNER JOIN Reserva r ON f.id_reserva = r.id_reserva 
                    INNER JOIN Anuncio a ON a.id_anuncio = r.id_anuncio
                    INNER JOIN Vivienda v ON v.id_viv = a.id_vivienda
                    WHERE f.id_factura = $idFactura;";

    if ($query = $link->query($query_factura)) {
        while($row = mysqli_fetch_array($query)) {
            
            $idFactura = $row['id_factura'];
            $idReserva =$row['id_reserva'];
            $fechaEmision = $row['fecha'];
            $nombreCliente = $row['nombre'];
            $direccion = $row['domiciliofiscal'];
            $metodoPago = $row['metodopago'];
            $importeTotal = $row['importe_total'];

            $fechaInicio = $row['fecha_inicio'];
            $fechaFin = $row['fecha_final'];
            $numHuespedes = $row['numero_huespedes'];
            $fiesta = ($row['fiestas'] == 1 ? 'Si' : 'No');
            $mascotas = ($row['mascotas'] == 1 ? 'Si' : 'No');
            $datosEmpresa = 'ExpressHouse Sl, Carr. de San Vicente del Raspeig, s/n, 03690 San Vicente del Raspeig, Alicante';
            
            //Añadir una tabla con el IVA
            $IVA = 21;
            //Calculamos el importe sin IVA y el el IVA a pagar.
            $importeSinIVA = $importeTotal / (1+($IVA/100));
            
            $importeIVA = $importeTotal - $importeSinIVA;
        
            $xml = "<?xml version=\"1.0\"  encoding=\"UTF-8\" standalone=\"no\"?><?xml-stylesheet href=\"./xml_files/gi_expresshouse.xsl\" type=\"text/xsl\" ?> <!DOCTYPE factura SYSTEM \"./xml_files/gi_expresshouse.dtd\">";

            $xml .= "<factura>";
            $xml .= "<datos_empresa>".$datosEmpresa."</datos_empresa>";
            $xml .= "<idFactura>".$idFactura."</idFactura>";
            $xml .= "<nombre>".$nombreCliente."</nombre>";
            $xml .= "<fecha>".$fechaEmision."</fecha>";
            $xml .= "<metodo_pago>".$metodoPago."</metodo_pago>";
            $xml .= "<domicilio>".$direccion."</domicilio>";
            $xml .= "<iva>".$IVA."%</iva>";
            $xml .= "<importe_sin_iva>".$importeSinIVA."</importe_sin_iva>";
            $xml .= "<importe_iva>".$importeIVA."</importe_iva>";
            $xml .= "<importe_total>".$importeTotal."</importe_total>";
            // Mostramos los detalles de la reserva
            $xml .= "<reserva>";
            $xml .= "<idReserva>".$idReserva."</idReserva>";
            $xml .= "<fecha_inicio>".$fechaInicio."</fecha_inicio>";
            $xml .= "<fecha_fin>".$fechaFin."</fecha_fin>";
            $xml .= "<num_huespedes>".$numHuespedes."</num_huespedes>";
            $xml .= "<servicios>";
            $xml .= "<Fiesta>".$fiesta."</Fiesta>";
            $xml .= "<Mascotas>".$mascotas."</Mascotas>";
            $xml .= "</servicios></reserva></factura>";

            //
            $xml_final = new DOMDocument;
            $xml_final->loadXML($xml);

            $xsl_path = './xml_files/gi_expresshouse.xsl';

            $xsl_final = new DOMDocument;
            $xsl_final->load($xsl_path);

            $xslt = new XSLTProcessor;
            $xslt->importStylesheet($xsl_final);

            $final = $xslt->transformToXml($xml_final);

            echo "<center><h1>Factura $idFactura</h1></center>";
            echo $final;
        }
    }else {
        echo "<h2>OH! Ha ocurrido un error, vuelva a intentarlo mas tarde</h2>";
    }
?>
<br>
<br>
<div class="row d-flex justify-content-center">
    <form method="POST" action="buscador_facturas.php">
        <button type="submit" class="btn btn-volver">Volver</button>
    </form>
</div>
<?php 
    include "desconexionBD.inc";
    include 'footer.php'; 
?>