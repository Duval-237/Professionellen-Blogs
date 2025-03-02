<?php

/**
 * =================================
 * Cette classe gere la table author
 * =================================
 * @author Duval Nzouekeu <nzouekeuduval@gmail.com>
 * 
 */

namespace Core\models;

use Core\src\Model;

class Author extends Model
{
  private $table_join = "author_traduction";

  public function __construct()
  {
    $this->table = "author";
    $this->language = $_SESSION[ 'language' ];
  }
  
  /**
   * findAuthor
   *
   * @param  mixed $lang
   * @return array
   */
  public function findAuthor( string $lang = null ):array
  {
    $lang ??= $this->language;

    $sql = "SELECT tab.id, img, name, first_name, description, DAY(date_create) jour, MONTH(date_create) mois, YEAR(date_create) annee
    FROM {$this->table} tab
    INNER JOIN {$this->table_join}
    ON tab.id = id_author
    WHERE lang_code = '{$lang}'";

    return $this->request( $sql )->fetchALL();
  }
  
  /**
   * findById
   *
   * @param  int $id
   * @param  string $lang
   * @return object
   */
  public function findById( int $id, string $lang ):object
  {
    $lang ??= $this->language;

    $sql = "SELECT tab.id, img, name, first_name, description, info
    FROM {$this->table} tab
    INNER JOIN {$this->table_join}
    ON tab.id = id_author
    WHERE tab.id = $id
    AND lang_code = '{$lang}'";

    return $this->request( $sql )->fetch();
  }

  public function findByLang( int $id, string $lang ):object
  {
    $sql = "SELECT id_author, lang_code, description, info
    FROM {$this->table_join}
    WHERE id_author = $id
    AND lang_code = \"{$lang}\"";

    return $this->request( $sql )->fetch();
  }

  public function findAllLangAuthor( int $id ):array
  {
    $sql = "SELECT * FROM {$this->table_join} WHERE id_author = $id";
    return $this->request( $sql )->fetchALL();
  }
  
  /**
   * Ajoute un auteur
   *
   * @param  string $img
   * @param  string $name
   * @param  string $first_name
   * @param  string $lang
   * @param  string $description
   * @param  string $info
   * @return void
   */
  public function add( string $img, string $name, string $first_name, string $lang, string $description, string $info ):void
  {
    $sql1 = "INSERT INTO {$this->table} VALUES ( NULL, \"$img\", \"$name\", \"$first_name\", NOW() )";
    $this->request( $sql1 );

    $sql2 = "INSERT INTO {$this->table_join} VALUES ( NULL, LAST_INSERT_ID(), \"$lang\", \"$description\", \"$info\" )";
    $this->request( $sql2 );
  }
  
  /**
   * Ajoute une traduction a un auteur
   *
   * @param  int $id
   * @param  string $lang
   * @param  string $description
   * @param  string $info
   * @return void
   */
  public function addLang( int $id, string $lang, string $description, string $info ):void
  {
    $sql = "INSERT INTO {$this->table_join} VALUES ( NULL, \"$id\", \"$lang\", \"$description\", \"$info\" )";  
    $this->request( $sql );
  }

  public function updateAuthor( int $id, string $name, string $first_name, string $lang, string $description, string $info ):void
  {
    $sql1 = "UPDATE {$this->table}
    SET name = \"$name\", first_name = \"$first_name\"
    WHERE id = \"{$id}\"";
    $this->request( $sql1 );

    $sql2 = "UPDATE {$this->table_join}
    SET lang_code = \"$lang\", description = \"$description\", info = \"$info\"
    WHERE id_author = \"{$id}\"
    AND lang_code = 'fr'";
    $this->request( $sql2 );
  }

  public function updateImg( int $id, string $file ):void
  {
    $sql = "UPDATE {$this->table} SET img = \"$file\" WHERE id = \"{$id}\"";
    $this->request( $sql );
  }

  public function updateLangAuthor( int $id, string $lang_author, string $lang, string $description, string $info ):void
  {
    $sql = "UPDATE {$this->table_join}
    SET lang_code = \"$lang\", description = \"$description\", info = \"$info\"
    WHERE id_author = \"{$id}\"
    AND lang_code = \"{$lang_author}\"";
    $this->request( $sql );
  }

  public function deleteAuthor( int $id ):void
  {
    $sql2 = "DELETE FROM {$this->table_join} WHERE id_author = \"{$id}\"";
    $this->request( $sql2 );
    
    $sql1 = "DELETE FROM {$this->table} WHERE id = \"{$id}\"";
    $this->request( $sql1 );
  }

  public function deleteLangAuthor( int $id, string $lang ):void
  {
    $sql = "DELETE FROM {$this->table_join} WHERE id_author = \"{$id}\" AND lang_code = \"{$lang}\"";
    $this->request( $sql );
  }

}

