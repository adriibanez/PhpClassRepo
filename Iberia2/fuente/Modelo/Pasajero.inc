<?php

namespace app\iberia\modelo;

use DateTime;

class Pasajero
{
    private int $idPasajero;
    private string $nombre;
    private string $apellido;
    private string $dni;
    private \DateTime $fechaNac;


    public function setIdPasajero(int $idPasajero)
    {
    }
    public function setNombre(string $nombre): bool
    {
        $expReg = '/[A-ZÁÉÍÓÚÑ][a-záéíóúñ]+([A-ZÁÉÍÓÚÑ][a-záéíóúñ]+){0-3}$/';
        if (!preg_match($expReg, $nombre)) {
            return false;
        }
        $this->nombre = $nombre;
        return true;
    }
    public function setApellido(string $apellido): bool
    {
        $expReg = '/^[A-ZÁÉÍÓÚÑ][a-záéíóú]+(-[A-ZÁÉÍÓÚÑ][a-záéíóú]+)?(( [A-ZÁÉÍÓÚÑ][a-záéíóú]+(-[A-ZÁÉÍÓÚÑ][a-záéíóú]+)?){0,3}$/';
        if (!preg_match($expReg, $apellido)) {
            return false;
        }
        $this->apellido = $apellido;
        return true;
    }
    public function setDni(string $dni): bool
    {
        $expReg = '/^[0-9][8][A-Z]$/';
        if (!preg_match($expReg, $dni)) {
            return false;
        }
        $this->dni = $dni;
        return true;
    }
    public function setFechaNac(string $fechaNac): bool
    {
        if (!$fecha = \DateTime::createFromFormat("Y-m-d", $fechaNac)) {
            return false;
        }
        if ($fecha >= date("now")) {
            return "Fecha de nacimiento no válida";
        }
        $this->fechaNac = $fecha;
    }
}
