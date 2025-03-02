<?php

/**
 * =================================================
 * Cette classe gere la connexion a l'administration
 * =================================================
 * @author Duval Nzouekeu <nzouekeuduval@gmail.com>
 * 
 */

namespace Core\models;

use Core\src\Model;

class Admin extends Model
{  
  /**
   * id
   *
   * @var string
   */
  private $id = '93596171';  
  
  /**
   * password
   *
   * @var string
   */
  private $password = '$2y$14$zB3rlL/F./mDT/4nVSgG1u16i0oJYrSjKlUSvu4IDNNNQ/GUjKO6K';
  
  /**
   * Permet de recuperer l'id
   *
   * @return string
   */
  public function getId()
  {
    return $this->id;
  }

  /**
   * Permet de recuperer le password
   *
   * @return string
   */
  public function getPassword()
  {
    return $this->password;
  }

  /**
   * setSession
   *
   * @return void
   */
  public function setSession()
  {
    $_SESSION[ 'admin' ] = [
      'id' => $this->id
    ];
  }

}

