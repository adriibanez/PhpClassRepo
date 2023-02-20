<?php

namespace app\iberia\repo;

class RegistroRepo
{
    public function RegistrarUsuario(string $eCorreo, string $pwd, string $rol): bool
    {
        $sqlVerUsuarios = 'SELECT *
        FROM usuario
        WHERE eCorreo = :eCorreo';

        $sqlInsertarUsuario = 'INSERT INTO usuario (eCorreo,pwd,rol) VALUES (:eCorreo,:pwd,:rol)';

        require_once __DIR__ . './../../core/conexionBd.inc';
        $usuarios = [];
        try {
            $con = (new  \ConexionBd())->getConexion();
            $stn = $con->prepare($sqlVerUsuarios);
            $stn->bindValue(':eCorreo', $eCorreo);
            $stn->execute();
            $usuarios = $stn->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\PDOException $ex) {
            throw $ex;
        } finally {
            unset($stn);
            unset($con);
        }

        if (empty($usuarios)) {
            try {
                $con = (new  \ConexionBd())->getConexion();
                $stn = $con->prepare($sqlInsertarUsuario);
                $stn->bindValue(':eCorreo', $eCorreo);
                $stn->bindValue(':pwd', $pwd);
                $stn->bindValue(':rol', $rol);
                $stn->execute();
            } catch (\PDOException $ex) {
                throw $ex;
            } finally {
                unset($stn);
                unset($con);
            }
            return true;
        } else {
            return false;
        }
    }
}
