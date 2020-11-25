<?php
/**
 * Class Artista
 * AUTHOR Javier Sanz Roa
 * Date 05/03/2020
 * Crea un artista con los datos requeridos para la base de datos
 */

class Artista extends Data
{
    protected $nombre;
    protected $descripcion;

    public function __construct(string $nombre, string $descripcion)
    {
        if (strlen($nombre)<=255 && strlen($descripcion)<=255) {
            $this->nombre=$nombre;
            $this->descripcion=$descripcion;
        }
    }

    /* getter y setter */

    public function getNombre () {
        return $this->nombre;
    }

    public function setNombre (string $nombre) {
        if (strlen($nombre<=255)) {
            $this->nombre=$nombre;
        }
    }

    public function getDescripcion () {
        return $this->descripcion;
    }

    public function setDescripcion (string $descripcion) {
        if (strlen($descripcion<=255)) {
            $this->descripcion=$descripcion;
        }
    }

    public function validacionArtista () {
        $nombreV=$this->limpiarDato($this->nombre);
        $descV=$this->limpiarDato($this->descripcion);

        $this->setNombre($nombreV);
        $this->setDescripcion($descV);
    }
}