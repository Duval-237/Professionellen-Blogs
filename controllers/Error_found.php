<?php

/**
 * ==============================
 * Cette classe  gere les erreurs
 * ==============================
 * @author Duval Tetsol <nzouekeuduval@gmail.com>
 * 
 */

namespace Core\controllers;

class Error_found
{

  /**
   * affiche l'erreur en fonction de son code
   * 
   * @param  int $error code de l'erreur
   * @return void
   */
  public static function error( int $error )
  {
    ob_start();

    $file = ROOT . 'views/layouts/error/' . $error . '.php';
    
    if ( file_exists( $file ) ) 
      require_once ROOT . 'views/layouts/error/' . $error . '.php';
    else
      require_once ROOT . 'views/layouts/error/' . 404 . '.php';
    
    $content = ob_get_clean();
    
    require_once ROOT . "views/templates/default.php";
  } 

}

