<?php

namespace app\iberia\repo;

class ReservarRepo
{

    public function ComprobarAsiento(string $codigo, string $fecha): array
    {
        $sqlComprobarAsiento = 'SELECT *
        FROM vuelos
        WHERE codigo = :codigo 
        AND fecha = :fecha';

        require_once __DIR__ . './../../core/conexionBd.inc';
        $vueloSelec = [];
        try {
            $con = (new  \ConexionBd())->getConexion();
            $stn = $con->prepare($sqlComprobarAsiento);
            $stn->bindValue(':codigo', $codigo);
            $stn->bindValue(':fecha', $fecha);
            $stn->execute();
            $vueloSelec = $stn->fetchAll(\PDO::FETCH_ASSOC);

            return $vueloSelec;
        } catch (\PDOException $ex) {
            throw $ex;
        } finally {
            unset($stn);
            unset($con);
        }
    }


    public function Reservar(string $codigo, string $fecha, string $claveFila, string $valorFila): void
    {

        $sqlReservar = "UPDATE vuelos
        SET " . $claveFila . " = " . $valorFila . " WHERE codigo = :codigo AND fecha = :fecha";


        require_once __DIR__ . './../../core/conexionBd.inc';
        try {
            $con = (new  \ConexionBd())->getConexion();
            $stn = $con->prepare($sqlReservar);
            $stn->bindValue(':codigo', $codigo);
            $stn->bindValue(':fecha', $fecha);

            $stn->execute();
        } catch (\PDOException $ex) {
            throw $ex;
        } finally {
            unset($stn);
            unset($con);
        }
    }

    public function AñadirBilleteAPasajero(string $nombre, string $apellido, string $dni, string $idUsers, string $fNacimiento)
    {

        $sqlAñadirBillete = "INSERT INTO pasajero (nombre,apellido,dni,idUsers,fNacimiento) VALUES (:nombre,:apellido,:dni,:idUsers,:fNacimiento)";

        require_once __DIR__ . './../../core/conexionBd.inc';
        try {
            $con = (new  \ConexionBd())->getConexion();
            $stn = $con->prepare($sqlAñadirBillete);
            $stn->bindValue(':nombre', $nombre);
            $stn->bindValue(':apellido', $apellido);
            $stn->bindValue(':dni', $dni);
            $stn->bindValue(':idUsers', $idUsers);
            $stn->bindValue(':fNacimiento', $fNacimiento);

            $stn->execute();
        } catch (\PDOException $ex) {
            throw $ex;
        } finally {
            unset($stn);
            unset($con);
        }
    }
    public function AñadirViaje(string $idPasajero, string $codigo, string $fecha, string $asiento)
    {

        $sqlAñadirViaje = "INSERT INTO viaje (idPasajero,codigo,fecha,asiento) VALUES (:idPasajero,:codigo,:fecha,:asiento)";

        require_once __DIR__ . './../../core/conexionBd.inc';
        try {
            $con = (new  \ConexionBd())->getConexion();
            $stn = $con->prepare($sqlAñadirViaje);
            $stn->bindValue(':idPasajero', $idPasajero);
            $stn->bindValue(':codigo', $codigo);
            $stn->bindValue(':fecha', $fecha);
            $stn->bindValue(':asiento', $asiento);

            $stn->execute();
        } catch (\PDOException $ex) {
            throw $ex;
        } finally {
            unset($stn);
            unset($con);
        }
    }
}
