<?php

/**
 * ============================
 * Gestion de la page d'acceuil
 * ============================
 * @author Duval Tetsol <nzouekeuduval@gmail.com>
 * 
 */

namespace Core\controllers;

use Core\models\User;
use Core\src\Controller;
use Core\src\Form;
use Core\models\Article as ArticleModels;
use Core\models\Category as CategoryModels;

class Main extends Controller 
{
  public function index() 
  {
    $Article = new ArticleModels();
    $recent_post = $Article->findRecentPost();
    $popular_post = $Article->findPopularPost();
    $all_post = $Article->randomPost( 12 );
    
    $categoryModels = new CategoryModels();
    $categories = $categoryModels->findAllCategory();

    $this->render( 'index', [ 'recent_post' => $recent_post, 'popular_post' => $popular_post, 'categories' => $categories, 'all_post' => $all_post ] );
  }

  public function ajax()
  {
    // L'orsqu'on clique sur le bouton random
    if ( isset( $_POST[ 'random' ] ) ) {
      $ArticleModels = new ArticleModels();
      $article = $ArticleModels->randomSlug();
      echo $article->slug;
    }
    // Formulaire de connexion
    else if ( Form::validate( $_POST, [ 'email', 'password' ] ) ) {
      $email = htmlspecialchars( $_POST[ 'email' ] );
      $password = htmlspecialchars( $_POST[ 'password' ] );

      $userModel = new User();

      $user = $userModel->findByEmail( $email );

      if ( $user ) {
        $userModel->hydrate( $user );

        if ( $email == $userModel->getEmail() && password_verify( $password, $userModel->getPassword() ) )
          $userModel->setSession();
        else
          echo "Adresse Email ou Mot de Passe Incorrect";

      } else {
         echo "Adresse Email ou Mot de Passe Incorrect";
      }
    }
    // Formulaire d'inscription
    else if ( Form::validate( $_POST, [ 'emailSignIn', 'passwordSignIn' ] ) ) {
      $id = rand( 1000, 9999 ) . time();
      $email = htmlspecialchars( $_POST[ 'emailSignIn' ] );
      $password = htmlspecialchars( $_POST[ 'passwordSignIn' ] );
      $color = [ 'e61a1a', 'f0580e', 'd9c30e', '57ca17', '17ca98', '1744ca', 'a317ca', 'f9058e'];

      $_SESSION[ 'theme' ] == 'theme-dark' ? $theme = 1: $theme = 0;

      $userModel = new User();
      $user = $userModel->findByEmail( $email );

      if ( !$user ) {
        if ( strlen( $password ) >= 8 ) {
          $userModel->setId( $id )
                    ->setEmail( $email )
                    ->setPassword( password_hash( $password, PASSWORD_BCRYPT, [ 'cost' => 12 ] ) )
                    ->setPseudo( "User{$id}" )
                    ->setColor( $color[ rand( 0, 7 ) ] )
                    ->setTheme( $theme );
  
          $userModel->create();
          $userModel->setSession();
        } else {
          echo "Mot de passe doit avoir au moins 8 caracteres";
        }
      } else {
        echo "Cette email existe deja";
      }
    }
    // Sauvegarde du theme de l'utilisateur
    else if ( Form::validate( $_POST, [ 'themeUser' ] ) AND isset( $_SESSION[ 'user' ] ) ) {
      $themeUser = htmlspecialchars( $_POST[ 'themeUser' ] );
      $theme = $themeUser == 2 ? '0' : '1';

      $userModel = new User();
      $userModel->changeTheme( $_SESSION[ 'user' ][ 'id' ], $theme );
      $_SESSION[ 'user' ][ 'theme' ] = $theme;
    }
    // Deconnexion
    else if ( isset( $_POST[ 'signOut' ] ) ) {
      unset( $_SESSION[ 'user' ] );
    }
    else {
      Error_found::error( 404 );
      // header( 'location: /' );
    }
  }

}

