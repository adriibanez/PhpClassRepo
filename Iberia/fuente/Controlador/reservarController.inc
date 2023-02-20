<?php

namespace app\iberia\controlador;

use app\iberia\repo\ReservarRepo;
use app\iberia\repo\OcupacionRepo;

// Ejemplo de controlador para página home de la aplicación
class ReservarController
{
    public function Reservar()
    {
        if (isset($_POST['btnReservarAsiento'])) {
            require_once __DIR__ . '/../Repositorio/reservarRepo.inc';
            $vueloSelec = (new ReservarRepo())->ComprobarAsiento($_POST['codigo'], $_POST['fecha']);
            // $reservaOk = (new ReservarRepo())->Reservar(/*$_POST['correo'], $passHash, $_POST['rol']*/);
        }

        require_once __DIR__ . '/../Repositorio/ocupacionRepo.inc';

        $datosVuelos = (new OcupacionRepo())->obtenerDatosVuelos();


        require __DIR__ . '/../../app/plantillas/reserva.php';
    }
}
