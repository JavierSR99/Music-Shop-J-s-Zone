<div class="container py-3">
    <div class="row">
        <div class="col-12 text-center">
            <h2>OUR CATALOGUE</h2>
        </div>
    </div>
    <div class="row">
        <?php
        $app = new App();
        $catalogo=$app->mostrarCatalogo();
        echo $catalogo;
        ?>
    </div>
</div>