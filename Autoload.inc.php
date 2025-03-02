<?php

/**
 * ==================================================================
 * Cette classe require_once automatique la class dont ont n'a besoin
 * ==================================================================
 * @author Duval Nzouekeu < nzouekeuduval@gmail.com >
 * 
 */

namespace Core;

// si l'utilisateur essaie d'acceder a cet page
if ( !isset( $_GET[ 'path' ] ) ) {
  header( 'location: /' );
  exit();
}

class Autoload
{
  /**
   * Register
   * 
   * Cette Methode dectecte automatique une instanciation 
   * et la place en parametre pour la fonction declare
   *
   * @return void
   */
  public static function register():void
  {
    spl_autoload_register( [
      __CLASS__,
      'load'
    ] );
  }
  
  /**
   * Load
   * 
   * @param string $class Recupere la totalite du namespace de la classe concernee
   * @return void
   */
  public static function load ( string $class ):void
  {
    // Retire le nom du namespace
    $class = str_replace( __NAMESPACE__ . '\\', '', $class );
    $file =  ROOT . $class . '.php';
    $file = str_replace( '\\', '/', $file );
    
    // Verifie si le fichier existe avant de l'inclure
    if ( file_exists( $file ) )
      require_once $file;
  }
}

