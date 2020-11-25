<?php
/**
 * Class Data
 * AUTHOR Javier Sanz Roa
 * Date 05/03/2020
 * Clase que actúa como padre de clases que requieran de funciones idénticas
 */

class Data
{
    /**
     * @param $dato (dato que se desea limpiar de cara a guardarlo en la base de datos)
     * @return string (dato limpio de código html, espacios en blanco a los lados, etc)
     */
    public function limpiarDato ($dato) {
        $limpio=strip_tags(html_entity_decode(htmlspecialchars(trim(($dato)))));

        return $limpio;
    }
}