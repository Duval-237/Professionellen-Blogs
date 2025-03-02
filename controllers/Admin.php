<?php

/**
 * =============================================
 * Cette classe permet de gerer l'administration
 * =============================================
 * @author Duval Nzouekeu <nzouekeuduval@gmail.com>
 * 
 */

namespace Core\controllers;

use Core\src\Form;
use Core\src\Controller;
use Core\models\Language;
use Core\models\Admin as AdminModels;
use Core\models\Article;
use Core\models\Category;
use Core\models\Author;
use Core\models\Tags;

class Admin extends Controller
{
  /**
   * ================================================
   * Mehthode du login pour acceder a la partie Admin
   * ================================================
   * @return void
   */
  public function index():void
  {
    if ( isset( $_SESSION[ 'admin' ] ) ) {
      header( 'location: /admin/dashboard' ); exit;
    }

    if ( Form::validate( $_POST, [ 'id', 'password' ] )  ) {
      $admin = new AdminModels(); 

      if ( $_POST[ 'id' ] == $admin->getId() && password_verify( $_POST[ 'password' ], $admin->getPassword() ) ) {
        $admin->setSession();
        header( 'location: /admin/dashboard' ); exit;
      } else {
        $_SESSION[ 'error' ] = "ID oder Password incorrect";
        header( 'location: /admin' ); exit;
      }
    }
    $form = new Form;
    $form ->startForm( '/admin' )
          ->startDiv( [ 'class' => 'inputbx' ] )
            ->addInput( 'text', 'id', [ 'placeholder' => 'ID', 'autocomplete' => 'off', 'required' => true ] )
          ->endDiv()
          ->startDiv( [ 'class' => 'inputbx' ] )
            ->addInput( 'password', 'password', [ 'placeholder' => 'Password', 'autocomplete' => 'off','required' => true ] )
          ->endDiv()
          ->startDiv( [ 'class' => 'inputbx' ] )
            ->addInput( 'submit', '', [ 'value' => 'Send' ] )
          ->endDiv()
          ->endForm();

    $this->render( 'index', [ 'formulaire' => $form->create() ] , 'login' );
  }
    
  /**
   * ==================================
   * Page principale de la partie Admin
   * ==================================
   * @return void
   */
  public function dashboard()
  {
    if ( !isset( $_SESSION[ 'admin' ] ) ) {
      header( 'location: /' ); exit;
    }

    /**
     * nombre de visite site
     * nombre d'abonner du site
     * nombre d'article publier
     * nombre de commentaire
     * 
     * chart.js
     * nombre de visite par mois
     * nombre de visite par jour
     * source du trafic
     * 
     * utilisteurs
     */
    
    $this->render( 'dashboard/index', [], 'admin' );
  }

