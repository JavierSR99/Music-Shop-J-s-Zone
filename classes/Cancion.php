<?php
/**
 * Class Cancion
 * AUTHOR Javier Sanz Roa
 * Date 05/03/2020
 * Crea una cancion con los datos que manda el administrador a la hora de subir los datos a la base de datos para poder
 * validar los datos previamente. Hereda de Data
 */

class Cancion extends Data
{
    protected $nombre;
    protected $numero;
    protected $cd;

    public function __construct(string $nombre, int $numero, int $cd)
    {
        if (strlen($nombre)<=255) {
            $this->nombre=$nombre;
            $this->numero=$numero;
            $this->cd=$cd;
        }
    }

    public function getNombre () {
        return $this->nombre;
    }

    public function getNumero () {
        return $this->numero;
    }

    public function getCD () {
        return $this->cd;
    }

    public function setNombre (string $nombre) {
        if (strlen($nombre)<=255) {
            $this->nombre=$nombre;
        }
    }

    public function limpiarCancion ($nombre) {
        $nombreV=$this->limpiarDato($nombre);
        $this->setNombre($nombreV);
    }
}