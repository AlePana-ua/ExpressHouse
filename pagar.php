<?php include 'header.php'; ?>
<div class="row h-100">
    <div class="col-sm-12 my-auto">
        <div class="card card-block w-50 mx-auto" id="tarjeta" style="border-radius: 20px 20px 20px 20px;">
            <div class="card-body">
                <h2 class="title" style="text-align:center;">Confirmar y pagar</h2>
                <hr>
                <p>No se te cobrara nada a menos que tu anfitrión acepte la soliciud.</p>
                <div class="row">
                    <div class="col-6">
                        <form method="POST" action="/ExpressHouse/index.php">
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label class="label">Nº Tarjeta</label>
                                    <input class="form-control" type="text" name="tarjeta">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label class="label">Fecha caducidad</label>
                                    <input class="form-control" type="text" name="cad">
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="label">CVC</label>
                                    <input class="form-control" type="email" name="cvc">
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="label">Nombre</label>
                                    <input class="form-control" type="text" name="nombre">
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="label">Apellido</label>
                                    <input class="form-control" type="text" name="apellido">
                                </div>
                            </div>
                            <hr>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <button class="btn btn_custom" type="summit">Pagar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-6">
                        <div class="card" card-block w-50 mx-auto" id="tarjeta" style="border-radius: 20px 20px 20px 20px;">
                            <div class="card-body">
                                <h4>Reserva</h4>
                                <b>Fechas</b>
                                <p>Llegada 10/03/2021</p>
                                <p>Salida 20/03/2021</p>
                                <p><b>Precio total</b> 200,00€</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>      
        $('#datepicker').datepicker({
            uiLibrary: 'bootstrap'
        });
        </script>
    </div>
</div>
<?php include 'footer.php'; ?>
