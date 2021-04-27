<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:template match="/">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
    <title>FACTURA</title>
</head>
<body>
    <center>
        <!--Mostramos los detalles de una factura-->
        <table style="border-radius:2px; font-family:'Helvetica'; font-size:15px; border: .5px black solid">
            <caption><strong>FACTURA</strong></caption>
            <tr>
                <td><strong>id Factura</strong></td>
                <td style="text-align:right"><strong><xsl:value-of select="factura/idFactura"/></strong></td>
            </tr>
            <p></p>
            <tr>
                <td><strong>Fecha</strong></td>
                <td style="text-align:right"><xsl:value-of select="factura/fecha"/></td>
            </tr>
            <tr>
                <td><strong>Nombre</strong></td>
                <td style="text-align:right"><xsl:value-of select="factura/nombre"/></td>
            </tr>
            <tr>
                <td><strong>Dirección</strong></td>
                <td style="text-align:right"><xsl:value-of select="factura/domicilio"/></td>
            </tr>
             <tr>
                <td><strong>Método pago</strong></td>
                <td style="text-align:right"><xsl:value-of select="factura/metodo_pago"/></td>
            </tr>
            <p></p>
            <tr> 
                <td colspan="2" style="font-size:18px">Datos reserva</td>
            </tr>
            <tr>
                <td><hr style="border-top: 1px solid #FF585D"/></td>
            </tr>
            <tr>
                <td><strong>id Reserva</strong></td>
                <td style="text-align:right"><xsl:value-of select="factura/reserva/idReserva"/></td>
            </tr>
            <tr>
                <td><strong>Fecha de llegada</strong></td>
                <td style="text-align:right"><xsl:value-of select="factura/reserva/fecha_inicio"/></td></tr>
            <tr>
                <td><strong>Fecha de salida</strong></td>
                <td style="text-align:right"><xsl:value-of select="factura/reserva/fecha_fin"/></td></tr>
            <!-- Si el cantidad de huéspedes es superior a 2, el número se representa en negrita -->
            <xsl:if test="factura/reserva/num_huespedes >= 2">
                <tr>
                    <td><strong>Número de huéspedes</strong></td>
                    <td style="text-align:right"><strong><xsl:value-of select="factura/reserva/num_huespedes"/></strong></td>
                </tr>
            </xsl:if> 
            <p></p>
            <tr>
                <td colspan="2"><hr style="width:90%; border-top: 1px solid #FF585D"/></td>
            </tr>
            <tr>
                <td><strong>Importe total</strong></td>
                <td style="text-align:right; font-size:18px"><xsl:value-of select="factura/importe"/>€</td>
            </tr>
        </table>
    </center>
</body>
</html>
</xsl:template>
</xsl:stylesheet>