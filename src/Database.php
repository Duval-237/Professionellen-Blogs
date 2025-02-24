<?php

/**
 * ==================================
 * Configuration de la base de donnee
 * ==================================
 * @author Duval Tetsol <nzouekeuduval@gmail.com>
 * 
 */

namespace Core\src;

use PDO;
use PDOException;

class Database extends PDO
{
  /**
   * Addresse du serveur
   * @var string
   */
  private const DB_HOST = "localhost";
  /**
   * Nom de la base de donnee
   * @var string
   */
  private const DB_NAME = "blogtutodata";
  /**
   * Nom d'utilisateur
   * @var string
   */
  private const DB_USER = "root";
  /**
   * Mot de passe
   * @var string
   */
  private const DB_PASSWORD = "";

  /**
   * Summary of _connexion
   * @var 
   */
  private static $_connexion;
 
  /**
   * Insertion des elements de connexion a PDO
   *
   * @return void
   */
  public function __construct()
  {
    $dsn = "mysql:host=" . self::DB_HOST . ";dbname=" . self::DB_NAME;

    try {
      parent::__construct( $dsn, self::DB_USER, self::DB_PASSWORD );
      
      $this->setAttribute( PDO::MYSQL_ATTR_INIT_COMMAND, 'set names utf8' );
      $this->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
      $this->setAttribute( PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ );

    } catch( PDOException $e ) {
      die ( $e->getMessage() );
    }
  }
  
  /**
   * Pour obtenir une intance de connexion a la base donnee
   * 
   * @return self
   */
  protected function getInstance():self
  {
    if ( self::$_connexion == null )
      self::$_connexion = new self();

    return self::$_connexion;
  }

}

