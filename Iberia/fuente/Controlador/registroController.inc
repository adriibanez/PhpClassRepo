<?php

namespace app\iberia\controlador;

use app\iberia\repo\RegistroRepo;

// Ejemplo de controlador para página home de la aplicación
class RegistroController
{
  public function RegistrarUsuario()
  {
    if (isset($_POST['registrar'])) {
      require_once __DIR__ . '/../Repositorio/registroRepo.inc';
      $passHash = password_hash($_POST['pass'], PASSWORD_DEFAULT);
      $registrarOk = (new RegistroRepo())->RegistrarUsuario($_POST['correo'], $passHash, $_POST['rol']);
    }
    require __DIR__ . '/../../app/plantillas/registro.php';
  }
}