  /**
   * ===========================================
   * Cette methode s'occupe du CRUD des articles
   * =============================================
   * @param  string $page
   * @param  int $id
   * @param  string $lang
   * @return void
   */
  public function articles( string $page = null, string $id = null, string $lang = null )
  {
    if( !isset( $_SESSION[ 'admin' ] ) ) {
      header( 'location: /' ); exit;
    }
    
    // Supprimer tous les images temporelle dans le dossier articles
    $dir = "uploads/articles/\$temp";
    // Recupere tous les fichiers et sous dossier
    $files = scandir( $dir );
    foreach( $files as $file ) {
      // Securite pour eviter de supprimer de dossier parent ou courant
      if ( $file !== '.' && $file !== '..' ) {
        $chemin = "$dir/$file ";
        // Si c'est un fichier je supprime
        if ( is_file( $chemin ) ) {
          // chmod( $chemin, 0777 );
          // unlink( $chemin );
        } 
      }
    }

    #===============================================#
    # Page pour ajouter un article ou sa traduction #
    if ( $page === 'add' ) {

      // Si l'id existe ca veut dire que j'ajoute une traduction a l'article
      if ( $id ) {
        // Verifie si les champs sont valides
        if ( Form::validate( $_POST, [ 'lang', 'title', 'intro', 'description', 'slug', 'content' ] ) ) {
          // Si il n'a rien trouver j'enregistre
          if ( !$this->isFound( $_POST[ 'title' ], $_POST[ 'slug' ] ) ) {
            $artilcemodels = new Article();
            $artilcemodels->addLangPost(
              $id,
              $_POST[ 'lang' ],
              $_POST[ 'title' ],
              str_replace( ' ', '-', $_POST[ 'slug' ] ),
              $_POST[ 'description' ],
              str_replace( '"', '\"', $_POST[ 'intro' ] ), // J'echappe tous le guillemets
              str_replace( '"', '\"', $_POST[ 'content' ] )
            );
            header( "location: /admin/articles/view/{$id}" );
          }
        }
        $languageModels = new Language();
        $language = $languageModels->findAll();

        $this->render( 'articles/addlang', [ 'language' => $language, 'id' => $id ], 'admin' );
      } 

      // Sinon j'ajoute un articles
      else {
        // Verifie si les champs sont valides
        if ( Form::validate( $_POST, [ 'lang', 'title', 'intro', 'category', 'tags', 'description', 'slug', 'author', 'content' ] ) && isset( $_FILES[ 'miniature' ] ) && $_FILES[ 'miniature' ][ 'error' ] == 0 ) {
          // Si il n'a rien trouver j'enregistre
          if ( !$this->isFound( $_POST[ 'title' ], $_POST[ 'slug' ] ) ) {
            // Si l'image est valide je redimension et sauvergarde puis je recupere son nom
            if ( $this->editSaveImg( $_FILES[ 'miniature' ], 0, 0, '', '', false ) ) {
              // Creer un id unique pour l'article
              $id = md5( uniqid( 'technogan', true ) );
              // Creer un dossier pour l'article
              mkdir( "uploads/articles/{$id}" );
              // Recupere le nom de l'image
              $img = $this->editSaveImg( $_FILES[ 'miniature' ], 720, 480, $_POST[ 'slug' ], "uploads/articles/{$id}" );
              // j'utilise un regex qui remplace le nom du dossier temporelle de l'article par son id
              // $content = preg_replace( "#\<img src=\/?(.+)\/(.+)\/(.+)\/(.+)\>#i", "<img src=$1/$2/$id/$4>", $_POST[ 'content' ] );
              // Rem
              $content = str_replace( '$temp', $id, $_POST[ 'content' ] );

              $artilce = new Article();
              $artilce->add(
                $id,
                $img,
                $_POST[ 'category' ],
                $_POST[ 'tags' ],
                $_POST[ 'author' ],
                $_POST[ 'lang' ],
                $_POST[ 'title' ],
                str_replace( ' ', '-', $_POST[ 'slug' ] ),
                $_POST[ 'description' ],
                str_replace( '"', '\"', $_POST[ 'intro' ] ), // J'echappe tous les guillemets
                str_replace( '"', '\"', $content )
              );
              // Dossier pour la sauvergarde temporelle
              $dir = "uploads/articles/\$temp";
              // Recupere tous les fichier et sous dossier
              $files = scandir( $dir );
              foreach( $files as $file ) {
                if ( $file !== '.' && $file !== '..' ) {
                  $chemin = "$dir/$file";
                  if ( is_file( $chemin ) ) {
                    // Deplace le fichier ajouter dans le content dans son dossier( id )
                    rename( $chemin, "uploads/articles/$id/$file" );
                  }
                }
              }
              header( 'location: /admin/articles' ); exit;
            }
          }
        }
        $authorModels = new Author();
        $author = $authorModels->findAll();

        $categoryModels = new Category();
        $categries = $categoryModels->findAllCategory( 'fr' );

        $this->render( 'articles/add', [ 'post' => $_POST, 'categories' => $categries, 'authors' => $author ], 'admin' );
      }
    }
    
    #=====================================================#
    # Page d'affichage de toutes les langues d'un article #
    else if ( $page === 'view' ) {
      $articleModels = new Article();
      $articles = $articleModels->findAllLangPost( $id );

      $this->render( 'articles/view', compact( 'articles' ), 'admin' );
    }

    #================================================#
    # Page pour modifier un article ou sa traduction #
    else if ( $page === 'edit' ) {

      // Si l'id n'exite pas modifier un article je le redirige
      if ( $id === null ) { 
        header( 'location: /admin/articles'); exit;
      }

      // Si lang existe ca veut dire que je modifie la traduction de l'article
      if ( $lang ) {

        if ( Form::validate( $_POST, [ 'lang', 'title', 'intro', 'description', 'slug', 'content' ]) ) {

          $artilcemodels = new Article();
          $artilcemodels->updateLangPost( 
            $id,
            $lang,
            $_POST[ 'lang' ],
            $_POST[ 'title' ],
            str_replace( ' ', '-', $_POST[ 'slug' ] ),
            $_POST[ 'description' ],
            str_replace( '"', '\"', $_POST[ 'intro' ] ),
            str_replace( '"', '\"', $_POST[ 'content' ] )
          );
          header( "location: /admin/articles/view/{$id}" );
        }
        $languageModels = new Language();
        $language = $languageModels->findAll();

        $articleModels = new Article();
        $articles = $articleModels->findById( $id, $lang );

        $this->render( 'articles/editlang', [ 'id' => $id, 'lang' => $lang, 'language' => $language, 'articles' => $articles ], 'admin' );
      }

      // Sinon je modifie l'articles
      else {
        $articleModels = new Article();
        $articles = $articleModels->findById( $id, 'fr' );
        // Verifie si les champs sont valides
        if ( Form::validate( $_POST, [ 'lang', 'title', 'intro', 'category', 'tags', 'description', 'slug', 'author', 'content' ] ) ) {
          // Si l'image a ete envoi je modifie
          if ( isset( $_FILES[ 'miniature'] ) && $_FILES[ 'miniature' ][ 'error'] === 0 ) {

            if ( $img = $this->editSaveImg( $_FILES[ 'miniature' ], 720, 480, $_POST[ 'slug' ], "uploads/articles/$articles->id" ) ) {
              $articleModels->updateImgPost( $id, $img );
            }
          }
          $articleModels->updatePost(
            $id,
            $_POST[ 'category' ],
            $_POST[ 'tags' ],
            $_POST[ 'author' ],
            $_POST[ 'lang' ],
            $_POST[ 'title' ],
            str_replace( ' ', '-', $_POST[ 'slug' ] ),
            $_POST[ 'description' ],
            str_replace( '"', '\"', $_POST[ 'intro' ] ),
            str_replace( '"', '\"', $_POST[ 'content' ] )
          );
          header( 'location: /admin/articles' ); exit;
        }
        $authorModels = new Author();
        $author = $authorModels->findAll();
  
        $categoryModels = new Category();
        $categries = $categoryModels->findAllCategory( 'fr' );

        $this->render( 'articles/edit', [ 'id' => $id, 'categories' => $categries, 'authors' => $author, 'articles' => $articles ], 'admin' );
      }
    }

    #==================================================#
    # Permet de supprimer un article ou sa traduction #
    else if ( $page === 'delete' ) {
      $article = new Article();

      // Si lang existe ca veut dire que je supprime la traduction de l'article
      if ( $lang ) 
        $article->deleteLangPost( $id, $lang );
      // Sinon je supprime l'article
      else {
        $dir = "uploads/articles/$id";
        $files = scandir( $dir );
        foreach ( $files as $file ) {
          if ( $file !== '.' && $file !== '..' ) {
            $chemin = "$dir/$file";
            if ( is_file( $chemin ) ) {
              // Je supprime d'abord tous les fichiers
              unlink( $chemin );
            }
          }
        }
        // Ensuite je supprime le dossier de l'aritcles
        rmdir( $dir );
        // je supprime dans la base de donnees
        $article->deletePost( $id );
      }
      header( 'location: ' . $_SERVER[ 'HTTP_REFERER' ] ); exit;
    }

    #================================================#
    # Page principale pour articles d'administration #
    else {
      
      // if( file_exists( "uploads/articles/test.jpg" ) ) {
      //   // chmod( "http://blogtuto.com/uploads/articles/test.jpg", 755 );
      //   // unlink( "http://blogtuto.com/uploads/articles/test.jpg" );
      //   exec( "rm /uploads/articles/test.jpg" );
      // }

      $articleModels = new Article();
      $articles = $articleModels->findAllPost( 'fr' );

      foreach ( $articles as $article )
        $article->mois = $this->getMonth( $article->mois );
      
      $this->render( 'articles/index', compact( 'articles'), 'admin' );
    }
  }

