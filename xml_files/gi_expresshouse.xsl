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
        <table style="border-radius:3px; font-family:'Helvetica'; font-size:15px; border: .5px black solid">
            <title><strong>FACTURA</strong></title>
            <tr> 
                <td colspan="2" style="font-size:18px"><strong>Datos Empresa</strong></td>
            </tr>
            <tr>
                <td>Dirección</td>
                <td style="text-align:right"><xsl:value-of select="factura/datos_empresa"/></td>
            </tr>
            <tr>
                <td>Id. Factura</td>
                <td style="text-align:right"><strong><xsl:value-of select="factura/idFactura"/></strong></td>
            </tr>
            <p></p>
            <tr>
                <td>Fecha</td>
                <td style="text-align:right"><xsl:value-of select="factura/fecha"/></td>
            </tr>
            <tr>
                <td>Nombre Cliente</td>
                <td style="text-align:right"><xsl:value-of select="factura/nombre"/></td>
            </tr>
            <tr>
                <td>Dirección</td>
                <td style="text-align:right"><xsl:value-of select="factura/domicilio"/></td>
            </tr>
             <tr>
                <td>Método pago</td>
                <td style="text-align:right"><xsl:value-of select="factura/metodo_pago"/></td>
            </tr>
            <p></p>
            <tr> 
                <td colspan="2" style="font-size:18px"><strong>Datos reserva</strong></td>
            </tr>
            <tr>
                <td><hr style="border-top: 1px solid #FF585D"/></td>
                <td></td>
            </tr>
            <tr>
                <td>Identificador de reserva</td>
                <td style="text-align:right"><xsl:value-of select="factura/reserva/idReserva"/></td>
            </tr>
            <tr>
                <td>Fecha de llegada</td>
                <td style="text-align:right"><xsl:value-of select="factura/reserva/fecha_inicio"/></td></tr>
            <tr>
                <td>Fecha de salida</td>
                <td style="text-align:right"><xsl:value-of select="factura/reserva/fecha_fin"/></td></tr>
            <!-- Si el cantidad de huéspedes es superior a 2, el número se representa en negrita -->
            <xsl:if test="factura/reserva/num_huespedes >= 2">
                <tr>
                    <td>Número de huéspedes</td>
                    <td style="text-align:right"><strong><xsl:value-of select="factura/reserva/num_huespedes"/></strong></td>
                </tr>
            </xsl:if>
            <p></p>
            <!-- Servicios -->
            <tr> 
                <td colspan="2" style="font-size:18px"><strong>Servicios</strong></td>
            </tr>
            <tr>
                <td><hr style="border-top: 1px solid #FF585D"/></td>
                <td></td>
            </tr>
            <xsl:for-each select="factura/reserva/servicios/*">
                <!-- Comparamos el valor de la etiqueta -->
                <xsl:choose>
                    <!-- Si el valor es igual a Si, se muestra en color verde -->
                    <xsl:when test=". = 'Si'">
                        <tr>
                            <td><xsl:value-of select="local-name()"/></td>
                            <td style="text-align:right; color:green"><xsl:value-of select="." /></td>
                        </tr>
                    </xsl:when>
                    <!-- El valor se muestra en rojo si es diferente a Si -->
                    <xsl:otherwise>
                        <tr>
                            <td><xsl:value-of select="local-name()"/></td>
                            <td style="text-align:right; color:red"><xsl:value-of select="." /></td>
                        </tr>
                    </xsl:otherwise>
                </xsl:choose>
            </xsl:for-each>
            <!-- Fin de los servicios -->
            <p></p>
            <tr>
                <td colspan="2"><hr style="width:90%; border-top: 1px solid #FF585D"/></td>
            </tr>
            <tr>
                <td><strong>Importe sin I.V.A </strong></td>
                <td style="text-align:right; font-size:16px"><xsl:value-of select="factura/importe_sin_iva"/>€</td>
            </tr>
            <tr>
                <td><strong>I.V.A (<xsl:value-of select="factura/iva"/>)</strong></td>
                <td style="text-align:right; font-size:16px"><xsl:value-of select="factura/importe_iva"/>€</td>
            </tr>
            <p></p>
            <tr>
                <td><strong>Importe total</strong></td>
                <td style="text-align:right; font-size:20px"><xsl:value-of select="factura/importe_total"/>€</td>
            </tr>
        </table>
    </center>
</body>
</html>
</xsl:template>
</xsl:stylesheet>