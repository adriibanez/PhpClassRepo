<?php

namespace app\iberia\controlador;

use app\iberia\repo\VuelosRepo;

// Ejemplo de controlador para página home de la aplicación
class DefaultController
{
  public function inicio()
  {
    if (isset($_POST['ok'])) {
      require_once __DIR__ . '/../Repositorio/VuelosRepo.inc';
      $vuelos = (new VuelosRepo())->findVuelos($_POST['salida'], $_POST['destino'], $_POST['ida'], $_POST['vuelta']);
    }
    require __DIR__ . '/../../app/plantillas/inicio.php';
  }
}
