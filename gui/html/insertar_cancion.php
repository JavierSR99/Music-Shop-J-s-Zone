<?php $app = new App(); ?>
<div class="container">
    <div class="row">
        <div class="col-12 text-center">
            <h2>INSERTAR CANCIÓN</h2>
            <?php echo $song=$app->mostrarLastSong();?>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <form action="index.php" method="post">
                <div class="form-group">
                    <label for="nsong">Nombre de la canción:</label>
                    <input type="text" class="form-control" id="nsong" name="nsong" aria-describedby="nsong" maxlength="255" required>
                </div>
                <div class="form-group">
                    <label for="number">Número: </label>
                    <input type="number" class="form-control" id="number" name="number" maxlength="70" required>
                </div>
                <div class="form-group">
                    <label for="disco">CD:</label>
                    <select name="disco" id="disco" required>
                        <option disabled selected>select CD</option>
                        <?php
                        $app = new App();
                        try {
                            $options=$app->mostrarSelectCD();
                            echo $options;
                        } catch (Exception $exception) {
                            $exception->getMessage();
                        }
                        ?>
                    </select>
                </div>
                <input type="hidden" name="func" value="3" >
                <button type="submit" class="btn btn-primary">Guardar</button>
                <button type="reset" class="btn btn-warning">Resetear</button>
            </form>
        </div>
        <div class="col-12 text-center">
        </div>
    </div>
</div>