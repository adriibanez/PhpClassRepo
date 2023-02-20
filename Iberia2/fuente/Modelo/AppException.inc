<?php
namespace app\iberia\modelo;

use Exception;
/**
 * Gestiona los errores generales de la aplicación
 */
class AppException extends Exception
{
  /**
   * Array con los errores encontrados
   *
   * @var array
   */
  private array $error;
  /**
   * Inicializa la clase
   *
   * @param array $error Array con los errores detectados
   * @param string|null $mensajeError Mensaje que informa del error general
   */
  public function __construct(array $error, string $mensajeError=null)
  {
    if(!is_null($mensajeError)){
      parent::__construct($mensajeError);
    }
    $this->error=$error;
  }
  /**
   * Devuelve un array con los errores que provocaron la AppException
   *
   * @return array Array con los problemas detectados
   */
  public function getError():array
  {
    return $this->error;
  }
}