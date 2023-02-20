<?php

namespace app\iberia\controlador;

use app\iberia\repo\LoginRepo;

// Ejemplo de controlador para página home de la aplicación
class LoginController
{
    public function LoguearUsuario()
    {
        if (isset($_POST['login'])) {
            require_once __DIR__ . '/../Repositorio/LoginRepo.inc';
            // $passHash = password_hash($_POST['pass'], PASSWORD_DEFAULT);
            $usuario = (new LoginRepo())->LoguearUsuario($_POST['correo'], $_POST['pass']);
        }
        require __DIR__ . '/../../app/plantillas/login.php';
    }
}
