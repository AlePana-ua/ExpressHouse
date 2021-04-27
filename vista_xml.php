<?php include 'header.php'; 
    //include_once "conexionBD.inc"; 
?>
<div class="container-fluid row">
    <div class="col-md-4">
        <div class="row">
            <h2>Buscar factura</h2>
        </div>
        <hr>
        <div class="row">
            <label>Código de la factura</label>
        </div>
        <div class="row">
            <input placeholder="p.e 12345">
        </div>
        <br>
        <div class="row">
            <button> Buscar </button>
        </div>
    </div>
    <div class="col-md-8">
        <div class="row">
            <h2>Visualización factura:</h2>
        </div>
        <br>
        <div class="row">
            <?php
                // Carga el fichero XML origen
                $xml = new DOMDocument;
                $xml->load('./xml_files/gi_expresshouse.xml');

                $xsl = new DOMDocument;
                $xsl->load('./xml_files/gi_expresshouse.xsl');

                // Configura el procesador
                $proc = new XSLTProcessor;
                $proc->importStyleSheet($xsl); // adjunta las reglas XSL
                echo $proc->transformToXML($xml);
            ?>
        </div>
    </div>
</div>
<?php 
    // Generamos el xml

?>

<?php //include_once "desconexionBD.inc"; ?>
<?php include 'footer.php'; ?>