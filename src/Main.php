<?php

/**
 * ===============================
 * La class principale ( Routeur )
 * ===============================
 * @author Duval Tetsol <nzouekeuduval@gmail.com>
 * 
 */

namespace Core\src;

use Core\controllers\Article;
use Core\controllers\Error_found;
use Core\controllers\Main as MainController;

class Main
{
  public function start()
  {
    session_set_cookie_params( [
      'lifetime' => time() + 365 * 24 * 3600,
      'path' => '/',
      'domain' => 'technoghan.com',
      'secure' => FALSE,
      'httponly' => FALSE
    ]);
    // Demare la session
    session_start();
    
    // Recuperation de la langue du navigateur par son sous domaine
    $sous_domain = explode( '.', $_SERVER[ 'HTTP_HOST' ] )[0];
    $_SESSION[ 'language' ] = $sous_domain !== "technoghan" ? $sous_domain : 'fr';
    // J'appele le fichier concernant la langue
    require_once ROOT . "lib/lang/lang_{$_SESSION[ 'language' ]}.php";

    // Gere le theme du site
    $this::theme();

    // Pour supprimer le slash( / ) a la fin de l'url
    $uri = $_SERVER[ 'REQUEST_URI' ];
    if ( !empty( $uri ) AND $uri !== '/' AND $uri[ -1 ] === "/"  ) {
      http_response_code( 301 );
      header( 'location: ' . substr( $uri, 0, -1 ) );exit;
    }

    // On separe les parametres de l'url
    $params = explode( '/', htmlspecialchars( $_GET[ 'path' ] ) );

    // Est-ce que le parmetre existe
    if ( $params[ 0 ] !== '' ) {
      $controller = ucfirst( htmlspecialchars( array_shift(  $params ) ) );

      // Verifie si le controlleur est egal a une tradution de category
      if ( $controller == CATEGORY ) {
        // si oui j'appele le controller category
        $controller = "\\Core\\controllers\\Category";
        $controller = new $controller();
        // Je passe les parametres et j'arrete le code
        call_user_func_array( [ $controller , 'index' ], $params ); exit;
      }

      // Intialise l'action ( Methode )
      $action = isset( $params[ 0 ] ) ? strtolower( htmlspecialchars( array_shift( $params ) ) ) : "index";

      // Contient le chemin du controller
      $file = ROOT . 'controllers' . DIRECTORY_SEPARATOR . $controller . '.php';

      // Verifie si le controller existe et le controlleur != de article
      if ( file_exists( $file ) && $controller !== 'Category' ) {  
        $controller = "\\Core\\controllers\\{$controller}";

        // intanciation du controller
        $controller = new $controller();

        // Verifie si l'action existe
        if ( method_exists( $controller, $action ) ) {
          isset( $params[ 0 ] ) ? call_user_func_array( [ $controller, $action ], $params ) : $controller->$action();
        } else {
          http_response_code( 404 );
          Error_found::error( 404 );
        }
        
      } else {
        // Sinon on verifie si il contient les tirets pour directement appeler l'articles
        if ( strpos( $controller, '_' ) ) {
          $articleController = new Article();
          $articleController->index( $controller );
        } else {
          http_response_code( 404 );
          Error_found::error( 404 );
        }
      }
    } else {
      //si on a pas de parametre j'appele la page d'acceuil
      $main = new MainController;
      $main->index();
    } 
  }

  /**
   * Gere le theme du site
   *
   * @return void
   */
  public static function theme():void
  {
    // L'orsque la requete pour changer de theme est soumisse
    if ( isset( $_POST[ 'theme' ] ) ) {
      $options = [ 
        'expire' => time() + 365 * 24 * 3600,
        'path' => '/',
        'domain' => 'technoghan.com',
        'secure' => FALSE,
        'httponly' => FALSE, // Bloquer Accessibilite par JS
        'samesite' => 'Strict'
      ];
      setcookie( 'theme', $_POST[ 'theme' ], $options );
    }

    // Verifie si la session utilisateur est demarer
    if ( isset( $_SESSION[ 'user' ] ) ) 
      $_SESSION[ 'user' ][ 'theme' ] == 1 ? $_SESSION[ 'theme' ] = 'theme-dark' : $_SESSION[ 'theme' ] = 'theme-light';
    // Verifie si le cookie theme existe
    else if ( isset( $_COOKIE[ 'theme' ] ) )
      $_SESSION[ 'theme' ] = htmlspecialchars( $_COOKIE[ 'theme' ] );
  }
}

