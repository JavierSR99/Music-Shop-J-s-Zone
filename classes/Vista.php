<?php
/**
 * Class Vista
 * AUTHOR Javier Sanz Roa
 * Date 05/03/2020
 * Contiene las funciones que imprimen los html por pantalla
 */

class Vista
{
    /**
     * imprime el código html correspondiente a la cabecera
     */
    public function printCabecera () {
        include 'gui/html/cabecera.html';
    }

    /**
     * imprime el código html correspondiente al footer
     */
    public function printFooter () {
        include 'gui/html/footer.html';
    }

    /**
     * imprime el código html de la página de log in
     */
    public function printLogIn () {
        include 'gui/html/logIn.html';
    }

    public function printRgistro () {
        include 'gui/html/registro.html';
    }

    public function printEncabezado ()
    {
        include 'gui/html/encabezado.html';
    }

    public function printEncabezadoAdmin () {
        include 'gui/html/encabezado_admin.html';
    }

    public function printInsertarCD () {
        include 'gui/html/insertar_cd.php';
    }

    public function printBorrarCD () {
        include 'gui/html/borrar_cd.php';
    }

    public function printSaldo () {
        include 'gui/html/saldo.php';
    }

    public function printPagGeneros () {
        include 'gui/html/genero.php';
    }

    public function printPagCatalogo () {
        include 'gui/html/catalogo.php';
    }

    /**
     * imprime el código html de la página de bienvenida tras hacer log in
     */
    public function printPagBienvenida () {
        include 'gui/html/bienvenida.html';
    }

    public function printPagCompra () {
        include 'gui/html/compra.php';
    }

    public function printAddArtist () {
        include 'gui/html/addartist.php';
    }

    public function printAddSong() {
        include 'gui/html/insertar_cancion.php';
    }
}