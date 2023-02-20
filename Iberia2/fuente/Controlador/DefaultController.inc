<?php
namespace app\iberia\controlador;

use app\iberia\repositorio\VuelosRepositorio;

// Ejemplo de controlador para página home de la aplicación
class DefaultController
{ 
  public function inicio()
  { 
    if(isset($_POST['ok'])){
      //require_once __DIR__.'/../Repositorio/VuelosRepositorio.inc';
      try {
        $vuelos = (new VuelosRepositorio())->
                      findVuelos((int)$_POST['adultos']+(int)$_POST['peques'],
                                $_POST['salida'], $_POST['destino'], 
                                $_POST['ida'], $_POST['vuelta']);
        if(!empty($vuelos)){
          $_SESSION['viaje']['origen']=$_POST['salida'];
          $_SESSION['viaje']['destino']=$_POST['destino'];
          $_SESSION['viaje']['ida']=$_POST['ida'];
          $_SESSION['viaje']['vuelta']=$_POST['vuelta'];         
          $_SESSION['viaje']['adultos']=(int)$_POST['adultos'];
          $_SESSION['viaje']['peques']=(int)$_POST['peques'];
        } else {
          $mensajeError='No hay vuelos desde esos orígenes o para esos destinos o no quedan plazas';
        }
        } catch (\PDOException $ex) {
          $mensajeError = $ex->getMessage();
      }
    }
    require __DIR__ . '/../../app/plantillas/inicio.php';
  }
}
