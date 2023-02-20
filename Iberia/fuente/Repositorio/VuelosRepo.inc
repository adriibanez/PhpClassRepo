<?php

namespace app\iberia\repo;

class VuelosRepo
{
    public function findVuelos(string $origen, string $destino, string $ida, string $vuelta = null): array
    {
        $sql = 'SELECT v.codigo as Codigo, origen as Origen,destino as Destino ,salida as Salida ,duracion as Duracion, fecha as "Fecha ida"
        FROM vuelo as v
            INNER JOIN vuelos as vs on v.codigo = vs.codigo
        WHERE origen = :origen 
        AND destino = :destino
        AND fecha = :ida
        AND libres >0';

        if (!is_null($vuelta)) {
            $sql2 = 'SELECT v.codigo as Codigo, origen as Origen,destino as Destino ,salida as Salida ,duracion as Duracion, fecha as "Fecha vuelta"
        FROM vuelo as v
            INNER JOIN vuelos as vs on v.codigo = vs.codigo
        WHERE origen = :destino 
        AND destino = :origen
        AND fecha = :vuelta
        AND libres >0';
        }

        require_once __DIR__ . './../../core/conexionBd.inc';
        $vuelos = [];
        try {
            $con = (new  \ConexionBd())->getConexion();
            $stn = $con->prepare($sql);
            $stn->bindValue(':origen', $origen);
            $stn->bindValue(':destino', $destino);
            $stn->bindValue(':ida', $ida);
            $stn->execute();
            $vuelos['ida'] = $stn->fetchAll(\PDO::FETCH_ASSOC);

            if (!is_null($vuelta)) {
                $stn = $con->prepare($sql2);
                $stn->bindValue(':origen', $origen);
                $stn->bindValue(':destino', $destino);
                $stn->bindValue(':vuelta', $vuelta);
                $stn->execute();
                $vuelos['vuelta'] = $stn->fetchAll(\PDO::FETCH_ASSOC);
            }
            return $vuelos;
        } catch (\PDOException $ex) {
            throw $ex;
        } finally {
            unset($stn);
            unset($con);
        }
    }
}