  /**
   * =============================================
   * Cette mehtode s'occupe du CRUD des categories
   * =============================================
   * @param  string $page
   * @param  int $id
   * @param  string $lang
   * @return void
   */
  public function categories( string $page = null, int $id = null, string $lang = null ):void
  {
    if ( !isset( $_SESSION[ 'admin' ] ) ) {
      header( 'location: /' ); exit;
    }

    #==================================================#
    # Page pour ajouter une categorie ou sa traduction #
    else if ( $page === 'add' ) {

      // si l'id existe, j'ajouter une langue a la categorie
      if ( $id ) {
        //verifie si le champs sont valide
        if ( Form::validate( $_POST, [ 'name', 'lang', 'description' ] ) ) {
          $category = new Category();
          $category->addLang( 
            $id,
            $_POST[ 'lang' ], 
            $_POST[ 'name' ], 
            $_POST[ 'description' ]
          );
          header( "Location:/admin/categories/view/{$id}" ); exit;
        }
        $langueModels = new Language();
        $language = $langueModels->findAll();

        $this->render( 'categories/addlang', [ 'id' => $id, 'language' => $language], 'admin' );
      } 

      // sinon j'ajouter une categorie
      else {
        // Verifie si les champs sont valide
        if ( Form::validate( $_POST, [ 'svg', 'code', 'name', 'lang', 'description' ] ) ) {
          $category = new Category();
          $category->add( 
            $_POST[ 'code' ], 
            $_POST[ 'svg' ], 
            $_POST[ 'lang' ], 
            $_POST[ 'name' ], 
            $_POST[ 'description' ]
          );
          header( 'Location:/admin/categories' ); exit;
        }
        $this->render( 'categories/add', [], 'admin' );
      }
    }

    #=========================================================#
    # Page d'affichage de toutes les langues de la categories # 
    else if ( $page === 'view' ) {
      // si l'id n'existe pas
      if ( $id === null ) { 
        header( 'location: /admin/categories'); exit;
      }
      $categoryModels = new Category();
      $categories = $categoryModels->findAllLang( $id );

      $this->render( 'categories/view', compact( 'categories' ), 'admin' );
    }

    #===================================================#
    # Page pour modifier une categorie ou sa traduction #
    if ( $page === 'edit' ) {
      // si l'id n'existe pas
      if ( $id === null ) { 
        header( 'location: /admin/categories');exit;
      }
      //si lang existe je modifie juste la langue de la categories
      if ( $lang ) {
        $categoryModels = new Category();
        // Verifie si les champs sont valide
        if ( Form::validate( $_POST, [ 'name', 'lang', 'description' ] ) ) {
          $categoryModels->updateCategoryLang(
            $id,
            $lang,
            $_POST[ 'lang' ],
            $_POST[ 'name' ],
            $_POST[ 'description' ] 
          );
          header( "location: /admin/categories/view/{$id}" ); exit;
        }
        $category = $categoryModels->findById( $id, $lang );

        $langueModels = new Language();
        $language = $langueModels->findAll();

        $this->render( 'categories/editlang', [ 'language' => $language, 'category' => $category ], 'admin' );
      } 
      
      // Sinon je modifie une category
      else {
        // Verifie si les champs sont valides
        if ( Form::validate( $_POST, [ 'svg', 'code', 'name', 'lang', 'description' ] ) ) {
          $categoryModels = new Category();
          $categoryModels->updateCategory( 
            $id,
            $_POST[ 'code' ],
            $_POST[ 'svg' ],
            $_POST[ 'lang' ],
            $_POST[ 'name' ],
            $_POST[ 'description' ]
          );
          header( 'location: /admin/categories' ); exit;
        }
        $categoryModels = new Category();
        $category = $categoryModels->findById( $id, 'fr' );

        $this->render( 'categories/edit', compact( 'category' ), 'admin' );
      }
    }

    #====================================================#
    # Permet de supprimer une categorie ou sa traduction #
    else if ( $page === 'delete' ) {
      $categoryModels = new Category();

      // Si la lang existe je supprime la langue
      if ( $lang ) {
        $categoryModels->deleteCategoryLang( $id, $lang );
      // Sinon je supprime la categories
      } else {
        $categoryModels->deleteCategory( $id );
      }
      header( 'location: ' . $_SERVER[ 'HTTP_REFERER' ] ); exit;
    }

    #==================================================#
    # Page principale pour categories d'administration #
    else {
      $categoryModels = new Category();
      $categories = $categoryModels->findAllCategory( 'fr' );

      foreach ( $categories as $category )
        $category->date = $category->jour . ' ' . $this->getMonth( $category->mois ) . ' ' . $category->annee;

      $this->render( 'categories/index', compact( 'categories' ), 'admin' );
    }
  }
  
