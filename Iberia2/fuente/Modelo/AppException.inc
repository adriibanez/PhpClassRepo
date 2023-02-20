<?php

namespace app\iberia\modelo;

use Exception;

class AppException extends Exception
{
    private array $error;

    public function __construct(array $error, string $mensajeError = null)
    {
        if (!is_null($mensajeError)) {
            parent::__construct($mensajeError);
        }
        //comprobar que el array no esta vacio
        $this->error = $error;
    }

    public function getError(): array
    {
        return $this->error;
    }
}
