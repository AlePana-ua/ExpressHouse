<?php 
    session_start();
    // Título de la página
    $pageTitle = 'Mensaje';

    include 'header.php';
    include 'seguridad.php';
    
    $idAnfitrion = $_GET['id-anfitrion'];
?>

<div class="row h-100">
    <div class="col-sm-12 my-auto">
        <div class="card card-block w-25 mx-auto" style="border-radius: 20px 20px 20px 20px;">
            <div class="card-body" >
                <h2 class="title">Enviar mensaje</h2>
                <hr>
                <form method="POST" action="/ExpressHouse/crearMensaje.php">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label class="label">Asunto</label>
                            <input class="form-control" type="text" name="asunto">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label class="label">Contenido</label>
                            <textarea class="form-control" name="message" rows="10" cols="30" placeholder="Descripción..."></textarea>
                        </div>
                    </div>
                    <hr>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <input class="form-control" name="idAnfitrion" type ="hidden" value="<?= $idAnfitrion?>">                        
                            <button class="btn btn_custom" type="submit">Enviar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php 
    include 'footer.php'; 
?>