  /**
   * CRUD pour tags
   *
   * @param  string $page
   * @param  int $id
   * @param  string $lang
   * @return void
   */
  public function tags( string $page = null, int $id = null, string $lang = null ):void
  {
    if( !isset( $_SESSION[ 'admin' ] ) ) {
      header( 'location: /' ); exit;
    }

    #============================================#
    # Page pour ajouter un tags ou sa traduction #
    if ( $page === 'add' ) {

      // Si l'id existe ca veut dire que j'ajoute une traduction pour tags
      if ( $id ) {
        // Verifie si les champs sont valides
        if( Form::validate( $_POST, [ 'lang', 'name', 'description' ] ) ) {
          $tagsModels = new Tags();
          $tagsModels->addLangTags(
            $id,
            $_POST[ 'lang' ],
            $_POST[ 'name' ],
            $_POST[ 'description' ]
          );
          header( "location: /admin/tags/view/{$id}" );
        }
        $languageModels = new Language();
        $language = $languageModels->findAll();

        $categoryModels = new Category();
        $categories = $categoryModels->findAllCategory( 'fr' );
        
        $this->render( 'tags/addlang', [ 'id' => $id, 'categories' => $categories, 'language' => $language ], 'admin' );
      }

      // Sinon j'ajoute un tags
      else {
        // verifie si les champs sont valides
        if( Form::validate( $_POST, [ 'svg', 'lang', 'category', 'name', 'description' ] ) ) {
          $tagsModels = new Tags();
          $tagsModels->addTags(
            str_replace( '"', '\"', $_POST[ 'svg' ] ),
            $_POST[ 'lang' ],
            $_POST[ 'category' ],
            $_POST[ 'name' ], 
            str_replace( '"', '\"', $_POST[ 'description' ] )
          );
          header( 'location: /admin/tags' ); exit;
        }
        $categoryModels = new Category();
        $categories = $categoryModels->findAllCategory( 'fr' );
        
        $this->render( 'tags/add', compact( 'categories' ), 'admin' );
      }
    }

    #================================================#
    # Page d'affichage de toutes les langues du tags #
    else if ( $page == 'view' ) {
      $tagsModels = new Tags();
      $tags = $tagsModels->findAllTagsLang( $id );

      $this->render( 'tags/view', compact( 'tags' ), 'admin' );
    }

    #=============================================#
    # Page pour modifier un tags ou sa traduction #
    else if ( $page == 'edit' ) {

      // Si lang existe ca veut dire que je modifie la traduction du tags
      if ( $lang ) {
        // Verifie si les champs sont valides
        if ( Form::validate( $_POST, [ 'lang',  'name', 'description' ] ) ) {
          $tagsModels = new Tags();
          $tagsModels->updateLangTags(
            $id,
            $lang,
            $_POST[ 'lang' ],
            $_POST[ 'name' ],
            $_POST[ 'description' ]
          );
          header( "location: /admin/tags/view/$id" ); exit;
        }
        $languageModels = new Language();
        $language = $languageModels->findAll();

        $tagsModels = new Tags();
        $tags = $tagsModels->findTags( $id, $lang );

        $this->render( 'tags/editlang', [ 'id' => $id, 'lang' => $lang, 'language' => $language, 'tags' => $tags ], 'admin' );
      }
      
      // Sinon je modifie le tags
      else {

        if( Form::validate( $_POST, [ 'svg', 'lang', 'category', 'name', 'description' ] ) ) {

          $tagsModels = new Tags();
          $tagsModels->updateTags(
            $id,
            str_replace( '"', '\"', $_POST[ 'svg' ] ),
            $_POST[ 'lang' ],
            $_POST[ 'category' ],
            $_POST[ 'name' ],
            str_replace( '"', '\"', $_POST[ 'description' ] )
          );
          header( 'location: /admin/tags' );
          exit;
        }

        $tagsModels = new Tags();
        $tags = $tagsModels->findTags( $id );
  
        $categoryModels = new Category();
        $categories = $categoryModels->findAllCategory( 'fr' );
        
        $this->render( 'tags/edit', [ 'categories' => $categories, 'tags' => $tags ], 'admin' );
      }
    }

    #===============================================#
    # Permet de supprimer un tags ou sa traduction  #
    else if ( $page == 'delete' ) {
      $tags = new Tags();

      // Si lang existe ca veut dire que je supprime la traduction du tags
      if ( $lang ) 
        $tags->deleteLangTags( $id, $lang);
      // Sinon je supprime le tags
      else {
        // $tags->deleteTags( $id );
      }
      header( "location: " . $_SERVER[ 'HTTP_REFERER' ] ); exit;
    }

    #============================================#
    # Page principale pour tags d'administration #
    else {
      $tagsModels = new Tags();
      $tags = $tagsModels->findAllTags( 'fr' );

      foreach ( $tags as $tag )
        $tag->date = $tag->jour . ' ' . $this->getMonth( $tag->mois ) . ' ' . $tag->annee;

      $this->render( 'tags/index', compact( 'tags' ), 'admin' );      
    }
  }

