<?php
/**
 * Class CD
 * AUTHOR Javier Sanz Roa
 * Date 05/03/2020
 * Crea un CD con los datos que manda el administrador a la hora de subir los datos a la base de datos para poder
 * validar los datos previamente. Hereda de Data
 */

include 'classes/Data.php';

class CD extends Data
{
    protected $titulo;
    protected $fecha_lanz;
    protected $portada;
    protected $precio;
    protected $cod_artista;
    protected $cod_genero;

    public function __construct ($titulo, $fecha_lanz, $portada, $precio, $cod_artista, $cod_genero)
    {
        if (strlen($titulo)<=255) {
            $this->titulo=$titulo;
            $this->fecha_lanz=$fecha_lanz;
            $this->portada=$portada;
            $this->precio=$precio;
            $this->cod_artista=$cod_artista;
            $this->cod_genero=$cod_genero;
        }
    }

    /* getter y setter */

    public function setTitulo ($titulo) {
        if (strlen($titulo)<=255) {
            $this->titulo=$titulo;
        }
    }

    public function setNPortada ($portada) {
        $this->portada=$portada;
    }

    public function getTitulo () {
        return $this->titulo;
    }

    public function getFecha () {
        return $this->fecha_lanz;
    }

    public function getPortada () {
        return $this->portada;
    }

    public function getPrecio () {
        return $this->precio;
    }

    public function getCodArtista () {
        return $this->cod_artista;
    }

    public function getCodGenero () {
        return $this->cod_genero;
    }
}