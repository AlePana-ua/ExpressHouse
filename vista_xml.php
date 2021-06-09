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
        /*while($row = mysqli_fetch_array($query)) {
            
            $idFactura = $row[0];
            $idReserva =$row[1];
            $fechaEmision = $row[2];
            $nombreCliente = $row[3];
            $direccion = $row[4];
            $metodoPago = $row[5];
            $importeTotal = $row[6];

            $fechaInicio = $row[7];
            $fechaFin = $row[8];
            $numHuespedes = $row[9];

            $fiesta = $row[10];
            $mascotas = $row[11];*/
        if(True){
            //-----------------------
            // Datos falsos
            $idFactura = 1;
            $idReserva = 2;
            $fechaEmision = 3;
            $nombreCliente = 4;
            $direccion = 5;
            $metodoPago = 6;
            $importeTotal = 500;

            $fechaInicio = 8;
            $fechaFin = 9;
            $numHuespedes = 10;

            $fiesta = 'Si';
            $mascotas = 'No';
            //-----------------------
            $datosEmpresa = 'ExpressHouse Sl, Carr. de San Vicente del Raspeig, s/n, 03690 San Vicente del Raspeig, Alicante';
            
            //Añadir una tabla con el IVA
            $IVA = 21;
            //Calculamos el importe sin IVA y el el IVA a pagar.
            $importeSinIVA = $importeTotal / (1+($IVA/100));
            
            $importeIVA = $importeTotal - $importeSinIVA;
            
            // Se tienen que añadir estos elementos a la base de datos
            $limpieza = 'Si';
            $fumador = 'No';
        
            $xml = "<?xml version=\"1.0\"  encoding=\"UTF-8\" standalone=\"no\"?><?xml-stylesheet href=\"./xml_files/gi_expresshouse.xsl\" type=\"text/xsl\" ?> <!DOCTYPE factura SYSTEM \"./xml_files/gi_expresshouse.dtd\">";

            $xml .= "<factura>";
            $xml .= "<datos_empresa>".utf8_encode($datosEmpresa)."</datos_empresa>";
            $xml .= "<idFactura>".$idFactura."</idFactura>";
            $xml .= "<nombre>".utf8_encode($nombreCliente)."</nombre>";
            $xml .= "<fecha>".$fechaEmision."</fecha>";
            $xml .= "<metodo_pago>".utf8_encode($metodoPago)."</metodo_pago>";
            $xml .= "<domicilio>".utf8_encode($direccion)."</domicilio>";
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
            $xml .= "<Fiesta>".utf8_encode($fiesta)."</Fiesta>";
            $xml .= "<Mascotas>".utf8_encode($mascotas)."</Mascotas>";
            $xml .= "<Limpieza>".utf8_encode($limpieza)."</Limpieza>";
            $xml .= "<Fumador>".utf8_encode($fumador)."</Fumador>";
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