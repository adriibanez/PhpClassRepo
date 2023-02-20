<?php
// Ejemplo de controlador para página home de la aplicación

namespace app\iberia\controlador;

use app\iberia\repositorio\VuelosRepositorio;

class DefaultController
{
  public function inicio()
  {
    if (isset($_POST['ok'])) {

      try {
        require_once __DIR__ . '/../Repositorio/VuelosRepositorio.inc';
        $vuelos = (new VuelosRepositorio())->findVuelos((int)$_POST['adultos'] + (int)$_POST['peques'], $_POST['salida'], $_POST['destino'], $_POST['ida'], $_POST['vuelta']);
        if (!empty($vuelos)) {
          $_SESSION['viaje']['origen'] = (int)$_POST['salida'];
          $_SESSION['viaje']['destino'] = (int)$_POST['destino'];
          $_SESSION['viaje']['ida'] = (int)$_POST['ida'];
          $_SESSION['viaje']['vuelta'] = (int)$_POST['vuelta'];

          $_SESSION['viaje']['adultos'] = (int)$_POST['adultos'];
          $_SESSION['viaje']['peques'] = (int)$_POST['peques'];
        } else {
          $mensajeError = 'No hay vuelos displonibles';
        }
      } catch (\PDOException $th) {
        $error = $th->getMessage();
      }
    }

    require_once __DIR__ . '/../../app/plantillas/inicio.php';
  }
}
