<?php $app = new App(); ?>
<div class="container">
    <div class="row">
        <div class="col-12 text-center">
            <h2>INSERTAR ARTISTA</h2>
            <?php echo $app->mostrarLastArtist(); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <form action="index.php" method="post">
                <div class="form-group">
                    <label for="nartista">Nombre del artista:</label>
                    <input type="text" class="form-control" id="nartista" name="nartista" aria-describedby="nartista" maxlength="255" required>
                </div>
                <div class="form-group">
                    <label for="descp">Descripción: </label>
                    <input type="text" class="form-control" id="descp" name="descp" maxlength="255" required>
                </div>
                <input type="hidden" name="func" value="2" >
                <button type="submit" class="btn btn-primary">Guardar</button>
                <button type="reset" class="btn btn-warning">Resetear</button>
            </form>
        </div>
    </div>
</div>