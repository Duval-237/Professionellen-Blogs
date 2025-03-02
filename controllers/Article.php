<?php

/**
 * ======================================================
 * Cette classe s'occupe de page d'affichage des articles
 * ======================================================
 * @author Duval Nzouekeu <nzouekeuduval@gmail.com>
 * 
 */

namespace Core\controllers;

use Core\models\Collection;
use Core\models\Evaluation;
use Core\src\Form;
use Core\src\Controller;
use Core\models\Tags;
use Core\models\Category;
use Core\models\Article as ArticleModels;

use Dompdf\Dompdf;
use Dompdf\Options;

class Article extends Controller
{
  /**
   * index
   *
   * @param  string $slug
   * @return void
   */
  public function index( string $slug = null ):void
  {
    $slug = htmlspecialchars( $slug );
    $articleModels = new ArticleModels();
    // Recupere le contenu de l'article grace a son slug
    $articles = $articleModels->findBySlug( $slug );

    // Si on a trouver l'article
    if ( $articles ) {
      $Category = new Category();
      $Tags = new Tags();

      // Recupere l'id de l'article, Category, tags
      $id_article = $articles->id;
      $id_category = $Category->findId( $articles->category )->id_category;
      $id_tags = $Tags->findId( $articles->tags )->id_tags;
      
      // Recupere le nombre de vue
      $view_article = $articleModels->getView( $id_article )->views;
      $view_category = $Category->getView( $id_category )->views;
      $view_tags = $Tags->getView( $id_tags )->views;
      
      // Si l'id, la category, le tags ont ete envoye
      if( Form::validate( $_POST, [ 'idArticle', 'categoryArticle', 'tagsArticle' ] ) ) {
        // Ajoute 1 vues dans la base de donnee
        $articleModels->addView( $id_article, $view_article + 1 );
        $Category->addView( $id_category, $view_category + 1 );
        $Tags->addView( $id_tags, $view_tags + 1 );
      }
      // Recupere toutes les traductions du slug de l'article
      $slugs = $articleModels->findSlugById( $id_article );

      $articles->name = "{$articles->first_name} {$articles->name}";
      $articles->jour = $articles->jour . ' ' . $this->getMonth( $articles->mois ) . ' ' . $articles->annee;
      $articles->view = $articles->views;
      $this->convertView( $articles->views );

      $orther_articles_category = $articleModels->findByCategory( $id_category, 4 );
      $orther_articles_category6 = $articleModels->findByCategory( $id_category, 12 );
      $random_articles = $articleModels->randomPost( 4 );

      // Collection
      $collection = new Collection();

      $collect = 0;
      if ( $collection->verifyCollection( $id_article, $_SESSION[ 'user' ][ 'id' ] ?? '' ) )
        $collect = 1;

      // Evaluation
      $evaluation = new Evaluation();
      $evaluations = $evaluation->verifieIp( $_SERVER[ 'REMOTE_ADDR' ], $id_article );
      $avis = $evaluations ? 1 : 0;
  
      $this->render( 'index', [ 'slugs' => $slugs, 'articles' => $articles, 'id' => $id_article, 'slugArticle' => $slug, 'otherArticles' => $orther_articles_category, 'otherArticles6' => $orther_articles_category6, 'randomArticles' => $random_articles, 'collection' => $collect, 'avis' => $avis ] );
    } else {
      Error_found::error( 404 );
    }

    // Pour ajouter et supprimer un article a la collection
    if ( isset( $_POST[ 'collect' ] ) AND isset( $_POST[ 'slug' ] ) AND isset( $_SESSION[ 'user' ] ) ) {
      $slug = htmlspecialchars( $_POST[ 'slug' ] );
      $collect = htmlspecialchars( $_POST[ 'collect' ] );
      
      $collection = new Collection();
      
      $collection ->setId_user( $_SESSION[ 'user' ][ 'id' ] )
                  ->setId_article( $articleModels->findIdSlug( $slug )->id );

      $collect == 'on' ? $collection->create() : $collection->deleteCollection();
    }

    
    /**
     * Pour ajouter un avis a la base de donnee
     *
     * @param  string $slug
     * @param  int $utile
     * @param  string $message
     * @return void
     */
    function addAvis( string $slug, int $utile, string $message ):void {
      $slug = htmlspecialchars( $slug );
      $utile = htmlspecialchars( $utile );
      $message = htmlspecialchars( $message );

      $articleModels = new ArticleModels();
      $evaluation = new Evaluation();
      $evaluation->setId_article( $articleModels->findIdSlug( $slug )->id )
                 ->setIp_user( $_SERVER[ 'REMOTE_ADDR' ] )
                 ->setUtile( $utile )
                 ->setMessage( $message);
      $evaluation->create();
    }

    // Pour donner son avis
    if ( isset( $_POST[ 'message-avis' ] ) AND isset( $_POST[ 'slug' ] ) ) 
      addAvis( $_POST[ 'slug' ], 1, $_POST[ 'message-avis' ] );
    else if ( isset( $_POST[ 'raison' ] ) AND isset( $_POST[ 'slug' ] ) )
      addAvis( $_POST[ 'slug' ], 0, $_POST[ 'raison' ] );
  }

  /**
   * Generation du PDF de l'article
   *
   * @param string $slug le slug de l'article
   * @return void
   */
  public function getPdf( string $slug = null ) 
  {
    $slug = htmlspecialchars( $slug );

    $articleModels = new ArticleModels();
    // Recupere le contenu de l'article grace a son slug
    $article = $articleModels->findBySlug( $slug );

    ob_start();
    require ROOT . 'lib/pdf-content.php';
    $html = ob_get_contents();
    ob_end_clean();

    // Si l'article existe je genere le pdf
    if ( $article ) {
      require ROOT . 'lib/dompdf/autoload.inc.php';
  
      $options = new Options();
      // $options->set( 'defaultFont', 'poppins' );
      $options->set( 'isRemoteEnabled', true ); // Autoriser les image distantes
      $options->set( 'isHtml5ParserEnabled', true ); // Active le parseur html5

      $dompdf = new Dompdf( $options );
      $dompdf->loadHtml( $html );
      $dompdf->setPaper( 'A5' );
      $dompdf->render();
      $dompdf->stream( "$article->title - Technogan" );
    }
    header( "location: /" );
  }
  
}