  public function user( string $page = null, int $id = null, string $lang = null )
  {
    if ( !isset( $_SESSION[ 'admin' ] ) ) {
      header( 'location: /' ); exit;
    }



    $this->render( 'user/index', [], 'admin' );
  }

  /**
   * =========================================
   * c'est methode s'occupe du CRUD des author
   * =========================================
   * @param  string $page
   * @param  int $id
   * @param  string $lang
   * @return void
   */
  public function author( string $page = null, int $id = null, string $lang = null )
  {
    if ( !isset( $_SESSION[ 'admin' ] ) ) {
      header( 'location: /' ); exit;
    }

    #==============================================#
    # Page pour ajouter un auteur ou sa traduction #
    if ( $page === "add" ) {

      // Si l'id existe ca veut dire que j'ajoute une traduction pour l'auteur
      if ( $id ) {

        if ( Form::validate( $_POST, [ 'lang', 'description', 'info' ] ) ) {
          $author = new Author();
          $author->addLang( $id,
            $_POST[ 'lang' ],
            $_POST[ 'description' ],
            $_POST[ 'info' ]
          );
          header( "location: /admin/author/view/$id"); exit;
        }
        $languageModels = new Language();
        $language = $languageModels->findAll();

        $this->render( 'author/addLang', [ 'id' => $id, 'language' => $language ], 'admin' );
      }
      
      // Sinon j'ajoute un auteur
      else {
        // Verifie si les champs sont valides
        if ( Form::validate( $_POST, [ 'firstname', 'name', 'lang', 'description', 'info' ] ) && isset( $_FILES[ 'file' ] ) && $_FILES[ 'file' ][ 'error'] == 0 ) {
          $name = strip_tags( ucfirst( strtolower( $_POST[ 'name' ] ) ) );
          $firstname = strip_tags( strtolower( $_POST[ 'firstname' ] ) );

          if ( $file = $this->editSaveImg( $_FILES[ 'file' ], 200, 200, "$firstname$name", 'uploads/author' ) ) {
            $author = new Author();
            $author->add( $file, $name, $firstname,
              $_POST[ 'lang' ],
              $_POST[ 'description' ],
              $_POST[ 'info' ]
            );
            header( 'location: /admin/author'); exit;
          }
        }
        $this->render( 'author/add', [], 'admin' );
      }
    }

    #=======================================================#
    # Page d'affichage de toutes les traduction de l'auteur #
    else if( $page === "view" ) {
      $authorModels = new Author();
      $authors = $authorModels->findAllLangAuthor( $id );
      
      $this->render( 'author/view', compact( 'authors' ), 'admin' ); 
    }

    #===============================================#
    # Page pour modifier un auteur ou sa traduction #
    else if( $page === "edit" ) {
      
      // Si lang existe ca veut dire que je modifie une traduction pour l'auteur
      if ( $lang ) {

        if ( Form::validate( $_POST, [ 'lang', 'description', 'info' ] ) ) {
          $author = new Author();

          $author->updateLangAuthor( $id, $lang,
            $_POST[ 'lang' ],
            $_POST[ 'description' ],
            $_POST[ 'info' ]
          );
          header( "location: /admin/author/view/$id" ); exit;
        }
        $authorModels = new Author();
        $authors = $authorModels->findByLang( $id, $lang );

        $langModels = new Language();
        $language = $langModels->findAll();

        $this->render( 'author/editLang', [ 'authors' => $authors, 'language' => $language], 'admin' );
      }

      // Sinon je modifie un auteur
      else {

        if ( Form::validate( $_POST, [ 'firstname', 'name', 'lang', 'description', 'info' ] ) ) {
          $author = new Author();
          $name = strip_tags( ucfirst( strtolower( $_POST[ 'name' ] ) ) );
          $firstname = strip_tags( strtolower( $_POST[ 'firstname' ] ) );

          if ( isset( $_FILES[ 'file' ] ) && $_FILES[ 'file' ][ 'error'] == 0 ) {
            $file = $this->editSaveImg( $_FILES[ 'file' ], 200, 200, "$firstname$name", 'uploads/author' );

            $author->updateImg( $id, $file );
          }
          $author->updateAuthor( $id, $name, $firstname,
            $_POST[ 'lang' ],
            $_POST[ 'description' ],
            $_POST[ 'info' ]
          );
          header( 'location: /admin/author'); exit;
        }
        $authorModels = new Author();
        $authors = $authorModels->findById( $id, 'fr' );

        $this->render( 'author/edit', compact( 'authors' ), 'admin' );   
      }
    }

    #=================================================#
    # Permet de supprimer un auteur ou sa traduction  #
    else if( $page === "delete" ) {
      $author = new Author();

      if ( $lang )
        $author->deleteLangAuthor( $id, $lang );
      else
        $author->deleteAuthor( $id );

      header( 'location: ' . $_SERVER[ 'HTTP_REFERER' ] ); exit;
    }
    
    #============================================#
    # Page principale pour auteur d'administration #
    else {
      $authorModels = new Author();
      $authors = $authorModels->findAuthor( 'fr' );

      foreach( $authors as $author )
        $author->date = $author->jour . ' ' . $this->getMonth( $author-> mois ) . ' ' . $author->annee;

      $this->render( 'author/index', compact( 'authors' ), 'admin' );
    }
  }

