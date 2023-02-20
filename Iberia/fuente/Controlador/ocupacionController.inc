<?php

namespace app\iberia\controlador;

use app\iberia\repo\OcupacionRepo;

// Ejemplo de controlador para página home de la aplicación
class OcupacionController
{
  public function mostrarOcupacion()
  {

    if (isset($_POST['btnMostrarOcupacion'])) {
      require_once __DIR__ . '/../Repositorio/ocupacionRepo.inc';
      $ocupacion = (new OcupacionRepo())->mostarOcupacion($_POST['codigo'], $_POST['fecha']);
    }
    require_once __DIR__ . '/../Repositorio/ocupacionRepo.inc';

    $datosVuelos = (new OcupacionRepo())->obtenerDatosVuelos();
    require __DIR__ . '/../../app/plantillas/ocupacion.php';
  }
}
