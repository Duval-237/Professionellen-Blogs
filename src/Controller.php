<?php

/**
 * =================================================
 * Cette class est le coeur de tous les controlleurs
 * =================================================
 * @author Duval Nzouekeu <nzouekeuduval@gmail.com>
 * 
 */

namespace Core\src;

abstract class Controller
{
  
  /**
   * Cette permet d'appeler automatique la vue du controlleur appropriee
   * 
   * @param string $file nom du fichier charger de la vue
   * @param array $data contient les donnees de la db
   * @param string $template choisi le template a afficher
   * @return void
   */
  public function render ( string $file, array $data = [], string $template = 'default' ):void 
  {
    extract( $data );    
    
    ob_start();
    
    // Recupere le nom de la class appelee dans le namespace
    $class = get_class( $this );
    $class = explode( '\\', $class );
    $class = $class[ count( $class ) - 1 ];
    
    require_once ROOT . 'views/layouts/' . strtolower( $class ) . '/' . $file . '.php';
    
    $content = ob_get_clean();
    
    require_once ROOT . "views/templates/{$template}.php";

  }
    
  /**
   * Convertir un nombre de vue au format 1000 => 1k
   *
   * @param  int $view_article le nbre de vue a modifie
   * @return void
   */
  public function convertView( int &$view_article ):void
  {
    // $view_article = (int) ( $view_article * 900 / 19 );

    // Si le nbre de vue est supperieur a 1 million
    if ( $view_article > 999999) {
      $decimal = substr( $view_article, -6 );
      $view_article = substr( $view_article, 0, -6 );
      $view = (float) "$view_article.$decimal";
      $view_article = number_format( $view, 2, ',', ' ' ); 
      $view_article .= "M";
    }
    // Ou a 1000
    else if ( $view_article > 999 ) {
      $decimal = substr( $view_article, -3 );
      $view_article = substr( $view_article, 0, -3 );
      $view = (float) "$view_article.$decimal";
      if( $view_article < 100 )
        $view_article = number_format( $view, 2, ',', ' ' );
      $view_article .= "K"; 
    }
  }
  
  /**
   * Renvoie le nombre de temps ecoule depuis une date
   *
   * @param  string $date la date en question
   * @return void
   */
  public function timeOut( string &$date ): void
  {
    $timesstampPost =  strtotime( $date );
    $timesstampActuel = time();
    $diff = $timesstampActuel - $timesstampPost;
  
    if ( $diff < 3600 ) {
      $nbre = floor( $diff / 60 );
      $nbre < 1 ? $date = $nbre . ' ' . WORD_MINUTE : $nbre . ' ' . WORD_MINUTE_PL;
    } else if ( $diff < 86400 ) {
      $nbre = floor( $diff / 3600 );
      $nbre < 1 ? $date = $nbre . ' ' . WORD_HOUR : $nbre . ' ' . WORD_HOUR_PL;
    } else if ( $diff < 2592000 ) {
      $nbre = floor( $diff / 86400 );
      $nbre < 1 ? $date = $nbre . ' ' . WORD_DAY : $nbre . ' ' . WORD_DAY_PL;
    } else if ( $diff < 31536000 ) {
      $nbre = floor( $diff / 2592000 );
      $nbre < 1 ? $date = $nbre . ' ' . WORD_MONTH : $date = $nbre . ' ' . WORD_MONTH_PL;
    } else {
      $nbre = floor( $diff / 31536000 );
      $nbre < 1 ? $date = $nbre . ' ' . WORD_YEAR : $date = $nbre . ' ' . WORD_YEAR_PL;
    }
  }

  /**
   * Retourne le mois grace a son numero
   *
   * @param  int $month le chiffre qui designe le mois
   * @return string
   */
  public function getMonth( int $month ):string
  {
    $tab_month = [ WORD_JANUARY, WORD_FEBRUARY, WORD_MARCH, WORD_APRIL, WORD_MAY, WORD_JUNE, WORD_JULY, WORD_AUGUST, WORD_SEPTEMBER, WORD_OCTOBER, WORD_NOVEMBER, WORD_DEZEMBER ];

    return $tab_month[ $month - 1 ];
  }
  
}

