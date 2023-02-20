<?php

namespace app\iberia\repositorio;

class ReservaRepositorio
{
    public function findVuelos(int $numPasj, string $origen, string $destino, string $ida, string $vuelta = null): array
    {
        $sql = 'SELECT v.codigo as Codigo, origen as Origen, destino as Destino, salida as Salida, duracion as Duracion, fecha as "Fecha ida" 
        from vuelo as v inner join vuelos as vs on v.codigo  = vs.codigo
        where origen = :origen and destino = :destino and fecha = :ida and libres > 0 and libres > :pasj';

        if (!is_null($vuelta)) {
            $sql2 = 'SELECT v.codigo as Codigo, origen as Origen, destino as Destino, salida as Salida, duracion as Duracion, fecha as "Fecha vuelta"
            from vuelo as v inner join vuelos as vs on v.codigo = vs.codigo
            where origen = :destino and destino = :origen and fecha = :vuelta and libres > 0 and libres > :pasj';
        }
        require_once __DIR__ . '/../../core/conexionBd.inc';
        $vuelos = [];

        try {
            $con = (new \ConexionBd())->getConexion();
            $stn = $con->prepare($sql);
            $stn->bindValue(':origen', $origen);
            $stn->bindValue(':destino', $destino);
            $stn->bindValue(':ida', $ida);
            $stn->bindValue(':pasj', $numPasj, \pdo::PARAM_INT);
            $stn->execute();

            $filas = $stn->fetchAll(\PDO::FETCH_ASSOC);
            if (empty($filas)) {
                return [];
            }
            $vuelos['ida'] = $filas;
            if (!is_null($vuelta)) {
                $stn = $con->prepare($sql2);
                $stn->bindValue(':origen', $origen);
                $stn->bindValue(':destino', $destino);
                $stn->bindValue(':vuelta', $vuelta);
                $stn->bindValue(':pasj', $numPasj, \pdo::PARAM_INT);
                $stn->execute();
                $filas = $stn->fetchAll(\PDO::FETCH_ASSOC);
                if (empty($filas)) {
                    return [];
                }
                $vuelos['vuelta'] = $filas;
            }
            var_dump($vuelos);
            return $vuelos;
        } catch (\PDOException $ex) {
            throw $ex;
        } finally {
            unset($stn);
            unset($con);
        }
    }
}
