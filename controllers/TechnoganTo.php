<?php

/**
 * ===========================================================
 * Cette classe permet d'afficher les resultat le la recherche
 * ===========================================================
 * @author Duval Tetsol <nzouekeuduval@gmail.com>
 * 
 */

namespace Core\controllers;

use Core\models\Article;
use Core\src\Controller;
use Core\src\Form;

class TechnoganTo extends Controller 
{
  public function index() 
  {
    if ( Form::validate( $_GET, [ 'search' ] ) ) {
      $search = htmlspecialchars( $_GET[ 'search' ] );

      $worts = explode( ' ', $search );
      foreach ( $worts as $key => $wort ) {
        // Si une valeurs est vide je la supprimer
        if ( $wort == "" ) {
          // Pour suppprimer ne valeur il faut qu'elle contient une valeur
          $worts[$key] = 'asdf';
          unset( $worts[$key] );
        }
      }  
      $ArticleModels = new Article();

      // Recherche les articles par sa chaine de caractere
      $articles = $ArticleModels->findByTitle( $worts, 'ASC', $search );
      
      // Si la premiere recherche n'a rien trouver j'appelle la deuxieme
      if ( !$articles ) {
        // Recherche les articles mot par mot
        $articles = $ArticleModels->findByTitle( $worts, 'INSTR' );
        if ( !$articles ) 
          $articles = $ArticleModels->findByTitle( $worts, 'INSTR', ' ' );

      }

      foreach ( $articles as $article ) {
        $this->timeOut( $article->date_update );
        $this->convertView( $article->views );
      }

      $this->render( 'index', [ 'search' => $search, 'articles' => $articles ] );
    }

    // Le POST envoiyer par ajax
    else if ( isset( $_POST[ 'search' ] ) ) {
      $search =  htmlspecialchars( $_POST[ 'search' ] );

      $worts = explode( ' ', $search );
      foreach ( $worts as $key => $wort ) {
        // Si une valeurs est vide je la supprimer
        if ( $wort == "" ) {
          // Pour suppprimer ne valeur il faut qu'elle contient une valeur
          $worts[$key] = 'asdf';
          unset( $worts[$key] );
        }
      }
      $ArticleModels = new Article();
      $articles = $ArticleModels->findByTitle( $worts, "INSTR", $search );
      echo json_encode( $articles );
    }

    else {
      Error_found::error(404);
      http_response_code(404);
    }
  }

}

