<?php
namespace app\iberia\modelo;
use app\iberia\modelo\AppException;
class Usuario
{
  private int $idUsuario;
  private string $eCorreo;
  private string $pwd;
  private string $rol = 'cliente';
  private array $roles=['cliente', 'admin', 'gestor', 'operador'];

  public function __construct(array $usuario)
  {
    if(!$this->setECorreo($usuario['eCorreo'])){
      $error['eCorreo']='eCorreo es obligatorio o tiene formato erróneo';
    }
    if(!$this->setPwd($usuario['pass'])){
      $error['pass']='Contraseña es obligatorio o no cumple las condiciones de formato';
    }
    if(isset($error)){
      throw new AppException($error);
    }
  }

  /***************************************** Mutadores ***********************************/
  /**
   * Undocumented function
   *
   * @param string $rol
   * @return void
   */
  public function setRol(string $rol):bool | string
  {
    if(!in_array($rol, $this->roles)){
      return 'Rol incorrecto';
    }
    if($rol !== 'cliente' && $_SESSION['usuario']!=='admin'){
      return 'Privilegios insuficientes';
    }
    $this->rol=$rol;
    return true;
  }
  /***************************************** Accesores ***********************************/
  public function getRol():string
  {
    return $this->rol;
  }
  /**
   * Undocumented function
   *
   * @return string
   */
  public function getPwd():string
  {
    return $this->pwd;
  }

  /**
   * Set the value of pwd
   *
   * @return  bool
   */ 
  public function setPwd(string $pass):bool
  {
    $expReg='/(?=.*[A-ZÑ])(?=.*[a-zñ])(?=.*[0-9])(?=.*[¡¿#€@?])[A-ZÑa-zñ0-9¡¿#€@?]{8,16}/';
    if(!preg_match($expReg, $pass)){
      return false;
    }
    $this->pwd = password_hash($pass, PASSWORD_DEFAULT);
    return true;
  }

  /**
   * Undocumented function
   *
   * @return string
   */
  public function getECorreo():string
  {
    return $this->eCorreo;
  }

  /**
   * Undocumented function
   *
   * @param string $eCorreo
   * @return boolean
   */
  public function setECorreo(string $eCorreo):bool
  {
    if(!filter_var($eCorreo, FILTER_VALIDATE_EMAIL)){
      return false;
    }
    $this->eCorreo = $eCorreo;

    return true;
  }

  /**
   * Get the value of idUsuario
   */ 
  public function getIdUsuario()
  {
    return $this->idUsuario;
  }

  /**
   * Undocumented function
   *
   * @param integer $idUsuario
   * @return boolean
   */
  public function setIdUsuario(int $idUsuario):bool
  {
    if($idUsuario <1){
      return false;
    }

    $this->idUsuario = $idUsuario;

    return true;
  }
}