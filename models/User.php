<?php

/**
 * ===============================
 * Cette classe gere la table user
 * ===============================
 * @author Duval Nzouekeu <nzouekeuduval@gmail.com>
 * 
 */

namespace Core\models;
use Core\src\Model;

class User extends Model
{
  protected $id;
  protected $email;
  protected $password;
  protected $pseudo;
  protected $color;
  protected $theme;
  protected $date_creation;

  public function __construct()
  {
    $this->table = 'user';
  }

  public function findByEmail( string $email )
  {
    return $this->request( "SELECT * FROM {$this->table} WHERE email = ?", [ $email ] )->fetch();
  }

  public function changeTheme ( int $id, int $value ):void
  {
    $sql = "UPDATE {$this->table} SET theme = \"{$value}\" WHERE id = \"{$id}\" ";
    $this->request( $sql );
  }

  public function setSession()
  {
    $_SESSION[ 'user' ] = [
      'id' => $this->id,
      'email' => $this->email,
      'pseudo' => $this->pseudo,
      'color' => $this->color,
      'theme' => $this->theme
    ];
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
   * getEmail
   *
   * @return string
   */
  public function getEmail():string
  {
    return $this->email;
  }
  
  /**
   * setEmail
   *
   * @param  mixed $email
   * @return self
   */
  public function setEmail( string $email ):self
  {
    $this->email = $email;
    return $this;
  }
  
  /**
   * getPassword
   *
   * @return string
   */
  public function getPassword():string
  {
    return $this->password;
  }
  
  /**
   * setPassword
   *
   * @param  mixed $password
   * @return self
   */
  public function setPassword( string $password ):self
  {
    $this->password = $password;
    return $this;
  }
  
  /**
   * getPseudo
   *
   * @return string
   */
  public function getPseudo():string
  {
    return $this->pseudo;
  }
  
  /**
   * setPseudo
   *
   * @param  mixed $pseudo
   * @return self
   */
  public function setPseudo( string $pseudo ):self
  {
    $this->pseudo = $pseudo;
    return $this;
  }
  
  /**
   * getColor
   *
   * @return string
   */
  public function getColor():string
  {
    return $this->color;
  }
  
  /**
   * setColor
   *
   * @param  mixed $color
   * @return self
   */
  public function setColor( string $color ):self
  {
    $this->color = $color;
    return $this;
  }

  /**
   * getTheme
   *
   * @return string
   */
  public function getTheme():string
  {
    return $this->theme;
  }

  /**
   * setTheme
   *
   * @param  mixed $theme
   * @return self
   */
  public function setTheme( string $theme ):self
  {
    $this->theme = $theme;
    return $this;
  }
  
  /**
   * getDate_creation
   *
   * @return string
   */
  public function getDate_creation():string
  {
    return $this->date_creation;
  }
  
  /**
   * setDate_creation
   *
   * @param  mixed $date_creation
   * @return self
   */
  public function setDate_creation( string $date_creation ):self
  {
    $this->date_creation = $date_creation;
    return $this;
  }

}

