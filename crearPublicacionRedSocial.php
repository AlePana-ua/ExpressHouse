<?php
    session_start();

    //Título de la Página 
    $pageTitle = 'Publicar en Redes Sociales';
    include "header.php";
    //Comprobamos que el anuncio este seleccionado
    if(isset($_GET['id-anuncio'])) {
        $idAnuncio = $_GET['id-anuncio'];
    }
    // Lista de redes sociales
    $listaRedesSociales = ['Instagram', 'Facebook', 'Twitter'];
?>
<div class="row h-content">
    <div class="col-sm-12 my-auto">
        <div class="card card-block w-25 mx-auto" id="tarjeta" style="border-radius: 20px 20px 20px 20px;">
            <div class="card-body">
                <form method="POST" action="insertarPublicacionRS.php" target="popup">
                    <div class="form-row justify-content-center">
                        <h2 class="title">Compartir en redes sociales</h2>
                    </div>
                    <hr>
                    <br>
                    <div class="form-row justify-content-center"> 
                        <label for="Name">Seleccione una red social</label>
                        <select class="custom-select" id="redSocial" name="redSocial">
                            <option selected="selected" disabled="disabled">Seleccionar red social ...</option>
                            <?php
                                foreach ($listaRedesSociales as $red) {
                            ?>
                                    <option value="<?=$red?>"><?=$red?></option>
                            <?php
                                }
                            ?>
                        </select>
                    </div>
                    <br>
                    <br>
                    <div class="form-row justify-content-center">
                        <input id="idAnuncio" name="idAnuncio" type="hidden" value="<?= $idAnuncio ?>">                    
                        <button class="btn btn-volver" type="summit">Compartir</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
    include "footer.php";
?>