  /**
   * =========================================
   * Cet methode s'occupe du CRUD des language
   * =========================================
   * @param  string $page
   * @param  int $id
   * @return void
   */
  public function language( string $page = null, int $id = null ):void
  {
    if ( !isset( $_SESSION[ 'admin' ] ) ) {
      header( 'location: /' ); exit;
    }

    #==============================#
    # Page pour ajouter une langue #
    if ( $page === 'add' ) {
      // Verification des champs
      if ( isset( $_FILES[ 'file' ] ) && $_FILES[ 'file' ][ 'error' ] == 0 && Form::validate( $_POST, [ 'code', 'name' ] ) ) {
        $name = ucfirst( strtolower( htmlspecialchars( $_POST[ 'name' ] ) ) );
        $code = strtolower( htmlspecialchars( $_POST[ 'code' ] ) );

        if ( $img = $this->editSaveImg( $_FILES[ 'file' ], 46, 28, $code, 'uploads/website' ) ) {
          $Language = new Language();
          $Language ->setImg( $img )
                    ->setCode( $code )
                    ->setName( $name );

          try {
            $Language->create();
          } catch ( \Exception $e ) {
            $_SESSION[ 'error' ] = "Cette langue existe deja";
            header( "location: /admin/language/add " ); exit;
          }
          header( 'location: /admin/language' ); exit;
        }
      }
      $this->render( 'language/add', [], 'admin' );
    }

    #===============================#
    # Page pour modifier une langue #
    else if ( $page === 'edit' && $id ) {
      $languageModels = new Language();

      if ( Form::validate( $_POST, [ 'code', 'name' ] ) ) {
        $name = ucfirst( strtolower( htmlspecialchars( $_POST[ 'name' ] ) ) );
        $code = strtolower( htmlspecialchars( $_POST[ 'code' ] ) );

        if (  isset( $_FILES[ 'file' ] ) && $_FILES[ 'file' ][ 'error' ] == 0 ) {
          $img = $this->editSaveImg( $_FILES[ 'file' ], 46, 28, $code, 'uploads/website' );
          $languageModels ->setImg( $img );
        }
        $languageModels ->setCode( $code )
                        ->setName( $name );

        try {
          $languageModels->update( $id );
        } catch ( \Exception $e ) {
          $_SESSION[ 'error' ] = "Cette langue existe deja";
          header( "location: /admin/language/edit/{$id}" ); exit;
        }
        header( 'location: /admin/language' ); exit;
      }
      $lang = $languageModels->find( $id );

      $this->render( 'language/edit', compact( 'lang' ), 'admin' );
    }

    #================================#
    # Permet de supprimer une langue #
    else if ( $page === 'delete' && $id ) {
      $language = new Language();
      $language->delete( $id );

      header( 'location: /admin/language' ); exit;
    }

    #================================================#
    # Page principale pour language d'administration #
    else {
      $languageModels = new Language();
      $language =  $languageModels->findAll();

      $this->render( 'language/index', compact( 'language' ), 'admin' );
    }
  }
  
