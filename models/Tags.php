<?php

/**
 * ===============================
 * Cette classe gere la table tags
 * ===============================
 * @author Duval Nzouekeu <nzouekeuduval@gmail.com>
 * 
 */

namespace Core\models;
use Core\src\Model;

class Tags extends Model
{
  private $table_join = "tags_traduction";

  public function __construct()
  {
    $this->table = "tags";
    $this->language = $_SESSION[ 'language' ];
  }

  /**
   * Renvoie l'id d'un tags
   *
   * @param  string $tags
   * @return
   */
  public function findId( string $tags ) {
    $sql = "SELECT id_tags 
    FROM {$this->table_join} 
    WHERE name = \"{$tags}\"
    AND lang_code = \"{$this->language}\"";

    return $this->request( $sql )->fetch();
  }
  
  /**
   * Recupere tous les tags d'une categories
   *
   * @param  int $id id de la category
   * @return array
   */
  public function findTagsByCategory( int $id, string $lang = null ):array
  {
    $lang ??= $this->language;

    $sql = "SELECT tab.id, svg, name FROM {$this->table} tab
    INNER JOIN {$this->table_join}
    ON tab.id = id_tags
    WHERE lang_code = \"{$lang}\"
    AND id_category= \"{$id}\"";

    return $this->request( $sql )->fetchAll();
  }

  public function findAllTags( $lang = null ):array
  {
    $lang ??= $this->language;

    $sql = "SELECT tab.id, tab.svg, color, tab_join.name, category_traduction.name category, tab_join.description, DAY(tab.date_create) jour, MONTH(tab.date_create) mois, YEAR(tab.date_create) annee
    FROM {$this->table} tab, {$this->table_join} tab_join, category, category_traduction
    WHERE tab.id = id_tags
    AND tab.id_category = category.id
    AND category.id = category_traduction.id_category
    AND tab_join.lang_code = \"{$lang}\"
    AND category_traduction.lang_code = \"{$lang}\"
    ORDER BY tab.id DESC";

    return $this->request( $sql )->fetchAll();
  }

  public function findTags( int $id, $lang = null ):object
  {
    $lang ??= $this->language;

    $sql = "SELECT tab.id, svg, name, description, id_category, lang_code
    FROM {$this->table} tab
    INNER JOIN {$this->table_join}
    ON tab.id = id_tags
    WHERE tab.id = \"{$id}\"
    AND lang_code = \"{$lang}\"
    ";

    return $this->request( $sql )->fetch();
  }

  public function findAllTagsLang( int $id ):array
  {
    $sql = "SELECT tab.id, svg, name, svg, lang_code, description
    FROM {$this->table} tab
    INNER JOIN {$this->table_join}
    ON tab.id = id_tags
    WHERE tab.id = \"{$id}\"";

    return $this->request( $sql )->fetchAll();
  }

  public function addTags( string $svg, string $lang, int $category, string $name,string $description ):void
  {
    $sql1 = " INSERT INTO {$this->table}
    VALUES( NULL, \"{$category}\", \"{$svg}\", NOW() )";
    $this->request( $sql1 );

    $sql2 = "INSERT INTO {$this->table_join}
    VALUES( NULL, LAST_INSERT_ID(), \"{$lang}\", \"{$name}\", \"{$description}\" )";
    $this->request( $sql2 );
  }

  public function addLangTags( string $id, string $lang, string $name,string $description ):void
  {
    $sql = "INSERT INTO {$this->table_join}
    VALUES( NULL, $id, \"{$lang}\", \"{$name}\", \"{$description}\" )";
    $this->request( $sql );
  }

  public function updateTags( int $id, string $svg, string $lang, int $category, string $name, string $description ):void
  {
    $sql1 = "UPDATE {$this->table} SET svg = \"$svg\", id_category = \"$category\" WHERE id = \"$id\"";
    $this->request( $sql1 );

    $sql2 = "UPDATE {$this->table_join}
    SET lang_code = \"{$lang}\", name = \"{$name}\", description = \"{$description}\"
    WHERE id_tags = \"$id\"
    AND lang_code = \"fr\"";
    $this->request( $sql2 );
  }

  public function updateLangTags( int $id, string $lang_tags, string $lang, string $name, string $description ):void
  {
    $sql = "UPDATE {$this->table_join}
    SET lang_code = \"{$lang}\", name = \"{$name}\", description = \"{$description}\"
    WHERE id_tags = \"{$id}\"
    AND lang_code = \"{$lang_tags}\"";
    $this->request( $sql );
  }


  public function deleteLangTags( int $id, string $lang ):void
  {
    $sql = "DELETE FROM {$this->table_join} 
    WHERE id_tags = \"{$id}\" 
    AND lang_code = \"{$lang}\"";
    
    $this->request( $sql );
  }

}

