<?php
/**
 * Class User
 * AUTHOR Javier Sanz Roa
 * Date 05/03/2020
 * Crea un usuario con los datos que se envían del formulario de registro para validar y limpiar datos más fácilmente.
 * Hereda de la clase Data
 */

class User extends Data
{
    protected $nombre;
    protected $clave;
    protected $email;

    public function __construct(string $nombre, string $clave, string $email)
    {
        $this->nombre=$nombre;
        $this->clave=$clave;
        $this->email=$email;
    }

    public function getUser () {
        return $this->nombre;
    }

    public function getEmail () {
        return $this->email;
    }

    public function getClave () {
        return $this->clave;
    }

    public function setNombre (string $nombre) {
        $this->nombre=$nombre;
    }

    public function setEmail (string $email) {
        $this->email=$email;
    }

}