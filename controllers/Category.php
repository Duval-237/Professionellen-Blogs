<?php

/**
 * ===========================================
 * Cette classe gere l'affichage des categoies
 * ===========================================
 * @author Duval Tetsol <nzouekeuduval@gmail.com>
 * 
 */

namespace Core\controllers;

use Core\models\Article;
use Core\src\controller;
use Core\models\Category as CategoryModels;
use Core\models\Tags;

class Category extends Controller 
{
  public function index( string $category = null, string $tags =  null )
  { 
    // Remplace le tiret de l'url par un espace
    $category = str_replace( '-', ' ', htmlspecialchars( $category ) );
    
    #=============================================================#
    # Page pour afficher les articles d'une category et d'un tags #
    if ( $category ) {
      $CategoryModels = new CategoryModels;
      // Je recupere l'id de la categorie
      $id_category = $CategoryModels->findId( $category );

      // Verifie si la category existe
      if ( $id_category ) {
        $id_category = $id_category->id_category;

        $ArticlesModels = new Article();
        // Je recupere les articles part leur categorie
        $articles = $ArticlesModels->findByCategory( $id_category );

        // Recupere un articles par son id
        $categorie = $CategoryModels->findById( $id_category );

        $TagsModels = new Tags();
        // Recupere les tags d'une categorie
        $tagsCategoy = $TagsModels->findTagsByCategory( $id_category );

        // Verifie si un tags un selection
        if ( $tags ) {
          // Remplace le tiret de l'url par un espace
          $tags = str_replace( '-', ' ', htmlspecialchars( $tags ) );

          // Je recupere l'id du tags
          $id_tags = $TagsModels->findId( $tags )->id_tags;
  
          // Recupere tous les articles d'un tags d'une category
          $articles = $ArticlesModels->findByTags( $id_category, $id_tags );
        }

        // Si on clique sur un tags
        if ( isset( $_POST[ 'tags' ] ) ) {
          // Remplace le tiret de l'url par un espace
          $tags = str_replace( '-', ' ', htmlspecialchars( $_POST[ 'tags' ] ) );

          // Je recupere l'id de la categorie
          if ( $id_tags = $TagsModels->findId( $tags ) ) {
            $id_tags = $id_tags->id_tags;

            // Si le contient une valeur
            $tags !== "" ?
            // Recupere tous les articles d'une tags d'un tags
            $articles = $ArticlesModels->findByTags( $id_category, $id_tags ):
            '';
          }
          // J'affiche les articles recupere
          echo json_encode( $articles ); exit;
        }

        $this->render( 'category', [ 'articles' => $articles, 'tags' => $tagsCategoy, 'tag' => $tags, 'categorie' => $categorie ] );
      }

      // Sinon j'affiche not found
      else {
        http_response_code( 404 );
        Error_found::error( 404 );
      }
    }

    #===================================#
    # Page pour afficher les categories #
    else {
      $categoryModels = new CategoryModels();
      $categories = $categoryModels->findAllCategory();
  
      $ArticlesModels = new Article();
      $articles = $ArticlesModels->findRecentPost( 0, 12 );
  
      $this->render( 'index', [ 'categories' => $categories, 'articles' => $articles ] );
    }
  }

}

