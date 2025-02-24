<?php

/**
 * ===========================================
 * Cette classe gere l'affichage des categoies
 * ===========================================
 * @author Duval Tetsol <nzouekeuduval@gmail.com>
 * 
 */

namespace Core\controllers;

use Core\src\Controller;
use Core\models\Collection as CollectionModels;

class Collection extends Controller
{
  public function index()
  {

    if ( isset( $_SESSION[ 'user' ] ) ) {

      $collection = new CollectionModels();

      $collection = $collection->findCollection( $_SESSION[ 'user' ][ 'id' ] );

      $this->render( 'index', compact( 'collection' ) );
    } else {
      header( 'location: /' );
    }
  }

}