  /**
   * ========================
   * Deconnexion du dashboard
   * ========================
   * @return void
   */
  public function logout()
  {
    unset( $_SESSION[ 'admin' ] );
    header( 'location: /'); exit;
  }
  
  /**
   * Verifie si un article existe deja
   *
   * @param  string $title titre a verifie
   * @param  string $slug slug a verifier
   * @return bool
   */
  public function isFound( string $title, string $slug ):bool
  {
    $articlesModels = new Article();
    $articles = $articlesModels->findAllLangPost();
    $isFound = false;

    // Parcour toutes les traductions
    foreach( $articles as $article ) {
      // Verifie si le titre ou le slug n'existe pas
      if ( $article->title == $title || $article->slug == $slug ) {
        $_SESSION[ 'error' ] = "Cet article existe deja";
        $isFound = true;
      }
    }
    return $isFound;
  }

  /**
   * =================================================
   * Cette mehtode s'occupe de toutes les requete ajax
   * =================================================
   * @return void
   */
  public function ajax():void
  {
    // Permet de recupere les tags d'une categorie
    if ( isset( $_POST[ 'category' ] ) ) {
      $tagsModels = new Tags();
      $tags = $tagsModels->findTagsByCategory( htmlspecialchars( $_POST[ 'category' ] ), 'fr' );
      $data = [];
      foreach ( $tags as $tag ) {
        $data[] = json_encode( $tag );
      }
      print_r( json_encode( $data )  );
    }
    // Permet de publier un article
    else if ( isset( $_POST[ 'id' ] ) && isset( $_POST[ 'ispublished' ] ) ) {
      $article = new Article();
      $article->post( htmlspecialchars( $_POST[ 'id' ] ), htmlspecialchars( $_POST[ 'ispublished' ] ) );
    }
    // L'orqu'on veut ajouter une image pour le body de l'article
    else if ( Form::validate( $_POST, [ 'title' ] ) && isset( $_FILES[ 'img' ] ) && $_FILES[ 'img' ][ 'error' ] == 0 ) {
      $name = str_replace( ' ', '-', $_POST[ 'title' ] );
      // Si l'id du dossier est envoye je le place dedans
      if ( isset( $_POST[ 'dir' ] ) ) {
        // Affiche le nom de l'image renvoyer par la methode
        echo $this->editSaveImg( $_FILES[ 'img' ], 720, 480, $name, 'uploads/articles/' . $_POST[ 'dir' ] );
      } 
      // Sinon je le place dans le fichier temporelle
      else {
        // Affiche le nom de l'image renvoyer par la methode
        echo $this->editSaveImg( $_FILES[ 'img' ], 720, 480, $name, 'uploads/articles/$temp' );
      }
    }
    // Sinon je sort
    else {
      header( "location: /" ); exit;
    }
  }
  
