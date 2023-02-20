<?php

namespace app\iberia\repo;

class LoginRepo
{
    public function LoguearUsuario(string $eCorreo, string $pwd): mixed
    {
        $sqlComprobarUsuario = 'SELECT *
        FROM usuario
        WHERE eCorreo = :eCorreo';

        require_once __DIR__ . './../../core/conexionBd.inc';
        $usuario = [];
        try {
            $con = (new  \ConexionBd())->getConexion();
            $stn = $con->prepare($sqlComprobarUsuario);
            $stn->bindValue(':eCorreo', $eCorreo);

            $stn->execute();
            $usuario = $stn->fetchAll(\PDO::FETCH_ASSOC);
            if (empty($usuario)) {
                return false;
            } else {
                return $usuario;
            }
        } catch (\PDOException $ex) {
            throw $ex;
        } finally {
            unset($stn);
            unset($con);
        }
    }
}
