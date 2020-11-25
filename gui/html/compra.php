<?php
$bbdd = new BBDD();
$app = new App();
?>
<div class="container pt-4">
    <div class="row">
        <?php
        $app = new App();
        $datos_compra=$app->gestionDatosCompra();
        echo $datos_compra;
        ?>
    </div>
    <div class="row mt-5">
        <div class="col-12 text-center">
            <table class="table">
                <thead>
                <tr>
                    <th>Fecha de lanzamiento</th>
                    <th>Número de ventas</th>
                    <th>Artistas</th>
                    <th>Info. artista</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <?php

                    try {
                        $tabla=$app->gestionTablaCompra();
                        echo $tabla;
                    } catch (Exception $exception) {$exception->getMessage();}
                    ?>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-12 text-center">
            <table class="table">
                <thead>
                <tr>
                    <th>Pista</th>
                    <th>Título</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <?php
                    if ($bbdd->hayCanciones($_REQUEST['ver'])==true) {
                        try {
                            $tablaCanciones=$app->mostrarTablaCanciones($_REQUEST['ver']);
                            echo $tablaCanciones;
                        } catch (Exception $exception) {$exception->getMessage();}
                    } else {
                        ?>
                <tr><td>No data found :/</td><td>No data found :/</td></tr>
                    <?php
                    }
                    ?>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>