<?php 
    include 'header.php'; 
    include "conexionBD.inc";
    include "seguridadAdmin.php";
?>

<?php 
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
                    INNER JOIN Vivienda v ON v.id_viv = a.id_vivienda;";

    if ($query = $link->query($query_factura)) {
        while($row = mysqli_fetch_array($query)) {

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
            $mascotas = $row[11];

            $datosEmpresa = 'ExpressHouse Sl, Carr. de San Vicente del Raspeig, s/n, 03690 San Vicente del Raspeig, Alicante';
            
            //Añadir una tabla con el IVA
            $IVA = 21;
            //Calculamos el importe sin IVA y el el IVA a pagar.
            $importeSinIVA = $importeTotal/$IVA;
            $importeIVA = $importeTotal - $importeSinIVA;
            
            // Se tienen que añadir estos elementos a la base de datos
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
        }
    }
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

<?php 
    include "desconexionBD.inc";
    include 'footer.php'; 
?>