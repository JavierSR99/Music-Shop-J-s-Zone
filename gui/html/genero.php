<div class="listadoG">
    <form>
        <input type="hidden" name="func" value="2">
        <ul class="listageneros">
            <li style="font-weight: bold">Géneros</li>
            <?php
            $app = new App();
            $listadoGeneros=$app->mostrarListadoGeneros();
            echo $listadoGeneros;
            ?>
        </ul>
    </form>
</div>
<div class="container">
    <div class="row">
        <?php
        if (isset($_REQUEST['gen'])) {
            $app = new App();
            $cds=$app->mostrarCatalogoGenero($_REQUEST['gen']);
            echo $cds;
        }
        ?>
    </div>
</div>