<?php

/**
 * =================================================
 * Cette class est le coeur de tous les controlleurs
 * =================================================
 * @author Duval Tetsol <nzouekeuduval@gmail.com>
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
  public function timeOut( string &$date )
  {
    $timesstampPost =  strtotime( $date );
    $timesstampActuel = time();
    $diff = $timesstampActuel - $timesstampPost;
  
    if ( $diff < 60 ) {
      $date = "$diff secondes";
    } else if ( $diff < 3600 ) {
      $date = floor( $diff / 60 ) . " minutes";
    } else if ( $diff < 86400 ) {
      $date = floor( $diff / 3600 ) . " heures";
    } else if ( $diff < 2592000 ) {
      $date = floor( $diff / 86400 ) . " jour";
    } else if ( $diff < 31536000 ) {
      $date = floor( $diff / 2592000 ) . " mois";
    } else {
      $date = floor( $diff / 31536000 ) . " ans";
    }
  }

  /**
   * Retourne le mois grace a son numero
   *
   * @param  int $month
   * @param  string $lang la langue dans laquelle on veut recuperer
   * @return string
   */
  public function getMonth( int $month, string $lang = null ):string
  {
    $lang ??= $_SESSION[ 'language' ];

    $tab_month = [ 
      'fr' => [ 'janvier', 'fevrier', 'mars', 'avril', 'mai', 'juin', 'juillet', 'aout', 'septembre', 'octobre', 'novembre', 'decembre' ], 
      'en' => [ 'january', 'february', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'december' ], 
      'de' => [ 'januar', 'februar', 'mars', 'april', 'mai', 'juni', 'july', 'august', 'september', 'october', 'november', 'december' ], 
      'es' => [ 'janvier', 'fevrier', 'mars', 'avril', 'mai', 'juin', 'juillet', 'aout', 'septembre', 'octobre', 'novembre', 'decembre' ], 
      'zh' => [],
    ];
    
    // Si la langue n'existe pas je renvoie le francais
    if ( !$tab_month[ $lang ] )
      return $tab_month[ 'fr' ][ $month - 1 ];
    
    return $tab_month[ $lang ][ $month - 1 ];
  }
  
}