  /**
   * Cette methode redimension une image et la sauvegarde
   * 
   * @param  array $file l'image a traite
   * @param  int $width la largeur du redimensionnement
   * @param  int $heigth hauteur du redimensionnement 
   * @param  string $name nom de l'image
   * @param  string $path Chemin pour placer l'image
   * @param  bool $send true pour envoyer le fichier et false pour annule
   * @return
   */
  public function editSaveImg( array $file, int $width, int $heigth, string $name, string $path, bool $send = true )
  {
    if ( $file[ 'size' ] <= 1000000 ) {
      $extension_upload = pathinfo( $file[ 'name' ] )[ 'extension' ];
      $extension_autoriees = [ 'jpeg', 'png', 'jpg' ];
      
      if ( in_array( $extension_upload, $extension_autoriees ) ) {
        // Si send est vrai je redimensionne et j'envoie l'image
        if ( $send ) {
          $nameImg = "$name.$extension_upload";

          $imageinfos = getimagesize( $file[ 'tmp_name' ] );
          $largeur = $imageinfos[0];
          $hauteur = $imageinfos[1];
  
          $newImg = imagecreatetruecolor( $width, $heigth );

          switch ( $imageinfos[ 'mime' ] ) {
            case "image/png":
              $imageSource = imagecreatefrompng( $file[ 'tmp_name' ] );
              break;
            case "image/jpeg":
              $imageSource = imagecreatefromjpeg( $file[ 'tmp_name' ] );
              break;
          }
          imagecopyresampled( $newImg, $imageSource, 0, 0, 0, 0, $width, $heigth, $largeur, $hauteur);

          switch ( $imageinfos[ 'mime' ] ) {
            case "image/png":
              imagepng( $newImg, "{$path}/{$nameImg}");
              break;
            case "image/jpeg":
              imagejpeg( $newImg, "{$path}/{$nameImg}");
              break;
          }
          return $nameImg;
        } 
        // Sinon je retourne que le fichier est valide
        else {
          return true;
        }
      }
    }
    else {
      header( "location: /" ); exit;
    }
  }

}

