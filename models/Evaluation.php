<?php

/**
 * ===================================
 * Cette classe gere la table collection
 * ===================================
 * @author Duval Nzouekeu <nzouekeuduval@gmail.com>
 * 
 */

namespace Core\models;

use Core\src\Model;

class Evaluation extends Model
{
  protected $id_article;
  protected $ip_user;
  protected $utile;
  protected $message;

  public function __construct()
  {
    $this->table = 'evaluation';
  }
  
  /**
   * Verifie si l'adresse Ip a deja evaluer
   *
   * @param  string $ip
   * @param  string $article
   * @return
   */
  public function verifieIp( string $ip, string $article )
  {
    return $this->request( "SELECT * FROM {$this->table} WHERE ip_user = \"{$ip}\" AND id_article = \"{$article}\"" )->fetch();
  }

  /**
   * getId_article
   *
   * @return string
   */
  public function getId_article(): string {
    return $this->id_article;
  }
  
  /**
   * setId_article
   *
   * @param  string $id_article
   * @return static
   */
  public function setId_article ( string $id_article ) {
    $this->id_article = $id_article;
    return $this;
  }
  
  /**
   * getIp_user
   *
   * @return string
   */
  public function getIp_user(): string {
    return $this->ip_user;
  }
  
  /**
   * setIp_user
   *
   * @param  string $ip_user
   * @return static
   */
  public function setIp_user ( string $ip_user ) {
    $this->ip_user = $ip_user;
    return $this;
  }
  
  /**
   * getutile
   *
   * @return int
   */
  public function getUtile(): int {
    return $this->utile;
  }
  
  /**
   * setutile
   *
   * @param  int $utile
   * @return static
   */
  public function setUtile ( int $utile ) {
    $this->utile = $utile;
    return $this;
  }
  
  /**
   * getMessage
   *
   * @return string
   */
  public function getMessage(): string {
    return $this->message;
  }
  
  /**
   * setMessage
   *
   * @param  string $message
   * @return static
   */
  public function setMessage ( string $message ) {
    $this->message = $message;
    return $this;
  }

}

