<?php

namespace app\iberia\controlador;

use app\iberia\repositorio\VuelosRepositorio;

class ReservaController
{
  public function inicioReserva()
  {
    var_dump($_SESSION);
    var_dump($_POST);
    if (isset($_POST['ConfVuelos'])) {
      $codIda = key($_POST['vueloIda']);
      $_SESSION['viaje']['avionIda'] = $codIda;
      $horaIda = key($_POST['vueloIda'][$codIda]);
      $_SESSION['viaje']['horaIda'] = $horaIda;
      $numPasaj = (int)$_SESSION['viaje']['adultos'] + (int)$_SESSION['viaje']['peques'];
      try {
        if (!(new VuelosRepositorio)->reservaPlazas($numPasaj, $codIda, $_SESSION['viaje']['ida'])) {
          var_dump($mensajerError = 'No ha sido posible realizar la reserva');
        }
        if (isset($_POST['vueloVuelta'])) {
          $codVuelta = key($_POST['vueloVuelta']);
          $horaVuelta = key($_POST['vueloVuelta'][$codVuelta]);
          try {
            if (!(new VuelosRepositorio)->reservaPlazas($numPasaj, $codVuelta, $_SESSION['viaje']['vuelta'])) {
              $mensajerError = 'No ha sido posible realizar la reserva';
            }
          } catch (\PDOException $ex) {
            $mensajerError = $ex->getMessage();
          }
        }
      } catch (\PDOException $ex) {
        var_dump($mensajerError = $ex->getMessage());
      }

      if (!isset($mensajerError)) {
        if ($_SESSION['usuario'] === 'anonimo') {
          header('location: index.php?ctl=iniSes');
        } else {
          //
        }
      }
    }
  }
}
