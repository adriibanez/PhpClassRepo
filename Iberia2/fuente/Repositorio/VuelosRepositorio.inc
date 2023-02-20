<?php

namespace app\iberia\repositorio;

use DateTime;

class VuelosRepositorio
{
  public function findVuelos(int $numPasj,string $origen, string $destino, string $ida, string $vuelta = null): array
  {
    $sql1 = 'SELECT v.codigo as Código, origen as Origen, destino as Destino, 
                    salida as Salida, duracion as Duración, fecha as "Fecha ida"
            FROM vuelo AS v
                INNER JOIN vuelos AS vs ON v.codigo = vs.codigo
           WHERE origen = :origen
             AND destino = :destino
             AND fecha = :ida
             AND libres > :pasj';
    if (!is_null($vuelta)) {
      $sql2 = 'SELECT v.codigo as Código, origen as Origen, destino as Destino, 
                      salida as Salida, duracion as Duración, fecha as "Fecha vuelta"
              FROM vuelo AS v
                  INNER JOIN vuelos AS vs ON v.codigo = vs.codigo
            WHERE origen = :destino
              AND destino = :origen
              AND fecha = :vuelta
              AND libres > :pasj';
    }
    require_once __DIR__ . '/../../core/conexionBd.inc';
    $vuelos = [];
    try {
      $con = (new \ConexionBd())->getConexion();
      $snt = $con->prepare($sql1);
      $snt->bindValue(':origen', $origen);
      $snt->bindValue(':destino', $destino);
      $snt->bindValue(':ida', $ida);
      $snt->bindValue(':pasj', $numPasj);
      $snt->execute();
      $filas = $snt->fetchAll(\PDO::FETCH_ASSOC);
      if(empty($filas)){
        return [];
      }
      $vuelos['ida'] =  $filas;
      if (!is_null($vuelta)) {
        $snt = $con->prepare($sql2);
        $snt->bindValue(':origen', $origen);
        $snt->bindValue(':destino', $destino);
        $snt->bindValue(':vuelta', $vuelta);
        $snt->bindValue(':pasj', $numPasj);
        $snt->execute();
        $filas = $snt->fetchAll(\PDO::FETCH_ASSOC);
        if(empty($filas)){
          return [];
        }
        $vuelos['vuelta'] = $filas;
  
      }
      return $vuelos;
    } catch (\PDOException $ex) {
      throw $ex;
    } finally {
      unset($snt);
      unset($con);
    }
  }
  public function reservaPlazas(int $numPasj, string $codigo, string $fecha):bool
  {
    $sql='UPDATE vuelos
             SET libres = libres - :pasajeros
           WHERE codigo = :codigo
             AND fecha = :fecha
             AND libres >= :pasaj';
    require_once __DIR__ . '/../../core/conexionBd.inc';
    try {
      $con = (new \ConexionBd())->getConexion();
      $snt = $con->prepare($sql);
      $snt->bindValue(':pasajeros', $numPasj);
      $snt->bindValue(':codigo', $codigo);
      $snt->bindValue(':fecha', $fecha);
      $snt->bindValue(':pasaj', $numPasj);
      return $snt->execute();
    } catch (\PDOException $ex) {
      throw $ex;
    } finally {
      unset($snt);
      unset($con);
    }
  }
}
