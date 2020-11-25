<?php $app = new App(); ?>
<div class="container">
    <div class="row">
        <div class="col-12 text-center">
            <h2>INSERTAR CD</h2>
            <?php echo $song=$app->mostrarLastAlbum();?>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <form action="index.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="titulo">Título del album</label>
                    <input type="text" class="form-control" id="titulo" name="titulo" aria-describedby="titulo" required>
                </div>
                <div class="form-group">
                    <label for="fecha">Fecha de lanzamiento</label>
                    <input type="date" class="form-control" id="fecha" name="fecha" required>
                </div>
                <div class="form-group form-check">
                    <label for="precio">Precio</label>  &nbsp; &nbsp; &nbsp;
                    <input type="number" min="5" max="50" step="0.01" class="form-check-input"
                           id="precio" name="precio" required>
                </div>
                <div class="form-group">
                    <label for="portada">Portada</label>
                    <input type="file" class="class=custom-file-input" id="portada" name="portada" required
                           accept="image/jpeg image/png">
                </div>
                <div class="form-group">
                    <label for="genero">Género</label>
                    <select id="genero" name="genero" required>
                        <option selected disabled>Select genre</option>
                        <?php
                        $app = new App();
                        try {
                            $options=$app->mostrarSelectGeneros();
                            echo $options;
                        } catch (Exception $exception) {
                            $exception->getMessage();
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="artista">Artista</label>
                    <select id="artista" name="artista" required>
                        <option selected disabled>Select artist</option>
                        <?php
                        try {
                            $optionsAr=$app->mostrarSelectArtistas();
                            echo $optionsAr;
                        } catch (Exception $exception) {
                            $exception->getMessage();
                        }
                        ?>
                    </select>
                </div>
                <input type="hidden" name="func" value="0" >
                <button type="submit" class="btn btn-primary">Guardar</button>
                <button type="reset" class="btn btn-warning">Resetear</button>
            </form>
        </div>
    </div>
</div>