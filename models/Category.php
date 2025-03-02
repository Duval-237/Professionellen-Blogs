<?php

/**
 * ===================================
 * Cette classe gere la table Category
 * ===================================
 * @author Duval Nzouekeu <nzouekeuduval@gmail.com>
 * 
 */

namespace Core\models;

use Core\src\Model;

class Category extends Model
{
  private $table_join = 'category_traduction';

  public function __construct()
  {
    $this->table = 'category';
    $this->language = $_SESSION[ 'language' ];
  }
  
  /**
   * Recupere toutes les categories
   *
   * @param string $lang Definir la langue a recuperer
   * @return array
   */
  public function findAllCategory( string $lang = null ):array
  {
    $lang ??= $this->language;

    $sql = "SELECT tab.id, color, svg, DAY(date_create) jour, MONTH(date_create) mois, YEAR(date_create) annee, name, description 
    FROM {$this->table} tab
    INNER JOIN {$this->table_join}
    ON tab.id = id_category
    WHERE lang_code = '{$lang}'";

    return $this->request( $sql )->fetchAll();
  }

  /**
   * Recupere une categories grace a son id
   *
   * @param int $id
   * @param string $lang
   * @return object
   */
  public function findById( int $id, string $lang = null ):object
  {
    $lang ??= $this->language;

    $sql = "SELECT tab.id, color, svg, lang_code, date_create date, name, description 
    FROM {$this->table} tab
    INNER JOIN {$this->table_join}
    ON tab.id = id_category
    WHERE tab.id = '{$id}'
    AND lang_code = '{$lang}'";

    return $this->request( $sql )->fetch();
  }
  
  /**
   * Renvoie l'id d'une category
   *
   * @param  string $category
   * @return
   */
  public function findId( string $category ) {
    $sql = "SELECT id_category 
    FROM {$this->table_join} 
    WHERE name = \"{$category}\"
    AND lang_code = \"{$this->language}\"";

    return $this->request( $sql )->fetch();
  }
  
  /**
   * Recupere toutes les langues d'une categories grace a son ID
   *
   * @param  int $id id de la categorie
   * @return array
   */
  public function findAllLang( int $id ):array
  {
    $sql = "SELECT tab.id, color, svg, lang_code, date_create date, name, description  
    FROM {$this->table} tab
    INNER JOIN {$this->table_join}
    ON tab.id = id_category
    WHERE tab.id = '{$id}'";

    return $this->request( $sql )->fetchAll();
  }
  
  /**
   * Ajoute une category
   *
   * @param  string $color
   * @param  string $svg
   * @param  string $lang
   * @param  string $name
   * @param  string $description
   * @return void
   */
  public function add( string $color, string $svg, string $lang, string $name,string $description ):void
  {
    $sql1 = " INSERT INTO {$this->table} ( color, svg, date_create )
    VALUES( '{$color}', '{$svg}', NOW() )";
    $this->request( $sql1 );

    $sql2 = "INSERT INTO {$this->table_join} ( id_category, lang_code, name, description )
    VALUES( LAST_INSERT_ID(), '{$lang}', '{$name}', '{$description}' )";
    $this->request( $sql2 );
  }
  
  /**
   * Ajoute une lang a une category
   *
   * @param  int $id
   * @param  string $lang
   * @param  string $name
   * @param  string $description
   * @return void
   */
  public function addLang( int $id, string $lang, string $name, string $description ):void
  {
    $sql = "INSERT INTO {$this->table_join} ( id_category, lang_code, name, description )
    VALUES( $id, '{$lang}', '{$name}', '{$description}' )
    ";
    $this->request( $sql );
  }
  
  /**
   * modifie une category
   *
   * @param  int $id l'id a modifier
   * @param  string $color
   * @param  string $svg
   * @param  string $lang
   * @param  string $name
   * @param  string $description
   * @return void
   */
  public function updateCategory( int $id, string $color, string $svg, string $lang, string $name, string $description ):void
  {
    $sql1 = " UPDATE {$this->table}
    SET color = '{$color}', svg = '{$svg}'
    WHERE id = '{$id}'";

    $this->request( $sql1 );

    $sql2 = "UPDATE {$this->table_join} 
    SET lang_code = '{$lang}', name = '{$name}', description = '{$description}' 
    WHERE id_category = '{$id}'
    AND lang_code = 'fr'";

    $this->request( $sql2 );
  }

  /**
   * modifie une les lang de la categorie
   *
   * @param  int $id l'id a modifier
   * @param  string $language la langue a modifier
   * @param  string $lang
   * @param  string $name
   * @param  string $description
   * @return void
   */
  public function updateCategoryLang( int $id, string $language, string $lang, string $name, string $description ):void
  {
    $sql = "UPDATE {$this->table_join} 
    SET lang_code = '{$lang}', name = '{$name}', description = '{$description}' 
    WHERE id_category = '{$id}'
    AND lang_code = '{$language}'";

    $this->request( $sql );
  }
    
  /**
   * deleteCategory
   *
   * @param  mixed $id
   * @return void
   */
  public function deleteCategory( int $id ):void
  {
    $sql2 = "DELETE FROM {$this->table_join} WHERE id_category = '{$id}'";
    $this->request( $sql2 );

    $sql1 = "DELETE FROM {$this->table} WHERE id = '{$id}'";
    $this->request( $sql1 ); 
  }

  /**
   * Supprime la langue d'une categorie
   *
   * @param  int $id id de la category
   * @param  string $lang Langue a supprime
   * @return void
   */
  public function deleteCategoryLang( int $id, string $lang ):void
  {
    $sql = "DELETE FROM {$this->table_join} 
    WHERE id_category = '{$id}' 
    AND lang_code = '{$lang}'";
    
    $this->request( $sql );
  }
  

}

