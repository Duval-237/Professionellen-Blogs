<?php

/**
 * ===================================
 * Cette classe gere la table Language
 * ===================================
 * @author Duval Nzouekeu <nzouekeuduval@gmail.com>
 * 
**/

namespace Core\models;
use Core\src\Model;

class Language extends Model
{
  protected $id;
  protected $img;
  protected $code;
  protected $name;

  public function __construct()
  {
    $this->table = 'language';
  }
  
  /**
   * getId
   *
   * @return int
   */
  public function getId():int
  {
    return $this->id;
  }
  
  /**
   * setId
   *
   * @param  mixed $id
   * @return self
   */
  public function setId( int $id ):self
  {
    $this->id = $id;
    return $this;
  }
  
  /**
   * getCode
   *
   * @return string
   */
  public function getCode():string
  {
    return $this->code;
  }
  
  /**
   * setCode
   *
   * @param  mixed $code
   * @return self
   */
  public function setCode( string $code ):self
  {
    $this->code = $code;
    return $this;
  }
  
  /**
   * getImg
   *
   * @return string
   */
  public function getImg():string
  {
    return $this->img;
  }
  
  /**
   * setImg
   *
   * @param  string $img
   * @return self
   */
  public function setImg( string $img ):self
  {
    $this->img = $img;
    return $this;
  }
  
  /**
   * getName
   *
   * @return string
   */
  public function getName():string
  {
    return $this->name;
  }
  
  /**
   * setName
   *
   * @param  mixed $name
   * @return self
   */
  public function setName( string $name ):self
  {
    $this->name = $name;
    return $this;
  }

}

