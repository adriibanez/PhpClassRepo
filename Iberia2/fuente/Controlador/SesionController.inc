<?php

namespace app\iberia\controlador;

use app\iberia\modelo\Pasajero;
use app\iberia\modelo\Usuario;
use app\iberia\modelo\AppException;


class SesionController
{
  public function login()
  {
    include __DIR__ . '../../../app/plantillas/inicioSesion.inc';
  }
  public function logout()
  {
  }
  public function agregaCliente()
  {
    if (isset($_POST['okReg'])) {
      try {
        $pasj = $_POST['pasj'];
        $objPasajero = new Pasajero($pasj);
      } catch (AppException $ex) {
        $mensajerErrorPasj = $ex->getMessage();
        $errores = $ex->getMessage();
      }
      $usu = $_POST['usu'];
      if ($usu['pass1'] !== $usu['pass2']) {
        $errorContrDif = 'Contraseña diferente';
      } else {
        try {
          $objUsuario = new Usuario(['eCorreo' => $usu['eCorreo'], 'pass' => $usu['pass1']]);
        } catch (AppException $ex) {
          $mensajerError = $ex->getMessage();
          $erroresUsu = $ex->getMessage();
        }
      }
    }
    include __DIR__ . '../../../app/plantillas/nuevoCliente.inc';
  }
}
